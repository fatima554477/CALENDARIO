<?php
$puedeVerAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'ver') === 'si');
$puedeGuardarAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'guardar') === 'si');
$puedeModificarAdmin2 = ($conexion->variablespermisos('', 'PERSO2', 'modificar') === 'si');
?>

<div id="content">   
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar18" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar18" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;PERSONAL QUE ASISTE AL EVENTO</p>
<div  id="mensajePERSONAL22"><div class="progress" style="width: 25%;">

									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCONTACTOSBODE; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCONTACTOSBODE; ?>%</div>
									
								</div></div>
								</strong>
	        <div id="target18" style="display:block;"  class="content2">
        <div class="card">
      <div  id='actualizabonos2'>
            

      
	<form class="row g-3 needs-validation was-validated" novalidate="" id="PERSONAL2form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
 
       


                        
              <table class="table mb-0 table-striped">
                    <tr>  
                               
                               <th style="text-align:center" scope="col"></th>
                               <th style="text-align:center" scope="col">INFORMACIÓN</th>
                    
                           
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
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA DE INICIO DE CORDINACIÓN:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_INICIO1; ?>" name="FECHA_INICIO1"></td>

    </tr>
    <tr>
    <th style="background:#f7edf8; text-align:left" scope="col">FECHA FINAL DE CORDINACIÓN:<br><a style="color:red;font:7px">obligatorio</a></th>
    <td  style="background:#f7edf8"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_FINAL1; ?>" name="FECHA_FINAL1"></td>

    </tr>
	<?php if($conexion->variablespermisos('','PERSOVERBONO','ver')=='si' ){ ?>
    <tr>
	
    <th style="background:#eff9eb; text-align:left" scope="col">NÚMERO DE DIAS:</th>
<td style="background:#eff9eb">
  <div class="input-group">
    <input type="text" class="form-control" id="validationCustom03"
           required value="<?php echo $NUMERO_DIAS1; ?>" name="NUMERO_DIAS1">
<button type="button" class="btn btn-sm btn-primary" onclick="totalfechas8()" >ACTUALIZAR</button>
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



         <tr style="background:#f7edf8; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">VIATICOS:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="VIATICOS_PERSONAL2" required="" value="<?php echo number_format($VIATICOS_PERSONAL2,2,'.',','); ?>" onkeyup="comasainput('VIATICOS_PERSONAL2')" name="VIATICOS_PERSONAL2" placeholder="">
 </div>
 </td>
         </tr>
    <tr style="background:#eff9eb; text-align:left"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">TOTAL BONO Y VIATICOS:</label></th>
         <td>
  <div class="input-group">
         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="TOTAL1" required="" value="<?php echo number_format($TOTAL1,2,'.',','); ?>" onkeyup="comasainput('TOTAL1')" name="TOTAL1" placeholder="">
 <button type="button" class="btn btn-sm btn-primary" onclick="totalfechas8()" >ACTUALIZAR</button>
  </div></div>
 </td>
         </tr>
		
         <tr>
         <th style="background:#eff9eb; text-align:left" scope="col">ÚLTIMO DÍA PARA COMPROBAR VIATICOS:</th>
         <td  style="background:#eff9eb"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $ULTIMO_DIA1; ?>" name="ULTIMO_DIA1"></td>
     
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
<?php if($conexion->variablespermisos('','PERSONALNUEVO','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>  
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
    1px 30px 60px rgba(16,16,16,0.4);"id="mensajePERSONAL2"> </th><?php } ?>   </tr>
           
           
            </table>
            </form>



<?php if($conexion->variablespermisos('','PERSONALNUEVO','email')=='si' and $var_bloquea_fecha=='no'){ ?>
 
            <form name="form_emai_personal2" id="form_emai_personal2">

              
          <tr>
                  
          <td><textarea placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES"  style="width:500px;px;" name="PERSONAL2_ENVIAR_IMAIL" id="PERSONAL2_ENVIAR_IMAIL" class="form-control" aria-label="With textarea"><?php echo $PERSONAL2_ENVIAR_IMAIL; ?></textarea></td><br></br>
          <th> <button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarimailPERSONAL2">ENVIAR POR EMAIL</button></th>  <?php } ?>  
                   
          </tr>
         

          <?php
          $querycontras = $altaeventos->listado_personal3();
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
               <th width="15%"style="background:#c9e8e8">AUTORIZACIÓN <br>POR VYO</th>
		   <?php if($puedeVerAdmin2){ ?>
               <th width="15%"style="background:#c9e8e8">AUDITORÍA</th>
			   <?php } ?> 			   
               <th width="15%"style="background:#c9e8e8">ENVIAR <br>POR EMAIL</th>
               <th width="20%"style="background:#c9e8e8">NOMBRE</th>
               <th width="20%"style="background:#c9e8e8">PUESTO</th>
               <th width="20%"style="background:#c9e8e8">TELEFONO DE OFICINA</th>
               <th width="20%"style="background:#c9e8e8">EMAIL</th>
			  
               <th width="20%"style="background:#c9e8e8">FECHA DE INICIO<br> DE CORDINACIÓN</th>
               <th width="20%"style="background:#c9e8e8">FECHA FINAL <br>DE CORDINACIÓN</th>
			    	<?php if($conexion->variablespermisos('','PERSOVERBONO','ver')=='si' ){ ?>
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
$urlADJUNTO_COMPROBANTE ='';
while($row = mysqli_fetch_array($querycontras))
{	
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
				$botonBorrarAdjunto = " <button type='button' class='btn btn-link p-0 text-danger view_dataPERSONALadjuntoBorrar' data-personal='".$row["id"]."' data-archivo='".$adjuntoComprobante."'>Borrar</button>";
			}
			$urlADJUNTO_COMPROBANTE .= "<li class='d-flex align-items-center gap-2'><a target='_blank' href='includes/archivos/".$adjuntoComprobante."'>Visualizar!</a>".$botonBorrarAdjunto."</li>";
		}
		$urlADJUNTO_COMPROBANTE .= "</ul>";

	}

?>
          <tr style="background:#f5f9fc;text-align:center">
		  
          <td style="text-align:center" >
		  
<input type="checkbox" style="width:40PX;" class="form-check-input" id="pasarapersonal2<?php echo $row["id"]; ?>" name="pasarapersonal2<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"  onclick="pasara1_personal2(<?php echo $row["id"]; ?>)"  	<?php if($row["autoriza"]=='si'){
	echo "checked";
} ?>/>		  

		  </td>
		  
		  
		  		  	  <?php if($puedeVerAdmin2){ ?>
          <td style="text-align:center" >
               <input type="checkbox" style="width:40PX;" class="form-check-input" name="admin[]" id="admin<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2ADMIN(<?php echo $row["id"]; ?>)" <?php if(isset($row["admin"]) && $row["admin"]=='si'){ echo "checked"; } ?> <?php if(!$puedeGuardarAdmin2 || ((isset($row["admin"]) && $row["admin"]=='si') && !$puedeModificarAdmin2)) { echo "disabled"; } ?>/> </td>
		  <?php } ?>
          <td style="text-align:center" >
          <input type="checkbox" style="width:40PX;" class="form-check-input" name="personal2[]" id="personal2" value="<?php echo $row["id"]; ?>"/> </td> 
		  
  
		  

		  
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
          <td ><?php echo $row["MONTO_BONO_TOTAL1"]; ?></td>
          <td ><?php echo $row["VIATICOS_PERSONAL2"]; ?></td>
          <td ><?php echo $row["TOTAL1"]; ?></td>
          <td ><?php echo $row["ULTIMO_DIA"]; ?></td>
          <td ><?php echo $row["OBSERVACIONES_PERSONAL2"]; ?></td>
		       <td ><?php echo $row["FECHA_PPAGO1"]; ?></td>
               <td ><?php echo $row["FORMA_PAGO1"]; ?></td>
               <td ><?php echo $row["FECHA_EFECTIVA1"]; ?></td>             
              <td ><?php echo $urlADJUNTO_COMPROBANTE; ?></td>
			   <td ><?php echo $row["NOMBRE_RECIBIO1"]; ?></td>
			    <?php } ?>
          <td ><?php echo $row["PERSONAL2_FECHA_ULTIMA_CARGA"]; ?></td>                        
          <td>
          <?php if($conexion->variablespermisos('','PERSONALNUEVO','modificar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2modifica" />
<?php } ?></td>    
          <td><?php if($conexion->variablespermisos('','PERSONALNUEVO','borrar')=='si' and $var_bloquea_fecha=='no'){ ?><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2borrar" />
</td>  <?php } ?>
          </tr>
          <?php
		       if(!isset($row["admin"]) || $row["admin"] != 'si'){
          $NUMERO_DIAS12 += $row["NUMERO_DIAS1"];
          $MONTO_BONO12 += $row["MONTO_BONO1"];
          $PER2SUNTOTAL += $row["MONTO_BONO_TOTAL1"];
          $PER2VIAT += $row["VIATICOS_PERSONAL2"];
          $PER2TOTAL += $row["TOTAL1"];
          }
          }
          ?>
          	<?php if($conexion->variablespermisos('','TOTALES_PERSOASISTE','ver')=='si' ){ ?>
          <tr>
          <td colspan='9' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
          <td style="text-align:center;"><?php echo number_format($NUMERO_DIAS12); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($MONTO_BONO12,2,'.',','); ?></td>
		  
          <td style="text-align:center;">$ <?php echo number_format($PER2SUNTOTAL,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($PER2VIAT,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($PER2TOTAL,2,'.',','); ?></td><td></td></tr><?php } ?>
           </form> 
          </table>  
             </tbody>



</div>
</div>
</div>   
</div>
</div>
</div>  
