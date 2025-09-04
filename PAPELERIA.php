

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar37" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar37" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; PAPELERIA </p></strong></div>


<div  id="mensajePAPELERIA2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target37" style="display:block;" class="content2">
        <div class="card">
        <div class="card-body" id='actualizapapeleria'>
                <?php if($conexion->variablespermisos('','PAPEEVE','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="PAPELERIAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">



					  <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">PAPELERIA:</label></th>
         <td>

                        <span>
<?php
$encabezado = '';
$queryper = $conexion->lista_inventario2();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="PAPELERIA_EQUIPO" required="" name="PAPELERIA_EQUIPO"  onchange="OBTENER_PAPELERIA()">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($PAPELERIA_EQUIPO==$row1['I_ARTICULO']){$select = "selected";};

$option6 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'">'.$row1['I_ARTICULO'].'</option>';
}
echo $encabezado.$option6.'</select>';		
?>
</span>

 </td>                        
         </tr>           
  
				 

		 
		 
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CANTIDAD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_CANTIDAD; ?>"   name="PAPELERIA_CANTIDAD" ></td>
         </tr>
        
		
		
		
		
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FOTO:</label></th>

         <td id="fotos_papeleria">

 <!--<input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_FOTO; ?>"  name="PAPELERIA_FOTO"  placeholder="">-->
<?php
$I_FOTOS = $_SESSION['I_FOTOS'];
if($_SESSION['I_FOTOS']!=''){
echo $conexion->descargararchivo($I_FOTOS);
}

?>
<input type="hidden" name="PAPELERIA_FOTO" value="<?php echo $I_FOTOS; ?>">

 </td>
 


</tr>
      
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE ENTREGA:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="tot" required=""   value="<?php echo $PAPELERIA_ENTREGA; ?>"  name="PAPELERIA_ENTREGA"  placeholder="">
 </div>
 </td>
         </tr>

          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_LUGAR; ?>"  name="PAPELERIA_LUGAR"  placeholder="" >
 </div>
 </td>
         </tr>
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE ENTREGA</label></th>
         <td><input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_HORA; ?>"  name="PAPELERIA_HORA"  placeholder=""></td>
         </tr>
        
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE DEVOLUCIÓN:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_DEVOLU; ?>"  name="PAPELERIA_DEVOLU"  placeholder="">
 </div>
 </td>
         </tr>
          <tr style="background:#ebf8fa">  

         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE DEVOLUCIÓN:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_LUDEVO; ?>"  name="PAPELERIA_LUDEVO" placeholder=""></td>
         </tr>
         	 
           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE DEVOLUCIÓN:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_HORADEVO; ?>"  name="PAPELERIA_HORADEVO"  placeholder="">
 </div>
 </td>
         </tr>
         <tr style="background:#d4f1d3">    
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE SOLICITUD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo date('Y-m-d'); ?>"  name="PAPELERIA_SOLICITUD"  placeholder="" readonly="readonly"></td>
         </tr>
        
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">DIAS SOLICITADOS:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_DIAS; ?>"  name="PAPELERIA_DIAS" placeholder="">
 </div>
 </td>
         </tr>
	 <tr style="background:#d4f1d3">  
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="PAPELERIA_COSTO" required="" value="<?php echo number_format($PAPELERIA_COSTO,2,'.',','); ?>" onkeyup="comasainput('PAPELERIA_COSTO')" name="PAPELERIA_COSTO" onclick="total_cantidad_x_precio3()">
 </div>
 </td>
         </tr>
         </tr>
        
		   <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">I.V.A.</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $PAPELERIA_IVA; ?>"  name="PAPELERIA_IVA" placeholder="">
 </div>
 </td>
         </tr>
        
	 <tr style="background:#d4f1d3">  
         <th  scope="row"> <label for="validationCustom03" class="form-label">SUB TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="PAPELERIA_SUB" required="" value="<?php echo number_format($PAPELERIA_SUB,2,'.',','); ?>" onkeyup="comasainput('PAPELERIA_SUB')" name="PAPELERIA_SUB" placeholder="">
 </div>
 </td>
         </tr>
        

         <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="PAPELERIA_TOTAL" required="" value="<?php echo number_format($PAPELERIA_TOTAL,2,'.',','); ?>" onkeyup="comasainput('PAPELERIA_TOTAL')" name="PAPELERIA_TOTAL" placeholder="">
 </div>
 </td>
         </tr>
         

        
            <tr style="background:#ebf8fa">     
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $PAPELERIA_OBSERVA; ?>"  name="PAPELERIA_OBSERVA" placeholder="">
 </div>
 </td>
         </tr>


 
                  </table><table><tr>


   
 
                                    
    <input type="hidden" value="HPAPELERIA" name="HPAPELERIA"/>     
 
        
 <td>
           
</td>
      

 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="GUARDAR_PAPELERIA" name="GUARDAR_PAPELERIA">GUARDAR</button><div style="
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
    1px 30px 60px rgba(16,16,16,0.4);"   id="mensajePAPELERIA"></td><?php } ?></tr>
           
                   </table>

                  </form>
				  
				  
                  <?php if($conexion->variablespermisos('','PAPEEVE','email' )=='si' and $var_bloquea_fecha=='no'){ ?>
			<form name="form_emai_PAPELERIA" id="form_emai_PAPELERIA">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_PAPELERIA" id="EMAIL_PAPELERIA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_PAPELERIA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_PAPELERIA">ENVIAR POR EMAIL</button></td>   
	
			</tr></table><?php } ?>

            <?php
$querycontras = $altaeventos->Listado_PAPELERIA();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_PAPELERIA' name='reset_PAPELERIA'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">PAPELERIA</th>
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
$urlPAPELERIA_FOTO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlPAPELERIA_FOTO = $conexion->descargararchivo($row["PAPELERIA_FOTO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="PAPELERIA[]" id="PAPELERIA" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $altaeventos->nombre_papeleria($row["PAPELERIA_EQUIPO"]);?></td>
<td ><?php echo $row["PAPELERIA_CANTIDAD"]; ?></td>
<td ><?php echo $urlPAPELERIA_FOTO; ?></td>
<td ><?php echo $row["PAPELERIA_ENTREGA"]; ?></td>
<td ><?php echo $row["PAPELERIA_LUGAR"]; ?></td>
<td ><?php echo $row["PAPELERIA_HORA"]; ?></td>
<td ><?php echo $row["PAPELERIA_DEVOLU"]; ?></td>
<td ><?php echo $row["PAPELERIA_LUDEVO"]; ?></td>
<td ><?php echo $row["PAPELERIA_HORADEVO"]; ?></td>
<td ><?php echo $row["PAPELERIA_SOLICITUD"]; ?></td>
<td ><?php echo $row["PAPELERIA_DIAS"]; ?></td>
<td ><?php echo $row["PAPELERIA_COSTO"]; ?></td>
<td ><?php echo $row["PAPELERIA_SUB"]; ?></td>
<td ><?php echo $row["PAPELERIA_IVA"]; ?></td>
<td ><?php echo $row["PAPELERIA_TOTAL"]; ?></td>
<td ><?php echo $row["PAPELERIA_OBSERVA"]; ?></td>
<?php if($conexion->variablespermisos('','PAPEEVE','modificar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_PAPELERIA" /></td><?php } ?>
<?php if($conexion->variablespermisos('','PAPEEVE','borrar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataPAPELERIAborrar" />
</td><?php } ?>
</tr>

<?php
$PASUNTOTAL1 += $row["PAPELERIA_SUB"];
$PAIVA1 += $row["PAPELERIA_IVA"];
$PATOTAL1 += $row["PAPELERIA_TOTAL"];
}
?>

<tr>
<td colspan='13' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td>$ <?php echo number_format($PASUNTOTAL1,2,'.',','); ?></td>
<td>$ <?php echo number_format($PAIVA1,2,'.',','); ?></td>
<td>$ <?php echo number_format($PATOTAL1,2,'.',','); ?></td><td></td></tr>
</table>
</tbody>			

			</form>
                  
</div>
</div> 
</div>
</div> 
</div>

