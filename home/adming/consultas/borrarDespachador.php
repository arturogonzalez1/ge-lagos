<?php 
	require "../../assets/database.php";

	$usr = $_POST['usr'];

	$query = "CALL p_DELETE_GAS('$usr');";

	echo mysqli_query($conn, $query);
 ?>