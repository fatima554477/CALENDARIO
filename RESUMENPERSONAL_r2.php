
<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar44" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar44" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;RESUMEN DEL PERSONAL DEL EVENTO </p>
<div  id="mensajePERSONAL"><div class="progress" style="width: 25%;">

									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCONTACTOSBODE; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCONTACTOSBODE; ?>%</div>
									
								</div></div>
								</strong>
	        <div id="target44" style="display:block;"  class="content2">
        <div class="card">

        <div>
            

      
 

               <?php
               $querycontras = $altaeventos->listado_personal1y2();
               ?>
               
               <br />
               <div class='table-responsive'>
               <div align='right'>
               </div>
               <br />
               <div id='employee_table'>
               <tbody= 'font-style:italic;'>
               <table class="table table-striped table-bordered" style="width:100%"  id='reset_personal' name='reset_personal'>
               <tr style="text-align:center">
               <th width="20%"style="background:#c9e8e8">NOMBRE</th>
               <th width="20%"style="background:#c9e8e8">PUESTO</th>
               <th width="20%"style="background:#c9e8e8">WHATSAPP</th>
               <th width="20%"style="background:#c9e8e8">EMAIL</th>
               <th width="20%"style="background:#c9e8e8">FECHA DE INICIO EN EVENTO</th>
               <th width="20%"style="background:#c9e8e8">FECHA FINAL EN EVENTO</th>
               <th width="20%"style="background:#c9e8e8">NÚMERO DE DÍAS</th>
               <th width="20%"style="background:#c9e8e8">MONTO DE BONO</th>
               <th width="20%"style="background:#c9e8e8">TOTAL DE BONO</th>
               <th width="20%"style="background:#c9e8e8">VIATICOS</th>
               <th width="20%"style="background:#c9e8e8">TOTAL</th>
               <th width="20%"style="background:#c9e8e8">ULTIMO DÍA PARA COMPROBAR VIATICOS:</th>
               <th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
               <th width="20%"style="background:#c9e8e8">FECHA DE ÚLTIMA CARGA</th>
               </tr>
               <?php
               while($row = mysqli_fetch_array($querycontras))
               {
               ?>
               <tr style="background:#f5f9fc;text-align:center">
           
               <td >
           <?php echo $altaeventos->un_solo_colaborador555($row["NOMBRE_PERSONAL"],'01empresa','USUARIO_CRM'); ?>
           </td>
           
               <td >
           <?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador555($row["NOMBRE_PERSONAL"],'01empresa','PUESTO')); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador555($row["NOMBRE_PERSONAL"],'01informacionpersonal','CELULAR_1'); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador555($row["NOMBRE_PERSONAL"],'01informacionpersonal','IPCORREO1'); ?>
           </td>
           <td ><?php echo $row["FECHA_INICIO"]; ?></td>
          <td ><?php echo $row["FECHA_FINAL"]; ?></td>
          <td ><?php echo $row["NUMERO_DIAS"]; ?></td>
          <td ><?php echo $row["MONTO_BONO"]; ?></td>
          <td ><?php echo $row["MONTO_BONO_TOTAL"]; ?></td>
          <td ><?php echo $row["VIATICOS_PERSONAL"]; ?></td>
          <td ><?php echo $row["TOTAL"]; ?></td>
          <td ><?php echo $row["ULTIMO_DIA"]; ?></td>
              
               <td ><?php echo $row["OBSERVACIONES_PERSONAL"]; ?></td>
               <td ><?php echo $row["PERSONAL_FECHA_ULTIMA_CARGA"]; ?></td> </tr>
			   
			   

               
			              <tr style="background:#f5f9fc;text-align:center">
           
               <td >
           <?php echo $altaeventos->un_solo_colaborador555($row["NOMBRE_PERSONAL2"],'01empresa','USUARIO_CRM'); ?>
           </td>
           
               <td >
           <?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador999($row["NOMBRE_PERSONAL2"],'01empresa','PUESTO')); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador999($row["NOMBRE_PERSONAL2"],'01informacionpersonal','CELULAR_1'); ?>
           </td>
           
               <td ><?php echo $altaeventos->un_solo_colaborador999($row["NOMBRE_PERSONAL2"],'01informacionpersonal','IPCORREO1'); ?>
           </td>
           <td ><?php echo $row["FECHA_INICIO1"]; ?></td>
          <td ><?php echo $row["FECHA_FINAL1"]; ?></td>
          <td ><?php echo $row["NUMERO_DIAS1"]; ?></td>
          <td ><?php echo $row["MONTO_BONO1"]; ?></td>
          <td ><?php echo $row["MONTO_BONO_TOTAL1"]; ?></td>
          <td ><?php echo $row["VIATICOS_PERSONAL2"]; ?></td>
          <td ><?php echo $row["TOTAL1"]; ?></td>
          <td ><?php echo $row["ULTIMO_DIA1"]; ?></td>
              
               <td ><?php echo $row["OBSERVACIONES_PERSONAL2"]; ?></td>
               <td ><?php echo $row["PERSONAL2_FECHA_ULTIMA_CARGA"]; ?></td>                      
          </tr>
        </table>




          <?php
	}
	    
?>




 
          

</div>   
</div>
</div>
</div>   
</div>
</div>