<?php
//ini_set( 'display_errors', 1 );
// 点数計算
// 100点満点の正答率を返す。
function ScoreCalc($ar1,$ar2,$cnt)
{
	$sc=0.0;
    //$cnt=0;
	if (isset($ar1)) {
        //$cnt=count($ar1);
        
        $i=0;
        while($i<$cnt){
//            echo $ar1[$i+1] . "-".$ar2[$i];
// 一時変更            if ($ar1[$i+1]==$ar2[$i]){
            if ($ar1[$i]==$ar2[$i]){                
                $sc += (100 / $cnt);
//                echo "[" . (1.0 / $cnt) . "]";
            }
//            echo " / ";
            $i++;
        }
    }
    //$sc = intval(($sc*100)/100);
    //$sc = intval($sc);
	return $sc;
}

// フラグを記号にして返す
function flg2kigou($ar1,$cnt)
{
	$rtn="";
	if (isset($ar1)) {
        $i=0;
        while($i<$cnt){
            $rtn .= '【' . ($i + 1) . '】';
            if ($ar1[$i]==1){                
                $rtn .= "〇";
            } else {
                $rtn .= "×";
            }
            $i++;
        }
    }
	return $rtn;
}

function flg2kigou2($ar1)
{
	$rtn="";
    $cnt=count($ar1);
	if (isset($ar1)) {
        $i=0;
        while($i<$cnt){
            $rtn .= '【' . ($i + 1) . '】';
            if ($ar1[$i]==1){                
                $rtn .= "〇";
            } else {
                $rtn .= "×";
            }
            $i++;
        }
    }
	return $rtn;
}
// 選択肢を並べて返す
function flg2kigou3($ar1,$cnt)
{
	$rtn="";
	if (isset($ar1)) {
        $i=0;
        while($i<$cnt){
            $j=$i+1;
            $rtn .= '【' . $j . '】' . $ar1[$i];
            $i++;
        }
    }
	return $rtn;
}

// 選択肢を並べて返す(画像)
function flg2kigou4($ar1)
{
	$rtn="";
	if (isset($ar1)) {
        $i=0;
        while($i<6){
            if (strlen($ar1[$i])==0) break;
            if ($i==0 && strlen($ar1[$i])) $rtn .= '<br />';
            $j=$i+1;
            $rtn .= '【' . $j . '】<img src="/img/' . $ar1[$i] . '" height="100">';
            $i++;
        }
    }
	return $rtn;
}

// 回答率を並べて返す
function flg2kigou5($ar1,$cnt)
{
	$rtn="";
	if (isset($ar1)) {
        $i=0;
        while($i<$cnt){
            $j=$i+1;
            $rtn .= '【' . $j . '】' . $ar1[$i] * 100 . '% ';
            $i++;
        }
    }
	return $rtn;
}

?>
