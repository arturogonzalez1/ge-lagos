<?php 
	session_start();
	require '../assets/database.php';

	$idU = $_SESSION['c_user_id'];
	$tipoFiltro = $_POST['tpFiltro'];

	$salida = "";
	$query = "";

	if ($tipoFiltro == 1)
	{
		$anio = $_POST['selectAnio'];
		$mes = $_POST['selectMes'];
		if ($mes < 10)
		{
			$filtro = $anio.'0'.$mes;
		}
	    else
	    {
	    	$filtro = $anio.$mes;
	    }
		$query="CALL v_VALES_FILTRO($idU, 1, '$filtro','');";
	
	}
	if ($tipoFiltro == 2)
	{
		$fechaInicio = $_POST['dtpFechaInicio'];
		$horaInicio = $_POST['dtpHoraInicio'];
		$fechaFin = $_POST['dtpFechaFin'];
		$horaFin = $_POST['dtpHoraFin'];

		$fInicio = $fechaInicio.' '.$horaInicio;
		$fFin = $fechaFin.' '.$horaFin; 

		$query="CALL v_VALES_FILTRO($idU, 2, '$fInicio', '$fFin');";
	}
	if ($tipoFiltro == 3)
	{
		$query="CALL v_VALES_FILTRO($idU, 3, '','');";
	}

		$salida .= "<table class='table table-striped table-bordered' style='border-style:solid; font-size: 12px'>
	<thead>
		<tr>
			<th>No</th>
			<th>Fecha</th>
			<th>Placa</th>
			<th>Litros</th>
			<th>Importe</th>
			<th>Chofer</th>
			<th>Estatus</th>
			<th>Fecha Carga</th>
			<th>Ticket</th>
			<th>Estacion</th>
			<th>Factura</th>
		</tr>
	</thead>";

	$result=mysqli_query($conn,$query);
	while($ver=mysqli_fetch_array($result))
	{
	    $fechaCarga = "";
	    $noTicket = "";
		if ($ver[4]=="0")$ver[4]="";
		if ($ver[3]=="0")$ver[3]="";
		 $salida .= "<tr>
			<td>".$ver[0]."</td>
			<td>".$ver[1]."</td>
			<td>".$ver[2]."</td>
			<td>".$ver[3]."</td>
			<td>".$ver[4]."</td>
			<td>".$ver[5]."</td>
			<td>".$ver[6]."</td>
			<td>".$ver[7]."</td>
			<td>".$ver[8]."</td>
			<td>".$ver[9]."</td>
			<td>".$ver[10]."</td>
		</tr>";
	}
	$salida .= "</table>";
	
	echo $salida;
	
 ?>