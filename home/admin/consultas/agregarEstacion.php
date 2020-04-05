<?php 

	require "../../assets/bd.php";

	$_conexion = new Conexion('35.239.178.56', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge_legos');

	$idEmpresa = 0;
	$rfc = "";
	$razons = "";
	$regimen = "";
	$email = "";

	$nombre = trim(strtoupper($_POST['nombreE']));
	$no = trim($_POST['noE']);
    $estado = $_POST['estadoE'];

    $opcion = $_POST['checkbox'];

    if ($opcion == 1) {
    	$idEmpresa = $_POST['idEmpresa'];
    }
    else if ($opcion == 0){
    	$rfc = trim(strtoupper($_POST['rfcE']));
	    $razons = trim(strtoupper($_POST['razonsE']));
	    $regimen = trim(strtoupper($_POST['regimenE']));
	    $email = trim($_POST['emailE']);
    }
   
    
	$query = "CALL p_ESTACION('$nombre', '$rfc', '$razons', '$regimen', '$email','$estado', $no, $idEmpresa);";
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