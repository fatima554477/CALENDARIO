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
 $output .= ' <form  id="listado_personalform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {



     $output .= '

     <tr>
     <td width="30%"><label>NOMBRE</label></td>
     <td width="70%"><input type="text" name="NOMBRE_PERSONAL" value="'.$row["NOMBRE_PERSONAL"].'"></td>
     </tr> <tr>
     <td width="30%"><label>PUESTO</label></td>
     <td width="70%"><input type="text" name="PUESTO_PERSONAL" value="'.$row["PUESTO_PERSONAL"].'"></td>
     </tr> <tr>
     <td width="30%"><label>WHATSAPP </label></td>
     <td width="70%"><input type="text" name="WHAT_PERSONAL" value="'.$row["WHAT_PERSONAL"].'"></td>
     </tr> <tr>
     <td width="30%"><label>EMAIL</label></td>
     <td width="70%"><input type="text" name="EMAIL_PERSONAL" value="'.$row["EMAIL_PERSONAL"].'"></td>
     </tr> <tr>
     <td width="30%"><label>VIATICOS</label></td>
     <td width="70%"><input type="text" name="VIATICOS_PERSONAL" value="'.$row["VIATICOS_PERSONAL"].'"></td>
     </tr><tr>
     <td width="30%"><label>OBSERVACIONES</label></td>
     <td width="70%"><input type="text" name="OBSERVACIONES_PERSONAL" value="'.$row["OBSERVACIONES_PERSONAL"].'"></td>
     </tr>  <tr>
     <td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
     <td width="70%"><input type="text" name="PERSONAL_FECHA_ULTIMA_CARGA" value="'.$row["PERSONAL_FECHA_ULTIMA_CARGA"].'"></td>
     </tr>  

	 <tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickperso">GUARDAR</button>
			
			<input type="hidden" value="ENVIARpersonal"  name="ENVIARpersonal"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPpersonal" id="IPpersonal"/>
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
	$(document).ready(function(){


$("#clickperso").click(function(){
	
   $.ajax({  
    url: 'altaeventos/controladorAE.php',
    method:"POST",  
    data:$('#listado_personalform').serialize(),

    beforeSend:function(){  
    $('#mensajePERSONAL').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
			$("#reset_personal").load(location.href + " #reset_personal");
			$("#mensajePERSONAL").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#mensajePERSONAL").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>