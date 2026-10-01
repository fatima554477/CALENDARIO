<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08MENSAJERIAfiltroDes`, 08altaeventosfiltroPLA WHERE 08MENSAJERIAfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "MENSAJERIA";
	$tables="04mensajeria";
	

$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:""; 
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
$HMENSAJERIA = isset($_POST["HMENSAJERIA"])?$_POST["HMENSAJERIA"]:"";
 
$MENSAJERIA_ENTREGARSOLICITUD = isset($_POST["MENSAJERIA_ENTREGARSOLICITUD"])?$_POST["MENSAJERIA_ENTREGARSOLICITUD"]:""; 
$MENSAJERIA_FOTOS = isset($_POST["MENSAJERIA_FOTOS"])?$_POST["MENSAJERIA_FOTOS"]:""; 
$MENSAJERIA_FIRMA = isset($_POST["MENSAJERIA_FIRMA"])?$_POST["MENSAJERIA_FIRMA"]:""; 
$MENSAJERIA_FOTOSNECES = isset($_POST["MENSAJERIA_FOTOSNECES"])?$_POST["MENSAJERIA_FOTOSNECES"]:""; 
$MENSAJERIA_ARCHIVORELACIONADO = isset($_POST["MENSAJERIA_ARCHIVORELACIONADO"])?$_POST["MENSAJERIA_ARCHIVORELACIONADO"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"NUMERO_EVENTO"=>$NUMERO_EVENTO,
"MENSAJERIA_SOLICITUD"=>$MENSAJERIA_SOLICITUD,
"MENSAJERIA_REALIZARCE"=>$MENSAJERIA_REALIZARCE,
"MENSAJERIA_HORARIOS"=>$MENSAJERIA_HORARIOS,
"MENSAJERIA_SOLICITANTE"=>$MENSAJERIA_SOLICITANTE,
"MENSAJERIA_CEL_SOLICITANTE"=>$MENSAJERIA_CEL_SOLICITANTE,
"MENSAJERIA_EMPRESA_LUGAR"=>$MENSAJERIA_EMPRESA_LUGAR,
"MENSAJERIA_SELECCIONAR"=>$MENSAJERIA_SELECCIONAR,
"MENSAJERIA_OBJETOSARECOJER"=>$MENSAJERIA_OBJETOSARECOJER,
"MENSAJERIA_MEDIDASAPROX"=>$MENSAJERIA_MEDIDASAPROX,
"MENSAJERIA_CONTENIDO"=>$MENSAJERIA_CONTENIDO,
"MENSAJERIA_EMPRESADIRE"=>$MENSAJERIA_EMPRESADIRE,
"MENSAJERIA_EDIFICIO"=>$MENSAJERIA_EDIFICIO,
"MENSAJERIA_CALLE"=>$MENSAJERIA_CALLE,
"MENSAJERIA_NUMEROE"=>$MENSAJERIA_NUMEROE,
"MENSAJERIA_NINTERIOR"=>$MENSAJERIA_NINTERIOR,
"MENSAJERIA_NOFICINA"=>$MENSAJERIA_NOFICINA,
"MENSAJERIA_COLONIA"=>$MENSAJERIA_COLONIA,
"MENSAJERIA_ALCALDIA"=>$MENSAJERIA_ALCALDIA,
"MENSAJERIA_CP"=>$MENSAJERIA_CP,
"MENSAJERIA_CIUDAD"=>$MENSAJERIA_CIUDAD,
"MENSAJERIA_ESTADO"=>$MENSAJERIA_ESTADO,
"MENSAJERIA_PAIS"=>$MENSAJERIA_PAIS,
"MENSAJERIA_UBICACION"=>$MENSAJERIA_UBICACION,
"MENSAJERIA_TELEFONO1"=>$MENSAJERIA_TELEFONO1,
"MENSAJERIA_TELEFONO2"=>$MENSAJERIA_TELEFONO2,
"MENSAJERIA_NOMBREENTREGA"=>$MENSAJERIA_NOMBREENTREGA,
"MENSAJERIA_FIRMARECIBE"=>$MENSAJERIA_FIRMARECIBE,
"MENSAJERIA_FECHAR"=>$MENSAJERIA_FECHAR,
"MENSAJERIA_HORAR"=>$MENSAJERIA_HORAR,
"MENSAJERIA_LLEVARNOMBRE"=>$MENSAJERIA_LLEVARNOMBRE,
"MENSAJERIA_SELECCIONARB"=>$MENSAJERIA_SELECCIONARB,
"MENSAJERIA_DIRECCIONB"=>$MENSAJERIA_DIRECCIONB,
"MENSAJERIA_EDIFICIOB"=>$MENSAJERIA_EDIFICIOB,
"MENSAJERIA_CALLEB"=>$MENSAJERIA_CALLEB,
"MENSAJERIA_NUMEROEB"=>$MENSAJERIA_NUMEROEB,
"MENSAJERIA_NINTERIORB"=>$MENSAJERIA_NINTERIORB,
"MENSAJERIA_NOFICINAB"=>$MENSAJERIA_NOFICINAB,
"MENSAJERIA_COLONIAB"=>$MENSAJERIA_COLONIAB,
"MENSAJERIA_ALCALDIAB"=>$MENSAJERIA_ALCALDIAB,
"MENSAJERIA_CPB"=>$MENSAJERIA_CPB,
"MENSAJERIA_CIUDADB"=>$MENSAJERIA_CIUDADB,
"MENSAJERIA_ESTADOB"=>$MENSAJERIA_ESTADOB,
"MENSAJERIA_PAISB"=>$MENSAJERIA_PAISB,
"MENSAJERIA_UBICACIONB"=>$MENSAJERIA_UBICACIONB,
"MENSAJERIA_TELEFONO1B"=>$MENSAJERIA_TELEFONO1B,
"MENSAJERIA_TELEFONO2B"=>$MENSAJERIA_TELEFONO2B,
"MENSAJERIA_NOMBREPERSONAB"=>$MENSAJERIA_NOMBREPERSONAB,
"MENSAJERIA_NEMEROCELENTREGA"=>$MENSAJERIA_NEMEROCELENTREGA,
"MENSAJERIA_NOMBREENTREGAB"=>$MENSAJERIA_NOMBREENTREGAB,
"MENSAJERIA_FIRMARECIBEB"=>$MENSAJERIA_FIRMARECIBEB,
"MENSAJERIA_FECHARB"=>$MENSAJERIA_FECHARB,
"MENSAJERIA_HORARB"=>$MENSAJERIA_HORARB,
"MENSAJERIA_INSTRUCCIONES"=>$MENSAJERIA_INSTRUCCIONES,
"MENSAJERIA_OBSERVACIONES"=>$MENSAJERIA_OBSERVACIONES,
"MENSAJERIA_VEHICULOM"=>$MENSAJERIA_VEHICULOM,
"MENSAJERIA_REALIZADOPOR"=>$MENSAJERIA_REALIZADOPOR,
"MENSAJERIA_COSTOCAMIONETA"=>$MENSAJERIA_COSTOCAMIONETA,
"MENSAJERIA_COSTOGASOLINA"=>$MENSAJERIA_COSTOGASOLINA,
"MENSAJERIA_COSTOCASETAS"=>$MENSAJERIA_COSTOCASETAS,
"MENSAJERIA_COSTOESTACIONAMIENTO"=>$MENSAJERIA_COSTOESTACIONAMIENTO,
"MENSAJERIA_COSTOGASTOS"=>$MENSAJERIA_COSTOGASTOS,
"MENSAJERIA_TOTAL"=>$MENSAJERIA_TOTAL,
"MENSAJERIA_OBSERVA"=>$MENSAJERIA_OBSERVA,
"HMENSAJERIA"=>$HMENSAJERIA,

"MENSAJERIA_ENTREGARSOLICITUD"=>$MENSAJERIA_ENTREGARSOLICITUD,
"MENSAJERIA_FOTOS"=>$MENSAJERIA_FOTOS,
"MENSAJERIA_FIRMA"=>$MENSAJERIA_FIRMA,
"MENSAJERIA_FOTOSNECES"=>$MENSAJERIA_FOTOSNECES,
"MENSAJERIA_ARCHIVORELACIONADO"=>$MENSAJERIA_ARCHIVORELACIONADO,

 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr>
<th style="background:#c9e8e8;text-align:center">#</th>
<th style="background:#c9e8e8;text-align:center">IMPRIMIR</th>
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">No. EVENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE SOLICITUD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZARCE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA A REALIZARSE 1:</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVACIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA A REALIZARSE 2:</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARIOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">RANGO DE HORARIOS PARA ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DEL SOLICITANTE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CEL_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NÚMERO DE CEL DEL SOLICITANTE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBJETOSARECOJER",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANTIDAD DE OBJETOS A RECOGER</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_MEDIDASAPROX",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MEDIDAS APROXIMADAS DE LOS OBJETOS</th>
<?php } ?><?php    
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CONTENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONTENIDO DEL ENVIO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ENTREGARSOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOTA IMPORTANTE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ADJUNTAR FOTOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE EMPRESAS (ENVIA)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE PROVEEDORES (ENVIA)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESADIRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE CLIENTES (ENVIA)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">EDIFICIO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> CALLE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NUMERO EXTERIOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> NÚMERO INTERIOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NUMERO DE OFICINA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> COLONIA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ALCALDÍA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> C.P</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> CIUDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> ESTADO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAIS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAÍS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> UBICACIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> TELEFONO 1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> TELEFONO 2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DE QUIEN ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FIRMA DE QUIÉN RECIBE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE RECEPCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE RECEPCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_LLEVARNOMBRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE EMPRESAS (RECIBE)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE PROVEEDORES (RECIBE)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_DIRECCIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIRECCIÓN DE CLIENTES (RECIBE)</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">EDIFICIO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CALLE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NUMERO EXTERIOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIORB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> NÚMERO INTERIOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> NÚMERO DE OFICINA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COLONIA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ALCALDÍA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CPB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">C.P</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDADB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CIUDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ESTADO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAISB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAÍS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">UBICACIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TELEFONO 1 </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TELEFONO 2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREPERSONAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DE LA PERSONA A QUIÉN<br> SE LE VA A ENTREGAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NEMEROCELENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NÚMERO DE CEL DE LA PERSONA<br> A QUIEN SE LE VA A ENTREGAR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DE QUIEN RECIBE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FIRMA DE QUIÉN RECIBE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE RECEPCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE RECEPCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_INSTRUCCIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">INSTRUCCIONES O COMENTARIOS ADICIONALES</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ADJUNTAR MENSAJERIA CON NOMBRE, <br>FIRMA, FECHA Y HORA DE QUIEN RECIBIO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOSNECES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ADJUNTAR FOTOS EN CASO<br> DE SER NECESARIO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ARCHIVORELACIONADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ADJUNTAR OTRO ARCHIVO<br> RELACIONADO CON ESTA MENSAJERÍA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_VEHICULOM",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> VEHÍCULO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZADOPOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONCEPTO POR MENSAJERÍA<br> DEL VEHÍCULO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCAMIONETA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO POR DIA DEL VEHÍCULO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASOLINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MENSAJERIA COSTOGASOLINA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCASETAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> COSTO CASETAS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOESTACIONAMIENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO ESTACIONAMIENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> COSTO GASTOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>

<?php /*termina copiar y terminaA3*/ ?>
            </tr>
			
			
			
			
            <tr>                                         
<td style="background:#c9e8e8;text-align:center"></td>
<td style="background:#c9e8e8;text-align:center"></td>   
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO_1" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_SOLICITUD_1" value="<?php 
echo $MENSAJERIA_SOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZARCE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_REALIZARCE_1" value="<?php 
echo $MENSAJERIA_REALIZARCE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVACIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_OBSERVACIONES_1" value="<?php 
echo $MENSAJERIA_OBSERVACIONES; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARIOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_HORARIOS_1" value="<?php 
echo $MENSAJERIA_HORARIOS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_SOLICITANTE_1" value="<?php 
echo $MENSAJERIA_SOLICITANTE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CEL_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CEL_SOLICITANTE_1" value="<?php 
echo $MENSAJERIA_CEL_SOLICITANTE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBJETOSARECOJER",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_OBJETOSARECOJER_1" value="<?php 
echo $MENSAJERIA_OBJETOSARECOJER; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_MEDIDASAPROX",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_MEDIDASAPROX_1" value="<?php 
echo $MENSAJERIA_MEDIDASAPROX; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CONTENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CONTENIDO_1" value="<?php 
echo $MENSAJERIA_CONTENIDO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ENTREGARSOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ENTREGARSOLICITUD_1" value="<?php 
echo $MENSAJERIA_ENTREGARSOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FOTOS_1" value="<?php 
echo $MENSAJERIA_FOTOS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_EMPRESA_LUGAR_1" value="<?php 
echo $MENSAJERIA_EMPRESA_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_SELECCIONAR_1" value="<?php 
echo $MENSAJERIA_SELECCIONAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESADIRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_EMPRESADIRE_1" value="<?php 
echo $MENSAJERIA_EMPRESADIRE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_EDIFICIO_1" value="<?php 
echo $MENSAJERIA_EDIFICIO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CALLE_1" value="<?php 
echo $MENSAJERIA_CALLE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NUMEROE_1" value="<?php 
echo $MENSAJERIA_NUMEROE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NINTERIOR_1" value="<?php 
echo $MENSAJERIA_NINTERIOR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NOFICINA_1" value="<?php 
echo $MENSAJERIA_NOFICINA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COLONIA_1" value="<?php 
echo $MENSAJERIA_COLONIA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ALCALDIA_1" value="<?php 
echo $MENSAJERIA_ALCALDIA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CP_1" value="<?php 
echo $MENSAJERIA_CP; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CIUDAD_1" value="<?php 
echo $MENSAJERIA_CIUDAD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ESTADO_1" value="<?php 
echo $MENSAJERIA_ESTADO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAIS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_PAIS_1" value="<?php 
echo $MENSAJERIA_PAIS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_UBICACION_1" value="<?php 
echo $MENSAJERIA_UBICACION; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_TELEFONO1_1" value="<?php 
echo $MENSAJERIA_TELEFONO1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_TELEFONO2_1" value="<?php 
echo $MENSAJERIA_TELEFONO2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NOMBREENTREGA_1" value="<?php 
echo $MENSAJERIA_NOMBREENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FIRMARECIBE_1" value="<?php 
echo $MENSAJERIA_FIRMARECIBE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FECHAR_1" value="<?php 
echo $MENSAJERIA_FECHAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_HORAR_1" value="<?php 
echo $MENSAJERIA_HORAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_LLEVARNOMBRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_LLEVARNOMBRE_1" value="<?php 
echo $MENSAJERIA_LLEVARNOMBRE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_SELECCIONARB_1" value="<?php 
echo $MENSAJERIA_SELECCIONARB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_DIRECCIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_DIRECCIONB_1" value="<?php 
echo $MENSAJERIA_DIRECCIONB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_EDIFICIOB_1" value="<?php 
echo $MENSAJERIA_EDIFICIOB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CALLEB_1" value="<?php 
echo $MENSAJERIA_CALLEB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NUMEROEB_1" value="<?php 
echo $MENSAJERIA_NUMEROEB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIORB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NINTERIORB_1" value="<?php 
echo $MENSAJERIA_NINTERIORB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NOFICINAB_1" value="<?php 
echo $MENSAJERIA_NOFICINAB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COLONIAB_1" value="<?php 
echo $MENSAJERIA_COLONIAB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ALCALDIAB_1" value="<?php 
echo $MENSAJERIA_ALCALDIAB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CPB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CPB_1" value="<?php 
echo $MENSAJERIA_CPB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDADB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_CIUDADB_1" value="<?php 
echo $MENSAJERIA_CIUDADB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ESTADOB_1" value="<?php 
echo $MENSAJERIA_ESTADOB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAISB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_PAISB_1" value="<?php 
echo $MENSAJERIA_PAISB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_UBICACIONB_1" value="<?php 
echo $MENSAJERIA_UBICACIONB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_TELEFONO1B_1" value="<?php 
echo $MENSAJERIA_TELEFONO1B; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_TELEFONO2B_1" value="<?php 
echo $MENSAJERIA_TELEFONO2B; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREPERSONAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NOMBREPERSONAB_1" value="<?php 
echo $MENSAJERIA_NOMBREPERSONAB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NEMEROCELENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NEMEROCELENTREGA_1" value="<?php 
echo $MENSAJERIA_NEMEROCELENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_NOMBREENTREGAB_1" value="<?php 
echo $MENSAJERIA_NOMBREENTREGAB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FIRMARECIBEB_1" value="<?php 
echo $MENSAJERIA_FIRMARECIBEB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FECHARB_1" value="<?php 
echo $MENSAJERIA_FECHARB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_HORARB_1" value="<?php 
echo $MENSAJERIA_HORARB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_INSTRUCCIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_INSTRUCCIONES_1" value="<?php 
echo $MENSAJERIA_INSTRUCCIONES; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FIRMA_1" value="<?php 
echo $MENSAJERIA_FIRMA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOSNECES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_FOTOSNECES_1" value="<?php 
echo $MENSAJERIA_FOTOSNECES; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ARCHIVORELACIONADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_ARCHIVORELACIONADO_1" value="<?php 
echo $MENSAJERIA_ARCHIVORELACIONADO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_VEHICULOM",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_VEHICULOM_1" value="<?php 
echo $MENSAJERIA_VEHICULOM; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZADOPOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_REALIZADOPOR_1" value="<?php 
echo $MENSAJERIA_REALIZADOPOR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCAMIONETA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COSTOCAMIONETA_1" value="<?php 
echo $MENSAJERIA_COSTOCAMIONETA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASOLINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COSTOGASOLINA_1" value="<?php 
echo $MENSAJERIA_COSTOGASOLINA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCASETAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COSTOCASETAS_1" value="<?php 
echo $MENSAJERIA_COSTOCASETAS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOESTACIONAMIENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COSTOESTACIONAMIENTO_1" value="<?php 
echo $MENSAJERIA_COSTOESTACIONAMIENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_COSTOGASTOS_1" value="<?php 
echo $MENSAJERIA_COSTOGASTOS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_TOTAL_1" value="<?php 
echo $MENSAJERIA_TOTAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MENSAJERIA_OBSERVA_1" value="<?php 
echo $MENSAJERIA_OBSERVA; ?>"></td>
<?php } ?>


<?php /*termina copiar y terminaA4*/ ?>
	
<?php /*termina copiar y terminaA4*/ ?>
	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;    
		foreach ($datos as $key=>$row){
			
	$urlMENSAJERIA_ENTREGARSOLICITUD = $database->descargararchivo($row["MENSAJERIA_ENTREGARSOLICITUD"]);
	$urlMENSAJERIA_FOTOS = $database->descargararchivo($row["MENSAJERIA_FOTOS"]);
	$urlMENSAJERIA_FIRMA = $database->descargararchivo($row["MENSAJERIA_FIRMA"]);
	$urlMENSAJERIA_FOTOSNECES = $database->descargararchivo($row["MENSAJERIA_FOTOSNECES"]);
	$urlMENSAJERIA_ARCHIVORELACIONADO = $database->descargararchivo($row["MENSAJERIA_ARCHIVORELACIONADO"]);


			
			?>
		<tr>
		
<td style="background:#c9e8e8;text-align:center">
<?php echo $row["id"];?>
</td>


<td><a class="btn btn-sm btn-outline-success px-5" href="calendariodeeventos2/VistaPreviaMensajeriaPdf.php?idRelacion=<?php echo $row['id']; ?>" target="_blank">IMPRIMIR</a></td>


<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>--><?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"> <?php echo $row['NUMERO_EVENTO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_SOLICITUD'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZARCE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_REALIZARCE'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVACIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_OBSERVACIONES'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARIOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_HORARIOS'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_SOLICITANTE'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CEL_SOLICITANTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CEL_SOLICITANTE'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBJETOSARECOJER",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_OBJETOSARECOJER'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_MEDIDASAPROX",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_MEDIDASAPROX'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CONTENIDO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CONTENIDO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ENTREGARSOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"> <?php echo $urlMENSAJERIA_ENTREGARSOLICITUD;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"> <?php echo $urlMENSAJERIA_FOTOS;?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_EMPRESA_LUGAR"];?></td> 
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_SELECCIONAR"];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EMPRESADIRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_EMPRESADIRE"];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_EDIFICIO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CALLE'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NUMEROE'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NINTERIOR'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NOFICINA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COLONIA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_ALCALDIA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CP'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CIUDAD'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_ESTADO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAIS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_PAIS'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_UBICACION'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_TELEFONO1'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_TELEFONO2'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NOMBREENTREGA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_FIRMARECIBE'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_FECHAR'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_HORAR'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_LLEVARNOMBRE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_LLEVARNOMBRE"];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_SELECCIONARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_SELECCIONARB"];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_DIRECCIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row["MENSAJERIA_DIRECCIONB"];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_EDIFICIOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_EDIFICIOB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CALLEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CALLEB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NUMEROEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NUMEROEB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NINTERIORB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NINTERIORB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOFICINAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NOFICINAB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COLONIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COLONIAB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ALCALDIAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_ALCALDIAB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CPB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CPB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_CIUDADB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_CIUDADB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ESTADOB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_ESTADOB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_PAISB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_PAISB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_UBICACIONB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_UBICACIONB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO1B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_TELEFONO1B'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TELEFONO2B",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_TELEFONO2B'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREPERSONAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NOMBREPERSONAB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NEMEROCELENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NEMEROCELENTREGA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_NOMBREENTREGAB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_NOMBREENTREGAB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMARECIBEB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_FIRMARECIBEB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FECHARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_FECHARB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_HORARB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_HORARB'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_INSTRUCCIONES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_INSTRUCCIONES'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FIRMA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"> <?php echo $urlMENSAJERIA_FIRMA;?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_FOTOSNECES",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlMENSAJERIA_FOTOSNECES;?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_ARCHIVORELACIONADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlMENSAJERIA_ARCHIVORELACIONADO;?></td>  
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_VEHICULOM",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_VEHICULOM'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_REALIZADOPOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_REALIZADOPOR'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCAMIONETA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COSTOCAMIONETA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASOLINA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COSTOGASOLINA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOCASETAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COSTOCASETAS'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOESTACIONAMIENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COSTOESTACIONAMIENTO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_COSTOGASTOS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_COSTOGASTOS'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_TOTAL'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MENSAJERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MENSAJERIA_OBSERVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>

<?php if($database->variablespermisos('','MENSAJERIA','modificar' and $var_bloquea_fecha=='no')=='si'){ ?>
			<td style="background:#c9e8e8;text-align:center">

<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_MENSAJERIAmodifica" />			

			</td>
			 <?php } ?>
			 <?php if($database->variablespermisos('','MENSAJERIA','borrar' and $var_bloquea_fecha=='no')=='si'){ ?>
			<td style="background:#c9e8e8;text-align:center">

<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataMENSAJERIAborrar" />

			</td>	<?php } ?>		
		</tr>
			<?php
			$finales++;
		}	
	?>
		</tbody>
		</table>
		</div>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
