<?php head($data)?>
<div class="box">
	<div class="box-add-cuenta">
		<form class="form-add-cuenta">
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
					<label class="label" for="txtNTarjeta">Fecha de vencimiento</label>
					<input type="text" id="txtNTarjeta" name="txtNTarjeta">
				</div>
				<div class="box-input">
					<label class="label" for="txtNTarjeta">ccv</label>
					<input type="text" id="txtCcv" name="txtCcv" required>
				</div>
				<div class="box-input">
					<label class="label" for="txtNTarjeta">clave de cajero</label>
					<input type="text" id="txtPassCajero" name="txtPassCajero" required>
				</div>
				<div class="box-input">
					<label class="label">usuario</label>
					<input type="text" id="txtUsuario" name="txtUsuario" required>
				</div>
				<div class="box-input">
					<label class="label">clave internet</label>
					<input type="text" id="txtPassInt" name="txtPassInt" required>
				</div>
				<div class="box-input">
					<label class="label">clave especial</label>
					<input type="text" id="txtPasssSpecial" name="txtPasssSpecial" required>
				</div>
				<div class="box-input">
					<label class="label">clave TLF</label>
					<input type="text" id="txtPassTlf" name="txtPassTlf" required >
				</div>

					<!-- <span class="titleSpan">clave TLF</span> -->
					<div class="box-input">
						<div class="radiogroup">
						<input type="radio" class="radio_input" name="radio1" id="radio1">
						<label for="radio1" class="radio_label">Corriente</label>
						<input type="radio" class="radio_input" name="radio1" id="radio2">
						<label for="radio2" class="radio_label">ahorro</label>
					</div>
					<div class="radiogroup">
						<input type="radio" class="radio_input" name="radio1" id="radio1">
						<label for="radio1" class="radio_label">propia</label>
						<input type="radio" class="radio_input" name="radio1" id="radio2">
						<label for="radio2" class="radio_label">tercero</label>
					</div>
					</div>
			</div>
		</form>
	</div>
</div>

<?php footer($data)?>