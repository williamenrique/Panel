<?php
class HomeModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function getSitios(){
		$sql = "SELECT * FROM table_sitio WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
	public function getSite(int $intSitio){
		$this->intSitio = $intSitio;
		$sql = "SELECT * FROM table_sitio WHERE idSitio = $this->intSitio";
		$request = $this->select($sql);
		return $request;
	}
	public function setSitio( string $strSitio,string $strUsuario,string $strPass,string $strUrl){
		$this->strSitio = $strSitio;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strUrl = $strUrl;
		$this->intStatus = 1;
		$sql = "INSERT INTO table_sitio(sitio,usuario,pass,url,status) VALUES (?,?,?,?,?)";
		$arrData = array($this->strSitio, $this->strUsuario, $this->strPass, $this->strUrl, $this->intStatus);
		$request = $this->insert($sql,$arrData);
		return $request;
	}
	public function delSite(int $intSitio){
		$this->intSitio = $intSitio;
		$sql = "UPDATE table_sitio SET status = ? WHERE  idSitio = $this->intSitio";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}