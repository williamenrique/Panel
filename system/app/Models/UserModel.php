<?php
class UserModel extends Mysql {
	// declaramos variables para el uso interno
	private $intUserId;
	private $strRuta;
	private $strFile;
	private $txtCiProfile;
	private $txtEmailProfile;
	private $txtNombreProfile;
	private $txtApellidoProfile;
	private $txtTlfProfile;
	private $txtCdPostal;
	private $listCiudad;
	private $listState;
	private $txtDireccion;
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
	public function Data(int $intUserId){
		$this->intUserId = $intUserId;
		$sql = "SELECT * FROM table_user t_u 
		INNER JOIN table_block t_b ON t_b.user_id = t_u.user_id
		INNER JOIN table_estados t_e ON t_e.id_estado = t_u.estado
		INNER JOIN table_ciudades t_c ON t_c.id_ciudad = t_u.ciudad
		WHERE t_u.user_id = $this->intUserId";
		$request = $this->select($sql);
		return $request;
	}
	public function updateProfile(int $intUserId,string $txtCiProfile,string $txtEmailProfile,string $txtNombreProfile,string $txtApellidoProfile,string $txtTlfProfile,string $txtCdPostal,int $listCiudad,int $listState,string $txtDireccion){
		$this->intUserId = $intUserId;
		$this->txtCiProfile = $txtCiProfile;
		$this->txtEmailProfile = $txtEmailProfile;
		$this->txtNombreProfile = $txtNombreProfile;
		$this->txtApellidoProfile = $txtApellidoProfile;
		$this->txtTlfProfile = $txtTlfProfile;
		$this->txtCdPostal = $txtCdPostal;
		$this->listCiudad = $listCiudad;
		$this->listState = $listState;
		$this->txtDireccion = $txtDireccion;
		$sql = "UPDATE table_user SET nombre = ?, apellido = ?, ci = ?, telefono = ?, codPostal = ?, estado = ?, ciudad = ?, direccion = ? WHERE user_id = $this->intUserId";
		$arrData = array($this->txtNombreProfile,$this->txtApellidoProfile,$this->txtCiProfile,$this->txtTlfProfile,$this->txtCdPostal,$this->listState,$this->listCiudad,$this->txtDireccion );
		$request = $this->update($sql,$arrData);
		return $request;
	}

	public function selectState(){
		$sql = "SELECT * FROM table_estados ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCiudad(int $listState){
		$this->listState = $listState;
		$sql = "SELECT * FROM table_ciudades WHERE id_estado = $this->listState";
		$request = $this->select_all($sql);
		return $request;
	}
}