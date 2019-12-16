<?php 
	session_start();
	if (!isset($_SESSION['loged']) || $_SESSION['loged'] == false || $_SESSION['nivelP'] != 1)
	{
		header("Location: ../../../index.php");
	}
	else
	{
		require '../home_admin_view.php';
	}
 ?>