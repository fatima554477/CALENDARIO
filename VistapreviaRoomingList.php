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
	require "controladorAE.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_rooming2($identioficador);
 $output .= '
<div id="mensajeROOMING"></div> 
 <form  id="listadoROOMINGform"> 
      <div class="table-responsive">  
           <table class="table table-bordered" style="font-size:15px;">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_ROOMING"]!=""){
        $urlADJUNTO_ROOMING= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_ROOMING"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_ROOMING="";
        }		
             $output .= '

<tr>
<td width="30%"><label>DOCUMENTO ROOMING</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_ROOMING" value="'.$row["DOCUMENTO_ROOMING"].'"></td>
</tr> 

<tr>
<td width="30%"><label>OBSERVACIONES ROOMING</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_ROOMING" value="'.$row["OBSERVACIONES_ROOMING"].'"></td>
</tr> 

<tr>
<td width="30%"><label>FECHA ROOMING</label></td>
<td width="70%"><input type="text" name="FECHA_ROOMING" value="'.$row["FECHA_ROOMING"].'"></td>
</tr> 

<tr>
<td width="30%"><label>ADJUNTO ROOMING</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_ROOMING\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_ROOMING" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_ROOMING\');" style="width:250px;" value="'.$row["ADJUNTO_ROOMING"].'" required /> </p> <input type="file" name="ADJUNTO_ROOMING" id="nono"/> <div id="2ADJUNTO_ROOMING"> "'.$urlADJUNTO_ROOMING.'" </div> </div> </div></td>
</tr> 

	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="ipROOMINGLISTOV"  id="ipROOMINGLISTOV"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickROOMINGLISTOV">GUARDAR</button>
			
			<input type="hidden" value="enviarROOMINGLISTOV"  name="enviarROOMINGLISTOV"/>

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
	        form_data.append("ipROOMINGLISTOV",  $("#ipROOMINGLISTOV").val());
	        $.ajax({
	            type: 'POST',
	            url: 'altaeventos/controladorAE.php',
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

$("#clickROOMINGLISTOV").click(function(){
	
   $.ajax({  
    url:"altaeventos/controladorAE.php",
    method:"POST",  
    data:$('#listadoROOMINGform').serialize(),

    beforeSend:function(){  
    $('#mensajeROOMING').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_rooming").load(location.href + " #reset_rooming");
    $('#mensajeROOMING').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>