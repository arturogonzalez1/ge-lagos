<?php 
	session_start();
	require "../../assets/database.php";

	$id = $_POST['idClienteM'];

    $nombre = $_POST['nombreCM'];
    $rfc = $_POST['rfcCM'];
	$lim = $_POST['limiteCM'];
	$dias = $_POST['diasPagoCM'];
    $diasLimite = $_POST['diasLimiteCM'];
    $modalidad = $_POST['modalidadCM'];
    $pa = $_POST['paCM'];
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
    	$result =  mysqli_query($conn,$query);

        if ($result){
                $ver = mysqli_fetch_row($result);
                if ($ver[0] == 2){
                    echo 1;
                }
                if ($ver[0] == 3){
                    echo "USUARIO NO DISPONIBLE. INTENTE USAR OTRO";
                }
            }
            else{
                echo 0;
            }

    }
    else 
    	echo "LAS CONTRASEÑAS NO COINCIDEN";
 ?>