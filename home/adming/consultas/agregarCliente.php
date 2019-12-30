<?php 

	require "../../assets/database.php";

	$nombre = $_POST['nombreC'];
    $rfc = $_POST['rfcC'];
    $limite = $_POST['limiteC'];
    $diasPago = $_POST['diasPagoC'];
    $diasLimite = $_POST['diasLimiteC'];
    $modalidad = $_POST['modalidadC'];
    $pa = $_POST['paC'];
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
	    $result = mysqli_query($conn,$query);

        if ($result){
                $ver = mysqli_fetch_row($result);
                if ($ver[0] == 2){
                    echo 1;
                }
                if ($ver[0] == 3){
                    echo "EL RFC YA ESTA REGISTRADO";
                }
                if ($ver[0] == 4){
                    echo "USUARIO NO DISPONIBLE. INTENTE USAR OTRO";
                }
            }
            else{
                echo "Error en la consulta";
            }
	}
	else echo "Constrasenas no coinciden";
 ?>