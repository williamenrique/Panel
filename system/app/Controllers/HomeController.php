<?php
class Home extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['strVarLogin'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "empty";
		$data['page_link_active'] = "empty";
		$data['page_link'] = "home";
		$data['page_function'] = "function.home.js";
		$this->views->getViews($this, "home", $data);
	}
	public function listarEvents(){
		$userId = $_SESSION['user_id'];
		$requestData = $this->model->listarEvents($userId);
		echo json_encode($requestData,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function actionEvent(){
		$userId = $_SESSION['user_id'];
		
		switch ($_POST['accion']) {
			case 'event':
				$txtTituloEvento = $_POST['txtTituloEvento'];
				$txtInicio = $_POST['txtInicio'];
				$txtFin = $_POST['txtFin'];
				$txtColor = $_POST['txtColor'];
				$txtDescript = '';
				if($_POST['idEvent'] == ''){
					if($txtTituloEvento == ''){
						$arrResponse = ['msg' => 'Debe colocar un titulo', 'status' => false];
					}else{
						$requestData = $this->model->setEvents($txtTituloEvento,$txtInicio,$txtFin,$txtColor,$txtDescript,$userId);
						if($requestData){
							$arrResponse = ['msg' => 'Evento Creado', 'status' => true];
						}else{
							$arrResponse = ['msg' => 'Debe colocar un titulo y un inicio', 'status' => false];
						}
					}
				}else{
					$requestData = $this->model->updateEvents($_POST['idEvent'],$txtTituloEvento,$txtInicio,$txtFin,$txtColor,$txtDescript,$userId);
					if($requestData){
						$arrResponse = ['msg' => 'Evento Editado', 'status' => true];
					}else{
						$arrResponse = ['msg' => 'ocurrio un error al editar evento', 'status' => false];
					}
				}
				break;
			
			case 'delete':
				$idEvent = $_POST['idEvent'];
				$requestData = $this->model->deleteEvent($idEvent,$userId);
				if($requestData){
					$arrResponse = ['msg' => 'Evento eliminado', 'status' => true];
				}else{
					$arrResponse = ['msg' => 'No se pudo eliminar', 'status' => false];
				}
				break;
			case 'drop':
				$idEvent = $_POST['idEvent'];
				$txtInicio = $_POST['start'];
				$txtFin = $_POST['end'];
				$requestData = $this->model->dropEvent($idEvent,$userId,$txtInicio,$txtFin);
				if($requestData){
					$arrResponse = ['msg' => 'Evento movido', 'status' => true];
				}else{
					$arrResponse = ['msg' => 'No se pudo mover', 'status' => false];
				}
				break;
		}

		
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function countSites(){
		$arrData = $this->model->countSites();
		$htmlOptions = "";
		if(empty($arrData)){
			$htmlOptions .= '
				<span class="alert-table">0 Sitios</span>
						';
		}else{

			$htmlOptions ='
			<span class="alert-table">'.count($arrData).' Sitios</span>
			';
		}
		echo $htmlOptions;
		die();
	}

}