<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $data['page_tag']?></title>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
		<link href="<?= PLUGINS?>sweetalert/sweetalert2@10.css"></link>
		<link rel="stylesheet" href="<?= CSS?>style.css">
	</head>

	<body>
		<div class="container-main">
	<div class="navigation">
		<div class="nav-head">
			<span class="version">V-1.0</span>
			<i class="fa-solid fa-xmark close"></i>
		</div>
		<ul class="">
			<li class="">
				<a href="#">
					<span class="iconImg"><img src="./src/images/favicon.png" alt=""></span>
					<span class="">
						<h2 class="title-user">William Enrique</h2>
					</span>
				</a>
			</li>
			<li class="dashboard">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-house"></i></span>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-users"></i></span>
					<span class="title">Customers</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-message"></i></span>
					<span class="title">Message</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-gear"></i></span>
					<span class="title">Setting</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-circle-question"></i></span>
					<span class="title">Help</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-lock"></i></span>
					<span class="title">Password</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
					<span class="title">Sign Out</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="main">
		<div class="topbar">
			<div class="toggle"></div>
			<div class="search">
				<label for="#">
					<input type="text" name="search" id="search" placeholder="serach here">
					<i class="fa-solid fa-magnifying-glass"></i>
				</label>
			</div>
			<div class="user">
				<img src="./src/images/default.png" alt="">
			</div>
		</div>