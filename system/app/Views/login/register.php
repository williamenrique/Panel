<?php headAcceso($data)?>
		<main class="main">
			<div class="col1">
				<div class="box-img">
					<img src="<?= IMG ?>register-v2-dark.svg" alt="">
				</div>
			</div>
			<div class="col2">
				<div class="box-form-login">
					<h1 class="title">La aventura comienza aquí!</h1>
					<p class="sub-title">
						¡Haga que la administración de su aplicación sea fácil y divertida!
					</p>
					<form class="formRegister">
						<div class="box-input">
							<label for="txtNombRegister">nombre</label>
							<input type="text" name="txtNombRegister" id="txtNombRegister" required>
						</div>
						<div class="box-input">
							<label for="txtEmailRegister">email</label>
							<input type="text" name="txtEmailRegister" id="txtEmailRegister" required>
						</div>
						<div class="box-input">
							<label for="txtPassRegister">Password</label>
							<input type="text" name="txtPassRegister" id="txtPassRegister" required>
						</div>
						<div class="box-input">
							<label for="txtPassRegisterConfirm">Confirme Password</label>
							<input type="text" name="txtPassRegisterConfirm" id="txtPassRegisterConfirm" required>
						</div>
						<div class="box-input">
							<input type="checkbox" name="txtCheckRemember" id="txtCheckRemember">
							<label for="txtCheckRemember" id="txtCheckRemember">Acepto la politica de privacidad y los
								terminos</label>
						</div>
						<div class="box-input">
							<button type="submit" class="btn btnRegister">Crear Cuenta</button>
						</div>
					</form>
					<span class="text">
						¿Ya tienes una cuenta? <a href="<?= base_url()?>">Inicia session </a>
					</span>
					<div class="divider">
						<span></span>
						<i class='bx bx-radio-circle'></i>
						<span></span>
					</div>
				</div>
			</div>
		</main>

<?php footerAcceso($data)?>
