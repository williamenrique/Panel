<?php
class NotaModel extends Mysql {
	// declaramos variables para el uso interno
	private $intUserId;

	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
}