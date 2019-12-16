<?php

$server = '207.210.232.36';
$username = 'gelagos_ultra';
$password = 'd43m0nt00l5';
$database = 'gelagos_ge';

$conn = mysqli_connect($server, $username, $password, $database) or die('Error al conectar con MySQL Server.');
$conn2 = mysqli_connect($server, $username, $password, $database) or die('Error al conectar con MySQL Server.');
?>