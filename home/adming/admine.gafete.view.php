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
		
		$usr = $_SESSION['adm_usuario'];

		$query="CALL v_USR_PSW('$usr')";
		$result=mysqli_query($conn,$query);
		$datos=mysqli_fetch_array($result);

		$nameFoto = $datos[1];
		$nameDespachador = $datos[2];
		$nameEstacion = $datos[3];

		$encode_data = base64_encode($datos[0]);

		$f = new Funciones();
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
		  		<th style="height: 4cm"><div align="center"><br><img src="../images/imgDes/'.$nameFoto.'.jpg" width="100" height="125"></div></th>
		    	<th><div align="center"><br><br><img src="../images/logo1.jpg" width="120" height="68"></div></th>
		  	</tr>
		  	<tr>
		    	<td style="height: 8.73cm">
		    		<h4 style="background-color: black; color: white" align="center">DESPACHADOR</h4>
		    		<h4 align="center">'.$nameDespachador.'</h4>
		    		<h4 style="background-color: black; color: white" align="center">ESTACION</h4>
		    		<h4 align="center">'.$nameEstacion.'</h4>
		    		<div align="center"><br><br><img src="../images/logo1.jpg" width="120" height="68"></div>
		    	</td>
		    		
		    	<td><div align="center">'.$qrcode.'</div></td>
		  	</tr>
		</table>';
			ob_end_clean();

			$pdf->writeHTML($content, true, 0, true, 0);
			$pdf->lastPage();

			$pdf -> Output();
		}
 ?>