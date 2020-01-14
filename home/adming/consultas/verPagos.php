<?php 
	session_start();
	$idEstacion = $_SESSION['adm_idEstacion'];
	require '../../assets/database.php';

	$salida = "<table class='table table-striped table-bordered'  style='border-style:solid; font-size: 12px'>
			<thead>
				<tr>
					<th>CLIENTE</th>
					<th>FECHA PAGO</th>
					<th>PAGO</th>
					<th>FACTURA</th>
					<th>TICKET(S)</th>
				</tr>
			</thead>";
		$sql="CALL v_CONSULTAPAGOSP($idEstacion)";
		$result=mysqli_query($conn,$sql);

		while($ver=mysqli_fetch_array($result))
		{
		 $salida .="
		 <tr>
			<td>".$ver[0]."</td>
			<td>".$ver[1]."</td>
			<td>".$ver[2]."</td>
			<td>".$ver[3]."</td>
			<td>".$ver[4]."</td>
		</tr>";
		}
	$salida .= "</table>";

	echo $salida;
 ?>
