<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar9" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar9" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; AUTORIZACIÓN PARA DAR DE ALTA  UN EVENTO </p></strong></div>


<div  id="mensajenumeroevento2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $NEporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target9" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
                      <form class="row g-3 needs-validation was-validated" id="numeroeventosform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                

                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">COLABORADOR:</label></strong>
                        
             						  <?php
	$queryper = $altaeventos->lista_colaboradoreventos();
	$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="NUMERO_EVENTO_COLABORADOR" required="" name="NUMERO_EVENTO_COLABORADOR">
	<option value="">SELECCIONA UNA OPCIÓN</option>';	
	while($row1 = mysqli_fetch_array($queryper))
	{
	$select='';
	if($NUMERO_EVENTO_COLABORADOR==$row1['USUARIO_CRM']){$select = "selected";};

	$option .= '<option style="background: #c9e8e8" '.$select.' value="'.$row1['USUARIO_CRM'].'">'.$row1['USUARIO_CRM'].'</option>';
	}
	echo $encabezado.$option.'</select>';			
	?>
	          </div>					
						
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>
						
						<label for="validationCustom01" class="form-label">INICIALES DE LA EMPRESA:</label></strong>
						  
						  <?php
						  $encabezado='';$option='';
	$queryper = $altaeventos->lista_inicialescorp();
	$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="INICIALES_EMPRESA_EVENTO" required="" name="INICIALES_EMPRESA_EVENTO"  onchange="getval();">
	<option value="">SELECCIONA UNA OPCIÓN</option>';	
	while($row1 = mysqli_fetch_array($queryper))
	{
	$select='';
	if($INICIALES_EMPRESA_EVENTO==$row1['NCE_OBSERVACIONES']){$select = "selected";};

	$option .= '<option style="background: #c9e8e8" '.$select.' value="'.$row1['NCE_OBSERVACIONES'].'">'.$row1['NCE_OBSERVACIONES'].'</option>';
	}
	echo $encabezado.$option.'</select>';			
	?>
						  
						  
						  
						  
                        </div>
						
						
						
						
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">NÚMERO DE EVENTO</label></strong>
						
						<span id="numeroeventoiniciales">
						<?php $NCE_OBSERVACIONES= $_SESSION['INICIALES_EMPRESA_EVENTO1']; ?>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $queryper = $altaeventos->NUMERO_EVENTO($NCE_OBSERVACIONES); ?>" required="" name="NUMERO_DE_EVENTO">
                          <div class="valid-feedback">Bien!</div>
						</span>  
						  
						  
						  </div>
						  
						  
        
						  <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_NUMERO_EVENTO">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hnumeroevento" name="hnumeroevento"/>     
 
  
      
 <th><tr></table>
           
<table><tr>  <?php if($conexion->variablespermisos('','AUDITORIA','guardar')=='si'){ ?>
 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_NUMERO_EVENTO">GUARDAR</button><div style="
 position: absolute;
    top: 50%; 
    right: 50%;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2em;
    font-weight: 500;
    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);"


id="mensajenumeroevento"/></th>
           
           </tr><?php } ?></table>
		   
		   </form>


 
</div>
</div>  
</div>  