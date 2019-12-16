<?php 
	session_start();
	if (!isset($_SESSION['a_loged']) || $_SESSION['a_loged'] == false || $_SESSION['a_nivelP'] != 1)
	{
		header("Location: ../logout.php");
	}
	require '../assets/database.php';
	require '../assets/funciones.php';
	$f = new Funciones();
	$contenidoComboboxADM = $f ->LlenarComboboxADM();
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
  <title>ADMINISTRADORES</title>
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
					<h5 class="modal-title" id="exampleModalLabel">NUEVO ADMINISTRADOR DE ESTACION</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgrega">
						<div class="col-md-6">
							<br>
							<label>NOMBRE</label>
							<input type="text" class="form-control form-control-sm" name="nombreADM" id="nombreADM">
							<label>RFC</label>
							<input type="text" class="form-control form-control-sm" name="rfcADM" id="rfcADM">
							<label>DOMICILIO</label>
							<input type="text" class="form-control form-control-sm" name="domicilioADM" id="domicilioADM">
							<label>CIUDAD</label>
							<input type="text" class="form-control form-control-sm" name="ciudadADM" id="ciudadADM">
							<label>ESTADO</label>
							<select type="text" class="form-control form-control-sm" name="estadoADM" id="estadoADM">
								<option disabled selected>ESTADO</option>
						  		<option value="JALISCO">JALISCO</option>
							</select>
						</div>
						<div class="col-md-6">
							<br>
							<label>TELEFONO</label>
							<input type="text" class="form-control form-control-sm" name="telefonoADM" id="telefonoADM">
							<label>ESTACION</label>
							<select class="form-control" name = "estacionADM" id = "estacionADM">
								<option disabled selected>Estacion</option>
								<?php echo $contenidoComboboxADM ?>
							</select>
							<label>NOMBRE DE USUARIO</label>
							<input type="text" class="form-control form-control-sm" name="usrADM" id="usrADM">
							<label>CONTRASEÑA</label>
							<input type="password" class="form-control form-control-sm" name="pswADM" id="pswADM">
							<label>CONFIRMAR CONTRASEÑA</label>
							<input type="password" class="form-control form-control-sm" name="pswcADM" id="pswcADM">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-primary" id="btnAgregarADM">Agregar</button>
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
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR INFORMACION DE ADMINISTRADOR</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmactualiza" autocomplete="off">
							<input type="text" hidden="" name="idADMM" id="idADMM">
							<div class="col-md-6">
								<br>
								<label>Nombre</label>
								<input type="text" class="form-control form-control-sm" name="nombreADMM" id="nombreADMM">
								<label>DOMICILIO</label>
								<input type="text" class="form-control form-control-sm" name="domicilioADMM" id="domicilioADMM">
								<label>CIUDAD</label>
								<input type="text" class="form-control form-control-sm" name="ciudadADMM" id="ciudadADMM">
								<label>ESTADO</label>
								<select type="text" class="form-control form-control-sm" name="estadoADMM" id="estadoADMM">
									<option disabled selected>ESTADO</option>
							  		<option value="JALISCO">JALISCO</option>
								</select>
								<label>TELEFONO</label>
								<input type="text" class="form-control form-control-sm" name="telefonoADMM" id="telefonoADMM">
							</div>
							<div class="col-md-6">
								<br>
								<label>ESTACION</label>
								<select class="form-control" name = "estacionADMM" id = "estacionADMM">
									<option disabled selected>Estacion</option>
									<?php echo $contenidoComboboxADM ?>
								</select>
								<label>NOMBRE DE USUARIO</label>
								<input type="text" class="form-control form-control-sm" name="usrADMM" id="usrADMM" autocomplete="off">
								<label>NUEVA CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswADMM" id="pswADMM">
								<label>CONFIRMAR CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswcADMM" id="pswcADMM">
								<br><br>
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
						<a class="active" href="administradores.php">
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

<SCRIPT>
	//VALIDAR FORMULARIO AGREGAR NUEVO ADM
		$(document).ready(function(){
			$('#mainset').load('tabla.admin.administradores.view.php');

			$('#btnAgregarADM').click(function(){
			if(validarFormVacio('frmAgrega') > 0){
				alertify.alert("Error","Debes llenar todos los campos");
				return false;
			}
			if (!validarClaves()){
				alertify.alert("Error","Las contraseñas no coinciden");
				return false;
			}
			datos=$('#frmAgrega').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"consultas/agregarADM.php",
				success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#mainset').load('tabla.admin.administradores.view.php');
					$('#addmodal').modal('hide');
					alertify.success("Agregado con exito :)");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
			});
			});
		});

		//VALIDAR FORMULARIO ACTUALIZAR ADM
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
					url:"consultas/modificarADM.php",
					success:function(r){
						if(r==1){

							$('#frmactualiza')[0].reset();
							$('#updatemodal').modal('hide');
							$('#mainset').load('tabla.admin.administradores.view.php');
							alertify.success("Actualizado con exito");
						}else{
						alertify.error("No se pudo actualizar");
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

		//VALIDAR CLAVES
		function validarClaves(){
			
			clave1 = document.getElementById("pswADM").value;
			clave2 = document.getElementById("pswcADM").value;
			if (clave1 == clave2)
			{
				return true;
			}
			else
				return false;
		}
	</SCRIPT>
	<!--************************************************* CRUD ***********************************************-->
	<SCRIPT>

		function obtenerDatos(usr){
			$.ajax({
			type:"POST",
			data:"usr=" + usr,
			url:"consultas/obtenerADM.php",
			success:function(r){
				datos=jQuery.parseJSON(r);

				$('#idADMM').val(datos['id']);
				$('#nombreADMM').val(datos['nombre']);
				$('#domicilioADMM').val(datos['domicilio']);
				$('#ciudadADMM').val(datos['ciudad']);
				$('#estadoADMM').val(datos['estado']);
				$('#telefonoADMM').val(datos['telefono']);
				$('#estacionADMM').val(datos['estacion']);
				//$('#usrADMM').val(datos['usr']);
			}
			});
		}

		function eliminarEstacion(){
		alertify.confirm('ELIMINAR ADMINISTRADOR DE ESTACION', '<CENTER>¿ESTA SEGURO DE BORRAR ESTE ADMINISTRADOR? <br><br> <FONT style="color:red;">SE PERDERAN TODOS LOS REGISTROS EN RELACION<FONT></CENTER>', 
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