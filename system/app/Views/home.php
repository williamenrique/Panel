<?php 
head($data);
// getModal('modals',$data);
?>
		<div class="container-box">
			<div class="cardBox">
				<div class="card">
					<div>
						<div class="numbers">0</div>
						<div class="cardName">
							<a href="<?= base_url()?>/site">Ver resumen</a>
						</div>
					</div>
					<div class="iconBox">
						<i class="fa-solid fa-eye"></i>
					</div>
				</div>

				<div class="card">
					<div>
						<div class="numbers">0</div>
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

			<!-- <div class="details">
				<div class="recentOrders">
					<div class="cardHeader">
						<h2>Tus sitios</h2>
					</div>
					
				</div>
				<div class="addSites">
					<div class="cardHeader">
						<h2>Agregar Sitio</h2>
						
					</div>
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
			</div> -->
		</div>

<?php footer($data) ?>