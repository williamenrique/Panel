<?php
class HomeModel extends Mysql {
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function setuser(string $nombre, int $edad){
		$sqlQuery = "INSERT INTO usuario(nombre, edad) VALUES(?,?)";
		$arrData = array($nombre, $edad);
		$request = $this->insert($sqlQuery,$arrData);
		return $request;
	}
	public function getUser($id){
		$sqlQuery = "SELECT * FROM usuario WHERE id_usuario = $id";
		$request = $this->select($sqlQuery);
		return $request;
	}
	public function getUsers(){
		$sqlQuery = "SELECT * FROM usuario";
		$request = $this->select_all($sqlQuery);
		return $request;
	}
	public function delUser($id){
		$sqlQuery = "DELETE  FROM usuario WHERE id_usuario = $id";
		$request = $this->delete($sqlQuery);
		return $request;
	}
	public function updateUser(int $id, string $nombre, int $edad){
		$sqlQuery = "UPDATE usuario SET nombre = ? , edad = ? WHERE id_usuario = $id ";
		$arrData = array($nombre, $edad);
		$request = $this->update($sqlQuery,$arrData);
		return $request;
	}
	
}