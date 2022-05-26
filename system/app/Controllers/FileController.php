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
	/* obtener files y mostrarlos en la tabla */
	public function getListFile(){
		$arrData = $this->model->getFiles($_SESSION['user_id']);
		$ext = ['png','jpg','doc','txt','pdf','image','gif','json','html','css'];
		for ($i=0; $i < count($arrData) ; $i++) {
			// $fileData = pathinfo($arrData[$i]['file_name']);
			$fileExtension = strtolower($arrData[$i]['file_ext']);
			$name = $arrData[$i]['file_name'];
			if(!in_array($fileExtension,$ext)){
				$arrData[$i]['file_icon'] = '<i class="icon-file bx bxs-file-doc"></i>';
			}else{
				$arrData[$i]['file_icon'] = '<i class="icon-file bx bxs-file-'.$arrData[$i]['file_ext'].'"></i>';
			}

			$arrData[$i]['file_name'] = '	
				<p id="fileName" data-idname_file ="'.$arrData[$i]['id_file'].'" data-name_file="'.$arrData[$i]['file_name'].'" contenteditable>'.$arrData[$i]['file_name'].'</p>';
			$arrData[$i]['opciones'] =
					'<div class="box-options">
						<i class="bx bxs-trash delFile delete" onclick="delFile('.$arrData[$i]['id_file'].')"></i>
						<a href="'.$arrData[$i]['file_ruta'].'file/'.$name.'" download="'.$name.'">
							<i class="bx bxs-cloud-download dowload"></i>
						</a>
					</div>';
			$arrData[$i]['file_date_mod'] = formatear_fecha($arrData[$i]['file_date_mod']);
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}
	/* subir y agregar files en la base de datos */
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
				$fileData = pathinfo($file['name']);
				$fileExtension = strtolower($fileData['extension']);
				$arrData = $this->model->setFiles($_SESSION['idUser'],$filename,$fileSize.'MB',$_SESSION['ruta'],$fileExtension);
				// se incrementa para poder usarlo para enviar un msj de exito
				$cont ++;
			}
			if($cont == count($_FILES)){
				if($cont == 0){
						$arrResponse = ['msg' => $msg,'status' => false];
				}else{
					$msg = ( $cont > 1 ? 'Se subieron ' . $cont . ' archivos con éxito' : 'Se subió ' . $cont . ' archivo con éxito' );
					$arrResponse = ['msg' => $msg,'status' => true];
				}
			}
		}else{
			$arrResponse = ["status" => false, "msg" => "No se a cargado ningun archivo"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

		// actualizar en vivo
	public function updateFileLive(){
		$intFile = $_POST['idname_file'];
		$textFile = $_POST['textFile'];
		$name_file = $_POST['name_file'];
		$selecFile = "";
		$oldName = $_SESSION['ruta'].'/file'.'/'.$name_file;
		$newName = $_SESSION['ruta'].'/file'.'/'.$textFile;
		if(rename($oldName,$newName)){
			$request = $this->model->updateFileLive($intFile,$_SESSION['idUser'],$textFile);
			if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Archivo renombrado exitoso");
			}else{
				$arrResponse = array("status" => false, "msg" => "Error al actualizar datos");
			}
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