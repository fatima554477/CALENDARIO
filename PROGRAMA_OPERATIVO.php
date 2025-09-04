<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar4" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar4" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; PROGRAMA OPERATIVO</p></strong></div>


<div  id="mensajePROGRAMAOPERATIVO2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target4" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
            
              <?php if($conexion->variablespermisos('','PROGRAMA_OPERATIVO','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="PROGRAMAOPERATIVOform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                   


                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">NOMBRE DEL DOCUMENTO:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_PROGRAMAOPERATIVO; ?>" required="" name="DOCUMENTO_PROGRAMAOPERATIVO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_PROGRAMAOPERATIVO; ?>" required="" name="ADJUNTO_PROGRAMAOPERATIVO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_PROGRAMAOPERATIVO; ?>" required="" name="OBSERVACIONES_PROGRAMAOPERATIVO">
                          <div class="valid-feedback">Bien!</div>
        
                          </div><div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_PROGRAMAOPERATIVO">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hPROGRAMAOPERATIVO" name="hPROGRAMAOPERATIVO"/>     
 
  
      <table><tr>
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_PROGRAMAOPERATIVO">GUARDAR</button><div style="
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


id="mensajePROGRAMAOPERATIVO"/></th></tr></table><?php } ?>
                  </form>
				  
				  
				  
				  
				  
				  
                  <?php if($conexion->variablespermisos('','PROGRAMA_OPERATIVO','email' )=='si' and $var_bloquea_fecha=='no'){ ?>
                  <form name="form_emai_po" id="form_emai_po">
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_PROGRAMA_OPERATIVO" id="EMAIL_PROGRAMA_OPERATIVO" class="form-control" aria-label="With textarea"><?php echo $EMAIL_PROGRAMA_OPERATIVO; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_EMAIL_PO">ENVIAR POR EMAIL</button></td> 
<?php } ?>  
                
  






<?php
$querycontras = $altaeventos->Listado_PROGRAMAOPERATIVO();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_OPERATIVO' name='reset_OPERATIVO'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">NOMBRE DEL DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>



<?php
$urladjunto_PROGRAMA ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urladjunto_PROGRAMA = $conexion->descargararchivo($row["ADJUNTO_PROGRAMAOPERATIVO"]);
?>




<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="programaOPERA[]" id="programaOPERA" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_PROGRAMAOPERATIVO"]; ?></td>
<td ><?php echo $urladjunto_PROGRAMA; ?></td>
<td ><?php echo $row["OBSERVACIONES_PROGRAMAOPERATIVO"]; ?></td>
<td ><?php echo $row["FECHA_PROGRAMAOPERATIVO"]; ?></td>
<td><?php if($conexion->variablespermisos('','PROGRAMA_OPERATIVO','modificar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataPROGRAMAmodifica" /><?php } ?>
</td>
<td><?php if($conexion->variablespermisos('','PROGRAMA_OPERATIVO','borrar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataPROGRAMAborrar" /><?php } ?>
</td>
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