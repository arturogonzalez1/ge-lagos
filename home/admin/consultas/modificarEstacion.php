<?php 
	require "../../assets/database.php";
	require "../../assets/bd.php";

	$_conexion = new Conexion('35.239.178.56', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge_legos');

	$idEmpresa = 0;
	$rfc = "";
	$razons = "";
	$regimen = "";
	$email = "";

	$idEstacion = $_POST['idEM'];
	$nombre = trim(strtoupper($_POST['nombreEM']));
	$no = trim($_POST['numEM']);
    $estado = $_POST['estadoEM'];

    $idEmpresa = $_POST['idEmpresa'];

    if ($idEmpresa == 0){
    	$rfc = trim(strtoupper($_POST['rfcEM']));
	    $razons = trim(strtoupper($_POST['razonsEM']));
	    $regimen = trim(strtoupper($_POST['regimenEM']));
	    $email = trim($_POST['emailEM']);
    }

	$query = "CALL p_UPDATE_ESTACION($idEstacion,'$nombre', '$rfc', '$razons', '$regimen', '$email','$estado', $no, $idEmpresa);";
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