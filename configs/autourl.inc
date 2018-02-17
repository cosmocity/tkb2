<?php
//url文を自動的にリンク変換する
function auto_url($str){
    preg_match_all("/(http:\/\/[\w\/\@\$()!?&%#:;.,~'=*+-]+)/i",strip_tags($str), $array_url);
    for($i=0;$i<count($array_url[1]);++$i){
        $linkhtml="<a href=\"$array_url[1][$i]\">$array_url[1][$i]</a>";
        $str=str_replace($array_url[1][$i],"<a href=\"".$array_url[1][$i]."\">".$array_url[1][$i]."</a>",$str);
    }
    return $str;
}
?>
