<?php 
	$idusuario = $_POST['iduser'];
	$numVale = $_POST['numvale'];
	$importe = $_POST['importe'];

	require "../../assets/bd.php";
	$_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$query = "CALL p_MODIFICAR_TICKET($idusuario, $numVale, $importe)";
	$datos = $_conexion->EjecutarConsulta($query);
	if (is_array($datos)) {
		if ($datos[0] == 1) {
			$_conexion->Commit();
			echo 1;
		}
		else if ($datos[0] == 2) {
			echo "SOLO SE MODIFICA EL TICKET SIEMPRE Y CUANDO EL IMPORTE NUEVO SEA MENOR AL IMPORTE ACTUAL.";
		}
		else if ($datos[0] == 3) {
			echo "NO ES POSIBLE MODIFICAR UN TICKET DESPUES DE 48 HORAS DE HABERLO CARGADO.";
		}
		else if ($datos[0] == 4) {
			echo "NO ES POSIBLE MODIFICAR TICKES POR LUBRICANTE.";
		}
	}
	else {
		$_conexion->Rollback();
	}
 ?>