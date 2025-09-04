
<script type="text/javascript">


function sumar(){
		
      const numberNoCommas = (x) => {
        return x.toString().replace(/,/g, "");
      }

          var arr = document.getElementsByClassName("sum");
      
          var avionMONTO_FACTURA = document.getElementsByName("MONTO_FACTURA")[0].value;
         var avionMONTO_FACTURA2 =avionMONTO_FACTURA.replace(/,/g, '');
      
          var avionMONTO_PROPINA = document.getElementsByName("MONTO_PROPINA")[0].value;
         var avionMONTO_PROPINA2 =avionMONTO_PROPINA.replace(/,/g, '');
		 
		 var avionMONTO_TOTAL_COTIZACION_ADEUDO = document.getElementsByName("MONTO_TOTAL_COTIZACION_ADEUDO")[0].value;
         var avionMONTO_TOTAL_COTIZACION_ADEUDO2 =avionMONTO_TOTAL_COTIZACION_ADEUDO.replace(/,/g, '');
         
          var total=0;
          for(var i=0;i<arr.length;i++){
              if(parseFloat(numberNoCommas(arr[i].value)))
                  total += parseFloat(numberNoCommas(arr[i].value));
          }
         
      const numberWithCommas = (x) => {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }	
      
          document.getElementById('MONTO_DEPOSITARavion').value = numberWithCommas(total);
          document.getElementsByName('MONTO_FACTURA')[0].value = numberWithCommas(avionMONTO_FACTURA2);	
          document.getElementsByName('MONTO_PROPINA')[0].value = numberWithCommas(avionMONTO_PROPINA2);	
          document.getElementsByName('MONTO_TOTAL_COTIZACION_ADEUDO')[0].value = numberWithCommas(avionMONTO_TOTAL_COTIZACION_ADEUDO2);	
      }
      
     

</script>
	
<div id="content">     
			<hr/>
	<strong> <P class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar28" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar28" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;BOLETOS DE AVIÓN</p></strong></div>

<div  id="mensajeAVION2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $pagoaproveedoress ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pagoaproveedoress ; ?>%</div></div></div>


	        <div id="target28" style="display:block;"  class="content2">
      
        <div class="card">
          <div class="card-body">

	  
	<form class="row g-3 needs-validation was-validated" novalidate="" id="pagoAVIONform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	
   <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">

				  
<tr>

<th scope="col">FACTURA </th>
<th scope="col">DATOS</th> 
</tr>
 <tr  style="background: #d2faf1" > 
 
           
                 <th scope="row"> <label  style="width:300px"  for="formFileSm"  class="form-label">ADJUNTAR FACTURA(FORMATO XML)</label></th>
                 <td>
				 
	

		<div id="drop_file_zone" ondrop="upload_file2(event,'ADJUNTAR_FACTURA_XML')" ondragover="return false" >
		<p>Suelta aquí o busca tu archivo</p>
		<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_XML" type="text" onkeydown="return false" onclick="file_explorer2('ADJUNTAR_FACTURA_XML');"  VALUE="<?php echo $ADJUNTAR_FACTURA_XML; ?>" required /></p>
		<input type="file" name="ADJUNTAR_FACTURA_XML" id="nono"/>
		<div id="1ADJUNTAR_FACTURA_XML">
		<?php
		if($ADJUNTAR_FACTURA_XML!=""){echo "<a target='_blank' href='includes/archivos/".$ADJUNTAR_FACTURA_XML."'>Visualizar!</a>"; 
		}?></div>
		</div>
		
		
		</td>
             </tr>
             <tr  style="background: #d2faf1" >  
            
             
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR FACTURA (FORMATO PDF)</label></th>
				 
				 
             <td>
      
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_FACTURA_PDF">	

				 
				 </td>
				 

				 
                 </tr>
             
  
             
  


				 
				 
                 <tr style="background:#fcf3cf"> 
      
            
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
                 <tr style="background:#fcf3cf">
                 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">No. DE EVENTO:</label></th>
                 <td>
				 


<div style="">

<input type="text" class="form-control" required=""  value="<?php echo $NUMERO_EVENTO; ?>" name="NUMERO_EVENTO"  id="NUMERO_EVENTO" placeholder="NÚMERO DE EVENTO" >

</div>


				 
				 </td>
                 </tr>
				 
                 <tr  style="background:#fcf3cf">
                
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">NOMBRE DEL EVENTO:</label></th>
                 <td><input type="text" class="form-control" id="NOMBRE_EVENTO" required=""  value="<?php echo $NOMBRE_EVENTO ?>" name="NOMBRE_EVENTO" placeholder="NOMBRE DEL EVENTO"></td>
                 </tr>
                 <tr  style="background:#fcf3cf">
                 
                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">MOTIVO DEL GASTO:</label></th>
                 <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $MOTIVO_GASTO; ?>" name="MOTIVO_GASTO"placeholder="MOTIVO DEL GASTO "></td>
                 </tr>
                 <tr style="background:#fcf3cf"> 

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">CONCEPTO DE LA FACTURA:</label></th>
                 <td><div id="CONCEPTO_PROVEE2"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $Descripcion; ?>" name="CONCEPTO_PROVEE"placeholder="CONCEPTO DE LA FACTURA"></div></td>
                 </tr>
				 

			 
				          <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">SUB TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text" class="sum" style="width:350px;height:40px;"  id="MONTO_FACTURA"   required="" onkeyup="sumar()"    value="<?php echo number_format($MONTO_FACTURA,2,'.',','); ?>" name="MONTO_FACTURA"    placeholder="SUB TOTAL">
 </div>
 </td>
         </tr>
				 
				 
				 

				 
					          <tr style="background: #d2faf1"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">IVA:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text" class="sum"  style="width:350px;height:40px;"   required="" onkeyup="sumar()" id="MONTO_TOTAL_COTIZACION_ADEUDO" value="<?php echo number_format($MONTO_TOTAL_COTIZACION_ADEUDO,2,'.',','); ?>" name="MONTO_TOTAL_COTIZACION_ADEUDO"   placeholder="IVA">
 </div>
 </td>
         </tr>
				 			 
				 
				 
				 
				 
				 

				 
						          <tr style="background: #d2faf1"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TUA:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"  class="sum" style="width:350px;height:40px;" id="MONTO_PROPINA"  onkeyup="sumar()"   value="<?php echo number_format($MONTO_PROPINA,2,'.',','); ?>" name="MONTO_PROPINA"   placeholder="TUA">
 </div>
 </td>
         </tr>			 
				 
				 
				 
         <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">TOTAL:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="" onkeyup="comasainput('MONTO_DEPOSITAR')" class="form-control" id="MONTO_DEPOSITARavion" required=""  name="MONTO_DEPOSITAR" placeholder="TOTAL">
 </div>
 </td>
         </tr>

				 
					 
				 
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
               
                 <tr  style="background: #d2faf1"> 

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





   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_COTIZACION">	
			 
				 </td>
                 </tr>
                 <tr   style="background:#fcf3cf">  

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">NUMERO DE TARJETA:</label></th>
<td>

<?php 
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


   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPLEMENTOS_PAGO_PDF">	

</td>
 </tr>
 <tr  style="background: #d2faf1"> 


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">COMPLEMENTOS DE PAGO (FORMATO XML)</label></th>
                 <td  style="width:300px;">

				 
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPLEMENTOS_PAGO_XML">				 
				 
				 </td>
                 </tr>


                 <tr  style="background: #d2faf1"> 

                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR CANCELACIONES (FORMATO PDF)</label></th>
                 <td  style="width:300px;">

				 
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="CANCELACIONES_PDF">	
				 
				 
				 
				 
				 </td>
                 </tr>

                 <tr  style="background: #d2faf1"> 


                 <th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR CANCELACIONES (FORMATO XML)</label></th>
                 <td  style="width:300px;">


				 
   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="CANCELACIONES_XML">
				 
				 
				 </td>
                 </tr>

                 <tr style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO PDF)</label></th>
<td  style="width:300px;">



   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_FACTURA_DE_COMISION_PDF">	

</td>
</tr>


<tr  style="background: #d2faf1"> 


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO XML)</label></th>
<td  style="width:300px;">


   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_FACTURA_DE_COMISION_XML">	

</td>
</tr>


<tr  style="background: #d2faf1">


<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR CALCULO DE COMISIÓN: (CUALQUIER FORMATO)</label></th>
<td  style="width:300px;">




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



   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="COMPROBANTE_DE_DEVOLUCION">	

</td>
</tr>

  
<tr  style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label"> ADJUNTAR NOTA DE CREDITO DE COMPRA: (CUALQUIER FORMATO)</label></th>
<td  style="width:300px;">



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




   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="FOTO_ESTADO_PROVEE11">

</td>
</tr>


<tr  style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">OBSERVACIONES:</label></th>
<td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OBSERVACIONESA; ?>" name="OBSERVACIONESA"placeholder="OBSERVACIONES "></td>
</tr>
<tr style="background: #d2faf1"> 

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">ADJUNTAR ARCHIVO RELACIONADO A ESTE GASTO: (CUALQUIER FORMATO)</label></th>
<td>



   <input type="file" class="form-control" id="validationCustom01" value="" required="" name="ADJUNTAR_ARCHIVO_1">

</td>





                 </tr> 
     
             <td>
         
         <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('d-m-Y'); ?>" name="FECHA_DE_LLENADO">
         
         </td></tr>  
            
				

	<input type="hidden" name="hiddenTIKETS1QA" value="hiddenTIKETS1QA">
	<input type="hidden" name="tipo_documento" value="AVION">	
				
	<tr>
				
	<?php if($conexion->variablespermisos('','PAGOS_BOLETOS_AVION','guardar')=='si'){ ?>
				<td >		


   <td style="text-align: right;"><button  class="btn btn-primary" type="button" id="enviarAVION">GUARDAR</button><div  id="mensajeAVION">

	</td><?php } ?></tr>
                         

	</table> 

 
 
                    </form>
						 
</div>
</div>


</div>


