<?php
class CuentaModel extends Mysql {
	// declaramos variables para el uso interno
	private $intListBank;
	private $intTipoCuenta;
	private $intCuentaAut;
	private $intCcv;
	private $strNombre;
	private $strListBank;
	private $strNTarjeta;
	private $strNCuenta;
	private $strPassCajero;
	private $strUsuario;
	private $strPassInt;
	private $strPasssSpecial;
	private $strPassTlf;
	private $strP1;
	private $strR1;
	private $strP2;
	private $strR2;
	private $strP3;
	private $strR;
	private $priority;
	private $intIdCuenta;
	private $status;
	private $strFechaVenc;
	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}

	public function selectBank(){
		$sql = "SELECT * FROM table_banco";
		$request = $this->select_all($sql);
		return $request;
	}
	public function insertCuenta(int $intListBank,int $intTipoCuenta,int $intCuentaAut,int $intCcv,string $strNombre,string $strNTarjeta,string $strNCuenta,string $intPassCajero,string $strUsuario,string $strPassInt,string $strPasssSpecial,string $strPassTlf,string $strP1,string $strR1,string $strP2,string $strR2,string $strP3,string $strR3,string $strFechaVenc){
		$this->intListBank = $intListBank;
		$this->intTipoCuenta = $intTipoCuenta;
		$this->intCuentaAut = $intCuentaAut;
		$this->intPassCajero = $intPassCajero;
		$this->intCcv = $intCcv;
		$this->strNombre = $strNombre;
		$this->strNTarjeta = $strNTarjeta;
		$this->strNCuenta = $strNCuenta;
		$this->strUsuario = $strUsuario;
		$this->strPassInt = $strPassInt;
		$this->strPasssSpecial = $strPasssSpecial;
		$this->strPassTlf = $strPassTlf;
		$this->strFechaVenc = $strFechaVenc;
		$this->strP1 = $strP1;
		$this->strR1 = $strR1;
		$this->strP2 = $strP2;
		$this->strR2 = $strR2;
		$this->strP3 = $strP3;
		$this->strR3 = $strR3;

		$sql = "INSERT INTO table_cuenta (idUser,nombreAut,banco,tipoC,cuentaAut,nCuenta,nTarjeta,ccv,usuario,pass,passEspecial,claveTlf,passCajero,p1,r1,p2,r2,p3,r3,status,fecha_venc,fechaAct) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
		$arraData = array(1,$this->strNombre,$this->intListBank,$this->intTipoCuenta,$this->intCuentaAut,$this->strNCuenta,$this->strNTarjeta,$this->intCcv,$this->strUsuario,$this->strPassInt,$this->strPasssSpecial,$this->strPassTlf,$this->intPassCajero,$this->strP1,$this->strR1,$this->strP2,$this->strR2,$this->strP3,$this->strR3,1,$this->strFechaVenc);
		$request = $this->insert($sql,$arraData);
		return $request;
	}
	public function getCuentaP(int $priority){
		$this->priority = $priority;
		$sql = "SELECT * FROM table_cuenta tc JOIN table_banco tb WHERE 
		tb.cod = tc.banco AND tc.cuentaAut = $this->priority AND tc.status != 0;";
		// $sql = "SELECT * FROM table_cuenta WHERE cuentaAut = $this->priority AND status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
	public function statusCuenta(int $intIdCuenta, int $status){
		$this->intIdCuenta = $intIdCuenta;
		$this->status = $status;
		$sql = "UPDATE table_cuenta SET status = ? WHERE idCuenta = $this->intIdCuenta";
		$arrData = array($this->status);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	public function getCuentaID(int $intIdCuenta){
		$this-> intIdCuenta = $intIdCuenta;
		$sql = "SELECT * FROM table_cuenta t_c INNER JOIN table_banco t_b WHERE t_b.cod = t_c.banco AND  idCuenta = $this->intIdCuenta";
		$request = $this->select($sql);
		return $request;
	}

	public function updateCuenta(int $intIdCuenta,int $intListBank,int $intTipoCuenta,int $intCuentaAut,int $intCcv,string $strNombre,string $strNTarjeta,string $strNCuenta,string $intPassCajero,string $strUsuario,string $strPassInt,string $strPasssSpecial,string $strPassTlf,string $strP1,string $strR1,string $strP2,string $strR2,string $strP3,string $strR3,string $strFechaVenc){
		$this->intIdCuenta = $intIdCuenta;
		$this->intListBank = $intListBank;
		$this->intTipoCuenta = $intTipoCuenta;
		$this->intCuentaAut = $intCuentaAut;
		$this->intPassCajero = $intPassCajero;
		$this->intCcv = $intCcv;
		$this->strNombre = $strNombre;
		$this->strNTarjeta = $strNTarjeta;
		$this->strNCuenta = $strNCuenta;
		$this->strUsuario = $strUsuario;
		$this->strPassInt = $strPassInt;
		$this->strPasssSpecial = $strPasssSpecial;
		$this->strPassTlf = $strPassTlf;
		$this->strFechaVenc = $strFechaVenc;
		$this->strP1 = $strP1;
		$this->strR1 = $strR1;
		$this->strP2 = $strP2;
		$this->strR2 = $strR2;
		$this->strP3 = $strP3;
		$this->strR3 = $strR3;

		$sql = "UPDATE table_cuenta SET nombreAut = ?,banco = ?,tipoC = ?,cuentaAut = ?,nCuenta = ?,nTarjeta = ?,ccv = ?,usuario = ?,pass = ?,passEspecial = ?,claveTlf = ?,passCajero = ?,p1 = ?,r1 = ?,p2 = ?,r2 = ?,p3 = ?,r3 = ?,fecha_venc = ? WHERE idCuenta = $this->intIdCuenta";
		$arraData = array($this->strNombre,$this->intListBank,$this->intTipoCuenta,$this->intCuentaAut,$this->strNCuenta,$this->strNTarjeta,$this->intCcv,$this->strUsuario,$this->strPassInt,$this->strPasssSpecial,$this->strPassTlf,$this->intPassCajero,$this->strP1,$this->strR1,$this->strP2,$this->strR2,$this->strP3,$this->strR3,$this->strFechaVenc);
		$request = $this->update($sql,$arraData);
		return $request;
	}
}