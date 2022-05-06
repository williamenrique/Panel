<?php head($data)?>

<div class="container">
	<div class="heading">
		<h2 class="title"><span>C</span>uentas</h2>
		<div class="tools">
			<label>
				<input type="radio" name="prioridad" id="favorite" value="1" checked >
				<span>Propias</span>
			</label>
			<label >
				<input type="radio" name="prioridad" id="all" value="0">
				<span>Terceros</span>
			</label>
		</div>
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