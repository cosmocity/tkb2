<?php
class Auth_group {
	public function __construct(){ /* コンストラクタ */ }
	public function __destruct() { /* デストラクタ */ }

	private $_arg;

	public function get_groupname()	{return $this->_groupname;}
	public function get_username()	{return $this->_username;}

	public function set_groupname($_arg)	{$this->_groupname=	$_arg;}
	public function set_username($_arg)	{$this->_username=	$_arg;}

	public static function getAuth_groupInfo($db,$argid){
		$objAuth_group=new Auth_group();
		$stt = $db->prepare("SELECT * FROM auth_group where groupname=?");
		if ($stt->execute(array($argid))) {
			while ($row = $stt->fetch()) {
				$objAuth_group->set_groupname($row['groupname']);
				$objAuth_group->set_username($row['username']);
			}
		}
		$stt = null;
		return $objAuth_group;
	}

	public function setAuth_groupInfo_1($db){
		$sql  = "UPDATE auth_group SET username=?";
		$sql .= " WHERE groupname=?";
		$stt=$db->prepare($sql);
		$stt->bindParam(01, $this->get_username());
		$stt->bindParam(02, $this->get_groupname());
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

	public function addAuth_groupInfo($db){
		$sql =  "INSERT INTO Auth_group(groupname)";
		$sql .= " VALUES(?)";
		$stt=$db->prepare($sql);
		$stt->bindParam(1, $this->get_groupname());
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
