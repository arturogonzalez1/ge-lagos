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
		            'estado' => $ver[3],
		            'rfc' => $ver[4],
		            'razons' => $ver[5],
		            'regimen' => $ver[6],
		            'email' => $ver[7],
		            'idEmpresa' => $ver[8],
				);
	echo json_encode($datos);
 ?>