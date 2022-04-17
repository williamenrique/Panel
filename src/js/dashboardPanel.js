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