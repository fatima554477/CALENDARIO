<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar3" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar3" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; DOCUMENTOS DEL  CIERRE </p></strong>


<div  id="mensajecierre2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target3" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
          <?php if($conexion->variablespermisos('','DOCUMENTO_CIERRE','guardar')=='si'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="cierreEVENTOSform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 

                      <div class="col-md-4"style="background:#fef5e7">
 

   <strong><label for="validationCustom02" class="form-label">NOMBRE DEL DOCUMENTO:</label></strong>

	<span id="despleResetCierre">
	<?php
	/*linea para multiples colores*/
	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
	$num = 0;
	/*linea para multiples colores*/

	$queryper = $altaeventos->Listado_nuevocierre();

	$opcionesDatalist = '';
	while($row1 = mysqli_fetch_array($queryper))
	{
		/*linea para multiples colores*/
		if($num==8){$num=0;}else{$num++;}
		/*linea para multiples colores*/

		$opcionesDatalist .= '<option data-color="#'.$fondos[$num].'" value="'.htmlspecialchars($row1['nuevo_documento_cierre']).'">';
	}
	?>
	<input
		type="text"
		class="form-control"
		id="DOCUMENTO_cierre"
		name="DOCUMENTO_cierre"
		list="lista_DOCUMENTO_cierre"
		value="<?php echo $DOCUMENTO_cierre; ?>"
		placeholder="ESCRIBE O SELECCIONA UNA OPCIÓN"
		required
		autocomplete="off"
		oninvalid="this.setCustomValidity('FALTA SELECCIONAR O ESCRIBIR EL NOMBRE DEL DOCUMENTO.')"
		oninput="this.setCustomValidity('')"
	/>
	<datalist id="lista_DOCUMENTO_cierre">
		<?php echo $opcionesDatalist; ?>
	</datalist>
	</span>

  <div class="invalid-feedback">FALTA INGRESAR EL NOMBRE DEL DOCUMENTO.</div>

   </div>

                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $adjunto_cierre; ?>" required="" name="adjunto_cierre">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
                        <div class="col-md-4"style="background:#fbeee6">

                         <strong>   <label for="OBSERVACIONES_cierre" class="form-label">OBSERVACIONES:</label></strong>
                          <input type="text" class="form-control" id="OBSERVACIONES_cierre" value="<?php echo $OBSERVACIONES_cierre; ?>" name="OBSERVACIONES_cierre">
                        
                          </div>
<div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="fecha_cierre">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hCIERRE" name="hCIERRE"/>     
 
  
      <table><tr>
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_CIERRE">GUARDAR</button><div style="
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


id="mensajecierre"/></th></tr>
 </table>
<?php } ?>

				   
				   
                  </form>



                  <?php if($conexion->variablespermisos('','DOCUMENTO_CIERRE','email')=='si'){ ?>
                  <form name="form_emai_cierre" id="form_emai_cierre">
			  
		  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_cierre_e" id="EMAIL_cierre_e" class="form-control" aria-label="With textarea"><?php echo $EMAIL_cierre_e; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_email_cierre">ENVIAR POR EMAIL</button></td>   
                
           </tr>
<?php } ?>


 






<?php
$querycontras = $altaeventos->Listado_cierre();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_cierre' name='reset_cierre'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">NOMBRE DEL DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>


<?php
$urladjunto_cierre ='';
while($row = mysqli_fetch_array($querycontras))
{
	$archivo_cierre = $row["adjunto_cierre"];
	$extension_cierre = strtolower(pathinfo($archivo_cierre, PATHINFO_EXTENSION));

	if ($archivo_cierre !== '' && in_array($extension_cierre, array('xls', 'xlsx', 'xlsm'), true)) {
		$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
		$ruta_base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
		$url_archivo = $protocolo.'://'.$_SERVER['HTTP_HOST'].$ruta_base.'/includes/archivos/'.rawurlencode($archivo_cierre);
		$url_visualizador = 'https://view.officeapps.live.com/op/view.aspx?src='.rawurlencode($url_archivo);
		$urladjunto_cierre = '<a target="_blank" rel="noopener noreferrer" href="'.htmlspecialchars($url_visualizador, ENT_QUOTES, 'UTF-8').'">Visualizar!</a><br/>';
	} else {
		$urladjunto_cierre = $conexion->descargararchivo($archivo_cierre);
	}
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="cierre[]" id="cierre" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_cierre"]; ?></td>
<td ><?php echo $urladjunto_cierre; ?></td>
<td ><?php echo $row["OBSERVACIONES_cierre"]; ?></td>
<td ><?php echo $row["fecha_cierre"]; ?></td>
<?php if($conexion->variablespermisos('','DOCUMENTO_CIERRE','modificar')=='si'){ ?><td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datacierremodifica" /></td><?php } ?>
<?php if($conexion->variablespermisos('','DOCUMENTO_CIERRE','borrar')=='si'){ ?><td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_datacierreborrar" /></td>
<?php } ?>
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
  