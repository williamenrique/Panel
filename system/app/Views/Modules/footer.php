		<!-- cierre del box-main -->
		</div>
		<!-- cierre del container-main -->
	</div>


	<script>
		let page_link = "<?= $data['page_link']?>";
		if (document.querySelector("." + page_link)) {
			let activar = document.querySelector("." + page_link);
			activar.classList.add('active');
		}
	</script>
	<script>const base_url = "<?= base_url()?>";</script>
	<link href="<?= PLUGINS?>DataTable/css/jquery.dataTables.min.css">
	<link href="<?= PLUGINS?>DataTable/css/responsive.dataTables.min.css">
	<script src="<?= PLUGINS?>jquery/jquery-3.5.1.js"></script>
	<script src="https://kit.fontawesome.com/0edefeb486.js" crossorigin="anonymous"></script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<!-- <script src="<?= PLUGINS?>sweetalert/sweetalert2@11.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
	<script src="<?= JS?>function.main.js"></script>
	<script src="<?= JS.$data['page_function']?>"></script>
</body>

</html>