<?php 
	require "../../assets/database.php";

	$nombre = $_POST['nombreADM'];
	$rfc = $_POST['rfcADM'];
    $domicilio = $_POST['domicilioADM'];
    $ciudad = $_POST['ciudadADM'];
    $estado = $_POST['estadoADM'];
    $telefono = $_POST['telefonoADM'];
    $estacion = $_POST['estacionADM'];
    $usr = $_POST['usrADM'];
    $psw = $_POST['pswADM'];
    
    $query = "CALL p_ADM_ESTACIONES('$nombre', '$rfc', '$domicilio', '$ciudad', '$estado', '$telefono', $estacion, '$usr', '$psw');";
    echo mysqli_query($conn,$query);
 ?>