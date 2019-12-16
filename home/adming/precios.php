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
							<input type="text" class="form-control form-control-sm" name="diesel" id="diesel" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
							<br>
							<label>PRECIO MAGNA</label>
							<input type="text" class="form-control form-control-sm" name="magna" id="magna" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
							<label>PRECIO PREMIUM</label>
							<input type="text" class="form-control form-control-sm" name="premium" id="premium" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarEstacion">Programar</button>
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
						<input type="text" class="form-control form-control-sm" name="dieselm" id="dieselm" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
						<label>PRECIO MAGNA</label>
						<input type="text" class="form-control form-control-sm" name="magnam" id="magnam" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
						<label>PRECIO PREMIUM</label>
						<input type="text" class="form-control form-control-sm" name="premiumm" id="premiumm" MAXLENGTH="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
					</form>
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
				<span class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#updatemodal">
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

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});

		
	</script>
	<!--************************************************* VALIDACION ***********************************************-->
	<SCRIPT>
	//VALIDAR FORMULARIO AGREGAR NUEVA precio
		$(document).ready(function(){
			$('#mainsetPrecioActual').load('content.admine.precioactual.view.php');
			$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
			$('#mainsetHistorialPrecios').load('content.admine.historial.view.php');
			$('#btnAgregarEstacion').click(function(){
			if(validarFormVacio('frmAgrega') > 0){
				alertify.alert("Error","Debes llenar todos los campos");
				return false;
			}
			datos=$('#frmAgrega').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"consultas/agregarPrecio.php",
				success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
					$('#addmodal').modal('hide');
					alertify.success("Agregado con exito :)");
					window.location("estaciones.php");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
			});
			});


			$('#btnactualizar').click(function(){
			if(validarFormVacio('frmactualiza') > 0){
				alertify.alert("Error","Debes llenar todos los campos");
				return false;
			}
			datos=$('#frmactualiza').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"consultas/modificarPrecio.php",
				success:function(r){
				if(r==1){
					$('#frmactualiza')[0].reset();
					$('#updatemodal').modal('hide');
					$('#mainsetPrecioActual').load('content.admine.precioactual.view.php');
					$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
					$('#mainsetHistorialPrecios').load('content.admine.historial.view.php');
					alertify.success("El precio se ha modificado con exito :)");
				}
				else{
					alertify.error("No se pudo modificar: " + r);
				}
			}
			});
			});
		});

		//VALIDAR FORMULARIO ACTUALIZAR ESTACION
		$(document).ready(function(){
			$('#btnactualizar').click(function(){

			datos=$('#frmactualiza').serialize();
				$.ajax({
				type:"POST",
				data:datos,
				url:"php/actualizar.php",
				success:function(r){
					if(r==1){
					//$('#tablastores').load('tabla.php');
					alertify.success("Actualizado con exito :)");
					}else{
					alertify.error("No se pudo actualizar :(");
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
	<SCRIPT>

		function obtenerDatos(){
			var x = 0;
			$.ajax({
			type:"POST",
			data:"x=" + x,
			url:"consultas/obtenerPrecio.php",
			success:function(r){
				datos=jQuery.parseJSON(r);

				$('#dieselm').val(datos['diesel']);
				$('#magnam').val(datos['magna']);
				$('#premiumm').val(datos['premium']);
			}
			});
		}

		function eliminarEstacion(){
		alertify.confirm('ELIMINAR ESTACION', '<CENTER>¿ESTA SEGURO DE BORRAR ESTA ESTACION? <br><br> <FONT style="color:red;">SE PERDERAN TODOS LOS REGISTROS EN RELACION<FONT></CENTER>', 
				function(){ 
					$.ajax({
						type:"POST",
						data:"idjuego=" + idjuego,
						url:"php/eliminar.php",
						success:function(r){
							if(r==1){     
								$('#tablastores').load('tabla.php');
								alertify.success("Eliminado con exito :)");
							}else{
								alertify.error("No se pudo eliminar :(");
							}
						}
					});
				}
				,function(){ 
					alertify.error('OPERACION CANCELADA')
				});
		}
	</SCRIPT>
</body>
</html>