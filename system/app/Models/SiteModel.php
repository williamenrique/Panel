<?php
class SiteModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;
	private $intSite;
	private $intUserId;
	private $strTextSitio;
	private $strColumn;

	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	/**********************************
		obtener todos los sitios
	**********************************/
	public function getSites(int $priority, int $favorite, int $intIdUser){
		$this->priority = $priority;
		$this->favorite = $favorite;
		$this->intIdUser = $intIdUser;
		if($this->priority == 0){
			// deshabilitados
			$sql = "SELECT * FROM table_sitio WHERE status = 0 AND user_id = $this->intIdUser";
		}
		if($this->priority == 1){
			// todos los activos
		 	$sql = "SELECT * FROM table_sitio WHERE favorite = $this->favorite AND status != 0 AND user_id = $this->intIdUser";
		}
		if($this->priority == 2){
			// todos los activos y favoritos
		 	$sql = "SELECT * FROM table_sitio WHERE status != 0 AND user_id = $this->intIdUser";
		 	// $sql = "SELECT * FROM table_sitio WHERE favorite = $this->favorite AND status != 0 AND user_id = $this->intIdUser";
		}
		// echo $sql;
		$request = $this->select_all($sql);
		return $request;
	}
	/**********************************
		seleccionar un sitio para editarlo
	**********************************/
	public function getSite(int $intSitio, int $intIdUser){
		$this->intSitio = $intSitio;
		$this->intIdUser = $intIdUser;
		$sql = "SELECT * FROM table_sitio WHERE idSitio = $this->intSitio AND user_id = $this->intIdUser";
		$request = $this->select($sql);
		return $request;
	}
	/**********************************
		agregar un sitio
	**********************************/
	public function setSitio( string $strSitio,string $strUsuario,string $strPass,string $strUrl, int $intUserId){
		$this->intUserId = $intUserId;
		$this->strSitio = $strSitio;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strUrl = $strUrl;
		$this->intStatus = 1;
		$this->intFavorite = 0;
		$sql = "INSERT INTO table_sitio(sitio,usuario,pass,url,favorite,user_id,status) VALUES (?,?,?,?,?,?,?)";
		$arrData = array($this->strSitio, $this->strUsuario, $this->strPass, $this->strUrl,$this->intFavorite,$this->intUserId ,$this->intStatus);
		$request = $this->insert($sql,$arrData);
		return $request;
	}
	/**********************************
		eliminar un sitio
	**********************************/
	public function delSite(int $intSitio, int $status){
		$this->intSitio = $intSitio;
		$this->status = $status;
		$sql = "UPDATE table_sitio SET status = ? , favorite = ? WHERE  idSitio = $this->intSitio";
		$arrData = array($this->status, 0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	/**********************************
		cambiar el estado del sitio sitio
	**********************************/
	public function favoriteSite(int $intSitio, int $fav){
		$this->intSitio = $intSitio;
		$this->fav = $fav;
		$sql = "UPDATE table_sitio SET favorite = ? WHERE  idSitio = $this->intSitio";
		$arrData = array($this->fav);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	/**********************************
		actualizar un sitio live
	**********************************/
	public function updateSiteLive(int $intSite, string $textSite,string $column){
		$this->intSite = $intSite;
		$this->strTextSitio = $textSite;
		$this->strColumn = $column;
		$sql = "UPDATE table_sitio SET $this->strColumn = ? WHERE idSitio = $this->intSite";
		$arrData = array($this->strTextSitio);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	/**********************************
		actualizar un sitio
	**********************************/
	public function updateSite(int $intSite, string $strSitio,string $strUsuario,string $strPass,string $strUrl){
		$this->intSite = $intSite;
		$this->strSitio = $strSitio;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strUrl = $strUrl;
		$this->intStatus = 1;
		$sql = "UPDATE table_sitio SET sitio = ? ,usuario = ? ,pass = ?, url = ?, status = ?  WHERE idSitio = $this->intSite";
		$arrData = array($this->strSitio, $this->strUsuario, $this->strPass, $this->strUrl, $this->intStatus);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}