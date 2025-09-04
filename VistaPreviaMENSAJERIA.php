<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
echo $identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorAE.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_MENSAJERIA2($identioficador);
 $output .= '
<div id="mensajeMENSAJERIA"></div> 
 <form  id="Listado_MENSAJERIAform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["MENSAJERIA_FOTOS"]!=""){
        $urlMENSAJERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MENSAJERIA_FOTOS"]."'>Visualizar!</a>";
        }else{
        $urlMENSAJERIA_FOTOS="";
        }

        if($row["MENSAJERIA_ENTREGARSOLICITUD"]!=""){
        $urlMENSAJERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MENSAJERIA_ENTREGARSOLICITUD"]."'>Visualizar!</a>";
        }else{
        $urlMENSAJERIA_ENTREGARSOLICITUD="";
        } 

		if($row["MENSAJERIA_FOTOSNECES"]!=""){
        $urlMENSAJERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MENSAJERIA_FOTOSNECES"]."'>Visualizar!</a>";
        }else{
        $urlMENSAJERIA_FOTOSNECES="";
        } 

		if($row["MENSAJERIA_ARCHIVORELACIONADO"]!=""){
        $urlMENSAJERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MENSAJERIA_ARCHIVORELACIONADO"]."'>Visualizar!</a>";
        }else{
        $urlMENSAJERIA_ARCHIVORELACIONADO="";
        } 

		if($row["MENSAJERIA_FIRMA"]!=""){
        $urlMENSAJERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MENSAJERIA_FIRMA"]."'>Visualizar!</a>";
        }else{
        $urlMENSAJERIA_FIRMA="";
        }
		
             $output .= '

<tr>
<td width="30%"><label>No. EVENTO</label></td>
<td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="NUMERO_EVENTO" value="'.$row["NUMERO_EVENTO"].'"></td>
</tr>

<tr>
<td width="30%"><label>NOMBRE DEL  EVENTO</label></td>
<td width="70%"><input type=»text» readonly=»readonly»  style="background:#decaf1" name="NOMBRE_EVENTO" value="'.$row["NOMBRE_EVENTO"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DEL EVENTO</label></td>
<td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1"  name="CIUDAD_DEL_EVENTO" value="'.$row["CIUDAD_DEL_EVENTO"].'"></td>
</tr>

 <tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="MENSAJERIA_SOLICITUD" value="'.$row["MENSAJERIA_SOLICITUD"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA A REALIZARSE 1</label></td>
<td width="70%"><input type="date" name="MENSAJERIA_REALIZARCE" value="'.$row["MENSAJERIA_REALIZARCE"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA A REALIZARSE 2</label></td>
<td width="70%"><input type="date" name="MENSAJERIA_OBSERVACIONES" value="'.$row["MENSAJERIA_OBSERVACIONES"].'"></td>
</tr> 
<tr>
<td width="30%"><label>RANGO DE HORARIOS PARA ENTREGA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_HORARIOS" value="'.$row["MENSAJERIA_HORARIOS"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NOMBRE DEL SOLICITANTE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_SOLICITANTE" value="'.$row["MENSAJERIA_SOLICITANTE"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO DE CEL DEL SOLICITANTE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CEL_SOLICITANTE" value="'.$row["MENSAJERIA_CEL_SOLICITANTE"].'"></td>
</tr> 
<tr>
<td width="30%"><label>CANTIDAD DE OBJETOS A RECOGER</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_OBJETOSARECOJER" value="'.$row["MENSAJERIA_OBJETOSARECOJER"].'"></td>
</tr>
 <tr>
<td width="30%"><label>MEDIDAS APROXIMADAS DE LOS OBJETOS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_MEDIDASAPROX" value="'.$row["MENSAJERIA_MEDIDASAPROX"].'"></td>
</tr> 
<tr>
<td width="30%"><label>CONTENIDO DEL ENVIO</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CONTENIDO" value="'.$row["MENSAJERIA_CONTENIDO"].'"></td>
</tr>
<tr>
<td width="30%"><label>NOTA IMPORTANTE EN ARCHIVO</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'MENSAJERIA_ENTREGARSOLICITUD\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MENSAJERIA_ENTREGARSOLICITUD" type="text" onkeydown="return false" onclick="file_explorer(\'MENSAJERIA_ENTREGARSOLICITUD\');" style="width:250px;" value="'.$row["MENSAJERIA_ENTREGARSOLICITUD"].'" required /> </p> <input type="file" name="MENSAJERIA_ENTREGARSOLICITUD" id="nono"/> <div id="2MENSAJERIA_ENTREGARSOLICITUD"> "'.$urlMENSAJERIA_ENTREGARSOLICITUD.'" </div> </div> </div></td>
</tr>

 <tr>
<td width="30%"><label>ADJUNTAR FOTOS</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'MENSAJERIA_FOTOS\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MENSAJERIA_FOTOS" type="text" onkeydown="return false" onclick="file_explorer(\'MENSAJERIA_FOTOS\');" style="width:250px;" value="'.$row["MENSAJERIA_FOTOS"].'" required /> </p> <input type="file" name="MENSAJERIA_FOTOS" id="nono"/> <div id="2MENSAJERIA_FOTOS"> "'.$urlMENSAJERIA_FOTOS.'" </div> </div> </div></td>
</tr
 <tr>
<td width="30%"><label>DIRECCIÓN DE EMPRESAS (ENVIA):</label></td> 
<td width="70%"><input type="text" name="MENSAJERIA_EMPRESA_LUGAR" value="'.$row["MENSAJERIA_EMPRESA_LUGAR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>DIRECCIÓN DE PROVEEDORES (ENVIA):</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_SELECCIONAR" value="'.$row["MENSAJERIA_SELECCIONAR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>DIRECCIÓN DE CLIENTES (ENVIA):</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_EMPRESADIRE" value="'.$row["MENSAJERIA_EMPRESADIRE"].'"></td>
</tr> 
<tr>
<td width="30%"><label>EDIFICIO</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_EDIFICIO" value="'.$row["MENSAJERIA_EDIFICIO"].'"></td>
</tr>
 <tr>
<td width="30%"><label>CALLE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CALLE" value="'.$row["MENSAJERIA_CALLE"].'"></td>
</tr>
 <tr>
<td width="30%"><label>NÚMERO EXTERIOR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NUMEROE" value="'.$row["MENSAJERIA_NUMEROE"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO INTERIOR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NINTERIOR" value="'.$row["MENSAJERIA_NINTERIOR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO DE OFICINA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NOFICINA" value="'.$row["MENSAJERIA_NOFICINA"].'"></td>
</tr>
 <tr>
<td width="30%"><label>COLONIA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COLONIA" value="'.$row["MENSAJERIA_COLONIA"].'"></td>
</tr> 
<tr>
<td width="30%"><label>ALCALDIA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_ALCALDIA" value="'.$row["MENSAJERIA_ALCALDIA"].'"></td>
</tr> 
<tr>
<td width="30%"><label>C.P</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CP" value="'.$row["MENSAJERIA_CP"].'"></td>
</tr>
 <tr>
<td width="30%"><label>CIUDAD</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CIUDAD" value="'.$row["MENSAJERIA_CIUDAD"].'"></td>
</tr>
 <tr>
<td width="30%"><label>ESTADO</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_ESTADO" value="'.$row["MENSAJERIA_ESTADO"].'"></td>
</tr>
 <tr>
<td width="30%"><label>PAÍS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_PAIS" value="'.$row["MENSAJERIA_PAIS"].'"></td>
</tr>
 <tr>
<td width="30%"><label>UBICACIÓN</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_UBICACION" value="'.$row["MENSAJERIA_UBICACION"].'"></td>
</tr> 
<tr>
<td width="30%"><labelTELEFONO 1</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_TELEFONO1" value="'.$row["MENSAJERIA_TELEFONO1"].'"></td>
</tr>
 <tr>
<td width="30%"><label>TELEFONO 2</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_TELEFONO2" value="'.$row["MENSAJERIA_TELEFONO2"].'"></td>
</tr>
 <tr>
<td width="30%"><label>NOMBRE DE QUIEN ENTREGA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NOMBREENTREGA" value="'.$row["MENSAJERIA_NOMBREENTREGA"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FIRMA DE QUIEN RECIBE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_FIRMARECIBE" value="'.$row["MENSAJERIA_FIRMARECIBE"].'"></td>
</tr>
 <tr>
<td width="30%"><label>FECHA DE RECEPCIÓN</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_FECHAR" value="'.$row["MENSAJERIA_FECHAR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>HORA DE RECEPCIÓN</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_HORAR" value="'.$row["MENSAJERIA_HORAR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>DIRECCIÓN DE EMPRESAS (RECIBE)</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_LLEVARNOMBRE" value="'.$row["MENSAJERIA_LLEVARNOMBRE"].'"></td>
</tr>
 <tr>
<td width="30%"><label>DIRECCIÓN DE PROVEEDORES (RECIBE)</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_SELECCIONARB" value="'.$row["MENSAJERIA_SELECCIONARB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>DIRECCIÓN DE CLIENTES (RECIBE)</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_DIRECCIONB" value="'.$row["MENSAJERIA_DIRECCIONB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>EDIFICIO</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_EDIFICIOB" value="'.$row["MENSAJERIA_EDIFICIOB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>CALLE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CALLEB" value="'.$row["MENSAJERIA_CALLEB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO EXTERIOR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NUMEROEB" value="'.$row["MENSAJERIA_NUMEROEB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>NÚMERO INTERIOR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NINTERIORB" value="'.$row["MENSAJERIA_NINTERIORB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO DE OFICINA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NOFICINAB" value="'.$row["MENSAJERIA_NOFICINAB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>COLONIA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COLONIAB" value="'.$row["MENSAJERIA_COLONIAB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>ALCALDIA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_ALCALDIAB" value="'.$row["MENSAJERIA_ALCALDIAB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>C.P</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CPB" value="'.$row["MENSAJERIA_CPB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>CIUDAD</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_CIUDADB" value="'.$row["MENSAJERIA_CIUDADB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>ESTADO</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_ESTADOB" value="'.$row["MENSAJERIA_ESTADOB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>PAÍS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_PAISB" value="'.$row["MENSAJERIA_PAISB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>UBICACIÓN</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_UBICACIONB" value="'.$row["MENSAJERIA_UBICACIONB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>TELEFONO 1</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_TELEFONO1B" value="'.$row["MENSAJERIA_TELEFONO1B"].'"></td>
</tr> 
<tr>
<td width="30%"><label>TELEFONO 2</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_TELEFONO2B" value="'.$row["MENSAJERIA_TELEFONO2B"].'"></td>
</tr>
 <tr>
<td width="30%"><label>NOMBRE DE LA PERSONA A QUIEN<br< SE LE VA A ENTREGAR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NOMBREPERSONAB" value="'.$row["MENSAJERIA_NOMBREPERSONAB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NÚMERO DE CEL DE LA PERSONA A<br> QUIEN SE LE VA A ENTREGAR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NEMEROCELENTREGA" value="'.$row["MENSAJERIA_NEMEROCELENTREGA"].'"></td>
</tr> 
<tr>
<td width="30%"><label>NOMBRE DE QUIEN RECIBE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_NOMBREENTREGAB" value="'.$row["MENSAJERIA_NOMBREENTREGAB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FIRMA DE QUIEN RECIBE</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_FIRMARECIBEB" value="'.$row["MENSAJERIA_FIRMARECIBEB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA DE RECEPCIÓN</label></td>
<td width="70%"><input type="date" name="MENSAJERIA_FECHARB" value="'.$row["MENSAJERIA_FECHARB"].'"></td>
</tr>
 <tr>
<td width="30%"><label>HORA DE RECEPCIÓN</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_HORARB" value="'.$row["MENSAJERIA_HORARB"].'"></td>
</tr> 
<tr>
<td width="30%"><label>INSTRUCCIONES</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_INSTRUCCIONES" value="'.$row["MENSAJERIA_INSTRUCCIONES"].'"></td>
</tr> 
 <tr>
<td width="30%"><label>FIRMA DE QUIÉN RECIBE</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'MENSAJERIA_FIRMA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MENSAJERIA_FIRMA" type="text" onkeydown="return false" onclick="file_explorer(\'MENSAJERIA_FIRMA\');" style="width:250px;" value="'.$row["MENSAJERIA_FIRMA"].'" required /> </p> <input type="file" name="MENSAJERIA_FIRMA" id="nono"/> <div id="2MENSAJERIA_FIRMA"> "'.$urlMENSAJERIA_FIRMA.'" </div> </div> </div></td>
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR FOTOS EN CASO DE SER NECESARIO</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'MENSAJERIA_FOTOSNECES\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MENSAJERIA_FOTOSNECES" type="text" onkeydown="return false" onclick="file_explorer(\'MENSAJERIA_FOTOSNECES\');" style="width:250px;" value="'.$row["MENSAJERIA_FOTOSNECES"].'" required /> </p> <input type="file" name="MENSAJERIA_FOTOSNECES" id="nono"/> <div id="2MENSAJERIA_FOTOSNECES"> "'.$urlMENSAJERIA_FOTOSNECES.'" </div> </div> </div></td>
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR OTRO ARCHIVO <br>RELACIONADO CON ESTA MENSAJERIA</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'MENSAJERIA_ARCHIVORELACIONADO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MENSAJERIA_ARCHIVORELACIONADO" type="text" onkeydown="return false" onclick="file_explorer(\'MENSAJERIA_ARCHIVORELACIONADO\');" style="width:250px;" value="'.$row["MENSAJERIA_ARCHIVORELACIONADO"].'" required /> </p> <input type="file" name="MENSAJERIA_ARCHIVORELACIONADO" id="nono"/> <div id="2MENSAJERIA_ARCHIVORELACIONADO"> "'.$urlMENSAJERIA_ARCHIVORELACIONADO.'" </div> </div> </div></td>
</tr>
<tr>
<td width="30%"><label>VEHÍCULO USADO PARA ESTA MENSAJERIA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_VEHICULOM" value="'.$row["MENSAJERIA_VEHICULOM"].'"></td>
</tr> 
<tr>
<td width="30%"><label>REALIZADO POR</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_REALIZADOPOR" value="'.$row["MENSAJERIA_REALIZADOPOR"].'"></td>
</tr> 
<tr>
<td width="30%"><label>COSTO POR DIA </label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COSTOCAMIONETA" value="'.$row["MENSAJERIA_COSTOCAMIONETA"].'"></td>
</tr>
<tr>
<td width="30%"><label>COSTO DE GASOLINA</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COSTOGASOLINA" value="'.$row["MENSAJERIA_COSTOGASOLINA"].'"></td>
</tr>
 <tr>
<td width="30%"><label>COSTO DE CASETAS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COSTOCASETAS" value="'.$row["MENSAJERIA_COSTOCASETAS"].'"></td>
</tr> 
<tr>
<td width="30%"><label>COSTOS DE ESTACIONAMIENTOS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COSTOESTACIONAMIENTO" value="'.$row["MENSAJERIA_COSTOESTACIONAMIENTO"].'"></td>
</tr> 
<tr>
<td width="30%"><label>COSTOS DE OTROS GASTOS</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_COSTOGASTOS" value="'.$row["MENSAJERIA_COSTOGASTOS"].'"></td>
</tr> 
<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_TOTAL" value="'.$row["MENSAJERIA_TOTAL"].'"></td>
</tr> 
<tr>
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="MENSAJERIA_OBSERVA" value="'.$row["MENSAJERIA_OBSERVA"].'"></td>
</tr>




 








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPMENSAJERIA"  id="IPMENSAJERIA"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickMENSAJERIA">GUARDAR</button>
			
			<input type="hidden" value="enviarMENSAJERIA"  name="enviarMENSAJERIA"/>

			</td>  
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form>';
    echo $output;
}
//
?>

<script>


var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IPMENSAJERIA",  $("#IPMENSAJERIA").val());
	        $.ajax({
	            type: 'POST',
	            url: 'calendariodeeventos2/controladorAE.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#2'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}

	            }
	        });
	    }
	}


    $(document).ready(function(){

$("#clickMENSAJERIA").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_MENSAJERIAform').serialize(),

    beforeSend:function(){  
    $('#mensajeMENSAJERIA').html('cargando'); 
    }, 	
	
    success:function(data){
	$("#reset_MENSAJERIA").load(location.href + " #reset_MENSAJERIA");
	$("#reset_totales").load(location.href + " #reset_totales");
	$('#mensajeMENSAJERIA').html("<span id='ACTUALIZADO' >"+data+"</span>"); 
	$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>