<?php 
	require "../assets/ftp.php";
	$ftp_conn = new ConexionFTP();
	$placa = $_POST['placa'];

	$server_path = "images/web/vehiculos/".$placa.".jpg";
	$local_path = "../temp/vehiculo.jpg";

	$datos = $ftp_conn->GetImage($local_path, $server_path);
	if ($datos) {
		echo $datos;
	}
	else {
		echo $datos;
	}
 ?>