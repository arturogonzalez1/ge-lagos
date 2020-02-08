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

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen">
	
	<link rel="stylesheet" type="text/css" href="../css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/w3.css" media="screen">
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
    <div class="modal-dialog" role="document" style="width: 1000px">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Realizar Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<div class="container-fluid">
        		<div class="col-md-5" style="height: 450px">
        			<form id="frmPagar">
		        		<label>CLIENTE</label>
		        		<input list="listaClientes" class="form-control" name = "cliente" id = "cliente">
							<datalist id="listaClientes" name= "listaClientes">
								<?php echo $contenidoComboboxCliente ?>
							</datalist>
		            	<label>Fecha y hora Inicial</label><br>
			        	<input type="date"  name="fechaInicial" id="fechaInicial">
			            <input type="time" value="00:00" name="horaInicial" id="horaInicial">
			            <br><label>Fecha y Hora Final</label><br>
			            <input type="date"  name="fechaFinal" id="fechaFinal">
			            <input type="time" value="23:59" name="horaFinal" id="horaFinal">
			            <br><label>Tipo de Pago</label>
			            <select class="form-control" name = "tipoPago" id = "tipoPago">
							<option value="Deposito Bancario">Deposito Bancario</option>
							<option value="Tranferencia Bancaria">Tranferencia Bancaria</option>
							<option value="Cheques">Cheques</option>
							<option value="Efectivo">Efectivo</option>
						</select>
						<label>Numero de Factura</label>
			            <input type="text" class="form-control form-control-sm" name="numeroFactura" id="numeroFactura">
			            <br><label>Fecha y Hora de Pago</label><br>
			            <input type="date"  name="fechaPago" id="fechaPago">
			            <input type="time" value="23:59" name="horaPago" id="horaPago">
		          </form>
        		</div>
        		<div class="col-md-7">
        			<label>TICKETS</label>
        			<div id="tickets" class="scroll"></div>
        		</div>
        	</div>
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
						<span class="fa fa-plus-circle"></span> BUSCAR TICKETS
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
			   		<div id="mainset">
			   			
			   		</div>
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
	<script type="text/javascript" src="../js/js_validaciones.js"></script>
	<script type="text/javascript" src="js/js-pagos-crud.js"></script>
	<script type="text/javascript" src="js/js-pagos-opciones.js"></script>
	<script type="text/javascript" src="js/js-pagos-validaciones.js"></script>
	<script type="text/javascript" src="js/js-pagos-eventos.js"></script>


	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>
