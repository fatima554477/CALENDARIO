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
			 <td width="30%"><label>NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL"],'01informacionpersonal','NOMBRE_1').'
			 </td>
			 </tr>
			 
			 			 			 <tr>
			 <td width="30%"><label>FECHA_INICIO DE LA CORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_INICIO" value="'.$row["FECHA_INICIO"].'"></td>

			 </tr>
	
			 
			 			 <tr>
			 <td width="30%"><label>FECHA FINAL DE LA CORDINACIÓN</label></td>
			 <td width="70%"><input type="date" name="FECHA_FINAL" value="'.$row["FECHA_FINAL"].'"></td>

			 </tr>
			 
			 
			 			 			 <tr>
			 <td width="30%"><label>NÚMERO DE DIAS</label></td>
			 <td width="70%"><input type="text" name="NUMERO_DIAS" id="NUMERO_DIAS" value="'.$row["NUMERO_DIAS"].'"></td>

			 </tr>
			 
			 
			 			 			 			 <tr>
			 <td width="30%"><label>MONTO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO" id="MONTO_BONO" value="'.$row["MONTO_BONO"].'"></td>

			 </tr>
			 
			 			 			 			 			 			 			 <tr>
			 <td width="30%"><label>TOTAL DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO_TOTAL" id="MONTO_BONO_TOTAL" value="'.$row["MONTO_BONO_TOTAL"].'"></td>

			 </tr>
			 
		
			 
			 
			 		 <tr>
			 <td width="30%"><label> VIATICOS</label></td>
			 <td width="70%"><input type="text" name="VIATICOS_PERSONAL" id="VIATICOS_PERSONAL"value="'.$row["VIATICOS_PERSONAL"].'"></td>
			 </tr>
			 
			 
			 <tr>
			 <td width="30%"><label>TOTAL BONO Y VIATICOS</label></td>
			 <td width="70%"><input type="text" name="TOTAL" id="TOTAL" value="'.$row["TOTAL"].'"></td>
			 </tr>
			 
			 <tr>
			 <td width="30%"><label>ÚLTIMO DÍA PARA COMPRAR VIATICOS</label></td>
			 <td width="70%"><input type="date" name="ULTIMO_DIA" value="'.$row["ULTIMO_DIA"].'"></td>
			 </tr>
			 
			 
			 			 <tr>
			 <td width="30%"><label>MOTIVO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL" value="'.$row["OBSERVACIONES_PERSONAL"].'"></td></tr>
			 
			 
			 			 <tr>
			 <td width="30%"><label>FECHA DE PROGRAMACIÓN DE PAGO</label></td>
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
			 <td width="30%"><label>FECHA EFECTIVA DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_EFECTIVA" value="'.$row["FECHA_EFECTIVA"].'"></td>
			 </tr>
			 

			 
<tr>
<td width="30%"><label>COMPROBANTE DE PAGO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COMPROBANTEP\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COMPROBANTEP" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COMPROBANTEP\');" style="width:250px;" value="'.$valorADJUNTO_COMPROBANTEP.'" required /> </p> <input type="file" name="ADJUNTO_COMPROBANTEP" id="nono" multiple/> <div id="2ADJUNTO_COMPROBANTEP"> "'.$urlADJUNTO_COMPROBANTEP.'" </div> </div> 


</td>
</tr>
			 			 <tr>
			 <td width="30%"><label>PAX QUE COBRO</label></td>
			 <td width="70%"><input type="text" name="NOMBRE_RECIBIO" value="'.$row["NOMBRE_RECIBIO"].'"></td>
			 </tr> 
			 



		  <tr>
			 <td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
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


var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    upload_files(e.dataTransfer.files, name);
	}

	function upload_files(files, name) {
	    if(!files || files.length === 0) {
	        return;
	    }
	    Array.from(files).forEach(function(file){
	        ajax_file_upload1(file, name);
	    });
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        upload_files(document.getElementsByName(name)[0].files, name);
	    };
	}

	function normalizarAdjuntos(valor) {
	    return valor
	        .split(',')
	        .map(function(item){ return item.trim(); })
	        .filter(function(item){ return item !== '' && item !== '2'; });
	}

	function renderAdjuntos(nombre, adjuntos) {
	    if(adjuntos.length === 0) {
	        return '';
	    }
	    var html = '<ul class="list-unstyled mb-0">';
	    adjuntos.forEach(function(archivo){
	        html += '<li><a target="_blank" href="includes/archivos/' + archivo + '">Visualizar!</a></li>';
	    });
	    html += '</ul>';
	    return html;
	}

	function actualizarAdjuntos(nombre, nuevoAdjunto) {
	    var actuales = normalizarAdjuntos($('#'+nombre).val());
	    if(nuevoAdjunto && actuales.indexOf(nuevoAdjunto) === -1) {
	        actuales.push(nuevoAdjunto);
	    }
	    $('#'+nombre).val(actuales.join(','));
	    $('#2'+nombre).html(renderAdjuntos(nombre, actuales));
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IPpersonal",  $("#IPpersonal").val());
	        $.ajax({
	            type: 'POST',
	            url: 'calendariodeeventos2/controladorAE.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
var nuevoAdjunto = $.trim(response);
actualizarAdjuntos(nombre, nuevoAdjunto);
}

	            }
	        });
	    }
	}



	function valorMoneda(numero) {
		if(numero === undefined || numero === null) {
			return 0;
		}
		var limpio = numero.toString().replace(/,/g, '').trim();
		if(limpio === '') {
			return 0;
		}
		var convertido = parseFloat(limpio);
		return isNaN(convertido) ? 0 : convertido;
	}

	function calcularTotalesBonoPersonal() {
		var numeroDias = valorMoneda($('#NUMERO_DIAS').val());
		var montoBono = valorMoneda($('#MONTO_BONO').val());
		var viaticos = valorMoneda($('#VIATICOS_PERSONAL').val());

		var totalBono = numeroDias * montoBono;
		var totalBonoViaticos = totalBono + viaticos;

		$('#MONTO_BONO_TOTAL').val(totalBono.toFixed(2));
		$('#TOTAL').val(totalBonoViaticos.toFixed(2));
	}






	$(document).ready(function(){

	$('#NUMERO_DIAS, #MONTO_BONO, #VIATICOS_PERSONAL').off('input').on('input', function(){
		calcularTotalesBonoPersonal();
	});

	calcularTotalesBonoPersonal();

$("#clickpersonal").click(function(){
	
   $.ajax({  
  url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#listado_personalform').serialize(),

    beforeSend:function(){  
    $('#mensajePERSONAL').html('cargando'); 
    }, 	
	
    success:function(data){
		 $('#PERSONALform')[0].reset();
	
		$("#reset_personal").load(location.href + " #reset_personal");
    $('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>");
            setTimeout(function () {
                $('#mensajePERSONAL').html('');
            }, 2000);	

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>