<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";
	$tables="04personal2";
	

$NUMERO_EVENTO_PERSONAL2 = isset($_POST["NUMERO_EVENTO_PERSONAL2"])?$_POST["NUMERO_EVENTO_PERSONAL2"]:""; 
$ID_EVENTO_PERSONAL2 = isset($_POST["ID_EVENTO_PERSONAL2"])?$_POST["ID_EVENTO_PERSONAL2"]:""; 
$NOMBRE_EVENTO_PERSONAL2 = isset($_POST["NOMBRE_EVENTO_PERSONAL2"])?$_POST["NOMBRE_EVENTO_PERSONAL2"]:""; 
$NOMBRE_DELINGRESO2 = isset($_POST["NOMBRE_DELINGRESO2"])?$_POST["NOMBRE_DELINGRESO2"]:""; 
$NOMBRE_PERSONAL2 = isset($_POST["NOMBRE_PERSONAL2"])?$_POST["NOMBRE_PERSONAL2"]:""; 
$FECHA_INICIO1 = isset($_POST["FECHA_INICIO1"])?$_POST["FECHA_INICIO1"]:""; 
$FECHA_FINAL1 = isset($_POST["FECHA_FINAL1"])?$_POST["FECHA_FINAL1"]:""; 
$NUMERO_DIAS1 = isset($_POST["NUMERO_DIAS1"])?$_POST["NUMERO_DIAS1"]:""; 
$MONTO_BONO1 = isset($_POST["MONTO_BONO1"])?$_POST["MONTO_BONO1"]:""; 
$MONTO_BONO_TOTAL1 = isset($_POST["MONTO_BONO_TOTAL1"])?$_POST["MONTO_BONO_TOTAL1"]:""; 
$FECHA_PPAGO1 = isset($_POST["FECHA_PPAGO1"])?$_POST["FECHA_PPAGO1"]:""; 
$OBSERVACIONES_PERSONAL2 = isset($_POST["OBSERVACIONES_PERSONAL2"])?$_POST["OBSERVACIONES_PERSONAL2"]:""; 
$PERSONAL2_FECHA_ULTIMA_CARGA = isset($_POST["PERSONAL2_FECHA_ULTIMA_CARGA"])?$_POST["PERSONAL2_FECHA_ULTIMA_CARGA"]:""; 
$hDatosPERSONAL2 = isset($_POST["hDatosPERSONAL2"])?$_POST["hDatosPERSONAL2"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"NUMERO_EVENTO_PERSONAL2"=>$NUMERO_EVENTO_PERSONAL2,
"ID_EVENTO_PERSONAL2"=>$ID_EVENTO_PERSONAL2,
"NOMBRE_EVENTO_PERSONAL2"=>$NOMBRE_EVENTO_PERSONAL2,
"NOMBRE_DELINGRESO2"=>$NOMBRE_DELINGRESO2,
"NOMBRE_PERSONAL2"=>$NOMBRE_PERSONAL2,
"FECHA_INICIO1"=>$FECHA_INICIO1,
"FECHA_FINAL1"=>$FECHA_FINAL1,
"NUMERO_DIAS1"=>$NUMERO_DIAS1,
"MONTO_BONO1"=>$MONTO_BONO1,
"MONTO_BONO_TOTAL1"=>$MONTO_BONO_TOTAL1,
"FECHA_PPAGO1"=>$FECHA_PPAGO1,
"OBSERVACIONES_PERSONAL2"=>$OBSERVACIONES_PERSONAL2,
"PERSONAL2_FECHA_ULTIMA_CARGA"=>$PERSONAL2_FECHA_ULTIMA_CARGA,
"hDatosPERSONAL2"=>$hDatosPERSONAL2,

 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr>
<th style="background:#c9e8e8">#</th>
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NUMERO EVENTO PERSONAL2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ID_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">ID EVENTO PERSONAL2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE EVENTO PERSONAL2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DELINGRESO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE DELINGRESO2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE PERSONAL2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA INICIO1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA FINAL1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_DIAS1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NUMERO DIAS1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_BONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO BONO1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_BONO_TOTAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO BONO TOTAL1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA PPAGO1</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">OBSERVACIONES PERSONAL2</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PERSONAL2_FECHA_ULTIMA_CARGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">PERSONAL2 FECHA ULTIMA CARGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"hDatosPERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">hDatosPERSONAL2</th>
<?php } ?>

<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_EVENTO_PERSONAL2_1" value="<?php 
echo $NUMERO_EVENTO_PERSONAL2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"ID_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="ID_EVENTO_PERSONAL2_1" value="<?php 
echo $ID_EVENTO_PERSONAL2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_EVENTO_PERSONAL2_1" value="<?php 
echo $NOMBRE_EVENTO_PERSONAL2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_DELINGRESO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_DELINGRESO2_1" value="<?php 
echo $NOMBRE_DELINGRESO2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NOMBRE_PERSONAL2_1" value="<?php 
echo $NOMBRE_PERSONAL2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_INICIO1_1" value="<?php 
echo $FECHA_INICIO1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_FINAL1_1" value="<?php 
echo $FECHA_FINAL1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_DIAS1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="NUMERO_DIAS1_1" value="<?php 
echo $NUMERO_DIAS1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_BONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_BONO1_1" value="<?php 
echo $MONTO_BONO1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_BONO_TOTAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_BONO_TOTAL1_1" value="<?php 
echo $MONTO_BONO_TOTAL1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FECHA_PPAGO1_1" value="<?php 
echo $FECHA_PPAGO1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="OBSERVACIONES_PERSONAL2_1" value="<?php 
echo $OBSERVACIONES_PERSONAL2; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PERSONAL2_FECHA_ULTIMA_CARGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PERSONAL2_FECHA_ULTIMA_CARGA_1" value="<?php 
echo $PERSONAL2_FECHA_ULTIMA_CARGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"hDatosPERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="hDatosPERSONAL2_1" value="<?php 
echo $hDatosPERSONAL2; ?>"></td>
<?php } ?>
<?php /*termina copiar y terminaA4*/ ?>
	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){?>
		<tr>
<td><?php echo $row["id"];?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>--><?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NUMERO_EVENTO_PERSONAL2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"ID_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['ID_EVENTO_PERSONAL2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NOMBRE_EVENTO_PERSONAL2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_DELINGRESO2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NOMBRE_DELINGRESO2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NOMBRE_PERSONAL2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_INICIO1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_FINAL1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_DIAS1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['NUMERO_DIAS1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MONTO_BONO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['MONTO_BONO1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MONTO_BONO_TOTAL1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['MONTO_BONO_TOTAL1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_PPAGO1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_PPAGO1'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_PERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['OBSERVACIONES_PERSONAL2'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PERSONAL2_FECHA_ULTIMA_CARGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['PERSONAL2_FECHA_ULTIMA_CARGA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"hDatosPERSONAL2",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['hDatosPERSONAL2'];?></td>
<?php } ?>
<?php /*termina copiar y terminaA5*/ ?>
			<td>
<?php if($database->variablespermisos('','ALTA_EVENTOS','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosmodifica" />			
<?php } ?>
			</td>
			<td>
<?php if($database->variablespermisos('','ALTA_EVENTOS','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosborrar" />
<?php } ?>
			</td>			
		</tr>
			<?php
			$finales++;
		}	
	?>
		</tbody>
		</table>
		</div>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
