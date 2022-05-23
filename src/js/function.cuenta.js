let tablaCuentaP;
window.addEventListener('load', function () {
	let intCheck = $('input:radio[name=prioridad]:checked').val()
	listBank()
	getCuentaP(intCheck)
}, false)
/************************************
funcion para obtener todos los sitios 
y mostrarlos en la tabla segun la prioridad
************************************/
const getCuentaP = (intCheck) => {
	tablaCuentaP = $('#tablaCuentaP').DataTable({
		"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ ",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible",
			"sInfo": "Total de _TOTAL_ Registros",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad"
			}
		},
		"responsive": {
			"name": "medium",
			"width": "800"
		},
		"ajax": {
			// "url": ' ' +base_url + 'Cuenta/getCuentaP/',
			"url": ' ' +base_url + 'Cuenta/getCuentaP/?priority='+intCheck,
			"dataSrc": ''
		},
		"columns": [
			{ 'data': 'banco' },
			{ 'data': 'usuario' },
			{ 'data': 'pass' },
			{ 'data': 'passCajero' },
			{ 'data': 'passEspecial' },
			{ 'data': 'claveTlf'},
			{ 'data': 'tipoC'},
			{ 'data': 'nCuenta'},
			{ 'data': 'nTarjeta'},
			{ 'data': 'ccv'},
			{ 'data': 'p1'},
			{ 'data': 'r1'},
			{ 'data': 'p2'},
			{ 'data': 'r2'},
			{ 'data': 'p3'},
			{ 'data': 'r3'},
			{ 'data': 'fechaAct'},
			{ 'data': 'opciones'}
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	})
}
/************************************
funcion para cargar los bancos
************************************/
const listBank = () => {
	if (document.querySelector('#listBank')) {
		let ajaxUrl = base_url + 'Cuenta/getBank'
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listBank').innerHTML = request.responseText;
			}
		}
	}
}
/************************************
funcion para agregar una cuenta
************************************/
if (document.querySelector('.btnAddC')) {
	const btnAddC = document.querySelector('.btnAddC')
	btnAddC.addEventListener('click', (e) => {
		e.preventDefault()
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Cuenta/addCuent'
		let formCuenta = document.querySelector('.form-add-cuenta')
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formCuenta )
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true)
		//envio de datos del formulario que se almacena enla variable
		request.send(formData)
		//obtenemos los resultados
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
					notifi(objData.msg, 'success')
					formCuenta.reset();
				} else {
					notifi(objData.msg, 'error')
				}
			}
		}
	})
}
/************************************
obtener el tipo de status y cargar 
 la tabla para mostrar
************************************/
$('input[type=radio]').change(function () {
	let priority = $('input:radio[name=prioridad]:checked').val()
	if (priority == 1) {
	}
	// llamamos la funcion para que cargue la tabla con el nuevo valor
	getCuentaP(priority);
})
/************************************
funcion para eliminar un sitios 
y mostrarlos en la tabla
************************************/
function delCuenta(intIdCuenta) {
	//obtenemos el valor del atributo individual
	var intIdCuenta = intIdCuenta;
	Swal.fire({
		title: 'Estas seguro de eliminar la cuenta.?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, eliminar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Cuenta/statusCuenta'
			//id del atributo lr que obtuvimos enla variable
			let strData = new URLSearchParams("intIdCuenta="+intIdCuenta+"&status=0")
			request.open("POST", ajaxUrl, true);
			//forma en como se enviara
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			//enviamos
			request.send(strData);
			// request.send();
			request.onreadystatechange = function () {
				//comprobamos la peticion
				if (request.readyState == 4 && request.status == 200) {
					//convertir en objeto JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						notifi(objData.msg, 'info');
						let tablaCuentaP = $('#tablaCuentaP').DataTable()
						tablaCuentaP.ajax.reload()
					} else {
						notifi(objData.msg, 'error');
					}
				}
			}
		}
	})
}
if (document.querySelector('#txtInputID')) {
	if (!document.querySelector('#txtInputID').value == '') {
		let inputID = document.querySelector('#txtInputID').value
		document.querySelector('.btnAddC').style.display = 'none'
		document.querySelector('.btnEditCuenta').style.display = 'flex'
		//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Cuenta/getEditCuenta'
		//id del atributo lr que obtuvimos enla variable
		let strData = new URLSearchParams("inputIdCuenta="+inputID)
		request.open("POST", ajaxUrl, true);
		//forma en como se enviara
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		//enviamos
		request.send(strData);
		// request.send();
		request.onreadystatechange = function () {
			//comprobamos la peticion
			if (request.readyState == 4 && request.status == 200) {
				//convertir en objeto JSON
				let objData = JSON.parse(request.responseText);
				console.log(objData)
				document.querySelector('#txtNombre').value = objData.nombreAut
				document.querySelector('#txtNTarjeta').value = objData.nTarjeta
				document.querySelector('#txtNCuenta').value = objData.nCuenta
				document.querySelector('#txtFechaVenc').value = objData.fecha_venc
				document.querySelector('#txtPassCajero').value = objData.passCajero
				document.querySelector('#txtUsuario').value = objData.usuario
				document.querySelector('#txtPassInt').value = objData.pass
				document.querySelector('#txtPasssSpecial').value = objData.passEspecial
				document.querySelector('#txtPassTlf').value = objData.claveTlf
				document.querySelector('#txtP1').value = objData.p1
				document.querySelector('#txtR1').value = objData.r1
				document.querySelector('#txtP2').value = objData.p2
				document.querySelector('#txtR2').value = objData.r2
				document.querySelector('#txtP3').value = objData.p3
				document.querySelector('#txtR3').value = objData.r3
				document.querySelector('#txtCcv').value = objData.ccv
				document.querySelector('#listBank').options = objData.cod
				if (objData.tipoC == '0') {
					document.querySelector('#ahorro').checked = true
				} 
				if (objData.tipoC == '1') {
					document.querySelector('#corriente').checked = true
				} 
				if (objData.cuentaAut == '0') {
					document.querySelector('#tercero').checked = true
				} 
				if (objData.cuentaAut == '1') {
					document.querySelector('#propia').checked = true
				} 
	// document.querySelector('cuentaAut').value = objData.
			}
		}
	}
}
// actualizar una cuenta
if (document.querySelector('.btnEditCuenta')) {
	let btnEditCuenta = document.querySelector('.btnEditCuenta')
	btnEditCuenta.addEventListener('click', (e) => {
		e.preventDefault()
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Cuenta/updateCuenta'
			let formCuenta = document.querySelector('.form-add-cuenta')
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formCuenta )
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true)
		//envio de datos del formulario que se almacena enla variable
		request.send(formData)
		//obtenemos los resultados
		request.onreadystatechange = function () {
			//comprobamos la peticion
			if (request.readyState == 4 && request.status == 200) {
				//convertir en objeto JSON
				let objData = JSON.parse(request.responseText);
				if (objData.status) {
					notifi(objData.msg, 'success');
				} else {
					notifi(objData.msg, 'error');
				}
			}
		}
	})
}

/* 

banco: "BANCO MERCANTIL, C.A. S.A.C.A. BANCO UNIVERSAL"
ccv: "968"
claveTlf: "2514"
cod: "105"
cuentaAut: "1"
fechaAct: "2022-05-09 08:36:53"
fecha_venc: null
idCuenta: "3"
idUser: "1"
nCuenta: "01050062140062367498"
nTarjeta: "501878200074482276"
nombreAut: "William Enrique"
p1: ""
p2: ""
p3: ""
pass: "0202*Feb"
passCajero: "1223"
passEspecial: ""
r1: ""
r2: ""
r3: ""
status: "1"
tipoC: "0"
usuario: "we2105"
*/