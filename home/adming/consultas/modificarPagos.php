<?php 
	session_start();

	require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$cliente = $_POST['clientesuu'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fInicial = $_POST['finicialu'].' '.$_POST['hinicialu'];
    $fFinal = $_POST['ffinalu'].' '.$_POST['hfinalu'];
    $tPago= $_POST['tpagou'];
    $fecha = $_POST['fpago']. ' ' .$_POST['hpago'];
    $nFactura= $_POST['nfacturau'];
    

    $query = "call p_PAGOS('$cliente', $idEstacion, '$fInicial', '$fFinal', '$tPago','$nFactura', '$fecha');";
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
    }
    
 ?>