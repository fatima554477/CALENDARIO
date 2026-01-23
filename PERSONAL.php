<?php
// Permisos del evento
$eventoPermisos   = $altaeventos->var_altaeventos();
$vendedorEvento   = isset($eventoPermisos['NOMBRE_VENDEDOR_id']) ? $eventoPermisos['NOMBRE_VENDEDOR_id'] : '';
$usuarioActual    = isset($_SESSION['idem']) ? $_SESSION['idem'] : '';

// ¿Tiene permiso PERSONALAUTORIZA (ver=si)?
$tienePermisoPersonal = ($conexion->variablespermisos('', 'PERSONALAUTORIZA', 'ver') === 'si');

// Puede autorizar si es el vendedor del evento O si tiene PERSONALAUTORIZA=ver=si
$puedeAutorizar = (
    ($usuarioActual !== '' && $usuarioActual == $vendedorEvento)
    || $tienePermisoPersonal
);
?>


<div id="content">
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar17" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar17" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;PERSONAL QUE ADMINISTRA EL EVENTO</p>
<div  id="mensajePERSONAL2"><div class="progress" style="width: 25%;">

									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCONTACTOSBODE; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCONTACTOSBODE; ?>%</div>
									
								</div></div>
								</strong>
	        <div id="target17" style="display:block;"  class="content2">
        <div class="card">
 <div class="card-body" id='actualizabonos'>
            

          
	<form class="row g-3 needs-validation was-validated" novalidate="" id="PERSONALform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
 
       


                        
              <table class="table mb-0 table-striped">
                    <tr>  
                               
                               <th style="text-align:center" scope="col"></th>
                               <th style="text-align:center" scope="col">INFORMACIÓN</th>
                    
                           
                               </tr>
                               


<tr style="background:#ebf8fa">
    <th style="text-align:left" scope="col">PERSONAL QUE ADMINISTRA EL EVENTO</th>
    <td>
        <?php
        $encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" 
                        id="NOMBRE_PERSONAL" required name="NOMBRE_PERSONAL" 
                        onchange="getemployee();">
                       <option value="nada" selected>SELECIONA UNA OPCIÓN</option>';

        $queryper = $altaeventos->lista_colaboradoreventos2();
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        $option29 = '';
        
        while($row = mysqli_fetch_array($queryper)) {
            $num = ($num == 8) ? 0 : $num + 1;
				$select='';
	        if($select = "selected");
			
			
            $option21 .= '<option style="background: #'.$fondos[$num].'" 
                          value="'.$row['idR'].'^^'.$row['NOMBRE_1'].'^^'.$row['NOMBRE_2'].'^^'.$row['APELLIDO_PATERNO'].'^^'.$row['APELLIDO_MATERNO'].'">
                          '.htmlspecialchars($row['NOMBRE_1'].' '.$row['NOMBRE_2'].' '.$row['APELLIDO_PATERNO'].' '.$row['APELLIDO_MATERNO']).'</option>';
        }
        
        echo $encabezadoA.$option21.'</select>';
        ?>
    </td>
</tr>
	
	
	
	
	
	
	
	
   
<tr>

    <th style="background:#eff9eb; text-align:left" scope="col">PUESTO:</th>
    <td  style="background:#eff9eb" id="obtener_puesto">


	<?php 
	$_SESSION['NOMBRE_PERSONAL1'] = isset($_SESSION['NOMBRE_PERSONAL1'])?$_SESSION['NOMBRE_PERSONAL1']:'';
	
	echo str_replace('_',' ',$PUESTO_PERSONAL2 = $altaeventos->un_solo_colaborador($_SESSION['NOMBRE_PERSONAL1'],'01empresa','PUESTO')); ?>
	
	<!--<input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $PUESTO_PERSONAL2; ?>" name="PUESTO_PERSONAL">-->
	
	</td>

    </tr>
    <tr>
    <th style="background:#eff9eb; text-align:left" scope="col">TELEFONO DE OFICINA:</th>
    <td  style="background:#eff9eb" id="obtener_cel">
	
	<?php echo $WHAT_PERSONAL = $altaeventos->un_solo_colaborador($_SESSION['NOMBRE_PERSONAL1'],'01empresa','CORREO_3'); ?>
	
	<!--<input type="text"class="form-control" id="validationCustom03" required=""  value="<?php echo $WHAT_PERSONAL; ?>" name="WHAT_PERSONAL">-->
	
	</td>

    </tr>
    <tr>
    <th style="background:#eff9eb; text-align:left" scope="col">EMAIL DE CONTACTO :</th>
    <td  style="background:#eff9eb" id="obtener_email">
	
	<?php echo $EMAIL_PERSONAL2= $altaeventos->un_solo_colaborador($_SESSION['NOMBRE_PERSONAL1'],'01empresa','CORREO_4'); ?>
		  
	<!--<input type="text"class="form-control" id="validationCustom03" required=""  value="<?php echo $EMAIL_PERSONAL2; ?>" name="EMAIL_PERSONAL">-->
	
	</td>                             

    </tr>
	

    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA DE INICIO DEL  EVENTO:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_INICIO; ?>" name="FECHA_INICIO"></td>

    </tr>

    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA FINAL DEL EVENTO:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_FINAL; ?>" name="FECHA_FINAL"></td>

    </tr>
	
				   	<?php if($conexion->variablespermisos('','PERSONALver','ver')=='si' ){ ?>
    <tr>
	
    <th style="background:#eff9eb; text-align:left" scope="col">NÚMERO DE DIAS:</th>
<td style="background:#eff9eb">
  <div class="input-group">
    <input type="text" class="form-control" id="validationCustom03"
           required value="<?php echo $NUMERO_DIAS; ?>" name="NUMERO_DIAS">
<button type="button" class="btn btn-sm btn-primary" onclick="totalfechas7()" >ACTUALIZAR</button>
  </div>

</td>

    </tr>
	
	

	
	
  <tr style="background:#f7edf8; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">MONTO DEL BONO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_BONO" required="" value="<?php echo number_format($MONTO_BONO,2,'.',','); ?>" onkeyup="comasainput('MONTO_BONO')" name="MONTO_BONO"  onclick="total_cantidad_x_precio7()" >
 </div>
 </td>
         </tr>

          <tr style="background:#eff9eb; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL DEL BONO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_BONO_TOTAL" required="" value="<?php echo number_format($MONTO_BONO_TOTAL,2,'.',','); ?>" onkeyup="comasainput('MONTO_BONO_TOTAL')" name="MONTO_BONO_TOTAL" placeholder="">
 </div>
 </td>
         </tr>  



 	 <tr style="background:#f7edf8; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">VIATICOS:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="VIATICOS_PERSONAL" required="" value="<?php echo number_format($VIATICOS_PERSONAL,2,'.',','); ?>" onkeyup="comasainput('VIATICOS_PERSONAL')" name="VIATICOS_PERSONAL" placeholder="">
 </div>
 </td>
         </tr>
    <tr style="background:#eff9eb; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL BONO Y VIATICOS:</label></th>
         <td>
  <div class="input-group">
         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="TOTAL" required="" value="<?php echo number_format($TOTAL,2,'.',','); ?>" onkeyup="comasainput('TOTAL')" name="TOTAL" placeholder="">
 <button type="button" class="btn btn-sm btn-primary" onclick="totalfechas7()" >ACTUALIZAR</button>
  </div></div>
 </td>
         </tr>
		        <tr>
         <th style="background:#eff9eb; text-align:left" scope="col">ÚLTIMO DÍA PARA COMPROBAR VIATICOS:</th>
         <td  style="background:#eff9eb"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $ULTIMO_DIA1; ?>" name="ULTIMO_DIA1"></td>
     
         </tr>
		 
		 
		
    

    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">MOTIVO DEL BONO:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OBSERVACIONES_PERSONAL; ?>" name="OBSERVACIONES_PERSONAL"></td>

    </tr>
     <?php } ?>
    
    <tr>

           <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="PERSONAL_FECHA_ULTIMA_CARGA">
           
           </td>
           </tr>
          </table>  
 
  
     
                     <input type="hidden" value="hDatosPERSONAL" name="hDatosPERSONAL"/>
                     <input type="hidden" value="NUMERO_EVENTO" name="NUMERO_EVENTO" />

<table>
  <tr> 
<?php if($conexion->variablespermisos('','PERSONAL','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>  
<th>
         



 <button style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="guardaPERSONAL">GUARDAR</button><div style="

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
    1px 30px 60px rgba(16,16,16,0.4);"id="mensajePERSONAL"></th></tr><?php } ?>
           
           
            </table>
            </form>




 
            <form name="form_emai_personal" id="form_emai_personal">

            <?php if($conexion->variablespermisos('','PERSONAL','email')=='si' and $var_bloquea_fecha=='no'){ ?>          
          <tr>
                  
          <td><textarea placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES"  style="width:500px;px;" name="PERSONAL_ENVIAR_IMAIL" id="PERSONAL_ENVIAR_IMAIL" class="form-control" aria-label="With textarea"><?php echo $PERSONAL_ENVIAR_IMAIL; ?></textarea></td><br></br>
          <th> <button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarimailPERSONAL">ENVIAR POR EMAIL</button></th>   
                   
          </tr><?php } ?>
         

               <?php
               $querycontras = $altaeventos->listado_personal();
               ?>
               
               <br />
               <div class='table-responsive'>
               <div align='right'>
               </div>
               <br />
               <div id='employee_table'>
               <tbody= 'font-style:italic;'>
               <table class="table table-striped table-bordered" style="width:100%"  id='reset_personal' name='reset_personal'>
               <tr style="text-align:center">
               <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR V Y O</th> 
               <th width="15%"style="background:#c9e8e8">AUTORIZA<br>P y CG</th> 
               <th width="15%"style="background:#c9e8e8">ADMIN</th> 
               <th width="15%"style="background:#c9e8e8">ENVIAR <br>POR EMAIL</th>
               <th width="20%"style="background:#c9e8e8">NOMBRE</th>
               <th width="20%"style="background:#c9e8e8">PUESTO</th>
               <th width="20%"style="background:#c9e8e8">TELEFONO DE OFICINA</th>
               <th width="20%"style="background:#c9e8e8">EMAIL</th>
	
               <th width="20%"style="background:#c9e8e8">FECHA DE INICIO<br> DEL EVENTO</th>
               <th width="20%"style="background:#c9e8e8">FECHA FINAL <br>DEL EVENTO</th>
			   	<?php if($conexion->variablespermisos('','PERSONALver','ver')=='si' ){ ?>
               <th width="20%"style="background:#c9e8e8">NÚMERO <br>DE DÍAS</th>
			   		   
               <th width="20%"style="background:#c9e8e8">MONTO <br>DE BONO</th>
               <th width="20%"style="background:#c9e8e8">TOTAL <br>DE BONO</th>
               <th width="20%"style="background:#c9e8e8">VIATICOS</th>
               <th width="20%"style="background:#c9e8e8">TOTAL</th>			  
               <th width="20%"style="background:#c9e8e8">ULTIMO DÍA PARA <br>COMPROBAR VIATICOS:</th>
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
$urlADJUNTO_COMPROBANTEP ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlADJUNTO_COMPROBANTEP = $conexion->descargararchivo($row["ADJUNTO_COMPROBANTEP"]);
?>
               <tr style="background:#f5f9fc;text-align:center">
           
               <td style="text-align:center" >
           
     <input type="checkbox" style="width:40PX;" class="form-check-input" id="pasarapersonal<?php echo $row["id"]; ?>" name="pasarapersonal<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasara1_personal(<?php echo $row["id"]; ?>)"  	<?php if($row["autoriza"]=='si'){
       echo "checked";
     } ?>/>		  
     
           </td>
		   
	               <td style="text-align:center" >
           
     <input type="checkbox" style="width:40PX;" class="form-check-input" id="pasarapersonalAUT<?php echo $row["id"]; ?>" name="pasarapersonalAUT<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasara1_personalAUT(<?php echo $row["id"]; ?>)"  	<?php if($row["autorizaAUT"]=='si'){ echo "checked"; } ?> <?php if(!$puedeAutorizar) echo 'disabled'; ?>/>		  
     
           </td>
           
               <td style="text-align:center" >
               <input type="checkbox" style="width:40PX;" class="form-check-input" name="personal[]" id="personal" value="<?php echo $row["id"]; ?>"/> </td>

              

<td style="text-align:center">
    <input type="checkbox" style="width:40PX;" class="form-check-input"   name="admin[]" id="admin" value="<?php echo $row["id"]; ?>"/> </td>  


 			   
           
          <td >
		  <?php echo $altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL"],'01informacionpersonal','NOMBRE_1'); ?>
		  </td>
           
               <td >
           <?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','PUESTO')); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','CORREO_3'); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','CORREO_4'); ?>
           </td>
		   	<?php if($conexion->variablespermisos('','PERSONALver','ver')=='si' ){ ?>
           <td ><?php echo $row["FECHA_INICIO"]; ?></td>
          <td ><?php echo $row["FECHA_FINAL"]; ?></td>
          <td ><?php echo $row["NUMERO_DIAS"]; ?></td>
          <td ><?php echo $row["MONTO_BONO"]; ?></td>
          <td ><?php echo $row["MONTO_BONO_TOTAL"]; ?></td>
          <td ><?php echo $row["VIATICOS_PERSONAL"]; ?></td>
          <td ><?php echo $row["TOTAL"]; ?></td>
		  <?php } ?>
          <td ><?php echo $row["ULTIMO_DIA"]; ?></td>
               <td ><?php echo $row["OBSERVACIONES_PERSONAL"]; ?></td>
			   
               <td ><?php echo $row["FECHA_PPAGO"]; ?></td>
               <td ><?php echo $row["FORMA_PAGO"]; ?></td>
               <td ><?php echo $row["FECHA_EFECTIVA"]; ?></td>             
              <td ><?php echo $urlADJUNTO_COMPROBANTEP; ?></td>
			   <td ><?php echo $row["NOMBRE_RECIBIO"]; ?></td>
               <td ><?php echo $row["PERSONAL_FECHA_ULTIMA_CARGA"]; ?></td>                      
          <td>
          <?php if($conexion->variablespermisos('','PERSONAL','modificar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonalmodifica" />
			<?php } ?></td> 

   
          <td><?php if($conexion->variablespermisos('','PERSONAL','borrar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonalborrar" />
</td>  <?php } ?>
          </tr>
          <?php
          $PERSUNTOTAL1 += $row["MONTO_BONO_TOTAL"];
          $PERVIAT1 += $row["VIATICOS_PERSONAL"];
          $PERTOTAL1 += $row["TOTAL"];
          $MONTO_BONO1 += $row["MONTO_BONO"];
          $NUMERO_DIAS1 += $row["NUMERO_DIAS"];
          }
          ?>
           	<?php if($conexion->variablespermisos('','PERSONALver','ver')=='si' ){ ?>
          <tr>
		  <td></td>
		  <td></td>
          <td colspan='8' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
          <td style="text-align:center;"> <?php echo number_format($NUMERO_DIAS1); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($MONTO_BONO1,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($PERSUNTOTAL1,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($PERVIAT1,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($PERTOTAL1,2,'.',','); ?></td><td></td></tr><?php } ?>
            
          </table>  
             </tbody>
</form>


</div>
</div>
</div>   
</div>
</div>
</div>