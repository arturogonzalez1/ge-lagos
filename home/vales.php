<?php
    session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: logout.php");
	}
	require 'assets/database.php';
	require 'assets/funciones.php';
	
	$f = new Funciones();

	$idU = $_SESSION['c_user_id'];
	$saldo = $f ->ConsultarSaldo($idU);

	//Datos del Vehiculo
	$contenidoCombobox = $f ->LlenarComboboxVehiculo($idU);
	$datosVehiculo = $f -> VerDatosVehiculo($idU);
	$numVale = ($f -> noVale($idU))+1;

	$qrcode = "";

	if (isset($_POST['txtVPlacaAutorizada']) && isset($_POST['txtVChoferAutorizado']) && isset($_POST['txtVTipoCombustible']))
	{
		//$_SESSION['numVale'] = "";

		if ($_POST['txtVPlacaAutorizada'] != "NA" && $_POST['txtVChoferAutorizado'] != "NA" && $_POST['txtVTipoCombustible'] != "NA") 
		{  
			$p = $_POST['txtVPlacaAutorizada'];
			$tipoCombustible = $_POST['txtVTipoCombustible'];
			//POR LITROS
			if ($_POST['txtVPorLitros'] != "NA" && $_POST['txtVPorImporte'] == "NA" && $tipoCombustible != "LUBRICANTE")
			{
				$chofer = $_POST['txtVChoferAutorizado'];
				$litros = $_POST['txtVPorLitros'];
				

				$query = "CALL p_VALE('$chofer', $litros, 0, '$p', $idU, '$tipoCombustible')";
				$consult = mysqli_query($conn, $query);

				if ($consult)
				{
					//echo '<script language="javascript">window.open("view_pdf.php","_blank");</script>'; 
					$messsage = "Vale creado correctamente";
					header("Location: vales.php");
				}
				else
					$message = "Error al crear el vale";
			}
			//POR IMPORTE
			if ($_POST['txtVPorLitros'] == "NA" && $_POST['txtVPorImporte'] != "NA" || $tipoCombustible == "LUBRICANTE")
			{
				$chofer = $_POST['txtVChoferAutorizado'];
				$importe = $_POST['txtVPorImporte'];

				$query = "CALL p_VALE('$chofer', 0, $importe, '$p', $idU, '$tipoCombustible')";
				$consult = mysqli_query($conn, $query);
				if ($consult)
				{
					//echo '<script language="javascript">window.open("view_pdf.php","_blank");</script>'; 
					$message = "Vale creado correctamente";
					header("Location: vales.php");
				}
				else
					$message = "Error al crear el vale";
			}
			if ($_POST['txtVPorLitros'] == "NA" && $_POST['txtVPorImporte'] == "NA")
			{
				$message = "Ingrese solo litros o importe. Lubricante solo por importe";
			}
			else
				$message = "Lubricante solo por importe";
		}
		else
		{
			echo '<script language="javascript">alert("LLENE TODOS LOS CAMPOS DE TEXTO");</script>'; 
		}
		unset($_POST['btnEnviar']);
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
  <title>AUTORIZACION DE VALES</title>
  	<link rel="icon" type="image/png" href="images/favicon.png"/>
  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/light-blue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/alertify/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="assets/alertify/css/alertify.css">
	
</head>

<body>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">NUEVO VALE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="col-md-6">
							<br>
							<form id="frmAgrega">
								<select class="form-control" name = "txtfkVehiculo" id = "slcVehiculo" onchange="ImagenV()">
									<option disabled selected>Placa Vehiculo</option>
									<?php echo $contenidoCombobox ?>
								</select>
								<select class="form-control" id = "slcTipoCombustible" onchange="ControlPorTipoCombustible()">
									<option disabled selected name="slcTipo">Tipo de Combustible</option>
									<option value="DIESEL">DIESEL</option>
									<option value="MAGNA">MAGNA</option>
									<option value="PREMIUM">PREMIUM</option>
									<option value="LUBRICANTE">LUBRICANTE</option>
								</select>
								<select class="form-control" id = "slcTipoCons" onchange="ControlPorTipoConsumo()">
									<option disabled selected name="slcTipoCons">Tipo de consumo</option>
									<option value="Litros">Por Litros</option>
									<option value="Importe">Por Importe</option>
								</select>
								<input type="text" name="txtLitros" class="form-control" placeholder="Litros" disabled="" id="txtLitros">
								<input type="text" name="txtImporte" class="form-control" placeholder="Importe" disabled="" id="txtImporte">
								<input type="text" name="txtChofer" class="form-control" placeholder="Operador Autorizado" id="txtChofer" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</form>
						</div>
						<div class="col-md-6">
							<font color="black" style="text-align: center;"><H3 id = "lblPlaca">PLACA</H3></font>
							<br>
							<center>
								<img id="imgFotoVehiculo" width="0" height="0" class="img" style="visibility: hidden;">
							</center>
							<br>
							<br>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-raised btn-success" id="btnAgregarVale">Autorizar Vale</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* agregar datosmodal ***********************************************-->
	<!--************************************************* autorizar modal ***********************************************-->
	<div class="modal fade" id="autorizarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		
				<h5 class="modal-title" id="exampleModalLabel">VISTA PREVIA VALE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<br>
								<center>
									<img src="images/prueba.png">
								</center>
							</div>
							<div class="col-md-6">
								<center>
									<br><br>
									<img src="../images/icons/logo1.jpg">
									<br><br><br>
								</center>				
							</div>
						</div>
						<form id="frmAutoriza">
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>NUMERO DE VALE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVNoVale" id="lblNoVale" value='<?php echo $numVale ?>' style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>FECHA Y HORA</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVFechaHora" id="lblFechaHora" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>PLACA AUTORIZADA</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPlacaAutorizada" id="lblPlacaAutorizada" style="border:0" value="" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>OPERADOR</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVChoferAutorizado" id="lblChoferAutorizado" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>CARGA DE COMBUSTIBLE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVTipoCombustible" id="lblTipoCombustible" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>LITROS</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPorLitros"  id="lblPorLitros" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="text-align: right;">
									<label>IMPORTE</label>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<input type="text" name="txtVPorImporte" id="lblPorImporte" value="" style="border:0" readonly="" size="10">
								</div>
							</div>
							<div class="row">
								<br><br>
								<center>
									<span class="btn btn-success" name="btnEnviar" id="btnEnviar">ACEPTAR Y ENVIAR</span>
								</center>
							</div>
						</form>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" id="btnBorrar" name="btnBorrar">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!--************************************************* autorizar modal ***********************************************-->
	<!--************************************************* updatemodal ***********************************************-->
	<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
		
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR VEHICULO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<form id="frmactualiza">
						<label>PLACA</label>
						<input type="text" class="form-control form-control-sm" name="placaVM" id="placaVM">
						<label>MARCA</label>
						<input type="text" class="form-control form-control-sm" name="marcaVM" id="marcaVM">
						<label>MODELO</label>
						<input type="text" class="form-control form-control-sm" name="modeloVM" id="modeloVM">
						<label>UNIDAD</label>
						<input type="text" class="form-control form-control-sm" name="unidadVM" id="unidadVM">
						<label>MOTOR</label>
						<input type="text" class="form-control form-control-sm" name="motorVM" id="motorVM">
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
					<a class="active" href="vales.php">
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
	<!-- container 
	================================================== -->
	<div id="container-fluid">
		<!-- content
		================================================== -->
		<div id="content">
			<div class="col-md-12" style="background-color: #343A46 ">
				<center>
					<h1 style="color: white">
					<?php echo $_SESSION['c_name_cliente'] ?><BR><font size="5">  SALDO DISPONIBLE  <?php echo $saldo ?></font>
					</h1>
				</center>
	   		</div>
			<!-- Col 2 -->
			<div id="mainset"></div>
			<!-- Col 2 -->
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
	<script src="assets/alertify/alertify.js"></script>

	<script type="text/javascript">
		//Magnific Popup
	    $('.show-image').magnificPopup({type: 'image'});
	</script>

	<script>
		//CUANDO SE CARGA EL DOCUMENTO
		$(document).ready(function(){
			//CARGAR LA TABLA DE VALES VIGENTES
			$('#mainset').load('tabla.cliente.vales.view.php');

			$('#btnAgregarVale').click(function(){
				if(validarFormVacio('frmAgrega') > 0){
					alertify.alert("Error","Debes llenar todos los campos.");
					return false;
				}
				GenerarVale();
				$('#autorizarmodal').modal();
			});

			$('#btnEnviar').click(function(){
				datos = $('#frmAutoriza').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"php/agregarVale.php",
					success:function(r){
						if(r==1){
							$('#addmodal').modal('hide');
							$('#autorizarmodal').modal('hide');
							$('#frmAgrega')[0].reset();
							$('#frmAutoriza')[0].reset();
							$('#mainset').load('tabla.cliente.vales.view.php');
							alertify.success("Vale autorizado.");
						}
						else if (r==2){
							alertify.error("Vehiculo no corresponde al cliente.");
						}
						else if (r==3){
							alertify.error("Saldo Insuficiente para autorizar el vale.");
						}
						else if (r==4){
							alertify.error("No se pudo autorizar. Su cuenta no esta activa.");
						}
						else{
							alertify.error("No se pudo autorizar.");
						}
					}
				});
			});
			$('#btnBorrar').click(function(){
				$('#frmDatosVale')[0].reset();
				$('#autorizarmodal').modal('hide');
				$('#frmAgrega')[0].reset();
				$('#addmodal').modal('hide');
			});
		});
		//VALIDAR FORMULARIOS VACIOS
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

		//CONTROLAR TEXT INPUTS
		function ControlPorTipoConsumo()
		{
			var litros = document.getElementById("txtLitros");
			var importe = document.getElementById("txtImporte");
			var combobox = document.getElementById("slcTipoCons");

			if (combobox.value == "Litros")
			{
				importe.value = "";litros.disabled = false;
				importe.disabled = true;
			}
			if (combobox.value == "Importe")
			{
				litros.disabled = true;
				litros.value = "";importe.disabled = false;
			}
		}
		function ControlPorTipoCombustible(){
			var litros = document.getElementById("txtLitros");
			var importe = document.getElementById("txtImporte");
			var comboboxTipoCombustible = document.getElementById("slcTipoCombustible");
			var comboboxTipoConsumo = document.getElementById("slcTipoCons");

			if (comboboxTipoCombustible.value == "LUBRICANTE")
			{
				comboboxTipoConsumo.disabled = true;
				litros.value = "";litros.disabled = true;
				importe.disabled = false; 
			}
			else
			{
				comboboxTipoConsumo.disabled = false;
				if (comboboxTipoConsumo.value == "Litros")
				{
					importe.value = "";litros.disabled = false; 
					importe.disabled = true;
				}
				if (comboboxTipoConsumo.value == "Importe")
				{
					litros.disabled = true;
					litros.value = "";importe.disabled = false; 
				}
			}
		}
		//MOSTRAR IMAGEN VEHICULO
		function ImagenV()
		{
			var combobox = document.getElementById("slcVehiculo"); 
			var placa = combobox.options[combobox.selectedIndex].text;
			var fvehiculo = document.getElementById("imgFotoVehiculo");
			var numplaca = document.getElementById("lblPlaca");
			fvehiculo.src = "images/imgVeh/"+placa+".jpg";
			fvehiculo.style.visibility = "visible";
			fvehiculo.width = 240;
  			fvehiculo.height = 150;
			numplaca.innerHTML = placa;
		}
		function GenerarVale()
		{
			var comboboxPlaca = document.getElementById("slcVehiculo"); 
			var placa = comboboxPlaca.options[comboboxPlaca.selectedIndex].text;

			var comboboxTipoComb = document.getElementById("slcTipoCombustible");
			var tipoComb = comboboxTipoComb.options[comboboxTipoComb.selectedIndex].text;

			var comboboxTipoCons = document.getElementById("slcTipoCons").value;

			var choferAutorizado = document.getElementById("txtChofer").value;
			var litros = document.getElementById("txtLitros").value;
			var importe = document.getElementById("txtImporte").value;

			var lblPlacaA = document.getElementById("lblPlacaAutorizada");
			var lblTipoComb  = document.getElementById("lblTipoCombustible");
			var lblFechaHora = document.getElementById("lblFechaHora");
			var lblChoferAutorizado = document.getElementById("lblChoferAutorizado");
			var lblPorLitros = document.getElementById("lblPorLitros");
			var lblPorImporte = document.getElementById("lblPorImporte");

			if (placa != "Placa Vehiculo" && tipoComb != "Tipo de Combustible" && choferAutorizado != "")
			{
				if (comboboxTipoCons == "Litros")
				{
					lblPorLitros.value = litros;
					lblPorImporte.value = "NA";
				}
				else if (comboboxTipoCons == "Importe")
				{
					lblPorImporte.value = importe;
					lblPorLitros.value = "NA"
				}
				else if (comboboxTipoCons == "Tipo de consumo")
				{
					lblPorImporte.value = importe;
					lblPorLitros.value = "NA"
				}
				lblPlacaA.value = placa;
				lblTipoComb.value = tipoComb;
				lblChoferAutorizado.value = choferAutorizado;
				var fecha = new Date();
				lblFechaHora.value = fecha.getDate()+"/"+fecha.getMonth()+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes();
			}
			else alertify.error("VERIFIQUE QUE TODOS LOS CAMPOS ESTEN LLENOS")
		}

		function ConfirmarVale()
		{
			var lblPlacaA = document.getElementById("lblPlacaAutorizada").value;
			var lblTipoC  = document.getElementById("lblTipoCombustible").value;
			var lblChoferA = document.getElementById("lblChoferAutorizado").value;
			var lblPorL = document.getElementById("lblPorLitros").value;
			var lblPorI = document.getElementById("lblPorImporte").value;

			if (lblPlacaA != "" && lblTipoC != "" && lblChoferA != "")
			{
				
				if (lblPorL != "" || lblPorI != "")
				{
					alertify.confirm('AUTORIZACION DE VALE', '¿DESEA AUTORIZAR EL VALE?', 
					function(){ 
						document.frmDatosVale.submit()
					}
					,function(){ 
					});
				}
				else
				{
					alert("ERROR AL AUTORIZAR VALE LITROS O IMPORTE");
				}
			}
			else
			{
				alertify.error("NO HA AUTORIZADO EL VALE")
			}
		}
		function exportar(numVale)
		{
                  $.ajax({
                     type:"POST",
                      data:"numVale=" + numVale,
                      url:"php/exportar_pdf.php",
                      success:function(r){
                          if(r==1){     
                              window.open("view_pdf.php","_blank");
                          }else{
                               alertify.error("Error al exportar PDF");
                          }
                      }
                  });

		}
		function cancelar(numVale)
		{
			alertify.confirm('Cancelar Vale', '¿Desea cancelar el vale?', 
              function(){ 
                  $.ajax({
                     type:"POST",
                      data:"numVale=" + numVale,
                      url:"php/cancelar.php",
                      success:function(r){
                          if(r==1){     
                              window.location="vales.php";
                              alertify.success("EL VALE SE HA CANCELADO");
                          }else{
                               alertify.error("NO SE PUDO CANCELAR EL VALE");
                          }
                      }
                  });
              }
              ,function(){ 
                alertify.error('Operacion Cancelada')
              });
		}	
		function EnviarWhatsapp(){
			window.open("https://web.whatsapp.com/", "_blank");
		}
	</script>
</body>
</html>