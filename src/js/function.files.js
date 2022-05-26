let tableFiles
document.addEventListener('DOMContentLoaded', function () {
	getTableFiles()
}, false)
/* Cargamos la tabla con los archivos */
const getTableFiles = () => {
	tableFiles = $('#tableFiles').DataTable( {
		responsive: true,
		"language": {
			"sLengthMenu": "Mostrar _MENU_",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible",
			"sInfo": "Total de _TOTAL_ Registros"
		},
	"responsive": {
		"name": "medium",
		"width": "800"
	},
	"ajax": {
		"url": base_url + 'File/getListFile',
		"dataSrc": ''
	},
	"columns": [
		{ 'data': 'file_icon'},
		{ 'data': 'file_name'},
		{ 'data': 'file_size'},
		{ 'data': 'file_date_mod'},
		{ 'data': 'opciones'}
	],
	"bDestroy": true,
	"iDisplayLength": 10,
	"order": [[0, "asc"]]
	} )
}
let formDataFiles = new FormData()
let uploadFile = document.querySelector('#uploadFile')
let upFiles = document.querySelector('.btn-subir-archivo')
upFiles.disabled = true
let search = document.querySelector('.btn-searchFiles')
search.addEventListener('click', () => {
	document.querySelector('#uploadFile').click()
	uploadFile.value = ""
	createClearFormDataFiles()
})
uploadFile.addEventListener('change', (e) => {
	if (uploadFile === "") {
		upFiles.disabled = true
	} else {
		upFiles.disabled = false
	}
	// console.log(uploadFile)
	// recorrer multiples archivos
	for (let i = 0; i < uploadFile.files.length; i++) {
		let fileThumbnail_id = Math.floor(Math.random() * 30000) + '_' + Date.now()
		// crear una funcion para guardar los files
		createFileThumbnail(uploadFile, i, fileThumbnail_id)
		// agregar un apenchild por cada file que se agrega
		formDataFiles.append(fileThumbnail_id,uploadFile.files[i])
	}
})

upFiles.addEventListener('click', () => {
	fetch('File/setFiles', {
		method: 'post',
		body: formDataFiles
	})
	.then(function (response) {
		return response.json()
	})
	.then(function (data) {
		if (data.status) {
			notifi(data.msg, 'success');
			createClearFormDataFiles()
			upFiles.disabled = true
			let tableFiles = $('#tableFiles').DataTable()
			tableFiles.ajax.reload()
		} else {
			notifi(data.msg, 'error');
		}
	})
	.catch(function (err) {
		console.log(err)
	})
})
const createFileThumbnail = function (uploadFile, iterator, fileThumbnail_id) {
	// creamos un elemento donde guardaremos el fileprevio
	let fileThumbnail = document.createElement('span')
	fileThumbnail.classList.add('thumbnailFile', fileThumbnail_id)
	// se le asigna un id en el data set para recogerlo luego
	fileThumbnail.dataset.id = fileThumbnail_id
	// file.files[0].name;
	fileThumbnail.innerHTML= uploadFile.files[iterator].name
	// fileThumbnail.setAttribute('style', `background-image:url(${URL.createObjectURL(uploadFile.files[iterator])})`)
	document.getElementById('box-preview-file').appendChild(fileThumbnail)
	createCloseFile(fileThumbnail_id)
}
// funcion para clrear el boton de cerrar la imagen
const createCloseFile = (fileThumbnail_id) => {
	let closeButtonFile = document.createElement('i')
	closeButtonFile.classList.add('close-button-file')
	closeButtonFile.classList.add('bx')
	closeButtonFile.classList.add('bxs-x-circle')
	// closeButtonFile.innerText = 'x'<i class='bx bxs-x-circle'></i>
	// despues de crear la funcion para cerrar
	document.getElementsByClassName(fileThumbnail_id)[0].appendChild(closeButtonFile)
}
// funcion para limpiar el formdata y ficheros
const createClearFormDataFiles = () => {
	// formdata es un array se recorre
	for (let key of formDataFiles.keys()) {
		formDataFiles.delete(key)
	}
	// hacer un barrido con foreach de los thumbnail en el dom
	document.querySelectorAll('.thumbnailFile').forEach(function (thumbnailFile) {
		thumbnailFile.remove()
	})
}
// remover el fileThumbnail
document.body.addEventListener('click', function (e) {
	if ( e.target.classList.contains('close-button-file') ) {
		e.target.parentNode.remove();
		formDataFiles.delete(e.target.parentNode.dataset.id)
		e.target.value = ''
	}
})

/************************************
editar en vivo los datos
************************************/
$(document).on('blur', '#fileName', function () {
	let idname_file = $(this).data('idname_file')
	let name_file = $(this).data('name_file')
	let textFile = $(this).text()
	updateFileLive(idname_file,textFile,name_file)
	// updateFileLive(intFile,textFile,fileName,'pass')
})

const updateFileLive = (idname_file, textFile,name_file) => {
	//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'File/updateFileLive'
	//id del atributo lr que obtuvimos enla variable
	let strData = new URLSearchParams("idname_file="+idname_file+"&textFile="+textFile+"&name_file="+name_file)
	request.open("POST", ajaxUrl, true);
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	//enviamos
	request.send(strData);
	// request.send();
	request.onreadystatechange = function () {
		//comprobamos la peticion
		if (request.readyState == 4 && request.status == 200) {
			//convertir en objeto JSON
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				notifi(objData.msg, 'info');
				let tableFiles = $('#tableFiles').DataTable()
				tableFiles.ajax.reload(function () {})
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
}
const delFile = (intFile) => {
		Swal.fire({
		title: 'Estas seguro de eliminar el sitio.?',
		text: "No podra ser revertido el proceso!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.isConfirmed) { }
		})
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'File/delFile'
	//id del atributo lr que obtuvimos enla variable
	let strData = new URLSearchParams("intFile="+intFile)
	request.open("POST", ajaxUrl, true);
	//forma en como se enviara
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	//enviamos
	request.send(strData);
	// request.send();
	request.onreadystatechange = function () {
		//comprobamos la peticion
		if (request.readyState == 4 && request.status == 200) {
			//convertir en objeto JSON
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				notifi(objData.msg, 'info');
				let tableFiles = $('#tableFiles').DataTable()
				tableFiles.ajax.reload()
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
}