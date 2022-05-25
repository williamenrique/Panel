<?php head($data)?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<h4>Administrador</h4>
	<span class="separate"></span>
	<div class="breadcrumbs_ruta">
		<a href="<?= base_url() ?>" class="breadcrumbs_home">Inicio</a>
		<i class='bx bx-chevron-right'></i>
		<!-- <a href="#">Configuracion<i class='bx bx-chevron-right'></i></a> -->
		<span>Archivos</span>
	</div>
</div>
<!-- end breadcrumbs -->
<section class="box box-files">
	<div class="container">
		<div class="head-box">
			<h3>Lista de archivos</h3>
			<h4>Lugar donde gusrdar archivos importantes para su uso posterior</h4>
		</div>
		<div class="row">
			<div class="box-input box-input-search">
				<input type="text">
				<i class='bx bx-search'></i>
			</div>
			<div class="box-files-upload ">
				<button type="button" class="btn btn-searchFiles btn-warning">
					<i class='bx bx-search'></i>
					Archivos
				</button>
				<input type="file" id="uploadFile" name="uploadFile[]" multiple>
				<button type="button" class="btn btn-subir-archivo btn-border-none">
					<i class='bx bx-upload'></i>
					almacenar
				</button>
			</div>
		</div>
		<div id="box-preview-file"></div>


	</div>
	<div class="box">
		<div class="container">
			<table id="tableFiles" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Nombre De archivo</th>
						<th>Tamano</th>
						<th>Actualizacion</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php footer($data)?>