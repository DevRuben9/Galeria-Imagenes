<?php 

	namespace Ruben\Imagenes\models;

	if (count($_POST)>0) {
		$name = isset($_POST['name']) ?? '';
		$details = isset($_POST['details']) ?? '';
		$location = $_FILES['imagen'];
		
		$locationName = $_FILES['imagen']['name'];
		$locationTempName = $_FILES['imagen']['tmp_name'];
		
		$locationExt = explode('.', $locationName);

		$locationActualExt = strtolower(end($locationExt));

		$allowedExt = array("jpg","jpeg","png","pdf");
		$locationDestination = '';
		if(in_array($locationActualExt, $allowedExt)){
			$locationNemeNew = uniqid('',true).".".$locationActualExt;
        //File destination
        $locationDestination = 'img/'.$locationNemeNew;
        //function to move temp location to permanent location
        move_uploaded_file($locationTempName, $locationDestination);
        //Message after success
        echo "File Uploaded successfully</br>";
		}else{
			echo "You can't upload this extention of file";
		}

		$galeria = new Galeria($name, $details, $locationDestination);
		$galeria->save();
		echo $galeria->getLocation();

	}
?>
<!DOCTYPE html>
<html lang="es">
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
		<form action="?view=create" method="post" enctype="multipart/form-data">
			<div class="formulario">
				<h2>Datos de la Imagen</h2>
				<div class="form">
					<div class="inputform">
						<img src="src/view/icons/imagen.png" alt=""><label for="">Nombre</label>
						<input type="text" class="nombretext" name="nombreImagen" placeholder="Introduzca Nombre de la Imagen">
					</div>
					<div class="inputform">
						<img src="src/view/icons/detalle.png" alt="" style="width: 20px;"><label for="">Detalles</label>
						<textarea class="contenttext" cols="40" rows="4" name="detalleImagen" placeholder="Introduzca Detalles de la Imagen"></textarea>
					</div>
					<button class="btnModal">Crear Imagen</button>
				</div>
				<div class="image">
					<div class="preview"><img src="src/view/img/avatar0.jpg" id="photoSelect" alt=""></div>
					<input type="file" name="imagen" id="loadPhoto">
				</div>
			</div>
			
		</form>
	</div>
<script type="text/javascript" src="src/view/js/galeria.js"></script>
</body>
</html>