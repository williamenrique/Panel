<?php
class LoginModel extends Mysql {
	// declaramos variables para el uso interno
	private $strTxtUser;
	private $strTxtPass;
	private $intCuentaAut;
	private $intIntentos;
	private $strToken;
	private $intStatus;
	private $strTxtEmail;
	private $strTxtNombre;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}

	public function loginUser(string $strTxtUser, string $strTxtPass){
		$this->strTxtUser = $strTxtUser;
		$this->strTxtPass = $strTxtPass;
		$sql = "SELECT * FROM table_user t_u JOIN table_block t_b WHERE t_b.user_id = t_u.user_id AND t_u.user = '$this->strTxtUser' OR t_u.email = '$this->strTxtUser'";
		$request = $this->select($sql);
		return $request;
	}
	public function getUser(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT * FROM table_user WHERE user_id = $this->intIdUser";
		$request = $this->select($sql);
		return $request;
	}
	public function sessionLogin(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT * FROM table_user t_u JOIN table_block t_b WHERE t_b.user_id = t_u.user_id AND t_u.user = '$this->strTxtUser' OR t_u.email = '$this->strTxtUser'";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}
	public function updateIntento(int $intUserId, int $intIntentos){
		$this->intUserId = $intUserId;
		$this->intIntentos = $intIntentos;
		$sql = "UPDATE table_block set intentos = ? WHERE user_id = $this->intUserId";
		$arrData = array($this->intIntentos);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	
	public function userBlock(int $intUserId,int $intStatus, string $strToken,int $intIntentos){
		$this->intUserId = $intUserId;
		$this->strToken = $strToken;
		$this->intStatus = $intStatus;
		$this->intIntentos = $intIntentos;
		$sql = "UPDATE table_user INNER JOIN table_block ON table_block.user_id = table_user.user_id 
		SET table_block.token = ? , table_user.status = ? , table_block.intentos = ? WHERE table_user.user_id = $this->intUserId";
		$arrData = array($this->strToken, $this->intStatus, $this->intIntentos);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function registerUser(string $strTxtNombre ,string $strTxtEmail, string $strTxtPass, int $intStatus){
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtEmail = $strTxtEmail;
		$this->strTxtPass = $strTxtPass;
		$this->intStatus = $intStatus;
		$sql = "INSERT INTO table_user (email,pass,nombre,status) VALUES(?,?,?,?)";
		$arrData = array($this->strTxtEmail,$this->strTxtPass,$this->strTxtNombre,$this->intStatus);
		$request = $this->insert($sql,$arrData);
		$return = $request;
		return $return;
	}
	public function updateRegister(int $intUserId, string $strUserNick, string $strRuta){
		$this->intUserId = $intUserId;
		$this->strUserNick = $strUserNick;
		$this->strRuta = $strRuta;
		$sql = "UPDATE table_user set nick = ?, ruta = ? WHERE user_id = $this->intUserId";
		$arrData = array($this->strUserNick, $this->strRuta);
		$request = $this->update($sql,$arrData);
		return $request;
	}

}