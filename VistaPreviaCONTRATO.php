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

$queryVISTAPREV = $altaeventos->Listado_CONTRATO2($identioficador);
 $output .= '
<div id="mensajeCONTRATO2"></div> 
 <form  id="Listado_CONTRATOform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_CONTRATO"]=="" or $row["ADJUNTO_CONTRATO"]=='2'){
        $urlADJUNTO_CONTRATO="";
        }else{
			$urlADJUNTO_CONTRATO= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_CONTRATO"]."'>Visualizar!</a>";
        }		
             $output .= '
	

<tr>
<td width="30%"><label>NOMBRE EMPRESA:</label></td>
<td width="70%"><input type="text" name="CONTRATO" value="'.$row["CONTRATO"].'"></td>
</tr>
	
<tr>
<td width="30%"><label>NOMBRE DEL CONTRATO</label></td>
<td width="70%"><input type="text"  name="NOMBRE_CONTRATO" value="'.$row["NOMBRE_CONTRATO"].'"></td>
</tr>			 
			 
			 


<tr>
<td width="30%"><label>MONTOS</label></td>
<td width="70%">
    <input type="text" 
           name="DOCUMENTO_CONTRATO" 
           value="'.$row["DOCUMENTO_CONTRATO"].'" >
</td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%">



<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_CONTRATO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_CONTRATO" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_CONTRATO\');" style="width:250px;" value="'.$row["ADJUNTO_CONTRATO"].'" required /> </p> <input type="file" name="ADJUNTO_CONTRATO" id="nono"/> <div id="2ADJUNTO_CONTRATO"> "'.$urlADJUNTO_CONTRATO.'" </div> </div> </div>



</td>
</tr>
<tr> 
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_CONTRATO" value="'.$row["OBSERVACIONES_CONTRATO"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type=»text» readonly=»readonly» style="background:#decaf1" name="FECHA_CONTRATO" value="'.$row["FECHA_CONTRATO"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpCONTRATO"  id="IpCONTRATO"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCONTRATO">GUARDAR</button>
			
			<input type="hidden" value="enviarCONTRATO"  name="enviarCONTRATO"/>

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
	        form_data.append("IpCONTRATO",  $("#IpCONTRATO").val());
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

$("#clickCONTRATO").click(function(){
	
   $.ajax({  
  url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_CONTRATOform').serialize(),

    beforeSend:function(){  
    $('#mensajeCONTRATO2').html('cargando'); 
    }, 	
	
    success:function(data){
		 $('#CONTRATOform')[0].reset();
	
		$("#reset_CONTRATO").load(location.href + " #reset_CONTRATO");
    $('#mensajeCONTRATO').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>