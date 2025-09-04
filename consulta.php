<?php
session_start();
error_reporting(E_ALL);
$palabraclave = isset($_POST['busqueda'])?trim(strval($_POST['busqueda'])):'';
//if($palabraclave!=''){
$ResultadoPais[] = 'sssssss'.$_POST['busqueda'];
$ResultadoPais[] = 'aaaaaaa'.$_POST['busqueda'];
//}
echo json_encode($ResultadoPais);
/*	require "funciones.php";
	
$queryvar = "SELECT valuename,claveSat,NombrePorducto FROM productos WHERE 
valuename like '%".trim($palabraclave)."%' COLLATE utf8_general_ci or 
claveSat LIKE '%".trim($palabraclave)."%' or 
NombrePorducto like '%".trim($palabraclave)."%' COLLATE utf8_general_ci  
order by NombrePorducto desc limit 50";



$array = mysqli_query($conexionProductos,$queryvar);
if (mysqli_num_rows($array) > 0) {
	while($registros = mysqli_fetch_array($array)) {
		if($registros["valuename"]==true){$sinonimos = ' || '.$registros["valuename"];}else{$sinonimos = '';}
	$ResultadoPais[] = $registros["claveSat"]. ' || '.$registros["NombrePorducto"]. substr($sinonimos, 0, 80);
	}
	echo json_encode($ResultadoPais);
	}
mysqli_close($conexionProductos);*/
?>