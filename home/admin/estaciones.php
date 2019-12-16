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
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  <!-- Meta Tags -->
  
  <meta name="description" content="Phozer-personal and photography template"/>
  <meta name="keywords" content="responsive, creative, html/css, theme" />
  <meta name="author" content="harry"/>

  <!-- Site Title-->
  <title>ESTACIONES</title>
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
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">NUEVA ESTACION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgrega">
							<div class="col-md-12">
								<br>
								<label>NOMBRE</label>
								<input type="text" class="form-control form-control-sm" name="nombreE" id="nombreE" maxlength="50">
							</div>
							<div class="col-md-6">
								<br>
								<label>RFC</label>
								<input type="text" class="form-control form-control-sm" name="rfcE" id="rfcE" maxlength="13">
								<label>NO. ESTACION</label>
								<input type="text" class="form-control form-control-sm" name="noE" id="noE" maxlength="9">
							</div>
							<div class="col-md-6">
								<br>
								<label>ESTADO</label>
								<select type="text" class="form-control form-control-sm" name="estadoE" id="estadoE">
									<option disabled selected>ESTADO</option>
							  		<option value="JALISCO">JALISCO</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarEstacion">Agregar</button>
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
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR ESTACION</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmactualiza">
							<div class="col-md-12">
								<input type="text" hidden="" name="idEM" id="idEM">
								<label>Nombre</label>
								<input type="text" class="form-control form-control-sm" name="nombreEM" id="nombreEM" maxlength="50">
							</div>
							<div class="col-md-6">
								<label>Numero</label>
								<input type="text" class="form-control form-control-sm" name="numEM" id="numEM" maxlength="10">
								<label>RFC</label>
								<input type="text" class="form-control form-control-sm" name="rfcEM" id="rfcEM" maxlength="13">
							</div>
							<div class="col-md-6">
								<label>ESTADO</label>
								<select type="text" class="form-control form-control-sm" name="estadoEM" id="estadoEM">
									<option disabled selected>ESTADO</option>
							  		<option value="JALISCO">JALISCO</option>
								</select>
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
		<header style="position: fixed">
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
						<a class="active" href="estaciones.php">
						<i class="fa fa-industry"></i><span>ESTACIONES</span>
						</a>
					</li>
					<li>
						<a href="administradores.php">
							<i class="fas fa-user-shield"></i><span>ADMINISTRADORES</span>
						</a>
					</li>
					<li>
						<a href="admin.clientes.php">
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
					<h1 style="color: white">ADMINISTRADOR PRINCIPAL</h1>
				</center>
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
	<script src="../assets/alertify/alertify.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});

		
	</script>
	<!--************************************************* VALIDACION ***********************************************-->
	<SCRIPT>
	//VALIDAR FORMULARIO AGREGAR NUEVA ESTACION
		$(document).ready(function(){
			$('#mainset').load('tabla.admin.estaciones.view.php');
			$('#btnAgregarEstacion').click(function(){
				if(validarFormVacio('frmAgrega') > 0){
					alertify.alert("Error","Debes llenar todos los campos");
					return false;
				}
				datos=$('#frmAgrega').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"consultas/agregarEstacion.php",
					success:function(r){
					if(r==1){
						$('#frmAgrega')[0].reset();
						$('#addmodal').modal('hide');
						$('#mainset').load('tabla.admin.estaciones.view.php');
						alertify.success("Agregado con exito :)");
					}
					else{
						alertify.error("No se pudo agregar: " + r);
					}
				}
				});
			});
		});

		//VALIDAR FORMULARIO ACTUALIZAR ESTACION
		$(document).ready(function(){
			$('#btnactualizar').click(function(){

				if(validarFormVacio('frmactualiza') > 0){
				alertify.alert("Error","Debes llenar todos los campos");
				return false;
			}
				datos=$('#frmactualiza').serialize();
				$.ajax({
				type:"POST",
				data:datos,
				url:"consultas/modificarEstacion.php",
				success:function(r){
					if(r==1){
						$('#frmactualiza')[0].reset();
						$('#updatemodal').modal('hide');
						$('#mainset').load('tabla.admin.estaciones.view.php');
						alertify.success("Modificado con exito");
					}
					else{
						alertify.error("No se pudo modificar");
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

		function obtenerDatos(numEstacion){
			$.ajax({
			type:"POST",
			data:"numEstacion=" + numEstacion,
			url:"consultas/obtenerEstacion.php",
			success:function(r){
				datos=jQuery.parseJSON(r);

				$('#idEM').val(datos['id']);
				$('#numEM').val(datos['num']);
				$('#nombreEM').val(datos['nombre']);
				$('#rfcEM').val(datos['rfc']);
				$('#estadoEM').val(datos['estado']);
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