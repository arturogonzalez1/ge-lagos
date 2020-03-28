<?php 
	session_start();
	require "../../assets/funciones.php";

	$f = new Funciones();

	$idcliente = $_POST['idP'];
	$idestacion = $_SESSION['adm_idEstacion'];
	$fechaInicial = $_POST['fechaInicialP'].' '.$_POST['horaInicialP'].':00';
	$fechaFinal = $_POST['fechaFinalP'].' '.$_POST['horaFinalP'].':00';

	$result = $f->TotalFacturas($idcliente, $idestacion, $fechaInicial, $fechaFinal);
	echo '<h1 align="center">'.$result.'</h1>';
 ?>