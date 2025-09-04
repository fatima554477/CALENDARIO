<?php 


//error_reporting(E_ALL);
//ini_set('display_errors', 1);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define('__ROOT222__', dirname(dirname(__FILE__)));
	
	//require_once __ROOT2__.'/includes/class.epcinn.php';
	require_once (__ROOT222__."/calendariodeeventos2/controladorAE.php");
	require_once (__ROOT222__."/calendariodeeventos2/variablesE.php");	
	//$altaeventos = NEW colaboradores();
$conexion  = NEW accesoclase();
require_once __ROOT222__.'/includes/PDF/pdf5/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('chroot', 'C:\xampp\htdocs');
$dompdf = new Dompdf($options);

//idevento
$idevento = isset($_GET['idevento'])?$_GET['idevento']:'no';
if($idevento!='no'){
$_SESSION['idevento'] = $idevento;
}

$html1 = '
<html>
	<head>
		<link rel="STYLESHEET" href="../includes/PDF/pdf/print_statics.css" type="text/css" />
	</head>
	<body>
		<div id="body">
		<div id="content">
';




//echo  isset($NOMBRE_CORTO_EVENTO)?$NOMBRE_CORTO_EVENTO:'';
//echo  isset($NUMERO_EVENTO)?$NUMERO_EVENTO:'';


$htmldesarrollo1 = '<BR><table  style="width:100%; font-size:9px;" border=0>

<tr>
<td colspan="11" style="background:#c9e8e8;font-size:15px;text-align:center">NOMBRE DEL EVENTO : <strong>'.$NOMBRE_CORTO_EVENTO.'</strong> </td>
</tr>

<tr>
<td colspan="11" style="background:#c9e8e8; font-size:15px;text-align:center">NÚMERO DE EVENTO : <strong>'.$NUMERO_EVENTO.'</strong></td>
</tr>

';
$htmldesarrollo1 .= '</table>';

$idRelacion = isset($_GET['idRelacion'])?$_GET['idRelacion']:'';
if($idRelacion!=''){
$querycontras = $conexion->Listado_MENSAJERIA_PDF_id($idRelacion);
}else{
$querycontras = $conexion->Listado_MENSAJERIA_PDF();
}
$urlMATERIAL_FOTO ='';


$htmldesarrollo2 = '<table  style="width:100%; font-size:9px;" border=0>';

while($row = mysqli_fetch_array($querycontras))
{

$htmldesarrollo2 .= "



<tr style='background:#f5f9fc;font-size:8'>
<td style='width:35%;'>FECHA DE SOLICITUD</td ><td style='width:65%;'>".$row["MENSAJERIA_SOLICITUD"]."</td></tr> 

<tr style='background:#f5f9fc;font-size:8'><td >FECHA A REALIZARSE 1</td ><td >".$row["MENSAJERIA_REALIZARCE"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'>
<td >FECHA A REALIZARSE 2</td ><td >".$row["MENSAJERIA_OBSERVACIONES"]."</td></tr> 

<tr style='background:#f5f9fc;font-size:8'><td >RANGO DE HORARIOS PARA ENTREGA</td ><td >".$row["MENSAJERIA_HORARIOS"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'><td >NOMBRE DEL SOLICITANTE</td ><td >".$row["MENSAJERIA_SOLICITANTE"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'><td >NÚMERO DE CEL DEL SOLICITANTE</td ><td >".$row["MENSAJERIA_CEL_SOLICITANTE"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'><td >CANTIDAD DE OBJETOS A RECOGER</td ><td >".$row["MENSAJERIA_OBJETOSARECOJER"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'><td >MEDIDAS APROXIMADAS DE LOS OBJETOS</td ><td >".$row["MENSAJERIA_MEDIDASAPROX"]."</td></tr> 
<tr style='background:#f5f9fc;font-size:8'><td >NOTA IMPORTANTE</td ><td >".$row["MENSAJERIA_ENTREGARSOLICITUD"]."</td></tr> 

<tr style='background:#ebceea;font-size:9;text-align:right'><td >DIRECCIÓN (ENVIA-RECOGE)</td ><td ></td></tr> 


<tr style='background:#f9e2f8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_EMPRESA_LUGAR"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_SELECCIONAR"]."</td></tr>
<tr style='background:#f9e2f8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_EMPRESADIRE"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >EDIFICIO</td ><td >".$row["MENSAJERIA_EDIFICIO"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >CALLE</td ><td >".$row["MENSAJERIA_CALLE"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >NúMERO EXTERIOR</td ><td >".$row["MENSAJERIA_NUMEROE"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >NÚMERO INTERIOR</td ><td >".$row["MENSAJERIA_NINTERIOR"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >NÚMERO DEOFICINA</td ><td >".$row["MENSAJERIA_NOFICINA"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >COLONIA</td ><td >".$row["MENSAJERIA_COLONIA"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >ALCALDIA</td ><td >".$row["MENSAJERIA_ALCALDIA"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >CODIGO POSTAL</td ><td >".$row["MENSAJERIA_CP"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >CIUDAD</td ><td >".$row["MENSAJERIA_CIUDAD"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >ESTADO</td ><td >".$row["MENSAJERIA_ESTADO"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >PAIS</td ><td >".$row["MENSAJERIA_PAIS"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >UBICACIÓN</td ><td >".$row["MENSAJERIA_UBICACION"]."</td></tr> 
<tr style='background:#f9e2f8;font-size:8'><td >NOMBRE DE QUIEN ENTREGA</td ><td >".$row["MENSAJERIA_NOMBREENTREGA"]."</td></tr> 
<tr style='background:#c8f6b4;font-size:9;text-align:right'><td >DIRECCIÓN (RECIBE)</td ><td ></td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_LLEVARNOMBRE"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_SELECCIONARB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td ></td ><td >".$row["MENSAJERIA_DIRECCIONB"]."</td></tr>
 
<tr style='background:#e0f8d8;;font-size:8'><td >EDIFICIO</td ><td >".$row["MENSAJERIA_EDIFICIOB"]."</td></tr> 
<tr style='background:#e0f8d8;;font-size:8'><td >CALLE</td ><td >".$row["MENSAJERIA_CALLEB"]."</td></tr> 
<tr style='background:#e0f8d8;;font-size:8'><td >NÚMERO EXTERIOR</td ><td >".$row["MENSAJERIA_NUMEROEB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >NÚMERO INTERIOR</td ><td >".$row["MENSAJERIA_NINTERIORB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >NÚMERO DEOFICINA</td ><td >".$row["MENSAJERIA_NOFICINAB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >COLONIA</td ><td >".$row["MENSAJERIA_COLONIAB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >ALCALDIA</td ><td >".$row["MENSAJERIA_ALCALDIAB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >CODIGO POSTAL</td ><td >".$row["MENSAJERIA_CPB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >CIUDAD</td ><td >".$row["MENSAJERIA_CIUDADB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >ESTADO</td ><td >".$row["MENSAJERIA_ESTADOB"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >PAÍS</td ><td >".$row["MENSAJERIA_PAISB"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >CONTACTOS (ENTREGA)</td ><td >".$row["MENSAJERIA_NOMBREPERSONAB"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >NÚMERO DE CEL ENTREGA</td ><td >".$row["MENSAJERIA_NEMEROCELENTREGA"]."</td></tr><br> 
 <tr style='background:#e0f8d8;font-size:8'><td >NOMBRE DE QUIEN RECIBE</td ><td >".$row["MENSAJERIA_NOMBREENTREGAB"]."</td></tr> <br>
 <tr style='background:#e0f8d8;font-size:8'><td >FIRMA DE QUIÉN RECIBE</td ><td >".$row["MENSAJERIA_FIRMARECIBE"]."</td></tr> <br>
<tr style='background:#e0f8d8;;font-size:8'><td >FECHA DE RECEPCIÓN</td ><td >".$row["MENSAJERIA_FECHAR"]."</td></tr> 
<tr style='background:#e0f8d8;font-size:8'><td >HORA DE RECEPCIÓN</td ><td >".$row["MENSAJERIA_HORAR"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >FIRMA DE QUIÉN RECIBE</td ><td >".$row["MENSAJERIA_FIRMARECIBEB"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >FECHA DE RECEPCIÓN</td ><td >".$row["MENSAJERIA_FECHARB"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >HORA DE RECEPCIÓN</td ><td >".$row["MENSAJERIA_HORARB"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >INSTRUCCIONES O COMENTARIOS ADICIONALES</td ><td >".$row["MENSAJERIA_INSTRUCCIONES"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >VEHÍCULO MENSAJERÍA</td ><td >".$row["MENSAJERIA_VEHICULOM"]."</td></tr> 
 <tr style='background:#e0f8d8;font-size:8'><td >OBSERVACIONES</td ><td >".$row["MENSAJERIA_OBSERVA"]."</td></tr> 

</tr>";
}

$htmldesarrollo2 .= '</table>';

$html2 = '
		</div>
		</div>
	</body>
</html>
';
//echo $html1.$htmldesarrollo. $html2;
//exit;

$dompdf->loadHtml($html1.$htmldesarrollo1.$htmldesarrollo2.$htmldesarrollo3.$html2);
$dompdf->setPaper('A4','');
$dompdf->render();
$output = $dompdf->output();
        $filepath = "archivos/";
        $filepdf = 'MENSAJERÍA.pdf';

        file_put_contents($filepath . $filepdf, $output);
        header ( 'Content-Description: File Transfer' );
        header ( 'Content-Type: application/pdf' );
        header ( 'Content-disposition: filename="'.basename($filepath .$filepdf).'"' );
        header ( 'Expires: 0' );
        header ( 'Cache-Control: must-revalidate' );
        header ( 'Pragma: public' );
        readfile($filepath . $filepdf);
		exit;
