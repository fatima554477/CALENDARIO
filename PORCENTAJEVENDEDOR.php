<?php 

	$utilidad89a = $altaeventos->grandes_totales_ingresos_egresos($NUMERO_EVENTO);
?>

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar43" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar43" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; PORCENTAJE DEL VENDEDOR</p></strong>


<div  id="mensajePORVENDEDOR2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target43" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
    <?php if($conexion->variablespermisos('','PORCENTAJE','guardar')=='si'  and $var_bloquea_fecha=='no'){ ?>  
                      <form class="row g-3 needs-validation was-validated" id="PORVENDEDORform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					  
					  
					  

						
                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">NOMBRE DEL COLABORADOR:</label></strong>
<?php
$encabezadoA = '';
$queryper = $conexion->colaborador_generico_bueno();
$encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" id="DOCUMENTO_PORVENDEDOR" required="" name="DOCUMENTO_PORVENDEDOR"  placeholder="SELECIONA UNA OPCIÓN">
<option> SELECIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($_SESSION['idem']==$row['idRelacion']){
//$select='selected';
//}

$option2 .= '<option style="background: #'.$fondos[$num].'" '.$select.' 
value="'.$row['NOMBRE_1'].' '.$row['APELLIDO_PATERNO'].'">'.$row['NOMBRE_1'].' '.$row['APELLIDO_PATERNO'].
'</option>';
}
echo $encabezadoA.$option2.'</select>';		
?>                          <div class="valid-feedback">Bien!</div>
                        </div>


	
                        <div class="col-md-4"style="background:#d4f6c8"  class="input-group">

                        <strong>   <label for="validationCustom01" class="form-label">PORCENTAJE VENDEDOR</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">%</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $ADJUNTO_PORVENDEDOR; ?>" name="ADJUNTO_PORVENDEDOR" onkeyup="comasainput('ADJUNTO_PORVENDEDOR')"  >
</div></div>


<!--<div class="col-md-4"style="background:#fbeee6" class="input-group">

<strong>   <label for="validationCustom01" class="form-label">CANTIDAD</label></strong>


<div class="input-group mb-3"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $CANTIDAD_PORVENDEDOR; ?>" name="CANTIDAD_PORVENDEDOR" onkeyup="comasainput('CANTIDAD_PORVENDEDOR')"  >
</div></div>-->


 <div class="col-md-4"style="background:#fbeee6">
<strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong>
<input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_PORVENDEDOR ?>" required="" name="OBSERVACIONES_PORVENDEDOR">
<div class="valid-feedback">Bien!</div>                  
</div>
						  <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_PORVENDEDOR">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hPORVENDEDOR" name="hPORVENDEDOR"/>     
 
  <table>
  <tr>
  
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_PORVENDEDOR">GUARDAR</button><div style="
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


id="mensajePORVENDEDOR"/></th><?php } ?></tr></table>
           
            
                
 </form>
 <?php if($conexion->variablespermisos('','PORCENTAJE','email')=='si'  and $var_bloquea_fecha=='no'){ ?>

                  <form name="form_emil_PORVENDEDOR" id="form_emil_PORVENDEDOR">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_PORVENDEDOR" id="EMAIL_PORVENDEDOR" class="form-control" aria-label="With textarea"><?php echo $EMAIL_PORVENDEDOR; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_PORVENDEDOR">ENVIAR POR EMAIL</button></td>  
                
           </tr><?php } ?></table>


           <?php
$querycontras = $altaeventos->Listado_PORVENDEDOR();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_PORVENDEDOR' name='reset_PORVENDEDOR'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">NOMBRE DEL VENDEDOR</th>
<th width="20%"style="background:#c9e8e8">PORCENTAJE</th>
<th width="20%"style="background:#c9e8e8">CANTIDAD</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
while($row = mysqli_fetch_array($querycontras))
{
?>
                                                              
<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="fotosve[]" id="fotosve" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_PORVENDEDOR"]; ?></td>
<td ><?php echo $row["ADJUNTO_PORVENDEDOR"]; ?></td>
<td ><?php echo number_format($row["ADJUNTO_PORVENDEDOR"] * ($utilidad89a  * 0.01),2,'.',','); ?></td>
<td ><?php echo $row["OBSERVACIONES_PORVENDEDOR"]; ?></td>
<td ><?php echo $row["FECHA_PORVENDEDOR"]; ?></td>
<?php if($conexion->variablespermisos('','PORCENTAJE','modificar')=='si'  and $var_bloquea_fecha=='no'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_PORVENDEDOR" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','PORCENTAJE','borrar')=='si'  and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataPORVENDEDORborrar" />
</td><?php } ?>
</tr>
<?php
$PORTOTAL1 += $row["ADJUNTO_PORVENDEDOR"];
$PORCTOTAL1 += $row["ADJUNTO_PORVENDEDOR"] * ($utilidad89a  * 0.01);
}
?>

<tr>
<td colspan='2' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td style="text-align:center;"><?php echo $PORTOTAL1; ?></td>
<td style="text-align:center;">$ <?php echo number_format($PORCTOTAL1,2,'.',','); ?></td><td></td></tr>
</table>
</tbody>
</table>


</tbody> 

</tbody>

</form>
</div>
</div>
</div>
</div>
</div>



