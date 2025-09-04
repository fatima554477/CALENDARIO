
<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar45" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar45" style="cursor:pointer;"/>&nbsp;&nbsp;FEE COBRADO AL CLIENTE</p></strong>


<div  id="mensajeFEECOBRADO">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventosfee ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $eventosfee ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target45" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
   <?php if($conexion->variablespermisos('','FEE_COBRADO','guardar')=='si'  and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="FEECOBRADOform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">CONCEPTO:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $DOCUMENTO_FEECOBRADO; ?>" required="" name="DOCUMENTO_FEECOBRADO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">FACTURA:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_FEECOBRADO; ?>" required="" name="ADJUNTO_FEECOBRADO">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                  <strong>   <label for="validationCustom01" class="form-label">MONTOS:</label></strong>


                  <div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $MONTO_FEECOBRADO; ?>" name="MONTO_FEECOBRADO" onkeyup="comasainput('MONTO_FEECOBRADO')"  >
                  </div></div>
                          <div><tr>
                          <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_FEECOBRADO">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hFEECOBRADO" name="hFEECOBRADO"/>     
   
 <td  style="float:right" >
           

 <button style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_FEECOBRADO">GUARDAR</button></td><?php } ?>

           
            
                
 </form>


  <?php if($conexion->variablespermisos('','FEE_COBRADO','email')=='si'  and $var_bloquea_fecha=='no'){ ?> 
                  <form name="form_emil_FEECOBRADO" id="form_emil_FEECOBRADO">
				
             <td><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_FEECOBRADO" id="EMAIL_FEECOBRADO" class="form-control" aria-label="With textarea"><?php echo $EMAIL_FEECOBRADO; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_FEECOBRADO">ENVIAR POR EMAIL</button></td>  <?php } ?>
                
           </tr>
   

           <?php
$querycontras = $altaeventos->Listado_FEECOBRADO();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_FEECOBRADO' name='reset_FEECOBRADO'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">CONCEPTO</th>
<th width="20%"style="background:#c9e8e8">MONTO</th>
<th width="20%"style="background:#c9e8e8">FACTURA</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
$urlADJUNTO_FEECOBRADO ='';



while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_FEECOBRADO = $conexion->descargararchivo($row["ADJUNTO_FEECOBRADO"]);
?>

<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="feecobrado[]" id="feecobrado" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_FEECOBRADO"]; ?></td>
<td >$<?php echo number_format($row["MONTO_FEECOBRADO"],2,'.',',');?></td>
<td ><?php echo $urlADJUNTO_FEECOBRADO; ?></td>
<td ><?php echo $row["FECHA_FEECOBRADO"]; ?></td>
<?php if($conexion->variablespermisos('','FEE_COBRADO','modificar'  and $var_bloquea_fecha=='no')=='si'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_FEECOBRADO" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','FEE_COBRADO','borrar')=='si'  and $var_bloquea_fecha=='no'){ ?> 
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataFEECOBRADOborrar" />
</td><?php } ?>
</tr>
</form>



<?php
$total_resultado += $row["MONTO_FEECOBRADO"];
/*
$porcentaje = $row["porcentaje"] ;
$resultado = $row["resultado"] ;
$resultado = ($total_resultado / $porcentaje ) *100;
*/
}
$id = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
$porcentaje = $altaeventos->var_porcentajefee2($id);
$resultado = $altaeventos->var_resultado2($id);
?>

 <form class="row g-3 needs-validation was-validated" id="porcentajefeeform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">	
<div  id="mensajeporcentajefee"> 

<tr>
<td colspan='2' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>


<td style="text-align:center;"><div class="input-group mb-3"> <span class="input-group-text">$</span>

<input style="background:#efdcf0" type="text" class="total_resultado" aria-label="Amount (to the nearest dollar)" id="total_resultado"   value="<?php echo number_format($total_resultado,2,'.',','); ?>"  name="total_resultado" readonly="readonly">


                  </div></td>

<td><div class="input-group mb-3"> <span class="input-group-text">%</span><input  type="text" class="porcentaje"  aria-label="Amount (to the nearest dollar)" value="<?php echo $porcentaje; ?>"  id="porcentaje"  name="porcentaje"   placeholder="PORCENTAJE AQUI">
</div></td>

<td style="text-align:center;"><div class="input-group mb-3"> <span class="input-group-text">$</span>

<input style="background:#efdcf0" type="text" class="resultado" aria-label="Amount (to the nearest dollar)" id="resultado"   value="<?php echo number_format($resultado,2,'.',','); ?>"  name="resultado" placeholder="resultado" readonly="readonly">


                  </div></td>
				  <?php if($conexion->variablespermisos('','FEE_COBRADO','guardar' )=='si'  and $var_bloquea_fecha=='no'){ ?>
<td style="text-align:right;">

<button style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_PORCENTAJE2">GUARDAR</button></td><?php } ?>
    <input type="hidden" value="HPorcentaje" name="HPorcentaje"/>    
	
</tr>
</table>
</tbody>
			</form>
                  
</div>
</div> 
</div>
</div> 
</div> 
</div> 
