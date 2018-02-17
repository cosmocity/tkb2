<?php
class Auth_group_name {
	public function __construct(){ /* コンストラクタ */ }
	public function __destruct() { /* デストラクタ */ }

	private $_arg;

	public function get_groupname()	{return $this->_groupname;}
	public function get_groupname_nm()	{return $this->_groupname_nm;}
	public function get_disp_order()	{return $this->_disp_order;}

	public function set_groupname($_arg)	{$this->_groupname=	$_arg;}
	public function set_groupname_nm($_arg)	{$this->_groupname_nm=	$_arg;}
	public function set_disp_order($_arg)	{$this->_disp_order=	$_arg;}

	public static function getAuth_group_nameInfo($db,$argid){
		$objAuth_group_name=new Auth_group_name();
		$stt = $db->prepare("SELECT * FROM auth_group_name where groupname=?");
		if ($stt->execute(array($argid))) {
			while ($row = $stt->fetch()) {
				$objAuth_group_name->set_groupname($row['groupname']);
				$objAuth_group_name->set_groupname_nm($row['groupname_nm']);
				$objAuth_group_name->set_disp_order($row['disp_order']);
			}
		}
		$stt = null;
		return $objAuth_group_name;
	}

	public function setAuth_group_nameInfo_1($db){
		$sql  = "UPDATE auth_group_name SET groupname_nm=? , disp_order=?";
		$sql .= " WHERE groupname=?";
		$stt=$db->prepare($sql);
		$stt->bindParam(01, $this->get_groupname_nm());
		$stt->bindParam(02, $this->get_disp_order());
		$stt->bindParam(03, $this->get_groupname());
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

	public function addAuth_group_nameInfo($db){
		$sql =  "INSERT INTO Auth_group_name(groupname)";
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
