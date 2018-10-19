<?php

//ini_set('display_errors', 1);
session_cache_limiter('none');
session_start();

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

// 番号未入力なら、エラーとして、メニューに戻る。
if (isset($_GET['menu'])) {
    $qtno=$_GET['menu'];
} else {
    //$login_url = "https://tkbj.cosmocity.net/qt-err.html";
    $login_url = "qt-err.html";
    header("Location: {$login_url}");
    exit;
}

switch ($qtno){
        case 'qt01':$qtno2='1A';break;
        case 'qt02':$qtno2='1B';break;
        case 'qt03':$qtno2='2A';break;
        case 'qt04':$qtno2='2B';break;
        case 'qt05':$qtno2='3A';break;
        case 'qt06':$qtno2='3B';break;
        case 'qt07':$qtno2='4A';break;
        case 'qt08':$qtno2='4B';break;
        case 'qt09':$qtno2='5A';break;
        case 'qt10':$qtno2='5B';break;
        case 'qt11':$qtno2='6A';break;
        case 'qt12':$qtno2='6B';break;
        case 'qt13':$qtno2='7A';break;
        case 'qt14':$qtno2='7B';break;
        case 'qt15':$qtno2='8A';break;
        case 'qt16':$qtno2='8B';break;
        case 'qt17':$qtno2='9A';break;
        case 'qt18':$qtno2='9B';break;
        case 'qt19':$qtno2='10A';break;
        case 'qt20':$qtno2='10B';break;
        case 'qt21':$qtno2='11A';break;
        case 'qt22':$qtno2='11B';break;
        case 'qt23':$qtno2='12A';break;
        case 'qt24':$qtno2='12B';break;
        case 'qt25':$qtno2='13A';break;
        case 'qt26':$qtno2='13B';break;
        case 'qt27':$qtno2='14A';break;
        case 'qt28':$qtno2='14B';break;
        case 'qt55':$qtno2='55';break;
    }
    
//回答データベース
$firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);

$reckey1 = sprintf("/%s", $qtno);
$json1 = $firebaseLog->get($reckey1);
$jarr1 = json_decode($json1,true);
//$jarr1s = obj2arr($jarr1);

//配列個数
$cntmax=count($jarr1);
$jarr1keys= array_keys($jarr1);
$csv_data ="";

//配列初期化
for($i = 0; $i < $cntmax; $i++){
    $firstkey= $jarr1keys[$i];
    
    $strcsv="";
    
    $jarr1sub=$jarr1[$firstkey];
    foreach ( $jarr1sub as $key=>$val)
    {
        $strcsv .= $firstkey . ',"'. $key . '",';
        foreach ( $val as $key2=>$val2)
        {
            //echo $key2;
            //echo $val2;
            $strcsv .= implode(",", $val2) . ",";
        }
        if (substr($strcsv, -1)) {
            if (substr($strcsv, -1)==",") {
                $strcsv = rtrim($strcsv, ',');
            }
        }
        $csv_data .= $strcsv . "\n";
    }
}

//出力ファイル名の作成
$csv_file = $qtno2 . "_" . date ( "Ymd" ) .'.csv';
 
//文字化けを防ぐ
$csv_data = mb_convert_encoding ( $csv_data , "sjis-win" , 'utf-8' );
     
//MIMEタイプの設定
header("Content-Type: application/octet-stream");
//名前を付けて保存のダイアログボックスのファイル名の初期値
header("Content-Disposition: attachment; filename={$csv_file}");
 
// データの出力
echo($csv_data);
exit();
?>