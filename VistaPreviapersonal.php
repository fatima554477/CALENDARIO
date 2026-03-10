<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorAE.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $altaeventos->listado_personal2($identioficador);
 $output .= '
 <div id="mensajePERSONAL"></div> 
 <form  id="listado_personalform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
     $puedeBorrarAdjuntoPersonal = ($conexion->variablespermisos('','PERSONAL','borrar')=='si' && (!isset($var_bloquea_fecha) || $var_bloquea_fecha=='no'));
      $adjuntosComprobante = array_filter(array_map('trim', explode(',', $row["ADJUNTO_COMPROBANTEP"])));
        if($row["ADJUNTO_COMPROBANTEP"]=="" or $row["ADJUNTO_COMPROBANTEP"]=='2' or empty($adjuntosComprobante)){
        $urlADJUNTO_COMPROBANTEP="";
        $valorADJUNTO_COMPROBANTEP = "";
        }else{
			$urlADJUNTO_COMPROBANTEP= "<ul class='list-unstyled mb-0'>";
			foreach ($adjuntosComprobante as $adjuntoComprobante) {
				if ($adjuntoComprobante == '' || $adjuntoComprobante == '2') {
					continue;
				}
				$botonBorrarAdjunto = '';
				if ($puedeBorrarAdjuntoPersonal) {
					$botonBorrarAdjunto = " <button type='button' class='btn btn-link p-0 text-danger view_dataPERSONALadjuntoBorrar' data-personal='".$row["id"]."' data-archivo='".$adjuntoComprobante."'>Borrar</button>";
				}
				$urlADJUNTO_COMPROBANTEP .= "<li class='d-flex align-items-center gap-2'><a target='_blank' href='includes/archivos/".$adjuntoComprobante."'>Visualizar!</a>".$botonBorrarAdjunto."</li>";
			}
			$urlADJUNTO_COMPROBANTEP .= "</ul>";
        $valorADJUNTO_COMPROBANTEP = implode(',', $adjuntosComprobante);
        }					
             $output .= '
	

			 <tr>
			 <td width="30%" style="font-weight:bold;">NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL"],'01informacionpersonal','NOMBRE_1').'
			 </td>
			 </tr>
			 
			 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA INICIO DE LA COORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_INICIO" value="'.$row["FECHA_INICIO"].'"></td>

			 </tr>
	
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA FINAL DE LA COORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_FINAL" value="'.$row["FECHA_FINAL"].'"></td>

			 </tr>
			 
			                                           
			 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">NÚMERO DE DIAS</label></td>
			 <td width="70%"><input type="text" name="NUMERO_DIAS" readonly=»readonly»  style="background:#d7bde2" id="NUMERO_DIAS" value="'.$row["NUMERO_DIAS"].'"></td>

			 </tr>
			 
			 
			 			 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">MONTO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO" id="MONTO_BONO" value="'.$row["MONTO_BONO"].'"></td>

			 </tr>
			 
			 <tr>
			 <td width="30%" style="font-weight:bold;">TOTAL DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO_TOTAL" readonly=»readonly»  style="background:#d7bde2" id="MONTO_BONO_TOTAL" value="'.$row["MONTO_BONO_TOTAL"].'"></td>

			 </tr>
			 
		
			 

			 

			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">MOTIVO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL" value="'.$row["OBSERVACIONES_PERSONAL"].'"></td></tr>
			 
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA DE PROGRAMACIÓN DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_PPAGO" value="'.$row["FECHA_PPAGO"].'"></td>
			 </tr>
			 
<tr>
    <td width="30%" style="font-weight:bold;" ><label>FORMA DE PAGO:</label></td>
    <td width="70%" class="form-control">
        <select name="FORMA_PAGO" style="background:#daddf5">
            <option style="background:#f2b4f5" value="">SELECCIONA UNA OPCIÓN</option>
            <option style="background:#f2b4f5" value="03" '.($row["FORMA_PAGO"] == "03" ? "selected" : "").'>03 TRANSFERENCIA ELECTRÓNICA</option>
            <option style="background:#ddf5da" value="01" '.($row["FORMA_PAGO"] == "01" ? "selected" : "").'>01 EFECTIVO</option>
            <option style="background:#fceade" value="02" '.($row["FORMA_PAGO"] == "02" ? "selected" : "").'>02 CHEQUE NOMINATIVO</option>
            <option style="background:#dee6fc" value="04" '.($row["FORMA_PAGO"] == "04" ? "selected" : "").'>04 TARJETA DE CRÉDITO</option>
            <option style="background:#f6fcde" value="05" '.($row["FORMA_PAGO"] == "05" ? "selected" : "").'>05 MONEDERO ELECTRÓNICO</option>
            <option style="background:#dee2fc" value="06" '.($row["FORMA_PAGO"] == "06" ? "selected" : "").'>06 DINERO ELECTRÓNICO</option>
            <option style="background:#f9e5fa" value="08" '.($row["FORMA_PAGO"] == "08" ? "selected" : "").'>08 VALES DE DESPENSA</option>
            <option style="background:#eefcde" value="28" '.($row["FORMA_PAGO"] == "28" ? "selected" : "").'>28 TARJETA DE DÉBITO</option>
            <option style="background:#fcfbde" value="29" '.($row["FORMA_PAGO"] == "29" ? "selected" : "").'>29 TARJETA DE SERVICIO</option>
            <option style="background:#f9e5fa" value="99" '.($row["FORMA_PAGO"] == "99" ? "selected" : "").'>99 OTRO</option>
        </select>
    </td>
</tr>
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA EFECTIVA DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_EFECTIVA" value="'.$row["FECHA_EFECTIVA"].'"></td>
			 </tr>
			 

			 
<tr>
<td width="30%" style="font-weight:bold;">COMPROBANTE DE PAGO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COMPROBANTEP\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COMPROBANTEP" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COMPROBANTEP\');" style="width:250px;" value="'.$valorADJUNTO_COMPROBANTEP.'" required /> </p> <input type="file" name="ADJUNTO_COMPROBANTEP" id="nono" multiple/> <div id="2ADJUNTO_COMPROBANTEP"> "'.$urlADJUNTO_COMPROBANTEP.'" </div> </div> 


</td>
</tr>
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">PAX QUE COBRO</label></td>
			 <td width="70%"><input type="text" name="NOMBRE_RECIBIO" value="'.$row["NOMBRE_RECIBIO"].'"></td>
			 </tr> 
			 



		  <tr>
			 <td width="30%" style="font-weight:bold;">FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%" style="font-weight:bold;">GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal"  id="IPpersonal"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickpersonal">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal"  name="ENVIARpersonal"/>

			</td>  
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form>';
    echo $output;
}
//
?>

<script>
function parseNumeroSeguro(valor) {
    if (valor === null || valor === undefined) return 0;
    var limpio = String(valor).replace(/[^0-9,.-]/g, '').trim();
    if (!limpio) return 0;
    // Si tiene coma y no punto, asumimos formato decimal con coma.
    if (limpio.indexOf(',') !== -1 && limpio.indexOf('.') === -1) {
        limpio = limpio.replace(',', '.');
    } else {
        limpio = limpio.replace(/,/g, '');
    }
    var numero = parseFloat(limpio);
    return isNaN(numero) ? 0 : numero;
}
function calcularDiasEntreFechas(inicio, fin) {
    if (!inicio || !fin) return 0;
    var i = new Date(inicio + 'T00:00:00');
    var f = new Date(fin + 'T00:00:00');
    if (isNaN(i.getTime()) || isNaN(f.getTime()) || f < i) return 0;
    return Math.floor((f - i) / (1000 * 60 * 60 * 24)) + 1;
}
function actualizarTotalPersonal(forzarRecalculo) {
    var diasInput = $('#listado_personalform input[name="NUMERO_DIAS"]');
    var montoInput = $('#listado_personalform input[name="MONTO_BONO"]');
    var totalInput = $('#listado_personalform input[name="MONTO_BONO_TOTAL"]');

    var dias = parseNumeroSeguro(diasInput.val());
    var monto = parseNumeroSeguro(montoInput.val());
    var totalActual = parseNumeroSeguro(totalInput.val());

    if (!forzarRecalculo && totalActual > 0 && (dias === 0 || monto === 0)) {
        return;
    }

    totalInput.val((dias * monto).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
}
function upload_file(e, name) {
    e.preventDefault();
    upload_files_vp(e.dataTransfer.files, name);
}
function upload_files_vp(files, name) {
    if (!files || files.length === 0) return;
    Array.from(files).forEach(function(file){ ajax_file_upload_vp(file, name); });
}
function file_explorer(name) {
    document.getElementsByName(name)[0].click();
    document.getElementsByName(name)[0].onchange = function() {
        upload_files_vp(document.getElementsByName(name)[0].files, name);
    };
}
function normalizarAdjuntos_vp(valor) {
    return valor.split(',').map(function(i){ return i.trim(); }).filter(function(i){ return i !== '' && i !== '2'; });
}
function actualizarAdjuntos_vp(nombre, nuevoAdjunto) {
    var actuales = normalizarAdjuntos_vp($('#' + nombre).val());
    if (nuevoAdjunto && actuales.indexOf(nuevoAdjunto) === -1) actuales.push(nuevoAdjunto);
    $('#' + nombre).val(actuales.join(','));
    var html = '<ul class="list-unstyled mb-0">';
    actuales.forEach(function(a){ html += '<li><a target="_blank" href="includes/archivos/'+a+'">Visualizar!</a></li>'; });
    $('#2' + nombre).html(actuales.length ? html + '</ul>' : '');
}
function ajax_file_upload_vp(file_obj, nombre) {
    if (!file_obj) return;
    var form_data = new FormData();
    form_data.append(nombre, file_obj);
    form_data.append("IPpersonal", $("#IPpersonal").val());
    $.ajax({
        type:'POST', url:'calendariodeeventos2/controladorAE.php',
        dataType:"html", contentType:false, processData:false, data:form_data,
        beforeSend:function(){ $('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>'); },
        success:function(response){
            if($.trim(response)==2){
                $('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
                $('#'+nombre).val("");
            } else { actualizarAdjuntos_vp(nombre, $.trim(response)); }
        }
    });
}

$(function(){
    // Mantener el total guardado si existe, pero recalcular cuando sí hay datos suficientes.
    actualizarTotalPersonal(false);

    $(document)
        .off('change.vp1fechas', '#listado_personalform input[name="FECHA_INICIO"], #listado_personalform input[name="FECHA_FINAL"]')
        .on('change.vp1fechas', '#listado_personalform input[name="FECHA_INICIO"], #listado_personalform input[name="FECHA_FINAL"]', function(){
            var inicio = $('#listado_personalform input[name="FECHA_INICIO"]').val();
            var fin = $('#listado_personalform input[name="FECHA_FINAL"]').val();
            var diasCalculados = calcularDiasEntreFechas(inicio, fin);
            if (diasCalculados > 0) {
                $('#listado_personalform input[name="NUMERO_DIAS"]').val(diasCalculados);
            }
            actualizarTotalPersonal(true);
        });

    // Recalcular al escribir
    $(document)
        .off('input.vp1', '#listado_personalform input[name="NUMERO_DIAS"], #listado_personalform input[name="MONTO_BONO"]')
        .on('input.vp1',  '#listado_personalform input[name="NUMERO_DIAS"], #listado_personalform input[name="MONTO_BONO"]', function(){
            actualizarTotalPersonal(true);
        });

    // Guardar
    $("#clickpersonal").off('click.vp1').on('click.vp1', function(){
        $.ajax({
            url:"calendariodeeventos2/controladorAE.php", method:"POST",
            data:$('#listado_personalform').serialize(),
            beforeSend:function(){ $('#mensajePERSONAL').html('Cargando...'); },
            success:function(data){
                $("#reset_personal").load(location.href + " #reset_personal");
                $('#mensajePERSONAL').html("<span id='ACTUALIZADO'>"+data+"</span>");
                setTimeout(function(){ $('#mensajePERSONAL').html(''); }, 2000);
                $('#dataModal').modal('hide');
            }
        });
    });
});
</script>