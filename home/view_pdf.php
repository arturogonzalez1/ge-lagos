<?php 
	session_start();
	if (!isset($_SESSION['c_loged']) || $_SESSION['c_loged'] == false || $_SESSION['c_nivelP'] != 2)
	{
		header("Location: ../index.php");
	}
	else
	{
		ob_start();

		require 'assets/tcpdf/tcpdf.php';
		require 'assets/funciones.php';
		require 'assets/database.php';

		$idU = $_SESSION['c_user_id'];
		$personaAutorizada = $_SESSION['c_name_user'];
		$nombreCliente = $_SESSION['c_name_cliente'];

		$f = new Funciones();

		$consumo = "";
		$valorConsumo = "";

		if ($_SESSION['c_numVale'] != "")
		{
			$numVale = $_SESSION['c_numVale'];
			$sql="CALL v_VALE_IMPRESION_NUMVALE($idU, '$numVale')";
		}
		//CONSULTA DE LA INFORMACION DEL VALE EN LA BD

		$result=mysqli_query($conn,$sql);
		if ($result)
		{
			$datos=mysqli_fetch_array($result);
			$qrcode = $f ->GenerarQR($datos[10]);;
			$tipoCombustible = $datos[9];
			if ($datos[5] == "" || $datos[5] == "0.000")
			{
				$consumo = "IMPORTE";
				$valorConsumo = $datos[6];
			}
			if ($datos[6] == "" || $datos[6] == "$0.00")
			{
				$consumo = "LITROS";
				$valorConsumo = $datos[5];
			}
			$pdf = new TCPDF('P','mm','A4');

			$pdf->setPrintHeader(false); 
			$pdf->setPrintFooter(false);

			$pdf->SetAutoPageBreak(true, 20); 
			$pdf->SetFont('Helvetica', '', 10);

			$pdf -> AddPage();

			$content = '';
			$content .= '
<table cellspacing="0" cellpadding="5" border="0" >
			  	<tr>
					<td width="120">
						<img style=" margin:10px;" src="images/logo1.jpg" width="70" height="50">
					</td>
				    <td width="239" style="text-align: center;"><h4>GASOLINERAS EFICIENTES PLAZA VICTORIA S/N LAGOS DE MORENO JALISCO<br>7422091 - 7427275 - 7423185</h4></td>
				    <td rowspan="3"><h4 style="background-color: black; color: white; text-align: center">ESTACIONES AUTORIZADAS</h4>
		    			<h5>SERVICIOS VICTORIA SA DE CV CENTRO PLAZA VICTORIA SN COL CENTRO LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIOS VICTORIA SA DE CV PUENTE LIBRAMIENTO NORTE KM 2 LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>GRUPO GASOLINERO LAGOS SA DE CV LIBRAMIENTO NORTE KM 2 LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIO CAPUCHINAS SA DE CV BLVD FELIX RAMIREZ RENTERIA No PLAZA CAPUCHINAS LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIO EL REFUGIO DE LAGOS SA DE CV MARGARITO GONZALEZ RUBIO No 1074 LAGOS DE MORENO JALISCO MEXICO</h5>
				    </td>
			  	</tr>
			  	<tr style="background-color: black; color: white">
			    	<td colspan="2"><h4>VALE EXPEDIDO PARA EL VEHICULO '.$datos[3].' CON NUMERO DE UNIDAD '.$datos[4].' Y PLACA NO '.$datos[2].'</h4>
			    	</td>
			  	</tr>
			  	<tr>
				    <td width="120"><br><br><br>';
		    		
		    		$content .= $qrcode.'  
				    </td>
				    <td width="239"><h4>NUMERO DE VALE: '.$datos[0].'</h4>
			    		<h4>FECHA Y HORA: '.$datos[1].'</h4>
			    		<h4 style="background-color: black; color: white" align="center">CLIENTE</h4>
		    			<h4 align="center">'.$nombreCliente.'</h4>
		    			<h4 style="background-color: black; color: white" align="center">OPERADOR AUTORIZADO</h4>
		    			<h4 align="center">'.$datos[7].'</h4>
		    			<h4 style="background-color: black; color: white" align="center">CONCEPTO</h4>
		    			<h4 align="center">'.$tipoCombustible.'</h4>
		    			<h4 style="background-color: black; color: white" align="center">'.$consumo.'</h4>
		    			<h4 align="center">'.$valorConsumo.'</h4>
				    </td>
			  	</tr>
			  	<tr>
				    <td ><h4 style="background-color: black; color: white; text-align: center">ORIGINAL</h4></td>
				    <td colspan="2"><p align="center"><br>_______________________________________<br>FIRMA DE AUTORIZACION<br>'.$personaAutorizada.'</p></td>
			  	</tr>
			</table>
			<br><br>
			<table cellspacing="0" cellpadding="5" border="0" >
			  	<tr>
					<td width="120">
						<img style=" margin:10px;" src="images/logo1.jpg" width="70" height="50">
					</td>
				    <td width="239" style="text-align: center;"><h4>GASOLINERAS EFICIENTES PLAZA VICTORIA S/N LAGOS DE MORENO JALISCO<br>7422091 - 7427275 - 7423185</h4></td>
				    <td rowspan="3"><h4 style="background-color: black; color: white; text-align: center">ESTACIONES AUTORIZADAS</h4>
		    			<h5>SERVICIOS VICTORIA SA DE CV CENTRO PLAZA VICTORIA SN COL CENTRO LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIOS VICTORIA SA DE CV PUENTE LIBRAMIENTO NORTE KM 2 LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>GRUPO GASOLINERO LAGOS SA DE CV LIBRAMIENTO NORTE KM 2 LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIO CAPUCHINAS SA DE CV BLVD FELIX RAMIREZ RENTERIA No PLAZA CAPUCHINAS LAGOS DE MORENO JALISCO MEXICO</h5>
		    			<br>
		    			<h5>SERVICIO EL REFUGIO DE LAGOS SA DE CV MARGARITO GONZALEZ RUBIO No 1074 LAGOS DE MORENO JALISCO MEXICO</h5>
				    </td>
			  	</tr>
			  	<tr style="background-color: black; color: white">
			    	<td colspan="2"><h4>VALE EXPEDIDO PARA EL VEHICULO '.$datos[3].' CON NUMERO DE UNIDAD '.$datos[4].' Y PLACA NO '.$datos[2].'</h4>
			    	</td>
			  	</tr>
			  	<tr>
				    <td width="120"><br><br><br>';
		    		
		    		$content .= $qrcode.'  
				    </td>
				    <td width="239"><h4>NUMERO DE VALE: '.$datos[0].'</h4>
			    		<h4>FECHA Y HORA: '.$datos[1].'</h4>
			    		<h4 style="background-color: black; color: white" align="center">CLIENTE</h4>
		    			<h4 align="center">'.$nombreCliente.'</h4>
		    			<h4 style="background-color: black; color: white" align="center">OPERADOR AUTORIZADO</h4>
		    			<h4 align="center">'.$datos[7].'</h4>
		    			<h4 style="background-color: black; color: white" align="center">CONCEPTO</h4>
		    			<h4 align="center">'.$tipoCombustible.'</h4>
		    			<h4 style="background-color: black; color: white" align="center">'.$consumo.'</h4>
		    			<h4 align="center">'.$valorConsumo.'</h4>
				    </td>
			  	</tr>
			  	<tr>
				    <td ><h4 style="background-color: black; color: white; text-align: center">COPIA</h4></td>
				    <td colspan="2"><p align="center"><br>_______________________________________<br>FIRMA DE AUTORIZACION<br>'.$personaAutorizada.'</p></td>
			  	</tr>
			</table>';

			ob_end_clean();

			$pdf->writeHTML($content, true, 0, true, 0);
			$pdf->lastPage();
			$fecha = getdate();

			$pdf -> Output("VALE-". $datos[0]. "-".$fecha['year']."-".$fecha['mon']."-".$fecha['mday'].".pdf", "D");
		}
	}
 ?>
