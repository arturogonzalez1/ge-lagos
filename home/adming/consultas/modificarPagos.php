<?php 
	session_start();
	require "../../assets/database.php";

	$cliente = $_POST['clientesuu'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fInicial = $_POST['finicialu'].' '.$_POST['hinicialu'];
    $fFinal = $_POST['ffinalu'].' '.$_POST['hfinalu'];
    $tPago= $_POST['tpagou'];
    $fecha = $_POST['fpago']. ' ' .$_POST['hpago'];
    $nFactura= $_POST['nfacturau'];
    
    	$query = "call p_PAGOS('$cliente', $idEstacion, '$fInicial', '$fFinal', '$tPago','$nFactura', '$fecha')";
    	$result = mysqli_query($conn,$query);
        $ver = mysqli_fetch_row($result);
        if ($ver[0] == 1)
            echo 1;
        else if ($ver[0] == 2)
            echo 2;

 ?>