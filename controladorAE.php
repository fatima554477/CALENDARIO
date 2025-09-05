<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023
FECHA sandor: 
FECHA fatima: 01 JUNIO  2025     
*/
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/calendariodeeventos2/class.epcinnAE.php");

$altaeventos  = NEW accesoclase();
$conexion = NEW colaboradores();
$var_INICIALES = $altaeventos->var_altaeventos();
$var_INICIALES['iniciales_evento'];

$hALTAEVENTOS = isset($_POST["hALTAEVENTOS"])?$_POST["hALTAEVENTOS"]:"";
$enviaraltaeventos = isset($_POST["enviaraltaeventos"])?$_POST["enviaraltaeventos"]:"";
$borraraltaeventos = isset($_POST["borraraltaeventos"])?$_POST["borraraltaeventos"]:"";   
$borrafoto = isset($_POST["borrafoto"])?$_POST["borrafoto"]:"";	
$hnumeroevento = isset($_POST["hnumeroevento"])?$_POST["hnumeroevento"]:"";
$enviarnumeroE = isset($_POST["enviarnumeroE"])?$_POST["enviarnumeroE"]:"";
$busqueda = isset($_POST["busqueda"])?$_POST["busqueda"]:"";


$hCIERRE = isset($_POST["hCIERRE"])?$_POST["hCIERRE"]:"";                              
$enviarCIERRE = isset($_POST["enviarCIERRE"])?$_POST["enviarCIERRE"]:"";
$borraCIERRE = isset($_POST["borraCIERRE"])?$_POST["borraCIERRE"]:"";
$hnuevodocucierre = isset($_POST["hnuevodocucierre"])?$_POST["hnuevodocucierre"]:"";	
$enviarCIERRENUEVO = isset($_POST["enviarCIERRENUEVO"])?$_POST["enviarCIERRENUEVO"]:"";	
$BORRAREGISTRO_cierrenuevo = isset($_POST["BORRAREGISTRO_cierrenuevo"])?$_POST["BORRAREGISTRO_cierrenuevo"]:"";
$INICIALES_EMPRESA_EVENTO1 = isset($_POST["INICIALES_EMPRESA_EVENTO1"])?$_POST["INICIALES_EMPRESA_EVENTO1"]:"";
$IPCIERRE2 = isset($_POST["IPCIERRE2"])?$_POST["IPCIERRE2"]:"";
$hPROGRAMAOPERATIVO = isset($_POST["hPROGRAMAOPERATIVO"])?$_POST["hPROGRAMAOPERATIVO"]:"";
$ipPROGRAMAOPERATIVO = isset($_POST["ipPROGRAMAOPERATIVO"])?$_POST["ipPROGRAMAOPERATIVO"]:"";
$enviarOPERATIVO = isset($_POST["enviarOPERATIVO"])?$_POST["enviarOPERATIVO"]:"";
$borraOPERATIVO = isset($_POST["borraOPERATIVO"])?$_POST["borraOPERATIVO"]:"";
$ipROOMINGLISTOV = isset($_POST["ipROOMINGLISTOV"])?$_POST["ipROOMINGLISTOV"]:"";
$hROOMING = isset($_POST["hROOMING"])?$_POST["hROOMING"]:"";
$borraROOMING = isset($_POST["borraROOMING"])?$_POST["borraROOMING"]:"";
$enviarROOMINGLISTOV = isset($_POST["enviarROOMINGLISTOV"])?$_POST["enviarROOMINGLISTOV"]:"";
$hCRONOTERRESTRE = isset($_POST["hCRONOTERRESTRE"])?$_POST["hCRONOTERRESTRE"]:"";
$hCRONOVUELOS1 = isset($_POST["hCRONOVUELOS1"])?$_POST["hCRONOVUELOS1"]:"";
$enviarCRONOSVUELOS = isset($_POST["enviarCRONOSVUELOS"])?$_POST["enviarCRONOSVUELOS"]:"";$borra_CRONOSV = isset($_POST["borra_CRONOSV"])?$_POST["borra_CRONOSV"]:""; 
$enviarcronoterre = isset($_POST["enviarcronoterre"])?$_POST["enviarcronoterre"]:"";$borra_CRONOSTERRRE = isset($_POST["borra_CRONOSTERRRE"])?$_POST["borra_CRONOSTERRRE"]:""; 
$hCOBROSCLIENTE = isset($_POST["hCOBROSCLIENTE"])?$_POST["hCOBROSCLIENTE"]:""; 
$enviarcobroscliente = isset($_POST["enviarcobroscliente"])?$_POST["enviarcobroscliente"]:""; 
$borra_COBROSCLIENTE = isset($_POST["borra_COBROSCLIENTE"])?$_POST["borra_COBROSCLIENTE"]:""; 
$EMAIL_CRNO_VUELOS = isset($_POST["EMAIL_CRNO_VUELOS"])?$_POST["EMAIL_CRNO_VUELOS"]:"";
$EMAIL_COBROS_CLIENTES = isset($_POST["EMAIL_COBROS_CLIENTES"])?$_POST["EMAIL_COBROS_CLIENTES"]:"";
$EMAIL_cierre_e = isset($_POST["EMAIL_cierre_e"])?$_POST["EMAIL_cierre_e"]:"";
$EMAIL_PROGRAMA_OPERATIVO = isset($_POST["EMAIL_PROGRAMA_OPERATIVO"])?$_POST["EMAIL_PROGRAMA_OPERATIVO"]:"";
$EMAIL_rooming = isset($_POST["EMAIL_rooming"])?$_POST["EMAIL_rooming"]:"";
$EMAIL_cronoterrestre= isset($_POST["EMAIL_cronoterrestre"])?$_POST["EMAIL_cronoterrestre"]:"";
$EMAIL_ALTA_EVENTOS1= isset($_POST["EMAIL_ALTA_EVENTOS1"])?$_POST["EMAIL_ALTA_EVENTOS1"]:"";
$hPAGOSINGRESOS1= isset($_POST["hPAGOSINGRESOS1"])?$_POST["hPAGOSINGRESOS1"]:"";
$enviarpagosingre= isset($_POST["enviarpagosingre"])?$_POST["enviarpagosingre"]:"";
$borra_PAGOSINGRESOS= isset($_POST["borra_PAGOSINGRESOS"])?$_POST["borra_PAGOSINGRESOS"]:"";
$hpagosegresos1= isset($_POST["hpagosegresos1"])?$_POST["hpagosegresos1"]:"";
$enviarpagosEgreso= isset($_POST["enviarpagosEgreso"])?$_POST["enviarpagosEgreso"]:"";
$borra_PAGOEGRESOS= isset($_POST["borra_PAGOEGRESOS"])?$_POST["borra_PAGOEGRESOS"]:"";
$hBOLETOSAVION1= isset($_POST["hBOLETOSAVION1"])?$_POST["hBOLETOSAVION1"]:"";
$enviarboletos= isset($_POST["enviarboletos"])?$_POST["enviarboletos"]:"";
$borra_BOLETOSAVION= isset($_POST["borra_BOLETOSAVION"])?$_POST["borra_BOLETOSAVION"]:"";
$EMAIL_PAGOS_INGRESOS= isset($_POST["EMAIL_PAGOS_INGRESOS"])?$_POST["EMAIL_PAGOS_INGRESOS"]:"";
$EMAIL_PAGOS_EGRESOS= isset($_POST["EMAIL_PAGOS_EGRESOS"])?$_POST["EMAIL_PAGOS_EGRESOS"]:"";
$EMAIL_BOLETOS_AVION= isset($_POST["EMAIL_BOLETOS_AVION"])?$_POST["EMAIL_BOLETOS_AVION"]:"";
$hDatosPERSONAL= isset($_POST["hDatosPERSONAL"])?$_POST["hDatosPERSONAL"]:"";
$ENVIARpersonal= isset($_POST["ENVIARpersonal"])?$_POST["ENVIARpersonal"]:"";
$borra_PERSONAL= isset($_POST["borra_PERSONAL"])?$_POST["borra_PERSONAL"]:"";
$PERSONAL_ENVIAR_IMAIL= isset($_POST["PERSONAL_ENVIAR_IMAIL"])?$_POST["PERSONAL_ENVIAR_IMAIL"]:"";
$Ipcobroscliente = isset($_POST["Ipcobroscliente"])?$_POST["Ipcobroscliente"]:"";
$IpINGRESOS = isset($_POST["IpINGRESOS"])?$_POST["IpINGRESOS"]:"";
$IpEGRESOS = isset($_POST["IpEGRESOS"])?$_POST["IpEGRESOS"]:""; 
$Ipboletosavion = isset($_POST["Ipboletosavion"])?$_POST["Ipboletosavion"]:"";
$Ipcronoterrestre = isset($_POST["Ipcronoterrestre"])?$_POST["Ipcronoterrestre"]:""; 
$Icronosvuelos = isset($_POST["Icronosvuelos"])?$_POST["Icronosvuelos"]:"";
$hCOTIPRO = isset($_POST["hCOTIPRO"])?$_POST["hCOTIPRO"]:"";
$enviarCOTIPRO = isset($_POST["enviarCOTIPRO"])?$_POST["enviarCOTIPRO"]:"";
$IpCOTIPRO = isset($_POST["IpCOTIPRO"])?$_POST["IpCOTIPRO"]:"";
$borra_COTIPRO = isset($_POST["borra_COTIPRO"])?$_POST["borra_COTIPRO"]:"";
$EMAIL_COTIPRO = isset($_POST["EMAIL_COTIPRO"])?$_POST["EMAIL_COTIPRO"]:"";

$hCOTICLIENTES = isset($_POST["hCOTICLIENTES"])?$_POST["hCOTICLIENTES"]:"";
$enviarCOTICLIENTES = isset($_POST["enviarCOTICLIENTES"])?$_POST["enviarCOTICLIENTES"]:"";
$IpCOTICLIENTES = isset($_POST["IpCOTICLIENTES"])?$_POST["IpCOTICLIENTES"]:"";
$borra_COTICLIENTES = isset($_POST["borra_COTICLIENTES"])?$_POST["borra_COTICLIENTES"]:"";
$EMAIL_COTICLIENTES = isset($_POST["EMAIL_COTICLIENTES"])?$_POST["EMAIL_COTICLIENTES"]:"";

$hCONTRATO = isset($_POST["hCONTRATO"])?$_POST["hCONTRATO"]:"";
$enviarCONTRATO = isset($_POST["enviarCONTRATO"])?$_POST["enviarCONTRATO"]:"";
$IpCONTRATO = isset($_POST["IpCONTRATO"])?$_POST["IpCONTRATO"]:"";
$borra_CONTRATO = isset($_POST["borra_CONTRATO"])?$_POST["borra_CONTRATO"]:"";
$EMAIL_CONTRATO = isset($_POST["EMAIL_CONTRATO"])?$_POST["EMAIL_CONTRATO"]:"";

$hDatosPERSONAL2= isset($_POST["hDatosPERSONAL2"])?$_POST["hDatosPERSONAL2"]:"";
$ENVIARpersonal2= isset($_POST["ENVIARpersonal2"])?$_POST["ENVIARpersonal2"]:"";
$borra_PERSONAL2= isset($_POST["borra_PERSONAL2"])?$_POST["borra_PERSONAL2"]:"";
$PERSONAL2_ENVIAR_IMAIL= isset($_POST["PERSONAL2_ENVIAR_IMAIL"])?$_POST["PERSONAL2_ENVIAR_IMAIL"]:"";
$HVEHICULOSEVE= isset($_POST["HVEHICULOSEVE"])?$_POST["HVEHICULOSEVE"]:"";
$enviarVEHICULOSEVE= isset($_POST["enviarVEHICULOSEVE"])?$_POST["enviarVEHICULOSEVE"]:"";
$borra_VEHICULOSEVE= isset($_POST["borra_VEHICULOSEVE"])?$_POST["borra_VEHICULOSEVE"]:"";
$EMAIL_VEHICULOSEVE= isset($_POST["EMAIL_VEHICULOSEVE"])?$_POST["EMAIL_VEHICULOSEVE"]:"";
$HMATERIAL= isset($_POST["HMATERIAL"])?$_POST["HMATERIAL"]:"";
$enviarMATERIAL= isset($_POST["enviarMATERIAL"])?$_POST["enviarMATERIAL"]:"";
$borra_MATERIAL= isset($_POST["borra_MATERIAL"])?$_POST["borra_MATERIAL"]:"";
$EMAIL_MATERIAL= isset($_POST["EMAIL_MATERIAL"])?$_POST["EMAIL_MATERIAL"]:"";
$HPAPELERIA= isset($_POST["HPAPELERIA"])?$_POST["HPAPELERIA"]:"";
$enviarPAPELERIA= isset($_POST["enviarPAPELERIA"])?$_POST["enviarPAPELERIA"]:"";
$borra_PAPELERIA= isset($_POST["borra_PAPELERIA"])?$_POST["borra_PAPELERIA"]:"";
$EMAIL_PAPELERIA= isset($_POST["EMAIL_PAPELERIA"])?$_POST["EMAIL_PAPELERIA"]:"";
$HOFICINA= isset($_POST["HOFICINA"])?$_POST["HOFICINA"]:"";
$enviarOFICINA= isset($_POST["enviarOFICINA"])?$_POST["enviarOFICINA"]:"";
$borra_OFICINA= isset($_POST["borra_OFICINA"])?$_POST["borra_OFICINA"]:"";
$EMAIL_OFICINA= isset($_POST["EMAIL_OFICINA"])?$_POST["EMAIL_OFICINA"]:"";
$HBOTIQUIN= isset($_POST["HBOTIQUIN"])?$_POST["HBOTIQUIN"]:"";
$enviarBOTIQUIN= isset($_POST["enviarBOTIQUIN"])?$_POST["enviarBOTIQUIN"]:"";
$borra_BOTIQUIN= isset($_POST["borra_BOTIQUIN"])?$_POST["borra_BOTIQUIN"]:"";
$EMAIL_BOTIQUIN= isset($_POST["EMAIL_BOTIQUIN"])?$_POST["EMAIL_BOTIQUIN"]:"";
$hPORVENDEDOR= isset($_POST["hPORVENDEDOR"])?$_POST["hPORVENDEDOR"]:"";
$enviarPORVENDEDOR= isset($_POST["enviarPORVENDEDOR"])?$_POST["enviarPORVENDEDOR"]:"";
$borra_PORVENDEDOR= isset($_POST["borra_PORVENDEDOR"])?$_POST["borra_PORVENDEDOR"]:"";
$EMAIL_PORVENDEDOR= isset($_POST["EMAIL_PORVENDEDOR"])?$_POST["EMAIL_PORVENDEDOR"]:"";
$hFEECOBRADO = isset($_POST["hFEECOBRADO"])?$_POST["hFEECOBRADO"]:"";
$enviarFEECOBRADO = isset($_POST["enviarFEECOBRADO"])?$_POST["enviarFEECOBRADO"]:"";
$IpFEECOBRADO = isset($_POST["IpFEECOBRADO"])?$_POST["IpFEECOBRADO"]:"";
$borra_FEECOBRADO = isset($_POST["borra_FEECOBRADO"])?$_POST["borra_FEECOBRADO"]:"";
$EMAIL_FEECOBRADO = isset($_POST["EMAIL_FEECOBRADO"])?$_POST["EMAIL_FEECOBRADO"]:"";
$HPorcentaje = isset($_POST["HPorcentaje"])?$_POST["HPorcentaje"]:"";
$enviarporcentaje = isset($_POST["enviarporcentaje"])?$_POST["enviarporcentaje"]:"";
$HMENSAJERIA = isset($_POST["HMENSAJERIA"])?$_POST["HMENSAJERIA"]:"";
$enviarMENSAJERIA = isset($_POST["enviarMENSAJERIA"])?$_POST["enviarMENSAJERIA"]:"";
$borra_MENSAJERIA = isset($_POST["borra_MENSAJERIA"])?$_POST["borra_MENSAJERIA"]:"";
$EMAIL_MENSAJERIA = isset($_POST["EMAIL_MENSAJERIA"])?$_POST["EMAIL_MENSAJERIA"]:"";


                                     








	$cuenta_fechas= isset($_POST["cuenta_fechas"])?$_POST["cuenta_fechas"]:"";
if($cuenta_fechas=='cuenta_fechas'){
$fechaFinal= isset($_POST["VEHICULOSEVE_DEVOLU"])?$_POST["VEHICULOSEVE_DEVOLU"]:"";
$fechaInicial= isset($_POST["VEHICULOSEVE_ENTREGA"])?$_POST["VEHICULOSEVE_ENTREGA"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;
	}else{
	echo "0";	
	}
}


$cantidad_precio= isset($_POST["cantidad_precio"])?$_POST["cantidad_precio"]:"";
if($cantidad_precio=='cantidad_precio'){
$VEHICULOSEVE_DIAS= isset($_POST["VEHICULOSEVE_DIAS"])?$_POST["VEHICULOSEVE_DIAS"]:"";
$VEHICULOSEVE_COSTO= isset($_POST["VEHICULOSEVE_COSTO"])?$_POST["VEHICULOSEVE_COSTO"]:"";
$VEHICULOSEVE_CANTIDAD= isset($_POST["VEHICULOSEVE_CANTIDAD"])?$_POST["VEHICULOSEVE_CANTIDAD"]:"";

if($VEHICULOSEVE_CANTIDAD=='' or $VEHICULOSEVE_CANTIDAD==0)
{$VEHICULOSEVE_CANTIDAD=1;}

$VEHICULOSEVE_COSTO = str_replace(',','',$VEHICULOSEVE_COSTO);
$VEHICULOSEVE_COSTO = str_replace('$','',$VEHICULOSEVE_COSTO);
	if($VEHICULOSEVE_DIAS!='' and $VEHICULOSEVE_COSTO!=''){
    $sub_total = ($VEHICULOSEVE_DIAS * $VEHICULOSEVE_COSTO) * $VEHICULOSEVE_CANTIDAD ;
	//$iva = $sub_total * .16;
	$iva = 0;
	$gtotal =  $sub_total + $iva;	
    }else{
	$sub_total = 0;
	$iva = 0;
	$gtotal =  0;	
	}
	echo '^'.number_format($gtotal,2,'.',',').'^'.number_format($iva,2,'.',',').'^'.number_format($sub_total,2,'.',',');
}

$OBTENER_VEHICULO1= isset($_POST["OBTENER_VEHICULO1"])?$_POST["OBTENER_VEHICULO1"]:"";
if($OBTENER_VEHICULO1=='OBTENER_VEHICULO1'){
	$VEHICULOSEVE_VEHICULO= isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
     echo $altaeventos->Listado_VEHICULOSEVE3($VEHICULOSEVE_VEHICULO);
}

$OBTENER_color1= isset($_POST["OBTENER_color1"])?$_POST["OBTENER_color1"]:"";
if($OBTENER_color1=='OBTENER_color1'){
	$VEHICULOSEVE_VEHICULO= isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
     echo $altaeventos->color_vehiculo($VEHICULOSEVE_VEHICULO);
}


$OBTENER_placas1= isset($_POST["OBTENER_placas1"])?$_POST["OBTENER_placas1"]:"";
if($OBTENER_placas1=='OBTENER_placas1'){
	$VEHICULOSEVE_VEHICULO= isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
     echo $altaeventos->placas_vehiculo($VEHICULOSEVE_VEHICULO);
}




$OBTENER_foto1= isset($_POST["OBTENER_foto1"])?$_POST["OBTENER_foto1"]:"";
if($OBTENER_foto1=='OBTENER_foto1'){
	$VEHICULOSEVE_VEHICULO= isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
    $_SESSION['fotos_vehiculos']= $altaeventos->fotos_vehiculos($VEHICULOSEVE_VEHICULO);
	 
}



///////////////////////////////////////materiales////////////////////////////////////

	$cuenta_fechas2= isset($_POST["cuenta_fechas2"])?$_POST["cuenta_fechas2"]:"";
if($cuenta_fechas2=='cuenta_fechas2'){
$fechaFinal= isset($_POST["MATERIAL_DEVOLU"])?$_POST["MATERIAL_DEVOLU"]:"";
$fechaInicial= isset($_POST["MATERIAL_ENTREGA"])?$_POST["MATERIAL_ENTREGA"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;
	}else{
	echo "0";	
	}
}


$cantidad_precioMATE= isset($_POST["cantidad_precioMATE"])?$_POST["cantidad_precioMATE"]:"";
if($cantidad_precioMATE=='cantidad_precioMATE'){
$MATERIAL_DIAS= isset($_POST["MATERIAL_DIAS"])?$_POST["MATERIAL_DIAS"]:"";
$MATERIAL_COSTO= isset($_POST["MATERIAL_COSTO"])?$_POST["MATERIAL_COSTO"]:"";
$MATERIAL_CANTIDAD= isset($_POST["MATERIAL_CANTIDAD"])?$_POST["MATERIAL_CANTIDAD"]:"";

if($MATERIAL_CANTIDAD=='' or $MATERIAL_CANTIDAD==0)
{$MATERIAL_CANTIDAD=1;}

$MATERIAL_COSTO = str_replace(',','',$MATERIAL_COSTO);
$MATERIAL_COSTO = str_replace('$','',$MATERIAL_COSTO);
	if($MATERIAL_DIAS!='' and $MATERIAL_COSTO!=''){
    $sub_total = ($MATERIAL_DIAS * $MATERIAL_COSTO) * $MATERIAL_CANTIDAD ;
	//$iva = $sub_total * .16;
	$iva = 0;
	$gtotal =  $sub_total + $iva;	
    }else{
	$sub_total = 0;
	$iva = 0;
	$gtotal =  0;	
	}
	echo '^'.number_format($gtotal,2,'.',',').'^'.number_format($iva,2,'.',',').'^'.number_format($sub_total,2,'.',',');
}

$OBTENER_MATERIAL1= isset($_POST["OBTENER_MATERIAL1"])?$_POST["OBTENER_MATERIAL1"]:"";
if($OBTENER_MATERIAL1=='OBTENER_MATERIAL1'){//MATERIAL_EQUIPO
	$MATERIAL_EQUIPO= isset($_POST["MATERIAL_EQUIPO"])?$_POST["MATERIAL_EQUIPO"]:"";
     echo $altaeventos->Listado_MATERIAL3($MATERIAL_EQUIPO);
}

$OBTENER_fotoMATE1= isset($_POST["OBTENER_fotoMATE1"])?$_POST["OBTENER_fotoMATE1"]:"";
if($OBTENER_fotoMATE1=='OBTENER_fotoMATE1'){
	 $MATERIAL_EQUIPO= isset($_POST["MATERIAL_EQUIPO"])?$_POST["MATERIAL_EQUIPO"]:"";
    echo $_SESSION['I_FOTOS']= $altaeventos->fotos_materiales($MATERIAL_EQUIPO);
	 
}


///////////////////////////////////////papeleria////////////////////////////////////

$cuenta_fechas3= isset($_POST["cuenta_fechas3"])?$_POST["cuenta_fechas3"]:"";
if($cuenta_fechas3=='cuenta_fechas3'){
$fechaFinal= isset($_POST["PAPELERIA_DEVOLU"])?$_POST["PAPELERIA_DEVOLU"]:"";
$fechaInicial= isset($_POST["PAPELERIA_ENTREGA"])?$_POST["PAPELERIA_ENTREGA"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);                                              
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;
	}else{
	echo "0";	
	}
}

                                                                                                   
$cantidad_precioPAPE= isset($_POST["cantidad_precioPAPE"])?$_POST["cantidad_precioPAPE"]:"";
if($cantidad_precioPAPE=='cantidad_precioPAPE'){
$PAPELERIA_DIAS= isset($_POST["PAPELERIA_DIAS"])?$_POST["PAPELERIA_DIAS"]:"";
$PAPELERIA_COSTO= isset($_POST["PAPELERIA_COSTO"])?$_POST["PAPELERIA_COSTO"]:"";
$PAPELERIA_CANTIDAD= isset($_POST["PAPELERIA_CANTIDAD"])?$_POST["PAPELERIA_CANTIDAD"]:"";

if($PAPELERIA_CANTIDAD=='' or $PAPELERIA_CANTIDAD==0)
{$PAPELERIA_CANTIDAD=1;}

$PAPELERIA_COSTO = str_replace(',','',$PAPELERIA_COSTO);
$PAPELERIA_COSTO = str_replace('$','',$PAPELERIA_COSTO);
	if($PAPELERIA_DIAS!='' and $PAPELERIA_COSTO!=''){
        $sub_total = ($PAPELERIA_DIAS * $PAPELERIA_COSTO) * $PAPELERIA_CANTIDAD ;
	//$iva = $sub_total * .16;
	$iva = 0;
	$gtotal =  $sub_total + $iva;	
    }else{
	$sub_total = 0;
	$iva = 0;
	$gtotal =  0;	
	}
	echo '^'.number_format($gtotal,2,'.',',').'^'.number_format($iva,2,'.',',').'^'.number_format($sub_total,2,'.',',');
}

$OBTENER_PAPELERIA1= isset($_POST["OBTENER_PAPELERIA1"])?$_POST["OBTENER_PAPELERIA1"]:"";
if($OBTENER_PAPELERIA1=='OBTENER_PAPELERIA1'){//PAPELERIA_EQUIPO
	$PAPELERIA_EQUIPO= isset($_POST["PAPELERIA_EQUIPO"])?$_POST["PAPELERIA_EQUIPO"]:"";
     echo $altaeventos->Listado_PAPELERIA3($PAPELERIA_EQUIPO);
}

$OBTENER_fotoPAPE1= isset($_POST["OBTENER_fotoPAPE1"])?$_POST["OBTENER_fotoPAPE1"]:"";
if($OBTENER_fotoPAPE1=='OBTENER_fotoPAPE1'){
	 $PAPELERIA_EQUIPO= isset($_POST["PAPELERIA_EQUIPO"])?$_POST["PAPELERIA_EQUIPO"]:"";
    echo $_SESSION['I_FOTOS']= $altaeventos->fotos_papeleria($PAPELERIA_EQUIPO);
	 
}


///////////////////////////////////////oficina////////////////////////////////////

$cuenta_fechas4= isset($_POST["cuenta_fechas4"])?$_POST["cuenta_fechas4"]:"";
if($cuenta_fechas4=='cuenta_fechas4'){
$fechaFinal= isset($_POST["OFICINA_DEVOLU"])?$_POST["OFICINA_DEVOLU"]:"";
$fechaInicial= isset($_POST["OFICINA_ENTREGA"])?$_POST["OFICINA_ENTREGA"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);                                              
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;
	}else{
	echo "0";	
	}
}

                                                                                                   
$cantidad_precioOFI= isset($_POST["cantidad_precioOFI"])?$_POST["cantidad_precioOFI"]:"";
if($cantidad_precioOFI=='cantidad_precioOFI'){
$OFICINA_DIAS= isset($_POST["OFICINA_DIAS"])?$_POST["OFICINA_DIAS"]:"";
$OFICINA_COSTO= isset($_POST["OFICINA_COSTO"])?$_POST["OFICINA_COSTO"]:"";
$OFICINA_CANTIDAD= isset($_POST["OFICINA_CANTIDAD"])?$_POST["OFICINA_CANTIDAD"]:"";

if($OFICINA_CANTIDAD=='' or $OFICINA_CANTIDAD==0)
{$OFICINA_CANTIDAD=1;}

$OFICINA_COSTO = str_replace(',','',$OFICINA_COSTO);
$OFICINA_COSTO = str_replace('$','',$OFICINA_COSTO);
	if($OFICINA_DIAS!='' and $OFICINA_COSTO!=''){
    $sub_total = ($OFICINA_DIAS * $OFICINA_COSTO) * $OFICINA_CANTIDAD ;
	//$iva = $sub_total * .16;
	$iva = 0;
	$gtotal =  $sub_total + $iva;	
    }else{
	$sub_total = 0;
	$iva = 0;
	$gtotal =  0;	
	}
	echo '^'.number_format($gtotal,2,'.',',').'^'.number_format($iva,2,'.',',').'^'.number_format($sub_total,2,'.',',');
}

$OBTENER_OFICINA1= isset($_POST["OBTENER_OFICINA1"])?$_POST["OBTENER_OFICINA1"]:"";
if($OBTENER_OFICINA1=='OBTENER_OFICINA1'){//OFICINA_EQUIPO
	$OFICINA_EQUIPO= isset($_POST["OFICINA_EQUIPO"])?$_POST["OFICINA_EQUIPO"]:"";
     echo $altaeventos->Listado_OFICINA3($OFICINA_EQUIPO);
}

$OBTENER_fotoOFI1= isset($_POST["OBTENER_fotoOFI1"])?$_POST["OBTENER_fotoOFI1"]:"";
if($OBTENER_fotoOFI1=='OBTENER_fotoOFI1'){
	 $OFICINA_EQUIPO= isset($_POST["OFICINA_EQUIPO"])?$_POST["OFICINA_EQUIPO"]:"";
    echo $_SESSION['I_FOTOS']= $altaeventos->fotos_oficina($OFICINA_EQUIPO);
	 
}



///////////////////////////////////////botiquin////////////////////////////////////

$cuenta_fechas5= isset($_POST["cuenta_fechas5"])?$_POST["cuenta_fechas5"]:"";    
if($cuenta_fechas5=='cuenta_fechas5'){                                                 
$fechaFinal= isset($_POST["BOTIQUIN_DEVOLU"])?$_POST["BOTIQUIN_DEVOLU"]:"";
$fechaInicial= isset($_POST["BOTIQUIN_ENTREGA"])?$_POST["BOTIQUIN_ENTREGA"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);                                              
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;                                                                                 
	}else{
	echo "0";	
	}
}

                                                                                                   
$cantidad_precioBOTI= isset($_POST["cantidad_precioBOTI"])?$_POST["cantidad_precioBOTI"]:"";
if($cantidad_precioBOTI=='cantidad_precioBOTI'){
$BOTIQUIN_DIAS= isset($_POST["BOTIQUIN_DIAS"])?$_POST["BOTIQUIN_DIAS"]:"";
$BOTIQUIN_COSTO= isset($_POST["BOTIQUIN_COSTO"])?$_POST["BOTIQUIN_COSTO"]:"";
$BOTIQUIN_CANTIDAD= isset($_POST["BOTIQUIN_CANTIDAD"])?$_POST["BOTIQUIN_CANTIDAD"]:"";

if($BOTIQUIN_CANTIDAD=='' or $BOTIQUIN_CANTIDAD==0)
{$BOTIQUIN_CANTIDAD=1;}

$BOTIQUIN_COSTO = str_replace(',','',$BOTIQUIN_COSTO);
$BOTIQUIN_COSTO = str_replace('$','',$BOTIQUIN_COSTO);
	if($BOTIQUIN_DIAS!='' and $BOTIQUIN_COSTO!=''){
    $sub_total = ($BOTIQUIN_DIAS * $BOTIQUIN_COSTO) * $BOTIQUIN_CANTIDAD ;
	//$iva = $sub_total * .16;
	$iva = 0;
	$gtotal =  $sub_total + $iva;	
    }else{
	$sub_total = 0;
	$iva = 0;
	$gtotal =  0;	
	}
	echo '^'.number_format($gtotal,2,'.',',').'^'.number_format($iva,2,'.',',').'^'.number_format($sub_total,2,'.',',');
}

$OBTENER_BOTIQUIN1= isset($_POST["OBTENER_BOTIQUIN1"])?$_POST["OBTENER_BOTIQUIN1"]:"";
if($OBTENER_BOTIQUIN1=='OBTENER_BOTIQUIN1'){//BOTIQUIN_EQUIPO
	$BOTIQUIN_EQUIPO= isset($_POST["BOTIQUIN_EQUIPO"])?$_POST["BOTIQUIN_EQUIPO"]:"";
     echo $altaeventos->Listado_BOTIQUIN3($BOTIQUIN_EQUIPO);
}

$OBTENER_fotoBOTI1= isset($_POST["OBTENER_fotoBOTI1"])?$_POST["OBTENER_fotoBOTI1"]:"";
if($OBTENER_fotoBOTI1=='OBTENER_fotoBOTI1'){
	 $BOTIQUIN_EQUIPO= isset($_POST["BOTIQUIN_EQUIPO"])?$_POST["BOTIQUIN_EQUIPO"]:"";
    echo $_SESSION['I_FOTOS']= $altaeventos->fotos_botiquin($BOTIQUIN_EQUIPO);
	 
}



///////////////////////////////////////BONOS1////////////////////////////////////




$cuenta_fechas7= isset($_POST["cuenta_fechas7"])?$_POST["cuenta_fechas7"]:"";    
if($cuenta_fechas7=='cuenta_fechas7'){                                              
$fechaFinal= isset($_POST["FECHA_FINAL"])?$_POST["FECHA_FINAL"]:"";
$fechaInicial= isset($_POST["FECHA_INICIO"])?$_POST["FECHA_INICIO"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);                                              
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;                                                                                 
	}else{
	echo "0";	
	}
}

                                                                                                   
$cantidad_precioBONO= isset($_POST["cantidad_precioBONO"])?$_POST["cantidad_precioBONO"]:"";
if($cantidad_precioBONO=='cantidad_precioBONO'){
	$NUMERO_DIAS= isset($_POST["NUMERO_DIAS"])?$_POST["NUMERO_DIAS"]:"";
	$MONTO_BONO= isset($_POST["MONTO_BONO"])?$_POST["MONTO_BONO"]:"";
	$VIATICOS_PERSONAL= isset($_POST["VIATICOS_PERSONAL"])?$_POST["VIATICOS_PERSONAL"]:"";

	$fechaFinal= isset($_POST["FECHA_FINAL"])?$_POST["FECHA_FINAL"]:"";	
	if($fechaFinal!=''){
	$fechaFinalSegundos = strtotime("+ 7 day" , strtotime($fechaFinal));
	$fechaFinal2 = date("Y-m-d",$fechaFinalSegundos);
	}else{
	$fechaFinal2 = '0000-00-00';		
	}

	$MONTO_BONO = str_replace(',','',$MONTO_BONO);
	$MONTO_BONO = str_replace('$','',$MONTO_BONO);

	$VIATICOS_PERSONAL = str_replace(',','',$VIATICOS_PERSONAL);
	$VIATICOS_PERSONAL = str_replace('$','',$VIATICOS_PERSONAL);

	if($NUMERO_DIAS!='' and $MONTO_BONO!=''){
		$MONTO_BONO_TOTAL  = $MONTO_BONO * $NUMERO_DIAS;
		$GTOTALBONO = $MONTO_BONO_TOTAL + $VIATICOS_PERSONAL;
    }else{
		$MONTO_BONO_TOTAL = 0;
		$GTOTALBONO = 0;
	}
	echo '^'.number_format($GTOTALBONO,2,'.',',').'^'.number_format($MONTO_BONO_TOTAL,2,'.',',').'^'.number_format($fechaFinal2,0);
}





///////////////////////////////////////BONOS2////////////////////////////////////




$cuenta_fechas8= isset($_POST["cuenta_fechas8"])?$_POST["cuenta_fechas8"]:"";    
if($cuenta_fechas8=='cuenta_fechas8'){                                              
$fechaFinal= isset($_POST["FECHA_FINAL1"])?$_POST["FECHA_FINAL1"]:"";
$fechaInicial= isset($_POST["FECHA_INICIO1"])?$_POST["FECHA_INICIO1"]:"";
	$fechaInicialSegundos = strtotime($fechaInicial);                                              
	$fechaFinalSegundos = strtotime($fechaFinal);
	if($fechaFinalSegundos>=$fechaInicialSegundos){
	$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
	echo $dias + 1 ;                                                                                 
	}else{
	echo "0";	
	}
}

                                                                                                   
$cantidad_precioBONO1= isset($_POST["cantidad_precioBONO1"])?$_POST["cantidad_precioBONO1"]:"";
if($cantidad_precioBONO1=='cantidad_precioBONO1'){
	$NUMERO_DIAS1= isset($_POST["NUMERO_DIAS1"])?$_POST["NUMERO_DIAS1"]:"";
	$MONTO_BONO1= isset($_POST["MONTO_BONO1"])?$_POST["MONTO_BONO1"]:"";
	$VIATICOS_PERSONAL2= isset($_POST["VIATICOS_PERSONAL2"])?$_POST["VIATICOS_PERSONAL2"]:"";
	
	$fechaFinal= isset($_POST["FECHA_FINAL1"])?$_POST["FECHA_FINAL1"]:"";	
	if($fechaFinal!=''){
	$fechaFinalSegundos = strtotime("+ 7 day" , strtotime($fechaFinal));
	$fechaFinal3 = date("Y-m-d",$fechaFinalSegundos);
	}else{
	$fechaFinal3 = '0000-00-00';		
	}

	$MONTO_BONO1 = str_replace(',','',$MONTO_BONO1);
	$MONTO_BONO1 = str_replace('$','',$MONTO_BONO1);

	$VIATICOS_PERSONAL2 = str_replace(',','',$VIATICOS_PERSONAL2);
	$VIATICOS_PERSONAL2 = str_replace('$','',$VIATICOS_PERSONAL2);

	if($NUMERO_DIAS1!='' and $MONTO_BONO1!=''){
		$MONTO_BONO_TOTAL1  = $MONTO_BONO1 * $NUMERO_DIAS1;
		$GTOTALBONO1 = $MONTO_BONO_TOTAL1 + $VIATICOS_PERSONAL2;
    }else{
		$MONTO_BONO_TOTAL1 = 0;
		$GTOTALBONO1 = 0;
	}
	echo '^'.number_format($GTOTALBONO1,2,'.',',').'^'.number_format($MONTO_BONO_TOTAL1,2,'.',',').'^'.number_format($fechaFinal3,0);
}


//////////////////////////////////////////DIRECCION ENVIA//////////////////////////////////////////
	$MENSAJERIA_EMPRESA_LUGAR1 = isset($_POST['MENSAJERIA_EMPRESA_LUGAR1'])?$_POST['MENSAJERIA_EMPRESA_LUGAR1']:'';

if($MENSAJERIA_EMPRESA_LUGAR1==true){
    echo $altaeventos->obtener_direccion_empresas($MENSAJERIA_EMPRESA_LUGAR1);
}



	$MENSAJERIA_SELECCIONAR1 = isset($_POST['MENSAJERIA_SELECCIONAR1'])?$_POST['MENSAJERIA_SELECCIONAR1']:'';

if($MENSAJERIA_SELECCIONAR1==true){
    echo $altaeventos->obtener_direccion_proveedores($MENSAJERIA_SELECCIONAR1);
}




	$MENSAJERIA_EMPRESADIRE1 = isset($_POST['MENSAJERIA_EMPRESADIRE1'])?$_POST['MENSAJERIA_EMPRESADIRE1']:'';

if($MENSAJERIA_EMPRESADIRE1==true){
    echo $altaeventos->obtener_direccion_clientes($MENSAJERIA_EMPRESADIRE1);
}


//////////////////////////////////////////DIRECCION RECIBE//////////////////////////////////////////
	$MENSAJERIA_LLEVARNOMBRE1 = isset($_POST['MENSAJERIA_LLEVARNOMBRE1'])?$_POST['MENSAJERIA_LLEVARNOMBRE1']:'';

if($MENSAJERIA_LLEVARNOMBRE1==true){
    echo $altaeventos->obtener_direccion_empresas2($MENSAJERIA_LLEVARNOMBRE1);
}



	$MENSAJERIA_SELECCIONARB1 = isset($_POST['MENSAJERIA_SELECCIONARB1'])?$_POST['MENSAJERIA_SELECCIONARB1']:'';

if($MENSAJERIA_SELECCIONARB1==true){
    echo $altaeventos->obtener_direccion_proveedores2($MENSAJERIA_SELECCIONARB1);
}




	$MENSAJERIA_DIRECCIONB1 = isset($_POST['MENSAJERIA_DIRECCIONB1'])?$_POST['MENSAJERIA_DIRECCIONB1']:'';

if($MENSAJERIA_DIRECCIONB1==true){
    echo $altaeventos->obtener_direccion_clientes2($MENSAJERIA_DIRECCIONB1);
}



///////////////////////////////////////////////////OBTENERCELULARCONTACTO//////////////////////////////
	$MENSAJERIA_NOMBREPERSONAB11 = isset($_POST['MENSAJERIA_NOMBREPERSONAB11'])?$_POST['MENSAJERIA_NOMBREPERSONAB11']:'';
	$MENSAJERIA_NOMBREPERSONAB22 = isset($_POST['MENSAJERIA_NOMBREPERSONAB22'])?$_POST['MENSAJERIA_NOMBREPERSONAB22']:'';
	$MENSAJERIA_NOMBREPERSONAB33 = isset($_POST['MENSAJERIA_NOMBREPERSONAB33'])?$_POST['MENSAJERIA_NOMBREPERSONAB33']:'';
//MENSAJERIA_NOMBREPERSONAB1
if($MENSAJERIA_NOMBREPERSONAB11==true or $MENSAJERIA_NOMBREPERSONAB22==true){
	//print_r($_POST);
    echo $altaeventos->obtenercelularContacto($MENSAJERIA_NOMBREPERSONAB11);
}

///////////////////////////////////////////////////OBTENER VEHICULO//////////////////////////////
$MENSAJERIA_VEHICULOM1 = isset($_POST['MENSAJERIA_VEHICULOM1'])?$_POST['MENSAJERIA_VEHICULOM1']:'';
$MENSAJERIA_VEHICULOM2 = isset($_POST['MENSAJERIA_VEHICULOM2'])?$_POST['MENSAJERIA_VEHICULOM2']:'';
//MENSAJERIA_NOMBREPERSONAB1
if($MENSAJERIA_VEHICULOM1==true or $MENSAJERIA_VEHICULOM2==true){
	//print_r($_POST);
    echo $altaeventos->obtenervehiculo($MENSAJERIA_VEHICULOM1);
}





///////////////////////////////////////////////////CEL SOLICITANTE//////////////////////////////
	$MENSAJERIA_SOLICITANTE1 = isset($_POST['MENSAJERIA_SOLICITANTE1'])?$_POST['MENSAJERIA_SOLICITANTE1']:'';
$explotado = explode('^^',$MENSAJERIA_SOLICITANTE1);
//print_r($explotado);
if($MENSAJERIA_SOLICITANTE1==true){
    echo $altaeventos->obtener_cel_solicitante($explotado[0]);
}

///////////////////////////////////////////////////CEL entrega//////////////////////////////
	$MENSAJERIA_NOMBREPERSONAB1 = isset($_POST['MENSAJERIA_NOMBREPERSONAB1'])?$_POST['MENSAJERIA_NOMBREPERSONAB1']:'';
$explotado = explode('^',$MENSAJERIA_NOMBREPERSONAB1);
//print_r($explotado);
if($MENSAJERIA_NOMBREPERSONAB1==true){
    echo $altaeventos->obtener_cel_entrega($explotado[0]);
}



///////////////////////////////////////////////////NUEVO NUEVO NUEVO //////////////////////////////

	$MENSAJERIA_REALIZADOPOR1 = isset($_POST['MENSAJERIA_REALIZADOPOR1'])?$_POST['MENSAJERIA_REALIZADOPOR1']:'';

if($MENSAJERIA_REALIZADOPOR1==true){
    echo $altaeventos->obtener_costo_vehiculo($MENSAJERIA_REALIZADOPOR1);
}

//////////////////////////////////////////CALCULO MENSAJERIA//////////////////////////////////////////
                                       
$CALCULO_MENSAJERIA= isset($_POST["CALCULO_MENSAJERIA"])?$_POST["CALCULO_MENSAJERIA"]:"";
if($CALCULO_MENSAJERIA=='CALCULO_MENSAJERIA'){
		/*
		MENSAJERIA_COSTOCAMIONETA
MENSAJERIA_COSTOCAMIONETA
MENSAJERIA_COSTOCASETAS
MENSAJERIA_COSTOESTACIONAMIENTO
MENSAJERIA_COSTOGASTOS
MENSAJERIA_TOTAL

MENSAJERIA_COSTOCAMIONETA
*/
	$MENSAJERIA_COSTOCAMIONETA= isset($_POST["MENSAJERIA_COSTOCAMIONETA"])?$_POST["MENSAJERIA_COSTOCAMIONETA"]:0;	
	$MENSAJERIA_COSTOGASOLINA= isset($_POST["MENSAJERIA_COSTOGASOLINA"])?$_POST["MENSAJERIA_COSTOGASOLINA"]:0;
	$MENSAJERIA_COSTOCASETAS= isset($_POST["MENSAJERIA_COSTOCASETAS"])?$_POST["MENSAJERIA_COSTOCASETAS"]:0;
	$MENSAJERIA_COSTOESTACIONAMIENTO= isset($_POST["MENSAJERIA_COSTOESTACIONAMIENTO"])?$_POST["MENSAJERIA_COSTOESTACIONAMIENTO"]:0;
	$MENSAJERIA_COSTOGASTOS= isset($_POST["MENSAJERIA_COSTOGASTOS"])?$_POST["MENSAJERIA_COSTOGASTOS"]:0;

	$MENSAJERIA_COSTOCAMIONETA = str_replace(',','',$MENSAJERIA_COSTOCAMIONETA);
	$MENSAJERIA_COSTOCAMIONETA = str_replace('$','',$MENSAJERIA_COSTOCAMIONETA);
	$MENSAJERIA_COSTOGASOLINA = str_replace(',','',$MENSAJERIA_COSTOGASOLINA);
	$MENSAJERIA_COSTOGASOLINA = str_replace('$','',$MENSAJERIA_COSTOGASOLINA);
	$MENSAJERIA_COSTOCASETAS = str_replace(',','',$MENSAJERIA_COSTOCASETAS);
	$MENSAJERIA_COSTOCASETAS = str_replace('$','',$MENSAJERIA_COSTOCASETAS);
	$MENSAJERIA_COSTOESTACIONAMIENTO = str_replace(',','',$MENSAJERIA_COSTOESTACIONAMIENTO);
	$MENSAJERIA_COSTOESTACIONAMIENTO = str_replace('$','',$MENSAJERIA_COSTOESTACIONAMIENTO);	
	$MENSAJERIA_COSTOGASTOS = str_replace(',','',$MENSAJERIA_COSTOGASTOS);
	$MENSAJERIA_COSTOGASTOS = str_replace('$','',$MENSAJERIA_COSTOGASTOS);		
	$MENSAJERIA_TOTAL = str_replace(',','',$MENSAJERIA_TOTAL);
	$MENSAJERIA_TOTAL = str_replace('$','',$MENSAJERIA_TOTAL);

$grantotal = $MENSAJERIA_COSTOCAMIONETA + $MENSAJERIA_COSTOGASOLINA + $MENSAJERIA_COSTOCASETAS + $MENSAJERIA_COSTOESTACIONAMIENTO + $MENSAJERIA_COSTOGASTOS ;
	
	echo number_format($grantotal,2,'.',',');
}

//////////////////////////////MENSAJERIA//////////////////////////////////////////////////////////////
  if($HMENSAJERIA == 'HMENSAJERIA' or $enviarMENSAJERIA=='enviarMENSAJERIA'){
	 	//include_once (__ROOT1__."/includes/crea_funciones.php");  
	  	   	   if( $_FILES["MENSAJERIA_ENTREGARSOLICITUD"] == true){
$MENSAJERIA_ENTREGARSOLICITUD = $conexion->solocargar("MENSAJERIA_ENTREGARSOLICITUD");
}if($MENSAJERIA_ENTREGARSOLICITUD=='2' or $MENSAJERIA_ENTREGARSOLICITUD=='' or $MENSAJERIA_ENTREGARSOLICITUD=='1'){
 $MENSAJERIA_ENTREGARSOLICITUD1 = "";	
}else{
 $MENSAJERIA_ENTREGARSOLICITUD1 = $MENSAJERIA_ENTREGARSOLICITUD;    
}	  

	  	   	   if( $_FILES["MENSAJERIA_FOTOS"] == true){
$MENSAJERIA_FOTOS = $conexion->solocargar("MENSAJERIA_FOTOS");
}if($MENSAJERIA_FOTOS=='2' or $MENSAJERIA_FOTOS=='' or $MENSAJERIA_FOTOS=='1'){
 $MENSAJERIA_FOTOS1 = "";	
}else{
 $MENSAJERIA_FOTOS1 = $MENSAJERIA_FOTOS;
}	

	  	   	   if( $_FILES["MENSAJERIA_FIRMA"] == true){
$MENSAJERIA_FIRMA = $conexion->solocargar("MENSAJERIA_FIRMA");
}if($MENSAJERIA_FIRMA=='2' or $MENSAJERIA_FIRMA=='' or $MENSAJERIA_FIRMA=='1'){
 $MENSAJERIA_FIRMA1 = "";	
}else{
 $MENSAJERIA_FIRMA1 = $MENSAJERIA_FIRMA;
}
  
 	  	   	   if( $_FILES["MENSAJERIA_FOTOSNECES"] == true){
$MENSAJERIA_FOTOSNECES = $conexion->solocargar("MENSAJERIA_FOTOSNECES");
}if($MENSAJERIA_FOTOSNECES=='2' or $MENSAJERIA_FOTOSNECES=='' or $MENSAJERIA_FOTOSNECES=='1'){
 $MENSAJERIA_FOTOSNECES1 = "";	
}else{
 $MENSAJERIA_FOTOSNECES1 = $MENSAJERIA_FOTOSNECES;
} 
//MENSAJERIA_FOTOS
 	  	   	   if( $_FILES["MENSAJERIA_ARCHIVORELACIONADO"] == true){
$MENSAJERIA_ARCHIVORELACIONADO = $conexion->solocargar("MENSAJERIA_ARCHIVORELACIONADO");
}if($MENSAJERIA_ARCHIVORELACIONADO=='2' or $MENSAJERIA_ARCHIVORELACIONADO=='' or $MENSAJERIA_ARCHIVORELACIONADO=='1'){
 $MENSAJERIA_ARCHIVORELACIONADO1 = "";	
}else{
 $MENSAJERIA_ARCHIVORELACIONADO1 = $MENSAJERIA_ARCHIVORELACIONADO;
}   
  
$MENSAJERIA_EVENTO = isset($_POST["MENSAJERIA_EVENTO"])?$_POST["MENSAJERIA_EVENTO"]:"";
$MENSAJERIA_SOLICITUD = isset($_POST["MENSAJERIA_SOLICITUD"])?$_POST["MENSAJERIA_SOLICITUD"]:"";
$MENSAJERIA_REALIZARCE = isset($_POST["MENSAJERIA_REALIZARCE"])?$_POST["MENSAJERIA_REALIZARCE"]:"";
$MENSAJERIA_HORARIOS = isset($_POST["MENSAJERIA_HORARIOS"])?$_POST["MENSAJERIA_HORARIOS"]:"";
$MENSAJERIA_SOLICITANTE = isset($_POST["MENSAJERIA_SOLICITANTE"])?$_POST["MENSAJERIA_SOLICITANTE"]:"";
$MENSAJERIA_CEL_SOLICITANTE = isset($_POST["MENSAJERIA_CEL_SOLICITANTE"])?$_POST["MENSAJERIA_CEL_SOLICITANTE"]:"";
$MENSAJERIA_EMPRESA_LUGAR = isset($_POST["MENSAJERIA_EMPRESA_LUGAR"])?$_POST["MENSAJERIA_EMPRESA_LUGAR"]:"";
$MENSAJERIA_SELECCIONAR = isset($_POST["MENSAJERIA_SELECCIONAR"])?$_POST["MENSAJERIA_SELECCIONAR"]:"";
$MENSAJERIA_OBJETOSARECOJER = isset($_POST["MENSAJERIA_OBJETOSARECOJER"])?$_POST["MENSAJERIA_OBJETOSARECOJER"]:"";
$MENSAJERIA_MEDIDASAPROX = isset($_POST["MENSAJERIA_MEDIDASAPROX"])?$_POST["MENSAJERIA_MEDIDASAPROX"]:"";
$MENSAJERIA_CONTENIDO = isset($_POST["MENSAJERIA_CONTENIDO"])?$_POST["MENSAJERIA_CONTENIDO"]:"";
$MENSAJERIA_EMPRESADIRE = isset($_POST["MENSAJERIA_EMPRESADIRE"])?$_POST["MENSAJERIA_EMPRESADIRE"]:"";
$MENSAJERIA_EDIFICIO = isset($_POST["MENSAJERIA_EDIFICIO"])?$_POST["MENSAJERIA_EDIFICIO"]:"";
$MENSAJERIA_CALLE = isset($_POST["MENSAJERIA_CALLE"])?$_POST["MENSAJERIA_CALLE"]:"";
$MENSAJERIA_NUMEROE = isset($_POST["MENSAJERIA_NUMEROE"])?$_POST["MENSAJERIA_NUMEROE"]:"";
$MENSAJERIA_NINTERIOR = isset($_POST["MENSAJERIA_NINTERIOR"])?$_POST["MENSAJERIA_NINTERIOR"]:"";
$MENSAJERIA_NOFICINA = isset($_POST["MENSAJERIA_NOFICINA"])?$_POST["MENSAJERIA_NOFICINA"]:"";
$MENSAJERIA_COLONIA = isset($_POST["MENSAJERIA_COLONIA"])?$_POST["MENSAJERIA_COLONIA"]:"";
$MENSAJERIA_ALCALDIA = isset($_POST["MENSAJERIA_ALCALDIA"])?$_POST["MENSAJERIA_ALCALDIA"]:"";
$MENSAJERIA_CP = isset($_POST["MENSAJERIA_CP"])?$_POST["MENSAJERIA_CP"]:"";
$MENSAJERIA_CIUDAD = isset($_POST["MENSAJERIA_CIUDAD"])?$_POST["MENSAJERIA_CIUDAD"]:"";
$MENSAJERIA_ESTADO = isset($_POST["MENSAJERIA_ESTADO"])?$_POST["MENSAJERIA_ESTADO"]:"";
$MENSAJERIA_PAIS = isset($_POST["MENSAJERIA_PAIS"])?$_POST["MENSAJERIA_PAIS"]:"";
$MENSAJERIA_UBICACION = isset($_POST["MENSAJERIA_UBICACION"])?$_POST["MENSAJERIA_UBICACION"]:"";
$MENSAJERIA_TELEFONO1 = isset($_POST["MENSAJERIA_TELEFONO1"])?$_POST["MENSAJERIA_TELEFONO1"]:"";
$MENSAJERIA_TELEFONO2 = isset($_POST["MENSAJERIA_TELEFONO2"])?$_POST["MENSAJERIA_TELEFONO2"]:"";
$MENSAJERIA_NOMBREENTREGA = isset($_POST["MENSAJERIA_NOMBREENTREGA"])?$_POST["MENSAJERIA_NOMBREENTREGA"]:"";
$MENSAJERIA_FIRMARECIBE = isset($_POST["MENSAJERIA_FIRMARECIBE"])?$_POST["MENSAJERIA_FIRMARECIBE"]:"";
$MENSAJERIA_FECHAR = isset($_POST["MENSAJERIA_FECHAR"])?$_POST["MENSAJERIA_FECHAR"]:"";
$MENSAJERIA_HORAR = isset($_POST["MENSAJERIA_HORAR"])?$_POST["MENSAJERIA_HORAR"]:"";
$MENSAJERIA_LLEVARNOMBRE = isset($_POST["MENSAJERIA_LLEVARNOMBRE"])?$_POST["MENSAJERIA_LLEVARNOMBRE"]:"";
$MENSAJERIA_SELECCIONARB = isset($_POST["MENSAJERIA_SELECCIONARB"])?$_POST["MENSAJERIA_SELECCIONARB"]:"";
$MENSAJERIA_DIRECCIONB = isset($_POST["MENSAJERIA_DIRECCIONB"])?$_POST["MENSAJERIA_DIRECCIONB"]:"";
$MENSAJERIA_EDIFICIOB = isset($_POST["MENSAJERIA_EDIFICIOB"])?$_POST["MENSAJERIA_EDIFICIOB"]:"";
$MENSAJERIA_CALLEB = isset($_POST["MENSAJERIA_CALLEB"])?$_POST["MENSAJERIA_CALLEB"]:"";
$MENSAJERIA_NUMEROEB = isset($_POST["MENSAJERIA_NUMEROEB"])?$_POST["MENSAJERIA_NUMEROEB"]:"";
$MENSAJERIA_NINTERIORB = isset($_POST["MENSAJERIA_NINTERIORB"])?$_POST["MENSAJERIA_NINTERIORB"]:"";
$MENSAJERIA_NOFICINAB = isset($_POST["MENSAJERIA_NOFICINAB"])?$_POST["MENSAJERIA_NOFICINAB"]:"";
$MENSAJERIA_COLONIAB = isset($_POST["MENSAJERIA_COLONIAB"])?$_POST["MENSAJERIA_COLONIAB"]:"";
$MENSAJERIA_ALCALDIAB = isset($_POST["MENSAJERIA_ALCALDIAB"])?$_POST["MENSAJERIA_ALCALDIAB"]:"";
$MENSAJERIA_CPB = isset($_POST["MENSAJERIA_CPB"])?$_POST["MENSAJERIA_CPB"]:"";
$MENSAJERIA_CIUDADB = isset($_POST["MENSAJERIA_CIUDADB"])?$_POST["MENSAJERIA_CIUDADB"]:"";
$MENSAJERIA_ESTADOB = isset($_POST["MENSAJERIA_ESTADOB"])?$_POST["MENSAJERIA_ESTADOB"]:"";
$MENSAJERIA_PAISB = isset($_POST["MENSAJERIA_PAISB"])?$_POST["MENSAJERIA_PAISB"]:"";
$MENSAJERIA_UBICACIONB = isset($_POST["MENSAJERIA_UBICACIONB"])?$_POST["MENSAJERIA_UBICACIONB"]:"";
$MENSAJERIA_TELEFONO1B = isset($_POST["MENSAJERIA_TELEFONO1B"])?$_POST["MENSAJERIA_TELEFONO1B"]:"";
$MENSAJERIA_TELEFONO2B = isset($_POST["MENSAJERIA_TELEFONO2B"])?$_POST["MENSAJERIA_TELEFONO2B"]:"";
$MENSAJERIA_NOMBREPERSONAB = isset($_POST["MENSAJERIA_NOMBREPERSONAB"])?$_POST["MENSAJERIA_NOMBREPERSONAB"]:"";
$MENSAJERIA_NEMEROCELENTREGA = isset($_POST["MENSAJERIA_NEMEROCELENTREGA"])?$_POST["MENSAJERIA_NEMEROCELENTREGA"]:"";
$MENSAJERIA_NOMBREENTREGAB = isset($_POST["MENSAJERIA_NOMBREENTREGAB"])?$_POST["MENSAJERIA_NOMBREENTREGAB"]:"";
$MENSAJERIA_FIRMARECIBEB = isset($_POST["MENSAJERIA_FIRMARECIBEB"])?$_POST["MENSAJERIA_FIRMARECIBEB"]:"";
$MENSAJERIA_FECHARB = isset($_POST["MENSAJERIA_FECHARB"])?$_POST["MENSAJERIA_FECHARB"]:"";
$MENSAJERIA_HORARB = isset($_POST["MENSAJERIA_HORARB"])?$_POST["MENSAJERIA_HORARB"]:"";
$MENSAJERIA_INSTRUCCIONES = isset($_POST["MENSAJERIA_INSTRUCCIONES"])?$_POST["MENSAJERIA_INSTRUCCIONES"]:"";
$MENSAJERIA_OBSERVACIONES = isset($_POST["MENSAJERIA_OBSERVACIONES"])?$_POST["MENSAJERIA_OBSERVACIONES"]:"";
$MENSAJERIA_VEHICULOM = isset($_POST["MENSAJERIA_VEHICULOM"])?$_POST["MENSAJERIA_VEHICULOM"]:"";
$MENSAJERIA_REALIZADOPOR = isset($_POST["MENSAJERIA_REALIZADOPOR"])?$_POST["MENSAJERIA_REALIZADOPOR"]:"";
$MENSAJERIA_COSTOCAMIONETA = isset($_POST["MENSAJERIA_COSTOCAMIONETA"])?$_POST["MENSAJERIA_COSTOCAMIONETA"]:"";
$MENSAJERIA_COSTOGASOLINA = isset($_POST["MENSAJERIA_COSTOGASOLINA"])?$_POST["MENSAJERIA_COSTOGASOLINA"]:"";
$MENSAJERIA_COSTOCASETAS = isset($_POST["MENSAJERIA_COSTOCASETAS"])?$_POST["MENSAJERIA_COSTOCASETAS"]:"";
$MENSAJERIA_COSTOESTACIONAMIENTO = isset($_POST["MENSAJERIA_COSTOESTACIONAMIENTO"])?$_POST["MENSAJERIA_COSTOESTACIONAMIENTO"]:"";
$MENSAJERIA_COSTOGASTOS = isset($_POST["MENSAJERIA_COSTOGASTOS"])?$_POST["MENSAJERIA_COSTOGASTOS"]:"";
$MENSAJERIA_TOTAL = isset($_POST["MENSAJERIA_TOTAL"])?$_POST["MENSAJERIA_TOTAL"]:"";
$MENSAJERIA_OBSERVA = isset($_POST["MENSAJERIA_OBSERVA"])?$_POST["MENSAJERIA_OBSERVA"]:"";

$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:"";
$CIUDAD_DEL_EVENTO = isset($_POST["CIUDAD_DEL_EVENTO"])?$_POST["CIUDAD_DEL_EVENTO"]:"";

$HMENSAJERIA = isset($_POST["HMENSAJERIA"])?$_POST["HMENSAJERIA"]:""; 
$IPMENSAJERIA = isset($_POST["IPMENSAJERIA"])?$_POST["IPMENSAJERIA"]:"";

if($MENSAJERIA_REALIZARCE == "" or  $MENSAJERIA_HORARIOS == "" ){
	echo "<P style='color:red; font-size:25px;'>FAVOR DE LLENAR FECHA A REALIZARSE 1 Y RANGO DE HORARIOS PARA ENTREGA</p>";
}else{
	  
	echo $altaeventos->mensajeria( $MENSAJERIA_EVENTO , $MENSAJERIA_SOLICITUD , $MENSAJERIA_REALIZARCE , $MENSAJERIA_HORARIOS , $MENSAJERIA_SOLICITANTE , $MENSAJERIA_CEL_SOLICITANTE , $MENSAJERIA_EMPRESA_LUGAR , $MENSAJERIA_SELECCIONAR , $MENSAJERIA_OBJETOSARECOJER , $MENSAJERIA_MEDIDASAPROX , $MENSAJERIA_CONTENIDO , $MENSAJERIA_ENTREGARSOLICITUD1 , $MENSAJERIA_FOTOS1 , $MENSAJERIA_EMPRESADIRE , $MENSAJERIA_EDIFICIO , $MENSAJERIA_CALLE , $MENSAJERIA_NUMEROE , $MENSAJERIA_NINTERIOR , $MENSAJERIA_NOFICINA , $MENSAJERIA_COLONIA , $MENSAJERIA_ALCALDIA , $MENSAJERIA_CP , $MENSAJERIA_CIUDAD , $MENSAJERIA_ESTADO , $MENSAJERIA_PAIS , $MENSAJERIA_UBICACION , $MENSAJERIA_TELEFONO1 , $MENSAJERIA_TELEFONO2 , $MENSAJERIA_NOMBREENTREGA , $MENSAJERIA_FIRMARECIBE , $MENSAJERIA_FECHAR , $MENSAJERIA_HORAR , $MENSAJERIA_LLEVARNOMBRE , $MENSAJERIA_SELECCIONARB , $MENSAJERIA_DIRECCIONB , $MENSAJERIA_EDIFICIOB , $MENSAJERIA_CALLEB , $MENSAJERIA_NUMEROEB , $MENSAJERIA_NINTERIORB , $MENSAJERIA_NOFICINAB , $MENSAJERIA_COLONIAB , $MENSAJERIA_ALCALDIAB , $MENSAJERIA_CPB , $MENSAJERIA_CIUDADB , $MENSAJERIA_ESTADOB , $MENSAJERIA_PAISB , $MENSAJERIA_UBICACIONB , $MENSAJERIA_TELEFONO1B , $MENSAJERIA_TELEFONO2B , $MENSAJERIA_NOMBREPERSONAB , $MENSAJERIA_NEMEROCELENTREGA , $MENSAJERIA_NOMBREENTREGAB , $MENSAJERIA_FIRMARECIBEB , $MENSAJERIA_FECHARB , $MENSAJERIA_HORARB , $MENSAJERIA_INSTRUCCIONES , $MENSAJERIA_OBSERVACIONES , $MENSAJERIA_FIRMA1 , $MENSAJERIA_FOTOSNECES1 , $MENSAJERIA_ARCHIVORELACIONADO1 , $MENSAJERIA_VEHICULOM , $MENSAJERIA_REALIZADOPOR , $MENSAJERIA_COSTOCAMIONETA , $MENSAJERIA_COSTOGASOLINA , $MENSAJERIA_COSTOCASETAS , $MENSAJERIA_COSTOESTACIONAMIENTO , $MENSAJERIA_COSTOGASTOS , $MENSAJERIA_TOTAL , $MENSAJERIA_OBSERVA ,$NUMERO_EVENTO,$NOMBRE_EVENTO,$CIUDAD_DEL_EVENTO, $HMENSAJERIA,$IPMENSAJERIA,$enviarMENSAJERIA );

		
 }
 
 }
 
elseif($EMAIL_MENSAJERIA ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_MENSAJERIA=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['MENSAJERIA'])?$_POST['MENSAJERIA']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_FEECOBRADO, MONTO_FEECOBRADO, FECHA_FEECOBRADO ',

'NOMBRE ,MONTO,FECHA', '04mensajeria',  " where idRelacion = '".$_SESSION['idevento'] ."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_FEECOBRADO, ';
//DOCUMENTO_FEECOBRADO trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04mensajeria', " where idRelacion = '".$_SESSION['idevento'] ."' ".$query2 );

$html = $altaeventos->html2('FEE COBRADO',$MANDA_INFORMACION );
$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';



$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}  
	  
 if($borra_MENSAJERIA == 'borra_MENSAJERIA' ){

$borra_mensa = isset($_POST["borra_mensa"])?$_POST["borra_mensa"]:"";
	echo $altaeventos->borra_MENSAJERIA( $borra_mensa );
}	  
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 
	

	


//////////////////////////////FEE   COBRADO//////////////////////////////////////////////////////////////
  if($hFEECOBRADO == 'hFEECOBRADO' or $enviarFEECOBRADO=='enviarFEECOBRADO'){
	  
	
	  	   	   if( $_FILES["ADJUNTO_FEECOBRADO"] == true){
$ADJUNTO_FEECOBRADO = $conexion->solocargar("ADJUNTO_FEECOBRADO");
}if($ADJUNTO_FEECOBRADO=='2' or $ADJUNTO_FEECOBRADO=='' or $ADJUNTO_FEECOBRADO=='1'){
 $ADJUNTO_FEECOBRADO1 = "";	
}else{
 $ADJUNTO_FEECOBRADO1 = $ADJUNTO_FEECOBRADO;
}
	  
$DOCUMENTO_FEECOBRADO = isset($_POST["DOCUMENTO_FEECOBRADO"])?$_POST["DOCUMENTO_FEECOBRADO"]:"";
$MONTO_FEECOBRADO = isset($_POST["MONTO_FEECOBRADO"])?$_POST["MONTO_FEECOBRADO"]:"";
$FECHA_FEECOBRADO = isset($_POST["FECHA_FEECOBRADO"])?$_POST["FECHA_FEECOBRADO"]:"";
$hFEECOBRADO = isset($_POST["hFEECOBRADO"])?$_POST["hFEECOBRADO"]:""; 


	  
	echo $altaeventos->feecobrado( $DOCUMENTO_FEECOBRADO ,$ADJUNTO_FEECOBRADO1, $MONTO_FEECOBRADO , $FECHA_FEECOBRADO , $hFEECOBRADO,$IpFEECOBRADO,$enviarFEECOBRADO );

   
  
 }
elseif($EMAIL_FEECOBRADO ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_FEECOBRADO=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['feecobrado'])?$_POST['feecobrado']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_FEECOBRADO, MONTO_FEECOBRADO, FECHA_FEECOBRADO ',

'NOMBRE ,MONTO,FECHA', '04feecobrado',  " where idRelacion = '".$_SESSION['idevento'] ."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_FEECOBRADO, ';
//DOCUMENTO_FEECOBRADO trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04feecobrado', " where idRelacion = '".$_SESSION['idevento'] ."' ".$query2 );

$html = $altaeventos->html2('FEE COBRADO',$MANDA_INFORMACION );
$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';



$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}  
	  
 if($borra_FEECOBRADO == 'borra_FEECOBRADO' ){

$borra_fee_cobrado = isset($_POST["borra_fee_cobrado"])?$_POST["borra_fee_cobrado"]:"";
	echo $altaeventos->borra_FEECOBRADO( $borra_fee_cobrado );
}	  
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 





//////////////////////////////FEE   COBRADO PORCENTAJE  ///////////////////////////////////////////////////////
 if($HPorcentaje == 'HPorcentaje' ){
	  
		 // echo "asdfasdf";
$total_resultado = isset($_POST["total_resultado"])?$_POST["total_resultado"]:"";
$resultado = isset($_POST["resultado"])?$_POST["resultado"]:"";
$porcentaje = isset($_POST["porcentaje"])?$_POST["porcentaje"]:"";
$HPorcentaje = isset($_POST["HPorcentaje"])?$_POST["HPorcentaje"]:""; 
//print_r($_POST);
$porcentaje2 = $porcentaje * 0.01 ;
$total_resultado =  str_replace('$','',str_replace(',','',$total_resultado));
$total_resultado2 = $porcentaje2 * $total_resultado;

$resultado = $total_resultado2;
	  
$resultado_php = $altaeventos->feeporcentaje( $total_resultado ,$porcentaje, $resultado  , $HPorcentaje,$enviarporcentaje );
echo number_format($resultado,2,'.',','). '^'. $resultado_php. '^'.$porcentaje ;
   
  
 }

///////////////////////////////PERSONAL2 2///////////////////////////////////////
if($hDatosPERSONAL2 == 'hDatosPERSONAL2' OR $ENVIARpersonal2=='ENVIARpersonal2'){


$NOMBRE_PERSONAL2 = isset($_POST["NOMBRE_PERSONAL2"])?$_POST["NOMBRE_PERSONAL2"]:"";
$PUESTO_PERSONAL2 = isset($_POST["PUESTO_PERSONAL2"])?$_POST["PUESTO_PERSONAL2"]:"";
$WHAT_PERSONAL2 = isset($_POST["WHAT_PERSONAL2"])?$_POST["WHAT_PERSONAL2"]:"";
$EMAIL_PERSONAL2 = isset($_POST["EMAIL_PERSONAL2"])?$_POST["EMAIL_PERSONAL2"]:"";

$FECHA_INICIO1 = isset($_POST["FECHA_INICIO1"])?$_POST["FECHA_INICIO1"]:"";
$FECHA_FINAL1 = isset($_POST["FECHA_FINAL1"])?$_POST["FECHA_FINAL1"]:"";
$NUMERO_DIAS1 = isset($_POST["NUMERO_DIAS1"])?$_POST["NUMERO_DIAS1"]:"";
$MONTO_BONO1 = isset($_POST["MONTO_BONO1"])?$_POST["MONTO_BONO1"]:"";
$MONTO_BONO_TOTAL1 = isset($_POST["MONTO_BONO_TOTAL1"])?$_POST["MONTO_BONO_TOTAL1"]:"";
$TOTAL1 = isset($_POST["TOTAL1"])?$_POST["TOTAL1"]:"";
$ULTIMO_DIA1 = isset($_POST["ULTIMO_DIA1"])?$_POST["ULTIMO_DIA1"]:"";


$VIATICOS_PERSONAL2 = isset($_POST["VIATICOS_PERSONAL2"])?$_POST["VIATICOS_PERSONAL2"]:"";
$OBSERVACIONES_PERSONAL2 = isset($_POST["OBSERVACIONES_PERSONAL2"])?$_POST["OBSERVACIONES_PERSONAL2"]:"";
$PERSONAL2_FECHA_ULTIMA_CARGA = isset($_POST["PERSONAL2_FECHA_ULTIMA_CARGA"])?$_POST["PERSONAL2_FECHA_ULTIMA_CARGA"]:"";
$hDatosPERSONAL2 = isset($_POST["hDatosPERSONAL2"])?$_POST["hDatosPERSONAL2"]:"";
$IPpersonal2 = isset($_POST["IPpersonal2"])?$_POST["IPpersonal2"]:"";

	
     echo $altaeventos->PERSONAL2($NOMBRE_PERSONAL2 ,$PUESTO_PERSONAL2 ,$WHAT_PERSONAL2 , $EMAIL_PERSONAL2 ,$FECHA_INICIO1,$FECHA_FINAL1,$NUMERO_DIAS1, $MONTO_BONO1,$MONTO_BONO_TOTAL1,$TOTAL1,$ULTIMO_DIA1, $VIATICOS_PERSONAL2 , $OBSERVACIONES_PERSONAL2 , $PERSONAL2_FECHA_ULTIMA_CARGA , $hDatosPERSONAL2,$ENVIARpersonal2,$IPpersonal2);  
	$_SESSION['NOMBRE_PERSONAL21']="";

}

     if($borra_PERSONAL2 == 'borra_PERSONAL2' ){

$borra_perso2 = isset($_POST["borra_perso2"])?$_POST["borra_perso2"]:"";
	echo $altaeventos->borra_PERSONAL2( $borra_perso2 );
}


$NOMBRE_PERSONAL21 = isset($_POST['NOMBRE_PERSONAL21'])?$_POST['NOMBRE_PERSONAL21']:'';

if($NOMBRE_PERSONAL21==true){
	$NOMBRE_PERSONAL22 = isset($_POST['NOMBRE_PERSONAL22'])?$_POST['NOMBRE_PERSONAL22']:'';
	
	if($NOMBRE_PERSONAL21=='nada'){
	$_SESSION['NOMBRE_PERSONAL21']='';
	}else{
	$_SESSION['NOMBRE_PERSONAL21']=$NOMBRE_PERSONAL21;		
	}

	
    echo $NOMBRE_PERSONAL22;
	
	
}

$pasara1_personal2_id= isset($_POST["pasara1_personal2_id"])?$_POST["pasara1_personal2_id"]:"";
$pasapersonal2_text= isset($_POST["pasapersonal2_text"])?$_POST["pasapersonal2_text"]:"";

if($pasara1_personal2_id!='' and ($pasapersonal2_text=='si' or $pasapersonal2_text=='no') ){
echo $altaeventos->actualizapersonal2 ($pasara1_personal2_id , $pasapersonal2_text  );
}


 	//EMAIL personal2//

if($PERSONAL2_ENVIAR_IMAIL ==true){

$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($PERSONAL2_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['personal2'])?$_POST['personal2']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('NOMBRE_PERSONAL2, PUESTO_PERSONAL2, WHAT_PERSONAL2,EMAIL_PERSONAL2,VIATICOS_PERSONAL2,OBSERVACIONES_PERSONAL2 ',

'NOMBRE ,PUESTO,NÚMERO CELULAR, EMAIL, VIATICOS,OBSERVACIONES', '04personal2',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );


$html = $altaeventos->html2('PERSONAL2 DEL EVENTO',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}
	
 //include_once (__ROOT1__."/includes/crea_funciones.php"); 

///////////////////////////////PERSONAL///////////////////////////////////////
if ($hDatosPERSONAL == 'hDatosPERSONAL' OR $ENVIARpersonal == 'ENVIARpersonal') {

    $NOMBRE_PERSONAL = isset($_POST["NOMBRE_PERSONAL"]) ? $_POST["NOMBRE_PERSONAL"] : "";
    $PUESTO_PERSONAL = isset($_POST["PUESTO_PERSONAL"]) ? $_POST["PUESTO_PERSONAL"] : "";
    $WHAT_PERSONAL = isset($_POST["WHAT_PERSONAL"]) ? $_POST["WHAT_PERSONAL"] : "";
    $EMAIL_PERSONAL = isset($_POST["EMAIL_PERSONAL"]) ? $_POST["EMAIL_PERSONAL"] : "";
    $FECHA_INICIO = isset($_POST["FECHA_INICIO"]) ? trim($_POST["FECHA_INICIO"]) : "";
    $FECHA_FINAL = isset($_POST["FECHA_FINAL"]) ? trim($_POST["FECHA_FINAL"]) : "";
    $NUMERO_DIAS = isset($_POST["NUMERO_DIAS"]) ? $_POST["NUMERO_DIAS"] : "";
    $MONTO_BONO = isset($_POST["MONTO_BONO"]) ? $_POST["MONTO_BONO"] : "";
    $MONTO_BONO_TOTAL = isset($_POST["MONTO_BONO_TOTAL"]) ? $_POST["MONTO_BONO_TOTAL"] : "";
    $TOTAL = isset($_POST["TOTAL"]) ? $_POST["TOTAL"] : "";
    $ULTIMO_DIA = isset($_POST["ULTIMO_DIA"]) ? $_POST["ULTIMO_DIA"] : "";
    $VIATICOS_PERSONAL = isset($_POST["VIATICOS_PERSONAL"]) ? $_POST["VIATICOS_PERSONAL"] : "";
    $OBSERVACIONES_PERSONAL = isset($_POST["OBSERVACIONES_PERSONAL"]) ? $_POST["OBSERVACIONES_PERSONAL"] : "";
    $PERSONAL_FECHA_ULTIMA_CARGA = isset($_POST["PERSONAL_FECHA_ULTIMA_CARGA"]) ? $_POST["PERSONAL_FECHA_ULTIMA_CARGA"] : "";
    $hDatosPERSONAL = isset($_POST["hDatosPERSONAL"]) ? $_POST["hDatosPERSONAL"] : "";
    $IPpersonal = isset($_POST["IPpersonal"]) ? $_POST["IPpersonal"] : "";

    // 🚨 Validar FECHA_INICIO y FECHA_FINAL
    if (empty($FECHA_INICIO) || empty($FECHA_FINAL)) {
        echo "ERROR: DEBES INGRESAR FECHA INICIO DEL EVENTO y FECHA FINAL DEL EVENTO.";
    } else {
        // Si todo bien, ejecuta el alta
        echo $altaeventos->PERSONAL(
            $NOMBRE_PERSONAL,
            $PUESTO_PERSONAL,
            $WHAT_PERSONAL,
            $EMAIL_PERSONAL,
            $FECHA_INICIO,
            $FECHA_FINAL,
            $NUMERO_DIAS,
            $MONTO_BONO,
            $MONTO_BONO_TOTAL,
            $VIATICOS_PERSONAL,
            $TOTAL,
            $ULTIMO_DIA,
            $OBSERVACIONES_PERSONAL,
            $PERSONAL_FECHA_ULTIMA_CARGA,
            $hDatosPERSONAL,
            $ENVIARpersonal,
            $IPpersonal
        );

        $_SESSION['NOMBRE_PERSONAL1'] = "";
    }
}





     if($borra_PERSONAL == 'borra_PERSONAL' ){

$borra_bole_perso = isset($_POST["borra_bole_perso"])?$_POST["borra_bole_perso"]:"";
	echo $altaeventos->borra_PERSONAL( $borra_bole_perso );
}


$NOMBRE_PERSONAL1 = isset($_POST['NOMBRE_PERSONAL1'])?$_POST['NOMBRE_PERSONAL1']:'';

if($NOMBRE_PERSONAL1==true){
	$NOMBRE_PERSONAL2 = isset($_POST['NOMBRE_PERSONAL2'])?$_POST['NOMBRE_PERSONAL2']:'';
	if($NOMBRE_PERSONAL1=='borra'){
	$_SESSION['NOMBRE_PERSONAL1']="";
	}else{
	$_SESSION['NOMBRE_PERSONAL1']=$NOMBRE_PERSONAL1;		
	}
    echo $NOMBRE_PERSONAL2;
	
}

$NOMBRE_PERSONAL12 = isset($_POST['NOMBRE_PERSONAL12'])?$_POST['NOMBRE_PERSONAL12']:'';

if($NOMBRE_PERSONAL12==true){
	$NOMBRE_PERSONAL22 = isset($_POST['NOMBRE_PERSONAL22'])?$_POST['NOMBRE_PERSONAL22']:'';
	$_SESSION['NOMBRE_PERSONAL21']=$NOMBRE_PERSONAL12;
    echo $NOMBRE_PERSONAL22;
}


$pasara1_personal_id= isset($_POST["pasara1_personal_id"])?$_POST["pasara1_personal_id"]:"";
$pasapersonal_text= isset($_POST["pasapersonal_text"])?$_POST["pasapersonal_text"]:"";

if($pasara1_personal_id!='' and ($pasapersonal_text=='si' or $pasapersonal_text=='no') ){
echo $altaeventos->actualizapersonal ($pasara1_personal_id , $pasapersonal_text  );
}
///////////////////////////////AUTORIZACIÓN////////////////////////
$pasara1_personalAUT_id= isset($_POST["pasara1_personalAUT_id"])?$_POST["pasara1_personalAUT_id"]:"";
$pasapersonalAUT_text= isset($_POST["pasapersonalAUT_text"])?$_POST["pasapersonalAUT_text"]:"";

if($pasara1_personalAUT_id!='' and ($pasapersonalAUT_text=='si' or $pasapersonalAUT_text=='no') ){
echo $altaeventos->actualizapersonalAUT ($pasara1_personalAUT_id , $pasapersonalAUT_text  );
}


if($PERSONAL_ENVIAR_IMAIL ==true){

$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($PERSONAL_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['personal'])?$_POST['personal']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('NOMBRE_PERSONAL, PUESTO_PERSONAL, WHAT_PERSONAL,EMAIL_PERSONAL,VIATICOS_PERSONAL,OBSERVACIONES_PERSONAL ',

'NOMBRE ,PUESTO,NÚMERO CELULAR, EMAIL, VIATICOS,OBSERVACIONES', '04personal',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );


$html = $altaeventos->html2('PERSONAL DEL EVENTO',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}
	
 //include_once (__ROOT1__."/includes/crea_funciones.php"); 	
	

	
	
	
	
	
//////////////////boletos avion/////////////////////////////////////////

$pasarpagadoavion_id= isset($_POST["pasarpagadoavion_id"])?$_POST["pasarpagadoavion_id"]:"";
$pasarpagadoavion_text= isset($_POST["pasarpagadoavion_text"])?$_POST["pasarpagadoavion_text"]:"";

if($pasarpagadoavion_id!='' and ($pasarpagadoavion_text=='si' or $pasarpagadoavion_text=='no') ){
	//echo $pasarpagadoavion_id.$pasarpagadoavion_text;
echo $altaeventos->PASARPAGADOavion ($pasarpagadoavion_id , $pasarpagadoavion_text  );

}

if($hBOLETOSAVION1 == 'hBOLETOSAVION1' or $enviarboletos=='enviarboletos'){
	
			  	   	   if( $_FILES["ADJUNTO_BOLETOSAVION"] == true){
$ADJUNTO_BOLETOSAVION = $conexion->solocargar("ADJUNTO_BOLETOSAVION");
}if($ADJUNTO_BOLETOSAVION=='2' or $ADJUNTO_BOLETOSAVION=='' or $ADJUNTO_BOLETOSAVION=='1'){
 $ADJUNTO_BOLETOSAVION1 = "";	
}else{
 $ADJUNTO_BOLETOSAVION1 = $ADJUNTO_BOLETOSAVION;
} 
	
	
$DOCUMENTO_BOLETOSAVION = isset($_POST["DOCUMENTO_BOLETOSAVION"])?$_POST["DOCUMENTO_BOLETOSAVION"]:"";
$MONTO_BOLETOSAVION = isset($_POST["MONTO_BOLETOSAVION"])?$_POST["MONTO_BOLETOSAVION"]:"";
$FECHA_BOLETOSAVION = isset($_POST["FECHA_BOLETOSAVION"])?$_POST["FECHA_BOLETOSAVION"]:"";
$hBOLETOSAVION1 = isset($_POST["hBOLETOSAVION1"])?$_POST["hBOLETOSAVION1"]:"";
$Ipboletosavion = isset($_POST["Ipboletosavion"])?$_POST["Ipboletosavion"]:"";
 
 echo $altaeventos->boletosavion( $DOCUMENTO_BOLETOSAVION ,$ADJUNTO_BOLETOSAVION1, $MONTO_BOLETOSAVION ,$FECHA_BOLETOSAVION , $hBOLETOSAVION1  ,$hpagosegresos1, $Ipboletosavion,$enviarboletos);   
}


if($borra_BOLETOSAVION == 'borra_BOLETOSAVION' ){

$borra_bole_avion = isset($_POST["borra_bole_avion"])?$_POST["borra_bole_avion"]:"";
	echo $altaeventos->borra_BOLETOSAVION( $borra_bole_avion );
}
 
 	//EMAIL BOLETOS DE AVION//

if($EMAIL_BOLETOS_AVION ==true){

$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_BOLETOS_AVION=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['boletosavion'])?$_POST['boletosavion']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_BOLETOSAVION, MONTO_BOLETOSAVION, FECHA_BOLETOSAVION ',

'NOMBRE ,MONTO ,FECHA', '04boletosavion',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );



$variables = 'ADJUNTO_BOLETOSAVION, ';
 $cadenacompleta =substr($variables, 0, -2); 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04boletosavion', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );



$html = $altaeventos->html2('RESUMEN DE BOLETOS AVION',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}
 //include_once (__ROOT1__."/includes/crea_funciones.php"); 





//////////////////EGRESOS/////////////////////////////////////////


$pasarpagadoegreso_id= isset($_POST["pasarpagadoegreso_id"])?$_POST["pasarpagadoegreso_id"]:"";
$pasarpagadoegreso_text= isset($_POST["pasarpagadoegreso_text"])?$_POST["pasarpagadoegreso_text"]:"";

if($pasarpagadoegreso_id!='' and ($pasarpagadoegreso_text=='si' or $pasarpagadoegreso_text=='no') ){
echo $altaeventos->actualizapagoegreso ($pasarpagadoegreso_id , $pasarpagadoegreso_text  );

}




if($hpagosegresos1 == 'hpagosegresos1' or $enviarpagosEgreso=='enviarpagosEgreso'){
	
		  	   	   if( $_FILES["ADJUNTO_EGRESO"] == true){
$ADJUNTO_EGRESO = $conexion->solocargar("ADJUNTO_EGRESO");
}if($ADJUNTO_EGRESO=='2' or $ADJUNTO_EGRESO=='' or $ADJUNTO_EGRESO=='1'){
 $ADJUNTO_EGRESO1 = "";	
}else{
 $ADJUNTO_EGRESO1 = $ADJUNTO_EGRESO;
} 	
	
	
$DOCUMENTO_EGRESO = isset($_POST["DOCUMENTO_EGRESO"])?$_POST["DOCUMENTO_EGRESO"]:"";
$MONTO_EGRESO = isset($_POST["MONTO_EGRESO"])?$_POST["MONTO_EGRESO"]:"";
$FE_PAGOE = isset($_POST["FE_PAGOE"])?$_POST["FE_PAGOE"]:"";
$FE_TIMBRADOE = isset($_POST["FE_TIMBRADOE"])?$_POST["FE_TIMBRADOE"]:"";
$MONTO_OTRO = isset($_POST["MONTO_OTRO"])?$_POST["MONTO_OTRO"]:"";
$FECHA_EGRESO = isset($_POST["FECHA_EGRESO"])?$_POST["FECHA_EGRESO"]:"";
$hpagosegresos1 = isset($_POST["hpagosegresos1"])?$_POST["hpagosegresos1"]:""; 
$IpEGRESOS = isset($_POST["IpEGRESOS"])?$_POST["IpEGRESOS"]:""; 


 echo $altaeventos->pagoegreso( $DOCUMENTO_EGRESO, $ADJUNTO_EGRESO,$MONTO_OTRO, $MONTO_EGRESO,$FE_PAGOE,$FE_TIMBRADOE, $FECHA_EGRESO ,$hpagosegresos1, $IpEGRESOS,$enviarpagosEgreso );   
}	 
 //include_once (__ROOT1__."/includes/crea_funciones.php"); 
 
 if($borra_PAGOEGRESOS == 'borra_PAGOEGRESOS' ){

$borra_pago_egre = isset($_POST["borra_pago_egre"])?$_POST["borra_pago_egre"]:"";
	echo $altaeventos->borra_PAGOEGRESOS( $borra_pago_egre );
}
//////////////////EMAIL EGRESOS/////////////////////

if($EMAIL_PAGOS_EGRESOS ==true){

$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_PAGOS_EGRESOS=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['pagoegreso'])?$_POST['pagoegreso']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_EGRESO, MONTO_EGRESO, FECHA_EGRESO ',

'NOMBRE ,MONTO,FECHA', '04pagoegresos',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_EGRESO, ';


 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04pagoegresos', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('RESUMEN DE EGRESOS',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}






//////////////////INGRESOS/////////////////////////////////////////


$pasarpagadoingreso_id= isset($_POST["pasarpagadoingreso_id"])?$_POST["pasarpagadoingreso_id"]:"";
$pasarpagadoingreso_text= isset($_POST["pasarpagadoingreso_text"])?$_POST["pasarpagadoingreso_text"]:"";

if($pasarpagadoingreso_id!='' and ($pasarpagadoingreso_text=='si' or $pasarpagadoingreso_text=='no') ){
echo $altaeventos->actualizapagoingreso ($pasarpagadoingreso_id , $pasarpagadoingreso_text  );
}





   if($hPAGOSINGRESOS1 == 'hPAGOSINGRESOS1' or $enviarpagosingre=='enviarpagosingre'){
	   
		  	   	   if( $_FILES["ADJUNTO_INGRESOS"] == true){
$ADJUNTO_INGRESOS = $conexion->solocargar("ADJUNTO_INGRESOS");
}if($ADJUNTO_INGRESOS=='2' or $ADJUNTO_INGRESOS=='' or $ADJUNTO_INGRESOS=='1'){
 $ADJUNTO_INGRESOS1 = "";	
}else{
 $ADJUNTO_INGRESOS1 = $ADJUNTO_INGRESOS;
}   
	   	   
$DOCUMENTO_INGRESOS = isset($_POST["DOCUMENTO_INGRESOS"])?$_POST["DOCUMENTO_INGRESOS"]:"";
$OBSERVACIONES_INGRESOS = isset($_POST["OBSERVACIONES_INGRESOS"])?$_POST["OBSERVACIONES_INGRESOS"]:"";
$MONTOCON_IVA = isset($_POST["MONTOCON_IVA"])?$_POST["MONTOCON_IVA"]:"";
$FE_PAGOI = isset($_POST["FE_PAGOI"])?$_POST["FE_PAGOI"]:"";
$FE_TIMBRADO = isset($_POST["FE_TIMBRADO"])?$_POST["FE_TIMBRADO"]:"";
$FECHA_INGRESOS = isset($_POST["FECHA_INGRESOS"])?$_POST["FECHA_INGRESOS"]:"";
$hPAGOSINGRESOS1 = isset($_POST["hPAGOSINGRESOS1"])?$_POST["hPAGOSINGRESOS1"]:"";
$IpINGRESOS = isset($_POST["IpINGRESOS"])?$_POST["IpINGRESOS"]:""; 	
   
		echo $altaeventos->pagoingreso(  $DOCUMENTO_INGRESOS ,$ADJUNTO_INGRESOS, $OBSERVACIONES_INGRESOS, $MONTOCON_IVA,$FE_PAGOI,$FE_TIMBRADO,$FECHA_INGRESOS , $hPAGOSINGRESOS1,$IpINGRESOS,$enviarpagosingre );   
}	 
 
 if($borra_PAGOSINGRESOS == 'borra_PAGOSINGRESOS' ){

$borra_cobros_INGRE = isset($_POST["borra_cobros_INGRE"])?$_POST["borra_cobros_INGRE"]:"";
	echo $altaeventos->borra_PAGOSINGRESOS( $borra_cobros_INGRE );
}   

  //////////////EMAIL INGRESOS//////////////
if($EMAIL_PAGOS_INGRESOS ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_PAGOS_INGRESOS=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['pagoingreso'])?$_POST['pagoingreso']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_INGRESOS, OBSERVACIONES_INGRESOS, FECHA_INGRESOS ',

'NOMBRE ,MONTO,FECHA', '04pagosingresos',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_INGRESOS, ';
//DOCUMENTO_COBROS trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04pagosingresos', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('RESUMEN DE INGRESOS',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}	   
	   

 //include_once (__ROOT1__."/includes/crea_funciones.php"); 
   








//////////////////////////////CHECK LIST/////////////////////////
  if($hCOBROSCLIENTE == 'hCOBROSCLIENTE' or $enviarcobroscliente=='enviarcobroscliente'){
	  
	  	   	   if( $_FILES["ADJUNTO_COBROS"] == true){
$ADJUNTO_COBROS = $conexion->solocargar("ADJUNTO_COBROS");
}if($ADJUNTO_COBROS=='2' or $ADJUNTO_COBROS=='' or $ADJUNTO_COBROS=='1'){
 $ADJUNTO_COBROS1 = "";	
}else{
 $ADJUNTO_COBROS1 = $ADJUNTO_COBROS;
}
	  
$DOCUMENTO_COBROS = isset($_POST["DOCUMENTO_COBROS"])?$_POST["DOCUMENTO_COBROS"]:"";
$OBSERVACIONES_COBROS = isset($_POST["OBSERVACIONES_COBROS"])?$_POST["OBSERVACIONES_COBROS"]:"";
$FECHA_COBROS = isset($_POST["FECHA_COBROS"])?$_POST["FECHA_COBROS"]:"";
$hCOBROSCLIENTE = isset($_POST["hCOBROSCLIENTE"])?$_POST["hCOBROSCLIENTE"]:""; 


	  
	echo $altaeventos->cobroscliente( $DOCUMENTO_COBROS ,$ADJUNTO_COBROS1, $OBSERVACIONES_COBROS , $FECHA_COBROS , $hCOBROSCLIENTE,$Ipcobroscliente,$enviarcobroscliente );
	  
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 
   
  
 }
elseif($EMAIL_COBROS_CLIENTES ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_COBROS_CLIENTES=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['cobrosclientes'])?$_POST['cobrosclientes']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_COBROS, OBSERVACIONES_COBROS, FECHA_COBROS ',

'NOMBRE ,OBSERVACIONES,FECHA', '04cobroscliente',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_COBROS, ';
//DOCUMENTO_COBROS trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04cobroscliente', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('COBROS AL CLIENTE ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}
 
 
 
 
 if($borra_COBROSCLIENTE == 'borra_COBROSCLIENTE' ){

$borra_cobros_C = isset($_POST["borra_cobros_C"])?$_POST["borra_cobros_C"]:"";
	echo $altaeventos->borra_COBROSCLIENTE( $borra_cobros_C );
}







  
   if($hCRONOTERRESTRE == 'hCRONOTERRESTRE' or $enviarcronoterre=='enviarcronoterre'){
	   
	   
	   	   if( $_FILES["ADJUNTO_cronoterrestre"] == true){
$ADJUNTO_cronoterrestre = $conexion->solocargar("ADJUNTO_cronoterrestre");
}if($ADJUNTO_cronoterrestre=='2' or $ADJUNTO_cronoterrestre=='' or $ADJUNTO_cronoterrestre=='1'){
 $ADJUNTO_cronoterrestre1 = "";	
}else{
 $ADJUNTO_cronoterrestre1 = $ADJUNTO_cronoterrestre;
}
	
	   
$DOCUMENTO_cronoterrestre = isset($_POST["DOCUMENTO_cronoterrestre"])?$_POST["DOCUMENTO_cronoterrestre"]:"";
$OBSERVACIONES_cronoterrestre = isset($_POST["OBSERVACIONES_cronoterrestre"])?$_POST["OBSERVACIONES_cronoterrestre"]:"";
$FECHA_cronoterrestre = isset($_POST["FECHA_cronoterrestre"])?$_POST["FECHA_cronoterrestre"]:"";
$hCRONOTERRESTRE = isset($_POST["hCRONOTERRESTRE"])?$_POST["hCRONOTERRESTRE"]:"";
$Ipcronoterrestre = isset($_POST["Ipcronoterrestre"])?$_POST["Ipcronoterrestre"]:""; 

	   echo $altaeventos->CRONOterrestre ( $DOCUMENTO_cronoterrestre , $ADJUNTO_cronoterrestre1 ,$OBSERVACIONES_cronoterrestre , $FECHA_cronoterrestre , $hCRONOTERRESTRE,$Ipcronoterrestre,$enviarcronoterre );
}


elseif($EMAIL_cronoterrestre ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_cronoterrestre=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['cronoterrestre'])?$_POST['cronoterrestre']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_cronoterrestre, OBSERVACIONES_cronoterrestre, FECHA_cronoterrestre ',

'NOMBRE ,OBSERVACIONES,FECHA', '04cronoterrestre',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_cronoterrestre, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04cronoterrestre', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('CRONOLOGICO DE TRANSPORTACIÓN TERRESTRE ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 


if($borra_CRONOSTERRRE == 'borra_CRONOSTERRRE' ){

$borra_cronos_T = isset($_POST["borra_cronos_T"])?$_POST["borra_cronos_T"]:"";
	echo $altaeventos->borra_CRONOSTERRRE( $borra_cronos_T );
}
	
    //include_once (__ROOT1__."/includes/crea_funciones.php"); 
   
	 
                                                                   
   if($hCRONOVUELOS1 == 'hCRONOVUELOS1' OR $enviarCRONOSVUELOS=='enviarCRONOSVUELOS'){
	   
	   if( $_FILES["ADJUNTO_CRONOVUELOS"] == true){
$ADJUNTO_CRONOVUELOS = $conexion->solocargar("ADJUNTO_CRONOVUELOS");
}if($ADJUNTO_CRONOVUELOS=='2' or $ADJUNTO_CRONOVUELOS=='' or $ADJUNTO_CRONOVUELOS=='1'){
 $ADJUNTO_CRONOVUELOS1 = "";	
}else{
 $ADJUNTO_CRONOVUELOS1 = $ADJUNTO_CRONOVUELOS;
}
	   
$DOCUMENTO_CRONOVUELOS = isset($_POST["DOCUMENTO_CRONOVUELOS"])?$_POST["DOCUMENTO_CRONOVUELOS"]:"";
$OBSERVACIONES_CRONOVUELOS = isset($_POST["OBSERVACIONES_CRONOVUELOS"])?$_POST["OBSERVACIONES_CRONOVUELOS"]:"";
$FECHA_CRONOVUELOS = isset($_POST["FECHA_CRONOVUELOS"])?$_POST["FECHA_CRONOVUELOS"]:"";
$hCRONOVUELOS1 = isset($_POST["hCRONOVUELOS1"])?$_POST["hCRONOVUELOS1"]:""; 
$Icronosvuelos = isset($_POST["Icronosvuelos"])?$_POST["Icronosvuelos"]:""; 


	   echo $altaeventos->CRONOVUELOS ($DOCUMENTO_CRONOVUELOS ,$OBSERVACIONES_CRONOVUELOS,$ADJUNTO_CRONOVUELOS1 , $FECHA_CRONOVUELOS , $hCRONOVUELOS1,$Icronosvuelos,$enviarCRONOSVUELOS);
    //include_once (__ROOT1__."/includes/crea_funciones.php"); 
}
/*PARA ENVIAR EMAIL*/

elseif($EMAIL_CRNO_VUELOS ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_CRNO_VUELOS=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['cronovuelos'])?$_POST['cronovuelos']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_CRONOVUELOS, OBSERVACIONES_CRONOVUELOS, FECHA_CRONOVUELOS ',

'NOMBRE ,OBSERVACIONES,FECHA', '04cronologicovuelos',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_CRONOVUELOS, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04cronologicovuelos', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('CRONOLOGICO DE VUELOS ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 



if($borra_CRONOSV == 'borra_CRONOSV' ){

$borra_cronosvuelos = isset($_POST["borra_cronosvuelos"])?$_POST["borra_cronosvuelos"]:"";
	echo $altaeventos->borra_CRONOSV( $borra_cronosvuelos );
}







	   
  //include_once (__ROOT1__."/includes/crea_funciones.php");  


   
//enviarROOMINGLISTOV
if($borraROOMING=='borraROOMING'){
$borra_ROOMING_ID = isset($_POST["borra_ROOMING_ID"])?$_POST["borra_ROOMING_ID"]:"";
	   echo $altaeventos->borra_rooming ($borra_ROOMING_ID);
}

if($hROOMING =='hROOMING' OR $enviarROOMINGLISTOV=='enviarROOMINGLISTOV'){
//DOCUMENTO_ROOMING
$DOCUMENTO_ROOMING = isset($_POST["DOCUMENTO_ROOMING"])?$_POST["DOCUMENTO_ROOMING"]:"";
$OBSERVACIONES_ROOMING = isset($_POST["OBSERVACIONES_ROOMING"])?$_POST["OBSERVACIONES_ROOMING"]:"";
$FECHA_ROOMING = isset($_POST["FECHA_ROOMING"])?$_POST["FECHA_ROOMING"]:"";
$iproominglinst = isset($_POST["iproominglinst"])?$_POST["iproominglinst"]:"";
	if( $_FILES["ADJUNTO_ROOMING"] == true){
$ADJUNTO_ROOMING = $conexion->solocargar("ADJUNTO_ROOMING");
}if($ADJUNTO_ROOMING=='2' or $ADJUNTO_ROOMING=='' or $ADJUNTO_ROOMING=='1'){
 $ADJUNTO_ROOMING1 = "";	
}else{
 $ADJUNTO_ROOMING1 = $ADJUNTO_ROOMING;
}

	   echo $altaeventos->guarda_rooming ($ADJUNTO_ROOMING1,$DOCUMENTO_ROOMING , $OBSERVACIONES_ROOMING , $FECHA_ROOMING , $enviarROOMINGLISTOV,$ipROOMINGLISTOV);	
    // include_once (__ROOT1__."/includes/crea_funciones.php"); 
	//04roominglist
	
}

elseif($EMAIL_rooming ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_rooming=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['rooming'])?$_POST['rooming']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_ROOMING, OBSERVACIONES_ROOMING, FECHA_ROOMING ',

'NOMBRE ,OBSERVACIONES,FECHA', '04roominglist',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_ROOMING, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04roominglist', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('ROOMING LIST ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 




if($borraOPERATIVO =='borraOPERATIVO'){
	
$borra_ID_OPERATIVO	 = isset($_POST["borra_ID_OPERATIVO"])?$_POST["borra_ID_OPERATIVO"]:"";
//borra_ID_OPERATIVO
	   echo $altaeventos->borra_programaoperativo ( $borra_ID_OPERATIVO);	
    // include_once (__ROOT1__."/includes/crea_funciones.php"); 
}

if($hPROGRAMAOPERATIVO =='hPROGRAMAOPERATIVO' OR $enviarOPERATIVO =='enviarOPERATIVO'){


$OBSERVACIONES_PROGRAMAOPERATIVO = isset($_POST["OBSERVACIONES_PROGRAMAOPERATIVO"])?$_POST["OBSERVACIONES_PROGRAMAOPERATIVO"]:"";
$FECHA_PROGRAMAOPERATIVO = isset($_POST["FECHA_PROGRAMAOPERATIVO"])?$_POST["FECHA_PROGRAMAOPERATIVO"]:"";
$hPROGRAMAOPERATIVO = isset($_POST["hPROGRAMAOPERATIVO"])?$_POST["hPROGRAMAOPERATIVO"]:""; 
$DOCUMENTO_PROGRAMAOPERATIVO = isset($_POST["DOCUMENTO_PROGRAMAOPERATIVO"])?$_POST["DOCUMENTO_PROGRAMAOPERATIVO"]:""; 
	if( $_FILES["ADJUNTO_PROGRAMAOPERATIVO"] == true){
$ADJUNTO_PROGRAMAOPERATIVO = $conexion->solocargar("ADJUNTO_PROGRAMAOPERATIVO");
}if($ADJUNTO_PROGRAMAOPERATIVO=='2' or $ADJUNTO_PROGRAMAOPERATIVO=='' or $ADJUNTO_PROGRAMAOPERATIVO=='1'){
 $ADJUNTO_PROGRAMAOPERATIVO1 = "";	
}else{
 $ADJUNTO_PROGRAMAOPERATIVO1 = $ADJUNTO_PROGRAMAOPERATIVO;
}	

echo $altaeventos->guarda_programaoperativo ($ADJUNTO_PROGRAMAOPERATIVO1, $DOCUMENTO_PROGRAMAOPERATIVO , $OBSERVACIONES_PROGRAMAOPERATIVO , $FECHA_PROGRAMAOPERATIVO , $hPROGRAMAOPERATIVO, $ipPROGRAMAOPERATIVO,$enviarOPERATIVO );   
   //  include_once (__ROOT1__."/includes/crea_funciones.php");  
}


elseif($EMAIL_PROGRAMA_OPERATIVO ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_PROGRAMA_OPERATIVO=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['programaOPERA'])?$_POST['programaOPERA']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_PROGRAMAOPERATIVO, OBSERVACIONES_PROGRAMAOPERATIVO, FECHA_PROGRAMAOPERATIVO ',

'NOMBRE ,OBSERVACIONES,FECHA', '04programaoperativo',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_PROGRAMAOPERATIVO, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04programaoperativo', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('PROGRAMA OPERATIVO ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 

if($INICIALES_EMPRESA_EVENTO1 ==true){
	ECHO $_SESSION['INICIALES_EMPRESA_EVENTO1']=$INICIALES_EMPRESA_EVENTO1;
	}


if($hnuevodocucierre == 'hnuevodocucierre' or $enviarCIERRENUEVO =='enviarCIERRENUEVO' ){
	//enviarCIERRENUEVO
	
$nuevo_documento_cierre = isset($_POST["nuevo_documento_cierre"])?$_POST["nuevo_documento_cierre"]:"";
$hnuevodocucierre = isset($_POST["hnuevodocucierre"])?$_POST["hnuevodocucierre"]:""; 	
$IPCIERRENUEVO = isset($_POST["IPCIERRENUEVO"])?$_POST["IPCIERRENUEVO"]:""; 	
   echo $altaeventos->NUEVODOCUCIERRE ($nuevo_documento_cierre , $hnuevodocucierre,$enviarCIERRENUEVO,$IPCIERRENUEVO);
   
     //include_once (__ROOT1__."/includes/crea_funciones.php");  
//echo "asdfasdf";

 }	 
   elseif($BORRAREGISTRO_cierrenuevo == 'BORRAREGISTRO_cierrenuevo'){
	$borra_NUEVOD = isset($_POST["borra_NUEVOD"])?$_POST["borra_NUEVOD"]:"";
		
	echo $altaeventos->BORRAREGISTRO_cierrenuevo($borra_NUEVOD);
	 
	
  //include_once (__ROOT1__."/includes/crea_funciones.php");  
} 



if($hCIERRE == 'hCIERRE' or $enviarCIERRE=='enviarCIERRE'){
	
	if( $_FILES["adjunto_cierre"] == true){
 $adjunto_cierre = $conexion->solocargar("adjunto_cierre");
}if($adjunto_cierre=='2' or $adjunto_cierre=='' or $adjunto_cierre=='1'){
 $adjunto_cierre1 = "";	
}else{
 $adjunto_cierre1 = $adjunto_cierre;
}	



$DOCUMENTO_cierre = isset($_POST["DOCUMENTO_cierre"])?$_POST["DOCUMENTO_cierre"]:"";
$OBSERVACIONES_cierre = isset($_POST["OBSERVACIONES_cierre"])?$_POST["OBSERVACIONES_cierre"]:"";
$fecha_cierre = isset($_POST["fecha_cierre"])?$_POST["fecha_cierre"]:"";
$IPCIERRE2 = isset($_POST["IPCIERRE2"])?$_POST["IPCIERRE2"]:"";

	echo $altaeventos->guardar_cierre(  $DOCUMENTO_cierre , $OBSERVACIONES_cierre , $fecha_cierre ,$adjunto_cierre1, $hCIERRE, $IPCIERRE2,$enviarCIERRE);
		// include_once (__ROOT1__."/includes/crea_funciones.php");
//echo "entro";
}

elseif($EMAIL_cierre_e ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_cierre_e=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['cierre'])?$_POST['cierre']:'';
//print_r('ppppp'.$array);
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('DOCUMENTO_cierre, OBSERVACIONES_cierre, fecha_cierre ',

'NOMBRE ,OBSERVACIONES,FECHA', '04cierre',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );

$variables = 'adjunto_cierre, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04cierre', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );

$html = $altaeventos->html2('CIERRE ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];

$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 


if($borraCIERRE == 'borraCIERRE' ){

$borra_CIERREID = isset($_POST["borra_CIERREID"])?$_POST["borra_CIERREID"]:"";
	echo $altaeventos->BORRAREGISTRO_cierre( $borra_CIERREID );
}




if($busqueda==true){

	 $resultado = $altaeventos->buscarnumero($busqueda);
	 echo json_encode($resultado);
}

if($hALTAEVENTOS == 'hALTAEVENTOS' ){
$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
$FECHA_ALTA_EVENTO = isset($_POST["FECHA_ALTA_EVENTO"])?$_POST["FECHA_ALTA_EVENTO"]:"";
$STATUS_EVENTO = isset($_POST["STATUS_EVENTO"])?$_POST["STATUS_EVENTO"]:"";
$FECHA_AUTORIZACION_EVENTO = isset($_POST["FECHA_AUTORIZACION_EVENTO"])?$_POST["FECHA_AUTORIZACION_EVENTO"]:"";
$MONTOC_TOTAL_EVENTO = isset($_POST["MONTOC_TOTAL_EVENTO"])?$_POST["MONTOC_TOTAL_EVENTO"]:"";
$MONTO_TOTAL_AVION = isset($_POST["MONTO_TOTAL_AVION"])?$_POST["MONTO_TOTAL_AVION"]:"";
$CANTIDAD_PORCENTAJEV = isset($_POST["CANTIDAD_PORCENTAJEV"])?$_POST["CANTIDAD_PORCENTAJEV"]:"";
$FEE_COBRADO = isset($_POST["FEE_COBRADO"])?$_POST["FEE_COBRADO"]:"";
$PORCENTAJE_FEE = isset($_POST["PORCENTAJE_FEE"])?$_POST["PORCENTAJE_FEE"]:"";
$MONTO_TOTAL_DEL_EVENTO = isset($_POST["MONTO_TOTAL_DEL_EVENTO"])?$_POST["MONTO_TOTAL_DEL_EVENTO"]:"";
$NOMBRE_COMERCIAL_EVENTO = isset($_POST["NOMBRE_COMERCIAL_EVENTO"])?$_POST["NOMBRE_COMERCIAL_EVENTO"]:"";
$NOMBRE_FISCAL_EVENTO = isset($_POST["NOMBRE_FISCAL_EVENTO"])?$_POST["NOMBRE_FISCAL_EVENTO"]:"";
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:"";
$NOMBRE_CORTO_EVENTO = isset($_POST["NOMBRE_CORTO_EVENTO"])?$_POST["NOMBRE_CORTO_EVENTO"]:"";
$NOMBRE_CONTACTO_EVENTO = isset($_POST["NOMBRE_CONTACTO_EVENTO"])?$_POST["NOMBRE_CONTACTO_EVENTO"]:"";
$CELULAR_CONTACTO_1 = isset($_POST["CELULAR_CONTACTO_1"])?$_POST["CELULAR_CONTACTO_1"]:"";
$CORREO_CONTACTO_1 = isset($_POST["CORREO_CONTACTO_1"])?$_POST["CORREO_CONTACTO_1"]:"";
$AREA_CONTACTO_CLIENTE = isset($_POST["AREA_CONTACTO_CLIENTE"])?$_POST["AREA_CONTACTO_CLIENTE"]:"";
$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"])?$_POST["OBSERVACIONES_1"]:"";
$TIPO_DE_EVENTO = isset($_POST["TIPO_DE_EVENTO"])?$_POST["TIPO_DE_EVENTO"]:"";
$FORMATO_EVENTO = isset($_POST["FORMATO_EVENTO"])?$_POST["FORMATO_EVENTO"]:"";
$PAIS_DEL_EVENTO = isset($_POST["PAIS_DEL_EVENTO"])?$_POST["PAIS_DEL_EVENTO"]:"";
$CIUDAD_DEL_EVENTO = isset($_POST["CIUDAD_DEL_EVENTO"])?$_POST["CIUDAD_DEL_EVENTO"]:"";
$HOTEL_LUGAR = isset($_POST["HOTEL_LUGAR"])?$_POST["HOTEL_LUGAR"]:"";
$NUMERO_DE_PERSONAS = isset($_POST["NUMERO_DE_PERSONAS"])?$_POST["NUMERO_DE_PERSONAS"]:"";
$FECHA_INICIO_EVENTO = isset($_POST["FECHA_INICIO_EVENTO"])?$_POST["FECHA_INICIO_EVENTO"]:"";
$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"])?$_POST["NOMBRE_COMERCIAL"]:"";
$FECHA_FINAL_EVENTO = isset($_POST["FECHA_FINAL_EVENTO"])?$_POST["FECHA_FINAL_EVENTO"]:"";
$HORA_TERMINO_EVENTO = isset($_POST["HORA_TERMINO_EVENTO"])?$_POST["HORA_TERMINO_EVENTO"]:"";
$FECHA_LLEGADA_STAFF = isset($_POST["FECHA_LLEGADA_STAFF"])?$_POST["FECHA_LLEGADA_STAFF"]:"";
$HORA_LLEGADA_STAFF = isset($_POST["HORA_LLEGADA_STAFF"])?$_POST["HORA_LLEGADA_STAFF"]:"";
$FECHA_REGRESO_STAFF = isset($_POST["FECHA_REGRESO_STAFF"])?$_POST["FECHA_REGRESO_STAFF"]:"";
$HORA_REGRESO_STAFF = isset($_POST["HORA_REGRESO_STAFF"])?$_POST["HORA_REGRESO_STAFF"]:"";
$MATERIAL_EQUIPO_BODEGA = isset($_POST["MATERIAL_EQUIPO_BODEGA"])?$_POST["MATERIAL_EQUIPO_BODEGA"]:"";
$FECHA_INICIO_MONTAJE = isset($_POST["FECHA_INICIO_MONTAJE"])?$_POST["FECHA_INICIO_MONTAJE"]:"";
$HORA_INICIO_MONTAJE = isset($_POST["HORA_INICIO_MONTAJE"])?$_POST["HORA_INICIO_MONTAJE"]:"";
$FECHA_DESMONTAJE = isset($_POST["FECHA_DESMONTAJE"])?$_POST["FECHA_DESMONTAJE"]:"";
$HORA_DESMONTAJE = isset($_POST["HORA_DESMONTAJE"])?$_POST["HORA_DESMONTAJE"]:"";
$LUGAR_MONTAJE = isset($_POST["LUGAR_MONTAJE"])?$_POST["LUGAR_MONTAJE"]:"";
$SERVICIO_OTORGAR = isset($_POST["SERVICIO_OTORGAR"])?$_POST["SERVICIO_OTORGAR"]:"";
$MONEDAS = isset($_POST["MONEDAS"])?$_POST["MONEDAS"]:"";
$NOMBRE_VENDEDOR = isset($_POST["NOMBRE_VENDEDOR"])?$_POST["NOMBRE_VENDEDOR"]:"";
$NOMBRE_EJECUTIVOEVENTO = isset($_POST["NOMBRE_EJECUTIVOEVENTO"])?$_POST["NOMBRE_EJECUTIVOEVENTO"]:"";
$CIERRE_TOTAL = isset($_POST["CIERRE_TOTAL"])?$_POST["CIERRE_TOTAL"]:"";
$TOTAL_AVION_SINIVA = isset($_POST["TOTAL_AVION_SINIVA"])?$_POST["TOTAL_AVION_SINIVA"]:"";
$NOMBRE_INGRESO = isset($_POST["NOMBRE_INGRESO"])?$_POST["NOMBRE_INGRESO"]:"";
$hALTAEVENTOS = isset($_POST["hALTAEVENTOS"])?$_POST["hALTAEVENTOS"]:""; 
$IPaltaeventos = isset($_POST["IPaltaeventos"])?$_POST["IPaltaeventos"]:"";

	
   echo $altaeventos->altaeventos ($NUMERO_EVENTO,$FECHA_ALTA_EVENTO , $STATUS_EVENTO , $FECHA_AUTORIZACION_EVENTO , $MONTOC_TOTAL_EVENTO , $MONTO_TOTAL_AVION ,$CANTIDAD_PORCENTAJEV,$FEE_COBRADO, $PORCENTAJE_FEE,$MONTO_TOTAL_DEL_EVENTO , $NOMBRE_COMERCIAL_EVENTO , $NOMBRE_FISCAL_EVENTO , $NOMBRE_EVENTO , $NOMBRE_CORTO_EVENTO , $NOMBRE_CONTACTO_EVENTO , $CELULAR_CONTACTO_1 , $CORREO_CONTACTO_1 , $AREA_CONTACTO_CLIENTE , $OBSERVACIONES_1 , $TIPO_DE_EVENTO , $FORMATO_EVENTO , $PAIS_DEL_EVENTO , $CIUDAD_DEL_EVENTO , $HOTEL_LUGAR , $NUMERO_DE_PERSONAS , $FECHA_INICIO_EVENTO , $NOMBRE_COMERCIAL , $FECHA_FINAL_EVENTO , $HORA_TERMINO_EVENTO , $FECHA_LLEGADA_STAFF , $HORA_LLEGADA_STAFF , $FECHA_REGRESO_STAFF , $HORA_REGRESO_STAFF , $MATERIAL_EQUIPO_BODEGA, $FECHA_INICIO_MONTAJE, $HORA_INICIO_MONTAJE, $FECHA_DESMONTAJE,$HORA_DESMONTAJE, $LUGAR_MONTAJE,$SERVICIO_OTORGAR,$MONEDAS,$NOMBRE_VENDEDOR,$NOMBRE_EJECUTIVOEVENTO,$CIERRE_TOTAL,$TOTAL_AVION_SINIVA,$NOMBRE_INGRESO,$hALTAEVENTOS,$enviaraltaeventos, $borraraltaeventos,$IPaltaeventos);
	
//include_once (__ROOT1__."/includes/crea_funciones.php");

}


elseif($EMAIL_ALTA_EVENTOS1 ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_ALTA_EVENTOS1=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
//$array = isset($_POST['cronovuelos'])?$_POST['cronovuelos']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	//echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('STATUS_EVENTO, NUMERO_EVENTO, FECHA_ALTA_EVENTO ',

'NOMBRE ,OBSERVACIONES,FECHA', '04altaeventos',  " where id = '".$_SESSION['idevento']."' "/*nuevo*/ );

$variables = 'SUBIR_COTIZACION, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04EVENTOSfotos', " where idRelacion = '".$_SESSION['idevento']."' " );

$html = $altaeventos->html2('ALTA DE EVENTOS ',$MANDA_INFORMACION );

$smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
$idlogo = $smtp['idRelacion'];
$logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);

$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
} 


  
    elseif($borraraltaeventos == 'borraraltaeventos'){
	$borra_ALTAE = isset($_POST["borra_ALTAE"])?$_POST["borra_ALTAE"]:"";
		
	echo $altaeventos->borraraltaeventos($borra_ALTAE);
	  
}
  
    elseif($borrafoto == 'borrafoto'){
	$borra_fotoid = isset($_POST["borra_fotoid"])?$_POST["borra_fotoid"]:"";

	echo $altaeventos->borrafoto($borra_fotoid);
}

elseif($hnumeroevento == 'hnumeroevento' ){
$NUMERO_EVENTO_COLABORADOR = isset($_POST["NUMERO_EVENTO_COLABORADOR"])?$_POST["NUMERO_EVENTO_COLABORADOR"]:"";
$INICIALES_EMPRESA_EVENTO = isset($_POST["INICIALES_EMPRESA_EVENTO"])?$_POST["INICIALES_EMPRESA_EVENTO"]:"";
$NUMERO_DE_EVENTO = isset($_POST["NUMERO_DE_EVENTO"])?$_POST["NUMERO_DE_EVENTO"]:"";
$FECHA_NUMERO_EVENTO = isset($_POST["FECHA_NUMERO_EVENTO"])?$_POST["FECHA_NUMERO_EVENTO"]:"";
$hnumeroevento = isset($_POST["hnumeroevento"])?$_POST["hnumeroevento"]:""; 	
		
		
	echo $altaeventos->numeroevento ($NUMERO_EVENTO_COLABORADOR , $INICIALES_EMPRESA_EVENTO , $NUMERO_DE_EVENTO , $FECHA_NUMERO_EVENTO , $hnumeroevento );
				
	  //include_once (__ROOT1__."/includes/crea_funciones.php");

}





/////////////////////////COTIZACION DE PROVEEDORES////////////////////////////////////////


if($hCOTIPRO == 'hCOTIPRO' or $enviarCOTIPRO=='enviarCOTIPRO'){
	
	
	if( $_FILES["ADJUNTO_COTIPRO"] == true){
	$ADJUNTO_COTIPRO = $conexion->solocargar("ADJUNTO_COTIPRO");
	}if($ADJUNTO_COTIPRO=='2' or $ADJUNTO_COTIPRO=='' or $ADJUNTO_COTIPRO=='1'){
	$ADJUNTO_COTIPRO1 = "";	
	}else{
	$ADJUNTO_COTIPRO1 = $ADJUNTO_COTIPRO;
				 }
	   				 
   $NOMBRE_PROVEEDOR = isset($_POST["NOMBRE_PROVEEDOR"])?$_POST["NOMBRE_PROVEEDOR"]:"";
   $DOCUMENTO_COTIPRO = isset($_POST["DOCUMENTO_COTIPRO"])?$_POST["DOCUMENTO_COTIPRO"]:"";
   $OBSERVACIONES_COTIPRO = isset($_POST["OBSERVACIONES_COTIPRO"])?$_POST["OBSERVACIONES_COTIPRO"]:"";
   $FECHA_COTIPRO = isset($_POST["FECHA_COTIPRO"])?$_POST["FECHA_COTIPRO"]:"";
   $hCOTIPRO = isset($_POST["hCOTIPRO"])?$_POST["hCOTIPRO"]:""; 
				 
				 
					 
   echo $altaeventos->COTIPRO( $NOMBRE_PROVEEDOR,$DOCUMENTO_COTIPRO ,$ADJUNTO_COTIPRO1, $OBSERVACIONES_COTIPRO , $FECHA_COTIPRO , $hCOTIPRO,$IpCOTIPRO,$enviarCOTIPRO );
				 
					
				   
   }
   
   elseif($EMAIL_COTIPRO ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_COTIPRO=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['cotipro'])?$_POST['cotipro']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('NOMBRE_PROVEEDOR,DOCUMENTO_COTIPRO, OBSERVACIONES_COTIPRO, FECHA_COTIPRO ',
				 
   'NOMBRE PROVEEDOR,MONTO, OBSERVACIONES,FECHA', '04cotizacionproveedores',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'ADJUNTO_COTIPRO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04cotizacionproveedores', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('COTIZACIÓN DE PROVEEDORES ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }  
					 
	if($borra_COTIPRO == 'borra_COTIPRO' ){
				 
   $borra_cotipro = isset($_POST["borra_cotipro"])?$_POST["borra_cotipro"]:"";
   echo $altaeventos->borra_COTIPRO( $borra_cotipro );
   }	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  



/////////////////////////COTIZACION DE CLIENTES////////////////////////////////////////


if($hCOTICLIENTES == 'hCOTICLIENTES' or $enviarCOTICLIENTES=='enviarCOTICLIENTES'){
	
	
	if( $_FILES["ADJUNTO_COTICLIENTES"] == true){
	$ADJUNTO_COTICLIENTES = $conexion->solocargar("ADJUNTO_COTICLIENTES");
	}if($ADJUNTO_COTICLIENTES=='2' or $ADJUNTO_COTICLIENTES=='' or $ADJUNTO_COTICLIENTES=='1'){
	$ADJUNTO_COTICLIENTES1 = "";	
	}else{
	$ADJUNTO_COTICLIENTES1 = $ADJUNTO_COTICLIENTES;
				 }
   $NOMBRE_COTIZACION = isset($_POST["NOMBRE_COTIZACION"])?$_POST["NOMBRE_COTIZACION"]:"";	   				 
   $NOMBRE_CLIENTES = isset($_POST["NOMBRE_CLIENTES"])?$_POST["NOMBRE_CLIENTES"]:"";
   $DOCUMENTO_COTICLIENTES = isset($_POST["DOCUMENTO_COTICLIENTES"])?$_POST["DOCUMENTO_COTICLIENTES"]:"";

   $OBSERVACIONES_COTICLIENTES = isset($_POST["OBSERVACIONES_COTICLIENTES"])?$_POST["OBSERVACIONES_COTICLIENTES"]:"";
   $FECHA_COTICLIENTES = isset($_POST["FECHA_COTICLIENTES"])?$_POST["FECHA_COTICLIENTES"]:"";
   $hCOTICLIENTES = isset($_POST["hCOTICLIENTES"])?$_POST["hCOTICLIENTES"]:""; 
				 
				 
					 
   echo $altaeventos->COTICLIENTES($NOMBRE_COTIZACION,$NOMBRE_CLIENTES, $DOCUMENTO_COTICLIENTES,$ADJUNTO_COTICLIENTES1, $OBSERVACIONES_COTICLIENTES, $FECHA_COTICLIENTES, $hCOTICLIENTES, $IpCOTICLIENTES,$enviarCOTICLIENTES );
				 
					
				   
   }
   
   elseif($EMAIL_COTICLIENTES ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_COTICLIENTES=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['cotiCLIENTES'])?$_POST['cotiCLIENTES']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('NOMBRE_CLIENTES,DOCUMENTO_COTICLIENTES, OBSERVACIONES_COTICLIENTES, FECHA_COTICLIENTES ',
				 
   'NOMBRE CLIENTES,MONTO, OBSERVACIONES,FECHA', '04COTICLIENTES',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'ADJUNTO_COTICLIENTES, ';
   //DOCUMENTO_COTICLIENTES trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04COTICLIENTES', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('COTIZACIÓN DE CLIENTES ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }  
					 
	if($borra_COTICLIENTES == 'borra_COTICLIENTES' ){
				 
   $borra_cotiCLIENTES = isset($_POST["borra_cotiCLIENTES"])?$_POST["borra_cotiCLIENTES"]:"";
   echo $altaeventos->borra_COTICLIENTES( $borra_cotiCLIENTES );
   }	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  






///////////////////////// CONTRATO////////////////////////////////////////


if($hCONTRATO == 'hCONTRATO' or $enviarCONTRATO=='enviarCONTRATO'){
	
	
	if( $_FILES["ADJUNTO_CONTRATO"] == true){
	$ADJUNTO_CONTRATO = $conexion->solocargar("ADJUNTO_CONTRATO");
	}if($ADJUNTO_CONTRATO=='2' or $ADJUNTO_CONTRATO=='' or $ADJUNTO_CONTRATO=='1'){
	$ADJUNTO_CONTRATO1 = "";	
	}else{
	$ADJUNTO_CONTRATO1 = $ADJUNTO_CONTRATO;
				 }
   $CONTRATO = isset($_POST["CONTRATO"])?$_POST["CONTRATO"]:"";	   				 
   $NOMBRE_CONTRATO = isset($_POST["NOMBRE_CONTRATO"])?$_POST["NOMBRE_CONTRATO"]:"";
   $DOCUMENTO_CONTRATO = isset($_POST["DOCUMENTO_CONTRATO"])?$_POST["DOCUMENTO_CONTRATO"]:"";

   $OBSERVACIONES_CONTRATO = isset($_POST["OBSERVACIONES_CONTRATO"])?$_POST["OBSERVACIONES_CONTRATO"]:"";
   $FECHA_CONTRATO = isset($_POST["FECHA_CONTRATO"])?$_POST["FECHA_CONTRATO"]:"";
   $hCONTRATO = isset($_POST["hCONTRATO"])?$_POST["hCONTRATO"]:""; 
				 
				 
					 
   echo $altaeventos->CONTRATO($CONTRATO,$NOMBRE_CONTRATO, $DOCUMENTO_CONTRATO,$ADJUNTO_CONTRATO1, $OBSERVACIONES_CONTRATO, $FECHA_CONTRATO, $hCONTRATO, $IpCONTRATO,$enviarCONTRATO );
				 
					
				   
   }
   
   elseif($EMAIL_CONTRATO ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_CONTRATO=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['CONTRATO'])?$_POST['CONTRATO']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('NOMBRE_CONTRATO,DOCUMENTO_CONTRATO, OBSERVACIONES_CONTRATO, FECHA_CONTRATO ',
				 
   'NOMBRE CONTRATO,MONTO, OBSERVACIONES,FECHA', '04CONTRATO',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'ADJUNTO_CONTRATO, ';
   //DOCUMENTO_CONTRATO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04CONTRATO', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('COTIZACIÓN DE CONTRATO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }  
					 
	if($borra_CONTRATO == 'borra_CONTRATO' ){
				 
   $borra_CONTRA = isset($_POST["borra_CONTRA"])?$_POST["borra_CONTRA"]:"";
   echo $altaeventos->borra_CONTRATO( $borra_CONTRA );
   }	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  










if($HVEHICULOSEVE == 'HVEHICULOSEVE' or $enviarVEHICULOSEVE=='enviarVEHICULOSEVE'){
	
 	/*	if( $_FILES["VEHICULOSEVE_FOTO"] == true){
	$VEHICULOSEVE_FOTO = $conexion->solocargar("VEHICULOSEVE_FOTO");
	}if($VEHICULOSEVE_FOTO=='2' or $VEHICULOSEVE_FOTO=='' or $VEHICULOSEVE_FOTO=='1'){
	$VEHICULOSEVE_FOTO1 = "";	
	}else{
	$VEHICULOSEVE_FOTO1 = $VEHICULOSEVE_FOTO;
	//VEHICULOSEVE_FOTO
}*/
$VEHICULOSEVE_VEHICULO = isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
$VEHICULOSEVE_CANTIDAD = isset($_POST["VEHICULOSEVE_CANTIDAD"])?$_POST["VEHICULOSEVE_CANTIDAD"]:"";
$VEHICULOSEVE_ENTREGA = isset($_POST["VEHICULOSEVE_ENTREGA"])?$_POST["VEHICULOSEVE_ENTREGA"]:"";
$VEHICULOSEVE_LUGAR = isset($_POST["VEHICULOSEVE_LUGAR"])?$_POST["VEHICULOSEVE_LUGAR"]:"";
$VEHICULOSEVE_HORA = isset($_POST["VEHICULOSEVE_HORA"])?$_POST["VEHICULOSEVE_HORA"]:"";
$VEHICULOSEVE_DEVOLU = isset($_POST["VEHICULOSEVE_DEVOLU"])?$_POST["VEHICULOSEVE_DEVOLU"]:"";
$VEHICULOSEVE_LUDEVO = isset($_POST["VEHICULOSEVE_LUDEVO"])?$_POST["VEHICULOSEVE_LUDEVO"]:"";
$VEHICULOSEVE_HORADEVO = isset($_POST["VEHICULOSEVE_HORADEVO"])?$_POST["VEHICULOSEVE_HORADEVO"]:"";
$VEHICULOSEVE_SOLICITUD = isset($_POST["VEHICULOSEVE_SOLICITUD"])?$_POST["VEHICULOSEVE_SOLICITUD"]:"";
$VEHICULOSEVE_DIAS = isset($_POST["VEHICULOSEVE_DIAS"])?$_POST["VEHICULOSEVE_DIAS"]:"";
$VEHICULOSEVE_COSTO = isset($_POST["VEHICULOSEVE_COSTO"])?$_POST["VEHICULOSEVE_COSTO"]:"";
$VEHICULOSEVE_IVA = isset($_POST["VEHICULOSEVE_IVA"])?$_POST["VEHICULOSEVE_IVA"]:"";
$VEHICULOSEVE_SUB = isset($_POST["VEHICULOSEVE_SUB"])?$_POST["VEHICULOSEVE_SUB"]:"";
$PRECIOPESOS_SOFTWARE = isset($_POST["PRECIOPESOS_SOFTWARE"])?$_POST["PRECIOPESOS_SOFTWARE"]:"";
$VEHICULOSEVE_OBSERVA = isset($_POST["VEHICULOSEVE_OBSERVA"])?$_POST["VEHICULOSEVE_OBSERVA"]:"";
$HVEHICULOSEVE = isset($_POST["HVEHICULOSEVE"])?$_POST["HVEHICULOSEVE"]:"";
$VEHICULOSEVE_FOTO = isset($_POST["VEHICULOSEVE_FOTO"])?$_POST["VEHICULOSEVE_FOTO"]:"";
$COLORV = isset($_POST["COLORV"])?$_POST["COLORV"]:"";
$PLACASV = isset($_POST["PLACASV"])?$_POST["PLACASV"]:"";
$IpVEHICULOSEVE = isset($_POST["IpVEHICULOSEVE"])?$_POST["IpVEHICULOSEVE"]:""; 

	
	   echo $altaeventos->VEHICULO($VEHICULOSEVE_VEHICULO , $VEHICULOSEVE_CANTIDAD , $VEHICULOSEVE_ENTREGA ,$VEHICULOSEVE_FOTO, $VEHICULOSEVE_LUGAR , $VEHICULOSEVE_HORA , $VEHICULOSEVE_DEVOLU , $VEHICULOSEVE_LUDEVO , $VEHICULOSEVE_HORADEVO , $VEHICULOSEVE_SOLICITUD , $VEHICULOSEVE_DIAS , $VEHICULOSEVE_COSTO , $VEHICULOSEVE_IVA ,$VEHICULOSEVE_SUB , $PRECIOPESOS_SOFTWARE , $VEHICULOSEVE_OBSERVA ,$COLORV,$PLACASV, $HVEHICULOSEVE,$enviarVEHICULOSEVE,$IpVEHICULOSEVE);
  	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  

 }
   elseif($EMAIL_VEHICULOSEVE ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_VEHICULOSEVE=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['VEHICULOSEVE'])?$_POST['VEHICULOSEVE']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('VEHICULOSEVE_VEHICULO,VEHICULOSEVE_CANTIDAD, VEHICULOSEVE_ENTREGA, VEHICULOSEVE_FOTO,VEHICULOSEVE_LUGAR,VEHICULOSEVE_HORA,VEHICULOSEVE_DEVOLU,VEHICULOSEVE_LUDEVO,VEHICULOSEVE_HORADEVO,VEHICULOSEVE_SOLICITUD,VEHICULOSEVE_DIAS,VEHICULOSEVE_COSTO,VEHICULOSEVE_IVA,VEHICULOSEVE_SUB,PRECIOPESOS_SOFTWARE,VEHICULOSEVE_OBSERVA ',
				 
   'VEHÍCULO,CANTIDAD, FECHA DE ENTREGA,FOTO,LUGAR DE ENTREGA,HORA DE ENTREGA,FECHA DE DEVOLUCIÓN,LUGAR DE DEVOLUCIÓN,HORA DE DEVOLUCIÓN,FECHA DE SOLICITUD,DIAS SOLICITADOS,COSTO,SUB TOTAL,I.V.A,TOTAL,OBSERVACIONES', '04vehiculoevento',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'VEHICULOSEVE_FOTO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04vehiculoevento', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('VEHÍCULOS DEL EVENTO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }
   
   
	if($borra_VEHICULOSEVE == 'borra_VEHICULOSEVE' ){
				 
   $borra_vehieve = isset($_POST["borra_vehieve"])?$_POST["borra_vehieve"]:"";
   echo $altaeventos->borra_VEHICULOSEVE( $borra_vehieve );
   }

if($HMATERIAL == 'HMATERIAL' or $enviarMATERIAL=='enviarMATERIAL'){
	

	$MATERIAL_FOTO = isset($_POST["MATERIAL_FOTO"])?$_POST["MATERIAL_FOTO"]:"";
	$MATERIAL_EQUIPO = isset($_POST["MATERIAL_EQUIPO"])?$_POST["MATERIAL_EQUIPO"]:"";
	$MATERIAL_CANTIDAD = isset($_POST["MATERIAL_CANTIDAD"])?$_POST["MATERIAL_CANTIDAD"]:"";
	$MATERIAL_ENTREGA = isset($_POST["MATERIAL_ENTREGA"])?$_POST["MATERIAL_ENTREGA"]:"";
	$MATERIAL_LUGAR = isset($_POST["MATERIAL_LUGAR"])?$_POST["MATERIAL_LUGAR"]:"";
	$MATERIAL_HORA = isset($_POST["MATERIAL_HORA"])?$_POST["MATERIAL_HORA"]:"";
	$MATERIAL_DEVOLU = isset($_POST["MATERIAL_DEVOLU"])?$_POST["MATERIAL_DEVOLU"]:"";
	$MATERIAL_LUDEVO = isset($_POST["MATERIAL_LUDEVO"])?$_POST["MATERIAL_LUDEVO"]:"";
	$MATERIAL_HORADEVO = isset($_POST["MATERIAL_HORADEVO"])?$_POST["MATERIAL_HORADEVO"]:"";
	$MATERIAL_SOLICITUD = isset($_POST["MATERIAL_SOLICITUD"])?$_POST["MATERIAL_SOLICITUD"]:"";
	$MATERIAL_DIAS = isset($_POST["MATERIAL_DIAS"])?$_POST["MATERIAL_DIAS"]:"";
	$MATERIAL_COSTO = isset($_POST["MATERIAL_COSTO"])?$_POST["MATERIAL_COSTO"]:"";
	$MATERIAL_IVA = isset($_POST["MATERIAL_IVA"])?$_POST["MATERIAL_IVA"]:"";
	$MATERIAL_SUB = isset($_POST["MATERIAL_SUB"])?$_POST["MATERIAL_SUB"]:"";
	$MATERIAL_TOTAL = isset($_POST["MATERIAL_TOTAL"])?$_POST["MATERIAL_TOTAL"]:"";
	$MATERIAL_OBSERVA = isset($_POST["MATERIAL_OBSERVA"])?$_POST["MATERIAL_OBSERVA"]:"";
	$HMATERIAL = isset($_POST["HMATERIAL"])?$_POST["HMATERIAL"]:""; 
	$IpMATERIAL = isset($_POST["IpMATERIAL"])?$_POST["IpMATERIAL"]:""; 

	
	   echo $altaeventos->material($MATERIAL_EQUIPO , $MATERIAL_CANTIDAD , $MATERIAL_ENTREGA ,$MATERIAL_FOTO, $MATERIAL_LUGAR , $MATERIAL_HORA , $MATERIAL_DEVOLU , $MATERIAL_LUDEVO , $MATERIAL_HORADEVO , $MATERIAL_SOLICITUD , $MATERIAL_DIAS , $MATERIAL_COSTO , $MATERIAL_IVA ,$MATERIAL_SUB , $MATERIAL_TOTAL , $MATERIAL_OBSERVA , $HMATERIAL,$enviarMATERIAL,$IpMATERIAL);
  	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  

 }
   elseif($EMAIL_MATERIAL ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_MATERIAL=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['MATERIAL'])?$_POST['MATERIAL']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('MATERIAL_EQUIPO,MATERIAL_CANTIDAD, MATERIAL_ENTREGA, MATERIAL_FOTO,MATERIAL_LUGAR,MATERIAL_HORA,MATERIAL_DEVOLU,MATERIAL_LUDEVO,MATERIAL_HORADEVO,MATERIAL_SOLICITUD,MATERIAL_DIAS,MATERIAL_COSTO,MATERIAL_IVA,MATERIAL_SUB,MATERIAL_TOTAL,MATERIAL_OBSERVA ',
				 
   'MATERIAL,CANTIDAD, FECHA DE ENTREGA,FOTO,LUGAR DE ENTREGA,HORA DE ENTREGA,FECHA DE DEVOLUCIÓN,LUGAR DE DEVOLUCIÓN,HORA DE DEVOLUCIÓN,FECHA DE SOLICITUD,DIAS SOLICITADOS,COSTO,SUB TOTAL,I.V.A,TOTAL,OBSERVACIONES', '04materialyequipo',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'MATERIAL_FOTO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04materialyequipo', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('MATERIAL DEL EVENTO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }

	if($borra_MATERIAL == 'borra_MATERIAL' ){
				 
   $borra_materiale = isset($_POST["borra_materiale"])?$_POST["borra_materiale"]:"";
   echo $altaeventos->borra_MATERIAL( $borra_materiale );
   }

if($HPAPELERIA == 'HPAPELERIA' or $enviarPAPELERIA=='enviarPAPELERIA'){
	
 
	$PAPELERIA_EQUIPO = isset($_POST["PAPELERIA_EQUIPO"])?$_POST["PAPELERIA_EQUIPO"]:"";
	$PAPELERIA_FOTO = isset($_POST["PAPELERIA_FOTO"])?$_POST["PAPELERIA_FOTO"]:"";
	$PAPELERIA_CANTIDAD = isset($_POST["PAPELERIA_CANTIDAD"])?$_POST["PAPELERIA_CANTIDAD"]:"";
	$PAPELERIA_ENTREGA = isset($_POST["PAPELERIA_ENTREGA"])?$_POST["PAPELERIA_ENTREGA"]:"";
	$PAPELERIA_LUGAR = isset($_POST["PAPELERIA_LUGAR"])?$_POST["PAPELERIA_LUGAR"]:"";
	$PAPELERIA_HORA = isset($_POST["PAPELERIA_HORA"])?$_POST["PAPELERIA_HORA"]:"";
	$PAPELERIA_DEVOLU = isset($_POST["PAPELERIA_DEVOLU"])?$_POST["PAPELERIA_DEVOLU"]:"";
	$PAPELERIA_LUDEVO = isset($_POST["PAPELERIA_LUDEVO"])?$_POST["PAPELERIA_LUDEVO"]:"";
	$PAPELERIA_HORADEVO = isset($_POST["PAPELERIA_HORADEVO"])?$_POST["PAPELERIA_HORADEVO"]:"";
	$PAPELERIA_SOLICITUD = isset($_POST["PAPELERIA_SOLICITUD"])?$_POST["PAPELERIA_SOLICITUD"]:"";
	$PAPELERIA_DIAS = isset($_POST["PAPELERIA_DIAS"])?$_POST["PAPELERIA_DIAS"]:"";
	$PAPELERIA_COSTO = isset($_POST["PAPELERIA_COSTO"])?$_POST["PAPELERIA_COSTO"]:"";
	$PAPELERIA_IVA = isset($_POST["PAPELERIA_IVA"])?$_POST["PAPELERIA_IVA"]:"";
	$PAPELERIA_SUB = isset($_POST["PAPELERIA_SUB"])?$_POST["PAPELERIA_SUB"]:"";
	$PAPELERIA_TOTAL = isset($_POST["PAPELERIA_TOTAL"])?$_POST["PAPELERIA_TOTAL"]:"";
	$PAPELERIA_OBSERVA = isset($_POST["PAPELERIA_OBSERVA"])?$_POST["PAPELERIA_OBSERVA"]:"";
	$HPAPELERIA = isset($_POST["HPAPELERIA"])?$_POST["HPAPELERIA"]:""; 
	$IpPAPELERIA = isset($_POST["IpPAPELERIA"])?$_POST["IpPAPELERIA"]:""; 

	
	   echo $altaeventos->papeleria($PAPELERIA_EQUIPO , $PAPELERIA_CANTIDAD , $PAPELERIA_ENTREGA ,$PAPELERIA_FOTO, $PAPELERIA_LUGAR , $PAPELERIA_HORA , $PAPELERIA_DEVOLU , $PAPELERIA_LUDEVO , $PAPELERIA_HORADEVO , $PAPELERIA_SOLICITUD , $PAPELERIA_DIAS , $PAPELERIA_COSTO , $PAPELERIA_IVA ,$PAPELERIA_SUB , $PAPELERIA_TOTAL , $PAPELERIA_OBSERVA , $HPAPELERIA,$enviarPAPELERIA,$IpPAPELERIA);
  	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");  

 }
   elseif($EMAIL_PAPELERIA ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_PAPELERIA=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['PAPELERIA'])?$_POST['PAPELERIA']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('PAPELERIA_EQUIPO,PAPELERIA_CANTIDAD, PAPELERIA_ENTREGA,PAPELERIA_FOTO,PAPELERIA_LUGAR,PAPELERIA_HORA,PAPELERIA_DEVOLU,PAPELERIA_LUDEVO,PAPELERIA_HORADEVO,PAPELERIA_SOLICITUD,PAPELERIA_DIAS,PAPELERIA_COSTO,PAPELERIA_IVA,PAPELERIA_SUB,PAPELERIA_TOTAL,PAPELERIA_OBSERVA ',
				 
   'PAPELERIA,CANTIDAD, FECHA DE ENTREGA,FOTO,LUGAR DE ENTREGA,HORA DE ENTREGA,FECHA DE DEVOLUCIÓN,LUGAR DE DEVOLUCIÓN,HORA DE DEVOLUCIÓN,FECHA DE SOLICITUD,DIAS SOLICITADOS,COSTO,SUB TOTAL,I.V.A,TOTAL,OBSERVACIONES', '04papeleria',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'PAPELERIA_FOTO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04papeleria', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('PAPELERIA DEL EVENTO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }
   
	if($borra_PAPELERIA == 'borra_PAPELERIA' ){
				 
   $borra_pape = isset($_POST["borra_pape"])?$_POST["borra_pape"]:"";
   echo $altaeventos->borra_PAPELERIA( $borra_pape );
   }
  




if($HOFICINA == 'HOFICINA' or $enviarOFICINA=='enviarOFICINA'){
	

$OFICINA_EQUIPO = isset($_POST["OFICINA_EQUIPO"])?$_POST["OFICINA_EQUIPO"]:"";
$OFICINA_FOTO = isset($_POST["OFICINA_FOTO"])?$_POST["OFICINA_FOTO"]:"";
$OFICINA_CANTIDAD = isset($_POST["OFICINA_CANTIDAD"])?$_POST["OFICINA_CANTIDAD"]:"";
$OFICINA_ENTREGA = isset($_POST["OFICINA_ENTREGA"])?$_POST["OFICINA_ENTREGA"]:"";
$OFICINA_LUGAR = isset($_POST["OFICINA_LUGAR"])?$_POST["OFICINA_LUGAR"]:"";
$OFICINA_HORA = isset($_POST["OFICINA_HORA"])?$_POST["OFICINA_HORA"]:"";
$OFICINA_DEVOLU = isset($_POST["OFICINA_DEVOLU"])?$_POST["OFICINA_DEVOLU"]:"";
$OFICINA_LUDEVO = isset($_POST["OFICINA_LUDEVO"])?$_POST["OFICINA_LUDEVO"]:"";
$OFICINA_HORADEVO = isset($_POST["OFICINA_HORADEVO"])?$_POST["OFICINA_HORADEVO"]:"";
$OFICINA_SOLICITUD = isset($_POST["OFICINA_SOLICITUD"])?$_POST["OFICINA_SOLICITUD"]:"";
$OFICINA_DIAS = isset($_POST["OFICINA_DIAS"])?$_POST["OFICINA_DIAS"]:"";
$OFICINA_COSTO = isset($_POST["OFICINA_COSTO"])?$_POST["OFICINA_COSTO"]:"";
$OFICINA_IVA = isset($_POST["OFICINA_IVA"])?$_POST["OFICINA_IVA"]:"";
$OFICINA_SUB = isset($_POST["OFICINA_SUB"])?$_POST["OFICINA_SUB"]:"";
$OFICINA_TOTAL = isset($_POST["OFICINA_TOTAL"])?$_POST["OFICINA_TOTAL"]:"";
$OFICINA_OBSERVA = isset($_POST["OFICINA_OBSERVA"])?$_POST["OFICINA_OBSERVA"]:"";
$HOFICINA = isset($_POST["HOFICINA"])?$_POST["HOFICINA"]:""; 
$IpOFICINA = isset($_POST["IpOFICINA"])?$_POST["IpOFICINA"]:""; 


  echo $altaeventos->oficina ($OFICINA_EQUIPO , $OFICINA_CANTIDAD , $OFICINA_ENTREGA ,$OFICINA_FOTO, $OFICINA_LUGAR , $OFICINA_HORA , $OFICINA_DEVOLU , $OFICINA_LUDEVO , $OFICINA_HORADEVO , $OFICINA_SOLICITUD , $OFICINA_DIAS , $OFICINA_COSTO , $OFICINA_IVA ,$OFICINA_SUB , $OFICINA_TOTAL , $OFICINA_OBSERVA , $HOFICINA,$enviarOFICINA,$IpOFICINA);
 
     //include_once (__ROOT1__."/includes/crea_funciones.php");  

}
elseif($EMAIL_OFICINA ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_OFICINA=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['OFICINA'])?$_POST['OFICINA']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('OFICINA_EQUIPO,OFICINA_CANTIDAD, OFICINA_ENTREGA, OFICINA_FOTO,OFICINA_LUGAR,OFICINA_HORA,OFICINA_DEVOLU,OFICINA_LUDEVO,OFICINA_HORADEVO,OFICINA_SOLICITUD,OFICINA_DIAS,OFICINA_COSTO,OFICINA_IVA,OFICINA_SUB,OFICINA_TOTAL,OFICINA_OBSERVA ',
				 
   'OFICINA,CANTIDAD, FECHA DE ENTREGA,FOTO,LUGAR DE ENTREGA,HORA DE ENTREGA,FECHA DE DEVOLUCIÓN,LUGAR DE DEVOLUCIÓN,HORA DE DEVOLUCIÓN,FECHA DE SOLICITUD,DIAS SOLICITADOS,COSTO,SUB TOTAL,I.V.A,TOTAL,OBSERVACIONES', '04oficina',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'OFICINA_FOTO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04oficina', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('OFICINA DEL EVENTO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }

if($borra_OFICINA == 'borra_OFICINA' ){
            
$borra_ofi = isset($_POST["borra_ofi"])?$_POST["borra_ofi"]:"";
echo $altaeventos->borra_OFICINA( $borra_ofi );
}



if($HBOTIQUIN == 'HBOTIQUIN' or $enviarBOTIQUIN=='enviarBOTIQUIN'){
	
$BOTIQUIN_EQUIPO = isset($_POST["BOTIQUIN_EQUIPO"])?$_POST["BOTIQUIN_EQUIPO"]:"";
$BOTIQUIN_FOTO = isset($_POST["BOTIQUIN_FOTO"])?$_POST["BOTIQUIN_FOTO"]:"";
$BOTIQUIN_CANTIDAD = isset($_POST["BOTIQUIN_CANTIDAD"])?$_POST["BOTIQUIN_CANTIDAD"]:"";
$BOTIQUIN_ENTREGA = isset($_POST["BOTIQUIN_ENTREGA"])?$_POST["BOTIQUIN_ENTREGA"]:"";
$BOTIQUIN_LUGAR = isset($_POST["BOTIQUIN_LUGAR"])?$_POST["BOTIQUIN_LUGAR"]:"";
$BOTIQUIN_HORA = isset($_POST["BOTIQUIN_HORA"])?$_POST["BOTIQUIN_HORA"]:"";
$BOTIQUIN_DEVOLU = isset($_POST["BOTIQUIN_DEVOLU"])?$_POST["BOTIQUIN_DEVOLU"]:"";
$BOTIQUIN_LUDEVO = isset($_POST["BOTIQUIN_LUDEVO"])?$_POST["BOTIQUIN_LUDEVO"]:"";
$BOTIQUIN_HORADEVO = isset($_POST["BOTIQUIN_HORADEVO"])?$_POST["BOTIQUIN_HORADEVO"]:"";
$BOTIQUIN_SOLICITUD = isset($_POST["BOTIQUIN_SOLICITUD"])?$_POST["BOTIQUIN_SOLICITUD"]:"";
$BOTIQUIN_DIAS = isset($_POST["BOTIQUIN_DIAS"])?$_POST["BOTIQUIN_DIAS"]:"";
$BOTIQUIN_COSTO = isset($_POST["BOTIQUIN_COSTO"])?$_POST["BOTIQUIN_COSTO"]:"";
$BOTIQUIN_IVA = isset($_POST["BOTIQUIN_IVA"])?$_POST["BOTIQUIN_IVA"]:"";
$BOTIQUIN_SUB = isset($_POST["BOTIQUIN_SUB"])?$_POST["BOTIQUIN_SUB"]:"";
$BOTIQUIN_TOTAL = isset($_POST["BOTIQUIN_TOTAL"])?$_POST["BOTIQUIN_TOTAL"]:"";
$BOTIQUIN_OBSERVA = isset($_POST["BOTIQUIN_OBSERVA"])?$_POST["BOTIQUIN_OBSERVA"]:"";
$HBOTIQUIN = isset($_POST["HBOTIQUIN"])?$_POST["HBOTIQUIN"]:""; 
$IpBOTIQUIN = isset($_POST["IpBOTIQUIN"])?$_POST["IpBOTIQUIN"]:""; 


  echo $altaeventos->botiquin ($BOTIQUIN_EQUIPO , $BOTIQUIN_CANTIDAD , $BOTIQUIN_ENTREGA ,$BOTIQUIN_FOTO, $BOTIQUIN_LUGAR , $BOTIQUIN_HORA , $BOTIQUIN_DEVOLU , $BOTIQUIN_LUDEVO , $BOTIQUIN_HORADEVO , $BOTIQUIN_SOLICITUD , $BOTIQUIN_DIAS , $BOTIQUIN_COSTO , $BOTIQUIN_IVA ,$BOTIQUIN_SUB , $BOTIQUIN_TOTAL , $BOTIQUIN_OBSERVA , $HBOTIQUIN,$enviarBOTIQUIN,$IpBOTIQUIN);
   		/*$RUTAFILTRO = 'calendariodeeventos2'; 
		$claseactual = 'class.epcinnAE.php';
		$tablesdb = '04mensajeria';
		include_once (__ROOT1__."/includes/crea_funciones_filtro_completo.php");*/

}

elseif($EMAIL_BOTIQUIN ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_BOTIQUIN=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['BOTIQUIN'])?$_POST['BOTIQUIN']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $altaeventos->MANDA_INFORMACION('BOTIQUIN_EQUIPO,BOTIQUIN_CANTIDAD, BOTIQUIN_ENTREGA, BOTIQUIN_FOTO,BOTIQUIN_LUGAR,BOTIQUIN_HORA,BOTIQUIN_DEVOLU,BOTIQUIN_LUDEVO,BOTIQUIN_HORADEVO,BOTIQUIN_SOLICITUD,BOTIQUIN_DIAS,BOTIQUIN_COSTO,BOTIQUIN_IVA,BOTIQUIN_SUB,BOTIQUIN_TOTAL,BOTIQUIN_OBSERVA ',
				 
   'BOTIQUIN,CANTIDAD, FECHA DE ENTREGA,FOTO,LUGAR DE ENTREGA,HORA DE ENTREGA,FECHA DE DEVOLUCIÓN,LUGAR DE DEVOLUCIÓN,HORA DE DEVOLUCIÓN,FECHA DE SOLICITUD,DIAS SOLICITADOS,COSTO,SUB TOTAL,I.V.A,TOTAL,OBSERVACIONES', '04botiquin',  " where idRelacion = '".$_SESSION['idevento']."' ".$query2/*nuevo*/ );
   $variables = 'BOTIQUIN_FOTO, ';
   //DOCUMENTO_COTIPRO trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $altaeventos->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'04botiquin', " where idRelacion = '".$_SESSION['idevento']."' ".$query2 );
				 

				 
     $html = $altaeventos->html2('BOTIQUIN DEL EVENTO ',$MANDA_INFORMACION );

     $smtp = $altaeventos->array_smtp($var_INICIALES['iniciales_evento']);
     $idlogo = $smtp['idRelacion'];
     $logo = $altaeventos->variables_informacionfiscal_logo2($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   }


if($borra_BOTIQUIN == 'borra_BOTIQUIN' ){
            
$borra_botiq = isset($_POST["borra_botiq"])?$_POST["borra_botiq"]:"";
echo $altaeventos->borra_BOTIQUIN( $borra_botiq );
}
  
  

if($hPORVENDEDOR == 'hPORVENDEDOR' or $enviarPORVENDEDOR=='enviarPORVENDEDOR'){	   
  
	  $DOCUMENTO_PORVENDEDOR = isset($_POST["DOCUMENTO_PORVENDEDOR"])?$_POST["DOCUMENTO_PORVENDEDOR"]:"";
$ADJUNTO_PORVENDEDOR = isset($_POST["ADJUNTO_PORVENDEDOR"])?$_POST["ADJUNTO_PORVENDEDOR"]:"";
$CANTIDAD_PORVENDEDOR = isset($_POST["CANTIDAD_PORVENDEDOR"])?$_POST["CANTIDAD_PORVENDEDOR"]:"";
$OBSERVACIONES_PORVENDEDOR = isset($_POST["OBSERVACIONES_PORVENDEDOR"])?$_POST["OBSERVACIONES_PORVENDEDOR"]:"";
$FECHA_PORVENDEDOR = isset($_POST["FECHA_PORVENDEDOR"])?$_POST["FECHA_PORVENDEDOR"]:"";
$hPORVENDEDOR = isset($_POST["hPORVENDEDOR"])?$_POST["hPORVENDEDOR"]:"";
$IPPORVENDEDOR = isset($_POST["IPPORVENDEDOR"])?$_POST["IPPORVENDEDOR"]:"";

  echo $altaeventos->porcentaje ($DOCUMENTO_PORVENDEDOR , $ADJUNTO_PORVENDEDOR ,$CANTIDAD_PORVENDEDOR, $OBSERVACIONES_PORVENDEDOR , $FECHA_PORVENDEDOR , $hPORVENDEDOR, $IPPORVENDEDOR,$enviarPORVENDEDOR);

      //include_once (__ROOT1__."/includes/crea_funciones.php");  
}
  
 if($borra_PORVENDEDOR == 'borra_PORVENDEDOR' ){
            
$borra_vendedor = isset($_POST["borra_vendedor"])?$_POST["borra_vendedor"]:"";
echo $altaeventos->borra_PORVENDEDOR( $borra_vendedor );
} 
  
  
  
  
  
//print_r($_POST);





$id = $_SESSION['id'];
$fechaActual = date('Y-m-d');	

//aqui actualiza desde vistapreviaeventos.php
$IPaltaeventos = isset($_POST["IPaltaeventos"])?$_POST["IPaltaeventos"]:"";
if($IPaltaeventos!='' AND ( $_FILES["ARCHIVO_RELACIONADO_MONTAJE"] == true or $_FILES["SUBIR_COTIZACION"] == true or $_FILES["SUBIR_ORDEN_COMPRA"] == true or $_FILES["SUBIR_CONTRATO_FIRMADO"] == true or $_FILES["SUBIR_COTIZACION_FIRMADA"] == true or $_FILES["LOGO_CLIENTE"] == true or $_FILES["IMAGEN_EVENTO"] == true  ) ){
	//ECHO 'AAAAAAAAAAAAAAAA';
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $altaeventos->cargarAE($ETQIETA,'04EVENTOSfotos','7', $IPaltaeventos,'','',$fechaActual,$id ,'si');

}
}





	if($IpBOTIQUIN== true and ( $_FILES["BOTIQUIN_FOTO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04botiquin','3',$IpBOTIQUIN);
}	

}

	if($IpOFICINA== true and ( $_FILES["OFICINA_FOTO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04oficina','3',$IpOFICINA);
}	

}


	if($IpPAPELERIA== true and ( $_FILES["PAPELERIA_FOTO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04papeleria','3',$IpPAPELERIA);
}	

}


	if($IpMATERIAL== true and ( $_FILES["MATERIAL_FOTO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04materialyequipo','3',$IpMATERIAL);
}	

}


/*	if($IpVEHICULOSEVE== true and ( $_FILES["VEHICULOSEVE_FOTO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04vehiculoevento','3',$IpVEHICULOSEVE);
}	

}*/	   
	   
if($IpCOTIPRO== true and ( $_FILES["ADJUNTO_COTIPRO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04cotizacionproveedores','3',$IpCOTIPRO);
}	

}



if($IPCIERRE2 == true and ( $_FILES["adjunto_cierre"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04cierre','3',$IPCIERRE2);
}	

}



if($ipPROGRAMAOPERATIVO == true and ( $_FILES["ADJUNTO_PROGRAMAOPERATIVO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04programaoperativo','3',$ipPROGRAMAOPERATIVO);
}	

}


if($ipROOMINGLISTOV == true and ( $_FILES["ADJUNTO_ROOMING"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04roominglist','3',$ipROOMINGLISTOV);
}	

}

if($Icronosvuelos == true and ( $_FILES["ADJUNTO_CRONOVUELOS"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04cronologicovuelos','3',$Icronosvuelos);
}	

}

if($Ipcronoterrestre == true and ( $_FILES["ADJUNTO_cronoterrestre"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04cronoterrestre','3',$Ipcronoterrestre);
}	

}
//ADJUNTO_COBROS
if($Ipcobroscliente == true and ( $_FILES["ADJUNTO_COBROS"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04cobroscliente','3',$Ipcobroscliente);
}	

}

if($IpINGRESOS == true and ( $_FILES["ADJUNTO_INGRESOS"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04pagosingresos','3',$IpINGRESOS);
}	

}


if($IpEGRESOS == true and ( $_FILES["ADJUNTO_EGRESO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04pagoegresos','3',$IpEGRESOS);
}	

}

if($Ipboletosavion == true and ( $_FILES["ADJUNTO_BOLETOSAVION"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04boletosavion','3',$Ipboletosavion);
}	

}

if($IpFEECOBRADO == true and ( $_FILES["ADJUNTO_FEECOBRADO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04feecobrado','3',$IpFEECOBRADO);
}	

}

if($IpFEECOBRADO == true and ( $_FILES["MENSAJERIA_ENTREGARSOLICITUD"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04mensajeria','3',$IPMENSAJERIA);
}	

}
if($IpFEECOBRADO == true and ( $_FILES["MENSAJERIA_FOTOS"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04mensajeria','3',$IPMENSAJERIA);
}	

}
 
 
 if($IpFEECOBRADO == true and ( $_FILES["MENSAJERIA_FIRMA"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04mensajeria','3',$IPMENSAJERIA);
}	

}
 
if($IpFEECOBRADO == true and ( $_FILES["MENSAJERIA_FOTOSNECES"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04mensajeria','3',$IPMENSAJERIA);
}	

} 
 
 
 if($IpFEECOBRADO == true and ( $_FILES["MENSAJERIA_ARCHIVORELACIONADO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04mensajeria','3',$IPMENSAJERIA);
}	

} 
 
 
  if($IpCOTICLIENTES == true and ( $_FILES["ADJUNTO_COTICLIENTES"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04COTICLIENTES','3',$IpCOTICLIENTES);
}	

} 
 
  if($IpCONTRATO == true and ( $_FILES["ADJUNTO_CONTRATO"] == true ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $conexion->cargar($ETQIETA,'04CONTRATO','3',$IpCONTRATO);
}	

}
 
 
?>