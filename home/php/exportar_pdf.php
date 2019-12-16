<?php 
	session_start();
	$numVale = $_POST['numVale'];

	$_SESSION['c_numVale'] = $numVale;
	echo true;
?>