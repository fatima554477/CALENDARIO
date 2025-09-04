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

$queryVISTAPREV = $altaeventos->Listado_COTICLIENTES2($identioficador);
 $output .= '
<div id="mensajeCOTICLIENTES2"></div> 
 <form  id="Listado_COTICLIENTESform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_COTICLIENTES"]=="" or $row["ADJUNTO_COTICLIENTES"]=='2'){
        $urlADJUNTO_COTICLIENTES="";
        }else{
			$urlADJUNTO_COTICLIENTES= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_COTICLIENTES"]."'>Visualizar!</a>";
        }		
             $output .= '
			 
<tr>
<td width="30%"><label>NÚMERO DE COTIZACIÓN</label></td>
<td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="NOMBRE_CLIENTES" value="'.$row["NOMBRE_CLIENTES"].'"></td>
</tr>			 
			 
			 
<tr>
<td width="30%"><label>NOMBRE DE LA COTIZACIÓN</label></td>
<td width="70%"><input type="text" name="NOMBRE_COTIZACION" value="'.$row["NOMBRE_COTIZACION"].'"></td>
</tr>

<tr>
<td width="30%"><label>MONTOS</label></td>
<td width="70%">
    <input type="text" 
           name="DOCUMENTO_COTICLIENTES" 
           value="'.$row["DOCUMENTO_COTICLIENTES"].'" 
           '.($row["DOCUMENTO_COTICLIENTES"] != "" ? "readonly" : "").'
           style="background-color: '.($row["DOCUMENTO_COTICLIENTES"] != "" ? "#e9ecef" : "white").'">
</td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%">



<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COTICLIENTES\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COTICLIENTES" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COTICLIENTES\');" style="width:250px;" value="'.$row["ADJUNTO_COTICLIENTES"].'" required /> </p> <input type="file" name="ADJUNTO_COTICLIENTES" id="nono"/> <div id="2ADJUNTO_COTICLIENTES"> "'.$urlADJUNTO_COTICLIENTES.'" </div> </div> </div>



</td>
</tr>
<tr> 
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_COTICLIENTES" value="'.$row["OBSERVACIONES_COTICLIENTES"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="FECHA_COTICLIENTES" value="'.$row["FECHA_COTICLIENTES"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpCOTICLIENTES"  id="IpCOTICLIENTES"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCOTICLIENTES">GUARDAR</button>
			
			<input type="hidden" value="enviarCOTICLIENTES"  name="enviarCOTICLIENTES"/>

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
	        form_data.append("IpCOTICLIENTES",  $("#IpCOTICLIENTES").val());
	        $.ajax({
	            type: 'POST',
	            url: 'calendariodeeventos2/controladorAE.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
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

$("#clickCOTICLIENTES").click(function(){
	
   $.ajax({  
  url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_COTICLIENTESform').serialize(),

    beforeSend:function(){  
    $('#mensajeCOTICLIENTES2').html('cargando'); 
    }, 	
	
    success:function(data){
		 $('#COTICLIENTESform')[0].reset();
	
		$("#reset_COTICLIENTES").load(location.href + " #reset_COTICLIENTES");
    $('#mensajeCOTICLIENTES').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>