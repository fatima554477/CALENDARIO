<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar31" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar31" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; CALIFICACIÓN DEl PROVEEDOR</p></strong>


<div  id="mensajeCALIFICACION2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">%</div></div>
									</div>
									</div>
							
	        <div id="target31" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">  

                      <form class="row g-3 needs-validation was-validated" id="CALIFICACIONform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php if($conexion->variablespermisos('','CALIFICACION','guardar')=='si'){ ?>
                        <div class="col-md-4"style="background:#fef5e7">
 
                    
<strong><label for="validationCustom02" class="form-label">MOTIVO DE LA CALIFICACIÓN:</label></strong>

<span id="documentoslegales">
<?php
$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

$queryper = $proveedoresC->variable_nuevomotivotodos();
// Corregido: Combinar clases en un solo atributo class
$encabezado = '<select class="form-select mb-3 uppercase" aria-label="Default select example" id="DOCUMENTO_CALIFICACION" required name="DOCUMENTO_CALIFICACION">
<option value="">SELECCIONA UNA OPCIÓN</option>';	
$option9 = ''; // Inicializar variable para evitar errores

while($row1 = mysqli_fetch_array($queryper)) { 
    $select = ($DOCUMENTO_CALIFICACION == $row1['nuevo_motivo']) ? "selected" : "";
    
    // Aplicar mayúsculas directamente en PHP y estilo CSS inline
    $option9 .= '<option style="text-transform: uppercase; background: #'.$fondos[$num].'" '.$select.' value="'.$row1['nuevo_motivo'].'">';
    $option9 .= strtoupper($row1['nuevo_motivo']); // Convertir a mayúsculas aquí
    $option9 .= '</option>';

    $num = ($num == 8) ? 0 : $num + 1;
}
echo $encabezado.$option9.'</select>';			
?>
</span>

<div class="valid-feedback">Bien!</div>
</div>
						
						
                        <div class="col-md-4" style="background:#d4f6c8">
                         <strong> <label for="validationCustom02" class="form-label">CALIFICACIÓN:</label></strong>
                          <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" value="<?php echo $ADJUNTO_CALIFICACION; ?>" required="" name="ADJUNTO_CALIFICACION"> 
                        <strong> <option selected="">SELECCIONA UNA OPCION</option></strong>
                         <option style="background:#FF0000" <?php if($ADJUNTO_CALIFICACION=='1'){echo "selected";} ?> value="1">1</option>
                         <option style="background:#FA5858" <?php if($ADJUNTO_CALIFICACION=='2'){echo "selected";} ?> value="2">2</option>
                         <option style="background:#F5A9A9" <?php if($ADJUNTO_CALIFICACION=='3'){echo "selected";} ?> value="3">3</option>
                         <option style="background:#F6CECE" <?php if($ADJUNTO_CALIFICACION=='4'){echo "selected";} ?> value="4">4</option>
                         <option style="background:#F6CECE" <?php if($ADJUNTO_CALIFICACION=='5'){echo "selected";} ?> value="5">5</option>
                         <option style="background:#CEF6E3" <?php if($ADJUNTO_CALIFICACION=='6'){echo "selected";} ?> value="6">6</option>
                         <option style="background:#A9F5E1" <?php if($ADJUNTO_CALIFICACION=='7'){echo "selected";} ?> value="7">7</option>
                         <option style="background:#81F7D8" <?php if($ADJUNTO_CALIFICACION=='8'){echo "selected";} ?> value="8">8</option>
                         <option style="background:#00FFBF" <?php if($ADJUNTO_CALIFICACION=='9'){echo "selected";} ?> value="9">9</option>
                         <option style="background:#04B486" <?php if($ADJUNTO_CALIFICACION=='10'){echo "selected";} ?> value="10">10</option>
                        
                         </select> 
                          <div class="valid-feedback">Bien!</div>
                          </div>
						
						
						
      
						  
						  						<div class="col-md-4" style="background:#fbeee6">
  <strong>
    <label for="validationCustom01" class="form-label">OBSERVACIONES:</label>
  </strong>
  <input type="text" 
         class="form-control" 
         id="validationCustom01" 
         value="<?= htmlspecialchars($OBSERVACIONES_CALIFICACION, ENT_QUOTES, 'UTF-8') ?>" 
         required 
         name="OBSERVACIONES_CALIFICACION">
  <div class="valid-feedback">¡Bien!</div>
</div>
                        

           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_CALIFICACION">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hCALIFICACION" name="hCALIFICACION"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_CALIFICACION">GUARDAR</button><div style="
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
    1px 30px 60px rgba(16,16,16,0.4);
	@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 100; }
}"


 id="mensajeCALIFICACION"/></th></tr><?php } ?></table>
           
            
                
 </form>
<?php if($conexion->variablespermisos('','CALIFICACION','email')=='si'){ ?>
                  <form name="form_emil_CALIFICACION" id="form_emil_CALIFICACION">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_CALIFICACION" id="EMAIL_CALIFICACION" class="form-control" aria-label="With textarea"><?php echo $EMAIL_CALIFICACION; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_CALIFICACION">ENVIAR POR EMAIL</button></td>  <?php } ?>
                
           </tr>

           <?php
$querycontras = $proveedoresC->Listado_CALIFICACION();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_CALIFICACION' name='reset_CALIFICACION'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">MOTIVO</th>
<th width="20%"style="background:#c9e8e8">CALIFICACIÓN</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>

</tr>

<?php
while($row = mysqli_fetch_array($querycontras))
{
?>  

<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="CALIFICACIONe[]" id="CALIFICACIONe" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["DOCUMENTO_CALIFICACION"]; ?></td>
<td ><?php echo $row["ADJUNTO_CALIFICACION"]; ?></td>
<td width="500" style="
    word-break: break-word;
    white-space: normal;
    line-height: 1.4em;
    max-height: 10.6em; /* (3 líneas * 1.2em) */
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 10; /* Limita a 3 líneas */
    -webkit-box-orient: vertical;
">
    <?php echo $row["OBSERVACIONES_CALIFICACION"]; ?>
</td>
<td ><?php echo $row["FECHA_CALIFICACION"]; ?></td>
<?php if($conexion->variablespermisos('','CALIFICACION','modificar')=='si'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_CALIFICACION" />
</td>
<?php } ?>
<?php if($conexion->variablespermisos('','CALIFICACION','borrar')=='si'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataCALIFICACIONborrar" />
</td>
<?php } ?>
</tr>
<?php
}
?>
<script>
// ===== CONFIG =====
const TABLE_ID = 'reseteINFOIMPO';             // tu ID de tabla
const STORAGE_KEY = `rowHeights:${TABLE_ID}`;  // clave localStorage

// Aplica alturas guardadas lo antes posible (reduce FOUC)
(function applySavedHeightsEarly() {
  try {
    const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
    const table = document.getElementById(TABLE_ID);
    if (!table || !saved.length) return;

    const rows = Array.from(table.querySelectorAll('tr'));
    rows.forEach((tr, i) => {
      const h = saved[i];
      if (!h) return;
      tr.querySelectorAll('td,th').forEach(td => {
        td.style.height = h + 'px';
      });
    });
  } catch (_) {}
})();

             function setCurrentFillingDate() {
                       const fechaInput = document.querySelector('input[name="FECHA_CALIFICACION"]');
                       if(!fechaInput) {
                               return;
                       }
                       const now = new Date();
                       const pad = (value) => value.toString().padStart(2, '0');
                       const formatted = `${pad(now.getDate())}-${pad(now.getMonth() + 1)}-${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
                       fechaInput.value = formatted;
               }// Calcula altura máxima por fila y la aplica a todas las celdas de esa fila
function sincronizarFilas() {
  const table = document.getElementById(TABLE_ID);
  if (!table) return;

  const rowHeights = [];
  const rows = Array.from(table.querySelectorAll('tr'));

  rows.forEach(tr => {
    // quitar alturas previas para medir natural
    tr.querySelectorAll('td,th').forEach(td => td.style.height = '');
    // medir alto máximo real de las celdas
    const maxH = Math.max(
      ...Array.from(tr.querySelectorAll('td,th')).map(td => td.scrollHeight || td.offsetHeight || 0),
      0
    );
    // aplicar el mismo alto a todas las celdas
    tr.querySelectorAll('td,th').forEach(td => td.style.height = maxH + 'px');
    rowHeights.push(maxH);
  });

  // guardar para la próxima recarga
  try {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(rowHeights));
  } catch (_) {}
}
             function setCurrentFillingDate() {
                       const fechaInput = document.querySelector('input[name="FECHA_CALIFICACION"]');
                       if(!fechaInput) {
                               return;
                       }
                       const now = new Date();
                       const pad = (value) => value.toString().padStart(2, '0');
                       const formatted = `${pad(now.getDate())}-${pad(now.getMonth() + 1)}-${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
                       fechaInput.value = formatted;
               }
// Re-sincroniza cuando todo está cargado (imágenes/fuentes) y en cambios de tamaño
window.addEventListener('load', sincronizarFilas);
window.addEventListener('resize', () => {
  // debounced
  clearTimeout(window.__syncTimer);
  window.__syncTimer = setTimeout(sincronizarFilas, 120);
});

// Si agregas/actualizas filas vía AJAX, llama a sincronizarFilas() después de inyectar el HTML.
// Ejemplo: $.ajax({ ... success: function(){ /* insertas HTML */ sincronizarFilas(); } });

// Si además usas tu autoajuste por contenido, llámalo antes:
function autoAjustarAlturas() {
  document.querySelectorAll('.auto-height').forEach(celda => {
    celda.style.height = ''; // reset para medir natural
    celda.style.whiteSpace = 'pre-wrap';
    celda.style.overflow = 'visible';
  });
  // luego sincronizamos filas para igualar alturas
  sincronizarFilas();
}
</script>
</table>


</tbody>

</form>
</div>
</div>
</div>
</div>
</div>
