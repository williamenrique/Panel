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
		$data['page_function'] = "function.sitio.js";
		$this->views->getViews($this, "home", $data);
	}
	
	public function getSitios(){
		$arrData = $this->model->getSitios();
		//provar que trae el array
		// dep($arrData[0]['rol_status']);exit();
		//recorrer el arreglo para colocara el status
		$htmlOptions = "";
		
		if(empty($arrData)){
			$htmlOptions .= '
				<div class="alert-table">No se encontraron resultados</div>
						';
		}else{
			$htmlOptions .= '
				<tbody >
			';
			for ($i=0; $i < count($arrData) ; $i++) {
				$htmlOptions .= '
					<tr>
						<td><a href="'.$arrData[$i]['sitio'].'">'.$arrData[$i]['sitio'].'</a></td>
						<td>'.$arrData[$i]['usuario'].'</td>
						<td>'.$arrData[$i]['pass'].'</td>
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
		// dep($_POST);
	
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