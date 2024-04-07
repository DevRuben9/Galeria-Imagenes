<?php 

use	Ruben\Imagenes\models\Galeria;

if ($_POST) {
	$uuid = $_GET['id'];
	$galeria = Galeria::get($uuid);
	// update galeria
	$name = isset($_POST['nombreImagen']) ? $_POST['nombreImagen'] : '';
	$details = isset($_POST['detalleImagen']) ? $_POST['detalleImagen'] : '';
	$locationDestination = '';
	$message = [];
	if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
		$location = $_FILES['imagen'];
		$locationName = $_FILES['imagen']['name'];
		$locationTempName = $_FILES['imagen']['tmp_name'];
		$locationError = $_FILES['imagen']['error'];
		$locationExt = explode('.', $locationName);

		$locationActualExt = strtolower(end($locationExt));

		$allowedExt = array("jpg","jpeg","png","pdf");
		if(in_array($locationActualExt, $allowedExt)){
			if($locationError == 0){
				$locationNemeNew = uniqid('',true).".".$locationActualExt;
	      $locationDestination = $locationNemeNew;
	      $locationfile = 'src/view/img/';
			if (!file_exists($locationfile)) {
			    mkdir($locationfile, 0777, true);
			}
			if (unlink('src/view/img/'.$galeria->getLocation())) {
				$message = ['mess' => 'Se reemplazo la imagen con exito'];
			}

	      move_uploaded_file($locationTempName, "$locationfile/$locationDestination");

	      // echo "File Uploaded successfully</br>";
			}else{
				echo "Something Went Wrong Please try again!";
			}
		} else {
			echo "You can't upload this extention of file";
		}

	}else {
		$locationDestination = $galeria->getLocation();
	}

	

	
	$galeria->setName($name);
	$galeria->setDetails($details);
	$galeria->setLocation($locationDestination);

	$galeria->update();

}else if (isset($_GET['id'])) {
	$galeria = Galeria::get($_GET['id']);
} else{
	header('Location: http://localhost/portafolio%20php/GaleriaImagenes/?view=home');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<link rel="stylesheet" href="src/view/css/style.css">
</head>
<body>
	
	<?php require 'Content/navbar.php'; ?>

	<div class="container">
		<div class="message"><?php if (isset($message)) {
			echo $message['mess']; }?>		
		</div>
		<form action="?view=update&id=<?= $galeria->getUUID(); ?>" method="post" enctype="multipart/form-data">
			<div class="formulario">
				<h2>Datos de la Imagen</h2>
				<div class="form">
					<div class="inputform">
						<img src="src/view/icons/imagen.png" alt=""><label for="">Nombre</label>
						<input type="text" class="nombretext" name="nombreImagen" placeholder="Introduzca Nombre de la Imagen" value="<?= $galeria->getName(); ?>">
					</div>
					<div class="inputform">
						<img src="src/view/icons/detalle.png" alt="" style="width: 20px;"><label for="">Detalles</label>
						<textarea class="contenttext" cols="40" rows="4" name="detalleImagen" placeholder="Introduzca Detalles de la Imagen"><?= $galeria->getDetails(); ?></textarea>
					</div>
					<button class="btnModal">Crear Imagen</button>
				</div>
				<div class="image">
					<div class="preview"><img src="src/view/img/<?= $galeria->getLocation(); ?>" id="photoSelect" alt=""></div>
					<input type="file" name="imagen" id="loadPhoto"/>
				</div>
			</div>
			
		</form>
	</div>

<script type="text/javascript" src="src/view/js/galeria.js"></script>
</body>
</html>