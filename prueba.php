<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/altaeventos/class.epcinnAE.php");

$altaeventos  = NEW accesoclase();
$conexion = NEW colaboradores();


$RESULTADO = $altaeventos->array_smtp('EP');
PRINT_R($RESULTADO);
?>