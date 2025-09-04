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
$queryVISTAPREV = $conexion->Listado_nuevocierre2($identioficador);
 $output .= '
<div id="revisar"></div>
 <form  id="Listado_nuevocierreform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {







     $output .= '

<tr>
<td width="30%"><label>NUEVO DOCUMENTO CIERRE:</label></td>
<td width="70%"><input type="text" name="nuevo_documento_cierre" value="'.$row["nuevo_documento_cierre"].'"></td>
</tr> 
 
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickLNUEVOdocumentoCIERRE">GUARDAR</button>
			
			<input type="hidden" value="enviarCIERRENUEVO"  name="enviarCIERRENUEVO"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPCIERRENUEVO" id="IPCIERRENUEVO"/>
			</td>  
        </tr>
     ';
    }//enviarnuevo_FISCAL
    $output .= '</table></div>

	</form>';
    echo $output;
}

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
	        form_data.append("IPCIERRENUEVO",  $("#IPCIERRENUEVO").val());
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


$("#clickLNUEVOdocumentoCIERRE").click(function(){
	
   $.ajax({  
    url: 'calendariodeeventos2/controladorAE.php',
    method:"POST",  
    data:$('#Listado_nuevocierreform').serialize(),

    beforeSend:function(){  
    $('#revisar').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
			$("#reseteateNUEVOCIERRE").load(location.href + " #reseteateNUEVOCIERRE");
			$("#revisar").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#revisar").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>