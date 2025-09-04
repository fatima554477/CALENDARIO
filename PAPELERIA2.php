

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar37" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar37" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; PAPELERIA </p></strong></div>


<div  id="mensajePAPELERIA2">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target37" style="display:block;" class="content2">
        <div class="card">
        <div class="card-body" id='actualizapapeleria'>
                
                      <form class="row g-3 needs-validation was-validated" id="PAPELERIAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <?php
$querycontras = $altaeventos->Listado_PAPELERIA();
?>

<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_PAPELERIA' name='reset_PAPELERIA'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="20%"style="background:#c9e8e8">PAPELERIA</th>
<th width="20%"style="background:#c9e8e8">CANTIDAD</th>
<th width="20%"style="background:#c9e8e8">FOTO</th>
<th width="20%"style="background:#c9e8e8">FECHA DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">LUGAR DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">HORA DE ENTREGA</th>
<th width="20%"style="background:#c9e8e8">FECHA DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">LUGAR DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">HORA DE DEVOLUCIÓN</th>
<th width="20%"style="background:#c9e8e8">FECHA DE SOLICITUD</th>
<th width="20%"style="background:#c9e8e8">DIAS SOLICITADOS</th>
<th width="20%"style="background:#c9e8e8">COSTO</th>
<th width="20%"style="background:#c9e8e8">SUB TOTAL</th>
<th width="20%"style="background:#c9e8e8">IVA</th>
<th width="20%"style="background:#c9e8e8">TOTAL</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>


</tr>

<?php
$urlPAPELERIA_FOTO ='';
while($row = mysqli_fetch_array($querycontras))
{	
	$urlPAPELERIA_FOTO = $conexion->descargararchivo($row["PAPELERIA_FOTO"]);
?>


<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="PAPELERIA[]" id="PAPELERIA" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $altaeventos->nombre_papeleria($row["PAPELERIA_EQUIPO"]);?></td>
<td ><?php echo $row["PAPELERIA_CANTIDAD"]; ?></td>
<td ><?php echo $urlPAPELERIA_FOTO; ?></td>
<td ><?php echo $row["PAPELERIA_ENTREGA"]; ?></td>
<td ><?php echo $row["PAPELERIA_LUGAR"]; ?></td>
<td ><?php echo $row["PAPELERIA_HORA"]; ?></td>
<td ><?php echo $row["PAPELERIA_DEVOLU"]; ?></td>
<td ><?php echo $row["PAPELERIA_LUDEVO"]; ?></td>
<td ><?php echo $row["PAPELERIA_HORADEVO"]; ?></td>
<td ><?php echo $row["PAPELERIA_SOLICITUD"]; ?></td>
<td ><?php echo $row["PAPELERIA_DIAS"]; ?></td>
<td ><?php echo $row["PAPELERIA_COSTO"]; ?></td>
<td ><?php echo $row["PAPELERIA_SUB"]; ?></td>
<td ><?php echo $row["PAPELERIA_IVA"]; ?></td>
<td ><?php echo $row["PAPELERIA_TOTAL"]; ?></td>
<td ><?php echo $row["PAPELERIA_OBSERVA"]; ?></td>

<td><input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_PAPELERIA" /></td>

<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataPAPELERIAborrar" />
</td>
</tr>

<?php
$PASUNTOTAL1 += $row["PAPELERIA_SUB"];
$PAIVA1 += $row["PAPELERIA_IVA"];
$PATOTAL1 += $row["PAPELERIA_TOTAL"];
}
?>

<tr>
<td colspan='13' style="text-align:right;"><strong style="font-size:16px">TOTALES</strong></td>
<td>$ <?php echo number_format($PASUNTOTAL1,2,'.',','); ?></td>
<td>$ <?php echo number_format($PAIVA1,2,'.',','); ?></td>
<td>$ <?php echo number_format($PATOTAL1,2,'.',','); ?></td><td></td></tr>
</table>
</tbody>			

			</form>
                  
</div>
</div> 
</div>
</div> 
</div>

