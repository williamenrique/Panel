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
	// obtener sitios pos stadus y sitio
	public function getSites(){
		$intSite = $_GET['intSite'];
		$strSite = $_GET['strSite'];
		if($intSite == ''){
			$intSite = 1;
		}
		$arrData = $this->model->getSites($intSite,$strSite);
		dep($arrData);
		die();
		$htmlOptions = "";
		if(empty($arrData)){
			$htmlOptions .= '
				<div class="alert-table">No se encontraron resultados</div>
						';
		}else{
			$htmlOptions .= '
				<table class="table">
				<thead>
					<tr>
						<th>Sitio</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
			';
			for ($i=0; $i < count($arrData) ; $i++) {
				$htmlOptions .= '
				<tr>
						<td data-label="sitio">'.$arrData[$i]['sitio'].'</td>
						<td data-label="usurio">'.$arrData[$i]['usuario'].'</td>
						<td data-label="clave">'.$arrData[$i]['pass'].'</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>
								<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>
							</div>
						</td>
					</tr>
						';
			}
			$htmlOptions .= 
			'</tbody>
			</table>';
		}
		echo $htmlOptions;
		die();
	}
	// delete site
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


/*
	public function getSitios(){
		$arrData = $this->model->getSitios();
		$htmlOptions = "";
		if(empty($arrData)){
			$htmlOptions .= '
				<div class="alert-table">No se encontraron resultados</div>
						';
		}else{
			$htmlOptions .= '
				<div class="table__header">Sitio</div>
				<div class="table__header">Usuario</div>
				<div class="table__header">Password</div>
				<div class="table__header">Opciones</div>
			';
			for ($i=0; $i < count($arrData) ; $i++) {
				$htmlOptions .= '
					<div class="table__item"><a href="'.$arrData[$i]['sitio'].'">'.$arrData[$i]['sitio'].'</a></div>
					<div class="table__item">'.$arrData[$i]['usuario'].'</div>
					<div class="table__item">'.$arrData[$i]['pass'].'</div>
					<div class="table__item accion">
						<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>
						<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>
					</div>
						';
			}
		}
		echo $htmlOptions;
		die();
	}
	*/