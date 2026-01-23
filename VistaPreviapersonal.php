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

$queryVISTAPREV = $conexion->listado_personal2($identioficador);
 $output .= '
<div id="mensajePERSONAL1"></div> 
 <form  id="listado_personalform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_COMPROBANTEP"]=="" or $row["ADJUNTO_COMPROBANTEP"]=='2'){
        $urlADJUNTO_COMPROBANTEP="";
        }else{
			$urlADJUNTO_COMPROBANTEP= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_COMPROBANTEP"]."'>Visualizar!</a>";
        }		
             $output .= '

			 <tr>
			 <td width="30%"><label>NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL"],'01informacionpersonal','NOMBRE_1').'
			 </td>
			 </tr>
			 
			 			 			 <tr>
			 <td width="30%"><label>FECHA_INICIO DEL EVENTO</label></td>
			 <td width="70%"><input type="date" name="FECHA_INICIO" value="'.$row["FECHA_INICIO"].'"></td>

			 </tr>
	
			 
			 			 <tr>
			 <td width="30%"><label>FECHA FINAL DEL EVENTO</label></td>
			 <td width="70%"><input type="date" name="FECHA_FINAL" value="'.$row["FECHA_FINAL"].'"></td>

			 </tr>
			 
			 
			 			 			 <tr>
			 <td width="30%"><label>NÚMERO DE DIAS</label></td>
			 <td width="70%"><input type="text" name="NUMERO_DIAS" value="'.$row["NUMERO_DIAS"].'"></td>

			 </tr>
			 
			 
			 			 			 			 <tr>
			 <td width="30%"><label>MONTO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO" value="'.$row["MONTO_BONO"].'"></td>

			 </tr>
			 
			 			 			 			 			 			 			 <tr>
			 <td width="30%"><label>TOTAL DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO_TOTAL" value="'.$row["MONTO_BONO_TOTAL"].'"></td>

			 </tr>
			 
		
			 
			 
			 		 <tr>
			 <td width="30%"><label> VIATICOS</label></td>
			 <td width="70%"><input type="text" name="VIATICOS_PERSONAL" value="'.$row["VIATICOS_PERSONAL"].'"></td>
			 </tr>
			 
			 
			 <tr>
			 <td width="30%"><label>TOTAL BONO Y VIATICOS</label></td>
			 <td width="70%"><input type="text" name="TOTAL" value="'.$row["TOTAL"].'"></td>
			 </tr>
			 
			 <tr>
			 <td width="30%"><label>ÚLTIMO DÍA PARA COMPRAR VIATICOS</label></td>
			 <td width="70%"><input type="date" name="ULTIMO_DIA" value="'.$row["ULTIMO_DIA"].'"></td>
			 </tr>
			 
			 
			 			 <tr>
			 <td width="30%"><label>MOTIVO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL" value="'.$row["OBSERVACIONES_PERSONAL"].'"></td></tr>
			 
			 
			 			 <tr>
			 <td width="30%"><label>FECHA DE PROGRAMACIÓN DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_PPAGO" value="'.$row["FECHA_PPAGO"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%"><label>FORMA DE PAGO</label></td>
			 <td width="70%"><input type="text" name="FORMA_PAGO" value="'.$row["FORMA_PAGO"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%"><label>FECHA EFECTIVA DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_EFECTIVA" value="'.$row["FECHA_EFECTIVA"].'"></td>
			 </tr>
			 

			 
<tr>
<td width="30%"><label>DOCUMENTO:</label></td>
<td width="70%">



<div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COMPROBANTEP\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COMPROBANTEP" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COMPROBANTEP\');" style="width:250px;" value="'.$row["ADJUNTO_COMPROBANTEP"].'" required /> </p> <input type="file" name="ADJUNTO_COMPROBANTEP" id="nono"/> <div id="2ADJUNTO_COMPROBANTEP"> "'.$urlADJUNTO_COMPROBANTEP.'" </div> </div> </div>



</td>
</tr>
			 			 <tr>
			 <td width="30%"><label>PAX QUE COBRO</label></td>
			 <td width="70%"><input type="text" name="NOMBRE_RECIBIO" value="'.$row["NOMBRE_RECIBIO"].'"></td>
			 </tr> 
			 



		  <tr>
			 <td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal"  id="IPpersonal"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickpersonal">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal"  name="ENVIARpersonal"/>

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
	        form_data.append("IPpersonal",  $("#IPpersonal").val());
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

$("#clickpersonal").click(function(){
	
   $.ajax({  
    url: 'calendariodeeventos2/controladorAE.php',
    method:"POST",  
    data:$('#listado_personalform').serialize(),

    beforeSend:function(){  
    $('#mensajePERSONAL1').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_personal").load(location.href + " #reset_personal");
    $('#mensajePERSONAL').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>