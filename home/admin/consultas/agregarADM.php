<?php 
    require "../../assets/bd.php";
    require "../../assets/funciones.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');
    $funciones = new Funciones();

	$nombre = strtoupper($_POST['nombreADM']);
	$rfc = strtoupper($_POST['rfcADM']);
    $domicilio = strtoupper($_POST['domicilioADM']);
    $ciudad = strtoupper($_POST['ciudadADM']);
    $estado = $_POST['estadoADM'];
    $telefono = $_POST['telefonoADM'];
    $estacion = $_POST['estacionADM'];
    $usr = $_POST['usrADM'];
    $psw = $_POST['pswADM'];
    
    $query = "CALL p_ADM_ESTACIONES('$nombre', '$rfc', '$domicilio', '$ciudad', '$estado', '$telefono', $estacion, '$usr', '$psw');";

    $result = $_conexion->EjecutarConsulta($query);
    if (is_array($result)) {
        if ($result[0] == 1) {
            echo 1;
        }
        else if ($result[0] == 2) {
            echo "El RFC ya esta registrado";
        }
        else if ($result[0] == 3) {
            echo "El usuario ya esta registrado";
        }
    }
    else {
        echo "Error al insertar";
    }
 ?>