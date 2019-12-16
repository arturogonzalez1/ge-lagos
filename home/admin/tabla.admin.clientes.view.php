<?php 
	require '../assets/database.php';
 ?>
 <span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
	<span class="fa fa-plus-circle"></span> AGREGAR NUEVO
</span>
	<table class="table table-striped table-bordered" style="font-size: 12px">
			<thead>
				<tr>
					<th>NOMBRE</th>
					<th>LIMITE CREDITO</th>
					<th>DEUDA</th>
					<th>ESTADO</th>
					<th>MODALIDAD</th>
					<th>PERSONA AUTORIZADA</th>
					<!--<th>USUARIO</th>-->
				</tr>
			</thead>
	<?php 

	$sql="CALL v_CLIENTE();";
	$result=mysqli_query($conn,$sql);

	while($ver=mysqli_fetch_array($result))
	{
	?>
	<tr>
		<td nowrap=""><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<!--<td><?php //echo $ver[7]; ?></td>-->
		<td style="text-align: center;" nowrap="" title="Modificar cliente" data-toggle="popover" data-trigger="hover">
			<span class="btn btn-raised btn-warning btn-xs" 
				onclick="obtenerDatos('<?php echo $ver[6]; ?>')" data-toggle="modal" data-target="#updatemodal">
				<span class="fa fa-pencil-square-o"></span>
			</span>
		</td>
		<?php 
			if ($ver[3] == "ACTIVO")
			{ 
			?>
				<td style="text-align: center;" nowrap="" title="Suspender cliente" data-toggle="popover" data-trigger="hover">
					<span class="btn btn-raised btn-danger btn-xs" 
						onclick="suspenderCliente('<?php echo $ver[6]; ?>')">
						<span class="fa fa-arrow-down"></span>
					</span>
				</td>
		<?php 
			}  
			else if ($ver[3] == "SUSPENDIDO")
			{
			?>
				<td style="text-align: center;" nowrap="" title="Activar cliente" data-toggle="popover" data-trigger="hover">
					<span class="btn btn-raised btn-success btn-xs" 
						onclick="activarCliente('<?php echo $ver[6]; ?>')">
						<span class="fa fa-arrow-up"></span>
					</span>
				</td>
		<?php 
			}		
		 ?>
		 <td style="text-align: center;" nowrap="" title="Estado de cuenta" data-toggle="popover" data-trigger="hover">
			<span class="btn btn-raised btn-primary btn-xs" 
				onclick="estadoCuenta('<?php echo $ver[6]; ?>', 0, 0)">
				  <span class="fa fa-bar-chart"></span>
			</span>
		</td>
		<td style="text-align: center;" title="Historial" data-toggle="popover" data-trigger="hover">
			<span class="btn btn-raised btn-primary btn-xs" 
				onclick="verHistorial('<?php echo $ver[6]; ?>', '', '')">
				<span class="fa fa-history"></span>
			</span>
		</td>
	</tr>
	<?php 
	}
	?>
	</table>