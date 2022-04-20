<?php 
head($data);
// getModal('modals',$data);
?>
<div class="container-box">
	<div class="details-site">
		<div class="cont-table">
			<div class="cardHeader">
				<div class="header">
					<h2>Tus sitios</h2>
					<div class="box-filter">
						<div class="box-search">
							<input type="text" name="searchSite" id="searchSite">
						</div>
						<div class="box-priority">
							<input type="radio" name="prioridad" id="importante" value="1">
							<label for="importante">Importantes</label>
							<input type="radio" name="prioridad" id="poco" value="2">
							<label for="poco">Poco Uso</label>
							<input type="radio" name="prioridad" id="deshabilitado" value="0">
							<label for="deshabilitado">Deshabilitados</label>
						</div>
					</div>
				</div>
				<div class="box-table listSitios">
				
				</div>
			</div>
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
<?php 
footer($data);
?>
