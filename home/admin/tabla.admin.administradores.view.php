<?php 
	require '../assets/database.php';
 ?>
<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
						<span class="fa fa-plus-circle"></span> AGREGAR NUEVO
					</span>
						<table class="table table-striped table-bordered"  style="border-style:solid; font-size: 12px" >
								<thead>
									<tr>
										<th>NOMBRE</th>
										<th>RFC</th>
										<th>DOMICILIO</th>
										<th>CIUDAD</th>
										<th>ESTADO</th>
										<!--<th>USUARIO</th>-->
										<!--<th>CONTRASEÑA</th>-->
										<th>TELEFONO</th>
										<th>ESTACION</th>
										<th>MODIFICAR</th>
									</tr>
								</thead>
						<?php 
				
						$sql="CALL v_ADM_ESTACIONES();";
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
							<!--<td><?php //echo $ver[5]; ?></td>-->
							<!--<td><?php //echo $ver[6]; ?></td>-->
							<td><?php echo $ver[7]; ?></td>
							<td><?php echo $ver[8]; ?></td>
							<td style="text-align: center;">
								<span class="btn btn-raised btn-warning btn-xs" 
									onclick="obtenerDatos('<?php echo $ver[5]; ?>')" data-toggle="modal" data-target="#updatemodal">
									<span class="fa fa-pencil-square-o"></span>
								</span>
							</td>
						</tr>
				
						<?php 
						}
						?>
						</table>