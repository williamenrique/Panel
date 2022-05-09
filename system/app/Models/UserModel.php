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
}