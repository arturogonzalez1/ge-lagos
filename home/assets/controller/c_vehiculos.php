<?php 
	if (isset($_POST['txtPlaca']))
	{
		$placa = $_POST['txtPlaca'];

		if ($_FILES['picture']["error"] > 0)
		{
		  	echo "Error: " . $_FILES['picture']['error'] . "<br>";
		}
		else
		{
			echo "Nombre: " . $_FILES['picture']['name'] . "<br>";
			echo "Tipo: " . $_FILES['picture']['type'] . "<br>";
			echo "Tamaño: " . ($_FILES["picture"]["size"] / 1024) . " kB<br>";
			echo "Carpeta temporal: " . $_FILES['picture']['tmp_name'];

			move_uploaded_file($_FILES['picture']['tmp_name'], "http://ge-lagos.com/home/images/imgVeh/" . $placa);
		}
	}
?>