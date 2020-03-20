<?php

$server = '35.239.178.56';
$username = 'gelagos_ultra';
$password = 'd43m0nt00l5';
$database = 'gelagos_ge_legos';

$conn = mysqli_connect($server, $username, $password, $database) or die('Error al conectar con MySQL Server.');
$conn2 = mysqli_connect($server, $username, $password, $database) or die('Error al conectar con MySQL Server.');
?>