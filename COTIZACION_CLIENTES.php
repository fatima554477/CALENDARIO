


<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar47" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar47" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; COTIZACIONES PARA CLIENTES</p></strong>


<div  id="mensajeCOTICLIENTES2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target47" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">

                      <form class="row g-3 class="needs-validation was-validated" enctype="multipart/form-data" id="COTICLIENTESform" method="post" novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					 
 
                      <table class="table mb-0 table-striped">
					  

<tr style="background:#f7edf8">
    <th><strong><label for="validationCustom01" class="form-label">NÚMERO DE COTIZACIÓN:</label></strong></th>
    <td>
        <input type="text" class="form-control"  
               value="Se asignará automáticamente" 
               required="" 
			   id="NOMBRE_CLIENTES"
               name="NOMBRE_CLIENTES" readonly>
    </td>
</tr>
					  
					                        <tr style="background:#f7edf8">

                      <th> <strong>   <label for="validationCustom01" class="form-label">NOMBRE DE LA COTIZACIÓN:</label></strong></th>
                      <td><input type="text" class="form-control" id="validationCustom01" value="<?php echo $NOMBRE_COTIZACION; ?>" required="" name="NOMBRE_COTIZACION"></td>
   
                      </tr>

                      <tr style="background:#eff9eb">

   <th> <strong>   <label for="validationCustom01" class="form-label">MONTOS:</label></strong></th>


  <td class="input-group mb-3" style="background:#eff9eb"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $DOCUMENTO_COTICLIENTES; ?>" name="DOCUMENTO_COTICLIENTES"  onkeyup="comasainput('DOCUMENTO_COTICLIENTES')" >
                     </td>
                    </tr>
						
						
                        <tr style="background:#f7edf8">

    <th> <strong>   <label  class="form-label">DOCUMENTO:</label></strong></th>
 <td><input type="file" name="ADJUNTO_COTICLIENTES"  class="form-control"  value="<?php echo $ADJUNTO_COTICLIENTES; ?>"  ></td>
                          
                     </tr>
					 
					 
                        <tr style="background:#eff9eb">

                        <th><strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong></th>
                          <td><input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_COTICLIENTES ?>" required="" name="OBSERVACIONES_COTICLIENTES"></td>
                       
                        
                   </tr><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_COTICLIENTES">
           
           </td></tr></table>



                                    
       <input type="hidden" value="hCOTICLIENTES" name="hCOTICLIENTES"/> 
 
  <table>
    <?php if($conexion->variablespermisos('','COTIZACION_CLIENTES','guardar')=='si'){ ?>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_COTICLIENTES">GUARDAR</button><div style="

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


id="mensajeCOTICLIENTES"/></th><?php } ?></tr></table>
           
            
                
 </form><table>

<?php if($conexion->variablespermisos('','COTIZACION_CLIENTES','email')=='si'){ ?>
                  <form name="form_emil_COTICLIENTES" id="form_emil_COTICLIENTES">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_COTICLIENTES" id="EMAIL_COTICLIENTES" class="form-control" aria-label="With textarea"><?php echo $EMAIL_COTICLIENTES; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_COTICLIENTES">ENVIAR POR EMAIL</button></td><?php } ?> 
                
           </tr></table>


           <?php
$querycontras = $altaeventos->Listado_COTICLIENTES();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_COTICLIENTES' name='reset_COTICLIENTES'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>
<th width="20%"style="background:#c9e8e8">NÚMERO DE COTIZACIÓN</th>  
<th width="20%"style="background:#c9e8e8">NOMBRE DE LA COTIZACIÓN</th>  
<th width="20%"style="background:#c9e8e8">MONTO</th>
<th width="20%"style="background:#c9e8e8">DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
$urlADJUNTO_COTICLIENTES ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_COTICLIENTES = $conexion->descargararchivo($row["ADJUNTO_COTICLIENTES"]);
?>

<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="cotiCLIENTES[]" value="<?php echo $row["id"]; ?>"/> </td>


<td ><?php echo $row["NOMBRE_CLIENTES"]; ?></td>


<td ><?php echo $row["NOMBRE_COTIZACION"]; ?></td>


<td >$<?php echo number_format($row["DOCUMENTO_COTICLIENTES"],2,'.',',');?></td>


<td ><?php echo $urlADJUNTO_COTICLIENTES; ?></td>


<td ><?php echo $row["OBSERVACIONES_COTICLIENTES"]; ?></td>


<td ><?php echo $row["FECHA_COTICLIENTES"]; ?></td>


<?php if($conexion->variablespermisos('','COTIZACION_CLIENTES','modificar')=='si'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_COTICLIENTES" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','COTIZACION_CLIENTES','borrar')=='si'){ ?>

<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataCOTICLIENTESborrar" />
</td><?php } ?>
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




