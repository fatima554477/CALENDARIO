<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/calendariodeeventos2/class.epcinnTIKETSYAVION.php");


$tikets = new TIKETSYAVION();
$conexion = NEW colaboradores();

$hiddenTIKETS1QA = isset($_POST["hiddenTIKETS1QA"])?$_POST["hiddenTIKETS1QA"]:'';
$borraTICKETS = isset($_POST["borraTICKETS"])?$_POST["borraTICKETS"]:'';
$ENVIARtickets = isset($_POST["ENVIARtickets"])?$_POST["ENVIARtickets"]:""; 
$ipactualiza = isset($_POST["ipactualiza"])?$_POST["ipactualiza"]:"";



if(!function_exists('cargarArchivoTicket')){

	function cargarArchivoTicket($conexion, $campo){

		if(isset($_FILES[$campo]) && !empty($_FILES[$campo]["name"])){

			$archivo = $conexion->solocargar($campo);

			if($archivo != '2' && $archivo != '' && $archivo != '1'){

				return $archivo;

			}

		}

		return '';

	}

}

if($hiddenTIKETS1QA == 'hiddenTIKETS1QA'){          
	
$NUMERO_CONSECUTIVO_PROVEE = isset($_POST["NUMERO_CONSECUTIVO_PROVEE"])?$_POST["NUMERO_CONSECUTIVO_PROVEE"]:"";
$RAZON_SOCIAL = isset($_POST["RAZON_SOCIAL"])?$_POST["RAZON_SOCIAL"]:"";
$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"])?$_POST["NOMBRE_COMERCIAL"]:"";
$RFC_PROVEEDOR = isset($_POST["RFC_PROVEEDOR"])?$_POST["RFC_PROVEEDOR"]:"";
$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:"";
$MOTIVO_GASTO = isset($_POST["MOTIVO_GASTO"])?$_POST["MOTIVO_GASTO"]:"";
$CONCEPTO_PROVEE = isset($_POST["CONCEPTO_PROVEE"])?$_POST["CONCEPTO_PROVEE"]:"";
$MONTO_TOTAL_COTIZACION_ADEUDO = isset($_POST["MONTO_TOTAL_COTIZACION_ADEUDO"])?$_POST["MONTO_TOTAL_COTIZACION_ADEUDO"]:"";
$MONTO_FACTURA = isset($_POST["MONTO_FACTURA"])?$_POST["MONTO_FACTURA"]:"";
$MONTO_PROPINA = isset($_POST["MONTO_PROPINA"])?$_POST["MONTO_PROPINA"]:"";
$MONTO_DEPOSITAR = isset($_POST["MONTO_DEPOSITAR"])?$_POST["MONTO_DEPOSITAR"]:"";
$TIPO_DE_MONEDA = isset($_POST["TIPO_DE_MONEDA"])?$_POST["TIPO_DE_MONEDA"]:"";
$PFORMADE_PAGO = isset($_POST["PFORMADE_PAGO"])?$_POST["PFORMADE_PAGO"]:"";
$FECHA_A_DEPOSITAR = isset($_POST["FECHA_A_DEPOSITAR"])?$_POST["FECHA_A_DEPOSITAR"]:"";
$STATUS_DE_PAGO = isset($_POST["STATUS_DE_PAGO"])?$_POST["STATUS_DE_PAGO"]:"";
$BANCO_ORIGEN = isset($_POST["BANCO_ORIGEN"])?$_POST["BANCO_ORIGEN"]:"";
$ACTIVO_FIJO = isset($_POST["ACTIVO_FIJO"])?$_POST["ACTIVO_FIJO"]:"";
$GASTO_FIJO = isset($_POST["GASTO_FIJO"])?$_POST["GASTO_FIJO"]:"";
$PAGAR_CADA = isset($_POST["PAGAR_CADA"])?$_POST["PAGAR_CADA"]:"";
$FECHA_PPAGO = isset($_POST["FECHA_PPAGO"])?$_POST["FECHA_PPAGO"]:"";
$FECHA_TPROGRAPAGO = isset($_POST["FECHA_TPROGRAPAGO"])?$_POST["FECHA_TPROGRAPAGO"]:"";
$NUMERO_EVENTOFIJO = isset($_POST["NUMERO_EVENTOFIJO"])?$_POST["NUMERO_EVENTOFIJO"]:"";
$CLASI_GENERAL = isset($_POST["CLASI_GENERAL"])?$_POST["CLASI_GENERAL"]:"";
$SUB_GENERAL = isset($_POST["SUB_GENERAL"])?$_POST["SUB_GENERAL"]:"";
$MONTO_DE_COMISION = isset($_POST["MONTO_DE_COMISION"])?$_POST["MONTO_DE_COMISION"]:"";
$POLIZA_NUMERO = isset($_POST["POLIZA_NUMERO"])?$_POST["POLIZA_NUMERO"]:"";
$NOMBRE_DEL_EJECUTIVO = isset($_POST["NOMBRE_DEL_EJECUTIVO"])?$_POST["NOMBRE_DEL_EJECUTIVO"]:"";
$OBSERVACIONESA = isset($_POST["OBSERVACIONESA"])?$_POST["OBSERVACIONESA"]:"";
$FECHA_DE_LLENADO = isset($_POST["FECHA_DE_LLENADO"])?$_POST["FECHA_DE_LLENADO"]:"";
$hiddenTIKETS1QA = isset($_POST["hiddenTIKETS1QA"])?$_POST["hiddenTIKETS1QA"]:""; 
$tipo_documento = isset($_POST["tipo_documento"])?$_POST["tipo_documento"]:""; 

$FOTO_ESTADO_PROVEE111 = cargarArchivoTicket($conexion, "FOTO_ESTADO_PROVEE11");

$ADJUNTAR_ARCHIVO_11 = cargarArchivoTicket($conexion, "ADJUNTAR_ARCHIVO_1");

$ADJUNTAR_COTIZACION1 = cargarArchivoTicket($conexion, "ADJUNTAR_COTIZACION");

$COMPLEMENTOS_PAGO_PDF1 = cargarArchivoTicket($conexion, "COMPLEMENTOS_PAGO_PDF");

$COMPLEMENTOS_PAGO_XML1 = cargarArchivoTicket($conexion, "COMPLEMENTOS_PAGO_XML");

$CANCELACIONES_PDF1 = cargarArchivoTicket($conexion, "CANCELACIONES_PDF");

$CANCELACIONES_XML1 = cargarArchivoTicket($conexion, "CANCELACIONES_XML");

$ADJUNTAR_FACTURA_DE_COMISION_PDF1 = cargarArchivoTicket($conexion, "ADJUNTAR_FACTURA_DE_COMISION_PDF");

$ADJUNTAR_FACTURA_DE_COMISION_XML1 = cargarArchivoTicket($conexion, "ADJUNTAR_FACTURA_DE_COMISION_XML");

$CALCULO_DE_COMISION1 = cargarArchivoTicket($conexion, "CALCULO_DE_COMISION");

$COMPROBANTE_DE_DEVOLUCION1 = cargarArchivoTicket($conexion, "COMPROBANTE_DE_DEVOLUCION");

$NOTA_DE_CREDITO_COMPRA1 = cargarArchivoTicket($conexion, "NOTA_DE_CREDITO_COMPRA");

$ADJUNTAR_FACTURA_PDF1 = cargarArchivoTicket($conexion, "ADJUNTAR_FACTURA_PDF");

$ADJUNTAR_FACTURA_XML1 = cargarArchivoTicket($conexion, "ADJUNTAR_FACTURA_XML");

echo $tikets->guardarTIKETSAVION ($ADJUNTAR_FACTURA_XML1, $NUMERO_CONSECUTIVO_PROVEE , $RAZON_SOCIAL , $NOMBRE_COMERCIAL,$RFC_PROVEEDOR , $NUMERO_EVENTO , $NOMBRE_EVENTO , $MOTIVO_GASTO , $CONCEPTO_PROVEE , $MONTO_TOTAL_COTIZACION_ADEUDO , $MONTO_FACTURA , $MONTO_PROPINA , $MONTO_DEPOSITAR , $TIPO_DE_MONEDA , $PFORMADE_PAGO , $FECHA_A_DEPOSITAR , $STATUS_DE_PAGO , $BANCO_ORIGEN , $ACTIVO_FIJO , $GASTO_FIJO , $PAGAR_CADA , $FECHA_PPAGO , $FECHA_TPROGRAPAGO , $NUMERO_EVENTOFIJO , $CLASI_GENERAL , $SUB_GENERAL , $MONTO_DE_COMISION , $POLIZA_NUMERO , $NOMBRE_DEL_EJECUTIVO , $OBSERVACIONESA , $FECHA_DE_LLENADO , $hiddenTIKETS1QA ,$ipactualiza, $tipo_documento, $ENVIARtickets,

$FOTO_ESTADO_PROVEE111, 
$ADJUNTAR_ARCHIVO_11, 
$ADJUNTAR_COTIZACION1, 
$COMPLEMENTOS_PAGO_PDF1, 
$COMPLEMENTOS_PAGO_XML1, 
$CANCELACIONES_PDF1, 
$CANCELACIONES_XML1, 
$ADJUNTAR_FACTURA_DE_COMISION_PDF1, 
$ADJUNTAR_FACTURA_DE_COMISION_XML1, 
$CALCULO_DE_COMISION1, 
$COMPROBANTE_DE_DEVOLUCION1, 
$NOTA_DE_CREDITO_COMPRA1,
 $ADJUNTAR_FACTURA_PDF1

);
}


elseif($borraTICKETS == 'borraTICKETS'){
	//borra_id_tic borraTICKETS
	$borra_id_tic= isset($_POST["borra_id_tic"])?$_POST["borra_id_tic"]:"";   
		
	echo  $tikets->borraTICKETS($borra_id_tic);
 


}

?>