<?php
ini_set( 'display_errors', 1 );
session_cache_limiter('none');
session_start();

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

//回答データベース
$firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);

$reckey2 = sprintf("/%s/qt%02d/%s", $_SESSION['qt-gakuseki'],$_SESSION['qt-syurui'],$_SESSION['unikey']);

//回答結果(2)の保存
$ratesum = array_sum($_SESSION['rate']);

//echo "ratesum=" . $ratesum;
//echo "<br /> max=" . $_SESSION['qt-maxno'];

if ($_SESSION['qt-maxno']==0){
    $mark = 0;
} else {
    $mark = number_format(($ratesum / $_SESSION['qt-maxno']),1);//全体平均点の算出
}

$day = new DateTime();
$strday=$day->format('Y/m/d');
$strtime=$day->format('H:i:s');
$recdata2 = array(
    "mark" => $mark,
    "date" => $strday,
    "stime" => $_SESSION['stime'],
    "etime" => $strtime
);
$firebaseLog->set($reckey2,$recdata2);

$reckey3 = sprintf("/qt%02d/%d/%s/rate", $_SESSION['qt-syurui'],$_SESSION['unikey'],$_SESSION['qt-gakuseki']);
$json3 = $firebaseLog->get($reckey3);
$jarr3 = json_decode( $json3 );

$reckey4 = sprintf("/qt%02d/%d/%s", $_SESSION['qt-syurui'],$_SESSION['unikey'],$_SESSION['qt-gakuseki']);
$json4 = $firebaseLog->get($reckey4);
$jarr4 = json_decode( $json4 );

//問題データベース
$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);
$json = $firebase->get($_SESSION['qtkey']);
$jarr = json_decode( $json );

//配列初期化
$ar0 = array();
$ar1 = array();
$ar3 = array();
$img = array();
$data2 = array();

for($i = 0; $i < $_SESSION['qt-maxno']; $i++){
    //選択肢
    $ar0[0]=$jarr[$i]->ans1;
    $ar0[1]=$jarr[$i]->ans2;
    $ar0[2]=$jarr[$i]->ans3;
    $ar0[3]=$jarr[$i]->ans4;
    $ar0[4]=$jarr[$i]->ans5;
    $ar0[5]=$jarr[$i]->ans6;
    //正答
    $ar1[0]=$jarr[$i]->af1;
    $ar1[1]=$jarr[$i]->af2;
    $ar1[2]=$jarr[$i]->af3;
    $ar1[3]=$jarr[$i]->af4;
    $ar1[4]=$jarr[$i]->af5;
    $ar1[5]=$jarr[$i]->af6;
    //回答率
    $ar3[0]=$jarr[$i]->rate1;
    $ar3[1]=$jarr[$i]->rate2;
    $ar3[2]=$jarr[$i]->rate3;
    $ar3[3]=$jarr[$i]->rate4;
    $ar3[4]=$jarr[$i]->rate5;
    $ar3[5]=$jarr[$i]->rate6;
    //画像
    $img[0]=$jarr[$i]->img1;
    $img[1]=$jarr[$i]->img2;
    $img[2]=$jarr[$i]->img3;
    $img[3]=$jarr[$i]->img4;
    $img[4]=$jarr[$i]->img5;
    $img[5]=$jarr[$i]->img6;
    //ポイント
    $po1 = $jarr[$i]->po1;
    $pimg1 = $jarr[$i]->pimg1;
    // *.png が含まれていれば画像を挿入。
    if (strpos($pimg1,'.png') !== false) {
        $po1 = '<img src="/img/' . $pimg1 .'" class="img-responsive">' . '<hr />' . $po1;
    }
    
    $asum1=$jarr[$i]->asum;

    $ar2=$jarr4->{$i};
    
    $data2[$i][0] = $jarr[$i]->no2;
    $data2[$i][1] = intval($jarr3[$i]) . "%" . " (" . $jarr[$i]->avg * 100 . "%)";
    $data2[$i][2] = $jarr[$i]->sentence . "(" . $jarr[$i]->ptn1 . ")";
    $data2[$i][3] = "選択肢 : " . flg2kigou3($ar0,$asum1);
    if (strlen($img[0])){
        $data2[$i][3] .= flg2kigou4($img);
    }
    $data2[$i][4] = "正解 : " . flg2kigou($ar1,$asum1);
    $data2[$i][5] = "回答 : " . flg2kigou2($ar2);
    $data2[$i][6] = "過去の選択率 : " . flg2kigou5($ar3,$asum1);
    $data2[$i][7] = $po1 ;
}

$exp = "　問題の「選択肢」が「【1】で【2】に【3】を」で、「正解」が「【1】〇【2】〇【3】×」、「回答」が「【1】〇【2】×【3】〇」、「選択率」が「【1】98%【2】72%【3】17%」であれば、「で」と「に」が正解で、あなたの回答は「で・を」であったという意味です。そして、過去のある年度の筑波技術大学聴覚障害学生において、「で」「に」「を」をクリックした比率がそれぞれ98%、72%、17%という意味です。すなわち、答えではない「を」をクリックした者が17%という意味なので、83%の学生は「を」をクリックせず、正答したことになります。";
$exp = $exp . "<br />　そして、各選択肢で「選択すべきか否か」が適切であった比率が正答率になります。この回答の場合は、「で」の選択肢のみ「選択すべきか否か」が適切であったので、正答率は３分の１すなわち33％になります。また、「問〇」のすぐ横に「33％（56％）」とあれば、それは、「あなたの正答率は33％で、ある年度の筑波技術大学聴覚障害学生の平均正答率は56％」を意味します。なお、「33%（0%）」のように「(0%)」となっている場合は、新規追加の問題なので、聴覚障害学生のデータがない意味とお考えください。";
$exp = $exp . "<br />　過去の選択率について、ペーパーで実施したので、白紙回答や指示に従わない回答が若干含まれています。また、答えの範囲が「５：１」に分かれた問題について、その「１」の意見を「Ｂさん：答えは『で』のみ」のように付記しています。";

// 追加するHTMLフォーム
$nextpage = "qt-d.php";
$smarty->assign("nextpage", $nextpage);

$smarty->assign("syurui", $qt_a_map[$_SESSION['qt-syurui']]);
$smarty->assign("gakuseki", "学籍番号 " . $_SESSION['qt-gakuseki']);
$smarty->assign("sdate", "回答日 : " . $strday);
$smarty->assign("stime", "開始 : " . $_SESSION['stime']);
$smarty->assign("etime", "終了 : " . $strtime);
$smarty->assign("serial", "serial." . $_SESSION['unikey']);
$smarty->assign("rate", $mark . " ％");
$smarty->assign("exp", $exp);
$smarty->assign('data2',$data2); 

$smarty->display("ans1.tpl");
?>