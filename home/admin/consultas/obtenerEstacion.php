<?php 
	require_once "../../assets/database.php";

	$num = $_POST['numEstacion'];
	$sql = "CALL v_GET_ESTACION($num)";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
					'id' => $ver[0],
					'num' => $ver[1],
		            'nombre' => $ver[2],
		            'rfc' => $ver[3],
		            'estado' => $ver[4]
				);
	echo json_encode($datos);
 ?>