<?php
    session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
	require 'assets/database.php';
	require 'assets/funciones.php';
	
	$f = new Funciones();

	$idU = $_SESSION['c_user_id'];
	$saldo = $f ->ConsultarSaldo($idU);

	//Datos del Vehiculo
	$contenidoCombobox = $f -> LlenarComboboxVehiculo($idU);
	$datosVehiculo = $f -> VerDatosVehiculo($idU);
	$numVale = ($f -> noVale($idU))+1;
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
  <title>AUTORIZACION DE VALES</title>
  	<link rel="icon" type="image/png" href="images/favicon.png"/>
  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/alertify/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="assets/alertify/css/alertify.css">
	
</head>

<body>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">NUEVO VALE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgrega">
							<div class="col-md-6">
								

									<label>PLACA</label>
									<select class="form-control" name = "txtfkVehiculo" id = "slcVehiculo">
										<?php echo $contenidoCombobox ?>
									</select>
									<label>TIPO DE COMBUSTIBLE</label>
									<select class="form-control" id = "slcTipoCombustible" name="cmbTipoCombustible">
										<option value="DIESEL">DIESEL</option>
										<option value="MAGNA">MAGNA</option>
										<option value="PREMIUM">PREMIUM</option>
										<option value="LUBRICANTE">LUBRICANTE</option>
									</select>
									<label>TIPO DE CONSUMO</label>
									<select class="form-control" id = "slcTipoCons" name="cmbTipoComsumo">
										<option value="Litros">POR LITROS</option>
										<option value="Importe">POR IMPORTE</option>
									</select>
								
							</div>
							<div class="col-md-6">
								<label>LITROS</label>
								<input type="text" name="txtLitros" class="form-control" placeholder="0.000" id="txtLitros">
								<label>IMPORTE</label>
								<input type="text" name="txtImporte" class="form-control" placeholder="0.00" disabled="" id="txtImporte">
								<label>OPERADOR AUTORIZADO</label>
								<input type="text" name="txtChofer" class="form-control upper" placeholder="NOMBRE" id="txtChofer">
							</div>
							<div class="col-md-12">
								<font color="black" style="text-align: center;"><H3 id = "lblPlaca">PLACA</H3></font>
								<center>
									<img id="imgFotoVehiculo" width="0" height="0" class="img" style="visibility: hidden;">
									<div id="imagebox"></div>
								</center>
							</div>
						</form>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-success" id="btnAgregarVale">Autorizar Vale</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<!--************************************************* autorizar modal ***********************************************-->
	<div class="modal fade" id="autorizarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		
				<h5 class="modal-title" id="exampleModalLabel">VISTA PREVIA VALE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<br>
								<center>
									<img src="images/prueba.png">
								</center>
							</div>
							<div class="col-md-6">
								<center>
									<br><br>
									<img src="../images/icons/logo1.jpg">
									<br><br><br>
								</center>				
							</div>
						</div>
						<form id="frmAutoriza">
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>NO. VALE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVNoVale" id="lblNoVale" value='<?php echo $numVale ?>' style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>FECHA Y HORA</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVFechaHora" id="lblFechaHora" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>PLACA AUTORIZADA</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPlacaAutorizada" id="lblPlacaAutorizada" style="border:0" value="" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>OPERADOR</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVChoferAutorizado" id="lblChoferAutorizado" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>CARGA DE COMBUSTIBLE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVTipoCombustible" id="lblTipoCombustible" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>LITROS</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPorLitros"  id="lblPorLitros" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>IMPORTE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPorImporte" id="lblPorImporte" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<br><br>
								<center>
									<span class="btn btn-success" name="btnEnviar" id="btnEnviar">ACEPTAR Y ENVIAR</span>
								</center>
							</div>
						</form>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" id="btnBorrar" name="btnBorrar">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* autorizar modal ***********************************************-->
	
	<!-- Header================================================== -->
	<header style="position:fixed;">
		<div class="logo-box logo">
			<h1><a href=""><img src="images/logo1.jpg" alt="Login"> </a></h1>
		</div>
        <div class="logo-box logo">
			<h1><img src="images/perfil.png" alt="Login"></h1>
            <p>Bienvenido <?php echo $_SESSION['c_name_user'] ?></p>
		</div>
		
		<a class="elemadded responsive-link" href="#">MENU</a>

		<div class="menu-box">
			<ul class="menu">
				<li>
					<a href="home.php">
						<i class="fa fa-home"></i><span>BIENVENIDOS</span>
					</a>
				</li>
				<li>
					<a href="vehiculos.php">
						<i class="fa fa-automobile"></i><span>VEHICULOS</span>
					</a>
				</li>
				<li>
					<a class="active" href="vales.php">
						<i class="fa fa-ticket"></i><span>AUTORIZACION DE VALES</span>
					</a>
				</li>
                <li>
					<a href="historial.php">
						<i class="fa fa-magic"></i><span>HISTORIAL</span>
					</a>
				</li>
                <li>
					<a href="estado.php">
						<i class="fa fa-bar-chart"></i><span>ESTADO DE CUENTA</span>
					</a>
				</li>
				<li><a href="consultas.php"><i class="fa fa-phone"></i><span>CONSULTAS Y ACLARACIONES</span></a></li>
                <li><a href="logout.php"><i class="fa fa-user-times"></i><span>SALIR</span></a></li>	
			</ul>				
		</div>

		<!-- Social icon -->
		<div class="social-box">
			<ul class="social-icons">
				<li><a href="#" class="facebook" ><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" class="twitter" ><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" class="google" ><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#" class="linkedin" ><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#" class="pinterest" ><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#" class="youtube" ><i class="fa fa-youtube"></i></a></li>
			</ul>
			<p class="copyright">&#169; 2019 GE, Derechos Reservados</p>
		</div>
	</header>
	<!-- End Header -->
	<!-- container 
	================================================== -->
	<div id="container-fluid">
		<!-- content
		================================================== -->
		<div id="content">
			<div class="col-md-12" style="background-color: #343A46 ">
				<center>
					<h1 style="color: white">
					<?php echo $_SESSION['c_name_cliente'] ?><BR><font size="5">  SALDO DISPONIBLE  <?php echo $saldo ?></font>
					</h1>
				</center>
	   		</div>
			<!-- Col 2 -->
			<div id="mainset"></div>
			<!-- Col 2 -->
		</div>
		<!-- End content -->
	</div>
	<!-- End Container -->

	<!-- Preloader -->
	<div class="preloader">
		<img alt="" src="images/preloader.gif">
	</div>

	<!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/SmoothScroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/js_validaciones.js"></script>
	<script type="text/javascript" src="js/js-vales-validacion.js"></script>
	<script type="text/javascript" src="js/js-vales-opciones.js"></script>
	<script type="text/javascript" src="js/js-vales-crud.js"></script>
	<script type="text/javascript" src="js/js-vales-eventos.js"></script>
	<script src="assets/alertify/alertify.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>