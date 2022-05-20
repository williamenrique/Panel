
<?php headAcceso($data)?>
		<main class="main">
			<div class="col1">
				<div class="box-img">
					<img src="<?= IMG ?>login-v2-dark.svg" alt="">
				</div>
			</div>
			<div class="col2">
				<div class="box-form-login">
					<h1 class="title">¡Bienvenido de vuelta!</h1>
					<p class="sub-title">
						Inicia sesión en tu cuenta y comienza la aventura.
					</p>
					<form class="formLogin">
						<div class="box-input">
							<label for="txtEmailLogin">email</label>
							<input type="text" placeholder="Usuario" id="txtUserLogin" name="txtUserLogin">
						</div>
						<div class="box-input">
							<label for="txtEmailLogin">password</label>
							<input type="password" placeholder="Password" id="txtPassLogin" name="txtPassLogin">
						</div>
						<div class="box-input">
							<input type="checkbox" name="txtCheckRemember" id="txtCheckRemember">
							<label for="txtCheckRemember" id="txtCheckRemember">Recuerdame</label>
						</div>
						<div class="box-input">
							<button type="submit" class="btn btnLogin">Iniciar</button>
						</div>
					</form>
					<span class="text">
						¿Nuevo en nuestra plataforma? <a href="<?= base_url()?>register">Crea una cuenta</a>
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
