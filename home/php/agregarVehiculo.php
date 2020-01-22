<?php 
session_start();
	require "../assets/database.php";

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
    $ruta= "../images/imgVeh/".$placa.".jpg";
    
    move_uploaded_file(imagejpeg($copia, $ruta, 100),$ruta);

    $query = "CALL p_VEHICULO('$placa','$marca','$modelo', '$unidad', '$motor', $id)";
    echo mysqli_query($conn,$query);
 ?>