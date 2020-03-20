<?php 
	session_start();
	require "../../assets/bd.php";

	$_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$idEst = $_SESSION['adm_idEstacion'];
	$diesel = $_POST['dieselm'];
	$magna = $_POST['magnam'];
    $premium = $_POST['premiumm'];

    
	$query = "CALL p_SET_PRECIO($idEst, $diesel, $magna, $premium);";
	$datos = $_conexion->EjecutarConsulta($query);
	if (is_array($datos)) {
		if ($datos[0] == 1) {
			echo 1;
		}
	}
	else {
		echo "Error en la solicitud.";
	}
 ?>