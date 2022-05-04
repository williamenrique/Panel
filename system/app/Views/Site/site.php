<?php head($data)?>


<div class="container">
	<div class="box-card">
		<div class="card">
			<div class="card-body">
				<a href="#" class="text-card">
					<span class="numbers">150</span>
					Sitios guardados
				</a>
			</div>
		</div>
	</div>
	<!-- box-cont  -->
	<div class="box-cont">
		<p class="title-header">sitios web</p>
		<div class="tools">
			<label>
				<input type="radio" name="prioridad" id="importante" value="1" checked>
				<span></span>
				Importantes
			</label>
			<label >
				<input type="radio" name="prioridad" id="poco" value="2">
				<span></span>
				Poco Uso
			</label>
		</div>
	
		<section class="box">
			<!-- tabla de sitios -->
			<div class="listSitios">
				<table id="tablaSitio" class="display compact nowrap" style="width:100%">
					<thead>
						<tr>
							<th>sitio</th>
							<th>user</th>
							<th>password</th>
							<th>opciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
				<!-- fin tabla de sitios -->
			<!-- agregar sitios y actualizarlos -->
			<div class="cont-addSites">
				<div class="cardHeader">
					<h2>Agregar Sitio</h2>
					<form  class="formSiteAdd">
						<input type="hidden" name="txtIntSite" id="txtIntSite">
						<div class="box-input">
							<label for=""><i class="fa-solid fa-globe"></i></label>
							<input id="txtSite" name="txtSite" type="text" placeholder="Nombre del sitio web">
						</div>
						<div class="box-input">
							<label for=""><i class="fa-solid fa-anchor"></i></label>
							<input id="txtUrl" name="txtUrl" type="text" placeholder="URL del sitio"></div>
						<div class="box-input">
							<label for=""><i class="fa-solid fa-user"></i></label>
							<input id="txtUser" name="txtUser" type="text" placeholder="Usuario registrado"></div>
						<div class="box-input">
							<label for=""><i class="fa-solid fa-lock"></i></label>
							<input id="txtPass" name="txtPass" type="text" placeholder="Password para ingreso"></div>
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
