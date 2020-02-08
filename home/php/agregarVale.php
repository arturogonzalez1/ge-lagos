<?php 
	session_start();
	require '../assets/bd.php';
	require '../assets/database.php';

	$_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$idUsuario = $_SESSION['c_user_id'];

	if (isset($_POST['litros']) && $_POST['concepto'] != "LUBRICANTE") {
		$litros = $_POST['litros'];
		$importe = 0;
	}
	else if (isset($_POST['importe'])) {
		$importe = $_POST['importe'];
		$litros = 0;
	}
	else {
		echo "ERROR EN LOS DATOS";
		exit;
	}

	$placa = $_POST['placa'];
	$concepto = $_POST['concepto'];
	$operador = strtoupper($_POST['operador']);

	$query = "CALL p_VALE('$operador', $litros, $importe, '$placa', $idUsuario, '$concepto')";
	$datos = $_conexion->EjecutarConsulta($query);
	if (is_array($datos)) {
		if ($datos[0] == 1) {
			$_conexion->Commit();
			echo 1;
		}
		else if ($datos[0] == 2) {
			echo "CREDITO INSUFICIENTE.";
		}
		else if ($datos[0] == 3) {
			echo "SU CUENTA NO ESTA ACTIVA.";
		}
		else if ($datos[0] == 4) {
			echo "VEHICULO NO CORRESPONDE AL CLIENTE.";
		}
		else if ($datos[0] == 5) {
			echo "ERROR DE PRECIOS DE ESTACION. COMUNIQUE LA FALLA A UN ADMINISTRADOR.";
		}
		exit;
	}
	else {
		$_conexion->Rollback();
	}
 ?>