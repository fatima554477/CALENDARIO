<?php 


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar52" onclick="loadpersonal(1);" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar52" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO  <a style="color:red;font:12px"> CALENDARIO DE COODINACIÓN</a></p></strong></div>


<div  id="mensajefiltro"></div>
<div  id="pasarpagado2"></div>

							
	        <div id="target52" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page" onchange="loadpersonal(1);">
	

		<option value="10" <?php if($_REQUEST['per_page']=='10'){echo 'selected';} ?>>10</option>
		<option value="15" <?php if($_REQUEST['per_page']=='15'){echo 'selected';} ?>>15</option>
		<option value="20" <?php if($_REQUEST['per_page']=='20'){echo 'selected';} ?>>20</option>
		<option value="50" <?php if($_REQUEST['per_page']=='50'){echo 'selected';} ?>>50</option>
		<option value="100" <?php if($_REQUEST['per_page']=='100'){echo 'selected';} ?>>100</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadpersonal(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>


<td width="20%" align="center">					
<span class="btn btn-sm btn-outline-success px-5" type="button" onclick="LIMPIAR();">LIMPIAR FILTRO</span> 
</td>

	<!--onclick="location.href='pagoproveedores/clases/excel.php'"
onclick="window.open('https://www.w3.org/', '_blank');"-->


<td width="20%" align="center">
	<span>PLANTILLA</span>


	<?php

	$encabezado = '';$option='';
	$queryper = $conexion->desplegablesfiltro('MENSAJERIA','');
	$encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required="" onchange="load(1);">
	<option value="">SELECCIONA UNA OPCIÓN</option>';
	/*linea para multiples colores*/
	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
	$num = 0;
	/*linea para multiples colores*/	
	while($row1 = mysqli_fetch_array($queryper))
	{
	/*linea para multiples colores*/
	if($num==8){$num=0;}else{$num++;}
	/*linea para multiples colores*/		
	$select='';
	if($_SESSION['DEPARTAMENTO']==$row1['nombreplantilla']){$select = "selected";};

	$option .= '<option style="background: #'./*linea para multiples colores*/$fondos[$num]./*linea para multiples colores*/'" '.$select.' value="'.$row1['nombreplantilla'].'">'.$row1['nombreplantilla'].'</option>';
	}
	echo $encabezado.$option.'</select>';			
	?>	




</td>

</tr>
</table>

               <!--   <form name="form_emil_MATCH" id="form_emil_MATCH">
				  
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_MATCH" id="EMAIL_MATCH" class="form-control" aria-label="With textarea"><?php echo $EMAIL_MATCH; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_INCIDENCIAS">ENVIAR POR EMAIL</button></td> -->
		<div class="datos_ajax">
		</div>
		<!--</form>
aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "ClasePERSONAL/script.filtro.php";
?>