
<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar30" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar30" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; RESUMEN TIKETS</p></strong></div>


<div  id="mensajefiltro"></div>
<div  id="pasarpagado2"></div>

							
	        <div id="target30" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loaderTIKETS" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page" onchange="loadTIKETS(1);">
		<option value="10" <?php if(!empty($_REQUEST['per_page'])){echo 'selected';} ?>>10</option>
		<option value="5" <?php if($_REQUEST['per_page']=='5'){echo 'selected';} ?>>5</option>
		<option value="10" <?php if($_REQUEST['per_page']=='10'){echo 'selected';} ?>>10</option>
		<option value="15" <?php if($_REQUEST['per_page']=='15'){echo 'selected';} ?>>15</option>
		<option value="20" <?php if($_REQUEST['per_page']=='20'){echo 'selected';} ?>>20</option>
		<option value="50" <?php if($_REQUEST['per_page']=='50'){echo 'selected';} ?>>50</option>
		<option value="100" <?php if($_REQUEST['per_page']=='100'){echo 'selected';} ?>>100</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadTIKETS(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>
	<!--onclick="location.href='pagoproveedores/clases/excel.php'"
onclick="window.open('https://www.w3.org/', '_blank');"-->
<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" 
onclick="window.open('https://www.epcinn.com/pruebas/crm2/main-files/syn-ui/sistemaPRUEBAS/PERMISOS.php?DESCARGAR=1', '_blank');"
 formtarget="_blank" >DESCARGAR EXCEL</button>
</td>


<td width="20%" align="center">
	<span>PLANTILLA</span>


	<?php
	$encabezado = '';$option='';
	$queryper = $conexion->desplegablesfiltro('pagoProveedores','');
	$encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required="" onchange="loadTIKETS(1);">
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
		
		
		
		<div class="datos_ajaxTIKETS">
		</div>
  
<!--aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clasesTIKETS/script.filtro.php";
?>