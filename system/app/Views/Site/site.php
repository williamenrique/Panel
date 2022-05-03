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
	<!-- contenido  -->

	
	<div class="box-cont">
		<div class="cont-table">
			<p class="title-header">sitios web</p>
			<div class="header-tools">
				<div class="tools">
					<label class="radio" for="importante">
						<input type="radio" name="prioridad" id="importante" value="1" checked>
						<span></span>
						Importantes
					</label>
					<label class="radio" for="poco">
						<input type="radio" name="prioridad" id="poco" value="2">
						<span></span>
						Poco Uso
					</label>
					
				
				</div>
				<div class="search">
					<input type="text" class="search-input" id='search'>
				</div>
			</div>
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
			<!-- <table class="table">
				<thead>
					<tr>
						<th>Sitio</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td data-label="sitio">Facebook</td>
						<td data-label="usurio">williamenriqe</td>
						<td data-label="clave">naca2105</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
					<tr>
						<td data-label="sitio">Twitter</td>
						<td data-label="usurio">william21enrique@gmail.com</td>
						<td data-label="clave">jhgyftdrs</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
					<tr>
						<td data-label="sitio">Instagram</td>
						<td data-label="usurio">williamenriqe</td>
						<td data-label="clave">naca2105hjhjghggf</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
				</tbody>
			</table> -->
		</div>
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
	</div>
</div>

<?php footer($data)?>
