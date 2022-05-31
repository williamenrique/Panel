<?php
header('Access-Control-Allow-Origin: *');
class Cuenta extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['strVarLogin'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function cuenta(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Cuenta Propia - Personal";
		$data['page_title'] = "Pagina Principal";
			$data['page_menu_open'] = "cuenta";
		$data['page_link'] = "agregar";
		$data['page_link_active'] = "agregar_link";
		$data['page_function'] = "function.cuenta.js";
		$this->views->getViews($this, "cuenta", $data);
	}
	
	public function getCuentaP(){
		$priority = intval($_GET['priority']);
		$arrData = $this->model->getCuentaP($priority);
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['opciones'] =
					'<div class="box-options">
						<i class="bx bxs-trash delCuenta delete" onclick="delCuenta('.$arrData[$i]['idCuenta'].')"></i>
						<a href="'.base_url().'cuenta/agregar/?id='.$arrData[$i]['idCuenta'].'">
							<i class="bx bx-edit-alt editCuenta edit" onclick="editCuenta('.$arrData[$i]['idCuenta'].')"></i>
						</a>
					</div>';
			$arrData[$i]['fechaAct'] = formatear_fecha($arrData[$i]['fechaAct']);
			if($arrData[$i]['tipoC'] == 0){
				$arrData[$i]['tipoC'] = 'Ahorro';
			}else{
				$arrData[$i]['tipoC'] = 'Corriente';
			}
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function statusCuenta(){
		if($_POST){
			$idCuenta = intval($_POST['intIdCuenta']);
			$status = intval($_POST['status']);
			$requestDel = $this->model->statusCuenta($idCuenta,$status);
			if($requestDel){
				if($status == 0){$message = 'Cuenta eliminado';}
				if($status == 1){$message = 'Cuenta restaurado';}
				$arrResponse = array('status' => true, 'msg' => $message);
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
		/****************************************************************************************
	****************************************************************************************/
	public function agregar(){
		
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Agregar cuenta - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "cuenta";
		$data['page_link'] = "agregar";
		$data['page_link_active'] = "agregar_link";
		$data['page_function'] = "function.cuenta.js";
		$this->views->getViews($this, "agregar", $data);	
	}

	public function getBank(){
		$htmlOptions = "";
		$arrData = $this->model->selectBank();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['cod'].'">'.$arrData[$i]['banco'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}

	public function addCuent(){
		$strNombre = $_POST['txtNombre'];
		$strNTarjeta = $_POST['txtNTarjeta'];
		$strNCuenta = $_POST['txtNCuenta'];
		$strFechaVenc = $_POST['txtFechaVenc'];
		$strPassCajero = $_POST['txtPassCajero'];
		$strUsuario = $_POST['txtUsuario'];
		$strPassInt = $_POST['txtPassInt'];
		$strPasssSpecial = $_POST['txtPasssSpecial'];
		$strPassTlf = $_POST['txtPassTlf'];
		$strP1 = $_POST['txtP1'];
		$strR1 = $_POST['txtR1'];
		$strP2 = $_POST['txtP2'];
		$strR2 = $_POST['txtR2'];
		$strP3 = $_POST['txtP3'];
		$strR3 = $_POST['txtR3'];

		$intListBank = $_POST['listBank'];
		$intTipoCuenta = $_POST['tipoCuenta'];
		$intCuentaAut = $_POST['cuentaAut'];
		$intCcv = $_POST['txtCcv'];
		
		$request = $this->model->insertCuenta($intListBank,$intTipoCuenta,$intCuentaAut,$intCcv,$strNombre,$strNTarjeta,$strNCuenta,$strPassCajero,$strUsuario,$strPassInt,$strPasssSpecial,$strPassTlf,$strP1,$strR1,$strP2,$strR2,$strP3,$strR3,$strFechaVenc);
		if($request > 0){
			$arrResponse = array("status" => true, "msg" => "Cuenta agregada");
		}else{
			$arrResponse = array("status" => false, "msg" => "Atencion! imposible almacenar datos");
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	}
	public function getEditCuenta(){
		$intIdCuenta = $_POST['inputIdCuenta'];
		$arrData = $this->model->getCuentaID($intIdCuenta);
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function updateCuenta(){
		$intInputID = $_POST['txtInputID'];
		$strNombre = $_POST['txtNombre'];
		$strNTarjeta = $_POST['txtNTarjeta'];
		$strNCuenta = $_POST['txtNCuenta'];
		$strFechaVenc = $_POST['txtFechaVenc'];
		$strPassCajero = $_POST['txtPassCajero'];
		$strUsuario = $_POST['txtUsuario'];
		$strPassInt = $_POST['txtPassInt'];
		$strPasssSpecial = $_POST['txtPasssSpecial'];
		$strPassTlf = $_POST['txtPassTlf'];
		$strP1 = $_POST['txtP1'];
		$strR1 = $_POST['txtR1'];
		$strP2 = $_POST['txtP2'];
		$strR2 = $_POST['txtR2'];
		$strP3 = $_POST['txtP3'];
		$strR3 = $_POST['txtR3'];

		$intListBank = $_POST['listBank'];
		$intTipoCuenta = $_POST['tipoCuenta'];
		$intCuentaAut = $_POST['cuentaAut'];
		$intCcv = $_POST['txtCcv'];
		$request = $this->model->updateCuenta($intInputID,$intListBank,$intTipoCuenta,$intCuentaAut,$intCcv,$strNombre,$strNTarjeta,$strNCuenta,$strPassCajero,$strUsuario,$strPassInt,$strPasssSpecial,$strPassTlf,$strP1,$strR1,$strP2,$strR2,$strP3,$strR3,$strFechaVenc);
		if($request > 0){
			$arrResponse = array("status" => true, "msg" => "Cuenta actualizada");
		}else{
			$arrResponse = array("status" => false, "msg" => "Atencion! imposible almacenar datos");
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	}
}
