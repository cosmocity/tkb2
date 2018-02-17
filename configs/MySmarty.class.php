<?php
/*-------------------------------------------------*/
/*            MySQL(pdo)-utf8 version              */
/*-------------------------------------------------*/

require_once("/var/www/vhosts/cosmocity.net/quest16/smarty3/Smarty.class.php");

class MySmarty extends Smarty {

	public function __construct() {
		parent::__construct();
		$homepath="/var/www/vhosts/cosmocity.net/quest16";
		$this->template_dir="$homepath/templates/";
		$this->compile_dir= "$homepath/templates_c/";
		$this->config_dir = "$homepath/configs/";
		$this->cache_dir =  "$homepath/cache/";
    }
}
?>