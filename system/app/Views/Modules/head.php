<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $data['page_tag']?></title>
		<link rel="shortcut icon" href="<?= IMG ?>favicon(2).png" type="image/x-icon">
		<link rel="stylesheet" href="<?= PLUGINS ?>fullcalendar-5.11.0/main.min.css">
		<link rel="stylesheet" href="<?= PLUGINS ?>dataTable/jquery.dataTables.min.css">
		<link rel="stylesheet" href="<?= PLUGINS ?>dataTable/datatables.min.css">
		<link rel="stylesheet" href="<?= PLUGINS ?>dataTable/responsive.dataTables.min.css">
		<link rel="stylesheet" href="<?= CSS?>sweetcolor.css">
		<link rel="stylesheet" href="<?= CSS?>styles.css">
		<link rel="stylesheet" href="<?= CSS?>table.css">
</head>
<body>
	<header class="header-nav">
		<div class="box-logo">
			<div class="box-img">
				<img src="<?= IMG ?>logo-1-dark.svg" alt="">
			</div>
			<span class="show">
				<i class='bx bx-chevrons-left'></i>
			</span>
		</div>
		<div class="box-notificacion">
			<i class='bx bxs-bell'></i>
		</div>
	</header>

	<div class="box-main">
		<!-- navegacion lateral -->
		<section class="section-nav">
			<div class="head-nav">
				<div class="img_user"></div>
				<div class="info_user">
					<h6 class="nameUser"><?= $_SESSION['nombre']?></h6>
					<h6 class="emailUSer"><?= $_SESSION['email']?></h6>
				</div>
			</div>
			<nav class="nav">
				<ul class="list">
					<!-- item solo -->
					<li class="list__item home">
						<div class="list__button">
							<i class='bx bx-home list_icon'></i>
							<a href="<?= base_url()?>" class="nav__link home">Inicio</a>
						</div>
					</li>
					<!-- item solo -->
					<li class="list__item sitio">
						<div class="list__button">
							<i class='bx bx-world list_icon'></i>
							<a href="<?= base_url()?>site" class="nav__link site">Sitio web</a>
						</div>
					</li>
					<!-- desplegable -->
					<li class="list__item list__item--click cuenta">
						<div class="list__button button_click cuenta_active">
							<i class='bx bx-key list_icon'></i>
							<a href="#" class="nav__link">Cuentas</a>
							<i class='bx bx-chevron-right list__arrow'></i>
						</div>
						<!-- la lista que se desplegara -->

						<ul class="list__show">
							<li class="list__inside">
								<i class='bx bx-radio-circle-marked'></i>
								<a href="<?= base_url()?>cuenta" class="nav__link nav__link--inside">Cuentas</a>
							</li>
							<li class="list__inside">
								<i class='bx bx-radio-circle-marked'></i>
								<a href="<?= base_url()?>cuenta/agregar" class="nav__link nav__link--inside">Agregar cuenta</a>
							</li>
						</ul>
					</li>
					<!-- item solo -->
					<li class="list__item files">
						<div class="list__button">
							<i class='bx bx-home list_icon'></i>
							<a href="<?= base_url()?>file" class="nav__link home">Administrador de archivos</a>
						</div>
					</li>
					<!-- desplegable -->
					<li class="list__item list__item--click">
						<div class="list__button button_click">
							<i class='bx bx-bar-chart-square list_icon'></i>
							<a href="#" class="nav__link">Pages</a>
							<i class='bx bx-chevron-right list__arrow'></i>
						</div>
						<!-- la lista que se desplegara -->
						<ul class="list__show">
							<li class="list__inside">
								<i class='bx bx-radio-circle-marked'></i>
								<a href="pages/404.html" target="_blank" class="nav__link nav__link--inside">404</a>
							</li>
						</ul>
					</li>
					<!-- item solo -->
					
				</ul>
			</nav>
			<div class="footer-nav">
				<a href="pages/profile.html">
					<i class='bx bx-user icon-active'></i>
				</a>
				<a href="#">
					<i class='bx bx-cog'></i>
				</a>
				<a href="<?= base_url()?>login/logout">
					<i class='bx bx-log-out'></i>
				</a>
				<span class="show_menu">
					<i class='bx bx-chevrons-left show_menu'></i>
				</span>
			</div>
		</section>
		<!-- navegacion lateral end -->
		<!-- contenido principal -->
		<div class="main my">
			<div class="container">	