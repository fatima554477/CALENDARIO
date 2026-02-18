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
include_once (__ROOT1__."/../pagoproveedores/class.epcinnPP.php");

class orders extends accesoclase {
    public $mysqli;
    public $counter = 0; // contador inicializado

    function __construct(){
        $this->mysqli = $this->db();
    }

    public function countAll($sql){
        $query = $this->mysqli->query($sql);
        return $query ? $query->num_rows : 0;
    }

    // -------------------------------
    //  MÉTODOS CORREGIDOS
    // -------------------------------

    function setCounter($counter) {
        $this->counter = (int)$counter;
    }

    function getCounter() {
        return (int)$this->counter;
    }

    // --------------------------------------------------
    // GET DATA PRINCIPAL (solo limpieza, no cambio lógica)
    // --------------------------------------------------
    public function getData($tables3, $campos, $search){

        $ROWevento = $this->var_altaeventos();
        $NUMERO_EVENTO = isset($ROWevento["NUMERO_EVENTO"]) ? $ROWevento["NUMERO_EVENTO"] : "";

        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $tables = '02SUBETUFACTURA';
        $tables2 = '02XML';

        $sWhere = "";
        $sWhere2 = "";
        $sWhere3 = "";

        // LEFT JOIN FIX
        $sWhereCC = " ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` ";

        // --------------------------
        //   FILTROS (limpieza)
        // --------------------------

        foreach ($search as $campo => $valor) {

            if ($valor == "") continue;

            switch ($campo) {

                case 'NUMERO_CONSECUTIVO_PROVEE':
                case 'ID_RELACIONADO':
                case 'NOMBRE_COMERCIAL':
                case 'NOMBRE_DEL_AYUDO':
                case 'RAZON_SOCIAL':
                case 'NUMERO_EVENTO':
                case 'NOMBRE_EVENTO':
                case 'MOTIVO_GASTO':
                case 'CONCEPTO_PROVEE':
                case 'MONTO_TOTAL_COTIZACION_ADEUDO':
                case 'TIPO_DE_MONEDA':
                case 'PFORMADE_PAGO':
                case 'FECHA_DE_PAGO':
                case 'FECHA_A_DEPOSITAR':
                case 'STATUS_DE_PAGO':
                case 'ACTIVO_FIJO':
                case 'GASTO_FIJO':
                case 'PAGAR_CADA':
                case 'FECHA_PPAGO':
                case 'FECHA_TPROGRAPAGO':
                case 'NUMERO_EVENTOFIJO':
                case 'CLASI_GENERAL':
                case 'SUB_GENERAL':
                case 'CLASIFICACION_GENERAL':
                case 'CLASIFICACION_ESPECIFICA':
                case 'PLACAS_VEHICULO':
                case 'POLIZA_NUMERO':
                case 'NOMBRE_DEL_EJECUTIVO':
                case 'OBSERVACIONES_1':
                case 'FECHA_DE_LLENADO':
                case 'hiddenpagoproveedores':
                    $sWhere2 .= " $tables.$campo LIKE '%$valor%' AND ";
                break;

                case 'RFC_PROVEEDOR':
                case 'NUMERO_EVENTO1':
                case 'MONTO_DE_COMISION':
                    $sWhere2 .= " $tables.$campo = '$valor' AND ";
                break;

                // Campos del XML
                case 'UUID':
                case 'metodoDePago':
                case 'serie':
                case 'folio':
                case 'regimenE':
                case 'UsoCFDI':
                case 'Version':
                case 'tipoDeComprobante':
                case 'condicionesDePago':
                case 'fechaTimbrado':
                case 'nombreR':
                case 'rfcR':
                case 'Moneda':
                case 'TipoCambio':
                case 'ValorUnitarioConcepto':
                case 'ClaveProdServConcepto':
                case 'RFC_RECEPTOR':
                case 'CantidadConcepto':
                case 'ImporteConcepto':
                case 'UnidadConcepto':
                    $sWhere2 .= " $tables2.$campo = '$valor' AND ";
                break;

                // Campos con LIKE
                case 'DescripcionConcepto':
                case 'ClaveUnidadConcepto':
                    $sWhere2 .= " $tables2.$campo LIKE '%$valor%' AND ";
                break;

                // Campos numéricos que vienen con $
                case 'MONTO_FACTURA':
                case 'MONTO_PROPINA':
                case 'MONTO_DEPOSITAR':
                case 'MONTO_DEPOSITADO':
                case 'IVA':
                case 'TImpuestosTrasladados':
                case 'TImpuestosRetenidos':
                case 'totalf':
                case 'TUA':
                case 'TuaTotalCargos':
                case 'Descuento':
                case 'subTotal':
                    $clean = str_replace([',','$'],'',$valor);
                    $sWhere2 .= " $tables2.$campo = '$clean' AND ";
                break;
            }
        }

        // --------------------------
        //   WHERE FINAL
        // --------------------------
        if ($sWhere2 != "") {
            $sWhere22 = substr($sWhere2, 0, -4);
            $sWhere3 = " $sWhereCC WHERE (
                02SUBETUFACTURA.NUMERO_EVENTO = '$NUMERO_EVENTO'
                AND (02SUBETUFACTURA.ID_RELACIONADO IS NULL 
                OR TRIM(02SUBETUFACTURA.ID_RELACIONADO) = '')
            ) AND ($sWhere22)";
        } else {
            $sWhere3 = " $sWhereCC WHERE 
                02SUBETUFACTURA.NUMERO_EVENTO = '$NUMERO_EVENTO'
                AND (02SUBETUFACTURA.ID_RELACIONADO IS NULL 
                OR TRIM(02SUBETUFACTURA.ID_RELACIONADO) = '') ";
        }

        // -----------------------------
        // ORDENAMIENTO (sin cambios)
        // -----------------------------
        $sWhere3campo = "";
        if ($search['RAZON_SOCIAL_orden']=="asc"){ $sWhere3campo.=" $tables.RAZON_SOCIAL asc, "; }
        if ($search['RAZON_SOCIAL_orden']=="desc"){ $sWhere3campo.=" $tables.RAZON_SOCIAL desc, "; }

        if ($search['RFC_PROVEEDOR_orden']=="asc"){ $sWhere3campo.=" $tables.RFC_PROVEEDOR asc, "; }
        if ($search['RFC_PROVEEDOR_orden']=="desc"){ $sWhere3campo.=" $tables.RFC_PROVEEDOR desc, "; }

        if ($search['MONTO_FACTURA_orden']=="asc"){ $sWhere3campo.=" $tables.MONTO_FACTURA asc, "; }
        if ($search['MONTO_FACTURA_orden']=="desc"){ $sWhere3campo.=" $tables.MONTO_FACTURA desc, "; }

        if ($search['FECHA_DE_PAGO_orden']=="asc"){ $sWhere3campo.=" $tables.FECHA_DE_PAGO asc, "; }
        if ($search['FECHA_DE_PAGO_orden']=="desc"){ $sWhere3campo.=" $tables.FECHA_DE_PAGO desc, "; }

        if ($search['NUMERO_EVENTO_orden']=="asc"){ $sWhere3campo.=" $tables.NUMERO_EVENTO asc, "; }
        if ($search['NUMERO_EVENTO_orden']=="desc"){ $sWhere3campo.=" $tables.NUMERO_EVENTO desc, "; }

        if ($sWhere3campo==""){
            $sWhere3campo="RFC_PROVEEDOR, $tables.id desc";
        } else {
            $sWhere3campo = substr($sWhere3campo, 0, -2);
        }

        $sWhere3 .= " ORDER BY $sWhere3campo";

        // -----------------------------
        // SQL FINAL
        // -----------------------------
        $sql = "SELECT $campos, 02SUBETUFACTURA.id AS 02SUBETUFACTURAid
                FROM $tables LEFT JOIN $tables2 $sWhere $sWhere3 
                LIMIT $offset, $per_page";

        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos, 02SUBETUFACTURA.id AS 02SUBETUFACTURAid
                 FROM $tables LEFT JOIN $tables2 $sWhere $sWhere3";

        $nums_row = $this->countAll($sql1);

        $this->setCounter($nums_row);

        return $query;
    }

	public function getTotalAmaunt($rfc,$idrelacioN=false){
		//PRINT_R($idrelacioN);
		$query_OR = "";
		foreach($idrelacioN as $etiqueta => $valor){
			foreach( $valor AS $etiqueta2 => $valor2){
				$query_OR .= ' id = '. $valor2.' OR ';
			}
		}
		//ECHO $query_OR;
		$query_OR2 = substr($query_OR,0,-3);
		$ROWevento = $this->var_altaeventos();
		$conn = $this->db();		
		$NUMERO_EVENTO = isset($ROWevento["NUMERO_EVENTO"])?$ROWevento["NUMERO_EVENTO"]:"";
                $identificadorProveedor = trim((string)$rfc);
                $sWhere3  = ' where ( 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'") and (NOMBRE_COMERCIAL = trim("'.$identificadorProveedor.'") or RFC_PROVEEDOR = trim("'.$identificadorProveedor.'"))  ';
		$sql1="SELECT sum(MONTO_TOTAL_COTIZACION_ADEUDO - MONTO_DEPOSITADO) as MONTO_TOTAL_COTIZACION_ADEUDO1 FROM  02SUBETUFACTURA ".$sWhere3." and (".$query_OR2.") ";
		$query = mysqli_query($conn,$sql1);
		$fetch_arrary = mysqli_fetch_array($query);
		return $fetch_arrary['MONTO_TOTAL_COTIZACION_ADEUDO1'];
	}
	
	public function ingresarTemproal($RFC_PROVEEDOR,$MONTO_TOTAL_COTIZACION_ADEUDO,$MONTO_DEPOSITADO,$idRelacion,$balance){
		$connn=$this->db();
		$queryTemporal = 'insert into 02temporalEstadoCuenta (RFC_PROVEEDOR ,MONTO_TOTAL_COTIZACION_ADEUDO, MONTO_DEPOSITADO, idRelacion, BALANCE)values("'.$RFC_PROVEEDOR.'","'.$MONTO_TOTAL_COTIZACION_ADEUDO.'","'.$MONTO_DEPOSITADO.'","'.$idRelacion.'", "'.$balance.'");';
		mysqli_query($connn,$queryTemporal);	
	}		

	public function resultadoTemproal($idRelacion,$rfc){
		$connn=$this->db();
		$identificadorProveedor = trim((string)$rfc);
		$queryTemporal = 'select * from 02temporalEstadoCuenta where idRelacion = "'.$idRelacion.'" and RFC_PROVEEDOR = "'.$identificadorProveedor.'" ';
		$query = mysqli_query($connn,$queryTemporal);
		$fetch_arrary = mysqli_fetch_array($query);
		return $fetch_arrary['BALANCE'];
	}

	
	public function TruncateingresarTemproal(){
		$connn=$this->db();
		$queryTemporal = 'truncate table 02temporalEstadoCuenta;';
		mysqli_query($connn,$queryTemporal);	
	}





	
	
	public function ingresarTemproal2($RFC_PROVEEDOR,$MONTO_TOTAL_COTIZACION_ADEUDO,$MONTO_DEPOSITADO,$idRelacion,$balance){
		$connn=$this->db();
		$queryTemporal = 'insert into 02temporalEstadoCuenta2 (RFC_PROVEEDOR ,MONTO_TOTAL_COTIZACION_ADEUDO, MONTO_DEPOSITADO, idRelacion, BALANCE)values("'.$RFC_PROVEEDOR.'","'.$MONTO_TOTAL_COTIZACION_ADEUDO.'","'.$MONTO_DEPOSITADO.'","'.$idRelacion.'", "'.$balance.'");';
		mysqli_query($connn,$queryTemporal);	
	}		

	public function resultadoTemproal2(){
		$connn=$this->db();
		$queryTemporal = 'select * from 02temporalEstadoCuenta2 order by RFC_PROVEEDOR, id desc; ';
		return $query = mysqli_query($connn,$queryTemporal);

	}

	
	public function TruncateingresarTemproal2(){
		$connn=$this->db();
		$queryTemporal = 'truncate table 02temporalEstadoCuenta2;';
		mysqli_query($connn,$queryTemporal);	
	}










	public function getTotalAmaunt2($rfc){
		$conn = $this->db();		
		$identificadorProveedor = trim((string)$rfc);
		$sWhere3  = ' where RFC_PROVEEDOR = trim("'.$identificadorProveedor.'")  ';
		$sql1="SELECT sum(MONTO_TOTAL_COTIZACION_ADEUDO - MONTO_DEPOSITADO) as MONTO_TOTAL_COTIZACION_ADEUDO1 FROM  02temporalEstadoCuenta ".$sWhere3." ";
		$query = mysqli_query($conn,$sql1);
		$fetch_arrary = mysqli_fetch_array($query);
		return $fetch_arrary['MONTO_TOTAL_COTIZACION_ADEUDO1'];
	}

	public function getTotalAmaunt2id($rfc,$idrelacioN,$idactual){
		$query_OR = "";
		//EP2
		foreach($idrelacioN as $etiqueta => $valor){
			foreach( $valor AS $etiqueta2 => $valor2){
				if($idactual!=$valor2){
					$query_OR .= ' idRelacion = '. $valor2.' OR ';
				}
			}
		}
		if($query_OR != ''){
			$query_OR2 = substr($query_OR,0,-3);
			$query_OR3 = " and (".$query_OR2.") ";
		}else{
			return 0;
		}
		$conn = $this->db();		
		$identificadorProveedor = trim((string)$rfc);
		$sWhere3  = ' where RFC_PROVEEDOR = trim("'.$identificadorProveedor.'")  ';
		$sql12="SELECT sum(MONTO_DEPOSITADO) as MONTO_DEPOSITADO1 FROM  02temporalEstadoCuenta ".$sWhere3.$query_OR3." ";
		$query2 = mysqli_query($conn,$sql12);
		$fetch_arrary2 = mysqli_fetch_array($query2);
		return $fetch_arrary2['MONTO_DEPOSITADO1'];
	}


    public function diferenciaPorConsecutivo($NUMERO_CONSECUTIVO_PROVEE) {

        $NUMERO_CONSECUTIVO_PROVEE = $this->mysqli->real_escape_string($NUMERO_CONSECUTIVO_PROVEE);
        $NUMERO_CONSECUTIVO_PROVEE = (int)$NUMERO_CONSECUTIVO_PROVEE;
        $con = $this->db();

        // Inicializar variables
        $PorfaltaDeFactura = 0.0;
        $PorfaltaDeFacturaSUBERES = 0.0;
        $subTotalSUBETUFACTURA = 0.0;

        // 1) Relacionadas
        $VarSUBE = "
            SELECT subTotal, UUID, MONTO_DEPOSITAR, ID_RELACIONADO, STATUS_CHECKBOX,
                   MONTO_FACTURA, NUMERO_CONSECUTIVO_PROVEE
            FROM 02SUBETUFACTURA
            LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id`
            WHERE 02SUBETUFACTURA.NUMERO_CONSECUTIVO_PROVEE = '$NUMERO_CONSECUTIVO_PROVEE'
              AND 02SUBETUFACTURA.VIATICOSOPRO IN ('REEMBOLSO','VIATICOS',
                  'PAGO A PROVEEDOR CON DOS O MAS FACTURAS','PAGOS CON UNA SOLA FACTURA')
              AND (02SUBETUFACTURA.ID_RELACIONADO IS NOT NULL
                   AND TRIM(02SUBETUFACTURA.ID_RELACIONADO) <> '')
        ";

        $QUERYSUBE = mysqli_query($con, $VarSUBE);
        while ($ROWe = mysqli_fetch_array($QUERYSUBE)) {

            if ($ROWe['STATUS_CHECKBOX'] == 'no' && strlen(trim($ROWe['UUID'])) < 1) {
                $PorfaltaDeFactura += (float)$ROWe['MONTO_DEPOSITAR'] * 1.46;
            } else {
                if (isset($ROWe['subTotal']) && is_numeric($ROWe['subTotal']) && $ROWe['subTotal'] > 0) {
                    $subTotalSUBETUFACTURA += (float)$ROWe['subTotal'];
                } else {
                    $subTotalSUBETUFACTURA += (float)$ROWe['MONTO_FACTURA'];
                }
            }
        }

        // 2) No relacionadas (RES)
        $VarSUBERES = "
            SELECT STATUS_CHECKBOX, UUID,
                SUM(CASE WHEN ID_RELACIONADO IS NULL OR TRIM(ID_RELACIONADO) = ''
                         THEN MONTO_DEPOSITAR ELSE 0 END) AS sin_relacion,
                SUM(CASE WHEN ID_RELACIONADO IS NOT NULL AND TRIM(ID_RELACIONADO) <> ''
                         THEN MONTO_DEPOSITAR ELSE 0 END) AS con_relacion
            FROM 02SUBETUFACTURA
            LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id`
            WHERE NUMERO_CONSECUTIVO_PROVEE = '$NUMERO_CONSECUTIVO_PROVEE'
              AND VIATICOSOPRO IN ('VIATICOS','REEMBOLSO',
                                   'PAGO A PROVEEDOR CON DOS O MAS FACTURAS',
                                   'PAGOS CON UNA SOLA FACTURA')
        ";

        $QUERYSUBERES = mysqli_query($con, $VarSUBERES);
        $ROWeR = $QUERYSUBERES ? mysqli_fetch_assoc($QUERYSUBERES)
                               : ['sin_relacion'=>0, 'con_relacion'=>0];

        $ROWeR += ['UUID'=>'', 'STATUS_CHECKBOX'=>null];

        $sin_relacion = (float)$ROWeR['sin_relacion'];
        $con_relacion = (float)$ROWeR['con_relacion'];

        if (
            strlen(trim($ROWeR['UUID'])) < 1 &&
            isset($ROWeR['STATUS_CHECKBOX']) &&
            $ROWeR['STATUS_CHECKBOX'] === 'no'
        ) {
            $PorfaltaDeFacturaSUBERES = ($sin_relacion - $con_relacion) * 1.46;
        } else {
            $PorfaltaDeFacturaSUBERES = $sin_relacion - $con_relacion;
        }

        return (float)$PorfaltaDeFactura + (float)$PorfaltaDeFacturaSUBERES;
    }




    public function puedeAutorizarVentas($idPersonal) {
        if (empty($idPersonal)) return [];
        $conn = $this->db();

        $idPersonal = mysqli_real_escape_string($conn, trim((string)$idPersonal));
        $columnasIdentificador = $this->columnasIdentificadorPersonal($conn);

        if (empty($columnasIdentificador)) return [];

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
              AND ae.NUMERO_EVENTO <> ''
        ";

        $resultado = mysqli_query($conn, $sql);
        if (!$resultado) return [];

        $eventosAutorizados = [];
        while ($row = mysqli_fetch_assoc($resultado)) {
            $eventoNormalizado = strtoupper(trim((string)$row['NUMERO_EVENTO']));
            if ($eventoNormalizado !== '') {
                $eventosAutorizados[$eventoNormalizado] = true;
            }
        }
        mysqli_free_result($resultado);

        return array_keys($eventosAutorizados);
    }

    private function columnasIdentificadorPersonal($conn) {
        static $columnasCache = null;
        if ($columnasCache !== null) return $columnasCache;

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

    private function columnaExisteEnTabla($conn, $tabla, $columna) {
        if (!$conn || $tabla === '' || $columna === '') return false;

        $tablaLimpia = str_replace('`', '``', $tabla);
        $columnaLimpia = mysqli_real_escape_string($conn, $columna);

        $sql = "SHOW COLUMNS FROM `$tablaLimpia` LIKE '".$columnaLimpia."'";
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
