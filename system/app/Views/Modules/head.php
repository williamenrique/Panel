<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $data['page_tag']?></title>
		<link rel="shortcut icon" href="<?= IMG?>favicon(2).png" type="image/x-icon">
		<link rel="stylesheet" href="<?= CSS?>sweetcolor.css">
		<link rel="stylesheet" href="<?= CSS?>dash.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="<?= CSS?>tabla.css">
		<link rel="stylesheet" href="<?= CSS?>dataTableCustom.css">
		
	</head>

	<body>
		<div class="container-main">
			<div class="navigation">
				<div class="cont-menu">
					<div class="box-head">
						<div class="box-logo">
							<img src="<?= IMG?>favicon(2).png" alt="">
						</div>
						<div class="box-version">
							<p>V-1.0</p>
							<p>Dashboard Admin</p>
						</div>
						<div class="box-close">
							<i class="fa-solid fa-xmark close"></i>
						</div>
					</div>
					<nav class="nav">
						<ul class="list">
							<li class="list__item ">
								<a href="<?= base_url()?>" class="nav__link home">
									<i class="fa-solid fa-house icon"></i>
									Inicio</a>
							</li>

							<!-- item solo -->
							<li class="list__item">
								<a href="<?= base_url()?>site" class="nav__link site">
									<i class="fa-solid fa-globe icon"></i>
									Sitios web</a>
							</li>
							<!-- desplegable -->
							<li class="list__item list__item--click ">
								<a class="nav__link click cuenta">
									<i class="fa-solid fa-house icon"></i>
									Cuentas
									<i class="fa-solid fa-arrow-right list__arrow"></i>
								</a>
								<!-- la lista que se desplegara -->
								<ul class="listShow">
									<li class="listInside">
										<a href="<?= base_url()?>cuenta" class="linkInside propia">
											<i class="fa-solid fa-circle-minus"></i>
										Cuentas
										</a>
									</li>
									<!-- <li class="listInside">
										<a href="<?= base_url()?>cuenta/tercero" class="linkInside tercero">
											<i class="fa-solid fa-circle-minus"></i>
											Terceros
										</a>
									</li> -->
									<li class="listInside">
										<a href="<?= base_url()?>cuenta/agregar" class="linkInside agregar">
											<i class="fa-solid fa-circle-minus"></i>
											Agregar cuenta
										</a>
									</li>
								</ul> 
								<!-- item solo -->
								<li class="list__item">
									<a href="<?= base_url()?>nota" class="nav__link nota">
										<i class="fa-solid fa-globe icon"></i>
										Notas
									</a>
								</li>
							</li>
						</ul>
					</nav>
					<!-- logout -->
				</div>
				<div class="cont-footer">
					<i class="fa-solid fa-user-gear"></i>
					<a href="<?= base_url()?>login/logout">
						<i class="fa-solid fa-arrow-right-from-bracket"></i>	
					</a>
				</div>
			</div>
			<div class="box-main">
				<div class="topbar">
					<div class="box-menu">
						<i class="fa-solid fa-bars toggle"></i>
						<!-- <img src="./src/images/stats.svg" class="toggle"> -->
					</div>
					<div class=" info-user">
						<div class="cont-img">
							<?php
								if($_SESSION['imagen'] == ""):
							?>
							<img src="./src/images/default.png" alt="">
							<?php
								else:
							?>
							<img src="<?= $_SESSION['ruta']?>/<?= $_SESSION['imagen']?>" alt="">
							<?php endif?>
						</div>
					</div>
				</div>