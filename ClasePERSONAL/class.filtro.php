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
		$sWhere2="";$sWhere3="";if($search['NUMERO_EVENTO']!=""){
$sWhere2.="  $tables.NUMERO_EVENTO LIKE '%".$search['NUMERO_EVENTO']."%' OR ";}

if($search['MENSAJERIA_SOLICITUD']!=""){	
$sWhere2.="  $tables.MENSAJERIA_SOLICITUD LIKE '%".$search['MENSAJERIA_SOLICITUD']."%' OR ";}

if($search['MENSAJERIA_ENTREGARSOLICITUD']!=""){	
$sWhere2.="  $tables.MENSAJERIA_ENTREGARSOLICITUD LIKE '%".$search['MENSAJERIA_ENTREGARSOLICITUD']."%' OR ";}
if($search['MENSAJERIA_FOTOS']!=""){	
$sWhere2.="  $tables.MENSAJERIA_FOTOS LIKE '%".$search['MENSAJERIA_FOTOS']."%' OR ";}
if($search['MENSAJERIA_FIRMA']!=""){	
$sWhere2.="  $tables.MENSAJERIA_FIRMA LIKE '%".$search['MENSAJERIA_FIRMA']."%' OR ";}
if($search['MENSAJERIA_FOTOSNECES']!=""){	
$sWhere2.="  $tables.MENSAJERIA_FOTOSNECES LIKE '%".$search['MENSAJERIA_FOTOSNECES']."%' OR ";}
if($search['MENSAJERIA_ARCHIVORELACIONADO']!=""){	
$sWhere2.="  $tables.MENSAJERIA_ARCHIVORELACIONADO LIKE '%".$search['MENSAJERIA_ARCHIVORELACIONADO']."%' OR ";}


if($search['MENSAJERIA_REALIZARCE']!=""){
$sWhere2.="  $tables.MENSAJERIA_REALIZARCE LIKE '%".$search['MENSAJERIA_REALIZARCE']."%' OR ";}
if($search['MENSAJERIA_HORARIOS']!=""){
$sWhere2.="  $tables.MENSAJERIA_HORARIOS LIKE '%".$search['MENSAJERIA_HORARIOS']."%' OR ";}
if($search['MENSAJERIA_SOLICITANTE']!=""){
$sWhere2.="  $tables.MENSAJERIA_SOLICITANTE LIKE '%".$search['MENSAJERIA_SOLICITANTE']."%' OR ";}
if($search['MENSAJERIA_CEL_SOLICITANTE']!=""){
$sWhere2.="  $tables.MENSAJERIA_CEL_SOLICITANTE LIKE '%".$search['MENSAJERIA_CEL_SOLICITANTE']."%' OR ";}
if($search['MENSAJERIA_EMPRESA_LUGAR']!=""){
$sWhere2.="  $tables.MENSAJERIA_EMPRESA_LUGAR LIKE '%".$search['MENSAJERIA_EMPRESA_LUGAR']."%' OR ";}
if($search['MENSAJERIA_SELECCIONAR']!=""){
$sWhere2.="  $tables.MENSAJERIA_SELECCIONAR LIKE '%".$search['MENSAJERIA_SELECCIONAR']."%' OR ";}
if($search['MENSAJERIA_OBJETOSARECOJER']!=""){
$sWhere2.="  $tables.MENSAJERIA_OBJETOSARECOJER LIKE '%".$search['MENSAJERIA_OBJETOSARECOJER']."%' OR ";}
if($search['MENSAJERIA_MEDIDASAPROX']!=""){
$sWhere2.="  $tables.MENSAJERIA_MEDIDASAPROX LIKE '%".$search['MENSAJERIA_MEDIDASAPROX']."%' OR ";}
if($search['MENSAJERIA_CONTENIDO']!=""){
$sWhere2.="  $tables.MENSAJERIA_CONTENIDO LIKE '%".$search['MENSAJERIA_CONTENIDO']."%' OR ";}
if($search['MENSAJERIA_EMPRESADIRE']!=""){
$sWhere2.="  $tables.MENSAJERIA_EMPRESADIRE LIKE '%".$search['MENSAJERIA_EMPRESADIRE']."%' OR ";}
if($search['MENSAJERIA_EDIFICIO']!=""){
$sWhere2.="  $tables.MENSAJERIA_EDIFICIO LIKE '%".$search['MENSAJERIA_EDIFICIO']."%' OR ";}
if($search['MENSAJERIA_CALLE']!=""){
$sWhere2.="  $tables.MENSAJERIA_CALLE LIKE '%".$search['MENSAJERIA_CALLE']."%' OR ";}
if($search['MENSAJERIA_NUMEROE']!=""){
$sWhere2.="  $tables.MENSAJERIA_NUMEROE LIKE '%".$search['MENSAJERIA_NUMEROE']."%' OR ";}
if($search['MENSAJERIA_NINTERIOR']!=""){
$sWhere2.="  $tables.MENSAJERIA_NINTERIOR LIKE '%".$search['MENSAJERIA_NINTERIOR']."%' OR ";}
if($search['MENSAJERIA_NOFICINA']!=""){
$sWhere2.="  $tables.MENSAJERIA_NOFICINA LIKE '%".$search['MENSAJERIA_NOFICINA']."%' OR ";}
if($search['MENSAJERIA_COLONIA']!=""){
$sWhere2.="  $tables.MENSAJERIA_COLONIA LIKE '%".$search['MENSAJERIA_COLONIA']."%' OR ";}
if($search['MENSAJERIA_ALCALDIA']!=""){
$sWhere2.="  $tables.MENSAJERIA_ALCALDIA LIKE '%".$search['MENSAJERIA_ALCALDIA']."%' OR ";}
if($search['MENSAJERIA_CP']!=""){
$sWhere2.="  $tables.MENSAJERIA_CP LIKE '%".$search['MENSAJERIA_CP']."%' OR ";}
if($search['MENSAJERIA_CIUDAD']!=""){
$sWhere2.="  $tables.MENSAJERIA_CIUDAD LIKE '%".$search['MENSAJERIA_CIUDAD']."%' OR ";}
if($search['MENSAJERIA_ESTADO']!=""){
$sWhere2.="  $tables.MENSAJERIA_ESTADO LIKE '%".$search['MENSAJERIA_ESTADO']."%' OR ";}
if($search['MENSAJERIA_PAIS']!=""){
$sWhere2.="  $tables.MENSAJERIA_PAIS LIKE '%".$search['MENSAJERIA_PAIS']."%' OR ";}
if($search['MENSAJERIA_UBICACION']!=""){
$sWhere2.="  $tables.MENSAJERIA_UBICACION LIKE '%".$search['MENSAJERIA_UBICACION']."%' OR ";}
if($search['MENSAJERIA_TELEFONO1']!=""){
$sWhere2.="  $tables.MENSAJERIA_TELEFONO1 LIKE '%".$search['MENSAJERIA_TELEFONO1']."%' OR ";}
if($search['MENSAJERIA_TELEFONO2']!=""){
$sWhere2.="  $tables.MENSAJERIA_TELEFONO2 LIKE '%".$search['MENSAJERIA_TELEFONO2']."%' OR ";}
if($search['MENSAJERIA_NOMBREENTREGA']!=""){
$sWhere2.="  $tables.MENSAJERIA_NOMBREENTREGA LIKE '%".$search['MENSAJERIA_NOMBREENTREGA']."%' OR ";}
if($search['MENSAJERIA_FIRMARECIBE']!=""){
$sWhere2.="  $tables.MENSAJERIA_FIRMARECIBE LIKE '%".$search['MENSAJERIA_FIRMARECIBE']."%' OR ";}
if($search['MENSAJERIA_FECHAR']!=""){
$sWhere2.="  $tables.MENSAJERIA_FECHAR LIKE '%".$search['MENSAJERIA_FECHAR']."%' OR ";}
if($search['MENSAJERIA_HORAR']!=""){
$sWhere2.="  $tables.MENSAJERIA_HORAR LIKE '%".$search['MENSAJERIA_HORAR']."%' OR ";}
if($search['MENSAJERIA_LLEVARNOMBRE']!=""){
$sWhere2.="  $tables.MENSAJERIA_LLEVARNOMBRE LIKE '%".$search['MENSAJERIA_LLEVARNOMBRE']."%' OR ";}
if($search['MENSAJERIA_SELECCIONARB']!=""){
$sWhere2.="  $tables.MENSAJERIA_SELECCIONARB LIKE '%".$search['MENSAJERIA_SELECCIONARB']."%' OR ";}
if($search['MENSAJERIA_DIRECCIONB']!=""){
$sWhere2.="  $tables.MENSAJERIA_DIRECCIONB LIKE '%".$search['MENSAJERIA_DIRECCIONB']."%' OR ";}
if($search['MENSAJERIA_EDIFICIOB']!=""){
$sWhere2.="  $tables.MENSAJERIA_EDIFICIOB LIKE '%".$search['MENSAJERIA_EDIFICIOB']."%' OR ";}
if($search['MENSAJERIA_CALLEB']!=""){
$sWhere2.="  $tables.MENSAJERIA_CALLEB LIKE '%".$search['MENSAJERIA_CALLEB']."%' OR ";}
if($search['MENSAJERIA_NUMEROEB']!=""){
$sWhere2.="  $tables.MENSAJERIA_NUMEROEB LIKE '%".$search['MENSAJERIA_NUMEROEB']."%' OR ";}
if($search['MENSAJERIA_NINTERIORB']!=""){
$sWhere2.="  $tables.MENSAJERIA_NINTERIORB LIKE '%".$search['MENSAJERIA_NINTERIORB']."%' OR ";}
if($search['MENSAJERIA_NOFICINAB']!=""){
$sWhere2.="  $tables.MENSAJERIA_NOFICINAB LIKE '%".$search['MENSAJERIA_NOFICINAB']."%' OR ";}
if($search['MENSAJERIA_COLONIAB']!=""){
$sWhere2.="  $tables.MENSAJERIA_COLONIAB LIKE '%".$search['MENSAJERIA_COLONIAB']."%' OR ";}
if($search['MENSAJERIA_ALCALDIAB']!=""){
$sWhere2.="  $tables.MENSAJERIA_ALCALDIAB LIKE '%".$search['MENSAJERIA_ALCALDIAB']."%' OR ";}
if($search['MENSAJERIA_CPB']!=""){
$sWhere2.="  $tables.MENSAJERIA_CPB LIKE '%".$search['MENSAJERIA_CPB']."%' OR ";}
if($search['MENSAJERIA_CIUDADB']!=""){
$sWhere2.="  $tables.MENSAJERIA_CIUDADB LIKE '%".$search['MENSAJERIA_CIUDADB']."%' OR ";}
if($search['MENSAJERIA_ESTADOB']!=""){
$sWhere2.="  $tables.MENSAJERIA_ESTADOB LIKE '%".$search['MENSAJERIA_ESTADOB']."%' OR ";}
if($search['MENSAJERIA_PAISB']!=""){
$sWhere2.="  $tables.MENSAJERIA_PAISB LIKE '%".$search['MENSAJERIA_PAISB']."%' OR ";}
if($search['MENSAJERIA_UBICACIONB']!=""){
$sWhere2.="  $tables.MENSAJERIA_UBICACIONB LIKE '%".$search['MENSAJERIA_UBICACIONB']."%' OR ";}
if($search['MENSAJERIA_TELEFONO1B']!=""){
$sWhere2.="  $tables.MENSAJERIA_TELEFONO1B LIKE '%".$search['MENSAJERIA_TELEFONO1B']."%' OR ";}
if($search['MENSAJERIA_TELEFONO2B']!=""){
$sWhere2.="  $tables.MENSAJERIA_TELEFONO2B LIKE '%".$search['MENSAJERIA_TELEFONO2B']."%' OR ";}
if($search['MENSAJERIA_NOMBREPERSONAB']!=""){
$sWhere2.="  $tables.MENSAJERIA_NOMBREPERSONAB LIKE '%".$search['MENSAJERIA_NOMBREPERSONAB']."%' OR ";}
if($search['MENSAJERIA_NEMEROCELENTREGA']!=""){
$sWhere2.="  $tables.MENSAJERIA_NEMEROCELENTREGA LIKE '%".$search['MENSAJERIA_NEMEROCELENTREGA']."%' OR ";}
if($search['MENSAJERIA_NOMBREENTREGAB']!=""){
$sWhere2.="  $tables.MENSAJERIA_NOMBREENTREGAB LIKE '%".$search['MENSAJERIA_NOMBREENTREGAB']."%' OR ";}
if($search['MENSAJERIA_FIRMARECIBEB']!=""){
$sWhere2.="  $tables.MENSAJERIA_FIRMARECIBEB LIKE '%".$search['MENSAJERIA_FIRMARECIBEB']."%' OR ";}
if($search['MENSAJERIA_FECHARB']!=""){
$sWhere2.="  $tables.MENSAJERIA_FECHARB LIKE '%".$search['MENSAJERIA_FECHARB']."%' OR ";}
if($search['MENSAJERIA_HORARB']!=""){
$sWhere2.="  $tables.MENSAJERIA_HORARB LIKE '%".$search['MENSAJERIA_HORARB']."%' OR ";}
if($search['MENSAJERIA_INSTRUCCIONES']!=""){
$sWhere2.="  $tables.MENSAJERIA_INSTRUCCIONES LIKE '%".$search['MENSAJERIA_INSTRUCCIONES']."%' OR ";}
if($search['MENSAJERIA_OBSERVACIONES']!=""){
$sWhere2.="  $tables.MENSAJERIA_OBSERVACIONES LIKE '%".$search['MENSAJERIA_OBSERVACIONES']."%' OR ";}
if($search['MENSAJERIA_VEHICULOM']!=""){
$sWhere2.="  $tables.MENSAJERIA_VEHICULOM LIKE '%".$search['MENSAJERIA_VEHICULOM']."%' OR ";}
if($search['MENSAJERIA_REALIZADOPOR']!=""){
$sWhere2.="  $tables.MENSAJERIA_REALIZADOPOR LIKE '%".$search['MENSAJERIA_REALIZADOPOR']."%' OR ";}
if($search['MENSAJERIA_COSTOCAMIONETA']!=""){
$sWhere2.="  $tables.MENSAJERIA_COSTOCAMIONETA LIKE '%".$search['MENSAJERIA_COSTOCAMIONETA']."%' OR ";}
if($search['MENSAJERIA_COSTOGASOLINA']!=""){
$sWhere2.="  $tables.MENSAJERIA_COSTOGASOLINA LIKE '%".$search['MENSAJERIA_COSTOGASOLINA']."%' OR ";}
if($search['MENSAJERIA_COSTOCASETAS']!=""){
$sWhere2.="  $tables.MENSAJERIA_COSTOCASETAS LIKE '%".$search['MENSAJERIA_COSTOCASETAS']."%' OR ";}
if($search['MENSAJERIA_COSTOESTACIONAMIENTO']!=""){
$sWhere2.="  $tables.MENSAJERIA_COSTOESTACIONAMIENTO LIKE '%".$search['MENSAJERIA_COSTOESTACIONAMIENTO']."%' OR ";}
if($search['MENSAJERIA_COSTOGASTOS']!=""){
$sWhere2.="  $tables.MENSAJERIA_COSTOGASTOS LIKE '%".$search['MENSAJERIA_COSTOGASTOS']."%' OR ";}
if($search['MENSAJERIA_TOTAL']!=""){
$sWhere2.="  $tables.MENSAJERIA_TOTAL LIKE '%".$search['MENSAJERIA_TOTAL']."%' OR ";}
if($search['MENSAJERIA_OBSERVA']!=""){
$sWhere2.="  $tables.MENSAJERIA_OBSERVA LIKE '%".$search['MENSAJERIA_OBSERVA']."%' OR ";}
if($search['HMENSAJERIA']!=""){
$sWhere2.="  $tables.HMENSAJERIA LIKE '%".$search['HMENSAJERIA']."%' OR ";}
IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' where ( idRelacion = "'.$_SESSION['idevento'].'" and '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = ' where ( idRelacion = "'.$_SESSION['idevento'].'"  ) ';	
		}
		
		$sWhere3.="  order by $tables.MENSAJERIA_REALIZARCE desc ";
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
