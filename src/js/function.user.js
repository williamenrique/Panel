window.addEventListener('load', function () {
	listState()
}, false)
let msj = document.querySelector('.msj')
let file = document.querySelector('#file')
let formData = new FormData()
if (document.querySelector('.search')) {
	let search = document.querySelector('.search')
	search.addEventListener('click', () => {
		document.querySelector('#file').click()
		file.value = ""
		createClearFormData()
	})
}

file.addEventListener('change', (e) => { 
	// msj.innerText = file.files[0].name;
	let thumbnail = document.createElement('div') // generar un elemento
	thumbnail.classList.add('thumbnail',0) // asignarle una clase y el id
	thumbnail.dataset.id = 0  //crear un atributo con dat.set y le asignamos el id
	thumbnail.setAttribute('style', `background-image : url(${URL.createObjectURL(file.files[0])})`)
	document.getElementById('preview-images').appendChild(thumbnail)
	createClose(0)
})

const createClearFormData = () => {
	// recorrer el formaData
	for (let key of formData.keys()) {
		//llamamos el formadata y le pasamos el delete con el key
		formData.delete(key)
		console.log(key)
	}
	// quitar todos los thumbnail
	document.querySelectorAll('.thumbnail').forEach((thumbnail) => {
		thumbnail.remove()
	})
}
// funcion para clrear el boton de cerrar la imagen
const createClose = (thumbnail_id) => {
	let closeButton = document.createElement('div')
	closeButton.classList.add('close-button')
	// closeButton.innerText = 'x'
	// despues de crear la funcion para cerrar
	document.getElementsByClassName(thumbnail_id)[0].appendChild(closeButton)
}
// agregamos al body y action de escucha al momento de cancelar la imagen
document.body.addEventListener('click', function (e) {
	if ( e.target.classList.contains('close-button') ) {
		e.target.parentNode.remove();
		formData.delete(e.target.parentNode.dataset.id)
		file.value = ""
	}
})

/***********************
 * funcion para subir 
 * imagen al servidor
 **********************/
let btnUpImg = document.querySelector('.btnUpImg')
let formImg = document.querySelector('.formImg')
btnUpImg.addEventListener('click', () => {
	if (file.files[0] == null) {
		notifi('Debe seleccionar una imagen', 'info');
		
	} else {
		// console.log(file.files[0].size)
		// console.log(file.files[0].type)
		/*************************************************
		* creamos el objeto de envio para tipo de navegador
		* hacer una validacion para diferentes navegadores y crear el formato de lectura
		* y hacemos la peticion mediante ajax
		* usando un if reducido creamos un objeto del contenido en(request)
		*****************************************************/
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'User/imgUp';
		//creamos un objeto del formulario con los Pass haciendo referencia a formData
		let formData = new FormData(formImg );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados y evaluamos
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
					notifi(objData.msg, 'info')
				} else {
					notifi(objData.msg, 'error')
				}
			}
		}
	} 
})
/***********************
 * cargar los datos del usuario
 **********************/

if (document.querySelector('.formProfile')) {
	let intUser = document.querySelector('#intUserId').value
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'User/getUser'
	//id del atributo lr que obtuvimos enla variable
	let strData = "intUser=" + intUser
	request.open("POST", ajaxUrl, true)
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	//enviamos
	request.send(strData)
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) { 
			let objData = JSON.parse(request.responseText)
			if (objData.status) { 
				document.querySelector('#txtCiProfile').value = objData.ci
				document.querySelector('#txtNombreProfile').value = objData.nombre
				document.querySelector('#txtApellidoProfile').value = objData.apellido
				document.querySelector('#txtEmailProfile').value = objData.email
				document.querySelector('#txtTlfProfile').value = objData.telefono
				document.querySelector('#txtCdPostal').value = objData.codPostal
				document.querySelector('#txtDireccion').value = objData.direccion
				document.querySelector('#listState').innerHTML = request.responseText
				document.querySelector('#txtCiudad').innerHTML = objData.ciudad
			}else {
				notifi(objData.msg, "error")
			}
		}
	}
}
/***********************
 * enviar los datos para 
 * la actualizacion
 **********************/
let btnPerfil = document.querySelector('.btnPerfil')
let formProfile = document.querySelector('.formProfile')
btnPerfil.addEventListener('click', (e) => {
	e.preventDefault()
	let formData = new FormData(formProfile )
	let ajaxUrl = base_url + "User/updateProfile"
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("POST", ajaxUrl, true);
	request.send(formData)
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText)
			if (objData.status) {
				notifi(objData.msg, 'info');
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
})
/***********************
 * cargar los estados 
 **********************/

const listState = () => {
	if (document.querySelector('#listState')) {
		let ajaxUrl = base_url + 'User/getState'
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listState').innerHTML = request.responseText;
			}
		}
	}
}
/***********************
 * habilitar y deshabilitar 
 * bot
 **********************/
let confirmDel = document.querySelector('#confirmDel')
let btnConfirm = document.querySelector('.btn-confirm')
btnConfirm.disabled = true
btnConfirm.classList.add('disabled')
confirmDel.addEventListener('change', () => {
	if (confirmDel.checked) {
		btnConfirm.disabled = false
		btnConfirm.classList.remove('disabled')
	} else {
		btnConfirm.disabled = true
		btnConfirm.classList.add('disabled')
	}
})
btnConfirm.addEventListener('click', () => {
	alerta()
})
/***********************
 * cambiar clave 
 **********************/
let btnChangePass = document.querySelector('.btnChangePass')
btnChangePass.addEventListener('click', () => {
	let txtConfirmPass = document.querySelector('#txtConfirmPass').value
	let txtPass = document.querySelector('#txtPass').value
		//creamos el objeto para os navegadores
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'User/changePass'
	//abrimos la conexion y enviamos los parametros para la peticion
	let strData = new URLSearchParams("txtConfirmPass=" + txtConfirmPass+'&txtPass='+txtPass)
	request.open("POST", ajaxUrl, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	request.send(strData);
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//option obtenidos del controlador
			let objData = JSON.parse(request.responseText)
			if (objData.status) {
				notifi(objData.msg, 'success');
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
})
/***********************
 *crear usuario
 **********************/
if (document.querySelector('.bx-search')) {
	let bxSearch = document.querySelector('.bx-search')
	bxSearch.addEventListener('click', () => {
		let txtUser = document.querySelector('#txtUser').value
			//creamos el objeto para os navegadores
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'User/createUser'
		//abrimos la conexion y enviamos los parametros para la peticion
		let strData = new URLSearchParams("txtUser=" + txtUser)
		request.open("POST", ajaxUrl, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.send(strData);
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				let objData = JSON.parse(request.responseText)
				if (objData.status) {
					notifi(objData.msg, 'success');
					bxSearch.style.display = 'none' 
				} else if (objData.exist == 'existe') {
					document.querySelector('.txtMsj').textContent = objData.msg
				} else {
					notifi(objData.msg, 'error');
				}
			}
		}
	})
}
/***********************
 * eliminar cuenta 
 **********************/
btnConfirm.addEventListener('click', function () {
	let intUser = document.querySelector('#intUserId').value
	let ajaxUrl = base_url + 'User/deleteCount'
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("POST", ajaxUrl, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	let strData = "intUser=" + intUser
	request.send(strData);
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//option obtenidos del controlador
			let objData = JSON.parse(request.responseText)
			if (objData.status) {
				notifi(objData.msg, '');
			}
		}
	}
})
