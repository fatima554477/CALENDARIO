

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar38" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar38" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; EQUIPO DE OFICINA </p></strong></div>


<div  id="mensajeOFICINA2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target38" style="display:block;" class="content2">
        <div class="card">
        <div class="card-body" id='actualizaoficina'>
                <?php if($conexion->variablespermisos('','OFICINA','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="OFICINAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">




					  <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">EQUIPO DE OFICINA:</label></th>
         <td>

                        <span>
<?php
$encabezado = '';
$queryper = $conexion->lista_inventario3();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="OFICINA_EQUIPO" required="" name="OFICINA_EQUIPO" onchange="OBTENER_OFICINA()">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($OFICINA_EQUIPO==$row1['I_ARTICULO']){$select = "selected";};

$option7 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'">'.$row1['I_ARTICULO'].'</option>';
}
echo $encabezado.$option7.'</select>';		
?>
</span>

 </td>                        
         </tr>             
  
				 

		 
		 
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CANTIDAD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_CANTIDAD; ?>"  name="OFICINA_CANTIDAD" ></td>
         </tr>
        
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FOTO:</label></th>

         <td id="fotos_oficina">

 <!--<input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_FOTO; ?>"  name="OFICINA_FOTO"  placeholder="">-->
<?php
$I_FOTOS = $_SESSION['I_FOTOS'];
if($_SESSION['I_FOTOS']!=''){
echo $conexion->descargararchivo($I_FOTOS);
}

?>
<input type="hidden" name="OFICINA_FOTO" value="<?php echo $I_FOTOS; ?>">

 </td>
 


</tr>
      
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE ENTREGA:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="tot" required=""   value="<?php echo $OFICINA_ENTREGA; ?>"  name="OFICINA_ENTREGA"  placeholder="">
 </div>
 </td>
         </tr>



          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_LUGAR; ?>"  name="OFICINA_LUGAR"  placeholder="" >
 </div>
 </td>
         </tr>
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE ENTREGA</label></th>
         <td><input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_HORA; ?>"  name="OFICINA_HORA"  placeholder=""></td>
         </tr>
        
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE DEVOLUCIÓN:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_DEVOLU; ?>"  name="OFICINA_DEVOLU"  placeholder="">
 </div>
 </td>
         </tr>
          <tr style="background:#ebf8fa">  

         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE DEVOLUCIÓN:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_LUDEVO; ?>"  name="OFICINA_LUDEVO" placeholder=""></td>
         </tr>
         	 
           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE DEVOLUCIÓN:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_HORADEVO; ?>"  name="OFICINA_HORADEVO"  placeholder="">
 </div>
 </td>
         </tr>
         <tr style="background:#d4f1d3">    
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE SOLICITUD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo date('Y-m-d'); ?>"  name="OFICINA_SOLICITUD"  placeholder="" readonly="readonly"></td>
         </tr>
        
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">DIAS SOLICITADOS:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_DIAS; ?>"  name="OFICINA_DIAS" placeholder="">
 </div>
 </td>
         </tr>
	 <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="OFICINA_COSTO" required="" value="<?php echo number_format($OFICINA_COSTO,2,'.',','); ?>" onkeyup="comasainput('OFICINA_COSTO')" name="OFICINA_COSTO"  onclick="total_cantidad_x_precio4()">
 </div>
 </td>
         </tr>
         </tr>
        
		   <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">I.V.A.</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OFICINA_IVA; ?>"  name="OFICINA_IVA" placeholder="">
 </div>
 </td>
         </tr>
        
	 <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">SUB TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="OFICINA_SUB" required="" value="<?php echo number_format($OFICINA_SUB,2,'.',','); ?>" onkeyup="comasainput('OFICINA_SUB')" name="OFICINA_SUB" placeholder="">
 </div>
 </td>
         </tr>
        

         <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="OFICINA_TOTAL" required="" value="<?php echo number_format($OFICINA_TOTAL,2,'.',','); ?>" onkeyup="comasainput('OFICINA_TOTAL')" name="OFICINA_TOTAL" placeholder="">
 </div>
 </td>
         </tr>
         

        
            <tr style="background:#ebf8fa">     
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $OFICINA_OBSERVA; ?>"  name="OFICINA_OBSERVA" placeholder="">
 </div>
 </td>
         </tr>


 
                  </table><table><tr>


   
 
                                    
    <input type="hidden" value="HOFICINA" name="HOFICINA"/>     
 
        
 <td>
           
</td>
      

 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="GUARDAR_OFICINA" name="GUARDAR_OFICINA">GUARDAR</button><div style="
 position: absolute;
    top: 75%; 
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
    1px 30px 60px rgba(16,16,16,0.4);"  id="mensajeOFICINA"></td><?php } ?></tr>
           
                   </table>

                  </form>
				  
                  <?php if($conexion->variablespermisos('','OFICINA','email' )=='si' and $var_bloquea_fecha=='no'){ ?>	  
                
			<form name="form_emil_OFICINA" id="form_emil_OFICINA">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_OFICINA" id="EMAIL_OFICINA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_OFICINA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_OFICINA">ENVIAR POR EMAIL</button></td>   
	
			</tr></table><?php } ?>

            <?php
$querycontras = $altaeventos->Listado_OFICINA();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_OFICINA' name='reset_OFICINA'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">OFICINA</th>
<th width="20%"style="background:#c9e8e8">CANTIDAD</th>
<th width="20%"style="background:#c9e8e8">FOTO</th>
<th width="20%"style="background:#c9e8e8">FECHA DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">LUGAR DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">HORA DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">FECHA DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">LUGAR DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">HORA DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">FECHA DE SOLICITUD</th>
<th width="20%"style="background:#c9e8e8">DIAS SOLICITADOS</th>
<th width="20%"style="background:#c9e8e8">COSTO</th>
<th width="20%"style="background:#c9e8e8">SUB TOTAL</th>
<th width="20%"style="background:#c9e8e8">IVA</th>
<th width="20%"style="background:#c9e8e8">TOTAL</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>


</tr>

<?php
$urlOFICINA_FOTO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlOFICINA_FOTO = $conexion->descargararchivo($row["OFICINA_FOTO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="OFICINA[]" id="OFICINA" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $altaeventos->nombre_oficina($row["OFICINA_EQUIPO"]);?></td>
<td ><?php echo $row["OFICINA_CANTIDAD"]; ?></td>
<td ><?php echo $urlOFICINA_FOTO; ?></td>
<td ><?php echo $row["OFICINA_ENTREGA"]; ?></td>
<td ><?php echo $row["OFICINA_LUGAR"]; ?></td>
<td ><?php echo $row["OFICINA_HORA"]; ?></td>
<td ><?php echo $row["OFICINA_DEVOLU"]; ?></td>
<td ><?php echo $row["OFICINA_LUDEVO"]; ?></td>
<td ><?php echo $row["OFICINA_HORADEVO"]; ?></td>
<td ><?php echo $row["OFICINA_SOLICITUD"]; ?></td>
<td ><?php echo $row["OFICINA_DIAS"]; ?></td>
<td ><?php echo $row["OFICINA_COSTO"]; ?></td>
<td ><?php echo $row["OFICINA_SUB"]; ?></td>
<td ><?php echo $row["OFICINA_IVA"]; ?></td>
<td ><?php echo $row["OFICINA_TOTAL"]; ?></td>
<td ><?php echo $row["OFICINA_OBSERVA"]; ?></td>
<?php if($conexion->variablespermisos('','OFICINA','modificar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_OFICINA" /></td><?php } ?>
<?php if($conexion->variablespermisos('','OFICINA','borrar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataOFICINAborrar" />
</td><?php } ?>
</tr>
<?php
$OFISUNTOTAL1 += $row["OFICINA_SUB"];
$OFIIVA1 += $row["OFICINA_IVA"];
$OFITOTAL1 += $row["OFICINA_TOTAL"];
}
?>

<tr>
<td colspan='13' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td>$ <?php echo number_format($OFISUNTOTAL1,2,'.',','); ?></td>
<td>$ <?php echo number_format($OFIIVA1,2,'.',','); ?></td>
<td>$ <?php echo number_format($OFITOTAL1,2,'.',','); ?></td><td></td></tr>
</table>
</tbody>			

			</form>
                  
</div>
</div> 
</div>
</div> 
</div>

