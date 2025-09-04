
<style>
.custom-combobox {
    position: relative;
    display: inline-block;
    width: 100%;
}

.custom-options {
    display: none;
    position: absolute;
    border: 1px solid #ddd;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;
    max-height: 200px;
    overflow-y: auto;
    background: white;
}

.option-item {
    padding: 8px 12px;
    cursor: pointer;
    display: block;
    width: 100%;
    text-align: left;
    border: none;
    background: white;
}

.option-item:hover {
    background-color: #f5f5f5;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('NOMBRE_PROVEEDOR');
    const datalist = document.getElementById('proveedoresList');
    const customOptions = document.getElementById('customOptions');
    
    // Crear opciones personalizadas
    function createCustomOptions() {
        customOptions.innerHTML = '';
        
        Array.from(datalist.options).forEach(option => {
            const div = document.createElement('div');
            div.className = 'option-item';
            div.textContent = option.value;
            div.style.backgroundColor = '#' + option.getAttribute('data-color');
            div.onclick = function() {
                input.value = option.value;
                customOptions.style.display = 'none';
                direccionP();
            };
            customOptions.appendChild(div);
        });
    }
    
    // Mostrar opciones al enfocar el input
    input.addEventListener('focus', function() {
        createCustomOptions();
        customOptions.style.display = 'block';
    });
    
    // Ocultar opciones al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (e.target !== input && !customOptions.contains(e.target)) {
            customOptions.style.display = 'none';
        }
    });
    
    // Filtrar opciones al escribir
    input.addEventListener('input', function() {
        const filter = input.value.toLowerCase();
        const options = customOptions.getElementsByClassName('option-item');
        
        for (let i = 0; i < options.length; i++) {
            const text = options[i].textContent || options[i].innerText;
            if (text.toLowerCase().indexOf(filter) > -1) {
                options[i].style.display = '';
            } else {
                options[i].style.display = 'none';
            }
        }
        
        direccionP();
    });
});
</script>



<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar15" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar15" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; COTIZACIONES DE PROVEEDORES</p></strong>


<div  id="mensajeCOTIPRO2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target15" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
  
                      <form class="row g-3 needs-validation was-validated" id="COTIPROform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					  <?php if($conexion->variablespermisos('','COTIZACION_PRO','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>

                      <table class="table mb-0 table-striped">

              
					  
					  
<tr>
    <th style="background:#f7edf8; text-align:left">NOMBRE COMERCIAL DEL PROVEEDOR:</th>
    <td style="background:#f7edf8" id="direccionP">
        <div class="custom-combobox">
            <?php
            // Obtener todos los proveedores
            $proveedores = array();
            $queryper = $conexion->lista_proveedormensajeria();
            
            while($row2 = mysqli_fetch_array($queryper)) {
                $proveedores[] = $row2['P_NOMBRE_COMERCIAL_EMPRESA'];
            }
            
            // Ordenar alfabéticamente
            sort($proveedores);
            
            // Generar input y datalist
            echo '<input type="text" id="NOMBRE_PROVEEDOR" name="NOMBRE_PROVEEDOR" 
                  class="form-select mb-3" placeholder="ESCRIBA O SELECCIONE" 
                  autocomplete="off" list="proveedoresList" onchange="direccionP();">';
            
            echo '<datalist id="proveedoresList">';
            
            $fondos = array("fff0df", "f4ffdf", "dfffed", "dffeff", "dfe8ff", "efdfff", "ffdffd", "efdfff", "ffdfe9");
            $num = 0;
            
            foreach($proveedores as $proveedor) {
                if($num == 8) { $num = 0; } else { $num++; }
                echo '<option value="'.htmlspecialchars($proveedor).'" data-color="'.$fondos[$num].'">';
            }
            
            echo '</datalist>';
            ?>
            
            <div class="custom-options" id="customOptions"></div>
        </div>
    </td>
</tr>
					  
					  
					  

                      <tr style="background:#eff9eb">

                       <th> <strong>   <label for="validationCustom01" class="form-label">MONTOS:</label></strong></th>


                  <td class="input-group mb-3" style="background:#eff9eb"> <span class="input-group-text">$</span><input  type="text" class="form-control" aria-label="Amount (to the nearest dollar)"   value="<?php echo $DOCUMENTO_COTIPRO; ?>" name="DOCUMENTO_COTIPRO"  onkeyup="comasainput('DOCUMENTO_COTIPRO')" >
                     </td>
                    </tr>
						
						
                        <tr style="background:#f7edf8">

                       <th> <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong></th>
                          <td><input type="file" class="form-control" id="validationCustom01" value="<?php echo $ADJUNTO_COTIPRO; ?>" required="" name="ADJUNTO_COTIPRO"></td>
                          
                     </tr>
                        <tr style="background:#eff9eb">

                        <th><strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong></th>
                          <td><input type="text" class="form-control" id="validationCustom01" value="<?php echo $OBSERVACIONES_COTIPRO ?>" required="" name="OBSERVACIONES_COTIPRO"></td>
                       
                        
                   </tr><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_COTIPRO">
           
           </td></tr></table>



                                    
    <input type="hidden" value="hCOTIPRO" name="hCOTIPRO"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_COTIPRO">GUARDAR</button><div style="

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


id="mensajeCOTIPRO"/></th><?php } ?></tr></table>
           
            
                
 </form>

<?php if($conexion->variablespermisos('','COTIZACION_PRO','email')=='si' and $var_bloquea_fecha=='no'){ ?>
                  <form name="form_emil_COTIPRO" id="form_emil_COTIPRO">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_COTIPRO" id="EMAIL_COTIPRO" class="form-control" aria-label="With textarea"><?php echo $EMAIL_COTIPRO; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_COTIPRO">ENVIAR POR EMAIL</button></td> <?php } ?> 
                
           </tr>


           <?php
$querycontras = $altaeventos->Listado_COTIPRO();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_COTIPRO' name='reset_COTIPRO'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>
<th width="20%"style="background:#c9e8e8">NOMBRE PROVEEDOR</th>  
<th width="20%"style="background:#c9e8e8">MONTO</th>
<th width="20%"style="background:#c9e8e8">DOCUMENTO</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
$urlADJUNTO_COTIPRO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_COTIPRO = $conexion->descargararchivo($row["ADJUNTO_COTIPRO"]);
?>

<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="cotipro[]" id="cotipro" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["NOMBRE_PROVEEDOR"]; ?></td>
<td >$<?php echo $row["DOCUMENTO_COTIPRO"]; ?></td>
<td ><?php echo $urlADJUNTO_COTIPRO; ?></td>
<td ><?php echo $row["OBSERVACIONES_COTIPRO"]; ?></td>
<td ><?php echo $row["FECHA_COTIPRO"]; ?></td>
<?php if($conexion->variablespermisos('','COTIZACION_PRO','modificar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_COTIPRO" />
</td><?php } ?>

<?php if($conexion->variablespermisos('','COTIZACION_PRO','borrar')=='si' and $var_bloquea_fecha=='no'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataCOTIPROborrar" />
</td><?php } ?>
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




