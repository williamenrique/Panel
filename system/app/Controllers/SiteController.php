<?php
header('Access-Control-Allow-Origin: *');
class Site extends Controllers{
	public function __construct(){
		// session_start();
		// if (empty($_SESSION['login'])) {
		// 	header("Location:".base_url().'dashboard');
		// }
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function site(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Site - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "site";
		$data['page_link'] = "site";
		$data['page_function'] = "function.site.js";
		$this->views->getViews($this, "site", $data);
	}
	// function agregar sitios
	public function setSitios(){
		$strUsuario = strClean($_POST['txtUser']);
		$strPass = strClean($_POST['txtPass']);
		$strUrl = strClean($_POST['txtUrl']);
		$strSitio = strClean(strtoupper($_POST['txtSite']));
		// dep($_POST);
		if($strUsuario == "" || $strPass == "" || $strUrl == "" || $strSitio == ""){
			$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
		}else{
			$strPass = strClean($_POST['txtPass']);
			// $strPass = strClean(encryption($_POST['txtPass']));
			$strUrl = strClean($_POST['txtUrl']);
			// $strUrl = strClean(encryption($_POST['txtUrl']));
			$request = $this->model->setSitio(
				$strSitio,
				$strUsuario,
				$strPass,
				$strUrl);
			if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Sitio agregada");
			}else{
				$arrResponse = array("status" => false, "msg" => "Error al guardar");
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	// obtener todos los sitios
	public function getSites(){
		$intSite = $_GET['intSite'];
		$arrData = $this->model->getSites($intSite);
		for ($i=0; $i < count($arrData) ; $i++) {
			$status0 = '<i class="fa-solid fa-eye-slash"onclick="changeState('.$arrData[$i]['idSitio'].',1)"></i>';
			$favorite = '<i class="fa-solid fa-star" onclick="changeState('.$arrData[$i]['idSitio'].',1)"></i>';
			$favorite1 = '<i class="fa-regular fa-star" onclick="changeState('.$arrData[$i]['idSitio'].',2)"></i>';
			if($intSite == 0){
				$status = $status0;
				$del = '<i class="fa-solid fa-trash-can delSite" style="display:none" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>';
			}else
			if($intSite == 1){
					$del = '<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>';
				if($arrData[$i]['favorite'] == 0 && $arrData[$i]['favorite'] == NULL){
					$favorite = $favorite1;
				}else
				if($arrData[$i]['favorite'] == 2){
					$favorite = $favorite;
				}
			}else
			if($intSite == 2){
				$del = '<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>';
				$favorite = $favorite;
			}
			$arrData[$i]['opciones'] = '
				<div class="box-options">	
					'.$del.
					'
					<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>
					'.$favorite.'					
				</div>';
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	// eliminar un sitio (deshabilitar)
	public function delSite(){
		if($_POST){
			$idSite = intval($_POST['intSite']);
			$requestDel = $this->model->delSite($idSite);
			if($requestDel){
				$arrResponse = array('status' => true, 'msg' => 'Sitio eliminado');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// llamar un site para editarlo
	public function getSite(int $intSite){
		$intSite = intval($intSite);
		if($intSite > 0 ){
			$arrData = $this->model->getSite($intSite);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$pass = array('password'=> $arrData['pass'],'URL'=> $arrData['url']);
				// $pass = array('password'=> decryption($arrData['pass']),'URL'=> decryption($arrData['url']));
				$data = $arrData + $pass;

				$arrResponse = array('status' => true, 'data' => $data);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// actualizar sitio
	public function updateSite(){
		if($_POST){
			$strUsuario = strClean($_POST['txtUser']);
			$strPass = strClean($_POST['txtPass']);
			$strUrl = strClean($_POST['txtUrl']);
			$strSitio = strClean($_POST['txtSite']);
			$IntSite = strClean($_POST['txtIntSite']);
			// dep($_POST);
			if($strUsuario == "" || $strPass == "" || $strUrl == "" || $strSitio == ""){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
				$strPass = strClean($_POST['txtPass']);
				// $strPass = strClean(encryption($_POST['txtPass']));
				$strUrl = strClean($_POST['txtUrl']);
				// $strUrl = strClean(encryption($_POST['txtUrl']));
				$request = $this->model->updateSite(
					$IntSite,
					$strSitio,
					$strUsuario,
					$strPass,
					$strUrl);
				if($request > 0){
						$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar ls datos");
					}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			die();
		}
	}
}