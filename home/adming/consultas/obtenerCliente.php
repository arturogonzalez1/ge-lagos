<?php 
	session_start();
	require "../../assets/database.php";

	$usr = $_POST['usr'];
	$sql = "CALL v_GET_DATOSCLIENTE('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
			'limite'=>$ver[0],
              'diasPago'=>$ver[1],
              'pa'=>$ver[2],
              'id'=>$ver[3],
              'nombre'=>$ver[4],
              'rfc'=>$ver[5],
              'usr'=>$ver[6],
					);
	echo json_encode($datos);
 ?>