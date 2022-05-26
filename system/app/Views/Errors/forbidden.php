<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
		<title>404</title>

		<style>
	@import url("https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css");
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");
* {
  font-family: 'Poppins',sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-transform: capitalize;
  text-decoration: none;
  transition: 0.3s ease;
}

.btn {
  background: #3699FF;
  color: #fff;
  padding: 10px 14px;
  text-align: center;
  border-radius: 6px;
  text-transform: uppercase;
  cursor: pointer;
}

.btn:hover {
  box-shadow: 0px 1px 18px 0px rgba(22, 29, 49, 0.76);
}

html {
  font-size: 62.5%;
  background: #161D31;
  color: #B6B9C8;
  overflow: hidden;
  font-family: 'Poppins';
}

.main {
  display: flex;
}

.main .col1 {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.main-404 {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  height: 100vh;
  padding: 3rem;
  overflow: hidden;
}

.h2-title-404 {
  font-size: 28px;
  font-weight: 300;
}

.p-title-404 {
  font-size: 14px;
  font-weight: 300;
  width: 70%;
  text-align: center;
}

.box-img-404 {
  width: 400px;
}

.box-img-404 img {
  width: 100%;
}

.btn-404 {
  margin: 4rem;
  width: 180px;
  font-size: 14px;
}
/*# sourceMappingURL=login.css.map */
		</style>

<body>
		<div class="main-404">
			<h2 class="h2-title-404">¡Usted no está autorizado! 🔐</h2>
			<p class="p-title-404">El sitio esta indexado para poder ingresar a las URL que necesite , oh la pagina que esta
				buscando no existe.
			</p>
			<a href="<?= base_url()?>" class="btn btn-404">volver atras</a>
			<div class="box-img-404">
				<img src="<?= IMG ?>not-authorized-dark.svg" alt="">
			</div>
		</div>
	</body>

</html>