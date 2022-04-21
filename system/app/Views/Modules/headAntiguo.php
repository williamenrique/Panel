
	<body>
		<div class="container-main">
	<div class="navigation">
		<div class="nav-head">
			<span class="version">V-1.0</span>
			<i class="fa-solid fa-xmark close"></i>
		</div>
		<ul class="">
			<li class="">
				<a href="#">
					<span class="iconImg"><img src="<?= IMG?>favicon.png" alt=""></span>
					<span class="">
						<h2 class="title-user">William Enrique</h2>
					</span>
				</a>
			</li>
			<li class="dashboard">
				<a href="<?= base_url()?>">
					<span class="icon"><i class="fa-solid fa-house"></i></span>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="site">
				<a href="<?= base_url()?>site">
					<span class="icon"><i class="fa-solid fa-users"></i></span>
					<span class="title">Sitios web</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-message"></i></span>
					<span class="title">Message</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-gear"></i></span>
					<span class="title">Setting</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-circle-question"></i></span>
					<span class="title">Help</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-lock"></i></span>
					<span class="title">Password</span>
				</a>
			</li>
			<li class="">
				<a href="#">
					<span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
					<span class="title">Sign Out</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="main">
		<div class="topbar">
			<div class="toggle"></div>
			<div class="search">
				<label for="#">
					<input type="text" name="search" id="search" placeholder="serach here">
					<i class="fa-solid fa-magnifying-glass"></i>
				</label>
			</div>
			<div class="user">
				<img src="./src/images/default.png" alt="">
			</div>
		</div>

			</div>
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
	<script src="<?= JS?>function.main.js"></script>
</body>

</html>