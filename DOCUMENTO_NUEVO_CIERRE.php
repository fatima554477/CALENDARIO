
<div id="content"> 


			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar6" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar6" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;NUEVO DOCUMENTO CIERRE</p><div  id="mensajeDOCUnuevocierre2"><div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWCATEGORIAS; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWCATEGORIAS; ?>%</div></div>
								</div></div></strong>
	       
            <div id="target6" style="display:block;"  class="content2 scroll">
			

			
			<form class="row g-3 needs-validation was-validated" novalidate="" id="DOCUMENTONUEVOcierreform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
			
			
<?php if($conexion->variablespermisos('','DOCUMENTO_NUEVO_CIERRE','guardar' )=='si' and $var_bloquea_fecha=='no'){ ?>
							<table id="example2" class="table table-striped table-bordered" style="background:#e3effa">
					

								<thead>
									<tr style="text-align:center;">
										<strong><th style="background:#e3effa">NUEVO DOCUMENTO CIERRE:</td></strong><br>
							
										<td style="background:#e3effa"><input style="width:500px;" type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $nuevo_documento_cierre; ?>" name="nuevo_documento_cierre"></td>

                                   </tr>
		
                                    </table><table>
									
                  <input type="hidden" name="hnuevodocucierre" id="hnuevodocucierre"  value="hnuevodocucierre">
               
               <tr>
          
            <th>
		

<button style="float:right"   class="btn btn-sm btn-outline-success px-5"  type="button" id="enviardocucierre" value="enviardocucierre" name="enviardocucierre">GUARDAR</button><div style="
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


id="mensajeDOCUnuevocierre"/> </th> <?php } ?>
                      
                 </tr> 
      
               </table></form>




			   <?php
$querycontras = $altaeventos->Listado_nuevocierre();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%"  id='reseteateNUEVOCIERRE' name='reseteateNUEVOCIERRE'>
<tr style="text-align:center">
<td width="70%"style="background:#c9e8e8">NUEVO </td>  

</tr>
<?php
while($row = mysqli_fetch_array($querycontras))
{
?>                                                     


<tr style="background:#f5f9fc;text-align:center">  


                                  

<td  width="70%"><?php echo $row["nuevo_documento_cierre"]; ?></td>
<?php if($conexion->variablespermisos('','DOCUMENTO_NUEVO_CIERRE','modificar')=='si'  and $var_bloquea_fecha=='no'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataNUEVOdocucierre" />
</td> <?php } ?>



<?php if($conexion->variablespermisos('','DOCUMENTO_NUEVO_CIERRE','borrar')=='si'  and $var_bloquea_fecha=='no'){ ?>

<td>


<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_databorraNUEVOdocucierre" />
</td> <?php } ?>
</tr>
<?php
}
?>
</table>
</tbody>
</div>

</div>
</div>
					
					