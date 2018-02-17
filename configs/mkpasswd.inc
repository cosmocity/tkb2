<?php
//
// 使い方 $pw に12桁のパスワードをセットする
// $PA=new PwAuth;
// $pw = $PA->makePassword(12);
//
class PwAuth {
  var $mPasswordChars = "ABCDEFGHJKLMNPQRSTWXYZ2345679";

  function makePassword( $aLength ) {
    mt_srand((double)microtime()*974353);
    $password = "";
    for( $i=0; $i<$aLength; $i++ ) {
      $password .= substr( $this->mPasswordChars,
                           mt_rand(0, strlen($this->mPasswordChars)-1 ),
                           1 );
    }
    return $password;
  }
}
?>
