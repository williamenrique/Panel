<?= head($data)?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<h4>Notas</h4>
	<span class="separate"></span>
	<div class="breadcrumbs_ruta">
		<a href="<?= base_url() ?>" class="breadcrumbs_home">Inicio</a>
		<i class='bx bx-chevron-right'></i>
		<!-- <a href="#">Configuracion<i class='bx bx-chevron-right'></i></a> -->
		<span>Nota</span>
	</div>
</div>
<!-- end breadcrumbs -->
<!-- box -->
<section class="box">
	<div class="row">
		<div class="card">
			<h3 class="title-nota">titulo de la anota</h3>
			<p class="descrip-nota">descripcion de la nota</p>
			<p class="file">el archivo.txt</p>
			<span class="fecha_actualizacon">domingo 23 de mayo 2022</span>
		</div>
	</div>
</section>
<?= footer($data)?>