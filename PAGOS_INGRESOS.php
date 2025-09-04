<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar12" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar12" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;INGRESOS DE<a style="color:red;font:12px">&nbsp;CLIENTES</a></p></strong>


<div  id="mensapagosingresos2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target12" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
            
<?php if($conexion->variablespermisos('','PAGOS_INGRESOS22','guardar')=='si'  and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="pagosingresosform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 

                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">CONCEPTO O NÚMERO DE LA FACTURA:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_INGRESOS; ?>" required="" name="DOCUMENTO_INGRESOS">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						

						                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">FECHA DE PAGO</label></strong>
                          <input type="date" class="form-control" id="validationCustom01" value="<?php echo date('Y-m-d'); ?>" required="" name="FE_PAGOI">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">FECHA DE TIMBRADO</label></strong>
                          <input type="date" class="form-control" id="validationCustom01" value="<?php echo date('Y-m-d'); ?>" required="" name="FE_TIMBRADO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">ADJUNTAR FACTURA:</label></strong>
                          <input type="file" class="form-control" id="ADJUNTO_INGRESOS" value="<?php echo $ADJUNTO_INGRESOS; ?>" required="" name="ADJUNTO_INGRESOS">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
                         <div class="col-md-4"style="background:#fbeee6">

<strong>   <label for="validationCustom01" class="form-label">MONTO FACTURADO SIN IVA:</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $OBSERVACIONES_INGRESOS; ?>" name="OBSERVACIONES_INGRESOS" onkeyup="comasainput('OBSERVACIONES_INGRESOS')"  >
</div></div>


						
                        <div class="col-md-4"style="background:#fbeee6">

<strong>   <label for="validationCustom01" class="form-label">MONTO FACTURADO CON IVA:</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $MONTOCON_IVA; ?>" name="MONTOCON_IVA" onkeyup="comasainput('MONTOCON_IVA')"  >
</div></div>



                         
						  
						  
						  
						  
						  <div><tr>
						  
						  
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_INGRESOS">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hPAGOSINGRESOS1" name="hPAGOSINGRESOS1"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDA_PAGOS">GUARDAR</button><div style="

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


id="mensapagosingresos"/></th></tr></table><?php } ?>
           
               <table>
                  </form>
                  <?php if($conexion->variablespermisos('','PAGOS_INGRESOS22','email')=='si'  and $var_bloquea_fecha=='no'){ ?>
                  <form name="form_emil_pagosingresos" id="form_emil_pagosingresos">
				  
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_PAGOS_INGRESOS22" id="EMAIL_PAGOS_INGRESOS22" class="form-control" aria-label="With textarea"><?php echo $EMAIL_PAGOS_INGRESOS22; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_PAGOS_INGRESOS22">ENVIAR POR EMAIL</button></td> <?php } ?>  
                
           </tr></table>


           <?php
$querycontras = $altaeventos->Listado_pagosingresos();
?>

<br />
<div class='table-responsive'>
<div >
</div>
<br />
<div id='employee_table'>
<tbody >
<table class="table table-striped table-bordered" style="width:100%" id='reset_ingresos' name='reset_ingresos'>
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
$urlADJUNTO_INGRESOS ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_INGRESOS = $conexion->descargararchivo($row["ADJUNTO_INGRESOS"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="pagoingreso[]" id="pagoingreso" value="<?php echo $row["id"]; ?>"/> </td>
<td style="text-align:center" >



<input type="checkbox" style="width:22%" class="form-check-input" id="pasarpagadoingreso1a<?php echo $row["id"]; ?>" name="pasarpagadoingreso1a<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasarpagadoingreso(<?php echo $row["id"]; ?>)"  	<?php if($row["pagado"]=='si'){
	echo "checked";
} ?>/>

</td>
<td ><?php echo $row["DOCUMENTO_INGRESOS"]; ?></td>
<td ><?php echo $row["FE_PAGOI"]; ?></td>
<td ><?php echo $row["FE_TIMBRADO"]; ?></td>


<td><?php echo $urlADJUNTO_INGRESOS; ?></td>
<td >$<?php echo number_format($row["OBSERVACIONES_INGRESOS"],2,'.',',');
 ?></td>
<td >$<?php echo number_format($row["MONTOCON_IVA"],2,'.',',');
 ?></td>
<td ><?php echo $row["FECHA_INGRESOS"]; ?></td>
<td>
<?php if($conexion->variablespermisos('','PAGOS_INGRESOS22','modificar')=='si'  and $var_bloquea_fecha=='no'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datapagoingreso" /><?php } ?></td>
<td>
<?php if($conexion->variablespermisos('','PAGOS_INGRESOS22','borrar')=='si'  and $var_bloquea_fecha=='no'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datapagoingresoborrar" /><?php } ?></td>
</tr>



<tr style='background:#f5f9fc;text-align:center'>

<?php
$total_SINIVA += $row["OBSERVACIONES_INGRESOS"];
$total_ingresos += $row["MONTOCON_IVA"];

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
    $ <?php echo number_format($total_SINIVA,2,'.',','); ?>
</td>
<td style="border-top:1px solid #000; background:#dbc9df; font-weight:bold; text-align:center; font-size:16px; color:#000;">
    $ <?php echo number_format($total_ingresos,2,'.',','); ?>
</td>


    

    <td >
        <div id="actualizatotalpagadoingreso">
            <?php $total_ingreso_pagado = $altaeventos->total_ingreso_pagado();?>
            
        </div>
    </td>
    
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





