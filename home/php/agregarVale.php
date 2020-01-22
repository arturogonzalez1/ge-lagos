<?php 
	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
	require '../assets/database.php';

	$idU = $_SESSION['c_user_id'];

	$placa = $_POST['txtVPlacaAutorizada'];
	$chofer = strtoupper($_POST['txtVChoferAutorizado']);
	$tipoComb = $_POST['txtVTipoCombustible'];


	if (isset($_POST['txtVPlacaAutorizada']) && isset($_POST['txtVChoferAutorizado']) && isset($_POST['txtVTipoCombustible']))
	{

		if ($_POST['txtVPlacaAutorizada'] != "NA" && $_POST['txtVChoferAutorizado'] != "NA" && $_POST['txtVTipoCombustible'] != "NA") 
		{  
			$tipoCombustible = $_POST['txtVTipoCombustible'];
			//POR LITROS
			if ($_POST['txtVPorLitros'] != "NA" && $_POST['txtVPorImporte'] == "NA" && $tipoCombustible != "LUBRICANTE")
			{
				$litros = $_POST['txtVPorLitros'];

				$query = "CALL p_VALE('$chofer', $litros, 0, '$placa', $idU, '$tipoCombustible')";
				$result = mysqli_query($conn, $query);
				$ver = mysqli_fetch_row($result);
				if ($ver[0] == 1)
					echo 1;
				else if ($ver[0] == 2)
					echo 2;
				else if ($ver[0] == 3)
					echo 3;
				else if ($ver[0] == 4)
					echo 4;
			}
			//POR IMPORTE
			if ($_POST['txtVPorLitros'] == "NA" && $_POST['txtVPorImporte'] != "NA" || $tipoCombustible == "LUBRICANTE")
			{
				$importe = $_POST['txtVPorImporte'];

				$query = "CALL p_VALE('$chofer', 0, $importe, '$placa', $idU, '$tipoCombustible')";
				$result = mysqli_query($conn, $query);
				$ver = mysqli_fetch_row($result);
				if ($ver[0] == 1)
					echo 1;
				else if ($ver[0] == 2)
					echo 2;
				else if ($ver[0] == 3)
					echo 3;
				else if ($ver[0] == 4)
					echo 4;
			}
		}
		else
		{
			echo "LLENE TODOS LOS CAMPOS DE TEXTO"; 
		}
	}
 ?>