<?php 
    require "../../assets/bd.php";

    $_conexion = new Conexion('207.210.232.36', 'gelagos_ultra', 'd43m0nt00l5', 'gelagos_ge');

	$id = $_POST['idGAS'];
	$nombre = strtoupper(trim($_POST['nombreGAS']));
    $usr = trim($_POST['usrGAS']);
	$domicilio = strtoupper(trim($_POST['domicilioGAS']));
    $ciudad = strtoupper($_POST['ciudadGAS']);
    $estado = $_POST['estadoGAS'];
    $telefono = trim($_POST['telefonoGAS']);
    $pass = trim($_POST['pswGAS']);
    $passc = trim($_POST['pswcGAS']);

    if (isset($_FILES['foto']['name']))
    {
        $imagen=$_FILES['foto']['name'];
        $archivo=$_FILES['foto']['tmp_name']; 
        $original = imagecreatefromjpeg($archivo);

        $anchoOriginal = imagesx($original);
        $altoOriginal = imagesy($original);

        $copia = imagecreatetruecolor(240, 150);
        imagecopyresampled($copia, $original, 0,0,0,0, 240, 150, $anchoOriginal, $altoOriginal);
        $ruta = "../../images/imgDes/".$usr.".jpg";

        //SI EL ARCHIVO EXISTE REMPLAZA LA FOTO POR LA NUEVA
        if(file_exists($ruta))
        {
            unlink($ruta);
        }

        if($pass == $passc)
        {
            $query = "CALL p_UPDATE_GAS($id, '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pass', '$usr');";
            $datos = $_conexion->EjecutarConsulta($query);
            if (is_array($datos)) {
                if ($datos[0] == 1) {
                    $_conexion->Commit();
                    move_uploaded_file(imagejpeg($copia, $ruta, 100), $ruta);
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
 ?>