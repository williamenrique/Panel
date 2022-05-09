<?php head($data)?>
<div class="container">
		<div class="heading">
		<h2 class="title"><span>D</span>atos personales</h2>
		<?php echo $_SESSION['status']?>
	</div>

	<div class="box-perfil">
		<div class="box-img">
			<form  class="formImg">
				<input type="file" id="file" name="file" accept="image/*">
				<span class="search">
					<i class="fa-solid fa-camera"></i>
				</span>
					<div id="preview-images"></div>
				<?php if($_SESSION['imagen'] != '' && $_SESSION['imagen'] != NULL){?>
				<div id="preview-images">
					<div class="thumbnail 0" data-id="0" style="background-image : url('<?= $_SESSION['imgUser']?>')"><div class="close-button">x</div></div>
				</div>
				<?php }?>
			</form>
			<!-- <span class="msj">aqui el msj</span> -->
			<button class="btn btnUpImg" type="button">Guardar</button>
		</div>
		<div class="box-datos">
			<form action="formData">

			</form>
		</div>
	</div>
	<div class="box-user"></div>
</div>


<?php footer($data) ?>