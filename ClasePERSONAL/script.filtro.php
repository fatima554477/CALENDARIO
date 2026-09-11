<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();var NUMERO_EVENTO_PERSONAL2=$("#NUMERO_EVENTO_PERSONAL2_1").val();
var ID_EVENTO_PERSONAL2=$("#ID_EVENTO_PERSONAL2_1").val();
var NOMBRE_EVENTO_PERSONAL2=$("#NOMBRE_EVENTO_PERSONAL2_1").val();
var NOMBRE_DELINGRESO2=$("#NOMBRE_DELINGRESO2_1").val();
var NOMBRE_PERSONAL2=$("#NOMBRE_PERSONAL2_1").val();
var FECHA_INICIO1=$("#FECHA_INICIO1_1").val();
var FECHA_FINAL1=$("#FECHA_FINAL1_1").val();
var NUMERO_DIAS1=$("#NUMERO_DIAS1_1").val();
var MONTO_BONO1=$("#MONTO_BONO1_1").val();
var MONTO_BONO_TOTAL1=$("#MONTO_BONO_TOTAL1_1").val();
var FECHA_PPAGO1=$("#FECHA_PPAGO1_1").val();
var OBSERVACIONES_PERSONAL2=$("#OBSERVACIONES_PERSONAL2_1").val();
var PERSONAL2_FECHA_ULTIMA_CARGA=$("#PERSONAL2_FECHA_ULTIMA_CARGA_1").val();
var hDatosPERSONAL2=$("#hDatosPERSONAL2_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'NUMERO_EVENTO_PERSONAL2':NUMERO_EVENTO_PERSONAL2,
'ID_EVENTO_PERSONAL2':ID_EVENTO_PERSONAL2,
'NOMBRE_EVENTO_PERSONAL2':NOMBRE_EVENTO_PERSONAL2,
'NOMBRE_DELINGRESO2':NOMBRE_DELINGRESO2,
'NOMBRE_PERSONAL2':NOMBRE_PERSONAL2,
'FECHA_INICIO1':FECHA_INICIO1,
'FECHA_FINAL1':FECHA_FINAL1,
'NUMERO_DIAS1':NUMERO_DIAS1,
'MONTO_BONO1':MONTO_BONO1,
'MONTO_BONO_TOTAL1':MONTO_BONO_TOTAL1,
'FECHA_PPAGO1':FECHA_PPAGO1,
'OBSERVACIONES_PERSONAL2':OBSERVACIONES_PERSONAL2,
'PERSONAL2_FECHA_ULTIMA_CARGA':PERSONAL2_FECHA_ULTIMA_CARGA,
'hDatosPERSONAL2':hDatosPERSONAL2,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'calendariodeeventos2/clases/controlador_filtro.php',
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
