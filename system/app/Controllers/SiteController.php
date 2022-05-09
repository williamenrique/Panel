<?php
header('Access-Control-Allow-Origin: *');
class Site extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function site(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Site - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "empty";
		$data['page_link'] = "site";
		$data['page_function'] = "function.site.js";
		$this->views->getViews($this, "site", $data);
	}
	// function agregar sitios
	public function setSite(){
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
			$request = $this->model->setSitio($strSitio,$strUsuario,$strPass,$strUrl,$_SESSION['idUser']);
			if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Sitio agregada");
			}else{
				$arrResponse = array("status" => false, "msg" => "Error al guardar");
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	/*
	* obtener los asitios segun prioridad
	* y favorito
	*/
	public function getSites(){
		$priority = intval($_GET['priority']);
		if($priority == 0){$fav = 0;}
		if($priority == 1){$fav = 0;}
		if($priority == 2){$fav = 1;}
		$intUserId = $_SESSION['idUser'];
		$arrData = $this->model->getSites($priority,$fav,$intUserId);
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['url'] = '<a href="'.$arrData[$i]['url'].'" class="link_url" target="_blank">'.$arrData[$i]['url'].'</a>';
			$status = '<i class="fa-solid fa-eye-slash"onclick="showSite('.$arrData[$i]['idSitio'].',2)"></i>';
			$del = '<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>';
			$edit = '<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>';
			$favorite = '<i class="fa-solid fa-star" onclick="changeState('.$arrData[$i]['idSitio'].','.$arrData[$i]['favorite'].')"></i>';
			$favorite1 = '<i class="fa-regular fa-star" onclick="changeState('.$arrData[$i]['idSitio'].','.$arrData[$i]['favorite'].')"></i>';
			$arrData[$i]['fechaUpdate'] = formatear_fecha($arrData[$i]['fecha_update']);
			if($priority == 0){
				$arrData[$i]['opciones'] =
				'<div class="box-options">	
				'.$status.'
				</div>';
			}
			if($priority == 1):
				$arrData[$i]['opciones'] =
				'<div class="box-options">
					'.$del.'
					'.$edit;
				switch ($arrData[$i]['favorite']):
					case '1':
						$arrData[$i]['opciones'] .= $favorite;
						break;
					case '0':
						$arrData[$i]['opciones'] .= $favorite1;
						break;
					case NULL:
						$arrData[$i]['opciones'] .= $favorite1;
						break;
				endswitch;
				'</div>';
			endif;
			// if ternario abreviado
			if($priority == 2):
					$arrData[$i]['opciones'] =
					'<div class="box-options">
						<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>
						<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>
						<i class="fa-solid fa-star" onclick="changeState('.$arrData[$i]['idSitio'].','.$arrData[$i]['favorite'].')"></i>';
					'</div>';
			endif;
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	// eliminar un sitio (deshabilitar)
	public function statusSite(){
		if($_POST){
			$idSite = intval($_POST['intSite']);
			$status = intval($_POST['status']);
			$requestDel = $this->model->delSite($idSite,$status);
			if($requestDel){
				if($status == 0){$message = 'Sitio eliminado';}
				if($status == 1){$message = 'Sitio restaurado';}
				$arrResponse = array('status' => true, 'msg' => $message);
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
	// favorito
	public function favSite(){
		if($_POST){
			$intSite = intval($_POST['intSite']);
			$fav = intval($_POST['fav']);
			$request = $this->model->favoriteSite($intSite, $fav);
			if($request){
				if($fav == 0){$message = 'Se elimino de favorito';}
				if($fav == 1){$message = 'Se agrego como favorito';}
				$arrResponse = array('status' => true, 'msg' => $message);
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al cambiar estado');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}