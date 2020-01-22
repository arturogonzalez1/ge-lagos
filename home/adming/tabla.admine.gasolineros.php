<?php 
	session_start();
	require '../assets/database.php';
 ?>
<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
	<span class="fa fa-plus-circle"></span> AGREGAR NUEVO
</span>
	<table class="table table-striped table-bordered"  style="border-style:solid; font-size: 12px" >
			<thead>
				<tr>
					<th>NOMBRE</th>
					<th>DOMICILIO</th>
					<th>CIUDAD</th>
					<th>ESTADO</th>
					<th>TELEFONO</th>
					<th>USUARIO</th>
					<th>CONTRASEÑA</th>
					<th>MODIFICAR</th>
					<th>BAJA</th>
					<th>GAFETE</th>
				</tr>
			</thead>
	<?php 

	$idEstacion = $_SESSION['adm_idEstacion'] ;

	$sql="call v_SOLOGASOLINERO($idEstacion)";
	$result=mysqli_query($conn,$sql);

	while($ver=mysqli_fetch_array($result))
	{
	?>
	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		<td style="text-align: center;">
			<span class="btn btn-raised btn-warning btn-xs" 
				onclick="obtenerDatos('<?php echo $ver[5];?>')">
				<span class="fa fa-pencil-square-o"></span>  MODIFICAR
			</span>
		</td>
		<td style="text-align: center;">
			<span class="btn btn-raised btn-danger btn-xs" 
				onclick="eliminarDespachador('<?php echo $ver[5];?>')">
				<span class="fa fa-trash"></span>  BAJA
			</span>
		</td>
		<td style="text-align: center;">
			<span class="btn btn-raised btn-success btn-xs" 
				onclick="GenerarGAFETE('<?php echo $ver[5];?>')">
				<span class="fa fa-user-circle"></span>  GAFETE
			</span>
		</td>
	</tr>

	<?php 
	}
	?>
	</table>