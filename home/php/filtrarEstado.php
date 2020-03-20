<?php 
	session_start();
	require '../assets/database.php';
	require '../assets/funciones.php';

	$f = new Funciones();


	$idU = $_SESSION['c_user_id'];
	$datosCliente = $f -> verEstadoCliente($idU);
	$totalregistros = $f->TotalRegEstadoCuenta($idU);
	if ($totalregistros == 0) {
		echo '<div class="alert alert-warning">
		        <strong>Sin Registros! </strong> Todavia no se ha realizado ningun movimiento.
		      </div>';
    	exit();
	}
	$limiteCredito = $datosCliente[2];
	$anio = $_POST['anio'];
	$mes = $_POST['mes'];

	$salida = "";

	$query="CALL v_ESTADO_CUENTA($idU, $anio, $mes);";


		$salida .= "<table class='table table-striped table-bordered'  style='border-style:solid; font-size: 12px' >
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Concepto</th>
					<th>Ticket</th>
					<th>Factura</th>
					<th>Estacion</th>
					<th>Cargo</th>
					<th>Abono</th>
					<th>Saldo</th>
				</tr>
			</thead>";

	$consult=mysqli_query($conn,$query);
	$indice = 0;
	while ($ver=mysqli_fetch_array($consult))
	{
		if ($indice == 0)
		{
			$salida .= "<tr>
			<td></td>
			<td align='center'>SALDO INICIAL</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td align='right'>".$ver[6]."</td>
			</tr>";
			$indice = 1;
		}
		 $salida .= "<tr>
			<td>".$ver[0]."</td>
			<td align='center'>".$ver[1]."</td>
			<td>".$ver[7]."</td>
			<td>".$ver[8]."</td>
			<td>".$ver[2]."</td>
			<td align='right'>".$ver[3]."</td>
			<td align='right'>".$ver[4]."</td>
			<td align='right'>".$ver[5]."</td>
		</tr>";
	}
	$salida .= "</table>";
	
	echo $salida;
	
 ?>