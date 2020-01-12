<?php 
	require "../../assets/database.php";

	$id = $_POST['idGAS'];
	$nombre = $_POST['nombreGAS'];
    $usr = $_POST['usrGAS'];
	$domicilio = $_POST['domicilioGAS'];
    $ciudad = $_POST['ciudadGAS'];
    $estado = $_POST['estadoGAS'];
    $telefono = $_POST['telefonoGAS'];
    $pass = $_POST['pswGAS'];
    $passc = $_POST['pswcGAS'];

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
            if(mysqli_query($conn,$query))
            {
                move_uploaded_file(imagejpeg($copia, $ruta, 100), $ruta);
                echo 1;
            }
            else
                echo "Error al actualizar";
        }
    }
 ?>