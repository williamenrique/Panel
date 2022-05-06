		<!-- cierre del box-main -->
		</div>
		<!-- cierre del container-main -->
	</div>


	<script>
		let page_link = "<?= $data['page_link']?>"
		if (document.querySelector("." + page_link)) {
			let activar = document.querySelector("." + page_link)
			// let page_menu_open = document.querySelector("." + page_menu_open)
			activar.classList.add('active')
		}
		if(document.querySelector("."+"<?= $data['page_menu_open']?>")){
			
			let link_menu = document.querySelector("."+"<?= $data['page_menu_open']?>")
			link_menu.classList.add('arrow')
			link_menu.classList.add('active')
			let height = 0
			let menu = link_menu.nextElementSibling //obtener el hermano adyacente
			// evaluamos el alto de los submenu dinamicamnete
			if (menu.clientHeight == 0) {
				height = menu.scrollHeight
			}
			// cambiar el valor del height
			menu.style.height = `${height}px`
		}
	
		</script>
	<script>const base_url = "<?= base_url()?>";</script>
	<link href="<?= PLUGINS?>DataTable/css/jquery.dataTables.min.css">
	<link href="<?= PLUGINS?>DataTable/css/responsive.dataTables.min.css">
	<script src="<?= PLUGINS?>jquery/jquery-3.5.1.js"></script>
	<script src="https://kit.fontawesome.com/0edefeb486.js" crossorigin="anonymous"></script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	

	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
	<script src="<?= JS?>function.main.js"></script>
	<script src="<?= JS.$data['page_function']?>"></script>
</body>

</html>