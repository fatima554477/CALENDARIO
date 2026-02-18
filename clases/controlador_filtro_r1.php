<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_G["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08pagoproveedoresfiltroDes`, 08altaeventosfiltroPLA WHERE 08pagoproveedoresfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "pagoProveedores";/*permisos*/
	$tables="02XML,02SUBETUFACTURA";/*tabla filtro*/
	$MONTO_DEPOSITADO122=0;
$MONTO_DEPOSITADO123=0;


$NUMERO_CONSECUTIVO_PROVEE = isset($_POST["NUMERO_CONSECUTIVO_PROVEE"])?trim($_POST["NUMERO_CONSECUTIVO_PROVEE"]):"";  
$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"])?trim($_POST["NOMBRE_COMERCIAL"]):"";  
$RAZON_SOCIAL = isset($_POST["RAZON_SOCIAL"])?trim($_POST["RAZON_SOCIAL"]):"";  
$RFC_PROVEEDOR = isset($_POST["RFC_PROVEEDOR"])?trim($_POST["RFC_PROVEEDOR"]):"";  
$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?trim($_POST["NUMERO_EVENTO"]):"";  
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?trim($_POST["NOMBRE_EVENTO"]):"";  
$MOTIVO_GASTO = isset($_POST["MOTIVO_GASTO"])?trim($_POST["MOTIVO_GASTO"]):"";  
$CONCEPTO_PROVEE = isset($_POST["CONCEPTO_PROVEE"])?trim($_POST["CONCEPTO_PROVEE"]):"";  
$MONTO_TOTAL_COTIZACION_ADEUDO = isset($_POST["MONTO_TOTAL_COTIZACION_ADEUDO"])?trim($_POST["MONTO_TOTAL_COTIZACION_ADEUDO"]):"";  
$MONTO_FACTURA = isset($_POST["MONTO_FACTURA"])?trim($_POST["MONTO_FACTURA"]):"";  
$MONTO_PROPINA = isset($_POST["MONTO_PROPINA"])?trim($_POST["MONTO_PROPINA"]):"";  
$MONTO_DEPOSITAR = isset($_POST["MONTO_DEPOSITAR"])?trim($_POST["MONTO_DEPOSITAR"]):"";  
$MONTO_DEPOSITADO = isset($_POST["MONTO_DEPOSITADO"])?trim($_POST["MONTO_DEPOSITADO"]):"";  
$TIPO_DE_MONEDA = isset($_POST["TIPO_DE_MONEDA"])?trim($_POST["TIPO_DE_MONEDA"]):"";  
$PFORMADE_PAGO = isset($_POST["PFORMADE_PAGO"])?trim($_POST["PFORMADE_PAGO"]):"";  
$FECHA_DE_PAGO = isset($_POST["FECHA_DE_PAGO"])?trim($_POST["FECHA_DE_PAGO"]):"";  
$FECHA_A_DEPOSITAR = isset($_POST["FECHA_A_DEPOSITAR"])?trim($_POST["FECHA_A_DEPOSITAR"]):"";  
$STATUS_DE_PAGO = isset($_POST["STATUS_DE_PAGO"])?trim($_POST["STATUS_DE_PAGO"]):"";  
$ACTIVO_FIJO = isset($_POST["ACTIVO_FIJO"])?trim($_POST["ACTIVO_FIJO"]):"";  
$GASTO_FIJO = isset($_POST["GASTO_FIJO"])?trim($_POST["GASTO_FIJO"]):"";  
$PAGAR_CADA = isset($_POST["PAGAR_CADA"])?trim($_POST["PAGAR_CADA"]):"";  
$FECHA_PPAGO = isset($_POST["FECHA_PPAGO"])?trim($_POST["FECHA_PPAGO"]):"";  
$FECHA_TPROGRAPAGO = isset($_POST["FECHA_TPROGRAPAGO"])?trim($_POST["FECHA_TPROGRAPAGO"]):"";  
$NUMERO_EVENTOFIJO = isset($_POST["NUMERO_EVENTOFIJO"])?trim($_POST["NUMERO_EVENTOFIJO"]):"";  
$CLASI_GENERAL = isset($_POST["CLASI_GENERAL"])?trim($_POST["CLASI_GENERAL"]):"";  
$SUB_GENERAL = isset($_POST["SUB_GENERAL"])?trim($_POST["SUB_GENERAL"]):"";  
$NUMERO_EVENTO1 = isset($_POST["NUMERO_EVENTO1"])?trim($_POST["NUMERO_EVENTO1"]):"";  
$CLASIFICACION_GENERAL = isset($_POST["CLASIFICACION_GENERAL"])?trim($_POST["CLASIFICACION_GENERAL"]):"";  
$CLASIFICACION_ESPECIFICA = isset($_POST["CLASIFICACION_ESPECIFICA"])?trim($_POST["CLASIFICACION_ESPECIFICA"]):"";  
$PLACAS_VEHICULO = isset($_POST["PLACAS_VEHICULO"])?trim($_POST["PLACAS_VEHICULO"]):"";  
$MONTO_DE_COMISION = isset($_POST["MONTO_DE_COMISION"])?trim($_POST["MONTO_DE_COMISION"]):"";  
$POLIZA_NUMERO = isset($_POST["POLIZA_NUMERO"])?trim($_POST["POLIZA_NUMERO"]):"";  
$NOMBRE_DEL_EJECUTIVO = isset($_POST["NOMBRE_DEL_EJECUTIVO"])?trim($_POST["NOMBRE_DEL_EJECUTIVO"]):"";  
$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"])?trim($_POST["OBSERVACIONES_1"]):"";  
$FECHA_DE_LLENADO = isset($_POST["FECHA_DE_LLENADO"])?trim($_POST["FECHA_DE_LLENADO"]):"";  
$hiddenpagoproveedores = isset($_POST["hiddenpagoproveedores"])?trim($_POST["hiddenpagoproveedores"]):"";  
$RAZON_SOCIAL_orden = isset($_POST["RAZON_SOCIAL_orden"])?trim($_POST["RAZON_SOCIAL_orden"]):"";  
$RFC_PROVEEDOR_orden = isset($_POST["RFC_PROVEEDOR_orden"])?trim($_POST["RFC_PROVEEDOR_orden"]):""; 
$MONTO_FACTURA_orden = isset($_POST["MONTO_FACTURA_orden"])?trim($_POST["MONTO_FACTURA_orden"]):""; 
$FECHA_DE_PAGO_orden = isset($_POST["FECHA_DE_PAGO_orden"])?trim($_POST["FECHA_DE_PAGO_orden"]):""; 
$NUMERO_EVENTO_orden = isset($_POST["NUMERO_EVENTO_orden"])?trim($_POST["NUMERO_EVENTO_orden"]):""; 


$UUID = isset($_POST["UUID"])?trim($_POST["UUID"]):""; 
$metodoDePago = isset($_POST["metodoDePago"])?trim($_POST["metodoDePago"]):""; 
$totalf = isset($_POST["totalf"])?trim($_POST["totalf"]):""; 
$serie = isset($_POST["serie"])?trim($_POST["serie"]):""; 
$folio = isset($_POST["folio"])?trim($_POST["folio"]):""; 
$regimenE = isset($_POST["regimenE"])?trim($_POST["regimenE"]):""; 
$UsoCFDI = isset($_POST["UsoCFDI"])?trim($_POST["UsoCFDI"]):""; 
$TImpuestosTrasladados = isset($_POST["TImpuestosTrasladados"])?trim($_POST["TImpuestosTrasladados"]):""; 
$TImpuestosRetenidos = isset($_POST["TImpuestosRetenidos"])?trim($_POST["TImpuestosRetenidos"]):""; 
$Version = isset($_POST["Version"])?trim($_POST["Version"]):""; 
$tipoDeComprobante = isset($_POST["tipoDeComprobante"])?trim($_POST["tipoDeComprobante"]):""; 
$condicionesDePago = isset($_POST["condicionesDePago"])?trim($_POST["condicionesDePago"]):""; 
$fechaTimbrado = isset($_POST["fechaTimbrado"])?trim($_POST["fechaTimbrado"]):""; 
$nombreR = isset($_POST["nombreR"])?trim($_POST["nombreR"]):""; 
$rfcR = isset($_POST["rfcR"])?trim($_POST["rfcR"]):""; 
$Moneda = isset($_POST["Moneda"])?trim($_POST["Moneda"]):""; 
$TipoCambio = isset($_POST["TipoCambio"])?trim($_POST["TipoCambio"]):""; 
$ValorUnitarioConcepto = isset($_POST["ValorUnitarioConcepto"])?trim($_POST["ValorUnitarioConcepto"]):""; 
$DescripcionConcepto = isset($_POST["DescripcionConcepto"])?trim($_POST["DescripcionConcepto"]):""; 
$ClaveUnidadConcepto = isset($_POST["ClaveUnidadConcepto"])?trim($_POST["ClaveUnidadConcepto"]):""; 
$ClaveProdServConcepto = isset($_POST["ClaveProdServConcepto"])?trim($_POST["ClaveProdServConcepto"]):""; 
$CantidadConcepto = isset($_POST["CantidadConcepto"])?trim($_POST["CantidadConcepto"]):""; 
$ImporteConcepto = isset($_POST["ImporteConcepto"])?trim($_POST["ImporteConcepto"]):"";
$UnidadConcepto = isset($_POST["UnidadConcepto"])?trim($_POST["UnidadConcepto"]):""; 

$TUA = isset($_POST["TUA"])?trim($_POST["TUA"]):""; 
$TuaTotalCargos = isset($_POST["TuaTotalCargos"])?trim($_POST["TuaTotalCargos"]):""; 
$DESCUENTO = isset($_POST["DESCUENTO"])?trim($_POST["DESCUENTO"]):""; 
$subTotal = isset($_POST["subTotal"])?trim($_POST["subTotal"]):""; 

//print_r($_POST);

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"NUMERO_CONSECUTIVO_PROVEE"=>$NUMERO_CONSECUTIVO_PROVEE,
"NOMBRE_COMERCIAL"=>$NOMBRE_COMERCIAL,
"RAZON_SOCIAL"=>$RAZON_SOCIAL,
"RFC_PROVEEDOR"=>$RFC_PROVEEDOR,
"NUMERO_EVENTO"=>$NUMERO_EVENTO,
"NOMBRE_EVENTO"=>$NOMBRE_EVENTO,
"MOTIVO_GASTO"=>$MOTIVO_GASTO,
"CONCEPTO_PROVEE"=>$CONCEPTO_PROVEE,
"MONTO_TOTAL_COTIZACION_ADEUDO"=>$MONTO_TOTAL_COTIZACION_ADEUDO,
"MONTO_FACTURA"=>$MONTO_FACTURA,
"MONTO_PROPINA"=>$MONTO_PROPINA,
"MONTO_DEPOSITAR"=>$MONTO_DEPOSITAR,
"MONTO_DEPOSITADO"=>$MONTO_DEPOSITADO,
"TIPO_DE_MONEDA"=>$TIPO_DE_MONEDA,
"PFORMADE_PAGO"=>$PFORMADE_PAGO,
"FECHA_DE_PAGO"=>$FECHA_DE_PAGO,
"FECHA_A_DEPOSITAR"=>$FECHA_A_DEPOSITAR,
"STATUS_DE_PAGO"=>$STATUS_DE_PAGO,
"ACTIVO_FIJO"=>$ACTIVO_FIJO,
"GASTO_FIJO"=>$GASTO_FIJO,
"PAGAR_CADA"=>$PAGAR_CADA,
"FECHA_PPAGO"=>$FECHA_PPAGO,
"FECHA_TPROGRAPAGO"=>$FECHA_TPROGRAPAGO,
"NUMERO_EVENTOFIJO"=>$NUMERO_EVENTOFIJO,
"CLASI_GENERAL"=>$CLASI_GENERAL,
"SUB_GENERAL"=>$SUB_GENERAL,
"NUMERO_EVENTO1"=>$NUMERO_EVENTO1,
"CLASIFICACION_GENERAL"=>$CLASIFICACION_GENERAL,
"CLASIFICACION_ESPECIFICA"=>$CLASIFICACION_ESPECIFICA,
"PLACAS_VEHICULO"=>$PLACAS_VEHICULO,
"MONTO_DE_COMISION"=>$MONTO_DE_COMISION,
"POLIZA_NUMERO"=>$POLIZA_NUMERO,
"NOMBRE_DEL_EJECUTIVO"=>$NOMBRE_DEL_EJECUTIVO,
"OBSERVACIONES_1"=>$OBSERVACIONES_1,
"FECHA_DE_LLENADO"=>$FECHA_DE_LLENADO,
"hiddenpagoproveedores"=>$hiddenpagoproveedores,
"RAZON_SOCIAL_orden"=>$RAZON_SOCIAL_orden,
"RFC_PROVEEDOR_orden"=>$RFC_PROVEEDOR_orden,
"MONTO_FACTURA_orden"=>$MONTO_FACTURA_orden,
"FECHA_DE_PAGO_orden"=>$FECHA_DE_PAGO_orden,
"NUMERO_EVENTO_orden"=>$NUMERO_EVENTO_orden,


"UUID"=>$UUID,
"totalf"=>$totalf,
"metodoDePago"=>$metodoDePago,
"serie"=>$serie,
"folio"=>$folio,
"regimenE"=>$regimenE,
"UsoCFDI"=>$UsoCFDI,
"TImpuestosTrasladados"=>$TImpuestosTrasladados,
"TImpuestosRetenidos"=>$TImpuestosRetenidos,
"Version"=>$Version,
"tipoDeComprobante"=>$tipoDeComprobante,
"condicionesDePago"=>$condicionesDePago,
"fechaTimbrado"=>$fechaTimbrado,
"nombreR"=>$nombreR,
"rfcR"=>$rfcR,
"MonedaF"=>$MonedaF,
"TipoCambio"=>$TipoCambio,
"ValorUnitarioConcepto"=>$ValorUnitarioConcepto,
"DescripcionConcepto"=>$DescripcionConcepto,
"ClaveUnidadConcepto"=>$ClaveUnidadConcepto,
"ClaveProdServConcepto"=>$ClaveProdServConcepto,
"CantidadConcepto"=>$CantidadConcepto,
"ImporteConcepto"=>$ImporteConcepto,
"UnidadConcepto"=>$UnidadConcepto,
"Moneda"=>$Moneda,
"TUA"=>$TUA,
"TuaTotalCargos"=>$TuaTotalCargos,
"DESCUENTO"=>$DESCUENTO,
"subTotal"=>$subTotal,

 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr>
<th style="background:#c9e8e8">#</th>
<th style="background:#c9e8e8">RESPONSABLE <br>DEL EVENTO</th>
<th style="background:#c9e8e8">CUENTAS <br>POR PAGAR</th><!-AUDITORIA 1->
<th style="background:#c9e8e8">DIRECCIÓN </th><!-antes finanzas y tesoreria->
<th style="background:#c9e8e8">FINANZAS Y <br>TESORERÍA <br>(PAGADO)</th><!-antes pagado->
<th style="background:#c9e8e8">AUDITORÍA</th>
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FACTURA XML</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FACTURA PDF</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NUMERO CONSECUTIVO PROVEE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE COMERCIAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">RAZON SOCIAL<br/>
			</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">RFC PROVEEDOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NUMERO EVENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE EVENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MOTIVO_GASTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MOTIVO GASTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CONCEPTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONCEPTO DE LA FACTURA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO TOTAL COTIZACION ADEUDO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO FACTURA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO PROPINA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO DEPOSITAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO DEPOSITADO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PENDIENTE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PENDIENTE DE PAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TIPO DE MONEDA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FORMA DE PAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE PAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA A DEPOSITAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">STATUS DE PAGO</th>
<?php } ?><?php                                     
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> COTIZACIÓN O REPORTE</th>
<?php } ?><?php                                     
if($database->plantilla_filtro($nombreTabla,"CONPROBANTE_TRANSFERENCIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8"> CONPROBANTE DE TRANSFERENCIA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">ACTIVO FIJO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">GASTO FIJO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">PAGAR CADA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">FECHA PAGO (GASTO FIJO)</th>   
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">FECHA PROGRAMACIÓN <br>DE PAGO (GASTO FIJO)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">NÚMERO EVENTO (GASTO FIJO)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">CLASIFICACIÓN  GENERAL (GASTO FIJO)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#e6f8ea;text-align:center">SUB CLASIFICACIÓN GENERAL (GASTO FIJO)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NÚMERO EVENTO </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CLASIFICACIÓN GENERAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_ESPECIFICA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CLASIFICACIÓN ESPECIFICA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PLACAS_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PLACAS VEHÍCULO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COMPLEMENTOS DE PAGO PDF</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COMPLEMENTOS DE PAGO XML</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANCELACIONES PDF</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANCELACIONES XML</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FACTURA DE COMISIÓN DESCONTADA PDF</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FACTURA DE COMISIÓN DESCONTADA XML</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CALCULO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> CALCULO DE COMISIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> MONTO DE COMISIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"COMPROBANTE_DE_DEVOLUCION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COMPROBANTE DE DEVOLUCIÓN<br> DE DINERO A EPC</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOTA_DE_CREDITO_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOTA DE CREDITO DE COMPRA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">POLIZA NUMERO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DEL EJECUTIVO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FOTO_ESTADO_PROVEE11",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MATCH CON EL ESTADO DE CUENTA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES 1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_ARCHIVO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ARCHIVO RELACIONADO A ESTE GASTO:</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE LLENADO</th>
<?php } ?>















<?php /*INICIA copiar y PEGAR XML */ ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">NOMBRE RECEPTOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"RFC_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">RFC RECEPTOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"REGIMEN_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">REGÍMEN FISCAL</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"UUID",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">UUID:</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"FOLIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">FOLIO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"SERIE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">SERIE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CLAVE_UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">CLAVE DE UNIDAD:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">CANTIDAD</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CLAVE_PODUCTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">CLAVE DE PRODUCTO O SERVICIO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"DESCRIPCION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">DESCRIPCIÓN</th>
<?php } ?>



<!--
<?php 
if($database->plantilla_filtro($nombreTabla,"IMPORTE_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">IMPORTE DE LA FACTURA</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">UNIDAD</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"VALOR_UNITARIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">VALOR UNITARIO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"BASE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">BASE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"IMPUESTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">IMPUESTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"TASA_CUOTA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TASA O CUOTA</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_FACTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TIPO FACTOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">I.V.A</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"IVA_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">I.V.A RETENIDO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"ISR_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">I.S.R RETENIDO</th>
<?php } ?>
-->

<?php 
if($database->plantilla_filtro($nombreTabla,"MonedaF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">MONEDA:</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_CAMBIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TIPO DE CAMBIO:</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"USO_CFDI",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">USO DE CFDI</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"metodoDePago",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">METODO DE PAGO:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CONDICIONES_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">CONDICIONES DE PAGO:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_COMPROBANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TIPO DE COMPROBANTE:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"VERSION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">VERSIÓN:</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_TIMBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">FECHA DE TIMBRADO:</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"subTotal",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">SUBTOTAL</th>
<?php } ?>


<?php 
if($database->plantilla_filtro($nombreTabla,"DESCUENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">DESCUENTO</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_TRASLADADOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TOTAL DE IMPUESTOS TRANSLADADOS</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_RETENIDOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TOTAL DE IMPUESTOS RETENIDOS</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"total",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<th style="background:#f9f3a1;text-align:center">TOTAL:</th>
<?php } ?>

<th style="background:#f9f3a1;text-align:center">TUA:</th>
<th style="background:#f9f3a1;text-align:center">TUA TOTAL CARGOS:</th>
<?php /*FIN copiar y PEGAR XML*/ ?>

<th style="background:#f9f3a1;text-align:center">% por falta de factura</th>


















<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--> 
<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_FACTURA_XML" value="<?php
echo $ADJUNTAR_FACTURA_XML; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_FACTURA_PDF" value="<?php
echo $ADJUNTAR_FACTURA_PDF; ?>"></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_CONSECUTIVO_PROVEE_1_1" value="<?php 
echo $NUMERO_CONSECUTIVO_PROVEE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_COMERCIAL_1" value="<?php 
echo $NOMBRE_COMERCIAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8">

<div style="display: flex; justify-content: space-between; align-items: center;">


<input  style="width:200PX;" type="text" class="form-control" id="RAZON_SOCIAL_1" value="<?php echo $RAZON_SOCIAL; ?>"/>

<select style="width:80PX; padding-bottom:0px; margin-bottom:0px;" id="RAZON_SOCIAL_orden" href="javascript:void(0);" onchange="load('<?php echo $_POST['page']; ?>')">

			<option value="">NORMAL</option>
			
			<option value="asc" <?php if($_POST['RAZON_SOCIAL_orden']=='asc'){echo 'selected';} ?>>ASC</option>
			
			<option value="desc" <?php if($_POST['RAZON_SOCIAL_orden']=='desc'){echo 'selected';} ?>>DESC</option>
</select>
     

</div>
			

</td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>

<td style="background:#c9e8e8">

<div style="display: flex; justify-content: space-between; align-items: center;">
<input type="text"  style="width:200PX;" class="form-control" id="RFC_PROVEEDOR_1" value="<?php 
echo $RFC_PROVEEDOR; ?>"/>

<select style="width:80PX; padding-bottom:0px; margin-bottom:0px;" id="RFC_PROVEEDOR_orden" href="javascript:void(0);" onchange="load('<?php echo $_POST['page']; ?>')">

			<option value="">NORMAL</option>
			
			<option value="asc" <?php if($_POST['RFC_PROVEEDOR_orden']=='asc'){echo 'selected';} ?>>ASC</option>
			
			<option value="desc" <?php if($_POST['RFC_PROVEEDOR_orden']=='desc'){echo 'selected';} ?>>DESC</option>
</select>
</div>

</td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>

<td style="background:#c9e8e8">



<div style="display: flex; justify-content: space-between; align-items: center;">

<input type="text" style="width:200PX;" class="form-control" id="NUMERO_EVENTO_1" value="<?php 
echo $NUMERO_EVENTO; ?>">

<select style="width:80PX; padding-bottom:0px; margin-bottom:0px;" id="NUMERO_EVENTO_orden" href="javascript:void(0);" onchange="load('<?php echo $_POST['page']; ?>')">

			<option value="">NORMAL</option>
			
			<option value="asc" <?php if($_POST['NUMERO_EVENTO_orden']=='asc'){echo 'selected';} ?>>ASC</option>
			
			<option value="desc" <?php if($_POST['NUMERO_EVENTO_orden']=='desc'){echo 'selected';} ?>>DESC</option>
</select>

</div>
</td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_EVENTO_1" value="<?php 
echo $NOMBRE_EVENTO; ?>">



</td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MOTIVO_GASTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MOTIVO_GASTO_1" value="<?php 
echo $MOTIVO_GASTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CONCEPTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="CONCEPTO_PROVEE_1" value="<?php 
echo $CONCEPTO_PROVEE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_TOTAL_COTIZACION_ADEUDO_1" value="<?php 
echo $MONTO_TOTAL_COTIZACION_ADEUDO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8">


<div style="display: flex; justify-content: space-between; align-items: center;">


<input type="text"  style="width:200PX;" class="form-control" id="MONTO_FACTURA_1" value="<?php 
echo $MONTO_FACTURA; ?>">


<select style="width:80PX; padding-bottom:0px; margin-bottom:0px;" id="MONTO_FACTURA_orden" href="javascript:void(0);" onchange="load('<?php echo $_POST['page']; ?>')">

			<option value="">NORMAL</option>
			
			<option value="asc" <?php if($_POST['MONTO_FACTURA_orden']=='asc'){echo 'selected';} ?>>ASC</option>
			
			<option value="desc" <?php if($_POST['MONTO_FACTURA_orden']=='desc'){echo 'selected';} ?>>DESC</option>
</select>

</div>

</td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_PROPINA_1" value="<?php 
echo $MONTO_PROPINA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_DEPOSITAR_1" value="<?php 
echo $MONTO_DEPOSITAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_DEPOSITADO_1" value="<?php 
echo $MONTO_DEPOSITADO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PENDIENTE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PENDIENTE_PAGO_1" value="<?php 
echo $PENDIENTE_PAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="TIPO_DE_MONEDA_1" value="<?php 
echo $TIPO_DE_MONEDA; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PFORMADE_PAGO_1" value="<?php 
echo $PFORMADE_PAGO; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8">

<div style="display: flex; justify-content: space-between; align-items: center;">

<input type="date" class="form-control" id="FECHA_DE_PAGO_1" value="<?php 
echo $FECHA_DE_PAGO; ?>">

<select style="width:80PX; padding-bottom:0px; margin-bottom:0px;" id="FECHA_DE_PAGO_orden" href="javascript:void(0);" onchange="load('<?php echo $_POST['page']; ?>')">

			<option value="">NORMAL</option>
			
			<option value="asc" <?php if($_POST['FECHA_DE_PAGO_orden']=='asc'){echo 'selected';} ?>>ASC</option>
			
			<option value="desc" <?php if($_POST['FECHA_DE_PAGO_orden']=='desc'){echo 'selected';} ?>>DESC</option>
</select>
</div>

</td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHA_A_DEPOSITAR_1" value="<?php 
echo $FECHA_A_DEPOSITAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="STATUS_DE_PAGO_1" value="<?php 
echo $STATUS_DE_PAGO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_COTIZACION" value="<?php
echo $ADJUNTAR_COTIZACION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CONPROBANTE_TRANSFERENCIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CONPROBANTE_TRANSFERENCIA" value="<?php
echo $CONPROBANTE_TRANSFERENCIA; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="ACTIVO_FIJO_1" value="<?php 
echo $ACTIVO_FIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="GASTO_FIJO_1" value="<?php 
echo $GASTO_FIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="PAGAR_CADA_1" value="<?php 
echo $PAGAR_CADA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="date" class="form-control" id="FECHA_PPAGO_1" value="<?php 
echo $FECHA_PPAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="date" class="form-control" id="FECHA_TPROGRAPAGO_1" value="<?php 
echo $FECHA_TPROGRAPAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="NUMERO_EVENTOFIJO_1" value="<?php 
echo $NUMERO_EVENTOFIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="CLASI_GENERAL_1" value="<?php 
echo $CLASI_GENERAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#e6f8ea"><input type="text" class="form-control" id="SUB_GENERAL_1" value="<?php 
echo $SUB_GENERAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_EVENTO1_1" value="<?php 
echo $NUMERO_EVENTO1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="CLASIFICACION_GENERAL_1" value="<?php 
echo $CLASIFICACION_GENERAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_ESPECIFICA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="CLASIFICACION_ESPECIFICA_1" value="<?php 
echo $CLASIFICACION_ESPECIFICA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PLACAS_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PLACAS_VEHICULO_1" value="<?php 
echo $PLACAS_VEHICULO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="COMPLEMENTOS_PAGO_PDF" value="<?php
echo $COMPLEMENTOS_PAGO_PDF; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="COMPLEMENTOS_PAGO_XML" value="<?php
echo $COMPLEMENTOS_PAGO_XML; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CANCELACIONES_PDF" value="<?php
echo $CANCELACIONES_PDF; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CANCELACIONES_XML" value="<?php
echo $CANCELACIONES_XML; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_FACTURA_DE_COMISION_PDF" value="<?php
echo $ADJUNTAR_FACTURA_DE_COMISION_PDF; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_FACTURA_DE_COMISION_XML" value="<?php
echo $ADJUNTAR_FACTURA_DE_COMISION_XML; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CALCULO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CALCULO_DE_COMISION" value="<?php
echo $CALCULO_DE_COMISION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_DE_COMISION_1" value="<?php 
echo $MONTO_DE_COMISION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"COMPROBANTE_DE_DEVOLUCION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="COMPROBANTE_DE_DEVOLUCION" value="<?php
echo $COMPROBANTE_DE_DEVOLUCION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOTA_DE_CREDITO_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOTA_DE_CREDITO_COMPRA" value="<?php
echo $NOTA_DE_CREDITO_COMPRA; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="POLIZA_NUMERO_1" value="<?php 
echo $POLIZA_NUMERO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_DEL_EJECUTIVO_1" value="<?php 
echo $NOMBRE_DEL_EJECUTIVO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"FOTO_ESTADO_PROVEE11",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FOTO_ESTADO_PROVEE11" value="<?php
echo $FOTO_ESTADO_PROVEE11; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="OBSERVACIONES_1_1" value="<?php 
echo $OBSERVACIONES_1; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_ARCHIVO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ADJUNTAR_ARCHIVO_1" value="<?php
echo $ADJUNTAR_ARCHIVO_1; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHA_DE_LLENADO_1" value="<?php 
echo $FECHA_DE_LLENADO; ?>"></td>
<?php } ?>























<?php /*INICIA copiar y PEGAR XML*/ ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="nombreR" value="<?php
echo $nombreR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"RFC_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="rfcR" value="<?php
echo $rfcR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"REGIMEN_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="regimenE" value="<?php
echo $regimenE; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"UUID",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="UUID" value="<?php
echo $UUID; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FOLIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="folio" value="<?php
echo $folio; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"SERIE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="serie" value="<?php echo $serie; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CLAVE_UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="ClaveUnidadConcepto" value="<?php
echo $ClaveUnidadConcepto; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="CantidadConcepto" value="<?php
echo $CantidadConcepto; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CLAVE_PODUCTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="ClaveProdServConcepto" value="<?php
echo $ClaveProdServConcepto; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"DESCRIPCION ",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="DescripcionConcepto" value="<?php
echo $DescripcionConcepto ; ?>"></td>
<?php } ?>


<!--
<?php  
if($database->plantilla_filtro($nombreTabla,"IMPORTE_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="ImporteConcepto" value="<?php
echo $ImporteConcepto ; ?>"></td>
<?php } ?>




<?php  
if($database->plantilla_filtro($nombreTabla,"UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="UnidadConcepto" value="<?php
echo $UnidadConcepto; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"VALOR_UNITARIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="ValorUnitarioConcepto" value="<?php
echo $ValorUnitarioConcepto; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"BASE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="BASE" value="<?php
echo $BASE; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"IMPUESTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="IMPUESTO" value="<?php
echo $IMPUESTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"TASA_CUOTA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TASA_CUOTA" value="<?php
echo $TASA_CUOTA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_FACTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TIPO_FACTOR" value="<?php
echo $TIPO_FACTOR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="IVA" value="<?php
echo $IVA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"IVA_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="IVA_RETENIDO" value="<?php
echo $IVA_RETENIDO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"ISR_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="ISR_RETENIDO" value="<?php
echo $ISR_RETENIDO; ?>"></td>
<?php } ?>
-->




<?php  
if($database->plantilla_filtro($nombreTabla,"MonedaF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="Moneda" value="<?php
echo $Moneda; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_CAMBIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TipoCambio" value="<?php
echo $TipoCambio; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"USO_CFDI",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="UsoCFDI" value="<?php
echo $UsoCFDI; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"metodoDePago",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="metodoDePago" value="<?php
echo $metodoDePago; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CONDICIONES_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="condicionesDePago" value="<?php
echo $condicionesDePago; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_COMPROBANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="tipoDeComprobante" value="<?php
echo $tipoDeComprobante; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"VERSION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="Version" value="<?php
echo $Version; ?>"></td>
<?php } ?>





<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_TIMBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="fechaTimbrado" value="<?php
echo $fechaTimbrado; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"SUBTOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="subTotal" value="<?php
echo $subTotal; ?>"></td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"DESCUENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="DESCUENTO" value="<?php
echo $DESCUENTO; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_TRASLADADOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TImpuestosTrasladados" value="<?php
echo $TImpuestosTrasladados; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_RETENIDOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TImpuestosRetenidos" value="<?php
echo $TImpuestosRetenidos; ?>"></td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"total",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="totalf" value="<?php echo $totalf; ?>"></td>
<?php } ?>

<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TUA" value="<?php
echo $TUA; ?>"></td>

<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="TuaTotalCargos" value="<?php
echo $TuaTotalCargos; ?>"></td>
<?php /*FIN copiar y PEGAR XML*/ ?>

<td style="background:#f9f3a1;text-align:center"><input type="text" class="form-control" id="PorfaltaDeFactura" value="<?php echo $PorfaltaDeFactura; ?>"></td>













<?php /*termina copiar y terminaA4*/ ?>
	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		$totales = 'no';
		
		
		$database->TruncateingresarTemproal();
		foreach ($datos as $key=>$row){
				$database->ingresarTemproal($row['RFC_PROVEEDOR'],$row['MONTO_TOTAL_COTIZACION_ADEUDO'],$row['MONTO_DEPOSITADO'],$row['02SUBETUFACTURAid']);			
		}
		

		foreach ($datos as $key=>$row){$colspan = 0;?>
		<tr>
<td><?php echo $row["02SUBETUFACTURAid"]; $colspan += 1; ?></td>

<?php
                                                               
 
	
	$ADJUNTAR_FACTURA_PDF = '';$ADJUNTAR_FACTURA_XML='';$ADJUNTAR_COTIZACION='';$CONPROBANTE_TRANSFERENCIA='';$ADJUNTAR_ARCHIVO_1='';$COMPLEMENTOS_PAGO_PDF='';
   $COMPLEMENTOS_PAGO_XML='';$CANCELACIONES_PDF='';$CANCELACIONES_XML='';$ADJUNTAR_FACTURA_DE_COMISION_PDF='';$ADJUNTAR_FACTURA_DE_COMISION_XML='';$CALCULO_DE_COMISION='';
   $COMPROBANTE_DE_DEVOLUCION='';  $NOTA_DE_CREDITO_COMPRA='';$FOTO_ESTADO_PROVEE11='';$ADJUNTAR_ARCHIVO_1='';
	$querycontrasDOCTOS = $database->Listado_subefacturaDOCTOS($row['02SUBETUFACTURAid']);
	while($rowDOCTOS = mysqli_fetch_array($querycontrasDOCTOS))
	{
			//$ADJUNTAR_FACTURA_PDF = '';				
		if($rowDOCTOS["ADJUNTAR_FACTURA_PDF"]!=''){
			$ADJUNTAR_FACTURA_PDF .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_FACTURA_PDF"].'" target ="_blank">Ver!</a><br/>';
		}
		
		if($rowDOCTOS["ADJUNTAR_FACTURA_XML"]!=''){
			$ADJUNTAR_FACTURA_XML .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_FACTURA_XML"].'" target ="_blank">Ver!</a><br/>';
		}
		if($rowDOCTOS["ADJUNTAR_COTIZACION"]!=''){
			$ADJUNTAR_COTIZACION .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_COTIZACION"].'" target ="_blank">Ver!</a><br/>';
		}
		if($rowDOCTOS["CONPROBANTE_TRANSFERENCIA"]!=''){
			$CONPROBANTE_TRANSFERENCIA .= '<a href="includes/archivos/'.$rowDOCTOS["CONPROBANTE_TRANSFERENCIA"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["COMPLEMENTOS_PAGO_PDF"]!=''){
			$COMPLEMENTOS_PAGO_PDF .= '<a href="includes/archivos/'.$rowDOCTOS["COMPLEMENTOS_PAGO_PDF"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["COMPLEMENTOS_PAGO_XML"]!=''){
			$COMPLEMENTOS_PAGO_XML .= '<a href="includes/archivos/'.$rowDOCTOS["COMPLEMENTOS_PAGO_XML"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["CANCELACIONES_PDF"]!=''){
			$CANCELACIONES_PDF .= '<a href="includes/archivos/'.$rowDOCTOS["CANCELACIONES_PDF"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["CANCELACIONES_XML"]!=''){
			$CANCELACIONES_XML .= '<a href="includes/archivos/'.$rowDOCTOS["CANCELACIONES_XML"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_PDF"]!=''){
			$ADJUNTAR_FACTURA_DE_COMISION_PDF .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_PDF"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_XML"]!=''){
			$ADJUNTAR_FACTURA_DE_COMISION_XML .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_XML"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["CALCULO_DE_COMISION"]!=''){
			$CALCULO_DE_COMISION .= '<a href="includes/archivos/'.$rowDOCTOS["CALCULO_DE_COMISION"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["COMPROBANTE_DE_DEVOLUCION"]!=''){
			$COMPROBANTE_DE_DEVOLUCION .= '<a href="includes/archivos/'.$rowDOCTOS["COMPROBANTE_DE_DEVOLUCION"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["NOTA_DE_CREDITO_COMPRA"]!=''){
			$NOTA_DE_CREDITO_COMPRA .= '<a href="includes/archivos/'.$rowDOCTOS["NOTA_DE_CREDITO_COMPRA"].'" target ="_blank">Ver!</a><br/>';
		}
      if($rowDOCTOS["FOTO_ESTADO_PROVEE11"]!=''){
			$FOTO_ESTADO_PROVEE11 .= '<a href="includes/archivos/'.$rowDOCTOS["FOTO_ESTADO_PROVEE11"].'" target ="_blank">Ver!</a><br/>';
		}
	
		if($rowDOCTOS["ADJUNTAR_ARCHIVO_1"]!=''){
			$ADJUNTAR_ARCHIVO_1 .= '<a href="includes/archivos/'.$rowDOCTOS["ADJUNTAR_ARCHIVO_1"].'" target ="_blank">Ver!</a><br/>';
		}

	}



?>
<td style="text-align:center; background:<?php if($row["STATUS_RESPONSABLE_EVENTO"]=='si'){?> #ceffcc;<?php }else{?>  #e9d8ee;<?php }?>" id="color_RESPONSABLE_EVENTO<?php echo $row["02SUBETUFACTURAid"]; ?>">

<input type="checkbox" style="width:30PX;" class="form-check-input" id="STATUS_RESPONSABLE_EVENTO<?php echo $row["02SUBETUFACTURAid"]; ?>"  name="STATUS_RESPONSABLE_EVENTO<?php echo $row["02SUBETUFACTURAid"]; ?>" value="<?php echo $row["02SUBETUFACTURAid"]; ?>" onclick="STATUS_RESPONSABLE_EVENTO(<?php echo $row["02SUBETUFACTURAid"]; ?>)" <?php if($row["STATUS_RESPONSABLE_EVENTO"]=='si'){
	echo "checked";
}
$colspan += 1; ?>/>
</td>
<td style="text-align:center; background:<?php if($row["STATUS_AUDITORIA1"]=='si'){?> #ceffcc; <?php }else{?>#e9d8ee; <?php }?>" id="color_AUDITORIA1<?php echo $row["02SUBETUFACTURAid"]; ?>">

<input type="checkbox" style="width:30PX;" class="form-check-input" id="STATUS_AUDITORIA1<?php echo $row["02SUBETUFACTURAid"]; ?>"  name="STATUS_AUDITORIA1<?php echo $row["02SUBETUFACTURAid"]; ?>" value="<?php echo $row["02SUBETUFACTURAid"]; ?>" onclick="STATUS_AUDITORIA1(<?php echo $row["02SUBETUFACTURAid"]; ?>)" <?php if($row["STATUS_AUDITORIA1"]=='si'){
	echo "checked";
}
$colspan += 1; ?>/>

</td>


<td style="text-align:center; background:<?php if($row["STATUS_FINANZAS"]=='si'){?> #ceffcc; <?php }else{?>#e9d8ee; <?php }?>" id="color_FINANZAS<?php echo $row["02SUBETUFACTURAid"]; ?>" >

<input type="checkbox" style="width:30PX;" class="form-check-input" id="STATUS_FINANZAS<?php echo $row["02SUBETUFACTURAid"]; ?>"  name="STATUS_FINANZAS<?php echo $row["02SUBETUFACTURAid"]; ?>" value="<?php echo $row["02SUBETUFACTURAid"]; ?>" onclick="STATUS_FINANZAS(<?php echo $row["02SUBETUFACTURAid"]; ?>)" <?php if($row["STATUS_FINANZAS"]=='si'){
	echo "checked";
}
$colspan += 1; ?>/>

</td>

<td style="text-align:center; background:<?php if($row["STATUS_DE_PAGO"]!='PAGADO'){?> #e9d8ee;<?php }else{?> #ceffcc; <?php }?>" id="color_pagado1a<?php echo $row["02SUBETUFACTURAid"]; ?>" >

<input type="checkbox" style="width:30PX;" class="form-check-input" id="pasarpagado1a<?php echo $row["02SUBETUFACTURAid"]; ?>" name="pasarpagado1a<?php echo $row["02SUBETUFACTURAid"]; ?>" value="<?php echo $row["02SUBETUFACTURAid"]; ?>"  onclick="pasarpagado2(<?php echo $row["02SUBETUFACTURAid"]; ?>)"  <?php if($row["STATUS_DE_PAGO"]=='PAGADO'){
	echo "checked";
}
$colspan += 1; ?>/>

</td>
<td style="text-align:center; background:<?php if($row["STATUS_AUDITORIA2"]=='si'){?>  #ceffcc; <?php }else{?> #e9d8ee; <?php }?>" id="color_AUDITORIA2<?php echo $row["02SUBETUFACTURAid"]; ?>" >
<!--
//STATUS_RESPONSABLE_EVENTO
//STATUS_AUDITORIA1
//STATUS_AUDITORIA2
//STATUS_FINANZAS -->
<input type="checkbox" style="width:30PX;" class="form-check-input" id="STATUS_AUDITORIA2<?php echo $row["02SUBETUFACTURAid"]; ?>"  name="STATUS_AUDITORIA2<?php echo $row["02SUBETUFACTURAid"]; ?>" value="<?php echo $row["02SUBETUFACTURAid"]; ?>" onclick="STATUS_AUDITORIA2(<?php echo $row["02SUBETUFACTURAid"]; ?>)" <?php if($row["STATUS_AUDITORIA2"]=='si'){
	echo "checked";
}
$colspan += 1; ?>/>

</td>

<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $ADJUNTAR_FACTURA_XML; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $ADJUNTAR_FACTURA_PDF; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['NUMERO_CONSECUTIVO_PROVEE'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['NOMBRE_COMERCIAL'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['RAZON_SOCIAL'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['RFC_PROVEEDOR'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['NUMERO_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['NOMBRE_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MOTIVO_GASTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['MOTIVO_GASTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CONCEPTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $colspan += 1; echo $row['CONCEPTO_PROVEE'];?></td>
<?php } ?>


<?php $colspan2 = $colspan; ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php 
		$totales = 'si';
echo  number_format($row['MONTO_TOTAL_COTIZACION_ADEUDO'],2,'.',',');
$MONTO_TOTAL_COTIZACION_ADEUDO12 += $row['MONTO_TOTAL_COTIZACION_ADEUDO'];
 $colspan2 += 1;
?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MONTO_FACTURA'],2,'.',',');
$MONTO_FACTURA12 += $row['MONTO_FACTURA'];
 $colspan2 += 1;
?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MONTO_PROPINA'],2,'.',',');
$MONTO_PROPINA12 += $row['MONTO_PROPINA'];
 $colspan2 += 1;
 ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MONTO_DEPOSITAR'],2,'.',',');
$MONTO_DEPOSITAR12 += $row['MONTO_DEPOSITAR'];
 $colspan2 += 1;
?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php 
		$totales = 'si';
echo number_format($row['MONTO_DEPOSITADO'],2,'.',',');

$idrelacion['idrelacion'][$row['02SUBETUFACTURAid']]=$row['02SUBETUFACTURAid'];
$idactual = $row['02SUBETUFACTURAid'];
$gran_total = $database->getTotalAmaunt2($row['RFC_PROVEEDOR']);
$gran_totalid = $database->getTotalAmaunt2id($row['RFC_PROVEEDOR'],$idrelacion,$idactual);
$gran_total2 = $gran_totalid + $gran_total;
$MONTO_DEPOSITADO12 += $row['MONTO_DEPOSITADO'];
$colspan2 += 1;
?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"PENDIENTE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php 
		$totales = 'si';
echo number_format($gran_total2,2,'.',','); 

$PENDIENTE_PAGO12 += $gran_total2;
 $colspan2 += 1;
?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['TIPO_DE_MONEDA']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PFORMADE_PAGO']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_DE_PAGO']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_A_DEPOSITAR']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['STATUS_DE_PAGO']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $ADJUNTAR_COTIZACION;  $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CONPROBANTE_TRANSFERENCIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $CONPROBANTE_TRANSFERENCIA;  $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['ACTIVO_FIJO']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['GASTO_FIJO']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAGAR_CADA']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_PPAGO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_TPROGRAPAGO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NUMERO_EVENTOFIJO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CLASI_GENERAL']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['SUB_GENERAL']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NUMERO_EVENTO1']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CLASIFICACION_GENERAL']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CLASIFICACION_ESPECIFICA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CLASIFICACION_ESPECIFICA']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PLACAS_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PLACAS_VEHICULO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $COMPLEMENTOS_PAGO_PDF;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"COMPLEMENTOS_PAGO_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $COMPLEMENTOS_PAGO_XML;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $CANCELACIONES_PDF;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CANCELACIONES_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $CANCELACIONES_XML;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_PDF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $ADJUNTAR_FACTURA_DE_COMISION_PDF;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_FACTURA_DE_COMISION_XML",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $ADJUNTAR_FACTURA_DE_COMISION_XML;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CALCULO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $CALCULO_DE_COMISION;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MONTO_DE_COMISION']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"COMPROBANTE_DE_DEVOLUCION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $COMPROBANTE_DE_DEVOLUCION;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOTA_DE_CREDITO_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $NOTA_DE_CREDITO_COMPRA;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['POLIZA_NUMERO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_DEL_EJECUTIVO']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FOTO_ESTADO_PROVEE11",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $FOTO_ESTADO_PROVEE11;  $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OBSERVACIONES_1']; $colspan2 += 1; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ADJUNTAR_ARCHIVO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $ADJUNTAR_ARCHIVO_1;  $colspan2 += 1; ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"S><?php echo $row['FECHA_DE_LLENADO']; $colspan2 += 1; ?></td>
<?php } ?>





















<?php /*INICIA copiar y PEGAR XML*/ ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['nombreR'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"RFC_RECEPTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['rfcR'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"REGIMEN_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['regimenE'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"UUID",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['UUID'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FOLIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php  echo $row['folio'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"SERIE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['serie'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"CLAVE_UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['ClaveUnidadConcepto'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo number_format($row['CantidadConcepto'],2,'.',',');
	 $colspan2 += 1;
	 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"CLAVE_PODUCTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['ClaveProdServConcepto'];
	 $colspan2 += 1;
	 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"DESCRIPCION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo ''. $row['DescripcionConcepto'];
 $colspan2 += 1;
 ?></td>
<?php } ?>




<!--
<?php  if($database->plantilla_filtro($nombreTabla,"IMPORTE_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['ImporteConcepto'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"UNIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['UnidadConcepto'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"VALOR_UNITARIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['ValorUnitarioConcepto'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"BASE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['BASE'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"IMPUESTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['IMPUESTO'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"TASA_CUOTA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['TASA_CUOTA'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_FACTOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['TIPO_FACTOR'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['IVA'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"IVA_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['IVA_RETENIDO'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"ISR_RETENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['ISR_RETENIDO'];
	 //$colspan2 += 1;
	 ?></td>
<?php } ?>

-->





<?php  if($database->plantilla_filtro($nombreTabla,"MonedaF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['Moneda']; $colspan2 += 1;?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_CAMBIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo number_format($row['TipoCambio'],2,'.',','); $colspan2 += 1;?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"USO_CFDI",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['UsoCFDI']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"metodoDePago",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php  echo $row['metodoDePago']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CONDICIONES_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php  echo $row['condicionesDePago']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_COMPROBANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['tipoDeComprobante']; $colspan2 += 1;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"VERSION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['Version']; $colspan2 += 1;?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_TIMBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo $row['fechaTimbrado']; $colspan2 += 1;?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"SUBTOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php 
	echo number_format($row['subTotal'],2,'.',',');
	$subTotal12 += $row['subTotal'];
	$totales2 = 'si';
	 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"DESCUENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php 
	echo number_format($row['DESCUENTO'],2,'.',',');
	$DESCUENTO12 += $row['DESCUENTO'];
	$totales2 = 'si';
	 ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_TRASLADADOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php 
	echo number_format($row['TImpuestosTrasladados'],2,'.',',');
	$TImpuestosTrasladados12 += $row['TImpuestosTrasladados'];
	$totales2 = 'si';
	?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_RETENIDOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo number_format($row['TImpuestosRetenidos'],2,'.',',');
	$TImpuestosRetenidos12 += $row['TImpuestosRetenidos'];
	$totales2 = 'si';
	?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"total",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="text-align:center"><?php echo  number_format($row['totalf'],2,'.',',');
	$totalf12 += $row['totalf'];
	$totales2 = 'si';
	?></td>
<?php } ?>

<?php 
if($row['TUA'] == 0 AND $row['TuaTotalCargos']==0 ){
	$TUA = ''; $TuaTotalCargos = '';
}ELSE{
$TUA = number_format($row['TUA'],2,'.',','); 
$TuaTotalCargos = number_format($row['TuaTotalCargos'],2,'.',',');
}

?>
    <td style="text-align:center"><?php echo $TUA;
		$TUA12 += $row['TUA'];
	?></td>

    <td style="text-align:center"><?php echo $TuaTotalCargos;

	$TuaTotalCargos12 += $row['TuaTotalCargos'];
	?></td>
<?php /*FIN copiar y PEGAR XML*/ ?>

    <td style="text-align:center"><?php 
	if( strlen($row['UUID'])<1){
		echo number_format($row['MONTO_DEPOSITAR'] * 1.46 ,2,'.',',');
		$PorfaltaDeFactura12 += $row['MONTO_DEPOSITAR'] * 1.46 ;
	}
		?></td>
		
		
		
		
		
		
		
		
		
		
		




<?php /*termina copiar y terminaA5*/ ?>
<td>
<?php if($database->variablespermisos('','PAGO_PROVEEDOR1','modificar')=='si'){ ?>

<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["02SUBETUFACTURAid"]; ?>" class="btn btn-info btn-xs view_dataPAGOPROVEEmodifica" /><?php } ?></td>
<td><?php if($database->variablespermisos('','PAGO_PROVEEDOR1','borrar')=='si'){ ?>


<input type="button" name="view2" value="BORRAR" id="<?php echo $row["02SUBETUFACTURAid"]; ?>" class="btn btn-info btn-xs view_dataSBborrar" />
<?php } ?></td>			
		</tr>
			<?php
			$finales++;
		}	
	?>

<tr>

<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan="<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_TOTAL_COTIZACION_ADEUDO12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_FACTURA12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($MONTO_PROPINA12,2,'.',','); ?></strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_DEPOSITAR12,2,'.',','); ?></strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITADO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_DEPOSITADO12,2,'.',','); ?></strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"PENDIENTE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($PENDIENTE_PAGO12,2,'.',','); ?></strong></td>
<?php } ?>




</tr>		

<tr>


<?php if($totales2 == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan="<?php echo $colspan2; ?>"><strong style="font-size:16px">TOTALES XML</strong></td>
<?php } ?>



<?php if($database->plantilla_filtro($nombreTabla,"SUBTOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($subTotal12,2,'.',','); ?></strong></td>
<?php } ?>



<?php if($database->plantilla_filtro($nombreTabla,"DESCUENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($DESCUENTO12,2,'.',','); ?></strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_TRASLADADOS",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($TImpuestosTrasladados12,2,'.',','); ?></strong></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"TOTAL_IMPUESTOS_RETENIDOS",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($TImpuestosRetenidos12,2,'.',','); ?></strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"total",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($totalf12,2,'.',','); ?></strong></td>
<?php } ?>

<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($TUA12,2,'.',','); ?></strong></td>


<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($TuaTotalCargos12,2,'.',','); ?></strong></td>

<td style="text-align:center" ><strong style="font-size:16px" >$<?php echo number_format($PorfaltaDeFactura12,2,'.',','); ?></strong></td>

</tr>	

		</tbody>
		</table>
		</div>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
