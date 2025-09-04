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


$htmldesarrollo1 = '<BR><table class="table table-striped table-bordered" style="width:100%; " id="reset_MATERIAL" name="reset_MATERIAL">

<tr>

<td colspan="11" style="background:#c9e8e8; text-align:center; font-size:15px;">ORDEN DE PRODUCCIÓN</td>
</tr>
<tr>
<td colspan="11" style="background:#c9e8e8; text-align:center; font-size:15px;">NOMBRE DEL EVENTO : <strong>'.$NOMBRE_CORTO_EVENTO.'</strong> <BR>
NÚMERO DE EVENTO : <strong>'.$NUMERO_EVENTO.'</strong></td>
</tr>
';

$htmldesarrollo1 .= '
	<tr style="background:#f5f9fc; text-align:center">

		<th width="20%" style="background:#c9e8e8">MATERIAL</th>
		<th width="20%" style="background:#c9e8e8">CANTIDAD</th>
		<th width="20%" style="background:#c9e8e8">FECHA DE ENTREGA</th>
		<th width="20%" style="background:#c9e8e8">LUGAR DE ENTREGA</th>
		<th width="20%" style="background:#c9e8e8">HORA DE ENTREGA</th>
		<th width="20%" style="background:#c9e8e8">FECHA DE DEVOLUCIÓN</th>
		<th width="20%" style="background:#c9e8e8">LUGAR DE DEVOLUCIÓN</th>
		<th width="20%" style="background:#c9e8e8">HORA DE DEVOLUCIÓN</th>
		<th width="20%" style="background:#c9e8e8">FECHA DE SOLICITUD</th>
		<th width="20%" style="background:#c9e8e8">DIAS SOLICITADOS</th>
		<th width="20%" style="background:#c9e8e8">OBSERVACIONES</th>
	</tr>
';


$idevento = isset($_GET['idevento'])?$_GET['idevento']:'';

if($idevento!='no'){
$_SESSION['idevento'] = $idevento;
}


$idRelacion = isset($_GET['idRelacion'])?$_GET['idRelacion']:'';
if($idRelacion!=''){
$querycontras2a2 = $conexion->Listado_MATERIAL2($idRelacion);
$rowReturn = $conexion->Listado_MATERIAL_return_id($querycontras2a2);

$querycontras2 = $conexion->listado_personal2_id($rowReturn);//04personal
$querycontras1 = $conexion->listado_personal22_id($rowReturn);//04personal2

$querycontras = $conexion->Listado_MATERIAL2($idRelacion);
}elseif($idevento!=''){

$querycontras2 = $conexion->listado_personalAA1();//04personal
$querycontras1 = $conexion->listado_personalAA2();//04personal2

$querycontras = $conexion->Listado_MATERIAL();	
}

while($row = mysqli_fetch_array($querycontras))
{

$htmldesarrollo2 .= "

<tr style='background:#f5f9fc;text-align:center'>

<td >".$altaeventos->nombre_materiales($row["MATERIAL_EQUIPO"])."</td>
<td >".$row["MATERIAL_CANTIDAD"]."</td>
<td >".$row["MATERIAL_ENTREGA"]."</td>
<td >".$row["MATERIAL_LUGAR"]."</td>
<td >".$row["MATERIAL_HORA"]."</td>
<td >".$row["MATERIAL_DEVOLU"]."</td>
<td >".$row["MATERIAL_LUDEVO"]."</td>
<td >".$row["MATERIAL_HORADEVO"]."</td>
<td >".$row["MATERIAL_SOLICITUD"]."</td>
<td >".$row["MATERIAL_DIAS"]."</td>
<td >".$row["MATERIAL_OBSERVA"]."</td>
</tr>";
}

$htmldesarrollo3 .= '</table>';

//




            $htmldesarrollopersonal .= '
			<br><br>
			
			<table class="table table-striped table-bordered" style="width:100%" >
			<tr style="text-align:center"><th width="100%" colspan="2" style="background:#c9e8e8; font-size:15px;">RESUMEN DEL PERSONAL DEL EVENTO</td></tr>
               <tr style="text-align:center">
               <th width="50%" style="background:#c9e8e8">NOMBRE</th>
               <th width="50%" style="background:#c9e8e8">WHATSAPP</th>

               </tr>';
            

			   $row2 = '';
               while($row2 = mysqli_fetch_array($querycontras2))
               {
            $explotado1 = explode('^^',$row2["NOMBRE_PERSONAL"]);
			$htmldesarrollopersonal .= '<tr style="background:#f5f9fc;text-align:center"><td >';
			$htmldesarrollopersonal .= $explotado1[1].' '.$explotado1[2]; 
			$htmldesarrollopersonal .= '</td><td >';
			$htmldesarrollopersonal .= $row2["WHAT_PERSONAL"]; 
			$htmldesarrollopersonal .= '</td></tr>';
			}
			$htmldesarrollopersonal .= '<tr><td colspan="14"><hr></td></tr>';

			   $row3 = '';
               while($row3 = mysqli_fetch_array($querycontras1))
               {
			$explotado2 = explode('^^',$row3["NOMBRE_PERSONAL2"]);
			$htmldesarrollopersonal .= '<tr style="background:#f5f9fc;text-align:center"><td >';
			$htmldesarrollopersonal .= $explotado2[1].' '.$explotado2[2]; 
			$htmldesarrollopersonal .= '</td><td >';
			$htmldesarrollopersonal .= $row3["WHAT_PERSONAL2"];
			$htmldesarrollopersonal .= '</td></tr>';
           } 
            
         $htmldesarrollopersonal .= '</table>';

$html2 = '
		</div>
		</div>
	</body>
</html>
';
//echo $html1.$htmldesarrollo. $html2;
//exit;

$dompdf->loadHtml($html1.$htmldesarrollo1.$htmldesarrollo2.$htmldesarrollo3. $htmldesarrollopersonal.$html2);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$output = $dompdf->output();
        $filepath = "archivos/";
        $filepdf = 'Orden_de_produccion.pdf';

        file_put_contents($filepath . $filepdf, $output);
        header ( 'Content-Description: File Transfer' );
        header ( 'Content-Type: application/pdf' );
        header ( 'Content-disposition: filename="'.basename($filepath .$filepdf).'"' );
        header ( 'Expires: 0' );
        header ( 'Cache-Control: must-revalidate' );
        header ( 'Pragma: public' );
        readfile($filepath . $filepdf);
		exit;
