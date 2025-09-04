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

$queryVISTAPREV = $conexion->Listado_pagoegresos2($identioficador);
 $output .= '
<div id="mensajeegreActualiza2"></div> 
 <form  id="Listado_pagoegresosform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_EGRESO"]!=""){
        $urlADJUNTO_EGRESO= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_EGRESO"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_EGRESO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL DOCUMENTO</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_EGRESO" value="'.$row["DOCUMENTO_EGRESO"].'"></td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_EGRESO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_EGRESO" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_EGRESO\');" style="width:250px;" value="'.$row["ADJUNTO_EGRESO"].'" required /> </p> <input type="file" name="ADJUNTO_EGRESO" id="nono"/> <div id="2ADJUNTO_EGRESO"> "'.$urlADJUNTO_EGRESO.'" </div> </div> </div>


</td>
</tr> 

<tr>
<td width="30%"><label>MONTO SIN IVA</label></td>
<td width="70%"><input type="text" name="MONTO_OTRO" value="'.$row["MONTO_OTRO"].'"></td>
</tr> 

<tr>
<td width="30%"><label>MONTO  CON IVA</label></td>
<td width="70%"><input type="text" name="MONTO_EGRESO" value="'.$row["MONTO_EGRESO"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA DE PAGO</label></td>
<td width="70%"><input type="date" name="FE_PAGOE" value="'.$row["FE_PAGOE"].'"></td>
</tr>
<tr>
<td width="30%"><label>FECHA DE TIMBRADO</label></td>
<td width="70%"><input type="date" name="FE_TIMBRADOE" value="'.$row["FE_TIMBRADOE"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_EGRESO" value="'.$row["FECHA_EGRESO"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpEGRESOS"  id="IpEGRESOS"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickEGRESOS">GUARDAR</button>
			
			<input type="hidden" value="enviarpagosEgreso"  name="enviarpagosEgreso"/>

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
	        form_data.append("IpEGRESOS",  $("#IpEGRESOS").val());
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

$("#clickEGRESOS").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_pagoegresosform').serialize(),

    beforeSend:function(){  
    $('#mensajeegreActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_totales_egresosOTROS").load(location.href + " #reset_totales_egresosOTROS");
		$("#reset_egresos").load(location.href + " #reset_egresos");
    $('#mensajepagosegresos').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>