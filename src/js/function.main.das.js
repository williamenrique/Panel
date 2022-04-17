let toggle = document.querySelector('.toggle')
let toogle = document.querySelector('.toogle')
let navigation = document.querySelector('.navigation')
let main = document.querySelector('.main')
let topbar = document.querySelector('.topbar')

toggle.onclick = () => {
	navigation.classList.toggle('active')
	main.classList.toggle('active')
	topbar.classList.toggle('active')
}
toogle.onclick = () => {
	navigation.classList.toggle('active')
	main.classList.toggle('active')
	topbar.classList.toggle('active')
}
window.addEventListener('scroll', () => {
	topbar.classList.toggle('sticky', window.scrollY > 0)
})