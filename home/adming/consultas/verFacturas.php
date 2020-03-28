<?php 
	session_start();
	require "../../assets/bd.php";
	require "../../assets/database.php";

	$idcliente = $_POST['idP'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fechaInicial = $_POST['fechaInicialP'].' '.$_POST['horaInicialP'].':00';
    $fechaFinal = $_POST['fechaFinalP'].' '.$_POST['horaFinalP'].':00';

    $tickets = array();
    $salida = "";

    $query = "CALL v_FACTURAS_TO_PAY($idcliente, $idEstacion, '$fechaInicial', '$fechaFinal')";
    $result = mysqli_query($conn,$query) or die($conn->error);

    while ($row = mysqli_fetch_array($result)) {
    	$folio = $row[0];
    	$fecha = $row[1];
    	$tipoPago = $row[2];
    	
		$salida .= '
            <div class="w3-card margen col-lg-5 col-md-3 col-sm-12">
                <span>
                    <label>'.$folio.'</label>
                    <br>
                    FECHA: '.$fecha.' Tipo de Pago: '.$tipoPago.'
                </span>
            </div>
	';
    	
    }
    echo $salida;
 ?>