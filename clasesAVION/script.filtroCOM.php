<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

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
var OBSERVACIONES_1=$("#OBSERVACIONES").val();
var FECHA_DE_LLENADO=$("#FECHA_DE_LLENADO").val();
var COMPLEMENTOS_PAGO_PDF=$("#COMPLEMENTOS_PAGO_PDF").val();
var COMPLEMENTOS_PAGO_XML=$("#COMPLEMENTOS_PAGO_XML").val();
var CANCELACIONES_PDF=$("#CANCELACIONES_PDF").val();
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

/*termina copiar y pegar*/

			'DEPARTAMENTO':DEPARTAMENTO
			};
			$("#loader2").fadeIn('slow');
			$.ajax({
				url:'calendariodeeventos2/clasesCOM/controlador_filtroCOM.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader2").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax2").html(data).fadeIn('slow');
					$("#loader2").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
