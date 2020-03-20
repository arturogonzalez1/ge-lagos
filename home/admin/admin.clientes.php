<?php 
	session_start();
	if (!isset($_SESSION['a_loged']) || $_SESSION['a_loged'] == false || $_SESSION['a_nivelP'] != 1)
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
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">NUEVO CLIENTE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgregar" class="">
							<div class="col-md-12">
								<label>NOMBRE (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="nombreC" id="nombreC">
							</div>
							<div class="col-md-6">
								<label>APELLIDOS</label>
								<input type="text" class="form-control form-control-sm upper" name="apellidosC" id="apellidosC">
								<label>RFC (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="rfcC" id="rfcC">
								<label>CODIGO POSTAL (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="codposC" id="codposC">
								<label>EMAIL (*)</label>
								<input type="text" class="form-control form-control-sm" name="emailC" id="emailC">
								<label>EMAIL 2</label>
								<input type="text" class="form-control form-control-sm" name="email2C" id="email2C">
								<label>EMAIL 3</label>
								<input type="text" class="form-control form-control-sm" name="email3C" id="email3C">
								<label>TELEFONO</label>
								<input type="text" class="form-control form-control-sm upper" name="telefonoC" id="telefonoC">
								<label>RAZON SOCIAL</label>
								<input type="text" class="form-control form-control-sm upper" name="razonsC" id="razonsC">
								<label>COLONIA</label>
								<input type="text" class="form-control form-control-sm upper" name="coloniaC" id="coloniaC">
								<label>CIUDAD</label>
								<input type="text" class="form-control form-control-sm upper" name="ciudadC" id="ciudadC">
								<label>ESTADO</label>
								<input type="text" class="form-control form-control-sm upper" name="estadoC" id="estadoC">
							</div>
							<div class="col-md-6">
								<label>PAIS</label>
								<input type="text" class="form-control form-control-sm upper" name="paisC" id="paisC">
								<label>DELEGACION</label>
								<input type="text" class="form-control form-control-sm upper" name="delegacionC" id="delegacionC">
								<label>NO. REGISTRO TRIBUTARIO</label>
								<input type="text" class="form-control form-control-sm upper" name="numregidtribC" id="numregidtribC">
								<label>USO CFDI (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="usocfdiC" id="usocfdiC">
								<label>LIMITE CREDITO (*)</label>
								<input type="text" class="form-control form-control-sm" name="limiteC" id="limiteC">
								<label>DIAS DE PAGO (*)</label>
								<select class="form-control" id = "diasPagoC" name="diasPagoC">
									<option value="7">SEMANAL</option>
									<option value="15">QUINCENAL</option>
									<option value="30">MENSUAL</option>
								</select>
								<label>DIAS LIMITE DE PAGO (*)</label>
								<select class="form-control" id = "diasLimiteC" name="diasLimiteC">
									<option value="1">MENSUAL</option>
									<option value="2">BIMESTRAL</option>
									<option value="3">TRIMESTRAL</option>
								</select>
								<label>MODALIDAD (*)</label>
								<select class="form-control" id = "modalidadC" name="modalidadC">
									<option value="CREDITO">CREDITO</option>
									<option value="DEBITO">DEBITO</option>
									<option value="CONTADO">CONTADO</option>
								</select>
								<label>USUARIO (*)</label>
								<input type="text" class="form-control form-control-sm" name="usuarioC" id="usuarioC">
								<label>CONTRASEÑA (*)</label>
								<input type="password" class="form-control form-control-sm" name="pswC" id="pswC">
								<label>CONFIRMAR CONTRASEÑA (*)</label>
								<input type="password" class="form-control form-control-sm" name="pswCC" id="pswCC">
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
							<input type="text" hidden="" name="idClienteM" id="idClienteM">
							<div class="col-md-12">
								<label>NOMBRE (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="nombreCM" id="nombreCM">
							</div>
							<div class="col-md-6">
								<label>APELLIDOS</label>
								<input type="text" class="form-control form-control-sm upper" name="apellidosCM" id="apellidosCM">
								<label>RFC (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="rfcCM" id="rfcCM">
								<label>CODIGO POSTAL (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="codposCM" id="codposCM">
								<label>EMAIL (*)</label>
								<input type="text" class="form-control form-control-sm" name="emailCM" id="emailCM">
								<label>EMAIL 2</label>
								<input type="text" class="form-control form-control-sm" name="email2CM" id="email2CM">
								<label>EMAIL 3</label>
								<input type="text" class="form-control form-control-sm" name="email3CM" id="email3CM">
								<label>TELEFONO</label>
								<input type="text" class="form-control form-control-sm upper" name="telefonoCM" id="telefonoCM">
								<label>RAZON SOCIAL</label>
								<input type="text" class="form-control form-control-sm upper" name="razonsCM" id="razonsCM">
								<label>COLONIA</label>
								<input type="text" class="form-control form-control-sm upper" name="coloniaCM" id="coloniaCM">
								<label>CIUDAD</label>
								<input type="text" class="form-control form-control-sm upper" name="ciudadCM" id="ciudadCM">
								<label>ESTADO</label>
								<input type="text" class="form-control form-control-sm upper" name="estadoCM" id="estadoCM">
							</div>
							<div class="col-md-6">
								<label>PAIS</label>
								<input type="text" class="form-control form-control-sm upper" name="paisCM" id="paisCM">
								<label>DELEGACION</label>
								<input type="text" class="form-control form-control-sm upper" name="delegacionCM" id="delegacionCM">
								<label>NO. REGISTRO TRIBUTARIO</label>
								<input type="text" class="form-control form-control-sm upper" name="numregidtribCM" id="numregidtribCM">
								<label>USO CFDI (*)</label>
								<input type="text" class="form-control form-control-sm upper" name="usocfdiCM" id="usocfdiCM">
								<label>LIMITE CREDITO (*)</label>
								<input type="text" class="form-control form-control-sm" name="limiteCM" id="limiteCM">
								<label>DIAS DE PAGO (*)</label>
								<select class="form-control" id = "diasPagoC" name="diasPagoCM">
									<option value="7">SEMANAL</option>
									<option value="15">QUINCENAL</option>
									<option value="30">MENSUAL</option>
								</select>
								<label>DIAS LIMITE DE PAGO (*)</label>
								<select class="form-control" id = "diasLimiteC" name="diasLimiteCM">
									<option value="1">MENSUAL</option>
									<option value="2">BIMESTRAL</option>
									<option value="3">TRIMESTRAL</option>
								</select>
								<label>MODALIDAD (*)</label>
								<select class="form-control" id = "modalidadC" name="modalidadCM">
									<option value="CREDITO">CREDITO</option>
									<option value="DEBITO">DEBITO</option>
									<option value="CONTADO">CONTADO</option>
								</select>
								<label>USUARIO (*)</label>
								<input type="text" class="form-control form-control-sm" name="usuarioCM" id="usuarioCM">
								<label>CONTRASEÑA (*)</label>
								<input type="password" class="form-control form-control-sm" name="pswCM" id="pswCM">
								<label>CONFIRMAR CONTRASEÑA (*)</label>
								<input type="password" class="form-control form-control-sm" name="pswCCM" id="pswCCM">
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
		<!-- Header================================================== -->
		<header>
			<div class="logo-box logo">
				<h1><a href=""><img src="../images/logo1.jpg" alt="Login"> </a></h1>
			</div>
            <div class="logo-box logo">
				<h1><img src="../images/perfil.png" alt="Login"></h1>
                <p>Bienvenido <?php echo $_SESSION['a_name_cliente'] ?></p>
			</div>
			
			<a class="elemadded responsive-link" href="#">MENU</a>

			<div class="menu-box">
				<ul class="menu">
					<li>
						<a href="home_admin.php">
							<i class="fa fa-home"></i><span>INICIO</span>
						</a>
					</li>
					<li>
						<a href="estaciones.php">
						<i class="fas fa-industry"></i><span>ESTACIONES</span>
						</a>
					</li>
					<li>
						<a href="administradores.php">
							<i class="fas fa-user-shield"></i><span>ADMINISTRADORES</span>
						</a>
					</li>
					<li>
						<a class="active" href="admin.clientes.php">
							<i class="fa fa-group"></i><span>CLIENTES</span>
						</a>
					</li>
					<li>
						<a href="reportes.php">
							<i class="far fa-file-alt"></i><span>REPORTES</span>
						</a>
					</li>
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
					ADMINISTRADOR PRINCIPAL
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
	<script type="text/javascript" src="js/js-cliente-actualizar.js"></script>
	<script type="text/javascript" src="js/js-cliente-crud.js"></script>
	<script type="text/javascript" src="js/js-cliente-validacion.js"></script>
	<script type="text/javascript" src="js/js-cliente-opciones.js"></script>
	<script type="text/javascript" src="../js/js_validaciones.js"></script>
	<script type="text/javascript" src="js/js-cliente-eventos.js"></script>
	<script src="../assets/alertify/alertify.js"></script>
</body>
</html>