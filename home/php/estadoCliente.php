<?php 
	session_start();
	require "../assets/database.php";
	$usuario = $_POST['usuario'];

	$query = "CALL v_ESTADO_CLIENTE('$usuario')";
	$result = mysqli_query($conn,$query);
	$ver=mysqli_fetch_array($result);
	$datos=array(
	            'estado' => $ver[0],
	            'cantidad' => $ver[1],
				);
	echo json_encode($datos);
 ?>