<?php

class Login extends Controllers{
	public function __construct(){
		session_start();
		if (isset($_SESSION['login'])) {
			header("Location:".base_url().'home');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function login(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Login";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "login";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "login", $data);
	}

	public function loginUser(){
		if($_POST){
			$strUser = strtolower($_POST['txtUserLogin']);
			$strPass = $_POST['txtPassLogin'];
			$requestUser = $this->model->loginUser($strUser,$strPass);
			if($strUser == "" || $strPass == ""){
				$arrResponse = array('status' => false, 'msg' => 'Debe llenar los campos');
			}else{
				if(empty($requestUser)){
					$arrResponse = array('status' => false, 'msg' => 'Usuario no existe');
				}else{
					$arrData = $requestUser;
					if($arrData['status'] == 0){
						$arrResponse = array('status' => false, 'msg' => 'Usuario bloqueado');
					}else{
						if($arrData['pass'] != $strPass){
							$arrResponse = array('status' => false, 'msg' => 'Password no coincide usuario sera bloqueado');
							$intentos = $arrData['intentos'] + 1;
							$this->model->updateIntento($arrData['user_id'],$intentos);
							if($arrData['intentos'] >= 3){
								$arrResponse = array('status' => false, 'msg' => 'Usuario Bloqueado');
								$bloqueoUser = $this->model->userBlock($arrData['user_id'],0,token());
							}
						}else{
							// creamos la sesion y las variables
							$_SESSION['idUser'] = $arrData['user_id'];
							$_SESSION['login'] = true;
							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							//creamos la variable de sesion mediante un helper
							sessionUser($_SESSION['idUser']);
							// $strCodigo = "biCod-".$_SESSION['userData']['user_id']."-".codGenerator();
							// $_SESSION['strCodigo'] = $strCodigo;
							$arrResponse = array('status' => true, 'msg' => 'ok');
						}
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
	}
	public function registerUser(){
		if($_POST){
			$txtNombRegister = $_POST['txtNombRegister'];
			$txtEmailRegister = $_POST['txtEmailRegister'];
			$txtPassRegister = $_POST['txtPassRegister'];
			$txtPassRegisterConfirm = $_POST['txtPassRegisterConfirm'];
			if($txtEmailRegister == "" || $txtPassRegister == ""){
				$arrResponse = array('status' => false, 'msg' => 'Campos deben ser llemados');
			}
			if($txtPassRegisterConfirm != $txtPassRegister){
				$arrResponse = array('status' => false, 'msg' => 'Password no coinciden');
			}else{
				// comprobar que el email o el usuario no existan
				$requestUserL = $this->model->loginUser($txtEmailRegister,$txtPassRegister);
				$arrData = $requestUserL;
				if(empty($arrData['email'])){
					$requestUser = $this->model->registerUser($txtNombRegister,$txtEmailRegister, $txtPassRegister,1);
					if($requestUser > 0){
						$userNIck =  strtoupper(substr($txtNombRegister,0,4)) .'-0'.$requestUser;
						$fileBase = "system/app/Views/Docs/". $userNIck . "/";
						$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
						if (!file_exists($fileBase))
						mkdir($fileBase, 0777, true);
						$this->model->updateRegister($requestUser,$userNIck,$fileBase);
						$arrResponse = array('status' => true, 'msg' => 'Cuenta creada');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Ah ocurrido un error');
					}
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Email ya esta registrado');
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	}



	public function logout(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home

		$this->views->getViews($this, "logout", $data);
	}
}