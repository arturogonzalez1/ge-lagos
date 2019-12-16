<?php 
	session_start();
	require "../../assets/database.php";

	$idEstacion = $_SESSION['adm_idEstacion'];
	$sql = "CALL v_SOLOESTACION('$idEstacion')";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
			'diesel'=>$ver[4],
              'magna'=>$ver[5],
              'premium'=>$ver[6],
					);
	echo json_encode($datos);
 ?>