<?php 
	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
	require 'assets/database.php';
	require 'assets/funciones.php';
 ?>
<style type="text/css">
	.scroll { height:600px; overflow: auto;}
</style>
<div class="col-md-1"></div>
<div class="col-md-10" >
	<div  class="col-md-12 scroll" >
		<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
			<span class="fa fa-plus-circle"></span> Nuevo Vale
		</span>
		<table class="table table-striped table-bordered"  style="border-style:solid;" >
			<thead>
				<tr>
					<th>No.Vale</th>
					<th>Fecha</th>
					<th>Placa</th>
					<th>Litros</th>
					<th>Importe</th>
					<th>Concepto</th>
					<th>Operador</th>
					<th>PDF</th>
					<th>Cancelar</th>
					<th>Enviar</th>
				</tr>
			</thead>
			<?php 

			$id = $_SESSION['c_user_id'];

			$query="CALL V_VALE_VIGENTE($id);";
			$consult=mysqli_query($conn,$query);
			while ($sho=mysqli_fetch_array($consult))
			{
				if ($sho[3] == "0.000")$sho[3] = "";
				if ($sho[4] == "0.00")$sho[4] = "";
				?>
			 	<tr>
					<td><?php echo $sho[0]; ?></td>
					<td><?php echo $sho[1]; ?></td>
					<td><?php echo $sho[2]; ?></td>
					<td><?php echo $sho[3]; ?></td>
					<td><?php echo $sho[4]; ?></td>
					<td><?php echo $sho[6]; ?></td>
					<td><?php echo $sho[5]; ?></td>
					<td style="text-align: center;">
						<span class="btn btn-raised btn-warning btn-xs" 
							onclick="exportar('<?php echo $sho[0]; ?>')">
							<span class="fa fa-file-pdf-o"></span>  PDF
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-raised btn-danger btn-xs" 
							onclick="cancelar('<?php echo $sho[0]; ?>')">
							<span class="fa fa-trash"></span>  CANCELAR
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-success btn-xs" 
							onclick="EnviarWhatsapp('<?php echo $sho[0]; ?>')">
							<span class="fa fa-whatsapp"></span>  ENVIAR
						</span>
					</td>
				</tr>
				<?php 
			}
			 	?>
			</table>
		</div>
</div>
<div class="col-md-1"></div>