<?php 
	require "../../assets/database.php";

	$id = $_POST['idEM'];
	$num = $_POST['numEM'];
	$nombre = strtoupper($_POST['nombreEM']);
	$rfc = strtoupper($_POST['rfcEM']);
    $estado = $_POST['estadoEM'];

	$query = "CALL p_UPDATE_ESTACION($id, $num, '$nombre', '$rfc', '$estado');";
	echo mysqli_query($conn,$query);
 ?>