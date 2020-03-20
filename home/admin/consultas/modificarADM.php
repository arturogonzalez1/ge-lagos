<?php 
	require "../../assets/bd.php";
	require "../../assets/database.php";

	$_conexion = new Conexion();

	$id = $_POST['idADMM'];
	$nombre = strtoupper($_POST['nombreADMM']);
	$rfc = strtoupper($_POST['rfcADMM']);
	$domicilio = strtoupper($_POST['domicilioADMM']);
	$ciudad = strtoupper($_POST['ciudadADMM']);
    $estado = $_POST['estadoADMM'];
    $telefono = $_POST['telefonoADMM'];
    $estacion = $_POST['estacionADMM'];
    $usr =  $_POST['usrADMM'];
    $psw = $_POST['pswADMM'];
    $pswc = $_POST['pswcADMM'];
    
    if ($psw == $pswc)
    {
		$query = "CALL p_UPDATE_ADM($id, $estacion, '$nombre', '$rfc','$domicilio', '$ciudad', '$estado', '$telefono', '$usr', '$psw');";
		$datos = $_conexion->EjecutarConsulta($query);
		if (is_array($datos)) {
			if ($datos[0] == 1) {
				echo 1;
			}
			if ($datos[0] == 2) {
				echo "El RFC ya esta registrado";
			}
			if ($datos[0] == 3) {
				echo "El usuario ya esta registrado";
			}
		}
		else {
			echo "No se ha podido actualizar";
		}
	}
 ?>