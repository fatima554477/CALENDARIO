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
	include_once (__ROOT1__."/../calendariodeeventos2/class.epcinnAE.php");

	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	// NOTA: 04personal2 NO tiene columnas NUMERO_EVENTO / NOMBRE_EVENTO propias.
	// listado_personal45() las obtiene con un LEFT JOIN contra 04altaeventos
	// (eventos.id = personal.idRelacion); replicamos exactamente ese join aquí.
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];

		$sFrom = " 04personal2 AS personal LEFT JOIN 04altaeventos AS eventos ON eventos.id = personal.idRelacion ";

		$sWhere=" ";
		$sWhere2="";$sWhere3="";if($search['NUMERO_EVENTO_PERSONAL2']!=""){
$sWhere2.="  eventos.NUMERO_EVENTO LIKE '%".$search['NUMERO_EVENTO_PERSONAL2']."%' OR ";}
if($search['NOMBRE_EVENTO_PERSONAL2']!=""){
$sWhere2.="  eventos.NOMBRE_EVENTO LIKE '%".$search['NOMBRE_EVENTO_PERSONAL2']."%' OR ";}
if($search['NOMBRE_DELINGRESO2']!=""){
$sWhere2.="  personal.NOMBRE_DELINGRESO2 LIKE '%".$search['NOMBRE_DELINGRESO2']."%' OR ";}
if($search['NOMBRE_PERSONAL2']!=""){
$sWhere2.="  personal.NOMBRE_PERSONAL2 LIKE '%".$search['NOMBRE_PERSONAL2']."%' OR ";}
if($search['FECHA_INICIO1']!=""){
$sWhere2.="  personal.FECHA_INICIO1 LIKE '%".$search['FECHA_INICIO1']."%' OR ";}
if($search['FECHA_FINAL1']!=""){
$sWhere2.="  personal.FECHA_FINAL1 LIKE '%".$search['FECHA_FINAL1']."%' OR ";}
if($search['NUMERO_DIAS1']!=""){
$sWhere2.="  personal.NUMERO_DIAS1 LIKE '%".$search['NUMERO_DIAS1']."%' OR ";}
if($search['MONTO_BONO1']!=""){
$sWhere2.="  personal.MONTO_BONO1 LIKE '%".$search['MONTO_BONO1']."%' OR ";}
if($search['MONTO_BONO_TOTAL1']!=""){
$sWhere2.="  personal.MONTO_BONO_TOTAL1 LIKE '%".$search['MONTO_BONO_TOTAL1']."%' OR ";}
if($search['FECHA_PPAGO1']!=""){
$sWhere2.="  personal.FECHA_PPAGO1 LIKE '%".$search['FECHA_PPAGO1']."%' OR ";}
if($search['OBSERVACIONES_PERSONAL2']!=""){
$sWhere2.="  personal.OBSERVACIONES_PERSONAL2 LIKE '%".$search['OBSERVACIONES_PERSONAL2']."%' OR ";}
if($search['PERSONAL2_FECHA_ULTIMA_CARGA']!=""){
$sWhere2.="  personal.PERSONAL2_FECHA_ULTIMA_CARGA LIKE '%".$search['PERSONAL2_FECHA_ULTIMA_CARGA']."%' OR ";}
if($search['hDatosPERSONAL2']!=""){
$sWhere2.="  personal.hDatosPERSONAL2 LIKE '%".$search['hDatosPERSONAL2']."%' OR ";}
/*inicia copiar y pegar campos agregados del listado (archivo 4) B1*/
if($search['FORMA_PAGO1']!=""){
$sWhere2.="  personal.FORMA_PAGO1 LIKE '%".$search['FORMA_PAGO1']."%' OR ";}
if($search['FECHA_EFECTIVA1']!=""){
$sWhere2.="  personal.FECHA_EFECTIVA1 LIKE '%".$search['FECHA_EFECTIVA1']."%' OR ";}
if($search['NOMBRE_RECIBIO1']!=""){
$sWhere2.="  personal.NOMBRE_RECIBIO1 LIKE '%".$search['NOMBRE_RECIBIO1']."%' OR ";}
/*termina copiar y pegar campos agregados del listado (archivo 4) B1*/
IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' where ( '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '';	
		}
		
		$sWhere3.="  order by personal.id desc ";
		$sql="SELECT personal.*, eventos.NUMERO_EVENTO, eventos.NOMBRE_EVENTO FROM $sFrom $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT personal.id FROM $sFrom $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql1);
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
}
?>
