<?php 
	session_start();
	$_SESSION['foliofactura'] = $_POST['foliofactura'];
	echo true;
 ?>