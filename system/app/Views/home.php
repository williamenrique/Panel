<?php head($data)?>
<div class="container">
		<div class="heading">
		<h2 class="title"><span>H</span>ome</h2>
		<?= 'aqui nombre de imagen'.$_SESSION['imagen']?>
	</div>

	<?php 
		$arrData= sessionUser(1);
		// $arrData = $this->model->sessionLogin($_SESSION['idUser']);
		dep($arrData);
	?>
</div>

<?php footer($data) ?>