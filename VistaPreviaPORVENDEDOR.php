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
$queryVISTAPREV = $conexion->Listado_PORVENDEDOR2($identioficador);
 $output .= ' <form  id="listadoPORVENDEDORform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {







     $output .= '

<tr>
<td width="30%"><label>NOMBRE DEL VENDEDOR:</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_PORVENDEDOR" value="'.$row["DOCUMENTO_PORVENDEDOR"].'"></td>
</tr>  <tr>
<td width="30%"><label>PORCENTAJE:</label></td>
<td width="70%"><input type="text" name="ADJUNTO_PORVENDEDOR" value="'.$row["ADJUNTO_PORVENDEDOR"].'"></td>
</tr>  <tr>
<td width="30%"><label>CANTIDAD:</label></td>
<td width="70%"><input type=»text» readonly=»readonly» name="CANTIDAD_PORVENDEDOR" value="'.$row["CANTIDAD_PORVENDEDOR"].'"></td>
</tr> <tr>
<td width="30%"><label>OBSERVACIONES:</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_PORVENDEDOR" value="'.$row["OBSERVACIONES_PORVENDEDOR"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA:</label></td>
<td width="70%"><input  type=»text» readonly=»readonly» name="FECHA_PORVENDEDOR" value="'.$row["FECHA_PORVENDEDOR"].'"></td>
</tr>

	 <tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickPORVENDEDOR">GUARDAR</button>
			
			<input type="hidden" value="enviarPORVENDEDOR"  name="enviarPORVENDEDOR"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPPORVENDEDOR" id="IPPORVENDEDOR"/>
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


$("#clickPORVENDEDOR").click(function(){
	
   $.ajax({  
    url:'calendariodeeventos2/controladorAE.php',
    method:"POST",  
    data:$('#listadoPORVENDEDORform').serialize(),

    beforeSend:function(){  
    $('#mensajePORVENDEDOR').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
			$("#reset_PORVENDEDOR").load(location.href + " #reset_PORVENDEDOR");
			$("#mensajePORVENDEDOR").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#mensajePORVENDEDOR").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>