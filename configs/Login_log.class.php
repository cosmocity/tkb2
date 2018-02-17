<?php
class Login_log {
	public function __construct(){ /* コンストラクタ */ }
	public function __destruct() { /* デストラクタ */ }

	private $_arg;

	public function get_login_user()	{return $this->_login_user;}
	public function get_login_date()	{return $this->_login_date;}
	public function get_request_uri()	{return $this->_request_uri;}
	public function get_ip_address()	{return $this->_ip_address;}

	public function set_login_user($_arg)	{$this->_login_user=	$_arg;}
	public function set_login_date($_arg)	{$this->_login_date=	$_arg;}
	public function set_request_uri($_arg)	{$this->_request_uri=	$_arg;}
	public function set_ip_address($_arg)	{$this->_ip_address=	$_arg;}

	public static function getLogin_logInfo($db,$argid){
		$objLogin_log=new Login_log();
		$stt = $db->prepare("SELECT * FROM login_log where login_user=?");
		if ($stt->execute(array($argid))) {
			while ($row = $stt->fetch()) {
				$objLogin_log->set_login_user($row['login_user']);
				$objLogin_log->set_login_date($row['login_date']);
				$objLogin_log->set_request_uri($row['request_uri']);
				$objLogin_log->set_ip_address($row['ip_address']);
			}
		}
		$stt = null;
		return $objLogin_log;
	}

	public function setLogin_logInfo_1($db){
		$sql  = "UPDATE login_log SET login_date=? , request_uri=? , ip_address=?";
		$sql .= " WHERE login_user=?";
		$stt=$db->prepare($sql);
		$stt->bindParam(01, $this->get_login_date());
		$stt->bindParam(02, $this->get_request_uri());
		$stt->bindParam(03, $this->get_ip_address());
		$stt->bindParam(04, $this->get_login_user());
		try {
			$db->beginTransaction();
			$stt->execute();
			$db->commit();
		}
		catch (PDOException $exception){
			$db->rollBack();
		}
		$stt = null;
		return $exception;
	}

	public function addLogin_logInfo($db){
		$sql =  "INSERT INTO Login_log(login_user)";
		$sql .= " VALUES(?)";
		$stt=$db->prepare($sql);
		$stt->bindParam(1, $this->get_login_user());
		try {
			$db->beginTransaction();
			$stt->execute();
			$db->commit();
		}
		catch (PDOException $exception){
			$db->rollBack();
		}
		$stt = null;
		return $exception;
	}
}
?>
