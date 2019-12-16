<?php 
	$idusuario = $_POST['iduser'];
	$numVale = $_POST['numvale'];
	$importe = $_POST['importe'];

	require "../../assets/database.php";

	$query = "CALL p_MODIFICAR_TICKET($idusuario, $numVale, $importe)";

	$result = mysqli_query($conn,$query);

	$ver = mysqli_fetch_row($result);

	if ($ver[0] == 1) echo 1;
	if ($ver[0] == 2) echo 2;
	if ($ver[0] == 3) echo 3;
	if ($ver[0] == 4) echo 4;
 ?>