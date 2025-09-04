<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar10" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar10" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; CRONOLOGICO DE TRANSPORTACIÓN TERRESTRE</p></strong>


<div  id="mensajecronoterrestre2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $cronoterrestre ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target10" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
            
<?php if($conexion->variablespermisos('','CRONOLOGICO_TRANSPORTACION','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="cronoterrestreform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 

                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">NOMBRE DEL DOCUMENTO:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_cronoterrestre; ?>" required="" name="DOCUMENTO_cronoterrestre">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_cronoterrestre; ?>" required="" name="ADJUNTO_cronoterrestre">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_cronoterrestre ?>" required="" name="OBSERVACIONES_cronoterrestre">
                          <div class="valid-feedback">Bien!</div>
                        
                          </div><div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_cronoterrestre">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hCRONOTERRESTRE" name="hCRONOTERRESTRE"/>     
 
  
      <table><tr>
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_cronoterrestre">GUARDAR</button><div style="
 position: absolute;
    top: 50%; 
    right: 50%;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2em;
    font-weight: 500;
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


id="mensajecronoterrestre"/></th></tr></table><?php } ?>
           
                   
                  </form>
          
                  <?php if($conexion->variablespermisos('','CRONOLOGICO_TRANSPORTACION','email')=='si' and $var_bloquea_fecha=='no'){ ?>
                  <form name="form_emil_cronoterrestre" id="form_emil_cronoterrestre">
		     <tr>		  
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_cronoterrestre" id="EMAIL_cronoterrestre" class="form-control" aria-label="With textarea"><?php echo $EMAIL_cronoterrestre; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_cronoterrestre">ENVIAR POR EMAIL</button></td>   
<?php } ?>
                
           </tr>
		   
		   
		   
           <?php
$querycontras = $altaeventos->Listado_CRONOTERRESTRE();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_cronoterrestre' name='reset_cronoterrestre'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">NOMBRE DEL DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
$urlADJUNTO_cronoterrestre ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_cronoterrestre = $conexion->descargararchivo($row["ADJUNTO_cronoterrestre"]);
?>

<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="cronoterrestre[]" id="cronoterrestre" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_cronoterrestre"]; ?></td>
<td ><?php echo $urlADJUNTO_cronoterrestre; ?></td>
<td ><?php echo $row["OBSERVACIONES_cronoterrestre"]; ?></td>
<td ><?php echo $row["FECHA_cronoterrestre"]; ?></td>
<td><?php if($conexion->variablespermisos('','CRONOLOGICO_TRANSPORTACION','modificar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datacronoterrestre" />
<?php } ?></td>
<td><?php if($conexion->variablespermisos('','CRONOLOGICO_TRANSPORTACION','borrar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datacronoterrestreborrar" />
<?php } ?></td>
</tr>
<?php
}
?>



</table>
</tbody>
</form>
</div>
</div>
</div>
</div>  
</div>  