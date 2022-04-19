<?php

class Home extends Controllers{
	public function __construct(){
		// session_start();
		// if (empty($_SESSION['login'])) {
		// 	header("Location:".base_url().'dashboard');
		// }
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "home";
		$data['page_link'] = "dashboard";
		$data['page_function'] = "function.sitio.js";
		$this->views->getViews($this, "home", $data);
	}
	
	public function getSitios(){
		$arrData = $this->model->getSitios();
		$htmlOptions = "";
		if(empty($arrData)){
			$htmlOptions .= '
				<div class="alert-table">No se encontraron resultados</div>
						';
		}else{
			$htmlOptions .= '
				<thead>
					<tr>
						<td>Sitio</td>
						<td>Usuario</td>
						<td>Clave</td>
						<td>Opcion</td>
					</tr>
				</thead>
				<tbody >
			';
			for ($i=0; $i < count($arrData) ; $i++) {
				$htmlOptions .= '
					<tr>
						<td><a href="'.$arrData[$i]['sitio'].'">'.$arrData[$i]['sitio'].'</a></td>
						<td>'.$arrData[$i]['usuario'].'</td>
						<td>'.decryption($arrData[$i]['pass']).'</td>
						<td>
							<div class="icon-action">
								<i class="fa-solid fa-trash-can delSite" onclick="delSite('.$arrData[$i]['idSitio'].')"></i>
								<i class="fa-solid fa-pencil aditSite" onclick="editSite('.$arrData[$i]['idSitio'].')"></i>
							</div>
						</td>
					</tr>';
			}
			$htmlOptions .= '
				</tbody>';
		}
		echo $htmlOptions;
		die();
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
			$strPass = strClean(encryption($_POST['txtPass']));
			$strUrl = strClean(encryption($_POST['txtUrl']));
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

	// edit site
	public function getSite(int $intSite){
		$intSite = intval($intSite);
		if($intSite > 0 ){
			$arrData = $this->model->getSite($intSite);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$pass = array('password'=> decryption($arrData['pass']),'URL'=> decryption($arrData['url']));
				$data = $arrData + $pass;

				$arrResponse = array('status' => true, 'data' => $data);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}



}


/*
			$arrData[$i]['n'] = $i + 1;
			$arrData[$i]['pass'] = decryption($arrData[$i]['pass']);
			$arrData[$i]['url'] = decryption($arrData[$i]['url']);
			$arrData[$i]['opciones'] ='<div class="">
																	
																	<button type="button" class="btn btn-success btn-sm btnEditSitio" onClick="fnteditSitio('.$arrData[$i]['idSitio'].')" title="Editar" ><span class="fa fa-edit" aria-hidden="true"></i></button>
																	<button type="button" class="btn btn-danger btn-sm btnDelSitio" onClick="fntDelSitio('.$arrData[$i]['idSitio'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
																</div>';
*/