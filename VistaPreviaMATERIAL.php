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

$queryVISTAPREV = $conexion->Listado_MATERIAL2($identioficador);
 $output .= '
<div id="mensajeMATERIAL"></div> 
 <form  id="Listado_MATERIALform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["MATERIAL_FOTO"]!=""){
        $urlMATERIAL_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["MATERIAL_FOTO"]."'>Visualizar!</a>";
        }else{
        $urlMATERIAL_FOTO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>MATERIAL Y EQUIPO:</label></td>
<td width="70%"><input type="text" name="MATERIAL_EQUIPO" value="'.$row["MATERIAL_EQUIPO"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="MATERIAL_CANTIDAD" value="'.$row["MATERIAL_CANTIDAD"].'"></td>
</tr>

<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'MATERIAL_FOTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="MATERIAL_FOTO" type="text" onkeydown="return false" onclick="file_explorer(\'MATERIAL_FOTO\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="MATERIAL_FOTO" id="nono"/> <div id="2MATERIAL_FOTO"> "'.$urlMATERIAL_FOTO.'" </div> </div> </div>
</td>


<tr>
<td width="30%"><label>FECHA DE ENTREGA</label></td>
<td width="70%"><input type="date" name="MATERIAL_ENTREGA" value="'.$row["MATERIAL_ENTREGA"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DE ENTREGA</label></td>
<td width="70%"><input type="text" name="MATERIAL_LUGAR" value="'.$row["MATERIAL_LUGAR"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE ENTREGA</label></td>
<td width="70%"><input type="time" name="MATERIAL_HORA" value="'.$row["MATERIAL_HORA"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="date" name="MATERIAL_DEVOLU" value="'.$row["MATERIAL_DEVOLU"].'"></td>
</tr>


<tr>
<td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="text" name="MATERIAL_LUDEVO" value="'.$row["MATERIAL_LUDEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="time" name="MATERIAL_HORADEVO" value="'.$row["MATERIAL_HORADEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="MATERIAL_SOLICITUD" value="'.$row["MATERIAL_SOLICITUD"].'"></td>
</tr>


<tr>
<td width="30%"><label>DIAS SOLICITADOS</label></td>
<td width="70%"><input type="text" name="MATERIAL_DIAS" value="'.$row["MATERIAL_DIAS"].'"></td>
</tr>

<tr>
<td width="30%"><label>COSTO</label></td>
<td width="70%"><input type="text" name="MATERIAL_COSTO" value="'.$row["MATERIAL_COSTO"].'"></td>
</tr>


<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="MATERIAL_IVA" value="'.$row["MATERIAL_IVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="MATERIAL_SUB" value="'.$row["MATERIAL_SUB"].'"></td>
</tr>


<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="MATERIAL_TOTAL" value="'.$row["MATERIAL_TOTAL"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="MATERIAL_OBSERVA" value="'.$row["MATERIAL_OBSERVA"].'"></td>
</tr>








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpMATERIAL"  id="IpMATERIAL"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickMATERIAL">GUARDAR</button>
			
			<input type="hidden" value="enviarMATERIAL"  name="enviarMATERIAL"/>

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
	        form_data.append("IpMATERIAL",  $("#IpMATERIAL").val());
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

$("#clickMATERIAL").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_MATERIALform').serialize(),

    beforeSend:function(){  
    $('#mensajeMATERIAL').html('cargando'); 
    }, 	
	
    success:function(data){
	$("#reset_MATERIAL").load(location.href + " #reset_MATERIAL");
	$("#reset_totales").load(location.href + " #reset_totales");
	$('#mensajeMATERIAL').html("<span id='ACTUALIZADO' >"+data+"</span>"); 
	$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>