<?php
class MailAdr {
	public function __construct(){ /* コンストラクタ */ }
	public function __destruct() { /* デストラクタ */ }

	private $_arg;

	public function get_id()	{return $this->_id;}
	public function get_email_1()	{return $this->_email_1;}
	public function get_ml_1()	{return $this->_ml_1;}
	public function get_email_2()	{return $this->_email_2;}
	public function get_ml_2()	{return $this->_ml_2;}
	public function get_email_3()	{return $this->_email_3;}
	public function get_ml_3()	{return $this->_ml_3;}
	public function get_email_4()	{return $this->_email_4;}
	public function get_ml_4()	{return $this->_ml_4;}
	public function get_email_5()	{return $this->_email_5;}
	public function get_ml_5()	{return $this->_ml_5;}

	public function set_id($_arg)	{$this->_id=	$_arg;}
	public function set_email_1($_arg)	{$this->_email_1=	$_arg;}
	public function set_ml_1($_arg)	{$this->_ml_1=	$_arg;}
	public function set_email_2($_arg)	{$this->_email_2=	$_arg;}
	public function set_ml_2($_arg)	{$this->_ml_2=	$_arg;}
	public function set_email_3($_arg)	{$this->_email_3=	$_arg;}
	public function set_ml_3($_arg)	{$this->_ml_3=	$_arg;}
	public function set_email_4($_arg)	{$this->_email_4=	$_arg;}
	public function set_ml_4($_arg)	{$this->_ml_4=	$_arg;}
	public function set_email_5($_arg)	{$this->_email_5=	$_arg;}
	public function set_ml_5($_arg)	{$this->_ml_5=	$_arg;}

	public static function getMailAdrInfo($db,$argid){
		$objMailAdr=new MailAdr();
		$stt = $db->prepare("SELECT * FROM mailadr where id=?");
		if ($stt->execute(array($argid))) {
			while ($row = $stt->fetch()) {
				$objMailAdr->set_id($row['id']);
				$objMailAdr->set_email_1($row['email_1']);
				$objMailAdr->set_ml_1($row['ml_1']);
				$objMailAdr->set_email_2($row['email_2']);
				$objMailAdr->set_ml_2($row['ml_2']);
				$objMailAdr->set_email_3($row['email_3']);
				$objMailAdr->set_ml_3($row['ml_3']);
				$objMailAdr->set_email_4($row['email_4']);
				$objMailAdr->set_ml_4($row['ml_4']);
				$objMailAdr->set_email_5($row['email_5']);
				$objMailAdr->set_ml_5($row['ml_5']);
			}
		}
		$stt = null;
		return $objMailAdr;
	}

	public function setMailAdrInfo_1($db){
		$sql  = "UPDATE mailadr SET email_1=? , ml_1=? , email_2=? , ml_2=? , email_3=?";
		$sql .= " , ml_3=? , email_4=? , ml_4=? , email_5=? , ml_5=?";
		$sql .= " WHERE id=?";
		$stt=$db->prepare($sql);
		$stt->bindParam(01, $this->get_email_1());
		$stt->bindParam(02, $this->get_ml_1());
		$stt->bindParam(03, $this->get_email_2());
		$stt->bindParam(04, $this->get_ml_2());
		$stt->bindParam(05, $this->get_email_3());
		$stt->bindParam(06, $this->get_ml_3());
		$stt->bindParam(07, $this->get_email_4());
		$stt->bindParam(08, $this->get_ml_4());
		$stt->bindParam(09, $this->get_email_5());
		$stt->bindParam(10, $this->get_ml_5());
		$stt->bindParam(11, $this->get_id());
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

	public function addMailAdrInfo($db){
		$sql =  "INSERT INTO MailAdr(id)";
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
