<?php 
	require "../assets/database.php";

	//$numEstacion = $_POST['numEstacion'];
	$sql = "SELECT idEstacion, precioDiesel, precioMagnaE, precioPremiumE FROM ESTACION";

	$result = mysqli_query($conn,$sql);

	$ver = mysqli_fetch_row($result);

	$datos=array(
			'id_juego'=>$ver[0],
              'nombrejU'=>$ver[1],
              'aniojU'=>$ver[2],
              'empresajU'=>$ver[3]
					);
	echo json_encode($datos);
 ?>