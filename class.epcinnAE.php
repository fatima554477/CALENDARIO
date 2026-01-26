<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023
FECHA sandor: 
FECHA fatima: 01 JUNIO 2025     
*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	

	
	class accesoclase extends colaboradores{


	public function array_smtp($iniciales){

		$conn = $this->db();
		$variablequery = "select * from 03datossmtp where prefijo = '".$iniciales."' limit 1 ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		$host['Host'] = $row['Host'];
		$host['Username'] = $row['Username'];
		$host['Passwordd'] = $row['Passwordd'];
		$host['SMTPSecure'] = $row['SMTPSecure'];
		$host['Port'] = $row['Port'];
		$host['setFrom1'] = $row['setFrom1'];
		$host['setFrom2'] = $row['setFrom2'];
		$host['prefijo'] = $row['prefijo'];
		$host['idRelacion'] = $row['idRelacion'];
		return $host;
	}


	public function variables_informacionfiscal_logo2($idRelacion){
		
		$conn = $this->db();

		$variablequery = "select id,ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$idRelacion."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		if($row['id']!=''){
		return $row['ADJUNTAR_LOGO_INFORMACION'];
		}else{

		$variablequery1 = "select id from 03datosdelaempresa where NCE_OBSERVACIONES = 'EP' OR NCE_OBSERVACIONES = 'EPC'  ";
		$arrayquery1 = mysqli_query($conn,$variablequery1);
		$row = mysqli_fetch_array($arrayquery1, MYSQLI_ASSOC);
		if($row['id']==0){
			$idempresa = 1;
		}else{
			$idempresa = $row['id'];			
		}
		
			
		$variablequery = "select ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$row['id']."'  ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['ADJUNTAR_LOGO_INFORMACION'];			
		}
	}


	public function buscarnumero($filtro){
		$conn = $this->db();
		$variable = "select * from 04NUMEROevento where NUMERO_DE_EVENTO like '%".$filtro."%' ";
$variablequery = mysqli_query($conn,$variable);
		while($row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC)){
			$resultado [] = $row['NUMERO_DE_EVENTO'];
		}
		return $resultado;
		
	}


	
	public function NUMERO_EVENTO($NCE_OBSERVACIONES){
		$conn = $this->db();
		$variable = "select MAX(CONSECUTIVO) + 1 AS ULTIMO from 03datosdelaempresa WHERE NCE_OBSERVACIONES = '".$NCE_OBSERVACIONES."' ";
	 $variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row['ULTIMO'];
	}
	
	public function sologuardarAE($campo,$nuevonombre,$nombretabla,$idpost,$fecha,$idrelacionsesion,$BANDERA){
		$conn = $this->db();//idrelacionsesion
		$variablequery2 = 
		"insert into ".$nombretabla." 
		(idRelacion,".$campo.",fecha,idrelacionsesion, BANDERA) 
		values 
		(".$idpost.",'".$nuevonombre."','".$fecha."','".$idrelacionsesion."','".$BANDERA."') ";
		mysqli_query($conn,$variablequery2);
		}


	public function Listado_fotoseventostemporal($CAMPO,$fecha,$idrelacionsesion,$idrelacion){
		$conn = $this->db();

		$variablequery = "select id, ".$CAMPO." from 04EVENTOSfotos where 

		idRelacion  = '".$idrelacion."' and
		(".$CAMPO." is not null or ".$CAMPO." <> '') and BANDERA = 'si'
		order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

		
	public function cargarAE($archivo,$nombretabla,$IDENTIFICADOR='1',$idpost='no',$where=false,$idTemporal=false,$fecha=false,$idrelacionsesion=false,$BANDERA=false)
	{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		//$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		 $extension[$cuenta];

		if( 
		strtolower($extension[$cuenta]) == 'pdf' or 
		strtolower($extension[$cuenta]) == 'gif' or 
		strtolower($extension[$cuenta]) == 'jpeg' or 
		strtolower($extension[$cuenta]) == 'jpg' or 
		strtolower($extension[$cuenta]) == 'png' or 
		strtolower($extension[$cuenta]) == 'mp4' or 
		strtolower($extension[$cuenta]) == 'docx' or 
		strtolower($extension[$cuenta]) == 'doc' or 
		strtolower($extension[$cuenta]) == 'xml' or 
		strtolower($extension[$cuenta]) == 'txt' or
		strtolower($extension[$cuenta]) == 'xlsx' or
		strtolower($extension[$cuenta]) == 'htm' or
		strtolower($extension[$cuenta]) == 'xls'  		
		){ //gif o jpg
		/*if ($tamanyoarchivo <= $tamanyomax) { //archivo demasioado grande*/
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);
		if($IDENTIFICADOR=='1'){
		$this->sologuardar($archivo,$nuevonombre,$nombretabla);
		}elseif($IDENTIFICADOR=='2'){
		$this->sologuardar2($archivo,$nuevonombre,$nombretabla);
		}elseif($IDENTIFICADOR=='3'){
		$this->sologuardar3($archivo,$nuevonombre,$nombretabla,$idpost);
		}elseif($IDENTIFICADOR=='4'){
		$this->sologuardar4($archivo,$nuevonombre,$nombretabla,$idpost);
		}elseif($IDENTIFICADOR=='5'){
		$this->sologuardar5($archivo,$nuevonombre,$nombretabla,$where,$idpost);
		}elseif($IDENTIFICADOR=='6'){
		$this->sologuardar6($archivo,$nuevonombre,$nombretabla,$idpost,$idTemporal);
		}elseif($IDENTIFICADOR=='7'){
		$this->sologuardarAE($archivo,$nuevonombre,$nombretabla,$idpost,$fecha,$idrelacionsesion,$BANDERA);
		}
		
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
        



		
		
	
	/*
	
	INFORMACION IMPORTANTE
	//
	*/
	
	
	public function var_altaeventos(){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos where id = '".$_SESSION['idevento']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}
	public function var_altaeventosdoctos(){
		$conn = $this->db();
		$variablequery = "select * from 04EVENTOSfotos where id = '".$_SESSION['id']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}
	public function Listado_altaeventosDOCTOS($id){ 
	$conn = $this->db(); 
	$variablequery = "select * from 04EVENTOSfotos where idRelacion = '".$id."'  order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery); }
	
	public function variable_altaeventos(){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos where idRelacion = '".$_SESSION['id']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function variable_fecha(){
		$conn = $this->db();
		$variablequery = "select FECHA_AUTORIZACION_EVENTO from 04altaeventos where id = '".$_SESSION['idevento']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['FECHA_AUTORIZACION_EVENTO'];
		
	}


	public function revisar_altaeventos(){
		$conn = $this->db();
		$var1 = 'select id from 04altaeventos where idRelacion =  "'.$_SESSION['id'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function buscar(){
	$palabraclave = isset($_POST['busqueda'])?trim(strval($_POST['busqueda'])):'';
	//if($palabraclave!=''){
	$ResultadoPais[] = 'bbbbbbb'.$_POST['busqueda'];
	$ResultadoPais[] = 'nnnnnnn'.$_POST['busqueda'];
	}

	public function altaeventos ($NUMERO_EVENTO,$FECHA_ALTA_EVENTO , $STATUS_EVENTO , $FECHA_AUTORIZACION_EVENTO , $MONTOC_TOTAL_EVENTO , $MONTO_TOTAL_AVION ,$CANTIDAD_PORCENTAJEV,$FEE_COBRADO,$PORCENTAJE_FEE, $MONTO_TOTAL_DEL_EVENTO , $NOMBRE_COMERCIAL_EVENTO , $NOMBRE_FISCAL_EVENTO , $NOMBRE_EVENTO , $NOMBRE_CORTO_EVENTO , $NOMBRE_CONTACTO_EVENTO , $CELULAR_CONTACTO_1 , $CORREO_CONTACTO_1 , $AREA_CONTACTO_CLIENTE , $OBSERVACIONES_1 , $TIPO_DE_EVENTO , $FORMATO_EVENTO , $PAIS_DEL_EVENTO , $CIUDAD_DEL_EVENTO , $HOTEL_LUGAR , $NUMERO_DE_PERSONAS , $FECHA_INICIO_EVENTO , $NOMBRE_COMERCIAL , $FECHA_FINAL_EVENTO , $HORA_TERMINO_EVENTO , $FECHA_LLEGADA_STAFF , $HORA_LLEGADA_STAFF , $FECHA_REGRESO_STAFF , $HORA_REGRESO_STAFF , $MATERIAL_EQUIPO_BODEGA, $FECHA_INICIO_MONTAJE, $HORA_INICIO_MONTAJE, $FECHA_DESMONTAJE,$HORA_DESMONTAJE, $LUGAR_MONTAJE,$SERVICIO_OTORGAR,$MONEDAS,$NOMBRE_VENDEDOR,$NOMBRE_EJECUTIVOEVENTO,$CIERRE_TOTAL,$TOTAL_AVION_SINIVA,$NOMBRE_INGRESO,$hALTAEVENTOS,$NOMBRE_AUDITOR,$enviaraltaeventos, $borraraltaeventos,$IPaltaeventos){
		$CANTIDAD_PORCENTAJEV  = str_replace(',','',$CANTIDAD_PORCENTAJEV);
		$MONTO_TOTAL_DEL_EVENTO  = str_replace(',','',$MONTO_TOTAL_DEL_EVENTO);
		$MONTO_TOTAL_AVION  = str_replace(',','',$MONTO_TOTAL_AVION);
		$FEE_COBRADO  = str_replace(',','',$FEE_COBRADO);
		$MONTOC_TOTAL_EVENTO  = str_replace(',','',$MONTOC_TOTAL_EVENTO);		
		$TOTAL_AVION_SINIVA  = str_replace(',','',$TOTAL_AVION_SINIVA);		
		$conn = $this->db();
		$existe = $this->revisar_altaeventos();
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';                                     
		if($session != ''){
			
		$var1 = "update 04altaeventos set   NUMERO_EVENTO = '".$NUMERO_EVENTO."' , FECHA_ALTA_EVENTO = '".$FECHA_ALTA_EVENTO."' ,  STATUS_EVENTO = '".$STATUS_EVENTO."' , FECHA_AUTORIZACION_EVENTO = '".$FECHA_AUTORIZACION_EVENTO."' , MONTOC_TOTAL_EVENTO = '".$MONTOC_TOTAL_EVENTO."' , MONTO_TOTAL_AVION = '".$MONTO_TOTAL_AVION."' , CANTIDAD_PORCENTAJEV = '".$CANTIDAD_PORCENTAJEV."' , FEE_COBRADO = '".$FEE_COBRADO."' , PORCENTAJE_FEE = '".$PORCENTAJE_FEE."' , MONTO_TOTAL_DEL_EVENTO = '".$MONTO_TOTAL_DEL_EVENTO."' , NOMBRE_COMERCIAL_EVENTO = '".$NOMBRE_COMERCIAL_EVENTO."' , NOMBRE_FISCAL_EVENTO = '".$NOMBRE_FISCAL_EVENTO."' , NOMBRE_EVENTO = '".$NOMBRE_EVENTO."' , NOMBRE_CORTO_EVENTO = '".$NOMBRE_CORTO_EVENTO."' , NOMBRE_CONTACTO_EVENTO = '".$NOMBRE_CONTACTO_EVENTO."' , CELULAR_CONTACTO_1 = '".$CELULAR_CONTACTO_1."' , CORREO_CONTACTO_1 = '".$CORREO_CONTACTO_1."' , AREA_CONTACTO_CLIENTE = '".$AREA_CONTACTO_CLIENTE."' , OBSERVACIONES_1 = '".$OBSERVACIONES_1."' , TIPO_DE_EVENTO = '".$TIPO_DE_EVENTO."' , FORMATO_EVENTO = '".$FORMATO_EVENTO."' , PAIS_DEL_EVENTO = '".$PAIS_DEL_EVENTO."' , CIUDAD_DEL_EVENTO = '".$CIUDAD_DEL_EVENTO."' , HOTEL_LUGAR = '".$HOTEL_LUGAR."' , NUMERO_DE_PERSONAS = '".$NUMERO_DE_PERSONAS."' , FECHA_INICIO_EVENTO = '".$FECHA_INICIO_EVENTO."' , NOMBRE_COMERCIAL = '".$NOMBRE_COMERCIAL."' , FECHA_FINAL_EVENTO = '".$FECHA_FINAL_EVENTO."' , HORA_TERMINO_EVENTO = '".$HORA_TERMINO_EVENTO."' , FECHA_LLEGADA_STAFF = '".$FECHA_LLEGADA_STAFF."' , HORA_LLEGADA_STAFF = '".$HORA_LLEGADA_STAFF."' , FECHA_REGRESO_STAFF = '".$FECHA_REGRESO_STAFF."' , HORA_REGRESO_STAFF = '".$HORA_REGRESO_STAFF."' , MATERIAL_EQUIPO_BODEGA = '".$MATERIAL_EQUIPO_BODEGA."' , FECHA_INICIO_MONTAJE = '".$FECHA_INICIO_MONTAJE."' , HORA_INICIO_MONTAJE = '".$HORA_INICIO_MONTAJE."' , FECHA_DESMONTAJE = '".$FECHA_DESMONTAJE."' , HORA_DESMONTAJE = '".$HORA_DESMONTAJE."' , LUGAR_MONTAJE = '".$LUGAR_MONTAJE."' , SERVICIO_OTORGAR = '".$SERVICIO_OTORGAR."' , MONEDAS = '".$MONEDAS."' , NOMBRE_VENDEDOR = '".$NOMBRE_VENDEDOR."' , NOMBRE_EJECUTIVOEVENTO = '".$NOMBRE_EJECUTIVOEVENTO."' , CIERRE_TOTAL = '".$CIERRE_TOTAL."' , TOTAL_AVION_SINIVA = '".$TOTAL_AVION_SINIVA."' , NOMBRE_INGRESO = '".$NOMBRE_INGRESO."' , NOMBRE_AUDITOR = '".$NOMBRE_AUDITOR."' , hALTAEVENTOS = '".$hALTAEVENTOS."' where id = '".$IPaltaeventos."' ; ";
	
		$var2 = "insert into 04altaeventos ( NUMERO_EVENTO, FECHA_ALTA_EVENTO, STATUS_EVENTO, FECHA_AUTORIZACION_EVENTO, MONTOC_TOTAL_EVENTO, MONTO_TOTAL_AVION,CANTIDAD_PORCENTAJEV,FEE_COBRADO, PORCENTAJE_FEE,MONTO_TOTAL_DEL_EVENTO, NOMBRE_COMERCIAL_EVENTO, NOMBRE_FISCAL_EVENTO, NOMBRE_EVENTO, NOMBRE_CORTO_EVENTO, NOMBRE_CONTACTO_EVENTO, CELULAR_CONTACTO_1, CORREO_CONTACTO_1, AREA_CONTACTO_CLIENTE, OBSERVACIONES_1, TIPO_DE_EVENTO, FORMATO_EVENTO, PAIS_DEL_EVENTO, CIUDAD_DEL_EVENTO, HOTEL_LUGAR, NUMERO_DE_PERSONAS, FECHA_INICIO_EVENTO, NOMBRE_COMERCIAL, FECHA_FINAL_EVENTO, HORA_TERMINO_EVENTO, FECHA_LLEGADA_STAFF, HORA_LLEGADA_STAFF, FECHA_REGRESO_STAFF, HORA_REGRESO_STAFF,MATERIAL_EQUIPO_BODEGA,FECHA_INICIO_MONTAJE,HORA_INICIO_MONTAJE,FECHA_DESMONTAJE,HORA_DESMONTAJE,LUGAR_MONTAJE,SERVICIO_OTORGAR,MONEDAS,NOMBRE_VENDEDOR,NOMBRE_EJECUTIVOEVENTO,CIERRE_TOTAL,TOTAL_AVION_SINIVA,
		NOMBRE_INGRESO, NOMBRE_AUDITOR, hALTAEVENTOS, idRelacion) values ( '".$NUMERO_EVENTO."' , '".$FECHA_ALTA_EVENTO."' , '".$STATUS_EVENTO."' , '".$FECHA_AUTORIZACION_EVENTO."' , '".$MONTOC_TOTAL_EVENTO."' , '".$MONTO_TOTAL_AVION."' , '".$CANTIDAD_PORCENTAJEV."' , '".$FEE_COBRADO."' , '".$PORCENTAJE_FEE."' , '".$MONTO_TOTAL_DEL_EVENTO."' , '".$NOMBRE_COMERCIAL_EVENTO."' , '".$NOMBRE_FISCAL_EVENTO."' , '".$NOMBRE_EVENTO."' , '".$NOMBRE_CORTO_EVENTO."' , '".$NOMBRE_CONTACTO_EVENTO."' , '".$CELULAR_CONTACTO_1."' , '".$CORREO_CONTACTO_1."' , '".$AREA_CONTACTO_CLIENTE."' , '".$OBSERVACIONES_1."' , '".$TIPO_DE_EVENTO."' , '".$FORMATO_EVENTO."' , '".$PAIS_DEL_EVENTO."' , '".$CIUDAD_DEL_EVENTO."' , '".$HOTEL_LUGAR."' , '".$NUMERO_DE_PERSONAS."' , '".$FECHA_INICIO_EVENTO."' , '".$NOMBRE_COMERCIAL."' , '".$FECHA_FINAL_EVENTO."' , '".$HORA_TERMINO_EVENTO."' , '".$FECHA_LLEGADA_STAFF."' , '".$HORA_LLEGADA_STAFF."' , '".$FECHA_REGRESO_STAFF."' , '".$HORA_REGRESO_STAFF."' , '".$MATERIAL_EQUIPO_BODEGA."' , '".$FECHA_INICIO_MONTAJE."' , '".$HORA_INICIO_MONTAJE."' , '".$FECHA_DESMONTAJE."' , '".$HORA_DESMONTAJE."' , '".$LUGAR_MONTAJE."' , '".$SERVICIO_OTORGAR."' , '".$MONEDAS."' , '".$NOMBRE_VENDEDOR."' , '".$NOMBRE_EJECUTIVOEVENTO."' , '".$CIERRE_TOTAL."' , '".$TOTAL_AVION_SINIVA."' , '".$NOMBRE_INGRESO."' , '".$NOMBRE_AUDITOR."' , '".$hALTAEVENTOS."' , '".$_SESSION['id']."');  ";	
			
	   	    if($IPaltaeventos != 'enviaraltaeventos' and $IPaltaeventos >= '1'){

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		/*$varfotos = "update 04EVENTOSfotos set idRelacion = '".mysqli_insert_id($conn)."',fecha=null,idrelacionsesion=null where fecha = '".date('Y-m-d')."' and idrelacionsesion = '".$_SESSION['id']."' ";
		mysqli_query($conn,$varfotos) or die('P160'.mysqli_error($conn));*/
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		$varfotos = "update 04EVENTOSfotos set idRelacion = '".mysqli_insert_id($conn)."',fecha=null,idrelacionsesion=null  where fecha = '".date('Y-m-d')."' and idrelacionsesion = '".$_SESSION['id']."' ";
		mysqli_query($conn,$varfotos) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "HA CADUCADO TU SESIÓN ";	
		}
    }

	public function Listado_fotoseventos($idrow){
		$conn = $this->db();

		$variablequery = "select * from 04EVENTOSfotos where idRelacion = '".$idrow."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function borrafoto($idrow){
		$conn = $this->db();

		echo $variablequery = "delete from 04EVENTOSfotos where id = '".$idrow."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function Listado_altaeventos(){
		$conn = $this->db();

		$variablequery = "select * from 04altaeventos order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function Listado_altaeventos2($id){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borraraltaeventos($id){
		$conn = $this->db();
		$var1 = "DELETE FROM 04altaeventos where id = '".$id."' "; 
		mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		
		$var2 = "DELETE FROM `04NUMEROevento` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var2) or die('P44'.mysqli_error($conn));
		
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	







/*AGREGAR NUMERO EVENTO*//*AGREGAR NUMERO EVENTO*//*AGREGAR NUMERO EVENTO*//*AGREGAR NUMERO EVENTO*//*AGREGAR NUMERO 

	/*funcion que trae colaboradores lista_colaboradoreventos */

   	public function lista_colaboradoreventos(){
	$conn = $this->db();                                           
	$variable = "select *,01informacionpersonal.idRelacion as idR from 01informacionpersonal inner join 01adjuntoscolaboradores on 01informacionpersonal.idRelacion = 01adjuntoscolaboradores.idRelacion where ESTATUS_CRM_ACTIVOBAJA = 'ACTIVO' order by 01informacionpersonal.`NOMBRE_1` asc; ";
	
	return $arrayquery = mysqli_query($conn,$variable);	
		
	}
	
	
   	public function lista_colaboradoreventos2(){
	$conn = $this->db();                                           
	$variable = "select *,01informacionpersonal.idRelacion as idR from 01informacionpersonal inner join 01adjuntoscolaboradores on 01informacionpersonal.idRelacion = 01adjuntoscolaboradores.idRelacion where ESTATUS_CRM_ACTIVOBAJA = 'ACTIVO' order by 01informacionpersonal.`NOMBRE_1` asc; ";
	
	return $arrayquery = mysqli_query($conn,$variable);	
		
	}
  

		public function lista_plantillaempresacontrasenas(){
	$conn = $this->db();
		$variable = "select 03datosdelaempresa.id as idR, NFE_INFORMACION  from 
		03datosdelaempresa, 01adjuntoscolaboradores
		WHERE ESTATUS_CRM_ACTIVOBAJA='ACTIVO' and
		03datosdelaempresa.id = `01adjuntoscolaboradores`.`idRelacion`
		";
	return $variablequery = mysqli_query($conn,$variable);

	}


	public function obtener_direccion_empresas($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `03datosdelaempresa` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
		
		return 
		$row['ED_INFORMACION'].'^'.
		$row['CA_INFORMACION'].'^'.
		$row['NE_INFORMACION'].'^'.
		$row['NI_INFORMACION'].'^'.
		$row['NDO_INFORMACION'].'^'.
		$row['COL_INFORMACION'].'^'.
		$row['AL_INFORMACION'].'^'.
		$row['CP_INFORMACION'].'^'.
		$row['CIU_INFORMACION'].'^'.
		$row['ES_INFORMACION'].'^'.
		$row['PA_INFORMACION'].'^'.
		$row['P_UBICACION_MAPA_EPC'].'^'.
		$row['TEL_INFORMACION'].'^'.
		$row['TEL2_INFORMACION'].'^'.
		$row['WHA_INFORMACION'];	


	}




	public function obtener_direccion_proveedores($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `02direccionproveedor1` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
			
		
		return 
		$row['P_EDIFICIO_EMPRESA'].'^'.
		$row['P_CALLE_EMPRESA'].'^'.
		$row['P_NUMERO_EXTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_INTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_OFICINA_EMPRESA'].'^'.
		$row['P_COLONIA_EMPRESA'].'^'.
		$row['P_ALCALDIA_EMPRESA'].'^'.
		$row['P_C_P_EMPRESA'].'^'.
		$row['P_CIUDAD_EMPRESA'].'^'.
		$row['P_ESTADO_EMPRESA'].'^'.
		$row['P_PAIS_EMPRESA'].'^'.
		$row['P_UBICACION_MAPA_1'].'^'.
		$row['P_TELEFONO_1_EMPRESA'].'^'.
		$row['P_TELEFONO_2_EMPRESA'].'^'.
		$row['P_WHATSAPP_EMPRESA_1'];	


	}

	public function obtener_direccion_clientes($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `06direccionclientes` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
		return 
		$row['P_EDIFICIO_EMPRESA'].'^'.
		$row['P_CALLE_EMPRESA'].'^'.
		$row['P_NUMERO_EXTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_INTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_OFICINA_EMPRESA'].'^'.
		$row['P_COLONIA_EMPRESA'].'^'.
		$row['P_ALCALDIA_EMPRESA'].'^'.
		$row['P_C_P_EMPRESA'].'^'.
		$row['P_CIUDAD_EMPRESA'].'^'.
		$row['P_ESTADO_EMPRESA'].'^'.
		$row['P_PAIS_EMPRESA'].'^'.
		$row['P_UBICACION_MAPA_1'].'^'.
		$row['P_TELEFONO_1_EMPRESA'].'^'.
		$row['P_TELEFONO_2_EMPRESA'].'^'.
		$row['P_WHATSAPP_EMPRESA_1'];	


	}

///////////////////////////////////////////DIRECCION ENVIA////////////////////////////////////////////////

	public function obtener_direccion_empresas2($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `03datosdelaempresa` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
		$_SESSION['id_para_contacto']=$id;		
		$_SESSION['tabla_para_contacto']='03datoscontactosempresa';
		$_SESSION['contactos']='NOC_INFORMACION';
		$_SESSION['telefonos']='NCEL_INFORMACION';
		$_SESSION['id_BUSQUEDA']='idRelacion';
		
		return 
		$row['ED_INFORMACION'].'^'.
		$row['CA_INFORMACION'].'^'.
		$row['NE_INFORMACION'].'^'.
		$row['NI_INFORMACION'].'^'.
		$row['NDO_INFORMACION'].'^'.
		$row['COL_INFORMACION'].'^'.
		$row['AL_INFORMACION'].'^'.
		$row['CP_INFORMACION'].'^'.
		$row['CIU_INFORMACION'].'^'.
		$row['ES_INFORMACION'].'^'.
		$row['PA_INFORMACION'].'^'.
		$row['P_UBICACION_MAPA_EPC'].'^'.
		$row['TEL_INFORMACION'].'^'.
		$row['TEL2_INFORMACION'].'^'.
		$row['WHA_INFORMACION'];	


	}




	public function obtener_direccion_proveedores2($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `02direccionproveedor1` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
		$_SESSION['id_para_contacto']=$row['idRelacion'];
		$_SESSION['tabla_para_contacto']='02contactosprovee';
		$_SESSION['contactos']='NOMBRE_CONTACTO_PROVEE';
		$_SESSION['telefonos']='TELEFONO_CONTACPROVEE';
		$_SESSION['id_BUSQUEDA']='idRelacion';
		return 
		$row['P_EDIFICIO_EMPRESA'].'^'.
		$row['P_CALLE_EMPRESA'].'^'.
		$row['P_NUMERO_EXTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_INTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_OFICINA_EMPRESA'].'^'.
		$row['P_COLONIA_EMPRESA'].'^'.
		$row['P_ALCALDIA_EMPRESA'].'^'.
		$row['P_C_P_EMPRESA'].'^'.
		$row['P_CIUDAD_EMPRESA'].'^'.
		$row['P_ESTADO_EMPRESA'].'^'.
		$row['P_PAIS_EMPRESA'].'^'.
		$row['P_UBICACION_MAPA_1'].'^'.
		$row['P_TELEFONO_1_EMPRESA'].'^'.
		$row['P_TELEFONO_2_EMPRESA'].'^'.
		$row['P_WHATSAPP_EMPRESA_1'];	


	}

	public function obtener_direccion_clientes2($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `06direccionclientes` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
		$_SESSION['id_para_contacto']=$row['idRelacion'];
		$_SESSION['tabla_para_contacto']='06contactos';
		$_SESSION['contactos']='NOMBRE_CONTACTO_PROVEE';
		$_SESSION['telefonos']='TELEFONO_CONTACPROVEE';
		$_SESSION['id_BUSQUEDA']='idRelacion';		
		return 
		$row['P_EDIFICIO_EMPRESA'].'^'.
		$row['P_CALLE_EMPRESA'].'^'.
		$row['P_NUMERO_EXTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_INTERIOR_EMPRESA'].'^'.
		$row['P_NUMERO_OFICINA_EMPRESA'].'^'.
		$row['P_COLONIA_EMPRESA'].'^'.
		$row['P_ALCALDIA_EMPRESA'].'^'.
		$row['P_C_P_EMPRESA'].'^'.
		$row['P_CIUDAD_EMPRESA'].'^'.
		$row['P_ESTADO_EMPRESA'].'^'.
		$row['P_PAIS_EMPRESA'].'^'.
		$row['P_UBICACION_MAPA_1'].'^'.
		$row['P_TELEFONO_1_EMPRESA'].'^'.
		$row['P_TELEFONO_2_EMPRESA'].'^'.
		$row['P_WHATSAPP_EMPRESA_1'];	


	}
	

	

//////////////////////////////////////////traer celular ///////////////////////////////////////////////////
	public function obtener_cel_solicitante($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `01empresa` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
			
//CORREO_3
		return  $row['CORREO_3'];
		

}
	



///////////////////////////////////////NUEVO NUEVO NUEVO //////////////////////////////////////////////
	public function obtener_costo_vehiculo($id){
		$conn = $this->db();
		$variable = "SELECT * FROM `09MENSAJERIA` where id = '".$id."' ";
		$variablequery = mysqli_query($conn,$variable);
		$row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC);
			

		return  $row['ADJUNTO_MENSAJERIA'];
		

}
/////////////////////////////////////////////////////////////////////////////////////////////777

	public function un_solo_colaborador2($id,$tabla,$campo){
	$conn = $this->db();
	$variable = "select id , ".$campo."  from ".$tabla."
	WHERE id = '".$id."' ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row[$campo];
	}




	public function un_solo_colaborador($id,$tabla,$campo){
	$conn = $this->db();
	$variable = "select id , ".$campo."  from ".$tabla."
	WHERE id = '".$id."' ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row[$campo];
	}
	
	public function un_solo_colaborador_nombre($id,$tabla,$campo){
	$conn = $this->db();
	$explotado = explode('^^',$id);
	$variable = "select id ,NOMBRE_2,APELLIDO_PATERNO,APELLIDO_MATERNO, ".$campo."  from ".$tabla."
	WHERE idRelacion = '".$explotado[0]."' ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return  $row['NOMBRE_1'].' '. $row['NOMBRE_2'].' '. $row['APELLIDO_PATERNO'].' '. $row['APELLIDO_MATERNO'];
	}
	
	public function mensajeria_direccion($id,$tabla,$campo){
	$conn = $this->db();
	$variable = "select id , ".$campo."  from ".$tabla."
	WHERE id = '".$id."' ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row[$campo];
	}


	
	
	/*funcion que trae iniciales del corporativo*/
	public function lista_inicialescorp(){
		$conn = $this->db();
		$variable = "select NCE_OBSERVACIONES from 03datosdelaempresa ";
	return $variablequery = mysqli_query($conn,$variable);

	}

	public function variable_numeroevento(){
		$conn = $this->db();
		$variablequery = "select * from 04NUMEROevento where idRelacion = '".$_SESSION['idevento']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_numeroevento($numeroevento){
		$conn = $this->db();
		$var1 = 'select id from 04NUMEROevento where NUMERO_DE_EVENTO =  "'.$numeroevento.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	
	public function refresca_num_evento(){
		$conn = $this->db();
		$var1 = 'select NUMERO_EVENTO from 04altaeventos where id =  "'.$_SESSION['idevento'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['NUMERO_EVENTO'];
	}
	
	public function numeroevento ($NUMERO_EVENTO_COLABORADOR , $INICIALES_EMPRESA_EVENTO , $NUMERO_DE_EVENTO , $FECHA_NUMERO_EVENTO , $hnumeroevento){
		$conn = $this->db();
		$existe = $this->revisar_numeroevento($INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO);
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		$var1 = "update 04NUMEROevento set 
		NUMERO_EVENTO_COLABORADOR = '".$NUMERO_EVENTO_COLABORADOR."' ,
		INICIALES_EMPRESA_EVENTO = '".$INICIALES_EMPRESA_EVENTO."' ,
		NUMERO_DE_EVENTO = '".$INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO."' , 
		FECHA_NUMERO_EVENTO = '".$FECHA_NUMERO_EVENTO."' , 
		hnumeroevento = '".$hnumeroevento."' where NUMERO_DE_EVENTO = '".$INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO."'; ";
	
		$var2 = "insert into 04NUMEROevento (
		NUMERO_EVENTO_COLABORADOR, 
		INICIALES_EMPRESA_EVENTO, 
		NUMERO_DE_EVENTO, 
		FECHA_NUMERO_EVENTO, 
		hnumeroevento, 
		idRelacion) values ( 
		'".$NUMERO_EVENTO_COLABORADOR."' , 
		'".$INICIALES_EMPRESA_EVENTO."' , 
		'".$INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO."' , 
		'".$FECHA_NUMERO_EVENTO."' , 
		'".$hnumeroevento."' , 
		'".$_SESSION['idevento']."'
		);  ";	
		
		$vareventos = "update 04altaeventos set 
		NUMERO_EVENTO = '".$INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO."' ,
		FECHA_AUTORIZACION_EVENTO = '".date('Y-m-d')."',
		iniciales_evento  = '".$INICIALES_EMPRESA_EVENTO."'
		where id = '".$session."' ";	

		$vainiciales = "update 03datosdelaempresa set 
		CONSECUTIVO = '".$NUMERO_DE_EVENTO."' 
		where NCE_OBSERVACIONES = '".$INICIALES_EMPRESA_EVENTO."' ";
		
	    if($existe == 0 or $existe == ''){

		mysqli_query($conn,$var2) or die('P156'.mysqli_error($conn));
		//return mysqli_insert_id($conn);

		mysqli_query($conn,$vareventos) or die('P157'.mysqli_error($conn));
		mysqli_query($conn,$vainiciales) or die('P157'.mysqli_error($conn));		
		return "Ingresado";			
		}else{
		mysqli_query($conn,$var1) or die('P160'.mysqli_error($conn));
		mysqli_query($conn,$vareventos) or die('P157'.mysqli_error($conn));
		mysqli_query($conn,$vainiciales) or die('P157'.mysqli_error($conn));		
		return "Actualizado";
		}
			
        }else{
		echo "SELECCIONA UN EVENTO DE LA LISTA";	
		}
    }
	







/*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*//*cierr*/
	public function revisar_guardar_cierre($IPCIERRE){
		$conn = $this->db();
		$var1 = 'select id from 04cierre where id = "'.$IPCIERRE.'" ';
		//echo 'sssssssssssss'.$var1;
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function guardar_cierre(  $DOCUMENTO_cierre , $OBSERVACIONES_cierre , $fecha_cierre,$adjunto_cierre , $hCIERRE, $IPCIERRE,$enviarCIERRE){
		
		$conn = $this->db();
		$existe = $this->revisar_guardar_cierre($IPCIERRE);
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		$var1 = "update 04cierre set 
		DOCUMENTO_cierre = '".$DOCUMENTO_cierre."' , 
		OBSERVACIONES_cierre = '".$OBSERVACIONES_cierre."' , 

		hCIERRE = '".$hCIERRE."'  where id = '".$IPCIERRE."' ; ";
	
		 $var2 = " insert into 04cierre ( DOCUMENTO_cierre, OBSERVACIONES_cierre, fecha_cierre,adjunto_cierre, hCIERRE, idRelacion) values ( 
		 '".$DOCUMENTO_cierre."' , '".$OBSERVACIONES_cierre."' ,
		 '".$fecha_cierre."' , '".$adjunto_cierre."' , 
		 '".$hCIERRE."' , '".$session."' ); ";		
			
	    if($enviarCIERRE=='enviarCIERRE'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}




	public function Listado_cierre(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04cierre WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
    public function Listado_cierre2($id){
		$conn = $this->db();
		$variablequery = "select * from 04cierre  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function BORRAREGISTRO_cierre( $borra_CIERREID){
		$conn = $this->db();
		$var1 = 'DELETE from 04cierre where id = "'.$borra_CIERREID.'" ';
		//echo 'sssssssssssss'.$var1;
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		mysqli_fetch_array($query, MYSQLI_ASSOC);
				RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}
	









/*nuevodocucierr*//*nuevodocucierr*//*nuevodocucierr*//*nuevodocucierr*//*nuevodocucierr*/


	public function NUEVODOCUCIERRE($nuevo_documento_cierre , $hnuevodocucierre,$enviarCIERRENUEVO,$IPCIERRENUEVO){
		$conn = $this->db();
		//$existe = $this->revisar_guardar_cierrenuevo();
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';  
		if($session != ''){
			
		 $var1 = "update 04nuevodocumentocierre set 
		 nuevo_documento_cierre = '".$nuevo_documento_cierre."' where id = '".$IPCIERRENUEVO."' ; ";
	
		 $var2 = " insert into 04nuevodocumentocierre (nuevo_documento_cierre, hnuevodocucierre, idRelacion) values ( '".$nuevo_documento_cierre."' , '".$hnuevodocucierre."' , '".$session."' ); ";		
			
	    if($enviarCIERRENUEVO=='enviarCIERRENUEVO'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
	}


	
	
	public function Listado_nuevocierre2($id){
		$conn = $this->db();
		$variablequery = "select * from 04nuevodocumentocierre  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function Listado_nuevocierre(){
		$conn = $this->db();
		$variablequery = "select * from 04nuevodocumentocierre ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	public function revisar_guardar_nuevo($id){
		$conn = $this->db();
		$var1 = 'select id from 04nuevodocumentocierre where id = "'.$id.'" ';
		
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	public function BORRAREGISTRO_cierrenuevo($id){
		$conn = $this->db();
		$var1 = 'DELETE from 04nuevodocumentocierre where id = "'.$id.'" ';
	
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		mysqli_fetch_array($query, MYSQLI_ASSOC);
				RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}
	



/*programa operativo*//*programa operativo*//*programa operativo*//*programa operativo*//*programa operativo*//*programa operativo*/

	public function revisar_programaoperativo($IPCIERRE){
		$conn = $this->db();
		$var1 = 'select id from 04programaoperativo where id = "'.$IPCIERRE.'" ';
		//echo 'sssssssssssss'.$var1;
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function guarda_programaoperativo($ADJUNTO_PROGRAMAOPERATIVO, $DOCUMENTO_PROGRAMAOPERATIVO , $OBSERVACIONES_PROGRAMAOPERATIVO , $FECHA_PROGRAMAOPERATIVO , $hPROGRAMAOPERATIVO, $ipPROGRAMAOPERATIVO,$enviarOPERATIVO){
		
		$conn = $this->db();
		//$existe = $this->revisar_programaoperativo($IPCIERRE);
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04programaoperativo set 

		 DOCUMENTO_PROGRAMAOPERATIVO = '".$DOCUMENTO_PROGRAMAOPERATIVO."' ,
		 OBSERVACIONES_PROGRAMAOPERATIVO = '".$OBSERVACIONES_PROGRAMAOPERATIVO."' , 
 
		 hPROGRAMAOPERATIVO = '".$hPROGRAMAOPERATIVO."'
		 where id = '".$ipPROGRAMAOPERATIVO."' ;  ";
	
		 $var2 = " insert into 04programaoperativo (ADJUNTO_PROGRAMAOPERATIVO, DOCUMENTO_PROGRAMAOPERATIVO, OBSERVACIONES_PROGRAMAOPERATIVO, FECHA_PROGRAMAOPERATIVO, hPROGRAMAOPERATIVO, idRelacion) values ('".$ADJUNTO_PROGRAMAOPERATIVO."', '".$DOCUMENTO_PROGRAMAOPERATIVO."' , '".$OBSERVACIONES_PROGRAMAOPERATIVO."' , '".$FECHA_PROGRAMAOPERATIVO."' , '".$hPROGRAMAOPERATIVO."' , '".$session."' ); ";		
			
	    if($enviarOPERATIVO=='enviarOPERATIVO'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}

	public function borra_programaoperativo($id){
		$conn = $this->db();
		$variablequery = "delete from 04programaoperativo where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	public function Listado_PROGRAMAOPERATIVO($idrelacionsesion){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04programaoperativo WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
	public function Listado_operativo2($id){
		$conn = $this->db();
		$variablequery = "select * from 04programaoperativo  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}







/*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*//*rooming list*/



	public function guarda_rooming($ADJUNTO_ROOMING1,$DOCUMENTO_ROOMING , $OBSERVACIONES_ROOMING , $FECHA_ROOMING , $enviarROOMINGLISTOV,$iproominglinst ){
		
		$conn = $this->db();
		//$existe = $this->revisar_programaoperativo($IPCIERRE);
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04roominglist set 
		 DOCUMENTO_ROOMING  = '".$DOCUMENTO_ROOMING."' ,
		 OBSERVACIONES_ROOMING = '".$OBSERVACIONES_ROOMING."' , 
		 hROOMING = '".$hROOMING."' where id = '".$iproominglinst."' ;  ";
	
		 $var2 = "insert into 04roominglist ( DOCUMENTO_ROOMING, OBSERVACIONES_ROOMING, FECHA_ROOMING, hROOMING, idRelacion,ADJUNTO_ROOMING) values ( '".$DOCUMENTO_ROOMING."' , '".$OBSERVACIONES_ROOMING."' , '".$FECHA_ROOMING."' , '".$hROOMING."' , '".$session."' , '".$ADJUNTO_ROOMING1."' ); ";		
			
	    if($enviarROOMINGLISTOV=='enviarROOMINGLISTOV'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
	public function borra_rooming($id){
		$conn = $this->db();
		$variablequery = "delete from 04roominglist where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	public function Listado_rooming2($id){
		$conn = $this->db();
		$variablequery = "select * from 04roominglist  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
	
	
	public function Listado_rooming(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04roominglist WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	
	





    /////////////////////////CRONOS VUELOS///////////////////////////////////



public function CRONOVUELOS($DOCUMENTO_CRONOVUELOS ,$OBSERVACIONES_CRONOVUELOS,$ADJUNTO_CRONOVUELOS , $FECHA_CRONOVUELOS , $hCRONOVUELOS1,$Icronosvuelos,$enviarCRONOSVUELOS){
		
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04cronologicovuelos  set 
		 DOCUMENTO_CRONOVUELOS = '".$DOCUMENTO_CRONOVUELOS."' , 
		 OBSERVACIONES_CRONOVUELOS = '".$OBSERVACIONES_CRONOVUELOS."' ,
		 hCRONOVUELOS1 = '".$hCRONOVUELOS1."' 
		 where id = '".$Icronosvuelos."' ;  ";
	
		 $var2 = "insert into 04cronologicovuelos ( DOCUMENTO_CRONOVUELOS, OBSERVACIONES_CRONOVUELOS, ADJUNTO_CRONOVUELOS,FECHA_CRONOVUELOS, hCRONOVUELOS1, idRelacion) values ( '".$DOCUMENTO_CRONOVUELOS."' , '".$OBSERVACIONES_CRONOVUELOS."' , '".$ADJUNTO_CRONOVUELOS."' , '".$FECHA_CRONOVUELOS."' , '".$hCRONOVUELOS1."' , '".$session."' ); ";		
			
	    if($enviarCRONOSVUELOS=='enviarCRONOSVUELOS'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
	
	
		public function Listado_CRONOVUELOS2($id){
		$conn = $this->db();
		$variablequery = "select * from 04cronologicovuelos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
	
	public function Listado_CRONOvuelos(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04cronologicovuelos WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
	
	
	
	public function borra_CRONOSV($id){
		$conn = $this->db();
		$variablequery = "delete from 04cronologicovuelos where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}




     ///////////////////////////// CRONOS TERRESTRE/////////////////////////

        public function CRONOterrestre($DOCUMENTO_cronoterrestre , $ADJUNTO_cronoterrestre ,$OBSERVACIONES_cronoterrestre , $FECHA_cronoterrestre , $hCRONOTERRESTRE,$Ipcronoterrestre,$enviarcronoterre ){
		
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04cronoterrestre  set  
		 DOCUMENTO_cronoterrestre = '".$DOCUMENTO_cronoterrestre."' ,
		 OBSERVACIONES_cronoterrestre = '".$OBSERVACIONES_cronoterrestre."' ,
		 hCRONOTERRESTRE = '".$hCRONOTERRESTRE."'  
		 where id = '".$Ipcronoterrestre."' ;  ";
	
		 $var2 = "insert into 04cronoterrestre (DOCUMENTO_cronoterrestre, ADJUNTO_cronoterrestre,OBSERVACIONES_cronoterrestre, FECHA_cronoterrestre, hCRONOTERRESTRE, idRelacion) values ( '".$DOCUMENTO_cronoterrestre."' , '".$ADJUNTO_cronoterrestre."' , '".$OBSERVACIONES_cronoterrestre."' , '".$FECHA_cronoterrestre."' , '".$hCRONOTERRESTRE."' , '".$session."' ); ";		
			
	    if($enviarcronoterre=='enviarcronoterre'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function Listado_CRONOTERRESTRE(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04cronoterrestre WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_CRONOTERRESTRE2($id){
		$conn = $this->db();
		$variablequery = "select * from 04cronoterrestre  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	
	
	
	
	public function borra_CRONOSTERRRE($id){
		$conn = $this->db();
		$variablequery = "delete from 04cronoterrestre where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}


  ///////////////////////////// COBROS CLIENTE/////////////////////////

        public function cobroscliente($DOCUMENTO_COBROS ,$ADJUNTO_COBROS, $OBSERVACIONES_COBROS , $FECHA_COBROS , $hCOBROSCLIENTE,$Ipcobroscliente,$enviarcobroscliente){
		
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04cobroscliente  set
		 DOCUMENTO_COBROS = '".$DOCUMENTO_COBROS."' , 
		 OBSERVACIONES_COBROS = '".$OBSERVACIONES_COBROS."' ,  
		 hCOBROSCLIENTE = '".$hCOBROSCLIENTE."'
		 where id = '".$Ipcobroscliente."' ;  ";
	
		 $var2 = "insert into 04cobroscliente ( DOCUMENTO_COBROS,ADJUNTO_COBROS, OBSERVACIONES_COBROS, FECHA_COBROS, hCOBROSCLIENTE, idRelacion) values ( '".$DOCUMENTO_COBROS."' , '".$ADJUNTO_COBROS."' , '".$OBSERVACIONES_COBROS."' , '".$FECHA_COBROS."' , '".$hCOBROSCLIENTE."' , '".$session."' ); ";		
			
	    if($enviarcobroscliente=='enviarcobroscliente'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function Listado_cobroscliente(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04cobroscliente WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_cobroscliente2($id){
		$conn = $this->db();
		$variablequery = "select * from 04cobroscliente  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	
	
	
	
	public function borra_COBROSCLIENTE($id){
		$conn = $this->db();
		$variablequery = "delete from 04cobroscliente where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}


	
	
		
	
	
	

  ///////////////////////////// PAGOS INGRESOS/////////////////////////

        public function pagoingreso($DOCUMENTO_INGRESOS ,$ADJUNTO_INGRESOS, $OBSERVACIONES_INGRESOS, $MONTOCON_IVA,$FE_PAGOI,$FE_TIMBRADO,$FECHA_INGRESOS ,$TIPO_DE_DOCUMENTO,$FOLIO,$RAZON_SOCIAL,$CONCEPTO,$STATUSF, $hPAGOSINGRESOS1,$IpINGRESOS,$enviarpagosingre){
			
		$OBSERVACIONES_INGRESOS = str_replace(',','',$OBSERVACIONES_INGRESOS);
		$MONTOCON_IVA = str_replace(',','',$MONTOCON_IVA);
		
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04pagosingresos  set  
		 DOCUMENTO_INGRESOS = '".$DOCUMENTO_INGRESOS."' , 
		 
		 FE_PAGOI = '".$FE_PAGOI."' , 
		 FE_TIMBRADO = '".$FE_TIMBRADO."' , 
		 OBSERVACIONES_INGRESOS = '".$OBSERVACIONES_INGRESOS."' ,  
		 MONTOCON_IVA = '".$MONTOCON_IVA."' ,  
		 FECHA_INGRESOS = '".$FECHA_INGRESOS."' , 
		
		 
		 TIPO_DE_DOCUMENTO = '".$TIPO_DE_DOCUMENTO."' ,  
		 FOLIO = '".$FOLIO."' ,  
		 RAZON_SOCIAL = '".$RAZON_SOCIAL."' ,  
		 CONCEPTO = '".$CONCEPTO."' ,  
		 STATUSF = '".$STATUSF."' ,  
		 
		 hPAGOSINGRESOS1 = '".$hPAGOSINGRESOS1."'
		 where id = '".$IpINGRESOS."' ;  ";
	
		 $var2 = "insert into 04pagosingresos  ( DOCUMENTO_INGRESOS,ADJUNTO_INGRESOS, FE_PAGOI,FE_TIMBRADO,OBSERVACIONES_INGRESOS,MONTOCON_IVA, FECHA_INGRESOS,TIPO_DE_DOCUMENTO,FOLIO,RAZON_SOCIAL,CONCEPTO,STATUSF, hPAGOSINGRESOS1, idRelacion) values ( '".$DOCUMENTO_INGRESOS."' , '".$ADJUNTO_INGRESOS."' , '".$FE_PAGOI."' , '".$FE_TIMBRADO."' , '".$OBSERVACIONES_INGRESOS."' , '".$MONTOCON_IVA."' , '".$FECHA_INGRESOS."' , '".$TIPO_DE_DOCUMENTO."' , '".$FOLIO."' , '".$RAZON_SOCIAL."' , '".$CONCEPTO."' , '".$STATUSF."' , '".$hPAGOSINGRESOS1."' , '".$session."' ); ";		
			
			
	    if($enviarpagosingre=='enviarpagosingre'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function Listado_pagosingresos(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04pagosingresos WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	
		public function Listado_pagosingresos2($id){
		$conn = $this->db();
		$variablequery = "select * from 04pagosingresos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	public function borra_PAGOSINGRESOS($id){
		$conn = $this->db();
		$variablequery = "delete from 04pagosingresos where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}


			 
	public function actualizapagoingreso($pasarpagadoingreso_id , $pasarpagadoingreso_text ){

		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04pagosingresos set pagado = '".$pasarpagadoingreso_text."' where id = '".$pasarpagadoingreso_id."' ;  ";
		 
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";	
	}
	}
	
	 
	public function total_ingreso_pagado(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select sum(MONTOCON_IVA) as totalpagado from 04pagosingresos WHERE idRelacion = '".$session."' and pagado = 'si' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		return $row['totalpagado'];
		
	}

	
  ///////////////////////////// PAGOS EGRESOS/////////////////////////

  

        public function pagoegreso($DOCUMENTO_EGRESO, $ADJUNTO_EGRESO,$MONTO_OTRO, $MONTO_EGRESO,$FE_PAGOE,$FE_TIMBRADOE, $FECHA_EGRESO ,$TIPO_DE_DOCUMENTO1,$FOLIO1,$RAZON_SOCIAL1,$CONCEPTO1,$STATUSF1,$hpagosegresos1, $IpEGRESOS,$enviarpagosEgreso ){
		$MONTO_EGRESO = str_replace(',','',$MONTO_EGRESO);
		$MONTO_OTRO = str_replace(',','',$MONTO_OTRO);
		//enviarpagosEgreso
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04pagoegresos  set
		 DOCUMENTO_EGRESO = '".$DOCUMENTO_EGRESO."' ,
		 
		 MONTO_OTRO = '".$MONTO_OTRO."' ,
		 MONTO_EGRESO = '".$MONTO_EGRESO."' ,
		 FE_PAGOE = '".$FE_PAGOE."' ,
		 FE_TIMBRADOE = '".$FE_TIMBRADOE."' ,
		 FECHA_EGRESO = '".$FECHA_EGRESO."' ,
		 
		 TIPO_DE_DOCUMENTO1 = '".$TIPO_DE_DOCUMENTO1."' ,  
		 FOLIO1 = '".$FOLIO1."' ,  
		 RAZON_SOCIAL1 = '".$RAZON_SOCIAL1."' ,  
		 CONCEPTO1 = '".$CONCEPTO1."' , 
		 STATUSF1 = '".$STATUSF1."' ,
		 
		 hpagosegresos1 = '".$hpagosegresos1."'
		 where id = '".$IpEGRESOS."' ;  ";
	
		 $var2 = "insert into 04pagoegresos  (DOCUMENTO_EGRESO,ADJUNTO_EGRESO, MONTO_OTRO,MONTO_EGRESO,FE_PAGOE, FE_TIMBRADOE,FECHA_EGRESO,TIPO_DE_DOCUMENTO1,FOLIO1,RAZON_SOCIAL1,CONCEPTO1,STATUSF1, hpagosegresos1, idRelacion) values ( '".$DOCUMENTO_EGRESO."' , '".$ADJUNTO_EGRESO."' , '".$MONTO_OTRO."' , '".$MONTO_EGRESO."' , '".$FE_PAGOE."' , '".$FE_TIMBRADOE."' , '".$FECHA_EGRESO."' , '".$TIPO_DE_DOCUMENTO1."' , '".$FOLIO1."' , '".$RAZON_SOCIAL1."' , '".$CONCEPTO1."' , '".$STATUSF1."' , '".$hpagosegresos1."' , '".$session."' ); ";		
			
			
	    if($enviarpagosEgreso=='enviarpagosEgreso'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function Listado_pagoegresos(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04pagoegresos WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_pagoegresos2($id){
		$conn = $this->db();
		$variablequery = "select * from 04pagoegresos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	public function borra_PAGOEGRESOS($id){
		$conn = $this->db();
		$variablequery = "delete from 04pagoegresos where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}
                     
					 
					 
	public function actualizapagoegreso($pasarpagadoingreso_id , $pasarpagadoingreso_text ){

		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04pagoegresos set pagado = '".$pasarpagadoingreso_text."' where id = '".$pasarpagadoingreso_id."' ;  ";
		 
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";	
	}
	}
					 
					 
	public function total_egreso_pagado(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select sum(MONTO_EGRESO) as totalpagado from 04pagoegresos WHERE idRelacion = '".$session."' and pagado = 'si' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		return $row['totalpagado'];
		
	}			 

					 
		
  ///////////////////////////// BOLETOS AVION/////////////////////////

        public function boletosavion($DOCUMENTO_BOLETOSAVION ,$ADJUNTO_BOLETOSAVION, $MONTO_BOLETOSAVION ,$FECHA_BOLETOSAVION , $hBOLETOSAVION1  ,$hpagosegresos1, $Ipboletosavion,$enviarboletos){
			
		$MONTO_BOLETOSAVION = str_replace(',','',$MONTO_BOLETOSAVION);
		
		//Ipboletosavion
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){                            
			
		 $var1 = "update 04boletosavion set
		 DOCUMENTO_BOLETOSAVION = '".$DOCUMENTO_BOLETOSAVION."'  ,
		 MONTO_BOLETOSAVION = '".$MONTO_BOLETOSAVION."'
		 
		 where id = '".$Ipboletosavion."' ;  ";
	
		 $var2 = "insert into 04boletosavion (DOCUMENTO_BOLETOSAVION,ADJUNTO_BOLETOSAVION, MONTO_BOLETOSAVION, FECHA_BOLETOSAVION, hBOLETOSAVION1, idRelacion) values ( '".$DOCUMENTO_BOLETOSAVION."' , '".$ADJUNTO_BOLETOSAVION."' , '".$MONTO_BOLETOSAVION."' , '".$FECHA_BOLETOSAVION."' , '".$hBOLETOSAVION1."' , '".$session."' ); ";		
			
			
	    if($enviarboletos=='enviarboletos'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function Listado_boletosavion(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04boletosavion WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_boletosavion2($id){
		$conn = $this->db();
		$variablequery = "select * from 04boletosavion  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	public function borra_BOLETOSAVION($id){
		$conn = $this->db();
		$variablequery = "delete from 04boletosavion where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}

	
	public function PASARPAGADOavion($pasarpagadoingreso_id , $pasarpagadoingreso_text ){

		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04boletosavion set pagado = '".$pasarpagadoingreso_text."' where id = '".$pasarpagadoingreso_id."' ;  ";
		 
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";	
	}
	}
	
	public function total_boletosavion_pagado(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select sum(MONTO_BOLETOSAVION) as totalpagado from 04boletosavion WHERE idRelacion = '".$session."' and pagado = 'si' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		return $row['totalpagado'];
		
	}
	


	public function resumeningresos(){
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		$variablequery = "select * from 04pagosingresos where idRelacion = '".$session."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);

	}

	public function resumenegresos(){
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		$variablequery = "select * from 04pagoegresos where idRelacion = '".$session."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function resumenboletosavion(){
		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		$variablequery = "select * from 04boletosavion where idRelacion = '".$session."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
		
	
	
	





//////////////////  COTIZACIÓN DEL PROVEEDOR ///////////////////////////////////////////////

public function COTIPRO($NOMBRE_PROVEEDOR,$DOCUMENTO_COTIPRO ,$ADJUNTO_COTIPRO, $OBSERVACIONES_COTIPRO , $FECHA_COTIPRO , $hCOTIPRO,$IpCOTIPRO,$enviarCOTIPRO){
	  
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
		
	 $var1 = "update 04cotizacionproveedores  set
	 
	 NOMBRE_PROVEEDOR= '".$NOMBRE_PROVEEDOR."' ,
	 DOCUMENTO_COTIPRO= '".$DOCUMENTO_COTIPRO."' , 
	 OBSERVACIONES_COTIPRO = '".$OBSERVACIONES_COTIPRO."' ,  
	 hCOTIPRO = '".$hCOTIPRO."'
	 where id = '".$IpCOTIPRO."' ;  ";

	 $var2 = "insert into 04cotizacionproveedores (NOMBRE_PROVEEDOR, DOCUMENTO_COTIPRO,ADJUNTO_COTIPRO, OBSERVACIONES_COTIPRO, FECHA_COTIPRO, hCOTIPRO, idRelacion) values ( '".$NOMBRE_PROVEEDOR."' ,'".$DOCUMENTO_COTIPRO."' , '".$ADJUNTO_COTIPRO."' , '".$OBSERVACIONES_COTIPRO."' , '".$FECHA_COTIPRO."' , '".$hCOTIPRO."' , '".$session."' ); ";		
		
		if($enviarCOTIPRO=='enviarCOTIPRO'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
}

	
public function Listado_COTIPRO(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04cotizacionproveedores WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_COTIPRO2($id){
	$conn = $this->db();
	$variablequery = "select * from 04cotizacionproveedores  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


public function borra_COTIPRO($id){
	$conn = $this->db();
	$variablequery = "delete from 04cotizacionproveedores where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}
	
	

	
	
	
//////////////////  COTIZACIÓN DEL CLIENTES ///////////////////////////////////////////////

    public function COTICLIENTES($NOMBRE_COTIZACION,$NOMBRE_CLIENTES, $DOCUMENTO_COTICLIENTES,$ADJUNTO_COTICLIENTES, $OBSERVACIONES_COTICLIENTES, $FECHA_COTICLIENTES, $hCOTICLIENTES, $IpCOTICLIENTES,$enviarCOTICLIENTES ){
	
	
	$DOCUMENTO_COTICLIENTES  = str_replace(',','',$DOCUMENTO_COTICLIENTES); 
	
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
		
	 $var1 = "update 04COTICLIENTES  set
	 NOMBRE_COTIZACION = '".$NOMBRE_COTIZACION."' ,
	 NOMBRE_CLIENTES = '".$NOMBRE_CLIENTES."' , 
	 DOCUMENTO_COTICLIENTES = '".$DOCUMENTO_COTICLIENTES."' ,  

	 OBSERVACIONES_COTICLIENTES = '".$OBSERVACIONES_COTICLIENTES."' ,  
	 FECHA_COTICLIENTES = '".$FECHA_COTICLIENTES."' ,  
	 hCOTICLIENTES = '".$hCOTICLIENTES."'
	 where id = '".$IpCOTICLIENTES."' ;  ";

	 $var2 = "insert into 04COTICLIENTES (
	 NOMBRE_COTIZACION, 
	 NOMBRE_CLIENTES,
	 DOCUMENTO_COTICLIENTES,
	 ADJUNTO_COTICLIENTES, 
	 OBSERVACIONES_COTICLIENTES,
	 FECHA_COTICLIENTES, 
	 hCOTICLIENTES, idRelacion) 
	 values ( '".$NOMBRE_COTIZACION."' ,'".
	 $NOMBRE_CLIENTES."' , '".
	 $DOCUMENTO_COTICLIENTES."' , '".
	 $ADJUNTO_COTICLIENTES."' , '".
	 $OBSERVACIONES_COTICLIENTES."' , '".
	 $FECHA_COTICLIENTES."' , '".
	 $hCOTICLIENTES."' , '".$session."' ); ";	
		
		if($enviarCOTICLIENTES=='enviarCOTICLIENTES'){
	mysqli_query($conn,$var1) or die('CE1601'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('CE1605'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
}

	
public function Listado_COTICLIENTES(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04COTICLIENTES WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	
}	


	public function Listado_COTICLIENTES2($id){
	$conn = $this->db();
	$variablequery = "select * from 04COTICLIENTES  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


public function borra_COTICLIENTES($id){
	$conn = $this->db();
	$variablequery = "delete from 04COTICLIENTES where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}
	
	
	

//////////////////  CONTRATOS ///////////////////////////////////////////////

    public function CONTRATO($CONTRATO,$NOMBRE_CONTRATO, $DOCUMENTO_CONTRATO,$ADJUNTO_CONTRATO, $OBSERVACIONES_CONTRATO, $FECHA_CONTRATO, $hCONTRATO, $IpCONTRATO,$enviarCONTRATO ){
	
	
	$DOCUMENTO_CONTRATO  = str_replace(',','',$DOCUMENTO_CONTRATO); 
	
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){ 
    $CONTRATO               = mysqli_real_escape_string($conn, $CONTRATO);
    $NOMBRE_CONTRATO        = mysqli_real_escape_string($conn, $NOMBRE_CONTRATO);
    $OBSERVACIONES_CONTRATO = mysqli_real_escape_string($conn, $OBSERVACIONES_CONTRATO);


  

    $IpCONTRATO = mysqli_real_escape_string($conn, $IpCONTRATO);
    $session    = mysqli_real_escape_string($conn, $session);	
		
	 $var1 = "update 04CONTRATO  set
	 CONTRATO = '".$CONTRATO."' ,
	 NOMBRE_CONTRATO = '".$NOMBRE_CONTRATO."' , 
	 DOCUMENTO_CONTRATO = '".$DOCUMENTO_CONTRATO."' ,  

	 OBSERVACIONES_CONTRATO = '".$OBSERVACIONES_CONTRATO."' ,  
	 FECHA_CONTRATO = '".$FECHA_CONTRATO."' ,  
	 hCONTRATO = '".$hCONTRATO."'
	 where id = '".$IpCONTRATO."' ;  ";

	 $var2 = "insert into 04CONTRATO (
	 CONTRATO, 
	 NOMBRE_CONTRATO,
	 DOCUMENTO_CONTRATO,
	 ADJUNTO_CONTRATO, 
	 OBSERVACIONES_CONTRATO,
	 FECHA_CONTRATO, 
	 hCONTRATO, idRelacion) 
	 values ( '".$CONTRATO."' ,'".
	 $NOMBRE_CONTRATO."' , '".
	 $DOCUMENTO_CONTRATO."' , '".
	 $ADJUNTO_CONTRATO."' , '".
	 $OBSERVACIONES_CONTRATO."' , '".
	 $FECHA_CONTRATO."' , '".
	 $hCONTRATO."' , '".$session."' ); ";	
		
		if($enviarCONTRATO=='enviarCONTRATO'){
	mysqli_query($conn,$var1) or die('CE1601'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('CE1605'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
}

	
public function Listado_CONTRATO(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04CONTRATO WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	
}	


	public function Listado_CONTRATO2($id){
	$conn = $this->db();
	$variablequery = "select * from 04CONTRATO  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


public function borra_CONTRATO($id){
	$conn = $this->db();
	$variablequery = "delete from 04CONTRATO where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}
	
	
 	
	
///////////////////////////// PERSONAL2 2  /////////////////////////

    public function PERSONAL2($NOMBRE_PERSONAL2 ,$PUESTO_PERSONAL2 ,$WHAT_PERSONAL2 , $EMAIL_PERSONAL2 ,$FECHA_INICIO1,$FECHA_FINAL1,$NUMERO_DIAS1, $MONTO_BONO1,$MONTO_BONO_TOTAL1,$TOTAL1,$ULTIMO_DIA1,      $FECHA_PPAGO1,$FORMA_PAGO1,$FECHA_EFECTIVA1,$NOMBRE_RECIBIO1,$ADJUNTO_COMPROBANTE, $VIATICOS_PERSONAL2 , $OBSERVACIONES_PERSONAL2 , $PERSONAL2_FECHA_ULTIMA_CARGA , $hDatosPERSONAL2,$ENVIARpersonal2,$IPpersonal2){
		
    $conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:''; 

	if($session != ''){
		
		$MONTO_BONO1 = str_replace(',','',$MONTO_BONO1);
		$MONTO_BONO1 = str_replace('$','',$MONTO_BONO1);
		
    $MONTO_BONO_TOTAL1 = str_replace(',','',$MONTO_BONO_TOTAL1);
    $MONTO_BONO_TOTAL1 = str_replace('$','',$MONTO_BONO_TOTAL1);

    $VIATICOS_PERSONAL2 = str_replace(',','',$VIATICOS_PERSONAL2);
    $VIATICOS_PERSONAL2 = str_replace('$','',$VIATICOS_PERSONAL2);	

    $TOTAL1 = str_replace(',','',$TOTAL1);
    $TOTAL1 = str_replace('$','',$TOTAL1);		                           

	$idPersonal = explode('^^',$NOMBRE_PERSONAL2);

    $var1 = "update 04personal2  set


 
    FECHA_INICIO1 = '".$FECHA_INICIO1."' , 
    FECHA_FINAL1 = '".$FECHA_FINAL1."' , 
    NUMERO_DIAS1 = '".$NUMERO_DIAS1."' , 
    MONTO_BONO1 = '".$MONTO_BONO1."' , 
    MONTO_BONO_TOTAL1 = '".$MONTO_BONO_TOTAL1."' , 
    TOTAL1 = '".$TOTAL1."' , 
    ULTIMO_DIA1 = '".$ULTIMO_DIA1."' ,
	
    FECHA_PPAGO1 = '".$FECHA_PPAGO1."' , 
    FORMA_PAGO1 = '".$FORMA_PAGO1."' , 
    FECHA_EFECTIVA1 = '".$FECHA_EFECTIVA1."' , 
	
    NOMBRE_RECIBIO1 = '".$NOMBRE_RECIBIO1."' , 
    ADJUNTO_COMPROBANTE = '".$ADJUNTO_COMPROBANTE."' , 
 
    VIATICOS_PERSONAL2 = '".$VIATICOS_PERSONAL2."' , 
    OBSERVACIONES_PERSONAL2 = '".$OBSERVACIONES_PERSONAL2."' ,
    hDatosPERSONAL2 = '".$hDatosPERSONAL2."'
    where id = '".$IPpersonal2."' ;  ";

    $var2 = "insert into 04personal2 (NOMBRE_PERSONAL2, PUESTO_PERSONAL2, WHAT_PERSONAL2, EMAIL_PERSONAL2,FECHA_INICIO1,FECHA_FINAL1,NUMERO_DIAS1,MONTO_BONO1, MONTO_BONO_TOTAL1, TOTAL1, ULTIMO_DIA1,FECHA_PPAGO1,FORMA_PAGO1,FECHA_EFECTIVA1,NOMBRE_RECIBIO1,ADJUNTO_COMPROBANTE,
    VIATICOS_PERSONAL2, OBSERVACIONES_PERSONAL2, PERSONAL2_FECHA_ULTIMA_CARGA, hDatosPERSONAL2, idRelacion, idPersonal) values ( '".$NOMBRE_PERSONAL2."' , '".$PUESTO_PERSONAL2."' , '".$WHAT_PERSONAL2."' , '".$EMAIL_PERSONAL2."' , '".$FECHA_INICIO1."' , '".$FECHA_FINAL1."' , '".$NUMERO_DIAS1."' , '".$MONTO_BONO1."' , '".$MONTO_BONO_TOTAL1."' , '".$TOTAL1."' , '".$ULTIMO_DIA1."' , '".$FECHA_PPAGO1."' , '".$FORMA_PAGO1."' , '".$FECHA_EFECTIVA1."' , '".$NOMBRE_RECIBIO1."' , '".$ADJUNTO_COMPROBANTE."' , '".$VIATICOS_PERSONAL2."' , '".$OBSERVACIONES_PERSONAL2."' , '".$PERSONAL2_FECHA_ULTIMA_CARGA."' , '".$hDatosPERSONAL2."' , '".$session."'  , '".$idPersonal[0]."' ); ";		
    
     if($ENVIARpersonal2=='ENVIARpersonal2'){
     mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
     return "Actualizado";
            
}   else{
    mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
    return "Ingresado";
}
    
}   else{
    echo "TU SESIÓN HA TERMINADO";	
}

}


     public function listado_personal3(){
     $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';

     $conn = $this->db();
     $variablequery = "select * from 04personal2 WHERE idRelacion = '".$session."' order by id desc ";
     return $arrayquery = mysqli_query($conn,$variablequery);
     }	


     public function listado_personal33($id){
     $conn = $this->db();
      $variablequery = "select * from 04personal2  where id = '".$id."' ";
     return $arrayquery = mysqli_query($conn,$variablequery);
     }

     public function listado_personal22_id($id){
     $conn = $this->db();
      $variablequery = "select * from 04personal2  where idRelacion = '".$id."' ";
     return $arrayquery = mysqli_query($conn,$variablequery);
     }

     public function borra_PERSONAL2($id){
     $conn = $this->db();
     $variablequery = "delete from 04personal2 where id = '".$id."' ";
     $arrayquery = mysqli_query($conn,$variablequery);
     RETURN 

     "<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
     }
	
	
	
	
	
	
	
  ///////////////////////////// PERSONAL  /////////////////////////

        public function PERSONAL($NOMBRE_PERSONAL,
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
			
            $FECHA_PPAGO,
            $FORMA_PAGO,
            $FECHA_EFECTIVA,
            $NOMBRE_RECIBIO,
            $ADJUNTO_COMPROBANTEP1,
			
            $NUMERO_EVENTO,
            $OBSERVACIONES_PERSONAL,
            $PERSONAL_FECHA_ULTIMA_CARGA,
            $hDatosPERSONAL,
            $ENVIARpersonal,
            $IPpersonal){
		
    $conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){    
		$MONTO_BONO = str_replace(',','',$MONTO_BONO);
		$MONTO_BONO = str_replace('$','',$MONTO_BONO);	
		
    $MONTO_BONO_TOTAL = str_replace(',','',$MONTO_BONO_TOTAL);
    $MONTO_BONO_TOTAL = str_replace('$','',$MONTO_BONO_TOTAL);

    $VIATICOS_PERSONAL = str_replace(',','',$VIATICOS_PERSONAL);
    $VIATICOS_PERSONAL = str_replace('$','',$VIATICOS_PERSONAL);	

    $TOTAL = str_replace(',','',$TOTAL);
    $TOTAL = str_replace('$','',$TOTAL);	                          
	$idPersonal = explode('^^',$NOMBRE_PERSONAL);
		 $var1 = "update 04personal  set


         FECHA_INICIO = '".$FECHA_INICIO."' , 
         FECHA_FINAL = '".$FECHA_FINAL."' , 
         NUMERO_DIAS = '".$NUMERO_DIAS."' , 
         MONTO_BONO = '".$MONTO_BONO."' , 
         MONTO_BONO_TOTAL = '".$MONTO_BONO_TOTAL."' ,
         VIATICOS_PERSONAL = '".$VIATICOS_PERSONAL."' ,		 
         TOTAL = '".$TOTAL."' , 
         ULTIMO_DIA = '".$ULTIMO_DIA."' , 
		 
         FECHA_PPAGO = '".$FECHA_PPAGO."' , 		 
         FORMA_PAGO = '".$FORMA_PAGO."' , 		 
         FECHA_EFECTIVA = '".$FECHA_EFECTIVA."' , 
		 
         NOMBRE_RECIBIO = '".$NOMBRE_RECIBIO."' , 
         ADJUNTO_COMPROBANTEP = '".$ADJUNTO_COMPROBANTEP."' , 
		 
         NUMERO_EVENTO = '".$NUMERO_EVENTO."' , 		 
		 OBSERVACIONES_PERSONAL = '".$OBSERVACIONES_PERSONAL."' ,
		 PERSONAL_FECHA_ULTIMA_CARGA = '".$PERSONAL_FECHA_ULTIMA_CARGA."' ,
		 hDatosPERSONAL = '".$hDatosPERSONAL."'
		 where id = '".$IPpersonal."' ;  ";
	
		 $var2 = "insert into 04personal (NOMBRE_PERSONAL, PUESTO_PERSONAL, WHAT_PERSONAL, EMAIL_PERSONAL,FECHA_INICIO,FECHA_FINAL,NUMERO_DIAS,MONTO_BONO,MONTO_BONO_TOTAL,VIATICOS_PERSONAL,TOTAL,ULTIMO_DIA,FECHA_PPAGO,FORMA_PAGO,FECHA_EFECTIVA,NOMBRE_RECIBIO,ADJUNTO_COMPROBANTEP,NUMERO_EVENTO,  OBSERVACIONES_PERSONAL, PERSONAL_FECHA_ULTIMA_CARGA, hDatosPERSONAL, idRelacion, idPersonal) values ( '".$NOMBRE_PERSONAL."' , '".$PUESTO_PERSONAL."' , '".$WHAT_PERSONAL."' , '".$EMAIL_PERSONAL."' , '".$FECHA_INICIO."' , '".$FECHA_FINAL."' , '".$NUMERO_DIAS."' , '".$MONTO_BONO."' , '".$MONTO_BONO_TOTAL."' , '".$VIATICOS_PERSONAL."' , '".$TOTAL."' , '".$ULTIMO_DIA."' , '".$FECHA_PPAGO."' , '".$FORMA_PAGO."' , '".$FECHA_EFECTIVA."' , '".$NOMBRE_RECIBIO."' , '".$ADJUNTO_COMPROBANTEP."' , '".$NUMERO_EVENTO."' , '".$OBSERVACIONES_PERSONAL."' , '".$PERSONAL_FECHA_ULTIMA_CARGA."' , '".$hDatosPERSONAL."' , '".$session."' , '".$idPersonal[0]."'); ";		
			
	    if($ENVIARpersonal=='ENVIARpersonal'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
		
	public function listado_personal(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04personal WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function listado_personal2($id){
		$conn = $this->db();
		$variablequery = "select * from 04personal  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
		public function listado_personal2_id($id){
		$conn = $this->db();
		$variablequery = "select * from 04personal  where idRelacion = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
	    public function borra_PERSONAL($id){
		$conn = $this->db();
		$variablequery = "delete from 04personal where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}

	
	

	
     

	public function variable_comborelacion1a(){
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';		
		
		$conn = $this->db();				
		$variablequery = "select * from 02empresarelacion where idRelacionP = '".$session."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		if($row['idRelacionC']>=1){
		return $row['idRelacionC'];
		}else{
		return "no";			
		}
		
		}

	public function variables_informacionfiscal_logo(){
		$conn = $this->db();
		$variablequery = "select ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$_SESSION['idlc']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['ADJUNTAR_LOGO_INFORMACION'];
		
	}
	
      public function actualizapersonal2($pasara1_personal2_id , $pasapersonal2_text ){

      $conn = $this->db();
      $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
      if($session != ''){
    
      $var1 = "update 04personal2 set autoriza  = '".$pasapersonal2_text."' where id = '".$pasara1_personal2_id."' ;  ";
 
      mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
      return "Actualizado";

     }else{
     echo "TU SESIÓN HA TERMINADO";	
    }
    }
	
	public function actualizapersonal($pasara1_personal_id , $pasapersonal_text ){

		$conn = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
		 $var1 = "update 04personal set autoriza  = '".$pasapersonal_text."' where id = '".$pasara1_personal_id."' ;  ";
		 
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";	
	}
	}	
	
	
/////////////////////////////////////////PARA AUTORIZAR/////////////////////////////////////	
public function actualizapersonalAUT($pasara1_personalAUT_id, $pasapersonalAUT_text){
    $conn    = $this->db();
    $session = isset($_SESSION['idevento']) ? $_SESSION['idevento'] : '';
    $usuario = isset($_SESSION['idem'])     ? $_SESSION['idem']     : '';

    // Saneado mínimo
    $idPersonal = (int)$pasara1_personalAUT_id;
    $valor      = ($pasapersonalAUT_text === 'si') ? 'si' : 'no';

    if ($session == '' || $usuario == '') {
        echo "TU SESIÓN HA TERMINADO";
        return;
    }

    // 1) ¿Quién es el vendedor del evento?
    $queryV   = "SELECT NOMBRE_VENDEDOR_id FROM 04altaeventos WHERE id = '".$conn->real_escape_string($session)."' LIMIT 1";
    $resV     = mysqli_query($conn, $queryV);
    $rowV     = mysqli_fetch_array($resV, MYSQLI_ASSOC);
    $vendedor = isset($rowV['NOMBRE_VENDEDOR_id']) ? $rowV['NOMBRE_VENDEDOR_id'] : '';

    // 2) ¿El usuario tiene permiso PERSONALAUTORIZA (ver=si)?
    $tienePermisoPersonal = false;
    if (method_exists($this, 'variablespermisos')) {
        $tienePermisoPersonal = ($this->variablespermisos('', 'PERSONALAUTORIZA', 'ver') === 'si');
    } else {
        // Fallback directo a BD (ajusta nombres de campos si difieren)
        $qPerm = "
            SELECT ver
            FROM 05permisos
            WHERE idRelacion = '".$conn->real_escape_string($usuario)."'
              AND modulo = 'PERSONALAUTORIZA'
            LIMIT 1
        ";
        if ($rPerm = mysqli_query($conn, $qPerm)) {
            $p = mysqli_fetch_assoc($rPerm);
            $tienePermisoPersonal = (isset($p['ver']) && $p['ver'] === 'si');
        }
    }

    // 3) Regla de autorización combinada
    $puedeAutorizar = ($usuario == $vendedor) || $tienePermisoPersonal;

    if (!$puedeAutorizar) {
        return "Sin permiso";
    }

    // 4) Actualización
    $var1 = "
        UPDATE 04personal
        SET autorizaAUT = '".$conn->real_escape_string($valor)."'
        WHERE id = ".$idPersonal."
        LIMIT 1
    ";
    mysqli_query($conn, $var1) or die('P156'.mysqli_error($conn));

  return "Actualizado";
}

/////////////////////////////////////////PARA ADMIN/////////////////////////////////////
public function actualizapersonalADMIN($pasara1_personalADMIN_id, $pasapersonalADMIN_text){

	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	if($session != ''){
		$idPersonal = (int)$pasara1_personalADMIN_id;
		$valor = ($pasapersonalADMIN_text === 'si') ? 'si' : 'no';

		$var1 = "
			UPDATE 04personal
			SET admin = '".$conn->real_escape_string($valor)."'
			WHERE id = ".$idPersonal."
			LIMIT 1
		";
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";
	}
}

    
//////////////////  vehiculos eventos ///////////////////////////////////////////////

    public function VEHICULO($VEHICULOSEVE_VEHICULO , $VEHICULOSEVE_CANTIDAD , $VEHICULOSEVE_ENTREGA ,$VEHICULOSEVE_FOTO, $VEHICULOSEVE_LUGAR , $VEHICULOSEVE_HORA , $VEHICULOSEVE_DEVOLU , $VEHICULOSEVE_LUDEVO , $VEHICULOSEVE_HORADEVO , $VEHICULOSEVE_SOLICITUD , $VEHICULOSEVE_DIAS , $VEHICULOSEVE_COSTO , $VEHICULOSEVE_IVA, $VEHICULOSEVE_SUB , $PRECIOPESOS_SOFTWARE , $VEHICULOSEVE_OBSERVA ,$COLORV,$PLACASV, $HVEHICULOSEVE,$enviarVEHICULOSEVE,$IpVEHICULOSEVE){
	  
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            

	$PRECIOPESOS_SOFTWARE = str_replace(',','',$PRECIOPESOS_SOFTWARE);
	$PRECIOPESOS_SOFTWARE = str_replace('$','',$PRECIOPESOS_SOFTWARE);

	$VEHICULOSEVE_IVA = str_replace(',','',$VEHICULOSEVE_IVA);
	$VEHICULOSEVE_IVA = str_replace('$','',$VEHICULOSEVE_IVA);	

	$VEHICULOSEVE_SUB = str_replace(',','',$VEHICULOSEVE_SUB);
	$VEHICULOSEVE_SUB = str_replace('$','',$VEHICULOSEVE_SUB);	

	 $var1 = "update 04vehiculoevento  set
	 
VEHICULOSEVE_VEHICULO = '".$VEHICULOSEVE_VEHICULO."' , VEHICULOSEVE_CANTIDAD = '".$VEHICULOSEVE_CANTIDAD."' , VEHICULOSEVE_FOTO = '".$VEHICULOSEVE_FOTO."' , VEHICULOSEVE_ENTREGA = '".$VEHICULOSEVE_ENTREGA."' , VEHICULOSEVE_LUGAR = '".$VEHICULOSEVE_LUGAR."' , VEHICULOSEVE_HORA = '".$VEHICULOSEVE_HORA."' , VEHICULOSEVE_DEVOLU = '".$VEHICULOSEVE_DEVOLU."' , VEHICULOSEVE_LUDEVO = '".$VEHICULOSEVE_LUDEVO."' , VEHICULOSEVE_HORADEVO = '".$VEHICULOSEVE_HORADEVO."' , VEHICULOSEVE_SOLICITUD = '".$VEHICULOSEVE_SOLICITUD."' , VEHICULOSEVE_DIAS = '".$VEHICULOSEVE_DIAS."' , VEHICULOSEVE_COSTO = '".$VEHICULOSEVE_COSTO."' , VEHICULOSEVE_IVA = '".$VEHICULOSEVE_IVA."' , VEHICULOSEVE_SUB = '".$VEHICULOSEVE_SUB."' ,PRECIOPESOS_SOFTWARE = '".$PRECIOPESOS_SOFTWARE."' , VEHICULOSEVE_OBSERVA = '".$VEHICULOSEVE_OBSERVA."' , COLORV = '".$COLORV."' , PLACASV = '".$PLACASV."' , HVEHICULOSEVE = '".$HVEHICULOSEVE."'
	 where id = '".$IpVEHICULOSEVE."' ;  ";

	 $var2 = "insert into 04vehiculoevento (VEHICULOSEVE_VEHICULO, VEHICULOSEVE_CANTIDAD, VEHICULOSEVE_FOTO, VEHICULOSEVE_ENTREGA, VEHICULOSEVE_LUGAR, VEHICULOSEVE_HORA, VEHICULOSEVE_DEVOLU, VEHICULOSEVE_LUDEVO, VEHICULOSEVE_HORADEVO, VEHICULOSEVE_SOLICITUD, VEHICULOSEVE_DIAS, VEHICULOSEVE_COSTO, VEHICULOSEVE_IVA,VEHICULOSEVE_SUB, PRECIOPESOS_SOFTWARE, VEHICULOSEVE_OBSERVA,COLORV,PLACASV,HVEHICULOSEVE, idRelacion) values ( '".$VEHICULOSEVE_VEHICULO."' , '".$VEHICULOSEVE_CANTIDAD."' , '".$VEHICULOSEVE_FOTO."' , '".$VEHICULOSEVE_ENTREGA."' , '".$VEHICULOSEVE_LUGAR."' , '".$VEHICULOSEVE_HORA."' , '".$VEHICULOSEVE_DEVOLU."' , '".$VEHICULOSEVE_LUDEVO."' , '".$VEHICULOSEVE_HORADEVO."' , '".$VEHICULOSEVE_SOLICITUD."' , '".$VEHICULOSEVE_DIAS."' , '".$VEHICULOSEVE_COSTO."' , '".$VEHICULOSEVE_IVA."' , '".$VEHICULOSEVE_SUB."' , '".$PRECIOPESOS_SOFTWARE."' , '".$VEHICULOSEVE_OBSERVA."' , '".$COLORV."' , '".$PLACASV."' , '".$HVEHICULOSEVE."' , '".$session."' ); ";		
		
		if($enviarVEHICULOSEVE=='enviarVEHICULOSEVE'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
}

	
public function Listado_VEHICULOSEVE(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04vehiculoevento WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_VEHICULOSEVE2($id){
	$conn = $this->db();
	$variablequery = "select * from 04vehiculoevento  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}



public function borra_VEHICULOSEVE($id){
	$conn = $this->db();
	$variablequery = "delete from 04vehiculoevento where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}


	public function Listado_VEHICULOSEVE3($id){
	$conn = $this->db();
	$variablequery = "select * from 09vehiculos  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['MONTO_PORDIA'];
}

	public function color_vehiculo($id){
	$conn = $this->db();
	$variablequery = "select * from 09vehiculos  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['COLORV'];
}

	public function placas_vehiculo($id){
	$conn = $this->db();
	$variablequery = "select * from 09vehiculos  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['PLACASV'];
}


	public function fotos_vehiculos($id){
	$conn = $this->db();
	$variablequery = "select * from 09fotosv  where idRelacion = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['ADJUNTO_FOTOSV'];
}


	public function nombre_vehiculo($id){
	$conn = $this->db();
	$variablequery = "select SUBMARCAV from 09vehiculos  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['SUBMARCAV'];
}




//////////////////  material y equipo eventos ///////////////////////////////////////////////

    public function material ($MATERIAL_EQUIPO , $MATERIAL_CANTIDAD , $MATERIAL_ENTREGA ,$MATERIAL_FOTO, $MATERIAL_LUGAR , $MATERIAL_HORA , $MATERIAL_DEVOLU , $MATERIAL_LUDEVO , $MATERIAL_HORADEVO , $MATERIAL_SOLICITUD , $MATERIAL_DIAS , $MATERIAL_COSTO , $MATERIAL_IVA, $MATERIAL_SUB , $MATERIAL_TOTAL , $MATERIAL_OBSERVA , $HMATERIAL,$enviarMATERIAL,$IpMATERIAL){
	  
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
     $MATERIAL_TOTAL = str_replace(',','',$MATERIAL_TOTAL);
     $MATERIAL_TOTAL = str_replace('$','',$MATERIAL_TOTAL);

    $MATERIAL_IVA = str_replace(',','',$MATERIAL_IVA);
    $MATERIAL_IVA = str_replace('$','',$MATERIAL_IVA);	

    $MATERIAL_SUB = str_replace(',','',$MATERIAL_SUB);
    $MATERIAL_SUB = str_replace('$','',$MATERIAL_SUB);	
	 
	 $var1 = "update 04materialyequipo  set
	 
    MATERIAL_EQUIPO = '".$MATERIAL_EQUIPO."' , MATERIAL_CANTIDAD = '".$MATERIAL_CANTIDAD."' , MATERIAL_FOTO = '".$MATERIAL_FOTO."' , MATERIAL_ENTREGA = '".$MATERIAL_ENTREGA."' , MATERIAL_LUGAR = '".$MATERIAL_LUGAR."' , MATERIAL_HORA = '".$MATERIAL_HORA."' , MATERIAL_DEVOLU = '".$MATERIAL_DEVOLU."' , MATERIAL_LUDEVO = '".$MATERIAL_LUDEVO."' , MATERIAL_HORADEVO = '".$MATERIAL_HORADEVO."' , MATERIAL_SOLICITUD = '".$MATERIAL_SOLICITUD."' , MATERIAL_DIAS = '".$MATERIAL_DIAS."' , MATERIAL_COSTO = '".$MATERIAL_COSTO."' , MATERIAL_IVA = '".$MATERIAL_IVA."' , MATERIAL_SUB = '".$MATERIAL_SUB."' ,MATERIAL_TOTAL = '".$MATERIAL_TOTAL."' , MATERIAL_OBSERVA = '".$MATERIAL_OBSERVA."' , HMATERIAL = '".$HMATERIAL."'
	 where id = '".$IpMATERIAL."' ;  ";

	 $var2 = "insert into 04materialyequipo (MATERIAL_EQUIPO, MATERIAL_CANTIDAD, MATERIAL_FOTO, MATERIAL_ENTREGA, MATERIAL_LUGAR, MATERIAL_HORA, MATERIAL_DEVOLU, MATERIAL_LUDEVO, MATERIAL_HORADEVO, MATERIAL_SOLICITUD, MATERIAL_DIAS, MATERIAL_COSTO, MATERIAL_IVA,MATERIAL_SUB, MATERIAL_TOTAL, MATERIAL_OBSERVA, HMATERIAL, idRelacion) values ( '".$MATERIAL_EQUIPO."' , '".$MATERIAL_CANTIDAD."' , '".$MATERIAL_FOTO."' , '".$MATERIAL_ENTREGA."' , '".$MATERIAL_LUGAR."' , '".$MATERIAL_HORA."' , '".$MATERIAL_DEVOLU."' , '".$MATERIAL_LUDEVO."' , '".$MATERIAL_HORADEVO."' , '".$MATERIAL_SOLICITUD."' , '".$MATERIAL_DIAS."' , '".$MATERIAL_COSTO."' , '".$MATERIAL_IVA."' , '".$MATERIAL_SUB."' , '".$MATERIAL_TOTAL."' , '".$MATERIAL_OBSERVA."' , '".$HMATERIAL."' , '".$session."' ); ";		
		
		if($enviarMATERIAL=='enviarMATERIAL'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
    }

	
    public function Listado_MATERIAL(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04materialyequipo WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_MATERIAL2($id){
	$conn = $this->db();
	$variablequery = "select * from 04materialyequipo where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}

	public function Listado_MATERIAL_return_id($arrayquery){
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['idRelacion'];
}

    public function borra_MATERIAL($id){
	$conn = $this->db();
	$variablequery = "delete from 04materialyequipo where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}

	public function Listado_MATERIAL3($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_PRECIO2'];
}

	public function fotos_materiales($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_FOTOS'];
}


	public function nombre_materiales($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}
//////////////////  PAPELERIA ///////////////////////////////////////////////

    public function papeleria ($PAPELERIA_EQUIPO , $PAPELERIA_CANTIDAD , $PAPELERIA_ENTREGA ,$PAPELERIA_FOTO, $PAPELERIA_LUGAR , $PAPELERIA_HORA , $PAPELERIA_DEVOLU , $PAPELERIA_LUDEVO , $PAPELERIA_HORADEVO , $PAPELERIA_SOLICITUD , $PAPELERIA_DIAS , $PAPELERIA_COSTO , $PAPELERIA_IVA, $PAPELERIA_SUB , $PAPELERIA_TOTAL , $PAPELERIA_OBSERVA , $HPAPELERIA,$enviarPAPELERIA,$IpPAPELERIA){
	  
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
    $PAPELERIA_TOTAL = str_replace(',','',$PAPELERIA_TOTAL);
    $PAPELERIA_TOTAL = str_replace('$','',$PAPELERIA_TOTAL);

    $PAPELERIA_IVA = str_replace(',','',$PAPELERIA_IVA);
    $PAPELERIA_IVA = str_replace('$','',$PAPELERIA_IVA);	

    $PAPELERIA_SUB = str_replace(',','',$PAPELERIA_SUB);
    $PAPELERIA_SUB = str_replace('$','',$PAPELERIA_SUB);	                           
		
	 $var1 = "update 04papeleria  set
	 
PAPELERIA_EQUIPO = '".$PAPELERIA_EQUIPO."' , PAPELERIA_CANTIDAD = '".$PAPELERIA_CANTIDAD."' , PAPELERIA_FOTO = '".$PAPELERIA_FOTO."' , PAPELERIA_ENTREGA = '".$PAPELERIA_ENTREGA."' , PAPELERIA_LUGAR = '".$PAPELERIA_LUGAR."' , PAPELERIA_HORA = '".$PAPELERIA_HORA."' , PAPELERIA_DEVOLU = '".$PAPELERIA_DEVOLU."' , PAPELERIA_LUDEVO = '".$PAPELERIA_LUDEVO."' , PAPELERIA_HORADEVO = '".$PAPELERIA_HORADEVO."' , PAPELERIA_SOLICITUD = '".$PAPELERIA_SOLICITUD."' , PAPELERIA_DIAS = '".$PAPELERIA_DIAS."' , PAPELERIA_COSTO = '".$PAPELERIA_COSTO."' , PAPELERIA_IVA = '".$PAPELERIA_IVA."' , PAPELERIA_SUB = '".$PAPELERIA_SUB."' ,PAPELERIA_TOTAL = '".$PAPELERIA_TOTAL."' , PAPELERIA_OBSERVA = '".$PAPELERIA_OBSERVA."' , HPAPELERIA = '".$HPAPELERIA."'
	 where id = '".$IpPAPELERIA."' ;  ";

	 $var2 = "insert into 04papeleria (PAPELERIA_EQUIPO, PAPELERIA_CANTIDAD, PAPELERIA_FOTO, PAPELERIA_ENTREGA, PAPELERIA_LUGAR, PAPELERIA_HORA, PAPELERIA_DEVOLU, PAPELERIA_LUDEVO, PAPELERIA_HORADEVO, PAPELERIA_SOLICITUD, PAPELERIA_DIAS, PAPELERIA_COSTO, PAPELERIA_IVA,PAPELERIA_SUB, PAPELERIA_TOTAL, PAPELERIA_OBSERVA, HPAPELERIA, idRelacion) values ( '".$PAPELERIA_EQUIPO."' , '".$PAPELERIA_CANTIDAD."' , '".$PAPELERIA_FOTO."' , '".$PAPELERIA_ENTREGA."' , '".$PAPELERIA_LUGAR."' , '".$PAPELERIA_HORA."' , '".$PAPELERIA_DEVOLU."' , '".$PAPELERIA_LUDEVO."' , '".$PAPELERIA_HORADEVO."' , '".$PAPELERIA_SOLICITUD."' , '".$PAPELERIA_DIAS."' , '".$PAPELERIA_COSTO."' , '".$PAPELERIA_IVA."' , '".$PAPELERIA_SUB."' , '".$PAPELERIA_TOTAL."' , '".$PAPELERIA_OBSERVA."' , '".$HPAPELERIA."' , '".$session."' ); ";		
		
		if($enviarPAPELERIA=='enviarPAPELERIA'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
    }

	
    public function Listado_PAPELERIA(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04papeleria WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_PAPELERIA2($id){
	$conn = $this->db();
	$variablequery = "select * from 04papeleria  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


    public function borra_PAPELERIA($id){
	$conn = $this->db();
	$variablequery = "delete from 04papeleria where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}

	public function Listado_PAPELERIA3($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_PRECIO2'];
}

	public function fotos_papeleria($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_FOTOS'];
}

	public function nombre_papeleria ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}	
//////////////////  OFICINA ///////////////////////////////////////////////

    public function oficina ($OFICINA_EQUIPO , $OFICINA_CANTIDAD , $OFICINA_ENTREGA ,$OFICINA_FOTO, $OFICINA_LUGAR , $OFICINA_HORA , $OFICINA_DEVOLU , $OFICINA_LUDEVO , $OFICINA_HORADEVO , $OFICINA_SOLICITUD , $OFICINA_DIAS , $OFICINA_COSTO , $OFICINA_IVA, $OFICINA_SUB , $OFICINA_TOTAL , $OFICINA_OBSERVA , $HOFICINA,$enviarOFICINA,$IpOFICINA){
	  
	$conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
    $OFICINA_TOTAL = str_replace(',','',$OFICINA_TOTAL);
    $OFICINA_TOTAL = str_replace('$','',$OFICINA_TOTAL);

    $OFICINA_IVA = str_replace(',','',$OFICINA_IVA);
    $OFICINA_IVA = str_replace('$','',$OFICINA_IVA);	

    $OFICINA_SUB = str_replace(',','',$OFICINA_SUB);
    $OFICINA_SUB = str_replace('$','',$OFICINA_SUB);	                             
		
	 $var1 = "update 04oficina  set
	 
    OFICINA_EQUIPO = '".$OFICINA_EQUIPO."' , OFICINA_CANTIDAD = '".$OFICINA_CANTIDAD."' , OFICINA_FOTO = '".$OFICINA_FOTO."' , OFICINA_ENTREGA = '".$OFICINA_ENTREGA."' , OFICINA_LUGAR = '".$OFICINA_LUGAR."' , OFICINA_HORA = '".$OFICINA_HORA."' , OFICINA_DEVOLU = '".$OFICINA_DEVOLU."' , OFICINA_LUDEVO = '".$OFICINA_LUDEVO."' , OFICINA_HORADEVO = '".$OFICINA_HORADEVO."' , OFICINA_SOLICITUD = '".$OFICINA_SOLICITUD."' , OFICINA_DIAS = '".$OFICINA_DIAS."' , OFICINA_COSTO = '".$OFICINA_COSTO."' , OFICINA_IVA = '".$OFICINA_IVA."' , OFICINA_SUB = '".$OFICINA_SUB."' ,OFICINA_TOTAL = '".$OFICINA_TOTAL."' , OFICINA_OBSERVA = '".$OFICINA_OBSERVA."' , HOFICINA = '".$HOFICINA."'
	 where id = '".$IpOFICINA."' ;  ";

	 $var2 = "insert into 04oficina (OFICINA_EQUIPO, OFICINA_CANTIDAD, OFICINA_FOTO, OFICINA_ENTREGA, OFICINA_LUGAR, OFICINA_HORA, OFICINA_DEVOLU, OFICINA_LUDEVO, OFICINA_HORADEVO, OFICINA_SOLICITUD, OFICINA_DIAS, OFICINA_COSTO, OFICINA_IVA,OFICINA_SUB, OFICINA_TOTAL, OFICINA_OBSERVA, HOFICINA, idRelacion) values ( '".$OFICINA_EQUIPO."' , '".$OFICINA_CANTIDAD."' , '".$OFICINA_FOTO."' , '".$OFICINA_ENTREGA."' , '".$OFICINA_LUGAR."' , '".$OFICINA_HORA."' , '".$OFICINA_DEVOLU."' , '".$OFICINA_LUDEVO."' , '".$OFICINA_HORADEVO."' , '".$OFICINA_SOLICITUD."' , '".$OFICINA_DIAS."' , '".$OFICINA_COSTO."' , '".$OFICINA_IVA."' , '".$OFICINA_SUB."' , '".$OFICINA_TOTAL."' , '".$OFICINA_OBSERVA."' , '".$HOFICINA."' , '".$session."' ); ";		
		
		if($enviarOFICINA=='enviarOFICINA'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
    }

	
    public function Listado_OFICINA(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04oficina WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_OFICINA2($id){
	$conn = $this->db();
	$variablequery = "select * from 04oficina  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


    public function borra_OFICINA($id){
	$conn = $this->db();
	$variablequery = "delete from 04oficina where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}

	public function Listado_OFICINA3($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_PRECIO2'];
}

	public function fotos_oficina($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_FOTOS'];
}
	public function nombre_oficina ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}
//////////////////  BOTIQUIN ///////////////////////////////////////////////

    public function botiquin ($BOTIQUIN_EQUIPO , $BOTIQUIN_CANTIDAD , $BOTIQUIN_ENTREGA ,$BOTIQUIN_FOTO, $BOTIQUIN_LUGAR , $BOTIQUIN_HORA , $BOTIQUIN_DEVOLU , $BOTIQUIN_LUDEVO , $BOTIQUIN_HORADEVO , $BOTIQUIN_SOLICITUD , $BOTIQUIN_DIAS , $BOTIQUIN_COSTO , $BOTIQUIN_IVA, $BOTIQUIN_SUB , $BOTIQUIN_TOTAL , $BOTIQUIN_OBSERVA , $HBOTIQUIN,$enviarBOTIQUIN,$IpBOTIQUIN){
    $conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
    $BOTIQUIN_TOTAL = str_replace(',','',$BOTIQUIN_TOTAL);
    $BOTIQUIN_TOTAL = str_replace('$','',$BOTIQUIN_TOTAL);

    $BOTIQUIN_IVA = str_replace(',','',$BOTIQUIN_IVA);
    $BOTIQUIN_IVA = str_replace('$','',$BOTIQUIN_IVA);	

    $BOTIQUIN_SUB = str_replace(',','',$BOTIQUIN_SUB);
    $BOTIQUIN_SUB = str_replace('$','',$BOTIQUIN_SUB);	                           
	$BOTIQUIN_EQUIPO2 = explode('^^',$BOTIQUIN_EQUIPO);	
	 $var1 = "update 04botiquin  set
	 
BOTIQUIN_EQUIPO = '".$BOTIQUIN_EQUIPO."' , BOTIQUIN_CANTIDAD = '".$BOTIQUIN_CANTIDAD."' , BOTIQUIN_FOTO = '".$BOTIQUIN_FOTO."' , BOTIQUIN_ENTREGA = '".$BOTIQUIN_ENTREGA."' , BOTIQUIN_LUGAR = '".$BOTIQUIN_LUGAR."' , BOTIQUIN_HORA = '".$BOTIQUIN_HORA."' , BOTIQUIN_DEVOLU = '".$BOTIQUIN_DEVOLU."' , BOTIQUIN_LUDEVO = '".$BOTIQUIN_LUDEVO."' , BOTIQUIN_HORADEVO = '".$BOTIQUIN_HORADEVO."' , BOTIQUIN_SOLICITUD = '".$BOTIQUIN_SOLICITUD."' , BOTIQUIN_DIAS = '".$BOTIQUIN_DIAS."' , BOTIQUIN_COSTO = '".$BOTIQUIN_COSTO."' , BOTIQUIN_IVA = '".$BOTIQUIN_IVA."' , BOTIQUIN_SUB = '".$BOTIQUIN_SUB."' ,BOTIQUIN_TOTAL = '".$BOTIQUIN_TOTAL."' , BOTIQUIN_OBSERVA = '".$BOTIQUIN_OBSERVA."' , HBOTIQUIN = '".$HBOTIQUIN."'
	 where id = '".$IpBOTIQUIN."' ;  ";

	 $var2 = "insert into 04botiquin (BOTIQUIN_EQUIPO, BOTIQUIN_CANTIDAD, BOTIQUIN_FOTO, BOTIQUIN_ENTREGA, BOTIQUIN_LUGAR, BOTIQUIN_HORA, BOTIQUIN_DEVOLU, BOTIQUIN_LUDEVO, BOTIQUIN_HORADEVO, BOTIQUIN_SOLICITUD, BOTIQUIN_DIAS, BOTIQUIN_COSTO, BOTIQUIN_IVA,BOTIQUIN_SUB, BOTIQUIN_TOTAL, BOTIQUIN_OBSERVA, HBOTIQUIN, idRelacion) values ( '".$BOTIQUIN_EQUIPO2[1]."' , '".$BOTIQUIN_CANTIDAD."' , '".$BOTIQUIN_FOTO."' , '".$BOTIQUIN_ENTREGA."' , '".$BOTIQUIN_LUGAR."' , '".$BOTIQUIN_HORA."' , '".$BOTIQUIN_DEVOLU."' , '".$BOTIQUIN_LUDEVO."' , '".$BOTIQUIN_HORADEVO."' , '".$BOTIQUIN_SOLICITUD."' , '".$BOTIQUIN_DIAS."' , '".$BOTIQUIN_COSTO."' , '".$BOTIQUIN_IVA."' , '".$BOTIQUIN_SUB."' , '".$BOTIQUIN_TOTAL."' , '".$BOTIQUIN_OBSERVA."' , '".$HBOTIQUIN."' , '".$session."' ); ";		
		
		if($enviarBOTIQUIN=='enviarBOTIQUIN'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
    }

	
    public function Listado_BOTIQUIN(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04botiquin WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_BOTIQUIN2($id){
	$conn = $this->db();
	$variablequery = "select * from 04botiquin  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


    public function borra_BOTIQUIN($id){
	$conn = $this->db();
	$variablequery = "delete from 04botiquin where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}

	public function Listado_BOTIQUIN3($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_PRECIO2'];
}

	public function fotos_botiquin($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_FOTOS'];
}

	/*categoria es RE_CANTIDAD */
	public function nombre_botiquin ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}
//////////////////  PORCENTAJE VENDEDOR ///////////////////////////////////////////////


    //public function var_porcentaje(){
		//$conn = $this->db();
		//$variablequery = "select * from 04porcentajevenvedor where idRelacion = '".$_SESSION['idevento']."' ";
		//$arrayquery = mysqli_query($conn,$variablequery);
		//return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	//}		
		
		

    public function porcentaje ($DOCUMENTO_PORVENDEDOR , $ADJUNTO_PORVENDEDOR , $CANTIDAD_PORVENDEDOR,$OBSERVACIONES_PORVENDEDOR , $FECHA_PORVENDEDOR , $hPORVENDEDOR ,$IPPORVENDEDOR,$enviarPORVENDEDOR){
	  
    $conn = $this->db();
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
	if($session != ''){                            
    $CANTIDAD_PORVENDEDOR = str_replace(',','',$CANTIDAD_PORVENDEDOR);
    $CANTIDAD_PORVENDEDOR = str_replace('$','',$CANTIDAD_PORVENDEDOR);
		
	 $var1 = "update 04porcentajevenvedor  set
	 DOCUMENTO_PORVENDEDOR = '".$DOCUMENTO_PORVENDEDOR."' , ADJUNTO_PORVENDEDOR = '".$ADJUNTO_PORVENDEDOR."' , CANTIDAD_PORVENDEDOR = '".$CANTIDAD_PORVENDEDOR."' , OBSERVACIONES_PORVENDEDOR = '".$OBSERVACIONES_PORVENDEDOR."' , FECHA_PORVENDEDOR = '".$FECHA_PORVENDEDOR."' , hPORVENDEDOR = '".$hPORVENDEDOR."'
	 where id = '".$IPPORVENDEDOR."' ;  ";

	 $var2 = "insert into 04porcentajevenvedor (DOCUMENTO_PORVENDEDOR, ADJUNTO_PORVENDEDOR,CANTIDAD_PORVENDEDOR, OBSERVACIONES_PORVENDEDOR, FECHA_PORVENDEDOR, hPORVENDEDOR, idRelacion) values ( '".$DOCUMENTO_PORVENDEDOR."' , '".$ADJUNTO_PORVENDEDOR."' , '".$CANTIDAD_PORVENDEDOR."' , '".$OBSERVACIONES_PORVENDEDOR."' , '".$FECHA_PORVENDEDOR."' , '".$hPORVENDEDOR."' , '".$session."' ); ";		
		
		if($enviarPORVENDEDOR=='enviarPORVENDEDOR'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
    }

	
    public function Listado_PORVENDEDOR(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04porcentajevenvedor WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function Listado_PORVENDEDOR2($id){
	$conn = $this->db();
	$variablequery = "select * from 04porcentajevenvedor  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


    public function borra_PORVENDEDOR($id){
	$conn = $this->db();
	$variablequery = "delete from 04porcentajevenvedor where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}





	/*public function listado_personal(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04personal WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	     public function listado_personal3(){
     $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';

     $conn = $this->db();
     $variablequery = "select * from 04personal2 WHERE idRelacion = '".$session."' order by id desc ";
     return $arrayquery = mysqli_query($conn,$variablequery);
     }	*/

	public function listado_personalAA1(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
     $conn = $this->db();

    $variablequery = "select * from 04personal WHERE 
	 04personal.idRelacion = '".$session."' ";
     return $arrayquery = mysqli_query($conn,$variablequery);
		
	}


	public function listado_personalAA2(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
     $conn = $this->db();

    $variablequery = "select * from 04personal2 WHERE 
	 04personal2.idRelacion = '".$session."'  ";
     return $arrayquery = mysqli_query($conn,$variablequery);
		
	}


	    public function un_solo_colaboradora1($id){
	$conn = $this->db();
	$variable = "select 01empresa.id as idR, USUARIO_CRM from 01empresa, 01adjuntoscolaboradores WHERE ESTATUS_CRM_ACTIVOBAJA='ACTIVO' and 01empresa.id = `01adjuntoscolaboradores`.`idRelacion` and 01empresa.id = ".$id." ; ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row['USUARIO_CRM'];
	} 

	    public function un_solo_puesto($id){
	$conn = $this->db();
	$variable = "select PUESTO from 01empresa, 01adjuntoscolaboradores WHERE ESTATUS_CRM_ACTIVOBAJA='ACTIVO' and 01empresa.id = `01adjuntoscolaboradores`.`idRelacion` and 01empresa.id = ".$id." ; ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row['PUESTO'];
	} 

	    public function un_solo_emaila1($id){
	$conn = $this->db();
	$variable = "select CORREO_1 from 01empresa, 01adjuntoscolaboradores WHERE ESTATUS_CRM_ACTIVOBAJA='ACTIVO' and 01empresa.id = `01adjuntoscolaboradores`.`idRelacion` and 01empresa.id = ".$id." ; ";
	$variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row['CORREO_1'];
	} 



///////////////////////////// FEE COBRADO AL CLIENTE///////////////////////////////////////////////////

    public function feecobrado($DOCUMENTO_FEECOBRADO ,$ADJUNTO_FEECOBRADO, $MONTO_FEECOBRADO , $FECHA_FEECOBRADO , $hFEECOBRADO,$IpFEECOBRADO,$enviarFEECOBRADO){
     $MONTO_FEECOBRADO = str_replace(',','',$MONTO_FEECOBRADO);
    $conn = $this->db();
    $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
    if($session != ''){                            
	
     $var1 = "update 04feecobrado  set
 
 
     DOCUMENTO_FEECOBRADO= '".$DOCUMENTO_FEECOBRADO."' , 
     ADJUNTO_FEECOBRADO= '".$ADJUNTO_FEECOBRADO."' , 
     MONTO_FEECOBRADO = '".$MONTO_FEECOBRADO."' ,  
     hFEECOBRADO = '".$hFEECOBRADO."'
     where id = '".$IpFEECOBRADO."' ;  ";
 
 

    $var2 = "insert into 04feecobrado ( DOCUMENTO_FEECOBRADO,ADJUNTO_FEECOBRADO, MONTO_FEECOBRADO, FECHA_FEECOBRADO, hFEECOBRADO, idRelacion) values ( '".$DOCUMENTO_FEECOBRADO."' , '".$ADJUNTO_FEECOBRADO."' , '".$MONTO_FEECOBRADO."' , '".$FECHA_FEECOBRADO."' , '".$hFEECOBRADO."' , '".$session."' ); ";		
	
	if($enviarFEECOBRADO=='enviarFEECOBRADO'){
    mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
    return "Actualizado";
			
    }else{
    mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
    return "Ingresado";
}
	
}    else{
      echo "TU SESIÓN HA TERMINADO";	
}

}


    public function Listado_FEECOBRADO(){
    $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';

    $conn = $this->db();
    $variablequery = "select * from 04feecobrado WHERE idRelacion = '".$session."' order by id desc ";
    return $arrayquery = mysqli_query($conn,$variablequery);
}	


    public function Listado_FEECOBRADO2($id){
    $conn = $this->db();
    $variablequery = "select * from 04feecobrado  where id = '".$id."' ";
    return $arrayquery = mysqli_query($conn,$variablequery);
}






    public function borra_FEECOBRADO($id){
    $conn = $this->db();
    $variablequery = "delete from 04feecobrado where id = '".$id."' ";
    $arrayquery = mysqli_query($conn,$variablequery);
    RETURN 

    "<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
}





//////////////////////////////////////////////////porcentaje FEE///////////////////////////////////////////////////

    public function var_porcentajefee(){
		$conn = $this->db();
		$variablequery = "select * from 04PORCENTAJEFEE where idRelacion = '".$_SESSION['idevento']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['id'];
	}	

   public function var_porcentajefee2($id){
		$conn = $this->db();
		$variablequery = "select * from 04PORCENTAJEFEE where idRelacion = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['porcentaje'];
	}

   public function var_resultado2($id){
		$conn = $this->db();
		$variablequery = "select * from 04PORCENTAJEFEE where idRelacion = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['resultado'];
	}

    public function feeporcentaje($total_resultado ,$porcentaje, $resultado  , $HPorcentaje,$enviarporcentaje){
	$pregunta_si_ya_existe = $this->var_porcentajefee();	
     $total_resultado = str_replace(',','',$total_resultado);
    $conn = $this->db();
    $session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
    if($session != ''){
	
     $var1 = "update 04PORCENTAJEFEE  set
 
 
     total_resultado= '".$total_resultado."' , 
     porcentaje= '".$porcentaje."' , 
     resultado = '".$resultado."' ,  
     HPorcentaje = '".$HPorcentaje."'
     where id = '".$pregunta_si_ya_existe."' ;  ";
 
 //$FEE_COBRADO,$PORCENTAJE_FEE
	$variablequery = "update 04altaeventos set FEE_COBRADO='".$resultado."', PORCENTAJE_FEE='".$porcentaje."' where id = '".$session."' ";

    $var2 = "insert into 04PORCENTAJEFEE ( total_resultado,porcentaje, resultado, HPorcentaje, idRelacion) values ( '".$total_resultado."' , '".$porcentaje."' , '".$resultado."' , '".$HPorcentaje."' , '".$session."' ); ";
	
    mysqli_query($conn,"update 04altaeventos set FEE_COBRADO='".$resultado."',PORCENTAJE_FEE='".$porcentaje."' where id = ".$session." ") or die('P160'.mysqli_error($conn));	
	
	if($pregunta_si_ya_existe>0){
    mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
    return "Actualizado";
			
    }else{
    mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
    return "Ingresado";
}


	
}    else{
      echo "TU SESIÓN HA TERMINADO";	
}

}


///////////////////////////////////mensajeria////////////////////////////////////////////////////////

	public function mensajeria($MENSAJERIA_EVENTO , $MENSAJERIA_SOLICITUD , $MENSAJERIA_REALIZARCE , $MENSAJERIA_HORARIOS , $MENSAJERIA_SOLICITANTE , $MENSAJERIA_CEL_SOLICITANTE , $MENSAJERIA_EMPRESA_LUGAR , $MENSAJERIA_SELECCIONAR , $MENSAJERIA_OBJETOSARECOJER , $MENSAJERIA_MEDIDASAPROX , $MENSAJERIA_CONTENIDO , $MENSAJERIA_ENTREGARSOLICITUD , $MENSAJERIA_FOTOS , $MENSAJERIA_EMPRESADIRE , $MENSAJERIA_EDIFICIO , $MENSAJERIA_CALLE , $MENSAJERIA_NUMEROE , $MENSAJERIA_NINTERIOR , $MENSAJERIA_NOFICINA , $MENSAJERIA_COLONIA , $MENSAJERIA_ALCALDIA , $MENSAJERIA_CP , $MENSAJERIA_CIUDAD , $MENSAJERIA_ESTADO , $MENSAJERIA_PAIS , $MENSAJERIA_UBICACION , $MENSAJERIA_TELEFONO1 , $MENSAJERIA_TELEFONO2 , $MENSAJERIA_NOMBREENTREGA , $MENSAJERIA_FIRMARECIBE , $MENSAJERIA_FECHAR , $MENSAJERIA_HORAR , $MENSAJERIA_LLEVARNOMBRE , $MENSAJERIA_SELECCIONARB , $MENSAJERIA_DIRECCIONB , $MENSAJERIA_EDIFICIOB , $MENSAJERIA_CALLEB , $MENSAJERIA_NUMEROEB , $MENSAJERIA_NINTERIORB , $MENSAJERIA_NOFICINAB , $MENSAJERIA_COLONIAB , $MENSAJERIA_ALCALDIAB , $MENSAJERIA_CPB , $MENSAJERIA_CIUDADB , $MENSAJERIA_ESTADOB , $MENSAJERIA_PAISB , $MENSAJERIA_UBICACIONB , $MENSAJERIA_TELEFONO1B , $MENSAJERIA_TELEFONO2B , $MENSAJERIA_NOMBREPERSONAB , $MENSAJERIA_NEMEROCELENTREGA , $MENSAJERIA_NOMBREENTREGAB , $MENSAJERIA_FIRMARECIBEB , $MENSAJERIA_FECHARB , $MENSAJERIA_HORARB , $MENSAJERIA_INSTRUCCIONES , $MENSAJERIA_OBSERVACIONES , $MENSAJERIA_FIRMA , $MENSAJERIA_FOTOSNECES , $MENSAJERIA_ARCHIVORELACIONADO , $MENSAJERIA_VEHICULOM , $MENSAJERIA_REALIZADOPOR , $MENSAJERIA_COSTOCAMIONETA , $MENSAJERIA_COSTOGASOLINA , $MENSAJERIA_COSTOCASETAS , $MENSAJERIA_COSTOESTACIONAMIENTO , $MENSAJERIA_COSTOGASTOS , $MENSAJERIA_TOTAL , $MENSAJERIA_OBSERVA ,$NUMERO_EVENTO,$NOMBRE_EVENTO,$CIUDAD_DEL_EVENTO, $HMENSAJERIA,$IPMENSAJERIA,$enviarMENSAJERIA ){
		
		$conn = $this->db();
		                                                  
	
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';  
		if($session != ''){
			
			$MENSAJERIA_SOLICITANTE2 = explode('^^',$MENSAJERIA_SOLICITANTE);
			$MENSAJERIA_SOLICITANTE3 = $MENSAJERIA_SOLICITANTE2[1].' '.$MENSAJERIA_SOLICITANTE2[2];
			
			$MENSAJERIA_SELECCIONAR2 = explode('^^',$MENSAJERIA_SELECCIONAR);
			
			$MENSAJERIA_NOMBREPERSONAB2 = explode('^^^',$MENSAJERIA_NOMBREPERSONAB);

		 
			$MENSAJERIA_EMPRESADIRE2 = explode('^^^',$MENSAJERIA_EMPRESADIRE);
			$MENSAJERIA_SELECCIONAR2 = explode('^^^',$MENSAJERIA_SELECCIONAR);			
			$MENSAJERIA_EMPRESA_LUGAR2 = explode('^^^',$MENSAJERIA_EMPRESA_LUGAR);

			
			$MENSAJERIA_LLEVARNOMBRE2 = explode('^^^',$MENSAJERIA_LLEVARNOMBRE);  						
			$MENSAJERIA_SELECCIONARB2 = explode('^^^',$MENSAJERIA_SELECCIONARB);						
			$MENSAJERIA_DIRECCIONB2 = explode('^^^',$MENSAJERIA_DIRECCIONB);						
			
			$MENSAJERIA_VEHICULOM2 = explode('(!)',$MENSAJERIA_VEHICULOM);
			
			//DOCUMENTO_MENSAJERIA
			$MENSAJERIA_REALIZADOPOR2 = explode('(|)',$MENSAJERIA_REALIZADOPOR);

			
		 $var1 = "update 04mensajeria set 
		 MENSAJERIA_EVENTO = '".$MENSAJERIA_EVENTO."' , MENSAJERIA_SOLICITUD = '".$MENSAJERIA_SOLICITUD."' , MENSAJERIA_REALIZARCE = '".$MENSAJERIA_REALIZARCE."' , MENSAJERIA_HORARIOS = '".$MENSAJERIA_HORARIOS."' , MENSAJERIA_SOLICITANTE = '".$MENSAJERIA_SOLICITANTE3."' , MENSAJERIA_CEL_SOLICITANTE = '".$MENSAJERIA_CEL_SOLICITANTE."' , MENSAJERIA_EMPRESA_LUGAR = '".$MENSAJERIA_EMPRESA_LUGAR."' , MENSAJERIA_SELECCIONAR = '".$MENSAJERIA_SELECCIONAR."' , MENSAJERIA_OBJETOSARECOJER = '".$MENSAJERIA_OBJETOSARECOJER."' , MENSAJERIA_MEDIDASAPROX = '".$MENSAJERIA_MEDIDASAPROX."' , MENSAJERIA_CONTENIDO = '".$MENSAJERIA_CONTENIDO."' , MENSAJERIA_ENTREGARSOLICITUD = '".$MENSAJERIA_ENTREGARSOLICITUD."' , MENSAJERIA_FOTOS = '".$MENSAJERIA_FOTOS."' , MENSAJERIA_EMPRESADIRE = '".$MENSAJERIA_EMPRESADIRE."' , MENSAJERIA_EDIFICIO = '".$MENSAJERIA_EDIFICIO."' , MENSAJERIA_CALLE = '".$MENSAJERIA_CALLE."' , MENSAJERIA_NUMEROE = '".$MENSAJERIA_NUMEROE."' , MENSAJERIA_NINTERIOR = '".$MENSAJERIA_NINTERIOR."' , MENSAJERIA_NOFICINA = '".$MENSAJERIA_NOFICINA."' , MENSAJERIA_COLONIA = '".$MENSAJERIA_COLONIA."' , MENSAJERIA_ALCALDIA = '".$MENSAJERIA_ALCALDIA."' , MENSAJERIA_CP = '".$MENSAJERIA_CP."' , MENSAJERIA_CIUDAD = '".$MENSAJERIA_CIUDAD."' , MENSAJERIA_ESTADO = '".$MENSAJERIA_ESTADO."' , MENSAJERIA_PAIS = '".$MENSAJERIA_PAIS."' , MENSAJERIA_UBICACION = '".$MENSAJERIA_UBICACION."' , MENSAJERIA_TELEFONO1 = '".$MENSAJERIA_TELEFONO1."' , MENSAJERIA_TELEFONO2 = '".$MENSAJERIA_TELEFONO2."' , MENSAJERIA_NOMBREENTREGA = '".$MENSAJERIA_NOMBREENTREGA."' , MENSAJERIA_FIRMARECIBE = '".$MENSAJERIA_FIRMARECIBE."' , MENSAJERIA_FECHAR = '".$MENSAJERIA_FECHAR."' , MENSAJERIA_HORAR = '".$MENSAJERIA_HORAR."' , MENSAJERIA_LLEVARNOMBRE = '".$MENSAJERIA_LLEVARNOMBRE."' , MENSAJERIA_SELECCIONARB = '".$MENSAJERIA_SELECCIONARB."' , MENSAJERIA_DIRECCIONB = '".$MENSAJERIA_DIRECCIONB."' , MENSAJERIA_EDIFICIOB = '".$MENSAJERIA_EDIFICIOB."' , MENSAJERIA_CALLEB = '".$MENSAJERIA_CALLEB."' , MENSAJERIA_NUMEROEB = '".$MENSAJERIA_NUMEROEB."' , MENSAJERIA_NINTERIORB = '".$MENSAJERIA_NINTERIORB."' , MENSAJERIA_NOFICINAB = '".$MENSAJERIA_NOFICINAB."' , MENSAJERIA_COLONIAB = '".$MENSAJERIA_COLONIAB."' , MENSAJERIA_ALCALDIAB = '".$MENSAJERIA_ALCALDIAB."' , MENSAJERIA_CPB = '".$MENSAJERIA_CPB."' , MENSAJERIA_CIUDADB = '".$MENSAJERIA_CIUDADB."' , MENSAJERIA_ESTADOB = '".$MENSAJERIA_ESTADOB."' , MENSAJERIA_PAISB = '".$MENSAJERIA_PAISB."' , MENSAJERIA_UBICACIONB = '".$MENSAJERIA_UBICACIONB."' , MENSAJERIA_TELEFONO1B = '".$MENSAJERIA_TELEFONO1B."' , MENSAJERIA_TELEFONO2B = '".$MENSAJERIA_TELEFONO2B."' , MENSAJERIA_NOMBREPERSONAB = '".$MENSAJERIA_NOMBREPERSONAB2."' , MENSAJERIA_NEMEROCELENTREGA = '".$MENSAJERIA_NEMEROCELENTREGA."' , MENSAJERIA_NOMBREENTREGAB = '".$MENSAJERIA_NOMBREENTREGAB."' , MENSAJERIA_FIRMARECIBEB = '".$MENSAJERIA_FIRMARECIBEB."' , MENSAJERIA_FECHARB = '".$MENSAJERIA_FECHARB."' , MENSAJERIA_HORARB = '".$MENSAJERIA_HORARB."' , MENSAJERIA_INSTRUCCIONES = '".$MENSAJERIA_INSTRUCCIONES."' , MENSAJERIA_OBSERVACIONES = '".$MENSAJERIA_OBSERVACIONES."' , MENSAJERIA_FIRMA = '".$MENSAJERIA_FIRMA."' , MENSAJERIA_FOTOSNECES = '".$MENSAJERIA_FOTOSNECES."' , MENSAJERIA_ARCHIVORELACIONADO = '".$MENSAJERIA_ARCHIVORELACIONADO."' , MENSAJERIA_VEHICULOM = '".$MENSAJERIA_VEHICULOM."' , MENSAJERIA_REALIZADOPOR = '".$MENSAJERIA_REALIZADOPOR."' , MENSAJERIA_COSTOCAMIONETA = '".$MENSAJERIA_COSTOCAMIONETA."' , MENSAJERIA_COSTOGASOLINA = '".$MENSAJERIA_COSTOGASOLINA."' , MENSAJERIA_COSTOCASETAS = '".$MENSAJERIA_COSTOCASETAS."' , MENSAJERIA_COSTOESTACIONAMIENTO = '".$MENSAJERIA_COSTOESTACIONAMIENTO."' , MENSAJERIA_COSTOGASTOS = '".$MENSAJERIA_COSTOGASTOS."' , MENSAJERIA_TOTAL = '".$MENSAJERIA_TOTAL."' , MENSAJERIA_OBSERVA = '".$MENSAJERIA_OBSERVA."' , NUMERO_EVENTO = '".$NUMERO_EVENTO."' , NOMBRE_EVENTO = '".$NOMBRE_EVENTO."' , CIUDAD_DEL_EVENTO = '".$CIUDAD_DEL_EVENTO."' , HMENSAJERIA = '".$HMENSAJERIA."' where id = '".$IPMENSAJERIA."' ;  ";
	
		 $var2 = "insert into 04mensajeria ( MENSAJERIA_EVENTO, MENSAJERIA_SOLICITUD, MENSAJERIA_REALIZARCE, MENSAJERIA_HORARIOS, MENSAJERIA_SOLICITANTE, MENSAJERIA_CEL_SOLICITANTE, MENSAJERIA_EMPRESA_LUGAR, MENSAJERIA_SELECCIONAR, MENSAJERIA_OBJETOSARECOJER, MENSAJERIA_MEDIDASAPROX, MENSAJERIA_CONTENIDO, MENSAJERIA_ENTREGARSOLICITUD, MENSAJERIA_FOTOS, MENSAJERIA_EMPRESADIRE, MENSAJERIA_EDIFICIO, MENSAJERIA_CALLE, MENSAJERIA_NUMEROE, MENSAJERIA_NINTERIOR, MENSAJERIA_NOFICINA, MENSAJERIA_COLONIA, MENSAJERIA_ALCALDIA, MENSAJERIA_CP, MENSAJERIA_CIUDAD, MENSAJERIA_ESTADO, MENSAJERIA_PAIS, MENSAJERIA_UBICACION, MENSAJERIA_TELEFONO1, MENSAJERIA_TELEFONO2, MENSAJERIA_NOMBREENTREGA, MENSAJERIA_FIRMARECIBE, MENSAJERIA_FECHAR, MENSAJERIA_HORAR, MENSAJERIA_LLEVARNOMBRE, MENSAJERIA_SELECCIONARB, MENSAJERIA_DIRECCIONB, MENSAJERIA_EDIFICIOB, MENSAJERIA_CALLEB, MENSAJERIA_NUMEROEB, MENSAJERIA_NINTERIORB, MENSAJERIA_NOFICINAB, MENSAJERIA_COLONIAB, MENSAJERIA_ALCALDIAB, MENSAJERIA_CPB, MENSAJERIA_CIUDADB, MENSAJERIA_ESTADOB, MENSAJERIA_PAISB, MENSAJERIA_UBICACIONB, MENSAJERIA_TELEFONO1B, MENSAJERIA_TELEFONO2B, MENSAJERIA_NOMBREPERSONAB, MENSAJERIA_NEMEROCELENTREGA, MENSAJERIA_NOMBREENTREGAB, MENSAJERIA_FIRMARECIBEB, MENSAJERIA_FECHARB, MENSAJERIA_HORARB, MENSAJERIA_INSTRUCCIONES, MENSAJERIA_OBSERVACIONES, MENSAJERIA_FIRMA, MENSAJERIA_FOTOSNECES, MENSAJERIA_ARCHIVORELACIONADO, MENSAJERIA_VEHICULOM, MENSAJERIA_REALIZADOPOR, MENSAJERIA_COSTOCAMIONETA, MENSAJERIA_COSTOGASOLINA, MENSAJERIA_COSTOCASETAS, MENSAJERIA_COSTOESTACIONAMIENTO, MENSAJERIA_COSTOGASTOS, MENSAJERIA_TOTAL, MENSAJERIA_OBSERVA,NUMERO_EVENTO,NOMBRE_EVENTO,CIUDAD_DEL_EVENTO, HMENSAJERIA, idRelacion) values ( '".$MENSAJERIA_EVENTO."' , '".$MENSAJERIA_SOLICITUD."' , '".$MENSAJERIA_REALIZARCE."' , '".$MENSAJERIA_HORARIOS."' , '".$MENSAJERIA_SOLICITANTE3."' , '".$MENSAJERIA_CEL_SOLICITANTE."' , '".$MENSAJERIA_EMPRESA_LUGAR2[1]."' , '".$MENSAJERIA_SELECCIONAR2[1]."' , '".$MENSAJERIA_OBJETOSARECOJER."' , '".$MENSAJERIA_MEDIDASAPROX."' , '".$MENSAJERIA_CONTENIDO."' , '".$MENSAJERIA_ENTREGARSOLICITUD."' , '".$MENSAJERIA_FOTOS."' , '".$MENSAJERIA_EMPRESADIRE2[1]."' , '".$MENSAJERIA_EDIFICIO."' , '".$MENSAJERIA_CALLE."' , '".$MENSAJERIA_NUMEROE."' , '".$MENSAJERIA_NINTERIOR."' , '".$MENSAJERIA_NOFICINA."' , '".$MENSAJERIA_COLONIA."' , '".$MENSAJERIA_ALCALDIA."' , '".$MENSAJERIA_CP."' , '".$MENSAJERIA_CIUDAD."' , '".$MENSAJERIA_ESTADO."' , '".$MENSAJERIA_PAIS."' , '".$MENSAJERIA_UBICACION."' , '".$MENSAJERIA_TELEFONO1."' , '".$MENSAJERIA_TELEFONO2."' , '".$MENSAJERIA_NOMBREENTREGA."' , '".$MENSAJERIA_FIRMARECIBE."' , '".$MENSAJERIA_FECHAR."' , '".$MENSAJERIA_HORAR."' , '".$MENSAJERIA_LLEVARNOMBRE2[1]."' , '".$MENSAJERIA_SELECCIONARB2[1]."' , '".$MENSAJERIA_DIRECCIONB2[1]."' , '".$MENSAJERIA_EDIFICIOB."' , '".$MENSAJERIA_CALLEB."' , '".$MENSAJERIA_NUMEROEB."' , '".$MENSAJERIA_NINTERIORB."' , '".$MENSAJERIA_NOFICINAB."' , '".$MENSAJERIA_COLONIAB."' , '".$MENSAJERIA_ALCALDIAB."' , '".$MENSAJERIA_CPB."' , '".$MENSAJERIA_CIUDADB."' , '".$MENSAJERIA_ESTADOB."' , '".$MENSAJERIA_PAISB."' , '".$MENSAJERIA_UBICACIONB."' , '".$MENSAJERIA_TELEFONO1B."' , '".$MENSAJERIA_TELEFONO2B."' , '".$MENSAJERIA_NOMBREPERSONAB2[1]."' , '".$MENSAJERIA_NEMEROCELENTREGA."' , '".$MENSAJERIA_NOMBREENTREGAB."' , '".$MENSAJERIA_FIRMARECIBEB."' , '".$MENSAJERIA_FECHARB."' , '".$MENSAJERIA_HORARB."' , '".$MENSAJERIA_INSTRUCCIONES."' , '".$MENSAJERIA_OBSERVACIONES."' , '".$MENSAJERIA_FIRMA."' , '".$MENSAJERIA_FOTOSNECES."' , '".$MENSAJERIA_ARCHIVORELACIONADO."' , '".$MENSAJERIA_VEHICULOM2[1]."' , '".$MENSAJERIA_REALIZADOPOR2[1]."' , '".$MENSAJERIA_COSTOCAMIONETA."' , '".$MENSAJERIA_COSTOGASOLINA."' , '".$MENSAJERIA_COSTOCASETAS."' , '".$MENSAJERIA_COSTOESTACIONAMIENTO."' , '".$MENSAJERIA_COSTOGASTOS."' , '".$MENSAJERIA_TOTAL."' , '".$MENSAJERIA_OBSERVA."' , '".$NUMERO_EVENTO."' , '".$NOMBRE_EVENTO."' , '".$CIUDAD_DEL_EVENTO."' , '".$HMENSAJERIA."' , '".$session."' ); ";	
			
	    if($enviarMENSAJERIA=='enviarMENSAJERIA'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO";	
		}
		
	}
	
	public function borra_MENSAJERIA($id){
		$conn = $this->db();
		$variablequery = "delete from 04mensajeria where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	public function Listado_MENSAJERIA2($id){
		$conn = $this->db();
		$variablequery = "select * from 04mensajeria  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	
	
	
	public function Listado_MENSAJERIA(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 04mensajeria WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	





	public function nombre_empresa($id){
	$conn = $this->db();
	$variablequery = "select NFE_INFORMACION from 03datosdelaempresa  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['NFE_INFORMACION'];
}





	public function nombre_proveedor($id){
	$conn = $this->db();
	$variablequery = "select P_NOMBRE_COMERCIAL_EMPRESA from 02direccionproveedor1  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['P_NOMBRE_COMERCIAL_EMPRESA'];
}


	public function nombre_cliente($id){
	$conn = $this->db();
	$variablequery = "select C_NOMBRE_FISCAL_RS_EMPRESA from 06direccionclientes  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['C_NOMBRE_FISCAL_RS_EMPRESA'];
}

	public function nombre_conceptoV($id){
	$conn = $this->db();
	$variablequery = "select DOCUMENTO_MENSAJERIA from 09MENSAJERIA  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['DOCUMENTO_MENSAJERIA'];
}


	public function nombre_contacto_mensajeria($id){
	$conn = $this->db();
	$variablequery = "select DOCUMENTO_MENSAJERIA from 09MENSAJERIA  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['DOCUMENTO_MENSAJERIA'];
}



/**//**//**//**//**//**//**//**//**//**//**//**//*PDF MENSAJERIA *//**//**//**//**//**//**//**//**//**//**//**//**/

	public function Listado_MENSAJERIA_PDF(){
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		$conn = $this->db();
		$variablequery = "select * from 04mensajeria WHERE idRelacion = '".$session."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function Listado_MENSAJERIA_PDF_id($id){
		
		$conn = $this->db();
		$variablequery = "select * from 04mensajeria WHERE id = '".$id."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
 /*   public function Listado_MATERIAL(){
	$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04materialyequipo WHERE idRelacion = '".$session."' order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}
*/

/**//**//**//**//**//**//**//**//**//**//**//**//*GRANDES TOTALES *//**//**//**//**//**//**//**//**//**//**//**//**/

	function grandes_totales_ingresos_egresos($NUMERO_EVENTO){
		$con = $this->db();
		$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
		$variablequeryI = "select * from 04pagosingresos WHERE idRelacion = '".$session."' order by id desc ";
		$arrayqueryI = mysqli_query($con,$variablequeryI);
		while($rowIngreso = mysqli_fetch_array($arrayqueryI) ){
			$TOTAINGRESOS += $rowIngreso['OBSERVACIONES_INGRESOS'];
		}

	$VarTikets = 'SELECT MONTO_TOTAL_COTIZACION_ADEUDO, MONTO_PROPINA FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "TIKETS") and tipo_documento = "TIKETS" ';
	$QUERYTikets = mysqli_query($con,$VarTikets);
while($ROWt=mysqli_fetch_array($QUERYTikets)){
		$subTotalTikets += $ROWt['MONTO_TOTAL_COTIZACION_ADEUDO'] + $ROWt['MONTO_PROPINA'] * 1.46 ;
}


	$VarAvion = 'SELECT subTotal, MONTO_PROPINA, UUID, MONTO_DEPOSITAR FROM 10tiketsavion LEFT JOIN 11XML ON 10tiketsavion.id = 11XML.`ultimo_id` where ( 10tiketsavion.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND `11XML`.`tipo_comprobante` = "AVION") and tipo_documento = "AVION" ';
	$QUERYAvion = mysqli_query($con,$VarAvion);
while($ROWa=mysqli_fetch_array($QUERYAvion)){	
	if( strlen($ROWa['UUID'])<1){
		$PorfaltaDeFacturaAvion +=  $ROWa['MONTO_DEPOSITAR'] * 1.46 ;
	}else{
		$subTotalAVION += $ROWa['subTotal'] + $ROWa['MONTO_PROPINA'];
	}
}


	$VarCOMPROBACION = 'SELECT  subTotal , MONTO_PROPINA, UUID, MONTO_DEPOSITAR FROM 07COMPROBACION LEFT JOIN 07XML ON 07COMPROBACION.id = 07XML.`ultimo_id` where ( 07COMPROBACION.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" ) ';
	$QUERYCOMPROBACION = mysqli_query($con,$VarCOMPROBACION);
while($ROWd=mysqli_fetch_array($QUERYCOMPROBACION)){
	if( strlen($ROWd['UUID'])<1){
		$PorfaltaDeFacturaCOMPROBACION +=  $ROWd['MONTO_DEPOSITAR'] * 1.46;
	}else{
		$subTotalCOMPROBACION += $ROWd['subTotal'] + $ROWd['MONTO_PROPINA'];
	}
}

	$VarSUBE = 'SELECT subTotal, MONTO_PROPINA, UUID, MONTO_DEPOSITAR FROM 02SUBETUFACTURA LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` where 02SUBETUFACTURA.NUMERO_EVENTO ="'.$NUMERO_EVENTO.'" ';
	$QUERYSUBE = mysqli_query($con,$VarSUBE);
while($ROWe=mysqli_fetch_array($QUERYSUBE)){
	if( strlen($ROWe['UUID'])<1){
		$PorfaltaDeFacturaSUBE +=  $ROWe['MONTO_DEPOSITAR'] * 1.46;
	}else{
		$subTotalSUBETUFACTURA += $ROWe['subTotal'] + $ROWe['MONTO_PROPINA'];
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

$subBONOtotal1 = $subBONO_TOTAL+$subBONO_TOTAL1;
$subVIATICOtotal1 = $subVIATICOS_VIATICOS_PERSONAL+$subVIATICOS_PERSONAL2;
$GTOTALBONO_VIATICO = $subBONOtotal1 + $subVIATICOtotal1;

	$Varporcentajevenvedor = 'SELECT * FROM 04porcentajevenvedor where idRelacion ="'.$_SESSION['idevento'].'" ';
	$QUERYVarporcentajevenvedor = mysqli_query($con,$Varporcentajevenvedor);
	while($ROWVporcj=mysqli_fetch_array($QUERYVarporcentajevenvedor)){
	$PorcentajevenDedor1 =  $ROWVporcj['ADJUNTO_PORVENDEDOR'];	
	$PorcentajevenDedor2 +=  $ROWVporcj['ADJUNTO_PORVENDEDOR'];
	}
	
$INGRESOS = $TOTAINGRESOS;
$PorfaltaDeFactura = $PorfaltaDeFacturaAvion + $PorfaltaDeFacturaCOMPROBACION + $PorfaltaDeFacturaSUBE;
$GTotalAvioComSube = $subTotalAVION + $subTotalCOMPROBACION + $subTotalSUBETUFACTURA+ $subTotalTikets+ $PorfaltaDeFactura+$subTotalVheiculo+$subTotalmaterial+$subTotapapeleria+$subTotaOFICINA+$subTotaBOTIQUIN+$subPERSONALtotal+$GTOTALBONO_VIATICO;
return $utilidad = $INGRESOS - ($GTotalAvioComSube ); 
/*$PorUtilidad = ($utilidad * 100)/$INGRESOS;
$comisionVendedor =  ($utilidad ) * ($PorcentajevenDedor2  * 0.01);
$PorcentajeComisionVendedor = ($comisionVendedor *100)/ $INGRESOS;
$utilidadEmpresa = $utilidad -  $comisionVendedor;
$utilidadFinal = ($utilidadEmpresa * 100)/$INGRESOS;*/
	}
	
	public function lista_contactos(){
	$conn = $this->db();
	$id = $_SESSION['id_para_contacto'];
	$TABLA = $_SESSION['tabla_para_contacto'];
	$QUERY = "select * from ".$TABLA." where ".$_SESSION['id_BUSQUEDA']." = '".$id."'  ORDER BY `NOC_INFORMACION` ASC  ";
	return $arrayquery = mysqli_query($conn,$QUERY);

	}

	public function obtenercelularContacto($id){
		$conn = $this->db();
		//$explotado = explode(' || ',$id);
	$TABLA = $_SESSION['tabla_para_contacto'];
	$QUERY = "select * from ".$TABLA." where id = '".$id."' ";
	$_SESSION['telefonos'];
	$arrayquery = mysqli_query($conn,$QUERY);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return  $row[$_SESSION['telefonos']];	
	}

	public function obtenervehiculo($MENSAJERIA_VEHICULOM2){
		$_SESSION['id_vehiculos'] = $MENSAJERIA_VEHICULOM2;
	}

	public function lista_costovehiculo(){
		$conn = $this->db();
		$variablequery = "select * from 09MENSAJERIA where idRelacion = '".$_SESSION['id_vehiculos']."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);	
	}
	
} 
?>