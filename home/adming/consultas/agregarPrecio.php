<?php 
	session_start();
	require "../../assets/database.php";
	$idEst = $_SESSION['adm_idEstacion'];
	$diesel = $_POST['diesel'];
	$magna = $_POST['magna'];
    $premium = $_POST['premium'];

    
	$query = "CALL p_PRECIO($idEst, $diesel, $magna, $premium);";
    echo mysqli_query($conn,$query);
 ?>