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
		$data['page_menu_open'] = "empty";
		$data['page_link'] = "home";
		$data['page_function'] = "function.home.js";
		$this->views->getViews($this, "home", $data);
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