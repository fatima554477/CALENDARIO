<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023

*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	
	
	class accesoclase extends colaboradores{


	public function solocargartemp($archivo)/*new file*/
	{
		$nombre_carpeta=__ROOT3__.'/includes/archivos2';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		//echo '1aaaaaaaaaaaaaaaa2'.$extension[$cuenta].'1aaaaaaaaaaaaaaaa2';
		
		if( 
		strtolower($extension[$cuenta]) == 'pdf' or 
		strtolower($extension[$cuenta]) == 'gif' or 
		strtolower($extension[$cuenta]) == 'jpeg' or 
		strtolower($extension[$cuenta]) == 'jpg' or 
		strtolower($extension[$cuenta]) == 'png' or 
		strtolower($extension[$cuenta]) == 'mp4' or 
		strtolower($extension[$cuenta]) == 'docx' or 
		strtolower($extension[$cuenta]) == 'doc' or 
		strtolower($extension[$cuenta]) == 'xml'
		){
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);
		
		return trim($nuevonombre);
		
		}
		else{
			return "1";
		}
		
		}
		else{
			return "2";
		}
	}

	public function variable_DIRECCIONP1(){
		$conn = $this->db();
		$variablequery = "select * from 02direccionproveedor1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}
	public function variable_SUBETUFACTURA(){
		$conn = $this->db();
		$variablequery = "select * from 02SUBETUFACTURADOCTOS where idRelacion = '".$_SESSION['idPROV']."' and idTemporal = 'si' and (ADJUNTAR_FACTURA_XML is not null or ADJUNTAR_FACTURA_XML <> '') order by id desc ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_SUBETUFACTURA(){
		$conn = $this->db();
		$var1 = 'select id from 02SUBETUFACTURA where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	
	public function guardarxmlDB($ultimo_id){
	$conexion2 = new herramientas();
	$regreso = $this->variable_SUBETUFACTURA();
	$url = __ROOT3__.'/includes/archivos/'.$regreso['ADJUNTAR_FACTURA_XML'];
	if( file_exists($url) ){
	$regreso = $conexion2->lectorxml($url);
	
	$Version = $regreso['Version'];
	$sello = $regreso['selo'];
	$Certificado = $regreso['Certificado'];
	$noCertificado = $regreso['noCertificado'];
	$fecha = $regreso['fecha'];
	$tipoDeComprobante = $regreso['tipoDeComprobante'];
	$metodoDePago = $regreso['metodoDePago'];
	$formaDePago = $regreso['formaDePago'];
	$condicionesDePago = $regreso['condicionesDePago'];
	$subTotal = $regreso['subTotal'];
	$TipoCambio = $regreso['TipoCambio'];
	$Moneda = $regreso['Moneda'];
	$total = $regreso['total'];
	$serie = $regreso['serie'];
	$folio = $regreso['folio'];
	$LugarExpedicion = $regreso['LugarExpedicion'];
	
	$rfcE = $regreso['rfcE'];					
	$nombreE = $regreso['nombreE'];	
	$regimenE = $regreso['regimenE'];
	
	$rfcR = $regreso['rfcR'];
	$nombreR = $regreso['nombreR'];
	$UsoCFDI = $regreso['UsoCFDI'];
	$DomicilioFiscalReceptor = $regreso['DomicilioFiscalReceptor'];
	$RegimenFiscalReceptor = $regreso['RegimenFiscalReceptor'];
	
	$UUID = $regreso['UUID'];
	$selloCFD = $regreso['selloCFD'];
	$noCertificadoSAT = $regreso['noCertificadoSAT'];	
	$FechaTimbrado = $regreso['FechaTimbrado'];
	$RfcProvCertif = $regreso['RfcProvCertif'];	
	$TImpuestosRetenidos = $regreso['TImpuestosRetenidos'];
	$TImpuestosTrasladados = $regreso['TImpuestosTrasladados'];

	$Cantidad = $regreso['Cantidad'];
	$ValorUnitario = $regreso['ValorUnitario'];
	$Importe = $regreso['Importe'];
	$ClaveProdServ = $regreso['ClaveProdServ'];
	$Unidad = $regreso['Unidad'];
	$Descripcion = $regreso['Descripcion'];
	$ClaveUnidad = $regreso['ClaveUnidad'];
	$NoIdentificacion = $regreso['NoIdentificacion'];
	$ObjetoImp = $regreso['ObjetoImp'];
}
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';    

		$conn = $this->db();
$var3 = "INSERT INTO `02XML` (
`id`, `Version`, `fechaTimbrado`, `tipoDeComprobante`, 
`metodoDePago`, `formaDePago`, `condicionesDePago`, `subTotal`, 
`TipoCambio`, `Moneda`, `total`, `serie`, 
`folio`, `LugarExpedicion`, `rfcE`, `nombreE`, 
`regimenE`, `rfcR`, `nombreR`, `UsoCFDI`, 
`DomicilioFiscalReceptor`, `RegimenFiscalReceptor`, `UUID`, `TImpuestosRetenidos`, 
`TImpuestosTrasladados`, `idRelacion`, `ultimo_id`) VALUES (
'', '".$Version."', '".$FechaTimbrado."', '".$tipoDeComprobante."', 
'".$metodoDePago."', '".$formaDePago."', '".$condicionesDePago."', '".$subTotal."', 
'".$TipoCambio."', '".$Moneda."', '".$total."', '".$serie."', 
'".$folio."', '".$LugarExpedicion."', '".$rfcE."', '".$nombreE."', 
'".$regimenE."', '".$rfcR."', '".$nombreR."', '".$UsoCFDI."', 
'".$DomicilioFiscalReceptor."', '".$RegimenFiscalReceptor."', '".$UUID."', '".$TImpuestosRetenidos."', 
'".$TImpuestosTrasladados."', '".$session."', '".$ultimo_id."'
);  ";	
		mysqli_query($conn,$var3) or die('P156'.mysqli_error($conn));
		//return "1";	
	}
	
	public function lectorxmlX ($NUMERO_CONSECUTIVO_PROVEE , $NOMBRE_COMERCIAL , $RAZON_SOCIAL , $RFC_PROVEEDOR , $NUMERO_EVENTO , $CONCEPTO_PROVEE , $MONTO_TOTAL_COTIZACION_ADEUDO , $MONTO_DEPOSITAR , $MONTO_PROPINA , $MONTO_FACTURA , $TIPO_DE_MONEDA ,$PFORMADE_PAGO, $FECHA_DE_PAGO , $STATUS_DE_PAGO , $NOMBRE_DEL_EJECUTIVO , $OBSERVACIONES_1 ,$FECHA_DE_LLENADO, $ADJUNTAR_FACTURA_XML , $ADJUNTAR_FACTURA_PDF, $ADJUNTAR_COTIZACION11, $CONPROBANTE_TRANSFERENCIA, $ADJUNTAR_ARCHIVO_1, $hiddensubefactura, $ENVIARRSB1p, $IPSB1p )
	{
	//hiddensubefactura
		$conn = $this->db();
		$existe = $this->revisar_SUBETUFACTURA ();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';    
		if($session != ''){
			//ADJUNTAR_FACTURA_XML 
		$var1 = "update 02SUBETUFACTURA set
		/*ADJUNTAR_ARCHIVO_1 = '".$ADJUNTAR_ARCHIVO_1."',		
		CONPROBANTE_TRANSFERENCIA = '".$CONPROBANTE_TRANSFERENCIA."',		
		ADJUNTAR_COTIZACION = '".$ADJUNTAR_COTIZACION11."',
		ADJUNTAR_FACTURA_PDF = '".$ADJUNTAR_FACTURA_PDF."',
		ADJUNTAR_FACTURA_XML = '".$ADJUNTAR_FACTURA_XML."',*/
		NUMERO_CONSECUTIVO_PROVEE = '".$NUMERO_CONSECUTIVO_PROVEE."' , NOMBRE_COMERCIAL = '".$NOMBRE_COMERCIAL."' , RAZON_SOCIAL = '".$RAZON_SOCIAL."' , RFC_PROVEEDOR = '".$RFC_PROVEEDOR."' , NUMERO_EVENTO = '".$NUMERO_EVENTO."' , CONCEPTO_PROVEE = '".$CONCEPTO_PROVEE."' , MONTO_TOTAL_COTIZACION_ADEUDO = '".$MONTO_TOTAL_COTIZACION_ADEUDO."' , MONTO_DEPOSITAR = '".$MONTO_DEPOSITAR."' , MONTO_PROPINA = '".$MONTO_PROPINA."' , MONTO_FACTURA = '".$MONTO_FACTURA."' , TIPO_DE_MONEDA = '".$TIPO_DE_MONEDA."' , PFORMADE_PAGO = '".$PFORMADE_PAGO."' , FECHA_DE_PAGO = '".$FECHA_DE_PAGO."' , STATUS_DE_PAGO = '".$STATUS_DE_PAGO."' , NOMBRE_DEL_EJECUTIVO = '".$NOMBRE_DEL_EJECUTIVO."' , OBSERVACIONES_1 = '".$OBSERVACIONES_1."' , FECHA_DE_LLENADO = '".$FECHA_DE_LLENADO."' where id = '".$IPSB1p."' ; ";
		
		
		$var2 = "insert into 02SUBETUFACTURA ( ADJUNTAR_FACTURA_XML, ADJUNTAR_FACTURA_PDF, ADJUNTAR_COTIZACION, CONPROBANTE_TRANSFERENCIA,
		ADJUNTAR_ARCHIVO_1,
		NUMERO_CONSECUTIVO_PROVEE, NOMBRE_COMERCIAL, RAZON_SOCIAL, 
		RFC_PROVEEDOR, NUMERO_EVENTO, CONCEPTO_PROVEE, 
		MONTO_TOTAL_COTIZACION_ADEUDO, MONTO_DEPOSITAR, MONTO_PROPINA,
		MONTO_FACTURA, TIPO_DE_MONEDA,PFORMADE_PAGO, FECHA_DE_PAGO, 
		STATUS_DE_PAGO, NOMBRE_DEL_EJECUTIVO, OBSERVACIONES_1,FECHA_DE_LLENADO, 
		idRelacion) values ( '".$ADJUNTAR_FACTURA_XML."',  '".$ADJUNTAR_FACTURA_PDF."',  
		'".$ADJUNTAR_COTIZACION11."', '".$CONPROBANTE_TRANSFERENCIA."',
		'".$ADJUNTAR_ARCHIVO_1."',
		'".$NUMERO_CONSECUTIVO_PROVEE."', '".$NOMBRE_COMERCIAL."', '".$RAZON_SOCIAL."' , 
		'".$RFC_PROVEEDOR."' , '".$NUMERO_EVENTO."' , '".$CONCEPTO_PROVEE."' , 
		'".$MONTO_TOTAL_COTIZACION_ADEUDO."', '".$MONTO_DEPOSITAR."', '".$MONTO_PROPINA."', 
		'".$MONTO_FACTURA."', '".$TIPO_DE_MONEDA."', '".$PFORMADE_PAGO."', '".$FECHA_DE_PAGO."' , 
		'".$STATUS_DE_PAGO."' , '".$NOMBRE_DEL_EJECUTIVO."' , '".$OBSERVACIONES_1."' , '".   $FECHA_DE_LLENADO."' , '".$session."' );  ";
	

		if($ENVIARRSB1p=='ENVIARRSB1p'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		$ultimo_id ='';		
		$ultimo_id = mysqli_insert_id($conn);
		$this->guardarxmlDB($ultimo_id);
		$var3 = "UPDATE 02SUBETUFACTURADOCTOS SET idTemporal ='".$ultimo_id."' where idRelacion = '".$_SESSION['idPROV']."' and idTemporal ='si' "; 			
		mysqli_query($conn,$var3);	
		return "Ingresado";
		}
			
        }else{
		echo "NO HAY UN PROVEEDOR SELECCIONADO";	
		}
    }

//Listado_subefacturaDOCTOS
	public function borra_sube_factura($id){ $conn = $this->db();

	$variablequery2 = "delete from 02SUBETUFACTURADOCTOS where idTemporal = '".$id."' ";
	mysqli_query($conn,$variablequery2);
	
	$variablequery = "delete from 02SUBETUFACTURA where id = '".$id."' "; $arrayquery = mysqli_query($conn,$variablequery); 
	RETURN "ELEMENTO BORRADO"; 
	
	}

public function select_02XML(){
$conn = $this->db(); 
$variablequery = "select id from 02XML order by id desc "; 
$arrayquery = mysqli_query($conn,$variablequery);
$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];	
}

public function VALIDA02XMLUUID($uuid){
$conn = $this->db(); 
$variablequery = "select id,UUID from 02XML where UUID = '".$uuid."' "; 
$arrayquery = mysqli_query($conn,$variablequery);
$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
if($row['id']<=1){
	return 'S';
}else{
	return $row['id'];	
}
}

public function Listado_subefactura(){ $conn = $this->db(); $variablequery = "select * from 02SUBETUFACTURA where idRelacion = '".$_SESSION['idPROV']."' order by id desc "; return $arrayquery = mysqli_query($conn,$variablequery); } 

public function Listado_subefactura2($id){ $conn = $this->db(); $variablequery = "select * from 02SUBETUFACTURA where id = '".$id."' "; return $arrayquery = mysqli_query($conn,$variablequery); }
//Listado_subefacturadocto 02XML

public function Listado_subefacturaDOCTOS($ID){ $conn = $this->db(); $variablequery = "select * from 02SUBETUFACTURADOCTOS where idRelacion = '".$_SESSION['idPROV']."' and idTemporal = '".$ID."'  order by id desc "; return $arrayquery = mysqli_query($conn,$variablequery); }

public function Listado_subefacturadocto($ADJUNTAR_COTIZACION){ $conn = $this->db(); $variablequery = "select id,".$ADJUNTAR_COTIZACION.",fechaingreso from 02SUBETUFACTURADOCTOS where idRelacion = '".$_SESSION['idPROV']."' and idTemporal = 'si' and (".$ADJUNTAR_COTIZACION." is not null or ".$ADJUNTAR_COTIZACION." <> '') ORDER BY id DESC "; return $arrayquery = mysqli_query($conn,$variablequery); } 

public function delete_subefacturadocto2($id){ $conn = $this->db(); 
$variablequery = "delete from 02SUBETUFACTURADOCTOS where id = '".$id."' ";
return $arrayquery = mysqli_query($conn,$variablequery); 

}

public function delete_subefactura2nombre($nombre){ $conn = $this->db(); 
$variablequery = "delete from 02SUBETUFACTURADOCTOS where ADJUNTAR_FACTURA_XML = '".$nombre."' ";
mysqli_query($conn,$variablequery); 

}



/* DATOS BANCARIOS 1 */ 


	public function variable_DATOSBANCARIOS1(){
		$conn = $this->db();
		$variablequery = "select * from 02DATOSBANCARIOS1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_DATOSBANCARIOS1(){
		$conn = $this->db();
		$var1 = 'select id from 02DATOSBANCARIOS1 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarDATOSBANCARIOS1 (
	$P_TIPO_DE_MONEDA_1 , $P_INSTITUCION_FINANCIERA_1 , $P_NUMERO_DE_CUENTA_DB_1 , $P_NUMERO_CLABE_1 , 
	$P_NUMERO_DE_SUCURSAL_1 , $P_NUMERO_IBAN_1 , $P_NUMERO_CUENTA_SWIFT_1,$FOTO_ESTADO_PROVEE,$ULTIMA_CARGA_DATOBANCA, $ENVIARRdatosbancario1p,$IPdatosbancario1p ){
	
		$conn = $this->db();
		$existe = $this->revisar_DATOSBANCARIOS1();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';    
		if($session != ''){
			
		$var1 = "update 02DATOSBANCARIOS1 set P_TIPO_DE_MONEDA_1 = '".$P_TIPO_DE_MONEDA_1."' , P_INSTITUCION_FINANCIERA_1 = '".$P_INSTITUCION_FINANCIERA_1."' , P_NUMERO_DE_CUENTA_DB_1 = '".$P_NUMERO_DE_CUENTA_DB_1."' , P_NUMERO_CLABE_1 = '".$P_NUMERO_CLABE_1."' , P_NUMERO_DE_SUCURSAL_1 = '".$P_NUMERO_DE_SUCURSAL_1."' , P_NUMERO_IBAN_1 = '".$P_NUMERO_IBAN_1."' , P_NUMERO_CUENTA_SWIFT_1 = '".$P_NUMERO_CUENTA_SWIFT_1."' ,ULTIMA_CARGA_DATOBANCA = '".$ULTIMA_CARGA_DATOBANCA."'  where id = '".$IPdatosbancario1p."' ; ";
		
		
		$var2 = "insert into 02DATOSBANCARIOS1 (P_TIPO_DE_MONEDA_1, P_INSTITUCION_FINANCIERA_1, P_NUMERO_DE_CUENTA_DB_1, P_NUMERO_CLABE_1, P_NUMERO_DE_SUCURSAL_1, P_NUMERO_IBAN_1, P_NUMERO_CUENTA_SWIFT_1,FOTO_ESTADO_PROVEE, ULTIMA_CARGA_DATOBANCA, idRelacion) values ( '".$P_TIPO_DE_MONEDA_1."' , '".$P_INSTITUCION_FINANCIERA_1."' , '".$P_NUMERO_DE_CUENTA_DB_1."' , '".$P_NUMERO_CLABE_1."' , '".$P_NUMERO_DE_SUCURSAL_1."' , '".$P_NUMERO_IBAN_1."' , '".$P_NUMERO_CUENTA_SWIFT_1."' , '".$FOTO_ESTADO_PROVEE."' , '".$ULTIMA_CARGA_DATOBANCA."' , '".$session."' );  ";			
	
		if($ENVIARRdatosbancario1p=='ENVIARRdatosbancario1p'){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "NO HAY UN PROVEEDOR SELECCIONADO";	
		}
    }



	public function Listado_datos_bancariosPRO(){
		$conn = $this->db();

		$variablequery = "select * from 02DATOSBANCARIOS1 where idRelacion = '".$_SESSION['idPROV']."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


        public function Listado_datos_bancariosPRO2($id){ $conn = $this->db(); $variablequery = "select * from 02DATOSBANCARIOS1 where id = '".$id."' "; return $arrayquery = mysqli_query($conn,$variablequery); }


         function borra_datos_bancario1($id){
		$conn = $this->db();
		$variablequery = "delete from 02DATOSBANCARIOS1 where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
	}
	

}


	?>