<?php  
	session_start();
	require_once "../assets/bd.php";

	$idU = $_SESSION['c_user_id'];
	$numVale = $_POST['numVale'];
	$bd_conn = new Conexion();

	$query = "CALL P_CANCELAR_VALE('$idU','$numVale')";
	$result = $bd_conn->EjecutarConsulta($query);
	if (is_array($result)) {
		if ($result[0] == 1) {
			echo 1;
		}
		else {
			echo "Ha ocurrido un error";
		}
	}
	else {
		echo "Ha ocurrido un error";
	}
?>