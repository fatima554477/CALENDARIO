

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar40" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar40" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; BOTIQUÍN DE PRIMEROS AUXILIOS</p></strong></div>


<div  id="mensajeBOTIQUIN2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target40" style="display:block;" class="content2">
        <div class="card">
        <div class="card-body" id='actualizabotiquin'>
                <?php if($conexion->variablespermisos('','BOTIQUIN','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="BOTIQUINform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">



					  <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">BOTIQUÍN DE PRIMEROS AUXILIOS:</label></th>
         <td>

                        <span>
<?php
$encabezado = '';
$queryper = $conexion->lista_inventario4();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="BOTIQUIN_EQUIPO" required="" name="BOTIQUIN_EQUIPO" onchange="OBTENER_BOTIQUIN()">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($BOTIQUIN_EQUIPO==$row1['I_ARTICULO']){$select = "selected";};

$option55 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'^^'.$row1['I_ARTICULO'].'">'.$row1['I_ARTICULO'].'</option>';
}
echo $encabezado.$option55.'</select>';		
?></td>

    </tr>			 


		 
		 
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CANTIDAD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_CANTIDAD; ?>"   name="BOTIQUIN_CANTIDAD"></td>
         </tr>
        
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FOTO:</label></th>

         <td id="fotos_botiquin">

 <!--<input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_FOTO; ?>"  name="BOTIQUIN_FOTO"  placeholder="">-->
<?php
$I_FOTOS = $_SESSION['I_FOTOS'];
if($_SESSION['I_FOTOS']!=''){
echo $conexion->descargararchivo($I_FOTOS);
}

?>
<input type="hidden" name="BOTIQUIN_FOTO" value="<?php echo $I_FOTOS; ?>">

 </td>
 


</tr>
      
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE ENTREGA:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="tot" required=""   value="<?php echo $BOTIQUIN_ENTREGA; ?>"  name="BOTIQUIN_ENTREGA"  placeholder="">
 </div>
 </td>
         </tr>








          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_LUGAR; ?>"  name="BOTIQUIN_LUGAR"  placeholder="" >
 </div>
 </td>
         </tr>
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE ENTREGA</label></th>
         <td><input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_HORA; ?>"  name="BOTIQUIN_HORA"  placeholder=""></td>
         </tr>
        
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE DEVOLUCIÓN:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_DEVOLU; ?>"  name="BOTIQUIN_DEVOLU"  placeholder="">
 </div>
 </td>
         </tr>
          <tr style="background:#ebf8fa">  

         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE DEVOLUCIÓN:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_LUDEVO; ?>"  name="BOTIQUIN_LUDEVO" placeholder=""></td>
         </tr>
         	 
           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE DEVOLUCIÓN:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_HORADEVO; ?>"  name="BOTIQUIN_HORADEVO"  placeholder="">
 </div>
 </td>
         </tr>
           <tr style="background:#ebf8fa">    
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE SOLICITUD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo date('Y-m-d'); ?>"  name="BOTIQUIN_SOLICITUD"  placeholder="" readonly="readonly"></td>
         </tr>
        
	 <tr style="background:#d4f1d3">  
         <th scope="row"> <label for="validationCustom03" class="form-label">DIAS SOLICITADOS:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_DIAS; ?>"  name="BOTIQUIN_DIAS" placeholder="">
 </div>
 </td>
         </tr>
	 <tr style="background:#d4f1d3">  
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="BOTIQUIN_COSTO" required="" value="<?php echo number_format($BOTIQUIN_COSTO,2,'.',','); ?>" onkeyup="comasainput('BOTIQUIN_COSTO')" name="BOTIQUIN_COSTO" onclick="total_cantidad_x_precio5()">
 </div>
 </td>
         </tr>
         </tr>
        
		   <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">I.V.A.</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $BOTIQUIN_IVA; ?>"  name="BOTIQUIN_IVA" placeholder="">
 </div>
 </td>
         </tr>
        
	 <tr style="background:#d4f1d3">  
         <th  scope="row"> <label for="validationCustom03" class="form-label">SUB TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="BOTIQUIN_SUB" required="" value="<?php echo number_format($BOTIQUIN_SUB,2,'.',','); ?>" onkeyup="comasainput('BOTIQUIN_SUB')" name="BOTIQUIN_SUB" placeholder="">
 </div>
 </td>
         </tr>
        

         <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="BOTIQUIN_TOTAL" required="" value="<?php echo number_format($BOTIQUIN_TOTAL,2,'.',','); ?>" onkeyup="comasainput('BOTIQUIN_TOTAL')" name="BOTIQUIN_TOTAL" placeholder="">
 </div>
 </td>
         </tr>
         

        
            <tr style="background:#ebf8fa">     
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $BOTIQUIN_OBSERVA; ?>"  name="BOTIQUIN_OBSERVA" placeholder="">
 </div>
 </td>
         </tr>


 
                  </table><table><tr>


   
 
                                    
    <input type="hidden" value="HBOTIQUIN" name="HBOTIQUIN"/>     
 
        
 <td>
           
</td>
      

 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="GUARDAR_BOTIQUIN" name="GUARDAR_BOTIQUIN">GUARDAR</button>
<div style="
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
    1px 30px 60px rgba(16,16,16,0.4);"   id="mensajeBOTIQUIN"></td><?php } ?></tr>
           
                   </table>

                  </form>
				  
				  
                  <?php if($conexion->variablespermisos('','BOTIQUIN','email')=='si' and $var_bloquea_fecha=='no'){ ?>
			<form name="form_email_BOTIQUIN" id="form_email_BOTIQUIN">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_BOTIQUIN" id="EMAIL_BOTIQUIN" class="form-control" aria-label="With textarea"><?php echo $EMAIL_BOTIQUIN; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_BOTIQUIN">ENVIAR POR EMAIL</button></td>   
	
			</tr></table><?php } ?>

            <?php
$querycontras = $altaeventos->Listado_BOTIQUIN();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_BOTIQUIN' name='reset_BOTIQUIN'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">BOTIQUIN</th>
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
$urlBOTIQUIN_FOTO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlBOTIQUIN_FOTO = $conexion->descargararchivo($row["BOTIQUIN_FOTO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="BOTIQUIN[]" id="BOTIQUIN" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["BOTIQUIN_EQUIPO"]; ?></td>
<td ><?php echo $row["BOTIQUIN_CANTIDAD"]; ?></td>
<td ><?php echo $urlBOTIQUIN_FOTO; ?></td>
<td ><?php echo $row["BOTIQUIN_ENTREGA"]; ?></td>
<td ><?php echo $row["BOTIQUIN_LUGAR"]; ?></td>
<td ><?php echo $row["BOTIQUIN_HORA"]; ?></td>
<td ><?php echo $row["BOTIQUIN_DEVOLU"]; ?></td>
<td ><?php echo $row["BOTIQUIN_LUDEVO"]; ?></td>
<td ><?php echo $row["BOTIQUIN_HORADEVO"]; ?></td>
<td ><?php echo $row["BOTIQUIN_SOLICITUD"]; ?></td>
<td ><?php echo $row["BOTIQUIN_DIAS"]; ?></td>
<td ><?php echo $row["BOTIQUIN_COSTO"]; ?></td>
<td ><?php echo $row["BOTIQUIN_SUB"]; ?></td>
<td ><?php echo $row["BOTIQUIN_IVA"]; ?></td>
<td ><?php echo $row["BOTIQUIN_TOTAL"]; ?></td>
<td ><?php echo $row["BOTIQUIN_OBSERVA"]; ?></td>
<?php if($conexion->variablespermisos('','BOTIQUIN','modificar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_BOTIQUIN" /></td><?php } ?>
<?php if($conexion->variablespermisos('','BOTIQUIN','borrar')=='si' and $var_bloquea_fecha=='no'){ ?>                   
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataBOTIQUINborrar" />
</td><?php } ?>
</tr>
<?php
$BOSUNTOTAL1 += $row["BOTIQUIN_SUB"];
$BOIVA1 += $row["BOTIQUIN_IVA"];
$BOTOTAL1 += $row["BOTIQUIN_TOTAL"];
}
?>

<tr>
<td colspan='13' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td>$ <?php echo number_format($BOSUNTOTAL1,2,'.',','); ?></td>
<td>$ <?php echo number_format($BOIVA1,2,'.',','); ?></td>
<td>$ <?php echo number_format($BOTOTAL1,2,'.',','); ?></td><td></td></tr>
</table>
</tbody>			

			</form>
                  
</div>
</div> 
</div>
</div> 
</div>

