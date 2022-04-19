document.addEventListener('DOMContentLoaded', function () {
	getStitios()
}, false)

function getStitios() {
	/************************************************* 
	 * creamos el objeto de envio para tipo de navegador
	 * hacer una validacion para diferentes navegadores y crear el formato de lectura
	 * y hacemos la peticion mediante ajax
	 * usando un if reducido creamos un objeto del contenido en(request)
	 *****************************************************/
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Home/getSitios';
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

let addSite = document.querySelector('.btn-addSite')
let formSiteAdd = document.querySelector('.formSiteAdd')
addSite.addEventListener('click', () => {
	var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + 'Home/setSitios';
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
			let ajaxUrl = base_url + 'Home/delSite/' + intSite;
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

function editSite(intSite) {
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Home/getSite/' + intSite;
	//id del atributo lr que obtuvimos enla variable
	let strData = "intSite=" + intSite;
	request.open("POST", ajaxUrl, true);
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//enviamos
	// request.send(strData);
	request.send();
	request.onreadystatechange = function () {
		let objData = JSON.parse(request.responseText);
		if (objData.status) { 
			document.querySelector('#txtSite').value = objData.data.sitio
			document.querySelector('#txtUrl').value = objData.data.URL
			document.querySelector('#txtUser').value = objData.data.usuario
			document.querySelector('#txtPass').value = objData.data.password
			let btn_addSite = document.querySelector('btn-addSite')
			let btn_updateSite = document.querySelector('btn-updateSite')
			btn_addSite.style.display = 'none'
			btn_updateSite.style.display = 'block'
		}else {
			notifi(objData.msg, "error");
		}
	}
}