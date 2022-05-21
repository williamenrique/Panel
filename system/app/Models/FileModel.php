<?php
class FileModel extends Mysql {
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
	
}