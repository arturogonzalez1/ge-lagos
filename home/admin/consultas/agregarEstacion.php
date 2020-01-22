<?php 

	require "../../assets/bd.php";

	$_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');
	$nombre = strtoupper($_POST['nombreE']);
	$no = $_POST['noE'];
    $rfc = strtoupper($_POST['rfcE']);
    $estado = $_POST['estadoE'];
    
	$query = "CALL p_ESTACION('$nombre', '$rfc', '$estado', $no);";
	$datos = $_conexion->EjecutarConsulta($query);
	if (is_array($datos)) {
		if ($datos[0] == 1) {
			$_conexion->Commit();
			echo 1;
		}
		else if ($datos[0] == 2) {
			echo "El numero de estacion ingresado ya esta registrado.";
		}
	}
	else {
		$_conexion->Rollback();
		echo "Error al insertar.";
	}
 ?>