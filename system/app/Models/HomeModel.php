<?php
class HomeModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;
	private $intSite;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function countSites(){
		$sql = "SELECT * FROM table_sitio WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
}