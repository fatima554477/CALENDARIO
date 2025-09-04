<?php



/*
clase EPC INNOVA
CREADO : 10/mayo/2023
PROGRAMER: FATIMA ARELLANO
TESTER: SANDOR 
ACTUALIZACION: 11 MAR 2023

agregar alter TABLE `02XML` add column tipo_comprobante varchar(100)
actualizar class.epcinn.php
*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/calendariodeeventos2/controladorAE.php";	



	class TIKETSYAVION extends accesoclase{


	public function tarjeta(){

		$conn = $this->db();
		$variable = "select * from 01Tempresarial 
		where idRelacion = '".$_SESSION["idem"]."' and  
		(T_NUMERO_TARJETA<>'' and T_NUMERO_TARJETA is not null) order by id desc ";
		$variablequery = mysqli_query($conn,$variable);
		while($row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC)){
			$resultado = $row['T_NUMERO_TARJETA'];
		}
		return $resultado;
		
		
		
	}
		public function buscarNOMBRECOMERCIAL($filtro){
		
		$conn = $this->db();
$variable = "select * from 02usuarios where 
			nommbrerazon like '%".$filtro."%' /*ORDER BY 
  CASE
    WHEN nommbrerazon like '%".$filtro."%' THEN 1
	else nommbrerazon
  END*/
  
  limit 20 ";
		$variablequery = mysqli_query($conn,$variable);
		while($row2 = mysqli_fetch_array($variablequery, MYSQLI_ASSOC)){
			$resultado2[] = ['id'=>$row2['id'],'text'=>$row2['nommbrerazon']];
		}			
		return $resultado2;	
	}
	
	public function buscarrasonsocial($filtro){
		$conn = $this->db();
		$_SESSION['QUERYaaa']=$variable = "select * from 02direccionproveedor1 where idRelacion = '".$filtro."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row2 = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);	
		return $row2['P_NOMBRE_FISCAL_RS_EMPRESA'].'^^^'.$row2['P_RFC_MTDP'];	
	}
	
		public function buscarnombre($filtro){
		$conn = $this->db();
		$variable = "select * from 04altaeventos where NUMERO_EVENTO = '".$filtro."' ";
        $variablequery = mysqli_query($conn,$variable);
		while($row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC)){
			$resultado=$row['NOMBRE_EVENTO'];
		}
		return $resultado;
		
	}
	
		public function variable_DIRECCIONP1(){
		$conn = $this->db();
		$variablequery = "select * from 02direccionproveedor1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function Listado_tikets(){
		$conn = $this->db();

		$variablequery = "select * from 10tiketsavion WHERE tipo_documento='TIKETS' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function Listado_AVION(){
		$conn = $this->db();

		$variablequery = "select * from 10tiketsavion WHERE tipo_documento='AVION' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


//Listado_subefacturaDOCTOS
	public function borrapagoaproveedores($id){ $conn = $this->db(); $variablequery = "delete from 02SUBETUFACTURA where id = '".$id."' "; $arrayquery = mysqli_query($conn,$variablequery); RETURN "ELEMENTO BORRADO"; }
	

    public function Listado_subefacturadocto($ADJUNTAR_COTIZACION){ $conn = $this->db(); $variablequery = "select id,".$ADJUNTAR_COTIZACION.",fechaingreso from 02SUBETUFACTURADOCTOS where idRelacion = '".$_SESSION['idPROV']."' and idTemporal = 'si' and (".$ADJUNTAR_COTIZACION." is not null or ".$ADJUNTAR_COTIZACION." <> '') ORDER BY id DESC "; return $arrayquery = mysqli_query($conn,$variablequery); }

	public function variable_SUBETUFACTURA($id){
		$conn = $this->db();
		$variablequery = "select * from 02SUBETUFACTURADOCTOS where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

   	public function guardarxmlDB($ultimo_id,$conn,$tipo_documento,$ADJUNTAR_FACTURA_XML){
	$conexion2 = new herramientas();
	$regreso = $this->variable_SUBETUFACTURA($ultimo_id);
	$url = __ROOT3__.'/includes/archivos/'.$ADJUNTAR_FACTURA_XML;

	$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';    

	$conexion2->guardar_db_xml2($url,$session,$ultimo_id,$conn,$tipo_documento);
		
		
	}
	
	public function guardarTIKETSAVION ($ADJUNTAR_FACTURA_XML, $NUMERO_CONSECUTIVO_PROVEE , $RAZON_SOCIAL , &$NOMBRE_COMERCIAL,$RFC_PROVEEDOR , $NUMERO_EVENTO , $NOMBRE_EVENTO , $MOTIVO_GASTO , $CONCEPTO_PROVEE , $MONTO_TOTAL_COTIZACION_ADEUDO , $MONTO_FACTURA , $MONTO_PROPINA , $MONTO_DEPOSITAR , $TIPO_DE_MONEDA , $PFORMADE_PAGO , $FECHA_A_DEPOSITAR , $STATUS_DE_PAGO , $BANCO_ORIGEN , $ACTIVO_FIJO , $GASTO_FIJO , $PAGAR_CADA , $FECHA_PPAGO , $FECHA_TPROGRAPAGO , $NUMERO_EVENTOFIJO , $CLASI_GENERAL , $SUB_GENERAL , $MONTO_DE_COMISION , $POLIZA_NUMERO , $NOMBRE_DEL_EJECUTIVO , $OBSERVACIONESA , $FECHA_DE_LLENADO , $hiddenTIKETS1QA ,$ipactualiza, $tipo_documento,$ENVIARtickets,
$FOTO_ESTADO_PROVEE11, 
$ADJUNTAR_ARCHIVO_1, 
$ADJUNTAR_COTIZACION, 
$COMPLEMENTOS_PAGO_PDF, 
$COMPLEMENTOS_PAGO_XML, 
$CANCELACIONES_PDF, 
$CANCELACIONES_XML, 
$ADJUNTAR_FACTURA_DE_COMISION_PDF, 
$ADJUNTAR_FACTURA_DE_COMISION_XML, 
$CALCULO_DE_COMISION, 
$COMPROBANTE_DE_DEVOLUCION, 
$NOTA_DE_CREDITO_COMPRA,
 $ADJUNTAR_FACTURA_PDF1){
		$MONTO_TOTAL_COTIZACION_ADEUDO  = str_replace(',','',$MONTO_TOTAL_COTIZACION_ADEUDO);
		$MONTO_FACTURA  = str_replace(',','',$MONTO_FACTURA);
		$MONTO_PROPINA  = str_replace(',','',$MONTO_PROPINA);
		$MONTO_DEPOSITAR  = str_replace(',','',$MONTO_DEPOSITAR);
		$MONTO_DE_COMISION  = str_replace(',','',$MONTO_DE_COMISION);		
		$conn = $this->db();
		//$existe = $this->revisar_altaeventos();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';  
		if($session != ''){
			
		$var1 = "update 10tiketsavion set NUMERO_CONSECUTIVO_PROVEE = '".$NUMERO_CONSECUTIVO_PROVEE."' , RAZON_SOCIAL = '".$RAZON_SOCIAL."' , NOMBRE_COMERCIAL = '".$NOMBRE_COMERCIAL."' , RFC_PROVEEDOR = '".$RFC_PROVEEDOR."' , NUMERO_EVENTO = '".$NUMERO_EVENTO."' , NOMBRE_EVENTO = '".$NOMBRE_EVENTO."' , MOTIVO_GASTO = '".$MOTIVO_GASTO."' , CONCEPTO_PROVEE = '".$CONCEPTO_PROVEE."' , MONTO_TOTAL_COTIZACION_ADEUDO = '".$MONTO_TOTAL_COTIZACION_ADEUDO."' , MONTO_FACTURA = '".$MONTO_FACTURA."' , MONTO_PROPINA = '".$MONTO_PROPINA."' , MONTO_DEPOSITAR = '".$MONTO_DEPOSITAR."' , TIPO_DE_MONEDA = '".$TIPO_DE_MONEDA."' , PFORMADE_PAGO = '".$PFORMADE_PAGO."' , FECHA_A_DEPOSITAR = '".$FECHA_A_DEPOSITAR."' , STATUS_DE_PAGO = '".$STATUS_DE_PAGO."' , BANCO_ORIGEN = '".$BANCO_ORIGEN."' , ACTIVO_FIJO = '".$ACTIVO_FIJO."' , GASTO_FIJO = '".$GASTO_FIJO."' , PAGAR_CADA = '".$PAGAR_CADA."' , FECHA_PPAGO = '".$FECHA_PPAGO."' , FECHA_TPROGRAPAGO = '".$FECHA_TPROGRAPAGO."' , NUMERO_EVENTOFIJO = '".$NUMERO_EVENTOFIJO."' , CLASI_GENERAL = '".$CLASI_GENERAL."' , SUB_GENERAL = '".$SUB_GENERAL."' , MONTO_DE_COMISION = '".$MONTO_DE_COMISION."' , POLIZA_NUMERO = '".$POLIZA_NUMERO."' , NOMBRE_DEL_EJECUTIVO = '".$NOMBRE_DEL_EJECUTIVO."' , OBSERVACIONESA = '".$OBSERVACIONESA."' , FECHA_DE_LLENADO = '".$FECHA_DE_LLENADO."' , hiddenTIKETS1QA = '".$hiddenTIKETS1QA."', 
		tipo_documento = '".$tipo_documento."',
		ADJUNTAR_FACTURA_PDF1  = '".$ADJUNTAR_FACTURA_PDF1."'
		 where id = '".$ipactualiza."' ;  ";
	
		$var2 = "insert into 10tiketsavion ( NUMERO_CONSECUTIVO_PROVEE, RAZON_SOCIAL,NOMBRE_COMERCIAL, RFC_PROVEEDOR, NUMERO_EVENTO, NOMBRE_EVENTO, MOTIVO_GASTO, CONCEPTO_PROVEE, MONTO_TOTAL_COTIZACION_ADEUDO, MONTO_FACTURA, MONTO_PROPINA, MONTO_DEPOSITAR, TIPO_DE_MONEDA, PFORMADE_PAGO, FECHA_A_DEPOSITAR, STATUS_DE_PAGO, BANCO_ORIGEN, ACTIVO_FIJO, GASTO_FIJO, PAGAR_CADA, FECHA_PPAGO, FECHA_TPROGRAPAGO, NUMERO_EVENTOFIJO, CLASI_GENERAL, SUB_GENERAL, MONTO_DE_COMISION, POLIZA_NUMERO, NOMBRE_DEL_EJECUTIVO, OBSERVACIONESA, FECHA_DE_LLENADO, hiddenTIKETS1QA, tipo_documento,

FOTO_ESTADO_PROVEE11,
ADJUNTAR_ARCHIVO_1, 
ADJUNTAR_COTIZACION, 
COMPLEMENTOS_PAGO_PDF, 
COMPLEMENTOS_PAGO_XML, 
CANCELACIONES_PDF, 
CANCELACIONES_XML, 
ADJUNTAR_FACTURA_DE_COMISION_PDF, 
ADJUNTAR_FACTURA_DE_COMISION_XML, 
CALCULO_DE_COMISION, 
COMPROBANTE_DE_DEVOLUCION, 
NOTA_DE_CREDITO_COMPRA,
ADJUNTAR_FACTURA_PDF1,


		idRelacion) values ( '".$NUMERO_CONSECUTIVO_PROVEE."' , '".$RAZON_SOCIAL."' , '".$NOMBRE_COMERCIAL."' , '".$RFC_PROVEEDOR."' , '".$NUMERO_EVENTO."' , '".$NOMBRE_EVENTO."' , '".$MOTIVO_GASTO."' , '".$CONCEPTO_PROVEE."' , '".$MONTO_TOTAL_COTIZACION_ADEUDO."' , '".$MONTO_FACTURA."' , '".$MONTO_PROPINA."' , '".$MONTO_DEPOSITAR."' , '".$TIPO_DE_MONEDA."' , '".$PFORMADE_PAGO."' , '".$FECHA_A_DEPOSITAR."' , '".$STATUS_DE_PAGO."' , '".$BANCO_ORIGEN."' , '".$ACTIVO_FIJO."' , '".$GASTO_FIJO."' , '".$PAGAR_CADA."' , '".$FECHA_PPAGO."' , '".$FECHA_TPROGRAPAGO."' , '".$NUMERO_EVENTOFIJO."' , '".$CLASI_GENERAL."' , '".$SUB_GENERAL."' , '".$MONTO_DE_COMISION."' , '".$POLIZA_NUMERO."' , '".$NOMBRE_DEL_EJECUTIVO."' , '".$OBSERVACIONESA."' , '".$FECHA_DE_LLENADO."' , '".$hiddenTIKETS1QA."', '".$tipo_documento."' , 

'".$FOTO_ESTADO_PROVEE11."',	
'".$ADJUNTAR_ARCHIVO_1."', 
'".$ADJUNTAR_COTIZACION."', 
'".$COMPLEMENTOS_PAGO_PDF."', 
'".$COMPLEMENTOS_PAGO_XML."', 
'".$CANCELACIONES_PDF."', 
'".$CANCELACIONES_XML."', 
'".$ADJUNTAR_FACTURA_DE_COMISION_PDF."', 
'".$ADJUNTAR_FACTURA_DE_COMISION_XML."', 
'".$CALCULO_DE_COMISION."', 
'".$COMPROBANTE_DE_DEVOLUCION."', 
'".$NOTA_DE_CREDITO_COMPRA."', 
'".$ADJUNTAR_FACTURA_PDF1."' , '".$session."' ); ";		
			
		if($ENVIARtickets == 'ENVIARtickets'){
		//echo $var1;
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));

		return "Actualizado";

		}else{
			
		//echo $var2;			
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		
		$ultimo_id ='';	
		$ultimo_id = mysqli_insert_id($conn);
		$this->guardarxmlDB($ultimo_id,$conn,$tipo_documento,$ADJUNTAR_FACTURA_XML);
		$var3 = "UPDATE 10tiketsavion SET ADJUNTAR_FACTURA_XML  ='".$ADJUNTAR_FACTURA_XML."' where id = '".$ultimo_id."' "; 			
		mysqli_query($conn,$var3);
		
		return "Ingresado";
		
		}
			
        }else{
		echo "HA CADUCADO TU SESIÓN ";	
		}
    }
    public function Listado_tickets2($id){
		$conn = $this->db();
		$variablequery = "select * from 10tiketsavion  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	

	
	
	
	
	public function borraTICKETS($id){
		$conn = $this->db();
		$variablequery = "delete from 10tiketsavion where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
	}
}


	?>