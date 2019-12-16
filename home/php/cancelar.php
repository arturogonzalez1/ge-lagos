<?php  
	session_start();
	require_once "../assets/database.php";

	$idU = $_SESSION['c_user_id'];
	$numVale = $_POST['numVale'];

	$query = "CALL P_CANCELAR_VALE('$idU','$numVale')";
	echo mysqli_query($conn,$query);
?>