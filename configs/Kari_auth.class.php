<?php
class Kari_auth {
	public function __construct(){ /* コンストラクタ */ }
	public function __destruct() { /* デストラクタ */ }

	private $_arg;

	public function get_id()	{return $this->_id;}
	public function get_kari_pw()	{return $this->_kari_pw;}
	public function get_check_flg()	{return $this->_check_flg;}
	public function get_get_time()	{return $this->_get_time;}

	public function set_id($_arg)	{$this->_id=	$_arg;}
	public function set_kari_pw($_arg)	{$this->_kari_pw=	$_arg;}
	public function set_check_flg($_arg)	{$this->_check_flg=	$_arg;}
	public function set_get_time($_arg)	{$this->_get_time=	$_arg;}

	public static function getKari_authInfo($db,$argid){
		$objKari_auth=new Kari_auth();
		$stt = $db->prepare("SELECT * FROM kari_auth where id=?");
		if ($stt->execute(array($argid))) {
			while ($row = $stt->fetch()) {
				$objKari_auth->set_id($row['id']);
				$objKari_auth->set_kari_pw($row['kari_pw']);
				$objKari_auth->set_check_flg($row['check_flg']);
				$objKari_auth->set_get_time($row['get_time']);
			}
		}
		$stt = null;
		return $objKari_auth;
	}

	public function setKari_authInfo_1($db){
		$sql  = "UPDATE kari_auth SET kari_pw=? , check_flg=? , get_time=?";
		$sql .= " WHERE id=?";
		$stt=$db->prepare($sql);
		$stt->bindParam(01, $this->get_kari_pw());
		$stt->bindParam(02, $this->get_check_flg());
		$stt->bindParam(03, $this->get_get_time());
		$stt->bindParam(04, $this->get_id());
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

	public function addKari_authInfo($db){
		$sql =  "INSERT INTO Kari_auth(id)";
		$sql .= " VALUES(?)";
		$stt=$db->prepare($sql);
		$stt->bindParam(1, $this->get_id());
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
