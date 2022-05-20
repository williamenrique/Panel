<?php head($data);
$dataUser = data($_SESSION['idUser']);
?>
<!-- calendario -->
	<div class="box-calendar">
		<div class="calendar" id="calendar"></div>
		<div class="box-formcalendar">
			<form class="formCalendar">
				<input type="hidden" name="idEvent" id="idEvent">
				<div class="container">
					<h3 class="title-box text-center">
						Agregar evento
					</h3>
					<div class="divider"></div>
					<div class="row">
						<div class="box-input">
							<label for="txtTituloEvento">Titulo</label>
							<input type="text" id="txtTituloEvento" name="txtTituloEvento">
						</div>
						<div class="row">
							<div class="box-input">
								<label for="txtInicio">Inicio</label>
								<input type="date" id="txtInicio" name="txtInicio">
							</div>
							<div class="box-input">
								<label for="txtFin">Finaliza</label>
								<input type="date" id="txtFin" name="txtFin">
							</div>
						</div>
						<div class="box-input">
							<label for="txtColor">Color</label>
							<input type="color" id="txtColor" name="txtColor" value="#283046">
						</div>
					</div>
					<div class="row">
						<div class="box-button">
							<button class="btn btn-guardar" data-accion="" type="submit">Guardar</button>
							<button class="btn btn-delete" type="button">Eliminar</button>
							<button class="btn btn-reset" type="reset">Desechar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<!-- end calendar -->
<?php footer($data) ?>