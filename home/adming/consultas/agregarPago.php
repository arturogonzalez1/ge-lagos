<?php 
	session_start();

	require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$idcliente = $_POST['id'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fechaInicial = $_POST['fechaInicial'].' '.$_POST['horaInicial'];
    $fechaFinal = $_POST['fechaFinal'].' '.$_POST['horaFinal'];
    $tipoPago = $_POST['tipoPago'];
    $numeroFactura = $_POST['numeroFactura'];
    $fechaPago = $_POST['fechaPago']. ' ' .$_POST['horaPago'];
    if ($tipoPago == 1) {
        $tipoPago = "DEPOSITO BANCARIO";
    }if ($tipoPago == 2) {
        $tipoPago = "TRANSFERENCIA BANCARIA";
    }
    if ($tipoPago == 3) {
        $tipoPago = "CHEQUES";
    }
    if ($tipoPago == 4) {
        $tipoPago = "EFECTIVO";
    }

    

    $query = "call p_PAGOS($idcliente, $idEstacion, '$fechaInicial', '$fechaFinal', '$tipoPago','$numeroFactura', '$fechaPago');";
    $output = $_conexion->EjecutarConsulta($query);
    if (is_array($output))
    {
        if ($output[0] == 1)
        {
            if ($_conexion->Commit()){
                echo 1;
            }
        }           
        else if ($output[0] == 2)
        {
            echo "ERROR EN LAS FECHAS";
        }
        else if ($output[0] == 3)
        {
            echo "NO HAY TICKETS REGISTRADOS";
        }
    }
    else
    {
        $_conexion->Rollback();
        echo "Error en la consulta.";
    }
    
 ?>