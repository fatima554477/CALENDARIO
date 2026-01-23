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

$queryVISTAPREV = $conexion->listado_personal33($identioficador);
 $output .= '
<div id="mensajePERSONAL2"></div> 
 <form  id="listado_personal2form"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
  $row = mysqli_fetch_array($queryVISTAPREV);
    
        if($row["ADJUNTO_COMPROBANTE"]!=""){
        $urlADJUNTO_COMPROBANTE= "<a target='_blank'
        href='includes/archivos/".$row["ADJUNTO_COMPROBANTE"]."'>Visualizar!</a>";
        }else{
        $urlADJUNTO_COMPROBANTE="";
        }		
             $output .= '

			 <tr>
			 <td width="30%"><label>NOMBRE</label></td>
			 <td width="70%">
			 '.$altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL2"],'01informacionpersonal','NOMBRE_1').'
			 </td>
			 </tr>
					 			 			 <tr>
			 <td width="30%"><label>FECHA_INICIO DEL EVENTO</label></td>
			 <td width="70%"><input type="date" name="FECHA_INICIO1" value="'.$row["FECHA_INICIO1"].'"></td>

			 </tr>
	
			 
			 			 <tr>
			 <td width="30%"><label>FECHA FINAL DEL EVENTO</label></td>
			 <td width="70%"><input type="date" name="FECHA_FINAL1" value="'.$row["FECHA_FINAL1"].'"></td>

			 </tr>
			 
			 
			 			 			 <tr>
			 <td width="30%"><label>NÚMERO DE DIAS</label></td>
			 <td width="70%"><input type="text" name="NUMERO_DIAS1" value="'.$row["NUMERO_DIAS1"].'"></td>

			 </tr>
			 
			 
			 			 			 			 <tr>
			 <td width="30%"><label>MONTO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO1" value="'.$row["MONTO_BONO1"].'"></td>

			 </tr>
			 
			 			 			 			 			 			 			 <tr>
			 <td width="30%"><label>TOTAL DEL BONO</label></td>
			 <td width="70%"><input type="text" name="MONTO_BONO_TOTAL1" value="'.$row["MONTO_BONO_TOTAL1"].'"></td>

			 </tr>
			 
				 
			 		 <tr>
			 <td width="30%"><label> VIATICOS</label></td>
			 <td width="70%"><input type="text" name="VIATICOS_PERSONAL2" value="'.$row["VIATICOS_PERSONAL2"].'"></td>
			 </tr>
			 
			 
			 
			 
			 
			 <tr>
			 <td width="30%"><label>TOTAL BONO Y VIATICOS</label></td>
			 <td width="70%"><input type="text" name="TOTAL1" value="'.$row["TOTAL1"].'"></td>
			 </tr>
			 
			 <tr>
			 <td width="30%"><label>ÚLTIMO DÍA PARA COMPRAR VIATICOS</label></td>
			 <td width="70%"><input type="date" name="ULTIMO_DIA1" value="'.$row["ULTIMO_DIA1"].'"></td>
			 </tr>
			 
			 
			 
			 <tr>
			 <td width="30%"><label>MOTIVO DEL BONO</label></td>
			 <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL2" value="'.$row["OBSERVACIONES_PERSONAL2"].'"></td>

			 </tr> 

			 			 <tr>
			 <td width="30%"><label>FECHA DE PROGRAMACIÓN DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_PPAGO1" value="'.$row["FECHA_PPAGO1"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%"><label>FORMA DE PAGO</label></td>
			 <td width="70%"><input type="text" name="FORMA_PAGO1" value="'.$row["FORMA_PAGO1"].'"></td>
			 </tr>
			 
			 			 <tr>
			 <td width="30%"><label>FECHA EFECTIVA DE PAGO</label></td>
			 <td width="70%"><input type="date" name="FECHA_EFECTIVA1" value="'.$row["FECHA_EFECTIVA1"].'"></td>
			 </tr>
			 

			 
            <tr>
                 <td width="30%"><label>DOCUMENTO:</label></td>
             <td width="70%"><div class="col-md-6"> 

            <div id="drop_file_zone" ondrop="upload_file(event, \'ADJUNTO_COMPROBANTE\');" ondragover="return false" style="width:300px;"> <p>Suelta aquí o busca tu archivo</p> <p> <input class="form-control form-control-sm" id="ADJUNTO_COMPROBANTE" type="text" onkeydown="return false" onclick="file_explorer(\'ADJUNTO_COMPROBANTE\');" style="width:250px;" value="'.$row["ADJUNTO_COMPROBANTE"].'" required /> </p> <input type="file" name="ADJUNTO_COMPROBANTE" id="nono"/> <div id="2ADJUNTO_COMPROBANTE"> "'.$urlADJUNTO_COMPROBANTE.'" </div> </div> </div>


</td>
</tr>
			 			 <tr>
			 <td width="30%"><label>PAX QUE COBRO</label></td>
			 <td width="70%"><input type="text" name="NOMBRE_RECIBIO" value="'.$row["NOMBRE_RECIBIO"].'"></td>
			 </tr> 			 
			 
			 
			 <tr>
			 <td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
			 <td width="70%"><input type="text" name="PERSONAL2_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL2_FECHA_ULTIMA_CARGA"].'"></td>
			 </tr>  
		

	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal2"  id="IPpersonal2"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickpersonal2">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal2"  name="ENVIARpersonal2"/>

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
	        form_data.append("IPpersonal2",  $("#IPpersonal2").val());
	        $.ajax({
	            type: 'POST',
	            url: 'controladorAE.php',
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

$("#clickpersonal2").click(function(){
	
   $.ajax({  
    url:"calendariodeeventos2/controladorAE.php",
    method:"POST",  
    data:$('#listado_personal2form').serialize(),

    beforeSend:function(){  
    $('#mensajePERSONAL2').html('cargando'); 
    }, 	
	
    success:function(data){
		$("#reset_personal2").load(location.href + " #reset_personal2");
    $('#mensajePERSONAL2').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>