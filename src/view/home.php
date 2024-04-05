<?php 

use	Ruben\Imagenes\models\Galeria;

 $galeria = Galeria::getAll()

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="src/view/css/style.css">
</head>
<body>
	<?php require 'Content/navbar.php'; ?>
	<div class="container">
		<h1>Galeria</h1>

		<div class="galeria">
		<?php foreach ($galeria as $res) { ?>
			<div class="imagen">
				<a href="<?= '?view=update&id='.$res->getUUID(); ?>">
				<img src="src/view/img/<?= $res->getLocation(); ?>" alt="">
				<div class="content">
					<p><b>Nombre: <?= $res->getName(); ?></b></p> 
					<p><b>Detalles: <?= $res->getDetails(); ?></b></p>
				</div></a>
			</div>
			
		<?php } ?>
			
		</div>

	</div>

<script type="text/javascript" src="src/js/galeria.js"></script>
</body>
</html>