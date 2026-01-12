<?php
/*
fecha sandor: 10/04/2025
fecha fatis : 20/04/2024
*/

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  

$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorAE.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_altaeventos2($identioficador);
 $output .= '<div id="respuestaser"></div>
 <form  id="listadoaltaeventosform"> 
      <div class="table-responsive">  
           <table class="table table-bordered" style="font-size:14px;">';
    while($row = mysqli_fetch_array($queryVISTAPREV)) {
        
  
        $queryTipoEvento = $conexion->desplegables07('ALTA_EVENTOS','TIPO_EVENTO');
        $opcionesTipo = '';
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        
        while($rowTipo = mysqli_fetch_array($queryTipoEvento)) {
            $selected = ($row["TIPO_DE_EVENTO"] == $rowTipo['nombre_campo']) ? 'selected' : '';
            $color = $fondos[$num % count($fondos)];
            $opcionesTipo .= '<option style="background: #'.$color.'" '.$selected.' value="'.$rowTipo['nombre_campo'].'">'.strtoupper($rowTipo['nombre_campo']).'</option>';
            $num++;
        }
		
		
        $querySTATUS = $conexion->desplegables07('ALTA_EVENTOS','STATUS_EVENTO');
        $opcionesstatus = '';
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        
        while($rowSTATUS = mysqli_fetch_array($querySTATUS)) {
            $selected = ($row["STATUS_EVENTO"] == $rowSTATUS['nombre_campo']) ? 'selected' : '';
            $color = $fondos[$num % count($fondos)];
            $opcionesstatus .= '<option style="background: #'.$color.'" '.$selected.' value="'.$rowSTATUS['nombre_campo'].'">'.strtoupper($rowSTATUS['nombre_campo']).'</option>';
            $num++;
        }		
		
	$queryVISTAPREV = $conexion->Listado_fotoseventos($row['id']);		
	while($rowDOCTOS = mysqli_fetch_array($queryVISTAPREV))
	{
        if($rowDOCTOS["SUBIR_COTIZACION"]!=""){
			$urlSUBIR_COTIZACION .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["SUBIR_COTIZACION"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> ".'<br/>';
			
            }else{
            //$urlSUBIR_COTIZACION="";
            }


			if($rowDOCTOS["SUBIR_ORDEN_COMPRA"]!=""){
            $urlSUBIR_ORDEN_COMPRA .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["SUBIR_ORDEN_COMPRA"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
			
            }else{
            //$urlSUBIR_ORDEN_COMPRA="";
            }

			if($rowDOCTOS["SUBIR_CONTRATO_FIRMADO"]!=""){
            $urlSUBIR_CONTRATO_FIRMADO .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["SUBIR_CONTRATO_FIRMADO"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
            }else{
            //$urlSUBIR_CONTRATO_FIRMADO="";
            }

			if($rowDOCTOS["SUBIR_COTIZACION_FIRMADA"]!=""){
            $urlSUBIR_COTIZACION_FIRMADA .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["SUBIR_COTIZACION_FIRMADA"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
            }else{
            //$urlSUBIR_COTIZACION_FIRMADA="";
            }

			if($rowDOCTOS["LOGO_CLIENTE"]!=""){
            $urlLOGO_CLIENTE .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["LOGO_CLIENTE"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
            }else{
            //$urlLOGO_CLIENTE="";
            }
			
			if($rowDOCTOS["IMAGEN_EVENTO"]!=""){
            $urlIMAGEN_EVENTO .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["IMAGEN_EVENTO"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
            }else{
            //$urlIMAGEN_EVENTO="";
            }
			
			if($rowDOCTOS["ARCHIVO_RELACIONADO_MONTAJE"]!=""){
            $urlARCHIVO_RELACIONADO_MONTAJE .= "<a target='_blank'
            href='includes/archivos/".$rowDOCTOS["ARCHIVO_RELACIONADO_MONTAJE"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > "."</span>".'<br/>';
            }else{
            //$urlIMAGEN_EVENTO="";
            }
			
		}	

     $output .= '

	 <tr>
	 <td width="30%"><label>NUMERO EVENTO:</label></td>
	 <td width="70%"><input type="text"   name="NUMERO_EVENTO" value="'.$row["NUMERO_EVENTO"].'"></td>
	 </tr>

	 <tr>
	 <td width="30%"><label>FECHA DE ALTA DEL EVENTO:</label></td>
	 <td width="70%"><input type="date" name="FECHA_ALTA_EVENTO" value="'.$row["FECHA_ALTA_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr>  <tr>
	 <td width="30%"><label>NOMBRE DEL VENDEDOR:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="NOMBRE_VENDEDOR" value="'.$row["NOMBRE_VENDEDOR"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> 
	 <tr>
	 <td width="30%"><label>NOMBRE DEL RESPONSABLE DEL EVENTO:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="NOMBRE_EJECUTIVOEVENTO" value="'.$row["NOMBRE_EJECUTIVOEVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td></tr>
	 <tr>
	 <td width="30%"><label>NOMBRE DEL QUIEN INGRESO EL EVENTO:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly»  style="background:#decaf1" name="NOMBRE_INGRESO" value="'.$row["NOMBRE_INGRESO"].'"></td></tr>
	 
	 	 <tr>
	 <td width="30%"><label>NOMBRE DEL AUDITOR:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly»  style="background:#decaf1" name="NOMBRE_AUDITOR"  value="'.$row["NOMBRE_AUDITOR"].'"></td></tr> 
	 
	 
	 
	 
	 
	 <tr>
	 <td width="30%"><label>BLOQUEO DEL EVENTO:</label></td>
	 <td width="70%"><input type="date" name="CIERRE_TOTAL" id="CIERRE_TOTAL"  value="'.$row["CIERRE_TOTAL"].'">
	 </td>
	 </tr>
	 
	 
      <tr>
            <th><strong><label>STATUS EVENTO:</label></strong></th>
            <td>
                <select  style="background:#daddf5" name="STATUS_EVENTO" id="STATUS_EVENTO" required>
                    <option value="">SELECCIONA UNA OPCIÓN</option>
                    '.$opcionesstatus.'
                </select><br><a style="color:red;font-size:10px">OBLIGATORIO</a>
            </td>
        </tr>
	 
	 <tr>
	 <td width="30%"><label>TFECHA DE AUTORIZACIÓN DEL EVENTO <br>POR PARTE DEL CLIENTE:</label></td>
	 <td width="70%"><input type="date" name="FECHA_AUTORIZACION_EVENTO" id="FECHA_AUTORIZACION_EVENTO" value="'.$row["FECHA_AUTORIZACION_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr>	 
	 
	 <tr>
	 <td width="30%"><label>TIPO DE MONEDA O DIVISA:</label></td>
	 <td width="70%"><input type="text" name="MONEDAS" value="'.$row["MONEDAS"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr>


	 <tr>
	 <td width="30%"><label>NOMBRE DEL EVENTO:</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_EVENTO" value="'.$row["NOMBRE_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE CORTO DEL EVENTO:</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_CORTO_EVENTO" value="'.$row["NOMBRE_CORTO_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> 
	 
<tr>
    <td width="30%"><label>MONTO TOTAL COTIZADO <br><a style="color:red;font:7px">&nbsp; CON IVA SIN BOLETOS </a>:</label></td>
    <td width="70%"><input type="text" name="MONTOC_TOTAL_EVENTO" id="montoTotalEvento" value="'.$row["MONTOC_TOTAL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
</tr>

<tr>
    <td width="30%"><label>MONTO TOTAL BOLETOS<a style="color:red;font:7px">&nbsp;  CON IVA</a>:</label></td>
    <td width="70%"><input type="text" name="MONTO_TOTAL_AVION" id="montoTotalAvion" value="'.$row["MONTO_TOTAL_AVION"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
</tr>

	 <tr>
	 <td width="30%"><label>MONTO TOTAL COTIZADO<br><a style="color:red;font:7px">&nbsp; SIN IVA Y SIN BOLETOS</a>:</label></td>
	 <td width="70%"><input type="text" name="CANTIDAD_PORCENTAJEV" value="'.$row["CANTIDAD_PORCENTAJEV"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr>
	 

	 
	 
     <tr>
	 <td width="30%"><label>MONTO TOTAL BOLETOS <a style="color:red;font:7px">&nbsp; SIN IVA</a>:</label></td>
	 <td width="70%"><input type="text" name="TOTAL_AVION_SINIVA" value="'.$row["TOTAL_AVION_SINIVA"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr>	
	 
	 
	 <tr>
	 <td width="30%"><label>PORCENTAJE  FEE COBRADO AL CLIENTE:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly» name="PORCENTAJE_FEE" style="background:#decaf1" value="'.$row["PORCENTAJE_FEE"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><label> FEE COBRADO AL CLIENTE:</label></td>
	 <td width="70%"><input type=»text» readonly=»readonly» name="FEE_COBRADO" style="background:#decaf1" value="'.$row["FEE_COBRADO"].'"></td>
	 </tr>


<tr>
    <td width="30%"><label>MONTO TOTAL DEL EVENTO:</label></td>
    <td width="70%"><input type=»text» readonly=»readonly»  name="MONTO_TOTAL_DEL_EVENTO" id="montoTotalEventoResultado"  style="background:#decaf1" value="'.$row["MONTO_TOTAL_DEL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
</tr>
	 
	 
	 <tr>
	 <td width="30%"><label>NOMBRE COMERCIAL DE LA EMPRESA (CLIENTE):</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_COMERCIAL_EVENTO" value="'.$row["NOMBRE_COMERCIAL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE FISCAL O RAZÓN <br>SOCIAL DE LA EMPRESA (CLIENTE):</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_FISCAL_EVENTO" value="'.$row["NOMBRE_FISCAL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>NOMBRE DEL CONTACTO CLIENTE:</label></td>
	 <td width="70%"><input type="text" name="NOMBRE_CONTACTO_EVENTO" value="'.$row["NOMBRE_CONTACTO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>CÉLULAR DEL CONTACTO CLIENTE:</label></td>
	 <td width="70%"><input type="text" name="CELULAR_CONTACTO_1" value="'.$row["CELULAR_CONTACTO_1"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>CORREO DEL CONTACTO CLIENTE:</label></td>
	 <td width="70%"><input type="text" name="CORREO_CONTACTO_1" value="'.$row["CORREO_CONTACTO_1"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>ÁREA DEL CONTACTO CLIENTE:</label></td>
	 <td width="70%"><input type="text" name="AREA_CONTACTO_CLIENTE" value="'.$row["AREA_CONTACTO_CLIENTE"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>OBSERVACIONES:</label></td>
	 <td width="70%"><input type="text" name="OBSERVACIONES_1" value="'.$row["OBSERVACIONES_1"].'"></td>
	 </tr>

        <tr >
            <th><strong><label>TIPO DE EVENTO:</label></strong></th>
            <td>
                <select  style="background:#daddf5" name="TIPO_DE_EVENTO" required>
                    <option value="">SELECCIONA UNA OPCIÓN</option>
                    '.$opcionesTipo.'
                </select><br><a style="color:red;font-size:10px">OBLIGATORIO</a>
            </td>
        </tr>
	 
	 
<tr>
    <td width="30%"  ><label>FORMATO DEL EVENTO:</label></td>
    <td width="70%" >
        <select name="FORMATO_EVENTO" style="background:#daddf5" >
		<option style="background:#f6f6bd" value="PRESENCIAL" '.($row["FORMATO_EVENTO"] == "PRESENCIAL" ? "selected" : "").'>PRESENCIAL</option>

            <option style="background:#dae5f5" value="VIRTUAL" '.($row["FORMATO_EVENTO"] == "VIRTUAL" ? "selected" : "").'>VIRTUAL</option>
            <option style="background:#decaf1"value="HIBRIDO" '.($row["FORMATO_EVENTO"] == "HIBRIDO" ? "selected" : "").'>HIBRIDO</option>
            
           
        </select><br><a style="color:red;font-size:10px">OBLIGATORIO</a>
    </td>
</tr>

	 
	 
	 
	 
	 <tr>
	 <td width="30%"><label>PAÍS DONDE SE LLEVARA <br>A CABO EL EVENTO:</label></td>
	 <td width="70%"><input type="text" name="PAIS_DEL_EVENTO" value="'.$row["PAIS_DEL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>CIUDAD DONDE SE LLEVARA A CABO EL EVENTO:</label></td>
	 <td width="70%"><input type="text" name="CIUDAD_DEL_EVENTO" value="'.$row["CIUDAD_DEL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>HOTEL O LUGAR:</label></td>
	 <td width="70%"><input type="text" name="HOTEL_LUGAR" value="'.$row["HOTEL_LUGAR"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>NÚMERO DE PERSONAS:</label></td>
	 <td width="70%"><input type="text" name="NUMERO_DE_PERSONAS" value="'.$row["NUMERO_DE_PERSONAS"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA INICIO DEL EVENTO:</label></td>
	 <td width="70%"><input type="date" name="FECHA_INICIO_EVENTO" value="'.$row["FECHA_INICIO_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA DE INICIO DEL EVENTO:</label></td>
	 <td width="70%"><input type="time" name="NOMBRE_COMERCIAL" value="'.$row["NOMBRE_COMERCIAL"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA FINAL DEL EVENTO:</label></td>
	 <td width="70%"><input type="date" name="FECHA_FINAL_EVENTO" id="FECHA_FINAL_EVENTO"  value="'.$row["FECHA_FINAL_EVENTO"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA DE TERMINO EVENTO:</label></td>
	 <td width="70%"><input type="time" name="HORA_TERMINO_EVENTO" value="'.$row["HORA_TERMINO_EVENTO"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA LLEGADA DEL STAFF:</label></td>
	 <td width="70%"><input type="date" name="FECHA_LLEGADA_STAFF" value="'.$row["FECHA_LLEGADA_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>HORA LLEGADA DEL STAFF:</label></td>
	 <td width="70%"><input type="time" name="HORA_LLEGADA_STAFF" value="'.$row["HORA_LLEGADA_STAFF"].'"></td>
	 </tr> <tr>
	 <td width="30%"><label>FECHA REGRESO DEL STAFF:</label></td>
	 <td width="70%"><input type="date" name="FECHA_REGRESO_STAFF" value="'.$row["FECHA_REGRESO_STAFF"].'"></td>
	 </tr> 
	 
	 
	 
	 <tr>
	 <td width="30%"><label>HORA REGRESO DEL STAFF:</label></td>
	 <td width="70%"><input type="time" name="HORA_REGRESO_STAFF" value="'.$row["HORA_REGRESO_STAFF"].'"></td>
	 </tr> 
	 
	 <tr>
    <td width="30%"><label>REQUIERE DE MATERIAL Y EQUIPO DE BODEGA?</label></td>
    <td width="70%">
        <select name="MATERIAL_EQUIPO_BODEGA" style="background:#daddf5" >
		<option style="background:#f6f6bd" value="NO" '.($row["MATERIAL_EQUIPO_BODEGA"] == "NO" ? "selected" : "").'>NO</option>

            <option style="background:#dae5f5" value="SI" '.($row["MATERIAL_EQUIPO_BODEGA"] == "SI" ? "selected" : "").'>SI</option>           
        </select><br><a style="color:red;font-size:10px">OBLIGATORIO</a>
    </td>
</tr>
	 
	 <tr>
	 <td width="30%"><label>FECHA DE INICIO DE MONTAJE:</label></td>
	 <td width="70%"><input type="date" name="FECHA_INICIO_MONTAJE" value="'.$row["FECHA_INICIO_MONTAJE"].'"></td>
	 </tr> 	 
	 
	 <tr>
	 <td width="30%"><label>HORA DE INICIO DE MONTAJE:</label></td>
	 <td width="70%"><input type="time" name="HORA_INICIO_MONTAJE" value="'.$row["HORA_INICIO_MONTAJE"].'"></td>
	 </tr>  

	 <tr>
	 <td width="30%"><label>FECHA DE DESMONTAJE:</label></td>
	 <td width="70%"><input type="date" name="FECHA_DESMONTAJE" value="'.$row["FECHA_DESMONTAJE"].'"></td>
	 </tr>  
	 
	 <tr>
	 <td width="30%"><label>HORA DE INICIO DE DESMONTAJE:</label></td>
	 <td width="70%"><input type="time" name="HORA_DESMONTAJE" value="'.$row["HORA_DESMONTAJE"].'"></td>
	 </tr> 	 
	 
	 <tr>
	 <td width="30%"><label>LUGAR DE MONTAJE Y DESMONTAJE:</label></td>
	 <td width="70%"><input type="text" name="LUGAR_MONTAJE" value="'.$row["LUGAR_MONTAJE"].'"></td>
	 </tr> 
	 
	 <tr>
	 <td width="30%"><label>SERVICIOS PARA OTORGAR:</label></td>
	 <td width="70%"><input type="text" name="SERVICIO_OTORGAR" value="'.$row["SERVICIO_OTORGAR"].'"><br><a style="color:red;font-size:10px">OBLIGATORIO</a></td>
	 </tr> 

	 
	 <tr>
	 <td width="30%"><label>ADJUNTAR ARCHIVO RELACIONADO CON EL MONTAJE:</label></td>
	 <td width="70%"><div class="col-md-6"> 
	 
	 <div id="drop_file_zone" ondrop="upload_file2(event, \'ARCHIVO_RELACIONADO_MONTAJE\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ARCHIVO_RELACIONADO_MONTAJE" type="text" onkeydown="return false" onclick="file_explorer2(\'ARCHIVO_RELACIONADO_MONTAJE\');" style="width:250px;" value="'.$row["ARCHIVO_RELACIONADO_MONTAJE"].'" required /> </p> <input type="file" name="ARCHIVO_RELACIONADO_MONTAJE" id="nono"/> <div id="3ARCHIVO_RELACIONADO_MONTAJE"> "'.$urlARCHIVO_RELACIONADO_MONTAJE.'" </div> </div> </div>
	 
	 <tr>
	 <td width="30%"><label>SUBIR COTIZACIÓN PARA EL CLIENTE::</label></td>
	 <td width="70%"><div class="col-md-6"> 
	 
	 <div id="drop_file_zone" ondrop="upload_file2(event, \'SUBIR_COTIZACION\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer2(\'SUBIR_COTIZACION\');" style="width:250px;" value="'.$row["SUBIR_COTIZACION"].'" required /> </p> <input type="file" name="SUBIR_COTIZACION" id="nono"/> <div id="3SUBIR_COTIZACION"> "'.$urlSUBIR_COTIZACION.'" </div> </div> </div>
	 
	 
	 </td>
	 </tr><tr>
	 <td width="30%"><label>SUBIR ORDEN DE COMPRA DEL CLIENTE:</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file2(event, \'SUBIR_ORDEN_COMPRA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_ORDEN_COMPRA" type="text" onkeydown="return false" onclick="file_explorer2(\'SUBIR_ORDEN_COMPRA\');" style="width:250px;" value="'.$row["SUBIR_ORDEN_COMPRA"].'" required /> </p> <input type="file" name="SUBIR_ORDEN_COMPRA" id="nono"/> <div id="3SUBIR_ORDEN_COMPRA"> "'.$urlSUBIR_ORDEN_COMPRA.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>SURIR CONTRATO FIRMADO:</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file2(event, \'SUBIR_CONTRATO_FIRMADO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_CONTRATO_FIRMADO" type="text" onkeydown="return false" onclick="file_explorer2(\'SUBIR_CONTRATO_FIRMADO\');" style="width:250px;" value="'.$row["SUBIR_CONTRATO_FIRMADO"].'" required /> </p> <input type="file" name="SUBIR_CONTRATO_FIRMADO" id="nono"/> <div id="3SUBIR_CONTRATO_FIRMADO"> "'.$urlSUBIR_CONTRATO_FIRMADO.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>SUBIR COTIZACIÓN FIRMADA POR EL <br>CLIENTE AUTORIZANDO EL EVENTO:</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file2(event, \'SUBIR_COTIZACION_FIRMADA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="SUBIR_COTIZACION_FIRMADA" type="text" onkeydown="return false" onclick="file_explorer2(\'SUBIR_COTIZACION_FIRMADA\');" style="width:250px;" value="'.$row["SUBIR_COTIZACION_FIRMADA"].'" required /> </p> <input type="file" name="SUBIR_COTIZACION_FIRMADA" id="nono"/> <div id="3SUBIR_COTIZACION_FIRMADA"> "'.$urlSUBIR_COTIZACION_FIRMADA.'" </div> </div> </div></td>
	 </tr><tr>
	 <td width="30%"><label>LOGO DEL CLIENTE:</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file2(event, \'LOGO_CLIENTE\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="LOGO_CLIENTE" type="text" onkeydown="return false" onclick="file_explorer2(\'LOGO_CLIENTE\');" style="width:250px;" value="'.$row["LOGO_CLIENTE"].'" required /> </p> <input type="file" name="LOGO_CLIENTE" id="nono"/> <div id="3LOGO_CLIENTE"> "'.$urlLOGO_CLIENTE.'" </div> </div> </div></td>
	 </tr> <tr>
	 <td width="30%"><label>IMÁGEN DEL EVENTO:</label></td>
	 <td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file2(event, \'IMAGEN_EVENTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="IMAGEN_EVENTO" type="text" onkeydown="return false" onclick="file_explorer2(\'IMAGEN_EVENTO\');" style="width:250px;" value="'.$row["IMAGEN_EVENTO"].'" required /> </p> <input type="file" name="IMAGEN_EVENTO" id="nono"/> <div id="3IMAGEN_EVENTO"> "'.$urlIMAGEN_EVENTO.'" </div> </div> </div></td>
	 </tr>
	  <tr>
	 <td width="30%"><label></label></td>
	 <td width="70%"><input type="hidden" name="hALTAEVENTOS" value="hALTAEVENTOS"></td>
	 </tr> 

	 <tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickALTA">GUARDAR</button>
			
			<input type="hidden" value="enviaraltaeventos"  name="enviaraltaeventos"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPaltaeventos" id="IPaltaeventos"/>
			</td>  
        </tr>
     ';
    }
    $output .= '</table></div></form>
	
	<div id="respuestaser2"></div>
	';
    echo $output;
}
//
?>


<script>


var fileobj;
	function upload_file2(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload2(fileobj,name);
	}
	 
	function file_explorer2(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload2(fileobj,name);
	    };
	}
	
	
	
// Función para calcular el total automáticamente
function calcularTotal() {
    // Obtener valores
    const montoEvento = parseFloat(document.getElementById('montoTotalEvento').value) || 0;
    const montoAvion = parseFloat(document.getElementById('montoTotalAvion').value) || 0;
    
    // Calcular suma
    const total = montoEvento + montoAvion;
    
    // Asignar resultado (con 2 decimales)
    document.getElementById('montoTotalEventoResultado').value = total.toFixed(2);
}

// Ejecutar al cargar la ventana
window.onload = calcularTotal;



document.getElementById('montoTotalEvento').addEventListener('input', calcularTotal);
document.getElementById('montoTotalAvion').addEventListener('input', calcularTotal);

function actualizarCierreTotalDesdeInput(fechaFinalInput) {
    if (!fechaFinalInput || !fechaFinalInput.value) {
        return;
    }

    const cierreTotalInput = fechaFinalInput
        .closest('form')
        ?.querySelector('[name="CIERRE_TOTAL"]');

    if (!cierreTotalInput) {
        return;
    }

    const fechaBase = new Date(`${fechaFinalInput.value}T00:00:00`);
    if (Number.isNaN(fechaBase.getTime())) {
        return;
    }

    fechaBase.setDate(fechaBase.getDate() + 30);
    const year = fechaBase.getFullYear();
    const month = String(fechaBase.getMonth() + 1).padStart(2, '0');
    const day = String(fechaBase.getDate()).padStart(2, '0');
    cierreTotalInput.value = `${year}-${month}-${day}`;
}

$(document).on('change input', '[name="FECHA_FINAL_EVENTO"]', function () {
    actualizarCierreTotalDesdeInput(this);
});


//////////////////////////////////////////////////////////////////////////




	function ajax_file_upload2(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IPaltaeventos",  $("#IPaltaeventos").val());
	        $.ajax({
	            type: 'POST',
	            url: 'calendariodeeventos2/controladorAE.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
			beforeSend: function() {
				$('#3'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
			},				
			success:function(response) {
				if($.trim(response) == 2 ){
					$('#3'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
					$('#3'+nombre).val("");
				}else{
					$('#3'+nombre).html(response);
				}
			}
	        });
	    }
	}




    $(document).ready(function(){

$("#clickALTA").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#listadoaltaeventosform').serialize(),

    beforeSend:function(){  
    $('#respuestaser').html('cargando'); 
    }, 	
	
    success:function(data){
		
		if($.trim(data)=='Actualizado' || $.trim(data)=='Ingresado'){
		$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
				$.getScript(load(1));
	$('#dataModal').modal('hide');
		}else{
    $('#respuestaser').html("<span id='ACTUALIZADO' >"+data+"</span>"); 
    $('#respuestaser2').html("<span id='ACTUALIZADO' >"+data+"</span>"); 	
		}
		//	$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>