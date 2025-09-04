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

$queryVISTAPREV = $conexion->Listado_pagosingresos2($identioficador);
 $output .= '
<div id="mensajeingreActualiza2"></div> 
 <form  id="Listado_pagosingresosform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_INGRESOS"]!=""){
        $urlADJUNTO_INGRESOS= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_INGRESOS"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_INGRESOS="";
        }		
             $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL DOCUMENTO</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_INGRESOS" value="'.$row["DOCUMENTO_INGRESOS"].'"></td>
</tr>

<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_INGRESOS\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_INGRESOS" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_INGRESOS\');" style="width:250px;" value="'.$row["ADJUNTO_INGRESOS"].'" required /> </p> <input type="file" name="ADJUNTO_INGRESOS" id="nono"/> <div id="2ADJUNTO_INGRESOS"> "'.$urlADJUNTO_INGRESOS.'" </div> </div> </div>


</td>
</tr> 
<tr>
<td width="30%"><label>MONTO SIN IVA</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_INGRESOS" value="'.$row["OBSERVACIONES_INGRESOS"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA DE PAGO</label></td>
<td width="70%"><input type="date" name="FE_PAGOI" value="'.$row["FE_PAGOI"].'"></td>
</tr>
<tr>
<td width="30%"><label>FECHA DE TIMBRADO</label></td>
<td width="70%"><input type="date" name="FE_TIMBRADO" value="'.$row["FE_TIMBRADO"].'"></td>
</tr>

<tr>
<td width="30%"><label>MONTO CON IVA</label></td>
<td width="70%"><input type="text" name="MONTOCON_IVA" value="'.$row["MONTOCON_IVA"].'"></td>
</tr> 
<tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_INGRESOS" value="'.$row["FECHA_INGRESOS"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpINGRESOS"  id="IpINGRESOS"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickINGRESOS">GUARDAR</button>
			
			<input type="hidden" value="enviarpagosingre"  name="enviarpagosingre"/>

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
	        form_data.append("IpINGRESOS",  $("#IpINGRESOS").val());
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

$("#clickINGRESOS").click(function(){
	
   $.ajax({  
   /*corregir*/
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_pagosingresosform').serialize(),

    beforeSend:function(){  
    $('#mensajeingreActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_ingresos").load(location.href + " #reset_ingresos");
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
    $('#mensapagosingresos').html("<span id='ACTUALIZADO' >"+data+"</span>");
	$('#dataModal').modal('hide');



    }  
   });
   
});

		});
		
	</script>