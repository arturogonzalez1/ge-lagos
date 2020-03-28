<?php 

	require "../../assets/bd.php";

	$_conexion = new Conexion('35.239.178.56', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge_legos');
	$nombre = strtoupper($_POST['nombreE']);
	$no = $_POST['noE'];
    $rfc = strtoupper($_POST['rfcE']);
    $estado = $_POST['estadoE'];
    
	$query = "CALL p_ESTACION('$nombre', '$rfc', '$estado', $no);";
	$datos = $_conexion->EjecutarConsulta($query);
	if (is_array($datos)) {
		if ($datos[0] == 1) {
			echo 1;
		}
		else if ($datos[0] == 2) {
			echo "El numero de estacion ingresado ya esta registrado.";
		}
	}
	else {
		echo "Error al insertar.";
	}
 ?>