<?php 
    require "../../assets/bd.php";
    require "../../assets/ftp.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');
    $_conexionFTP = new ConexionFTP();

	$id = $_POST['idGAS'];
	$nombre = strtoupper(trim($_POST['nombreGAS']));
    $usr = trim($_POST['usrGAS']);
	$domicilio = strtoupper(trim($_POST['domicilioGAS']));
    $ciudad = strtoupper($_POST['ciudadGAS']);
    $estado = $_POST['estadoGAS'];
    $telefono = trim($_POST['telefonoGAS']);
    $pass = trim($_POST['pswGAS']);
    $passc = trim($_POST['pswcGAS']);

    if($pass == $passc)
    {
        if (!empty($_FILES['foto']))
        {
            $imagen=$_FILES['foto']['name'];
            $archivo=$_FILES['foto']['tmp_name']; 
            $original = imagecreatefromjpeg($archivo);

            $anchoOriginal = imagesx($original);
            $altoOriginal = imagesy($original);

            $copia = imagecreatetruecolor(240, 300);
            imagecopyresampled($copia, $original, 0,0,0,0, 240, 300, $anchoOriginal, $altoOriginal);
            $origen = "../temp/despachador.jpg";
            $destino = "images/web/despachadores/".$usr.".jpg";

            //SI EL ARCHIVO EXISTE REMPLAZA LA FOTO POR LA NUEVA
            if(file_exists($origen))
            {
                unlink($origen);
            }

             imagejpeg($copia, $origen, 100);

            if ($_conexionFTP->SetImage($destino, $origen)) {
                $query = "CALL p_UPDATE_GAS($id, '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pass', '$usr');";
                $datos = $_conexion->EjecutarConsulta($query);
                if (is_array($datos)) {
                    if ($datos[0] == 1) {
                        $_conexion->Commit();
                        echo 1;
                    }
                    if ($datos[0] == 2) {
                        echo "EL USUARIO INGRESADO NO ESTA DISPONIBLE.";
                    }
                }
                else {
                    $_conexion->Rollback();
                    echo "ERROR EN LA CONSULTA.";
                }
            }
        }
        else {
            $query = "CALL p_UPDATE_GAS($id, '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pass', '$usr');";
            $datos = $_conexion->EjecutarConsulta($query);
            if (is_array($datos)) {
                if ($datos[0] == 1) {
                    $_conexion->Commit();
                    echo 1;
                }
                if ($datos[0] == 2) {
                    echo "EL USUARIO INGRESADO NO ESTA DISPONIBLE.";
                }
            }
            else {
                $_conexion->Rollback();
                echo "ERROR EN LA CONSULTA.";
            }
        }
    }
    else {
        echo "LAS CONTRASEÑAS NO COINCIDEN.";
    }
 ?>