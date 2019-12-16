<?php 
	session_start();
	require "../assets/database.php";
	$idU = $_SESSION['c_user_id'];
	$placa=$_POST['placa'];
	$query = "CALL p_VEHICULO_BAJA($idU, '$placa')";
    echo mysqli_query($conn,$query);
 ?>
