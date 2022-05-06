<?php head($data)?>


<div class="container">
	<div class="heading">
		<h2 class="title"><span>S</span>itios web</h2>
		<div class="tools">
			<label>
				<input type="radio" name="prioridad" id="favorite" value="2" checked >
				<span>favoritos</span>
			</label>
			<label >
				<input type="radio" name="prioridad" id="all" value="1">
				<span>todos</span>
			</label>
			<label >
				<input type="radio" name="prioridad" id="deshabilitado" value="0">
				<span>Deshabilitados</span>
			</label>
		</div>
	</div>
	<div class="box-cont">
		<!-- <div class="tools">
			<p class="title-header">sitios web</p>
			<label>
				<input type="radio" name="prioridad" id="favorite" value="2" checked >
				<span>favoritos</span>
			</label>
			<label >
				<input type="radio" name="prioridad" id="all" value="1">
				<span>todos</span>
			</label>
			<label >
				<input type="radio" name="prioridad" id="deshabilitado" value="0">
				<span>Deshabilitados</span>
			</label>
		</div> -->
	
		<section class="box">
			<!-- tabla de sitios -->
			<div class="listSitios">
				<table id="tablaSitio" class="display compact nowrap" style="width:100%">
					<thead>
						<tr>
							<th>sitio</th>
							<th>user</th>
							<th>password</th>
							<th>url</th>
							<th>opciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!-- fin tabla de sitios -->
			<!-- agregar sitios y actualizarlos -->
			<div class="addSites">
				<div class="cardHeader">
					<h2>Agregar Sitio</h2>
					<form  class="formSiteAdd">
						<input type="hidden" name="txtIntSite" id="txtIntSite">
						<div class="box-input">
							<i class="fa-solid fa-globe"></i>
							<input id="txtSite" name="txtSite" type="text" placeholder="Sitio web">
						</div>
						<div class="box-input">
							<i class="fa-solid fa-anchor"></i>
							<input id="txtUrl" name="txtUrl" type="text" placeholder="URL del sitio"></div>
						<div class="box-input">
							<i class="fa-solid fa-user"></i>
							<input id="txtUser" name="txtUser" type="text" placeholder="Usuario registrado"></div>
						<div class="box-input">
							<i class="fa-solid fa-lock"></i>
							<input id="txtPass" name="txtPass" type="text" placeholder="Password "></div>
						<div class="box-button">
							<button type="button" class="btn btn-addSite"><i class="fa-solid fa-plus"></i>
							Agregar
						</button>
						<button type="button" class="btn btn-updateSite"><i class="fa-solid fa-arrows-spin"></i>
							actualizar
						</button>
						</div>
					</form>
				</div>
			</div>
			<!-- fin agregar y actualizar sitios -->
		</section>
	</div>
	<!-- fin box-cont -->
</div>
<!-- fin container -->

<?php footer($data)?>
