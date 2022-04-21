<?php
class SiteModel extends Mysql {
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
	public function getSitios(){
		// $this->strSitio = $strSitio;
		// $this->status = $status;
		$sql = "SELECT * FROM table_sitio WHERE status != 0 LIMIT 10";
		// $sql = "SELECT * FROM table_sitio WHERE sitio LIKE '%$this->strSitio%' AND status = $this->status";
		$request = $this->select_all($sql);
		return $request;
	}
	public function getSites(int $intSite, string $strSitio){
		$this->strSitio = $strSitio;
		$this->status = $intSite;
		$sql = "SELECT * FROM table_sitio WHERE sitio LIKE '%$this->strSitio%' AND status = $this->status";
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
	public function updateSite(int $intSite, string $strSitio,string $strUsuario,string $strPass,string $strUrl){
		$this->intSite = $intSite;
		$this->strSitio = $strSitio;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strUrl = $strUrl;
		$this->intStatus = 1;
		$sql = "UPDATE table_sitio SET sitio = ? ,usuario = ? ,pass = ?, url = ?, status = ?  WHERE idSitio = $this->intSite";
		$arrData = array($this->strSitio, $this->strUsuario, $this->strPass, $this->strUrl, $this->intStatus);
		// dep($sql,$arrData);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}