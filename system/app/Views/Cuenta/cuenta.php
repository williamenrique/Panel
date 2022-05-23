<?php head($data)?>

<div class="box">
	<div class="radiogroup my">
		<input type="radio" class="radio_input" name="prioridad" id="favorite" checked value="1">
		<label for="favorite" class="radio_label">propias</label>
		<input type="radio" class="radio_input" name="prioridad" id="all" value="0">
		<label for="all" class="radio_label">Todos</label>
	</div>
	<section class="box-cuenta">
		<!-- tabla de sitios -->
		<div class="listCuenta">
			<table id="tablaCuentaP" class="display compact nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Banco</th>
						<th>Usuario</th>
						<th>Clave Internet</th>
						<th>Cajero</th>
						<th>Clave especial</th>
						<th>Clave Tlf</th>
						<th>Tipo</th>
						<th># Cuenta</th>
						<th># Tarjeta</th>
						<th>CCV</th>
						<th>Pregunta 1 </th>
						<th>Respuesta 1 </th>
						<th>Pregunta 2 </th>
						<th>Respuesta 2 </th>
						<th>Pregunta 3 </th>
						<th>Respuesta 3 </th>
						<th>Actualizado</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</section>
</div>
<?php footer($data)?>