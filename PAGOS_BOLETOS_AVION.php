<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar14" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar14" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; RESUMEN DE TOTAL BOLETOS DE AVIÓN</p></strong>


<div  id="mensajeboletosavion">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $boletos ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $bolrtosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target14" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
            
<?php if($conexion->variablespermisos('','PAGOS_BOLETOS_AVION','guardar')=='si'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="BOLETOSAVIONform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 

                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">BOLETOS DE AVIÓN:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_BOLETOSAVION; ?>" required="" name="DOCUMENTO_BOLETOSAVION">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">FACTURA:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_BOLETOSAVION; ?>" required="" name="ADJUNTO_BOLETOSAVION">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">MONTOS:</label></strong>
                  

<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $MONTO_BOLETOSAVION; ?>" name="MONTO_BOLETOSAVION"  onkeyup="comasainput('MONTO_BOLETOSAVION')" >
</div></div>
<div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_BOLETOSAVION">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hBOLETOSAVION1" name="hBOLETOSAVION1"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_BOLETOSAVION">GUARDAR</button></th></tr></table><?php } ?>
           
               
 </form>


               
 <?php if($conexion->variablespermisos('','PAGOS_BOLETOS_AVION','email')=='si'){ ?>                 
<form name="form_emil_BOLETOSAVION" id="form_emil_BOLETOSAVION">

<tr>
<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_BOLETOS_AVION" id="EMAIL_BOLETOS_AVION" class="form-control" aria-label="With textarea"><?php echo $EMAIL_BOLETOS_AVION; ?></textarea>
<button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_EMAIL_BOLETOS_AVION">ENVIAR POR EMAIL</button></td>
<?php } ?>   

</tr>

<?php
$querycontras = $altaeventos->Listado_boletosavion();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_boletos' name='reset_boletos'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th> 
<th width="10%"style="background:#c9e8e8">PAGADO</th>   
<th width="20%"style="background:#c9e8e8">BOLETOS</th>
<th width="20%"style="background:#c9e8e8">FACTURA</th>
<th width="20%"style="background:#c9e8e8">MONTOS</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>


<?php
$urlADJUNTO_BOLETOSAVION ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_BOLETOSAVION = $conexion->descargararchivo($row["ADJUNTO_BOLETOSAVION"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="boletosavion[]" id="boletosavion" value="<?php echo $row["id"]; ?>"/> </td>
<td style="text-align:center" >

<input type="checkbox" style="width:22%;" class="form-check-input" id="pasarpagadoavion1a<?php echo $row["id"]; ?>" name="pasarpagadoavion1a<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasarpagadoavion(<?php echo $row["id"]; ?>)"  <?php if($row["pagado"]=='si'){
	echo "checked";
} ?>/>



</td>
<td ><?php echo $row["DOCUMENTO_BOLETOSAVION"]; ?></td>
<td ><?php echo $urlADJUNTO_BOLETOSAVION; ?></td>
<td >$ <?php echo number_format($row["MONTO_BOLETOSAVION"],2,'.',',');  
$total_ingresos2 += $row["MONTO_BOLETOSAVION"];
?></td>
<td ><?php echo $row["FECHA_BOLETOSAVION"]; ?></td>
<td><?php if($conexion->variablespermisos('','PAGOS_BOLETOS_AVION','modificar')=='si'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_databoletosavion" />
<?php } ?></td>
<td><?php if($conexion->variablespermisos('','PAGOS_BOLETOS_AVION','borrar')=='si'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_databoletosavionborrar" />
<?php } ?></td>
</tr>
<?php
}
?>
<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" ></td>
<td style="text-align:center" ></td>
<td ></td>
<td  style="border-top:1px #000 solid;">TOTAL</td>
<td  style="border-top:1px #000 solid;">


<span id="actualizatotalpagadoavion">
$<?php
$total_boletosavion_pagado = $altaeventos->total_boletosavion_pagado();

 echo number_format($total_boletosavion_pagado,2,'.',','); ?>
</span>

</td>
<td ></td>
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

