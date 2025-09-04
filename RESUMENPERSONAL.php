
<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar41" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar41" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;RESUMEN DEL PERSONAL DEL EVENTO </p>
<div  id="mensajePERSONALresumen"><div class="progress" style="width: 25%;">

									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCONTACTOSBODE; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCONTACTOSBODE; ?>%</div>
									
								</div></div>
								</strong>
	        <div id="target41" style="display:block;"  class="content2">
        <div class="card">

        <div>
            

      
 

               <?php

               ?>
               
               <br />
               <div class='table-responsive'>
               <div align='right'>
               </div>
               <br />
               <div id='employee_table'>
               <tbody >
               <table class="table table-striped table-bordered" style="width:100%"   id='reset_personal_resumen' name='reset_personal'>
			   
               <tr style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:14px;color:red">PERSONAL QUE ADMINISTRA EL EVENTO</a>
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
			   $querycontras2 = $altaeventos->listado_personalAA1();
			   $row = '';
               while($row = mysqli_fetch_array($querycontras2))
               {
               ?>
			<tr style="background:#f5f9fc;text-align:center"  class="table table-striped table-bordered" style="width:100%" >
			<td ><?php echo $altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL"],'01informacionpersonal','NOMBRE_1'); ?></td>
			<td > <?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','PUESTO')); ?></td>
			<td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','CORREO_3'); ?></td>
			<td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL"],'01empresa','CORREO_1'); ?></td>
			<td ><?php echo $row["FECHA_INICIO"]; ?></td>
			<td ><?php echo $row["FECHA_FINAL"]; ?></td>
			<td ><?php echo $row["NUMERO_DIAS"]; ?></td>
			<td ><?php echo $row["MONTO_BONO"]; ?></td>
			<td ><?php echo $row["MONTO_BONO_TOTAL"]; ?></td>
			<td ><?php echo $row["VIATICOS_PERSONAL"]; ?></td>
			<td ><?php echo $row["TOTAL"]; ?></td>
			<td ><?php echo $row["ULTIMO_DIA"]; ?></td>
			<td ><?php echo $row["OBSERVACIONES_PERSONAL"]; ?></td>
			<td ><?php echo $row["PERSONAL_FECHA_ULTIMA_CARGA"]; ?></td>
			</tr>
			<?php 
          $MONTO_BONO += $row["MONTO_BONO"];			
          $MONTO_BONO_TOTAL += $row["MONTO_BONO_TOTAL"];
          $VIATICOS_PERSONAL += $row["VIATICOS_PERSONAL"];
          $TOTAL += $row["TOTAL"];
			} ?>			   
<tr><td colspan="14"><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:14px;color:red">PERSONAL QUE ASISTE AL EVENTO</a></td></tr>
               <?php
			   $querycontras1 = $altaeventos->listado_personalAA2();
			   $row = '';
               while($row = mysqli_fetch_array($querycontras1))
               {
               ?>
			<tr style="background:#f5f9fc;text-align:center"  class="table table-striped table-bordered" style="width:100%" >       
			<td >  <?php echo $altaeventos->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL2"],'01informacionpersonal','NOMBRE_1'); ?></td>
			<td ><?php echo str_replace('_',' ' , $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','PUESTO')); ?></td>
			<td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_3'); ?></td>
			<td ><?php echo $altaeventos->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_1'); ?></td>
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
          <?php
          $MONTO_BONO1 += $row["MONTO_BONO1"];
          $MONTO_BONO_TOTAL1 += $row["MONTO_BONO_TOTAL1"];
          $VIATICOS_PERSONAL2 += $row["VIATICOS_PERSONAL2"];
          $TOTAL1 += $row["TOTAL1"];
          }
		  
          $MONTO_BONO_TOTAL11 = $MONTO_BONO_TOTAL + $MONTO_BONO_TOTAL1;
          $VIATICOS_PERSONAL22 = $VIATICOS_PERSONAL2 + $VIATICOS_PERSONAL;
          $TOTAL11 = $TOTAL1 + $TOTAL;
		  $total_montodel_bono = $MONTO_BONO1 +$MONTO_BONO;
		  
          ?>
          
          <tr>
          <td colspan='7' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
		  
          <td style="text-align:center;">$ <?php echo number_format($total_montodel_bono,2,'.',','); ?></td>
		  
          <td style="text-align:center;">$ <?php echo number_format($MONTO_BONO_TOTAL11,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($VIATICOS_PERSONAL22,2,'.',','); ?></td>
          <td style="text-align:center;">$ <?php echo number_format($TOTAL11,2,'.',','); ?></td><td></td></tr>
            
          </table>  
             </tbody>
</form>
	
			                        
		  
        </table>





	</tbody>



 
          

</div>   
</div>
</div>
</div>   
</div>
</div>