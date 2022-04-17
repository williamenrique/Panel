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
/****
 * funcion para la notificacion
 */
notificar = (data, icon) => {
	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	})
	Toast.fire({
		icon: icon,
		title: data
	})
}
// alerta
const alerta = (title, data, icon) => {
	Swal.fire({
		icon: icon,
		title: title,
		text: data,
		footer: '<a href="">Why do I have this issue?</a>'
	})
}

let toggle = document.querySelector('.toggle')
let navigation = document.querySelector('.navigation')
let main = document.querySelector('.main')

const toggleMenu = () => {
	toggle.classList.toggle('active')
	navigation.classList.toggle('active')
	main.classList.toggle('active')
}
toggle.addEventListener('click', () => {
	toggleMenu()
})