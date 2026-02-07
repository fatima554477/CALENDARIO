<?php
/*
clase EPC INNOVA
CREADO : 10/OCTUBRE/2022
TESTER
PROGRAMER
fecha sandor: 10 abril 2025
fecha fatima: 06 JUNIO 2025
*/
?>
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles2">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal14" class="modal fade">
 <div class="modal-dialog" style="width:80% !important; max-width:100% !important;">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles14">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>
	

<!--NUEVO CODIGO BORRAR-->
<div id="dataModal3" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles3">
    ¿ESTÁS SEGURO DE BORRAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes" class="btn confirm">SI BORRAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>

<div id="dataModal4" class="modal fade">
 <div class="modal-dialog" style="width:80% !important; max-width:100% !important;">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles4">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>



<div id="dataModal5" class="modal fade">
 <div class="modal-dialog modal-fullscreen">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles5">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>


<div id="dataModal9" class="modal fade">
 <div class="modal-dialog modal-fullscreen">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles9">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>
   
   </div>
  </div>
 </div>
</div>



<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-fullscreen">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>

<!--<div id="dataModaVPPP" class="modal fade">
 <div class="modal-dialog modal-fullscreen" style="width:80% !important; max-width:100% !important;">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles4">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>

-->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
	
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
	            url: 'calendariodeeventos2/controladorAE.php',
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#1'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#mensajeADJUNTOCOL').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
//alert(response);
if($.trim(response) == 2 ){

$('#1'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#1'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');

$('#2'+nombre).load(location.href + ' #2'+nombre);
$('#'+nombre).val(null);

	document.getElementsByName('ARCHIVO_RELACIONADO_MONTAJE')[0].value = '';
	document.getElementsByName('SUBIR_COTIZACION')[0].value = '';
	document.getElementsByName('SUBIR_ORDEN_COMPRA')[0].value = '';
	document.getElementsByName('SUBIR_CONTRATO_FIRMADO')[0].value = '';
	document.getElementsByName('SUBIR_COTIZACION_FIRMADA')[0].value = '';
	document.getElementsByName('LOGO_CLIENTE')[0].value = '';
	document.getElementsByName('IMAGEN_EVENTO')[0].value = '';


}

	            }
	        });
	    }
	}




       $(document).ready(function() {
        // Función para calcular la suma
        function calcularSuma() {
            let suma = 0;
            
            $('.cantidad').each(function() {
                let valor = parseFloat($(this).val()) || 0;
                suma += valor;
            });
            
            $('#total').text(suma.toFixed(2));
        }

        // Ejecutar al cambiar cualquier input
        $('.cantidad').on('input', function() {
            calcularSuma();
        });
    });






	function upload_file2(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload12(fileobj,name);
	}
	 
	function file_explorer2(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload12(fileobj,name);
	    };
	}

	function ajax_file_upload12(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        $.ajax({
	            type: 'POST',
	            url: 'pagoproveedores/controladorPP.php',
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#1'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#mensajeAVION').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
if($.trim(response) == 2 ){
$('#1'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}
else if($.trim(response) == 3 ){
	$('#1'+nombre).html('<p style="color:red;">UUID PREVIAMENTE CARGADO.</p>');
$('#'+nombre).val("");
/*nuevo inicio*/

}
else{
$('#'+nombre).val(response);
$('#1'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');

/*nuevo inicio*/
$("#2ADJUNTAR_FACTURA_XML").load(location.href + " #2ADJUNTAR_FACTURA_XML");
if(nombre == 'ADJUNTAR_FACTURA_XML'){
	//MONTO_FACTURA
/*$('#RAZON_SOCIAL2').load(location.href + ' #RAZON_SOCIAL2');
$('#RFC_PROVEEDOR2').load(location.href + ' #RFC_PROVEEDOR2');
$('#CONCEPTO_PROVEE2').load(location.href + ' #CONCEPTO_PROVEE2');
$('#TIPO_DE_MONEDA2').load(location.href + ' #TIPO_DE_MONEDA2');
$('#FECHA_DE_PAGO2').load(location.href + ' #FECHA_DE_PAGO2');
$('#NUMERO_CONSECUTIVO_PROVEE2').load(location.href + ' #NUMERO_CONSECUTIVO_PROVEE2');
$('#2MONTO_FACTURA').load(location.href + ' #2MONTO_FACTURA');
$('#2MONTO_DEPOSITAR').load(location.href + ' #2MONTO_DEPOSITAR');
$('#2PFORMADE_PAGO').load(location.href + ' #2PFORMADE_PAGO');*/

}

			//$('#SUBIRFACTURAform').trigger("reset");
			$('#2'+nombre).load(location.href + ' #2'+nombre);
			//$("#resettabla").load(location.href + " #resettabla");
			
/*nuevo final 2PFORMADE_PAGO*/

}

	            }
	        });
	    }
	}

















function comasainput(name){
	
const numberNoCommas = (x) => {
  return x.toString().replace(/,/g, "");
}

    var total = document.getElementsByName(name)[0].value;
	 var total2 = numberNoCommas(total)
const numberWithCommas = (x) => {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}	
    document.getElementsByName(name)[0].value = numberWithCommas(total2);	
}



	
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}



     
 


	
	
function pasara1_personal(pasara1_personal_id){


	var checkBox = document.getElementById("pasarapersonal"+pasara1_personal_id);
	var pasapersonal_text = "";
	if (checkBox.checked == true){
	pasapersonal_text = "si";
	}else{
	pasapersonal_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personal_id:pasara1_personal_id,pasapersonal_text:pasapersonal_text},
		beforeSend:function(){
		$('#mensajePERSONAL').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal").load(location.href + " #reset_personal");			
			
		$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}
///////////////////////////////////////PARA DAR DE ALTA AUTORIZACION//////////////////////////////////

function pasara1_personalAUT(pasara1_personalAUT_id){


	var checkBox = document.getElementById("pasarapersonalAUT"+pasara1_personalAUT_id);
	var pasapersonalAUT_text = "";
	if (checkBox.checked == true){
	pasapersonalAUT_text = "si";
	}else{
	pasapersonalAUT_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personalAUT_id:pasara1_personalAUT_id,pasapersonalAUT_text:pasapersonalAUT_text},
		beforeSend:function(){
		$('#mensajePERSONAL').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal").load(location.href + " #reset_personal");			
			
		$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}

///////////////////////////////////////PARA DAR DE ALTA ADMIN//////////////////////////////////
function pasara1_personalADMIN(pasara1_personalADMIN_id){

	var checkBox = document.getElementById("admin"+pasara1_personalADMIN_id);
	var pasapersonalADMIN_text = "";
	if (checkBox.checked == true){
	pasapersonalADMIN_text = "si";
	}else{
	pasapersonalADMIN_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personalADMIN_id:pasara1_personalADMIN_id,pasapersonalADMIN_text:pasapersonalADMIN_text},
		beforeSend:function(){
		$('#mensajePERSONAL').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal").load(location.href + " #reset_personal");			
			
		$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}

/////////////////PARA AUTORIZAR BONO VYO////////////////////////////////////
function pasara1_personalVYO(pasara1_personalVYO_id){

	var checkBox = document.getElementById("VYO"+pasara1_personalVYO_id);
	var pasapersonalVYO_text = "";
	if (checkBox.checked == true){
	pasapersonalVYO_text = "si";
	}else{
	pasapersonalVYO_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personalVYO_id:pasara1_personalVYO_id,pasapersonalVYO_text:pasapersonalVYO_text},
		beforeSend:function(){
		$('#mensajePERSONAL').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal").load(location.href + " #reset_personal");			
			
		$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}
/////////////////PARA AUTORIZAR BONO DIRECCION////////////////////////////////////
function pasara1_personalDIRECCION(pasara1_personalDIRECCION_id){

	var checkBox = document.getElementById("DIRECCION"+pasara1_personalDIRECCION_id);
	var pasapersonalDIRECCION_text = "";
	if (checkBox.checked == true){
	pasapersonalDIRECCION_text = "si";
	}else{
	pasapersonalDIRECCION_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personalDIRECCION_id:pasara1_personalDIRECCION_id,pasapersonalDIRECCION_text:pasapersonalDIRECCION_text},
		beforeSend:function(){
		$('#mensajePERSONAL').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal").load(location.href + " #reset_personal");			
			
		$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}

///////////////////////////////////////PARA DAR DE ALTA ADMIN2//////////////////////////////////
function pasara1_personal2ADMIN(pasara1_personal2ADMIN_id){

	var checkBox = document.getElementById("admin"+pasara1_personal2ADMIN_id);
	var pasapersonal2ADMIN_text = "";
	if (checkBox.checked == true){
	pasapersonal2ADMIN_text = "si";
	}else{
	pasapersonal2ADMIN_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personal2ADMIN_id:pasara1_personal2ADMIN_id,pasapersonal2ADMIN_text:pasapersonal2ADMIN_text},
		beforeSend:function(){
		$('#mensajePERSONAL2').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal2").load(location.href + " #reset_personal2");			
			
		$('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}

/////////////////PARA AUTORIZAR BONO VYO////////////////////////////////////
function pasara1_personal2VYO(pasara1_personal2VYO_id){

	var checkBox = document.getElementById("VYO"+pasara1_personal2VYO_id);
	var pasapersonal2VYO_text = "";
	if (checkBox.checked == true){
	pasapersonal2VYO_text = "si";
	}else{
	pasapersonal2VYO_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personal2VYO_id:pasara1_personal2VYO_id,pasapersonal2VYO_text:pasapersonal2VYO_text},
		beforeSend:function(){
		$('#mensajePERSONAL2').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal2").load(location.href + " #reset_personal2");			
			
		$('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}
/////////////////PARA AUTORIZAR BONO DIRECCION////////////////////////////////////
function pasara1_personal2DIRECCION(pasara1_personal2DIRECCION_id){

	var checkBox = document.getElementById("DIRECCION"+pasara1_personal2DIRECCION_id);
	var pasapersonal2DIRECCION_text = "";
	if (checkBox.checked == true){
	pasapersonal2DIRECCION_text = "si";
	}else{
	pasapersonal2DIRECCION_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personal2DIRECCION_id:pasara1_personal2DIRECCION_id,pasapersonal2DIRECCION_text:pasapersonal2DIRECCION_text},
		beforeSend:function(){
		$('#mensajePERSONAL2').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal2").load(location.href + " #reset_personal2");			
			
		$('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}








function pasara1_personal2(pasara1_personal2_id){


	var checkBox = document.getElementById("pasarapersonal2"+pasara1_personal2_id);
	var pasapersonal2_text = "";
	if (checkBox.checked == true){
	pasapersonal2_text = "si";
	}else{
	pasapersonal2_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasara1_personal2_id:pasara1_personal2_id,pasapersonal2_text:pasapersonal2_text},
		beforeSend:function(){
		$('#mensajePERSONAL2').html('cargando');
	},
		success:function(data){
			
	$("#reset_personal2").load(location.href + " #reset_personal2");			
			
		$('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}

function getemployee(){
var NOMBRE_PERSONAL1 = $( "#NOMBRE_PERSONAL option:selected" ).val();
var NOMBRE_PERSONAL2 = $( "#NOMBRE_PERSONAL option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{NOMBRE_PERSONAL1:NOMBRE_PERSONAL1,NOMBRE_PERSONAL2:NOMBRE_PERSONAL2},
beforeSend:function(){
$('#mensajePERSONAL').html('cargando');
},
success:function(data){

		$("#obtener_puesto").load(location.href + " #obtener_puesto");
		$("#obtener_cel").load(location.href + " #obtener_cel");
		$("#obtener_email").load(location.href + " #obtener_email");
$("#mensajePERSONAL").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
}

function getemployee2(){
var NOMBRE_PERSONAL12 = $( "#NOMBRE_PERSONAL2 option:selected" ).val();
var NOMBRE_PERSONAL22 = $( "#NOMBRE_PERSONAL2 option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{NOMBRE_PERSONAL12:NOMBRE_PERSONAL12,NOMBRE_PERSONAL22:NOMBRE_PERSONAL22},
beforeSend:function(){
$('#mensajePERSONAL2').html('cargando');
},
success:function(data){

		$("#obtener_puesto2").load(location.href + " #obtener_puesto2");
		$("#obtener_cel2").load(location.href + " #obtener_cel2");
		$("#obtener_email2").load(location.href + " #obtener_email2");
		$("#mensajePERSONAL2").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
}


function getval(){
var INICIALES_EMPRESA_EVENTO1 = $( "#INICIALES_EMPRESA_EVENTO option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{INICIALES_EMPRESA_EVENTO1:INICIALES_EMPRESA_EVENTO1},
beforeSend:function(){
$('#mensajenumeroevento').html('cargando');
},
success:function(data){

		$("#numeroeventoiniciales").load(location.href + " #numeroeventoiniciales");
$("#mensajenumeroevento").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
}




function pasarpagadoingreso(pasarpagadoingreso_id){
	//$('#personal_detalles4').html();

	var checkBox = document.getElementById("pasarpagadoingreso1a"+pasarpagadoingreso_id);
	var pasarpagadoingreso_text = "";
	if (checkBox.checked == true){
	pasarpagadoingreso_text = "si";
	}else{
	pasarpagadoingreso_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasarpagadoingreso_id:pasarpagadoingreso_id,pasarpagadoingreso_text:pasarpagadoingreso_text},
		beforeSend:function(){
		$('#mensapagosingresos').html('cargando');
	},
		success:function(data){
			
	$("#actualizatotalpagadoingreso").load(location.href + " #actualizatotalpagadoingreso");
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
		$("#reset_totales").load(location.href + " #reset_totales");
		$('#mensapagosingresos').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}



function pasarpagadoegreso(pasarpagadoegreso_id){
	//$('#personal_detalles4').html();


	var checkBox = document.getElementById("pasarpagadoegreso1a"+pasarpagadoegreso_id);
	var pasarpagadoingreso_text = "";
	if (checkBox.checked == true){
	pasarpagadoegreso_text = "si";
	}else{
	pasarpagadoegreso_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasarpagadoegreso_id:pasarpagadoegreso_id,pasarpagadoegreso_text:pasarpagadoegreso_text},
		beforeSend:function(){
		$('#mensapagosingresos').html('cargando');
	},
		success:function(data){
			
	$("#actualizatotalpagadoingreso2").load(location.href + " #actualizatotalpagadoingreso2");
		$("#reset_totales_egresosOTROS").load(location.href + " #reset_totales_egresosOTROS");
		$("#reset_totales").load(location.href + " #reset_totales");
		$('#mensapagosingresos').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	}
	});

}




function pasarpagadoavion(pasarpagadoavion_id){
	//$('#personal_detalles4').html();


	var checkBox = document.getElementById("pasarpagadoavion1a"+pasarpagadoavion_id);
	var pasarpagadoingreso_text = "";
	if (checkBox.checked == true){
	pasarpagadoavion_text = "si";
	}else{
	pasarpagadoavion_text = "no";
	}
	  $.ajax({
		url:'calendariodeeventos2/controladorAE.php',
		method:'POST',
		data:{pasarpagadoavion_id:pasarpagadoavion_id,pasarpagadoavion_text:pasarpagadoavion_text},
		beforeSend:function(){
		$('#mensajeboletosavion').html('cargando');
	},
		success:function(data){
	$("#actualizatotalpagadoavion").load(location.href + " #actualizatotalpagadoavion");
		$('#mensajeboletosavion').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}








///////////////////////PARA FECHAS Y MULTIOLICACION DE LOS MODULOS NUEVOS//////////////////

function OBTENER_foto(){
var VEHICULOSEVE_VEHICULO = $( "#VEHICULOSEVE_VEHICULO option:selected" ).val();
var OBTENER_foto1 = "OBTENER_foto1";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{OBTENER_foto1:OBTENER_foto1,VEHICULOSEVE_VEHICULO:VEHICULOSEVE_VEHICULO},
beforeSend:function(){
},
success:function(data){
		  
		 	$("#fotos_vehiculo").load(location.href + " #fotos_vehiculo"); 
	document.getElementsByName('VEHICULOSEVE_FOTO')[0].value = data;		  
		 		  
}
});
}

function OBTENER_VEHICULO(){
var VEHICULOSEVE_VEHICULO = $( "#VEHICULOSEVE_VEHICULO option:selected" ).val();
var OBTENER_VEHICULO1 = "OBTENER_VEHICULO1";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_VEHICULO:VEHICULOSEVE_VEHICULO,OBTENER_VEHICULO1:OBTENER_VEHICULO1},
beforeSend:function(){
},
success:function(data){
		  //$('#VEHICULOSEVE_DIAS').val(data);
	document.getElementsByName('VEHICULOSEVE_COSTO')[0].value = data;		  
		  $.getScript(total_cantidad_x_precio());	
		  $.getScript(OBTENER_foto());			  
		  $.getScript(OBTENER_color());			  
		  $.getScript(OBTENER_placas());				  
}
});
}

function OBTENER_color(){
var VEHICULOSEVE_VEHICULO = $( "#VEHICULOSEVE_VEHICULO option:selected" ).val();
var OBTENER_color1 = "OBTENER_color1";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_VEHICULO:VEHICULOSEVE_VEHICULO,OBTENER_color1:OBTENER_color1},
beforeSend:function(){
},
success:function(data){
		  //$('#VEHICULOSEVE_DIAS').val(data);
	document.getElementsByName('COLORV')[0].value = data;		  
		  $.getScript(total_cantidad_x_precio());	

}
});
}


function OBTENER_placas(){
var VEHICULOSEVE_VEHICULO = $( "#VEHICULOSEVE_VEHICULO option:selected" ).val();
var OBTENER_placas1 = "OBTENER_placas1";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_VEHICULO:VEHICULOSEVE_VEHICULO,OBTENER_placas1:OBTENER_placas1},
beforeSend:function(){
},
success:function(data){
		  
	document.getElementsByName('PLACASV')[0].value = data;		  
      $.getScript(total_cantidad_x_precio());
}
});
}


function totalfechas(){
var VEHICULOSEVE_DEVOLU = document.getElementsByName("VEHICULOSEVE_DEVOLU")[0].value;
var VEHICULOSEVE_ENTREGA = document.getElementsByName("VEHICULOSEVE_ENTREGA")[0].value;
var cuenta_fechas = "cuenta_fechas";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_DEVOLU:VEHICULOSEVE_DEVOLU,VEHICULOSEVE_ENTREGA:VEHICULOSEVE_ENTREGA,cuenta_fechas:cuenta_fechas},
beforeSend:function(){
},
success:function(data){
		  //$('#VEHICULOSEVE_DIAS').val(data);
	document.getElementsByName('VEHICULOSEVE_DIAS')[0].value = data;		  
		  $.getScript(total_cantidad_x_precio());
}
});
}

function total_cantidad_x_precio(){
var VEHICULOSEVE_DIAS = document.getElementsByName("VEHICULOSEVE_DIAS")[0].value;
var VEHICULOSEVE_COSTO = document.getElementsByName("VEHICULOSEVE_COSTO")[0].value;
var VEHICULOSEVE_CANTIDAD = document.getElementsByName("VEHICULOSEVE_CANTIDAD")[0].value;
var cantidad_precio = "cantidad_precio";
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_DIAS:VEHICULOSEVE_DIAS,VEHICULOSEVE_COSTO:VEHICULOSEVE_COSTO,cantidad_precio:cantidad_precio,VEHICULOSEVE_CANTIDAD:VEHICULOSEVE_CANTIDAD},
beforeSend:function(){
},
success:function(data){
	var result = data.split('^');
	document.getElementsByName('PRECIOPESOS_SOFTWARE')[0].value = result[1];
	document.getElementsByName('VEHICULOSEVE_IVA')[0].value = result[2];	
	document.getElementsByName('VEHICULOSEVE_SUB')[0].value = result[3];
}
});
}

$("#actualizaVehiculos").click(function() {
   			$.getScript(totalfechas());
});








///////////////////////PARA FECHAS Y MULTIOLICACION DE LOS MODULOS NUEVOS MATERIALES//////////////////

/*funcion para obtener foto*/
function OBTENER_fotoMATE(){
        var MATERIAL_EQUIPO = $( "#MATERIAL_EQUIPO option:selected" ).val();      
        var OBTENER_fotoMATE1 = "OBTENER_fotoMATE1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OBTENER_fotoMATE1:OBTENER_fotoMATE1,MATERIAL_EQUIPO:MATERIAL_EQUIPO},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#MATERIAL_DIAS').val(data);
	$("#fotos_materiales").load(location.href + " #fotos_materiales"); 
	document.getElementsByName('MATERIAL_FOTO')[0].value = data;		  
	//$('#mensajeMATERIAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

        }
        });
        }


/*funcion para obtener precio costo x mes*/
        function OBTENER_MATERIAL(){
        var MATERIAL_EQUIPO = $( "#MATERIAL_EQUIPO option:selected" ).val();
        var OBTENER_MATERIAL1 = "OBTENER_MATERIAL1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{MATERIAL_EQUIPO:MATERIAL_EQUIPO,OBTENER_MATERIAL1:OBTENER_MATERIAL1},
        beforeSend:function(){
        },
        success:function(data){
	$('#mensajeMATERIAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                          //$('#MATERIAL_DIAS').val(data);
                document.getElementsByName('MATERIAL_COSTO')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio2());	
                          $.getScript(OBTENER_fotoMATE());			  
        }
        });
        }
        
        
/*funcion para obtener fecha */
        function totalfechas2(){
        var MATERIAL_DEVOLU = document.getElementsByName("MATERIAL_DEVOLU")[0].value;
        var MATERIAL_ENTREGA = document.getElementsByName("MATERIAL_ENTREGA")[0].value;
        var cuenta_fechas2 = "cuenta_fechas2";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{MATERIAL_DEVOLU:MATERIAL_DEVOLU,MATERIAL_ENTREGA:MATERIAL_ENTREGA,cuenta_fechas2:cuenta_fechas2},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#MATERIAL_DIAS').val(data);
                document.getElementsByName('MATERIAL_DIAS')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio2());
        }
        });
        }
        
        function total_cantidad_x_precio2(){
        var MATERIAL_DIAS = document.getElementsByName("MATERIAL_DIAS")[0].value;
        var MATERIAL_COSTO = document.getElementsByName("MATERIAL_COSTO")[0].value;
        var MATERIAL_CANTIDAD = document.getElementsByName("MATERIAL_CANTIDAD")[0].value;
        var cantidad_precioMATE = "cantidad_precioMATE";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{MATERIAL_DIAS:MATERIAL_DIAS,MATERIAL_COSTO:MATERIAL_COSTO,cantidad_precioMATE:cantidad_precioMATE,MATERIAL_CANTIDAD:MATERIAL_CANTIDAD},
        beforeSend:function(){
        },
        success:function(data){
                var result = data.split('^');
                document.getElementsByName('MATERIAL_TOTAL')[0].value = result[1];
                document.getElementsByName('MATERIAL_IVA')[0].value = result[2];	
                document.getElementsByName('MATERIAL_SUB')[0].value = result[3];
        }
        });
        }
        
        $("#actualizamateriales").click(function() {
                                   $.getScript(totalfechas2());
        });




///////////////////////PARA FECHAS Y MULTIOLICACION DE LOS MODULOS NUEVOS PAPELERIA//////////////////

/*funcion para obtener foto*/
function OBTENER_fotoPAPE(){
        var PAPELERIA_EQUIPO = $( "#PAPELERIA_EQUIPO option:selected" ).val();      
        var OBTENER_fotoPAPE1 = "OBTENER_fotoPAPE1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OBTENER_fotoPAPE1:OBTENER_fotoPAPE1,PAPELERIA_EQUIPO:PAPELERIA_EQUIPO},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#PAPELERIA_DIAS').val(data);
	$("#fotos_papeleria").load(location.href + " #fotos_papeleria"); 
	document.getElementsByName('PAPELERIA_FOTO')[0].value = data;		  
	//$('#mensajePAPELERIA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

        }
        });
        }


/*funcion para obtener precio costo x mes*/
        function OBTENER_PAPELERIA(){
        var PAPELERIA_EQUIPO = $( "#PAPELERIA_EQUIPO option:selected" ).val();
        var OBTENER_PAPELERIA1 = "OBTENER_PAPELERIA1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{PAPELERIA_EQUIPO:PAPELERIA_EQUIPO,OBTENER_PAPELERIA1:OBTENER_PAPELERIA1},
        beforeSend:function(){
        },
        success:function(data){
	$('#mensajePAPELERIA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                          //$('#PAPELERIA_DIAS').val(data);
                document.getElementsByName('PAPELERIA_COSTO')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio3());	
                          $.getScript(OBTENER_fotoPAPE());			  
        }
        });
        }
        
        
/*funcion para obtener fecha */
        function totalfechas3(){
        var PAPELERIA_DEVOLU = document.getElementsByName("PAPELERIA_DEVOLU")[0].value;
        var PAPELERIA_ENTREGA = document.getElementsByName("PAPELERIA_ENTREGA")[0].value;
        var cuenta_fechas3 = "cuenta_fechas3";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{PAPELERIA_DEVOLU:PAPELERIA_DEVOLU,PAPELERIA_ENTREGA:PAPELERIA_ENTREGA,cuenta_fechas3:cuenta_fechas3},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#PAPELERIA_DIAS').val(data);                                            
                document.getElementsByName('PAPELERIA_DIAS')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio3());
        }
        });
        }
        
        function total_cantidad_x_precio3(){
        var PAPELERIA_DIAS = document.getElementsByName("PAPELERIA_DIAS")[0].value;
        var PAPELERIA_COSTO = document.getElementsByName("PAPELERIA_COSTO")[0].value;
        var PAPELERIA_CANTIDAD = document.getElementsByName("PAPELERIA_CANTIDAD")[0].value;
        var cantidad_precioPAPE = "cantidad_precioPAPE";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{PAPELERIA_DIAS:PAPELERIA_DIAS,PAPELERIA_COSTO:PAPELERIA_COSTO,cantidad_precioPAPE:cantidad_precioPAPE,PAPELERIA_CANTIDAD:PAPELERIA_CANTIDAD},
        beforeSend:function(){
        },
        success:function(data){
                var result = data.split('^');
                document.getElementsByName('PAPELERIA_TOTAL')[0].value = result[1];
                document.getElementsByName('PAPELERIA_IVA')[0].value = result[2];	
                document.getElementsByName('PAPELERIA_SUB')[0].value = result[3];
        }
        });
        }                                                 
        
        $("#actualizapapeleria").click(function() {
                                   $.getScript(totalfechas3());
        });




///////////////////////PARA FECHAS Y MULTIOLICACION DE LOS MODULOS NUEVOS OFICINA//////////////////

/*funcion para obtener foto*/
function OBTENER_fotoOFI(){
        var OFICINA_EQUIPO = $( "#OFICINA_EQUIPO option:selected" ).val();      
        var OBTENER_fotoOFI1 = "OBTENER_fotoOFI1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OBTENER_fotoOFI1:OBTENER_fotoOFI1,OFICINA_EQUIPO:OFICINA_EQUIPO},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#OFICINA_DIAS').val(data);
	$("#fotos_oficina").load(location.href + " #fotos_oficina"); 
	document.getElementsByName('OFICINA_FOTO')[0].value = data;		  
	//$('#mensajeOFICINA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

        }
        });
        }


/*funcion para obtener precio costo x mes*/
        function OBTENER_OFICINA(){
        var OFICINA_EQUIPO = $( "#OFICINA_EQUIPO option:selected" ).val();
        var OBTENER_OFICINA1 = "OBTENER_OFICINA1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OFICINA_EQUIPO:OFICINA_EQUIPO,OBTENER_OFICINA1:OBTENER_OFICINA1},
        beforeSend:function(){
        },
        success:function(data){
	$('#mensajeOFICINA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                          //$('#OFICINA_DIAS').val(data);
                document.getElementsByName('OFICINA_COSTO')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio4());	
                          $.getScript(OBTENER_fotoOFI());			  
        }
        });
        }
        
        
/*funcion para obtener fecha */
        function totalfechas4(){
        var OFICINA_DEVOLU = document.getElementsByName("OFICINA_DEVOLU")[0].value;
        var OFICINA_ENTREGA = document.getElementsByName("OFICINA_ENTREGA")[0].value;     
        var cuenta_fechas4 = "cuenta_fechas4";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OFICINA_DEVOLU:OFICINA_DEVOLU,OFICINA_ENTREGA:OFICINA_ENTREGA,cuenta_fechas4:cuenta_fechas4},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#OFICINA_DIAS').val(data);                                            
                document.getElementsByName('OFICINA_DIAS')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio4());
        }
        });
        }
        
        function total_cantidad_x_precio4(){                                      
        var OFICINA_DIAS = document.getElementsByName("OFICINA_DIAS")[0].value;
        var OFICINA_COSTO = document.getElementsByName("OFICINA_COSTO")[0].value;
        var OFICINA_CANTIDAD = document.getElementsByName("OFICINA_CANTIDAD")[0].value;
        var cantidad_precioOFI = "cantidad_precioOFI";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OFICINA_DIAS:OFICINA_DIAS,OFICINA_COSTO:OFICINA_COSTO,cantidad_precioOFI:cantidad_precioOFI,OFICINA_CANTIDAD:OFICINA_CANTIDAD},
        beforeSend:function(){
        },
        success:function(data){
                var result = data.split('^');
                document.getElementsByName('OFICINA_TOTAL')[0].value = result[1];
                document.getElementsByName('OFICINA_IVA')[0].value = result[2];	
                document.getElementsByName('OFICINA_SUB')[0].value = result[3];
        }
        });
        }                                                 
        
        $("#actualizaoficina").click(function() {
                                   $.getScript(totalfechas4());                     
        });





///////////////////////PARA FECHAS Y MULTIOLICACION DE LOS MODULOS NUEVOS BOTIQUIN//////////////////

/*funcion para obtener foto*/
function OBTENER_fotoBOTI(){
        var BOTIQUIN_EQUIPO = $( "#BOTIQUIN_EQUIPO option:selected" ).val();      
        var OBTENER_fotoBOTI1 = "OBTENER_fotoBOTI1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{OBTENER_fotoBOTI1:OBTENER_fotoBOTI1,BOTIQUIN_EQUIPO:BOTIQUIN_EQUIPO},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#BOTIQUIN_DIAS').val(data);
	$("#fotos_botiquin").load(location.href + " #fotos_botiquin"); 
	document.getElementsByName('BOTIQUIN_FOTO')[0].value = data;		  
	//$('#mensajeBOTIQUIN').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

        }
        });
        }


/*funcion para obtener precio costo x mes*/
        function OBTENER_BOTIQUIN(){
        var BOTIQUIN_EQUIPO = $( "#BOTIQUIN_EQUIPO option:selected" ).val();
        var OBTENER_BOTIQUIN1 = "OBTENER_BOTIQUIN1";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{BOTIQUIN_EQUIPO:BOTIQUIN_EQUIPO,OBTENER_BOTIQUIN1:OBTENER_BOTIQUIN1},
        beforeSend:function(){
        },
        success:function(data){
	$('#mensajeBOTIQUIN').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                          //$('#BOTIQUIN_DIAS').val(data);
                document.getElementsByName('BOTIQUIN_COSTO')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio5());	
                          $.getScript(OBTENER_fotoBOTI());			  
        }
        });
        }
        
        
/*funcion para obtener fecha */
        function totalfechas5(){
        var BOTIQUIN_DEVOLU = document.getElementsByName("BOTIQUIN_DEVOLU")[0].value;
        var BOTIQUIN_ENTREGA = document.getElementsByName("BOTIQUIN_ENTREGA")[0].value;     
        var cuenta_fechas5 = "cuenta_fechas5";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',                        
        method:'POST',
        data:{BOTIQUIN_DEVOLU:BOTIQUIN_DEVOLU,BOTIQUIN_ENTREGA:BOTIQUIN_ENTREGA,cuenta_fechas5:cuenta_fechas5},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#BOTIQUIN_DIAS').val(data);                                            
                document.getElementsByName('BOTIQUIN_DIAS')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio5());    
        }
        });
        }
        
        function total_cantidad_x_precio5(){                                      
        var BOTIQUIN_DIAS = document.getElementsByName("BOTIQUIN_DIAS")[0].value;
        var BOTIQUIN_COSTO = document.getElementsByName("BOTIQUIN_COSTO")[0].value;
        var BOTIQUIN_CANTIDAD = document.getElementsByName("BOTIQUIN_CANTIDAD")[0].value;
        var cantidad_precioBOTI = "cantidad_precioBOTI";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{BOTIQUIN_DIAS:BOTIQUIN_DIAS,BOTIQUIN_COSTO:BOTIQUIN_COSTO,cantidad_precioBOTI:cantidad_precioBOTI,BOTIQUIN_CANTIDAD:BOTIQUIN_CANTIDAD},
        beforeSend:function(){
        },
        success:function(data){
                var result = data.split('^');
                document.getElementsByName('BOTIQUIN_TOTAL')[0].value = result[1];
                document.getElementsByName('BOTIQUIN_IVA')[0].value = result[2];	
                document.getElementsByName('BOTIQUIN_SUB')[0].value = result[3];
        }
        });
        }                                                 
        
        $("#actualizabotiquin").click(function() {   
                                   $.getScript(totalfechas5());                     
        });


///////////////////////BONOS  1////////////////////////////////////////////////////////////////////////////////





        
        
/*funcion para obtener fecha */
        function totalfechas7(){
        var FECHA_FINAL = document.getElementsByName("FECHA_FINAL")[0].value;
        var FECHA_INICIO = document.getElementsByName("FECHA_INICIO")[0].value;     
        var cuenta_fechas7 = "cuenta_fechas7";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',                        
        method:'POST',
        data:{FECHA_FINAL:FECHA_FINAL,FECHA_INICIO:FECHA_INICIO,cuenta_fechas7:cuenta_fechas7},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#BOTIQUIN_DIAS').val(data);                                            
                document.getElementsByName('NUMERO_DIAS')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio7());    
        }
        });
        }
            function total_cantidad_x_precio7(){                                      
        var NUMERO_DIAS = document.getElementsByName("NUMERO_DIAS")[0].value;
        var MONTO_BONO = document.getElementsByName("MONTO_BONO")[0].value;
        var VIATICOS_PERSONAL = document.getElementsByName("VIATICOS_PERSONAL")[0].value;
        var FECHA_FINAL = document.getElementsByName("FECHA_FINAL")[0].value;
		
        var cantidad_precioBONO = "cantidad_precioBONO";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        method:'POST',
        data:{NUMERO_DIAS:NUMERO_DIAS,MONTO_BONO:MONTO_BONO,cantidad_precioBONO:cantidad_precioBONO,VIATICOS_PERSONAL:VIATICOS_PERSONAL,FECHA_FINAL:FECHA_FINAL},
        beforeSend:function(){
        },
        success:function(data){
                var result = data.split('^');
                document.getElementsByName('TOTAL')[0].value = result[1];
                document.getElementsByName('MONTO_BONO_TOTAL')[0].value = result[2];
                document.getElementsByName('ULTIMO_DIA')[0].value = result[3];				
        }
        });
        }                                               


              $("#actualizabonos").click(function() {   
                                   $.getScript(totalfechas7());                     
        });                             





////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////BONOS  2////////////////////////////////////////////////////////////////////////////////





        
        
/*funcion para obtener fecha */
        function totalfechas8(){
        var FECHA_FINAL1 = document.getElementsByName("FECHA_FINAL1")[0].value;
        var FECHA_INICIO1 = document.getElementsByName("FECHA_INICIO1")[0].value;     
        var cuenta_fechas8 = "cuenta_fechas8";
        $.ajax({
        url:'calendariodeeventos2/controladorAE.php',                        
        method:'POST',
        data:{FECHA_FINAL1:FECHA_FINAL1,FECHA_INICIO1:FECHA_INICIO1,cuenta_fechas8:cuenta_fechas8},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#BOTIQUIN_DIAS').val(data);                                            
                document.getElementsByName('NUMERO_DIAS1')[0].value = data;		  
                          $.getScript(total_cantidad_x_precio8());    
        }
        });
        }
		
	function total_cantidad_x_precio8(){
        var NUMERO_DIAS1 = document.getElementsByName("NUMERO_DIAS1")[0].value;
        var MONTO_BONO1 = document.getElementsByName("MONTO_BONO1")[0].value;
        var VIATICOS_PERSONAL2 = document.getElementsByName("VIATICOS_PERSONAL2")[0].value;
        var FECHA_FINAL1 = document.getElementsByName("FECHA_FINAL1")[0].value;
        var cantidad_precioBONO1 = "cantidad_precioBONO1";
        $.ajax({
			url:'calendariodeeventos2/controladorAE.php',
			method:'POST',
			data:{
				NUMERO_DIAS1:NUMERO_DIAS1,MONTO_BONO1:MONTO_BONO1,cantidad_precioBONO1:cantidad_precioBONO1,VIATICOS_PERSONAL2:VIATICOS_PERSONAL2,FECHA_FINAL1:FECHA_FINAL1
				},
			beforeSend:function(){
			},
			success:function(data){
				var result = data.split('^');
				document.getElementsByName('TOTAL1')[0].value = result[1];
				document.getElementsByName('MONTO_BONO_TOTAL1')[0].value = result[2];
				document.getElementsByName('ULTIMO_DIA1')[0].value = result[3];				
			}
        });
	}                                               


              $("#actualizabonos2").click(function() {   
                                   $.getScript(totalfechas8());                     
        });  
		





////////////////////////////////////DIRECCION DE EMPRESAS////////////////////////////////////////////////////
function direccion(){
var MENSAJERIA_EMPRESA_LUGAR1 = $( "#MENSAJERIA_EMPRESA_LUGAR option:selected" ).val();
var MENSAJERIA_EMPRESA_LUGAR2 = $( "#MENSAJERIA_EMPRESA_LUGAR option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_EMPRESA_LUGAR1:MENSAJERIA_EMPRESA_LUGAR1,MENSAJERIA_EMPRESA_LUGAR2:MENSAJERIA_EMPRESA_LUGAR2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');
				//getElementById


				
                $('#ED_INFORMACION').val(result[0]);
                 $('#CA_INFORMACION').val(result[1]);	
                 $('#NE_INFORMACION').val(result[2]);
                 $('#NI_INFORMACION').val(result[3]);
                 $('#NDO_INFORMACION').val(result[4]);	
                 $('#COL_INFORMACION').val(result[5]);
                 $('#AL_INFORMACION').val(result[6]);
                $('#CP_INFORMACION').val(result[7]);	
                $('#CIU_INFORMACION').val(result[8]);
                $('#ES_INFORMACION').val(result[9]);
                $('#PA_INFORMACION').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC').val(result[11]);
                $('#TEL_INFORMACION').val(result[12]);
               $('#TEL2_INFORMACION').val(result[13]);
                $('#WHA_INFORMACION').val(result[14]);
		

	$("#direccionP").load(location.href + " #direccionP");
	$("#direccionC").load(location.href + " #direccionC");			
}
});
}

/////////////////////////////////////////////DIRECCION DE PROVEEDORES////////////////////////////////////////////////
function direccionP(){
var MENSAJERIA_SELECCIONAR1 = $( "#MENSAJERIA_SELECCIONAR option:selected" ).val();
var MENSAJERIA_SELECCIONAR2 = $( "#MENSAJERIA_SELECCIONAR option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_SELECCIONAR1:MENSAJERIA_SELECCIONAR1,MENSAJERIA_SELECCIONAR2:MENSAJERIA_SELECCIONAR2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');
				//getElementById
                $('#ED_INFORMACION').val(result[0]);
                 $('#CA_INFORMACION').val(result[1]);	
                 $('#NE_INFORMACION').val(result[2]);
                 $('#NI_INFORMACION').val(result[3]);
                 $('#NDO_INFORMACION').val(result[4]);	
                 $('#COL_INFORMACION').val(result[5]);
                 $('#AL_INFORMACION').val(result[6]);
                $('#CP_INFORMACION').val(result[7]);	
                $('#CIU_INFORMACION').val(result[8]);
                $('#ES_INFORMACION').val(result[9]);
                $('#PA_INFORMACION').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC').val(result[11]);
                $('#TEL_INFORMACION').val(result[12]);
               $('#TEL2_INFORMACION').val(result[13]);
                $('#WHA_INFORMACION').val(result[14]);
		
	$("#direccion").load(location.href + " #direccion");
	$("#direccionC").load(location.href + " #direccionC");			
}
});
}


//////////////////////////////////////////DIRECCION DE CLIENTES////////////////////////////////////////
function direccionC(){
var MENSAJERIA_EMPRESADIRE1 = $( "#MENSAJERIA_EMPRESADIRE option:selected" ).val();
var MENSAJERIA_EMPRESADIRE2 = $( "#MENSAJERIA_EMPRESADIRE option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_EMPRESADIRE1:MENSAJERIA_EMPRESADIRE1,MENSAJERIA_EMPRESADIRE2:MENSAJERIA_EMPRESADIRE2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');
				//getElementById
                $('#ED_INFORMACION').val(result[0]);
                 $('#CA_INFORMACION').val(result[1]);	
                 $('#NE_INFORMACION').val(result[2]);
                 $('#NI_INFORMACION').val(result[3]);
                 $('#NDO_INFORMACION').val(result[4]);	
                 $('#COL_INFORMACION').val(result[5]);
                 $('#AL_INFORMACION').val(result[6]);
                $('#CP_INFORMACION').val(result[7]);	
                $('#CIU_INFORMACION').val(result[8]);
                $('#ES_INFORMACION').val(result[9]);
                $('#PA_INFORMACION').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC').val(result[11]);
                $('#TEL_INFORMACION').val(result[12]);
               $('#TEL2_INFORMACION').val(result[13]);
                $('#WHA_INFORMACION').val(result[14]);
		
	$("#direccion").load(location.href + " #direccion");
	$("#direccionP").load(location.href + " #direccionP");
	
}
});
}





////////////////////////////////////DIRECCION DE EMPRESAS RECIBE////////////////////////////////////////////////////
function direccion2(){
var MENSAJERIA_LLEVARNOMBRE1 = $( "#MENSAJERIA_LLEVARNOMBRE option:selected" ).val();
var MENSAJERIA_LLEVARNOMBRE2 = $( "#MENSAJERIA_LLEVARNOMBRE option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_LLEVARNOMBRE1:MENSAJERIA_LLEVARNOMBRE1,MENSAJERIA_LLEVARNOMBRE2:MENSAJERIA_LLEVARNOMBRE2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');

                $('#ED_INFORMACION2').val(result[0]);
                 $('#CA_INFORMACION2').val(result[1]);	
                 $('#NE_INFORMACION2').val(result[2]);
                 $('#NI_INFORMACION2').val(result[3]);
                 $('#NDO_INFORMACION2').val(result[4]);	
                 $('#COL_INFORMACION2').val(result[5]);
                 $('#AL_INFORMACION2').val(result[6]);
                $('#CP_INFORMACION2').val(result[7]);	
                $('#CIU_INFORMACION2').val(result[8]);
                $('#ES_INFORMACION2').val(result[9]);
                $('#PA_INFORMACION2').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC2').val(result[11]);
                $('#TEL_INFORMACION2').val(result[12]);
               $('#TEL2_INFORMACION2').val(result[13]);
                $('#WHA_INFORMACION2').val(result[14]);
		

	$("#direccionP2").load(location.href + " #direccionP2");
	$("#direccionC2").load(location.href + " #direccionC2");	
	$("#resetea_NOMBREPERSONAB").load(location.href + " #resetea_NOMBREPERSONAB");
	
	}
});
}

/////////////////////////////////////////////DIRECCION DE PROVEEDORES  RECIBE/////////////////////////////////////////////

function direccionP2(){
var MENSAJERIA_SELECCIONARB1 = $( "#MENSAJERIA_SELECCIONARB option:selected" ).val();
var MENSAJERIA_SELECCIONARB2 = $( "#MENSAJERIA_SELECCIONARB option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_SELECCIONARB1:MENSAJERIA_SELECCIONARB1,MENSAJERIA_SELECCIONARB2:MENSAJERIA_SELECCIONARB2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');
				//getElementById
                $('#ED_INFORMACION2').val(result[0]);
                 $('#CA_INFORMACION2').val(result[1]);	
                 $('#NE_INFORMACION2').val(result[2]);
                 $('#NI_INFORMACION2').val(result[3]);
                 $('#NDO_INFORMACION2').val(result[4]);	
                 $('#COL_INFORMACION2').val(result[5]);
                 $('#AL_INFORMACION2').val(result[6]);
                $('#CP_INFORMACION2').val(result[7]);	
                $('#CIU_INFORMACION2').val(result[8]);
                $('#ES_INFORMACION2').val(result[9]);
                $('#PA_INFORMACION2').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC2').val(result[11]);
                $('#TEL_INFORMACION2').val(result[12]);
               $('#TEL2_INFORMACION2').val(result[13]);
                $('#WHA_INFORMACION2').val(result[14]);
		
	$("#direccion2").load(location.href + " #direccion2");
	$("#direccionC2").load(location.href + " #direccionC2");	
	$("#resetea_NOMBREPERSONAB").load(location.href + " #resetea_NOMBREPERSONAB");
}
});
}


//////////////////////////////////////////DIRECCION DE CLIENTES  RECIBE////////////////////////////////////////
function direccionC2(){
var MENSAJERIA_DIRECCIONB1 = $( "#MENSAJERIA_DIRECCIONB option:selected" ).val();
var MENSAJERIA_DIRECCIONB2 = $( "#MENSAJERIA_DIRECCIONB option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_DIRECCIONB1:MENSAJERIA_DIRECCIONB1,MENSAJERIA_DIRECCIONB2:MENSAJERIA_DIRECCIONB2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                var result = data.split('^');
				//getElementById
                $('#ED_INFORMACION2').val(result[0]);
                 $('#CA_INFORMACION2').val(result[1]);	
                 $('#NE_INFORMACION2').val(result[2]);
                 $('#NI_INFORMACION2').val(result[3]);
                 $('#NDO_INFORMACION2').val(result[4]);	
                 $('#COL_INFORMACION2').val(result[5]);
                 $('#AL_INFORMACION2').val(result[6]);
                $('#CP_INFORMACION2').val(result[7]);	
                $('#CIU_INFORMACION2').val(result[8]);
                $('#ES_INFORMACION2').val(result[9]);
                $('#PA_INFORMACION2').val(result[10]);	
                $('#P_UBICACION_MAPA_EPC2').val(result[11]);
                $('#TEL_INFORMACION2').val(result[12]);
               $('#TEL2_INFORMACION2').val(result[13]);
                $('#WHA_INFORMACION2').val(result[14]);
		
	$("#direccion2").load(location.href + " #direccion2");
	$("#direccionP2").load(location.href + " #direccionP2");
	$("#resetea_NOMBREPERSONAB").load(location.href + " #resetea_NOMBREPERSONAB");
}
});
}


/////////////////////////////////////////////OBTENERCELULARCONTACTO///////////////////////////////////////////


function obtenercelularContacto(){
var MENSAJERIA_NOMBREPERSONAB11 = $( "#MENSAJERIA_NOMBREPERSONAB option:selected" ).val();
var MENSAJERIA_NOMBREPERSONAB22 = $( "#MENSAJERIA_NOMBREPERSONAB option:selected" ).text();
var MENSAJERIA_NOMBREPERSONAB33 = $('select[name=selector]').val();
 
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_NOMBREPERSONAB11:MENSAJERIA_NOMBREPERSONAB11,MENSAJERIA_NOMBREPERSONAB22:MENSAJERIA_NOMBREPERSONAB22,MENSAJERIA_NOMBREPERSONAB33:MENSAJERIA_NOMBREPERSONAB33},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                //var result = data.split('^');
				//getElementById
//console.log(data);
                $('#NEMEROCELENTREGA').val(data);
}
});
}

/////////////////////////////////////////////obtenervehiculo///////////////////////////////////////////


function obtenervehiculo(){
var MENSAJERIA_VEHICULOM1 = $( "#MENSAJERIA_VEHICULOM option:selected" ).val();
var MENSAJERIA_VEHICULOM2 = $( "#MENSAJERIA_VEHICULOM option:selected" ).text();
 
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_VEHICULOM1:MENSAJERIA_VEHICULOM1,MENSAJERIA_VEHICULOM2:MENSAJERIA_VEHICULOM2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                //var result = data.split('^');
				//getElementById
//console.log(data);
	$("#reset_MENSAJERIA_VEHICULOM").load(location.href + " #reset_MENSAJERIA_VEHICULOM");
                //$('#NEMEROCELENTREGA').val(data);
}
});
}



/////////////////////////////////////////////cel solicitante///////////////////////////////////////////
function celsolicitante(){
var MENSAJERIA_SOLICITANTE1 = $( "#MENSAJERIA_SOLICITANTE option:selected" ).val();
var MENSAJERIA_SOLICITANTE2 = $( "#MENSAJERIA_SOLICITANTE option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_SOLICITANTE1:MENSAJERIA_SOLICITANTE1,MENSAJERIA_SOLICITANTE2:MENSAJERIA_SOLICITANTE2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                //var result = data.split();
				//getElementById
                $('#CORREO_1').val(data);

		

//$("#mensajeMENSAJERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
}


 /////////////////////////////////////////////NUEVO NUEVO NUEVO///////////////////////////////////////////
function costovehiculo(){
var MENSAJERIA_REALIZADOPOR1 = $( "#MENSAJERIA_REALIZADOPOR option:selected" ).val();
var MENSAJERIA_REALIZADOPOR2 = $( "#MENSAJERIA_REALIZADOPOR option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{MENSAJERIA_REALIZADOPOR1:MENSAJERIA_REALIZADOPOR1,MENSAJERIA_REALIZADOPOR2:MENSAJERIA_REALIZADOPOR2},
beforeSend:function(){
//$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
                //var result = data.split();
				//getElementById
                $('#COSTO').val(data);

		
		$.getScript(totalmensajeria()); 
//$("#mensajeMENSAJERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
}


/////////////////////calculos mensajeria//////

	function totalmensajeria(){
		//MENSAJERIA_COSTOCAMIONETA
        var MENSAJERIA_COSTOCAMIONETA = document.getElementsByName("MENSAJERIA_COSTOCAMIONETA")[0].value;
        var MENSAJERIA_COSTOGASOLINA = document.getElementsByName("MENSAJERIA_COSTOGASOLINA")[0].value;
        var MENSAJERIA_COSTOCASETAS = document.getElementsByName("MENSAJERIA_COSTOCASETAS")[0].value;
        var MENSAJERIA_COSTOESTACIONAMIENTO = document.getElementsByName("MENSAJERIA_COSTOESTACIONAMIENTO")[0].value;
        var MENSAJERIA_COSTOGASTOS = document.getElementsByName("MENSAJERIA_COSTOGASTOS")[0].value;
        var MENSAJERIA_TOTAL = document.getElementsByName("MENSAJERIA_TOTAL")[0].value;
        var CALCULO_MENSAJERIA = "CALCULO_MENSAJERIA";
        $.ajax({
			url:'calendariodeeventos2/controladorAE.php',
			method:'POST',
			data:{
				MENSAJERIA_COSTOGASOLINA:MENSAJERIA_COSTOGASOLINA,MENSAJERIA_COSTOCAMIONETA:MENSAJERIA_COSTOCAMIONETA,MENSAJERIA_COSTOCASETAS:MENSAJERIA_COSTOCASETAS,MENSAJERIA_COSTOESTACIONAMIENTO:MENSAJERIA_COSTOESTACIONAMIENTO,MENSAJERIA_COSTOGASTOS:MENSAJERIA_COSTOGASTOS,MENSAJERIA_TOTAL:MENSAJERIA_TOTAL,CALCULO_MENSAJERIA:CALCULO_MENSAJERIA
				},
			beforeSend:function(){
			},
			success:function(data){
                document.getElementsByName('MENSAJERIA_TOTAL')[0].value = data;				
			}
        });
	}


	$("#actualizacalculosmensajeria").click(function() { 
		$.getScript(totalmensajeria());                     
	});    

	$("#actualizacalculosmensajeria").click(function() { 
		$.getScript(totalmensajeria());                     
	}); 

/////////////////////calculos mensajeria//////
















	$(document).ready(function(){

$("#clickbuscar").click(function(){
const formData = new FormData($('#buscaform')[0]);

$.ajax({
    url: 'calendariodeeventos2/fetch_pagesInventario.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(data) {
				
	$("#results").load("inventario/fetch_pagesInventario.php");

})
.fail(function() {
    console.log("detect error");
});
});

/////////////////////SCRIPT enviar EMAIL///UPDATE ALTA EVENTOS/////
$(document).on('click', '#BUTTON_ALTA_EVENTOS1', function(){
var EMAIL_ALTA_EVENTOS1 = $('#EMAIL_ALTA_EVENTOS1').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_altaevento1").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_ALTA_EVENTOS1:EMAIL_ALTA_EVENTOS1},


beforeSend:function(){
$('#mensajeALTAEVENTOS').html('cargando');
},
success:function(data){
$('#mensajeALTAEVENTOS').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});






$("#ENVIAR_EVENTOS").click(function(){
const formData = new FormData($('#ALTAEVENTOSform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    },    
   success:function(data){
	       var replaceSlashes = data.replace(/2/g, "");
	$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
	   
	$("#mensajeALTAEVENTOS").html("<span id='ACTUALIZADO' >"+replaceSlashes+"</span>");
	
	$("#2SUBIR_COTIZACION").load(location.href + " #2SUBIR_COTIZACION");
	$("#2SUBIR_ORDEN_COMPRA").load(location.href + " #2SUBIR_ORDEN_COMPRA");
	$("#2SUBIR_CONTRATO_FIRMADO").load(location.href + " #2SUBIR_CONTRATO_FIRMADO");
	$("#2SUBIR_COTIZACION_FIRMADA").load(location.href + " #2SUBIR_COTIZACION_FIRMADA");
	$("#2LOGO_CLIENTE").load(location.href + " #2LOGO_CLIENTE");
	$("#2IMAGEN_EVENTO").load(location.href + " #2IMAGEN_EVENTO");
	$("#ARCHIVO_RELACIONADO_MONTAJE").load(location.href + " #ARCHIVO_RELACIONADO_MONTAJE");
   }
   
})
});





 $(document).on('click', '.view_dataaltaeventosborrar', function(){
  //$('#dataModal').modal();
  var borra_ALTAE = $(this).attr("id");
  var borraraltaeventos = "borraraltaeventos";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR
  
  $.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_ALTAE:borra_ALTAE,borraraltaeventos:borraraltaeventos},
   
    beforeSend:function(){  
    $('#mensajeINVENTARIOG').html('cargando'); 
    },    
   success:function(data){
	   		$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
	   			$('#dataModal3').modal('hide');
			$("#mensajeALTAEVENTOS").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	
   }
  });
   //AGREGAR	
	});
  //AGREGAR	
 });

//SCRIPT PARA BORRAR FOTOGRAFIA
$(document).on('click', '.view_dataAEborrar', function(){
var borra_fotoid = $(this).attr('id');
var borrafoto = 'borrafoto';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{borra_fotoid:borra_fotoid,borrafoto:borrafoto},
beforeSend:function(){
$('#mensajeALTAEVENTOS').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeALTAEVENTOS').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
$('#'+borra_fotoid).load(location.href + ' #'+borra_fotoid);
$('#A'+borra_fotoid).load(location.href + ' #A'+borra_fotoid);
}
});
});
});









/**//**//**//**//**//**//**//**/
/*CIERRE*/
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/

/////////////////////SCRIPT enviar EMAIL///CRONOS VUELOS/////
$(document).on('click', '#BUTTON_email_cierre', function(){
var EMAIL_cierre_e = $('#EMAIL_cierre_e').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_cierre").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_cierre_e:EMAIL_cierre_e},


beforeSend:function(){
$('#mensajecierre').html('cargando');
},
success:function(data){
$('#mensajecierre').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});






 $(document).on('click', '.view_dataaltaeventosmodifica', function(){
 
  var personal_id = $(this).attr("id");
  $.ajax({
    url: 'calendariodeeventos2/vistapreviaeventos.php',
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajecierre').html('cargando'); 
    },    
   success:function(data){
	$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    $('#dataModal').modal('show');
   }
  });
 });






$("#GUARDAR_CIERRE").click(function(){
const formData = new FormData($('#cierreEVENTOSform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajecierre').html('cargando'); 
    },    
   success:function(data){
			$("#mensajecierre").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	$("#reset_cierre").load(location.href + " #reset_cierre");

   }
   
})
});



$(document).on('click', '.view_datacierreborrar', function(){
var borra_CIERREID = $(this).attr('id');
var borraCIERRE = 'borraCIERRE';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{borra_CIERREID:borra_CIERREID,borraCIERRE:borraCIERRE},
beforeSend:function(){
$('#mensajecierre').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajecierre').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	$("#reset_cierre").load(location.href + " #reset_cierre");

}
});
});
});

/////////////////////  COTIZACION DE PROVEEDORES //////////////////////////////////////



$("#GUARDAR_COTIPRO").click(function(){
const formData = new FormData($('#COTIPROform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeCOTIPRO').html('cargando'); 
    },    
   success:function(data){
	   $('#COTIPROform')[0].reset(); 
	
		$("#reset_COTIPRO").load(location.href + " #reset_COTIPRO");	
			$("#mensajeCOTIPRO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_COTIPRO', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaCOTIPRO.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeCOTIPRO').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataCOTIPROborrar', function(){

  var borra_cotipro = $(this).attr("id");
  var borra_COTIPRO = "borra_COTIPRO";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
  url:"calendariodeeventos2/controladorAE.php",
   method:"POST",
   data:{borra_cotipro:borra_cotipro,borra_COTIPRO:borra_COTIPRO},
   
    beforeSend:function(){  
    $('#mensajeCOTIPRO').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeCOTIPRO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_COTIPRO").load(location.href + " #reset_COTIPRO");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_COTIPRO', function(){
var EMAIL_COTIPRO = $('#EMAIL_COTIPRO').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_COTIPRO").serialize();

$.ajax({
  url:"calendariodeeventos2/controladorAE.php",
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_COTIPRO:EMAIL_COTIPRO},


beforeSend:function(){
$('#mensajeCOTIPRO').html('cargando');
},
success:function(data){
$('#mensajeCOTIPRO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});








/////////////////////  COTIZACION DE CLIENTES//////////////////////////////////////



$("#GUARDAR_COTICLIENTES").click(function(){
const formData = new FormData($('#COTICLIENTESform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeCOTICLIENTES').html('cargando'); 
    },    
   success:function(data){
	    $('#COTICLIENTESform')[0].reset(); 
		$("#ADJUNTO_COTICLIENTES").load(location.href + " #ADJUNTO_COTICLIENTES");
	
		$("#reset_COTICLIENTES").load(location.href + " #reset_COTICLIENTES");	
			$("#mensajeCOTICLIENTES").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_COTICLIENTES', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaCOTICLIENTE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeCOTICLIENTES').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataCOTICLIENTESborrar', function(){

  var borra_cotiCLIENTES = $(this).attr("id");
  var borra_COTICLIENTES = "borra_COTICLIENTES";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
  url:"calendariodeeventos2/controladorAE.php",
   method:"POST",
   data:{borra_cotiCLIENTES:borra_cotiCLIENTES,borra_COTICLIENTES:borra_COTICLIENTES},
   
    beforeSend:function(){  
    $('#mensajeCOTICLIENTES').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeCOTICLIENTES").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_COTICLIENTES").load(location.href + " #reset_COTICLIENTES");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_COTICLIENTES', function(){
var EMAIL_COTICLIENTES = $('#EMAIL_COTICLIENTES').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_COTICLIENTES").serialize();

$.ajax({
  url:"calendariodeeventos2/controladorAE.php",
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_COTICLIENTES:EMAIL_COTICLIENTES},


beforeSend:function(){
$('#mensajeCOTICLIENTES').html('cargando');
},
success:function(data){
$('#mensajeCOTICLIENTES').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});




/////////////////////   CONTRATO//////////////////////////////////////



$("#GUARDAR_CONTRATO").click(function(){
const formData = new FormData($('#CONTRATOform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeCONTRATO').html('cargando'); 
    },    
   success:function(data){
	    $('#CONTRATOform')[0].reset(); 
		$("#ADJUNTO_CONTRATO").load(location.href + " #ADJUNTO_CONTRATO");
	
		$("#reset_CONTRATO").load(location.href + " #reset_CONTRATO");	
			$("#mensajeCONTRATO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_CONTRATO', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaCONTRATO.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeCONTRATO').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataCONTRATOborrar', function(){

  var borra_CONTRA = $(this).attr("id");
  var borra_CONTRATO = "borra_CONTRATO";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
  url:"calendariodeeventos2/controladorAE.php",
   method:"POST",
   data:{borra_CONTRA:borra_CONTRA,borra_CONTRATO:borra_CONTRATO},
   
    beforeSend:function(){  
    $('#mensajeCONTRATO').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeCONTRATO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_CONTRATO").load(location.href + " #reset_CONTRATO");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_CONTRATO', function(){
var EMAIL_CONTRATO = $('#EMAIL_CONTRATO').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_CONTRATO").serialize();

$.ajax({
  url:"calendariodeeventos2/controladorAE.php",
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_CONTRATO:EMAIL_CONTRATO},


beforeSend:function(){
$('#mensajeCONTRATO').html('cargando');
},
success:function(data){
$('#mensajeCONTRATO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//NOMBRE DEL BOTÓN
$(document).on('click', '.view_datamodifica', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'pagoproveedores/VistaPreviapaGO.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#personal_detalles9').html(data);
$('#dataModal9').modal('toggle');
$("#reset_totales").load(location.href + " #reset_totales");
$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
}
});
});



//NOMBRE DEL BOTÓN
$(document).on('click', '.view_dataSUBIRF', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'pagoproveedores/VistaPreviapaGO2.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#personal_detalles5').html(data);
$('#dataModal5').modal('toggle');
$("#reset_totales").load(location.href + " #reset_totales");
$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
}
});
});
/**//**//**//**//**//**//**//**/
//NOMBRE DEL BOTÓN
$(document).on('click', '.view_dataSUBIRCOMP', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'pagoproveedores/VistaPreviapagoproveedorU2.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeventasoperaciones').html('cargando');
},
success:function(data){
$('#personal_detalles5').html(data);
$('#dataModal5').modal('toggle');
$("#reset_totales").load(location.href + " #reset_totales");
}
});
});
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/





/**//**//**//**//**//**//**//**/
/*OPERATIVO*/
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/

/////////////////////SCRIPT enviar EMAIL///CRONOS VUELOS/////
$(document).on('click', '#BUTTON_EMAIL_PO', function(){
var EMAIL_PROGRAMA_OPERATIVO = $('#EMAIL_PROGRAMA_OPERATIVO').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_po").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_PROGRAMA_OPERATIVO:EMAIL_PROGRAMA_OPERATIVO},


beforeSend:function(){
$('#mensajePROGRAMAOPERATIVO').html('cargando');
},
success:function(data){
$('#mensajePROGRAMAOPERATIVO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});




//MODIFICA
 $(document).on('click', '.view_dataPROGRAMAmodifica', function(){
 
  var personal_id = $(this).attr("id");
  $.ajax({
    url: 'calendariodeeventos2/VistapreviaProgramaOperativo.php',
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajePROGRAMAOPERATIVO').html('cargando'); 
    },    
   success:function(data){
	$("#reset_OPERATIVO").load(location.href + " #reset_OPERATIVO");
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    $('#dataModal').modal('show');
   }
  });
 });





//GUARDA
$("#GUARDAR_PROGRAMAOPERATIVO").click(function(){
const formData = new FormData($('#PROGRAMAOPERATIVOform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajePROGRAMAOPERATIVO').html('cargando'); 
    },    
   success:function(data){
			$("#mensajePROGRAMAOPERATIVO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	$("#reset_OPERATIVO").load(location.href + " #reset_OPERATIVO");
   }
   
})
});


//BORRA
//borraOPERATIVO
$(document).on('click', '.view_dataPROGRAMAborrar', function(){
var borra_ID_OPERATIVO = $(this).attr('id');
var borraOPERATIVO = 'borraOPERATIVO';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{borra_ID_OPERATIVO:borra_ID_OPERATIVO,borraOPERATIVO:borraOPERATIVO},
beforeSend:function(){
$('#mensajePROGRAMAOPERATIVO').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajePROGRAMAOPERATIVO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	$("#reset_OPERATIVO").load(location.href + " #reset_OPERATIVO");

}
});
});
});


/**//**//**//**//**//**//**//**/
/*OPERATIVO*/
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/





/**//**//**//**//**//**//**//**/
/*ROOMING*/
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/

/////////////////////SCRIPT enviar rooming
$(document).on('click', '#BUTTON_email_rooming', function(){
var EMAIL_rooming = $('#EMAIL_rooming').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_rooming").serialize();

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_rooming:EMAIL_rooming},

beforeSend:function(){
$('#mensajeROOMING').html('cargando');
},
success:function(data){
$('#mensajeROOMING').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});





 $(document).on('click', '.view_dataROOMINGmodifica', function(){
 
  var personal_id = $(this).attr("id");
  $.ajax({
    url: 'calendariodeeventos2/VistapreviaRoomingList.php',
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeROOMING').html('cargando'); 
    },    
   success:function(data){
	$("#reset_rooming").load(location.href + " #reset_rooming");
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    $('#dataModal').modal('show');
   }
  });
 });






$("#GUARDAR_ROOMING").click(function(){
const formData = new FormData($('#ROOMINGform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeROOMING').html('cargando'); 
    },    
   success:function(data){
			$("#mensajeROOMING").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	$("#reset_rooming").load(location.href + " #reset_rooming");

   }
   
})
});


//reset_rooming
$(document).on('click', '.view_dataROMMINGborrar', function(){
var borra_ROOMING_ID = $(this).attr('id');
var borraROOMING = 'borraROOMING';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{borraROOMING:borraROOMING,borra_ROOMING_ID:borra_ROOMING_ID},
beforeSend:function(){
$('#mensajeROOMING').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeROOMING').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	$("#reset_rooming").load(location.href + " #reset_rooming");

}
});
});
});


/**//**//**//**//**//**//**//**/
/*ROOMING*/
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/


//////////////////////////////////FEE COBRADO AL CLIENTE//////////////////////////////////////////////



$("#GUARDAR_FEECOBRADO").click(function(){
const formData = new FormData($('#FEECOBRADOform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeFEECOBRADO').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_FEECOBRADO").load(location.href + " #reset_FEECOBRADO");	
			$("#mensajeFEECOBRADO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});





$(document).on('click', '.view_FEECOBRADO', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaFEECOBRADO.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeFEECOBRADO').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataFEECOBRADOborrar', function(){

  var borra_fee_cobrado = $(this).attr("id");
  var borra_FEECOBRADO = "borra_FEECOBRADO";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
  url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_fee_cobrado:borra_fee_cobrado,borra_FEECOBRADO:borra_FEECOBRADO},
   
    beforeSend:function(){  
    $('#mensajeFEECOBRADO').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeFEECOBRADO").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_FEECOBRADO").load(location.href + " #reset_FEECOBRADO");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_FEECOBRADO', function(){
var EMAIL_FEECOBRADO = $('#EMAIL_FEECOBRADO').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_FEECOBRADO").serialize();

$.ajax({
  url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_FEECOBRADO:EMAIL_FEECOBRADO},


beforeSend:function(){
$('#mensajeFEECOBRADO').html('cargando');
},
success:function(data){
$('#mensajeFEECOBRADO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});



///////////////////////////////////////////////////porcentaje  fee/////////////////////////////////////////////

$("#GUARDAR_PORCENTAJE2").click(function(){
const formData = new FormData($('#porcentajefeeform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeporcentajefee').html('cargando'); 
    },    
   success:function(data){

	var resultado = data.split('^');
	$("#resultado").val(resultado[0]);
	$("#FEE_COBRADO").val(resultado[0]);	
	$("#PORCENTAJE_FEE").val(resultado[2]);
		//$("#reset_FEECOBRADO").load(location.href + " #reset_FEECOBRADO");	
	$("#mensajeporcentajefee").html("<span id='ACTUALIZADO' >"+resultado[1]+"</span>");

   }
   
})
});



/////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click', '.view_datacierremodifica', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'calendariodeeventos2/VistapreviaCierre.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeALTAEVENTOS').html('cargando');
},
success:function(data){
$('#personal_detalles').html(data);
$('#dataModal').modal('toggle');
}
});
});

/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/





 $(document).on('click', '.view_dataaltaeventosmodifica', function(){
 
  var personal_id = $(this).attr("id");
  $.ajax({
    url: 'calendariodeeventos2/vistapreviaeventos.php',
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    },    
   success:function(data){
	$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    $('#dataModal').modal('show');
   }
  });
 });





$("#GUARDAR_NUMERO_EVENTO").click(function(){
const formData = new FormData($('#numeroeventosform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajenumeroevento').html('cargando'); 
    },    
   success:function(data){
	$("#numeroevento1a").load(location.href + " #numeroevento1a");
	$("#fechaautorizacion").load(location.href + " #fechaautorizacion");
	$("#refreshnumevento").load(location.href + " #refreshnumevento");
	$("#numeroeventoiniciales").load(location.href + " #numeroeventoiniciales");	
			$("#mensajenumeroevento").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
	
   }
   
})
});










/**//*quitar si trabaja onchange*/
$(document).on('click', '#buscarINICIALES', function(){
var INICIALES_EMPRESA_EVENTO1 = $( "#INICIALES_EMPRESA_EVENTO option:selected" ).text();
$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
data:{INICIALES_EMPRESA_EVENTO1:INICIALES_EMPRESA_EVENTO1},
beforeSend:function(){
$('#mensajenumeroevento').html('cargando');
},
success:function(data){

		$("#numeroeventoiniciales").load(location.href + " #numeroeventoiniciales");
$("#mensajenumeroevento").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		
}
});
});






















/////////////////////////////NUEVO DOCUMENTO CIERRE ////////////////


$("#enviardocucierre").click(function(){
const formData = new FormData($('#DOCUMENTONUEVOcierreform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeDOCUnuevocierre').html('cargando'); 
    },    
   success:function(data){
	
		$("#reseteateNUEVOCIERRE").load(location.href + " #reseteateNUEVOCIERRE");	
			$("#mensajeDOCUnuevocierre").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
		$("#despleResetCierre").load(location.href + " #despleResetCierre");	

   }
   
})
});



$(document).on('click', '.view_dataNUEVOdocucierre', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPrevianuevodocucierre.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeDOCUnuevocierre').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
    $('#mensajeDOCUnuevocierre').html(''); 	
   }
  });
 });

$(document).on('click', '.view_databorraNUEVOdocucierre', function(){

  var borra_NUEVOD = $(this).attr("id");
  var BORRAREGISTRO_cierrenuevo = "BORRAREGISTRO_cierrenuevo";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_NUEVOD:borra_NUEVOD,BORRAREGISTRO_cierrenuevo:BORRAREGISTRO_cierrenuevo},
   
    beforeSend:function(){  
    $('#mensajeDOCUnuevocierre').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeDOCUnuevocierre").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reseteateNUEVOCIERRE").load(location.href + " #reseteateNUEVOCIERRE");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });	




///////////////////////////CRONOLOGICO DE VUELOS//////////////////////////////




$("#GUARDAR_CRONOVUELOS").click(function(){
const formData = new FormData($('#cronoVUELOSform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajecronov').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_cronovuelos").load(location.href + " #reset_cronovuelos");	
			$("#mensajecronov").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});



$(document).on('click', '.view_dataCRONOVUELOS', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviacronosvuelos.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajecronov').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 });

$(document).on('click', '.view_dataCRONOVUELOSborrar', function(){

  var borra_cronosvuelos = $(this).attr("id");
  var borra_CRONOSV = "borra_CRONOSV";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_cronosvuelos:borra_cronosvuelos,borra_CRONOSV:borra_CRONOSV},
   
    beforeSend:function(){  
    $('#mensajecronov').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajecronov").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_cronovuelos").load(location.href + " #reset_cronovuelos");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL///CRONOS VUELOS/////
$(document).on('click', '#BUTTON_CRONO_VUELOS', function(){
var EMAIL_CRNO_VUELOS = $('#EMAIL_CRNO_VUELOS').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_cronovuelos").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_CRNO_VUELOS:EMAIL_CRNO_VUELOS},


beforeSend:function(){
$('#mensajecronov').html('cargando');
},
success:function(data){
$('#mensajecronov').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});











///////////////////////////CRONOLOGICO TERRRESTRE//////////////////////////////

/////////////////////SCRIPT enviar EMAIL///CRONOS TERRRESTRE/////
$(document).on('click', '#BUTTON_cronoterrestre', function(){
var EMAIL_cronoterrestre = $('#EMAIL_cronoterrestre').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_cronoterrestre").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_cronoterrestre:EMAIL_cronoterrestre},


beforeSend:function(){
$('#mensajecronoterrestre').html('cargando');
},
success:function(data){
$('#mensajecronoterrestre').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});


$("#GUARDAR_cronoterrestre").click(function(){
const formData = new FormData($('#cronoterrestreform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajecronoterrestre').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_cronoterrestre").load(location.href + " #reset_cronoterrestre");	
			$("#mensajecronoterrestre").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});



$(document).on('click', '.view_datacronoterrestre', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviacronosterrestre.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajecronoterrestre').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 });

$(document).on('click', '.view_datacronoterrestreborrar', function(){

  var borra_cronos_T = $(this).attr("id");
  var borra_CRONOSTERRRE = "borra_CRONOSTERRRE";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_cronos_T:borra_cronos_T,borra_CRONOSTERRRE:borra_CRONOSTERRRE},
   
    beforeSend:function(){  
    $('#mensajecronoterrestre').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajecronoterrestre").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_cronoterrestre").load(location.href + " #reset_cronoterrestre");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		




//////////////////////////////////Cobros cliente//////////////////////////////



$("#GUARDAR_COBROSCLIENTE").click(function(){
const formData = new FormData($('#cronoCOBROSform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajecobroscliente').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_cobroscliente").load(location.href + " #reset_cobroscliente");	
			$("#mensajecobroscliente").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_datacobroscliente1', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviacobroscliente.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajecobroscliente').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_datacobrosclienteborrar', function(){

  var borra_cobros_C = $(this).attr("id");
  var borra_COBROSCLIENTE = "borra_COBROSCLIENTE";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_cobros_C:borra_cobros_C,borra_COBROSCLIENTE:borra_COBROSCLIENTE},
   
    beforeSend:function(){  
    $('#mensajecobroscliente').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajecobroscliente").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_cobroscliente").load(location.href + " #reset_cobroscliente");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_COBROS_CLIENTES', function(){
var EMAIL_COBROS_CLIENTES = $('#EMAIL_COBROS_CLIENTES').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_cobroscliente").serialize();

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_COBROS_CLIENTES:EMAIL_COBROS_CLIENTES},


beforeSend:function(){
$('#mensajecobroscliente').html('cargando');
},
success:function(data){
$('#mensajecobroscliente').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});


////////////////////////////////////////INGRESOS//////////////////////////////////////////




$("#GUARDA_PAGOS").click(function(){
const formData = new FormData($('#pagosingresosform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensapagosingresos').html('cargando'); 
    },    
   success:function(data){
	   $('#pagosingresosform')[0].reset(); 
		$("#ADJUNTO_INGRESOS").load(location.href + " #ADJUNTO_INGRESOS");	
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");	
		$("#reset_ingresos").load(location.href + " #reset_ingresos");
		$("#reset_totales").load(location.href + " #reset_totales");
			$("#mensapagosingresos").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_datapagoingreso', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviapagosingresos.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensapagosingresos').html('CARGANDO'); 
    },    
   success:function(data){
		$("#ADJUNTO_INGRESOS").load(location.href + " #ADJUNTO_INGRESOS");
		$("#reset_totales").load(location.href + " #reset_totales");
		$("#reset_ingresos").load(location.href + " #reset_ingresos");
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
		

    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_datapagoingresoborrar', function(){

  var borra_cobros_INGRE = $(this).attr("id");
  var borra_PAGOSINGRESOS = "borra_PAGOSINGRESOS";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_cobros_INGRE:borra_cobros_INGRE,borra_PAGOSINGRESOS:borra_PAGOSINGRESOS},
   
    beforeSend:function(){  
    $('#mensapagosingresos').html('CARGANDO'); 
    },    
   success:function(data){
		$("#reset_totales").load(location.href + " #reset_totales");
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
	   			$('#dataModal3').modal('hide');	   
			$("#mensapagosingresos").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_ingresos").load(location.href + " #reset_ingresos");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });	

$(document).on('click', '#BUTTON_PAGOS_INGRESOS', function(){
var EMAIL_PAGOS_INGRESOS = $('#EMAIL_PAGOS_INGRESOS').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_pagosingresos").serialize();



$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_PAGOS_INGRESOS:EMAIL_PAGOS_INGRESOS},


beforeSend:function(){
$('#mensapagosingresos').html('cargando');
},
success:function(data){
$('#mensapagosingresos').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});





/////////////////////////////////////////EGRESOS//////////////////////////////////////////



$("#GUARDAR_pagosegresos").click(function(){
const formData = new FormData($('#pagosegresosform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajepagosegresos').html('cargando'); 
    },    
   success:function(data){
	 $('#pagosegresosform')[0].reset(); 
		$("#ADJUNTO_EGRESO").load(location.href + " #ADJUNTO_EGRESO");
		$("#reset_egresos").load(location.href + " #reset_egresos");
			$("#reset_totales").load(location.href + " #reset_totales");		
			$("#reset_totales_egresosOTROS").load(location.href + " #reset_totales_egresosOTROS");		
			$("#mensajepagosegresos").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});



$(document).on('click', '.view_datapagoegreso', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviapgoegreso.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
		
    $('#mensajepagosegresos').html('CARGANDO'); 
    },    
   success:function(data){
	   $("#ADJUNTO_EGRESO").load(location.href + " #ADJUNTO_EGRESO");
	
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
	
   }
  });
 })



$(document).on('click', '.view_datapagoegresoborrar', function(){

  var borra_pago_egre = $(this).attr("id");
  var borra_PAGOEGRESOS = "borra_PAGOEGRESOS";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_pago_egre:borra_pago_egre,borra_PAGOEGRESOS:borra_PAGOEGRESOS},
   
    beforeSend:function(){  
    $('#mensajepagosegresos').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajepagosegresos").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_egresos").load(location.href + " #reset_egresos");
			$("#reset_totales_egresosOTROS").load(location.href + " #reset_totales_egresosOTROS");
			$("#reset_totales").load(location.href + " #reset_totales");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });	


//////////EMAIL EGRESOS//////////////
$(document).on('click', '#BUTTON_PAGOS_EGRESOS', function(){
var EMAIL_PAGOS_EGRESOS = $('#EMAIL_PAGOS_EGRESOS').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_pagosEgresos").serialize();



$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_PAGOS_EGRESOS:EMAIL_PAGOS_EGRESOS},


beforeSend:function(){
$('#mensajepagosegresos').html('cargando');
},
success:function(data){
$('#mensajepagosegresos').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});






////////////////////////////BOLETOS AVION//////////////////////////////////////////



$("#GUARDAR_BOLETOSAVION").click(function(){
const formData = new FormData($('#BOLETOSAVIONform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeboletosavion').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_boletos").load(location.href + " #reset_boletos");	
			$("#mensajeboletosavion").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});



$(document).on('click', '.view_databoletosavion', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviaboletoavion.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeboletosavion').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_databoletosavionborrar', function(){

  var borra_bole_avion = $(this).attr("id");
  var borra_BOLETOSAVION = "borra_BOLETOSAVION";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url: 'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_bole_avion:borra_bole_avion,borra_BOLETOSAVION:borra_BOLETOSAVION},
   
    beforeSend:function(){  
    $('#mensajeboletosavion').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeboletosavion").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_boletos").load(location.href + " #reset_boletos");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });	

/////////////EMAIL/////////////////
$(document).on('click', '#BUTTON_EMAIL_BOLETOS_AVION', function(){
var EMAIL_BOLETOS_AVION = $('#EMAIL_BOLETOS_AVION').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_BOLETOSAVION").serialize();

$.ajax({
    url: 'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_BOLETOS_AVION:EMAIL_BOLETOS_AVION},

beforeSend:function(){
$('#mensajeboletosavion').html('cargando');
},
success:function(data){
$('#mensajeboletosavion').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});


//////////////////////////PERSONAL/////////////////////////////////


$("#guardaPERSONAL").click(function () {
    const formData = new FormData($('#PERSONALform')[0]);

    $.ajax({
        url: 'calendariodeeventos2/controladorAE.php',
        type: 'POST',
        dataType: 'html',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,

        beforeSend: function () {
            $('#mensajePERSONAL').html('cargando');
        },

        success: function (data) {

            // 🔹 BORRAR FORMULARIO
            document.getElementById('PERSONALform').reset();

            // 🔹 Recargas existentes
            $("#reset_personal").load(location.href + " #reset_personal");
            $("#reset_totales").load(location.href + " #reset_totales");
            $("#obtener_puesto").load(location.href + " #obtener_puesto");
            $("#obtener_cel").load(location.href + " #obtener_cel");
            $("#NUMERO_DIAS").load(location.href + " #NUMERO_DIAS");
            $("#obtener_email").load(location.href + " #obtener_email");
            $("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");

            $("#mensajePERSONAL")
                .html("<span id='ACTUALIZADO'>" + data + "</span>")
                .fadeIn()
                .delay(2000)
                .fadeOut();
        }
    });
});



$(document).on('click', '.view_dataDATOSpersonalmodifica', function(){
  var personal_id = $(this).attr("id");
  $.ajax({
    url: "calendariodeeventos2/VistaPreviapersonal.php",
    method: "POST",
    data: { personal_id: personal_id },
    beforeSend: function(){  
      $('#mensajePERSONAL').html('CARGANDO');

      setTimeout(function(){
        $('#mensajePERSONAL').html('');
      }, 2000);
    },    
    success: function(data){
      $('#personal_detalles').html(data);
      $('#dataModal').modal('show');
    }
  });
});




$(document).on('click', '.view_dataDATOSpersonalborrar', function(){

  var borra_bole_perso = $(this).attr("id");
  var borra_PERSONAL = "borra_PERSONAL";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_bole_perso:borra_bole_perso,borra_PERSONAL:borra_PERSONAL},
   
    beforeSend:function(){  
    $('#mensajePERSONAL').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajePERSONAL").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_personal").load(location.href + " #reset_personal");
			$("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");
					$("#reset_totales").load(location.href + " #reset_totales");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
});	

$(document).on('click', '.view_dataPERSONALadjuntoBorrar', function(){
  var personal_id = $(this).data("personal");
  var archivo = $(this).data("archivo");
  var borra_ADJUNTO_PERSONAL = "borra_ADJUNTO_PERSONAL";
  var $adjuntoItem = $(this).closest("li");

  $('#personal_detalles3').html();
  $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
    $.ajax({
     url:'calendariodeeventos2/controladorAE.php',
     method:"POST",
     data:{IPpersonal:personal_id, archivo:archivo, borra_ADJUNTO_PERSONAL:borra_ADJUNTO_PERSONAL},
     
      beforeSend:function(){  
      $('#mensajePERSONAL').html('CARGANDO'); 
      },    
     success:function(data){
        $('#dataModal3').modal('hide');	   
        $("#mensajePERSONAL").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
        var $listaAdjuntos = $adjuntoItem.closest("ul");
        $adjuntoItem.remove();
        if($listaAdjuntos.find("li").length === 0){
          $listaAdjuntos.remove();
        }
        var $inputAdjunto = $('#ADJUNTO_COMPROBANTEP');
        if($inputAdjunto.length){
          var actuales = $inputAdjunto.val()
            .split(',')
            .map(function(item){ return item.trim(); })
            .filter(function(item){ return item !== '' && item !== '2' && item !== archivo; });
          $inputAdjunto.val(actuales.join(','));
        }
        $("#reset_personal").load(location.href + " #reset_personal");
        $("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");
        $("#reset_totales").load(location.href + " #reset_totales");
     }
    });
  });
});

/////////////EMAIL/////////////////
$(document).on('click', '#enviarimailPERSONAL', function(){
var PERSONAL_ENVIAR_IMAIL = $('#PERSONAL_ENVIAR_IMAIL').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_personal").serialize();

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{PERSONAL_ENVIAR_IMAIL:PERSONAL_ENVIAR_IMAIL},

beforeSend:function(){
$('#mensajePERSONAL').html('cargando');
},
success:function(data){
$('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});



////////////////////////////PERSONAL2/////////////////////////////////////////////////////////
$("#guardaPERSONAL2").click(function () {
    const formData = new FormData($('#PERSONAL2form')[0]);

    $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        type: 'POST',
        dataType: 'html',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,

        beforeSend: function () {
            $('#mensajePERSONAL2').html('cargando');
        },

        success: function (data) {

            // 🔹 BORRAR FORMULARIO PERSONAL2
            document.getElementById('PERSONAL2form').reset();

            // 🔹 Recargas existentes
            $("#reset_personal2").load(location.href + " #reset_personal2");
            $("#reset_totales").load(location.href + " #reset_totales");

            $("#obtener_puesto2").load(location.href + " #obtener_puesto2");
            $("#obtener_cel2").load(location.href + " #obtener_cel2");
            $("#obtener_email2").load(location.href + " #obtener_email2");
            $("#NUMERO_DIAS1").load(location.href + " #NUMERO_DIAS1");

            $("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");
            $("#reset_totales").load(location.href + " #reset_totales");

            $("#mensajePERSONAL2")
                .html("<span id='ACTUALIZADO'>" + data + "</span>")
                .fadeIn()
                .delay(2000)
                .fadeOut();
        }
    });
});



$(document).on('click', '.view_dataDATOSpersonal2modifica', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"calendariodeeventos2/VistaPreviapersonal2.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajePERSONAL2').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataDATOSpersonal2borrar', function(){

  var borra_perso2 = $(this).attr("id");
  var borra_PERSONAL2 = "borra_PERSONAL2";

  //AGREGAR
    $('#personal2_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
   url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_perso2:borra_perso2,borra_PERSONAL2:borra_PERSONAL2},
   
    beforeSend:function(){  
    $('#mensajePERSONAL2').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajePERSONAL2").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_personal2").load(location.href + " #reset_personal2");
			$("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");
					$("#reset_totales").load(location.href + " #reset_totales");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });	

/////////////EMAIL/////////////////
$(document).on('click', '#enviarimailPERSONAL2', function(){
var PERSONAL2_ENVIAR_IMAIL = $('#PERSONAL2_ENVIAR_IMAIL').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_personal2").serialize();

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{PERSONAL2_ENVIAR_IMAIL:PERSONAL2_ENVIAR_IMAIL},

beforeSend:function(){
$('#mensajePERSONAL2').html('cargando');
},
success:function(data){
$('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});



$(document).on('click', '.view_dataPERSONAL2adjuntoBorrar', function(){
  var personal_id = $(this).data("personal");
  var archivo = $(this).data("archivo");
  var borra_ADJUNTO_PERSONAL2 = "borra_ADJUNTO_PERSONAL2";
  var $adjuntoItem = $(this).closest("li");

  $('#personal_detalles3').html();
  $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
     url: 'calendariodeeventos2/controladorAE.php',
     method:"POST",
     data:{IPpersonal2:personal_id, archivo:archivo, borra_ADJUNTO_PERSONAL2:borra_ADJUNTO_PERSONAL2},
     
      beforeSend:function(){  
      $('#mensajePERSONAL2').html('CARGANDO'); 
      },    
     success:function(data){
        $('#dataModal3').modal('hide');	   
        $("#mensajePERSONAL2").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
        var $listaAdjuntos = $adjuntoItem.closest("ul");
        $adjuntoItem.remove();
   if($listaAdjuntos.find("li").length === 0){
          $listaAdjuntos.remove();
        }
        var $inputAdjunto = $('#ADJUNTO_COMPROBANTE');
        if($inputAdjunto.length){
          var actuales = $inputAdjunto.val()
            .split(',')
            .map(function(item){ return item.trim(); })
            .filter(function(item){ return item !== '' && item !== '2' && item !== archivo; });
          $inputAdjunto.val(actuales.join(','));
        }
        $("#reset_personal2").load(location.href + " #reset_personal2");
        $("#reset_personal_resumen").load(location.href + " #reset_personal_resumen");
        $("#reset_totales").load(location.href + " #reset_totales");
     }
    });
  });
});





///////////////////////////////////////////////////////////////////////////////////////////////////

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        $.ajax({
	            type: 'POST',
	            url: 'TICKETS/controladorPP.php',
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#1'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#mensajeADJUNTOCOL').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
if($.trim(response) == 2 ){
$('#1'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}
else if($.trim(response) == 3 ){
	$('#1'+nombre).html('<p style="color:red;">UUID PREVIAMENTE CARGADO.</p>');
$('#'+nombre).val("");
/*nuevo inicio*/

}
else{
$('#'+nombre).val(response);
$('#1'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');

/*nuevo inicio*/
$("#2ADJUNTAR_FACTURA_XML").load(location.href + " #2ADJUNTAR_FACTURA_XML");
if(nombre == 'ADJUNTAR_FACTURA_XML'){
	//MONTO_FACTURA
$('#RAZON_SOCIAL2').load(location.href + ' #RAZON_SOCIAL2');
$('#RFC_PROVEEDOR2').load(location.href + ' #RFC_PROVEEDOR2');
$('#CONCEPTO_PROVEE2').load(location.href + ' #CONCEPTO_PROVEE2');
$('#TIPO_DE_MONEDA2').load(location.href + ' #TIPO_DE_MONEDA2');
$('#FECHA_DE_PAGO2').load(location.href + ' #FECHA_DE_PAGO2');
$('#NUMERO_CONSECUTIVO_PROVEE2').load(location.href + ' #NUMERO_CONSECUTIVO_PROVEE2');
$('#2MONTO_FACTURA').load(location.href + ' #2MONTO_FACTURA');
$('#2MONTO_DEPOSITAR').load(location.href + ' #2MONTO_DEPOSITAR');
$('#2PFORMADE_PAGO').load(location.href + ' #2PFORMADE_PAGO');

}

			//$('#SUBIRFACTURAform').trigger("reset");
			$('#2'+nombre).load(location.href + ' #2'+nombre);
			$("#resettabla").load(location.href + " #resettabla");
			
/*nuevo final 2PFORMADE_PAGO*/

}

	            }
	        });
	    }
	}
	
	
	
function myFunction(montoapagar_id) {
  var checkBox = document.getElementById("montoapagar"+montoapagar_id);
  var montoapagar_text = "";
  if (checkBox.checked == true){
    montoapagar_text = "enter";
  } else {
     montoapagar_text = "none";
  }
  
$.ajax({
url:'pagoproveedores/fetch_pagesPP.php',
method:'POST',
data:{montoapagar_id:montoapagar_id,montoapagar_text:montoapagar_text},
beforeSend:function(){
$('#mensajemontoapagar').html('cargando');
},
success:function(data){
//$('#resetmontoapagar').html(data);
$('#montoapagartotal').load(location.href + ' #montoapagartotal');
$('#montoapagartotal2').load(location.href + ' #montoapagartotal2');
//$('#personal_detalles').html(data);
//$('#dataModal').modal('toggle');
}
});
  
}




function pasarpagado(pasarpagado_id){
	//$('#personal_detalles4').html();
	//$('#dataModal4').modal('show');	

	var checkBox = document.getElementById("pasarpagado1a"+pasarpagado_id);
	var pasarpagado_text = "";
	if (checkBox.checked == true){
	pasarpagado_text = "si";
	}else{
	pasarpagado_text = "no";
	}
	  $.ajax({
		url:'TICKETS/controladorPP.php',
		method:'POST',
		data:{pasarpagado_id:pasarpagado_id,pasarpagado_text:pasarpagado_text},
		beforeSend:function(){
		$('#pasarpagado').html('cargando');
	},
		success:function(data){
		$('#pasarpagado').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	}
	});

}




////////////////////////////////////////////////////////////////////////////////








	






	/*trabajar aqui tikets*/
$("#enviarTIKETS").click(function(){
	/*nuevo script pbajar archivos y datos*/
const formData = new FormData($('#pagoTIKETSform')[0]);

$.ajax({
    url: 'calendariodeeventos2/controladorTIKETS.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
}).done(function(data) {
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
			/*nuveo inicio*/
			/*$("#pagoTIKETSform")[0].reset(); //resetea formulario
			$("#RAZON_SOCIAL").val(''); //borra valores vienen de PHP
			$("#CONCEPTO_PROVEE").val(''); //borra valores vienen de PHP
			$("#RFC_PROVEEDOR").val(''); //borra valores vienen de PHP
			$("#TIPO_DE_MONEDA").val(''); //borra valores vienen de PHP
			$("#FECHA_DE_PAGO").val(''); //borra valores vienen de PHP
			$("#NUMERO_CONSECUTIVO_PROVEE").val(''); //borra valores vienen de PHP*/
			
			/*reset multi imagen*/
			$("#2ADJUNTAR_FACTURA_XML").load(location.href + " #2ADJUNTAR_FACTURA_XML");
			$("#2ADJUNTAR_FACTURA_PDF").load(location.href + " #2ADJUNTAR_FACTURA_PDF");
			$("#2ADJUNTAR_COTIZACION").load(location.href + " #2ADJUNTAR_COTIZACION");
			$("#2CONPROBANTE_TRANSFERENCIA").load(location.href + " #2CONPROBANTE_TRANSFERENCIA");
			$("#2ADJUNTAR_ARCHIVO_1").load(location.href + " #2ADJUNTAR_ARCHIVO_1");

			//resetea multi item resetSB
			//$("#resetSB").load(location.href + " #resetSB");
			//resetea resumen
			//$("#resettabla").load(location.href + " #resettabla");
			/*nuveo final*/

			$("#mensajeTIKETS").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
            $('#resetTICKETS').load(location.href + ' #resetTICKETS');	
            //$('#resetSB').load(location.href + ' #resetSB');
			//$("#results").load("pagoproveedores/fetch_pagesPP.php");

			$.getScript(loadTIKETS(1));

			
			}else{
			$("#mensajeTIKETS").html(data);
		}
})
.fail(function() {
    console.log("detect error");
});
});


	/*trabajar aqui tikets*/
$("#enviarAVION").click(function(){
	/*nuevo script pbajar archivos y datos*/
const formData = new FormData($('#pagoAVIONform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorTIKETS.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
}).done(function(data) {
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
			/*nuveo inicio*/
			/*$("#pagoTIKETSform")[0].reset(); //resetea formulario
			$("#RAZON_SOCIAL").val(''); //borra valores vienen de PHP
			$("#CONCEPTO_PROVEE").val(''); //borra valores vienen de PHP
			$("#RFC_PROVEEDOR").val(''); //borra valores vienen de PHP
			$("#TIPO_DE_MONEDA").val(''); //borra valores vienen de PHP
			$("#FECHA_DE_PAGO").val(''); //borra valores vienen de PHP
			$("#NUMERO_CONSECUTIVO_PROVEE").val(''); //borra valores vienen de PHP*/
			
			/*reset multi imagen*/
			$("#2ADJUNTAR_FACTURA_XML").load(location.href + " #2ADJUNTAR_FACTURA_XML");
			$("#2ADJUNTAR_FACTURA_PDF").load(location.href + " #2ADJUNTAR_FACTURA_PDF");
			$("#2ADJUNTAR_COTIZACION").load(location.href + " #2ADJUNTAR_COTIZACION");
			$("#2CONPROBANTE_TRANSFERENCIA").load(location.href + " #2CONPROBANTE_TRANSFERENCIA");
			$("#2ADJUNTAR_ARCHIVO_1").load(location.href + " #2ADJUNTAR_ARCHIVO_1");



			$("#mensajeAVION").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
            $('#resetAVION').load(location.href + ' #resetAVION');	
            $("#reset_totales").load(location.href + " #reset_totales");
			$.getScript(loadAVION(1));

			
			}else{
			$("#mensajeAVION").html(data);
		}
})
.fail(function() {
    console.log("detect error");
});
});


//SCRIPT PARA BORRAR FOTOGRAFIA BORRAR
$(document).on('click', '.view_dataSBborrar2', function(){
var borra_id_sb = $(this).attr('id');
var borrasbdoc = 'borrasbdoc';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'TICKETS/controladorPP.php',
method:'POST',
data:{borra_id_sb:borra_id_sb,borrasbdoc:borrasbdoc},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajepagoproveedores').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
$('#'+borra_id_sb).load(location.href + ' #'+borra_id_sb);
$('#A'+borra_id_sb).load(location.href + ' #A'+borra_id_sb);
}
});
});
});



//SCRIPT PARA BORRAR view_dataSBborrar
$(document).on('click', '.view_dataSBborrarAVION', function(){
var borra_id_tic = $(this).attr('id');
var borraTICKETS = 'borraTICKETS';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'calendariodeeventos2/controladorTIKETS.php',
method:'POST',
data:{borra_id_tic:borra_id_tic,borraTICKETS:borraTICKETS},
beforeSend:function(){
$('#mensajeAVION').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeAVION').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
$("#reset_totales").load(location.href + " #reset_totales");
			$.getScript(loadAVION(1));
}
});
});
});



$(document).on('click', '.view_dataPAGOPROVEEmodifica', function(){
var personal_id = $(this).attr('id');  
$.ajax({
url:'calendariodeeventos2/VistaPreviaboletoavion.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeAVION').html('cargando');
},
success:function(data){
$('#personal_detalles').html(data);
$('#dataModal').modal('toggle');
}
});
});

















$(document).on('click', '.view_dataTIKECTSmodifica', function(){
var personal_id = $(this).attr('id');  
$.ajax({
url:'calendariodeeventos2/VistaPreviaTIKETS.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeTIKETS').html('cargando');
},
success:function(data){
$('#personal_detalles').html(data);
$('#dataModal').modal('toggle');
}
});
});

//view_dataTKborrar borra_id_tic
$(document).on('click', '.view_dataTKborrar', function(){
var borra_id_tic = $(this).attr('id');
var borraTICKETS = 'borraTICKETS';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'calendariodeeventos2/controladorTIKETS.php',
method:'POST',
data:{borra_id_tic:borra_id_tic,borraTICKETS:borraTICKETS},
beforeSend:function(){
$('#mensajeTIKETS').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeTIKETS').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
			$.getScript(loadTIKETS(1));
//$('#resetBancario1p').load(location.href + ' #resetBancario1p');
}
});
});
});




///////////////////////VEHICULOS DEL EVENTO////////////////////////////////////////////////
$("#GUARDAR_VEHICULOSEVE").click(function(){
const formData = new FormData($('#VEHICULOSEVEform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeVEHICULOSEVE').html('cargando'); 
    },    
   success:function(data){
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");	
		$("#reset_totales").load(location.href + " #reset_totales");
		$("#reset_VEHICULOSEVE").load(location.href + " #reset_VEHICULOSEVE");	
		$("#mensajeVEHICULOSEVE").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_VEHICULOSEVE', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaVEHICULOSEVE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeVEHICULOSEVE').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataVEHICULOSEVEborrar', function(){

  var borra_vehieve = $(this).attr("id");
  var borra_VEHICULOSEVE = "borra_VEHICULOSEVE";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
    url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_vehieve:borra_vehieve,borra_VEHICULOSEVE:borra_VEHICULOSEVE},
   
    beforeSend:function(){  
    $('#mensajeVEHICULOSEVE').html('CARGANDO'); 
    },    
   success:function(data){
	   $("#reset_totales").load(location.href + " #reset_totales");
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeVEHICULOSEVE").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_VEHICULOSEVE").load(location.href + " #reset_VEHICULOSEVE");

   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		
 
 /////////////////////SCRIPT enviar EMAIL///////
$(document).on('click', '#BUTTON_VEHICULOSEVE', function(){
var EMAIL_VEHICULOSEVE = $('#EMAIL_VEHICULOSEVE').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_vehiculos").serialize();
$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_VEHICULOSEVE:EMAIL_VEHICULOSEVE},


beforeSend:function(){
$('#mensajeVEHICULOSEVE').html('cargando');
},
success:function(data){
$('#mensajeVEHICULOSEVE').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});
 
 
 /*
function totalfechas(){
var VEHICULOSEVE_DEVOLU = document.getElementsByName("VEHICULOSEVE_DEVOLU")[0].value;
var VEHICULOSEVE_ENTREGA = document.getElementsByName("VEHICULOSEVE_ENTREGA")[0].value;
var cuenta_fechas = "cuenta_fechas";
$.ajax({
url:'altaeventos/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_DEVOLU:VEHICULOSEVE_DEVOLU,VEHICULOSEVE_ENTREGA:VEHICULOSEVE_ENTREGA,cuenta_fechas:cuenta_fechas},
beforeSend:function(){
},
success:function(data){
		  $('#VEHICULOSEVE_DIAS').val(data);
		  $.getScript(total_cantidad_x_precio());
}
});
}

function total_cantidad_x_precio(){
var VEHICULOSEVE_DIAS = document.getElementsByName("VEHICULOSEVE_DIAS")[0].value;
var VEHICULOSEVE_COSTO = document.getElementsByName("VEHICULOSEVE_COSTO")[0].value;
var cantidad_precio = "cantidad_precio";
$.ajax({
url:'altaeventos/controladorAE.php',
method:'POST',
data:{VEHICULOSEVE_DIAS:VEHICULOSEVE_DIAS,VEHICULOSEVE_COSTO:VEHICULOSEVE_COSTO,cantidad_precio:cantidad_precio},
beforeSend:function(){
},
success:function(data){
	var result = data.split('^');
	document.getElementsByName('PRECIOPESOS_SOFTWARE')[0].value = result[1];
	document.getElementsByName('VEHICULOSEVE_IVA')[0].value = result[2];	
	document.getElementsByName('VEHICULOSEVE_SUB')[0].value = result[3];
}
});
}

$("#actualizaVehiculos").click(function() {
   			$.getScript(totalfechas());
});
$('#GUARDAR_VEHICULOSEVE').click(function (e) {
    e.stopPropagation();
});
*/
 
 
 
 
 



///////////////////////MATERIAL DEL EVENTO////////////////////////////////////////////////
$("#GUARDAR_MATERIAL").click(function(){
const formData = new FormData($('#MATERIALform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeMATERIAL').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_MATERIAL").load(location.href + " #reset_MATERIAL");	
			$("#mensajeMATERIAL").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_MATERIAL', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaMATERIAL.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATERIAL').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataMATERIALborrar', function(){

  var borra_materiale = $(this).attr("id");
  var borra_MATERIAL = "borra_MATERIAL";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
    url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_materiale:borra_materiale,borra_MATERIAL:borra_MATERIAL},
   
    beforeSend:function(){  
    $('#mensajeMATERIAL').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeMATERIAL").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_MATERIAL").load(location.href + " #reset_MATERIAL");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_MATERIAL', function(){
var EMAIL_MATERIAL = $('#EMAIL_MATERIAL').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_material").serialize();

$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_MATERIAL:EMAIL_MATERIAL},


beforeSend:function(){
$('#mensajeMATERIAL').html('cargando');
},
success:function(data){
$('#mensajeMATERIAL').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});

///////////////////////papeleria////////////////////////////////////////////////

$("#GUARDAR_PAPELERIA").click(function(){
const formData = new FormData($('#PAPELERIAform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajePAPELERIA').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_PAPELERIA").load(location.href + " #reset_PAPELERIA");	
		$("#mensajePAPELERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$("#reset_totales").load(location.href + " #reset_totales");
   }
   
})
});


$(document).on('click', '.view_PAPELERIA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaPAPELERIA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajePAPELERIA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataPAPELERIAborrar', function(){

  var borra_pape = $(this).attr("id");
  var borra_PAPELERIA = "borra_PAPELERIA";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
    url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_pape:borra_pape,borra_PAPELERIA:borra_PAPELERIA},
   
    beforeSend:function(){  
    $('#mensajePAPELERIA').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajePAPELERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			$("#reset_PAPELERIA").load(location.href + " #reset_PAPELERIA");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		

/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_PAPELERIA', function(){
var EMAIL_PAPELERIA = $('#EMAIL_PAPELERIA').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_PAPELERIA").serialize();

$.ajax({
url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_PAPELERIA:EMAIL_PAPELERIA},


beforeSend:function(){
$('#mensajePAPELERIA').html('cargando');
},
success:function(data){
$('#mensajePAPELERIA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});

///////////////////////OFICINA////////////////////////////////////////////////

$("#GUARDAR_OFICINA").click(function(){
    const formData = new FormData($('#OFICINAform')[0]);
    
    $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        type: 'POST',
        dataType: 'html',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        
         beforeSend:function(){  
        $('#mensajeOFICINA').html('cargando'); 
        },    
       success:function(data){
        
		$("#reset_OFICINA").load(location.href + " #reset_OFICINA");	
		$("#mensajeOFICINA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$("#reset_totales").load(location.href + " #reset_totales");
    
       }
       
    })
    });
    
    
    $(document).on('click', '.view_OFICINA', function(){
      //$('#dataModal').modal();
      var personal_id = $(this).attr("id");
      $.ajax({
      url:"calendariodeeventos2/VistaPreviaOFICINA.php",
       method:"POST",
       data:{personal_id:personal_id},
        beforeSend:function(){  
        $('#mensajeOFICINA').html('CARGANDO'); 
        },    
       success:function(data){
        $('#personal_detalles').html(data);
        $('#dataModal').modal('show');
       }
      });
     })
    
    
    
    $(document).on('click', '.view_dataOFICINAborrar', function(){
    
      var borra_ofi = $(this).attr("id");
      var borra_OFICINA = "borra_OFICINA";
    
      //AGREGAR
        $('#personal_detalles3').html();
        $('#dataModal3').modal('show');
      $('#btnYes').click(function() {
      //AGREGAR
    
      
      $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
       method:"POST",
       data:{borra_ofi:borra_ofi,borra_OFICINA:borra_OFICINA},
       
        beforeSend:function(){  
        $('#mensajeOFICINA').html('CARGANDO'); 
        },    
       success:function(data){
                       $('#dataModal3').modal('hide');	   
                $("#mensajeOFICINA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                $("#reset_OFICINA").load(location.href + " #reset_OFICINA");
       }
      });
      
        //AGREGAR	
        });
      //AGREGAR	 
      
     });		
    
    /////////////////////SCRIPT enviar EMAIL//////
    $(document).on('click', '#BUTTON_OFICINA', function(){
    var EMAIL_OFICINA = $('#EMAIL_OFICINA').val();
    
    
            var myCheckboxes = new Array();
            $("input:checked").each(function() {
               myCheckboxes.push($(this).val());
            });
    var dataString = $("#form_emil_OFICINA").serialize();
    
    $.ajax({                                                                            
    url:'calendariodeeventos2/controladorAE.php',
    method:'POST',
    dataType: 'html',
    
    data: dataString+{EMAIL_OFICINA:EMAIL_OFICINA},
    
    
    beforeSend:function(){
    $('#mensajeOFICINA').html('cargando');
    },
    success:function(data){
    $('#mensajeOFICINA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    
    }
    });
    });

///////////////////////BOTIQUIN////////////////////////////////////////////////

$("#GUARDAR_BOTIQUIN").click(function(){
    const formData = new FormData($('#BOTIQUINform')[0]);
    
    $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
        type: 'POST',
        dataType: 'html',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        
         beforeSend:function(){  
        $('#mensajeBOTIQUIN').html('cargando'); 
        },    
       success:function(data){
        
		$("#reset_BOTIQUIN").load(location.href + " #reset_BOTIQUIN");	
		$("#mensajeBOTIQUIN").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$("#reset_totales").load(location.href + " #reset_totales");
       }
       
    })
    });
    
    
    $(document).on('click', '.view_BOTIQUIN', function(){
      //$('#dataModal').modal();
      var personal_id = $(this).attr("id");
      $.ajax({
      url:"calendariodeeventos2/VistaPreviaBOTIQUIN.php",
       method:"POST",
       data:{personal_id:personal_id},
        beforeSend:function(){  
        $('#mensajeBOTIQUIN').html('CARGANDO'); 
        },    
       success:function(data){
        $('#personal_detalles').html(data);
        $('#dataModal').modal('show');
       }
      });
     })
    
    
    
    $(document).on('click', '.view_dataBOTIQUINborrar', function(){
    
      var borra_botiq = $(this).attr("id");
      var borra_BOTIQUIN = "borra_BOTIQUIN";
    
      //AGREGAR
        $('#personal_detalles3').html();
        $('#dataModal3').modal('show');
      $('#btnYes').click(function() {
      //AGREGAR
    
      
      $.ajax({
        url:'calendariodeeventos2/controladorAE.php',
       method:"POST",
       data:{borra_botiq:borra_botiq,borra_BOTIQUIN:borra_BOTIQUIN},
       
        beforeSend:function(){  
        $('#mensajeBOTIQUIN').html('CARGANDO'); 
        },    
       success:function(data){
                       $('#dataModal3').modal('hide');	   
                $("#mensajeBOTIQUIN").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
                $("#reset_BOTIQUIN").load(location.href + " #reset_BOTIQUIN");
       }
      });
      
        //AGREGAR	
        });
      //AGREGAR	 
      
     });		
    
    /////////////////////SCRIPT enviar EMAIL//////
    $(document).on('click', '#BUTTON_BOTIQUIN', function(){
    var EMAIL_BOTIQUIN = $('#EMAIL_BOTIQUIN').val();
    
    
            var myCheckboxes = new Array();
            $("input:checked").each(function() {
               myCheckboxes.push($(this).val());
            });
    var dataString = $("#form_email_BOTIQUIN").serialize();
    
    $.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    method:'POST',
    dataType: 'html',
    
    data: dataString+{EMAIL_BOTIQUIN:EMAIL_BOTIQUIN},
    
    
    beforeSend:function(){
    $('#mensajeBOTIQUIN').html('cargando');
    },
    success:function(data){
    $('#mensajeBOTIQUIN').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
    
    }
    });
    });	
	/////////////////////  PORVENDEDOR   //////////////////////////////////////



$("#GUARDAR_PORVENDEDOR").click(function(){
const formData = new FormData($('#PORVENDEDORform')[0]);

$.ajax({
   url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajePORVENDEDOR').html("<span id='ACTUALIZADO' >cargando</span>"); 
    },    
   success:function(data){
		$("#reset_totales").load(location.href + " #reset_totales");
		$("#reset_PORVENDEDOR").load(location.href + " #reset_PORVENDEDOR");	
		$("#mensajePORVENDEDOR").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(3000).fadeOut();

   }
   
})
});


$(document).on('click', '.view_PORVENDEDOR', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaPORVENDEDOR.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajePORVENDEDOR').html('CARGANDO').fadeIn().delay(10000).fadeOut(); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })



$(document).on('click', '.view_dataPORVENDEDORborrar', function(){

  var borra_vendedor = $(this).attr("id");
  var borra_PORVENDEDOR = "borra_PORVENDEDOR";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
 url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_vendedor:borra_vendedor,borra_PORVENDEDOR:borra_PORVENDEDOR},
   
    beforeSend:function(){  
    $('#mensajePORVENDEDOR').html('CARGANDO');
    },    
   success:function(data){
			$("#reset_totales").load(location.href + " #reset_totales");
			$('#dataModal3').modal('hide');	   
			$("#mensajePORVENDEDOR").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(1000).fadeOut();			
			$("#reset_PORVENDEDOR").load(location.href + " #reset_PORVENDEDOR");
   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });		








/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_PORVENDEDOR', function(){
var EMAIL_PORVENDEDOR = $('#EMAIL_PORVENDEDOR').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_PORVENDEDOR").serialize();

$.ajax({
 url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_PORVENDEDOR:EMAIL_PORVENDEDOR},


beforeSend:function(){
$('#mensajePORVENDEDOR').html('cargando');
},
success:function(data){
$('#mensajePORVENDEDOR').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});	

$(document).on('click', '.view_INCIDENCIAS', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"INCIDENCIAS/VistaPreviaINCIDENCIAS.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINCIDENCIAS').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })	
 
 $(document).on('click', '.view_INCIDENCIAS', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"INCIDENCIAS/VistaPreviaINCIDENCIAS2.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINCIDENCIAS').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })	
 
 $(document).on('click', '.view_MENSAJERIAmodifica', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"calendariodeeventos2/VistaPreviaMENSAJERIA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMENSAJERIA').html('CARGANDO').fadeIn().delay(100000).fadeOut(); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
		$.getScript(load1m(1));
   }
  });
 })
 
 
 
 ///////////////////////MENSAJERIA////////////////////////////////////////////////
$("#GUARDAR_MENSAJERIA").click(function(){
const formData = new FormData($('#MENSAJERIAform')[0]);

$.ajax({
    url:'calendariodeeventos2/controladorAE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeMENSAJERIA').html('cargando'); 
    },    
   success:function(data){
	
		$("#reset_MENSAJERIA").load(location.href + " #reset_MENSAJERIA");//revisar para borrar	
			$("#mensajeMENSAJERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$.getScript(load1m(1));			

   }
   
})
});


$(document).on('click', '.view_dataMENSAJERIAborrar', function(){

  var borra_mensa = $(this).attr("id");
  var borra_MENSAJERIA = "borra_MENSAJERIA";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR

  
  $.ajax({
 url:'calendariodeeventos2/controladorAE.php',
   method:"POST",
   data:{borra_mensa:borra_mensa,borra_MENSAJERIA:borra_MENSAJERIA},
   
    beforeSend:function(){  
    $('#mensajeMENSAJERIA').html('CARGANDO');
    },    
   success:function(data){
			$("#reset_totales").load(location.href + " #reset_totales");
			$('#dataModal3').modal('hide');	   
			$("#mensajeMENSAJERIA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(1000).fadeOut();			
			$("#reset_MENSAJERIA").load(location.href + " #reset_MENSAJERIA");
		$.getScript(load1m(1));	

   }
  });
  
    //AGREGAR	
	});
  //AGREGAR	 
  
 });















/////////////////////SCRIPT enviar EMAIL//////
$(document).on('click', '#BUTTON_MENSAJERIA', function(){
var EMAIL_MENSAJERIA = $('#EMAIL_MENSAJERIA').val();


        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emai_MENSAJERIA").serialize();

$.ajax({
 url:'calendariodeeventos2/controladorAE.php',
method:'POST',
dataType: 'html',

data: dataString+{EMAIL_MENSAJERIA:EMAIL_MENSAJERIA},


beforeSend:function(){
$('#mensajeMENSAJERIA').html('cargando');
},
success:function(data){
$('#mensajeMENSAJERIA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

}
});
});	

//////////////////////////////////MATCH CON ESTADO DE CUENTA AMERICAN EXPRESS//////////////////////////////

/*FORMULARIO PARA CARGAR EXCEL*/

$("#enviarEXCELMATCH").click(function(){
const formData = new FormData($('#importanteexcelformMATCH')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCH').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$.getScript(load1(1));
	//$("#reset_MATCH").load(location.href + " #reset_MATCH");
	$("#DOCUU_excelMATCH").val(null);
   }
});
});


/*GUARDA FORMULARIO PRINCIPAL reset_MATCH */
$("#GUARDAR_MATCH").click(function(){
const formData = new FormData($('#MATCHform')[0]);
$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeMATCH').html('cargando'); 
    },    
   success:function(data){
	   		$.getScript(load1(1));
		//$("#reset_MATCH").load(location.href + " #reset_MATCH");	
			$("#mensajeMATCH").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
   }
})
});

/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_MATCH', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaAMERICANE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })

//view_dataBBVAborrar
$(document).on('click', '.view_dataMATCHborrar', function(){
  var borra_matchh = $(this).attr("id");
  var borra_MATCH = "borra_MATCH";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchh:borra_matchh,borra_MATCH:borra_MATCH},
   
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeMATCH").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
		$.getScript(load1(1));
			//$("#reset_MATCH").load(location.href + " #reset_MATCH");
   }
  });
	});  
 });
 


/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCHAMERICANE', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaAMERICAN_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDOaa'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_MATCH', function(){
var EMAIL_MATCH = $('#EMAIL_MATCH').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_MATCH").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_MATCH:EMAIL_MATCH},
beforeSend:function(){
$('#mensajeMATCH').html('cargando');
},
success:function(data){
$('#mensajeMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
}
});
});


/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_AMERICANE', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETAAMERICANE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH2AMERICANE').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })


//////////////////////////////////MATCH CON ESTADO DE CUENTA BBVA//////////////////////////////
//////////////////////////////////MATCH CON ESTADO DE CUENTA BBVA//////////////////////////////



/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCH2', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaBBVA_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })

/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_TARJETABBVA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETABBVA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })
 
//view_dataBBVAborrar
$(document).on('click', '.view_dataBBVAborrar', function(){
  var borra_matchhBB = $(this).attr("id");
  var borra_BBVA = "borra_BBVA";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchhBB:borra_matchhBB,borra_BBVA:borra_BBVA},
   
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeBBVA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
   }
  });
	});  
 });	


/*CARGA EXCEL*/
$("#enviarEXCELMATCHBBVA").click(function(){
const formData = new FormData($('#importanteexcelformMATCHBBVA')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCHBBVA').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCHBBVA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
	$("#DOCUU_excelMATCHBBVA").val(null);
   }
});
});


/*GUARDA FORMULARIO PRINCIPAL reset_BBVA */

$("#GUARDAR_BBVA").click(function(){
const formData = new FormData($('#BBVAform')[0]);

$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeBBVA').html('cargando'); 
    },    
   success:function(data){
		//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
			$("#mensajeBBVA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
   }
   
})
});


/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_BBVA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaBBVA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_BBVA', function(){
var EMAIL_BBVA = $('#EMAIL_BBVA').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_BBVA").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_BBVA:EMAIL_BBVA},
beforeSend:function(){
$('#mensajeBBVA').html('cargando');
},
success:function(data){
$('#mensajeBBVA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
}
});
});


//////////////////////////////////MATCH CON ESTADO DE CUENTA INBURSA//////////////////////////////


/*CARGA EXCEL*/
$("#enviarEXCELMATCHINBURSA").click(function(){
const formData = new FormData($('#importanteexcelformMATCHINBURSA')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCHINBURSA').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCHINBURSA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
	//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));	
	$("#DOCUU_excelMATCHINBURSA").val(null);
   }
});
});

/*GUARDA FORMULARIO PRINCIPAL*/

$("#GUARDAR_INBURSA").click(function(){
const formData = new FormData($('#INBURSAform')[0]);

$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeINBURSA').html('cargando'); 
    },    
   success:function(data){
		//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));
			$("#mensajeINBURSA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
   }
   
})
});



/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_INBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaINBURSA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })
 
  
//view_dataBBVAborrar
$(document).on('click', '.view_dataINBURSAborrar', function(){
  var borra_matchhIN = $(this).attr("id");
  var borra_INBURSA = "borra_INBURSA";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchhIN:borra_matchhIN,borra_INBURSA:borra_INBURSA},
   
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeINBURSA").html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();			
			//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));			
   }
  });
	});  
 });

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_INBURSA', function(){
var EMAIL_INBURSA = $('#EMAIL_INBURSA').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_INBURSA").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_INBURSA:EMAIL_INBURSA},
beforeSend:function(){
$('#mensajeINBURSA').html('cargando');
},
success:function(data){
$('#mensajeINBURSA').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
}
});
});

/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCH2INBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaINBURSA_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })


/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_MATCH2TARJETAINBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETAINBURSA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })





//SCRIPT PARA BORRAR view_dataSBborrar
$(document).on('click', '.view_dataSBborrarGO', function(){
var borra_id_PAGOP = $(this).attr('id');
var borrapagoaproveedores = 'borrapagoaproveedores';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'pagoproveedores/controladorPP.php',
method:'POST',
data:{borra_id_PAGOP:borra_id_PAGOP,borrapagoaproveedores:borrapagoaproveedores},
beforeSend:function(){
$('#mensajefiltroEgresoPagoProveedores').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajefiltroEgresoPagoProveedores').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
//$('#resetSB').load(location.href + ' #resetSB');
		$("#reset_totales").load(location.href + " #reset_totales");
			$.getScript(loadAUT(1));
}
});
});
});






//SCRIPT PARA BORRAR view_dataSBborrar
$(document).on('click', '.view_dataSBborrar', function(){
var borra_id_PAGOP = $(this).attr('id');
var borrapagoaproveedores = 'borrapagoaproveedores';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'comprobaciones/controladorPP.php',
method:'POST',
data:{borra_id_PAGOP:borra_id_PAGOP,borrapagoaproveedores:borrapagoaproveedores},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajepagoproveedores').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
//$('#resetSB').load(location.href + ' #resetSB');
		$("#reset_totales").load(location.href + " #reset_totales");
			$.getScript(load7(1));
			
}
});
});
});


//SCRIPT PARA BORRAR view_dataSBborrar
$(document).on('click', '.view_dataSBborrarCOM', function(){
var borra_id_PAGOP = $(this).attr('id');
var borrapagoaproveedores = 'borrapagoaproveedores';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'comprobaciones/controladorPP.php',
method:'POST',
data:{borra_id_PAGOP:borra_id_PAGOP,borrapagoaproveedores:borrapagoaproveedores},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajepagoproveedores').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();
//$('#resetSB').load(location.href + ' #resetSB');
		$("#reset_totales").load(location.href + " #reset_totales");
			
			$.getScript(loadCOM(1));
}
});
});
});




//NOMBRE DEL BOTÓN comprobaciones, revisar
$(document).on('click', '.view_dataPAGOPROVEEmodifica22', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobaciones/VistaPreviaCOM.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#personal_detalles5').html(data);
$('#dataModal5').modal('toggle');
$("#reset_totales").load(location.href + " #reset_totales");
$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
}
});
});

//NOMBRE DEL BOTÓN comprobaciones, revisar
$(document).on('click', '.view_dataPAGOSUBIR', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobaciones/VistaPreviaCOM2.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajepagoproveedores').html('cargando');
},
success:function(data){
$('#personal_detalles5').html(data);
$('#dataModal5').modal('toggle');
$("#reset_totales").load(location.href + " #reset_totales");
$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
}
});
});


/*match*//*match*//*match*//*match*//*match*//*match*//*match*/


$(document).on('click', '.view_MATCH2filtroinbursa', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobacionesVYO/VistaPreviamatchinbursa.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeDATOSBANCARIOS1').html('cargando');
},
success:function(data){
$('#personal_detalles14').html(data);
$('#dataModal14').modal('toggle');
}
});
});


$(document).on('click', '.view_MATCH2filtrobbva', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobacionesVYO/VistaPreviamatchBBVA.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeDATOSBANCARIOS1').html('cargando');
},
success:function(data){
$('#personal_detalles14').html(data);
$('#dataModal14').modal('toggle');
}
});
});


$(document).on('click', '.view_MATCH2filtroAMEX', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobacionesVYO/VistaPreviamatchAMEX.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeDATOSBANCARIOS1').html('cargando');
},
success:function(data){
$('#personal_detalles14').html(data);
$('#dataModal14').modal('toggle');
}
});
});

$(document).on('click', '.view_MATCH2filtroSIVALE', function(){
var personal_id = $(this).attr('id');
$.ajax({
url:'comprobacionesVYO/VistaPreviamatchSANTANDER.php',
method:'POST',
data:{personal_id:personal_id},
beforeSend:function(){
$('#mensajeDATOSBANCARIOS1').html('cargando');
},
success:function(data){
$('#personal_detalles14').html(data);
$('#dataModal14').modal('toggle');
}
});
});





			$('#target1').hide("linear");
			$('#target2').hide("linear");
			$('#target3').hide("linear");
			$('#target4').hide("linear");
			$('#target5').hide("linear");
			$('#target6').hide("linear");
			$('#target7').hide("linear");
			$('#target8').hide("linear");
			$('#target9').hide("linear");
			$('#target10').hide("linear");
			$('#target11').hide("linear");
			$('#target12').hide("linear");
			$('#target13').hide("linear");
			$('#target14').hide("linear");
			$('#target15').hide("linear");
			$('#target16').hide("linear");
			$('#target17').hide("linear");
			$('#target18').hide("linear");
			$('#target19').hide("linear");
			$('#target20').hide("linear");
			$('#target21').hide("linear");
			$('#target22').hide("linear");
			$('#target23').hide("linear");
			$('#target24').hide("linear");
			$('#target25').hide("linear");
			$('#target26').hide("linear");
			$('#target27').hide("linear");
			$('#target28').hide("linear");
			$('#target29').hide("linear");
			$('#target30').hide("linear");
			$('#target31').hide("linear");
			$('#target32').hide("linear");
			$('#target33').hide("linear");
			$('#target34').hide("linear");
			$('#target35').hide("linear");
			$('#target35').hide("linear");
			$('#target37').hide("linear");
			$('#target38').hide("linear");
			$('#target39').hide("linear");
			$('#target40').hide("linear");
			$('#target41').hide("linear");
			$('#target42').hide("linear");
			$('#target43').hide("linear");
			$('#target44').hide("linear");
			$('#target45').hide("linear");
			$('#target46').hide("linear");
			$('#target47').hide("linear");
			$('#target48').hide("linear");
			$('#target49').hide("linear");
			$('#target50').hide("linear");
			$('#targetVIDEO').hide("linear");
			
			$("#mostrar1").click(function(){
				$('#target1').show("swing");
		 	});
			$("#ocultar1").click(function(){
				$('#target1').hide("linear");
			});
			$("#mostrar2").click(function(){
				$('#target2').show("swing");
		 	});
			$("#ocultar2").click(function(){
				$('#target2').hide("linear");
			});
			$("#mostrar3").click(function(){
				$('#target3').show("swing");
		 	});
			$("#ocultar3").click(function(){
				$('#target3').hide("linear");
			});
			$("#mostrar4").click(function(){
				$('#target4').show("swing");
		 	});
			$("#ocultar4").click(function(){
				$('#target4').hide("linear");
			});
			$("#mostrar5").click(function(){
				$('#target5').show("swing");
		 	});
			$("#ocultar5").click(function(){
				$('#target5').hide("linear");
			});
			$("#mostrar6").click(function(){
				$('#target6').show("swing");
		 	});
			$("#ocultar6").click(function(){
				$('#target6').hide("linear");
			});
			$("#mostrar7").click(function(){
				$('#target7').show("swing");
		 	});
			$("#ocultar7").click(function(){
				$('#target7').hide("linear");
			});
			$("#mostrar8").click(function(){
				$('#target8').show("swing");
		 	});
			$("#ocultar8").click(function(){
				$('#target8').hide("linear");
			});
			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});
			$("#mostrar10").click(function(){
				$('#target10').show("swing");
		 	});
			$("#ocultar10").click(function(){
				$('#target10').hide("linear");
			});
			$("#mostrar11").click(function(){
				$('#target11').show("swing");
		 	});
			$("#ocultar11").click(function(){
				$('#target11').hide("linear");
			});
			$("#mostrar12").click(function(){
				$('#target12').show("swing");
		 	});
			$("#ocultar12").click(function(){
				$('#target12').hide("linear");
			});
			$("#mostrar13").click(function(){
				$('#target13').show("swing");
		 	});
			$("#ocultar13").click(function(){
				$('#target13').hide("linear");
			});

			$("#mostrar14").click(function(){
				$('#target14').show("swing");
		 	});
			$("#ocultar14").click(function(){
				$('#target14').hide("linear");
			});
			
			$("#mostrar15").click(function(){
				$('#target15').show("swing");
		 	});
			$("#ocultar15").click(function(){
				$('#target15').hide("linear");
			});
				$("#mostrar16").click(function(){
				$('#target16').show("swing");
		 	});
			$("#ocultar16").click(function(){
				$('#target16').hide("linear");
			});
				$("#mostrar17").click(function(){
				$('#target17').show("swing");
		 	});
			$("#ocultar17").click(function(){
				$('#target17').hide("linear");
			});
				$("#mostrar18").click(function(){
				$('#target18').show("swing");
		 	});
			$("#ocultar18").click(function(){
				$('#target18').hide("linear");
			});
				$("#mostrar19").click(function(){
				$('#target19').show("swing");
		 	});
			$("#ocultar19").click(function(){
				$('#target19').hide("linear");
			});
				$("#mostrar20").click(function(){
				$('#target20').show("swing");
		 	});
			$("#ocultar20").click(function(){
				$('#target20').hide("linear");
				
			});
					$("#mostrar21").click(function(){
				$('#target21').show("swing");
		 	});
			$("#ocultar21").click(function(){
				$('#target21').hide("linear");
				
			});
					$("#mostrar22").click(function(){
				$('#target22').show("swing");
		 	});
			$("#ocultar22").click(function(){
				$('#target22').hide("linear");
				
			});
					$("#mostrar23").click(function(){
				$('#target23').show("swing");
		 	});
			$("#ocultar23").click(function(){
				$('#target23').hide("linear");
				
			});
					$("#mostrar24").click(function(){
				$('#target24').show("swing");
		 	});
			$("#ocultar24").click(function(){
				$('#target24').hide("linear");
				
			});
					$("#mostrar25").click(function(){
				$('#target25').show("swing");
		 	});
			$("#ocultar25").click(function(){
				$('#target25').hide("linear");
				
			});
					$("#mostrar26").click(function(){
				$('#target26').show("swing");
		 	});
			$("#ocultar26").click(function(){
				$('#target26').hide("linear");
				
			});
					$("#mostrar27").click(function(){
				$('#target27').show("swing");
		 	});
			$("#ocultar27").click(function(){
				$('#target27').hide("linear");
				
			});
					$("#mostrar28").click(function(){
				$('#target28').show("swing");
		 	});
			$("#ocultar28").click(function(){
				$('#target28').hide("linear");
				
			});
					$("#mostrar29").click(function(){
				$('#target29').show("swing");
		 	});
			$("#ocultar29").click(function(){
				$('#target29').hide("linear");
				
			});
					$("#mostrar30").click(function(){
				$('#target30').show("swing");
		 	});
			$("#ocultar30").click(function(){
				$('#target30').hide("linear");
				
			});
					$("#mostrar31").click(function(){
				$('#target31').show("swing");
		 	});
			$("#ocultar31").click(function(){
				$('#target31').hide("linear");
				
			});
					$("#mostrar32").click(function(){
				$('#target32').show("swing");
		 	});
			$("#ocultar32").click(function(){
				$('#target32').hide("linear");
				
			});
					$("#mostrar303").click(function(){
				$('#target33').show("swing");
		 	});
			$("#ocultar33").click(function(){
				$('#target33').hide("linear");
				
			});
					$("#mostrar34").click(function(){
				$('#target34').show("swing");
		 	});
			$("#ocultar34").click(function(){
				$('#target34').hide("linear");
				
			});
					$("#mostrar35").click(function(){
				$('#target35').show("swing");
		 	});
			$("#ocultar35").click(function(){
				$('#target35').hide("linear");
				
			});
					$("#mostrar36").click(function(){
				$('#target36').show("swing");
		 	});
			$("#ocultar36").click(function(){
				$('#target36').hide("linear");
				
			});
					$("#mostrar37").click(function(){
				$('#target37').show("swing");
		 	});
			$("#ocultar37").click(function(){
				$('#target37').hide("linear");
				
			});
					$("#mostrar38").click(function(){
				$('#target38').show("swing");
		 	});
			$("#ocultar38").click(function(){
				$('#target38').hide("linear");
				
			});
					$("#mostrar39").click(function(){
				$('#target39').show("swing");
		 	});
			$("#ocultar39").click(function(){
				$('#target39').hide("linear");
				
			});
			$("#mostrar40").click(function(){
				$('#target40').show("swing");
		 	});
			$("#ocultar40").click(function(){
				$('#target40').hide("linear");
				
			});
            $("#mostrar41").click(function(){
				$('#target41').show("swing");
		 	});
			$("#ocultar41").click(function(){
				$('#target41').hide("linear");
				
			});
			$("#mostrar42").click(function(){
				$('#target42').show("swing");
		 	});
			$("#ocultar42").click(function(){
				$('#target42').hide("linear");
				
			});
			$("#mostrar43").click(function(){
				$('#target43').show("swing");
		 	});
			$("#ocultar43").click(function(){
				$('#target43').hide("linear");
				
			});
		    $("#mostrar44").click(function(){
				$('#target44').show("swing");
		 	});
			$("#ocultar44").click(function(){
				$('#target44').hide("linear");
				
			});
             $("#mostrar45").click(function(){
				$('#target45').show("swing");
		 	});
			$("#ocultar45").click(function(){
				$('#target45').hide("linear");
				
			});
			 $("#mostrar46").click(function(){
				$('#target46').show("swing");
		 	});
			$("#ocultar46").click(function(){
				$('#target46').hide("linear");
				
			});
			 $("#mostrar47").click(function(){
				$('#target47').show("swing");
		 	});
			$("#ocultar47").click(function(){
				$('#target47').hide("linear");
				
			});
			 $("#mostrar48").click(function(){
				$('#target48').show("swing");
		 	});
			$("#ocultar48").click(function(){
				$('#target48').hide("linear");
				
			});

			 $("#mostrar49").click(function(){
				$('#target49').show("swing");
		 	});
			$("#ocultar49").click(function(){
				$('#target49').hide("linear");
				
			});	
			 $("#mostrar50").click(function(){
				$('#target50').show("swing");
		 	});
			$("#ocultar50").click(function(){
				$('#target50').hide("linear");
				
			});	
			
			$("#mostrarVIDEO").click(function(){
				$('#targetVIDEO').show("swing");
		 	});
			$("#ocultarVIDEO").click(function(){
				$('#targetVIDEO').hide("linear");
			});

			$("#mostrartodos").click(function(){
		
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target11').show("swing");
				$('#target12').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#target21').show("swing");
				$('#target22').show("swing");
				$('#target23').show("swing");
				$('#target24').show("swing");
				$('#target25').show("swing");
				$('#target26').show("swing");
				$('#target27').show("swing");
				$('#target28').show("swing");
				$('#target29').show("swing");
				$('#target30').show("swing");
				$('#target31').show("swing");
				$('#target32').show("swing");
				$('#target33').show("swing");
				$('#target34').show("swing");
				$('#target35').show("swing");
				$('#target36').show("swing");
				$('#target37').show("swing");
				$('#target38').show("swing");
				$('#target39').show("swing");
				$('#target40').show("swing");
				$('#target41').show("swing");
				$('#target42').show("swing");
				$('#target43').show("swing");
				$('#target44').show("swing");
				$('#target45').show("swing");
				$('#target46').show("swing");
				$('#target47').show("swing");
				$('#target48').show("swing");
				$('#target49').show("swing");
				$('#target50').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos").click(function(){
				
				$('#target1').hide("swing");
				$('#target2').hide("swing");
				$('#target3').hide("swing");
				$('#target4').hide("swing");
				$('#target5').hide("swing");
				$('#target6').hide("swing");
				$('#target7').hide("swing");
				$('#target8').hide("swing");
				$('#target9').hide("swing");
				$('#target10').hide("swing");
				$('#target11').hide("swing");
				$('#target12').hide("swing");
				$('#target13').hide("swing");
				$('#target14').hide("swing");
				$('#target15').hide("swing");
				$('#target16').hide("swing");
				$('#target17').hide("swing");
				$('#target18').hide("swing");
				$('#target19').hide("swing");
				$('#target20').hide("swing");
				$('#target21').hide("swing");
				$('#target22').hide("swing");
				$('#target23').hide("swing");
				$('#target24').hide("swing");
				$('#target25').hide("swing");
				$('#target26').hide("swing");
				$('#target27').hide("swing");
				$('#target28').hide("swing");
				$('#target29').hide("swing");
				$('#target30').hide("swing");
				$('#target31').hide("swing");
				$('#target32').hide("swing");
				$('#target33').hide("swing");
				$('#target34').hide("swing");
				$('#target35').hide("swing");
				$('#target36').hide("swing");
				$('#target37').hide("swing");
				$('#target38').hide("swing");
				$('#target39').hide("swing");
				$('#target40').hide("swing");
				$('#target41').hide("swing");
				$('#target42').hide("swing");
				$('#target43').hide("swing");
				$('#target44').hide("swing");
				$('#target45').hide("swing");
				$('#target46').hide("swing");
				$('#target47').hide("swing");
				$('#target48').hide("swing");
				$('#target49').hide("swing");
				$('#target50').hide("swing");
				$('#targetVIDEO').hide("linear");
			});

			$("#mostrartodos2").click(function(){
		
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target11').show("swing");
				$('#target12').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#target21').show("swing");
				$('#target22').show("swing");
				$('#target23').show("swing");
				$('#target24').show("swing");
				$('#target25').show("swing");
				$('#target26').show("swing");
				$('#target27').show("swing");
				$('#target28').show("swing");
				$('#target29').show("swing");
				$('#target30').show("swing");
				$('#target31').show("swing");
				$('#target32').show("swing");
				$('#target33').show("swing");
				$('#target34').show("swing");
				$('#target35').show("swing");
				$('#target36').show("swing");
				$('#target37').show("swing");
				$('#target38').show("swing");
				$('#target39').show("swing");
				$('#target40').show("swing");
				$('#target41').show("swing");
				$('#target42').show("swing");
				$('#target43').show("swing");
				$('#target44').show("swing");
				$('#target45').show("swing");
				$('#target46').show("swing");
				$('#target47').show("swing");
				$('#target48').show("swing");
				$('#target49').show("swing");
				$('#target50').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos2").click(function(){
				
					$('#target1').hide("swing");
				$('#target2').hide("swing");
				$('#target3').hide("swing");
				$('#target4').hide("swing");
				$('#target5').hide("swing");
				$('#target6').hide("swing");
				$('#target7').hide("swing");
				$('#target8').hide("swing");
				$('#target9').hide("swing");
				$('#target10').hide("swing");
				$('#target11').hide("swing");
				$('#target12').hide("swing");
				$('#target13').hide("swing");
				$('#target14').hide("swing");
				$('#target15').hide("swing");
				$('#target16').hide("swing");
				$('#target17').hide("swing");
				$('#target18').hide("swing");
				$('#target19').hide("swing");
				$('#target20').hide("swing");
				$('#target21').hide("swing");
				$('#target22').hide("swing");
				$('#target23').hide("swing");
				$('#target24').hide("swing");
				$('#target25').hide("swing");
				$('#target26').hide("swing");
				$('#target27').hide("swing");
				$('#target28').hide("swing");
				$('#target29').hide("swing");
				$('#target30').hide("swing");
				$('#target31').hide("swing");
				$('#target32').hide("swing");
				$('#target33').hide("swing");
				$('#target34').hide("swing");
				$('#target35').hide("swing");
				$('#target36').hide("swing");
				$('#target37').hide("swing");
				$('#target38').hide("swing");
				$('#target39').hide("swing");
				$('#target40').hide("swing");
				$('#target41').hide("swing");
				$('#target42').hide("swing");
				$('#target43').hide("swing");
				$('#target44').hide("swing");
				$('#target45').hide("swing");
				$('#target46').hide("swing");
				$('#target47').hide("swing");
				$('#target48').hide("swing");
				$('#target49').hide("swing");
				$('#target50').hide("swing");
				$('#targetVIDEO').hide("linear");
			});

		});
		
	</script>