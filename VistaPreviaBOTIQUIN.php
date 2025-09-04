<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
echo $identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorAE.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_BOTIQUIN2($identioficador);
 $output .= '
<div id="mensajeBOTIQUIN"></div> 
 <form  id="Listado_BOTIQUINform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["BOTIQUIN_FOTO"]!=""){
        $urlBOTIQUIN_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["BOTIQUIN_FOTO"]."'>Visualizar!</a>";
        }else{
        $urlBOTIQUIN_FOTO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>BOTIQUIN:</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_EQUIPO" value="'.$row["BOTIQUIN_EQUIPO"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_CANTIDAD" value="'.$row["BOTIQUIN_CANTIDAD"].'"></td>
</tr>

<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'BOTIQUIN_FOTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="BOTIQUIN_FOTO" type="text" onkeydown="return false" onclick="file_explorer(\'BOTIQUIN_FOTO\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="BOTIQUIN_FOTO" id="nono"/> <div id="2BOTIQUIN_FOTO"> "'.$urlBOTIQUIN_FOTO.'" </div> </div> </div>
</td>


<tr>
<td width="30%"><label>FECHA DE ENTREGA</label></td>
<td width="70%"><input type="date" name="BOTIQUIN_ENTREGA" value="'.$row["BOTIQUIN_ENTREGA"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DE ENTREGA</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_LUGAR" value="'.$row["BOTIQUIN_LUGAR"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE ENTREGA</label></td>
<td width="70%"><input type="time" name="BOTIQUIN_HORA" value="'.$row["BOTIQUIN_HORA"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="date" name="BOTIQUIN_DEVOLU" value="'.$row["BOTIQUIN_DEVOLU"].'"></td>
</tr>


<tr>
<td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_LUDEVO" value="'.$row["BOTIQUIN_LUDEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="time" name="BOTIQUIN_HORADEVO" value="'.$row["BOTIQUIN_HORADEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="BOTIQUIN_SOLICITUD" value="'.$row["BOTIQUIN_SOLICITUD"].'"></td>
</tr>


<tr>
<td width="30%"><label>DIAS SOLICITADOS</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_DIAS" value="'.$row["BOTIQUIN_DIAS"].'"></td>
</tr>

<tr>
<td width="30%"><label>COSTO</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_COSTO" value="'.$row["BOTIQUIN_COSTO"].'"></td>
</tr>


<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_IVA" value="'.$row["BOTIQUIN_IVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_SUB" value="'.$row["BOTIQUIN_SUB"].'"></td>
</tr>


<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_TOTAL" value="'.$row["BOTIQUIN_TOTAL"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="BOTIQUIN_OBSERVA" value="'.$row["BOTIQUIN_OBSERVA"].'"></td>
</tr>








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpBOTIQUIN"  id="IpBOTIQUIN"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickBOTIQUIN">GUARDAR</button>
			
			<input type="hidden" value="enviarBOTIQUIN"  name="enviarBOTIQUIN"/>

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
	        form_data.append("IpBOTIQUIN",  $("#IpBOTIQUIN").val());
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

$("#clickBOTIQUIN").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_BOTIQUINform').serialize(),

    beforeSend:function(){  
    $('#mensajeBOTIQUIN').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_BOTIQUIN").load(location.href + " #reset_BOTIQUIN");
    $('#mensajeBOTIQUIN').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>