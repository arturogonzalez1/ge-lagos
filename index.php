<?php
	$datos = "";
	session_start();
	$_SESSION['loged'] = false;
	if ($_SESSION['loged'] == true) 
	{
		header('Location: home/home.php');    
  	}
  	require 'home/assets/database.php';
  	if (!empty($_POST['usr']) && !empty($_POST['psw'])) 
  	{    
		$usr = $_POST['usr']; $psw = $_POST['psw'];
		
	    $query = "CALL p_LOGIN_USER('$usr', '$psw');";
	    $consul = mysqli_query($conn, $query);
	    if ($consul)
	    {
		    $results = mysqli_fetch_array($consul);
		    $message = '';  
		    if (!isset($results['USUARIO NO EXISTE']))
			{
				if ($results["nivelPriv"] == 1)
				{
					$_SESSION['a_user_id'] = $results["idUsuario"];
					$_SESSION['a_name_cliente'] = $results["nombreUsuario"];
					$_SESSION['a_nivelP'] = $results["nivelPriv"];
					$_SESSION['a_loged'] = true;
					header("Location: home/admin/home_admin.php");
				}
				if ($results["nivelPriv"] == 2)
				{
					$_SESSION['c_user_id'] = $results["idUsuario"];
					$_SESSION['c_name_user'] = $results["paCliente"];
					$_SESSION['c_name_cliente'] = $results["nombreUsuario"];
					$_SESSION['c_nivelP'] = $results["nivelPriv"];
					$_SESSION['c_loged'] = true;
					header("Location: home/home.php");
					#echo '<script>location.href="partials/header.php;</script>';
				}
				if ($results["nivelPriv"] == 4)
				{
					$_SESSION['adm_user_id'] = $results["idUsuario"];
					$_SESSION['adm_name_user'] = $results["nombreUsuario"];
					$_SESSION['adm_usr'] = $results['usr'];
					$_SESSION['adm_nivelP'] = $results["nivelPriv"];
					$_SESSION['adm_idEstacion'] = $results["idEstacion"];
					$_SESSION['adm_loged'] = true;
					$_SESSION['adm_name_estacion'] = $results['estacion'];
					header("Location: home/adming/homeAG.php");
				}
			}
			else
				$datos = "No se han encontrado coincidencias";
		}
  	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GASOLINERAS EFICIENTES</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="index.php" method="POST">
					<span class="login100-form-title p-b-34">
                    <img src="images/icons/logo1.jpg" alt="Login">
						<br><br>
                        Ingreso de Usuarios
					</span>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input class="input100" type="text" name="usr" placeholder="Usuario" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="psw" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<a  class="txt3">
							Iniciar Sesión
						</button>
					</div>

					<div class="w-full text-center" style="color:#FF0000">
							<?php echo $datos; ?>
						</a>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							¿Olvidaste tu contraseña?
						</span>

						<a href="#" class="txt2">
							 Recuperala aquí
						</a>
					</div>

					<div class="w-full text-center">
							Crear Cuenta
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-02.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>