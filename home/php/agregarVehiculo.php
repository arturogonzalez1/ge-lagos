<?php 
    session_start();
    require "../assets/ftp.php";
	require "../assets/bd.php";


    $ftp_conn = new ConexionFTP();
    $bd_conn = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

    $id = $_SESSION['c_user_id'];
	$placa = strtoupper($_POST['placaV']);
    $marca = strtoupper($_POST['marcaV']);
    $modelo = $_POST['modeloV'];
    $unidad = strtoupper($_POST['unidadV']);
    $motor = $_POST['motorV'];

    $imagen = $_FILES['fotoV']['name'];
    $archivo = $_FILES['fotoV']['tmp_name']; 
    $original = imagecreatefromjpeg($archivo);

    $anchoOriginal = imagesx($original);
    $altoOriginal = imagesy($original);

    $copia = imagecreatetruecolor(240, 150);
    imagecopyresampled($copia, $original, 0,0,0,0, 240, 150, $anchoOriginal, $altoOriginal);
    $origen = "../temp/vehiculo.jpg";
    $destino = "images/web/vehiculos/".$placa.".jpg";

    if(file_exists($origen))
    {
        unlink($origen);
    }

    imagejpeg($copia, $origen, 100);
    
    if ($ftp_conn->SetImage($destino, $origen)) {
        $query = "CALL p_VEHICULO('$placa','$marca','$modelo', '$unidad', '$motor', $id)";
        $datos = $bd_conn -> EjecutarConsulta($query);
        if (is_array($datos)) {
            if ($datos[0] == 1) {
                $bd_conn->Commit();
                echo 1;
            }
            else if ($datos[0] == 2) {
                echo "UNIDAD REGISTRADA.";
            }
        }
        else {
            $bd_conn->Rollback();
            echo "HA OCURRIDO UN ERROR.";
        }
    }


    
    //move_uploaded_file(imagejpeg($copia, $ruta, 100),$ruta);
 ?>