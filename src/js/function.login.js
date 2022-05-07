let loginForm = document.querySelector('.login-form')
let txtUserLogin = document.querySelector('#txtUserLogin')
let txtPassLogin = document.querySelector('#txtPassLogin')

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