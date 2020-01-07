<?php 
	require "../../assets/database.php";
	$f = $_POST['consulta'];

	$salida = "";
	$vacio = "''";
	if (isset($_POST['consulta'])) 
	{
		if ($f == "undefined")
		{
			$query = "CALL v_CLIENTE_FILTRO('')";

		}
		else
		{
    		$query = "CALL v_CLIENTE_FILTRO('$f')";
		}

		$salida .= "<span class='btn btn-raised btn-primary btn-lg' data-toggle='modal' data-target='#addmodal'>
	<span class='fa fa-plus-circle'></span> AGREGAR NUEVO
</span>
		<table class='table table-striped table-bordered' style='border-style:solid; font-size: 12px'>
						<thead>
							<tr>
								<th>NOMBRE</th>
								<th>CREDITO</th>
								<th>SALDO</th>
								<th>ESTADO</th>
								<th>MODALIDAD</th>
								<th>PERSONAL AUTORIZADO</th>
							</tr>
						</thead>";

		$result = mysqli_query($conn,$query);
		while($ver = mysqli_fetch_array($result))
		{
			 $salida .= "<tr>
				<td>".$ver[0]."</td>
				<td>".$ver[1]."</td>
				<td>".$ver[2]."</td>
				<td>".$ver[3]."</td>
				<td>".$ver[4]."</td>
				<td>".$ver[5]."</td>
				<td style='text-align: center;' nowrap='' title='Modificar cliente' data-toggle='popover' data-trigger='hover'>
					<span class='btn btn-raised btn-warning btn-xs' 
						onclick='obtenerDatos(".$ver[6].")'>
						<span class='fa fa-pencil-square-o'></span>
					</span>
				</td>"; 

				if ($ver[3] == "ACTIVO")
				{
					$salida.="<td style='text-align: center;' nowrap='' title='Suspender cliente' data-toggle='popover' data-trigger='hover'>
								<span class='btn btn-raised btn-danger btn-xs' 
									onclick='suspenderCliente(".$ver[6].")'>
									<span class='fa fa-arrow-down'></span>
								</span>
							</td>";
				}
				else
				{
					$salida.="<td style='text-align: center;' nowrap='' title='Activar cliente' data-toggle='popover' data-trigger='hover'>
								<span class='btn btn-raised btn-success btn-xs' 
									onclick='activarCliente(".$ver[6].")'>
									<span class='fa fa-arrow-up'></span>
								</span>
							</td>";
				}
			$salida.="<td style='text-align: center;' nowrap='' title='Estado de cuenta' data-toggle='popover' data-trigger='hover'>
			<span class='btn btn-raised btn-primary btn-xs' 
				onclick='estadoCuenta(".$ver[6].", 0, 0)'>
				  <span class='fa fa-bar-chart'></span>
			</span>
		</td>
		<td style='text-align: center;'' title='Historial' data-toggle='popover' data-trigger='hover'>
			<span class='btn btn-raised btn-primary btn-xs' 
				onclick='verHistorial(".$ver[6].", 0,0)'>
				<span class='fa fa-history'></span>
			</span>
		</td>
			</tr>";
		}

		$salida .= "</table>";
		echo $salida;
    }
 ?>