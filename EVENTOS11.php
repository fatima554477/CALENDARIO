

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>					
<script >						

        function calcular(){
		
const numberNoCommas = (x) => {
  return x.toString().replace(/,/g, "");
}

    var arr = document.getElementsByClassName("tol");

    var MONTOC_TOTAL_EVENTO = document.getElementsByName("MONTOC_TOTAL_EVENTO")[0].value;
	var MONTOC_TOTAL_EVENTO2 =MONTOC_TOTAL_EVENTO.replace(/,/g, '');

    var MONTO_TOTAL_AVION = document.getElementsByName("MONTO_TOTAL_AVION")[0].value;
	var MONTO_TOTAL_AVION2 =MONTO_TOTAL_AVION.replace(/,/g, '');
	
	var FEE_COBRADO = document.getElementsByName("FEE_COBRADO")[0].value;
	var FEE_COBRADO2 =FEE_COBRADO.replace(/,/g, '');
	
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(numberNoCommas(arr[i].value)))
            tot += parseFloat(numberNoCommas(arr[i].value));
    }
	
const numberWithCommas = (x) => {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}	

    document.getElementById('MONTO_TOTAL_DEL_EVENTO').value = numberWithCommas(tot);
	document.getElementsByName('FEE_COBRADO')[0].value = numberWithCommas(FEE_COBRADO2);
    document.getElementsByName('MONTO_TOTAL_AVION')[0].value = numberWithCommas(MONTO_TOTAL_AVION2);	
    document.getElementsByName('MONTOC_TOTAL_EVENTO')[0].value = numberWithCommas(MONTOC_TOTAL_EVENTO2);
}

$("#tot").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

       function actualizarFechaDestino() {
            // Obtener el valor del campo de origen (fecha)
            let fechaOrigen = document.getElementById("FECHA_FINAL_EVENTO").value;

            // Verificar si se ingresó una fecha válida
            if (fechaOrigen) {
                // Convertir la fecha a un objeto Date
                let fecha = new Date(fechaOrigen);

                // Agregar 30 días a la fecha
                fecha.setDate(fecha.getDate() + 30);

                // Formatear la nueva fecha en YYYY-MM-DD
                let nuevaFecha = fecha.toISOString().split('T')[0];

                // Asignar la nueva fecha al campo de destino
                document.getElementById("CIERRE_TOTAL").value = nuevaFecha;
            } else {
                // Si no hay fecha en el campo de origen, limpiar el campo de destino
                document.getElementById("CIERRE_TOTAL").value = "";
            }
        }

$(document).ready(function() {
    // Detectamos cambios en el campo STATUS_EVENTO
    $('#STATUS_EVENTO').change(function() {
        // Obtenemos el valor seleccionado
        var status = $(this).val();
        
        // Si el status es "APROBADO"
        if(status === 'APROBADO') {
            // Obtenemos la fecha actual en formato YYYY-MM-DD (formato input date)
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Enero es 0
            var year = today.getFullYear();
            var fechaActual = year + '-' + month + '-' + day;
            
            // Asignamos la fecha al campo FECHA_AUTORIZACION_EVENTO
            $('#FECHA_AUTORIZACION_EVENTO').val(fechaActual);
        } else {
            // Opcional: Limpiar el campo si no está aprobado
            // $('#FECHA_AUTORIZACION_EVENTO').val('');
        }
    });
});

$(document).ready(function() {
 
    var $tipoEvento = $('#TIPO_DE_EVENTO');
    
   
    if($tipoEvento.val() !== '') {
     
        $tipoEvento.prop('disabled', true);
        

    }
    
  
    $('form').submit(function() {
       
        $tipoEvento.prop('disabled', false);
        return true;
    });
});




</script>

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar1" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar1" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;  EVENTO </p></strong></div>


<div  id="mensajeALTAEVENTOS2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target1" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
                
                      <form class="row g-3 needs-validation was-validated" id="ALTAEVENTOSform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">



                      
                      <tr style="background:#efdcf0">

<th scope="row"> <label for="validationCustom03" class="form-label">No. DE EVENTO:</label></th>
<td>

<span id="refreshnumevento">
<?php 

$NUMERO_EVENTO = $altaeventos->refresca_num_evento();

?>
<input type="text" class="form-control" required=""  value="<?php echo $NUMERO_EVENTO; ?>" name="NUMERO_EVENTO" id="NUMERO_EVENTO" placeholder="No. DE EVENTO" readonly="readonly" >
</span>

</td>
</tr>
				 
         <tr  style="background:#efdcf0"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE ALTA DEL EVENTO:</label></th>
         <td>


 <input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_ALTA_EVENTO; ?>" name="FECHA_ALTA_EVENTO" readonly="readonly">

 
 </div>

 </td>  </tr> 
         <tr   style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DEL VENDEDOR:</label></th>
         <td>


 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_VENDEDOR; ?>" name="NOMBRE_VENDEDOR" readonly="readonly">



 </td>  </tr>  
          <tr   style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DEL RESPONSABLE DEL EVENTO:</label></th>
         <td>


 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_EJECUTIVOEVENTO; ?>" name="NOMBRE_EJECUTIVOEVENTO" readonly="readonly">



 </td>  </tr> 
          <tr   style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DEL EJECUTIVO QUE INGRESO ESTÉ EVENTO::</label></th>
         <td>


 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_INGRESO; ?>" name="NOMBRE_INGRESO" readonly="readonly">



 </td>  </tr>  
 
 	<?php if($conexion->variablespermisos('','cierremodifica','ver')=='si'){ ?>
            <tr  style="background:#fcf3cf"> 
                 <th scope="row"> 
				 
				 
				 <label  style="width:300px" for="validationCustom03" class="form-label">FECHA BLOQUEO DEL EVENTO:</label></th>
               <td>
		 
		 <input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $CIERRE_TOTAL; ?>" name="CIERRE_TOTAL" placeholder="CIERRE" <?php if($CIERRE_TOTAL!=''){echo 'readonly="readonly"'; } ?>>
		 
		 </td>
         </tr>
 <?php } ?>		 
<!--disabled-->

<tr style="background:#fcf3cf">
    <th> 
        <strong><label for="validationCustom03" class="form-label">STATUS DEL EVENTO:</label></strong>  
    </th>
    <td class="form-control">
        <span id="desplegadoreset">
            <?php
            $encabezado = '';
            $option = '';
            $queryper = $conexion->desplegables07('ALTA_EVENTOS','STATUS_EVENTO');
            
            // Almacenar y ordenar opciones
            $opciones = array();
            while($row1 = mysqli_fetch_array($queryper)) {
                $opciones[] = $row1;
            }
            usort($opciones, function($a, $b) {
                return strcasecmp($a['nombre_campo'], $b['nombre_campo']);
            });
            
            // Generar HTML
            $encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="STATUS_EVENTO" required="" name="STATUS_EVENTO">
                           <option value="">SELECCIONA UNA OPCIÓN</option>';
            $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
            $num = 0;
            
            foreach($opciones as $row1) {
                $num = ($num == 8) ? 0 : $num + 1;
                $select = ($STATUS_EVENTO == $row1['nombre_campo']) ? "selected" : "";
                $option900 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['nombre_campo'].'">'.strtoupper($row1['nombre_campo']).'</option>';
            }
            echo $encabezado.$option900.'</select>';			
            ?>        
        </span>
    </td>
</tr>
           <tr  style="background:#fcf3cf"> 
                 <th scope="row"> 
				 
				 
				 <label  style="width:300px" for="validationCustom03" class="form-label">TIPO DE MONEDA O DIVISA:</label></th>
               <td>
		 
		 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $MONEDAS; ?>" name="MONEDAS" placeholder="MONEDA" <?php if($MONEDAS!=''){echo 'readonly="readonly"'; } ?>>
		 
		 </td>
         </tr>         
      


         <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE AUTORIZACIÓN DEL EVENTO POR PARTE DEL CLIENTE:</label></th>
         <td>

 <input type="date" class="form-control" id="FECHA_AUTORIZACION_EVENTO" required=""  value="<?php echo $FECHA_AUTORIZACION_EVENTO;  ?>" name="FECHA_AUTORIZACION_EVENTO" placeholder="FECHA DE AUTORIZACIÓN DEL EVENTO" readonly="readonly">
 </div>
 </td>
         </tr>
        
        <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">MONTO TOTAL COTIZADO DEL EVENTO<a style="color:red;font:7px">     CON IVA Y SIN BOLETOS DE AVION</a></label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"  style="width:400px;height:40px;background:#f5eef9"  id="tol" required="" onkeyup="calcular()"  value="<?php echo number_format($MONTOC_TOTAL_EVENTO,2,'.',','); ?>" name="MONTOC_TOTAL_EVENTO" class="tol"      placeholder=" MONTO TOTAL COTIZADO DEL EVENTO" <?php if($MONTOC_TOTAL_EVENTO>0.01){echo 'readonly="readonly"';}?> >
 </div>
 </td>
         </tr>
		 
		         <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">MONTO TOTAL COTIZADO  DEL EVENTO<a style="color:red;font:7px">    SIN IVA Y SIN BOLETOS DE AVION</a></label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"  style="width:400px;height:40px;background:#f5eef9"  id=""  value="<?php echo number_format($CANTIDAD_PORCENTAJEV,2,'.',',');  ?>" name="CANTIDAD_PORCENTAJEV" class=""      placeholder=" MONTO TOTAL COTIZADO DEL EVENTO" <?php if($CANTIDAD_PORCENTAJEV>0.01){echo 'readonly="readonly"';} ?>>
 </div>
 </td>
         </tr>
        
         <tr style="background:#fcf3cf">                                           
         <th scope="row"> <label for="validationCustom03" class="form-label">MONTO TOTAL COTIZADO DE BOLETOS DE AVION<a style="color:red;font:7px">     CON IVA </a>:</label></th>
        
         <td> <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:400px;height:40px;background:#f5eef9"  id="tol" required="" onkeyup="calcular()"  value="<?php echo number_format($MONTO_TOTAL_AVION,2,'.',','); ?>" name="MONTO_TOTAL_AVION" class="tol" placeholder="MONTO TOTAL COTIZADO DE BOLETOS DE AVION" <?php if($MONTO_TOTAL_AVION>0.01){echo 'readonly="readonly"';} ?>></td>
         </div></tr>
		 
		         <tr style="background:#fcf3cf">                                           
       <th scope="row"> <label for="validationCustom03" class="form-label">MONTO TOTAL COTIZADO DE BOLETOS DE AVION<a style="color:red;font:7px">         SIN IVA </a>:</label></th>
        
         <td> <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:400px;height:40px;background:#f5eef9"   onkeyup="comasainput('TOTAL_AVION_SINIVA')"  value="<?php echo number_format($TOTAL_AVION_SINIVA,2,'.',','); ?>" name="TOTAL_AVION_SINIVA" placeholder="MONTO TOTAL COTIZADO DE BOLETOS DE AVION SIN IVA" <?php if($TOTAL_AVION_SINIVA>0.01){echo 'readonly="readonly"';} ?>></td>
         </div></tr>
		 
		 
		 
		 
		 
		              <tr  style="background:#fcf3cf">                                           
         <th scope="row"> <label for="validationCustom03" class="form-label"> PORCENTAJE  FEE COBRADO AL CLIENTE:</label></th>
        
         <td> <div class="input-group mb-3"> <span class="input-group-text">%</span><input type="text"  style="width:450px;height:40px;background:#f5eef9"   required="" 
		 value="<?php echo $PORCENTAJE_FEE; ?>" name="PORCENTAJE_FEE"  placeholder="PORCENTAJE  FEE COBRADO AL CLIENTE" readonly="readonly"></td>
         </div></tr>
		 
		 <tr  style="background:#fcf3cf">                                           
         <th scope="row"> <label for="validationCustom03" class="form-label">FEE COBRADO AL CLIENTE:</label></th>
        
         <td> <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;background:#f5eef9"  id="tol" required="" onkeyup="calcular()"  value="<?php echo number_format($FEE_COBRADO,2,'.',','); ?>" name="FEE_COBRADO" class="tol" placeholder="FEE COBRADO AL CLIENTE" readonly="readonly"></td>
         </div></tr>
        
           <tr  style="background:#efdcf0"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">MONTO TOTAL DEL EVENTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:400px;height:40px;background:#f5eef9"  class="form-control" id="MONTO_TOTAL_DEL_EVENTO" required="" id="tol" value="<?php echo number_format($MONTO_TOTAL_DEL_EVENTO,2,'.',','); ?>" name="MONTO_TOTAL_DEL_EVENTO" placeholder="MONTO TOTAL DEL EVENTO:" <?php if($MONTO_TOTAL_DEL_EVENTO>0.01){echo 'readonly="readonly"';} ?>>
 </div>
 </td>
         </tr>





		

         <tr style="background:#fcf3cf"> 
       <th><label for="validationCustom02" class="form-label"> NOMBRE FISCAL O RAZÓN SOCIAL DE LA EMPRESA (CLIENTE):</label></th>
        <td>
		 
		 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_FISCAL_EVENTO; ?>" name="NOMBRE_FISCAL_EVENTO" placeholder="NOMBRE FISCAL DE LA EMPRESA (CLIENTE)" <?php if($NOMBRE_FISCAL_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
		 
		 </td>
         </tr>




         <tr style="background: #efdcf0">
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE COMERCIAL DE LA EMPRESA (CLIENTE):</label></th>
         <td>
		 
		 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_COMERCIAL_EVENTO; ?>" name="NOMBRE_COMERCIAL_EVENTO" placeholder="NOMBRE COMERCIAL DE LA EMPRESA (CLIENTE)" <?php if($NOMBRE_COMERCIAL_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
		 
		 </td>
         </tr>
        
         <tr style="background: #efdcf0"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DEL EVENTO:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_EVENTO; ?>" name="NOMBRE_EVENTO" placeholder="NOMBRE DEL EVENTO" <?php if($NOMBRE_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
      
        <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE CORTO DEL EVENTO:</label></th>
         <td>

 <input type="text" class="form-control" id="tot" required=""  value="<?php echo $NOMBRE_CORTO_EVENTO; ?>" name="NOMBRE_CORTO_EVENTO" placeholder="NOMBRE CORTO DEL EVENTO" <?php if($NOMBRE_CORTO_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>








         <tr style="background: #efdcf0"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">NOMBRE DEL CONTACTO CLIENTE:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NOMBRE_CONTACTO_EVENTO; ?>" name="NOMBRE_CONTACTO_EVENTO" placeholder="NOMBRE DEL CONTACTO CLIENTE 1" <?php if($NOMBRE_CONTACTO_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
         <tr style="background: #efdcf0">
         <th scope="row"> <label for="validationCustom03" class="form-label">CÉLULAR DEL CONTACTO CLIENTE:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $CELULAR_CONTACTO_1; ?>" name="CELULAR_CONTACTO_1" placeholder="CELULAR DEL CONTACTO CLIENTE 1" <?php if($CELULAR_CONTACTO_1!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>
        
         <tr style="background: #efdcf0"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">CORREO DEL CONTACTO CLIENTE:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $CORREO_CONTACTO_1; ?>" name="CORREO_CONTACTO_1" placeholder="CORREO DEL CONTACTO CLIENTE 1" <?php if($CORREO_CONTACTO_1!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
         <tr style="background: #efdcf0">  

         <th scope="row"> <label for="validationCustom03" class="form-label">DEPARTAMENTO O ÁREA DEL CONTACTO CLIENTE 1:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $AREA_CONTACTO_CLIENTE; ?>" name="AREA_CONTACTO_CLIENTE"placeholder="AREA DEL CONTACTO CLIENTE 1" <?php if($AREA_CONTACTO_CLIENTE!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>
         	 
         <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">OBSERVACIONES:     </label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $OBSERVACIONES_1; ?>" name="OBSERVACIONES_1" placeholder="OBSERVACIONES 1" <?php if($OBSERVACIONES_1!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>


<tr style="background:#fcf3cf">
    <th> 
        <strong><label for="validationCustom03" class="form-label">TIPO DE EVENTO:</label></strong>  
    </th>
    <td>
        <span id="desplegadoreset">
            <?php
            $encabezado = '';
            $option = '';
            $queryper = $conexion->desplegables07('ALTA_EVENTOS','TIPO_EVENTO');
            
            // Almacenar todas las opciones en un arreglo
            $opciones = array();
            while($row1 = mysqli_fetch_array($queryper)) {
                $opciones[] = $row1;
            }
            
            // Ordenar alfabéticamente (sin distinguir mayúsculas/minúsculas)
            usort($opciones, function($a, $b) {
                return strcasecmp($a['nombre_campo'], $b['nombre_campo']);
            });
            
            $encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="TIPO_DE_EVENTO" required="" name="TIPO_DE_EVENTO">
                           <option value="">SELECCIONA UNA OPCIÓN</option>';
            $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
            $num = 0;
            $option56 = ''; // Añade esto antes del foreach

            foreach($opciones as $row1) {
                if($num == 8) { 
                    $num = 0; 
                } else { 
                    $num++; 
                }
                $select = ($TIPO_DE_EVENTO == $row1['nombre_campo']) ? "selected" : "";
                $option56 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['nombre_campo'].'">'.strtoupper($row1['nombre_campo']).'</option>';
            }
            echo $encabezado.$option56.'</select>';			
            ?>		
        </span>
    </td>
</tr>

         


                 <tr style="background:#fcf3cf">    
<th> <strong><label for="validationCustom03" class="form-label">FORMATO DEL EVENTO:</label></strong>  </th>
                        <td>  <select class="form-select mb-3" style="background:#f5eef9"  aria-label="Default select example" id="" required="" name="FORMATO_EVENTO" <?php if($FORMATO_EVENTO=='PRESENCIAL' or $FORMATO_EVENTO=='VIRTUAL' or $FORMATO_EVENTO=='HIBRIDO'){$DESHABILITAR = 'disabled';}?>>
                         <option selected="" <?php echo $DESHABILITAR; ?>>SELECCIONA UNA OPCION</option>

                       
                         <option style="background:#d9f9fa " <?php if($FORMATO_EVENTO=='PRESENCIAL'){echo "selected";} ?> value="PRESENCIAL"<?php echo $DESHABILITAR; ?>>PRESENCIAL</option>
                         <option style="background:#eff9eb " <?php if($FORMATO_EVENTO=='VIRTUAL'){echo "selected";} ?> value="VIRTUAL"<?php echo $DESHABILITAR; ?>>VIRTUAL</option>
                         <option style="background:#e1f5de " <?php if($FORMATO_EVENTO=='HIBRIDO'){echo "selected";} ?> value="HIBRIDO"<?php echo $DESHABILITAR; ?>>HIBRIDO</option>
                  

						 </select>
						 
						 </td>

         </tr>
		 <tr style="background:#fcf3cf">    

<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">PAÍS DONDE SE LLEVARA A CABO EL EVENTO:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $PAIS_DEL_EVENTO; ?>" name="PAIS_DEL_EVENTO"placeholder="PAIS DEL EVENTO" <?php if($PAIS_DEL_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>


         <tr style="background:#fcf3cf">    
         <th scope="row"> <label for="validationCustom03" class="form-label">CIUDAD DONDE SE LLEVARA A CABO EL EVENTO:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $CIUDAD_DEL_EVENTO; ?>" name="CIUDAD_DEL_EVENTO" placeholder="CIUDAD DONDE SE LLEVARA A CABO EL EVENTO" <?php if($CIUDAD_DEL_EVENTO!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>
        
		 <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">HOTEL O LUGAR:</label></th>
         <td>

 <input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $HOTEL_LUGAR; ?>" name="HOTEL_LUGAR"placeholder="HOTEL O LUGAR" <?php if($HOTEL_LUGAR!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
         <tr style="background:#fcf3cf">      

         <th scope="row"> <label for="validationCustom03" class="form-label">NÚMERO DE PERSONAS:</label></th>
         <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NUMERO_DE_PERSONAS; ?>" name="NUMERO_DE_PERSONAS"placeholder="NUMERO DE PERSONAS" <?php if($NUMERO_DE_PERSONAS!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>
     
        
		 <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA INICIO DEL EVENTO:</label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_INICIO_EVENTO; ?>" name="FECHA_INICIO_EVENTO"placeholder="DIA DE INICIO DEL EVENTO" <?php if($FECHA_INICIO_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
        
          <tr style="background:#fcf3cf">     
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE INICIO DEL EVENTO:</label></th>
         <td ><input type="time" class="form-control" required=""  value="<?php echo $NOMBRE_COMERCIAL; ?>" name="NOMBRE_COMERCIAL" placeholder="HORA DE INICIO DEL EVENTO" <?php if($NOMBRE_COMERCIAL!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>

        <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA FINAL DEL EVENTO:</label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_FINAL_EVENTO; ?>" name="FECHA_FINAL_EVENTO" placeholder="FECHA FINAL DEL EVENTO" <?php if($FECHA_FINAL_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>

        
          <tr style="background:#fcf3cf">     
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE TERMINO EVENTO:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""  value="<?php echo $HORA_TERMINO_EVENTO; ?>" name="HORA_TERMINO_EVENTO"placeholder="HORA DE TERMINO EVENTO" <?php if($HORA_TERMINO_EVENTO!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
		 <tr style="background:#fcf3cf"> 

         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA LLEGADA DEL STAFF:</label></th>
         <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_LLEGADA_STAFF; ?>" name="FECHA_LLEGADA_STAFF" placeholder="DIA DE LLEGADA DEL STAFF" <?php if($FECHA_LLEGADA_STAFF!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>

        
          <tr style="background:#fcf3cf">     
         <th scope="row"> <label for="validationCustom03" class="form-label">HORA LLEGADA DEL STAFF:</label></th>
         <td>

 <input type="time" class="form-control" id="validationCustom03" required=""  value="<?php echo $HORA_LLEGADA_STAFF; ?>" name="HORA_LLEGADA_STAFF" placeholder="HORA DE TERMINO EVENTO" <?php if($HORA_LLEGADA_STAFF!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
    
        
		 <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">FECHA  REGRESO DEL STAFF:</label></th>
         <td>

 <input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_REGRESO_STAFF; ?>" name="FECHA_REGRESO_STAFF" placeholder="FECHA DE REGRESO DEL STAFF" <?php if($FECHA_REGRESO_STAFF!=''){echo 'readonly="readonly"'; } ?>>
 </div>
 </td>
         </tr>
          <tr style="background:#fcf3cf">    

         <th scope="row"> <label for="validationCustom03" class="form-label">HORA REGRESO DEL STAFF:</label></th>
         <td><input type="time" class="form-control" id="validationCustom03" required=""  value="<?php echo $HORA_REGRESO_STAFF; ?>" name="HORA_REGRESO_STAFF" placeholder="HORA DE REGRESO DEL STAFF" <?php if($HORA_REGRESO_STAFF!=''){echo 'readonly="readonly"'; } ?>></td>
         </tr>



                 <tr style="background:#fcf3cf">
		<th scope="row"> <label  style="width:300px" for="validationCustom03" class="form-label">REQUIERE DE MATERIAL Y EQUIPO DE BODEGA?</label></th>    
		<td><select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="MATERIAL_EQUIPO_BODEGA" <?php if($MATERIAL_EQUIPO_BODEGA=='SI' or $MATERIAL_EQUIPO_BODEGA=='NO'){$DESHABILITAR = 'disabled';}?>>
                         <option selected="" <?php echo $DESHABILITAR; ?>>SELECCIONA UNA OPCION</option>
		<option style="background: #c9e8e8" value="SI" <?php if($MATERIAL_EQUIPO_BODEGA=='SI'){echo "selected";}  ?> value="SI"<?php echo $DESHABILITAR; ?>>SI</option>
		<option style="background: #a3e4d7" value="NO" <?php if($MATERIAL_EQUIPO_BODEGA=='NO'){echo "selected";}  ?> value="NO"<?php echo $DESHABILITAR; ?>>NO</option>
		</select> 
		</div> 
		</tr>
        <tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE INICIO DE MONTAJE:</label></th>
        <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_INICIO_MONTAJE; ?>" name="FECHA_INICIO_MONTAJE" placeholder="FECHA DE INICIO DE MONTAJE" <?php if($FECHA_INICIO_MONTAJE!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>
		<tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE INICIO DE MONTAJE:</label></th>
        <td><input type="time" class="form-control" id="validationCustom03" required=""  value="<?php echo $HORA_INICIO_MONTAJE; ?>" name="HORA_INICIO_MONTAJE" placeholder="HORA DE INICIO DE MONTAJE" <?php if($HORA_INICIO_MONTAJE!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>
        <tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">FECHA DE DESMONTAJE:</label></th>
        <td><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHA_DESMONTAJE; ?>" name="FECHA_DESMONTAJE" placeholder="FECHA DE DESMONTAJE" <?php if($FECHA_DESMONTAJE!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>
		<tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">HORA DE INICIO DE DESMONTAJE:</label></th>
        <td><input type="time" class="form-control" id="validationCustom03" required=""  value="<?php echo $HORA_DESMONTAJE; ?>" name="HORA_DESMONTAJE" placeholder="HORA DE INICIO DE DESMONTAJE" <?php if($HORA_DESMONTAJE!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>
        <tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">LUGAR DE MONTAJE Y DESMONTAJE:</label></th>
        <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $LUGAR_MONTAJE; ?>" name="LUGAR_MONTAJE" placeholder="LUGAR DE MONTAJE Y DESMONTAJE" <?php if($LUGAR_MONTAJE!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>






		<tr style="background:#fcf3cf">  
    <th scope="row"> <label for="validationCustom03" class="form-label">ADJUNTAR ARCHIVO RELACIONADO CON EL MONTAJE:</label></th> <td>
    <div id="drop_file_zone" ondrop="upload_file(event,'ARCHIVO_RELACIONADO_MONTAJE')" ondragover="return false" ><p>Suelta aquí o busca tu archivo</p>
	<p><input class="form-control form-control-sm" id="ARCHIVO_RELACIONADO_MONTAJE" type="text" onkeydown="return false" onclick="file_explorer('ARCHIVO_RELACIONADO_MONTAJE');"  VALUE="<?php echo $ARCHIVO_RELACIONADO_MONTAJE; ?>" required /></p>
    <input type="file" name="ARCHIVO_RELACIONADO_MONTAJE" id="nono"/>

     </div>         
     <div id="2ARCHIVO_RELACIONADO_MONTAJE"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('ARCHIVO_RELACIONADO_MONTAJE',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);
     while($row2=mysqli_fetch_array($querycontras2)){
    echo "<a target='_blank' href='includes/archivos/".$row2['ARCHIVO_RELACIONADO_MONTAJE']."' id='A".$row2['id']."' >Visualizar!</a> "." <span > ".$row2['fecha']."</span>".'<br/>';
     }
    ?></div>				 
    </td></tr>

        <tr style="background:#fcf3cf"> 
        <th scope="row"> <label for="validationCustom03" class="form-label">SERVICIOS PARA OTORGAR:</label></th>
        <td><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $SERVICIO_OTORGAR; ?>" name="SERVICIO_OTORGAR" placeholder="SERVICIOS PARA OTORGAR" <?php if($SERVICIO_OTORGAR!=''){echo 'readonly="readonly"'; } ?>></td>
        </tr>







          <tr style="background:#fcf3cf">     

         <th scope="row"> <label for="validationCustom03" class="form-label">SUBIR COTIZACIÓN PARA EL CLIENTE:</label></th>
         <td>
  <div id="drop_file_zone" ondrop="upload_file(event,'SUBIR_COTIZACION')" ondragover="return false" >
  <p>Suelta aquí o busca tu archivo</p>
  <p><input class="form-control form-control-sm" id="SUBIR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer('SUBIR_COTIZACION');"  VALUE="<?php echo $SUBIR_COTIZACION; ?>" required /></p>
  <input type="file" name="SUBIR_COTIZACION" id="nono"/>

  </div>         
         <div id="2SUBIR_COTIZACION"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('SUBIR_COTIZACION',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['SUBIR_COTIZACION']."' id='A".$row2['id']."' >Visualizar!</a> "." <span > ".$row2['fecha']."</span>".'<br/>';	
}
?></div>				 
         </td></tr>
         
		 <tr style="background:#fcf3cf">  

         <th scope="row"> <label for="validationCustom03" class="form-label">SUBIR ORDEN DE COMPRA DEL CLIENTE:</label></th>
         <td>
  <div id="drop_file_zone" ondrop="upload_file(event,'SUBIR_ORDEN_COMPRA')" ondragover="return false" >
  <p>Suelta aquí o busca tu archivo</p>
  <p><input class="form-control form-control-sm" id="SUBIR_ORDEN_COMPRA" type="text" onkeydown="return false" onclick="file_explorer('SUBIR_ORDEN_COMPRA');"  VALUE="<?php echo $SUBIR_ORDEN_COMPRA; ?>" required /></p>
  <input type="file" name="SUBIR_ORDEN_COMPRA" id="nono"/>

  </div>         
         <div id="2SUBIR_ORDEN_COMPRA"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('SUBIR_ORDEN_COMPRA',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['SUBIR_ORDEN_COMPRA']."' id='A".$row2['id']."' >Visualizar!</a>  "." <span > ".$row2['fecha']."</span>".'<br/>';
}
?></div>				 
         </td></tr>




       <tr style="background:#fcf3cf">     

         <th scope="row"> <label for="validationCustom03" class="form-label">SUBIR CONTRATO FIRMADO:</label></th>
         <td>
  <div id="drop_file_zone" ondrop="upload_file(event,'SUBIR_CONTRATO_FIRMADO')" ondragover="return false" >
  <p>Suelta aquí o busca tu archivo</p>
  <p><input class="form-control form-control-sm" id="SUBIR_CONTRATO_FIRMADO" type="text" onkeydown="return false" onclick="file_explorer('SUBIR_CONTRATO_FIRMADO');"  VALUE="<?php echo $SUBIR_CONTRATO_FIRMADO; ?>" required /></p>
  <input type="file" name="SUBIR_CONTRATO_FIRMADO" id="nono"/>

  </div>         
         <div id="2SUBIR_CONTRATO_FIRMADO"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('SUBIR_CONTRATO_FIRMADO',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['SUBIR_CONTRATO_FIRMADO']."' id='A".$row2['id']."' >Visualizar!</a>  "." <span > ".$row2['fecha']."</span>".'<br/>';	
}
?></div>				 
         </td></tr>


        <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">SUBIR COTIZACIÓN FIRMADA POR EL CLIENTE AUTORIZANDO EL EVENTO:</label></th>
         <td>
  <div id="drop_file_zone" ondrop="upload_file(event,'SUBIR_COTIZACION_FIRMADA')" ondragover="return false" >
  <p>Suelta aquí o busca tu archivo</p>
  <p><input class="form-control form-control-sm" id="SUBIR_COTIZACION_FIRMADA" type="text" onkeydown="return false" onclick="file_explorer('SUBIR_COTIZACION_FIRMADA');"  VALUE="<?php echo $SUBIR_COTIZACION_FIRMADA; ?>" required /></p>
  <input type="file" name="SUBIR_COTIZACION_FIRMADA" id="nono"/>

  </div>         
         <div id="2SUBIR_COTIZACION_FIRMADA"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('SUBIR_COTIZACION_FIRMADA',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['SUBIR_COTIZACION_FIRMADA']."' id='A".$row2['id']."' >Visualizar!</a> "." 

<span > ".$row2['fecha']."</span>".'<br/>';	
}
?></div>				 
         </td></tr>
              
          <tr style="background:#fcf3cf">     

<th scope="row"> <label for="validationCustom03" class="form-label">LOGO DEL CLIENTE:</label></th>
<td>
<div id="drop_file_zone" ondrop="upload_file(event,'LOGO_CLIENTE')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="LOGO_CLIENTE" type="text" onkeydown="return false" onclick="file_explorer('LOGO_CLIENTE');"  VALUE="<?php echo $LOGO_CLIENTE; ?>" required /></p>
<input type="file" name="LOGO_CLIENTE" id="nono"/>

</div>         
<div id="2LOGO_CLIENTE"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('LOGO_CLIENTE',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['LOGO_CLIENTE']."' id='A".$row2['id']."' >Visualizar!</a> "." 

<span > ".$row2['fechaingreso']."</span>".'<br/>';	
}
?></div>				 
</td></tr>





        <tr style="background:#fcf3cf"> 
         <th scope="row"> <label for="validationCustom03" class="form-label">IMÁGEN DEL EVENTO:</label></th>
<td>
<div id="drop_file_zone" ondrop="upload_file(event,'IMAGEN_EVENTO')" ondragover="return false" >
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="IMAGEN_EVENTO" type="text" onkeydown="return false" onclick="file_explorer('IMAGEN_EVENTO');"  VALUE="<?php echo $IMAGEN_EVENTO; ?>" required /></p>
<input type="file" name="IMAGEN_EVENTO" id="nono"/>

</div>         
<div id="2IMAGEN_EVENTO"><?php $querycontras2 = $altaeventos->Listado_fotoseventostemporal('IMAGEN_EVENTO',date('Y-m-d'),$_SESSION['idem'],$_SESSION['idevento']);

while($row2=mysqli_fetch_array($querycontras2)){
echo "<a target='_blank' href='includes/archivos/".$row2['IMAGEN_EVENTO']."' id='A".$row2['id']."' >Visualizar!</a>  "." ".$row2['fecha']."</span>".'<br/>';
}
?></div>				 
</td></tr>
 
                  </table>
				  
<table><tr>


    <input type="hidden" value="<?php echo $IPaltaeventos; ?>" name="IPaltaeventos" id="IPaltaeventos"/>
 
                                    
    <input type="hidden" value="hALTAEVENTOS" name="hALTAEVENTOS"/>     
 
        
 <td>
           
</td>
      
<?php if($conexion->variablespermisos('','EVENTOS1','guardar')=='si' and $var_bloquea_fecha=='no'){ ?>
 <td>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"  type="button" id="ENVIAR_EVENTOS" name="ENVIAR_EVENTOS">GUARDAR</button><div style="
 position: absolute;
    top:98%; 
    right: 50%;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2em;
    font-weight: 800;
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
    1px 30px 60px rgba(16,16,16,0.4);"
id="mensajeALTAEVENTOS"/></td></tr>
           
                   </table><?php } ?>

                  </form>
				  
				  
                  <?php if($conexion->variablespermisos('','EVENTOS1','email' )=='si' and $var_bloquea_fecha=='no'){ ?>
			<form name="form_emai_altaevento1" id="form_emai_altaevento1">
			<table>
			<tr>
			<td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_ALTA_EVENTOS1" id="EMAIL_ALTA_EVENTOS1" class="form-control" aria-label="With textarea"><?php echo $EMAIL_ALTA_EVENTOS1; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_ALTA_EVENTOS1">ENVIAR POR EMAIL</button></td>   
	
			</tr>
			</table><?php } ?>
			</form>
                  </table>
</div>
</div> 
</div>
</div> 
 