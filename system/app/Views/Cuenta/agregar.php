<?php head($data)?>
<div class="container">
	<div class="heading">
		<h2 class="title"><span>A</span>gregar cuentas</h2>
	</div>

	<section class="box-form">
		<h6 class="title-box">Formulario para el ingreso de los datos de la cuenta</h6>
		<form class="form-add-cuenta">

			<div class="box-input">
				<input type="text" id="txtNombre" name="txtNombre" required>
				<label class="label" for="txtNombre">
					<span class="span"> nombre de cuenta</span>
				</label>
			</div>

			<div class="box-medio">
				<div class="box-radio">
					<label>
						<input type="radio" name="cuentaAut"  value="1" checked>
						<p class="span">propia</p>
					</label>
					<label>
						<input type="radio" name="cuentaAut"  value="0">
						<p class="span">tercero</p>
					</label>
				</div>
				<div class="box-radio">
					<label>
						<input type="radio" name="tipoCuenta"  value="1" checked>
						<p class="span">corriente</p>
					</label>
					<label>
						<input type="radio" name="tipoCuenta"  value="0">
						<p class="span">ahorro</p>
					</label>
				</div>
			</div>

			<div class="box-select">
				<select name="listBank" id="listBank" class="listBank">
					<option value="0">Seleccione</option>
				</select>
			</div>
			
			<div class="box-input">
				<input type="text" id="txtNCuenta" name="txtNCuenta" required>
				<label class="label" for="txtNCuenta">
					<span class="span"> numero de cuenta</span>
				</label>
			</div>
			<div class="box-input">
				<input type="text" id="txtNTarjeta" name="txtNTarjeta" required>
				<label class="label" for="txtNTarjeta">
					<span class="span">numero de tarjeta</span>
				</label>
			</div>

			<div class="box-medio">
				<div class="box-input box-ccv">
					<input type="text" id="txtCcv" name="txtCcv" required>
					<label class="label">
						<span class="span">ccv</span>
					</label>
				</div>
				<div class="box-input box-passCajero">
					<input type="text" id="txtPassCajero" name="txtPassCajero" required>
					<label class="label">
						<span class="span">clave cajero</span>
					</label>
				</div>
			</div>

			<div class="box-input">
				<input type="text" id="txtUsuario" name="txtUsuario" required>
				<label class="label">
					<span class="span">usuario</span>
				</label>
			</div>
			<div class="box-input">
				<input type="text" id="txtPassInt" name="txtPassInt" required>
				<label class="label">
					<span class="span">clave internet</span>
				</label>
			</div>
			<div class="box-input">
				<input type="text" id="txtPasssSpecial" name="txtPasssSpecial" required>
				<label class="label">
					<span class="span">clave especial</span>
				</label>
			</div>
			<div class="box-input">
				<input type="text" id="txtPassTlf" name="txtPassTlf" required >
				<label class="label">
					<span class="span">clave TLF</span>
				</label>
			</div>

			<div class="box-pregunta">
				<div class="box-1">
					<div class="box-input">
						<input type="text" id="txtP1" name="txtP1" required>
						<label class="label" for="p1">
							<span class="span">pregunta 1</span>
						</label>
					</div>
					<div class="box-input">
						<input type="text"id="txtR1" name="txtR1"  required>
						<label class="label">
							<span class="span">respuesta 1</span>
						</label>
					</div>
				</div>
				<div class="box-2">
					<div class="box-input">
						<input type="text" id="txtP2" name="txtP2" required>
						<label class="label" for="p1">
							<span class="span">pregunta 2</span>
						</label>
					</div>
					<div class="box-input">
						<input type="text" id="txtR2" name="txtR2" required>
						<label class="label">
							<span class="span">respuesta 2</span>
						</label>
					</div>
				</div>
				<div class="box-3">
					<div class="box-input">
						<input type="text" id="txtP3" name="txtP3" required>
						<label class="label" for="p1">
							<span class="span">pregunta 3</span>
						</label>
					</div>
					<div class="box-input">
						<input type="text" id="txtR3" name="txtR3" required>
						<label class="label">
							<span class="span">respuesta 3</span>
						</label>
					</div>
				</div>
			</div>
			<button type="button" class="btnAddC">Agregar</button>
		</form>
	</section>
</div>

<?php footer($data)?>