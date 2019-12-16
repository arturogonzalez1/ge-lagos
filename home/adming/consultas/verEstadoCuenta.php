<?php 
	$nombreUsuario = $_POST['usuario'];
	$anio = $_POST['anio'];
	$mes = $_POST['mes'];
	require '../../assets/funciones.php';
	require '../../assets/database.php';

	//-----------------------------------------------------------

	$f = new Funciones();
	$salida = "";
	$datosCliente = $f ->VerDatosCliente("$nombreUsuario");
	$idCliente = $datosCliente[3];
	$limiteCredito = $datosCliente[4];
	$anios = $f ->LlenarAniosEC($idCliente);

	$salida .= "<div class='col-md-12' style='background-color: #343A46'>
		<center>
			<h4 style='color: white'>
			CLIENTE: ". $datosCliente[0] ." <br>
			SALDO: ". $datosCliente[1] ."<br>
			SALDO EN VALES: ". $datosCliente[2] ." 
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
		        			<input type='hidden' name='user' id='user' value='".$nombreUsuario."'>
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
	<div class='modal fade' id='pdfmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	    <div class='modal-dialog modal-sm' role='document'>
	      	<div class='modal-content'>
	        	<div class='modal-header'>
			          <h5 class='modal-title' id='xampleModalLabel'>EXPORTAR PDF</h5>
			          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			            	<span aria-hidden='true'>&times;</span>
			          </button>
	        	</div>
	        	<div class='modal-body'>
		        	<div class='container-fluid'>
		        		<form name='frmFiltroMes' id='frmFiltroMes'>
		        			<input type='hidden' name='userPDF' id='userPDF' value='".$nombreUsuario."'>
		        			<input type='hidden' name='nameclientePDF' id='nameclientePDF' value='".$datosCliente[0]."'>
		   					<label>AÑO</label>
		   					<select class='form-control' name = 'selectAnioPDF' id = 'selectAnioPDF'>
								". $anios ."
							</select>
							<label>MES</label>
							<select class='form-control' name = 'selectMesPDF' id = 'selectMesPDF'>
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
		          <button type='button' class='btn btn-primary' id='btnGenerarPDF'>Generar PDF</button>
	        	</div>
	      	</div>
	    </div>
  	</div>
	<!--************************************************* filtromodal ***********************************************--><span class='btn btn-raised btn-primary btn-lg' data-toggle='modal' data-target='#filtromodal'>
					<span class='fas fa-sort'></span> FILTRAR POR MES
				</span>
				<span class='btn btn-raised btn-success btn-lg' data-toggle='modal' data-target='#pdfmodal'>
					<span class='far fa-file-alt'></span> GENERAR REPORTE
				</span>
				<style type='text/css'>
	.scroll { height:600px; overflow: auto;}
	</style>
	<div class='col-md-1'></div>
	<div class='col-md-10' >
		<div  class='col-md-12 scroll' >
			<table class='table table-striped table-bordered'  style='border-style:solid;' >
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Concepto</th>
						<th>Estacion</th>
						<th>Cargo</th>
						<th>Abono</th>
						<th>Saldo</th>
					</tr>
				</thead>";
				$query="CALL V_ESTADO_CUENTA($idCliente, $anio, $mes);";
				$consult=mysqli_query($conn2,$query);
				$indice = 0;
				while ($sho=mysqli_fetch_array($consult))
				{
					if ($indice == 0)
					{
						$salida .= "<tr>
						<td></td>
						<td align='center'>SALDO INICIAL</td>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'>". $sho[6] ."</td>
					</tr>";
					$indice = 1;
					}
				 	$salida .= "<tr>
						<td>". $sho[0] ."</td>
						<td>". $sho[1] ."</td>
						<td>". $sho[2] ."</td>
						<td align='right'>". $sho[3] ."</td>
						<td align='right'>". $sho[4] ."</td>
						<td align='right'>". $sho[5] ."</td>
					</tr>";
					
				}
				 	
				$salida .= "</table>
			</div>
	</div>
	<div class='col-md-1'></div>
	<script type='text/javascript'>
		function Filtrar(){
				$('#filtromodal').modal('hide');
				var user = $('#user').prop('value');
				var anio = $('#selectAnio').prop('value');
				var mes = $('#selectMes').prop('value');
				estadoCuenta(user, anio, mes);
		}
		$(document).ready(function(){
			$('#btnGenerarPDF').click(function(){

				var datos = new FormData();

				datos.append('user', $('#userPDF').prop('value'));
				datos.append('cliente', $('#nameclientePDF').prop('value'));
				datos.append('anio', $('#selectAnioPDF').prop('value'));
				datos.append('mes', $('#selectMesPDF').prop('value'));

				$.ajax({
						url: 'consultas/generarPDF.php',
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: datos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
					success:function(r){
						if(r==1){ 
                              window.open('consultas/verPDF.php','_blank');
                          }else{
                               alert('Error al exportar PDF'+r);
                          }
					}
				});
			});
		});
	</script>
	";

	echo $salida;

 ?>