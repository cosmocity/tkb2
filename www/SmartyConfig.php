<?php
require_once('../smarty/Smarty.class.php');

$homepath="/home/bgwpxwek/public_html/tkbj2.cosmocity.net";
//$homepath="..";//デバッグ用

$smarty = new Smarty();

$smarty->template_dir = $homepath . '/templates/';
$smarty->compile_dir  = $homepath . '/templates_c/';
$smarty->config_dir   = $homepath . '/configs/';
$smarty->cache_dir    = $homepath . '/cache/';

require_once("$homepath/configs/nullcheck.inc");
require_once("$homepath/configs/common.inc");
require_once("$homepath/configs/scorecalc.php");
?>