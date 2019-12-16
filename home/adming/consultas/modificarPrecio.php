<?php 
	session_start();
	require "../../assets/database.php";

	$idEst = $_SESSION['adm_idEstacion'];
	$diesel = $_POST['dieselm'];
	$magna = $_POST['magnam'];
    $premium = $_POST['premiumm'];

    
	$query = "CALL p_SET_PRECIO($idEst, $diesel, $magna, $premium);";
    echo mysqli_query($conn,$query);
 ?>