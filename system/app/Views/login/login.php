<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="../../../src/css/styleLogin.css">
</head>
<body>
	

	<div class="container">
		<div class="tabs">
			<ul class="box-tabs">
				<li class="tab active">Login</li>
				<li class="tab">Registro</li>
			</ul>
			<section class="box-tabs-cont">
				<div class="box-tab active">
					<div class="heading">
						<h3 class="title">
							<span>B</span>ienvenido de vuelta
						</h3>
						<h6 class="text">Introduzca sus credenciales para ingresar al sistema</h6>
						<div class="separate"></div>
					</div>
					<form class="formLogin">
						<div class="box-input">
							<input type="text" name="txtUsuarioLogin" id="txtUsuarioLogin" required>
							<label class="label">
								<span class="span">Usuario</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" name="txtPassLogin" id="txtPassLogin" required>
							<label class="label">
								<span class="span">Password</span>
							</label>
						</div>
						<button type="submit" class="btn btnLogin">ingresar</button>
					</form>
				</div>
				<div class="box-tab">
					<div class="heading">
							<h3 class="title">
							<span>B</span>ienvenido al sistema
						</h3>
						<h6 class="text">llene los campos para registrarse en el sistema</h6>
						<div class="separate"></div>
					</div>
					<form class="formRegister">
						<div class="box-input">
							<input type="text" name="txtEmailRegister" id="txtEmailRegister" required>
							<label class="label">
								<span class="span">Email</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" name="txtPassRegister" id="txtPassRegister" required>
							<label class="label">
								<span class="span">Password</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" name="txtPassRegisterConfirm" id="txtPassRegisterConfirm" required>
							<label class="label">
								<span class="span">Confirme Password</span>
							</label>
						</div>
						<button type="submit" class="btn btnRegister">registrarse</button>
					</form>
				</div>
			</section>
		</div>
	</div>

	
	<script src="https://kit.fontawesome.com/0edefeb486.js" crossorigin="anonymous"></script>
	<script src="../../../src/js/function.login.js"></script>
</body>
</html>