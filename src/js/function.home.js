/**********************************
 * calendario
 ********************************/
let hoy = new Date()
const url_event = base_url+'Home/actionEvent';
document.addEventListener('DOMContentLoaded', function () {
	document.querySelector('#txtInicio').value = hoy.toISOString().split('T')[0]
	document.querySelector('#txtFin').value = hoy.toISOString().split('T')[0]
	let formCalendar = document.querySelector('.formCalendar')
	let calendarEl = document.getElementById('calendar')
	let calendar = new FullCalendar.Calendar(calendarEl, {
		initialView: 'dayGridMonth',
		locale : 'es',
		buttonText: {
			prev: 'Ant',
			next: 'Sig',
			today: 'Hoy',
			month: 'Mes',
			week: 'Semana',
			day: 'Día',
			list: 'Agenda',
		},
		headerToolbar: {
			left: 'prev, next, today',
			center: 'title',
			right: 'dayGridMonth, timeGridWeek, listWeek'
		},
		events: base_url +'Home/listarEvents',
		editable: true,
		dateClick: function (info) {
			// console.log(info)
			// formCalendar.reset()
			document.querySelector('#idEvent').value = ''
			let txtTituloEvento = document.querySelector('#txtTituloEvento')
			let title_box = document.querySelector('.title-box').textContent = 'Agregar nuevo evento'
			let txtInicio = document.querySelector('#txtInicio').value = info.dateStr
			document.querySelector('.btn-guardar').textContent = 'Agregar'
			document.querySelector('.btn-delete').style.display = 'none'
		},
		eventClick: function (info) {
			// console.log(info)	
			// formClean()
			document.querySelector('.title-box').textContent = 'Editar evento'
			document.querySelector('#idEvent').value = info.event.id
			document.querySelector('.btn-guardar').textContent = 'Editar'
			document.querySelector('.btn-guardar').classList.remove('btn-primary')
			document.querySelector('.btn-guardar').classList.add('btn-warning')
			document.querySelector('.btn-guardar').textContent = 'Editar'
			document.querySelector('.btn-delete').style.display = 'block'
			document.querySelector('#txtTituloEvento').value = info.event.title
			document.querySelector('#txtInicio').value = info.event.startStr
			document.querySelector('#txtFin').value = info.event.endStr
			document.querySelector('#txtColor').value = info.event.backgroundColor
		},
		eventDrop: function (info) {
			// console.log(info)
			const idEvent = info.event.id
			const start = info.event.startStr
			const end = info.event.endtStr
			console.log(end)
			const formdata = new FormData()
			formdata.append('accion','drop')
			formdata.append('idEvent',idEvent)
			formdata.append('start',start)
			formdata.append('end',end)
			fetch(url_event, {
				method: 'POST',
				body: formdata,
			})
			.then( (response) => {
				return response.json()
			})
			.then( (data) => {
				// console.log(data)
				if (data.status) {
					notifi(data.msg,'success')
					calendar.refetchEvents()
					formClean()
				} else {
					notifi(data.msg,'error')
				}
			})
			.catch( (err) => {
				console.log(err)
			})
		}
	})
	calendar.render()
	/**********************************************
	 * // funcion para eliminar un evento
	 *********************************************/
	if (document.querySelector('.btn-delete')) {
		document.querySelector('.btn-delete').addEventListener('click', () => {
			const formdata = new FormData(formCalendar);
			formdata.append('accion','delete');
			fetch(url_event, {
				method: 'POST',
				body: formdata,
			})
			.then((response) => {
				return response.json()
			})
			.then((data) => {
				// console.log(data)
				if (data.status) {
					notifi(data.msg, 'success')
					// document.querySelector('.btn-guardar').textContent = 'guardar'
					// document.querySelector('.btn-delete').style.display = 'none'
					document.querySelector('.btn-guardar').classList.remove('btn-warning')
					document.querySelector('.btn-guardar').classList.add('btn-primary')
					calendar.refetchEvents()
					formClean()
				} else {
					notifi(data.msg,'error')
				}
			})
			.catch((err) => {
				console.log(err)
			})
		})
	}
		/**********************************************
	 * // funcion para crear un evento
	 *********************************************/
	formCalendar.addEventListener('submit', (e) => {
		e.preventDefault()
		let txtTituloEvento = document.querySelector('#txtTituloEvento')
		// let txtInicio = document.querySelector('#txtInicio')
		// let txtColor = document.querySelector('#txtColor')
	
		const formdata = new FormData(formCalendar)
		formdata.append('accion','event')
		fetch(url_event, {
			method: 'POST',
			body: formdata,
		})
			.then((response) => {
				return response.json()
			})
			.then((data) => {
				if (data.status) {
					notifi(data.msg,'success')
					calendar.refetchEvents()
					formClean()
				} else {
					notifi(data.msg, 'error')
					txtTituloEvento.focus()
				}
			})
			.catch((err) => {
				console.log(err)
			})
	})
})


	/**********************************************
	 * limpiar form
	 *********************************************/
const formClean = () => {
	document.querySelector('#txtInicio').value = hoy.toISOString().split('T')[0]
	document.querySelector('#txtFin').value = hoy.toISOString().split('T')[0]
	document.querySelector('.title-box').textContent = 'Agregar Evento'
	document.querySelector('#txtTituloEvento').value = ''
	document.querySelector('#txtColor').value = '#283046'
	document.querySelector('.btn-guardar').textContent = 'Agregar'
	document.querySelector('.btn-delete').style.display = 'none'
}





/* 

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
/* 	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
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
} */
