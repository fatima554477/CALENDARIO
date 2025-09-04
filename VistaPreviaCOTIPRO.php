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

$queryVISTAPREV = $conexion->Listado_COTIPRO2($identioficador);
 $output .= '
<div id="mensajeFOTOSActualiza2"></div> 
 <form  id="Listado_COTIPROform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_COTIPRO"]!=""){
        $urlADJUNTO_COTIPRO= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_COTIPRO"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_COTIPRO="";
        }		
             $output .= '
<tr>
<td width="30%"><label>NOMBRE DEL PROVEEDOR</label></td>
<td width="70%"><input type="text" name="NOMBRE_PROVEEDOR" value="'.$row["NOMBRE_PROVEEDOR"].'"></td>
</tr>

<tr>
<td width="30%"><label>MONTOS</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_COTIPRO" value="'.$row["DOCUMENTO_COTIPRO"].'"></td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COTIPRO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COTIPRO" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COTIPRO\');" style="width:250px;" value="'.$row["ADJUNTO_COTIPRO"].'" required /> </p> <input type="file" name="ADJUNTO_COTIPRO" id="nono"/> <div id="2ADJUNTO_COTIPRO"> "'.$urlADJUNTO_COTIPRO.'" </div> </div> </div>


</td>
</tr> 
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_COTIPRO" value="'.$row["OBSERVACIONES_COTIPRO"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_COTIPRO" value="'.$row["FECHA_COTIPRO"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpCOTIPRO"  id="IpCOTIPRO"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCOTIPRO">GUARDAR</button>
			
			<input type="hidden" value="enviarCOTIPRO"  name="enviarCOTIPRO"/>

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
	        form_data.append("IpCOTIPRO",  $("#IpCOTIPRO").val());
	        $.ajax({
	            type: 'POST',
	        url:"calendariodeeventos2/controladorAE.php",
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

$("#clickCOTIPRO").click(function(){
	
   $.ajax({  
	url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_COTIPROform').serialize(),

    beforeSend:function(){  
    $('#mensajeFOTOSActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
		   $('#COTIPROform')[0].reset(); 
		$("#reset_COTIPRO").load(location.href + " #reset_COTIPRO");
    $('#mensajeCOTIPRO').html("<span id='ACTUALIZADO' >"+data+"</span>").fadeIn().delay(2000).fadeOut();

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>