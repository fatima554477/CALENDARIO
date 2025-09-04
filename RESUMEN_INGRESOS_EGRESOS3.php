<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar44" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar44" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;FACTURACIÓN Y COBROS<a style="color:red;font:12px">&nbsp;(CLIENTES)</a></p><div  id="mensajeRESUMEN"><div class="progress" style="width: 25%;">
									</div>
								</div></div></strong>
	<div id="target44" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">

	
	<table id="reset_totales_egresos"   class="table table-striped table-bordered" style="width:100%" >
	<tr ><td colspan="5" style="text-align: center;"><strong>RESUMEN DE FACTURACIÓN (CLIENTES)</strong></td></tr>
	




<?php 
$montosinboletos =  $MONTOC_TOTAL_EVENTO;

$montoTotaAVION =  $MONTO_TOTAL_AVION;

$montoTotalEvento =  $MONTO_TOTAL_DEL_EVENTO;
?>


<tr style='background: #faf8c5'>
<td  colspan="2" style="text-align:right">MONTO TOTAL DEL EVENTO SIN BOLETOS <a style="color:red;font:12px">&nbsp;CON IMPUESTOS</a></td>
<td  colspan="2"><?php echo number_format($montosinboletos ,2,'.',','); ?></td>

</tr style='background: #faf8c5'>
<td  colspan="2"  style="text-align:right">MONTO TOTAL DE BOLETOS DE AVION <a style="color:red;font:12px">&nbsp;CON IMPUESTOS</a></td>
<td  colspan="2"><?php echo number_format($montoTotaAVION ,2,'.',','); ?></td>

</tr>
<tr style='background: #faf8c5'>

<td  colspan="2" style="text-align:right">MONTO TOTAL DEL EVENTO<a style="color:red;font:12px">&nbsp;CON IMPUESTOS</a></td>
<td  colspan="2"><?php echo number_format($montoTotalEvento ,2,'.',','); ?></td>

</tr>


<tr  style="background:#c9e8e8">
<th style="width:20%:background:#c9e8e8">No.   &nbsp;&nbsp;&nbsp;&nbsp;CONCEPTO</th>
<th style="width:25%;background:#c9e8e8">CLIENTE </th>
<th style="width:25%;background:#c9e8e8">MONTO</th>
<th style="width:25%;background:#c9e8e8">FECHA </th>
</tr>

<tr style='background:#c9e8e8;border-bottom: 1px solid black; height: 1px; padding: 0;'>
<td  >&nbsp;</td>
<td  ></td>
<td  ></td>
<td  ></td>
</tr>

<?php 
$fondos = array(
    "D0E4FF",  // Azul cielo claro
    "D0FFD7",  // Verde menta luminoso
    "FFE8D0",  // Melocotón suave
    "E8D0FF"   // Lavanda (para mantener contraste)
);
	$cuenta = 0;$num=0;
	$con = $altaeventos->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	$variablequeryI2 = "select * from 04pagosingresos WHERE idRelacion = '".$session."' order by id asc ";
	$arrayqueryI2 = mysqli_query($con,$variablequeryI2);
	while($rowIngreso2 = mysqli_fetch_array($arrayqueryI2) ){
		$monto_x_pagar = 0;
		if($num==3){$num=0;}else{$num++;}
	$cuenta++;
?>
<tr style='background:#<?php echo $fondos[$num]; ?>; text-align:left'>   
<td ><?php echo $cuenta; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rowIngreso2['DOCUMENTO_INGRESOS']; ?></td>
<td >MONTO POR FACTURAR</td>
<td ><?php echo number_format($montoTotalEvento - $montoTotalRestado,2,'.',','); ?></td>
<td ></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>
<td  ><?php echo $cuenta; ?></td>
<td  >MONTO FACTURADO</td>
<td  ><?php echo number_format($rowIngreso2['MONTOCON_IVA'],2,'.',','); ?></td>
<td  ><?php echo $rowIngreso2['FECHA_INGRESOS']; ?></td>
</tr>
 		
<tr style='background:#<?php if($rowIngreso2['pagado']=='no'){echo "ee917d";}else{echo $fondos[$num];} ?>;text-align:left'>
    <td><?php echo $cuenta; ?></td>
    <td>MONTO PAGADO</td>
    <td>
        <?php 
        if($rowIngreso2['pagado'] == 'si'){
            echo number_format($rowIngreso2['MONTOCON_IVA'], 2, '.', ',');
            $monto_x_pagar = $rowIngreso2['MONTOCON_IVA'];
            $montoTotalPagado += $monto_x_pagar; // Acumula solo lo PAGADO
        } else { 
            echo number_format(0.00, 2, '.', ',');
            $monto_x_pagar = 0;
            $montoTotalNoPagado += $rowIngreso2['MONTOCON_IVA']; // Nueva variable para NO PAGADO
        } 
        ?>
    </td>
    <td></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>
<td><?php echo $cuenta; ?></td>
<td>MONTO POR COBRAR</td>
<td ><?php echo number_format(($rowIngreso2['MONTOCON_IVA'] - $monto_x_pagar),2,'.',','); ?></td>
<td ></td>
</tr>
<tr>
    <td colspan="4" style="border-bottom: 1px solid black; height: 1px; padding: 0;"></td>
</tr>
<?php 

$montoTotalRestado += ($monto_x_pagar); 
	}
?>

<tr style='background: #fff ;text-align:left'>
<td  >--</td>
<td  >--</td>
<td  >--</td>
<td  >--</td>
</tr>

<tr style='text-align:left;background:#dfcbc9'>
<td  >--</td>
<td style="background:#dfcbc9; color: #a41506; font-weight: bold; padding: 8px 12px; border: 1px solid #a41506; text-align: left;">
  FALTA POR COBRAR
</td>
<td style="background:#dfcbc9; color: #a41506; font-weight: bold; padding: 8px 12px; border: 1px solid #a41506; text-align: left;"><?php echo number_format($montoTotalEvento - $montoTotalRestado,2,'.',','); ?></td>
<td  ></td>
</tr>
<tr style='text-align:left;background:#dfcbc9'>
    <td></td>
<td style="background:#dfcbc9; color: #a41506; font-weight: bold; padding: 8px 12px; border: 1px solid #a41506; text-align: left;">
  FALTA POR FACTURAR
</td>
<td style="background:#dfcbc9; color: #a41506; font-weight: bold; padding: 8px 12px; border: 1px solid #a41506; text-align: left;">
        <?php 
   
        $totalPendiente = $montoTotalEvento - ($montoTotalPagado + $montoTotalNoPagado);
        echo number_format($totalPendiente, 2, '.', ','); 
        ?>
    </td>
    <td></td>
</tr>
	</table>
			</div> 
		</div>
	</div>