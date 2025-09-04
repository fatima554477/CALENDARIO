<script type="text/javascript">

	function pasarpagado2(pasarpagado_id){


	var checkBox = document.getElementById("pasarpagado1a"+pasarpagado_id);
	var pasarpagado_text = "";
	if (checkBox.checked == true){
	pasarpagado_text = "si";
	}else{
	pasarpagado_text = "no";
	}
	  $.ajax({
		url:'comprobaciones/controladorPP.php',
		method:'POST',
		data:{pasarpagado_id:pasarpagado_id,pasarpagado_text:pasarpagado_text},
		beforeSend:function(){
		$('#pasarpagado2').html('cargando');
	},
		success:function(data){
		var result = data.split('^');			
		$('#pasarpagado2').html("<span 'ACTUALIZADO'</span>").fadeIn().delay(500).fadeOut();
		load2(1);
		
		if(pasarpagado_text=='si'){
		$('#color_pagado1a'+pasarpagado_id).css('background-color', '#ceffcc');
		}
		if(pasarpagado_text=='no'){
		$('#color_pagado1a'+pasarpagado_id).css('background-color', '#e9d8ee');
		}		
		
	}
	});
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
		url:'comprobaciones/controladorPP.php',
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
		url:'comprobaciones/controladorPP.php',
		method:'POST',
		data:{AUDITORIA1_id:AUDITORIA1_id,AUDITORIA1_text:AUDITORIA1_text},
		beforeSend:function(){
		$('#STATUS_AUDITORIA1').html('cargando');
	},
		success:function(data){
		var result = data.split('^');				
		$('#STATUS_AUDITORIA1').html("ACTUALIZADO").fadeIn().delay(1000).fadeOut();
		 load2(1);

		if(result[1]=='si'){
		$('#color_AUDITORIA1'+AUDITORIA1_id).css('background-color', '#ceffcc');
		}
		if(result[1]=='no'){
		$('#color_AUDITORIA1'+AUDITORIA1_id).css('background-color', '#e9d8ee');
		}
	   	
		
	}
	});
}

function STATUS_CHECKBOX2(CHECKBOX_id) {
    lastCheckboxID = CHECKBOX_id;

    var checkBox = document.getElementById("STATUS_CHECKBOX2" + CHECKBOX_id);
    var CHECKBOX_text = checkBox.checked ? "si" : "no";

    $.ajax({
        url: 'comprobaciones/controladorPP.php',
        method: 'POST',
        data: { CHECKBOX_id: CHECKBOX_id, CHECKBOX_text: CHECKBOX_text },
        beforeSend: function () {
            $('#pasarpagado2').html('cargando');
        },
        success: function (data) {
            var result = data.split('^');
            $('#pasarpagado2').html("Cargando...").fadeIn().delay(500).fadeOut();
            load2(1);
				$("#reset_totales").load(location.href + " #reset_totales");
        }
    });
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
		url:'comprobaciones/controladorPP.php',
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
		url:'comprobaciones/controladorPP.php',
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
		url:'comprobaciones/controladorPP.php',
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
}

		$(function() {
			load2(1);
		});
		function load2(page2){
	var query=$("#NOMBRE_EVENTO").val();
	var DEPARTAMENTO=$("#DEPARTAMENTO").val();
	var NUMERO_CONSECUTIVO_PROVEE=$("#NUMERO_CONSECUTIVO_PROVEE").val();
var RAZON_SOCIAL=$("#RAZON_SOCIAL").val();
var RFC_PROVEEDOR=$("#RFC_PROVEEDOR").val();
var NOMBRE_EVENTO=$("#NOMBRE_EVENTO").val();
var MOTIVO_GASTO=$("#MOTIVO_GASTO").val();
var CONCEPTO_PROVEE=$("#CONCEPTO_PROVEE").val();
var MONTO_TOTAL_COTIZACION_ADEUDO=$("#MONTO_TOTAL_COTIZACION_ADEUDO").val();
var MONTO_FACTURA=$("#MONTO_FACTURA").val();
var MONTO_PROPINA=$("#MONTO_PROPINA").val();
var MONTO_DEPOSITAR=$("#MONTO_DEPOSITAR").val();
var TIPO_DE_MONEDA=$("#TIPO_DE_MONEDA").val();
var PFORMADE_PAGO=$("#PFORMADE_PAGO").val();
var FECHA_A_DEPOSITAR=$("#FECHA_A_DEPOSITAR").val();
var STATUS_DE_PAGO=$("#STATUS_DE_PAGO").val();
var ADJUNTAR_COTIZACION=$("#ADJUNTAR_COTIZACION").val();
var BANCO_ORIGEN=$("#BANCO_ORIGEN").val();
var ACTIVO_FIJO=$("#ACTIVO_FIJO").val();
var GASTO_FIJO=$("#GASTO_FIJO").val();
var PAGAR_CADA=$("#PAGAR_CADA").val();
var FECHA_PPAGO=$("#FECHA_PPAGO").val();
var FECHA_TPROGRAPAGO=$("#FECHA_TPROGRAPAGO").val();
var NUMERO_EVENTOFIJO=$("#NUMERO_EVENTOFIJO").val();
var CLASI_GENERAL=$("#CLASI_GENERAL").val();
var SUB_GENERAL=$("#SUB_GENERAL").val();
var MONTO_DE_COMISION=$("#MONTO_DE_COMISION").val();
var POLIZA_NUMERO=$("#POLIZA_NUMERO").val();
var NOMBRE_DEL_EJECUTIVO=$("#NOMBRE_DEL_EJECUTIVO").val();
var NOMBRE_DEL_AYUDO=$("#NOMBRE_DEL_AYUDO_1").val();													
var OBSERVACIONES_1=$("#OBSERVACIONES").val();
var FECHA_DE_LLENADO=$("#FECHA_DE_LLENADO").val();
var COMPLEMENTOS_PAGO_PDF=$("#COMPLEMENTOS_PAGO_PDF").val();
var COMPLEMENTOS_PAGO_XML=$("#COMPLEMENTOS_PAGO_XML").val();
var TIPO_CAMBIOP=$("#TIPO_CAMBIOP").val();
var TOTAL_ENPESOS=$("#TOTAL_ENPESOS").val();
var IMPUESTO_HOSPEDAJE=$("#IMPUESTO_HOSPEDAJE").val();										  
var CANCELACIONES_PDF=$("#CANCELACIONES_PDF").val();
var NOMBRE_COMERCIAL=$("#NOMBRE_COMERCIAL").val();
var IVA=$("#IVA_3").val();
var TImpuestosRetenidosIVA=$("#TImpuestosRetenidosIVA_5").val();
var TImpuestosRetenidosISR=$("#TImpuestosRetenidosISR_5").val();
var descuentos=$("#descuentos_5").val();

var hiddenpagoproveedores=$("#hiddenpagoproveedores").val();


var UUID=$("#UUID").val();
var metodoDePago=$("#metodoDePago").val();
var total=$("#total").val();
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
var TUA=$("#TUAQQ").val();
var TuaTotalCargos=$("#TuaTotalCargos").val();
var DESCUENTO=$("#DESCUENTO").val();
var subTotal=$("#subTotal").val();
var propina=$("#propina").val();
/*termina copiar y pegar*/
			
			var per_page=$("#per_page2").val();
			var parametros = {
			"action2":"ajax2",
			"page":page2,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'NUMERO_CONSECUTIVO_PROVEE':NUMERO_CONSECUTIVO_PROVEE,
'RAZON_SOCIAL':RAZON_SOCIAL,
'RFC_PROVEEDOR':RFC_PROVEEDOR,
'NOMBRE_EVENTO':NOMBRE_EVENTO,
'MOTIVO_GASTO':MOTIVO_GASTO,
'CONCEPTO_PROVEE':CONCEPTO_PROVEE,
'MONTO_TOTAL_COTIZACION_ADEUDO':MONTO_TOTAL_COTIZACION_ADEUDO,
'MONTO_FACTURA':MONTO_FACTURA,
'MONTO_PROPINA':MONTO_PROPINA,
'MONTO_DEPOSITAR':MONTO_DEPOSITAR,
'TIPO_DE_MONEDA':TIPO_DE_MONEDA,
'PFORMADE_PAGO':PFORMADE_PAGO,
'FECHA_A_DEPOSITAR':FECHA_A_DEPOSITAR,
'STATUS_DE_PAGO':STATUS_DE_PAGO,
'BANCO_ORIGEN':BANCO_ORIGEN,
'ACTIVO_FIJO':ACTIVO_FIJO,
'GASTO_FIJO':GASTO_FIJO,
'PAGAR_CADA':PAGAR_CADA,
'FECHA_PPAGO':FECHA_PPAGO,
'FECHA_TPROGRAPAGO':FECHA_TPROGRAPAGO,
'NUMERO_EVENTOFIJO':NUMERO_EVENTOFIJO,
'CLASI_GENERAL':CLASI_GENERAL,
'SUB_GENERAL':SUB_GENERAL,
'MONTO_DE_COMISION':MONTO_DE_COMISION,
'POLIZA_NUMERO':POLIZA_NUMERO,
'NOMBRE_DEL_EJECUTIVO':NOMBRE_DEL_EJECUTIVO,
'OBSERVACIONES_1':OBSERVACIONES_1,
'FECHA_DE_LLENADO':FECHA_DE_LLENADO,
'hiddenpagoproveedores':hiddenpagoproveedores,
'COMPLEMENTOS_PAGO_XML':COMPLEMENTOS_PAGO_XML,
'CANCELACIONES_PDF':CANCELACIONES_PDF,
'ADJUNTAR_COTIZACION':ADJUNTAR_COTIZACION,
'COMPLEMENTOS_PAGO_PDF':COMPLEMENTOS_PAGO_PDF,
'IMPUESTO_HOSPEDAJE':IMPUESTO_HOSPEDAJE,
'NOMBRE_COMERCIAL':NOMBRE_COMERCIAL,
'IVA_3':IVA,
'TImpuestosRetenidosIVA_5':TImpuestosRetenidosIVA,
'TImpuestosRetenidosISR_5':TImpuestosRetenidosISR,
'descuentos_5':descuentos,

'UUID':UUID,
'metodoDePago':metodoDePago,
'total':total,
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
'DESCUENTO':DESCUENTO,
'subTotal':subTotal,
'propina':propina,

			
			'DEPARTAMENTO':DEPARTAMENTO
			};
			$("#loader2").fadeIn('slow');
    $.ajax({
       url:'calendariodeeventos2/clasesCOM/controlador_filtroCOM.php',
        type: 'POST',
        data: parametros,
						 beforeSend: function(objeto){
				$("#loader2").html("Cargando...").fadeIn().delay(500).fadeOut();
			  },
        success: function (data) {
            $(".datos_ajax2").html(data).fadeIn('slow');
			$('.checkbox').each(function() {
    const id = $(this).data('id');
    if (localStorage.getItem('checkbox_' + id) === 'checked') {
        this.checked = true;
        this.closest('tr').style.filter = 'brightness(65%)';
    }
});
          

            // Scroll al checkbox editado
if (lastCheckboxID !== null) {
    setTimeout(function () {
        let el = document.getElementById("STATUS_CHECKBOX" + lastCheckboxID);
        if (el) {
            el.scrollIntoView({ behavior: "smooth", block: "center" });
            lastCheckboxID = null;
        }
    }, 500);
}
        }
    });
}
/* terminaB1*/		
		
	</script>
