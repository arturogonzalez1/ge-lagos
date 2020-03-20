<?php 
	$idcliente = $_POST['idcliente'];
	$filtro1 = $_POST['filtro1'];
	$filtro2 = $_POST['filtro2'];
	
	require '../../assets/funciones.php';
	require '../../assets/database.php';
	$f = new Funciones();
	$salida = "";
	$datosCliente = $f ->VerDatosCliente("$idcliente");

	$idUsuario = $datosCliente[2];
	$limiteCredito = $datosCliente[3];
	$anios = $f ->LlenarAniosEC($idUsuario);

	if ($filtro1 != 0 && $filtro2 == 0)
	{
		$query = "CALL v_VALES_FILTRO($idUsuario, 1, '$filtro1','');";
	}
	else if ($filtro1 != 0 && $filtro2 != 0)
	{
		$query = "CALL v_VALES_FILTRO($idUsuario, 2, '$filtro1','$filtro2');";
	}
	else if ($filtro1 == 0 && $filtro2 == 0)
	{
		$query = "CALL v_VALES_FILTRO($idUsuario, 3, '','');";
	}

	$salida .= "
	<div class='col-md-12' style='background-color: #343A46'>
		<center>
			<h4 style='color: white'>
			CLIENTE: ". $datosCliente[0] ." <br>
			SALDO: ". $datosCliente[1] ." 
			</h4>
		</center>
	</div>";


	$salida .= "<!--************************************************* filtromodal ***********************************************-->
	<div class='modal fade' id='filtromodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	    <div class='modal-dialog modal-sm' role='document'>
	      	<div class='modal-content'>
	        	<div class='modal-header'>
			          <h5 class='modal-title' id='xampleModalLabel'>FILTRAR POR MES</h5>
			          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			            	<span aria-hidden='true'>&times;</span>
			          </button>
	        	</div>
	        	<div class='modal-body'>
		        	<div class='container-fluid'>
		        		<form name='frmFiltroMes' id='frmFiltroMes'>
		        			<input type='hidden' name='user' id='user' value='".$idcliente."'>
		   					<label>AÑO</label>
		   					<select class='form-control' name = 'selectAnio' id = 'selectAnio' onchange=''>
								". $anios ."
							</select>
							<label>MES</label>
							<select class='form-control' name = 'selectMes' id = 'selectMes'>
								<option value='1'>Enero</option>
								<option value='2'>Febrero</option>
								<option value='3'>Marzo</option>
								<option value='4'>Abril</option>
								<option value='5'>Mayo</option>
								<option value='6'>Junio</option>
								<option value='7'>Julio</option>
								<option value='8'>Agosto</option>
								<option value='9'>Septiembre</option>
								<option value='10'>Octubre</option>
								<option value='11'>Noviembre</option>
								<option value='12'>Diciembre</option>
							</select>
		   					
		        		</form>
		        	</div>
	        	</div>
	        	<div class='modal-footer'>
		          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
		          <button type='button' class='btn btn-primary' id='btnFiltrarMes' onclick='Filtrar()'>Filtrar</button>
	        	</div>
	      	</div>
	    </div>
  	</div>
	<!--************************************************* filtromodal ***********************************************-->
	<!--************************************************* filtromodal ***********************************************-->
	<div class='modal fade' id='newImporteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	    <div class='modal-dialog modal-sm' role='document'>
	      	<div class='modal-content'>
	        	<div class='modal-header'>
			          <h5 class='modal-title' id='xampleModalLabel'>NUEVO IMPORTE</h5>
			          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			            	<span aria-hidden='true'>&times;</span>
			          </button>
	        	</div>
	        	<div class='modal-body'>
		        	<div class='container-fluid'>
		        		<form name='frmFiltroMes' id='frmFiltroMes'>
		        			<label>Numero de vale</label>
		        			<input type='text' name='txtNumVale' id='txtNumVale' readonly>
		        			<label>Importe Nuevo</label>
		   					<input type='text' name='txtNewImporte' id='txtNewImporte'>
		        		</form>
		        	</div>
	        	</div>
	        	<div class='modal-footer'>
		          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
		          <button type='button' class='btn btn-primary' id='btnFiltrarMes' onclick='ModificarTicket(".$idUsuario.")'>Modificar</button>
	        	</div>
	      	</div>
	    </div>
  	</div>
	<!--************************************************* filtromodal ***********************************************-->
	<span class='btn btn-raised btn-primary btn-lg' data-toggle='modal' data-target='#filtromodal'>
					<span class='fas fa-sort'></span> FILTRAR POR MES
				</span>
				<style type='text/css'>
	.scroll { height:600px; overflow: auto;}
	</style>
	<div class='col-md' >
		<div  class='col-md scroll' >
			<table class='table table-striped table-bordered'  style='border-style:solid; font-size: 12px' >
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
						<th>Modificar</th>
					</tr>
				</thead>";
				$consult=mysqli_query($conn,$query);
				$indice = 0;
				while ($ver=mysqli_fetch_array($consult))
				{
					$fechaCarga = "";
				    $noTicket = "";
					if ($ver[4]=="0.00")$ver[4]="";
					if ($ver[3]=="0.000")$ver[3]="";
					if ($ver[6] == "CARGADO")$ver[13]="<span class='btn btn-raised btn-warning btn-xs' data-toggle='modal' data-target='#newImporteModal' onclick='ObtenerImporte(".$idUsuario.", ".$ver[0].")'>
							<span class='fa fa-pencil-square-o'></span>
						</span>";
					else $ver[13] = "";
					if ($ver[6] == "CARGADO" || $ver[6] == "PAGADO")
					{
						$ver[3] = $ver[11]; $ver[4] = $ver[12];
					}
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
						<td>".$ver[13]."</td>
					</tr>";
					
				}
				 	
				$salida .= "</table>
			</div>
	</div>
	<script type='text/javascript'>
		function Filtrar(){
				$('#filtromodal').modal('hide');
				var anio = $('#selectAnio').prop('value');
				var mes = $('#selectMes').prop('value');
				var filtro = anio+mes;
				verHistorial('".$idcliente."', filtro, '');
		}

		function ObtenerImporte(idcliente, numvale){
			var datos = new FormData();
			datos.append('idcliente', idcliente);
			datos.append('numvale', numvale);

			$.ajax({
					url: 'consultas/obtenerImporte.php',
					type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
					contentType: false,
					data: datos, // Al atributo data se le asigna el objeto FormData.
					processData: false,
					cache: false, 
				success:function(r){
					datos=jQuery.parseJSON(r);
					$('#txtNumVale').val(datos['numvale']);
					$('#txtNewImporte').val(datos['importe']);
				}
			});
		}
		function ModificarTicket(iduser){
			
			var datos = new FormData();
			datos.append('iduser', iduser);
			datos.append('numvale', $('#txtNumVale').prop('value'));
			datos.append('importe', $('#txtNewImporte').prop('value'));
			
			$.ajax({
					url: 'consultas/modificarTicket.php',
					type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
					contentType: false,
					data: datos, // Al atributo data se le asigna el objeto FormData.
					processData: false,
					cache: false, 
				success:function(r){
					if (r == 1)
					{
						$('#newImporteModal').modal('hide');
						alertify.success('El importe se ha modificado correctamente');
						verHistorial('".$idcliente."', '', '');
					}
					else {
						alertify.alert('ERROR', 'NO SE HA MODIFICADO EL TICKET: ' + r);
					}
				}
			});
		}
	</script>
	";

	echo $salida;
 ?>