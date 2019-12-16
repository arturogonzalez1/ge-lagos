<!DOCTYPE html >
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>
  <meta name="description" content="Phozer-personal and photography template"/>
  <meta name="keywords" content="responsive, creative, html/css, theme" />
  <meta name="author" content="harry"/>

  <!-- Site Title-->
  <title>CONSULTAS Y ACLARACIONES</title>
  	<link rel="icon" type="image/png" href="images/favicon.png"/>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	
</head>
<body>

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
                <p>Bienvenido José Márquez</p>
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
						<a href="historial.php">
							<i class="fa fa-magic"></i><span>HISTORIAL</span>
						</a>
					</li>
                    <li>
						<a href="estado.php">
							<i class="fa fa-bar-chart"></i><span>ESTADO DE CUENTA</span>
						</a>
					</li>
					<li><a class="active" href="consultas.php"><i class="fa fa-phone"></i><span>CONSULTAS Y ACLARACIONES</span></a></li>
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
				<div class="portfolio-page">
					
					<div class="about-us-section">
					    <div class="text-center">
					    	<div class="about-detail">
								<h3 class="title">Área de Contacto</h3>
								<span class="subtitle">Ponte en contacto con nosotros y en breve uno de nuestros profesionales se comunicara contigo...</span>
								<div class="devider"></div>

								
								
								<form role="form" name="ajax-form" id="ajax-form" action="php/contact.php" method="post" class="form-main">
						            <div class="col-xs-12 text-left">
						                <div class="row"> 
						                    <!-- Name -->           
						                    <div class="form-group col-xs-6">
							                    <label for="name2">Nombre</label>
							                    <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Nombre">
							                    <div class="error" id="err-name" style="display: none;">Please enter name</div>
						                    </div>

						                    <!-- Email -->
						                    <div class="form-group col-xs-6">
							                    <label for="email2">Email</label>
							                    <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
							                    <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div> 
						                    </div>
						                </div>

						                <!-- Message -->
						                <div class="row">            
						                    <div class="form-group col-xs-12">
							                    <label for="message2">Mensaje</label>
							                    <textarea class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Mensaje</textarea>
							                    <div class="error" id="err-message" style="display: none;">Please enter message</div>
							                 </div>
						                </div> 

						                <!-- Submit-button -->
						                <div class="row">            
						                    <div class="col-xs-12 text-center">
						                        <div id="ajaxsuccess">E-mail was successfully sent.</div>
						                        <div class="error" id="err-form" style="display: none;">There was a problem validating the form please check!</div>
						                        <div class="error" id="err-timedout">The connection to the server timed out!</div>
						                        <div class="error" id="err-state"></div>
						                        <button type="submit" class="btn btn-custom" id="send">Enviar</button>
						                    </div>
						                </div>
						            </div>  
						        </form>

							</div>
					    </div>
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
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/SmoothScroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>


</body>
</html>