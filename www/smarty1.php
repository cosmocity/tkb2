<?php

// Smarty.classの呼び出し
require_once('SmartyConfig.php');

// ↓ このようにドキュメントルートからの指定でもいい
// require_once ($_SERVER['DOCUMENT_ROOT']."/Smarty/Smarty.class.php");

// 追加するHTMLフォーム
$scalar = "Hello Smarty.";
$sex["m"] = "men";
$sex["f"] = "women";

// テンプレート変数の割り当て
$smarty->assign("scalar", $scalar);
$smarty->assign("sex", $sex);

// テンプレートを表示
$smarty->display("smarty1.tpl");

?>