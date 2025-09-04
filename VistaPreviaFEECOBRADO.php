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

$queryVISTAPREV = $conexion->Listado_FEECOBRADO2($identioficador);
 $output .= '
<div id="mensajeFEEctualiza2"></div> 
 <form  id="Listado_FEECOBRADOform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_FEECOBRADO"]!=""){
        $urlADJUNTO_FEECOBRADO= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_FEECOBRADO"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_FEECOBRADO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL DOCUMENTO</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_FEECOBRADO" value="'.$row["DOCUMENTO_FEECOBRADO"].'"></td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_FEECOBRADO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_FEECOBRADO" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_FEECOBRADO\');" style="width:250px;" value="'.$row["ADJUNTO_FEECOBRADO"].'" required /> </p> <input type="file" name="ADJUNTO_FEECOBRADO" id="nono"/> <div id="2ADJUNTO_FEECOBRADO"> "'.$urlADJUNTO_FEECOBRADO.'" </div> </div> </div>


</td>
</tr> 
<td width="30%"><label>MONTO</label></td>
<td width="70%"><input type="text" name="MONTO_FEECOBRADO" value="'.$row["MONTO_FEECOBRADO"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_FEECOBRADO" value="'.$row["FECHA_FEECOBRADO"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpFEECOBRADO"  id="IpFEECOBRADO"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickFEECOBRADO">GUARDAR</button>
			
			<input type="hidden" value="enviarFEECOBRADO"  name="enviarFEECOBRADO"/>

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
	        form_data.append("IpFEECOBRADO",  $("#IpFEECOBRADO").val());
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

$("#clickFEECOBRADO").click(function(){
	
   $.ajax({  
   url: 'calendariodeeventos2/controladorAE.php',
    method:"POST",  
    data:$('#Listado_FEECOBRADOform').serialize(),

    beforeSend:function(){  
    $('#mensajeFEEctualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
	
		$("#reset_FEECOBRADO").load(location.href + " #reset_FEECOBRADO");
    $('#mensajeFEECOBRADO').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>