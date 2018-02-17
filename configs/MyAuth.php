<?php
/*-------------------------------------------------*/
/*            mysql(pdo) version                   */
/*-------------------------------------------------*/
$homepath="/var/www/vhosts/cosmocity.net/secure/mimicom";

require $homepath . '/configs/nullcheck.inc';
require $homepath . '/configs/common.inc';
require $homepath . '/configs/ClassLoader.php';

$classLoader = new ClassLoader();
$classLoader->registerDir($homepath.'/configs');

require_once("Auth/Auth.php");

function myLogin(){
	global $o_smarty;
	global $authval;
	$_SESSION['auth_status']=$authval->getStatus();
	switch($authval->getStatus()) {
	case AUTH_IDLED:
		$message = '長時間操作がなかったため、自動ログアウトしました。操作を続けるには、再度ログインしてください。';
		break;    
	case AUTH_EXPIRED:
		$message = '接続の制限時間を越えたため、自動ログアウトしました。操作を続けるには、再度ログインしてください。';
		break;
	case AUTH_WRONG_LOGIN:
		$message = '会員番号またはパスワードが間違っています。';
		break;
	case AUTH_SECURITY_BREACH:
		$message = 'IPアドレスまたはブラウザの変更があり、自動ログアウトしました。';
		break;
	default:
		$message = '';
		break;
	}
	$o_smarty->assign("message",$message);
// テスト用ログイン画面(実運用ログイン画面とどちらかを使用する事)
//	$o_smarty->display("TemplateTestLogin.tpl");
// 実運用ログイン画面
	$o_smarty->display("login.tpl");
}

session_start();
$o_smarty=new MySmarty();

$params=array(
	"dsn" => $o_smarty->getConfigVars("db1_string"),
	"table" => "auth",
	"usernamecol" => "username",
	"passwordcol" => "password");

$authval=new Auth("DB",$params,"myLogin",TRUE);
$authval->setExpire(10800);	//10800秒=3時間接続していたので強制ログアウト
$authval->setIdle(3600);	//3600秒=60分間操作がなければ自動ログアウト
$authval->start();

if ($authval->getUsername()!=''){
	//セッションハイジャック対策
	$_old_session_id = session_id();
	$_old = $_SESSION;
	$_SESSION = array();
	session_destroy();
	session_start();
	session_regenerate_id(true);
	$_SESSION = $_old;
	$_old_session_file = session_save_path() . '/sess_' . $_old_session_id;
	if (file_exists($_old_session_file)) { unlink($_old_session_file); } 
	//
	$_SESSION['auth_status']=0;
	$db1=$o_smarty->get_db1();
	$db5=$o_smarty->get_db5();
	if (is_null($_SESSION['uid'])){
		$_SESSION['uid']=$authval->getUsername();
		$_SESSION['mb_flg']=0;
		//会員登録の有無
		$stt = $db1->prepare("SELECT * FROM member where id=?");
		if ($stt->execute(array($_SESSION['uid']))) {
			while ($row = $stt->fetch()) {
			    $_SESSION['mb_flg']=1;
				$_SESSION['mb_id']=$row['id'];
				$_SESSION['mb_member_kbn']=$row['member_kbn'];
				$_SESSION['mb_name_1']=$row['name_1'];
				$_SESSION['mb_name_2']=$row['name_2'];
				$_SESSION['mb_log1']=$row['login1_timestamp'];
				$_SESSION['mb_log0']=now;
			}
		}
		$stt = null;

		//権限の有無
		$stt = $db1->prepare("SELECT * FROM member_z where id=?");
		if ($stt->execute(array($_SESSION['uid']))) {
			while ($row = $stt->fetch()) {
				$_SESSION['mbz_jimukyoku']=$row['jimukyoku'];
				$_SESSION['mbz_jmaccess']=$row['jimu_m_access'];
			}
		}
		$stt = null;

		//今回ログイン日時をセット
		$sql="UPDATE member SET login3_timestamp=login2_timestamp,login2_timestamp=login1_timestamp,login1_timestamp=now() WHERE id=?";
		$stt=$db5->prepare($sql);
		$stt->bindParam(1, $_SESSION['mb_id']);
		try {
			$db5->beginTransaction();
			$stt->execute();
			$db5->commit();
		}
		catch (PDOException $exception){
			$db5->rollBack();
		}
		$stt = null;

		//ログにログイン情報をセット
		$selfpath = 'AUTH ' . $_SERVER["PHP_SELF"];
		$sql="INSERT INTO login_log(login_user,login_date,request_uri,ip_address)";
		$sql .= " VALUES(?,?,?,?)";
		$stt=$db5->prepare($sql);
		$stt->bindParam(1, $_SESSION['mb_id']);
		$stt->bindParam(2, date("Y-m-d H:i:s"));
		$stt->bindParam(3, $selfpath);
		$stt->bindParam(4, $_SERVER['REMOTE_ADDR']);
		try {
			$db5->beginTransaction();
			$stt->execute();
			$db5->commit();
		}
		catch (PDOException $exception){
			$db5->rollBack();
		}
		$stt = null;
	}
}else{
	exit(1);
}
?>
