<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear Imagen</title>
	<link rel="stylesheet" href="src/view/css/style.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
	<?php require 'Content/navbar.php'; ?>

	<div class="container">
		<form action="" method="">
			<div class="formulario">
				<h2>Datos de la Imagen</h2>
				<div class="form">
					<div class="inputform">
						<img src="src/icons/imagen.png" alt=""><label for="">Nombre</label>
						<input type="text" class="nombretext" name="nombre">
					</div>
					<div class="inputform">
						<img src="src/icons/detalle.png" alt="" style="width: 20px;"><label for="">Detalles</label>
						<textarea class="contenttext" cols="40" rows="4" name="detalle"></textarea>
					</div>
					<button class="btnModal">Crear Imagen</button>
				</div>
				<div class="image">
					<div class="preview"><img src="src/img/avatar0.jpg" id="photoSelect" alt=""></div>
					<input type="file" name="imagen" id="loadPhoto">
				</div>
			</div>
			
		</form>
	</div>
<script type="text/javascript" src="src/js/galeria.js"></script>
</body>
</html>