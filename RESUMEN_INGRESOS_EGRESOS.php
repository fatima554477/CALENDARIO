<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar16" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar16" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;RESUMEN DE INGRESOS Y EGRESOS DEL EVENTO</p><div  id="mensajeRESUMEN"><div class="progress" style="width: 25%;">
									</div>
								</div></div></strong>
	<div id="target16" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">

	
	<table id="example2"   class="table table-striped table-bordered" style="width:100%" >
	<tr ><td colspan="4" style="text-align: center;"><strong>RESUMEN DE INGRESOS</strong></td></tr>
				<tr  style="background:#c9e8e8">
						<td>INGRESOS</td>
						<td>FACTURA</td>
						<td>MONTOS</td>
						<td>FECHA DE CARGA</td>

					</tr>
<?php
$queryresumen = $altaeventos->resumeningresos();
$total_ingresos = 0;
while($row=mysqli_fetch_array($queryresumen))
	{
		if($row["ADJUNTO_INGRESOS"]!=''){
		$ADJUNTO_INGRESOS = "  <a target='_blank' href='includes/archivos/". $row["ADJUNTO_INGRESOS"]."'>Visualizar!</a>";
	}
?>
	<tr style="background:#f5f9fc">
	<td  width="20%"><?php echo $row["DOCUMENTO_INGRESOS"]; ?></td>
	<td  width="20%"><?php echo $ADJUNTO_INGRESOS; ?></td>
	<td  width="20%" style='text-align:left'>$<?php echo number_format($row["OBSERVACIONES_INGRESOS"],2,'.',','); 
	$total_ingresos += $row["OBSERVACIONES_INGRESOS"];
	?></td>
	<td  width="20%"><?php echo $row["FECHA_INGRESOS"]; ?></td>

	</tr>	  
<?php
	}
?>
<tr style='background:#f5f9fc;text-align:left'>
<td  width="20%"></td>
<td  width="20%">TOTAL</td>
<td  width="20%">$<?php echo number_format($total_ingresos,2,'.',','); ?></td>
<td  width="20%"></td>


</tr>
 	<tr  class="table table-striped table-bordered" style="width:100%" >
	<td  width="20%"></td>
	<td  width="20%"></td>
	<td  width="20%"></td>
	<td  width="20%"></td>
	</tr>	
	</table>

	<table id="example2"   class="table table-striped table-bordered" style="width:100%" >
	<tr><td colspan="4" style="text-align: center;"><strong>RESUMEN DE EGRESOS</strong></td></tr>
				<tr  style="background:#c9e8e8">
						<td>EGRESOS</td>
						<td>FACTURA</td>
						<td>MONTOS</td>
						<td>FECHA DE CARGA</td>

					</tr>
<?php
$queryresumen = $altaeventos->resumenegresos();
$total_ingresos2 = 0;
while($row=mysqli_fetch_array($queryresumen))
	{
		if($row["ADJUNTO_EGRESO"]!=''){
		$ADJUNTO_EGRESO = "  <a target='_blank' href='includes/archivos/". $row["ADJUNTO_EGRESO"]."'>Visualizar!</a>";
	}
?>
	<tr style="background:#f5f9fc">
	<td  width="20%"><?php echo $row["DOCUMENTO_EGRESO"]; ?></td>
	<td  width="20%"><?php echo $ADJUNTO_EGRESO; ?></td>
	<td  width="20%" style='text-align:left'>$<?php echo number_format($row["MONTO_EGRESO"],2,'.',','); 
	$total_ingresos2 += $row["MONTO_EGRESO"];
	?></td>
	<td  width="20%"><?php echo $row["FECHA_EGRESO"]; ?></td>

	</tr>	  
<?php
	}
?>

<tr style='background:#f5f9fc;text-align:left'>
<td  width="20%"></td>
<td  width="20%">TOTAL</td>
<td  width="20%">$<?php echo number_format($total_ingresos2,2,'.',','); ?></td>
<td  width="20%"></td>


</tr>

 	<tr  class="table table-striped table-bordered" style="width:100%" >
	<td width="20%"></td>
	<td  width="20%"></td>
	<td  width="20%"></td>
	<td   width="20%"></td>
	</tr>	
	</table>


	<table id="example2"   class="table table-striped table-bordered" style="width:100%" >
	<tr ><td colspan="4" style="text-align: center;"><strong> RESUMEN DE TOTAL BOLETOS DE AVIÓN</strong></td></tr>
				<tr  style="background:#c9e8e8">
						<td>BOLETOS</td>
						<td>FACTURA</td>
						<td>MONTOS</td>
						<td>FECHA DE CARGA</td>

					</tr>
<?php
$queryresumen = $altaeventos->resumenboletosavion();
$total_ingresos3=0;
while($row=mysqli_fetch_array($queryresumen))
	{
		if($row["ADJUNTO_BOLETOSAVION"]!=''){
		$urlADJUNTO_BOLETOSAVION = "  <a target='_blank' href='includes/archivos/". $row["ADJUNTO_BOLETOSAVION"]."'>Visualizar!</a>";
	}
?>
	<tr style="background:#f5f9fc">
	<td><?php echo $row["DOCUMENTO_BOLETOSAVION"]; ?></td>
	<td><?php echo $urlADJUNTO_BOLETOSAVION; ?></td>
	<td style='text-align:left'>$<?php echo number_format($row["MONTO_BOLETOSAVION"],2,'.',','); 
	
	$total_ingresos3 += $row["MONTO_BOLETOSAVION"];
	?></td>
	<td><?php echo $row["FECHA_BOLETOSAVION"]; ?></td>

	</tr>	  
<?php
	}
?>
<tr style='background:#f5f9fc;text-align:left'>
<td  width="20%"></td>
<td  width="20%">TOTAL</td>
<td  width="20%">$<?php echo number_format($total_ingresos3,2,'.',','); ?></td>
<td  width="20%"></td>


</tr>

 	<tr  class="table table-striped table-bordered" style="width:100%" >
	<td  width="20%"></td>
	<td  width="20%"></td>
	<td  width="20%"></td>
	<td  width="20%"></td>
	</tr>	
	</table>
			</div> 
		</div>
	</div>