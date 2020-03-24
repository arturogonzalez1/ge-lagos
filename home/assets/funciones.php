<?php 
	class Funciones
	{
		function ConsultarSaldo($id)
		{
			require 'database.php';
			$query = "CALL v_versaldo($id)";
			$consult = mysqli_query($conn, $query);
			$array = mysqli_fetch_array($consult);
			return $array['cantidad'];
		}
		function LlenarComboboxVehiculo($id)
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL V_PLACA($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['idV']."'>".$ver['placa']."</option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function LlenarAnios($id)
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL v_ANIOS($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['Anios']."'>".$ver['Anios']."</option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function LlenarMeses($id)
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL v_MESES($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['Meses']."'>".$ver['Meses']."</option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function LlenarAniosEC($id)
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL v_ANIOS_EC($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['Anios']."'>".$ver['Anios']."</option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function TotalRegEstadoCuenta($idusuario) {
			require 'bd.php';
			$bd_conn = new Conexion();
			$query = "CALL v_REG_ESTADOCUENTA($idusuario);";
			$result = $bd_conn->EjecutarConsulta($query);
			if (is_array($result)) {
				return $result[0];
			}
		}
		function LlenarMesesEC($id, $anio)
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL v_MESES_EC($id, $anio)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$contenido .= '<select class="form-control" name = "selectMes" id = "selectMes">';
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['Meses']."'>".$ver['Meses']."</option>";
				}	
				$contenido .= '</select>';
			}
			else return 0;

			return $contenido;
		}
		function LlenarComboboxADM()
		{
			require 'database.php'; 
			$contenido = "";
			$query = "CALL v_ESTACIONES_ADM()";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option value='".$ver['idEstacion']."'>".$ver['estacion']."</option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function VerDatosCliente($idcliente)
		{
			require 'database.php';
			$query = "CALL v_DATOS_CLIENTE($idcliente)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$ver = mysqli_fetch_array($consult);
			}
				return $ver;
		}
		function Cliente()
		{
			require 'database.php'; 
			$contenido = "";
			$query = "call v_NOMBRECLIENTE();";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				while($ver=mysqli_fetch_array($consult))
				{
					$contenido = $contenido."<option data-value='".$ver['idCliente']."' value='".$ver['nombre']."'></option>";
				}	
			}
			else return 0;

			return $contenido;
		}
		function TotalParaPagar($idcliente, $idestacion, $finicial, $ffinal) {
			require 'bd.php';
			$bd_conn = new Conexion();
			$query = "CALL v_TOTAL_TO_PAY($idcliente, $idestacion, '$finicial', '$ffinal')";
			$result = $bd_conn->EjecutarConsulta($query);
			if (is_array($result)) {
				return $result[0];
			}
			else return false;
		}
		function TotalFactura($folio) {
			require 'bd.php';
			$bd_conn = new Conexion();
			$query = "CALL v_TOTAL_FACTURA('$folio')";
			$result = $bd_conn->EjecutarConsulta($query);
			if (is_array($result)) {
				return $result[0];
			}
			else return false;
		}
		function VerDatosVehiculo($id)
		{
			require 'database.php';
			$query = "CALL v_datosVehiculo($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$contenido = array();
				$i = 0;
				while($datos=mysqli_fetch_array($consult))
				{
					$contenido[$i][0] = $datos['unidad'];
					$contenido[$i][1] = $datos['motor'];
					$i++;
				}	
				return $contenido;
			}
			else return 0;
		}
		function idVale()
		{
			require 'database.php';
			$contenido = "";
			$query = "CALL p_IDVALE()";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$datos=mysqli_fetch_array($consult);
				$contenido = $datos['MAX(idVale)'];
				return $contenido;
			}
			else return 0;
		}
		function noVale($id)
		{
			require 'database.php';
			$query = "CALL p_NOVALE($id)";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$contenido = "";
				$datos=mysqli_fetch_array($consult);
				$contenido = $datos['MAX(numVale)'];
				return $contenido;
			}
			else return 0;
		}
		function GenerarQR($c)
		{
			require "phpqrcode/qrlib.php";    
			$dir = 'temp/';
			if (!file_exists($dir))
		        mkdir($dir);
			$filename = $dir.'qr.png';
			
			$tamaño = 4; //Tamaño de Pixel
			$level = 'M'; //Precisión Maxima
			$framSize = 2; //Tamaño en blanco
			$contenido = $c; //Texto
		        //Enviamos los parametros a la Función para generar código QR 
			QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
		        //Mostramos la imagen generada
			return '<img width="120" height="120" src="'.$dir.basename($filename).'" />';
		}
 
    	function encrypt ($string) //FUNCION PARA ENCRIPTAR EL CONTENIDO DEL CODIGO GR
    	{
    		$key = 'd43m0nt00l5';
    		$result = '';
	   		for($i=0; $i<strlen($string); $i++)
	   		{
	      		$char = substr($string, $i, 1);
	      	$keychar = substr($key, ($i % strlen($key))-1, 1);
	      	$char = chr(ord($char)+ord($keychar));
	      	$result.=$char;
   			}
   			return base64_encode($result);
    	}
 
    	function decrypt ($string) //FUNCION PARA DESENCRIPTAR EL CONTENIDO DEL CODIGO QR
    	{
    		$key = 'd43m0nt00l5';
    		$result = '';
	   		$string = base64_decode($string);
	   		for($i=0; $i<strlen($string); $i++)
	   		{
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)-ord($keychar));
				$result.=$char;
	   		}
	   		return $result;
	    }
	    function ValesFiltro($usuario, $tipo, $filtro)
	    {
	    	$sql="CALL v_VALES_FILTRO($usuario, $tipo, '$filtro');";
	    	$result=mysqli_query($conn,$sql);
	    	return $result;
	    }
	    function VerEstadoCliente($idUsuario){
	    	require 'database.php';
			$query = "CALL v_ESTADO_CLIENTE('$idUsuario')";
			$consult = mysqli_query($conn, $query);
			if ($consult)
			{
				$ver = mysqli_fetch_array($consult);
			}
				return $ver;
	    }
	}
 ?>