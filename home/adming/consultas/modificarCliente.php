<?php 
	session_start();
    require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$id = $_POST['idClienteM'];

    $nombre = strtoupper($_POST['nombreCM']);
    $rfc = strtoupper($_POST['rfcCM']);
    $lim = $_POST['limiteCM'];
    $dias = $_POST['diasPagoCM'];
    $diasLimite = $_POST['diasLimiteCM'];
    $modalidad = $_POST['modalidadCM'];
    $pa = strtoupper($_POST['paCM']);
    $usr = $_POST['usuarioCM'];
    $psw = $_POST['pswCM'];
    $pswc = $_POST['pswCCM'];

    if ($diasLimite == 1)
        $diasLimite = 30;
    if ($diasLimite == 2)
        $diasLimite = 60;
    if ($diasLimite == 3)
        $diasLimite = 90;

    if ($modalidad == 1)
        $modalidad = "CREDITO";
    if ($modalidad == 2)
        $modalidad = "DEBITO";
    if ($modalidad == 3)
        $modalidad = "CONTADO";

    if ($psw == $pswc)
    {

        $query = "CALL p_UPDATE_CLIENTE($id, '$nombre', '$rfc',$lim, $dias, '$modalidad','$pa', '$usr', '$psw', $diasLimite);";
        $datos = $_conexion->EjecutarConsulta($query);
        if (is_array($datos)) {
            if ($datos[0] == 1) {
                $_conexion->Commit();
                echo 1;
            }
            else if ($datos[0] == 2) {
                echo "EL SALDO ACTUAL NO PUEDE SER MAYOR AL NUEVO LIMITE DE CREDITO";
            }
            else if ($datos[0] == 3) {
                echo "EL USUARIO INGRESADO NO ESTA DISPONIBLE";
            }
        }
        else {
            $_conexion->Rollback();
            echo "ERROR AL REALIZAR LA CONSULTA";
        }
    }
    else 
        echo "LAS CONTRASEÑAS NO COINCIDEN";
 ?>