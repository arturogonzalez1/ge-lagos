<?php 
	session_start();
	require "../../assets/database.php";

	$usr = $_POST['usr'];
	$sql = "CALL v_GET_DATOSCLIENTE('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);
	if ($ver[7]=="CREDITO") $ver[7]=1;
	if ($ver[7]=="DEBITO") $ver[7]=2;
	if ($ver[7]=="CONTADO") $ver[7]=3;

	$datos=array(
			'limite'=>$ver[0],
              'diasPago'=>$ver[1],
              'pa'=>$ver[2],
              'id'=>$ver[3],
              'nombre'=>$ver[4],
              'rfc'=>$ver[5],
              'usr'=>$ver[6],
              'mod'=>$ver[7],
					);
	echo json_encode($datos);
 ?>