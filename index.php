<?php
//index.php
//listadoclientes.php
// listadoclientes/listadoP.php
// listadoclientes/fetch_pagesLP.php
// listadoclientes/controladorLP.php
// listadoclientes/class.epcinnLP.php
// listadoclientes/scriptLP.php
// listadoclientes/scriptLP.php
// login.class.proveedor.php
// login.class.colaborador.php

date_default_timezone_set('America/Mexico_City');
 $resultado = '';
if (!isset($_SESSION)) {
	session_start();
}

$salir = isset($_GET["salir"]) ? $_GET["salir"]:"";
if($salir=='1'){
unset($_SESSION["logeado"]);
unset($_SESSION);
session_destroy();
}
/*

*/
$_SESSION["pagina"] = 'index.php';
?><!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style29.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

        <style type="text/css">
.fondo1aa {
  background: linear-gradient(aquamarine, #fff);
  background-repeat: no-repeat;
}
</style>

		<link rel="shortcut icon" href="includes/captcha/images/epc.ico" />
		
		<!-- CSS style 
		<link rel="stylesheet" type="text/css" href="includes/captcha/css/ajax-contact-form.css" />-->
		
		<!-- Font awesome-->
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />	 	
		
		<!-- jQuery -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		
		<!-- Ajax Contact Form JS -->
		<script type="text/javascript" src="includes/captcha/js/jquery.ajax-contact-form.js"></script>	

  <title>LOGIN CRM</title>
</head>
<?php 
  $fondos = array("fondo1","fondo2","fondo6","fondo7","fondo16","fondo11","fondo12","fondo13","fondo14","fondo15","fondo16","fondo17","fondo18"); 
  $num = rand(0,12); 
    $num2 = rand(0,12); 
 ///$num = rand(9,10); 
//echo $fondos[$num];
//echo $fondos[$num2].'a';
  ?>
<body class="fondo1aa<?php //echo $fondos[$num2].'a'; ?>">
  <div class="login-bg-overlay <?php echo $fondos[$num]; ?>" >dd</div>

  <!--start wrapper-->
<div class="wrapper" style="min-height:100vh;">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white p-3"> 
     <!--<nav class="" style="height:35px;background-image: none;">	--> 
<?php
//echo $fondos[$num];
//echo $resultado;
?>
      </nav>
    </header>
    <div class="container" style="background-color: transparent; ">
      <div class="row" style="background-color: transparent; ">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto" style="background-color: transparent;	margin-top: 15px;">
          <div class="card radius-10" style="background-color: transparent; border:1px solid palegray; backdrop-filter: blur(15px);">
            <div class="card-body p-4" style="background-color: transparent; ">
              <div class="text-center" style="background-color: #fff; ">
				<img style="width:360px" src="todos_logos.jpg">
              </div>
			  
			  
					<!-- Notification -->
					<?php if(strlen($_SESSION['error'])>=1){ ?>
					<div class="notification canhide">
						<div class="wrapper">
							<div class="inner"><strong  style="text-shadow: 1px 1px white;"><?php echo $_SESSION['error']; ?></strong></div>
						</div>
					</div>				  
					<?php } ?>
					
              <form class="form-body row g-3" method="post" action="validasession.php" style="background-color: transparent; ">
                <div class="col-12 col-lg-12">
                  <div class="d-grid gap-2">
					<!--sin autenticacion externa-->
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="position-relative border-bottom my-3">
                    <div class="position-absolute seperator-2 translate-middle-y"></div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputEmail" class="form-label"><strong style="text-shadow: 1px 1px white;">Usuario *</strong></label>
                  <input type="text" class="form-control" id="inputEmail" placeholder="Busca en tu correo el usuario" name="login">
                </div>
                <div class="col-12">
                  <label for="inputPassword" class="form-label"><strong style="text-shadow:1px 1px  white;">Password *</strong></label>
                  <input type="password" class="form-control" id="inputPassword" placeholder="Tu password" name="pass">
                </div>

		<div class="field">
			<label for="verify"><strong style="text-shadow: 1px 1px white;">Escribe el texto de la imagen *</strong></label>
			<div class="inputs">
				<div class="captcha">
					<img src="includes/captcha/captcha.php?SI=SI" class="captcha-img" alt="Verification" width="280" height="150" style="background-color: transparent; backdrop-filter: blur(20px);"/>
					<!--<i class="change-captcha" style="background-color:#ffe777;color:#576bfc;cursor:pointer;font-weight: bold;" title="Change Text">--><i class="change-captcha" style="cursor:pointer;" ><img src="includes/actualizar_png.png"  width="70" height="70" title="Change Text"/></i><!--</i>-->
					<br /><input class="form-control" type="text" id="verify" name="verify" placeholder="Escribe el texto de la imagen"/>
				</div>								
			</div>  
		</div>




              <!--<div class="col-12 col-lg-6">
                  <div class="form-check form-switch">

                  </div>
                </div>
                <div class="col-12 col-lg-6 text-end">

                </div>-->
				
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <input type="submit" class="btn btn-primary" name="guardar" value="Acceder"/>
                  </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end wrapper-->
    <footer  style="bottom:0;top:0;
	text-align:center; 
	height: 100%;
	background-color: white; 
	backdrop-filter: blur(15px); "><strong>EVENTOS PROMOCIONES Y CONVENCIONES.
Insurgentes Sur 1377 - 3 Col. Insurgentes Mixcoac Benito Juárez, CDMX, México C.P. 03920</strong></footer>

</body>

</html>