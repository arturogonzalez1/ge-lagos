<?php 
	session_start();
	require '../assets/funciones.php';
	$f = new Funciones();
	$idU = $_SESSION['c_user_id'];
	$anio = $_POST['anio'];
	$meses = $f -> LlenarMesesEC($idU, $anio);
	echo $meses;
 ?>