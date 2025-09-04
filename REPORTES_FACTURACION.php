<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar44" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar44" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;FACTURACION Y COBROS DEL EVENTO</p><div  id="mensajeRESUMEN"><div class="progress" style="width: 25%;">
									</div>
								</div></div></strong>
	<div id="target44" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">



<?php 
	$con = $altaeventos->db();
	$query_alta_eventos = "select * from 04altaeventos where (NUMERO_EVENTO is not null or  NUMERO_EVENTO <>'') ";
	$array_alta_eventos = mysqli_query($con,$query_alta_eventos);
	while($row_alta_eventos = mysqli_fetch_array($array_alta_eventos)){
?>






	
	<table id="reset_totales_egresos"   class="table table-striped table-bordered" style="width:100%" >
	
	
	<tr ><td colspan="5" style="text-align: center;"><strong><SPAN style="color:blue; font-size:17px;">NOMBRE DEL EVENTO&nbsp;:&nbsp;<?php echo  isset($row_alta_eventos['NOMBRE_CORTO_EVENTO'])?$row_alta_eventos['NOMBRE_CORTO_EVENTO']:'';?>&nbsp;--&nbsp;	 NÚMERO DE EVENTO&nbsp;:&nbsp;<?php echo 'pppp'. isset($row_alta_eventos['NUMERO_EVENTO'])?$row_alta_eventos['NUMERO_EVENTO']:'';?></SPAN>&nbsp;&nbsp;&nbsp;RESUMEN DE FACTURACIÓN </strong></td>
	</tr>
	
	
	
	
	<tr ><td colspan="5" style="text-align: center;"><strong>RESUMEN DE FACTURACIÓN </strong></td></tr>
	
<tr  style="background:#c9e8e8">
<th style="width:20%:background:#c9e8e8">No.</th>
<th style="width:25%;background:#c9e8e8">CLIENTE</th>
<th style="width:25%;background:#c9e8e8">MONTO</th>
<th style="width:25%;background:#c9e8e8">FECHA </th>
</tr>



<?php 
	$montoTotalEvento =  $row_alta_eventos['MONTOC_TOTAL_EVENTO'];
?>

<tr >
<td  ></td>
<td  >MONTO TOTAL DEL EVENTO CON IMPUESTOS</td>
<td  ><?php echo number_format($montoTotalEvento ,2,'.',','); ?></td>
<td  ></td>
</tr>

<tr style='background:#c9e8e8'>
<td  >&nbsp;</td>
<td  ></td>
<td  ></td>
<td  ></td>
</tr>

<?php 
	$fondos = array("fff0df","dfe8ff","efdfff","ffdfe9");
	$cuenta = 0;$num=0;

	$variablequeryI2 = "select * from 04pagosingresos WHERE idRelacion = '".$row_alta_eventos['id']."' order by id asc ";
	$arrayqueryI2 = mysqli_query($con,$variablequeryI2);
	while($rowIngreso2 = mysqli_fetch_array($arrayqueryI2) ){
		$monto_x_pagar = 0;
		if($num==3){$num=0;}else{$num++;}
	$cuenta++;
?>
<tr style='background:#<?php echo $fondos[$num]; ?>; text-align:left'>
<td ><?php echo $cuenta; ?></td>
<td >MONTO POR FACTURAR</td>
<td ><?php echo number_format($montoTotalEvento - $montoTotalRestado,2,'.',','); ?></td>
<td ><?php echo $rowIngreso2['FECHA_INGRESOS']; ?></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>
<td  ><?php echo $cuenta; ?></td>
<td  >MONTO FACTURADO</td>
<td  ><?php echo number_format($rowIngreso2['MONTOCON_IVA'],2,'.',','); ?></td>
<td  ></td>
</tr>
 		
<tr style='background:#<?php if($rowIngreso2['pagado']=='no'){echo "f9a1a1";}else{echo $fondos[$num];} ?>;text-align:left'>
<td><?php echo $cuenta; ?></td>
<td>MONTO PAGADO </td>
<td><?php if($rowIngreso2['pagado']=='si'){
	echo number_format($rowIngreso2['MONTOCON_IVA'],2,'.',',');
	$monto_x_pagar = $rowIngreso2['MONTOCON_IVA'];
	}
	else{ 
	echo number_format(0.00,2,'.',',');
	$monto_x_pagar = 0;
	
	} ?></td>
<td></td>
</tr>

<tr style='background:#<?php echo $fondos[$num]; ?>;text-align:left'>
<td><?php echo $cuenta; ?></td>
<td>MONTO POR COBRAR</td>
<td ><?php echo number_format(($rowIngreso2['MONTOCON_IVA'] - $monto_x_pagar),2,'.',','); ?></td>
<td ></td>
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

<tr style='background: #fff ;text-align:left'>
<td  >--</td>
<td  >FALTA POR COBRAR</td>
<td  ><?php 

echo number_format($montoTotalEvento - $montoTotalRestado,2,'.',','); 
$total_tabla += $montoTotalEvento - $montoTotalRestado ; 
?></td>
<td  ></td>
</tr>

	</table>
	<br><br><br>
<?php }  ?>	
<table id="reset_totales_egresos"   class="table table-striped table-bordered" style="width:100%" >
<tr  style='background:#c9e8e8'>
<td style="width:20%:background:#c9e8e8">--</td>
<td style="width:20%:background:#c9e8e8" ALIGN="RIGHT" ><STRONG style="color:blue; font-size:17px;">GRAN TOTAL POR COBRAR</STRONG></td>
<td style="width:20%:background:#c9e8e8" ><STRONG style="color:blue; font-size:17px;">$<?php  echo  number_format($total_tabla,2,'.',','); ?></STRONG></td>
<td style="width:20%:background:#c9e8e8">--</td></tr>
</table>


			</div> 
		</div>
	</div>