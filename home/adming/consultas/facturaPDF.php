<?php 
	session_start();
	require '../../assets/tcpdf/tcpdf.php';
	require '../../assets/database.php';
	require '../../assets/funciones.php';

	$folio = $_SESSION['foliofactura'];
	$f = new Funciones();
	$total = $f->TotalFactura($folio);

  	ob_start();
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Eduardo Arturo Gonzalez');
	$pdf->SetTitle('FACTURA');
	
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
    				<h2 style="text-align:center;">FOLIO: '.$folio. '</h2>
    				<label style="text-align:center;">CLIENTE</label>
    			</th>
    		</tr>
    	</table>
	</div>
	<label>Total a pagar</label>
    <h2>'.$total.'</h2>
	<table border="1" cellpadding="3" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th align="center">NO. TICKET</th>
				<th align="center">FECHA</th>
				<th align="center">IMPORTE (MXN)</th>
			</tr>
		</thead>';
  	$query = "CALL v_TICKETS_IN_FACTURA('$folio')";
  	echo $query;
	$result = mysqli_query($conn, $query);
  	while ($ver=mysqli_fetch_array($result)) 
  	{
	 	$content .= '
		 	<tr>
				<td align="center">'. $ver[0] .'</td>
				<td align="center">'. $ver[1] .'</td>
				<td align="center">'. $ver[2] .'</td>
			</tr>';
  	}
  	$content .= '
  	    <tr>
  	        <td align="center" colspan="2">Total</td>
  	        <td align="center">'.$total.'</td>
        </tr>
  	';
  
  $content .= '</table>';
	
  	ob_end_clean();
  	//unset($_SESSION['foliofactura']);
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output($folio.'.pdf', 'I');
	//echo $content;
 ?>