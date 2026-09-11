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
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		
		$sWhere=" ";
		$sWhere2="";$sWhere3="";if($search['NUMERO_EVENTO_PERSONAL2']!=""){
$sWhere2.="  $tables.NUMERO_EVENTO_PERSONAL2 LIKE '%".$search['NUMERO_EVENTO_PERSONAL2']."%' OR ";}
if($search['ID_EVENTO_PERSONAL2']!=""){
$sWhere2.="  $tables.ID_EVENTO_PERSONAL2 LIKE '%".$search['ID_EVENTO_PERSONAL2']."%' OR ";}
if($search['NOMBRE_EVENTO_PERSONAL2']!=""){
$sWhere2.="  $tables.NOMBRE_EVENTO_PERSONAL2 LIKE '%".$search['NOMBRE_EVENTO_PERSONAL2']."%' OR ";}
if($search['NOMBRE_DELINGRESO2']!=""){
$sWhere2.="  $tables.NOMBRE_DELINGRESO2 LIKE '%".$search['NOMBRE_DELINGRESO2']."%' OR ";}
if($search['NOMBRE_PERSONAL2']!=""){
$sWhere2.="  $tables.NOMBRE_PERSONAL2 LIKE '%".$search['NOMBRE_PERSONAL2']."%' OR ";}
if($search['FECHA_INICIO1']!=""){
$sWhere2.="  $tables.FECHA_INICIO1 LIKE '%".$search['FECHA_INICIO1']."%' OR ";}
if($search['FECHA_FINAL1']!=""){
$sWhere2.="  $tables.FECHA_FINAL1 LIKE '%".$search['FECHA_FINAL1']."%' OR ";}
if($search['NUMERO_DIAS1']!=""){
$sWhere2.="  $tables.NUMERO_DIAS1 LIKE '%".$search['NUMERO_DIAS1']."%' OR ";}
if($search['MONTO_BONO1']!=""){
$sWhere2.="  $tables.MONTO_BONO1 LIKE '%".$search['MONTO_BONO1']."%' OR ";}
if($search['MONTO_BONO_TOTAL1']!=""){
$sWhere2.="  $tables.MONTO_BONO_TOTAL1 LIKE '%".$search['MONTO_BONO_TOTAL1']."%' OR ";}
if($search['FECHA_PPAGO1']!=""){
$sWhere2.="  $tables.FECHA_PPAGO1 LIKE '%".$search['FECHA_PPAGO1']."%' OR ";}
if($search['OBSERVACIONES_PERSONAL2']!=""){
$sWhere2.="  $tables.OBSERVACIONES_PERSONAL2 LIKE '%".$search['OBSERVACIONES_PERSONAL2']."%' OR ";}
if($search['PERSONAL2_FECHA_ULTIMA_CARGA']!=""){
$sWhere2.="  $tables.PERSONAL2_FECHA_ULTIMA_CARGA LIKE '%".$search['PERSONAL2_FECHA_ULTIMA_CARGA']."%' OR ";}
if($search['hDatosPERSONAL2']!=""){
$sWhere2.="  $tables.hDatosPERSONAL2 LIKE '%".$search['hDatosPERSONAL2']."%' OR ";}
IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' where ( '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '';	
		}
		
		$sWhere3.="  order by $tables.id desc ";
		$sql="SELECT $campos FROM  $tables $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables $sWhere $sWhere3 ";
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
