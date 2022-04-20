document.addEventListener('DOMContentLoaded', function () {
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Home/countSites';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.numbers').innerHTML = request.responseText;
		}
	}
}, false)

function getStitios() {
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
