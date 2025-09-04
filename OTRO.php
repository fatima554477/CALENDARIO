<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar5" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar5" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; ROOMING LIST</p></strong>


<div  id="mensajeROOMING">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div>
									</div>
									</div>
									</div>
							
	        <div id="target5" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
                      <form class="row g-3 needs-validation was-validated" id="ROOMINGform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">


                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">NOMBRE DEL DOCUMENTO:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_ROOMING ; ?>" required="" name="DOCUMENTO_ROOMING ">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_ROOMING; ?>" required="" name="ADJUNTO_ROOMING">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_ROOMING; ?>" required="" name="OBSERVACIONES_ROOMING">
                          <div class="valid-feedback">Bien!</div>
                        
                          </div><div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_ROOMING">
           
           </td></tr></div></form>



                                    
    <input type="hidden" value="hROOMING" name="hROOMING"/>     
 
  
      
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_ROOMING">GUARDAR</button></th></tr>
           
                   </table>
                  </form>
                  <tr>
                  <form name="form_emai_altaevento" id="form_emai_altaevento">
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_ALTA_EVENTOS" id="EMAIL_ALTA_EVENTOS" class="form-control" aria-label="With textarea"><?php echo $EMAIL_ALTA_EVENTOS; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_ALTA_EVENTOS">ENVIAR POR EMAIL</button></td>   
                
           </tr></table></form>


<?php
$querycontras = $altaeventos->Listado_rooming();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_rooming' name='reset_rooming'>
<tr>
<th width="20%"style="background:#c9e8e8">DOCUMENTO_ROOMING_</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES_ROOMING</th>
<th width="20%"style="background:#c9e8e8">FECHA_ROOMING</th>

<th width="20%"style="background:#c9e8e8">ADJUNTO_ROOMING</th>
</tr>
<?php
while($row = mysqli_fetch_array($querycontras))
{
			if($row["ADJUNTO_ROOMING"]!=""){
$urladjunto_cierre = "<a target='_blank'
href='includes/archivos/".$row["ADJUNTO_ROOMING"]."'>Visualizar!</a>";
}else{
$urladjunto_cierre="";
}
?>
<tr style='background:#f5f9fc'>
<td ><?php echo $row["DOCUMENTO_ROOMING_"]; ?></td>
<td ><?php echo $row["OBSERVACIONES_ROOMING"]; ?></td>
<td ><?php echo $row["FECHA_ROOMING"]; ?></td>

<td ><?php echo $urladjunto_cierre; ?></td>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataROOMINGmodifica" /></td>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataROMMINGborrar" /></td>
</tr>
<?php
}
?>
</table>
</tbody>
</div>
</div>
 
</div>
</div>  
</div>  