

<div id="content">
  <hr/>
  <strong>
    <p class="mb-0 text-uppercase">
      <img src="includes/contraer31.png" id="mostrar35" style="cursor:pointer;"/>
      <img src="includes/contraer41.png" id="ocultar35" style="cursor:pointer;"/>
      &nbsp;&nbsp;&nbsp; ORDEN DE PRODUCCIÓN
    </p>
  </strong>
</div>


<div  id="mensajeMATERIAL2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	    <div id="target35" style="display: none;" class="content2">
        <div class="card">
        <div class="card-body" id='actualizamateriales'>
          
                
                      <form class="row g-3 needs-validation was-validated" id="MATERIALform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <?php if($conexion->variablespermisos('','MATEEVE','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">



					  <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">MATERIAL Y EQUIPO:</label></th>
         <td>

                        <span>
<?php
$encabezado2 = '';
$queryper = $conexion->lista_inventario1();
$encabezado2 = '<select class="form-select mb-3" aria-label="Default select example" id="MATERIAL_EQUIPO" required="" name="MATERIAL_EQUIPO" onchange="OBTENER_MATERIAL()">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row2 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($MATERIAL_EQUIPO==$row2['I_ARTICULO']){$select = "selected";};

$option5 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row2['id'].'">'.$row2['I_ARTICULO'].'</option>';
}
echo $encabezado2.$option5.'</select>';		
?>
</span>

 </td>                        
         </tr>            
  
				 

		 
		 
         <tr style="background:#d4f1d3">  
         <th scope="row"> <label for="validationCustom03" class="form-label">CANTIDAD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""    value="<?php echo $MATERIAL_CANTIDAD; ?>"  name="MATERIAL_CANTIDAD"  ></td>
         </tr>
        
         <tr style="background:#d4f1d3">  
         <th scope="row"> <label for="validationCustom03" class="form-label">FOTO:</label></th>

         <td id="fotos_materiales">

 <!--<input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_FOTO; ?>"  name="MATERIAL_FOTO"  placeholder="">-->
<?php
$I_FOTOS = $_SESSION['I_FOTOS'];
if($_SESSION['I_FOTOS']!=''){
echo $conexion->descargararchivo($I_FOTOS);
}

?>
<input type="hidden" name="MATERIAL_FOTO" value="<?php echo $I_FOTOS; ?>">

 </td>
 


</tr>
      
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE ENTREGA:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="tot" required=""   value="<?php echo $MATERIAL_ENTREGA; ?>"  name="MATERIAL_ENTREGA"  placeholder="">
 </div>
 </td>
         </tr>








          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_LUGAR; ?>"  name="MATERIAL_LUGAR"  placeholder="" >
 </div>
 </td>
         </tr>
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE ENTREGA</label></th>
         <td><input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_HORA; ?>"  name="MATERIAL_HORA"  placeholder=""></td>
         </tr>
        
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE DEVOLUCIÓN:<br><a style="color:red;font:7px">obligatorio</a></label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_DEVOLU; ?>"  name="MATERIAL_DEVOLU"  placeholder="">
 </div>
 </td>
         </tr>
          <tr style="background:#ebf8fa">  

         <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE DEVOLUCIÓN:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_LUDEVO; ?>"  name="MATERIAL_LUDEVO" placeholder=""></td>
         </tr>
         	 
           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE DEVOLUCIÓN:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_HORADEVO; ?>"  name="MATERIAL_HORADEVO"  placeholder="">
 </div>
 </td>
         </tr>
         <tr style="background:#d4f1d3">    
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE SOLICITUD:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo date('Y-m-d'); ?>"  name="MATERIAL_SOLICITUD"  placeholder="" readonly="readonly"></td>
         </tr>
        
         <tr style="background:#d4f1d3"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">DIAS SOLICITADOS:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_DIAS; ?>"  name="MATERIAL_DIAS" placeholder="">
 </div>
 </td>
         </tr>
         <tr style="background:#d4f1d3"> 
<th  scope="row"> <label for="validationCustom03" class="form-label">COSTO:</label></th>
<td>

<div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MATERIAL_COSTO" required="" value="<?php echo number_format($MATERIAL_COSTO,2,'.',','); ?>" onkeyup="comasainput('MATERIAL_COSTO')" name="MATERIAL_COSTO" placeholder="" onclick="total_cantidad_x_precio2()">
</div>
</td>
</tr>


<tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">SUB TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MATERIAL_SUB" required="" value="<?php echo number_format($MATERIAL_SUB,2,'.',','); ?>" onkeyup="comasainput('MATERIAL_SUB')" name="MATERIAL_SUB" placeholder="">
 </div>
 </td>
         </tr>         
        
		   <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">I.V.A.</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $MATERIAL_IVA; ?>"  name="MATERIAL_IVA" placeholder="">
 </div>
 </td>
         </tr>
        

        

         <tr style="background:#d4f1d3"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MATERIAL_TOTAL" required="" value="<?php echo number_format($MATERIAL_TOTAL,2,'.',','); ?>" onkeyup="comasainput('MATERIAL_TOTAL')" name="MATERIAL_TOTAL" placeholder="">
 </div>
 </td>
         </tr>
         

        
            <tr style="background:#ebf8fa">     
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MATERIAL_OBSERVA; ?>"  name="MATERIAL_OBSERVA" placeholder="">
 </div>
 </td>
         </tr>
                  </table>
				  
				  <table>
				  <tr>


   
 
                                    
    <input type="hidden" value="HMATERIAL" name="HMATERIAL"/>     
 
        
 <td>
           
</td>
      

 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="GUARDAR_MATERIAL" name="GUARDAR_MATERIAL">GUARDAR</button>
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
    1px 30px 60px rgba(16,16,16,0.4);"   id="mensajeMATERIAL"></td><?php } ?></tr>
           
                   </table>

                  </form>
				  <?php if($conexion->variablespermisos('','MATEEVE_IMPRIMIR','ver')=='si' and $var_bloquea_fecha=='no'){ ?>
				  <a class="btn btn-sm btn-outline-success px-5" href="calendariodeeventos2/VistaPreviaPdf2.php?idevento=<?php echo $_GET['idevento']; ?>" target="_blank">IMPRIMIR</a><?php } ?>
				  
                  <?php if($conexion->variablespermisos('','MATEEVE','email')=='si' and $var_bloquea_fecha=='no'){ ?>
			<form name="form_emai_material" id="form_emai_material">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_MATERIAL" id="EMAIL_MATERIAL" class="form-control" aria-label="With textarea"><?php echo $EMAIL_MATERIAL; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_MATERIAL">ENVIAR POR EMAIL</button></td>   
	
			</tr></table> <?php } ?>
			

            <?php
$querycontras = $altaeventos->Listado_MATERIAL();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_MATERIAL' name='reset_MATERIAL'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">IMPRIMIR</th>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">MATERIAL</th>
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
$urlMATERIAL_FOTO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlMATERIAL_FOTO = $conexion->descargararchivo($row["MATERIAL_FOTO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="MATERIAL[]" id="MATERIAL" value="<?php echo $row["id"]; ?>"/> </td>



<td style="text-align:center" ><a class="btn btn-sm btn-outline-success px-5" href="calendariodeeventos2/VistaPreviaPdf2.php?idRelacion=<?php echo $row['id']; ?>" target="_blank">IMPRIMIR</a></td>



<td ><?php echo $altaeventos->nombre_materiales($row["MATERIAL_EQUIPO"]);?></td>
<td ><?php echo $row["MATERIAL_CANTIDAD"]; ?></td>
<td ><?php echo $urlMATERIAL_FOTO; ?></td>
<td ><?php echo $row["MATERIAL_ENTREGA"]; ?></td>
<td ><?php echo $row["MATERIAL_LUGAR"]; ?></td>
<td ><?php echo $row["MATERIAL_HORA"]; ?></td>
<td ><?php echo $row["MATERIAL_DEVOLU"]; ?></td>
<td ><?php echo $row["MATERIAL_LUDEVO"]; ?></td>
<td ><?php echo $row["MATERIAL_HORADEVO"]; ?></td>
<td ><?php echo $row["MATERIAL_SOLICITUD"]; ?></td>
<td ><?php echo $row["MATERIAL_DIAS"]; ?></td>
<td ><?php echo $row["MATERIAL_COSTO"]; ?></td>
<td ><?php echo $row["MATERIAL_SUB"]; ?></td>
<td ><?php echo $row["MATERIAL_IVA"]; ?></td>
<td ><?php echo $row["MATERIAL_TOTAL"]; ?></td>
<td ><?php echo $row["MATERIAL_OBSERVA"]; ?></td>
<?php if($conexion->variablespermisos('','MATEEVE','modificar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_MATERIAL" /></td><?php } ?>
<?php if($conexion->variablespermisos('','MATEEVE','borrar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataMATERIALborrar" />
</td><?php } ?>
</tr>
<?php
$GSUNTOTAL1 += $row["MATERIAL_SUB"];
$GIVA1 += $row["MATERIAL_IVA"];
$GTOTAL1 += $row["MATERIAL_TOTAL"];
}
?>

<tr>
<td colspan='13' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td>$ <?php echo number_format($GSUNTOTAL1,2,'.',','); ?></td>
<td>$ <?php echo number_format($GIVA1,2,'.',','); ?></td>
<td>$ <?php echo number_format($GTOTAL1,2,'.',','); ?></td><td></td></tr>

</table>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const accion = urlParams.get('accion');

    // Si el parámetro es "abrir-material", simula clic en "mostrar35"
    if (accion === "abrir-material") {
      const botonMostrar = document.getElementById("mostrar35");
      
      if (botonMostrar) {
        // Simula el clic para activar el toggle
        botonMostrar.click();
        
        // Opcional: Scroll hacia la sección
        document.getElementById("target35").scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script>
</tbody>



			</form>
                  
</div>
</div> 
</div>
</div> 
</div>
