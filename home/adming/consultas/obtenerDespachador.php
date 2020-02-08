<?php 
	session_start();
	require "../../assets/database.php";

	$usr= $_POST['usr'];
	$sql = "CALL v_GASOLINERO_USR('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos = array(
					'idGas'=>$ver[0],
					'nombre'=>$ver[1],
					'domicilio'=>$ver[2],
					'ciudad'=>$ver[3],
					'estado'=>$ver[4],
					'telefono'=>$ver[5],
					'usr'=>$ver[6]
				);
	echo json_encode($datos);
 ?>