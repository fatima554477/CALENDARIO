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
	require "controladorP.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_CALIFICACION2($identioficador);
 $output .= '
<div id="mensajeCALIFICACIONctualiza2"></div> 
 <form  id="Listado_CALIFICACIONform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
		
             $output .= '

<tr>
<td width="30%"><label>MOTIVO DE LA CALIFICACIÓN</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_CALIFICACION" value="'.$row["DOCUMENTO_CALIFICACION"].'"></td>
</tr>
<tr>
<td width="30%"><label>CALIFICACIÓN</label></td>
<td width="70%"><input type="text" name="ADJUNTO_CALIFICACION" value="'.$row["ADJUNTO_CALIFICACION"].'"></td>
</tr>


<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_CALIFICACION" value="'.$row["OBSERVACIONES_CALIFICACION"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_CALIFICACION" value="'.$row["FECHA_CALIFICACION"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpCALIFICACION"  id="IpCALIFICACION"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCALIFICACION">GUARDAR</button>
			
			<input type="hidden" value="enviarCALIFICACION"  name="enviarCALIFICACION"/>

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
	        form_data.append("IpCALIFICACION",  $("#IpCALIFICACION").val());
	        $.ajax({
	            type: 'POST',
              url:'proveedores/controladorP.php',
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

$("#clickCALIFICACION").click(function(){
	
   $.ajax({  
        url:'proveedores/controladorP.php',
    method:"POST",  
    data:$('#Listado_CALIFICACIONform').serialize(),

    beforeSend:function(){  
    $('#mensajeCALIFICACIONctualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
	
		$("#reset_CALIFICACION").load(location.href + " #reset_CALIFICACION");
    $('#mensajeCALIFICACION').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>