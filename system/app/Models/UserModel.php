<?php
class UserModel extends Mysql {
	// declaramos variables para el uso interno
	private $intUserId;
	private $strRuta;
	private $strFile;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function imgProfile(int $intUserId,string $strFile){
		$this->intUserId = $intUserId;
		$this->strFile = $strFile;
		$sql = "UPDATE table_user SET  img = ? WHERE user_id = $this->intUserId";
		$arrData = array($this->strFile);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function userData(int $intUserId){
		$this->intUserId = $intUserId;
		$sql = "SELECT * FROM table_user t_u JOIN table_block t_b WHERE t_b.user_id = t_u.user_id AND t_u.user_id = $this->intUserId";
		$request = $this->select($sql);
		return $request;
	}
}