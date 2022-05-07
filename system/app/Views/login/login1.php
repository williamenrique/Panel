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
	<section class="side">
		<img src="../../../src/images/img.svg" alt="">
	</section>

	<section class="main">
		<div class="login-container">
			<p class="title">Bienvenido de nuevo</p>
			<div class="separator"></div>
			<p class="welcome-message">Por favor, proporcione la credencial de inicio de sesión para continuar y tener acceso a todos nuestros servicios.</p>

			<form class="login-form">
					<div class="form-control">
							<input type="text" placeholder="Usuario" id="txtUserLogin" name="txtUserLogin">
							<i class="fas fa-user"></i>
					</div>
					<div class="form-control">
							<input type="password" placeholder="Password" id="txtPassLogin" name="txtPassLogin">
							<i class="fas fa-lock"></i>
					</div>
					<button class="submit">Login</button>
			</form>
		</div>
	</section>
	<script src="https://kit.fontawesome.com/0edefeb486.js" crossorigin="anonymous"></script>
</body>
</html>