<?php
$puedeVerAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'ver') === 'si');
$puedeGuardarAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'guardar') === 'si');
$puedeModificarAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'modificar') === 'si');
$puedeVerVYO2 = ($conexion->variablespermisos('', 'PERSOvyo2', 'ver') === 'si');
$puedeGuardarVYO2= ($conexion->variablespermisos('', 'PERSOvyo2', 'guardar') === 'si');
$puedeModificarVYO2 = ($conexion->variablespermisos('', 'PERSOvyo2', 'modificar') === 'si');
$puedeVerDIRECCION2 = ($conexion->variablespermisos('', 'PERSOdire2', 'ver') === 'si');
$puedeGuardarDIRECCION2 = ($conexion->variablespermisos('', 'PERSOdire2', 'guardar') === 'si');
$puedeModificarDIRECCION2 = ($conexion->variablespermisos('', 'PERSOdire2', 'modificar') === 'si');
$puedeVerRechazoBono2 = ($conexion->variablespermisos('', 'rechazobono2', 'ver') === 'si');

$puedeGuardarRechazoBono2 = ($conexion->variablespermisos('', 'rechazobono2', 'guardar') === 'si');

$puedeModificarRechazoBono2 = ($conexion->variablespermisos('', 'rechazobono2', 'modificar') === 'si');

// Esta variante permite seleccionar el evento antes de capturar al solicitante.
// El id viaja oculto para asociar el registro al evento elegido en el controlador.
$eventosPersonal2 = array();
$conexionEventosPersonal2 = $altaeventos->db();
$consultaEventosPersonal2 = mysqli_query(
    $conexionEventosPersonal2,
      "SELECT id, NUMERO_EVENTO, NOMBRE_EVENTO, FECHA_INICIO_EVENTO, FECHA_FINAL_EVENTO
     FROM 04altaeventos
     WHERE NUMERO_EVENTO IS NOT NULL AND NUMERO_EVENTO <> ''
     ORDER BY NUMERO_EVENTO"
);

if ($consultaEventosPersonal2) {
    while ($eventoPersonal2 = mysqli_fetch_array($consultaEventosPersonal2, MYSQLI_ASSOC)) {
        $eventosPersonal2[] = $eventoPersonal2;
    }
}

?>

<div id="content">   
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar180" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar180" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;PERSONAL QUE ASISTE AL EVENTO</p>
<div  id="mensajePERSONAL22"><div class="progress" style="width: 25%;">

									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCONTACTOSBODE; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCONTACTOSBODE; ?>%</div>
									
								</div></div>
								</strong>
	        <div id="target180" style="display:block;"  class="content2">
        <div class="card">
      <div  id='actualizabonos2'>
            

      
	<form class="row g-3 needs-validation was-validated" novalidate="" id="PERSONAL2form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
 
       


                        
              <table class="table mb-0 table-striped">
                    <tr>  
                               
                               <th style="text-align:center" scope="col"></th>
                               <th style="text-align:center" scope="col">INFORMACIÓN</th>
                    
                           
                               </tr>
<tr style="background:#fcf3cf">
<th scope="row"><label for="BUSCADOR_EVENTO_PERSONAL2" class="form-label">BUSCAR EVENTO:</label></th>
<td>
    <input
        type="search"
        class="form-control mb-3"
        id="BUSCADOR_EVENTO_PERSONAL2"
        list="LISTA_EVENTOS_PERSONAL2"
        placeholder="ESCRIBE EL NÚMERO O NOMBRE DEL EVENTO"
        autocomplete="off"
        required
    >
    <datalist id="LISTA_EVENTOS_PERSONAL2">
        <?php foreach ($eventosPersonal2 as $eventoPersonal2) { ?>
            <option
                value="<?php echo htmlspecialchars($eventoPersonal2['NUMERO_EVENTO'].' - '.$eventoPersonal2['NOMBRE_EVENTO'], ENT_QUOTES, 'UTF-8'); ?>"
                data-evento-numero="<?php echo htmlspecialchars($eventoPersonal2['NUMERO_EVENTO'], ENT_QUOTES, 'UTF-8'); ?>"
                data-evento-id="<?php echo (int) $eventoPersonal2['id']; ?>"
                               data-evento-nombre="<?php echo htmlspecialchars($eventoPersonal2['NOMBRE_EVENTO'], ENT_QUOTES, 'UTF-8'); ?>"

                data-evento-fecha-inicio="<?php echo htmlspecialchars((string) $eventoPersonal2['FECHA_INICIO_EVENTO'], ENT_QUOTES, 'UTF-8'); ?>"

                data-evento-fecha-final="<?php echo htmlspecialchars((string) $eventoPersonal2['FECHA_FINAL_EVENTO'], ENT_QUOTES, 'UTF-8'); ?>">

            </option>
        <?php } ?>
    </datalist>
    <div class="invalid-feedback">Selecciona un evento de los resultados de búsqueda.</div>
    <input type="hidden" id="NUMERO_EVENTO_PERSONAL2" name="NUMERO_EVENTO_PERSONAL2" value="">
    <input type="hidden" id="ID_EVENTO_PERSONAL2" name="ID_EVENTO_PERSONAL2" value="">
</td>
</tr>
<tr style="background:#fcf3cf">
<th scope="row"><label for="NOMBRE_EVENTO_PERSONAL2" class="form-label">NOMBRE DEL EVENTO:</label></th>
<td><input type="text" class="form-control" id="NOMBRE_EVENTO_PERSONAL2" name="NOMBRE_EVENTO_PERSONAL2" value="" readonly="readonly"></td>
</tr>
<tr style="background:#ebf8fa"> 
	
<th scope="row"> <label  for="validationCustom03" class="form-label">NOMBRE DEL SOLICITANTE:</label></th>
<td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $_SESSION["NOMBREUSUARIO"]; ?>" name="NOMBRE_DELINGRESO2" placeholder="NOMBRE DEL EJECUTIVO QUE INGRESO" readonly="readonly"></td>
</tr>	
	
	
<tr style="background:#ebf8fa">
    <th style="text-align:left" scope="col">PERSONAL QUE ASISTE AL EVENTO</th>
    <td>
        <?php
        $encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" 
                        id="NOMBRE_PERSONAL2" required name="NOMBRE_PERSONAL2" 
                        onchange="getemployee2();">
                       <option value="
					  " selected>SELECIONA UNA OPCIÓN</option>';

        $queryper = $altaeventos->lista_colaboradoreventos2();
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        $option29 = '';
        
        while($row = mysqli_fetch_array($queryper)) {
            $num = ($num == 8) ? 0 : $num + 1;
				$select='';
	        if($select = "selected");
			
			
            $option28 .= '<option style="background: #'.$fondos[$num].'" 
                          value="'.$row['idR'].'^^'.$row['NOMBRE_1'].'^^'.$row['NOMBRE_2'].'^^'.$row['APELLIDO_PATERNO'].'^^'.$row['APELLIDO_MATERNO'].'">
                          '.htmlspecialchars($row['NOMBRE_1'].' '.$row['NOMBRE_2'].' '.$row['APELLIDO_PATERNO'].' '.$row['APELLIDO_MATERNO']).'</option>';
        }
        
        echo $encabezadoA.$option28.'</select>';
        ?>
    </td>
</tr>
	
	
	
	
	
  
<tr>

    <th style="background:#eff9eb; text-align:left" scope="col">PUESTO:</th>
    <td  style="background:#eff9eb" id="obtener_puesto2">


	<?php 
	$_SESSION['NOMBRE_PERSONAL21'] = isset($_SESSION['NOMBRE_PERSONAL21'])?$_SESSION['NOMBRE_PERSONAL21']:'';
	
	echo str_replace('_',' ',$PUESTO_PERSONAL2 = $altaeventos->un_solo_colaborador2($_SESSION['NOMBRE_PERSONAL21'],'01empresa','PUESTO')); ?>
	

	
	</td>

    </tr>
    <tr>
    <th style="background:#eff9eb; text-align:left" scope="col">TELEFONO DE OFICINA:</th>
    <td  style="background:#eff9eb" id="obtener_cel2">
	
	<?php echo $WHAT_PERSONAL2 = $altaeventos->un_solo_colaborador2($_SESSION['NOMBRE_PERSONAL21'],'01empresa','CORREO_3'); ?>
	

	
	</td>

    </tr>
    <tr>
    <th style="background:#eff9eb; text-align:left" scope="col">EMAIL DE CONTACTO :</th>
    <td  style="background:#eff9eb" id="obtener_email2">
	
	<?php echo $EMAIL_PERSONAL2= $altaeventos->un_solo_colaborador2($_SESSION['NOMBRE_PERSONAL21'],'01empresa','CORREO_1'); ?>
		  

	
	</td>

    </tr>

    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA DE INICIO DE COORDINACIÓN:<br><a style="color:red;font:7px">obligatorio</a></th>
      <td  style="background:#f7edf8"><input type="date" class="form-control" id="FECHA_INICIO_PERSONAL2" required="" value="<?php echo htmlspecialchars((string) $FECHA_INICIO1, ENT_QUOTES, 'UTF-8'); ?>" name="FECHA_INICIO1"></td>


    </tr>
    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA FINAL DE COORDINACIÓN:<br><a style="color:red;font:7px">obligatorio</a></th>
   <td  style="background:#f7edf8"><input type="date" class="form-control" id="FECHA_FINAL_PERSONAL2" required="" value="<?php echo htmlspecialchars((string) $FECHA_FINAL1, ENT_QUOTES, 'UTF-8'); ?>" name="FECHA_FINAL1"></td>


    </tr>
	<?php if($conexion->variablespermisos('','PERSOVERBONO','ver')=='si' ){ ?>
    <tr>
	
    <th style="background:#eff9eb; text-align:left" scope="col">NÚMERO DE DIAS:</th>
<td style="background:#eff9eb">
  <div class="input-group">
    <input type="text" class="form-control" id="NUMERO_DIAS1"
           required value="<?php echo $NUMERO_DIAS1; ?>" name="NUMERO_DIAS1">

  </div>

</td>

    </tr>
	
	
	
	 	
 	 <tr style="background:#f7edf8; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">MONTO DEL BONO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_BONO1" required="" value="<?php echo number_format($MONTO_BONO1,2,'.',','); ?>" onkeyup="comasainput('MONTO_BONO1')" name="MONTO_BONO1" onclick="total_cantidad_x_precio8()">
 </div>
 </td>
         </tr>

         <tr style="background:#eff9eb; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL DEL BONO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_BONO_TOTAL1" required="" value="<?php echo number_format($MONTO_BONO_TOTAL1,2,'.',','); ?>" onkeyup="comasainput('MONTO_BONO_TOTAL1')" name="MONTO_BONO_TOTAL1" placeholder="">
 </div>
 </td>
         </tr>    

    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA DE PROGRAMACIÓN PAGO DE BONO:</th>
    <td  style="background:#f7edf8"><input type="date" class="form-control" id="fecha_ppago" required=""  value="<?php echo $FECHA_PPAGO1; ?>" name="FECHA_PPAGO1"></td>

    </tr>


		

    
    <tr>
<th style="background:#f7edf8; text-align:left" scope="col">MOTIVO DEL BONO:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OBSERVACIONES_PERSONAL2; ?>" name="OBSERVACIONES_PERSONAL2"></td>

    </tr> <?php } ?><tr>

           <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="PERSONAL2_FECHA_ULTIMA_CARGA">
           
           </td>
           </tr>
          </table>  
 
  
     
                     <input type="hidden" value="hDatosPERSONAL2" name="hDatosPERSONAL2"/>

<table>
  <tr> 

<th>
         



 <button style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="guardaPERSONAL2">GUARDAR</button><div style="

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
    1px 30px 60px rgba(16,16,16,0.4);"id="mensajePERSONAL2"> </th>  </tr>
           
           
            </table>
            </form>



<?php if($conexion->variablespermisos('','PERSONALNUEVO','email')=='si' and $var_bloquea_fecha=='no'){ ?>
 
            <form name="form_emai_personal2" id="form_emai_personal2">

              
          <tr>
                  
          <td><textarea placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES"  style="width:500px;px;" name="PERSONAL2_ENVIAR_IMAIL" id="PERSONAL2_ENVIAR_IMAIL" class="form-control" aria-label="With textarea"><?php echo $PERSONAL2_ENVIAR_IMAIL; ?></textarea></td><br></br>
          <th> <button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarimailPERSONAL2">ENVIAR POR EMAIL</button></th>  <?php } ?>  
                   
          </tr>
         

          <?php
          $querycontras = $altaeventos->listado_personal45();
          ?>
          
          <br />
          <div class='table-responsive'>
          <div align='right'>
          </div>
          <br />
          <div id='employee_table'>
          <tbody= 'font-style:italic;'>
          <table class="table table-striped table-bordered" style="width:100%"  id='reset_personal2' name='reset_personal2'>
          <tr style="text-align:center">
		   
               <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR V Y O<br>VER EVENTOS</th> 
			  
			   <?php if($puedeVerVYO2){ ?>
			   <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR V Y O<br>PAGO BONO</th> 
			     <?php } ?>
<?php if($puedeVerDIRECCION2){ ?>				 
               <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR DIRECCIÓN<br>PAGO BONO</th>
 <?php } ?>			   
		   <?php if($puedeVerAdmin2){ ?>
               <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR AUDITORÍA<br>PAGO BONO</th>
			   <?php } ?> 
  <?php if($puedeVerRechazoBono2){ ?>

  <th width="15%"style="background:#c9e8e8">RECHAZAR<br>PAGO BONO</th>

  <?php } ?>			   
          <th width="15%"style="background:#c9e8e8">ENVIAR <br>POR EMAIL</th>
			   <th width="20%" style="background:#c9e8e8">NÚMERO DE<br>EVENTO</th>
			   <th width="20%" style="background:#c9e8e8">NOMBRE DEL<br>EVENTO</th>
			   <th width="20%" style="background:#c9e8e8">NOMBRE DEL <br>SOLICITANTE</th>
               <th width="20%"style="background:#c9e8e8">NOMBRE</th>
               <th width="20%"style="background:#c9e8e8">PUESTO</th>
               <th width="20%"style="background:#c9e8e8">TELEFONO DE OFICINA</th>
               <th width="20%"style="background:#c9e8e8">EMAIL</th>
			  
               <th width="20%"style="background:#c9e8e8">FECHA DE INICIO<br> DE COORDINACIÓN</th>
               <th width="20%"style="background:#c9e8e8">FECHA FINAL <br>DE COORDINACIÓN</th>
			    	<?php if($conexion->variablespermisos('','PERSOVERBONO','ver')=='si' ){ ?>
               <th width="20%"style="background:#c9e8e8">NÚMERO <br>DE DÍAS</th>
               <th width="20%"style="background:#c9e8e8">MONTO <br>DE BONO</th>
               <th width="20%"style="background:#c9e8e8">TOTAL <br>DE BONO</th>

               <th width="20%"style="background:#c9e8e8">MOTIVO DEL BONO</th>
			
			                  <th width="20%"style="background:#c9e8e8">FECHA DE PROGRAMACIÓN<br> DE PAGO</th>
               <th width="20%"style="background:#c9e8e8">FORMA DE PAGO</th>
               <th width="20%"style="background:#c9e8e8">FORMA EFECTIVA DE PAGO</th>
               <th width="20%"style="background:#c9e8e8">COMPROBANTE DE PAGO</th>
               <th width="20%"style="background:#c9e8e8">PAX QUE COBRO</th>
			      <?php } ?>
               <th width="20%"style="background:#c9e8e8">FECHA DE <br>ÚLTIMA CARGA</th>
          </tr>
<?php
$urlADJUNTO_COMPROBANTE ='';
while($row = mysqli_fetch_array($querycontras))
{	
$filaRechazoBono2 = ((isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si') || (isset($row["STATUS_RECHAZOBONO"]) && $row["STATUS_RECHAZOBONO"]=='si'));
$montoBonoTotalAjustado2 = $filaRechazoBono2 ? 0 : (float)$row["MONTO_BONO_TOTAL1"];

	$motivoRechazoPersonal2 = $altaeventos->obtener_motivo_rechazo_personal($row["id"], 'personal2');
	$mostrarAgregarRechazoPersonal2 = ($filaRechazoBono2 && $motivoRechazoPersonal2 == '');
	$mostrarVerRechazoPersonal2 = ($filaRechazoBono2 && $motivoRechazoPersonal2 != '');

	$adjuntosComprobante = array_filter(array_map('trim', explode(',', $row["ADJUNTO_COMPROBANTE"])));
	if($row["ADJUNTO_COMPROBANTE"]=="" or $row["ADJUNTO_COMPROBANTE"]=='2' or empty($adjuntosComprobante)){
		$urlADJUNTO_COMPROBANTE = '';
	}else{
		$urlADJUNTO_COMPROBANTE = "<ul class='list-unstyled mb-0'>";
	foreach ($adjuntosComprobante as $adjuntoComprobante) {
			if ($adjuntoComprobante == '' || $adjuntoComprobante == '2') {
				continue;
			}
			$botonBorrarAdjunto = '';
	if ($puedeBorrarAdjuntoPersonal) {
				$botonBorrarAdjunto = " <button type='button' class='btn btn-link p-0 text-danger view_dataPERSONAL2adjuntoBorrar' data-personal='".$row["id"]."' data-archivo='".$adjuntoComprobante."'>Borrar</button>";
			}
			$urlADJUNTO_COMPROBANTE .= "<li class='d-flex align-items-center gap-2'><a target='_blank' href='includes/archivos/".$adjuntoComprobante."'>Visualizar!</a>".$botonBorrarAdjunto."</li>";
		}
		$urlADJUNTO_COMPROBANTE .= "</ul>";

	}

?>
              <tr style="background:<?php echo $filaRechazoBono2 ? '#ff3c22' : '#f5f9fc'; ?>;text-align:center">

		  
          <td style="text-align:center" >
		  
<input type="checkbox" style="width:40PX;" class="form-check-input" id="pasarapersonal2<?php echo $row["id"]; ?>" name="pasarapersonal2<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasara1_personal2(<?php echo $row["id"]; ?>)"  	<?php if($row["autoriza"]=='si'){
	echo "checked";
} ?>/>		  

		  </td>
		  
		  		                 <?php if($puedeVerVYO2){ ?>
<td style="text-align:center">
    <input type="checkbox" style="width:40PX;" class="form-check-input" name="VYO[]" id="VYO<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2VYO(<?php echo $row["id"]; ?>)" <?php if(isset($row["VYO"]) && $row["VYO"]=='si'){ echo "checked"; } ?> <?php if(!$puedeGuardarVYO2 || ((isset($row["VYO"]) && $row["VYO"]=='si') && !$puedeModificarVYO2)) { echo "disabled"; } ?>/> </td> 
			  <?php } ?>
			  
			              		                 <?php if($puedeVerDIRECCION2){ ?>
<td style="text-align:center">
    <input type="checkbox" style="width:40PX;" class="form-check-input" name="DIRECCION[]" id="DIRECCION<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2DIRECCION(<?php echo $row["id"]; ?>)" <?php if(isset($row["DIRECCION"]) && $row["DIRECCION"]=='si'){ echo "checked"; } ?> <?php if(!$puedeGuardarDIRECCION2 || ((isset($row["DIRECCION"]) && $row["DIRECCION"]=='si') && !$puedeModificarDIRECCION2)) { echo "disabled"; } ?>/> </td> 
			  <?php } ?> 
		  
		  
		  		  	  <?php if($puedeVerAdmin2){ ?>
          <td style="text-align:center" >
               <input type="checkbox" style="width:40PX;" class="form-check-input" name="admin[]" id="admin<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2ADMIN(<?php echo $row["id"]; ?>)" <?php if(isset($row["admin"]) && $row["admin"]=='si'){ echo "checked"; } ?> <?php if(!$puedeGuardarAdmin2 || ((isset($row["admin"]) && $row["admin"]=='si') && !$puedeModificarAdmin2)) { echo "disabled"; } ?>/> </td>
		  <?php } ?>
		  
		  <?php if($puedeVerRechazoBono2){ ?>
	   <td style="text-align:center" >
            <input type="checkbox" style="width:40PX;" class="form-check-input" id="STATUS_BONORECHAZO<?php echo $row["id"]; ?>" name="STATUS_BONORECHAZO<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="STATUS_BONORECHAZO(<?php echo $row["id"]; ?>)" <?php if((isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si') || (isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si')){ echo "checked"; } ?> <?php if(!$puedeGuardarRechazoBono2 || (((isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si') || (isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si')) && !$puedeModificarRechazoBono2)) { echo "disabled"; } ?>/>

		   <input type="hidden" id="motivo_rechazo_personal2_<?php echo $row["id"]; ?>" value="<?php echo htmlspecialchars($motivoRechazoPersonal2, ENT_QUOTES, 'UTF-8'); ?>" />
		   <button type="button" title="Agregar motivo" id="agregar_rechazo_personal2_<?php echo $row['id']; ?>" style="border:none;background:transparent;cursor:pointer;color:#007bff;font-size:13px;<?php echo $mostrarAgregarRechazoPersonal2 ? '' : 'display:none;'; ?>" onclick="abrirFormularioRechazoPersonal(<?php echo $row['id']; ?>, 'personal2')">agregar<br>motivo</button>
		   <button type="button" title="Ver motivo" id="ver_rechazo_personal2_<?php echo $row['id']; ?>" style="border:none;background:transparent;cursor:pointer;color:#28a745;font-size:13px;<?php echo $mostrarVerRechazoPersonal2 ? '' : 'display:none;'; ?>" onclick="verMotivoRechazoPersonal(<?php echo $row['id']; ?>, 'personal2')">ver</button>
           </td>
		    

		  <?php } ?>
          <td style="text-align:center" >
          <input type="checkbox" style="width:40PX;" class="form-check-input" name="personal2[]" id="personal2" value="<?php echo $row["id"]; ?>"/> </td>

		  <td><?php echo htmlspecialchars((string) $row["NUMERO_EVENTO"], ENT_QUOTES, 'UTF-8'); ?></td>
		  <td><?php echo htmlspecialchars((string) $row["NOMBRE_EVENTO"], ENT_QUOTES, 'UTF-8'); ?></td>
       <td><?php echo $row["NOMBRE_DELINGRESO2"]; ?></td>
		  

		  
          <td >
		  <?php echo $altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL2"],'01informacionpersonal','NOMBRE_1'); ?>
		  </td>
		  
          <td >
		  <?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','PUESTO')); ?>
		  </td>
		  
          <td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_3'); ?>
		  </td>
		  
          <td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_1'); ?>
		  </td>
          <td ><?php echo $row["FECHA_INICIO1"]; ?></td>
          <td ><?php echo $row["FECHA_FINAL1"]; ?></td>
		   	<?php if($conexion->variablespermisos('','PERSOVERBONO','ver')=='si' ){ ?>
          <td ><?php echo $row["NUMERO_DIAS1"]; ?></td>
          <td ><?php echo $row["MONTO_BONO1"]; ?></td>
           <td ><?php echo number_format($montoBonoTotalAjustado2,2,'.',','); ?></td>

  
          <td ><?php echo $row["OBSERVACIONES_PERSONAL2"]; ?></td>
		       <td ><?php echo $row["FECHA_PPAGO1"]; ?></td>
               <td ><?php echo $row["FORMA_PAGO1"]; ?></td>
               <td ><?php echo $row["FECHA_EFECTIVA1"]; ?></td>             
              <td ><?php echo $urlADJUNTO_COMPROBANTE; ?></td>
			   <td ><?php echo $row["NOMBRE_RECIBIO1"]; ?></td>
			    <?php } ?>
          <td ><?php echo $row["PERSONAL2_FECHA_ULTIMA_CARGA"]; ?></td>                        
          <td>
         <input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2modifica" />
</td>    
          <td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2borrar" />
</td>  
          </tr>
          <?php
		   $MONTO_BONO12  += $filaRechazoBono2 ? 0 : (float)$row["MONTO_BONO1"];
$NUMERO_DIAS12 += $filaRechazoBono2 ? 0 : (int)$row["NUMERO_DIAS1"];

                 $PER2SUNTOTAL += $montoBonoTotalAjustado2;


          
          }
          ?>
<?php if($conexion->variablespermisos('','TOTALES_PERSOASISTE','ver')=='si') {
    $verBono = ($conexion->variablespermisos('','PERSOVERBONO','ver') == 'si');

    $columnasPreviasTotalesPersonal2 = 10
        + ($puedeVerVYO2 ? 1 : 0)
        + ($puedeVerDIRECCION2 ? 1 : 0)
        + ($puedeVerAdmin2 ? 1 : 0)
      
?>
    <tr>
        <?php if($verBono): ?>
            <td colspan='<?php echo $columnasPreviasTotalesPersonal2; ?>' style="text-align:right;">
                <strong style="font-size:16px">TOTALES</strong>
            </td>
            <td style="text-align:center;"><?php echo number_format($NUMERO_DIAS12); ?></td>
            <td style="text-align:center;">$ <?php echo number_format($MONTO_BONO12,2,'.',','); ?></td>
            <td style="text-align:center;">$ <?php echo number_format($PER2SUNTOTAL,2,'.',','); ?></td>
            <td colspan='8'></td>
        <?php else: ?>
            <td colspan='<?php echo $columnasPreviasTotalesPersonal2; ?>' style="text-align:right;">
                <strong style="font-size:16px">TOTALES</strong>
            </td>
            <td colspan='2'></td>
        <?php endif; ?>
    </tr>
<?php } ?>
</form>
</table>
</tbody>



</div>
</div>
</div>   
</div>
</div>
</div>  

<script type="text/javascript">
(function () {
    var buscador = document.getElementById('BUSCADOR_EVENTO_PERSONAL2');
    var lista = document.getElementById('LISTA_EVENTOS_PERSONAL2');
    var numero = document.getElementById('NUMERO_EVENTO_PERSONAL2');
    var nombre = document.getElementById('NOMBRE_EVENTO_PERSONAL2');
    var eventoId = document.getElementById('ID_EVENTO_PERSONAL2');
	    var fechaInicio = document.getElementById('FECHA_INICIO_PERSONAL2');

    var fechaFinal = document.getElementById('FECHA_FINAL_PERSONAL2');

    var formulario = document.getElementById('PERSONAL2form');

    if (!buscador || !lista || !numero || !nombre || !eventoId) {
        return;
    }

    function seleccionarEvento() {
        var valorBuscado = buscador.value.trim().toLocaleLowerCase();
        var opciones = lista.options;
        var opcionEncontrada = null;

        for (var indice = 0; indice < opciones.length; indice += 1) {
            var opcion = opciones[indice];
            var numeroEvento = opcion.getAttribute('data-evento-numero') || '';

            if (opcion.value.toLocaleLowerCase() === valorBuscado || numeroEvento.toLocaleLowerCase() === valorBuscado) {
                opcionEncontrada = opcion;
                break;
            }
        }

        numero.value = opcionEncontrada ? (opcionEncontrada.getAttribute('data-evento-numero') || '') : '';
        nombre.value = opcionEncontrada ? (opcionEncontrada.getAttribute('data-evento-nombre') || '') : '';
        eventoId.value = opcionEncontrada ? (opcionEncontrada.getAttribute('data-evento-id') || '') : '';
		     fechaInicio.value = opcionEncontrada ? (opcionEncontrada.getAttribute('data-evento-fecha-inicio') || '') : '';

        fechaFinal.value = opcionEncontrada ? (opcionEncontrada.getAttribute('data-evento-fecha-final') || '') : '';

        buscador.setCustomValidity(opcionEncontrada ? '' : 'Selecciona un evento de los resultados de búsqueda.');
  if (opcionEncontrada && typeof totalfechas8 === 'function') {

            totalfechas8();

        }



        return opcionEncontrada !== null;
    }

    buscador.addEventListener('input', seleccionarEvento);
    buscador.addEventListener('change', seleccionarEvento);

    if (formulario) {
        formulario.addEventListener('submit', function (evento) {
            if (!seleccionarEvento()) {
                evento.preventDefault();
                buscador.reportValidity();
            }
        });
    }
}());
</script>