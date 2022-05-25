<?php head($data)?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<h4>Cuentas</h4>
	<span class="separate"></span>
	<div class="breadcrumbs_ruta">
		<a href="<?= base_url() ?>" class="breadcrumbs_home">Inicio</a>
		<i class='bx bx-chevron-right'></i>
		<a href="#">Cuentas</a>
		<i class='bx bx-chevron-right'></i>
		<span>Agregar</span>
	</div>
</div>
<!-- end breadcrumbs -->
<div class="box">
	<div class="box-add-cuenta">
		<form class="form-add-cuenta">
			<?php if(isset($_GET['id'])):?>
					<input type="hidden" id="txtInputID" name="txtInputID" value="<?= $_GET['id']?>">
			<?php endif;?>
			<div class="row">
				<div class="box-input">
					<label class="label" for="txtNombre"> nombre de cuenta</label>
					<input type="text" id="txtNombre" name="txtNombre">
				</div>
				<div class="box-input">
					<label class="label" for="txtNombre">Seleccione banco</label>
					<select name="listBank" id="listBank" class="listBank">
						<option value="0">Seleccione</option>
					</select>
				</div>
				<div class="box-input">
					<label class="label" for="txtNCuenta">numero de cuenta	</label>
					<input type="text" id="txtNCuenta" name="txtNCuenta">
				</div>
				<div class="box-input">
					<label class="label" for="txtNTarjeta">numero de tarjeta</label>
					<input type="text" id="txtNTarjeta" name="txtNTarjeta">
				</div>
			</div>

			<div class="row">
				<div class="box-input">
					<label class="label" for="txtFechaVenc">Fecha de vencimiento</label>
					<input type="text" id="txtFechaVenc" name="txtFechaVenc">
				</div>
				<div class="box-input">
					<label class="label" for="txtCcv">ccv</label>
					<input type="text" id="txtCcv" name="txtCcv">
				</div>
				<div class="box-input">
					<label class="label" for="txtPassCajero">clave de cajero</label>
					<input type="text" id="txtPassCajero" name="txtPassCajero">
				</div>
				<div class="box-input">
					<label class="label">usuario</label>
					<input type="text" id="txtUsuario" name="txtUsuario">
				</div>
				<div class="box-input">
					<label class="label">clave internet</label>
					<input type="text" id="txtPassInt" name="txtPassInt">
				</div>
				<div class="box-input">
					<label class="label">clave especial</label>
					<input type="text" id="txtPasssSpecial" name="txtPasssSpecial">
				</div>
				<div class="box-input">
					<label class="label">clave TLF</label>
					<input type="text" id="txtPassTlf" name="txtPassTlf" >
				</div>
			
					<!-- <span class="titleSpan">clave TLF</span> -->
				<div class="box-input">
					<label class="label">Tipo cuenta</label>
					<div class="radiogroup">
						<input type="radio" class="radio_input" name="tipoCuenta" id="corriente" value="1">
						<label for="corriente" class="radio_label">Corriente</label>
						<input type="radio" class="radio_input" name="tipoCuenta" id="ahorro" value="0">
						<label for="ahorro" class="radio_label">ahorro</label>
					</div>
				</div>
				<div class="box-input">
					<label class="label">Titular cuenta</label>
					<div class="radiogroup">
						<input type="radio" class="radio_input" name="cuentaAut" id="propia" value="1">
						<label for="propia" class="radio_label">propia</label>
						<input type="radio" class="radio_input" name="cuentaAut" id="tercero" value="0">
						<label for="tercero" class="radio_label">tercero</label>
					</div>
				</div>
			</div>
			<div class="divider"></div>

			<div class="row">
				<div class="box-1">
					<div class="box-input">
						<label class="label" >pregunta 1</label>
						<input type="text" id="txtP1" name="txtP1">
					</div>
					<div class="box-input">
						<label class="label">respuesta 1</label>
						<input type="text"id="txtR1" name="txtR1" >
					</div>
				</div>
				<div class="box-1">
					<div class="box-input">
						<label class="label" >pregunta 2</label>
						<input type="text" id="txtP2" name="txtP2">
					</div>
					<div class="box-input">
						<label class="label">respuesta 2</label>
						<input type="text" id="txtR2" name="txtR2">
					</div>
				</div>
				<div class="box-1">
					<div class="box-input">
						<label class="label" >pregunta 3</label>
						<input type="text" id="txtP3" name="txtP3">
					</div>
					<div class="box-input">
						<label class="label">respuesta 3</label>
						<input type="text" id="txtR3" name="txtR3">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btnAddC btn-primary">
				<i class='bx bx-plus-medical'></i>Agregar
			</button>
			<button type="submit" class="btn btnEditCuenta btn-warning">
				<i class='bx bx-edit-alt' ></i>Actualizar
			</button>
		</form>
	</div>
</div>

<?php footer($data)?>