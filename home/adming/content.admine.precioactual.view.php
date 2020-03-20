<?php 
	session_start();
	require '../assets/database.php';
 ?>
 <table class="table table-striped table-bordered"  style="border-style:solid;" >
	<thead>
		<tr>
			<th>PRECIO DIESEL</th>
			<th>PRECIO MAGNA</th>
			<th>PRECIO PREMIUM</th>
			<!--<th>MODIFICAR</th>
			<th>ELIMINAR</th>-->
		</tr>
	</thead>
<?php
$idEstacion = $_SESSION['adm_idEstacion'] ;
$sql="CALL v_PrecioActual($idEstacion);";
$result=mysqli_query($conn,$sql);

while($ver=mysqli_fetch_array($result))
{
 ?>
 <tr>
	<td><?php echo $ver[0]; ?></td>
	<td><?php echo $ver[1]; ?></td>
	<td><?php echo $ver[2]; ?></td>
</tr>

<?php 
}
 ?>
</table>