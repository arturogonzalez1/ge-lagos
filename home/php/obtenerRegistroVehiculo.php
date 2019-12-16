<?php 
	require_once "../assets/database.php";

	$placa = $_POST['placa'];
	$sql = "CALL v_GET_VEHICULO('$placa')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
            'placa' => $ver[0],
            'marca' => $ver[1],
            'modelo' => $ver[2],
            'unidad' => $ver[3],
            'motor' => $ver[4],
					);
	echo json_encode($datos);
 ?>