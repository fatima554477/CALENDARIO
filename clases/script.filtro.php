

<style>
/* Loader con animación */
.loader {
  border: 4px solid #f3f3f3;
  border-top: 4px solid #6a0dad; /* Morado elegante */
  border-radius: 50%;
  width: 22px;
  height: 22px;
  animation: spin 1s linear infinite;
  display: inline-block;
  vertical-align: middle;
  margin-right: 8px;
}

@keyframes spin {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Texto estilizado */
.msg-actualizando {
  font-weight: bold;
  font-size: 20px;
  color: #6a0dad;
  background: #f3e9fb;
  border-radius: 6px;
  padding: 6px 12px;
  display: inline-flex;
  align-items: center;
  box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
}
</style>

<script type="text/javascript">

function refrescaesetotales2() {
  // Si el bloque está en ESTA misma página:
  if ($("#reset_totales").length) {
    $("#reset_totales").load(location.href + " #reset_totales");
  }
  // Si el bloque está en OTRA página:
  // $("#load3").load("calendariodeeventos2/clases/controlador_filtro.php #load3");
}

	function pasarpagado2(pasarpagado_id){


	var checkBox = document.getElementById("pasarpagado1a"+pasarpagado_id);
	var pasarpagado_text = "";
	if (checkBox.checked == true){
	pasarpagado_text = "si";
	}else{
	pasarpagado_text = "no";
	}
	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{pasarpagado_id:pasarpagado_id,pasarpagado_text:pasarpagado_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');			
		$('#pasarpagado2').html("<span 'ACTUALIZADO'</span>").fadeIn().delay(500).fadeOut();
		load3(1);
		
		if(pasarpagado_text=='si'){
		$('#color_pagado1a'+pasarpagado_id).css('background-color', '#ceffcc');
		}
		if(pasarpagado_text=='no'){
		$('#color_pagado1a'+pasarpagado_id).css('background-color', '#e9d8ee');
		}		
		
	}
	});
	refrescaesetotales2();
}





	function STATUS_RESPONSABLE_EVENTO(RESPONSABLE_EVENTO_id){


	var checkBox = document.getElementById("STATUS_RESPONSABLE_EVENTO"+RESPONSABLE_EVENTO_id);
	var RESPONSABLE_text = "";
	if (checkBox.checked == true){
	RESPONSABLE_text = "si";
	}else{
	RESPONSABLE_text = "no";
	}
	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{RESPONSABLE_EVENTO_id:RESPONSABLE_EVENTO_id,RESPONSABLE_text:RESPONSABLE_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#pasarpagado2').html("<span id='ACTUALIZADO' >"+result[0]+"</span>");
		
		if(result[1]=='si'){
		$('#color_RESPONSABLE_EVENTO'+RESPONSABLE_EVENTO_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_RESPONSABLE_EVENTO'+RESPONSABLE_EVENTO_id).css('background-color', '#e9d8ee');
		}
		
	}
	});
	  refrescaesetotales2();
}






	function STATUS_AUDITORIA1(AUDITORIA1_id){


	var checkBox = document.getElementById("STATUS_AUDITORIA1"+AUDITORIA1_id);
	var AUDITORIA1_text = "";
	if (checkBox.checked == true){
	AUDITORIA1_text = "si";
	}else{
	AUDITORIA1_text = "no";
	}

	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{AUDITORIA1_id:AUDITORIA1_id,AUDITORIA1_text:AUDITORIA1_text},
		beforeSend:function(){
		$('#STATUS_AUDITORIA1').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#STATUS_AUDITORIA1').html("ACTUALIZADO").fadeIn().delay(1000).fadeOut();
		 load3(1);

		if(result[1]=='si'){
		$('#color_AUDITORIA1'+AUDITORIA1_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_AUDITORIA1'+AUDITORIA1_id).css('background-color', '#e9d8ee');
		}
	   	
		
	}
	});
	refrescaesetotales2();
}

function STATUS_CHECKBOX(CHECKBOX_id, permisoModificar) {
    var checkBox = document.getElementById("STATUS_CHECKBOX" + CHECKBOX_id);
    var CHECKBOX_text = checkBox.checked ? "si" : "no";

    // Cambiar color visual inmediato (optimista)
    var newColor = checkBox.checked ? '#ceffcc' : '#e9d8ee';
    $('#color_CHECKBOX' + CHECKBOX_id).css('background-color', newColor);

    let monto = $('#montoOriginal_' + CHECKBOX_id).text().replace(/,/g, '');
    
    // Bloqueo inmediato si se activa sin permiso
    if (checkBox.checked && !permisoModificar) {
        setTimeout(() => {
            checkBox.disabled = true;
        }, 100);
    }

    // Actualizar el valor calculado en la interfaz inmediatamente
    if (checkBox.checked) {
        $('#valorCalculado_' + CHECKBOX_id).text('');
    } else {
        if (!isNaN(monto)) {
            let resultado = monto * 1.46;
            let resultadoFormateado = resultado.toLocaleString('es-MX', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            $('#valorCalculado_' + CHECKBOX_id).text('$' + resultadoFormateado);
        } else {
            $('#valorCalculado_' + CHECKBOX_id).text('NaN');
        }
    }

    // Enviar actualización al servidor
    $.ajax({
        url: 'pagoproveedores/controladorPP.php',
        method: 'POST',
        data: { 
            CHECKBOX_id: CHECKBOX_id,
            CHECKBOX_text: CHECKBOX_text 
        },
        beforeSend: function() {
            $('#ajax-notification')
                .html('<div class="loader"></div> ⏳ ACTUALIZANDO...')
                .fadeIn();
        },
        success: function(data) {
            var result = data.split('^'); // ejemplo de retorno: "ok^si" o "ok^no"

            // Mostrar notificación de éxito
            $('#ajax-notification')
                .html("✅ ACTUALIZADO")
                .delay(1000)
                .fadeOut();

            // Validar respuesta del servidor
            if (result[1] === 'si') {
                $('#color_CHECKBOX' + CHECKBOX_id).css('background-color', '#ceffcc');
                $('#valorCalculado_' + CHECKBOX_id).text('');
                
                // Bloquear después de confirmación si no hay permiso
                if (!permisoModificar) {
                    checkBox.disabled = true;
                }
            } else if (result[1] === 'no') {
                $('#color_CHECKBOX' + CHECKBOX_id).css('background-color', '#e9d8ee');
                
                if (!isNaN(monto)) {
                    let resultado = monto * 1.46;
                    let resultadoFormateado = resultado.toLocaleString('es-MX', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    $('#valorCalculado_' + CHECKBOX_id).text('$' + resultadoFormateado);
                } else {
                    $('#valorCalculado_' + CHECKBOX_id).text('NaN');
                }
                
                // Re-habilitar si falló el guardado
                checkBox.disabled = false;
            }
        },
        error: function() {
            // Revertir el cambio si ocurre un error
            checkBox.checked = !checkBox.checked;
            let originalColor = checkBox.checked ? '#ceffcc' : '#e9d8ee';
            $('#color_CHECKBOX' + CHECKBOX_id).css('background-color', originalColor);
            
            // Re-habilitar en caso de error
            checkBox.disabled = false;

            $('#ajax-notification')
                .html("❌ Error al actualizar")
                .delay(2000)
                .fadeOut();
        }
    });
    recalcularTotal();
	
	
}


function recalcularTotal() {
    let total = 0;

    $('[id^=valorCalculado_]').each(function() {
        let texto = $(this).text().replace(/[$,]/g, ''); // quitar $ y ,
        let valor = parseFloat(texto);
        if (!isNaN(valor)) {
            total += valor;
        }
    });

    let totalFormateado = total.toLocaleString('es-MX', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    $('#totalCalculado').text('$' + totalFormateado);
	 refrescaesetotales2();
	
}









	function STATUS_AUDITORIA2(AUDITORIA2_id){
	

	var checkBox = document.getElementById("STATUS_AUDITORIA2"+AUDITORIA2_id);
	var AUDITORIA2_text = "";
	if (checkBox.checked == true){
	AUDITORIA2_text = "si";
	}else{
	AUDITORIA2_text = "no";
	}
	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{AUDITORIA2_id:AUDITORIA2_id,AUDITORIA2_text:AUDITORIA2_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#pasarpagado2').html("Cargando...").fadeIn().delay(500).fadeOut();

		if(result[1]=='si'){
		$('#color_AUDITORIA2'+AUDITORIA2_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_AUDITORIA2'+AUDITORIA2_id).css('background-color', '#e9d8ee');
		}		
		
	}
	});
	refrescaesetotales2();
}



	function STATUS_FINANZAS(FINANZAS_id){


	var checkBox = document.getElementById("STATUS_FINANZAS"+FINANZAS_id);
	var FINANZAS_text = "";
	if (checkBox.checked == true){
	FINANZAS_text = "si";
	}else{
	FINANZAS_text = "no";
	}
	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{FINANZAS_id:FINANZAS_id,FINANZAS_text:FINANZAS_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#pasarpagado2').html("Cargando...").fadeIn().delay(500).fadeOut();
		
		if(result[1]=='si'){
		$('#color_FINANZAS'+FINANZAS_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_FINANZAS'+FINANZAS_id).css('background-color', '#e9d8ee');
		}		
		
	}
	});
	refrescaesetotales2();
}

	function STATUS_VENTAS(VENTAS_id){
	

	var checkBox = document.getElementById("STATUS_VENTAS"+VENTAS_id);
	var VENTAS_text = "";
	if (checkBox.checked == true){
	VENTAS_text = "si";
	}else{
	VENTAS_text = "no";
	}
	  $.ajax({
		url:'pagoproveedores/controladorPP.php',
		method:'POST',
		data:{VENTAS_id:VENTAS_id,VENTAS_text:VENTAS_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#pasarpagado2').html("Cargando...").fadeIn().delay(500).fadeOut();
		
		if(result[1]=='si'){
		$('#color_VENTAS'+VENTAS_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_VENTAS'+VENTAS_id).css('background-color', '#e9d8ee');
		}		
		
	}
	});
	refrescaesetotales2();
}

	/*filtro */

/* iniciaB1*/

		$(function() {
			load3(1);
		});
		function load3(page){
	var query=$("#NOMBRE_EVENTO").val();
	var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
	var NUMERO_CONSECUTIVO_PROVEE=$("#NUMERO_CONSECUTIVO_PROVEE_1_1").val();
var NOMBRE_COMERCIAL=$("#NOMBRE_COMERCIAL_1").val();
var ID_RELACIONADO=$("#ID_RELACIONADO").val();
var RAZON_SOCIAL=$("#RAZON_SOCIAL_1").val();
var RFC_PROVEEDOR=$("#RFC_PROVEEDOR_1").val();
var NUMERO_EVENTO=$("#NUMERO_EVENTO_1").val();
var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_1").val();
var MOTIVO_GASTO=$("#MOTIVO_GASTO_1").val();
var CONCEPTO_PROVEE=$("#CONCEPTO_PROVEE_1").val();
var MONTO_TOTAL_COTIZACION_ADEUDO=$("#MONTO_TOTAL_COTIZACION_ADEUDO_1").val();
var MONTO_FACTURA=$("#MONTO_FACTURA_1").val();
var MONTO_PROPINA=$("#MONTO_PROPINA_1").val();
var MONTO_DEPOSITAR=$("#MONTO_DEPOSITAR_1").val();
var MONTO_DEPOSITADO=$("#MONTO_DEPOSITADO_1").val();
var TIPO_DE_MONEDA=$("#TIPO_DE_MONEDA_1").val();
var PFORMADE_PAGO=$("#PFORMADE_PAGO_1").val();
var FECHA_DE_PAGO=$("#FECHA_DE_PAGO_1").val();
var FECHA_A_DEPOSITAR=$("#FECHA_A_DEPOSITAR_1").val();
var STATUS_DE_PAGO=$("#STATUS_DE_PAGO_1").val();
var ACTIVO_FIJO=$("#ACTIVO_FIJO_1").val();
var GASTO_FIJO=$("#GASTO_FIJO_1").val();
var PAGAR_CADA=$("#PAGAR_CADA_1").val();
var FECHA_PPAGO=$("#FECHA_PPAGO_1").val();
var FECHA_TPROGRAPAGO=$("#FECHA_TPROGRAPAGO_1").val();
var NUMERO_EVENTOFIJO=$("#NUMERO_EVENTOFIJO_1").val();
var CLASI_GENERAL=$("#CLASI_GENERAL_1").val();
var SUB_GENERAL=$("#SUB_GENERAL_1").val();
var NUMERO_EVENTO1=$("#NUMERO_EVENTO1_1").val();
var CLASIFICACION_GENERAL=$("#CLASIFICACION_GENERAL_1").val();
var CLASIFICACION_ESPECIFICA=$("#CLASIFICACION_ESPECIFICA_1").val();
var PLACAS_VEHICULO=$("#PLACAS_VEHICULO_1").val();
var MONTO_DE_COMISION=$("#MONTO_DE_COMISION_1").val();
var POLIZA_NUMERO=$("#POLIZA_NUMERO_1").val();
var NOMBRE_DEL_EJECUTIVO=$("#NOMBRE_DEL_EJECUTIVO_1").val();
var OBSERVACIONES_1=$("#OBSERVACIONES_1_1").val();
var FECHA_DE_LLENADO=$("#FECHA_DE_LLENADO_1").val();
var hiddenpagoproveedores=$("#hiddenpagoproveedores_1").val();
var RAZON_SOCIAL_orden=$("#RAZON_SOCIAL_orden").val();
var RFC_PROVEEDOR_orden=$("#RFC_PROVEEDOR_orden").val();
var MONTO_FACTURA_orden=$("#MONTO_FACTURA_orden").val();
var FECHA_DE_PAGO_orden=$("#FECHA_DE_PAGO_orden").val();
var NUMERO_EVENTO_orden=$("#NUMERO_EVENTO_orden").val();
var IVA=$("#IVA").val();
var NOMBRE_DEL_AYUDO=$("#NOMBRE_DEL_AYUDO").val();
var ID_RELACIONADO=$("#ID_RELACIONADO").val();
var TImpuestosRetenidosIVA=$("#TImpuestosRetenidosIVA_4").val();
var TImpuestosRetenidosISR=$("#TImpuestosRetenidosISR_4").val();
var descuentos=$("#descuentos_4").val();



var UUID=$("#UUID").val();
var metodoDePago=$("#metodoDePago").val();
var totalf=$("#totalf").val();
var serie=$("#serie").val();
var folio=$("#folio").val();
var regimenE=$("#regimenE").val();
var UsoCFDI=$("#UsoCFDI").val();
var TImpuestosTrasladados=$("#TImpuestosTrasladados").val();
var TImpuestosRetenidos=$("#TImpuestosRetenidos").val();
var Version=$("#Version").val();
var tipoDeComprobante=$("#tipoDeComprobante").val();
var condicionesDePago=$("#condicionesDePago").val();
var fechaTimbrado=$("#fechaTimbrado").val();
var nombreR=$("#nombreR").val();
var rfcR=$("#rfcR").val();
var Moneda=$("#Moneda").val();
var TipoCambio=$("#TipoCambio").val();
var ValorUnitarioConcepto=$("#ValorUnitarioConcepto").val();
var DescripcionConcepto=$("#DescripcionConcepto").val();
var ClaveUnidadConcepto=$("#ClaveUnidadConcepto").val();
var ClaveProdServConcepto=$("#ClaveProdServConcepto").val();
var CantidadConcepto=$("#CantidadConcepto").val();
var ImporteConcepto=$("#ImporteConcepto").val();
var UnidadConcepto=$("#UnidadConcepto").val();
var TUA=$("#TUA").val();
var TuaTotalCargos=$("#TuaTotalCargos").val();
var Descuento=$("#Descuento").val();
var subTotal=$("#subTotal").val();


/*termina copiar y pegar*/
			
			var per_page=$("#per_page3").val();
			var parametros = {
			"action3":"ajax3",
			"page":page,
			'query':query,
			'per_page':per_page,

'NUMERO_CONSECUTIVO_PROVEE':NUMERO_CONSECUTIVO_PROVEE,
'NOMBRE_DEL_AYUDO':NOMBRE_DEL_AYUDO,
'NOMBRE_COMERCIAL':NOMBRE_COMERCIAL,
'RAZON_SOCIAL':RAZON_SOCIAL,
'ID_RELACIONADO':ID_RELACIONADO,
'RFC_PROVEEDOR':RFC_PROVEEDOR,
'NUMERO_EVENTO':NUMERO_EVENTO,
'NOMBRE_EVENTO':NOMBRE_EVENTO,
'MOTIVO_GASTO':MOTIVO_GASTO,
'CONCEPTO_PROVEE':CONCEPTO_PROVEE,
'MONTO_TOTAL_COTIZACION_ADEUDO':MONTO_TOTAL_COTIZACION_ADEUDO,
'MONTO_FACTURA':MONTO_FACTURA,
'MONTO_PROPINA':MONTO_PROPINA,
'MONTO_DEPOSITAR':MONTO_DEPOSITAR,
'TIPO_DE_MONEDA':TIPO_DE_MONEDA,
'PFORMADE_PAGO':PFORMADE_PAGO,
'FECHA_DE_PAGO':FECHA_DE_PAGO,
'FECHA_A_DEPOSITAR':FECHA_A_DEPOSITAR,
'STATUS_DE_PAGO':STATUS_DE_PAGO,
'ACTIVO_FIJO':ACTIVO_FIJO,
'GASTO_FIJO':GASTO_FIJO,
'PAGAR_CADA':PAGAR_CADA,
'FECHA_PPAGO':FECHA_PPAGO,
'FECHA_TPROGRAPAGO':FECHA_TPROGRAPAGO,
'NUMERO_EVENTOFIJO':NUMERO_EVENTOFIJO,
'CLASI_GENERAL':CLASI_GENERAL,
'SUB_GENERAL':SUB_GENERAL,
'MONTO_DEPOSITADO':MONTO_DEPOSITADO,
'NUMERO_EVENTO1':NUMERO_EVENTO1,
'CLASIFICACION_GENERAL':CLASIFICACION_GENERAL,
'CLASIFICACION_ESPECIFICA':CLASIFICACION_ESPECIFICA,
'PLACAS_VEHICULO':PLACAS_VEHICULO,
'MONTO_DE_COMISION':MONTO_DE_COMISION,
'POLIZA_NUMERO':POLIZA_NUMERO,
'NOMBRE_DEL_EJECUTIVO':NOMBRE_DEL_EJECUTIVO,
'OBSERVACIONES_1':OBSERVACIONES_1,
'FECHA_DE_LLENADO':FECHA_DE_LLENADO,
'hiddenpagoproveedores':hiddenpagoproveedores,
'RAZON_SOCIAL_orden':RAZON_SOCIAL_orden,
'RFC_PROVEEDOR_orden':RFC_PROVEEDOR_orden,
'MONTO_FACTURA_orden':MONTO_FACTURA_orden,
'FECHA_DE_PAGO_orden':FECHA_DE_PAGO_orden,
'NUMERO_EVENTO_orden':NUMERO_EVENTO_orden,
'ID_RELACIONADO':ID_RELACIONADO,
'IVA':IVA,
'TImpuestosRetenidosIVA_4':TImpuestosRetenidosIVA,
'TImpuestosRetenidosISR_4':TImpuestosRetenidosISR,
'descuentos_4':descuentos,



'UUID':UUID,
'metodoDePago':metodoDePago,
'totalf':totalf,
'serie':serie,
'folio':folio,
'regimenE':regimenE,
'UsoCFDI':UsoCFDI,
'TImpuestosTrasladados':TImpuestosTrasladados,
'TImpuestosRetenidos':TImpuestosRetenidos,
'Version':Version,
'tipoDeComprobante':tipoDeComprobante,
'condicionesDePago':condicionesDePago,
'fechaTimbrado':fechaTimbrado,
'nombreR':nombreR,
'rfcR':rfcR,
'Moneda':Moneda,
'TipoCambio':TipoCambio,
'ValorUnitarioConcepto':ValorUnitarioConcepto,
'DescripcionConcepto':DescripcionConcepto,
'ClaveUnidadConcepto':ClaveUnidadConcepto,
'ClaveProdServConcepto':ClaveProdServConcepto,
'CantidadConcepto':CantidadConcepto,
'ImporteConcepto':ImporteConcepto,
'UnidadConcepto':UnidadConcepto,
'TUA':TUA,
'TuaTotalCargos':TuaTotalCargos,
'Descuento':Descuento,
'subTotal':subTotal,

/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loaderpago").fadeIn('slow');
			$.ajax({
				url:'calendariodeeventos2/clases/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
beforeSend: function(objeto) {
  $("#loaderpago").html(
    '<div class="msg-actualizando">' +
      '<span class="loaderpago"></span> ⏳ ACTUALIZADO...' +
    '</div>'
  ).fadeIn();

  // Ocultar después de 2 segundos (2000 milisegundos)
  setTimeout(function() {
    $("#loaderpago").fadeOut('slow', function() {
      $(this).html(''); // Limpia el contenido después de ocultar
    });
  }, 2000);
},
				success:function(data){
									 
					$(".datos_ajaxpago").html(data).fadeIn('slow');
					$("#loaderpago").html("");
					refrescaesetotales2();
				}
			})
		}
/* terminaB1*/		
		
	</script>
