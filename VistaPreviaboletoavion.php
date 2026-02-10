<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorTIKETS.php";

$tikets = new TIKETSYAVION();
$queryVISTAPREV = $tikets->Listado_tickets2($identioficador);


$output .= '<div id="actualizatabla"></div><form  id="Listadoticketsform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
 
   while($row = mysqli_fetch_array($queryVISTAPREV))
    {


?>
</div>
<?php



     $output .= '





<tr>
 
 
<td width="30%" style="font-weight:bold;" ><label>ADJUNTAR FACTURA (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_PDF\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_PDF" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_PDF\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_PDF"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_PDF" id="nono"/>
<div id="3ADJUNTAR_FACTURA_PDF">
'.$ADJUNTAR_FACTURA_PDF.'
</tr>

<tr>

<td width="30%"><label>ADJUNTAR FACTURA (FORMATO XML)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_XML\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_XML" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_XML\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_XML"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_XML" id="nono"/>
<div id="3ADJUNTAR_FACTURA_XML">
'.$ADJUNTAR_FACTURA_XML.'
</tr> 
<tr>

<td width="30%"><label>NÚMERO CONSECUTIVO DE PAGO A PROVEEDORES</label></td>
<td width="70%"><input type="text" name="NUMERO_CONSECUTIVO_PROVEE" value="'.$row["NUMERO_CONSECUTIVO_PROVEE"].'"></td>
</tr> 

<tr>
<td width="30%"><label>RAZÓN SOCIAL</label></td>
<td width="70%"><input type="text" name="RAZON_SOCIAL" value="'.$row["RAZON_SOCIAL"].'"></td>
</tr> 


<tr>
<td width="30%"><label>RFC DEL PROVEEDOR</label></td>
<td width="70%"><input type="text" name="RFC_PROVEEDOR" value="'.$row["RFC_PROVEEDOR"].'"></td>
</tr> 


<tr>
<td width="30%"><label>No. DE EVENTO</label></td>
<td width="70%"><input type="text" name="NUMERO_EVENTO" value="'.$row["NUMERO_EVENTO"].'"></td>
</tr> 

<tr>
<td width="30%"><label>NOMBRE DEL EVENTO</label></td>
<td width="70%"><input type="text" name="NOMBRE_EVENTO" value="'.$row["NOMBRE_EVENTO"].'"></td>
</tr> 


<tr>
<td width="30%"><label>MOTIVO DEL GASTO</label></td>
<td width="70%"><input type="text" name="MOTIVO_GASTO" value="'.$row["MOTIVO_GASTO"].'"></td>
</tr> 

<tr>
<td width="30%"><label>CONCEPTO</label></td>
<td width="70%"><input type="text" name="CONCEPTO_PROVEE" value="'.$row["CONCEPTO_PROVEE"].'"></td>
</tr>



<tr style="background: #c3f5d9">
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="MONTO_FACTURA" value="'.$row["MONTO_FACTURA"].'"></td>
</tr>

<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="MONTO_TOTAL_COTIZACION_ADEUDO" value="'.$row["MONTO_TOTAL_COTIZACION_ADEUDO"].'"></td>
</tr>

<tr>
<td width="30%"><label>TUA</label></td>
<td width="70%"><input type="text" name="MONTO_PROPINA" value="'.$row["MONTO_PROPINA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="MONTO_DEPOSITAR" value="'.$row["MONTO_DEPOSITAR"].'"></td>
</tr> 

<tr>
<td width="30%"><label>TIPO DE MONEDA O DIVISA</label></td>
<td width="70%"><input type="text" name="TIPO_DE_MONEDA" value="'.$row["TIPO_DE_MONEDA"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE PAGO</label></td>
<td width="70%"><input type="text" name="FECHA_DE_PAGO" value="'.$row["FECHA_DE_PAGO"].'"></td>
</tr> 


<tr style="background: #c3f5d9">
<td width="30%"><label>STATUS DE PAGO</label></td>
<td width="70%">'.$STATUS_DE_PAGO .'</td>
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR COTIZACIÓN O REPORTE: (CUAQUIER FORMATO)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_COTIZACION\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_COTIZACION\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_COTIZACION"] .' " required /></p>
<input type="file" name="ADJUNTAR_COTIZACION" id="nono"/>
<div id="3ADJUNTAR_COTIZACION">
'.$ADJUNTAR_COTIZACION.'
</tr> 



<tr>
<td width="30%"><label>NÚMERO DE TARJETA</label></td>
<td width="70%"><input type="text" name="BANCO_ORIGEN" value="'.$row["BANCO_ORIGEN"].'"></td>
</tr>


<tr>
<td width="30%"><label>ACTIVO FIJO</label></td>
<td width="70%"><input type="text" name="ACTIVO_FIJO" value="'.$row["ACTIVO_FIJO"].'"></td>
</tr>

<tr>
<td width="30%"><label> GASTO FIJO</label></td>
<td width="70%"><input type="text" name="GASTO_FIJO" value="'.$row["GASTO_FIJO"].'"></td>
</tr>

<tr>
<td width="30%"><label>PAGAR CADA</label></td>
<td width="70%"><input type="text" name="PAGAR_CADA" value="'.$row["PAGAR_CADA"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE PROGRAMACIÓN DE PAGO</label></td>
<td width="70%"><input type="text" name="FECHA_PPAGO" value="'.$row["FECHA_PPAGO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE TERMINACIÓN DE LA PROGRAMACIÓN</label></td>
<td width="70%"><input type="text" name="FECHA_TPROGRAPAGO" value="'.$row["FECHA_TPROGRAPAGO"].'"></td>
</tr>
<tr>
<td width="30%"><label>NÚMERO DE EVENTO (FIJO) PARA PROGRAMACIÓN</label></td>
<td width="70%"><input type="text" name="NUMERO_EVENTOFIJO" value="'.$row["NUMERO_EVENTOFIJO"].'"></td>
</tr>
<tr>
<td width="30%"><label>CLASIFICACIÓN GENERAL</label></td>
<td width="70%"><input type="text" name="CLASI_GENERAL" value="'.$row["CLASI_GENERAL"].'"></td>
</tr>
<tr>
<td width="30%"><label>SUB CLASIFICACIÓN GENERAL</label></td>
<td width="70%"><input type="text" name="SUB_GENERAL" value="'.$row["SUB_GENERAL"].'"></td>
</tr>
<tr>
<td width="30%"><label>COMPLEMENTOS DE PAGO  (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'COMPLEMENTOS_PAGO_PDF\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPLEMENTOS_PAGO_PDF" type="text" onkeydown="return false" onclick="file_explorer2(\'COMPLEMENTOS_PAGO_PDF\');" style="width:250px;" VALUE="'.$row["COMPLEMENTOS_PAGO_PDF"] .' " required /></p>
<input type="file" name="COMPLEMENTOS_PAGO_PDF" id="nono"/>
<div id="3COMPLEMENTOS_PAGO_PDF">
'.$COMPLEMENTOS_PAGO_PDF.'
</tr> 

<tr>
<td width="30%"><label>COMPLEMENTOS DE PAGO  (FORMATO XML)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'COMPLEMENTOS_PAGO_XML\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPLEMENTOS_PAGO_XML" type="text" onkeydown="return false" onclick="file_explorer2(\'COMPLEMENTOS_PAGO_XML\');" style="width:250px;" VALUE="'.$row["COMPLEMENTOS_PAGO_XML"] .' " required /></p>
<input type="file" name="COMPLEMENTOS_PAGO_XML" id="nono"/>
<div id="3COMPLEMENTOS_PAGO_XML">
'.$COMPLEMENTOS_PAGO_XML.'
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR CANCELACIONES (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'CANCELACIONES_PDF\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="CANCELACIONES_PDF" type="text" onkeydown="return false" onclick="file_explorer2(\'CANCELACIONES_PDF\');" style="width:250px;" VALUE="'.$row["CANCELACIONES_PDF"] .' " required /></p>
<input type="file" name="CANCELACIONES_PDF" id="nono"/>
<div id="3CANCELACIONES_PDF">
'.$CANCELACIONES_PDF.'
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR CANCELACIONES (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'CANCELACIONES_XML\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="CANCELACIONES_XML" type="text" onkeydown="return false" onclick="file_explorer2(\'CANCELACIONES_XML\');" style="width:250px;" VALUE="'.$row["CANCELACIONES_XML"] .' " required /></p>
<input type="file" name="CANCELACIONES_XML" id="nono"/>
<div id="3CANCELACIONES_XML">
'.$CANCELACIONES_XML.'
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_DE_COMISION_PDF\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_DE_COMISION_PDF" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_DE_COMISION_PDF\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_DE_COMISION_PDF"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_DE_COMISION_PDF" id="nono"/>
<div id="3ADJUNTAR_FACTURA_DE_COMISION_PDF">
'.$ADJUNTAR_FACTURA_DE_COMISION_PDF.'
</tr>

<tr>
<td width="30%"><label>ADJUNTAR FACTURA DE COMISIÓN DESCONTADA:(FORMATO XML)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_DE_COMISION_XML\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_DE_COMISION_XML" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_DE_COMISION_XML\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_DE_COMISION_XML"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_DE_COMISION_XML" id="nono"/>
<div id="3ADJUNTAR_FACTURA_DE_COMISION_XML">
'.$ADJUNTAR_FACTURA_DE_COMISION_XML.'
</tr>

<tr>
<td width="30%"><label> ADJUNTAR CALCULO DE COMISIÓN</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'CALCULO_DE_COMISION\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="CALCULO_DE_COMISION" type="text" onkeydown="return false" onclick="file_explorer2(\'CALCULO_DE_COMISION\');" style="width:250px;" VALUE="'.$row["CALCULO_DE_COMISION"] .' " required /></p>
<input type="file" name="CALCULO_DE_COMISION" id="nono"/>
<div id="3CALCULO_DE_COMISION">
'.$CALCULO_DE_COMISION.'
</tr>

<tr>
<td width="30%"><label>MONTO DE COMISIÓN</label></td>
<td width="70%"><input type="text" name="MONTO_DE_COMISION" value="'.$row["MONTO_DE_COMISION"].'"></td>
</tr>

<tr>
<td width="30%"><label> ADJUNTAR COMPROBANTE DE DEVOLUCIÓN DE DINERO A EPC</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'COMPROBANTE_DE_DEVOLUCION\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPROBANTE_DE_DEVOLUCION" type="text" onkeydown="return false" onclick="file_explorer2(\'COMPROBANTE_DE_DEVOLUCION\');" style="width:250px;" VALUE="'.$row["COMPROBANTE_DE_DEVOLUCION"] .' " required /></p>
<input type="file" name="COMPROBANTE_DE_DEVOLUCION" id="nono"/>
<div id="3COMPROBANTE_DE_DEVOLUCION">
'.$COMPROBANTE_DE_DEVOLUCION.'
</tr>

<tr>
<td width="30%"><label> ADJUNTAR NOTA DE CREDITO DE COMPRA</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'NOTA_DE_CREDITO_COMPRA\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="NOTA_DE_CREDITO_COMPRA" type="text" onkeydown="return false" onclick="file_explorer2(\'NOTA_DE_CREDITO_COMPRA\');" style="width:250px;" VALUE="'.$row["NOTA_DE_CREDITO_COMPRA"] .' " required /></p>
<input type="file" name="NOTA_DE_CREDITO_COMPRA" id="nono"/>
<div id="3NOTA_DE_CREDITO_COMPRA">
'.$NOTA_DE_CREDITO_COMPRA.'
</tr>

<tr>
<td width="30%"><label>PÓLIZA NÚMERO</label></td>
<td width="70%"><input type="text" name="POLIZA_NUMERO" value="'.$row["POLIZA_NUMERO"].'"></td>
</tr>

<tr>
<td width="30%"><label>NOMBRE DEL EJECUTIVO QUE REALIZÓ LA COMPRA</label></td>
<td width="70%"><input type="text" name="NOMBRE_DEL_EJECUTIVO" value="'.$row["NOMBRE_DEL_EJECUTIVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONESA" value="'.$row["OBSERVACIONESA"].'"></td>
</tr>


<tr>
<td width="30%"><label>ADJUNTAR ARCHIVO RELACIONADO A ESTE GASTO</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_ARCHIVO_1\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_ARCHIVO_1" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_ARCHIVO_1\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_ARCHIVO_1"] .' " required /></p>
<input type="file" name="ADJUNTAR_ARCHIVO_1" id="nono"/>
<div id="3ADJUNTAR_ARCHIVO_1">
'.$ADJUNTAR_ARCHIVO_1.'
</tr>



<tr>
<td width="30%"><label>STATUS DE PAGO:</label></td>
<td width="70%"><input  type="text" name="STATUS_DE_PAGO" value="'.$row["STATUS_DE_PAGO"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA:</label></td>
<td width="70%"><input  type=»text» readonly=»readonly» name="FECHA_DE_LLENADO" value="'.$row["FECHA_DE_LLENADO"].'"></td>
</tr>
</table>


	        <tr>
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clicktickets">GUARDAR</button>
			<input type="hidden" value="'.$row["tipo_documento"].'"  name="tipo_documento"/>
			<input type="hidden" value="'.$row["idRelacion"].'"  name="idem_relacion"/>
			
			<input type="hidden" value="ENVIARtickets"  name="ENVIARtickets"/>
			<input type="hidden" value="'.$row["id"].'"  name="ipactualiza" id="ipactualiza"/>
			</td>  
        </tr>

     ';
    }
    $output .= '</table></div>

	</form>';
    echo $output;
}

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

	function ajax_file_upload2(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("ipactualiza",  $("#ipactualiza").val());
	        $.ajax({
	            type: 'POST',
                url:'calendariodeeventos2/controladorTIKETS.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#3'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#3'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}
else if($.trim(response) == 3 ){
$('#3'+nombre).html('<p style="color:red;">UUID PREVIAMENTE CARGADO.</p>');
//$('#'+nombre).val("");
}
else{
$('#'+nombre).val(response);
$('#3'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}
$('#respuestaser').html('<p style="color:green;">'+response+'</p>');
	            }
	        });
	    }
	}
    $(document).ready(function(){


$("#clicktickets").click(function(){
	
   $.ajax({
    url:'calendariodeeventos2/controladorTIKETS.php',
    method:"POST",  
    data:$('#Listadoticketsform').serialize(),

    beforeSend:function(){  
    $('#mensajeAVION').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');

			$.getScript(loadAVION(1));
			$("#mensajeAVION").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#mensajeAVION").html(data);
			
		}
		

		
    }  
   });
   
});

		});
		
	</script>