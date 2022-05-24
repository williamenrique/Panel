

				</div>
		</div>
</div>

		<script>
		const base_url = "<?= base_url()?>";
		let page_link = "<?= $data['page_link']?>"
		if (document.querySelector("." + page_link)) {
			let activar = document.querySelector("." + page_link)
			let iconActive = document.querySelector("." + page_link)
			activar.classList.add('item_active')
			iconActive.classList.add('icon-active')
		}
		if(document.querySelector("."+"<?= $data['page_menu_open']?>")){
			
			let link_menu = document.querySelector("."+"<?= $data['page_menu_open']?>")
			let link_activo = document.querySelector("."+"<?= $data['page_link_active']?>")
			link_menu.classList.add('arrow')
			link_menu.classList.add('item_active')
			link_activo.classList.add('link_active')
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
		<script src="<?= PLUGINS ?>jquery/jquery-3.5.1.js"></script>
		<!-- <script src="<?= PLUGINS ?>dataTable/jquery.dataTables.min.js"></script>-->
		<script src="<?= PLUGINS ?>dataTable/datatables.min.js"></script>
		<script src="<?= PLUGINS ?>dataTable/dataTables.responsive.min.js"></script> 
		<script src="<?= PLUGINS ?>fullcalendar-5.11.0/main.min.js"></script>
		<script src="<?= PLUGINS ?>fullcalendar-5.11.0/es.js"></script>
		<script src="<?= PLUGINS ?>sweetalert/sweetalert2@10.js"></script>
		<!-- <script src="<?= JS?>function.main.js"></script> -->
		<script src="<?= JS.$data['page_function']?>"></script>
		<script src="<?= JS?>main.js"></script>
</body>
</html>