<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar48" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar48" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;FACTURACIÓN <a style="color:red;font:12px">&nbsp;(OTROS INGRESOS)</a></p><div  id="mensajeRESUMEN"><div class="progress" style="width: 25%;">
									</div>
								</div></div></strong>
	<div id="target48" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">

	
	<table id="reset_totales_egresosOTROS"   class="table table-striped table-bordered" style="width:100%" >
	<tr ><td colspan="5" style="text-align: center;"><strong>RESUMEN DE FACTURACIÓN OTROS INGRESOS</strong></td></tr>
	




<?php 


$montoTotalEventOTRO =  $MONTO_EGRESO;
?>




</tr>


<tr  style="background:#c9e8e8">
<th style="width:20%:background:#c9e8e8">No.  &nbsp;&nbsp;&nbsp;&nbsp;CONCEPTO</th>
<th style="width:25%;background:#c9e8e8">NOMBRE</th>
<th style="width:25%;background:#c9e8e8">MONTO</th>
<th style="width:25%;background:#c9e8e8">FECHA </th>
</tr>
<tr style='background:#c9e8e8;border-bottom: 1px solid black; height: 1px; padding: 0;'>
<td  >&nbsp;</td>
<td  ></td>
<td  ></td>
<td ></td>
</tr>

<?php 
$fondos = array(
    "D0E4FF",  // Azul cielo claro
    "D0FFD7",  // Verde menta luminoso
    "FFE8D0",  // Melocotón suave
    "E8D0FF"   // Lavanda (para mantener contraste)
);
	$con = $altaeventos->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	$variablequeryIotro = "select * from 04pagoegresos WHERE idRelacion = '".$session."' order by id asc ";
	$arrayqueryotro = mysqli_query($con,$variablequeryIotro);
	while($rowIngresootro = mysqli_fetch_array($arrayqueryotro) ){
		$monto_x_pagarotro = 0;
		if($num==3){$num=0;}else{$num++;}
	$cuentaOTROS++;
?>
<tr style='background:#<?php echo $fondos[$num]; ?>; text-align:left'>
<td ><?php echo $cuentaOTROS; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rowIngresootro['DOCUMENTO_EGRESO']; ?></td>
<td >MONTO POR FACTURAR</td>
<td><?php echo number_format($rowIngresootro['MONTO_EGRESO'],2,'.',','); ?></td>
<td></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>
<td><?php echo $cuentaOTROS; ?></td>
<td>MONTO FACTURADO</td>
<td><?php echo number_format($rowIngresootro['MONTO_EGRESO'],2,'.',','); ?></td>
<td><?php echo $rowIngresootro['FECHA_EGRESO']; ?></td>
</tr>
 		
<tr style='background:#<?php if($rowIngresootro['pagado']=='no'){echo "ee917d";}else{echo $fondos[$num];} ?>;text-align:left'>
<td><?php echo $cuentaOTROS; ?></td>
<td>MONTO PAGADO </td>
<td><?php if($rowIngresootro['pagado']=='si'){
	echo number_format($rowIngresootro['MONTO_EGRESO'],2,'.',',');
	$monto_x_pagarotro = $rowIngresootro['MONTO_EGRESO'];
	}
	else{ 
	echo number_format(0.00,2,'.',',');
	$monto_x_pagarotro = 0;
	
	} ?></td>
<td ></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>                
<td><?php echo $cuentaOTROS; ?></td>
<td>MONTO POR COBRAR</td>
<td ><?php echo number_format(($rowIngresootro['MONTO_EGRESO'] - $monto_x_pagarotro),2,'.',','); ?></td>
<td ></td>
</tr>
<tr>
    <td colspan="4" style="border-bottom: 1px solid black; height: 1px; padding: 0;"></td>
</tr>
<?php 

$montoTotalRestado += ($monto_x_pagarotro); 
	}
?>



	</table>
			</div> 
		</div>
	</div>