document.addEventListener('DOMContentLoaded', function () {
	// getStitios()
	getSites()
}, false)
notifi('hola','error')
function getStitios() {
	// let intSite = 1
	/************************************************* 
	 * creamos el objeto de envio para tipo de navegador
	 * hacer una validacion para diferentes navegadores y crear el formato de lectura
	 * y hacemos la peticion mediante ajax
	 * usando un if reducido creamos un objeto del contenido en(request)
	 *****************************************************/
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Site/getSitios';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.listSitios').innerHTML = request.responseText;
		}
	}
}
// agregar nuevo sitio
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
					getStitios()
			} else {
				notifi(objData.msg, "error");
			}
		}
	}
})
// actualizar un sitio
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
					getStitios()
			} else {
				notifi(objData.msg, "error");
			}
		}
	}
})
// eliminar sitio
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
						getStitios()
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
				}
			}
		}
	})
}
// editar sitio
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
// obtener sitios con status y sitio
// let strSite = document.querySelector('#search').value
const getSites = (intSite, strSite) => {
	let search = document.querySelector('#search').value
	let intCheck = $('input:radio[name=prioridad]:checked').val()
	if (intCheck == "" || search == "") {
		let intCheck = 1;
		let search = '';
	} else {
		let intCheck = intSite;
		let search = strSite;
	}
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Site/getSites/?intSite='+intCheck+'&strSite='+search
	
	request.open("GET", ajaxUrl, true)
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	//enviamos
	request.send()
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.listSitios').innerHTML = request.responseText;
		}
	}
}
// obtener el valor del status
$('input[type=radio]').change(function () {
	let strSite = document.querySelector('#search').value
	let intSite = $('input:radio[name=prioridad]:checked').val()
	console.log('search '+ strSite + 'check ' + intSite)
	getSites(intSite, strSite)
})
// obtener el valo de la caja de busqueda
// let strSite = document.querySelector('#search').value
// strSite.addEventListener('keyup', () => {
// 	let strSite = document.querySelector('#search').value
// 	let intSite = $('input:radio[name=prioridad]:checked').val()
// 	getSites(intSite, strSite)
// })