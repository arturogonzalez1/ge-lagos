<?php 
    session_start();
	require "../../assets/database.php";

    //INFORMACION
	$nombre = $_POST['nombreGAS'];
    $domicilio = $_POST['domicilioGAS'];
    $ciudad = $_POST['ciudadGAS'];
    $estado = $_POST['estadoGAS'];
    $telefono = $_POST['telefonoGAS'];
    $usr = $_POST['usrGAS'];
    $psw = $_POST['pswGAS'];
    $pswc = $_POST['pswcGAS'];
    $estacion = $_SESSION['adm_idEstacion'];

    if ($psw == $pswc) {
        $imagen=$_FILES['fotoGAS']['name'];
        $archivo=$_FILES['fotoGAS']['tmp_name']; 
        $original = imagecreatefromjpeg($archivo);

        $anchoOriginal = imagesx($original);
        $altoOriginal = imagesy($original);

        $copia = imagecreatetruecolor(240, 300);
        imagecopyresampled($copia, $original, 0,0,0,0, 240, 300, $anchoOriginal, $altoOriginal);
        $ruta= '../../images/imgDes'; $ruta=$ruta."/".$usr.".jpg";
        
        move_uploaded_file(imagejpeg($copia, $ruta, 100),$ruta);
        $query = "CALL p_GASOLINERO('$nombre','$domicilio','$ciudad','$estado','$telefono','$usr','$psw', $estacion)";
        $result = mysqli_query($conn,$query);
        echo $query;

        if ($result)
        {
            $ver = mysqli_fetch_row($result);
            if ($ver[0] == 2)
            {
                echo 1;
            }
            else
            {
                echo "ESTE USUARIO YA ESTA REGISTRADO";
            }
        }
        else
        {
            echo 0;
        }
    }
    else echo "Las contraseñas no coinciden";
 ?>