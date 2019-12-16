<?php 
	session_start();
	if (!isset($_SESSION['adm_loged']) || $_SESSION['adm_loged'] == false || $_SESSION['adm_nivelP'] != 4)
	{
		header("Location: ../logout.php");
	}
	$idEstacion = $_SESSION['adm_idEstacion'];
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
  <title>DESPACHADORES</title>
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
					<h5 class="modal-title" id="exampleModalLabel">NUEVO DESPACHADOR</h5>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmAgregar">
							<div class="col-md-6">
								<br>
								<label>NOMBRE</label>
								<input type="text" class="form-control form-control-sm" name="nombreGAS" id="nombreGAS" maxlength="50">
								<label>DOMICILIO</label>
								<input type="text" class="form-control form-control-sm" name="domicilioGAS" id="domicilioGAS" maxlength="50">
								<label>CIUDAD</label>
								<input type="text" class="form-control form-control-sm" name="ciudadGAS" id="ciudadGAS" maxlength="30">
								<label>ESTADO</label>
								<select type="text" class="form-control form-control-sm" name="estadoGAS" id="estadoGAS">
									<option disabled selected>ESTADO</option>
							  		<option value="JALISCO">JALISCO</option>
								</select>
								<label>FOTOGRAFIA</label>
								<input type="file" class="form-control form-control-sm" name="fotoGAS" id="fotoGAS" accept="image/jpeg">
							</div>
							<div class="col-md-6">
								<br>
								<label>TELEFONO</label>
								<input type="text" class="form-control form-control-sm" name="telefonoGAS" id="telefonoGAS" maxlength="20">
								<label>NOMBRE DE USUARIO</label>
								<input type="text" class="form-control form-control-sm" name="usrGAS" id="usrGAS" maxlength="20">
								<label>CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswGAS" id="pswGAS" maxlength="10">
								<label>CONFIRMAR CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="pswcGAS" id="pswcGAS" maxlength="10">
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
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR DESPACHADOR</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form id="frmActualiza">
							<div class="col-md-6">
								<br>
								<input type="text" hidden="" name="idGASM" id="idGASM">
								<label>NOMBRE</label>
								<input type="text" class="form-control form-control-sm" name="nombreGASM" id="nombreGASM" maxlength="50">
								<label>DOMICILIO</label>
								<input type="text" class="form-control form-control-sm" name="domicilioGASM" id="domicilioGASM" maxlength="50">
								<label>CIUDAD</label>
								<input type="text" class="form-control form-control-sm" name="ciudadGASM" id="ciudadGASM" maxlength="30">
								<label>ESTADO</label>
								<select type="text" class="form-control form-control-sm" name="estadoGASM" id="estadoGASM">
									<option disabled selected>ESTADO</option>
							  		<option value="JALISCO">JALISCO</option>
								</select>
							</div>
							<div class="col-md-6">
								<br>
								<label>TELEFONO</label>
								<input type="text" class="form-control form-control-sm" name="telefonoGASM" id="telefonoGASM" maxlength="20">
								<label>NOMBRE DE USUARIO</label>
								<input type="text" class="form-control form-control-sm" name="usrGASM" id="usrGASM" maxlength="20">
								<label>NUEVA CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="passGASM" id="passGASM" maxlength="10">
								<label>CONFIRMAR CONTRASEÑA</label>
								<input type="password" class="form-control form-control-sm" name="passcGASM" id="passcGASM" maxlength="10">
								<br><br>
							</div>
							<div class="col-md-12">
								<label>FOTOGRAFIA</label>
								<input type="file" class="form-control form-control-sm" name="fotoGASM" id="fotoGASM" accept="image/jpeg">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-raised btn-warning" id="btnModificar">MODIFICAR</button>
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
						<a class="active" href="despachadores.php">
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

	<script></script>

<SCRIPT>
	//VALIDAR FORMULARIO AGREGAR NUEVA ESTACION
		$(document).ready(function(){
			$('#mainset').load('tabla.admine.gasolineros.php');
			$('#btnAgregarg').click(function(){
				
				if(validarFormVacio('frmAgregar') > 0){
					alertify.alert("Error","Debes llenar todos los campos");
					return false;
				}
				if (!validarClaves()){
					alertify.alert("Error","Las contraseñas no coinciden");
					return false;
				}
				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('nombreGAS', $('#nombreGAS').prop('value'));
				paqueteDeDatos.append('domicilioGAS', $('#domicilioGAS').prop('value'));
				paqueteDeDatos.append('ciudadGAS', $('#ciudadGAS').prop('value'));
				paqueteDeDatos.append('estadoGAS', $('#estadoGAS').prop('value'))
				paqueteDeDatos.append('telefonoGAS', $('#telefonoGAS').prop('value'));
				paqueteDeDatos.append('usrGAS', $('#usrGAS').prop('value'));
				paqueteDeDatos.append('pswGAS', $('#pswGAS').prop('value'));
				paqueteDeDatos.append('pswcGAS', $('#pswcGAS').prop('value'));
				paqueteDeDatos.append('fotoGAS', $('#fotoGAS')[0].files[0]);

				$.ajax({
						url: 'consultas/agregarDespachador.php',
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
					success:function(r){
						if(r==1){
							$('#mainset').load('tabla.admine.gasolineros.php');
							$('#addmodal').modal('hide');
							$('#frmAgregar')[0].reset();
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
			$('#btnModificar').click(function(){
				if(validarFormVacio('frmActualiza') > 0){
					alertify.alert("Error","Debes llenar todos los campos");
					return false;
				}
				if (!validarClavesModificar()){
					alertify.alert("Error","Las contraseñas no coinciden");
					return false;
				}

				var data = new FormData();

				data.append('idGAS', $('#idGASM').prop('value'));
				data.append('nombreGAS', $('#nombreGASM').prop('value'));
				data.append('domicilioGAS', $('#domicilioGASM').prop('value'));
				data.append('ciudadGAS', $('#ciudadGASM').prop('value'));
				data.append('estadoGAS', $('#estadoGASM').prop('value'))
				data.append('telefonoGAS', $('#telefonoGASM').prop('value'));
				data.append('usrGAS', $('#usrGASM').prop('value'));
				data.append('pswGAS', $('#pswGASM').prop('value'));
				data.append('pswcGAS', $('#pswcGASM').prop('value'));
				data.append('foto', $('#fotoGASM')[0].files[0]);

				//data=$('#frmActualiza').serialize();
				$.ajax({
					url: 'consultas/modificarDespachador.php',
					type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
					contentType: false,
					data: data, // Al atributo data se le asigna el objeto FormData.
					processData: false,
					cache: false, 
					success:function(r){
						if(r==1){
							$('#mainset').load('tabla.admine.gasolineros.php');
							$('#updatemodal').modal('hide');
							$('#frmActualiza')[0].reset();
							alertify.success("El usuario se ha actualizado con exito");
						}
						else{
							alertify.error("No se pudo actualizar " + r);
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
			clave1 = document.getElementById("pswGAS").value;
			clave2 = document.getElementById("pswcGAS").value;
			if (clave1 == clave2)
			{
				return true;
			}
			else
				return false;
		}
		function validarClavesModificar(){
			clave1 = document.getElementById("passGASM").value;
			clave2 = document.getElementById("passcGASM").value;
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
			url:"consultas/obtenerDespachador.php",
			success:function(r){
				datos=jQuery.parseJSON(r);

				$('#idGASM').val(datos['idGas']);
				$('#nombreGASM').val(datos['nombre']);
				$('#domicilioGASM').val(datos['domicilio']);
				$('#ciudadGASM').val(datos['ciudad']);
				$('#estadoGASM').val(datos['estado']);
				$('#telefonoGASM').val(datos['telefono']);
				$('#usrGASM').val(datos['usr']);
			}
			});
		}

		function eliminarDespachador(usr){
		alertify.confirm('BAJA DESPACHADOR', '<CENTER>¿ESTA SEGURO DE BORRAR EL DESPACHADOR? <br><br> <FONT style="color:red;">SE PERDERAN TODOS LOS REGISTROS EN RELACION<FONT></CENTER>', 
				function(){ 
					$.ajax({
						type:"POST",
						data:"usr=" + usr,
						url:"consultas/borrarDespachador.php",
						success:function(r){
							if(r==1){     
								$('#mainset').load('tabla.admine.gasolineros.php');
								alertify.success("El despachador ha sido eliminado con exito");
							}else{
								alertify.error("No se pudo eliminar");
							}
						}
					});
				}
				,function(){ 
					alertify.error('OPERACION CANCELADA')
				});
		}
	</SCRIPT>

	<SCRIPT>
		function GenerarGAFETE(usr){
			$.ajax({
                     type:"POST",
                      data:"usuario=" + usr,
                      url:"gafete/generarGafete.php",
                      success:function(r){
                          if(r==1){    
                              window.open("admine.gafete.view.php","_blank");
                          }else{
                               alert("Error al exportar PDF"+r);
                          }
                      }
                  });
		}

	</SCRIPT>
</body>
</html>