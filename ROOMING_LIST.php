<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar5" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar5" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; ROOMING LIST</p></strong>


<div  id="mensajeALTAEVENTOS2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div>
									</div>
									</div>
									</div>
							
	        <div id="target5" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
                      <form class="row g-3 needs-validation was-validated" id="ALTAEVENTOSform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
                      <table  style="border-collapse: collapse;" border="1" class="table mb-0 table-striped">


                      <div class="col-md-4"style="background:#fbeee6">
                      <strong>  <label for="validationCustom01" class="form-label">NOMBRE DEL DOCUMENTO:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $PRODUCTO_O_SERVICIO_9; ?>" required="" name="PRODUCTO_O_SERVICIO_9">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#d4f6c8">

                        <strong>   <label for="validationCustom01" class="form-label">DOCUMENTO:</label></strong>
                          <input type="file" class="form-control" id="validationCustom01" value="<?php echo $PRODUCTO_O_SERVICIO_10; ?>" required="" name="PRODUCTO_O_SERVICIO_10">
                          <div class="valid-feedback">Bien!</div>
                        </div>
                        <div class="col-md-4"style="background:#fbeee6">

                        <strong>   <label for="validationCustom01" class="form-label">OBSERVACIONES:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $PRODUCTO_O_SERVICIO_11; ?>" required="" name="PRODUCTO_O_SERVICIO_11">
                          <div class="valid-feedback">Bien!</div>
                        
                          </div><div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="PRODUCTO_O_SERVICIO_12">
           
           </td></tr></div></form>



                                    
    <input type="hidden" value="hCIERRE" name="hCIERRE"/>     
 
  
      
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_CIERRE">GUARDAR</button><div style="
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


id="mensajeALTAEVENTOS"/></th></tr>
           
                   </table>
                  </form>
                  <tr>
                  <form name="form_emai_altaevento" id="form_emai_altaevento">
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_ALTA_EVENTOS" id="EMAIL_ALTA_EVENTOS" class="form-control" aria-label="With textarea"><?php echo $EMAIL_ALTA_EVENTOS; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_ALTA_EVENTOS">ENVIAR POR EMAIL</button></td>   
                
           </tr></table></form>


 
</div>
</div>  
</div>  