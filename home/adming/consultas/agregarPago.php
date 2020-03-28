<?php 
	session_start();

	require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$idcliente = $_POST['idP'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fechaInicial = $_POST['fechaInicialP'].' '.$_POST['horaInicialP'];
    $fechaFinal = $_POST['fechaFinalP'].' '.$_POST['horaFinalP'];

    $fechaPago = $_POST['fechaPagoP']. ' ' .$_POST['horaPagoP']; 

    $query = "call p_PAGOS($idcliente, $idEstacion, '$fechaInicial', '$fechaFinal', '$fechaPago');";
    $output = $_conexion->EjecutarConsulta($query);
    if (is_array($output))
    {
        if ($output[0] == 1)
        {
            echo 1;
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
        echo "Error en la consulta.";
    }
    
 ?>