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

$queryVISTAPREV = $conexion->Listado_VEHICULOSEVE3($identioficador);
 $output .= '
<div id="mensajeVEHICULOSEVE"></div> 
 <form  id="Listado_VEHICULOSEVEFOTOform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["FOTOVEHIEVENUEVA"]!=""){
        $urlFOTOVEHIEVENUEVA= "<a target='_blank'
        href='includes/archivos/".$row["FOTOVEHIEVENUEVA"]."'>Visualizar!</a>";
        }else{
        $urlFOTOVEHIEVENUEVA="";
        }		
             $output .= '

<tr>
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONFOTO" value="'.$row["OBSERVACIONFOTO"].'"></td>
</tr>



<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'FOTOVEHIEVENUEVA\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="FOTOVEHIEVENUEVA" type="text" onkeydown="return false" onclick="file_explorer(\'FOTOVEHIEVENUEVA\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="FOTOVEHIEVENUEVA" id="nono"/> <div id="2FOTOVEHIEVENUEVA"> "'.$urlFOTOVEHIEVENUEVA.'" </div> </div> </div>
</td>










	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpVEHICULOSEVE"  id="IpVEHICULOSEVE"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickVEHICULOSEVEFOTO">GUARDAR</button>
			
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

$("#clickVEHICULOSEVEFOTO").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_VEHICULOSEVEFOTOform').serialize(),

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