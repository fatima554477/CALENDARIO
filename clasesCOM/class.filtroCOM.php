<?php
/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/

define("__ROOT1__", dirname(dirname(__FILE__)));
	include_once (__ROOT1__."/../includes/error_reporting.php");
	/*-debería ser a comprobaciones reparar**/
	//include_once (__ROOT1__."/../pagoproveedores/class.epcinnPP.php");
	include_once (__ROOT1__."/../comprobaciones/class.epcinnPP.php");
	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sty){
		$query=$this->mysqli->query($sty);
		$count=$query->num_rows;
		return $count;
	}
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		
		$ROWevento = $this->var_altaeventos();
		
		$NUMERO_EVENTO = isset($ROWevento["NUMERO_EVENTO"])?$ROWevento["NUMERO_EVENTO"]:"";
				
		
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		
		$tables = '07COMPROBACION';
		$tables2 = '07XML';		
		//$sWhereCC ="  02XML.`idRelacion` = 07COMPROBACION.id AND ";
		$sWhereCC =" ON 07COMPROBACION.id = 07XML.`ultimo_id` ";
		$sWhere2="";$sWhere3="";
		
		
if($search['NUMERO_CONSECUTIVO_PROVEE']!=""){
$sWhere2.="  $tables.NUMERO_CONSECUTIVO_PROVEE LIKE '%".$search['NUMERO_CONSECUTIVO_PROVEE']."%' OR ";}

if($search['IVA']!=""){
$sWhere2.="  $tables.IVA LIKE '%".$search['IVA']."%' OR ";}




if($search['NOMBRE_COMERCIAL']!=""){	
$sWhere2.="  $tables.NOMBRE_COMERCIAL LIKE '%".$search['NOMBRE_COMERCIAL']."%' OR ";}

if($search['RAZON_SOCIAL']!=""){	
$sWhere2.="  $tables.RAZON_SOCIAL LIKE '%".$search['RAZON_SOCIAL']."%' OR ";}

if($search['RFC_PROVEEDOR']!=""){
$sWhere2.="  $tables.RFC_PROVEEDOR LIKE '%".$search['RFC_PROVEEDOR']."%' OR ";}
if($search['NOMBRE_EVENTO']!=""){
$sWhere2.="  $tables.NOMBRE_EVENTO LIKE '%".$search['NOMBRE_EVENTO']."%' OR ";}
if($search['MOTIVO_GASTO']!=""){
$sWhere2.="  $tables.MOTIVO_GASTO LIKE '%".$search['MOTIVO_GASTO']."%' OR ";}
if($search['CONCEPTO_PROVEE']!=""){
$sWhere2.="  $tables.CONCEPTO_PROVEE LIKE '%".$search['CONCEPTO_PROVEE']."%' OR ";}
if($search['MONTO_TOTAL_COTIZACION_ADEUDO']!=""){
$sWhere2.="  $tables.MONTO_TOTAL_COTIZACION_ADEUDO LIKE '%".$search['MONTO_TOTAL_COTIZACION_ADEUDO']."%' OR ";}
if($search['MONTO_FACTURA']!=""){
$sWhere2.="  $tables.MONTO_FACTURA LIKE '%".$search['MONTO_FACTURA']."%' OR ";}
if($search['MONTO_PROPINA']!=""){
$sWhere2.="  $tables.MONTO_PROPINA LIKE '%".$search['MONTO_PROPINA']."%' OR ";}
if($search['MONTO_DEPOSITAR']!=""){
$sWhere2.="  $tables.MONTO_DEPOSITAR LIKE '%".$search['MONTO_DEPOSITAR']."%' OR ";}
if($search['TIPO_DE_MONEDA']!=""){
$sWhere2.="  $tables.TIPO_DE_MONEDA LIKE '%".$search['TIPO_DE_MONEDA']."%' OR ";}
if($search['PFORMADE_PAGO']!=""){
$sWhere2.="  $tables.PFORMADE_PAGO LIKE '%".$search['PFORMADE_PAGO']."%' OR ";}
if($search['FECHA_A_DEPOSITAR']!=""){
$sWhere2.="  $tables.FECHA_A_DEPOSITAR LIKE '%".$search['FECHA_A_DEPOSITAR']."%' OR ";}
if($search['STATUS_DE_PAGO']!=""){
$sWhere2.="  $tables.STATUS_DE_PAGO LIKE '%".$search['STATUS_DE_PAGO']."%' OR ";}
if($search['BANCO_ORIGEN']!=""){
$sWhere2.="  $tables.BANCO_ORIGEN LIKE '%".$search['BANCO_ORIGEN']."%' OR ";}
if($search['ACTIVO_FIJO']!=""){
$sWhere2.="  $tables.ACTIVO_FIJO LIKE '%".$search['ACTIVO_FIJO']."%' OR ";}
if($search['GASTO_FIJO']!=""){
$sWhere2.="  $tables.GASTO_FIJO LIKE '%".$search['GASTO_FIJO']."%' OR ";}
if($search['PAGAR_CADA']!=""){
$sWhere2.="  $tables.PAGAR_CADA LIKE '%".$search['PAGAR_CADA']."%' OR ";}
if($search['FECHA_PPAGO']!=""){
$sWhere2.="  $tables.FECHA_PPAGO LIKE '%".$search['FECHA_PPAGO']."%' OR ";}
if($search['FECHA_TPROGRAPAGO']!=""){
$sWhere2.="  $tables.FECHA_TPROGRAPAGO LIKE '%".$search['FECHA_TPROGRAPAGO']."%' OR ";}
if($search['NUMERO_EVENTOFIJO']!=""){
$sWhere2.="  $tables.NUMERO_EVENTOFIJO LIKE '%".$search['NUMERO_EVENTOFIJO']."%' OR ";}
if($search['CLASI_GENERAL']!=""){
$sWhere2.="  $tables.CLASI_GENERAL LIKE '%".$search['CLASI_GENERAL']."%' OR ";}
if($search['SUB_GENERAL']!=""){
$sWhere2.="  $tables.SUB_GENERAL LIKE '%".$search['SUB_GENERAL']."%' OR ";}
if($search['MONTO_DE_COMISION']!=""){
$sWhere2.="  $tables.MONTO_DE_COMISION LIKE '%".$search['MONTO_DE_COMISION']."%' OR ";}
if($search['POLIZA_NUMERO']!=""){
$sWhere2.="  $tables.POLIZA_NUMERO LIKE '%".$search['POLIZA_NUMERO']."%' OR ";}
if($search['NOMBRE_DEL_EJECUTIVO']!=""){
$sWhere2.="  $tables.NOMBRE_DEL_EJECUTIVO LIKE '%".$search['NOMBRE_DEL_EJECUTIVO']."%' OR ";}

if($search['OBSERVACIONES_1']!=""){
$sWhere2.="  $tables.OBSERVACIONES_1 LIKE '%".$search['OBSERVACIONES_1']."%' OR ";}

if($search['FECHA_DE_LLENADO']!=""){
$sWhere2.="  $tables.FECHA_DE_LLENADO LIKE '%".$search['FECHA_DE_LLENADO']."%' OR ";}
if($search['hiddenpagoproveedores']!=""){
$sWhere2.="  $tables.hiddenpagoproveedores LIKE '%".$search['hiddenpagoproveedores']."%' OR ";}

if($search['IMPUESTO_HOSPEDAJE']!=""){
$sWhere2.="  $tables.IMPUESTO_HOSPEDAJE LIKE '%".$search['IMPUESTO_HOSPEDAJE']."%' OR ";}

if($search['TImpuestosRetenidosIVA']!=""){
$sWhere2.="  $tables.TImpuestosRetenidosIVA LIKE '%".$search['TImpuestosRetenidosIVA']."%' OR ";}

if($search['TImpuestosRetenidosISR']!=""){
$sWhere2.="  $tables.TImpuestosRetenidosISR LIKE '%".$search['TImpuestosRetenidosISR']."%' OR ";}

if($search['descuentos']!=""){
$sWhere2.="  $tables.descuentos LIKE '%".$search['descuentos']."%' OR ";}


if($search['UUID']!=""){
$sWhere2.="  $tables2.UUID = '".$search['UUID']."' OR ";}

if($search['metodoDePago']!=""){
$sWhere2.="  $tables2.metodoDePago = '".$search['metodoDePago']."' OR ";}

if($search['total']!=""){
$total = str_replace(',','',str_replace('$','',$search['total']));
$sWhere2.="  $tables2.total = '".$total."' OR ";}

if($search['serie']!=""){
$sWhere2.="  $tables2.serie = '".$search['serie']."' OR ";}

if($search['folio']!=""){
$sWhere2.="  $tables2.folio = '".$search['folio']."' OR ";}

if($search['regimenE']!=""){
$sWhere2.="  $tables2.regimenE = '".$search['regimenE']."' OR ";}

if($search['UsoCFDI']!=""){
$sWhere2.="  $tables2.UsoCFDI = '".$search['UsoCFDI']."' OR ";}

if($search['TImpuestosTrasladados']!=""){
$TImpuestosTrasladados = str_replace(',','',str_replace('$','',$search['TImpuestosTrasladados']));
$sWhere2.="  $tables2.TImpuestosTrasladados = ".$TImpuestosTrasladados." OR ";}

if($search['TImpuestosRetenidos']!=""){
$TImpuestosRetenidos = str_replace(',','',str_replace('$','',$search['TImpuestosRetenidos']));
$sWhere2.="  $tables2.TImpuestosRetenidos = ".$TImpuestosRetenidos." OR ";}

if($search['Version']!=""){
$sWhere2.="  $tables2.Version = '".$search['Version']."' OR ";}

if($search['tipoDeComprobante']!=""){
$sWhere2.="  $tables2.tipoDeComprobante = '".$search['tipoDeComprobante']."' OR ";}

if($search['condicionesDePago']!=""){
$sWhere2.="  $tables2.condicionesDePago = '".$search['condicionesDePago']."' OR ";}

if($search['fechaTimbrado']!=""){
$sWhere2.="  $tables2.fechaTimbrado = '".$search['fechaTimbrado']."' OR ";}

if($search['nombreR']!=""){
$sWhere2.="  $tables2.nombreR = '".$search['nombreR']."' OR ";}

if($search['rfcR']!=""){
$sWhere2.="  $tables2.rfcR = '".$search['rfcR']."' OR ";}

if($search['Moneda']!=""){
$sWhere2.="  $tables2.Moneda = '".$search['Moneda']."' OR ";}

if($search['TipoCambio']!=""){
$sWhere2.="  $tables2.TipoCambio = '".$search['TipoCambio']."' OR ";}

if($search['ValorUnitarioConcepto']!=""){
$sWhere2.="  $tables2.ValorUnitarioConcepto = '".$search['ValorUnitarioConcepto']."' OR ";}

if($search['DescripcionConcepto']!=""){
$sWhere2.="  $tables2.DescripcionConcepto like '%".$search['DescripcionConcepto']."%' OR ";}

if($search['ClaveUnidadConcepto']!=""){
$sWhere2.="  $tables2.ClaveUnidadConcepto like '%".$search['ClaveUnidadConcepto']."%' OR ";}

if($search['ClaveProdServConcepto']!=""){
$sWhere2.="  $tables2.ClaveProdServConcepto = '".$search['ClaveProdServConcepto']."' OR ";}

if($search['RFC_RECEPTOR']!=""){
$sWhere2.="  $tables2.RFC_RECEPTOR = '".$search['RFC_RECEPTOR']."' OR ";}

if($search['CantidadConcepto']!=""){
$sWhere2.="  $tables2.CantidadConcepto = '".$search['CantidadConcepto']."' OR ";}

if($search['ImporteConcepto']!=""){
$sWhere2.="  $tables2.ImporteConcepto = '".$search['ImporteConcepto']."' OR ";}

if($search['UnidadConcepto']!=""){
$sWhere2.="  $tables2.UnidadConcepto = '".$search['UnidadConcepto']."' OR ";}

if($search['TUA']!=""){
	$TUA = str_replace(',','',str_replace('$','',$search['TUA']));
$sWhere2.="  $tables2.TUA = '".$TUA."' OR ";}


if($search['TuaTotalCargos']!=""){
	$TuaTotalCargos = str_replace(',','',str_replace('$','',$search['TuaTotalCargos']));
$sWhere2.="  $tables2.TuaTotalCargos = '".$TuaTotalCargos."' OR ";}



if($search['DESCUENTO']!=""){
	$DESCUENTO = str_replace(',','',str_replace('$','',$search['DESCUENTO']));
$sWhere2.="  $tables2.DESCUENTO = '".$DESCUENTO."' OR ";}

if($search['subTotal']!=""){
	$subTotal = str_replace(',','',str_replace('$','',$search['subTotal']));
$sWhere2.="  $tables2.subTotal = '".$subTotal."' OR ";}

if($search['propina']!=""){
	$propina = str_replace(',','',str_replace('$','',$search['propina']));
$sWhere2.="  $tables2.propina = '".$propina."' OR ";}



/*IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere33  = ' ('.$sWhere22.') ';
			$sWhere3  = ' where ( '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '';	
		}*/
		
IF($sWhere2!=""){
			$sWhere22 = substr($sWhere2,0,-3);
			$sWhere33  = ' ('.$sWhere22.') ';
			$sWhere3  = ' '.$sWhereCC.' where (
			 07COMPROBACION.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" AND '.$sWhere33.' ) ';			
		}ELSE{
			//$sWhereCC = substr($sWhereCC,0,-4);			
		$sWhere3  = ' '.$sWhereCC.'  where ( 07COMPROBACION.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'")  ';
		}

/*IF($sWhere2!=""){
			$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' ('.$sWhere22.') ';
			$sWhere3  = ' '.$sWhereCC.' where ( ('.$sWhere3.') ) ';		
		}ELSE{
		$sWhere3  = ' '.$sWhereCC.' ';
		}
		
		$sWhere3campo.=" $tables.id desc ";		
$sWhere3 .= " order by ".$sWhere3campo;*/
/*		


echo $sql="SELECT $campos , 07COMPROBACION.id as 07COMPROBACIONid FROM $tables LEFT JOIN $tables2 $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos , 07COMPROBACION.id as 07COMPROBACIONid FROM  $tables LEFT JOIN $tables2 $sWhere $sWhere3 ";
		
		*/

		$sWhere3.="  order by $tables.id desc ";
		
		
		 $sql="SELECT $campos , 07COMPROBACION.id as 07COMPROBACIONid  FROM  $tables LEFT JOIN $tables2  $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		 $sql="SELECT $campos , 07COMPROBACION.id as 07COMPROBACIONid  FROM  $tables LEFT JOIN $tables2  $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
	
	
	       /**
         * Obtiene los números de evento para los que un colaborador puede
         * autorizar operaciones de ventas.
         *
         * La autorización se determina cuando el colaborador tiene
         * `autorizaAUT = 'si'` en la tabla 04personal y el evento asociado
         * pertenece a 04altaeventos.
         *
         * @param string|int $idPersonal Identificador del colaborador (idem en sesión).
         * @return string[] Lista de números de evento (normalizados en mayúsculas).
         */
        public function puedeAutorizarVentas($idPersonal) {
                if (empty($idPersonal)) {
                        return [];
                }

                $conn = $this->db();
                if (!$conn) {
                        return [];
                }

                $idPersonal = mysqli_real_escape_string($conn, trim((string) $idPersonal));

                $columnasIdentificador = $this->columnasIdentificadorPersonal($conn);
                if (empty($columnasIdentificador)) {
                        return [];
                }

                $condicionesIdentificador = [];
                foreach ($columnasIdentificador as $columna) {
                        $condicionesIdentificador[] = "`p`.`".$columna."` = '".$idPersonal."'";
                }

                $sql = "
                        SELECT DISTINCT ae.NUMERO_EVENTO
                        FROM 04personal AS p
                        INNER JOIN 04altaeventos AS ae ON ae.id = p.idRelacion
                        WHERE (".implode(' OR ', $condicionesIdentificador).")
                          AND LOWER(p.autorizaAUT) = 'si'
                          AND ae.NUMERO_EVENTO IS NOT NULL
                          AND ae.NUMERO_EVENTO <> ''";

                $resultado = mysqli_query($conn, $sql);
                if (!$resultado) {
                        return [];
                }

                $eventosAutorizados = [];
                while ($row = mysqli_fetch_assoc($resultado)) {
                        $eventoNormalizado = strtoupper(trim((string) $row['NUMERO_EVENTO']));
                        if ($eventoNormalizado !== '') {
                                $eventosAutorizados[$eventoNormalizado] = true;
                        }
                }
                mysqli_free_result($resultado);

                return array_keys($eventosAutorizados);
        }

        /**
         * Obtiene las columnas disponibles para identificar a un colaborador en 04personal.
         *
         * @param mysqli $conn Conexión activa a la base de datos.
         * @return string[]
         */
        private function columnasIdentificadorPersonal($conn) {
                static $columnasCache = null;

                if ($columnasCache !== null) {
                        return $columnasCache;
                }

                $columnasPosibles = ['idem', 'idPersonal', 'IDEM', 'ID_PERSONAL'];
                $columnasDisponibles = [];

                foreach ($columnasPosibles as $columna) {
                        if ($this->columnaExisteEnTabla($conn, '04personal', $columna)) {
                                $columnasDisponibles[] = $columna;
                        }
                }

                $columnasCache = $columnasDisponibles;
                return $columnasCache;
        }

        /**
         * Verifica si una columna existe en una tabla de la base de datos activa.
         *
         * @param mysqli $conn Conexión activa a la base de datos.
         * @param string $tabla Nombre de la tabla.
         * @param string $columna Nombre de la columna.
         * @return bool
         */
        private function columnaExisteEnTabla($conn, $tabla, $columna) {
                if (!$conn || $tabla === '' || $columna === '') {
                        return false;
                }

                $tablaLimpia = str_replace('`', '``', $tabla);
                $columnaLimpia = mysqli_real_escape_string($conn, $columna);
                $sql = "SHOW COLUMNS FROM `".$tablaLimpia."` LIKE '".$columnaLimpia."'";
                $resultado = mysqli_query($conn, $sql);
                if ($resultado) {
                        $existe = mysqli_num_rows($resultado) > 0;
                        mysqli_free_result($resultado);
                        return $existe;
                }

                return false;
        }
}
?>
