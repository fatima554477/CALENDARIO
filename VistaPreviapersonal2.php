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

$queryVISTAPREV = $conexion->listado_personal33($identioficador);
 $output .= '
<div id="mensajePERSONAL2"></div> 
 <form  id="listado_personal2form"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
  $row = mysqli_fetch_array($queryVISTAPREV);
    
     $puedeBorrarAdjuntoPersonal2 = ($conexion->variablespermisos('','PERSONAL','borrar')=='si' && (!isset($var_bloquea_fecha) || $var_bloquea_fecha=='no'));
      $adjuntosComprobante = array_filter(array_map('trim', explode(',', $row["ADJUNTO_COMPROBANTE"])));
        if($row["ADJUNTO_COMPROBANTE"]=="" or $row["ADJUNTO_COMPROBANTE"]=='2' or empty($adjuntosComprobante)){
        $urlADJUNTO_COMPROBANTE="";
        $valorADJUNTO_COMPROBANTE = "";
        }else{
			$urlADJUNTO_COMPROBANTE= "<ul class='list-unstyled mb-0'>";
			foreach ($adjuntosComprobante as $adjuntoComprobante) {
				if ($adjuntoComprobante == '' || $adjuntoComprobante == '2') {
					continue;
				}
				$botonBorrarAdjunto = '';
				if ($puedeBorrarAdjuntoPersonal2) {
					$botonBorrarAdjunto = " <button type='button' class='btn btn-link p-0 text-danger view_dataPERSONAL2adjuntoBorrar' data-personal='".$row["id"]."' data-archivo='".$adjuntoComprobante."'>Borrar</button>";
				}
				$urlADJUNTO_COMPROBANTE .= "<li class='d-flex align-items-center gap-2'><a target='_blank' href='includes/archivos/".$adjuntoComprobante."'>Visualizar!</a>".$botonBorrarAdjunto."</li>";
			}
			$urlADJUNTO_COMPROBANTE .= "</ul>";
        $valorADJUNTO_COMPROBANTE = implode(',', $adjuntosComprobante);
        }					
             $output .= '
	

			 <tr>
			 <td width="30%" style="font-weight:bold;">NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL2"],'01informacionpersonal','NOMBRE_1').'
			 </td>
			 </tr>
					 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA INICIO DE A COORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_INICIO1" value="'.$row["FECHA_INICIO1"].'"></td>

			 </tr>
	
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA FINAL DE LA COORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_FINAL1" value="'.$row["FECHA_FINAL1"].'"></td>

			 </tr>
			 
			 
			 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">NÚMERO DE DIAS</label></td>
			 <td width="70%"><input type="text" readonly=»readonly»  style="background:#d7bde2" name="NUMERO_DIAS1" value="'.$row["NUMERO_DIAS1"].'"></td>

			 </tr>
			 
			 
			 			 			 			 <tr>
			 <td width="30%" style="font-weight:bold;">MONTO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO1" value="'.$row["MONTO_BONO1"].'"></td>

			 </tr>
			 
	<tr>
			 <td width="30%" style="font-weight:bold;">TOTAL DEL BONO</label></td>
			 <td width="70%"><input type="text" readonly=»readonly»  style="background:#d7bde2" name="MONTO_BONO_TOTAL1" value="'.$row["MONTO_BONO_TOTAL1"].'" ></td>


			 </tr>

			 
				 

			 
			 
			 
			 <tr>
			 <td width="30%" style="font-weight:bold;">MOTIVO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL2" value="'.$row["OBSERVACIONES_PERSONAL2"].'"></td>

			 </tr> 

			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA DE PROGRAMACIÓN DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_PPAGO1" value="'.$row["FECHA_PPAGO1"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FORMA DE PAGO</label></td>
			 <td width="70%"><input type="text" name="FORMA_PAGO1" value="'.$row["FORMA_PAGO1"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA EFECTIVA DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_EFECTIVA1" value="'.$row["FECHA_EFECTIVA1"].'"></td>
			 </tr>
			 

			 
            <tr>
                 <td width="30%" style="font-weight:bold;">DOCUMENTO:</label></td>
             <td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone_p2" ondrop="upload_file_P2(event, \'ADJUNTO_COMPROBANTE\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COMPROBANTE" type="text" onkeydown="return false" onclick="file_explorer_P2(\'ADJUNTO_COMPROBANTE\');" style="width:250px;" value="'.$valorADJUNTO_COMPROBANTE.'" required /> </p> <input type="file" name="ADJUNTO_COMPROBANTE" id="nono_p2" multiple/> <div id="2ADJUNTO_COMPROBANTE"> "'.$urlADJUNTO_COMPROBANTE.'" </div> </div> 


</td>
</tr>
			 			 <tr>
			 <td width="30%" style="font-weight:bold;">PAX QUE COBRO</label></td>
			 <td width="70%"><input type="text" name="NOMBRE_RECIBIO" value="'.$row["NOMBRE_RECIBIO"].'"></td>
			 </tr> 			 
			 
			 
			 <tr>
			 <td width="30%" style="font-weight:bold;">FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL2_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL2_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%" style="font-weight:bold;">GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal2"  id="IPpersonal2"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickpersonal2">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal2"  name="ENVIARpersonal2"/>

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
function parseNumeroSeguroP2(valor) {
    if (valor === null || valor === undefined) return 0;
    var limpio = String(valor).replace(/[^0-9,.-]/g, '').trim();
    if (!limpio) return 0;
    if (limpio.indexOf(',') !== -1 && limpio.indexOf('.') === -1) {
        limpio = limpio.replace(',', '.');
    } else {
        limpio = limpio.replace(/,/g, '');
    }
    var numero = parseFloat(limpio);
    return isNaN(numero) ? 0 : numero;
}
function calcularDiasEntreFechasP2(inicio, fin) {
    if (!inicio || !fin) return 0;
    var i = new Date(inicio + 'T00:00:00');
    var f = new Date(fin + 'T00:00:00');
    if (isNaN(i.getTime()) || isNaN(f.getTime()) || f < i) return 0;
    return Math.floor((f - i) / (1000 * 60 * 60 * 24)) + 1;
}
function actualizarTotalPersonal2(forzarRecalculo) {
    var diasInput = $('#listado_personal2form input[name="NUMERO_DIAS1"]');
    var montoInput = $('#listado_personal2form input[name="MONTO_BONO1"]');
    var totalInput = $('#listado_personal2form input[name="MONTO_BONO_TOTAL1"]');

    var dias = parseNumeroSeguroP2(diasInput.val());
    var monto = parseNumeroSeguroP2(montoInput.val());
    var totalActual = parseNumeroSeguroP2(totalInput.val());

    if (!forzarRecalculo && totalActual > 0 && (dias === 0 || monto === 0)) {
        return;
    }

    totalInput.val((dias * monto).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
}
function upload_file_P2(e, name) {
    e.preventDefault();
    upload_files_P2(e.dataTransfer.files, name);
}
function upload_files_P2(files, name) {
    if (!files || files.length === 0) return;
    Array.from(files).forEach(function(file){ ajax_file_upload_P2(file, name); });
}
function file_explorer_P2(name) {
    document.getElementsByName(name)[0].click();
    document.getElementsByName(name)[0].onchange = function() {
        upload_files_P2(document.getElementsByName(name)[0].files, name);
    };
}
function normalizarAdjuntos_P2(valor) {
    return valor.split(',').map(function(i){ return i.trim(); }).filter(function(i){ return i !== '' && i !== '2'; });
}
function actualizarAdjuntos_P2(nombre, nuevoAdjunto) {
    var actuales = normalizarAdjuntos_P2($('#' + nombre).val());
    if (nuevoAdjunto && actuales.indexOf(nuevoAdjunto) === -1) actuales.push(nuevoAdjunto);
    $('#' + nombre).val(actuales.join(','));
    var html = '<ul class="list-unstyled mb-0">';
    actuales.forEach(function(a){ html += '<li><a target="_blank" href="includes/archivos/'+a+'">Visualizar!</a></li>'; });
    $('#2' + nombre).html(actuales.length ? html + '</ul>' : '');
}
function ajax_file_upload_P2(file_obj, nombre) {
    if (!file_obj) return;
    var form_data = new FormData();
    form_data.append(nombre, file_obj);
    form_data.append("IPpersonal2", $("#IPpersonal2").val());
    $.ajax({
        type:'POST', url:'calendariodeeventos2/controladorAE.php',
        dataType:"html", contentType:false, processData:false, data:form_data,
        beforeSend:function(){ $('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>'); },
        success:function(response){
            if($.trim(response)==2){
                $('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
                $('#'+nombre).val("");
            } else { actualizarAdjuntos_P2(nombre, $.trim(response)); }
        }
    });
}

$(function(){
    actualizarTotalPersonal2(false);

    // Sumar fechas para número de días automáticamente.
    $(document)
        .off('change.vp2fechas', '#listado_personal2form input[name="FECHA_INICIO1"], #listado_personal2form input[name="FECHA_FINAL1"]')
        .on('change.vp2fechas', '#listado_personal2form input[name="FECHA_INICIO1"], #listado_personal2form input[name="FECHA_FINAL1"]', function(){
            var inicio = $('#listado_personal2form input[name="FECHA_INICIO1"]').val();
            var fin = $('#listado_personal2form input[name="FECHA_FINAL1"]').val();
            var diasCalculados = calcularDiasEntreFechasP2(inicio, fin);
            if (diasCalculados > 0) {
                $('#listado_personal2form input[name="NUMERO_DIAS1"]').val(diasCalculados);
            }
            actualizarTotalPersonal2(true);
        });

    // Recalcular al escribir
    $(document)
        .off('input.vp2', '#listado_personal2form input[name="NUMERO_DIAS1"], #listado_personal2form input[name="MONTO_BONO1"]')
        .on('input.vp2',  '#listado_personal2form input[name="NUMERO_DIAS1"], #listado_personal2form input[name="MONTO_BONO1"]', function(){
            actualizarTotalPersonal2(true);
        });

    // Guardar
    $("#clickpersonal2").off('click.vp2').on('click.vp2', function(){
        $.ajax({
            url:"calendariodeeventos2/controladorAE.php", method:"POST",
            data:$('#listado_personal2form').serialize(),
            beforeSend:function(){ $('#mensajePERSONAL2').html('Cargando...'); },
            success:function(data){
                $("#reset_personal2").load(location.href + " #reset_personal2");
                $('#mensajePERSONAL2').html("<span id='ACTUALIZADO'>"+data+"</span>");
                setTimeout(function(){ $('#mensajePERSONAL2').html(''); }, 2000);
                $('#dataModal').modal('hide');
            }
        });
    });
});
</script>