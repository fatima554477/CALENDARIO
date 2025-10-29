<?php 


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar19" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar19" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; RESUMEN EGRESOS PAGO A PROVEEDORES</p></strong></div>


<div  id="mensajefiltro"></div>
<div  id="pasarpagado2"></div>

							
	        <div id="target19" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loaderpago" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0"  >
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page3" onchange="load3(1);">
		<option value="1000" <?php if(!empty($_REQUEST['per_page3'])){echo 'selected';} ?>>TODOS</option>

		<option value="10" <?php if($_REQUEST['per_page3']=='10'){echo 'selected';} ?>>10</option>
		<option value="15" <?php if($_REQUEST['per_page3']=='15'){echo 'selected';} ?>>15</option>
		<option value="20" <?php if($_REQUEST['per_page3']=='20'){echo 'selected';} ?>>20</option>
		<option value="50" <?php if($_REQUEST['per_page3']=='50'){echo 'selected';} ?>>50</option>
		<option value="100" <?php if($_REQUEST['per_page3']=='100'){echo 'selected';} ?>>100</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="load3(1);"  href="javascript:void(0);" >BUSCAR</button>
</td>



					<td width="30%" align="center"> <span>PLANTILLA</span> 
					
					
						<?php
$encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required onchange="load3(1);">
                <option value="">SELECCIONA UNA OPCIÓN</option>';
$options = '';

// Colores de fondo (asegurar que hay suficientes)
$fondos = array("fff0df", "f4ffdf", "dfffed", "dffeff", "dfe8ff", "efdfff", "ffdffd", "ffdfe9", "e6dfff");
$num = 0;

$queryper = $conexion->desplegablesfiltro('pagoProveedores', '');

while($row1 = mysqli_fetch_array($queryper)) {
    // Rotación de colores
    $bgColor = $fondos[$num];
    $num = ($num === count($fondos) - 1) ? 0 : $num + 1;
    
    // Verificar selección
    $selected = ($_SESSION['DEPARTAMENTO'] === $row1['nombreplantilla']) ? 'selected' : '';
    
    // Convertir a mayúsculas
    $nombre = mb_strtoupper($row1['nombreplantilla'], 'UTF-8');
    
    $options .= '<option style="background: #' . $bgColor . '" ' . $selected . 
                ' value="' . htmlspecialchars($row1['nombreplantilla']) . '">' . 
                htmlspecialchars($nombre) . '</option>';
}

echo $encabezado . $options . '</select>';
?>
					</td>
					<p><strong style="background:#ffb6c1"> ROSA:</strong> FORMAS DE PAGO DIFERENTES A (03 TRANSFERENCIA ELECTRONICA DE FONDOS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="background:#fdfe87"> AMARILLO:</strong> PAGO A PROVEEDOR SIN XML </p>

</tr>
</table>
		<div class="datos_ajaxpago">
		</div>
  
<!--aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clases/script.filtro.php";
?>