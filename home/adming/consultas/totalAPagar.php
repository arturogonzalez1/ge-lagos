<?php
	session_start();
	require "../../assets/funciones.php";

	$f = new Funciones();

	$idcliente = $_POST['id'];
	$idestacion = $_SESSION['adm_idEstacion'];
	$fechaInicial = $_POST['fechaInicial'].' '.$_POST['horaInicial'].':00';
	$fechaFinal = $_POST['fechaFinal'].' '.$_POST['horaFinal'].':00';

	$result = $f->TotalParaPagar($idcliente, $idestacion, $fechaInicial, $fechaFinal);
	echo '<h1 align="center">'.$result.'</h1>';
 ?>