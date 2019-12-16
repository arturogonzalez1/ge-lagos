<?php 
    session_start();
    header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=PagoPendeinte.xls');
	require "../../assets/database.php";
 ?>
 <table class="table table-striped table-bordered"  style="border-style:solid;" >
    <thead>
        <tr>
            <th>CLIENTE</th>
            <th>FECHA CARGADO</th>
            <th>No. TICKET</th>
            <th>IMPORTE</th>
            <th>ESTACION</th>
        </tr>
    </thead>
<?php
    $cliente = $_POST['clientesba'];
    $idEstacion = $_SESSION['adm_idEstacion'];
    $fInicial = $_POST['finicialb'].' '.$_POST['hinicialb'].':00';
    $fFinal = $_POST['ffinalb'].' '.$_POST['hfinalb'].':00';
    $sql="CALL v_CONSULTAPAGOS('$cliente', $idEstacion, '$fInicial', '$fFinal');";
    $result=mysqli_query($conn2,$sql);
    while($ver=mysqli_fetch_array($result))
{
 ?>
<tr>
    <td><?php echo $ver[0]; ?></td>
    <td><?php echo $ver[1]; ?></td>
    <td><?php echo $ver[2]; ?></td>
    <td><?php echo $ver[3]; ?></td>
    <td><?php echo $ver[4]; ?></td>
</tr>

<?php 
}
 ?>
</table>