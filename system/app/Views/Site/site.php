<?php head($data)?>



<section class="box">
	<div class="radiogroup my">
		<input type="radio" class="radio_input" name="prioridad" id="favorite" checked value="2">
		<label for="favorite" class="radio_label">favoritos</label>
		<input type="radio" class="radio_input" name="prioridad" id="all" value="2">
		<label for="all" class="radio_label">Todos</label>
		<input type="radio" class="radio_input" name="prioridad" id="deshabilitado" value="0">
		<label for="all" class="radio_label">Deshabilitados</label>
	</div>
	<!-- tabla de sitios -->
	<div class="listSitios">
		<table id="tablaSitio" class="display compact nowrap" style="width:100%">
			<thead>
				<tr>
					<th>sitio</th>
					<th>user</th>
					<th>password</th>
					<th>url</th>
					<th>fecha actualizacion</th>
					<th>opciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<!-- fin tabla de sitios -->
	
</section>
<section class="box">
	<!-- agregar sitios y actualizarlos -->
	<form  class="formSiteAdd">
		<input type="hidden" name="txtIntSite" id="txtIntSite">
		<div class="row">
			<div class="box-input">
				<label for="txtSite">Sitio web</label>
				<input id="txtSite" name="txtSite" type="text" placeholder="Sitio web">
			</div>
			<div class="box-input">
				<label for="">URL</label>
				<input id="txtUrl" name="txtUrl" type="text" placeholder="URL del sitio">
			</div>
			<div class="box-input">
				<label for="">Usuario</label>
				<input id="txtUser" name="txtUser" type="text" placeholder="Usuario registrado">
			</div>
			<div class="box-input">
				<label for="">Password</label>
				<input id="txtPass" name="txtPass" type="text" placeholder="Password ">
			</div>
		</div>
		
		<button type="button" class="btn btn-addSite"><i class="fa-solid fa-plus"></i>
			Agregar
		</button>
		<button type="button" class="btn btn-updateSite"><i class="fa-solid fa-arrows-spin"></i>
			actualizar
		</button>

	</form>
	<!-- fin agregar y actualizar sitios -->
</section>

<?php footer($data)?>
