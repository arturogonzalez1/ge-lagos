<?php 
	session_start();
	$user = $_SESSION['report_user'];
	$anio = $_SESSION['report_anio'];
	$mes = $_SESSION['report_month'];
	$cliente = $_SESSION['report_cliente'];
	require '../../assets/tcpdf/tcpdf.php';
	require '../../assets/database.php';
	require '../../assets/funciones.php';
	$f = new Funciones();
	$datosCliente = $f ->VerDatosCliente("$user");
	$idCliente = $datosCliente[3];
	$limiteCredito = $datosCliente[4];

  	ob_start();
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Eduardo Arturo Gonzalez');
	$pdf->SetTitle('Estado de Cuenta');
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 9);
	$pdf->addPage('L');

	$content = '
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" media="screen">	
    <div class="row">
    	<table border="0" cellpadding="4">
    		<tr>
    			<th style="width: 5cm"><div align="center"><img src="../../images/logo1.jpg" width="100" height="50"></div></th>
    			<th style="width: 20cm">
    				<h2 style="text-align:center;">ESTADO DE CUENTA '.$mes. " - ". $anio . '</h2>
    				<label style="text-align:center;">'.$cliente .'</label>
    			</th>

    		</tr>
    	</table>
	</div>
        
	<table border="1" cellpadding="3" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="width: 3.5cm" align="center">FECHA</th>
				<th style="width: 5cm" align="center">CONCEPTO</th>
				<th style="width: 8cm" align="center">ESTACION</th>
				<th style="width: 3cm" align="center">CARGO</th>
				<th style="width: 3cm" align="center">ABONO</th>
				<th style="width: 3cm" align="center">SALDO</th>
			</tr>
		</thead>';
  
  	$query="CALL V_ESTADO_CUENTA($idCliente, $anio, $mes);";
	$result=mysqli_query($conn,$query);
	$indice = 0;
  	while ($sho=mysqli_fetch_array($result)) 
  	{
  		if ($indice == 0)
			{
				$content .= 
				'<tr>
				<td style="width: 3.5cm" align="center"></td>
				<td style="width: 5cm" align="center">SALDO INICIAL</td>
				<td style="width: 8cm" align="center"></td>
				<td style="width: 3cm"></td>
				<td style="width: 3cm"></td>
				<td style="width: 3cm" align="rigth">'. $sho[6] .'</td>
			</tr>';
			$indice = 1;
			}
		 	$content .= '
			 	<tr>
					<td align="center">'. $sho[0] .'</td>
					<td align="center">'. $sho[1] .'</td>
					<td align="center">'. $sho[2] .'</td>
					<td align="rigth">'. $sho[3] .'</td>
					<td align="rigth">'. $sho[4] .'</td>
					<td align="rigth">'. $sho[5] .'</td>
				</tr>';
  	}
  
  $content .= '</table>';

  	session_unset($user = $_SESSION['report_user']);
	session_unset($anio = $_SESSION['report_anio']);
	session_unset($mes = $_SESSION['report_month']);
	
  	ob_end_clean();
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
	//echo $content;
 ?>