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

$queryVISTAPREV = $conexion->listadoaltaeventos2($identioficador);
 $output .= ' <form  id="listadoaltaeventosform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {
     $output .= '
	 <tr>
	 <td width="30%"><label>FECHA_ALTA_EVENTO</label></td>
	 <td width="70%"><input type="text" name="FECHA_ALTA_EVENTO" value="'.$row["FECHA_ALTA_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>STATUS_EVENTO</label></td>
	 <td width="70%"><input type="text" name="STATUS_EVENTO" value="'.$row["STATUS_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA_AUTORIZACION_EVENTO</label></td>
	 <td width="70%"><input type="text" name="FECHA_AUTORIZACION_EVENTO" value="'.$row["FECHA_AUTORIZACION_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>MONTOC_TOTAL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="MONTOC_TOTAL_EVENTO" value="'.$row["MONTOC_TOTAL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>MONTO_TOTAL_AVION</label></td>
	 <td width="70%"><input type="text" name="MONTO_TOTAL_AVION" value="'.$row["MONTO_TOTAL_AVION"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>MONTO_TOTAL_DEL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="MONTO_TOTAL_DEL_EVENTO" value="'.$row["MONTO_TOTAL_DEL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_COMERCIAL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_COMERCIAL_EVENTO" value="'.$row["NOMBRE_COMERCIAL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_FISCAL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_FISCAL_EVENTO" value="'.$row["NOMBRE_FISCAL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_EVENTO</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_EVENTO" value="'.$row["NOMBRE_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_CORTO_EVENTO</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_CORTO_EVENTO" value="'.$row["NOMBRE_CORTO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_CONTACTO_EVENTO</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_CONTACTO_EVENTO" value="'.$row["NOMBRE_CONTACTO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>CELULAR_CONTACTO_1</label></td>
	 <td width="70%"><input type="text" name="CELULAR_CONTACTO_1" value="'.$row["CELULAR_CONTACTO_1"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>CORREO_CONTACTO_1</label></td>
	 <td width="70%"><input type="text" name="CORREO_CONTACTO_1" value="'.$row["CORREO_CONTACTO_1"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>AREA_CONTACTO_CLIENTE</label></td>
	 <td width="70%"><input type="text" name="AREA_CONTACTO_CLIENTE" value="'.$row["AREA_CONTACTO_CLIENTE"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>OBSERVACIONES_1</label></td>
	 <td width="70%"><input type="text" name="OBSERVACIONES_1" value="'.$row["OBSERVACIONES_1"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>TIPO_DE_EVENTO</label></td>
	 <td width="70%"><input type="text" name="TIPO_DE_EVENTO" value="'.$row["TIPO_DE_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FORMATO_EVENTO</label></td>
	 <td width="70%"><input type="text" name="FORMATO_EVENTO" value="'.$row["FORMATO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>PAIS_DEL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="PAIS_DEL_EVENTO" value="'.$row["PAIS_DEL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>CIUDAD_DEL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="CIUDAD_DEL_EVENTO" value="'.$row["CIUDAD_DEL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>HOTEL_LUGAR</label></td>
	 <td width="70%"><input type="text" name="HOTEL_LUGAR" value="'.$row["HOTEL_LUGAR"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NUMERO_DE_PERSONAS</label></td>
	 <td width="70%"><input type="text" name="NUMERO_DE_PERSONAS" value="'.$row["NUMERO_DE_PERSONAS"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA_INICIO_EVENTO</label></td>
	 <td width="70%"><input type="text" name="FECHA_INICIO_EVENTO" value="'.$row["FECHA_INICIO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE_COMERCIAL</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_COMERCIAL" value="'.$row["NOMBRE_COMERCIAL"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA_FINAL_EVENTO</label></td>
	 <td width="70%"><input type="text" name="FECHA_FINAL_EVENTO" value="'.$row["FECHA_FINAL_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA_TERMINO_EVENTO</label></td>
	 <td width="70%"><input type="text" name="HORA_TERMINO_EVENTO" value="'.$row["HORA_TERMINO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA_LLEGADA_STAFF</label></td>
	 <td width="70%"><input type="text" name="FECHA_LLEGADA_STAFF" value="'.$row["FECHA_LLEGADA_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA_LLEGADA_STAFF</label></td>
	 <td width="70%"><input type="text" name="HORA_LLEGADA_STAFF" value="'.$row["HORA_LLEGADA_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA_REGRESO_STAFF</label></td>
	 <td width="70%"><input type="text" name="FECHA_REGRESO_STAFF" value="'.$row["FECHA_REGRESO_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA_REGRESO_STAFF</label></td>
	 <td width="70%"><input type="text" name="HORA_REGRESO_STAFF" value="'.$row["HORA_REGRESO_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>hALTAEVENTOS</label></td>
	 <td width="70%"><input type="text" name="hALTAEVENTOS" value="'.$row["hALTAEVENTOS"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>SUBIR_COTIZACION</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'SUBIR_COTIZACION\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer(\'SUBIR_COTIZACION\');" style="width:250px;" value="'.$row["SUBIR_COTIZACION"].'" required /> </p> <input type="file" name="SUBIR_COTIZACION" id="nono"/> <div id="2SUBIR_COTIZACION"> "'.$urlSUBIR_COTIZACION.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>SUBIR_ORDEN_COMPRA</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'SUBIR_ORDEN_COMPRA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_ORDEN_COMPRA" type="text" onkeydown="return false" onclick="file_explorer(\'SUBIR_ORDEN_COMPRA\');" style="width:250px;" value="'.$row["SUBIR_ORDEN_COMPRA"].'" required /> </p> <input type="file" name="SUBIR_ORDEN_COMPRA" id="nono"/> <div id="2SUBIR_ORDEN_COMPRA"> "'.$urlSUBIR_ORDEN_COMPRA.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>SUBIR_CONTRATO_FIRMADO</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'SUBIR_CONTRATO_FIRMADO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_CONTRATO_FIRMADO" type="text" onkeydown="return false" onclick="file_explorer(\'SUBIR_CONTRATO_FIRMADO\');" style="width:250px;" value="'.$row["SUBIR_CONTRATO_FIRMADO"].'" required /> </p> <input type="file" name="SUBIR_CONTRATO_FIRMADO" id="nono"/> <div id="2SUBIR_CONTRATO_FIRMADO"> "'.$urlSUBIR_CONTRATO_FIRMADO.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>SUBIR_COTIZACION_FIRMADA</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'SUBIR_COTIZACION_FIRMADA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_COTIZACION_FIRMADA" type="text" onkeydown="return false" onclick="file_explorer(\'SUBIR_COTIZACION_FIRMADA\');" style="width:250px;" value="'.$row["SUBIR_COTIZACION_FIRMADA"].'" required /> </p> <input type="file" name="SUBIR_COTIZACION_FIRMADA" id="nono"/> <div id="2SUBIR_COTIZACION_FIRMADA"> "'.$urlSUBIR_COTIZACION_FIRMADA.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>LOGO_CLIENTE</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'LOGO_CLIENTE\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="LOGO_CLIENTE" type="text" onkeydown="return false" onclick="file_explorer(\'LOGO_CLIENTE\');" style="width:250px;" value="'.$row["LOGO_CLIENTE"].'" required /> </p> <input type="file" name="LOGO_CLIENTE" id="nono"/> <div id="2LOGO_CLIENTE"> "'.$urlLOGO_CLIENTE.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>IMAGEN_EVENTO</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'IMAGEN_EVENTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="IMAGEN_EVENTO" type="text" onkeydown="return false" onclick="file_explorer(\'IMAGEN_EVENTO\');" style="width:250px;" value="'.$row["IMAGEN_EVENTO"].'" required /> </p> <input type="file" name="IMAGEN_EVENTO" id="nono"/> <div id="2IMAGEN_EVENTO"> "'.$urlIMAGEN_EVENTO.'" </div> </div> </div></td>
	 </tr> 

	 <tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickALTA">GUARDAR</button>
			
			<input type="hidden" value="enviaraltaeventos"  name="enviaraltaeventos"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPaltaeventos" id="IPaltaeventos"/>
			</td>  
        </tr>
     ';
    }
    $output .= '</table></div>

	</form>';
    echo $output;
}
//
?>

<script>
	var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IPaltaeventos",  $("#IPaltaeventos").val());
	        $.ajax({
	            type: 'POST',
				url: 'altaeventos/controladorAE.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#2'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}

	            }
	        });
	    }
	}
    $(document).ready(function(){


$("#clickALTA").click(function(){
	
   $.ajax({  
    url: 'altaeventos/controladorAE.php',
    method:"POST",  
    data:$('#listadoaltaeventosform').serialize(),

    beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
			$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
			$("#mensajeALTAEVENTOS").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#mensajeALTAEVENTOS").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>