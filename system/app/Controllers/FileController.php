<?php
class File extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function file(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "empty";
		$data['page_link_active'] = "empty";
		$data['page_link'] = "files";
		$data['page_function'] = "function.files.js";
		$this->views->getViews($this, "file", $data);
	}

	public function getListFile(){
		$arrData = $this->model->getFiles($_SESSION['user_id']);
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['file_name'] = '	
						<a href="'.$arrData[$i]['file_ruta'].'/'.$arrData[$i]['file_name'].'" class="linkFile" download="'.$arrData[$i]['file_name'].'">'.$arrData[$i]['file_name'].'</a>';
			$arrData[$i]['opciones'] =
					'<div class="box-options">
						<i class="bx bxs-trash delFile" onclick="delFile('.$arrData[$i]['id_file'].')"></i>

					</div>';
			$arrData[$i]['file_date_mod'] = formatear_fecha($arrData[$i]['file_date_mod']);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function setFiles(){
		if(!$_FILES == null){
			$cont = 0;
			// si no existe el directorio crearlo
			if(!is_dir($_SESSION['ruta'].'/file')) mkdir($_SESSION['ruta'].'/file', 0777, true);
			// recorrer los archivos
			foreach ($_FILES as $key => $file) {
				 $filename= rand(1,50).'-'.$file['name'];
				// evaluamos si falla move_upload retornamos un error
				if(!move_uploaded_file($file['tmp_name'], $_SESSION['ruta'].'/file'.'/'.$filename)){
					$arrResponse = ["status" => false, "msg" => "No fue posible subir"];
				}
				// cada vez que itera agregamos un elemnto ala rray
				$fileSize = round($file['size'] / 1048576, 2);
				$arrData = $this->model->setFiles($_SESSION['idUser'],$filename,$fileSize.'MB',$_SESSION['ruta'] );
				// se incrementa para poder usarlo para enviar un msj de exito
				$cont ++;
			}
			
			if($cont == count($_FILES)){
				if($cont == 0){
						$arrResponse = ['msg' => $msg,'status' => false];
				}else{
					$msg = ( $cont > 1 ? 'Se subieron ' . $cont . ' fotos con éxito' : 'Se subió ' . $cont . ' foto con éxito' );
					$arrResponse = ['msg' => $msg,'status' => true];
				}
			}
		}else{
			$arrResponse = ["status" => false, "msg" => "No se a cargado ningun archivo"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	/* descargar el archivo */
	public function delFile(){
		$intIdFile = $_POST['intFile'];
		$arrData = $this->model->getFile($intIdFile, $_SESSION['idUser']);
		$fileBase = $arrData['file_ruta'].'file/';
		// abre el archivo en modo binario
		$filePath = $fileBase . $arrData['file_name'];
		if(unlink($filePath)){
			$arrResponse = ["status" => true, "msg" => "Archivo eliminado"];
			$arrData = $this->model->deleteFile($intIdFile, $_SESSION['idUser']);
		}else{
			$arrResponse = ["status" => false, "msg" => "No se pudo eliminar el archivo"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}