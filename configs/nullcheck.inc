<?php
//  数字でない or '' の時は0に変換する
function NullZero($su)
{
  if (!isset($su)) $su=0;
  if ($su=='') $su=0;
  if (!is_numeric($su)) $su=0;
  return $su;
}

//  Null or '' の時は NULL に変換する
function NullDate($hi)
{
  if ((!isset($hi)) or ($hi=='')) {
    $hi="NULL";
  } else {
    $hi="'" . $hi . "'";
  }
  return $hi;
}

//  Null or '' の時は Nullそのもの に変換する
function NullDate2($hi)
{
  if ((!isset($hi)) or ($hi=='')) {
    $hi=Null;
  }
  return $hi;
}

//  Null or '' の時は NULL に変換する
function NullStr($moji)
{
  if ((!isset($moji)) or ($moji=='')) {
    $moji="NULL";
  } else {
    $moji="'" . $moji . "'";
  }
  return $moji;
}

//  Nullの時は、'&nbsp;'に変換する
function NullSp($str)
{
  if (!isset($str)) $str='&nbsp;';
  if ($str=='') $str='&nbsp;';
  return $str;
}
?>
