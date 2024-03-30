<?php 

if (isset($_GET['view'])) {
	$view = $_GET['view'];
	require 'src/view/' . $view . '.php';
}else{
	require 'src/view/home.php';
}

?>