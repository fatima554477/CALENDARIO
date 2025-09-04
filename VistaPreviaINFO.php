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
	require "controladorIF.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $proveedoresC->listadoinformacionimpo2($identioficador);
 $output .= ' <form  id="listadoinformacionimpoform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {
     $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL DOCUMENTO:</label></td>
<td width="70%"><input type="text" name="NOMBRE_INFORMACION" value="'.$row["NOMBRE_INFORMACION"].'"></td>
</tr> <tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> <div id="drop_file_zone" ondrop="upload_file(event, \'DOCUU_INFORMACION\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="DOCUU_INFORMACION" type="text" onkeydown="return false" onclick="file_explorer(\'DOCUU_INFORMACION\');" style="width:250px;" value="'.$row["DOCUU_INFORMACION"].'" required /> </p> <input type="file" name="DOCUU_INFORMACION" id="nono"/> <div id="2DOCUU_INFORMACION"> '.$urlDOCUU_INFORMACION.'</div> </div> </div></td>
</tr> <tr>
<td width="30%"><label>OBSERVACIONES:</label></td>
<td width="70%"><input type="text" name="INFOIMPO_OBSERVACIONES" value="'.$row["INFOIMPO_OBSERVACIONES"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA:</label></td>
<td width="70%"><input  type=»text» readonly=»readonly» name="INFORMACION_IMPORTANTE_FECHA" value="'.$row["INFORMACION_IMPORTANTE_FECHA"].'"></td>
</tr>

	 <tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickINFO">GUARDAR</button>
			
			<input type="hidden" value="enviarinfoIMPO"  name="enviarinfoIMPO"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPINFOIMPO" id="IPINFOIMPO"/>
			</td>  
        </tr>
     ';
    }
    $output .= '</table></div>

	</form>';
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
	        form_data.append("IPINFOIMPO",  $("#IPINFOIMPO").val());
	        $.ajax({
	            type: 'POST',
                url:"INFORMACION/controladorIF.php",
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


$("#clickINFO").click(function(){
	
   $.ajax({  
    url:"INFORMACION/controladorIF.php",
    method:"POST",  
    data:$('#listadoinformacionimpoform').serialize(),

    beforeSend:function(){  
    $('#mensajeINFOIMPO').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
			$("#reseteINFOIMPO").load(location.href + " #reseteINFOIMPO");
			$("#mensajeINFOIMPO").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#mensajeINFOIMPO").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>