<?php 
	require_once "../../assets/database.php";
	$usr = $_POST['usr'];
	$sql = "CALL v_GET_ADM('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
					'nombre' => $ver[0],
		            'domicilio' => $ver[1],
		            'ciudad' => $ver[2],
		            'estado' => $ver[3],
		            'telefono' => $ver[4],
		            'estacion' => $ver[5],
		            'id' => $ver[6],
		            'usr' => $ver[7],
		            'psw' => $ver[8],
				);
	echo json_encode($datos);
 ?>