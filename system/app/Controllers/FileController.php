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
}