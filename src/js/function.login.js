let txtUserLogin = document.querySelector('#txtUserLogin')
let txtPassLogin = document.querySelector('#txtPassLogin')
let btnLogin = document.querySelector('.btnLogin')
let bloques = document.querySelectorAll('.box-tab')
let li = document.querySelectorAll('.tab')

//recorrer todos los li
li.forEach((cadaLi , i) => {
	// asignar bun click a cada li
	li[i].addEventListener('click', () => {
		// recorrer los li
		li.forEach((cadaLi , i ) => {
			// remover las clases
			li[i].classList.remove('active')
			bloques[i].classList.remove('active')
		})
		// agregando clase en la misma pocicion al bloque con li 
		li[i].classList.add('active')
		bloques[i].classList.add('active')
	})
})
/****************************
 * funcion para logear
 **************************/
btnLogin.addEventListener('click', (e) => {
	e.preventDefault()
	let formLogin = document.querySelector('.formLogin')
	//enviar datos al controlador
	var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + 'Login/loginUser';
	//creamos un objeto del formulario con los datos haciendo referencia a formData
	var formData = new FormData(formLogin); 
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send(formData);
	request.onreadystatechange = function () {
		//validamos la respuesta del DOM
		if (request.readyState != 4) return;//no hacemos nada
		if (request.status == 200) {
			//convertir en json lo obtenido
			var objData = JSON.parse(request.responseText);
			//verfificamos si es verdadero la respuesta en json del controlador
			if (objData.status) {
				// notifi(objData.msg, 'info');
				window.location = base_url + 'home';
				// alert(base_url + 'home');
			} else {
				notifi(objData.msg, 'error');
			}
		} 
		return false;
	}
})

if (document.querySelector('.formRegister')) { 
	let formRegister = document.querySelector('.formRegister')
	formRegister.onsubmit = function (e) {
		e.preventDefault()
		let txtEmailRegister = document.querySelector('#txtEmailRegister')
		let txtPassRegister = document.querySelector('#txtPassRegister')
		let txtPassRegisterConfirm = document.querySelector('#txtPassRegisterConfirm')
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Login/registerUser';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formRegister);
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				if (objData.status) {
					notifi(objData.msg, 'info');
					formRegister.reset()
				} else {
					notifi(objData.msg, 'error');
				}
			}
		}
	}
}