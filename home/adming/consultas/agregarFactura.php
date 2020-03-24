<?php
	session_start();
	require "../../assets/bd.php";

	$bd_conn = new Conexion();
	$idcliente = $_POST['id'];
    $idestacion = $_SESSION['adm_idEstacion'];
    $fechaInicial = $_POST['fechaInicial'].' '.$_POST['horaInicial'].':00';
    $fechaFinal = $_POST['fechaFinal'].' '.$_POST['horaFinal'].':00';
    $tipoPago = $_POST['tipoPago'];

    $query = "CALL p_FACTURA($idcliente, $idestacion, '$fechaInicial', '$fechaFinal', $tipoPago);";
    $result = $bd_conn->EjecutarConsulta($query);
    if (is_array($result)) {
    	echo $result[0];
    }
    else
    	echo false;
 ?>