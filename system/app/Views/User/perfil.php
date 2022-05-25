<?php head($data)?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<h4>Datos Personales</h4>
	<span class="separate"></span>
	<div class="breadcrumbs_ruta">
		<a href="<?= base_url() ?>" class="breadcrumbs_home">Inicio</a>
		<i class='bx bx-chevron-right'></i>
		<a href="#">Usuario</a>
		<i class='bx bx-chevron-right'></i>
		<span>Perfil</span>
	</div>
</div>
<!-- end breadcrumbs -->
<section class="box box-profile">
	<div class="box-info-user">
		<div class="box-img-head">
			<form class="formImg">
				<input type="file" id="file" name="file" accept="image/*">
				<?php if($_SESSION['img'] != ''){?>
				<div id="preview-images">
					<span class="search">
						<i class='bx bx-camera'></i>
					</span>
					<div class="thumbnail 0" data-id="0" style="background-image : url('<?= $_SESSION['imgUser']?>')"></div>
				</div>
				<?php }else{?>
				<div id="preview-images">
					<span class="search">
						<i class='bx bx-camera'></i>
					</span>
					<div class="thumbnail 0" data-id="0"></div>
				</div>
				<?php }?>
				<div class="row">
					<div class="box-action">
						<button type="button" class="btn btnUpImg btn-primary"><i class='bx bx-cloud-upload'></i>subir</button>
						<span class="files">Tipos de archivos permitidos: png, jpg, jpeg.</span>
					</div>
				</div>
			</form>
		</div>
		<!-- formulario datos usuario -->
		<form class="formProfile">
			<input type="hidden" value="<?= $_SESSION['idUser']?>" name="intUserId" id="intUserId">
			<div class="row">
				<div class="box-input">
					<label for="txtNombreProfile">nombres</label>
					<input type="text" id="txtNombreProfile" name="txtNombreProfile">
				</div>
				<div class="box-input">
					<label for="txtApellidoProfile">apellidos</label>
					<input type="text" id="txtApellidoProfile" name="txtApellidoProfile">
				</div>
				<div class="box-input">
					<label for="txtEmailProfile">email</label>
					<input type="text" id="txtEmailProfile" name="txtEmailProfile">
				</div>
				<div class="box-input">
					<label for="txtCiProfile">Identificacion</label>
					<input type="text" id="txtCiProfile" name="txtCiProfile">
				</div>
			</div>
			<div class="row">
				<div class="box-input">
					<label for="txtCdPostal">Cod Postal</label>
					<input type="text" id="txtCdPostal" name="txtCdPostal">
				</div>
				<div class="box-input">
					<label for="txtTlfProfile">Telefono</label>
					<input type="text" name="txtTlfProfile" id="txtTlfProfile">
				</div>
				<div class="box-input">
					<label for="listState">Estado</label>
					<select name="listState" id="listState">
						<option value="0">Seleccione estado</option>
					</select>
				</div>
				<div class="box-input">
					<label for="txtCiudad">ciudad</label>
					<input type="text" id="txtCiudad" name="txtCiudad">
				</div>
			</div>
			<div class="row">
				<div class="box-input">
					<label for="txtDireccion">Direccion</label>
					<input type="text" name="txtDireccion" id="txtDireccion">
				</div>
			</div>
			<div class="row">
				<div class="box-button">
					<button type="submit" class="btn btnPerfil btn-warning"><i class='bx bx-sync'></i>Actualizar</button>
				</div>
			</div>
		</form>
		<!-- end formulario datos usuario -->
	</div>
</section>
<!-- end box profile -->

<!-- crear user -->
<?php if($_SESSION['user'] == ''):?>
	<span class="divider-dotted"></span>
<section class="box createUser">
	<div class="row">
		<div class="box-input icon-input">
			<label for="">Crear usuario</label>
			<input type="text" id="txtUser" name="txtUser" class="icon-input">
			<i class='bx bx-search'></i>
			<div class="txtMsj"></div>
		</div>
		<div class="box-input"></div>
		<div class="box-input"></div>
	</div>
</section>
<?php endif;?>
<!-- end crear user -->
<span class="divider-dotted"></span>
<!-- cambiar clave -->
<section class="box">
	<div class="row">
		<div class="box-input">
			<label for="">password</label>
			<input type="text" id="txtPass" name="txtPass">
		</div>
		<div class="box-input">
			<label for="">confirm password</label>
			<input type="text" id="txtConfirmPass" name="txtConfirmPass">
		</div>
	</div>
	<button type="button" class="btn btnChangePass btn-info"><i class='bx bx-sync'></i>cambiar password</button>
</section>
<!-- end cambiar clave -->
<span class="divider-dotted"></span>
<!-- eliminar cuenta -->
<section class="box deletCount">
	<div class="container">
		<h3 class="title-box">
			Eliminar cuenta
		</h3>
	</div>
	<span class="divider"></span>
	<div class="container">
		<section class="alert">
			<span>¿Está seguro de que desea eliminar su cuenta?</span>
			<span>Una vez que eliminas tu cuenta, no hay vuelta atrás. Por favor, esté seguro.</span>
			<div class="box-check">
				<input type="checkbox" name="confirmDel" id="confirmDel">
				<label class="check" for="confirmDel">Confirmo la desactivación de mi cuenta</label>
			</div>
			<div class="box-button">
				<button type="button" class="btn btn-confirm btn-danger"><i class='bx bx-trash' ></i> eliminar cuenta</button>
			</div>
		</section>
	</div>
</section>
<!-- end delete cuenta -->
<?php footer($data) ?>