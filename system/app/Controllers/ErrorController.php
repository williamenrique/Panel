<?php

class Errors extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function notFound(){
		$data['page_title'] = "Error 404";
		$this->views->getViews($this, "error",$data);
	}
	public function forbidden(){
		$data['page_title'] = "Error 403";
		$this->views->getViews($this, "forbidden",$data);
	}
}
$notFound = new Errors();
$notFound->notFound();
// $forbidden = new Errors();
// $forbidden->forbidden();