<?php

class Login extends Controllers{
	public function __construct(){
		session_start();
		if (isset($_SESSION['strVarLogin'])) {
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
		$data['page_function'] = "function.login.js";
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
								$bloqueoUser = $this->model->userBlock($arrData['user_id'],0,token(),4);
							}
						}else{
							// creamos la sesion y las variables
							// echo "id de usuario es ".$arrData['user_id'];
							$_SESSION['idUser'] = $arrData['user_id'];
							// $_SESSION['login'] = true;
							// TODO: crear variable de sesion para cada usuario
							$_SESSION['strVarLogin'] = codGenerator();
							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							$this->model->updateCodSesion($_SESSION['strVarLogin'],$arrData['user_id']);
							//creamos la variable de sesion mediante un helper
							sessionUser($_SESSION['idUser']);
							$_SESSION['img'] =        $arrData['img'];
							$_SESSION['nick'] =		   $arrData['nick'];
							$_SESSION['user'] = 		   $arrData['user'];
							$_SESSION['pass'] = 		   $arrData['pass'];
							$_SESSION['apellido'] =   $arrData['apellido'];
							$_SESSION['telefono'] =   $arrData['telefono'];
							$_SESSION['direccion'] =  $arrData['direccion'];
							$_SESSION['status'] = 	   $arrData['status'];
							$_SESSION['fecha_reg'] =  $arrData['fecha_reg'];
							$_SESSION['estado'] = 		 $arrData['estado'];
							$_SESSION['ciudad'] = 		 $arrData['ciudad'];
							$_SESSION['email'] = 		 $arrData['email'];
							$_SESSION['nombre'] = 		 $arrData['nombre'];
							$_SESSION['ruta'] =	   $arrData['ruta'];
							$_SESSION['imagen'] = 		 $arrData['img'];
							$_SESSION['imgUser'] = base_url().$arrData['ruta'].$arrData['img'];
							$arrResponse = array('status' => true, 'msg' => 'ok');
							// reiniciamos los intentos
							$bloqueoUser = $this->model->userBlock($arrData['user_id'],1,0,0);
						}
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
	}

	public function logout(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home

		$this->views->getViews($this, "logout", $data);
		session_start();
		session_unset();
		session_destroy();
	}


	public function register(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Login";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "login";
		$data['page_function'] = "function.login.js";
		$this->views->getViews($this, "register", $data);
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
						$fileBase = "src/Docs/". $userNIck . "/";
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
}