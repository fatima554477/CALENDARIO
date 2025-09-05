
<?php

if (!isset($_SESSION)) {
    session_start();
}
$PorfaltaDeFacturaSession = isset($_SESSION['PorfaltaDeFactura12']) ? $_SESSION['PorfaltaDeFactura12'] : 0;
?>
<script>

function refreshSection() {
    const target = document.querySelector('#target31');
    target.innerHTML = '<div class="text-center"><div class="spinner-border text-primary"></div></div>';

    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.querySelector('#target31').innerHTML;
            target.innerHTML = newContent;
        });
}

// Verifica periódicamente si hay cambios en la tabla 02SUBETUFACTURA
function checkStatusUpdates() {
    fetch('check_status_checkbox.php')
        .then(response => response.json())
        .then(data => {
            if (window.lastStatusChecksum !== data.checksum) {
                window.lastStatusChecksum = data.checksum;
                refreshSection();
            }
        })
        .catch(console.error);
}

setInterval(checkStatusUpdates, 5000);

</script>

<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar31" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar31" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;CIERRE DEL EVENTO</p><div  id="mensajeRESUMEN"><div class="progress" style="width: 25%;">
									</div>
								</div></div></strong>
	<div id="target31" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">


	<table id="reset_totales"   class="table table-striped table-bordered" style="width:100%" >
	<tr ><td colspan="2" style="text-align: center;"><strong>RESUMEN DE INGRESOS SIN IMPUESTOS</strong></td></tr>


<?php 

		$con = $altaeventos->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		$variablequeryI = "select * from 04pagosingresos WHERE idRelacion = '".$session."' order by id desc ";
		$arrayqueryI = mysqli_query($con,$variablequeryI);
		while($rowIngreso = mysqli_fetch_array($arrayqueryI) ){
			if($rowIngreso['pagado'] == 'si'){
			$TOTAINGRESOS += $rowIngreso['OBSERVACIONES_INGRESOS'];
		}
		}
		
		
		
        $con = $altaeventos->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		$variablequeryI2 = "select * from 04pagoegresos WHERE idRelacion = '".$session."' order by id desc ";
		$arrayqueryI2 = mysqli_query($con,$variablequeryI2);
		while($rowIngreso2 = mysqli_fetch_array($arrayqueryI2) ){
			if($rowIngreso2['pagado'] == 'si'){
			$TOTAINGRESOS2 += $rowIngreso2['MONTO_OTRO'];
		}
		}
		
		
		
	

	$VarTikets = 'SELECT MONTO_TOTAL_COTIZACION_ADEUDO FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "TIKETS") and tipo_documento = "TIKETS" ';
	$QUERYTikets = mysqli_query($con,$VarTikets);
while($ROWt=mysqli_fetch_array($QUERYTikets)){
		$subTotalTikets += $ROWt['MONTO_TOTAL_COTIZACION_ADEUDO']  * 1.46 ;
}

	$VarTiketspropina = 'SELECT MONTO_FACTURA, MONTO_PROPINA FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "TIKETS") and tipo_documento = "TIKETS" ';
	$QUERYTiketsp = mysqli_query($con,$VarTiketspropina);
while($ROWtp=mysqli_fetch_array($QUERYTiketsp)){


		 $subTotalTiketspropina += $ROWtp['MONTO_PROPINA'] + $ROWtp['MONTO_FACTURA'];
	}




	$VarAvion = 'SELECT subTotal, UUID, MONTO_FACTURA,MONTO_PROPINA FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "AVION") and tipo_documento = "AVION" ';
	$QUERYAvion = mysqli_query($con,$VarAvion);
while($ROWa=mysqli_fetch_array($QUERYAvion)){	
	if( strlen($ROWa['UUID'])<1){
		 $subTotalAVION += $ROWa['MONTO_PROPINA'] + $ROWa['MONTO_FACTURA'];
	}
}

	$VarAvionpropina = 'SELECT MONTO_PROPINA FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "TIKETS") and tipo_documento = "TIKETS" ';
	$QUERYAvionp = mysqli_query($con,$VarAvionpropina);
while($ROWap=mysqli_fetch_array($QUERYAvionp)){
		$subTotalAVIONpropina += $ROWap['MONTO_PROPINA'] ;
}


$VarCOMPROBACION = 'SELECT subTotal, UUID, MONTO_DEPOSITAR, STATUS_CHECKBOX ,MONTO_FACTURA, Descuento
                    FROM 07COMPROBACION 
                    LEFT JOIN 07XML ON 07COMPROBACION.id = 07XML.`ultimo_id` 
                    WHERE 07COMPROBACION.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'"';
$QUERYCOMPROBACION = mysqli_query($con, $VarCOMPROBACION);

while($ROWd = mysqli_fetch_array($QUERYCOMPROBACION)){
    // Verificar si falta UUID o el checkbox es 'no' o null
if (($ROWd['STATUS_CHECKBOX'] =='no' ) && strlen(trim($ROWd['UUID'])) < 1) {
        $PorfaltaDeFacturaCOMPROBACION += $ROWd['MONTO_DEPOSITAR'] * 1.46;
    }     else {
  
        $descuento = (isset($ROWd['Descuento']) && is_numeric($ROWd['Descuento'])) ? $ROWd['Descuento'] : 0;
        if (isset($ROWd['subTotal']) && is_numeric($ROWd['subTotal']) && $ROWd['subTotal'] > 0) {
            $subTotalCOMPROBACION += $ROWd['subTotal'] - $descuento;
        } else {
            $subTotalCOMPROBACION += $ROWd['MONTO_FACTURA'] - $descuento;
        }
    }
}



	$VarCOMPROBACIONpropina = 'SELECT  MONTO_PROPINA, IMPUESTO_HOSPEDAJE, STATUS_CHECKBOX,UUID FROM 07COMPROBACION LEFT JOIN 07XML ON 07COMPROBACION.id = 07XML.`ultimo_id` where 07COMPROBACION.NUMERO_EVENTO ="'.$NUMERO_EVENTO.'" ';  
	$QUERYCOMPROBACIONP = mysqli_query($con,$VarCOMPROBACIONpropina);
	$subTotalCOMPROBACIONpropina = 0;
while($ROWCC = mysqli_fetch_array($QUERYCOMPROBACIONP)){
     if ($ROWCC['STATUS_CHECKBOX'] === 'si' || strlen(trim($ROWCC['UUID'])) > 0 ) {
			$montoPropina = $ROWCC['MONTO_PROPINA'] ?: 0;
            $impuesto = $ROWCC['IMPUESTO_HOSPEDAJE'] ?: 0;
            $subTotalCOMPROBACIONpropina += $montoPropina + $impuesto;
	}
	}
	


	






$VarSUBE = 'SELECT subTotal, UUID, MONTO_DEPOSITAR,ID_RELACIONADO, STATUS_CHECKBOX, MONTO_FACTURA, Descuento
    FROM 02SUBETUFACTURA 
    LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` 
  
    WHERE 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" 
    AND 02SUBETUFACTURA.VIATICOSOPRO IN (
        "REEMBOLSO", 
        "VIATICOS", 
        "PAGO A PROVEEDOR CON DOS O MAS FACTURAS",
        "PAGOS CON UNA SOLA FACTURA"
    ) AND 02SUBETUFACTURA.ID_RELACIONADO != ""';

$QUERYSUBE = mysqli_query($con, $VarSUBE);



while ($ROWe = mysqli_fetch_array($QUERYSUBE)) {
    // Verificar condiciones para factura faltante
    if ($ROWe['STATUS_CHECKBOX'] == 'no'  && strlen(trim($ROWe['UUID'])) < 1) {
        $PorfaltaDeFacturaSUBE += $ROWe['MONTO_DEPOSITAR'] * 1.46;
    }  

    else {
		  $descuento = (isset($ROWe['Descuento']) && is_numeric($ROWe['Descuento'])) ? $ROWe['Descuento'] : 0;
       
        if (isset($ROWe['subTotal']) && is_numeric($ROWe['subTotal']) && $ROWe['subTotal'] > 0) {
            $subTotalSUBETUFACTURA += $ROWe['subTotal'] - $descuento;
        } else {
            $subTotalSUBETUFACTURA += $ROWe['MONTO_FACTURA'] - $descuento;
        }
    }
}




/////////////////////////////////////////////nuevo///////////////////////////////////////////

$VarSUBERES = 'SELECT subTotal, UUID, MONTO_DEPOSITAR,NUMERO_CONSECUTIVO_PROVEE, STATUS_CHECKBOX, MONTO_FACTURA
    FROM 02SUBETUFACTURA 
    LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` 
  
    WHERE 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" 
    AND 02SUBETUFACTURA.VIATICOSOPRO IN (
        "REEMBOLSO", 
        "VIATICOS", 
        "PAGO A PROVEEDOR CON DOS O MAS FACTURAS",
        "PAGOS CON UNA SOLA FACTURA"
    ) AND 02SUBETUFACTURA.NUMERO_CONSECUTIVO_PROVEE != ""';

$QUERYSUBERES = mysqli_query($con, $VarSUBERES);



while ($ROWeR = mysqli_fetch_array($QUERYSUBERES)) {
    // Verificar condiciones para factura faltante
    if ($ROWeR['STATUS_CHECKBOX'] == 'no'  && strlen(trim($ROWeR['UUID'])) < 1) {
        $PorfaltaDeFacturaSUBERES += $ROWeR['MONTO_DEPOSITAR'] * 1.46;
    }  

    else {
       
        if (isset($ROWeR['subTotal']) && is_numeric($ROWeR['subTotal']) && $ROWeR['subTotal'] > 0) {
            $subTotalSUBETUFACTURARES += $ROWeR['subTotal'];
        } else {
            $subTotalSUBETUFACTURARES += $ROWeR['MONTO_FACTURA'];
        }
    }
}




$VarSUBE2 = 'SELECT subTotal, UUID, MONTO_DEPOSITAR ,STATUS_CHECKBOX ,MONTO_FACTURA, Descuento
            FROM 02SUBETUFACTURA 
            LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` 
            WHERE 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" 
            AND 02SUBETUFACTURA.VIATICOSOPRO = "PAGO A PROVEEDOR"'; // Nueva condición

$QUERYSUBE2 = mysqli_query($con, $VarSUBE2);

while ($ROWe2 = mysqli_fetch_array($QUERYSUBE2)) {   
    // Verificar condiciones para factura faltante
    if ($ROWe2['STATUS_CHECKBOX'] == 'no'  && strlen(trim($ROWe2['UUID'])) < 1) {
        $PorfaltaDeFacturaSUBE2 += $ROWe2['MONTO_DEPOSITAR'] * 1.46;
    } 

    else {
		$descuento = (isset($ROWe2['Descuento']) && is_numeric($ROWe2['Descuento'])) ? $ROWe2['Descuento'] : 0;
  
        if (isset($ROWe2['subTotal']) && is_numeric($ROWe2['subTotal']) && $ROWe2['subTotal'] > 0) {
            $subTotalSUBETUFACTURA2 += $ROWe2['subTotal']- $descuento;
        } else {
            $subTotalSUBETUFACTURA2 += $ROWe2['MONTO_FACTURA']- $descuento;
        }
    }
}



        $VarSUBEpropina = 'SELECT MONTO_PROPINA, IMPUESTO_HOSPEDAJE, STATUS_CHECKBOX, UUID FROM 02SUBETUFACTURA LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` where 02SUBETUFACTURA.NUMERO_EVENTO ="'.$NUMERO_EVENTO.'" AND 02SUBETUFACTURA.ID_RELACIONADO != ""';  // Condición para ID_RELACION lleno
        $QUERYSUBEP = mysqli_query($con,$VarSUBEpropina);
while($ROWep=mysqli_fetch_array($QUERYSUBEP)){
    if ($ROWep['STATUS_CHECKBOX'] === 'si' || strlen(trim($ROWep['UUID'])) > 0 ) {
                 $subTotalSUBETUFACTURApropina += $ROWep['MONTO_PROPINA'] + $ROWep['IMPUESTO_HOSPEDAJE'];
        }
        }




        $VarSUBEpropina2 = 'SELECT MONTO_PROPINA, IMPUESTO_HOSPEDAJE, STATUS_CHECKBOX, UUID FROM 02SUBETUFACTURA LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` where 02SUBETUFACTURA.NUMERO_EVENTO ="'.$NUMERO_EVENTO.'" AND 02SUBETUFACTURA.VIATICOSOPRO = "PAGO A PROVEEDOR"';
        $QUERYSUBEP2 = mysqli_query($con,$VarSUBEpropina2);
while($ROWep2=mysqli_fetch_array($QUERYSUBEP2)){
if ($ROWep2['STATUS_CHECKBOX'] === 'si' || strlen(trim($ROWep2['UUID'])) > 0) {
                 $subTotalSUBETUFACTURApropina2 += $ROWep2['MONTO_PROPINA'] + $ROWep2['IMPUESTO_HOSPEDAJE'];
        }
        }


	
	
	$VarVheiculo = 'SELECT VEHICULOSEVE_SUB, id FROM 04vehiculoevento where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYVheiculo = mysqli_query($con,$VarVheiculo);
	while($ROWVh=mysqli_fetch_array($QUERYVheiculo)){
		$subTotalVheiculo +=  $ROWVh['VEHICULOSEVE_SUB'];
	}

	$Varmaterialyequipo = 'SELECT MATERIAL_SUB, id FROM 04materialyequipo where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYmaterialyequipo = mysqli_query($con,$Varmaterialyequipo);
	while($ROWmaterial=mysqli_fetch_array($QUERYmaterialyequipo)){
		$subTotalmaterial +=  $ROWmaterial['MATERIAL_SUB'];
	}


	$Varpapeleria = 'SELECT PAPELERIA_SUB, id FROM 04papeleria where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYpapeleria = mysqli_query($con,$Varpapeleria);
	while($ROWpapeleria =mysqli_fetch_array($QUERYpapeleria)){
		$subTotapapeleria +=  $ROWpapeleria['PAPELERIA_SUB'];
	}

	$VarOFICINA = 'SELECT OFICINA_SUB, id FROM 04oficina where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYOFICINA = mysqli_query($con,$VarOFICINA);
	while($ROWOFICINA =mysqli_fetch_array($QUERYOFICINA)){
		$subTotaOFICINA +=  $ROWOFICINA['OFICINA_SUB'];
	}

	$VarBOTIQUIN = 'SELECT BOTIQUIN_SUB, id FROM 04botiquin where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYBOTIQUIN = mysqli_query($con,$VarBOTIQUIN);
	while($ROWBOTIQUIN =mysqli_fetch_array($QUERYBOTIQUIN)){
		$subTotaBOTIQUIN +=  $ROWBOTIQUIN['BOTIQUIN_SUB'];
	}

	$VarPERSONAL = 'SELECT VIATICOS_PERSONAL, id, MONTO_BONO_TOTAL FROM 04personal where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYPERSONAL = mysqli_query($con,$VarPERSONAL);
	while($ROWPERSONAL =mysqli_fetch_array($QUERYPERSONAL)){
		$subBONO_TOTAL +=  $ROWPERSONAL['MONTO_BONO_TOTAL'];
		$subVIATICOS_VIATICOS_PERSONAL +=  $ROWPERSONAL['VIATICOS_PERSONAL'];		
	}

	$VarPERSONAL2 = 'SELECT VIATICOS_PERSONAL2, MONTO_BONO_TOTAL1, id FROM 04personal2 where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYPERSONAL2 = mysqli_query($con,$VarPERSONAL2);
	while($ROWPERSONAL2 =mysqli_fetch_array($QUERYPERSONAL2)){
		$subBONO_TOTAL1 +=  $ROWPERSONAL2['MONTO_BONO_TOTAL1'];
		$subVIATICOS_PERSONAL2 +=  $ROWPERSONAL2['VIATICOS_PERSONAL2'];
	}




    $Varmontc = 'SELECT  MONTOC_TOTAL_EVENTO, id FROM 04altaeventos where id ="'.$_SESSION['idevento'].'" ';
	$QUERYMONTOC = mysqli_query($con,$Varmontc);
	while($ROWMONTOC =mysqli_fetch_array($QUERYMONTOC)){
		$subtotal_MONTOC =  $ROWMONTOC['MONTOC_TOTAL_EVENTO'];
	}

    $VarAVISIVA	= 'SELECT  TOTAL_AVION_SINIVA, id FROM 04altaeventos where id ="'.$_SESSION['idevento'].'" ';
	$QUERYAVISIVA = mysqli_query($con,$VarAVISIVA);
	while($ROWAVISIVA =mysqli_fetch_array($QUERYAVISIVA)){
		$subtotal_AVIONSINIVA =  $ROWAVISIVA['TOTAL_AVION_SINIVA'];
	}
	
    $VarmontI = 'SELECT  CANTIDAD_PORCENTAJEV, id FROM 04altaeventos where id ="'.$_SESSION['idevento'].'" ';
	$QUERYMONTOI = mysqli_query($con,$VarmontI);
	while($ROWMONTOI =mysqli_fetch_array($QUERYMONTOI)){
		$subtotal_MONTOSINIVA =  $ROWMONTOI['CANTIDAD_PORCENTAJEV'];
	}
	
	

    $Varmonedas = 'SELECT  MONEDAS, id FROM 04altaeventos where id ="'.$_SESSION['idevento'].'" ';
	$QUERYMONEDAS = mysqli_query($con,$Varmonedas);
	while($ROWMONEDAS =mysqli_fetch_array($QUERYMONEDAS)){
		$subtotal_MONEDAS =  $ROWMONEDAS['MONEDAS'];
	}
	
	

$subBONOtotal1 = $subBONO_TOTAL+$subBONO_TOTAL1;
$subVIATICOtotal1 = $subVIATICOS_VIATICOS_PERSONAL+$subVIATICOS_PERSONAL2;
$GTOTALBONO_VIATICO = $subBONOtotal1 + $subVIATICOtotal1;

	$Varporcentajevenvedor = 'SELECT * FROM 04porcentajevenvedor where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYVarporcentajevenvedor = mysqli_query($con,$Varporcentajevenvedor);
	while($ROWVporcj=mysqli_fetch_array($QUERYVarporcentajevenvedor)){
	$PorcentajevenDedor1 =  $ROWVporcj['ADJUNTO_PORVENDEDOR'];	
	$PorcentajevenDedor2 +=  $ROWVporcj['ADJUNTO_PORVENDEDOR'];
	}
	
	
$diferenciaPorFaltaDeFactura = $PorfaltaDeFacturaSUBERES - $PorfaltaDeFacturaSUBE;
$diferenciaSubTotal = $subTotalSUBETUFACTURARES - $subTotalSUBETUFACTURA;
$INGRESOS = $TOTAINGRESOS + $TOTAINGRESOS2;
$subTotalPROPINAOSERVICIO = $subTotalTiketspropina + $subTotalAVIONpropina + $subTotalCOMPROBACIONpropina +$subTotalSUBETUFACTURApropina + $subTotalSUBETUFACTURApropina2;

$PorfaltaDeFactura = $PorfaltaDeFacturaSession > 0
    ? $PorfaltaDeFacturaSession
    : ($PorfaltaDeFacturaCOMPROBACION + $PorfaltaDeFacturaSession);
$GTotalAvioComSube = $subTotalAVION + $subTotalCOMPROBACION + $subTotalSUBETUFACTURA + $subTotalSUBETUFACTURA2 +  $subTotalTikets+ $subTotalPROPINAOSERVICIO + $PorfaltaDeFactura+$subTotalVheiculo+$subTotalmaterial+$subTotapapeleria+$subTotaOFICINA+$subTotaBOTIQUIN+$subPERSONALtotal+$GTOTALBONO_VIATICO + $diferenciaSubTotal;


$utilidad = $INGRESOS - ($GTotalAvioComSube ); 
$PorUtilidad = ($utilidad * 100)/$INGRESOS;
$comisionVendedor =  ($utilidad ) * ($PorcentajevenDedor2  * 0.01);
$PorcentajeComisionVendedor = ($comisionVendedor *100)/ $INGRESOS;
$utilidadEmpresa = $utilidad -  $comisionVendedor;
$utilidadFinal = ($utilidadEmpresa * 100)/$INGRESOS;
$subtotal_SINIVA = $subtotal_AVIONSINIVA + $subtotal_MONTOSINIVA ;
?>



<tr  style="background:#c9e8e8">
<th style="width:50%">CONCEPTO</th>
<th style="width:50%" >MONTO</th>
</tr>




<tr style='background:#f5f9fc;text-align:left'> 

<td>MONEDA O DIVISA</td>
<td><?php echo ($subtotal_MONEDAS); ?></td>
</tr>
<tr style='background:#f5f9fc;text-align:left'> 

<td  >INGRESOS SIN IMPUESTOS</td>
<td  >$ <?php echo number_format($TOTAINGRESOS ,2,'.',','); ?></td>
</tr>

<tr style='background:#f5f9fc;text-align:left'>
<td  >OTROS INGRESOS SIN IMPUESTOS</td>
<td  >$ <?php echo number_format($TOTAINGRESOS2 ,2,'.',','); ?></td>
</tr>	

<tr style='background:#f5f9fc;text-align:left'>
<td  >MONTO TOTAL COTIZADO
DEL EVENTO SIN IMPUESTOS Y SIN BOLETOS <a style="color:red;font:12px">&nbsp;(INFORMATIVO)</a></td>
<td  >$ <?php echo number_format($subtotal_MONTOSINIVA ,2,'.',','); ?></td>
</tr>
<tr style='background:#f5f9fc;text-align:left'>
<td  >MONTO TOTAL DE
BOLETOS DE AVION SIN IMPUESTOS  <a style="color:red;font:12px">&nbsp;(INFORMATIVO)</a></td>
<td  >$ <?php echo number_format($subtotal_AVIONSINIVA ,2,'.',','); ?></td>
</tr>
 <tr style='background:#f5f9fc;text-align:left'>
<td  >MONTO TOTAL DEL
EVENTO SIN IMPUESTOS  <a style="color:red;font:12px">&nbsp;(INFORMATIVO)</a></td>
<td  >$ <?php echo number_format($subtotal_SINIVA ,2,'.',','); ?></td>
</tr>




		
<tr style='background:#f5f9fc;text-align:left'>
<!--<td  >EGRESOS</td>

<td> 

<table border=1>-->
<tr><td COLSPAN=2  style="background:#efdcf0;text-align:center;">EGRESOS</td></tr>


<tr>
<td style="background:#efdcf0;text-align:right;">COMPROBACION DE GASTOS</td>
<td style="background:#efdcf0">  <?php ECHO '$ '. number_format($subTotalCOMPROBACION,2,'.',','); ?></td>
</tr>

<tr>
    <td style="background:#efdcf0;text-align:right;">PAGO A PROVEEDORES</td>
    <td style="background:#efdcf0"><?php 
        $total = $subTotalSUBETUFACTURA + $subTotalSUBETUFACTURA2 ;
        echo '$ ' . number_format($total , 2, '.', ','); 
    ?></td>
</tr>
                                                                                

<tr>
<td style="background:#efdcf0;text-align:right;">SERVICIO O PROPINA  MAS IMPUESTO <br>SOBRE HOSPEDAJE , IMPUESTO DE SANEAMIENTO</td>

    <td style="background:#efdcf0"><?php 
        $totalPROPIS = $subTotalPROPINAOSERVICIO;
        echo '$ ' . number_format($totalPROPIS, 2, '.', ','); 
    ?></td>
</tr>



<tr>
<td style="background:#efdcf0;text-align:right;">TIKETS</td>
<td style="background:#efdcf0">  <?php ECHO '$ '. number_format($subTotalTikets,2,'.',','); ?></td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">BOLETOS DE AVIÓN</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotalAVION,2,'.',','); ?>
</td>
</tr>

<!--NO ESTÁ INTEGRADOS-->
<tr>
<td style="background:#efdcf0;text-align:right;">VEHÍCULOS</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotalVheiculo,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">MATERIAL Y EQUIPO DE BODEGA</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotalmaterial,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">PAPELERÍA</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotapapeleria,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">EQUIPO DE OFICINA</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotaOFICINA,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">BOTIQUÍN DE PRIMEROS AUXILIOS</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subTotaBOTIQUIN,2,'.',','); ?>
</td>
</tr>

<tr>
<td  style="background:#efdcf0;text-align:right;">MENSAJERÍAS</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format(0.00,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">BONOS</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subBONOtotal1,2,'.',','); ?>
</td>
</tr>

<tr>
<td style="background:#efdcf0;text-align:right;">VIATICOS</td>
<td style="background:#efdcf0"> <?php ECHO '$ '. number_format($subVIATICOtotal1,2,'.',','); ?>
</td>
</tr>
<!--AQUI TERMINA INTEGRADOS-->


<tr>
  <td style="background:#efdcf0;text-align:right;">46% PERDIDA DE COSTO FISCAL</td>
  <td style="background:#efdcf0">
    <?php 
      $totalPerdida = (float)$PorfaltaDeFactura + (float)$PorfaltaDeFacturaCOMPROBACION;
      echo '$ ' . number_format($totalPerdida, 2, '.', ','); 
    ?>
  </td>
</tr>


<tr>
<td style="background:#efdcf0;text-align:right;">--</td>   

<td style="background:#efdcf0">  <?php ECHO '-- '; ?></td>
</tr>
<tr>
<td style="background:#f5c691;text-align:right;">TOTAL EGRESOS</td>
<td style="background:#f5c691">  <?php ECHO '$ '. number_format($GTotalAvioComSube,2,'.',','); ?></td>
</tr>
<tr>
<td style="background:#91f5ab;text-align:right;">TOTAL INGRESOS </td>
<td style="background:#91f5ab">  <?php ECHO '$ '. number_format($INGRESOS,2,'.',','); ?></td>
</tr>


<tr>
<td style="background:#DAF7A6;text-align:right;">UTILIDAD</td>
<td style="background:#DAF7A6">  <?php ECHO '$ '. number_format($utilidad,2,'.',','); ?></td>
</tr>







</tr>

<tr style='background:#e0e4f4;text-align:left'>
<td  >% UTILIDAD</td>
<td  ><?php echo number_format($PorUtilidad,2,'.',','); ?>%</td>
</tr>



<tr style='background:#f5f9fc;text-align:left'>
<td  >COMISIÓN DEL VENDEDOR</td>
<td  >$ <?php echo number_format($comisionVendedor,2,'.',','); ?></td>
</tr>


<!--<tr style='background:#f5f9fc;text-align:left'>
<td  >% COMISIÓN DEL VENDEDOR</td>
<td  ><?php echo number_format($PorcentajeComisionVendedor,2,'.',','); ?>%</td>
</tr>-->


<tr style='background:#e0e4f4;text-align:left'>
<td  >UTILIDAD EMPRESA</td>
<td  >$ <?php echo number_format($utilidadEmpresa,2,'.',','); ?></td>
</tr>


<tr style='background:#DAF7A6;text-align:left'>
<td  >% UTILIDAD FINAL EMPRESA</td>
<td  ><?php echo number_format($utilidadFinal,2,'.',','); ?>%</td>
</tr>

	
	</table>	<button onclick="refreshSection()" class="btn btn-sm btn-primary" style="float:right;border-radius: 20px;">
    <i class="fas fa-sync-alt"></i> ACTUALIZAR
</button>
			</div> 
		</div>
	</div>
