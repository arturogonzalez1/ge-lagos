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
?>
<!DOCTYPE html >
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  <!-- Meta Tags -->
  
  <meta name="description" content="Phozer-personal and photography template"/>
  <meta name="keywords" content="responsive, creative, html/css, theme" />
  <meta name="author" content="harry"/>

  <!-- Site Title-->
  <title>VEHICULOS</title>
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
					<h5 class="modal-title" id="exampleModalLabel">NUEVA VEHICULO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgrega">
							<div class="col-md-6">
								<br>
								<label>PLACA</label>
								<input type="text" class="form-control form-control-sm upper" name="placaV" id="placaV">
								<label>MARCA</label>
								<input type="text" class="form-control form-control-sm upper" name="marcaV" id="marcaV">
								<label>MODELO</label>
								<input type="text" class="form-control form-control-sm upper" name="modeloV" id="modeloV">
							</div>
							<div class="col-md-6">
								<br>
								<label>NO. UNIDAD</label>
								<input type="text" class="form-control form-control-sm upper" name="unidadV" id="unidadV">
								<label>MOTOR</label>
								<input type="text" class="form-control form-control-sm upper" name="motorV" id="motorV">
								<label>FOTO</label>
								<input type="file" class="form-control form-control-sm" name="fotoV" id="fotoV" accept="image/jpeg">
								<br><br>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarVehiculo">Agregar</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* agregar datosmodal ***********************************************-->

	<!--************************************************* updatemodal ***********************************************-->
	<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR VEHICULO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmactualiza" enctype="multipart/form-data">
							<div class="col-md-6">
								<input type="hidden" class="form-control form-control-sm" name="placaVM" id="placaVM">
								<label>MARCA</label>
								<input type="text" class="form-control form-control-sm upper" name="marcaVM" id="marcaVM">
								<label>MODELO</label>
								<input type="text" class="form-control form-control-sm upper" name="modeloVM" id="modeloVM">
								</div>
							<div class="col-md-6">
								<label>NO. UNIDAD</label>
								<input type="text" class="form-control form-control-sm upper" name="unidadVM" id="unidadVM">
								<label>MOTOR</label>
								<input type="text" class="form-control form-control-sm upper" name="motorVM" id="motorVM">
							</div>
							<div class="col-md-12">
							    <label>FOTO</label>
								<input type="file" class="form-control form-control-sm" name="fotoVM" id="fotoVM" accept="image/jpeg">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-raised btn-warning" id="btnactualizar">MODIFICAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* updatemodal ***********************************************-->
	<div id="container">
		<!-- Header
		================================================== -->

		<header style="position: fixed;">
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
						<a  class="active" href="vehiculos.php">
							<i class="fa fa-automobile"></i><span>VEHICULOS</span>
						</a>
					</li>
					<li>
						<a  href="vales.php">
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
<!-- Container -->
	
		<!-- content ================================================== -->
		<div id="content" class="container-fluid">
					<div class="col-md-12" style="background-color: #343A46">
						<center>
							<h1 style="color: white">
							<?php echo $_SESSION['c_name_cliente'] ?><BR><font size="5">  SALDO DISPONIBLE  <?php echo $saldo ?></font>
							</h1>
						</center>
	   				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div id="mainset"></div>
				</div>
				<div class="col-md-2"></div>

				
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
	<script type="text/javascript" src="js/js-vehiculos-crud.js"></script>
	<script type="text/javascript" src="js/js-vehiculos-opciones.js"></script>
	<script type="text/javascript" src="js/js-vehiculos-validaciones.js"></script>
	<script src="assets/alertify/alertify.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>