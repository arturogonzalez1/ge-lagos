<?php 
    require "../../assets/bd.php";

    $_conexion = new Conexion();

    $tipopersona = $_POST['tipopersona'];

	$nombre = trim(strtoupper($_POST['nombreC']));
    $apellidos = trim(strtoupper($_POST['apellidosC']));
    $rfc = trim(strtoupper($_POST['rfcC']));
    $calle = trim(strtoupper($_POST['calleC']));
    $numeroexterior = trim($_POST['numeroexteriorC']);
    $numerointerior = trim($_POST['numerointeriorC']);
    $codpos = $_POST['codposC'];
    $email = trim($_POST['emailC']);
    $email2 = "NULL";

    if ( !empty(trim($_POST['email2C']))) {
        $email2 = "'".$_POST['email2C']."'";
    }

    $email3 = "NULL";

    if ( !empty(trim($_POST['email3C']))) {
        $email3 = "'".$_POST['email3C']."'";
    }

    $telefono = "NULL";

    if ( !empty(trim($_POST['telefonoC']))) {
        $telefono = "'".$_POST['telefonoC']."'";
    }

    $razons = "";

    if ( !empty(trim($_POST['razonsC']))) {
        $razons = "'".$_POST['razonsC']."'";
    } else {
        $razons = "'".$nombre." ".$apellidos."'";
    }

    $colonia = trim(strtoupper($_POST['coloniaC']));
    $estado = trim(strtoupper($_POST['estadoC']));
    $ciudad = trim(strtoupper($_POST['ciudadC']));
    $pais = trim(strtoupper($_POST['paisC']));
    $delegacion = trim(strtoupper($_POST['delegacionC']));
    $numregidtrib = trim(strtoupper($_POST['numregidtribC']));
    $usocfdi = trim(strtoupper($_POST['usocfdiC']));
    $limite = $_POST['limiteC'];
    $diasPago = $_POST['diasPagoC'];
    $diasLimite = $_POST['diasLimiteC'];
    $modalidad = $_POST['modalidadC'];
    $usuario = $_POST['usuarioC'];
    $psw = $_POST['pswC'];
    $pswC = $_POST['pswCC'];



    if ($diasLimite == 1)
        $diasLimite = 30;
    if ($diasLimite == 2)
        $diasLimite = 60;
    if ($diasLimite == 3)
        $diasLimite = 90;

    if ($psw == $pswC)
    {
		$query = "CALL p_CLIENTE(1, '$nombre', '$apellidos', '$rfc', '$email', $email2, $email3, '$telefono', '$razons', '$calle', 
                                $numeroexterior, $numerointerior, '$codpos', '$colonia', '$estado', '$ciudad', '$delegacion', '$pais'
                                '$numregidtrib', '$usocfdi', $limite, $diasPago, $diasLimite, '$modalidad', '$usuario', '$psw', 0);";
        echo $query;
        // $ver = $_conexion->EjecutarConsulta($query);
        // if (is_array($ver)) {
        //     if ($ver[0] == 1) {
        //         echo 1;
        //     }
        //     else if ($ver[0] == 2) {
        //         echo "EL USUARIO NO ESTA DISPONIBLE";
        //     }
        // }
        // else {
        //     echo "ERROR AL INSERTAR";
        // }
	}
	else echo false;
 ?>