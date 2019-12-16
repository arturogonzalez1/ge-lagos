<?php 
	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
	require '../assets/database.php';
	require '../assets/funciones.php';
 ?>
<style type="text/css">
	.scroll { height:600px; overflow: auto;}
</style>
<div class="col-md-1"></div>
<div class="col-md-10" >
	<div  class="col-md-12 scroll" >
		<table class="table table-striped table-bordered"  style="border-style:solid;" >
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Concepto</th>
					<th>Estacion</th>
					<th>Cargo</th>
					<th>Abono</th>
					<th>Saldo</th>
				</tr>
			</thead>
			<?php 

			$id = 4;

			$query="CALL V_ESTADO_CUENTA($id);";
			$consult=mysqli_query($conn,$query);
			while ($sho=mysqli_fetch_array($consult))
			{
				?>
			 	<tr>
					<td><?php echo $sho[0]; ?></td>
					<td><?php echo $sho[1]; ?></td>
					<td><?php echo $sho[2] ?></td>
					<td><?php echo $sho[3]; ?></td>
					<td><?php echo $sho[4]; ?></td>
					<td><?php echo $sho[5]; ?></td>
				</tr>
				<?php 
			}
			 	?>
			</table>
		</div>
</div>
<div class="col-md-1"></div>