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

$queryVISTAPREV = $conexion->Listado_PAPELERIA2($identioficador);
 $output .= '
<div id="mensajePAPELERIA"></div> 
 <form  id="Listado_PAPELERIAform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["PAPELERIA_FOTO"]!=""){
        $urlPAPELERIA_FOTO= "<a target='_blank'
        href='includes/archivos/".$row["PAPELERIA_FOTO"]."'>Visualizar!</a>";
        }else{
        $urlPAPELERIA_FOTO="";
        }		
             $output .= '

<tr>
<td width="30%"><label>PAPELERIA:</label></td>
<td width="70%"><input type="text" name="PAPELERIA_EQUIPO" value="'.$row["PAPELERIA_EQUIPO"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="PAPELERIA_CANTIDAD" value="'.$row["PAPELERIA_CANTIDAD"].'"></td>
</tr>

<tr>
<td width="30%"><label>FOTO</label></td>
<td width="70%"><div class="col-md-6"> 

<div id="drop_file_zone" ondrop="upload_file(event, \'PAPELERIA_FOTO\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="PAPELERIA_FOTO" type="text" onkeydown="return false" onclick="file_explorer(\'PAPELERIA_FOTO\');" style="width:250px;" value="'.$row["ADJUNTO_cronoterrestre"].'" required /> </p> <input type="file" name="PAPELERIA_FOTO" id="nono"/> <div id="2PAPELERIA_FOTO"> "'.$urlPAPELERIA_FOTO.'" </div> </div> </div>
</td>


<tr>
<td width="30%"><label>FECHA DE ENTREGA</label></td>
<td width="70%"><input type="date" name="PAPELERIA_ENTREGA" value="'.$row["PAPELERIA_ENTREGA"].'"></td>
</tr>

<tr>
<td width="30%"><label>LUGAR DE ENTREGA</label></td>
<td width="70%"><input type="text" name="PAPELERIA_LUGAR" value="'.$row["PAPELERIA_LUGAR"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE ENTREGA</label></td>
<td width="70%"><input type="time" name="PAPELERIA_HORA" value="'.$row["PAPELERIA_HORA"].'"></td>
</tr>


<tr>
<td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="date" name="PAPELERIA_DEVOLU" value="'.$row["PAPELERIA_DEVOLU"].'"></td>
</tr>


<tr>
<td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="text" name="PAPELERIA_LUDEVO" value="'.$row["PAPELERIA_LUDEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
<td width="70%"><input type="time" name="PAPELERIA_HORADEVO" value="'.$row["PAPELERIA_HORADEVO"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE SOLICITUD</label></td>
<td width="70%"><input type="date" name="PAPELERIA_SOLICITUD" value="'.$row["PAPELERIA_SOLICITUD"].'"></td>
</tr>


<tr>
<td width="30%"><label>DIAS SOLICITADOS</label></td>
<td width="70%"><input type="text" name="PAPELERIA_DIAS" value="'.$row["PAPELERIA_DIAS"].'"></td>
</tr>

<tr>
<td width="30%"><label>COSTO</label></td>
<td width="70%"><input type="text" name="PAPELERIA_COSTO" value="'.$row["PAPELERIA_COSTO"].'"></td>
</tr>


<tr>
<td width="30%"><label>IVA</label></td>
<td width="70%"><input type="text" name="PAPELERIA_IVA" value="'.$row["PAPELERIA_IVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>SUB TOTAL</label></td>
<td width="70%"><input type="text" name="PAPELERIA_SUB" value="'.$row["PAPELERIA_SUB"].'"></td>
</tr>


<tr>
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="PAPELERIA_TOTAL" value="'.$row["PAPELERIA_TOTAL"].'"></td>
</tr>

<tr>
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="PAPELERIA_OBSERVA" value="'.$row["PAPELERIA_OBSERVA"].'"></td>
</tr>








	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpPAPELERIA"  id="IpPAPELERIA"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickPAPELERIA">GUARDAR</button>
			
			<input type="hidden" value="enviarPAPELERIA"  name="enviarPAPELERIA"/>

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
	        form_data.append("IpPAPELERIA",  $("#IpPAPELERIA").val());
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

$("#clickPAPELERIA").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#Listado_PAPELERIAform').serialize(),

    beforeSend:function(){  
    $('#mensajePAPELERIA').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_PAPELERIA").load(location.href + " #reset_PAPELERIA");
    $('#mensajePAPELERIA').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>