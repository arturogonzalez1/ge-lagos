<?php 
	session_start();
	$_SESSION['report_user'] = $_POST['user'];
	$_SESSION['report_anio'] = $_POST['anio'];
	$_SESSION['report_month'] = $_POST['mes'];
	$_SESSION['report_cliente'] = $_POST['cliente'];
	echo true;
 ?>