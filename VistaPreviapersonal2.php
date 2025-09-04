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

$queryVISTAPREV = $conexion->listado_personal22($identioficador);
 $output .= '
<div id="mensajePERSONAL21"></div> 
 <form  id="listado_personal2form"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        		
             $output .= '

			 <tr>
			 <td width="30%"><label>NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador2($row["NOMBRE_PERSONAL2"],'01empresa','USUARIO_CRM').'
			 </td>
			 </tr>
			 <tr>
			 <td width="30%"><label>VIATICOS</label></td>
			 <td width="70%"><input type="text" name="VIATICOS_PERSONAL2" value="'.$row["VIATICOS_PERSONAL2"].'"></td>
			 </tr><tr>
			 <td width="30%"><label>OBSERVACIONES</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL2" value="'.$row["OBSERVACIONES_PERSONAL2"].'"></td>
			 </tr>  <tr>
			 <td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL2_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL2_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal2"  id="IPpersonal2"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickpersonal2">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal2"  name="ENVIARpersonal2"/>

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
	        form_data.append("IPpersonal2",  $("#IPpersonal2").val());
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

$("#clickpersonal2").click(function(){
	
   $.ajax({  
    url:"altaeventos/controladorAE.php",
    method:"POST",  
    data:$('#listado_personal2form').serialize(),

    beforeSend:function(){  
    $('#mensajePERSONAL21').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_personal2").load(location.href + " #reset_personal2");
    $('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>