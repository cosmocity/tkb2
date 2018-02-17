<?php
ini_set( 'display_errors', 1 );
session_cache_limiter('none');

session_start();

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

//回答データベース
$firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);

// エラーメッセージ初期化
$errflg=0;
$errmsg1 = "<br />";
$errmsg2 = "<br />";
$gakuseki = "";
$password = "";

// 次へ、を押した場合
// 初めてのアクセスでは認証は行わずエラーメッセージは表示しない
if (isset($_POST["action"])) {
    // メニューに戻る、を押した場合
    if ($_POST['action'] == "back") {
        $login_url = "https://tkbj2.cosmocity.net/";
        //$login_url = "http://tkbj2.localhost/"; //デバッグ用
        header("Location: {$login_url}");
        exit;
    }
    if ($_POST["gakuseki"]=="") {
        $errmsg1 = "学籍番号が未入力です。";        
        $errflg=1;
    }else{
        $gakuseki = $_POST["gakuseki"];
    }
    if ($_POST["pass"]=="") {
        $errmsg2 = "パスワードが未入力です。";        
        $errflg=1;
    }else{
        $password = $_POST["pass"];
    }

    if ($errflg==0){
        if ($_POST['action'] == "next") {
            // 読み込み(最初の設定)
            $json = $firebaseLog->get($_POST['gakuseki'] ."/");

            if ($json == "null") {
                $errmsg1 = "この学籍番号は回答履歴がありません。";        
                $errflg=1;
            }
            
            if ($_POST["pass"] != "tsukuba") {
                $errmsg2 = "パスワードが違います。";        
                $errflg=1;
            }
            
            if ($errflg == 0){
                $_SESSION['ls-gakuseki'] = $_POST['gakuseki']; //セッションに置く
                $login_url = "https://tkbj2.cosmocity.net/list2.php";
                //$login_url = "list2.php";//デバッグ用
                header("Location: {$login_url}");
                exit;
            }
        }
    }
}

// 追加するHTMLフォーム
$nextpage = "list1.php";
// テンプレート変数の割り当て
$smarty->assign("gakuseki", $gakuseki);
$smarty->assign("password", $password);
$smarty->assign("nextpage", $nextpage);
$smarty->assign("errmsg1", $errmsg1);
$smarty->assign("errmsg2", $errmsg2);
// テンプレートを表示
$smarty->display("list1.tpl");
?>