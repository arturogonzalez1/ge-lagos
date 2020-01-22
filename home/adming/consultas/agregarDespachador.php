<?php 
    session_start();

    require "../../assets/bd.php";
	require "../../assets/database.php";
    require "../../assets/funciones.php";

    $funciones = new Funciones();
    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

    //INFORMACION
	$nombre = strtoupper(trim($_POST['nombreGAS']));
    $domicilio = strtoupper(trim($_POST['domicilioGAS']));
    $ciudad = strtoupper(trim($_POST['ciudadGAS']));
    $estado = $_POST['estadoGAS'];
    $telefono = $_POST['telefonoGAS'];
    $usr = trim($_POST['usrGAS']);
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
        $ver = $_conexion->EjecutarConsulta($query);
        //$result = mysqli_query($conn,$query);

        if (is_array($ver))
        {
            if ($ver[0] == 1)
            {
                $_conexion->Commit();
                echo 1;
            }
            else if ($ver[0] == 2)
            {
                if(file_exists($ruta))
                {
                    unlink($ruta);
                }
                echo "ESTE USUARIO YA ESTA REGISTRADO";
            }
        }
        else
        {
            $funciones -> Rollback();
            if(file_exists($ruta))
            {
                unlink($ruta);
            }
            echo "ERROR AL INSERTAR";
        }
    }
    else echo "LAS CONTRASENAS NO COINCIDEN";
 ?>