<?php
ini_set( 'display_errors', 1 );
session_cache_limiter('none');

session_start();

if( isset($_SESSION) ) {
    unset($_SESSION['rate']);
}

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

//回答データベース
$firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);
//ユニークキーカウントアップ
$unikey = $firebaseLog->get("/config/unikey");
$_SESSION['unikey'] = $unikey + 1;
$firebaseLog->set("/config/unikey",$_SESSION['unikey']);

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);

//問題の種別(メニューから選択)
if (isset($_GET['menu'])) {
    $_SESSION['qt-syurui'] =$_GET['menu'];
    $_SESSION['qtkey'] = sprintf("/qt%'.02d/", $_SESSION['qt-syurui']);
}

// 読み込み(最初の設定)
//$json = $firebase->get("/qt01" , array('orderBy' => '"questno"' , 'equalTo' => '"0150"'));
$json = $firebase->get($_SESSION['qtkey'] ."/0");
$jarr = json_decode( $json );

//初期化
$_SESSION['asum']=0;
$day = new DateTime();
$strtime=$day->format('H:i:s');
$_SESSION['stime']=$strtime;

//問題番号(開始=0)
$_SESSION['qt-no']=0;
//問題番号(MAX)
$_SESSION['qt-maxno']=$jarr->maxno;
//学籍番号(任意)
$_SESSION['qt-gakuseki']="";

//出題終了フラグ
$_SESSION['qt-end']=0;

// エラーメッセージ初期化
$errflg=0;
$errmsg1 = "";
$errmsg2 = "";
$gakuseki = "";

// 次へ、を押した場合
// 初めてのアクセスでは認証は行わずエラーメッセージは表示しない
if (isset($_POST["action"])) {
    // メニューに戻る、を押した場合
    if ($_POST['action'] == "back") {
        $login_url = "https://tkbj2.cosmocity.net/";
        header("Location: {$login_url}");
        exit;
    }
    if ($_POST["gakuseki"]=="") {
        $errmsg1 = "学籍番号が未入力です。";        
        $errflg=1;
    }
    if ($_POST["pass"]=="") {
        $errmsg2 = "パスワードが未入力です。";        
        $errflg=1;
    }

    if ($errflg==0){
        if ($_POST['action'] == "next") {
            if ($_POST["pass"] == "tsukuba") {
                $_SESSION["qt-gakuseki"] = $_POST["gakuseki"];
                $login_url = "https://tkbj2.cosmocity.net/qt-b.php";
                //$login_url = "qt-b.php";//デバッグ用
                header("Location: {$login_url}");
                exit;
            } else {
                $errmsg2 = "パスワードが違います。";        
                $errflg=1;
            }
        }
    }
}

// 追加するHTMLフォーム
$nextpage = "qt-a.php";
// テンプレート変数の割り当て
if (isset($_POST["next"])) $gakuseki=$_POST["gakuseki"];
$smarty->assign("syurui", $qt_a_map[$_SESSION['qt-syurui']]);
$smarty->assign("gakuseki", $gakuseki);
$smarty->assign("nextpage", $nextpage);
$smarty->assign("errmsg1", $errmsg1);
$smarty->assign("errmsg2", $errmsg2);
// テンプレートを表示
$smarty->display("que0-1.tpl");
?>