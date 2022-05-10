<?php
class DataModel extends Mysql {
	// declaramos variables para el uso interno
	private $intUserId;
	private $strRuta;
	private $strFile;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function selectState(){
		$sql = "SELECT * FROM table_estados";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectCiudad(int $intState){
		$this->intState = $intState;
		$sql = "SELECT * FROM table_ciudades WHERE id_estado = $this->intState";
		$request = $this->select_all($sql);
		return $request;
	}
}