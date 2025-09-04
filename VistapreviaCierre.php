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

$queryVISTAPREV = $conexion->Listado_cierre2($identioficador);
 $output .= '
<div id="mensajeCierreActualiza2"></div> 
 <form  id="listadoCIERREform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["adjunto_cierre"]!=""){
        $urladjunto_cierre= "<a target='_blank'
        href='includes/archivos/".$row["adjunto_cierre"]."'>Visualizar!</a>";
        }else{
        $urladjunto_cierre="";
        }		
             $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL DOCUMENTO</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_cierre" value="'.$row["DOCUMENTO_cierre"].'"></td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'adjunto_cierre\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="adjunto_cierre" type="text" onkeydown="return false" onclick="file_explorer(\'adjunto_cierre\');" style="width:250px;" value="'.$row["adjunto_cierre"].'" required /> </p> <input type="file" name="adjunto_cierre" id="nono"/> <div id="2adjunto_cierre"> "'.$urladjunto_cierre.'" </div> </div> </div>


</td>
</tr> 
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_cierre" value="'.$row["OBSERVACIONES_cierre"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="fecha_cierre" value="'.$row["fecha_cierre"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPCIERRE2"  id="IPCIERRE2"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCIERRE">GUARDAR</button>
			
			<input type="hidden" value="enviarCIERRE"  name="enviarCIERRE"/>

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
	        form_data.append("IPCIERRE2",  $("#IPCIERRE2").val());
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

$("#clickCIERRE").click(function(){
	
   $.ajax({  
    url:"altaeventos/controladorAE.php",
    method:"POST",  
    data:$('#listadoCIERREform').serialize(),

    beforeSend:function(){  
    $('#mensajeCierreActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_cierre").load(location.href + " #reset_cierre");
    $('#mensajecierre').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>