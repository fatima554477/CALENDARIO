<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load2(1);
		});
		function load2(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();var NUMERO_CONSECUTIVO_PROVEE=$("#NUMERO_CONSECUTIVO_PROVEE_1").val();
var RAZON_SOCIAL=$("#RAZON_SOCIAL_1").val();
var RFC_PROVEEDOR=$("#RFC_PROVEEDOR_1").val();
var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_1").val();
var MOTIVO_GASTO=$("#MOTIVO_GASTO_1").val();
var CONCEPTO_PROVEE=$("#CONCEPTO_PROVEE_1").val();
var MONTO_TOTAL_COTIZACION_ADEUDO=$("#MONTO_TOTAL_COTIZACION_ADEUDO_1").val();
var MONTO_FACTURA=$("#MONTO_FACTURA_1").val();
var MONTO_PROPINA=$("#MONTO_PROPINA_1").val();
var MONTO_DEPOSITAR=$("#MONTO_DEPOSITAR_1").val();
var TIPO_DE_MONEDA=$("#TIPO_DE_MONEDA_1").val();
var PFORMADE_PAGO=$("#PFORMADE_PAGO_1").val();
var FECHA_A_DEPOSITAR=$("#FECHA_A_DEPOSITAR_1").val();
var STATUS_DE_PAGO=$("#STATUS_DE_PAGO_1").val();
var BANCO_ORIGEN=$("#BANCO_ORIGEN_1").val();
var ACTIVO_FIJO=$("#ACTIVO_FIJO_1").val();
var GASTO_FIJO=$("#GASTO_FIJO_1").val();
var PAGAR_CADA=$("#PAGAR_CADA_1").val();
var FECHA_PPAGO=$("#FECHA_PPAGO_1").val();
var FECHA_TPROGRAPAGO=$("#FECHA_TPROGRAPAGO_1").val();
var NUMERO_EVENTOFIJO=$("#NUMERO_EVENTOFIJO_1").val();
var CLASI_GENERAL=$("#CLASI_GENERAL_1").val();
var SUB_GENERAL=$("#SUB_GENERAL_1").val();
var MONTO_DE_COMISION=$("#MONTO_DE_COMISION_1").val();
var POLIZA_NUMERO=$("#POLIZA_NUMERO_1").val();
var NOMBRE_DEL_EJECUTIVO=$("#NOMBRE_DEL_EJECUTIVO_1").val();
var OBSERVACIONES_1=$("#OBSERVACIONES_1_1").val();
var FECHA_DE_LLENADO=$("#FECHA_DE_LLENADO_1").val();
var hiddenpagoproveedores=$("#hiddenpagoproveedores_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page").val();
			var parametros = {
			"action":"ajax",
			"page":page,
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
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'calendariodeeventos2/clasesCOM/controlador_filtroCOM.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
