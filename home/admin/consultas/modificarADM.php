<?php 
	require "../../assets/database.php";

	$id = $_POST['idADMM'];
	$nombre = $_POST['nombreADMM'];
	$domicilio = $_POST['domicilioADMM'];
	$ciudad = $_POST['ciudadADMM'];
    $estado = $_POST['estadoADMM'];
    $telefono = $_POST['telefonoADMM'];
    $estacion = $_POST['estacionADMM'];
    $usr =  $_POST['usrADMM'];
    $psw = $_POST['pswADMM'];
    $pswc = $_POST['pswcADMM'];
    
    if ($psw == $pswc)
    {
		$query = "CALL p_UPDATE_ADM($id, $estacion, '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$usr', '$psw');";
		$result = mysqli_query($conn,$query);
		$ver = mysqli_fetch_row($result);

	    if ($ver[0] == 1)echo 1;
	    if ($ver[0] == 2)echo 2;
	}
 ?>