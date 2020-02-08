<?php 
    session_start();
    require "../assets/bd.php";
	require "../assets/ftp.php";

    $ftp_conn = new ConexionFTP();
    $bd_conn = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

    $id = $_SESSION['c_user_id'];
	$placa = strtoupper($_POST['placa']);
    $marca = strtoupper($_POST['marca']);
    $unidad = $_POST['unidad'];
    $modelo = strtoupper($_POST['modelo']);
    $motor = $_POST['motor'];

    if (!empty($_FILES['foto']))
    {
        $imagen=$_FILES['foto']['name'];
        $archivo=$_FILES['foto']['tmp_name']; 
        $original = imagecreatefromjpeg($archivo);

        $anchoOriginal = imagesx($original);
        $altoOriginal = imagesy($original);

        $copia = imagecreatetruecolor(240, 150);
        imagecopyresampled($copia, $original, 0,0,0,0, 240, 150, $anchoOriginal, $altoOriginal);
        $origen = "../temp/vehiculo.jpg";
        $destino = "images/web/vehiculos/".$placa.".jpg";

        //SI EL ARCHIVO EXISTE REMPLAZA LA FOTO POR LA NUEVA
        if(file_exists($origen))
        {
            unlink($origen);
        }
        imagejpeg($copia, $origen, 100);

        if ($ftp_conn->SetImage($destino, $origen)) {
            $query = "CALL p_UPDATE_VEHICULO($id,'$placa','$marca', '$modelo','$unidad', '$motor')";
            $datos = $bd_conn->EjecutarConsulta($query);
            if (is_array($datos)) {
                if ($datos[0] == 1) {
                    $bd_conn->Commit();
                    echo 1;
                    exit;
                }
            }
            else {
                $bd_conn->Rollback();
                echo "HA OCURRIDO UN ERROR.";
                exit;
            }
        }
        else {
            echo "HA OCURRIDO UN ERROR AL SUBIR LA IMAGEN.";
            exit;
        }
    }
    else {
        $query = "CALL p_UPDATE_VEHICULO($id,'$placa','$marca', '$modelo','$unidad', '$motor')";
        $datos = $bd_conn->EjecutarConsulta($query);
        if (is_array($datos)) {
            if ($datos[0] == 1) {
                $bd_conn->Commit();
                echo 1;
                exit;
            }
        }
        else {
            $bd_conn->Rollback();
            echo "HA OCURRIDO UN ERROR.";
            exit;
        }  
    }
 ?>