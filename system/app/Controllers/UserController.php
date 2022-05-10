<?php
class User extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function perfil(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "empty";
		$data['page_link'] = "empty";
		$data['page_function'] = "function.user.js";
		$this->views->getViews($this, "perfil", $data);
	}
	public function imgUp(){
		$archivos_permitidos = array('pdf', 'jpg', 'png', 'svg');
		// capturo las partes del nombre del archivo
		$fileData = pathinfo($_FILES['file']['name']);
		if(!$_FILES['file']['name'] == null){
			$max_size = 2000000;
			$fileExtension = strtolower($fileData['extension']);
			if(!in_array($fileExtension, $archivos_permitidos)){
				$arrResponse = ["status" => false, "msg" => "No se acepta ese tipo de formato"];
			}elseif ($_FILES['file']['size'] > $max_size) {
				$arrResponse = ["status" => false, "msg" => "Imagen demasiado grande"];
			}else{
				$arrResponse = ["status" => true, "msg" => "Hasta aqui bien"];
				$fileBase =  $_SESSION['ruta'];
	 			$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
				if (!file_exists($fileBase))
				mkdir($fileBase, 0777, true);
				$namFile = 'Profile-'. $fileHash . "." . $fileExtension;
				$filePath = $fileBase . $namFile;
				// TODO: preguntar si la imagen actual existe para eliminarla antes de subir una nueva
				$imgProfile = $this->model->userData($_SESSION['idUser']);
				$rutaImg= $imgProfile['ruta'].$imgProfile['img'];
				if(move_uploaded_file($_FILES['file']['tmp_name'], $filePath)){
					unlink($rutaImg);
					$requestUpdate = $this->model->imgProfile($_SESSION['idUser'],$namFile);
					if($requestUpdate){
						$arrResponse = ["status" => true, "msg" => "Archivo guardado con exito"];
						$dataUser = data($_SESSION['idUser']);
					}
				}else{
					$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error al guardar"];
				}
			}
		}else{
			$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getUser(){
		if($_POST){
			$intUser = intval($_POST['intUser']);
			$requestUser = $this->model->Data($intUser);
			// $requestUser = estados();
			echo json_encode($requestUser,JSON_UNESCAPED_UNICODE);
			die();
		}
	}
	public function updateProfile(){
		$intUserId =  $_POST['intUserId'];
		$txtCiProfile = $_POST['txtCiProfile'];
		$txtEmailProfile =  $_POST['txtEmailProfile'];
		$txtNombreProfile =  $_POST['txtNombreProfile'];
		$txtApellidoProfile = $_POST['txtApellidoProfile'];
		$txtTlfProfile = $_POST['txtTlfProfile'];
		$txtCdPostal = $_POST['txtCdPostal'];
		$listCiudad =  $_POST['listCiudad'];
		$listState =  $_POST['listState'];
		$txtDireccion = $_POST['txtDireccion'];
		$requestUpdate = $this->model->updateProfile($intUserId,$txtCiProfile,$txtEmailProfile,$txtNombreProfile,$txtApellidoProfile,$txtTlfProfile,$txtCdPostal,$listCiudad,$listState,$txtDireccion);
		if($requestUpdate){
			$arrResponse = ["status" => true, "msg" => "Seactualizo con exito"];
		}else{
			$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	public function getState(){
		$htmlOptions = "";
		$arrData = $this->model->selectState();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_estado'].'">'.$arrData[$i]['estado'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	public function getCiudad(){
		$intState = $_POST['intState'];
		$htmlOptions = "";
		$arrData = $this->model->selectCiudad($intState);
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_ciudad'].'">'.$arrData[$i]['ciudad'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
}