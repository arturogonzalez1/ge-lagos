<?php 
	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
 ?>
<?php 
	require 'assets/database.php';
	require 'assets/funciones.php';
	$f = new Funciones();
	$idU = $_SESSION['c_user_id'];
	$saldo = $f ->ConsultarSaldo($idU);
	$anios = $f ->LlenarAnios($idU);
	$meses = $f ->LlenarMeses($idU);
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
  <title>HISTORIAL</title>
  	<link rel="icon" type="image/png" href="images/favicon.png"/>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	
</head>
<body>
	<div class="modal fade" id="modalFiltroMes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-sm" role="document">
	      	<div class="modal-content">
	        	<div class="modal-header">
			          <h5 class="modal-title" id="exampleModalLabel">FILTRAR POR MES</h5>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            	<span aria-hidden="true">&times;</span>
			          </button>
	        	</div>
	        	<div class="modal-body">
		        	<div class="container-fluid">
		        		<form name="frmFiltroMes" id="frmFiltroMes">
		   					<label>AÑO</label>
		   					<select class="form-control" name = "selectAnio" id = "selectAnio" onchange="">
								<?php echo $anios ?>
							</select>
							<label>MES</label>
		   					<select class="form-control" name = "selectMes" id = "selectMes" onchange="">
								<?php echo $meses ?>
							</select>
		        		</form>
		        	</div>
	        	</div>
	        	<div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary" id="btnFiltrarMes">Filtrar</button>
	        	</div>
	      	</div>
	    </div>
  	</div>
  	<div class="modal fade" id="modalFiltroDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-sm" role="document" style="width: 400px">
	      	<div class="modal-content">
	        	<div class="modal-header">
			          <h5 class="modal-title" id="exampleModalLabel">FILTRAR POR DIA</h5>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            	<span aria-hidden="true">&times;</span>
			          </button>
	        	</div>
	        	<div class="modal-body">
		        	<div class="container-fluid">
		        		<form name="frmFiltroDia" id="frmFiltroDia">
		        				<label>DE: </label><br>
		        				<span>
		        					<input type="date" name="dtpFechaInicio" id="dtpFechaInicio">
		        					<input type="time" value="00:00" name="dtpHoraInicio" id="dtpHoraInicio">
		        				</span><br>
		        				<label>A: </label><br>
		        				<span>
		        					<input type="date" name="dtpFechaFin" id="dtpFechaFin">
		        					<input type="time" value="23:59" name="dtpHoraFin" id="dtpHoraFin">
		        				</span>
		        		</form>
		        	</div>
	        	</div>
	        	<div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary" id="btnFiltrarDia">Filtrar</button>
	        	</div>
	      	</div>
	    </div>
  	</div>
	<!-- Header
	================================================== -->
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
					<a href="vales.php">
						<i class="fa fa-ticket"></i><span>AUTORIZACION DE VALES</span>
					</a>
				</li>
                <li>
					<a class="active" href="historial.php">
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
	<div id="container-fluid">
		<!-- content 
		================================================== -->
		<div id="content">
			<div class="col-md-12" style="background-color: #343A46">
				<center>
					<h1 style="color: white">
					<?php echo $_SESSION['c_name_cliente'] ?><BR><font size="5">  SALDO DISPONIBLE  <?php echo $saldo ?></font>
					</h1>
				</center>
	   		</div>
   			<div class="col-md-12" style="margin-bottom: 10px" align="center">
   				<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#modalFiltroMes">
					<span class="fas fa-sort"></span> FILTRAR POR MES
				</span>
				<span class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#modalFiltroDia">
					<span class="fas fa-sort"></span> FILTRAR POR FECHAS
				</span>
				<br>
				<label id="lblFecha"></label>
   			</div>
   			<div class="col-md-12">
   				<div class="col-md-1" style="max-width: 20px"></div>
		   		<div class="col-md" style="margin: 20px">
	   				<div id="mainset"></div>
		   		</div>
		   		<div class="col-md-1" style="max-width: 20px"></div>
   			</div>
	   		
				
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
	<script type="text/javascript" src="js/js-historial-opciones.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>
</body>
</html>