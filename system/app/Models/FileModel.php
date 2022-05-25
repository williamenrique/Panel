<?php
class FileModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;
	private $intIdUser;
	private $intFileStatus;
	private $strText;
	private $strColumn;
	private $strFileExt;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	public function getFiles(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT * FROM table_file WHERE id_user = $this->intIdUser";
		$request = $this->select_all($sql);
		return $request;
	}
	public function setFiles(int $intIdUser, string $strFileName, string $strFileSize, string $strFileRtuta, string $strFileExt){
		$this->intIdUser = $intIdUser;
		$this->strFileName = $strFileName;
		$this->strFileSize = $strFileSize;
		$this->strFileRtuta = $strFileRtuta;
		$this->strFileExt = $strFileExt;
		$this->intFileStatus = 1;
		$sql = "INSERT INTO table_file(id_user,file_name,file_size,file_ruta,file_ext,file_status) VALUES(?,?,?,?,?,?)";
		$arrData = array($this->intIdUser,$this->strFileName,$this->strFileSize,$this->strFileRtuta,$this->strFileExt,$this->intFileStatus);
		$request = $this->insert($sql, $arrData);
		return $request;
	}

	public function getFile(int $intIdFile, int $intIdUser){
		$this->intIdFile = $intIdFile;
		$this->intIdUser = $intIdUser;
		$sql = "SELECT * FROM table_file WHERE id_file = $this->intIdFile AND id_user = $this->intIdUser";
		$request = $this->select($sql);
		return $request;
	}
	public function updateFileLive(int $intIdFile, int $intIdUser, string $strText){
		$this->intIdFile = $intIdFile;
		$this->intIdUser = $intIdUser;
		$this->strText = $strText;
		$sql = "UPDATE table_file SET file_name = ? WHERE id_file = $this->intIdFile AND id_user = $this->intIdUser";
		$arrData = array($this->strText);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function deleteFile(int $intIdFile, int $intIdUser){
		$this->intIdFile = $intIdFile;
		$this->intIdUser = $intIdUser;
		$sql = "DELETE FROM table_file WHERE id_file = $this->intIdFile AND id_user = $this->intIdUser";
		$request = $this->delete($sql);
		return $request;
	}
}