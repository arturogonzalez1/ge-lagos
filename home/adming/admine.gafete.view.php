<?php 
session_start();
	if (!isset($_SESSION['adm_loged']) || $_SESSION['adm_loged'] == false || $_SESSION['adm_nivelP'] != 4)
	{
		//header("Location: ../index.php");
	}
	else
	{
		ob_start();
		require '../assets/tcpdf/tcpdf.php';
		require '../assets/funciones.php';
		require '../assets/database.php';
		require '../assets/ftp.php';
		
		$usr = $_SESSION['adm_usuario'];

		$query="CALL v_USR_PSW('$usr')";
		$result=mysqli_query($conn,$query);
		$datos=mysqli_fetch_array($result);

		$nameFoto = $datos[1];
		$nameDespachador = $datos[2];
		$nameEstacion = $datos[3];

		$encode_data = base64_encode($datos[0]);

		$f = new Funciones();
		$_conexionFTP = new ConexionFTP();
		$local_file = "temp/despachador.jpg";
		$server_file = "images/web/despachadores/".$nameFoto.".jpg";
		$_conexionFTP->GetImage($local_file, $server_file);

		$qrcode = $f ->GenerarQR($encode_data);

		$pdf = new TCPDF('P','mm','A4');

		$pdf->setPrintHeader(false); 
		$pdf->setPrintFooter(false);

		$pdf->SetAutoPageBreak(true, 0); 
		$pdf->SetFont('Helvetica', '', 10);

		$pdf -> AddPage();

		$content = '';
		$content .= '
		<table border="0" cellpadding="5">
			<tr>
		  		<td style="height: 4cm" width="9.5cm"><div align="center"><br><img src="temp/despachador.jpg" width="100" height="125"></div></td>
		  		<td width="1cm"></td>
		    	<td width="8.5cm"><div align="center"><br><br><img src="../images/logo1.jpg" width="120" height="68"></div></td>
		  	</tr>
		  	<tr>
		    	<td style="height: 8.73cm" width="9.5cm">
		    		<h4 style="background-color: black; color: white" align="center">DESPACHADOR</h4>
		    		<h4 align="center">'.$nameDespachador.'</h4>
		    		<h4 style="background-color: black; color: white" align="center">ESTACION</h4>
		    		<h4 align="center">'.$nameEstacion.'</h4>
		    		<div align="center"><br><br><img src="../images/logo1.jpg" width="120" height="68"></div>
		    	</td>
		    	<td width="1cm"></td>
		    	<td width="8.5cm"><div align="center">'.$qrcode.'</div></td>
		  	</tr>
		</table>';
			ob_end_clean();

			$pdf->writeHTML($content, true, 0, true, 0);
			$pdf->lastPage();

			$pdf -> Output();
		}
 ?>