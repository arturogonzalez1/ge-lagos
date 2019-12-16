<?php
  	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
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
  <title>BIENVENIDOS</title>
  	<link rel="icon" type="image/png" href="images/favicon.png"/>


  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/simpletextrotator/simpletextrotator.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	
</head>
<body>
	<div class="modal fade" id="notificacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span style="font-size: 20px; align-items: center;">
						<center><span class="fa fa-exclamation" style="color: red"></span></center>
						<label id="infoAdvertencia"></label>
						<br>
						<label id="infoAdvertenciaCredito"></label>
					</span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Container -->
	<div id="container">
		
		<!-- Header
		================================================== -->
		<header>
			<div class="logo-box logo">
				<h1><a href=""><img src="images/logo1.jpg" alt="Login"> </a></h1>
			</div>
            <div class="logo-box logo">
				<h1><img src="images/perfil.png" alt="Login"></h1>
                <p>Bienvenido <?php echo $_SESSION['c_name_user']; ?></p>
			</div>
			
			<a class="elemadded responsive-link" href="#">MENU</a>

			<div class="menu-box">
				<ul class="menu">
					<li>
						<a class="active" href="home.php">
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

		<!-- content 
		================================================== -->
		<div id="content">
			<div class="inner-content">
				<div class="main-home">
				    <div class="home-bg"></div>
				    <div class="home-content text-center">
				    	<h1 class="home-text"><span class="rotate">Hola!!!,Somos Gasolineras eficientes,Bienvenidos</span></h1>
				    	<p class="intro-text">Un programa pensado para tu comodidad y seguridad. <br>  Te ofrecemos un producto de calidad, confianza y profesionalismo.</p>
				    </div>
				</div>
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
  	<script type="text/javascript" src="assets/simpletextrotator/jquery.simple-text-rotator.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/SmoothScroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<script>
	    $(document).ready(function(){
	    	obtenerEstadoCliente(<?php echo $_SESSION['c_user_id'] ?>)
			$(".home-text .rotate").textrotator({
		        animation: "fade",
		        speed: 3000
		    });
		});
	</script>
	<script type="text/javascript">
		function obtenerEstadoCliente(usuario){
			$.ajax({
			type:"POST",
			data:"usuario=" + usuario,
			url:"php/estadoCliente.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				document.getElementById('infoAdvertencia').innerText = "";
				document.getElementById('infoAdvertenciaCredito').innerText = "";
				var estado = datos['estado'];
				var cantidad = datos['cantidad'];

				if (estado != 'ACTIVO' || cantidad <= 500)
				{
					if (estado != 'ACTIVO')
					{
						document.getElementById('infoAdvertencia').innerText = 'Su credito se encuentra '+estado+'. Pongase en contacto con el administrador';
					}
					if (cantidad <= 500)
					{
						document.getElementById('infoAdvertenciaCredito').innerText = 'Su saldo esta por agotarse. Realice un pago para continuar con su credito';
					}
					$('#notificacionModal').modal();
				}
				
			}
			});
		}
	</script>


</body>
</html>