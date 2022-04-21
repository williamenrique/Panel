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