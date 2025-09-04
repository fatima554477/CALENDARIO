<?php 
/*$_SESSION['id_para_contacto']='';
$_SESSION['tabla_para_contacto']='';
$_SESSION['id_BUSQUEDA']='';
$_SESSION['telefonos']='';
$_SESSION['id_vehiculos']='';*/
?>

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar42" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar42" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; MENSAJERIA</p></strong></div>


<div  id="mensajeMENSAJERIA2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target42" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
                <?php if($conexion->variablespermisos('','MENSAJERIA','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="MENSAJERIAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped" id='actualizacalculosmensajeria'>

                      <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">No. DE EVENTO:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NUMERO_EVENTO; ?>"  name="NUMERO_EVENTO"  placeholder="" readonly="readonly"></td>
         </tr>             
	 
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE SOLICITUD:</label></th>
         <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo date('Y-m-d'); ?>"   name="MENSAJERIA_SOLICITUD"  placeholder=""  readonly="readonly"></td>
         </tr>
              
          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA A REALIZARSE 1:</label></th>
         <td>
<div>
 <input type="date" class="form-control"    required=""   value="<?php echo $MENSAJERIA_REALIZARCE; ?>"  name="MENSAJERIA_REALIZARCE"  placeholder="">
 </div>
 </td>
         </tr>
		 
		 
		           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA A REALIZARSE 2:</label></th>
         <td>

 <input type="date" class="form-control"    required=""   value="<?php echo $MENSAJERIA_OBSERVACIONES; ?>"  name="MENSAJERIA_OBSERVACIONES"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">RANGO DE HORARIOS PARA ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_HORARIOS; ?>"  name="MENSAJERIA_HORARIOS"  placeholder="">

 </td>
         </tr>


                 <tr style="background:#ebf8fa">
    <th style="text-align:left" scope="col">NOMBRE DEL SOLICITANTE:</th>
       <td>
<?php
$encabezadoA = '';
$queryper = $conexion->colaborador_generico_bueno();
$encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_SOLICITANTE" required="" name="MENSAJERIA_SOLICITANTE" onchange="celsolicitante();" placeholder="SELECIONA UNA OPCIÓN">
<option> SELECIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;
$option29 = '';
while($row = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if ($_SESSION['idem']==$row['idRelacion']){
$select='selected';
}

$option29 .= '<option style="background: #'.$fondos[$num].'" '.$select.' 
value="'.$row['aliasid'].'^^'.$row['NOMBRE_1'].'^^'.$row['APELLIDO_PATERNO'].'">'.$row['NOMBRE_1'].' '.$row['APELLIDO_PATERNO'].
'</option>';
}
echo $encabezadoA.$option29.'</select>';	
//^
?></td>

    </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO DE CEL DEL SOLICITANTE:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="CORREO_1" value="<?php
 
 $idem22 = $_SESSION['idem'];
 $MENSAJERIA_CEL_SOLICITANTE = $conexion->variablesusuario($idem22);
 //$row_cel = mysqli_fetch_array($MENSAJERIA_CEL_SOLICITANTE,mysqli_both);
 echo $MENSAJERIA_CEL_SOLICITANTE['CORREO_3']; ?>"  name="MENSAJERIA_CEL_SOLICITANTE"  placeholder="">
 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CANTIDAD DE OBJETOS A RECOGER:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_OBJETOSARECOJER; ?>"  name="MENSAJERIA_OBJETOSARECOJER"  placeholder="">

 </td>
         </tr>


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">MEDIDAS APROXIMADAS DE LOS OBJETOS:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_MEDIDASAPROX; ?>"  name="MENSAJERIA_MEDIDASAPROX"  placeholder="">

 </td>
         </tr>


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CONTENIDO DEL ENVIO:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_CONTENIDO; ?>"  name="MENSAJERIA_CONTENIDO"  placeholder="">

 </td>
         </tr>

          <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOTA IMPORTANTE: DEBERAN ENTREGAR JUNTO CON LA SOLICITUD DE MENSAJERIA UN INVENTARIO<br> COMPLETO DE LO QUE SE VA A ENTREGAR O RECOLECTAR</label></th>
         <td>

 <input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_ENTREGARSOLICITUD; ?>"  name="MENSAJERIA_ENTREGARSOLICITUD"  placeholder="" >

 </td>
         </tr>


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ADJUNTAR FOTOS:</label></th>
         <td>

 <input type="file" class="form-control"    required=""   value="<?php echo $MENSAJERIA_FOTOS; ?>"  name="MENSAJERIA_FOTOS"  placeholder="">

 </td>
</tr>
 
     <tr >
      <th style="background:#ebf8fa; text-align:left" >DIRECCIÓN DE EMPRESAS (ENVIA):</th>
    <td  style="background:#ebf8fa" id="direccion" ><?php
$encabezado = '';
$queryper = $conexion->lista_plantillaempresacontrasenas();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_EMPRESA_LUGAR" required="" name="MENSAJERIA_EMPRESA_LUGAR" onchange="direccion();" placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';

$option33='';
$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{


if($num==8){$num=0;}else{$num++;}

$select='';
if($MENSAJERIA_EMPRESA_LUGAR==$row1['NFE_INFORMACION']){$select = "selected";};

$option33 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'^^^'.$row1['NFE_INFORMACION'].'">'.$row1['NFE_INFORMACION'].'</option>';
}
echo $encabezado.$option33.'</select>';		
?></td>

    </tr>

     <tr>
      <th style="background:#ebf8fa; text-align:left" >DIRECCIÓN DE PROVEEDORES (ENVIA):</th>
    <td  style="background:#ebf8fa" id="direccionP" ><?php
$encabezado = '';$option95='';
$queryper = $conexion->lista_proveedormensajeria();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_SELECCIONAR" required="" name="MENSAJERIA_SELECCIONAR" onchange="direccionP();" placeholder="SELECIONA UNA OPCIÓN">
<option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row2 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($MENSAJERIA_EMPRESA_LUGAR==$row1['P_NOMBRE_FISCAL_RS_EMPRESA']){$select = "selected";}; epc(*)125

$option95 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row2['id'].'^^^'.$row2['P_NOMBRE_FISCAL_RS_EMPRESA'].'">'.$row2['P_NOMBRE_FISCAL_RS_EMPRESA'].'</option>';
}
echo $encabezado.$option95.'</select>';		
?></td>

    </tr>

     <tr>
      <th style="background:#ebf8fa; text-align:left" >DIRECCIÓN DE CLIENTES (ENVIA):</th>
    <td  style="background:#ebf8fa" id="direccionC" ><?php
$encabezado = '';
$queryper = $conexion->lista_clientesmensajeria();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_EMPRESADIRE" required="" name="MENSAJERIA_EMPRESADIRE" onchange="direccionC();" placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;
$option55 ='';
while($row3 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($MENSAJERIA_EMPRESADIRE==$row3['C_NOMBRE_FISCAL_RS_EMPRESA']){$select = "selected";};

$option55 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row3['id'].'^^^'.$row3['C_NOMBRE_FISCAL_RS_EMPRESA'].'">'.$row3['C_NOMBRE_FISCAL_RS_EMPRESA'].'</option>';
}
echo $encabezado.$option55.'</select>';		
?></td>

    </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">EDICIO:</label></th>
         <td>

 <input type="text" class="form-control"  id="ED_INFORMACION"  required=""   value="<?php echo $MENSAJERIA_EDIFICIO; ?>"  name="MENSAJERIA_EDIFICIO"  placeholder="">

 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CALLE:</label></th>
         <td>

 <input type="text" class="form-control"  id="CA_INFORMACION"  required=""   value="<?php echo $MENSAJERIA_CALLE; ?>"  name="MENSAJERIA_CALLE"  placeholder="">
 </div>

         </tr>   

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO EXTERIOR:</label></th>
         <td>

 <input type="text" class="form-control" id="NE_INFORMACION"   required=""   value="<?php echo $MENSAJERIA_NUMEROE; ?>"  name="MENSAJERIA_NUMEROE"  placeholder="">

 </td>
       
	   </tr>   
         
		 <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO INTERIOR:</label></th>
         <td>

 <input type="text" class="form-control"   id="NI_INFORMACION"   required=""   value="<?php echo $MENSAJERIA_NINTERIOR; ?>"  name="MENSAJERIA_NINTERIOR"  placeholder="">

 </td>
         </tr>    


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO DE OFICINA:</label></th>
         <td>

 <input type="text" class="form-control"   id="NDO_INFORMACION"   required=""   value="<?php echo $MENSAJERIA_NOFICINA; ?>"  name="MENSAJERIA_NOFICINA"  placeholder="">

 </td>
         </tr>  


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">COLONIA:</label></th>
         <td>

 <input type="text" class="form-control"   id="COL_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_COLONIA; ?>"  name="MENSAJERIA_COLONIA"  placeholder="">

 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ALCALDIA:</label></th>
         <td>

 <input type="text" class="form-control"  id="AL_INFORMACION"      required=""   value="<?php echo $MENSAJERIA_ALCALDIA; ?>"  name="MENSAJERIA_ALCALDIA"  placeholder="">

 </td>
         </tr>     

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">C.P.</label></th>
         <td>

 <input type="text" class="form-control"  id="CP_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_CP; ?>"  name="MENSAJERIA_CP"  placeholder="">

 </td>
         </tr>     

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CIUDAD:</label></th>
         <td>

 <input type="text" class="form-control"   id="CIU_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_CIUDAD; ?>"  name="MENSAJERIA_CIUDAD"  placeholder="">

 </td>
         </tr>  


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ESTADO:</label></th>
         <td>

 <input type="text" class="form-control"   id="ES_INFORMACION"   required=""   value="<?php echo $MENSAJERIA_ESTADO; ?>"  name="MENSAJERIA_ESTADO"  placeholder="">

 </td>
         </tr>  


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">PAIS:</label></th>
         <td>

 <input type="text" class="form-control"    id="PA_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_PAIS; ?>"  name="MENSAJERIA_PAIS"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">UBICACIÓN EN EL MAPA:</label></th>
         <td>

 <input type="text" class="form-control"    id="P_UBICACION_MAPA_EPC"   required=""   value="<?php echo $MENSAJERIA_UBICACION; ?>"  name="MENSAJERIA_UBICACION"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TELEFONO 1:</label></th>
         <td>

 <input type="text" class="form-control"    id="TEL_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_TELEFONO1; ?>"  name="MENSAJERIA_TELEFONO1"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TELEFONO 2:</label></th>
         <td>

 <input type="text" class="form-control"    id="TEL2_INFORMACION"    required=""   value="<?php echo $MENSAJERIA_TELEFONO2; ?>"  name="MENSAJERIA_TELEFONO2"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DE QUIEN ENTREGA:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_NOMBREENTREGA; ?>"  name="MENSAJERIA_NOMBREENTREGA"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FIRMA DE QUIEN RECIBE:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_FIRMARECIBE; ?>"  name="MENSAJERIA_FIRMARECIBE"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE RECEPCIÓN:</label></th>
         <td><input type="date" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_FECHAR; ?>"  name="MENSAJERIA_FECHAR"  placeholder=""></td>
         </tr>
		 
         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE RECEPCIÓN:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_HORAR; ?>"  name="MENSAJERIA_HORAR"  placeholder="">

 </td>
         </tr>
		 
		 
     <tr>
      <th style="background:#ebf8fa; text-align:left" scope="col">DIRECCIÓN DE EMPRESAS (RECIBE):</th>
    <td  style="background:#ebf8fa" id="direccion2"><?php
$encabezado = '';$option66 ='';
$queryper = $conexion->lista_plantillaempresacontrasenas();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_LLEVARNOMBRE" required="" name="MENSAJERIA_LLEVARNOMBRE" onchange="direccion2();" placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row4 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($MENSAJERIA_LLEVARNOMBRE==$row4['NFE_INFORMACION']){$select = "selected";};

$option66 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row4['id'].'^^^'.$row4['NFE_INFORMACION'].'">'.$row4['NFE_INFORMACION'].'</option>';
}
echo $encabezado.$option66.'</select>';		
?></td>

    </tr>

     <tr>
      <th style="background:#ebf8fa; text-align:left" >DIRECCIÓN DE PROVEEDORES (RECIBE):</th>
    <td  style="background:#ebf8fa" id="direccionP2" ><?php
$encabezado = '';$option91='';
$queryper = $conexion->lista_proveedormensajeria();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_SELECCIONARB" required="" name="MENSAJERIA_SELECCIONARB" onchange="direccionP2();" placeholder="SELECIONA UNA OPCIÓN">
<option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row2 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($MENSAJERIA_EMPRESA_LUGAR==$row1['P_NOMBRE_FISCAL_RS_EMPRESA']){$select = "selected";}; epc(*)125

$option91 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row2['id'].'^^^'.$row2['P_NOMBRE_FISCAL_RS_EMPRESA'].'">'.$row2['P_NOMBRE_FISCAL_RS_EMPRESA'].'</option>';
}
echo $encabezado.$option91.'</select>';		
?></td>

    </tr>
 
     <tr>
      <th style="background:#ebf8fa; text-align:left" scope="col">DIRECCIÓN DE CLIENTES (RECIBE):</th>
    <td  style="background:#ebf8fa" id="direccionC2"><?php
$encabezado = '';$option88='';
$queryper = $conexion->lista_clientesmensajeria();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_DIRECCIONB" required="" name="MENSAJERIA_DIRECCIONB" onchange="direccionC2();" placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row666 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($MENSAJERIA_DIRECCIONB==$row666['C_NOMBRE_FISCAL_RS_EMPRESA']){$select = "selected";};

$option88 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row666['id'].'^^^'.$row666['C_NOMBRE_FISCAL_RS_EMPRESA'].'">'.$row666['C_NOMBRE_FISCAL_RS_EMPRESA'].'</option>';
}
echo $encabezado.$option88.'</select>';		
?></td>

    </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">EDIFICIO:</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="ED_INFORMACION2"  value="<?php echo $MENSAJERIA_EDIFICIOB; ?>"  name="MENSAJERIA_EDIFICIOB"  placeholder="">
 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CALLE:</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="CA_INFORMACION2" value="<?php echo $MENSAJERIA_CALLEB; ?>"  name="MENSAJERIA_CALLEB"  placeholder="">

 </td>
         </tr>   

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO EXTERIOR:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="NE_INFORMACION2"  value="<?php echo $MENSAJERIA_NUMEROEB; ?>"  name="MENSAJERIA_NUMEROEB"  placeholder="">

 </td>
         </tr>   

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO INTERIOR:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="NI_INFORMACION2"  value="<?php echo $MENSAJERIA_NINTERIORB; ?>"  name="MENSAJERIA_NINTERIORB"  placeholder="">

 </td>
         </tr>    


         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO DE OFICINA:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="NDO_INFORMACION2"  value="<?php echo $MENSAJERIA_NOFICINAB; ?>"  name="MENSAJERIA_NOFICINAB"  placeholder="">
 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">COLONIA:</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="COL_INFORMACION2" value="<?php echo $MENSAJERIA_COLONIAB; ?>"  name="MENSAJERIA_COLONIAB"  placeholder="">

 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ALCALDIA:</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="AL_INFORMACION2" value="<?php echo $MENSAJERIA_ALCALDIAB; ?>"  name="MENSAJERIA_ALCALDIAB"  placeholder="">

 </td>
         </tr>     

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">C.P.</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="CP_INFORMACION2" value="<?php echo $MENSAJERIA_CPB; ?>"  name="MENSAJERIA_CPB"  placeholder="">

 </td>
         </tr>     

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CIUDAD:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="CIU_INFORMACION2"  value="<?php echo $MENSAJERIA_CIUDADB; ?>"  name="MENSAJERIA_CIUDADB"  placeholder="">

 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ESTADO:</label></th>
         <td>

 <input type="text" class="form-control"    required=""  id="ES_INFORMACION2" value="<?php echo $MENSAJERIA_ESTADOB; ?>"  name="MENSAJERIA_ESTADOB"  placeholder="">

 </td>
         </tr>  

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">PAIS:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="PA_INFORMACION2"  value="<?php echo $MENSAJERIA_PAISB; ?>"  name="MENSAJERIA_PAISB"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">UBICACIÓN EN EL MAPA:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="P_UBICACION_MAPA_EPC2"  value="<?php echo $MENSAJERIA_UBICACIONB; ?>"  name="MENSAJERIA_UBICACIONB"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TELEFONO 1:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="TEL_INFORMACION2"  value="<?php echo $MENSAJERIA_TELEFONO1B; ?>"  name="MENSAJERIA_TELEFONO1B"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TELEFONO 2:</label></th>
         <td>

 <input type="text" class="form-control"    required="" id="TEL2_INFORMACION2"  value="<?php echo $MENSAJERIA_TELEFONO2B; ?>"  name="MENSAJERIA_TELEFONO2B"  placeholder="">

 </td>
         </tr>
		
                 <tr style="background:#ebf8fa">
    <th style="text-align:left" scope="col">NOMBRE DE LA PERSONA A QUIEN SE <br>LE VA A ENTREGAR (CONTACTOS)</th>


	<td id="resetea_NOMBREPERSONAB">
<?php
$encabezado = '';$option99='';
$queryper = $altaeventos->lista_contactos();
$encabezado = '<select class="form-select mb-3" id="MENSAJERIA_NOMBREPERSONAB" required="" name="MENSAJERIA_NOMBREPERSONAB" onchange="obtenercelularContacto();" placeholder="SELECIONA UNA OPCIÓN">
<option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row6 = mysqli_fetch_array($queryper))
{
	if($num==8){$num=0;}else{$num++;}

$select='';

$option99 .= '<option style="background: #'.$fondos[$num].'" '.$select.' 
value="'.$row6['id'].'^^^'.$row6[$_SESSION['contactos']].'">'.$row6[$_SESSION['contactos']].' '.$row6[$_SESSION['telefonos']].'</option>';
}
echo $encabezado.$option99.'</select>';		
?>

 <!--<input type="text" class="form-control" id="NOMBREPERSONAB" required="" value="<?php echo $MENSAJERIA_NOMBREPERSONAB; ?>" name="MENSAJERIA_NOMBREPERSONAB" placeholder="">-->
 </td>
         </tr>




         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO DE CEL DE LA PERSONA A QUIEN SE LE VA A ENTREGAR:</label></th>
         <td>

 <input type="text" class="form-control" id="NEMEROCELENTREGA" required="" value="<?php echo $MENSAJERIA_NEMEROCELENTREGA; ?>" name="MENSAJERIA_NEMEROCELENTREGA" placeholder="">
 </div>
 </td>
         </tr>



         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DE QUIEN RECIBE:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_NOMBREENTREGAB; ?>"  name="MENSAJERIA_NOMBREENTREGAB"  placeholder="">
 </div>
 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FIRMA DE QUIEN RECIBE:</label></th>
         <td>

 <input type="text" class="form-control"    required=""   value="<?php echo $MENSAJERIA_FIRMARECIBEB; ?>"  name="MENSAJERIA_FIRMARECIBEB"  placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE RECEPCIÓN:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_FECHARB; ?>"  name="MENSAJERIA_FECHARB"  placeholder=""></td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE RECEPCIÓN:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_HORARB; ?>"  name="MENSAJERIA_HORARB"  placeholder="">

 </td>
         </tr>

           <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">INSTRUCCIONES O COMENTARIOS ADICIONALES:</label></th>
         <td>

 <textarea  type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_INSTRUCCIONES; ?>"  name="MENSAJERIA_INSTRUCCIONES"  placeholder=""></textarea>

 </td>
         </tr>

		   <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ADJUNTAR MENSAJERIA CON NOMBRE, FIRMA, FECHA Y HORA DE QUIEN RECIBIO:</label></th>
         <td>

 <input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_FIRMA; ?>"  name="MENSAJERIA_FIRMA" placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">ADJUNTAR FOTOS EN CASO DE SER NECESARIO:</label></th>
         <td>

 <input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_FOTOSNECES; ?>"  name="MENSAJERIA_FOTOSNECES" placeholder="">

 </td>
         </tr>

         <tr style="background:#ebf8fa" > 
         <th scope="row"> <label for="validationCustom03" class="form-label">ADJUNTAR OTRO ARCHIVO RELACIONADO CON ESTA MENSAJERIA:</label></th>
         <td>

 <input type="file" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_ARCHIVORELACIONADO; ?>"  name="MENSAJERIA_ARCHIVORELACIONADO" placeholder="">

 </td>
         </tr>

		<tr style="background:#ebf8fa"   > 
         <th scope="row"> <label for="validationCustom03" class="form-label">VEHÍCULO USADO PARA ESTA MENSAJERÍA:</label></th>
         <td>

                        <span>
<?php
$encabezado = '';$option45 = '';
//$queryper = $altaeventos->lista_plantillaventavehi();


if($conexion->variablespermisos('','vervehiculo','ver')=='si'){
$queryper = $conexion->lista_plantillaventavehi_todos();
}else{
$queryper = $conexion->lista_plantillaventavehi();
}

$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_VEHICULOM" required="" name="MENSAJERIA_VEHICULOM" onchange="obtenervehiculo();">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($MENSAJERIA_VEHICULOM==$row1['SUBMARCAV']){$select = "selected";};

$option45 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'(!)'.$row1['SUBMARCAV'].'">'.$row1['SUBMARCAV'].'</option>';
}
echo $encabezado.$option45.'</select>';		
?>
</span>

 </td>                        
         </tr>

		<tr style="background:#ebf8fa"   > 
         <th scope="row"> <label for="validationCustom03" class="form-label">CONCEPTO DEL COSTO DEL VEHÍCULO:</label></th>
         <td id="reset_MENSAJERIA_VEHICULOM">

                        <span>
<?php
$encabezado = '';
$queryper = $altaeventos->lista_costovehiculo();
$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="MENSAJERIA_REALIZADOPOR" required="" name="MENSAJERIA_REALIZADOPOR" onchange="costovehiculo()">
<option value="">SELECCIONA UNA OPCIÓN</option>';

$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row1 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
if($MENSAJERIA_REALIZADOPOR==$row1['DOCUMENTO_MENSAJERIA']){$select = "selected";};

$option111 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['id'].'(|)'.$row1['DOCUMENTO_MENSAJERIA'].'">'.$row1['DOCUMENTO_MENSAJERIA'].'</option>';
}
echo $encabezado.$option111.'</select>';		
?>
</span>

 </td>                        
         </tr>

		 <tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO DEL VEHÍCULO PARA ESTA MENSAJERÍA:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="COSTO" required="" value="<?php echo number_format($MENSAJERIA_COSTOCAMIONETA,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_COSTOCAMIONETA')" name="MENSAJERIA_COSTOCAMIONETA" placeholder=""   readonly="readonly">

 </td>
         </tr>
   

         <tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO DE GASOLINA:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MENSAJERIA_COSTOGASOLINA" required="" value="<?php echo number_format($MENSAJERIA_COSTOGASOLINA,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_COSTOGASOLINA')" name="MENSAJERIA_COSTOGASOLINA" placeholder="">
 </div>
 </td>
         </tr>


         <tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTO DE CASETAS:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MENSAJERIA_COSTOCASETAS" required="" value="<?php echo number_format($MENSAJERIA_COSTOCASETAS,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_COSTOCASETAS')" name="MENSAJERIA_COSTOCASETAS" placeholder="">
 </div>
 </td>
         </tr>

         <tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTOS DE ESTACIONAMIENTOS:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MENSAJERIA_COSTOESTACIONAMIENTO" required="" value="<?php echo number_format($MENSAJERIA_COSTOESTACIONAMIENTO,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_COSTOESTACIONAMIENTO')" name="MENSAJERIA_COSTOESTACIONAMIENTO" placeholder="">
 </div>
 </td>
         </tr>




         <tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">COSTOS DE OTROS GASTOS:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MENSAJERIA_COSTOGASTOS" required="" value="<?php echo number_format($MENSAJERIA_COSTOGASTOS,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_COSTOGASTOS')" name="MENSAJERIA_COSTOGASTOS" placeholder="">
 </div>
 </td>
         </tr>
        




         <tr style="background:#ebf8fa"> 
         <th  scope="row">  <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MENSAJERIA_TOTAL" required="" value="<?php echo number_format($MENSAJERIA_TOTAL,2,'.',','); ?>" onkeyup="comasainput('MENSAJERIA_TOTAL')" name="MENSAJERIA_TOTAL" placeholder="">
 </div>
 </td>
         </tr>
         

        
            <tr style="background:#ebf8fa">     
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""   value="<?php echo $MENSAJERIA_OBSERVA; ?>"  name="MENSAJERIA_OBSERVA" placeholder="">
 </div>
 </td>
         </tr>

                  </table>
				  
				  
				  <table>
				  
				  <tr>


   
 
                                    
    <input type="hidden" value="HMENSAJERIA" name="HMENSAJERIA"/>     
 
        
        
 <td >
  <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="MENSAJERIA_TOTAL_actualiza" >ACTUALIZA CANTIDADES</button> </td>   
      

 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="GUARDAR_MENSAJERIA" name="GUARDAR_MENSAJERIA">GUARDAR</button><div style="
    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);
	@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 100; }
}"


 id="mensajeMENSAJERIA"/></td> <?php } ?>
 
 </tr>
           
                   </table>

                  </form>
				  
				  
 <?php if($conexion->variablespermisos('','MENSAJERIA','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>               
			<form name="form_emai_MENSAJERIA" id="form_emai_MENSAJERIA">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_MENSAJERIA" id="EMAIL_MENSAJERIA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_MENSAJERIA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_MENSAJERIA">ENVIAR POR EMAIL</button></td> <?php } ?>  
	
			</tr>
			</table>

			</form>


</div>
</div> 
</div>


