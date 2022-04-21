<?php head($data)?>


<div class="container">
	<div class="box-card">
		<div class="card">
			<div class="card-body">
				<a href="#" class="text-card">
					<span class="numbers">150</span>
					Sitios guardados
				</a>
			</div>
		</div>
	</div>
	<!-- contenido  -->
	<div class="datatable-container">
		<div class="header-tools">
			<div class="tools">
				<ul>
					<li><span><input type="checkbox"></span></li>
					<li>
						<button type="button">
							<i class="material-icons">add_circle</i>
						</button>
					</li>
					<li>
						<button type="button">
							<i class="material-icons">edit</i>
						</button>
					</li>
					<li>
						<button type="button">
							<i class="material-icons">delete</i>
						</button>
					</li>
				</ul>
			</div>
			<div class="search">
				<input type="text" class="search-input">
			</div>
		</div>
		<table class="datatable">
			<thead>
				<tr>
					<th></th>
					<th>Status</th>
					<th>Sitio</th>
					<th>Usuario</th>
					<th>Password</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="table-checkbox">
						<input type="checkbox" name="" id="">
					</td>
					<td><span class="available"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>
					<td class="table-checkbox">
						<input type="checkbox" name="" id="">
					</td>
					<td><span class="available"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>
					<td class="table-checkbox">
						<input type="checkbox" name="" id="">
					</td>
					<td><span class="await"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>
					<td class="table-checkbox">
						<input type="checkbox" name="" id="">
					</td>
					<td><span class="offline"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>
			</tbody>
		</table>
		<div class="footer-tools"></div>
	</div>

	<div class="datatable-container">
		<div class="header-tools">
			<div class="tools">
				<ul>
					<li>
						<button type="button">
							<i class="material-icons">add_circle</i>
						</button>
					</li>
					<li>
						<button type="button">
							<i class="material-icons">edit</i>
						</button>
					</li>
					<li>
						<button type="button">
							<i class="material-icons">delete</i>
						</button>
					</li>
				</ul>
			</div>
			<div class="search">
				<input type="text" class="search-input">
			</div>
		</div>
		<table class="datatable">
			<thead>
				<tr>
					<th>Status</th>
					<th>Sitio</th>
					<th>Usuario</th>
					<th>Password</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>

					<td><span class="available"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>

					<td><span class="available"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>

					<td><span class="await"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>

				<tr>

					<td><span class="offline"></span></td>
					<td>Facebook</td>
					<td>williamenriqe</td>
					<td>naca2105</td>
					<td>d</td>
				</tr>
			</tbody>
		</table>
		<div class="footer-tools"></div>
	</div>
	
	<div class="box-cont">
		<div class="cont-table">
			<h2>aqui la tabla</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Sitio</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td data-label="sitio">Facebook</td>
						<td data-label="usurio">williamenriqe</td>
						<td data-label="clave">naca2105</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
					<tr>
						<td data-label="sitio">Twitter</td>
						<td data-label="usurio">william21enrique@gmail.com</td>
						<td data-label="clave">jhgyftdrs</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
					<tr>
						<td data-label="sitio">Instagram</td>
						<td data-label="usurio">williamenriqe</td>
						<td data-label="clave">naca2105hjhjghggf</td>
						<td data-label="opciones" class="opciones">
							<div class="box-options">
								<i class="fa-solid fa-trash del"></i>
								<i class="fa-solid fa-pencil update"></i>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="cont-form">
			<h2>aqui el formulario</h2>
		</div>
	</div>
</div>

<?php footer($data)?>
