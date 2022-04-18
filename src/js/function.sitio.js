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
	let listSitios = document.querySelector('.listSitios');

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

// function addSite() {
// }