<?php 
	session_start();
	if (!isset($_SESSION['adm_loged']) || !$_SESSION['adm_loged'] || $_SESSION['adm_nivelP'] != 4)
	{
		header("Location: ../logout.php");
	}
	require '../assets/database.php';
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
  <title>CLIENTES</title>
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
	<link rel="stylesheet" type="text/css" href="../assets/alertify/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="../assets/alertify/css/alertify.css">

	
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">NUEVO CLIENTE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgregar">
							<div class="col-md-6">
								<label>NOMBRE</label>
								<input type="text" class="form-control form-control-sm upper" name="nombreC" id="nombreC" maxlength="50">
								<label>RFC</label>
								<input type="text" class="form-control form-control-sm upper" name="rfcC" id="rfcC" maxlength="13">
								<label>LIMITE CREDITO</label>
								<input type="text" class="form-control form-control-sm" name="limiteC" id="limiteC">
								<label>DIAS DE PAGO</label>
								<input type="text" class="form-control form-control-sm" name="diasPagoC" id="diasPagoC">
								<label>MODALIDAD</label>
								<select class="form-control" id = "modalidadC" name="modalidadC">
									<option value="CREDITO">CREDITO</option>
									<option disabled="" value="DEBITO">DEBIDO</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>DIAS LIMITE DE PAGO</label>
								<select class="form-control" id = "diasLimiteC" name="diasLimiteC">
									<option value="1">MENSUAL</option>
									<option value="2">BIMESTRAL</option>
									<option value="3">TRIMESTRAL</option>
								</select>
								<label>PERSONA AUTORIZADA</label>
								<input type="text" class="form-control form-control-sm upper" name="paC" id="paC" maxlength="50">
								<label>USUARIO</label>
								<input type="text" class="form-control form-control-sm" name="usuarioC" id="usuarioC" maxlength="20">
								<label>CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswC" id="pswC" maxlength="10">
								<label>CONFIRMAR CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswCC" id="pswCC" maxlength="10">
							</div>
						</form>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarg">Agregar</button>
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
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR DATOS CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmactualiza">
							<div class="col-md-6">
								<input type="text" hidden="" name="idClienteM" id="idClienteM">
								<label>NOMBRE</label>
								<input type="text" class="form-control form-control-sm upper" name="nombreCM" id="nombreCM" maxlength="50">
								<label>RFC</label>
								<input type="text" class="form-control form-control-sm upper" name="rfcCM" id="rfcCM" maxlength="13">
								<label>LIMITE CREDITO</label>
								<input type="text" class="form-control form-control-sm" name="limiteCM" id="limiteCM">
								<label>DIAS DE PAGO</label>
								<input type="text" class="form-control form-control-sm" name="diasPagoCM" id="diasPagoCM">
								<label>DIAS LIMITE DE PAGO</label>
								<select class="form-control" id = "diasLimiteCM" name="diasLimiteCM">
									<option value="1">MENSUAL</option>
									<option value="2">BIMESTRAL</option>
									<option value="3">TRIMESTRAL</option>
								</select>
							</div>
								<div class="col-md-6">
									<label>MODALIDAD</label>
									<select class="form-control" id = "modalidadCM" name="modalidadCM">
										<option value="1">CREDITO</option>
										<option value="2">DEBITO</option>
										<option value="3">CONTADO</option>
									</select>
									<label>PERSONA AUTORIZADA</label>
									<input type="text" class="form-control form-control-sm upper" name="paCM" id="paCM" maxlength="50">
									<label>USUARIO</label>
									<input type="text" class="form-control form-control-sm" name="usuarioCM" id="usuarioCM" maxlength="20">
									<label>NUEVA CONTRASEÑA</label>
									<input type="password" class="form-control form-control-sm" name="pswCM" id="pswCM" maxlength="10">
									<label>CONFIRMAR CONTRASEÑA</label>
									<input type="password" class="form-control form-control-sm" name="pswCCM" id="pswCCM" maxlength="10">
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
	<!-- Container -->
	<div id="container">
		<!-- Header
		================================================== -->
		<header>
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
						<a href="precios.php">
							<i class="fa fa-sort"></i><span>ACTUALIZACION DE PRECIOS</span>
						</a>
					</li>
					<li>
						<a href="despachadores.php">
							<i class="fa fa-group"></i><span>DESPACHADORES</span>
						</a>
					</li>
					<li>
						<a class="active" href="clientes.php">
							<i class="fa fa-group"></i><span>CLIENTES</span>
						</a>
					</li>
					<li>
						<a href="pagos.php">
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

			<div class="col-md-12">
				<div class="col-md-1"></div>
					<div class="col-md-10">
						<br>
						<!-- Search form -->
						<form class="formulario">
							<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Buscar Cliente" aria-label="Search" name="caja_busqueda" id="caja_busqueda">
						</form>
					</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div id="mainset"></div>
			</div>
			<div class="col-md-1"></div>
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
	<script type="text/javascript" src="js/js_cliente_actualizar.js"></script>
	<script type="text/javascript" src="js/js_cliente_crud.js"></script>
	<script type="text/javascript" src="js/js_cliente_validacion.js"></script>
	<script type="text/javascript" src="js/js_cliente_opp.js"></script>
	<script type="text/javascript" src="../js/js_validaciones.js"></script>
	<script type="text/javascript" src="../assets/alertify/alertify.js"></script>
	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>