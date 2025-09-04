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

$queryVISTAPREV = $conexion->Listado_VEHICULOSEVE2($identioficador);
 $output .= '
<div id="mensajeVEHICULOSEVE"></div> 
 <form  id="Listado_VEHICULOSEVEform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["VEHICULOSEVE_FOTO"]!=""){
        $urlVEHICULOSEVE_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["VEHICULOSEVE_FOTO"]."'>Visualizar!</a>";
        }else{
        $urlVEHICULOSEVE_FOTO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>VEHÍCULO</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_VEHICULO" value="'.$row["VEHICULOSEVE_VEHICULO"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_CANTIDAD" value="'.$row["VEHICULOSEVE_CANTIDAD"].'"></td>
</tr>

<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'VEHICULOSEVE_FOTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="VEHICULOSEVE_FOTO" type="text" onkeydown="return false" onclick="file_explorer(\'VEHICULOSEVE_FOTO\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="VEHICULOSEVE_FOTO" id="nono"/> <div id="2VEHICULOSEVE_FOTO"> "'.$urlVEHICULOSEVE_FOTO.'" </div> </div> </div>
</td>


<tr>
<td width="30%"><label>FECHA DE ENTREGA</label></td>
<td width="70%"><input type="date" name="VEHICULOSEVE_ENTREGA" value="'.$row["VEHICULOSEVE_ENTREGA"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DE ENTREGA</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_LUGAR" value="'.$row["VEHICULOSEVE_LUGAR"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE ENTREGA</label></td>
<td width="70%"><input type="time" name="VEHICULOSEVE_HORA" value="'.$row["VEHICULOSEVE_HORA"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="date" name="VEHICULOSEVE_DEVOLU" value="'.$row["VEHICULOSEVE_DEVOLU"].'"></td>
</tr>


<tr>
<td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_LUDEVO" value="'.$row["VEHICULOSEVE_LUDEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="time" name="VEHICULOSEVE_HORADEVO" value="'.$row["VEHICULOSEVE_HORADEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="VEHICULOSEVE_SOLICITUD" value="'.$row["VEHICULOSEVE_SOLICITUD"].'"></td>
</tr>


<tr>
<td width="30%"><label>DIAS SOLICITADOS</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_DIAS" value="'.$row["VEHICULOSEVE_DIAS"].'"></td>
</tr>

<tr>
<td width="30%"><label>COSTO</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_COSTO" value="'.$row["VEHICULOSEVE_COSTO"].'"></td>
</tr>


<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_IVA" value="'.$row["VEHICULOSEVE_IVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_SUB" value="'.$row["VEHICULOSEVE_SUB"].'"></td>
</tr>


<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="PRECIOPESOS_SOFTWARE" value="'.$row["PRECIOPESOS_SOFTWARE"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="VEHICULOSEVE_OBSERVA" value="'.$row["VEHICULOSEVE_OBSERVA"].'"></td>
</tr>








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpVEHICULOSEVE"  id="IpVEHICULOSEVE"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickVEHICULOSEVE">GUARDAR</button>
			
			<input type="hidden" value="enviarVEHICULOSEVE"  name="enviarVEHICULOSEVE"/>

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
	        form_data.append("IpVEHICULOSEVE",  $("#IpVEHICULOSEVE").val());
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

$("#clickVEHICULOSEVE").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_VEHICULOSEVEform').serialize(),

    beforeSend:function(){  
    $('#mensajeVEHICULOSEVE').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_VEHICULOSEVE").load(location.href + " #reset_VEHICULOSEVE");
    $('#mensajeVEHICULOSEVE').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>