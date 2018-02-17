<?php
define('EUC', 'EUC');
define('SJIS', 'SJIS');
define('K', 'K');
define('A', 'A');
define('n', 'n');
define('a', 'a');

function i18n_convert($str, $to_encoding, $from_encoding  = null)
{
    if (is_null($from_encoding)) {
        return mb_convert_encoding($str, $to_encoding, "SJIS");
    } else {
        return mb_convert_encoding($str, $to_encoding, $from_encoding);
    }
}


function i18n_ja_jp_hantozen($str, $option, $encoding = null)
{
    if (is_null($encoding)) {
        return mb_convert_kana($str, $option, "SJIS");
    } else {
        return mb_convert_kana($str, $option, $encoding);
    }
}

?>