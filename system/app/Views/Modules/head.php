<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $data['page_tag']?></title>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
		<link href="<?= PLUGINS?>sweetalert/sweetalert2@10.css"></link>
		<link rel="stylesheet" href="<?= CSS?>dash.css">
	</head>

	<body>
		<div class="container-main">
			<div class="navigation">
				<div class="cont-menu">
					<div class="box-head">
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
								<a href="#" class="nav__link">
									<i class="fa-solid fa-house icon"></i>
									Inicio</a>
							</li>
							<!-- desplegable -->
							<!-- <li class="list__item list__item--click ">
								<a href="#" class="nav__link click">
									<i class="fa-solid fa-house icon"></i>
									Servicios
									<i class="fa-solid fa-arrow-right list__arrow"></i>
								</a> -->
							<!-- la lista que se desplegara -->
							<!-- <ul class="listShow">
									<li class="listInside">

										<a href="#" class="linkInside">
											<i class="fa-solid fa-circle-minus"></i>
											Item 1
										</a>
									</li>
									<li class="listInside">

										<a href="#" class="linkInside">
											<i class="fa-solid fa-circle-minus"></i>
											Item 1
										</a>
									</li>
									<li class="listInside">

										<a href="#" class="linkInside">
											<i class="fa-solid fa-circle-minus"></i>
											Item 1
										</a>
									</li>
								</ul> 
							
							</li>-->
							<!-- item solo -->
							<li class="list__item">
								<a href="#" class="nav__link active">
									<i class="fa-solid fa-globe icon"></i>
									Sitios web</a>
							</li>
						</ul>
					</nav>

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
							<img src="./src/images/default.png" alt="">
						</div>
					</div>
				</div>