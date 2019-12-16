<?php 
	session_start();
	require "../../assets/database.php";

	$usr = $_POST['usr'];

	$query = "CALL p_ACTIVAR_CLIENTE('$usr');";
	echo mysqli_query($conn,$query);
 ?>