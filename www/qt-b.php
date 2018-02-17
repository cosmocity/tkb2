<?php
ini_set( 'display_errors', 1 );
session_cache_limiter('none');
session_start();

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

$err_flg = 0;
$err_msg='';

// 学籍番号未入力なら、エラーとして、メニューに戻る。(セッション対策用)
if (strlen($_SESSION['qt-gakuseki'])==0) {
    $login_url = "https://tkbj2.cosmocity.net/qt-err.html";
    header("Location: {$login_url}");
    exit;
}

if (isset($_POST['action'])){
    $qn=$_SESSION['qt-no'];
    $as=$_SESSION['asum'];
    $af=$_SESSION['af'];

    $wkans=array(); //実際に回答したもの入れる配列(セッションは回答数がまちまちになるので)
    
    if ($as>=2){
        $wkans[0]=1;
        $wkans[1]=1;
        if (!isset($_POST['que1'][0])){
            $wkans[0]=0;
        } 
        if (!isset($_POST['que1'][1])){
            $wkans[1]=0;
        }
    }
    if ($as>=3){
        $wkans[2]=1;
        if (!isset($_POST['que1'][2])){
            $wkans[2]=0;
        }
    }
    if ($as>=4){
        $wkans[3]=1;
        if (!isset($_POST['que1'][3])){
            $wkans[3]=0;
        }
    }
    if ($as>=5){
        $wkans[4]=1;
        if (!isset($_POST['que1'][4])){
            $wkans[4]=0;
        }
    }
    if ($as>=6){
        $wkans[5]=1;
        if (!isset($_POST['que1'][5])){
            $wkans[5]=0;
        } 
    }

    //各回答結果の保存
    $qtno=intval($_SESSION['qt-no']-1);
    
    $firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);

    $reckey = sprintf("/qt%02d/%d/%s/%d", $_SESSION['qt-syurui'],$_SESSION['unikey'],$_SESSION['qt-gakuseki'],$qtno);

    $firebaseLog->set($reckey,$wkans);
    
    //echo var_dump($wkans);
    
    //各正答率の保存
    $reckey3 = sprintf("/qt%02d/%d/%s/rate/%d", $_SESSION['qt-syurui'],$_SESSION['unikey'],$_SESSION['qt-gakuseki'],$qtno);

    $recdata3=number_format(ScoreCalc($wkans,$af,$as),2);
    $firebaseLog->set($reckey3,$recdata3);

    $_SESSION['rate'][$qn]=$recdata3;//正答率もセッションに置く
}

// 設問数に達していれば集計へ
if ($_SESSION['qt-end']==1) {
    $login_url = "https://tkbj2.cosmocity.net/qt-c.php";
    //$login_url = "qt-c.php";//デバッグ用
    header("Location: {$login_url}");
    exit;
}

//問題データベース
$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);
// 読み込み
$questno = $_SESSION['qtkey'] . ($_SESSION['qt-no']);
$json = $firebase->get($questno);
$jarr = json_decode( $json );

//echo $_SESSION['qt-no'] . "-" . $jarr->ptn2 . "-" . $jarr->asum;

//現在位置と最終位置をセッションに置く
$_SESSION['qt-no'] = $jarr->no2;
$_SESSION['qt-maxno'] = $jarr->maxno;

// 設問数に達していれば終了フラグ立てる
if ($_SESSION['qt-no']>=$_SESSION['qt-maxno']) $_SESSION['qt-end']=1;

// 追加するHTMLフォーム
$nextpage = "qt-b.php";
$progress = $jarr->no2 . " 問目 (全" . $jarr->maxno . "問)";

$se = $jarr->sentence;
$se1 = $jarr->sentence1;
$se2 = $jarr->sentence2;
$se3 = $jarr->sentence3;
$se4 = $jarr->sentence4;

$quest1 = '<p class="bg-info">' . $se . '</p>';
if ($jarr->no5 == 2 ){
    if ($jarr->brno == 1 ){
        $quest1  = '<p class="bg-info">' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
    } else {
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se2 . '</p>';
    }
}
if ($jarr->no5 == 3 ){
    if ($jarr->brno == 1 ){
        $quest1  = '<p class="bg-info"><span class="glyphicon glyphicon-menu-right"></span>' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
        $quest1 .= '<p class="text-info">' . $se3 . '</p>';
    } elseif ($jarr->brno == 2 ){
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se2 . '</p>';
        $quest1 .= '<p class="text-info">' . $se3 . '</p>';
    } else {
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se3 . '</p>';
    }
}
if ($jarr->no5 == 4 ){
    if ($jarr->brno == 1 ){
        $quest1  = '<p class="bg-info">' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
        $quest1 .= '<p class="text-info">' . $se3 . '</p>';
        $quest1 .= '<p class="text-info">' . $se4 . '</p>';
    } elseif ($jarr->brno == 2 ){
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se2 . '</p>';
        $quest1 .= '<p class="text-info">' . $se3 . '</p>';
        $quest1 .= '<p class="text-info">' . $se4 . '</p>';
    } elseif ($jarr->brno == 3 ){
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se3 . '</p>';
        $quest1 .= '<p class="text-info">' . $se4 . '</p>';
    } else {
        $quest1  = '<p class="text-info">' . $se1 . '</p>';
        $quest1 .= '<p class="text-info">' . $se2 . '</p>';
        $quest1 .= '<p class="text-info">' . $se3 . '</p>';
        $quest1 .= '<p class="bg-info">' . $se4 . '</p>';
    }
}
    
//ポイント
$po1 = $jarr->po1;
$pimg1 = $jarr->pimg1;
// *.png が含まれていれば画像を挿入。
if (strpos($pimg1,'.png') !== false) {
    $po1 = '<img src="/img/' . $pimg1 .'" class="img-responsive">' . '<hr />' . $po1;
}

//回答の仕方
$message = $jarr->ptn1;
//選択回答か複数回答か(0=複数回答/1=１つのみ/2=２つのみ/3=３つのみ)
$ptn2 = $jarr->ptn2;
//回答の数
$asum = $jarr->asum;
$_SESSION['asum']=$asum; //セッションにも置く

//各回答
$qt1[0] = $jarr->ans1;
$qt1[1] = $jarr->ans2;
$qt1[2] = $jarr->ans3;
$qt1[3] = $jarr->ans4;
$qt1[4] = $jarr->ans5;
$qt1[5] = $jarr->ans6;

//各正答
$_SESSION['af'][0] = $jarr->af1;
$_SESSION['af'][1] = $jarr->af2;
$_SESSION['af'][2] = $jarr->af3;
$_SESSION['af'][3] = $jarr->af4;
$_SESSION['af'][4] = $jarr->af5;
$_SESSION['af'][5] = $jarr->af6;

$img1cnt = 0;
$img2cnt = 0;
if (strlen($jarr->img1)) {
    $img1[0] = "/img/" . $jarr->img1;
    $img1cnt = 1;
}
if (strlen($jarr->img2)) {
    $img1[1] = "/img/" . $jarr->img2;
    $img2cnt = 1;
}
if (strlen($jarr->img3)) $img1[2] = "/img/" . $jarr->img3;
if (strlen($jarr->img4)) $img1[3] = "/img/" . $jarr->img4;
if (strlen($jarr->img5)) $img1[4] = "/img/" . $jarr->img5;
if (strlen($jarr->img6)) $img1[5] = "/img/" . $jarr->img6;

// テンプレート変数の割り当て
if ($ptn2==1){ //1つのみ選択可
    $smarty->assign("quescript", $quescript_hissu_1);
} elseif ($ptn2==2){ //2つのみ選択可
    $smarty->assign("quescript", $quescript_hissu_2);
} elseif  ($ptn2==3){ //3つのみ選択可
    $smarty->assign("quescript", $quescript_hissu_3);
} else { //複数選択可
    $smarty->assign("quescript", $quescript);
}

$smarty->assign("syurui", $qt_a_map[$_SESSION['qt-syurui']]);
$smarty->assign("nextpage", $nextpage);
$smarty->assign("progress", $progress);
$smarty->assign("quest1", $quest1);
$smarty->assign("po1", $po1);
$smarty->assign("message", $message);
$smarty->assign("qt1", $qt1);
if ($img1cnt==1){
    $smarty->assign("img1", $img1);
}

// テンプレートを表示
if ($asum==2){
    if ($img1cnt==1){
        if ($img2cnt==0){
            $smarty->display("que1-2-img-one.tpl");  //画像 1個のみ
        } else {
            $smarty->display("que1-2-img.tpl");  //画像 2個(通常版)
        }
    } else {
        $smarty->display("que1-2.tpl");  //画像なし
    }
} elseif ($asum==3){
    if ($img1cnt==1){
        $smarty->display("que1-3-img.tpl");  //画像あり
    } else {
        $smarty->display("que1-3.tpl");  //画像なし
    }
} elseif ($asum==4){
    if ($img1cnt==1){
        $smarty->display("que1-4-img.tpl");  //画像あり
    } else {
        $smarty->display("que1-4.tpl");  //画像なし
    }
} elseif ($asum==5){
    $smarty->display("que1-5.tpl");
} else {
    $smarty->display("que1-6.tpl");
}

?>