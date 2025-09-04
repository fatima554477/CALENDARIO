<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar13" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar13" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; <a style="color:red;font:12px">OTROS</a> INGRESOS</p></strong>


<div  id="mensajepagosegresos2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $pagoegreso ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target13" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
            
  <?php if($conexion->variablespermisos('','OTROS_INGRESOS','guardar')=='si'){ ?>     
                      <form class="row g-3 needs-validation was-validated" id="pagosegresosform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 

                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">CONCEPTO O NÚMERO DE LA FACTURA:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_EGRESO ;  ?>" required="" name="DOCUMENTO_EGRESO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
			    <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">FECHA DE PAGO</label></strong>
                          <input type="date" class="form-control" id="validationCustom01" value="<?php echo date('Y-m-d'); ?>" required="" name="FE_PAGOE">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">FECHA DE TIMBRADO</label></strong>
                          <input type="date" class="form-control" id="validationCustom01" value="<?php echo date('Y-m-d'); ?>" required="" name="FE_TIMBRADOE">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">FACTURA:</label></strong>
                          <input type="file" class="form-control" id="ADJUNTO_EGRESO" value="<?php echo $ADJUNTO_EGRESO ; ?>" required="" name="ADJUNTO_EGRESO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                         <div class="col-md-4"style="background:#fbeee6">

<strong>   <label for="validationCustom01" class="form-label">MONTO FACTURADO SIN IVA:</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $MONTO_OTRO; ?>" name="MONTO_OTRO" onkeyup="comasainput('MONTO_OTRO')"  >
</div></div>



						
                        <div class="col-md-4"style="background:#fbeee6">

<strong>   <label for="validationCustom01" class="form-label">MONTO FACTURADO CON IVA:</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $MONTO_EGRESO; ?>" name="MONTO_EGRESO" onkeyup="comasainput('MONTO_EGRESO')"  >
</div></div>



                         
						  
						  
						  
						  
						  <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
            <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_EGRESO">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hpagosegresos1" name="hpagosegresos1"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_pagosegresos">GUARDAR</button><div style="

    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);"


id="mensajepagosegresos"/></th><?php } ?></tr></table>
           
               
                  </form>
             <?php if($conexion->variablespermisos('','OTROS_INGRESOS','email')=='si'){ ?>
                  <form name="form_emil_pagosEgresos" id="form_emil_pagosEgresos">
				  
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_PAGOS_EGRESOS" id="EMAIL_PAGOS_EGRESOS" class="form-control" aria-label="With textarea"><?php echo $EMAIL_PAGOS_EGRESOS; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_PAGOS_EGRESOS">ENVIAR POR EMAIL</button></td> <?php } ?>  

                
           </tr>

           <?php
$querycontras = $altaeventos->Listado_pagoegresos();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_egresos' name='reset_egresos'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th> 

<th width="10%"style="background:#c9e8e8">PAGADO</th>   
<th width="20%"style="background:#c9e8e8">CONCEPTO O NÚMERO DE LA FACTURA</th>
<th width="20%"style="background:#c9e8e8">FECHA DE PAGO</th>
<th width="20%"style="background:#c9e8e8">FECHA DE TIMBRADO</th>
<th width="20%"style="background:#c9e8e8">FACTURA</th>
<th width="20%"style="background:#c9e8e8">MONTO SIN IVA</th>
<th width="20%"style="background:#c9e8e8">MONTO CON IVA</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>


<?php
$urlADJUNTO_EGRESO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_EGRESO = $conexion->descargararchivo($row["ADJUNTO_EGRESO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="pagoegreso[]" id="pagoegreso" value="<?php echo $row["id"]; ?>"/> </td>
<td style="text-align:center" >

<!--<input type="checkbox" style="width:15%" class="form-check-input" name="PAGADOEGRE[]" id="PAGADOEGRE" value="<?php echo $row["id"]; ?>"/> -->

<input type="checkbox" style="width:22%;" class="form-check-input" id="pasarpagadoegreso1a<?php echo $row["id"]; ?>" name="pasarpagadoegreso1a<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasarpagadoegreso(<?php echo $row["id"]; ?>)"  	<?php if($row["pagado"]=='si'){
	echo "checked";
} ?>/>



</td>
<td><?php echo $row["DOCUMENTO_EGRESO"]; ?></td>
<td ><?php echo $row["FE_PAGOE"]; ?></td>
<td ><?php echo $row["FE_TIMBRADOE"]; ?></td>






<td><?php echo $urlADJUNTO_EGRESO; ?></td>


<td >$<?php echo number_format($row["MONTO_OTRO"],2,'.',',');
 ?></td>
<td >$<?php echo number_format($row["MONTO_EGRESO"],2,'.',',');
 ?></td>

<td><?php echo $row["FECHA_EGRESO"]; ?></td>
<?php if($conexion->variablespermisos('','OTROS_INGRESOS','modificar')=='si'){ ?>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datapagoegreso" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','OTROS_INGRESOS','borrar')=='si'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datapagoegresoborrar" />
</td><?php } ?>
</tr>


<tr style='background:#f5f9fc;text-align:center'>
<?php
$total_SINIVAOTRO += $row["MONTO_OTRO"];
$total_otros += $row["MONTO_EGRESO"];

}
?>


    <td style="text-align:center"></td>
    <td style="text-align:center"></td>
    <td></td>
    <td></td>
    <td></td>


	
	
	<td style="border-top:1px solid #000; background:#dbc9df; font-weight:bold; text-align:center; font-size:16px;">
    TOTAL
</td>
<td style="border-top:1px solid #000; background:#dbc9df; font-weight:bold; text-align:center; font-size:16px; color:#000;">
    $ <?php echo number_format($total_SINIVAOTRO,2,'.',','); ?>
</td>
<td style="border-top:1px solid #000; background:#dbc9df; font-weight:bold; text-align:center; font-size:16px; color:#000;">
    $ <?php echo number_format($total_otros,2,'.',','); ?>
</td>
    

    <td >
        <div id="actualizatotalpagadoingreso2">
            <?php $total_egreso_pagado = $altaeventos->total_egreso_pagado();?>
            
        </div>
    </td>
    
    <td></td>

<td></td>
</tr>

</table>
</tbody>
 </form>              

</div>
</div>
</div>
</div>
</div>
 

