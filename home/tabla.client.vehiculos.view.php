<?php 
	session_start();
	require 'assets/database.php';
	require 'assets/funciones.php';
 ?>
<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
	<span class="fa fa-plus-circle"></span> AGREGAR NUEVO
</span>
	<table class="table table-striped table-bordered"  style="border-style:solid; font-size: 12px" >
			<thead>
				<tr>
					<th>PLACA</th>
					<th>MARCA</th>
					<th>MODELO</th>
					<th>UNIDAD</th>
					<th>MOTOR</th>
					<th>MODIFICAR</th>
					<th>ELIMINAR</th>
				</tr>
			</thead>
	<?php 
	$idU = $_SESSION['c_user_id'] ;

	$sql="call v_VEHICULO($idU)";
	$result=mysqli_query($conn,$sql);

	while($ver=mysqli_fetch_array($result))
	{
	?>
	<tr>
		<!--<td style="display: none;"><?//php echo $ver[0]; ?></td>-->
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>

		<td style="text-align: center;">
			<span class="btn btn-raised btn-warning btn-xs" 
				onclick="obtenerDatos('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#updatemodal">
				<span class="fa fa-pencil-square-o"></span>  MODIFICAR
			</span>
		</td>
		<td style="text-align: center;">
			<span class="btn btn-raised btn-danger btn-xs" 
				onclick="eliminarVehiculo('<?php echo $ver[0]; ?>')">
				<span class="fa fa-trash"></span>  BAJA
			</span>
		</td>
	</tr>

	<?php 
	}
	?>
	</table>