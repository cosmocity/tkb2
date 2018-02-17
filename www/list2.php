<?php
//ini_set( 'display_errors', 1 );
session_cache_limiter('none');
session_start();

require_once('SmartyConfig.php');

require_once("vendor/autoload.php");

//回答データベース
$firebaseLog = new \Firebase\FirebaseLib(SECOND_URL,SECOND_TOKEN);

$json = $firebaseLog->get($_SESSION['ls-gakuseki']);
$jarr = json_decode( $json );
$jarr2 = obj2arr($jarr);

//配列初期化
$data = array();

//配列個数
$cntmax=count($jarr2);
$jarr2keys= array_keys($jarr2);

$j=0;

for($i = 0; $i < $cntmax; $i++){
    $firstkey= $jarr2keys[$i];
    
    $jarr2sub=$jarr2[$firstkey];
    foreach ( $jarr2sub as $key=>$val)
    {
        $data[$j][0] = $firstkey;
        $data[$j][1] = "";
        switch ($firstkey){
            case 'qt01':$data[$j][1]='1A';break;
            case 'qt02':$data[$j][1]='1B';break;
            case 'qt03':$data[$j][1]='2A';break;
            case 'qt04':$data[$j][1]='2B';break;
            case 'qt05':$data[$j][1]='3A';break;
            case 'qt06':$data[$j][1]='3B';break;
            case 'qt07':$data[$j][1]='4A';break;
            case 'qt08':$data[$j][1]='4B';break;
            case 'qt09':$data[$j][1]='5A';break;
            case 'qt10':$data[$j][1]='5B';break;
            case 'qt11':$data[$j][1]='6A';break;
            case 'qt12':$data[$j][1]='6B';break;
            case 'qt13':$data[$j][1]='7A';break;
            case 'qt14':$data[$j][1]='7B';break;
            case 'qt15':$data[$j][1]='8A';break;
            case 'qt16':$data[$j][1]='8B';break;
            case 'qt17':$data[$j][1]='9A';break;
            case 'qt18':$data[$j][1]='9B';break;
            case 'qt19':$data[$j][1]='10A';break;
            case 'qt20':$data[$j][1]='10B';break;
            case 'qt21':$data[$j][1]='11A';break;
            case 'qt22':$data[$j][1]='11B';break;
            case 'qt23':$data[$j][1]='12A';break;
            case 'qt24':$data[$j][1]='12B';break;
            case 'qt25':$data[$j][1]='13A';break;
            case 'qt26':$data[$j][1]='13B';break;
            case 'qt27':$data[$j][1]='14A';break;
            case 'qt28':$data[$j][1]='14B';break;
            case 'qt55':$data[$j][1]='55';break;
        }

        $data[$j][2] = $key;
        $data[$j][3] = "";
        $data[$j][4] = "";
        $data[$j][5] = "";
        $data[$j][6] = "";

        foreach ( $val as $key2=>$val2)
        {
            if ($key2=='mark') $data[$j][3] = $val2;
            if ($key2=='date') $data[$j][4] = $val2;
            if ($key2=='stime') $data[$j][5] = $val2;
            if ($key2=='etime') $data[$j][6] = $val2;
        }
        $j++;    
    }
}

// 追加するHTMLフォーム
$nextpage = "list3.php";
$smarty->assign("nextpage", $nextpage);

$smarty->assign("gakuseki", $_SESSION['ls-gakuseki']);
$smarty->assign('data',$data); 

$smarty->display("list2.tpl");
?>