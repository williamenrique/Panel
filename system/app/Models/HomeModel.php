<?php
class HomeModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;
	private $intSite;
	private $userId;
	private $intIdEvent;
	private $titleEvent;
	private $startEvent;
	private $endEvent;
	private $colorEvent;
	private $descriptEvent;

	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}

	public function listarEvents(int $intUser){
		$this->intUser = $intUser;
		$sql = "SELECT * , id_evento AS id FROM table_evento WHERE id_user = $this->intUser";
		$request = $this->select_All($sql);
		return $request;
	}
	public function deleteEvent(int $intIdEvent, int $intUser){
		$this->intIdEvent = $intIdEvent;
		$this->intUser = $intUser;
		$sql = "DELETE FROM table_evento WHERE id_evento = $this->intIdEvent AND id_user = $this->intUser";
		$request = $this->delete($sql);
		return $request;
	}
	public function dropEvent(int $intIdEvent, int $userId, string $startEvent, string $endEvent){
	 $this->userId = $userId;
	 $this->intIdEvent = $intIdEvent;
	 $this->startEvent = $startEvent;
	 $this->endEvent = $endEvent;
	 $sql = "UPDATE table_evento SET start = ?  WHERE id_evento = $this->intIdEvent ";
	 $arrData = array($this->startEvent);
	 $request = $this->update($sql, $arrData);
	 return $request;
	}
	public function setEvents (string $titleEvent, string $startEvent, string $endEvent, string $colorEvent,string $descriptEvent,int $userId){
		$this->userId = $userId;
		$this->titleEvent = $titleEvent;
		$this->startEvent = $startEvent;
		$this->endEvent = $endEvent;
		$this->colorEvent = $colorEvent;
		$this->descriptEvent = $descriptEvent;
		$sql = "INSERT INTO table_evento(title,start,end,color,descript,id_user) VALUES(?,?,?,?,?,?)";
		$arrData = array($this->titleEvent,$this->startEvent,$this->endEvent,$this->colorEvent,$this->descriptEvent,$this->userId);
		$request = $this->insert($sql,$arrData);
		return $request;
	}
	public function UpdateEvents (int $intIdEvent, string $titleEvent, string $startEvent, string $endEvent, string $colorEvent,string $descriptEvent,int $userId){
		$this->intIdEvent = $intIdEvent;
		$this->userId = $userId;
		$this->titleEvent = $titleEvent;
		$this->startEvent = $startEvent;
		$this->endEvent = $endEvent;
		$this->colorEvent = $colorEvent;
		$this->descriptEvent = $descriptEvent;
		$sql = "UPDATE table_evento SET title = ? ,start = ? , end = ? , color = ?, descript = ? WHERE id_evento = $this->intIdEvent";
		$arrData = array($this->titleEvent,$this->startEvent,$this->endEvent,$this->colorEvent,$this->descriptEvent);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function countSites(){
		$sql = "SELECT * FROM table_sitio WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
}