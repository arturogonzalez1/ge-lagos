<?php 
    require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$nombre = strtoupper($_POST['nombreC']);
    $rfc = strtoupper($_POST['rfcC']);
    $limite = $_POST['limiteC'];
    $diasPago = $_POST['diasPagoC'];
    $diasLimite = $_POST['diasLimiteC'];
    $modalidad = $_POST['modalidadC'];
    $pa = strtoupper($_POST['paC']);
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
		$query = "CALL p_CLIENTE('$nombre', '$rfc', $limite, $diasPago, $diasLimite, '$modalidad', '$pa', '$usuario', '$psw');";
        $ver = $_conexion->EjecutarConsulta($query);
        if (is_array($ver)) {
            if ($ver[0] == 1) {
                $_conexion->Commit();
                echo 1;
            }
            else if ($ver[0] == 2) {
                echo "EL USUARIO NO ESTA DISPONIBLE";
            }
        }
        else {
            $_conexion->Rollback();
            echo "ERROR AL INSERTAR";
        }
	}
	else echo false;
 ?>