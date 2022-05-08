<?php 
head($data);

	
?>
<div class="container">
		<div class="heading">
		<h2 class="title"><span>H</span>ome</h2>
		<?php 
		echo "aqui ".$_SESSION['idUser'].' '.	$_SESSION['userData']['nombre'];
		?>
		<a href="<?= base_url()?>login/logout">salir</a>

	</div>
</div>

<?php footer($data) ?>