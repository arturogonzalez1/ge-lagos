<?php
	session_start();
	require "../../assets/bd.php";
	require "../../assets/database.php";

	$idcliente = $_POST['id'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fechaInicial = $_POST['fechaInicial'].' '.$_POST['horaInicial'].':00';
    $fechaFinal = $_POST['fechaFinal'].' '.$_POST['horaFinal'].':00';

    $tickets = array();
    $salida = "";

    $query = "CALL v_TICKETS_TO_PAY($idcliente, $idEstacion, '$fechaInicial', '$fechaFinal')";
    $result = mysqli_query($conn,$query) or die($conn->error);

    while ($row = mysqli_fetch_array($result)) {
    	$nombre = $row[0];
    	$fecha = $row[1];
    	$noTicket = $row[2];
    	$importe = $row[3];
    	$estacion = $row[4];
    	
		$salida .= '
    	<div class="w3-card margen">
    		<span>
    			<label>'.$noTicket.'</label>
    			<br>
    			FECHA: '.$fecha.' IMPORTE: '.$importe.'
    		</span>
		</div>
	';
    	
    }
    echo $salida;
 ?>