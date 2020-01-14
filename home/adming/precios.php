<?php 
	session_start();
	if (!isset($_SESSION['adm_loged']) || $_SESSION['adm_loged'] == false || $_SESSION['adm_nivelP'] != 4)
	{
		header("Location: ../logout.php");
	}
	require '../assets/database.php';
 ?>
<!DOCTYPE html >
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  <!-- Meta Tags -->
  
  <meta name="description" content="Phozer-personal and photography template"/>
  <meta name="keywords" content="responsive, creative, html/css, theme" />
  <meta name="author" content="harry"/>

  <!-- Site Title-->
  <title>PRECIOS</title>
  	<link rel="icon" type="image/png" href="../images/favicon.png"/>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

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
	<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">NUEVO PRECIO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgrega">
							<label>PRECIO DIESEL</label>
							<input type="text" class="form-control form-control-sm" name="diesel" id="diesel" MAXLENGTH="5">
							<br>
							<label>PRECIO MAGNA</label>
							<input type="text" class="form-control form-control-sm" name="magna" id="magna" MAXLENGTH="5">
							<label>PRECIO PREMIUM</label>
							<input type="text" class="form-control form-control-sm" name="premium" id="premium" MAXLENGTH="5">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarPrecio">Programar</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* agregar datosmodal ***********************************************-->

	<!--************************************************* updatemodal ***********************************************-->
	<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR PRECIO ACTUAL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<form id="frmactualiza">
						<label>PRECIO DIESEL</label>
						<input type="text" class="form-control form-control-sm" name="dieselm" id="dieselm" MAXLENGTH="5">
						<label>PRECIO MAGNA</label>
						<input type="text" class="form-control form-control-sm" name="magnam" id="magnam" MAXLENGTH="5">
						<label>PRECIO PREMIUM</label>
						<input type="text" class="form-control form-control-sm" name="premiumm" id="premiumm" MAXLENGTH="5">
					</form>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-raised btn-warning" id="btnActualizar">MODIFICAR</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* updatemodal ***********************************************-->
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
						<a  href="homeAG.php">
							<i class="fa fa-home"></i><span>BIENVENIDOS</span>
						</a>
					</li>
					<li>
						<a class="active" href="precios.php">
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#addmodal">
					<span class="fa fa-plus-circle"></span> PROGRAMAR PRECIO
				</span>
				<span class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#updatemodal" id="btnUpdateModal">
					<span class="fa fa-pencil-square-o"></span> MODIFICAR PRECIO ACTUAL
				</span>
				<div class="row" style="background-color: #343A46 ">
				<center>
					<h1 style="color: white">PRECIO ACTUAL
					</h1>
				</center>
	   			</div>
		   		<div id="mainsetPrecioActual"></div>
				
				
				<div class="row" style="background-color: #343A46 ">
					<center>
						<h1 style="color: white">SIGUENTE PRECIO PROGRAMADO
						</h1>
					</center>
		   		</div>
			   	<div id="mainsetSiguientePrecio"></div>

			   	<div class="row" style="background-color: #343A46 ">
					<center>
						<h1 style="color: white">HISTORIAL
						</h1>
					</center>
		   		</div>
			   	<div id="mainsetHistorialPrecios"></div>
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
	<script type="text/javascript" src="js/js-precios-crud.js"></script>
	<script type="text/javascript" src="js/js-precios-opciones.js"></script>
	<script type="text/javascript" src="js/js-precios-validaciones.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>