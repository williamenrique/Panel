/**************************************
 * Funciones de notificacion y alerta *
 * ***********************************/
var toastMixin = Swal.mixin({
		toast: true,
		iconColor: 'white',
		position: 'top-right',
		showConfirmButton: false,
		timer: 2000,
		customClass: {
			popup: 'colored-toast'
		},
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
const notifi = (data, icon) => {
		toastMixin.fire({
			title: data,
			icon: icon
		})
	}
const alertC = (icon,title,text) => {
	Swal.fire({
		icon: icon,
		title: title,
		text: text
	})
}
const alerta = (text) =>{
	Swal.fire(
		{title : text}
	)
}

const cancel = (titulo, textButton) => {
	Swal.fire({
		title: titulo,
		showCancelButton: true,
		confirmButtonText: textButton,
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			notifi('Eliminado', 'success')
		} else {
			notifi('Se a cancelado', 'info')
		}
	})
}

/*********************************
 * Funciones de letras y numeros *
 * *******************************/
function soloNumeros(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789";
	especiales = "8-37-39-46";

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}
function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = "8-37-39-46";

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}
/*********************************
 * Funciones desplegable         *
 * *******************************/
let listElements = document.querySelectorAll('.click')

listElements.forEach(listElement => {
	listElement.addEventListener('click', () => {
		listElement.classList.toggle('arrow')
		let height = 0
		let menu = listElement.nextElementSibling //obtener el hermano adyacente
		// evaluamos el alto de los submenu dinamicamnete
		if (menu.clientHeight == 0) {
			height = menu.scrollHeight
		}
		// cambiar el valor del height
		menu.style.height = `${height}px`
	})
})
/*********************************
 * Funciones topbar y lateral    *
 * *******************************/
let toggle = document.querySelector('.toggle')
let navigation = document.querySelector('.navigation')
let main = document.querySelector('.box-main')
let topbar = document.querySelector('.topbar')
let close = document.querySelector('.close')

const toggleMenu = () => {
	toggle.classList.toggle('active')
	navigation.classList.toggle('active')
	main.classList.toggle('active')
	topbar.classList.toggle('active')
}
toggle.addEventListener('click', () => {
	toggleMenu()
})
close.onclick = () => {
	navigation.classList.toggle('active')
	main.classList.toggle('active')
	topbar.classList.toggle('active')
}
window.addEventListener('scroll', () => {
	topbar.classList.toggle('sticky', window.scrollY > 0)
})