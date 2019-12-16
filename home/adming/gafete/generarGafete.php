<?php 
	session_start();
	$usuario = $_POST['usuario'];

	$_SESSION['adm_usuario'] = $usuario;
	echo true;
?>