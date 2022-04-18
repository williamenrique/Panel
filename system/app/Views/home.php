<?php 
head($data);
// getModal('modals',$data);
?>

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
			<li class="active">
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
		<div class="container-box">
			<div class="cardBox">
				<div class="card">
					<div>
						<div class="numbers">1,042</div>
						<div class="cardName">Daily Views</div>
					</div>
					<div class="iconBox">
						<i class="fa-solid fa-eye"></i>
					</div>
				</div>

				<div class="card">
					<div>
						<div class="numbers">1,042</div>
						<div class="cardName">Daily Views</div>
					</div>
					<div class="iconBox">
						<i class="fa-solid fa-eye"></i>
					</div>
				</div>

				<div class="card">
					<div>
						<div class="numbers">1,042</div>
						<div class="cardName">Daily Views</div>
					</div>
					<div class="iconBox">
						<i class="fa-solid fa-eye"></i>
					</div>
				</div>

				<div class="card">
					<div>
						<div class="numbers">1,042</div>
						<div class="cardName">Daily Views</div>
					</div>
					<div class="iconBox">
						<i class="fa-solid fa-eye"></i>
					</div>
				</div>
			</div>

			<div class="details">
				<div class="recentOrders">
					<div class="cardHeader">
						<h2>Tus sitios</h2>
						<!-- <a href="#" class="btn">View All</a> -->
					</div>
					<table class="listSitios">
						<thead>
							<tr>
								<td>Sitio</td>
								<td>Usuario</td>
								<td>Clave</td>
								<td>Opcion</td>
							</tr>
						</thead>
					</table>
				</div>
				<div class="addSites">
					<div class="cardHeader">
						<h2>Agregar Sitio</h2>
						
					</div>
					<form  class="formSiteAdd">
						<div class="box-input"><label for=""><i class="fa-solid fa-globe"></i></label><input id="txtSite" name="txtSite" type="text"></div>
						<div class="box-input"><label for="">
							<i class="fa-solid fa-anchor"></i>
						</label><input id="txtUrl" name="txtUrl" type="text"></div>
						<div class="box-input"><label for=""><i class="fa-solid fa-user"></i></label><input id="txtUser" name="txtUser" type="text"></div>
						<div class="box-input"><label for=""><i class="fa-solid fa-lock"></i></label><input id="txtPass" name="txtPass" type="text"></div>
						<div class="box-button">
							<button type="button" class="btn btn-addSite">
							<i class="fa-solid fa-plus"></i>
							Agregar
						</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php footer($data) ?>