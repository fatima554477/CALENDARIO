<?php 
//require "class.epcinnTIKETSYAVION.php";
//$pagoproveedores = new TIKETSYAVION();

?>

<div id="content">     
			<hr/>
	<strong> <P class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar27" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar27" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;TICKETS</p></strong></div>

<div  id="mensajeTIKETS2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $pagoaproveedoress ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pagoaproveedoress ; ?>%</div></div></div>


	        <div id="target27" style="display:block;"  class="content2">
      
        <div class="card">
          <div class="card-body">

				<?php if($conexion->variablespermisos('','PAGOS_EGRESOS','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>	  
	<form class="row g-3 needs-validation was-validated" novalidate="" id="pagoTIKETSform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	
   <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">

				  
<tr>

<th scope="col">FACTURA </th>
<th scope="col">DATOS</th> 
</tr>

             
  

                 <tr  style="background:#fcf3cf"> 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">NÚMERO CONSECUTIVO DE PAGO A PROVEEDORES</label></th>
                
                 <td> <div id="NUMERO_CONSECUTIVO_PROVEE2"><input type="text" class="form-control" id="NUMERO_CONSECUTIVO_PROVEE2" required=""  value="<?php echo $NUMERO_CONSECUTIVO_PROVEE; ?>" name="NUMERO_CONSECUTIVO_PROVEE" placeholder="NÚMERO CONSECUTIVO DE PAGO A PROVEEDORES"></div></td>
                 </tr>
				 
				 
                 <tr style="background: #d2faf1"> 
      
            
                 <th scope="row"> <label  style="width:300px" for="RAZON_SOCIAL" class="form-label">RAZÓN SOCIAL</label></th>
                 <td>
				 
				 <div id="RAZON_SOCIAL2">
				 
				 <input type="text" class="form-control" id="RAZON_SOCIAL" required=""  value="<?php echo $nombreE; ?>" name="RAZON_SOCIAL" placeholder="RAZÓN SOCIAL">
				 </div>
				 </td>
                 </tr>
                 <tr  style="background:#fcf3cf"> 
              
                
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">RFC DEL PROVEEDOR:</label></th>
                 <td>
				 
				 <div id="RFC_PROVEEDOR2">
				 
				 <input type="text" class="form-control" id="RFC_PROVEEDOR" required=""  value="<?php echo $rfcE; ?>" name="RFC_PROVEEDOR" placeholder="RFC DEL PROVEEDOR">
				 
				 </div>
				 </td>
                 </tr>
                 <tr style="background: #d2faf1">
                 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">No. DE EVENTO:</label></th>
                 <td>
				 
<!--<?php echo $NUMERO_EVENTO; ?>-->

<div style="">

<input type="text" class="form-control" required=""  value="<?php echo $NUMERO_EVENTO; ?>" name="NUMERO_EVENTO"  id="NUMERO_EVENTO" placeholder="NÚMERO DE EVENTO" >

</div>


				 
				 </td>
                 </tr>
				 
                 <tr  style="background:#fcf3cf">
                
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">NOMBRE DEL EVENTO:</label></th>
                 <td><input type="text" class="form-control" id="NOMBRE_EVENTO" required=""  value="<?php echo $NOMBRE_EVENTO_get ?>" name="NOMBRE_EVENTO" placeholder="NOMBRE DEL EVENTO"></td>
                 </tr>
                 <tr  style="background: #d2faf1">
                 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MOTIVO DEL GASTO:</label></th>
                 <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $MOTIVO_GASTO; ?>" name="MOTIVO_GASTO"placeholder="MOTIVO DEL GASTO "></td>
                 </tr>
                 <tr style="background:#fcf3cf"> 

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">CONCEPTO DE LA FACTURA:</label></th>
                 <td><div id="CONCEPTO_PROVEE2"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $Descripcion; ?>" name="CONCEPTO_PROVEE"placeholder="CONCEPTO DE LA FACTURA"></div></td>
                 </tr>
				 
                 <tr style="background: #d2faf1">  


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MONTO TOTAL DE LA COTIZACIÓN O DEL ADEUDO:</label></th>
             
                
				 
			
				 <td>
             <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text" style="width:300px;height:40px;"  value="<?php echo $MONTO_TOTAL_COTIZACION_ADEUDO; ?>" name="MONTO_TOTAL_COTIZACION_ADEUDO" onkeyup="comasainput('MONTO_TOTAL_COTIZACION_ADEUDO')"  placeholder="MONTO TOTAL DE LA COTIZACÓN" >
				 </div>
 </td>
				 </tr>
				 

				 
           
                 <tr style="background:#fcf3cf">

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MONTO DE LA FACTURA:</label></th>
                 <td>
				 <div id="2MONTO_FACTURA">
				 
 <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"  style="width:300px;height:40px;"  id="MONTO_FACTURA" required="" onkeyup="calcular()"   value="<?php echo $total; ?>" name="MONTO_FACTURA" class="total" placeholder="MONTO DE LA FACTURA">
 
				 </div></div>				
				
				 </td>
                 </tr>  
				 

                
                 <tr style="background: #d2faf1">

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MONTO DE LA PROPINA O SERVICIO NO INCLUIDO EN LA FACTURA:</label></th>
          
				 <td>
				 <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"class="total"  style="width:300px;height:40px;"  id="total" required=""  onkeyup="calcular()"   value="<?php echo $MONTO_PROPINA; ?>" name="MONTO_PROPINA"placeholder="MONTO DE LA PROPINA">
				 </div>		
				 
				 </td>
                 </tr>
				 
	
          
                    <tr style="background:#fcf3cf">

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MONTO A DEPOSITAR:</label></th>
                 <td>
				 <div id="2MONTO_DEPOSITAR">
             <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text" class="form-control" id="MONTO_DEPOSITAR" required=""   value="<?php echo $total; ?>" name="MONTO_DEPOSITAR"placeholder="MONTO A DEPOSITAR">
				
				 </td>
                 </tr> </div> </div>
                 <tr style="background:#fcf3cf">

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">TIPO DE MONEDA O DIVISA:</label></th>
                
                 <td>
				 
             <div id="TIPO_DE_MONEDA2">				 
         <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="TIPO_DE_MONEDA">
        <option style="background: #c9e8e8"></option>                 
                     <option style="background: #c9e8e8" value="<?php echo $Moneda; ?>" <?php if($Moneda=='MXN'){echo "selected";} ?>>MXN (Peso mexicano)</option>
                     <option style="background: #a3e4d7" value="<?php echo $Moneda; ?>" <?php if($Moneda=='USD'){echo "selected";} ?>>USD (Dolar)</option>
                     <option style="background: #e8f6f3" value="<?php echo $Moneda; ?>" <?php if($Moneda=='EUR'){echo "selected";} ?>>EUR (Euro)</option>
                     <option style="background: #fdf2e9" value="<?php echo $Moneda; ?>" <?php if($Moneda=='GBP'){echo "selected";} ?>>GBP (Libra esterlina)</option>
                     <option style="background: #eaeded" value="<?php echo $Moneda; ?>" <?php if($Moneda=='CHF'){echo "selected";} ?>>CHF (Franco suizo)</option>
                     <option style="background: #fdebd0" value="<?php echo $Moneda; ?>" <?php if($Moneda=='CNY'){echo "selected";} ?>>CNY (Yuan)</option>
                     <option style="background: #ebdef0" value="<?php echo $Moneda; ?>" <?php if($Moneda=='JPY'){echo "selected";} ?>>JPY (Yen japonés)</option>
                     <option style="background: #d6eaf8" value="<?php echo $Moneda; ?>" <?php if($Moneda=='HKD'){echo "selected";} ?>>HKD (Dólar hongkonés)</option>
                     <option style="background: #fef5e7" value="<?php echo $Moneda; ?>" <?php if($Moneda=='CAD'){echo "selected";} ?>>CAD (Dólar canadiense)</option>
                     <option style="background: #ebedef" value="<?php echo $Moneda; ?>" <?php if($Moneda=='AUD'){echo "selected";} ?>>AUD (Dólar australiano)</option>
                     <option style="background: #fbeee6" value="<?php echo $Moneda; ?>" <?php if($Moneda=='BRL'){echo "selected";} ?>>BRL (Real brasileño)</option>
                     <option style="background: #e8f6f3" value="<?php echo $Moneda; ?>" <?php if($Moneda=='RUB'){echo "selected";} ?>>RUB  (Rublo ruso)</option>

                     </select> 
                        </div>
                 
                 </td>                    

             </tr>
                 <tr style="background:#fcf3cf">

                 <th><label style="width: 300px" for="validationCustom02" class="form-label">FORMA DE PAGO:</label></th>
				 
				 
             <td style="width: 45%;">
             <script type="text/javascript">  function EFECTIVO (texto) {    alert(texto);} </script>

<div id="2PFORMADE_PAGO">

       <select class="form-select mb-3" aria-label="Default select example" id="PFORMADE_PAGO" required="" name="PFORMADE_PAGO">

              <option style="background:#f2b4f5" value=""></option>
            
              <option style="background:#f2b4f5" <?php if($formaDePago=='03'){echo "selected";} ?> value="03">03 TRANSFERENCIA ELECTRONICA DE FONDOS</option>
        
              <option style="background:#ddf5da"  <?php if($formaDePago=='01'){echo "selected";} ?>  value="01 EFECTIVO"   onclick="EFECTIVO('NO SE PUEDE GENERAL EL PAGO DE ESTA FACTURA EN EFECTIVO');">01 EFECTIVO</option>
        
              <option style="background:#fceade" <?php if($formaDePago=='02'){echo "selected";} ?> value="02">02 CHEQUE NOMITATIVO</option>
        
              <option style="background:#dee6fc" <?php if($formaDePago=='04'){echo "selected";} ?> value="04">04 TARJETA DE CREDITO</option>
        
              <option style="background:#f6fcde" <?php if($formaDePago=='05'){echo "selected";} ?> value="05">05 MONEDERO ELECTRONICO</option>
        
              <option style="background:#dee2fc" <?php if($formaDePago=='06'){echo "selected";} ?> value="06">06 DINERO ELECTRONICO</option>
        
              <option style="background:#f9e5fa" <?php if($formaDePago=='08'){echo "selected";} ?> value="08">08 VALES DE DESPENSA</option>
        
              <option style="background:#eefcde" <?php if($formaDePago=='28'){echo "selected";} ?> value="28">28 TARJETA DE DEBITO</option>
        
              <option style="background:#fcfbde" <?php if($formaDePago=='29'){echo "selected";} ?> value="29">29 TARJETA DE SERVICIO</option>
        
              <option style="background:#f9e5fa" <?php if($formaDePago=='99'){echo "selected";} ?> value="99">99 OTRO</option>
        
              </select> 
        
    <div/>
        </td>

        </tr>
  
				 
             
				 
                 <tr style="background: #d2faf1"> 

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">FECHA  DE PAGO:</label></th>
                 <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_A_DEPOSITAR; ?>" name="FECHA_A_DEPOSITAR" placeholder="FECHA A DEPOSITAR"></td>
                 </tr>
               
                 <tr  style="background:#fcf3cf" > 

                 <th scope="row">  <label  style="width:300px" for="validationCustom02" class="form-label">STATUS DE PAGO:</label></th>
                 <td>
				 
				 <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" value="<?php echo $STATUS_DE_PAGO; ?>" required="" name="STATUS_DE_PAGO"> 
                       
                         <option style="background:#f5deee " <?php if($PAGADO=='PAGADO'){echo "selected";} ?> value="PAGADO">PAGADO</option>
                         <option style="background:#e1f5de " <?php if($APROBADO=='APROBADO'){echo "selected";} ?> value="APROBADO">APROBADO</option>
                         <option style="background:#f5f4de " <?php if($RECHAZADO=='RECHAZADO'){echo "selected";} ?> value="RECHAZADO">RECHAZADO</option>
						 </select>
						 
						 </td>

                 </tr>
				 
				 
                 <tr  style="background: #d2faf1" > 


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR COTIZACIÓN O REPORTE: (CUAQUIER FORMATO)</label></th>
                 <td>



		<!--<div id="drop_file_zone" ondrop="upload_file(event,'ADJUNTAR_COTIZACION')" ondragover="return false" >
		<p>Suelta aquí o busca tu archivo</p>
		<p><input class="form-control form-control-sm" id="ADJUNTAR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer('ADJUNTAR_COTIZACION');"  VALUE="<?php echo $ADJUNTAR_COTIZACION; ?>" required /></p>
		<input type="file" name="ADJUNTAR_COTIZACION" id="nono"/>
		<div id="1ADJUNTAR_COTIZACION">
		<?php
		if($ADJUNTAR_COTIZACION!=""){echo "<a target='_blank' href='includes/archivos/".$ADJUNTAR_COTIZACION."'>Visualizar!</a>"; 
		}?></div>
		</div>
	

				 
				 <div id="2ADJUNTAR_COTIZACION"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('ADJUNTAR_COTIZACION');

while($rowsube=mysqli_fetch_array($listadosube)){
	echo "<a target='_blank' href='includes/archivos/".$rowsube['ADJUNTAR_COTIZACION']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}
?></div>-->

   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_COTIZACION">	


				 </td>
                 </tr>
                 <tr   style="background:#fcf3cf">  

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> NUMERO DE TARJETA:</label></th>
<td>

<?php 
//ECHO $_SESSION["idempermiso"];
$BANCO_ORIGEN = $pagoproveedores->tarjeta();?>
<input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $BANCO_ORIGEN; ?>" name="BANCO_ORIGEN" placeholder="NUMERO DE TARJETA">


</td>
</tr>

                 <tr  style="background: #d2faf1" >  

               
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ACTIVO FIJO:</label></th>
                
      
             
                 <td><select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="ACTIVO_FIJO"> >
                         <option selected="">SELECCIONA UNA OPCION</option>
                         <option style="background: #c9e8e8" value="MXN" <?php if($ACTIVO_FIJO=='SI'){echo "selected";} ?>>SI</option>
                         <option style="background: #a3e4d7" value="USD" <?php if($ACTIVO_FIJO=='NO'){echo "selected";} ?>>NO</option>

                         </select> 
                      
                          </div> 
                 </tr>

                 <tr  style="background: #d2faf1" >  
                      
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">GASTO FIJO:</label></th>
             
                 <td><select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="GASTO_FIJO"> >
                         <option selected="">SELECCIONA UNA OPCION</option>
                         <option style="background: #c9e8e8" value="MXN" <?php if($GASTO_FIJO=='SI'){echo "selected";} ?>>SI</option>
                         <option style="background: #a3e4d7" value="USD" <?php if($GASTO_FIJO=='NO'){echo "selected";} ?>>NO</option>

                         </select> 
                      
                          </div> 
                 </tr>

                 <tr  style="background: #d2faf1" >  
            
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> PAGAR CADA:</label></th>
             
                 <td>
				 
				 <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" value="<?php echo $PAGAR_CADA; ?>" required="" name="PAGAR_CADA"> 
             <option style="background:#e1f5de " <?php if($PAGAR_CADA=='NINGUNA'){echo "selected";} ?> value="NINGUNA">NINGUNA</option>
             <option style="background:#f5deee " <?php if($PAGAR_CADA=='MES'){echo "selected";} ?> value="MES">MES</option>
                         <option style="background:#d9f9fa " <?php if($PAGAR_CADA=='SEMANA'){echo "selected";} ?> value="SEMANA">SEMANA</option>
                         <option style="background:#e1f5de " <?php if($PAGAR_CADA=='QUINCENA'){echo "selected";} ?> value="QUINCENA">QUINCENA</option>
                       
                         <option style="background:#f5f4de " <?php if($PAGAR_CADA=='AÑO'){echo "selected";} ?> value="AÑO">AÑO</option>
						 </select>
						 
						 </td>

                 </tr>

                 <tr  style="background: #d2faf1" > 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> FECHA DE PROGRAMACIÓN DE PAGO:</label></th> 

                 <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_PPAGO; ?>" name="FECHA_PPAGO" placeholder="FECHA DE PROGRAMACIÓN DE PAGO "></td>
                 </tr>

                 <tr  style="background: #d2faf1" >  
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> FECHA DE TERMINACIÓN DE LA PROGRAMACIÓN:</label></th>
                 <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_TPROGRAPAGO; ?>" name="FECHA_TPROGRAPAGO" placeholder="FECHA DE TERMINACIÓN DE LA PROGRAMACIÓN "></td>
                 </tr>
                 <tr  style="background: #d2faf1" >  

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> NÚMERO DE EVENTO (FIJO) PARA PROGRAMACIÓN:</label></th>
                 <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NUMERO_EVENTOFIJO; ?>" name="NUMERO_EVENTOFIJO" placeholder="NÚMERO DE EVENTO (FIJO) PARA PROGRAMACIÓN "></td>
                 </tr>


                 <tr  style="background: #d2faf1" >  

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> CLASIFICACIÓN GENERAL:</label></th>
                 <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $CLASI_GENERAL; ?>" name="CLASI_GENERAL" placeholder="CLASIFICACIÓN GENERAL: "></td>
                 </tr>


                 <tr  style="background: #d2faf1" >  

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> SUB CLASIFICACIÓN GENERAL:</label></th>
                 <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $SUB_GENERAL; ?>" name="SUB_GENERAL" placeholder=" SUB CLASIFICACIÓN GENERAL"></td>
                 </tr>

                 <tr  style="background: #d2faf1"> 
 
 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">COMPLEMENTOS DE PAGO  (FORMATO PDF)</label></th>
 <td  style="width:300px;">
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'COMPLEMENTOS_PAGO_PDF')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPLEMENTOS_PAGO_PDF" type="text" onkeydown="return false" onclick="file_explorer('COMPLEMENTOS_PAGO_PDF');" VALUE="<?php echo $COMPLEMENTOS_PAGO_PDF; ?>" required /></p>
<input type="file" name="COMPLEMENTOS_PAGO_PDF" id="nono"/>
<div id="1COMPLEMENTOS_PAGO_PDF">
<?php
if($COMPLEMENTOS_PAGO_PDF!=""){echo "<a target='_blank' href='includes/archivos/".$COMPLEMENTOS_PAGO_PDF."'>Visualizar!</a>"; 
}?></div>
</div>
<div id="2COMPLEMENTOS_PAGO_PDF"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('COMPLEMENTOS_PAGO_PDF');
while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['COMPLEMENTOS_PAGO_PDF']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}
?></div> -->

   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPLEMENTOS_PAGO_PDF">	

</td>
 </tr>
 <tr  style="background: #d2faf1"> 


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">COMPLEMENTOS DE PAGO (FORMATO XML)</label></th>
                 <td  style="width:300px;">
<!--
		<div id="drop_file_zone" ondrop="upload_file(event,'COMPLEMENTOS_PAGO_XML')" ondragover="return false" >
		<p>Suelta aquí o busca tu archivo</p>
		<p><input class="form-control form-control-sm" id="COMPLEMENTOS_PAGO_XML" type="text" onkeydown="return false" onclick="file_explorer('COMPLEMENTOS_PAGO_XML');" VALUE="<?php echo $COMPLEMENTOS_PAGO_XML; ?>" required /></p>
		<input type="file" name="COMPLEMENTOS_PAGO_XML" id="nono"/>
		<div id="1COMPLEMENTOS_PAGO_XML">
		<?php
		if($COMPLEMENTOS_PAGO_XML!=""){echo "<a target='_blank' href='includes/archivos/".$COMPLEMENTOS_PAGO_XML."'>Visualizar!</a>"; 
		}?></div>
		</div>
		

				 
				 <div id="2COMPLEMENTOS_PAGO_XML"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('COMPLEMENTOS_PAGO_XML');

while($rowsube=mysqli_fetch_array($listadosube)){
	echo "<a target='_blank' href='includes/archivos/".$rowsube['COMPLEMENTOS_PAGO_XML']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


				 ?></div> 
-->


   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPLEMENTOS_PAGO_XML">	
				 
				 
				 
				 
				 </td>
                 </tr>


                 <tr  style="background: #d2faf1"> 

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR CANCELACIONES (FORMATO PDF)</label></th>
                 <td  style="width:300px;">
<!--
		<div id="drop_file_zone" ondrop="upload_file(event,'CANCELACIONES_PDF')" ondragover="return false" >
		<p>Suelta aquí o busca tu archivo</p>
		<p><input class="form-control form-control-sm" id="CANCELACIONES_PDF" type="text" onkeydown="return false" onclick="file_explorer('CANCELACIONES_PDF');" VALUE="<?php echo $CANCELACIONES_PDF; ?>" required /></p>
		<input type="file" name="CANCELACIONES_PDF" id="nono"/>
		<div id="1CANCELACIONES_PDF">
		<?php
		if($CANCELACIONES_PDF!=""){echo "<a target='_blank' href='includes/archivos/".$CANCELACIONES_PDF."'>Visualizar!</a>"; 
		}?></div>
		</div>
		

				 
				 <div id="2CANCELACIONES_PDF"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('CANCELACIONES_PDF');

while($rowsube=mysqli_fetch_array($listadosube)){
	echo "<a target='_blank' href='includes/archivos/".$rowsube['CANCELACIONES_PDF']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


				 ?></div> 
		-->

   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="CANCELACIONES_PDF">		
				 
				 
				 </td>
                 </tr>

                 <tr  style="background: #d2faf1"> 


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR CANCELACIONES (FORMATO XML)</label></th>
                 <td  style="width:300px;">


<!--
		<div id="drop_file_zone" ondrop="upload_file(event,'CANCELACIONES_XML')" ondragover="return false" >
		<p>Suelta aquí o busca tu archivo</p>
		<p><input class="form-control form-control-sm" id="CANCELACIONES_XML" type="text" onkeydown="return false" onclick="file_explorer('CANCELACIONES_XML');" VALUE="<?php echo $CANCELACIONES_XML; ?>" required /></p>
		<input type="file" name="CANCELACIONES_XML" id="nono"/>
		<div id="1CANCELACIONES_XML">
		<?php
		if($CANCELACIONES_XML!=""){echo "<a target='_blank' href='includes/archivos/".$CANCELACIONES_XML."'>Visualizar!</a>"; 
		}?></div>
		</div>
				 <div id="2CANCELACIONES_XML"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('CANCELACIONES_XML');

while($rowsube=mysqli_fetch_array($listadosube)){
	echo "<a target='_blank' href='includes/archivos/".$rowsube['CANCELACIONES_XML']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}?></div> -->
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="CANCELACIONES_XML">	
				 
				 
				 
				 </td>
                 </tr>

                 <tr style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO PDF)</label></th>
<td  style="width:300px;">
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'ADJUNTAR_FACTURA_DE_COMISION_PDF')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_DE_COMISION_PDF" type="text" onkeydown="return false" onclick="file_explorer('ADJUNTAR_FACTURA_DE_COMISION_PDF');" VALUE="<?php echo $ADJUNTAR_FACTURA_DE_COMISION_PDF; ?>" required /></p>
<input type="file" name="ADJUNTAR_FACTURA_DE_COMISION_PDF" id="nono"/>
<div id="1ADJUNTAR_FACTURA_DE_COMISION_PDF">
<?php
if($ADJUNTAR_FACTURA_DE_COMISION_PDF!=""){echo "<a target='_blank' href='includes/archivos/".$ADJUNTAR_FACTURA_DE_COMISION_PDF."'>Visualizar!</a>"; 
}?></div>
</div>


<div id="2ADJUNTAR_FACTURA_DE_COMISION_PDF"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('ADJUNTAR_FACTURA_DE_COMISION_PDF');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['ADJUNTAR_FACTURA_DE_COMISION_PDF']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


?></div> 
-->
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_FACTURA_DE_COMISION_PDF">	


</td>
</tr>


<tr  style="background: #d2faf1"> 


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO XML)</label></th>
<td  style="width:300px;">
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'ADJUNTAR_FACTURA_DE_COMISION_XML')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_DE_COMISION_XML" type="text" onkeydown="return false" onclick="file_explorer('ADJUNTAR_FACTURA_DE_COMISION_XML');" VALUE="<?php echo $ADJUNTAR_FACTURA_DE_COMISION_XML; ?>" required /></p>
<input type="file" name="ADJUNTAR_FACTURA_DE_COMISION_XML" id="nono"/>
<div id="1ADJUNTAR_FACTURA_DE_COMISION_XML">
<?php
if($ADJUNTAR_FACTURA_DE_COMISION_XML!=""){echo "<a target='_blank' href='includes/archivos/".$ADJUNTAR_FACTURA_DE_COMISION_XML."'>Visualizar!</a>"; 
}?></div>
</div>



<div id="2ADJUNTAR_FACTURA_DE_COMISION_XML"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('ADJUNTAR_FACTURA_DE_COMISION_XML');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['ADJUNTAR_FACTURA_DE_COMISION_XML']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


?></div> -->

   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_FACTURA_DE_COMISION_XML">	


</td>
</tr>


<tr  style="background: #d2faf1">


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR CALCULO DE COMISIÓN: (CUALQUIER FORMATO)</label></th>
<td  style="width:300px;">

<!--<div id="drop_file_zone" ondrop="upload_file(event,'CALCULO_DE_COMISION')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="CALCULO_DE_COMISION" type="text" onkeydown="return false" onclick="file_explorer('CALCULO_DE_COMISION');" VALUE="<?php echo $CALCULO_DE_COMISION; ?>" required /></p>
<input type="file" name="CALCULO_DE_COMISION" id="nono"/>
<div id="1CALCULO_DE_COMISION">
<?php
if($CALCULO_DE_COMISION!=""){echo "<a target='_blank' href='includes/archivos/".$CALCULO_DE_COMISION."'>Visualizar!</a>"; 
}?></div>
</div>



<div id="2CALCULO_DE_COMISION"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('CALCULO_DE_COMISION');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['CALCULO_DE_COMISION']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


?></div> -->




   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="CALCULO_DE_COMISION">

</td>
</tr>



    <tr style="background: #d2faf1">

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MONTO DE COMISIÓN:</label></th>
                 <td>
				
             <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text" class="form-control" id="MONTO_DE_COMISION" required=""   value="<?php echo $MONTO_DE_COMISION; ?>" name="MONTO_DE_COMISION" onkeyup="comasainput('MONTO_DE_COMISION')" placeholder="MONTO DE COMISIÓN">
				
				 </td>
                 </tr> </div> 



<tr style="background: #d2faf1"> 


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR COMPROBANTE DE DEVOLUCIÓN DE DINERO A EPC:(CUALQUIER FORMATO)</label></th>
<td  style="width:300px;">
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'COMPROBANTE_DE_DEVOLUCION')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPROBANTE_DE_DEVOLUCION" type="text" onkeydown="return false" onclick="file_explorer('COMPROBANTE_DE_DEVOLUCION');" VALUE="<?php echo $COMPROBANTE_DE_DEVOLUCION; ?>" required /></p>
<input type="file" name="COMPROBANTE_DE_DEVOLUCION" id="nono"/>
<div id="1COMPROBANTE_DE_DEVOLUCION">
<?php
if($COMPROBANTE_DE_DEVOLUCION!=""){echo "<a target='_blank' href='includes/archivos/".$COMPROBANTE_DE_DEVOLUCION."'>Visualizar!</a>"; 
}?></div>
</div>


<div id="2COMPROBANTE_DE_DEVOLUCION"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('COMPROBANTE_DE_DEVOLUCION');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['CALCULO_DE_COMISION']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


?></div> -->



   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPROBANTE_DE_DEVOLUCION">

</td>
</tr>

  
<tr  style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR NOTA DE CREDITO DE COMPRA: (CUALQUIER FORMATO)</label></th>
<td  style="width:300px;">
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'NOTA_DE_CREDITO_COMPRA')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="NOTA_DE_CREDITO_COMPRA" type="text" onkeydown="return false" onclick="file_explorer('NOTA_DE_CREDITO_COMPRA');" VALUE="<?php echo $NOTA_DE_CREDITO_COMPRA; ?>" required /></p>
<input type="file" name="NOTA_DE_CREDITO_COMPRA" id="nono"/>
<div id="1NOTA_DE_CREDITO_COMPRA">
<?php
if($NOTA_DE_CREDITO_COMPRA!=""){echo "<a target='_blank' href='includes/archivos/".$NOTA_DE_CREDITO_COMPRA."'>Visualizar!</a>"; 
}?></div>
</div>


<div id="2NOTA_DE_CREDITO_COMPRA"><?php $listadosube = $pagoproveedores->Listado_subefacturadocto('NOTA_DE_CREDITO_COMPRA');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['NOTA_DE_CREDITO_COMPRA']."' id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';	
}


?></div> -->


   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="NOTA_DE_CREDITO_COMPRA">

</td>
</tr>



<tr  style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">PÓLIZA NÚMERO:</label></th>
<td><input type="text" class="form-control" id="POLIZA_NUMERO" required=""  value="<?php echo $POLIZA_NUMERO;  ?>" name="POLIZA_NUMERO" placeholder="POLIZA NÚMERO"></td>
</tr>


<tr  style="background:#fcf3cf" > 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">NOMBRE DEL EJECUTIVO QUE REALIZÓ LA COMPRA:</label></th>
<td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $_SESSION["NOMBREUSUARIO"]; ?>" name="NOMBRE_DEL_EJECUTIVO"placeholder="NOMBRE DEL EJECUTIVO"></td>
</tr>


<tr  style="background: #d2faf1"> 


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MACH CON EL ESTADO DE CUENTA:</label></th>
<td>
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'FOTO_ESTADO_PROVEE11')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="FOTO_ESTADO_PROVEE11" type="text" onkeydown="return false" onclick="file_explorer('FOTO_ESTADO_PROVEE11');"  VALUE="<?php echo $FOTO_ESTADO_PROVEE11; ?>" required /></p>
<input type="file" name="FOTO_ESTADO_PROVEE11" id="nono"/>
<div id="1FOTO_ESTADO_PROVEE11">
<?php
if($FOTO_ESTADO_PROVEE11!=""){echo "<a target='_blank' href='includes/archivos/".$FOTO_ESTADO_PROVEE11."'>Visualizar!</a>"; 
}?></div>
</div>


<div id="2FOTO_ESTADO_PROVEE11"><?php 
$listadosube = $pagoproveedores->Listado_subefacturadocto('FOTO_ESTADO_PROVEE11');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['FOTO_ESTADO_PROVEE11']."'  id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';
}


?></div>	
-->

   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="FOTO_ESTADO_PROVEE11">

</td>
</tr>


<tr  style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">OBSERVACIONES:</label></th>
<td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OBSERVACIONES_1; ?>" name="OBSERVACIONES_1"placeholder="OBSERVACIONES 1"></td>
</tr>
<tr style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR ARCHIVO RELACIONADO A ESTE GASTO: (CUALQUIER FORMATO)</label></th>
<td>
<!--
<div id="drop_file_zone" ondrop="upload_file(event,'ADJUNTAR_ARCHIVO_1')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_ARCHIVO_1" type="text" onkeydown="return false" onclick="file_explorer('ADJUNTAR_ARCHIVO_1');"  VALUE="<?php echo $ADJUNTAR_ARCHIVO_1; ?>" required /></p>
<input type="file" name="ADJUNTAR_ARCHIVO_1" id="nono"/>
<div id="1ADJUNTAR_ARCHIVO_1">
<?php
if($ADJUNTAR_ARCHIVO_1!=""){echo "<a target='_blank' href='includes/archivos/".$ADJUNTAR_ARCHIVO_1."'>Visualizar!</a>"; 
}?></div>
</div>


<div id="2ADJUNTAR_ARCHIVO_1"><?php 
$listadosube = $pagoproveedores->Listado_subefacturadocto('ADJUNTAR_ARCHIVO_1');

while($rowsube=mysqli_fetch_array($listadosube)){
echo "<a target='_blank' href='includes/archivos/".$rowsube['ADJUNTAR_ARCHIVO_1']."'  id='A".$rowsube['id']."' >Visualizar!</a> "." <span id='".$rowsube['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span><span > ".$rowsube['fechaingreso']."</span>".'<br/>';
}


?></div>	
-->


   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_ARCHIVO_1">

</td>





                 </tr> 
     
             <td>
         
         <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('d-m-Y'); ?>" name="FECHA_DE_LLENADO">
         
         </td></tr>  
            
				

	<input type="hidden" name="hiddenTIKETS1QA" value="hiddenTIKETS1QA">
	<input type="hidden" name="tipo_documento" value="TIKETS">	
	
	<tr>
				

				<td >	</td>	


   <td style="text-align: right;"><button  class="btn btn-primary" type="button" id="enviarTIKETS">GUARDAR</button><div  id="mensajeTIKETS">

	</td><?php } ?> </tr>
                         

	</table>

 
 
                    </form>
						 

</div>
</div>
</div>
