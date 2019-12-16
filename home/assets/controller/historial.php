<?php 
	require '../lib/functions.php';
	$m = new Funciones();
	$param['cliente'] = $m->historial();
	View('historial',$param);
 ?>