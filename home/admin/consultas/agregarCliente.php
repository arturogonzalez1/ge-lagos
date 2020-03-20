<?php 
    require "../../assets/bd.php";

    $_conexion = new Conexion();

	$nombre = strtoupper($_POST['nombreC']);
    $apellidos = strtoupper($_POST['apellidosC']);
    $rfc = strtoupper($_POST['rfcC']);
    $codpos = $_POST['codposC'];
    $email = $_POST['emailC'];
    $email2 = $_POST['email2C'];
    $email3 = $_POST['email3C'];
    $telefono = $_POST['telefonoC'];
    $razons = strtoupper($_POST['razonsC']);
    $colonia = strtoupper($_POST['coloniaC']);
    $estado = strtoupper($_POST['estadoC']);
    $ciudad = strtoupper($_POST['ciudadC']);
    $pais = strtoupper($_POST['paisC']);
    $delegacion = strtoupper($_POST['delegacionC']);
    $numregidtrib = strtoupper($_POST['numregidtribC']);
    $usocfdi = strtoupper($_POST['usocfdiC']);
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
		$query = "CALL p_CLIENTE('$nombre', '$apellidos', '$rfc', '$codpos', '$email', '$email2', '$email3', '$telefono', '$razons', '$colonia', 
        '$estado', '$ciudad', '$pais', '$delegacion', '$numregidtrib', '$usocfdi', $limite, $diasPago, $diasLimite, '$modalidad', '$usuario', '$psw');";
        $ver = $_conexion->EjecutarConsulta($query);
        if (is_array($ver)) {
            if ($ver[0] == 1) {
                echo 1;
            }
            else if ($ver[0] == 2) {
                echo "EL USUARIO NO ESTA DISPONIBLE";
            }
        }
        else {
            echo "ERROR AL INSERTAR";
        }
	}
	else echo false;
 ?>