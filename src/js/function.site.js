let tablaSitio;
document.addEventListener('DOMContentLoaded', function () {
	let intCheck = $('input:radio[name=prioridad]:checked').val()
	obtenerSitios(intCheck)
}, false)

/************************************
funcion para obtener todos los sitios 
y mostrarlos en la tabla
************************************/
const obtenerSitios = (intCheck) => {
	tablaSitio = $('#tablaSitio').DataTable({
		"responsive": {
			"name": "medium",
			"width": "1188"
		},
		"ajax": {
			"url": ' ' +base_url + 'Site/getSites/?intSite='+intCheck,
			"dataSrc": ''
		},
		"columns": [
			{ 'data': 'sitio' },
			{ 'data': 'usuario' },
			{ 'data': 'pass' },
			{ 'data': 'opciones'}
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	})
}
/************************************
Agregar nuevos  sitios 
y mostrarlos en la tabla
************************************/
let addSite = document.querySelector('.btn-addSite')
let formSiteAdd = document.querySelector('.formSiteAdd')
addSite.addEventListener('click', () => {
	var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + 'Site/setSitios';
	//creamos un objeto del formulario con los datos haciendo referencia a formData
	var formData = new FormData(formSiteAdd);
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send(formData);
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			//obtenemos los datos y convertimos en JSON
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
					notifi(objData.msg, "info");
					formSiteAdd.reset();
					//recargamos la tabla
					// getStitios()
				let tablaSitio = $('#tablaSitio').DataTable()
						tablaSitio.ajax.reload(function () {
						})
			} else {
				notifi(objData.msg, "error");
			}
		}
	}
})
/************************************
funcion para actualizar un sitios 
y mostrarlos en la tabla
************************************/
let updateSite = document.querySelector('.btn-updateSite')
updateSite.addEventListener('click', () => {
	var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + 'Site/updateSite';
	//creamos un objeto del formulario con los datos haciendo referencia a formData
	var formData = new FormData(formSiteAdd);
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send(formData);
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			//obtenemos los datos y convertimos en JSON
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
					notifi(objData.msg, "info");
					formSiteAdd.reset();
					//recargamos la tabla
					// getStitios()
				let tablaSitio = $('#tablaSitio').DataTable()
						tablaSitio.ajax.reload(function () {
						})
			} else {
				notifi(objData.msg, "error");
			}
		}
	}
})
/************************************
funcion para obtener un sitio para actualizarlo
y mostrarlos en la tabla
************************************/
function editSite(intSite) {
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Site/getSite/' + intSite
	//id del atributo lr que obtuvimos enla variable
	let strData = "intSite=" + intSite
	request.open("POST", ajaxUrl, true)
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	//enviamos
	// request.send(strData);
	request.send()
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) { 
			let objData = JSON.parse(request.responseText)
			if (objData.status) { 
				document.querySelector('#txtSite').value = objData.data.sitio
				document.querySelector('#txtUrl').value = objData.data.URL
				document.querySelector('#txtUser').value = objData.data.usuario
				document.querySelector('#txtPass').value = objData.data.password
				document.querySelector('#txtIntSite').value = objData.data.idSitio
				let btn_addSite = document.querySelector('.btn-addSite')
				let btn_updateSite = document.querySelector('.btn-updateSite')
				btn_addSite.style.display = 'none'
				btn_updateSite.style.display = 'block'
			}else {
				notifi(objData.msg, "error")
			}
		}
	}
}
/************************************
funcion favorito
************************************/
const addFav = () => {

}
/************************************
funcion para eliminar un sitios 
y mostrarlos en la tabla
************************************/
function delSite(intSite) {
	//obtenemos el valor del atributo individual
	var intSite = intSite;
	Swal.fire({
		title: 'Estas seguro de eliminar el sitio.?',
		text: "No podra ser revertido el proceso!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, eliminar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Site/delSite/' + intSite;
			//id del atributo lr que obtuvimos enla variable
			let strData = "intSite=" + intSite;
			request.open("POST", ajaxUrl, true);
			//forma en como se enviara
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//enviamos
			request.send(strData);
			// request.send();
			request.onreadystatechange = function () {
				//comprobamos la peticion
				if (request.readyState == 4 && request.status == 200) {
					//convertir en objeto JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						$(function () {
							var Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							})
							Toast.fire({
								icon: 'success',
								title: objData.msg
							})
						})
						let tablaSitio = $('#tablaSitio').DataTable()
						tablaSitio.ajax.reload(function () {
						})
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
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
	let intSite = $('input:radio[name=prioridad]:checked').val()
	// llamamos la funcion para que cargue la tabla con el nuevo valor
	obtenerSitios(intSite);
})
/************************************
funcion para agrgar a favorito o quitar de favorito
************************************/
const changeState = (intSite, fav) => {
	if (fav == 0) {
		console.log('esta deshabilitado')
	}
	if (fav == 1) {
		console.log('')
	}
	if (fav == 2) {
		console.log('es favorito')
	}
}