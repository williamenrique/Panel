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
	<script src="<?= PLUGINS?>jquery/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/0edefeb486.js" crossorigin="anonymous"></script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= JS.$data['page_function']?>"></script>
	<script src="<?= JS?>site.js"></script>
</body>

</html>