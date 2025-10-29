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

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";
	$tables="10tiketsavion";
	

$NUMERO_CONSECUTIVO_PROVEE = isset($_POST["NUMERO_CONSECUTIVO_PROVEE"])?$_POST["NUMERO_CONSECUTIVO_PROVEE"]:""; 
$RAZON_SOCIAL = isset($_POST["RAZON_SOCIAL"])?$_POST["RAZON_SOCIAL"]:""; 
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
$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"])?$_POST["OBSERVACIONES_1"]:""; 
$FECHA_DE_LLENADO = isset($_POST["FECHA_DE_LLENADO"])?$_POST["FECHA_DE_LLENADO"]:""; 
$hiddenTIKETS1QA = isset($_POST["hiddenTIKETS1QA"])?$_POST["hiddenTIKETS1QA"]:""; 
$tipo_documento = isset($_POST["tipo_documento"])?$_POST["tipo_documento"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"NUMERO_CONSECUTIVO_PROVEE"=>$NUMERO_CONSECUTIVO_PROVEE,
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
"TIPO_DE_MONEDA"=>$TIPO_DE_MONEDA,
"PFORMADE_PAGO"=>$PFORMADE_PAGO,
"FECHA_A_DEPOSITAR"=>$FECHA_A_DEPOSITAR,
"STATUS_DE_PAGO"=>$STATUS_DE_PAGO,
"BANCO_ORIGEN"=>$BANCO_ORIGEN,
"ACTIVO_FIJO"=>$ACTIVO_FIJO,
"GASTO_FIJO"=>$GASTO_FIJO,
"PAGAR_CADA"=>$PAGAR_CADA,
"FECHA_PPAGO"=>$FECHA_PPAGO,
"FECHA_TPROGRAPAGO"=>$FECHA_TPROGRAPAGO,
"NUMERO_EVENTOFIJO"=>$NUMERO_EVENTOFIJO,
"CLASI_GENERAL"=>$CLASI_GENERAL,
"SUB_GENERAL"=>$SUB_GENERAL,
"MONTO_DE_COMISION"=>$MONTO_DE_COMISION,
"POLIZA_NUMERO"=>$POLIZA_NUMERO,
"NOMBRE_DEL_EJECUTIVO"=>$NOMBRE_DEL_EJECUTIVO,
"OBSERVACIONES_1"=>$OBSERVACIONES_1,
"FECHA_DE_LLENADO"=>$FECHA_DE_LLENADO,
"hiddenTIKETS1QA"=>$hiddenTIKETS1QA,
"tipo_documento"=>$tipo_documento,

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
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NUMERO CONSECUTIVO PROVEE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">RAZON SOCIAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">RFC PROVEEDOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NUMERO EVENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE EVENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MOTIVO_GASTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MOTIVO GASTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CONCEPTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">CONCEPTO PROVEE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO TOTAL COTIZACION ADEUDO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO FACTURA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO PROPINA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO DEPOSITAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">TIPO DE MONEDA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">PFORMADE PAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA A DEPOSITAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">STATUS DE PAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"BANCO_ORIGEN",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">BANCO ORIGEN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">ACTIVO FIJO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">GASTO FIJO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">PAGAR CADA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA PPAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA TPROGRAPAGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NUMERO EVENTOFIJO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">CLASI GENERAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">SUB GENERAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO DE COMISION</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">POLIZA NUMERO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE DEL EJECUTIVO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">OBSERVACIONES 1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA DE LLENADO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"hiddenTIKETS1QA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">hiddenTIKETS1QA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"tipo_documento",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">tipo documento</th>
<?php } ?>

<?php /*termina copiar y terminaA3*/ ?>
            </tr>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            <tr>
<td style="background:#c9e8e8"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_CONSECUTIVO_PROVEE_1" value="<?php 
echo $NUMERO_CONSECUTIVO_PROVEE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="RAZON_SOCIAL_1" value="<?php 
echo $RAZON_SOCIAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="RFC_PROVEEDOR_1" value="<?php 
echo $RFC_PROVEEDOR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_EVENTO_1" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_EVENTO_1" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
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
if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_FACTURA_1" value="<?php 
echo $MONTO_FACTURA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_PROPINA_1" value="<?php 
echo $MONTO_PROPINA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_DEPOSITAR_1" value="<?php 
echo $MONTO_DEPOSITAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="TIPO_DE_MONEDA_1" value="<?php 
echo $TIPO_DE_MONEDA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PFORMADE_PAGO_1" value="<?php 
echo $PFORMADE_PAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_A_DEPOSITAR_1" value="<?php 
echo $FECHA_A_DEPOSITAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="STATUS_DE_PAGO_1" value="<?php 
echo $STATUS_DE_PAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"BANCO_ORIGEN",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="BANCO_ORIGEN_1" value="<?php 
echo $BANCO_ORIGEN; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="ACTIVO_FIJO_1" value="<?php 
echo $ACTIVO_FIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="GASTO_FIJO_1" value="<?php 
echo $GASTO_FIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PAGAR_CADA_1" value="<?php 
echo $PAGAR_CADA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_PPAGO_1" value="<?php 
echo $FECHA_PPAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_TPROGRAPAGO_1" value="<?php 
echo $FECHA_TPROGRAPAGO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_EVENTOFIJO_1" value="<?php 
echo $NUMERO_EVENTOFIJO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="CLASI_GENERAL_1" value="<?php 
echo $CLASI_GENERAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="SUB_GENERAL_1" value="<?php 
echo $SUB_GENERAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_DE_COMISION_1" value="<?php 
echo $MONTO_DE_COMISION; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="POLIZA_NUMERO_1" value="<?php 
echo $POLIZA_NUMERO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_DEL_EJECUTIVO_1" value="<?php 
echo $NOMBRE_DEL_EJECUTIVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="OBSERVACIONES_1_1" value="<?php 
echo $OBSERVACIONES_1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_DE_LLENADO_1" value="<?php 
echo $FECHA_DE_LLENADO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"hiddenTIKETS1QA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="hiddenTIKETS1QA_1" value="<?php 
echo $hiddenTIKETS1QA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"tipo_documento",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="tipo_documento_1" value="<?php 
echo $tipo_documento; ?>"></td>
<?php } ?>













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
		foreach ($datos as $key=>$row){$colspan = 0;?>
		<tr>
<td><?php echo $row["id"];$colspan += 1;?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->

<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_CONSECUTIVO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NUMERO_CONSECUTIVO_PROVEE'];?></td>
<?php $colspan += 1; } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"RAZON_SOCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['RAZON_SOCIAL'];?></td>
<?php $colspan += 1; } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"RFC_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['RFC_PROVEEDOR'];?></td>
<?php $colspan += 1; } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NUMERO_EVENTO'];?></td>
<?php $colspan += 1;  } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NOMBRE_EVENTO'];?></td>
<?php $colspan += 1;  } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MOTIVO_GASTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['MOTIVO_GASTO'];?></td>
<?php $colspan += 1;  } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"CONCEPTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['CONCEPTO_PROVEE'];?></td>
<?php $colspan += 1;  } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){ 
		$totales = 'si';
$MONTO_TOTAL_COTIZACION_ADEUDO12 += $row['MONTO_TOTAL_COTIZACION_ADEUDO'];
?><td><?php echo $row['MONTO_TOTAL_COTIZACION_ADEUDO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){
		$totales = 'si';
$MONTO_FACTURA12 += $row['MONTO_FACTURA'];
	?><td><?php echo $row['MONTO_FACTURA'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){
		$totales = 'si';
$MONTO_PROPINA12 +=$row['MONTO_PROPINA'];
	?><td><?php echo $row['MONTO_PROPINA'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){
		$totales = 'si';
$MONTO_DEPOSITAR12 += $row['MONTO_DEPOSITAR'];
	?><td><?php echo $row['MONTO_DEPOSITAR'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_DE_MONEDA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['TIPO_DE_MONEDA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PFORMADE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['PFORMADE_PAGO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_A_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_A_DEPOSITAR'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"STATUS_DE_PAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['STATUS_DE_PAGO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"BANCO_ORIGEN",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['BANCO_ORIGEN'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"ACTIVO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['ACTIVO_FIJO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"GASTO_FIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['GASTO_FIJO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAGAR_CADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['PAGAR_CADA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_PPAGO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_TPROGRAPAGO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_TPROGRAPAGO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTOFIJO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NUMERO_EVENTOFIJO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"CLASI_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['CLASI_GENERAL'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"SUB_GENERAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['SUB_GENERAL'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MONTO_DE_COMISION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['MONTO_DE_COMISION'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"POLIZA_NUMERO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['POLIZA_NUMERO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_DEL_EJECUTIVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NOMBRE_DEL_EJECUTIVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['OBSERVACIONES_1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_DE_LLENADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_DE_LLENADO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"hiddenTIKETS1QA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['hiddenTIKETS1QA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"tipo_documento",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['tipo_documento'];?></td>
<?php } ?>
<?php /*termina copiar y terminaA5*/ ?>
			<td>
<?php if($database->variablespermisos('','ALTA_EVENTOS','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosmodifica" />			
<?php } ?>
			</td>
			<td>
<?php if($database->variablespermisos('','ALTA_EVENTOS','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosborrar" />
<?php } ?>
			</td>			
		</tr>

			<?php
			$finales++;
		}	
	?>
	
	
	
<tr>


<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan="<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_COTIZACION_ADEUDO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_TOTAL_COTIZACION_ADEUDO12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_FACTURA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($MONTO_FACTURA12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_PROPINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_PROPINA12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MONTO_DEPOSITAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MONTO_DEPOSITAR12,2,'.',','); ?></strong></td>
<?php } ?>
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
