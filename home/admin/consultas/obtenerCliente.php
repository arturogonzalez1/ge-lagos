<?php 
	session_start();
	require "../../assets/database.php";

	$usr = $_POST['id'];
	$sql = "CALL v_GET_DATOSCLIENTE('$usr')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);
	if ($ver[6]=="CREDITO") $ver[6]=1;
	if ($ver[6]=="DEBITO") $ver[6]=2;
	if ($ver[6]=="CONTADO") $ver[6]=3;

	if ($ver[7]==30) $ver[7]=1;
	if ($ver[7]==60) $ver[7]=2;
	if ($ver[7]==90) $ver[7]=3;

	$datos=array(
				'limite'=>$ver[0],
				'diasPago'=>$ver[1],
				'pa'=>$ver[2],
				'id'=>$ver[3],
				'nombre'=>$ver[4],
				'rfc'=>$ver[5],
				'modalidad'=>$ver[6],
				'diasLimite'=>$ver[7],
				);
	echo json_encode($datos);
 ?>