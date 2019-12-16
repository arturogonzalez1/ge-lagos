<?php 
	session_start();
	if (!isset($_SESSION['adm_loged']) || $_SESSION['adm_loged'] == false || $_SESSION['adm_nivelP'] != 4)
	{
		header("Location: ../logout.php");
	}
	require '../assets/database.php';
	require '../assets/funciones.php';
	$f = new Funciones();
	$contenidoComboboxCliente = $f -> Cliente();
	$idEstaciones = $_SESSION['adm_idEstacion'];

 ?>
<!DOCTYPE html >
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>
  <meta name="description" content="Phozer-personal and photography template"/>
  <meta name="keywords" content="responsive, creative, html/css, theme" />
  <meta name="author" content="harry"/>

  <!-- Site Title-->
  <title>PAGOS</title>
  	<link rel="icon" type="image/png" href="../images/favicon.png"/>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen">
	
	<link rel="stylesheet" type="text/css" href="../css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../assets/alertify/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="../assets/alertify/css/alertify.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>

	<!--************************************************* agregar datosmodal ***********************************************-->
	<div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 400px">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Buscar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div class="container-fluid">
        		<form id="frmBusca" action="consultas/excel.php" method="POST">
	        		<label>CLIENTE</label>
	        		<input list="clientesb" class="form-control" name = "clientesba" id = "clientesba">
						<datalist id="clientesb" name= "clientesb">
						<option disabled selected>Estacion</option>
						<?php echo $contenidoComboboxCliente ?>
						</datalist>
					</imput>
						<label>FECHA Y HORA INICIAL</label><br>
						<span>
							<input type="date"  name="finicialb" id="finicialb">
							<input type="time" value="00:00" name="hinicialb" id="hinicialb">
						</span><br>
						<label>FECHA Y HORA FINAL</label><br>
						<span>
							<input type="date" name="ffinalb" id="ffinalb">
							<input type="time" value="23:59" name="hfinalb" id="hfinalb">
						</span>
	            </form>
        	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-raised btn-warning" id="btnbuscar">Buscar</button>
        </div>
      </div>
    </div>
  </div>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 400px">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Realizar Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<form id="frmactualiza">
        		
        		<label>CLIENTE</label>
        		<input list="clientesu" class="form-control" name = "clientesuu" id = "clientesuu">
					<datalist id="clientesu" name= "clientesu">
					<option disabled selected>Estacion</option>
					<?php echo $contenidoComboboxCliente ?>
					</datalist>
            	<label>Fecha y hora Inicial</label><br>
	        	<input type="date"  name="finicialu" id="finicialu">
	            <input type="time" value="00:00" name="hinicialu" id="hinicialu">
	            <br><label>Fecha y Hora Final</label><br>
	            <input type="date"  name="ffinalu" id="ffinalu">
	            <input type="time" value="23:59" name="hfinalu" id="hfinalu">
	            <br><label>Tipo de Pago</label>
	            <select class="form-control" name = "tpagou" id = "tpagou">
					<option value="Deposito Bancario">Deposito Bancario</option>
					<option value="Tranferencia Bancaria">Tranferencia Bancaria</option>
					<option value="Cheques">Cheques</option>
					<option value="Efectivo">Efectivo</option>
				</select>
				<label>Numero de Factura</label>
	            <input type="text" class="form-control form-control-sm" name="nfacturau" id="nfacturau">
	            <br><label>Fecha y Hora de Pago</label><br>
	            <input type="date"  name="fpago" id="fpago">
	            <input type="time" value="23:59" name="hpago" id="hpago">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <a heref="consultas/excel.php"><button type="button" class="btn btn-raised btn-warning" id="btnpagar">Pagar</button></a>
        </div>
      </div>
    </div>
  </div>
	<!--************************************************* agregar datosmodal-->
	<!-- Container -->
	<div id="container">
		<!-- Header
		================================================== -->
		<header style="position: fixed">
			<div class="logo-box logo">
				<h1><a href=""><img src="../images/logo1.jpg" alt="Login"> </a></h1>
			</div>
            <div class="logo-box logo">
				<h1><img src="../images/perfil.png" alt="Login"></h1>
                <p>Bienvenido <?php echo $_SESSION['adm_name_user'] ?></p>
			</div>
			
			<a class="elemadded responsive-link" href="#">MENU</a>

			<div class="menu-box">
				<ul class="menu">
					<li>
						<a href="homeAG.php">
							<i class="fa fa-home"></i><span>BIENVENIDOS</span>
						</a>
					</li>
					<li>
						<a  href="precios.php">
							<i class="fa fa-sort"></i><span>ACTUALIZACION DE PRECIOS</span>
						</a>
					</li>
					<li>
						<a href="despachadores.php">
							<i class="fa fa-group"></i><span>DESPACHADORES</span>
						</a>
					</li>
					<li>
						<a href="clientes.php">
							<i class="fa fa-group"></i><span>CLIENTES</span>
						</a>
					</li>
					<li>
						<a class="active" href="pagos.php">
							<i class="fa fa-money"></i><span>PAGOS</span>
						</a>
					</li>
					<br>
                    <li><a href="../logout.php"><i class="fa fa-user-times"></i><span>SALIR</span></a></li>

					
				</ul>				
			</div>

			<!-- Social icon -->
			<div class="social-box">
				<p class="copyright">&#169; 2019 GE, Derechos Reservados</p>
			</div>
		</header>
		<!-- End Header -->


		<!-- content 
		================================================== -->
		<div id="content">
			<div class="col-md-12" style="background-color: #343A46">
				<center>
					<h1 style="color: white">
					<?php echo $_SESSION['adm_name_estacion'] ?>
					</h1>
				</center>
			</div>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#insertmodal">
						<span class="fa fa-plus-circle"></span> BUSCAR
					</span>
					<span class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#updatemodal"> REALIZAR PAGO
						<span class="fa fa-pencil-square-o"></span> 
					</span>
					
					
					<div class="row" style="background-color: #343A46 ">
						<center>
							<h1 style="color: white">PAGOS REALIZADOS
							</h1>
						</center>
			   		</div>
			   		 <table class="table table-striped table-bordered"  style="border-style:solid;" >
					<thead>
						<tr>
							<th>CLIENTE</th>
							<th>FECHA PAGO</th>
							<th>PAGO</th>
							<th>FACTURA</th>
							<th>TICKET(S)</th>
						</tr>
					</thead>
				<?php
				$sql="CALL v_CONSULTAPAGOSP($idEstaciones)";
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
				</tr>

				<?php 
				}
				 ?>
				</table>
				</div>
			<div class="col-md-2"></div>
			
		</div>
		<!-- End content -->

	</div>
	<!-- End Container -->

	<!-- Preloader -->
	<div class="preloader">
		<img alt="" src="../images/preloader.gif">
	</div>

	<!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.migrate.js"></script>
	<script type="text/javascript" src="../js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="../js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="../js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="../js/SmoothScroll.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script src="../assets/alertify/alertify.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});

		
	</script>
	<!--************************************************* VALIDACION ***********************************************-->
	<SCRIPT type="text/javascript">
	//VALIDAR FORMULARIO AGREGAR NUEVA ESTACION
		$(document).ready(function(){
			$('#btnbuscar').click(function(){
				if(validarFormVacio('frmBusca') > 0){
					alertify.alert("Error","Debes llenar todos los campos");
					return false;
				}
				$('#frmBusca').submit();
			});
		});

		//VALIDAR FORMULARIO ACTUALIZAR ESTACION
		$(document).ready(function(){
			$('#btnpagar').click(function(){

			datos=$('#frmactualiza').serialize();
				$.ajax({
				type:"POST",
				data:datos,
				url:"consultas/modificarPagos.php",
				success:function(r){
					if(r==1){
						alertify.success("El pago se ha realizado correctamente");
					}
					else if(r==2){
						alertify.error("Error en las fechas");
					}
					else if (r != 1 || r != 2){
					alertify.error("Error al realizar el pago");
					}
				}
				});
			});
		});

		//VALIDAR FORMULARIO SI SE ENCUENTRA VACIO O LLENO
		function validarFormVacio(formulario){
			datos=$('#' + formulario).serialize();
			d=datos.split('&');
			vacios=0;
			for(i=0;i< d.length;i++){
			controles=d[i].split("=");
			if(controles[1]=="A" || controles[1]==""){
				vacios++;
			}
			}
			return vacios;
		}
	</SCRIPT>
	<!--************************************************* CRUD ***********************************************-->
</body>
</html>
