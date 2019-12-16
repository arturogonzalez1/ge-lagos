<?php 
    session_start();
	require "../assets/database.php";

    $id = $_SESSION['c_user_id'];
	$placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $unidad = $_POST['unidad'];
    $modelo = $_POST['modelo'];
    $motor = $_POST['motor'];

    if (isset($_FILES['foto']['name']))
    {
        $imagen=$_FILES['foto']['name'];
        $archivo=$_FILES['foto']['tmp_name']; 
        $original = imagecreatefromjpeg($archivo);

        $anchoOriginal = imagesx($original);
        $altoOriginal = imagesy($original);

        $copia = imagecreatetruecolor(240, 150);
        imagecopyresampled($copia, $original, 0,0,0,0, 240, 150, $anchoOriginal, $altoOriginal);
        $ruta = "../images/imgVeh/".$placa.".jpg";

        //SI EL ARCHIVO EXISTE REMPLAZA LA FOTO POR LA NUEVA
        if(file_exists($ruta))
        {
            unlink($ruta);
        }
        move_uploaded_file(imagejpeg($copia, $ruta, 100), $ruta);

        $query = "CALL p_UPDATE_VEHICULO($id,'$placa','$marca', '$modelo','$unidad', '$motor')";
        echo mysqli_query($conn,$query);
    }
    else
        echo "No se ha enviado imagen";
    
 ?>