<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023
FECHA sandor: 
FECHA fatima:01 JUNIO 2025     
*/
error_reporting(E_ALL);
ini_set("display_errors", 1);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
isset($_SESSION["logeado"])?'':header("location: index.php?salir=1");
if(!isset($_SESSION["logeado"])) {
    exit;
}

require_once "includes/error_reporting.php";

$idevento = isset($_GET['idevento'])?$_GET['idevento']:'no';
if($idevento!='no'){
$_SESSION['idevento'] = $idevento;
}


		require_once "calendariodeeventos2/controladorAE.php";
        require_once "calendariodeeventos2/variablesE.php";
		
		
		
?><!doctype html>
<html lang="en" class="light-theme">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- loader-->
	  <link href="assets/css/pace.min.css" rel="stylesheet" />
	    <script defer src="assets/js/pace.min.js"></script>

   <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script defer type="text/javascript" src="calendariodeeventos/typeahead.js"></script>
	<style>
	
span.twitter-typeahead .tt-menu,
span.twitter-typeahead .tt-dropdown-menu {
  cursor: pointer;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  list-style: none;
  font-size: 14px;
  text-align: left;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}
span.twitter-typeahead .tt-suggestion {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333333;
  white-space: nowrap;
}
span.twitter-typeahead .tt-suggestion.tt-cursor,
span.twitter-typeahead .tt-suggestion:hover,
span.twitter-typeahead .tt-suggestion:focus {
  color: #ffffff;
  text-decoration: none;
  outline: 0;
  background-color: #337ab7;
}
.input-group.input-group-lg span.twitter-typeahead .form-control {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
.input-group.input-group-sm span.twitter-typeahead .form-control {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
span.twitter-typeahead {
  width: 100%;
}
.input-group span.twitter-typeahead {
  display: block !important;
  height: 34px;
}
.input-group span.twitter-typeahead .tt-menu,
.input-group span.twitter-typeahead .tt-dropdown-menu {
  top: 32px !important;
}
.input-group span.twitter-typeahead:not(:first-child):not(:last-child) .form-control {
  border-radius: 0;
}
.input-group span.twitter-typeahead:first-child .form-control {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group span.twitter-typeahead:last-child .form-control {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.input-group.input-group-sm span.twitter-typeahead {
  height: 30px;
}
.input-group.input-group-sm span.twitter-typeahead .tt-menu,
.input-group.input-group-sm span.twitter-typeahead .tt-dropdown-menu {
  top: 30px !important;
}
.input-group.input-group-lg span.twitter-typeahead {
  height: 46px;
}
.input-group.input-group-lg span.twitter-typeahead .tt-menu,
.input-group.input-group-lg span.twitter-typeahead .tt-dropdown-menu {
  top: 46px !important;
}

	</style>		
    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />
        <style type="text/css">
            #content {

            }
            #close {

            }
            .content2 {
                margin: 0px auto;
                min-height: 100px;
                box-shadow: 0 2px 5px #666666;
                padding: 10px;
            }
			
	#drop_file_zone {
	    background-color: #EEE;
	    border: #999 1px solid;
	    padding: 8px;
	}			

	#nono {
	  display: none;
	}
	
input[type=text] {
    text-transform: uppercase;
}


.fixed2{
position:fixed;
top:65px;
background-color:#fff;
margin-left:500px;
box-shadow:0 0 10px #222;
-webkit-box-shadow:0 0 10px #222;
-moz-box-shadow:0 0 10px #222;
z-index:1;
}

#ACTUALIZADO{
color:green;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}
  #ERROR{
color:red;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}

		td ,tr, table, textarea {
    text-transform: uppercase;
}

        </style>
    <title>CALENDARIO DE EVENTOS</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar -->
	    <aside class="sidebar-wrapper" data-simplebar="true">
      <?php require "includes/menuLateral.php"; /*php menu lateral*/ ?>
		</aside>
     <!--end sidebar -->

        <!--start top header-->
          <header class="top-header">
		  <?php 
		  
		  require "calendariodeeventos2/notificaciones.php"; /*php notificaciones*/ ?>
          </header>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		  <?php 	

	require "calendariodeeventos2/mapeo1.php"; /*php mapa*/ ?>
          </div>
          <!--end breadcrumb-->


          <div class="row">
            <div class="col-xl-12 mx-auto"> 
<?php

   /*require "calendariodeeventos2/expansores.php";*/
   $permisoVerCache = array();
   $puedeVerModulo = function ($permiso) use ($conexion, &$permisoVerCache) {
      if (!isset($permisoVerCache[$permiso])) {
         $permisoVerCache[$permiso] = ($conexion->variablespermisos('', $permiso, 'ver') == 'si');
      }

      return $permisoVerCache[$permiso];
   };

   if($puedeVerModulo('EVENTOS1')){
      require "calendariodeeventos2/EVENTOS1.php";
   }

   if($puedeVerModulo('EVENTO_CONTRATO')){
      require "calendariodeeventos2/CONTRATO.php";
   }

   if($puedeVerModulo('COTIZACION_CLIENTES')){
      require "calendariodeeventos2/COTIZACION_CLIENTES.php";
   }

   if($puedeVerModulo('COTIZACION_PRO')){
      require "calendariodeeventos2/COTIZACION_PROVEEDORES.php";
   }

   if($puedeVerModulo('COBROS_CLIENTE')){
      require "calendariodeeventos2/COBROS_CLIENTE.php";
   }

   if($puedeVerModulo('VEHIEVE')){
      require "calendariodeeventos2/VEHICULOS.php";
   }

   if($puedeVerModulo('MATEEVE')){
      require "calendariodeeventos2/MATERIALYEQUIPO.php";
   }

   if($puedeVerModulo('PAPEEVE')){
      require "calendariodeeventos2/PAPELERIA.php";
   }

   if($puedeVerModulo('OFICINA')){
      require "calendariodeeventos2/EQUIPOOFICINA.php";
   }

   if($puedeVerModulo('BOTIQUIN')){
      require "calendariodeeventos2/BOTIQUIN.php";
   }

   if($puedeVerModulo('MENSAJERIA')){
      require "calendariodeeventos2/MENSAJERIA.php";
   }

   if($puedeVerModulo('MENSAJERIA2')){
      require "calendariodeeventos2/fetch_page_mensajeria.php";
   }

   if($puedeVerModulo('DOCUMENTO_NUEVO_CIERRE')){
      require "calendariodeeventos2/DOCUMENTO_NUEVO_CIERRE.php";
   }

   if($puedeVerModulo('DOCUMENTO_CIERRE')){
      require "calendariodeeventos2/CIERRE.php";
   }

   if($puedeVerModulo('FEE_COBRADO')){
      require "calendariodeeventos2/FEE_COBRADO.php";
   }

   if($puedeVerModulo('PAGOS_INGRESOS22')){
      require "calendariodeeventos2/PAGOS_INGRESOS.php";
   }

   if($puedeVerModulo('OTROS_INGRESOS')){
      require "calendariodeeventos2/PAGOS_EGRESOS.php";
   }

   if($puedeVerModulo('PAGOS_EGRESOSBOTON') && $var_bloquea_fecha=='no'){
      require "calendariodeeventos2/fetch_page_botton.php";
   }

   if($puedeVerModulo('PORCENTAJE')){
      require "calendariodeeventos2/PORCENTAJEVENDEDOR.php";
   }

   if($puedeVerModulo('PAGOS_EGRESOSCG')){
      require "calendariodeeventos2/fetch_page_nuevoCOM.php";
   }

   if($puedeVerModulo('PAGOS_EGRESOSPP')){
      require "calendariodeeventos2/fetch_page_nuevo.php";
   }

   if($puedeVerModulo('nuevotodos')){
      require "calendariodeeventos2/fetch_page_nuevotodospp.php";
   }

   require "calendariodeeventos2/class.epcinnTIKETSYAVION.php";
   $pagoproveedores = new TIKETSYAVION();

   if($puedeVerModulo('PAGOS_BOLETOS_AVION') && $var_bloquea_fecha=='no'){
      require "calendariodeeventos2/avion.php";
   }

   if($puedeVerModulo('PAGOS_BOLETOS_AVIONFILTRO')){
      require "calendariodeeventos2/fetch_page_nuevo_AVION.php";
   }

   if($puedeVerModulo('PAGOS_EGRESOS') && $var_bloquea_fecha=='no'){
      require "calendariodeeventos2/tickets.php";
   }

   if($puedeVerModulo('PAGOS_EGRESOSFILTRO')){
      require "calendariodeeventos2/fetch_page_nuevo_TIKETS.php";
   }

   if($puedeVerModulo('CIERRE')){
      require "calendariodeeventos2/RESUMEN_INGRESOS_EGRESOS2.php";
   }

   if($puedeVerModulo('FACTURACION_CLIENTES')){
      require "calendariodeeventos2/RESUMEN_INGRESOS_EGRESOS3.php";
   }

   if($puedeVerModulo('FACTURACION_OTROS')){
      require "calendariodeeventos2/RESUMEN_INGRESOS_EGRESOSOTROS.php";
   }

   if($puedeVerModulo('PROGRAMA_OPERATIVO')){
      require "calendariodeeventos2/PROGRAMA_OPERATIVO.php";
   }

   if($puedeVerModulo('ROOMING')){
      require "calendariodeeventos2/ROOMING.php";
   }

   if($puedeVerModulo('CRONOLOGICO_TRANSPORTACION')){
      require "calendariodeeventos2/CRONOLOGICO_TRANSPORTACION.php";
   }

   if($puedeVerModulo('CRONOLOGICO_VUELOS')){
      require "calendariodeeventos2/CRONOLOGICO_VUELOS.php";
   }

   if($puedeVerModulo('PERSONAL')){
      require "calendariodeeventos2/PERSONAL.php";
   }

   if($puedeVerModulo('PERSONALNUEVO')){
      require "calendariodeeventos2/PERSONAL2.php";
   }

   if($puedeVerModulo('RESUMENPERSONAL')){
      require "calendariodeeventos2/RESUMENPERSONAL.php";
   }

 ?>

 
            </div>
          </div>
             

          </div>
          <!-- end page content-->
         </div>
         


         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->
  
         <!--start switcher-->
         <div class="switcher-body">
		 <?php require "includes/coloresEncabezado.php"; ?>
         </div>
         <!--end switcher-->


         <!--start overlay-->
          <div class="overlay"></div>
         <!--end overlay-->

     </div>
  <!--end wrapper-->

  <!--end wrapper-->

    <!-- JS Files-->
     <script defer src="https://code.angularjs.org/1.8.3/angular.min.js"></script>
    <script defer src="js/jspdf.umd.min.js"></script> 
    <script defer src="js/html2canvas.min.js"></script> 
    <script defer src="js/convertir.js"></script>                
    <script defer src="html2pdf.bundle.min.js"></script>
    <script defer src="colaboradores/script.js"></script> 
	<?php require "includes/convertirma.php"; ?>
	<?php require "calendariodeeventos2/scriptAE.php"; ?>
  <script defer src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script defer src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script defer src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script defer src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script defer src="assets/js/main.js"></script>


  </body>
</html>