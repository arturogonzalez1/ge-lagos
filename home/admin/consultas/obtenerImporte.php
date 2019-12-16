<?php 
	$idCliente = $_POST['idcliente'];
	$numVale = $_POST['numvale'];

	require "../../assets/database.php";
	$query = "CALL v_OBTENER_IMPORTE($idCliente, $numVale)";

	$result = mysqli_query($conn,$query);

	$ver = mysqli_fetch_row($result);

	$datos=array(
			'importe'=>$ver[0],
			'numvale'=>$ver[1],
					);
	echo json_encode($datos);
 ?>