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

$queryVISTAPREV = $conexion->Listado_OFICINA2($identioficador);
 $output .= '
<div id="mensajeOFICINA"></div> 
 <form  id="Listado_OFICINAform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["OFICINA_FOTO"]!=""){
        $urlOFICINA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["OFICINA_FOTO"]."'>Visualizar!</a>";
        }else{
        $urlOFICINA_FOTO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>OFICINA:</label></td>
<td width="70%"><input type="text" name="OFICINA_EQUIPO" value="'.$row["OFICINA_EQUIPO"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="OFICINA_CANTIDAD" value="'.$row["OFICINA_CANTIDAD"].'"></td>
</tr>

<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'OFICINA_FOTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="OFICINA_FOTO" type="text" onkeydown="return false" onclick="file_explorer(\'OFICINA_FOTO\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="OFICINA_FOTO" id="nono"/> <div id="2OFICINA_FOTO"> "'.$urlOFICINA_FOTO.'" </div> </div> </div>
</td>


<tr>
<td width="30%"><label>FECHA DE ENTREGA</label></td>
<td width="70%"><input type="date" name="OFICINA_ENTREGA" value="'.$row["OFICINA_ENTREGA"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DE ENTREGA</label></td>
<td width="70%"><input type="text" name="OFICINA_LUGAR" value="'.$row["OFICINA_LUGAR"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE ENTREGA</label></td>
<td width="70%"><input type="time" name="OFICINA_HORA" value="'.$row["OFICINA_HORA"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="date" name="OFICINA_DEVOLU" value="'.$row["OFICINA_DEVOLU"].'"></td>
</tr>


<tr>
<td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="text" name="OFICINA_LUDEVO" value="'.$row["OFICINA_LUDEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="time" name="OFICINA_HORADEVO" value="'.$row["OFICINA_HORADEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="OFICINA_SOLICITUD" value="'.$row["OFICINA_SOLICITUD"].'"></td>
</tr>


<tr>
<td width="30%"><label>DIAS SOLICITADOS</label></td>
<td width="70%"><input type="text" name="OFICINA_DIAS" value="'.$row["OFICINA_DIAS"].'"></td>
</tr>

<tr>
<td width="30%"><label>COSTO</label></td>
<td width="70%"><input type="text" name="OFICINA_COSTO" value="'.$row["OFICINA_COSTO"].'"></td>
</tr>


<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="OFICINA_IVA" value="'.$row["OFICINA_IVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="OFICINA_SUB" value="'.$row["OFICINA_SUB"].'"></td>
</tr>


<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="OFICINA_TOTAL" value="'.$row["OFICINA_TOTAL"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="OFICINA_OBSERVA" value="'.$row["OFICINA_OBSERVA"].'"></td>
</tr>








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpOFICINA"  id="IpOFICINA"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickOFICINA">GUARDAR</button>
			
			<input type="hidden" value="enviarOFICINA"  name="enviarOFICINA"/>

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
	        form_data.append("IpOFICINA",  $("#IpOFICINA").val());
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

$("#clickOFICINA").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_OFICINAform').serialize(),

    beforeSend:function(){  
    $('#mensajeOFICINA').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_OFICINA").load(location.href + " #reset_OFICINA");
    $('#mensajeOFICINA').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>