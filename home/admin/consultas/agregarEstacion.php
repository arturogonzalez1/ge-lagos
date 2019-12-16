<?php 

	require "../../assets/database.php";

	$nombre = $_POST['nombreE'];
	$no = $_POST['noE'];
    $rfc = $_POST['rfcE'];
    $estado = $_POST['estadoE'];
    
	$query = "CALL p_ESTACION('$nombre', '$rfc', '$estado', $no);";
    echo mysqli_query($conn,$query);
 ?>