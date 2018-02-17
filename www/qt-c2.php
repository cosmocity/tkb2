<?php
session_cache_limiter('none');
session_start();

require_once('SmartyConfig.php');

//ini_set( 'display_errors', 1 );

//ans配列セット
$a=$_SESSION['ans'];

//得点計算
$score=0.0;
$b[1] = ScoreCalc($a[1],[0,1]);
$b[2] = ScoreCalc($a[2],[0,1]);
$b[3] = ScoreCalc($a[3],[1,0]);
$b[4] = ScoreCalc($a[4],[1,0]);
$b[5] = ScoreCalc($a[5],[1,0]);
$b[6] = ScoreCalc($a[6],[0,1]);
$b[7] = ScoreCalc($a[7],[1,0]);
$b[8] = ScoreCalc($a[8],[0,1]);
$b[9] = ScoreCalc($a[9],[0,1]);
$b[10] = ScoreCalc($a[10],[0,0,1]);
$b[11] = ScoreCalc($a[11],[1,0,0]);
$b[12] = ScoreCalc($a[12],[0,1]);
$b[13] = ScoreCalc($a[13],[1,0]);
$b[14] = ScoreCalc($a[14],[0,1]);
$b[15] = ScoreCalc($a[15],[0,1]);
$b[16] = ScoreCalc($a[16],[1,0]);
$b[17] = ScoreCalc($a[17],[0,1]);
$b[18] = ScoreCalc($a[18],[0,1]);
$b[19] = ScoreCalc($a[19],[0,1]);
$b[20] = ScoreCalc($a[20],[1,0]);
$b[21] = ScoreCalc($a[21],[0,1]);
$b[22] = ScoreCalc($a[22],[1,0,0]);
$b[23] = ScoreCalc($a[23],[0,1,0]);
$b[24] = ScoreCalc($a[24],[1,0]);
$b[25] = ScoreCalc($a[25],[1,0]);
$b[26] = ScoreCalc($a[26],[1,0]);
$b[27] = ScoreCalc($a[27],[1,0]);
$b[28] = ScoreCalc($a[28],[1,0]);
$b[29] = ScoreCalc($a[29],[0,1]);
$b[30] = ScoreCalc($a[30],[1,0]);
$b[31] = ScoreCalc($a[31],[0,1]);
$b[32] = ScoreCalc($a[32],[1,0]);
$b[33] = ScoreCalc($a[33],[1,1,0]);
$b[34] = ScoreCalc($a[34],[0,0,1]);
$b[35] = ScoreCalc($a[35],[0,0,1]);
$b[36] = ScoreCalc($a[36],[0,0,1]);
$b[37] = ScoreCalc($a[37],[0,1]);
$b[38] = ScoreCalc($a[38],[0,1]);
$b[39] = ScoreCalc($a[39],[0,0,1,0]);
$b[40] = ScoreCalc($a[40],[0,1,0,0]);
$b[41] = ScoreCalc($a[41],[0,0,1,0]);
$b[42] = ScoreCalc($a[42],[0,1]);
$b[43] = ScoreCalc($a[43],[0,1,0,0]);
$b[44] = ScoreCalc($a[44],[0,1]);
$b[45] = ScoreCalc($a[45],[0,1]);
$b[46] = ScoreCalc($a[46],[1,0]);
$b[47] = ScoreCalc($a[47],[0,1]);
$b[48] = ScoreCalc($a[48],[0,1]);
$b[49] = ScoreCalc($a[49],[0,0,1]);
$b[50] = ScoreCalc($a[50],[0,0,1]);
$b[51] = ScoreCalc($a[51],[0,0,1]);
$b[52] = ScoreCalc($a[52],[1,0,0,0]);

$score = number_format(array_sum($b),1);

//得点セット(個別)
for( $i = 1; $i <= 52; ++$i ) {
    $c[$i]="[" . number_format($b[$i], 1) . "]";
}

//回答表示
$ans[1]=$c[1] . $ans_a_map[$a[1][1]] . $ans_a_map[$a[1][2]];
$ans[2]=$c[2] . $ans_a_map[$a[2][1]] . $ans_a_map[$a[2][2]];
$ans[3]=$c[3] . $ans_a_map[$a[3][1]] . $ans_a_map[$a[3][2]];
$ans[4]=$c[4] . $ans_a_map[$a[4][1]] . $ans_a_map[$a[4][2]];
$ans[5]=$c[5] . $ans_a_map[$a[5][1]] . $ans_a_map[$a[5][2]];
$ans[6]=$c[6] . $ans_a_map[$a[6][1]] . $ans_a_map[$a[6][2]];
$ans[7]=$c[7] . $ans_a_map[$a[7][1]] . $ans_a_map[$a[7][2]];
$ans[8]=$c[8] . $ans_a_map[$a[8][1]] . $ans_a_map[$a[8][2]];
$ans[9]=$c[9] . $ans_a_map[$a[9][1]] . $ans_a_map[$a[9][2]];
$ans[10]=$c[10] . $ans_a_map[$a[10][1]] . $ans_a_map[$a[10][2]] . $ans_a_map[$a[10][3]];
$ans[11]=$c[11] . $ans_a_map[$a[11][1]] . $ans_a_map[$a[11][2]] . $ans_a_map[$a[11][3]];
$ans[12]=$c[12] . $ans_a_map[$a[12][1]] . $ans_a_map[$a[12][2]];
$ans[13]=$c[13] . $ans_a_map[$a[13][1]] . $ans_a_map[$a[13][2]];
$ans[14]=$c[14] . $ans_a_map[$a[14][1]] . $ans_a_map[$a[14][2]];
$ans[15]=$c[15] . $ans_a_map[$a[15][1]] . $ans_a_map[$a[15][2]];
$ans[16]=$c[16] . $ans_a_map[$a[16][1]] . $ans_a_map[$a[16][2]];
$ans[17]=$c[17] . $ans_a_map[$a[17][1]] . $ans_a_map[$a[17][2]];
$ans[18]=$c[18] . $ans_a_map[$a[18][1]] . $ans_a_map[$a[18][2]];
$ans[19]=$c[19] . $ans_a_map[$a[19][1]] . $ans_a_map[$a[19][2]];
$ans[20]=$c[20] . $ans_a_map[$a[20][1]] . $ans_a_map[$a[20][2]];
$ans[21]=$c[21] . $ans_a_map[$a[21][1]] . $ans_a_map[$a[21][2]];
$ans[22]=$c[22] . $ans_a_map[$a[22][1]] . $ans_a_map[$a[22][2]] . $ans_a_map[$a[22][3]];
$ans[23]=$c[23] . $ans_a_map[$a[23][1]] . $ans_a_map[$a[23][2]] . $ans_a_map[$a[23][3]];
$ans[24]=$c[24] . $ans_a_map[$a[24][1]] . $ans_a_map[$a[24][2]];
$ans[25]=$c[25] . $ans_a_map[$a[25][1]] . $ans_a_map[$a[25][2]];
$ans[26]=$c[26] . $ans_a_map[$a[26][1]] . $ans_a_map[$a[26][2]];
$ans[27]=$c[27] . $ans_a_map[$a[27][1]] . $ans_a_map[$a[27][2]];
$ans[28]=$c[28] . $ans_a_map[$a[28][1]] . $ans_a_map[$a[28][2]];
$ans[29]=$c[29] . $ans_a_map[$a[29][1]] . $ans_a_map[$a[29][2]];
$ans[30]=$c[30] . $ans_a_map[$a[30][1]] . $ans_a_map[$a[30][2]];
$ans[31]=$c[31] . $ans_a_map[$a[31][1]] . $ans_a_map[$a[31][2]];
$ans[32]=$c[32] . $ans_a_map[$a[32][1]] . $ans_a_map[$a[32][2]];
$ans[33]=$c[33] . $ans_a_map[$a[33][1]] . $ans_a_map[$a[33][2]] . $ans_a_map[$a[33][3]];
$ans[34]=$c[34] . $ans_a_map[$a[34][1]] . $ans_a_map[$a[34][2]] . $ans_a_map[$a[34][3]];
$ans[35]=$c[35] . $ans_a_map[$a[35][1]] . $ans_a_map[$a[35][2]] . $ans_a_map[$a[35][3]];
$ans[36]=$c[36] . $ans_a_map[$a[36][1]] . $ans_a_map[$a[36][2]] . $ans_a_map[$a[36][3]];
$ans[37]=$c[37] . $ans_a_map[$a[37][1]] . $ans_a_map[$a[37][2]];
$ans[38]=$c[38] . $ans_a_map[$a[38][1]] . $ans_a_map[$a[38][2]];
$ans[39]=$c[39] . $ans_a_map[$a[39][1]] . $ans_a_map[$a[39][2]] . $ans_a_map[$a[39][3]]. $ans_a_map[$a[39][4]];
$ans[40]=$c[40] . $ans_a_map[$a[40][1]] . $ans_a_map[$a[40][2]] . $ans_a_map[$a[40][3]]. $ans_a_map[$a[40][4]];
$ans[41]=$c[41] . $ans_a_map[$a[41][1]] . $ans_a_map[$a[42][2]] . $ans_a_map[$a[41][3]]. $ans_a_map[$a[41][4]];
$ans[42]=$c[42] . $ans_a_map[$a[42][1]] . $ans_a_map[$a[42][2]];
$ans[43]=$c[43] . $ans_a_map[$a[43][1]] . $ans_a_map[$a[43][2]] . $ans_a_map[$a[43][3]]. $ans_a_map[$a[43][4]];
$ans[44]=$c[44] . $ans_a_map[$a[44][1]] . $ans_a_map[$a[44][2]];
$ans[45]=$c[45] . $ans_a_map[$a[45][1]] . $ans_a_map[$a[45][2]];
$ans[46]=$c[46] . $ans_a_map[$a[46][1]] . $ans_a_map[$a[46][2]];
$ans[47]=$c[47] . $ans_a_map[$a[47][1]] . $ans_a_map[$a[47][2]];
$ans[48]=$c[48] . $ans_a_map[$a[48][1]] . $ans_a_map[$a[48][2]];
$ans[49]=$c[49] . $ans_a_map[$a[49][1]] . $ans_a_map[$a[49][2]] . $ans_a_map[$a[49][3]];
$ans[50]=$c[50] . $ans_a_map[$a[50][1]] . $ans_a_map[$a[50][2]] . $ans_a_map[$a[50][3]];
$ans[51]=$c[51] . $ans_a_map[$a[51][1]] . $ans_a_map[$a[51][2]] . $ans_a_map[$a[51][3]];
$ans[52]=$c[52] . $ans_a_map[$a[52][1]] . $ans_a_map[$a[52][2]] . $ans_a_map[$a[52][3]] . $ans_a_map[$a[52][4]];

//最後の配列に日時セット
$_SESSION['ans'][53][1]=date ( 'Y/m/d H:i:s', time() );

//csvフォーマット作成
$result = '';
$ar = array();
//1次繰り返し
foreach($_SESSION['ans'] as $row){
    //2次繰り返し
    foreach($row as $data){
        array_push($ar,$data);
        //echo $data;
        //echo "<br>";
    }
}
//$result = implode(",", $ar);
//print $result;

//csvファイル作成
$filename = "/var/www/vhosts/cosmocity.net/quest16/csv/quest_01_" . date("Ym") . ".log";

if (!$handle = fopen($filename, 'a')) {
	$err_msg .= 'Cannot open file ($filename)' . "\n";
	$err_msg .= $result->getMessage(). "\n";
	$err_flg = 1;
} else {
//	flock($file, LOCK_EX);
	if (fputcsv($handle, $ar) === FALSE) {
//	if (fwrite($handle, $data . "\n") === FALSE) {
		$err_msg .= 'Cannot write to file ($filename)' . "\n";
		$err_msg .= $result->getMessage(). "\n";
		$err_flg = 1;
	}
//	flock($file, LOCK_UN);	
	fclose($handle);
}

// 追加するHTMLフォーム
$nextpage = "/";
$progress = "結果表示";
$message = "得点 " . $score . " 点" ;

// テンプレート変数の割り当て
$smarty->assign("nextpage", $nextpage);
$smarty->assign("progress", $progress);
$smarty->assign("message", $message);
$smarty->assign("ans", $ans);

// テンプレートを表示
$smarty->display("ans1.tpl");

?>