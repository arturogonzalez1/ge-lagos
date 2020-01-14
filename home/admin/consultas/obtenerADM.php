<?php 
	require_once "../../assets/database.php";
	$usr = $_POST['usr'];
	$sql = "CALL v_GET_ADM('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
					'nombre' => $ver[0],
					'rfc' => $ver[1],
		            'domicilio' => $ver[2],
		            'ciudad' => $ver[3],
		            'estado' => $ver[4],
		            'telefono' => $ver[5],
		            'estacion' => $ver[6],
		            'id' => $ver[7],
		            'usr' => $ver[8],
		            'psw' => $ver[9],
				);
	echo json_encode($datos);
 ?>