<?php

/*DB関係はMySmarty.class.phpとapp.confを書き換えてください*/

  $cookie_name = "tsukuba";

  $info_mail = "infodesk@cosmocity.net";
  $info_cc_mail   = "tsuyoshi@cosmocity.net";
//  $customer_mail  = "tsuyoshi@cosmocity.net";


/*ニフティMobileBackEnd*/
$appkey = '3f9d0a8f802ac1fd167e70ebaf7d8a990567e71f8506e0aa6ea2e9a401cbd9b3';
$clientkey = 'ce3637439c54947c046c410dbdfaf662fa4793068410563edae882b2dce1473f';

/*Firebase*/
define("DEFAULT_URL","https://tkbj2-e22a1.firebaseio.com");
define("DEFAULT_TOKEN","2owM5swFXncbfHJ7fanFZN6w89duQtYqnfNPZQ6c");

/*Firebase-Log*/
define("SECOND_URL","https://tkbj2log.firebaseio.com/");
define("SECOND_TOKEN","bDPaw3Qkqd8dEuL3Rw4532OuE0Ktuo2Igh9QJgLP");

$tsukuba_mail_header_1 = <<<_EOF_
=========================================================================
（このメールは自動送信です）
=========================================================================
_EOF_;

$tsukuba_mail_footar_1 = <<<_EOF_
=========================================================================
　○○ 事務局
　E-mail:
　http:
=========================================================================
Copyright(C)○○ 2017 All rights reserved.
_EOF_;

$quescript=<<<_EOF_
<script>
    $(function () {
        $('.btn').click(function () {
            var check_count = $('.form-group :checked').length;
            if (check_count == 0) {
                alert('１つ以上、選んでください。')
                return false;
            }
        });
    });
</script>
_EOF_;

$quescript_hissu_1=<<<_EOF_
<script>
    $(function () {
        $('.btn').click(function () {
            var check_count = $('.form-group :checked').length;
            if (check_count != 1) {
                alert('１つだけ選んでください。')
                return false;
            }
        });
    });
</script>
_EOF_;

$quescript_hissu_2=<<<_EOF_
<script>
    $(function () {
        $('.btn').click(function () {
            var check_count = $('.form-group :checked').length;
            if (check_count != 2) {
                alert('２つだけ選んでください。')
                return false;
            }
        });
    });
</script>
_EOF_;

$quescript_hissu_3=<<<_EOF_
<script>
    $(function () {
        $('.btn').click(function () {
            var check_count = $('.form-group :checked').length;
            if (check_count != 3) {
                alert('３つだけ選んでください。')
                return false;
            }
        });
    });
</script>
_EOF_;

  $qt_a_map = array(
    "1" => "(1A)場所に関って【易】51問",
    "2" => "(1B)場所に関って【難】64問",
    "3" => "(2A)時間に関わって【易】40問",
    "4" => "(2B)時間に関って【難】39問",
    "5" => "(3A)主体に関わって【易】24問",
    "6" => "(3B)主体に関わって【難】11問",
    "7" => "(4A)授受・受身・使役に関わって【易】23問",
    "8" => "(4B)授受・受身・使役に関って【難】36問",
    "9" => "(5A)対象に関わって【易】42問",
    "10" => "(5B)対象に関って【難】34問",
    "11" => "(6A)手段・原因・状態に関って【易】34問",
    "12" => "(6B)手段・原因・状態に関って【難】37問",
    "13" => "(7A)格助詞の「と」【易】37問",
    "14" => "(7B)格助詞の「と」【難】27問",
    "15" => "(8A)「が」と「は」【易】39問",
    "16" => "(8B)「が」と「は」【難】10問",
    "17" => "(9A)「並立」や「添加」に関わって【易】21問",
    "18" => "(9B)「並立」や「添加」に関わって【難】29問",
    "19" => "(10A)「比較」や「程度」に関わって【易】11問",
    "20" => "(10B)「比較」や「程度」に関わって【難】34問",
    "21" => "(11A)「限定」や「強調」に関わって【易】34問",
    "22" => "(11B)「限定」や「強調」に関わって【難】39問",
    "23" => "(12A)「順接」や「継起」に関わって【易】39問",
    "24" => "(12B)「順接」や「継起」に関わって【難】55問",
    "25" => "(13A)「逆接」に関わって【易】23問",
    "26" => "(13B)「逆接」に関わって【難】29問",
    "27" => "(14A)「言い換え」や「転換」に関わって【易】7問",
    "28" => "(14B)「言い換え」や「転換」に関わって【難】19問",
    "29" => "予約29",
    "30" => "予約30",
    "55" => "テストデータ"
  );

  $ans_a_map = array("0" => "□",
                     "1" => "■");

  $sex_a_map = array("0" => "男性",
                     "1" => "女性");

  $sex_b_map = array("0" => "男",
                     "1" => "女");

  $syougai_a_map = array("0" => "聴覚障害者",
                         "1" => "健聴者",
                         "2" => "不明");

  $syougai_b_map = array("0" => "",
                         "1" => "聴",
                         "2" => "不");

//オブジェクトを再帰的にarray化する
function obj2arr($obj)
{
    if ( !is_object($obj) ) return $obj;

    $arr = (array) $obj;

    foreach ( $arr as &$a )
    {
        $a = obj2arr($a);
    }

    return $arr;
}

//デバッグ文の表示
function    printd($msg)
{
  printf("<!-- %s -->\n", $msg);
//    syslog(LOG_INFO, sprintf("<!-- %s -->\n", $msg));
}
?>
