<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear Imagen</title>
	<link rel="stylesheet" href="src/css/style.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
	<?php require 'Content/navbar.php'; ?>
	<div class="container">
		<button class="btnModal">Crear Imagen</button>
		
		<div class="formulario">
			<div class="preview"><img src="" id="photoSelect" alt=""></div>
			<div><input type="file" name="imagen" id="loadPhoto"></div>
		</div>

	</div>
<script type="text/javascript" src="src/js/galeria.js"></script>
</body>
</html>