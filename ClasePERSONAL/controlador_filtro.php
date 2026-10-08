<?php
/**
    --------------------------
    Autor: Sandor Matamoros
    Programer: Fatima Arellano
    Propietario: EPC
    ----------------------------
*/

if(!isset($_SESSION)){
    session_start();
}

define("__ROOT6__", dirname(__FILE__));

$action = (isset($_POST["action"]) && $_POST["action"] != NULL)
    ? $_POST["action"] : "";

if($action == "ajax"){

    require(__ROOT6__."/class.filtro.php");
    $database=new orders();

    $query=isset($_POST["query"])?$_POST["query"]:"";

    $DEPARTAMENTO = !empty($_POST["DEPARTAMENTO2"])
        ? $_POST["DEPARTAMENTO2"] : "DEFAULT";

    $nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
    $altaeventos = "altaeventos";
    $tables="04personal2";

    $puedeVerAdmin2 = ($database->variablespermisos('', 'PERSO2', 'ver') === 'si');
    $puedeVerVYO2 = ($database->variablespermisos('', 'PERSOvyo2', 'ver') === 'si');
    $puedeGuardarVYO2 = ($database->variablespermisos('', 'PERSOvyo2', 'guardar') === 'si');
    $puedeModificarVYO2 = ($database->variablespermisos('', 'PERSOvyo2', 'modificar') === 'si');
    $puedeVerDIRECCION2 = ($database->variablespermisos('', 'PERSOdire2', 'ver') === 'si');
    $puedeGuardarDIRECCION2 = ($database->variablespermisos('', 'PERSOdire2', 'guardar') === 'si');
    $puedeModificarDIRECCION2 = ($database->variablespermisos('', 'PERSOdire2', 'modificar') === 'si');
    $puedeGuardarAdmin2 = ($database->variablespermisos('', 'PERSO2', 'guardar') === 'si');
    $puedeModificarAdmin2 = ($database->variablespermisos('', 'PERSO2', 'modificar') === 'si');
    $puedeVerRechazoBono2 = ($database->variablespermisos('', 'rechazobono2', 'ver') === 'si');
    $puedeGuardarRechazoBono2 = ($database->variablespermisos('', 'rechazobono2', 'guardar') === 'si');
    $puedeModificarRechazoBono2 = ($database->variablespermisos('', 'rechazobono2', 'modificar') === 'si');
    $verBono = ($database->variablespermisos('', 'PERSOVERBONO', 'ver') === 'si');

    $puedeCheckboxCoordinacion2 = ($database->variablespermisos('', 'permiso_checkboxcoordinacion', 'ver') === 'si');

    $NUMERO_EVENTO_PERSONAL2 = isset($_POST["NUMERO_EVENTO_PERSONAL2"])?$_POST["NUMERO_EVENTO_PERSONAL2"]:"";
    $ID_EVENTO_PERSONAL2 = isset($_POST["ID_EVENTO_PERSONAL2"])?$_POST["ID_EVENTO_PERSONAL2"]:"";
    $NOMBRE_EVENTO_PERSONAL2 = isset($_POST["NOMBRE_EVENTO_PERSONAL2"])?$_POST["NOMBRE_EVENTO_PERSONAL2"]:"";
    $NOMBRE_DELINGRESO2 = isset($_POST["NOMBRE_DELINGRESO2"])?$_POST["NOMBRE_DELINGRESO2"]:"";
    $NOMBRE_PERSONAL2 = isset($_POST["NOMBRE_PERSONAL2"])?$_POST["NOMBRE_PERSONAL2"]:"";
    $FECHA_INICIO1 = isset($_POST["FECHA_INICIO1"])?$_POST["FECHA_INICIO1"]:"";
    $hora_iniciocoordina = isset($_POST["hora_iniciocoordina"]) && is_string($_POST["hora_iniciocoordina"])
        ? trim($_POST["hora_iniciocoordina"]) : "";
    $FECHA_FINAL1 = isset($_POST["FECHA_FINAL1"])?$_POST["FECHA_FINAL1"]:"";
    $hora_finalcoordina = isset($_POST["hora_finalcoordina"]) && is_string($_POST["hora_finalcoordina"])
        ? trim($_POST["hora_finalcoordina"]) : "";
    $NUMERO_DIAS1 = isset($_POST["NUMERO_DIAS1"])?$_POST["NUMERO_DIAS1"]:"";
    $MONTO_BONO1 = isset($_POST["MONTO_BONO1"])?$_POST["MONTO_BONO1"]:"";
    $MONTO_BONO_TOTAL1 = isset($_POST["MONTO_BONO_TOTAL1"])?$_POST["MONTO_BONO_TOTAL1"]:"";
    $FECHA_PPAGO1 = isset($_POST["FECHA_PPAGO1"])?$_POST["FECHA_PPAGO1"]:"";
    $OBSERVACIONES_PERSONAL2 = isset($_POST["OBSERVACIONES_PERSONAL2"])?$_POST["OBSERVACIONES_PERSONAL2"]:"";
    $PERSONAL2_FECHA_ULTIMA_CARGA = isset($_POST["PERSONAL2_FECHA_ULTIMA_CARGA"])?$_POST["PERSONAL2_FECHA_ULTIMA_CARGA"]:"";
    $hDatosPERSONAL2 = isset($_POST["hDatosPERSONAL2"])?$_POST["hDatosPERSONAL2"]:"";
    $FORMA_PAGO1 = isset($_POST["FORMA_PAGO1"])?$_POST["FORMA_PAGO1"]:"";
    $FECHA_EFECTIVA1 = isset($_POST["FECHA_EFECTIVA1"])?$_POST["FECHA_EFECTIVA1"]:"";
    $NOMBRE_RECIBIO1 = isset($_POST["NOMBRE_RECIBIO1"])?$_POST["NOMBRE_RECIBIO1"]:"";

    $per_page=intval($_POST["per_page"]);
    $campos="*";
    $page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
    $adjacents = 4;
    $offset = ($page - 1) * $per_page;

    $search=array(
        "NUMERO_EVENTO_PERSONAL2"=>$NUMERO_EVENTO_PERSONAL2,
        "ID_EVENTO_PERSONAL2"=>$ID_EVENTO_PERSONAL2,
        "NOMBRE_EVENTO_PERSONAL2"=>$NOMBRE_EVENTO_PERSONAL2,
        "NOMBRE_DELINGRESO2"=>$NOMBRE_DELINGRESO2,
        "NOMBRE_PERSONAL2"=>$NOMBRE_PERSONAL2,
        "FECHA_INICIO1"=>$FECHA_INICIO1,
        "hora_iniciocoordina"=>$hora_iniciocoordina,
        "FECHA_FINAL1"=>$FECHA_FINAL1,
        "hora_finalcoordina"=>$hora_finalcoordina,
        "NUMERO_DIAS1"=>$NUMERO_DIAS1,
        "MONTO_BONO1"=>$MONTO_BONO1,
        "MONTO_BONO_TOTAL1"=>$MONTO_BONO_TOTAL1,
        "FECHA_PPAGO1"=>$FECHA_PPAGO1,
        "OBSERVACIONES_PERSONAL2"=>$OBSERVACIONES_PERSONAL2,
        "PERSONAL2_FECHA_ULTIMA_CARGA"=>$PERSONAL2_FECHA_ULTIMA_CARGA,
        "hDatosPERSONAL2"=>$hDatosPERSONAL2,
        "FORMA_PAGO1"=>$FORMA_PAGO1,
        "FECHA_EFECTIVA1"=>$FECHA_EFECTIVA1,
        "NOMBRE_RECIBIO1"=>$NOMBRE_RECIBIO1,
        "per_page"=>$per_page,
        "query"=>$query,
        "offset"=>$offset
    );

    $datos=$database->getData($tables,$campos,$search);
    $countAll=$database->getCounter();
    $row = $countAll;

    if ($row>0){
        $numrows = $countAll;;
    }else{
        $numrows=0;
    }

    $total_pages = ceil($numrows/$per_page);

    // Dos columnas adicionales: hora de inicio y hora final.
    $columnasPreviasTotalesPersonal2 = 14
        + ($puedeVerVYO2 ? 1 : 0)
        + ($puedeVerDIRECCION2 ? 1 : 0)
        + ($puedeVerAdmin2 ? 1 : 0)
        + ($puedeVerRechazoBono2 ? 1 : 0);
?>

<div class="clearfix">
    <?php
    echo "<div class='hint-text'> ".$numrows." registros</div>";
    require __ROOT6__."/pagination.php";
    $pagination=new Pagination($page, $total_pages, $adjacents);
    echo $pagination->paginate();
    ?>
</div>

<div class="table-responsive">
<style>
    thead tr:first-child th {
        position: sticky;
        top: 0;
        background: #c9e8e8;
        z-index: 10;
    }

    thead tr:nth-child(2) td {
        position: sticky;
        top: 60px;
        background: #e2f2f2;
        z-index: 9;
    }
</style>

<div style="max-height:600px;overflow-y:auto;overflow-x:auto;">
<table class="table table-striped table-bordered">
<thead>
<tr style="text-align:center">
    <th style="background:#c9e8e8">#</th>
    <th width="15%" style="background:#c9e8e8">AUTORIZACIÓN <br>POR V Y O<br>VER EVENTOS</th>
    <?php if($puedeVerVYO2){ ?><th width="15%" style="background:#c9e8e8">AUTORIZACIÓN <br>POR V Y O<br>PAGO BONO</th><?php } ?>
    <?php if($puedeVerDIRECCION2){ ?><th width="15%" style="background:#c9e8e8">AUTORIZACIÓN <br>POR DIRECCIÓN<br>PAGO BONO</th><?php } ?>
    <?php if($puedeVerAdmin2){ ?><th width="15%" style="background:#c9e8e8">AUTORIZACIÓN <br>POR AUDITORÍA<br>PAGO BONO</th><?php } ?>
    <?php if($puedeVerRechazoBono2){ ?><th width="15%" style="background:#c9e8e8">RECHAZAR<br>PAGO BONO</th><?php } ?>
    <th width="15%" style="background:#c9e8e8">ENVIAR <br>POR EMAIL</th>
    <th width="20%" style="background:#c9e8e8">NÚMERO DE<br>EVENTO</th>
    <th width="20%" style="background:#c9e8e8">NOMBRE DEL<br>EVENTO</th>
    <th width="20%" style="background:#c9e8e8">NOMBRE DEL <br>SOLICITANTE</th>
    <th width="20%" style="background:#c9e8e8">NOMBRE</th>
    <th width="20%" style="background:#c9e8e8">PUESTO</th>
    <th width="20%" style="background:#c9e8e8">TELEFONO DE OFICINA</th>
    <th width="20%" style="background:#c9e8e8">EMAIL</th>
    <th width="20%" style="background:#c9e8e8">FECHA DE INICIO<br> DE COORDINACIÓN</th>
    <th width="20%" style="background:#c9e8e8">HORA DE INICIO<br> DE COORDINACIÓN</th>
    <th width="20%" style="background:#c9e8e8">FECHA FINAL <br>DE COORDINACIÓN</th>
    <th width="20%" style="background:#c9e8e8">HORA FINAL <br>DE COORDINACIÓN</th>
    <?php if($verBono){ ?>
    <th width="20%" style="background:#c9e8e8">NÚMERO <br>DE DÍAS</th>
    <th width="20%" style="background:#c9e8e8">MONTO <br>DE BONO</th>
    <th width="20%" style="background:#c9e8e8">TOTAL <br>DE BONO</th>
    <th width="20%" style="background:#c9e8e8">MOTIVO DEL BONO</th>
    <th width="20%" style="background:#c9e8e8">FECHA DE PROGRAMACIÓN<br> DE PAGO</th>
    <th width="20%" style="background:#c9e8e8">FORMA DE PAGO</th>
    <th width="20%" style="background:#c9e8e8">FORMA EFECTIVA DE PAGO</th>
    <th width="20%" style="background:#c9e8e8">COMPROBANTE DE PAGO</th>
    <th width="20%" style="background:#c9e8e8">PAX QUE COBRO</th>
    <?php } ?>
    <th width="20%" style="background:#c9e8e8">FECHA DE <br>ÚLTIMA CARGA</th>
</tr>

<tr>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"></td>
    <?php if($puedeVerVYO2){ ?><td style="background:#c9e8e8"></td><?php } ?>
    <?php if($puedeVerDIRECCION2){ ?><td style="background:#c9e8e8"></td><?php } ?>
    <?php if($puedeVerAdmin2){ ?><td style="background:#c9e8e8"></td><?php } ?>
    <?php if($puedeVerRechazoBono2){ ?><td style="background:#c9e8e8"></td><?php } ?>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NUMERO_EVENTO_PERSONAL2_1" value="<?php echo htmlspecialchars($NUMERO_EVENTO_PERSONAL2, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NOMBRE_EVENTO_PERSONAL2_1" value="<?php echo htmlspecialchars($NOMBRE_EVENTO_PERSONAL2, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NOMBRE_DELINGRESO2_1" value="<?php echo htmlspecialchars($NOMBRE_DELINGRESO2, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NOMBRE_PERSONAL2_1" value="<?php echo htmlspecialchars($NOMBRE_PERSONAL2, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="FECHA_INICIO1_1" value="<?php echo htmlspecialchars($FECHA_INICIO1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="time" class="form-control filtro-input" id="hora_iniciocoordina_1" value="<?php echo htmlspecialchars($hora_iniciocoordina, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="FECHA_FINAL1_1" value="<?php echo htmlspecialchars($FECHA_FINAL1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="time" class="form-control filtro-input" id="hora_finalcoordina_1" value="<?php echo htmlspecialchars($hora_finalcoordina, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <?php if($verBono){ ?>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NUMERO_DIAS1_1" value="<?php echo htmlspecialchars($NUMERO_DIAS1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="MONTO_BONO1_1" value="<?php echo htmlspecialchars($MONTO_BONO1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="MONTO_BONO_TOTAL1_1" value="<?php echo htmlspecialchars($MONTO_BONO_TOTAL1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="OBSERVACIONES_PERSONAL2_1" value="<?php echo htmlspecialchars($OBSERVACIONES_PERSONAL2, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="FECHA_PPAGO1_1" value="<?php echo htmlspecialchars($FECHA_PPAGO1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="FORMA_PAGO1_1" value="<?php echo htmlspecialchars($FORMA_PAGO1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="FECHA_EFECTIVA1_1" value="<?php echo htmlspecialchars($FECHA_EFECTIVA1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <td style="background:#c9e8e8"></td>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="NOMBRE_RECIBIO1_1" value="<?php echo htmlspecialchars($NOMBRE_RECIBIO1, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <?php } ?>
    <td style="background:#c9e8e8"><input type="text" class="form-control filtro-input" id="PERSONAL2_FECHA_ULTIMA_CARGA_1" value="<?php echo htmlspecialchars($PERSONAL2_FECHA_ULTIMA_CARGA, ENT_QUOTES, 'UTF-8'); ?>"></td>
    <input type="hidden" id="hDatosPERSONAL2_1" value="<?php echo htmlspecialchars($hDatosPERSONAL2, ENT_QUOTES, 'UTF-8'); ?>">
</tr>
</thead>

<?php if ($numrows<0){ ?>
</table>
<?php }else{ ?>
<tbody>
<?php
    $finales=0;
    $MONTO_BONO12=0;
    $NUMERO_DIAS12=0;
    $PER2SUNTOTAL=0;

    foreach ($datos as $key=>$row){

        $filaRechazoBono2 = (
            (isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si') ||
            (isset($row["STATUS_RECHAZOBONO"]) && $row["STATUS_RECHAZOBONO"]=='si')
        );
        $montoBonoTotalAjustado2 = $filaRechazoBono2 ? 0 : (float)$row["MONTO_BONO_TOTAL1"];

        $motivoRechazoPersonal2 = $database->obtener_motivo_rechazo_personal($row["id"], 'personal2');
        $mostrarAgregarRechazoPersonal2 = ($filaRechazoBono2 && $motivoRechazoPersonal2 == '');
        $mostrarVerRechazoPersonal2 = ($filaRechazoBono2 && $motivoRechazoPersonal2 != '');

        $adjuntosComprobante = array_filter(array_map('trim', explode(',', (string)$row["ADJUNTO_COMPROBANTE"])));

        if($row["ADJUNTO_COMPROBANTE"]=="" or $row["ADJUNTO_COMPROBANTE"]=='2' or empty($adjuntosComprobante)){
            $urlADJUNTO_COMPROBANTE = '';
        }else{
            $urlADJUNTO_COMPROBANTE = "<ul class='list-unstyled mb-0'>";
            foreach ($adjuntosComprobante as $adjuntoComprobante) {
                if ($adjuntoComprobante == '' || $adjuntoComprobante == '2') {
                    continue;
                }

                $botonBorrarAdjunto = '';
                if ($puedeBorrarAdjuntoPersonal) {
                    $botonBorrarAdjunto = " <button type='button' class='btn btn-link p-0 text-danger view_dataPERSONAL2adjuntoBorrar' data-personal='".$row["id"]."' data-archivo='".$adjuntoComprobante."'>Borrar</button>";
                }

                $urlADJUNTO_COMPROBANTE .= "<li class='d-flex align-items-center gap-2'><a target='_blank' href='includes/archivos/".$adjuntoComprobante."'>Visualizar!</a>".$botonBorrarAdjunto."</li>";
            }
            $urlADJUNTO_COMPROBANTE .= "</ul>";
        }
?>
<tr style="background:<?php echo $filaRechazoBono2 ? '#ff3c22' : '#f5f9fc'; ?>;text-align:center">
    <td><?php echo $row["id"];?></td>

    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" id="pasarapersonal2<?php echo $row["id"]; ?>" name="pasarapersonal2<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2(<?php echo $row["id"]; ?>)" <?php if($row["autoriza"]=='si'){ echo "checked"; } ?> <?php if(!$puedeCheckboxCoordinacion2){ echo "disabled"; } ?>/>
    </td>

    <?php if($puedeVerVYO2){ ?>
    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" name="VYO[]" id="VYO<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2VYO(<?php echo $row["id"]; ?>)" <?php if(isset($row["VYO"]) && $row["VYO"]=='si'){ echo "checked"; } ?> <?php if(!$puedeCheckboxCoordinacion2 || !$puedeGuardarVYO2 || ((isset($row["VYO"]) && $row["VYO"]=='si') && !$puedeModificarVYO2)) { echo "disabled"; } ?>/>
    </td>
    <?php } ?>

    <?php if($puedeVerDIRECCION2){ ?>
    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" name="DIRECCION[]" id="DIRECCION<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2DIRECCION(<?php echo $row["id"]; ?>)" <?php if(isset($row["DIRECCION"]) && $row["DIRECCION"]=='si'){ echo "checked"; } ?> <?php if(!$puedeCheckboxCoordinacion2 || !$puedeGuardarDIRECCION2 || ((isset($row["DIRECCION"]) && $row["DIRECCION"]=='si') && !$puedeModificarDIRECCION2)) { echo "disabled"; } ?>/>
    </td>
    <?php } ?>

    <?php if($puedeVerAdmin2){ ?>
    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" name="admin[]" id="admin<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="pasara1_personal2ADMIN(<?php echo $row["id"]; ?>)" <?php if(isset($row["admin"]) && $row["admin"]=='si'){ echo "checked"; } ?> <?php if(!$puedeCheckboxCoordinacion2 || !$puedeGuardarAdmin2 || ((isset($row["admin"]) && $row["admin"]=='si') && !$puedeModificarAdmin2)) { echo "disabled"; } ?>/>
    </td>
    <?php } ?>

    <?php if($puedeVerRechazoBono2){ ?>
    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" id="STATUS_BONORECHAZO<?php echo $row["id"]; ?>" name="STATUS_BONORECHAZO<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" onclick="STATUS_BONORECHAZO(<?php echo $row["id"]; ?>)" <?php if(isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si'){ echo "checked"; } ?> <?php if(!$puedeCheckboxCoordinacion2 || !$puedeGuardarRechazoBono2 || ((isset($row["STATUS_BONORECHAZO"]) && $row["STATUS_BONORECHAZO"]=='si') && !$puedeModificarRechazoBono2)) { echo "disabled"; } ?>/>

        <input type="hidden" id="motivo_rechazo_personal2_<?php echo $row["id"]; ?>" value="<?php echo htmlspecialchars($motivoRechazoPersonal2, ENT_QUOTES, 'UTF-8'); ?>" />

        <button type="button" title="Agregar motivo" id="agregar_rechazo_personal2_<?php echo $row['id']; ?>" style="border:none;background:transparent;cursor:pointer;color:#007bff;font-size:13px;<?php echo $mostrarAgregarRechazoPersonal2 ? '' : 'display:none;'; ?>" onclick="abrirFormularioRechazoPersonal(<?php echo $row['id']; ?>, 'personal2')">agregar<br>motivo</button>

        <button type="button" title="Ver motivo" id="ver_rechazo_personal2_<?php echo $row['id']; ?>" style="border:none;background:transparent;cursor:pointer;color:#28a745;font-size:13px;<?php echo $mostrarVerRechazoPersonal2 ? '' : 'display:none;'; ?>" onclick="verMotivoRechazoPersonal(<?php echo $row['id']; ?>, 'personal2')">ver</button>
    </td>
    <?php } ?>

    <td style="text-align:center">
        <input type="checkbox" style="width:40PX;" class="form-check-input" name="personal2[]" id="personal2<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" <?php if(!$puedeCheckboxCoordinacion2){ echo "disabled"; } ?>/>
    </td>

    <td style="color:#17215E;font-weight:bold;"><?php echo htmlspecialchars((string) $row["NUMERO_EVENTO"], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars((string) $row["NOMBRE_EVENTO"], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars((string) $row["NOMBRE_DELINGRESO2"], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo $database->un_solo_colaborador_nombre($row["NOMBRE_PERSONAL2"],'01informacionpersonal','NOMBRE_1'); ?></td>
    <td><?php echo str_replace('_',' ', $database->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','PUESTO')); ?></td>
    <td><?php echo $database->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_3'); ?></td>
    <td><?php echo $database->un_solo_colaborador($row["NOMBRE_PERSONAL2"],'01empresa','CORREO_1'); ?></td>

    <td><?php echo $row["FECHA_INICIO1"]; ?></td>
    <td><?php echo htmlspecialchars(isset($row["hora_iniciocoordina"]) ? (string)$row["hora_iniciocoordina"] : "", ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo $row["FECHA_FINAL1"]; ?></td>
    <td><?php echo htmlspecialchars(isset($row["hora_finalcoordina"]) ? (string)$row["hora_finalcoordina"] : "", ENT_QUOTES, 'UTF-8'); ?></td>

    <?php if($verBono){ ?>
    <td><?php echo $row["NUMERO_DIAS1"]; ?></td>
    <td><?php echo $row["MONTO_BONO1"]; ?></td>
    <td><?php echo number_format($montoBonoTotalAjustado2,2,'.',','); ?></td>
    <td><?php echo $row["OBSERVACIONES_PERSONAL2"]; ?></td>
    <td><?php echo $row["FECHA_PPAGO1"]; ?></td>
    <td><?php echo $row["FORMA_PAGO1"]; ?></td>
    <td><?php echo $row["FECHA_EFECTIVA1"]; ?></td>
    <td><?php echo $urlADJUNTO_COMPROBANTE; ?></td>
    <td><?php echo $row["NOMBRE_RECIBIO1"]; ?></td>
    <?php } ?>

    <td><?php echo $row["PERSONAL2_FECHA_ULTIMA_CARGA"]; ?></td>

    <?php if($database->variablespermisos('','COLACOR_FILTRO','modificar')=='si'){ ?>
    <td>
        <input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2modifica" />
    </td>
    <?php } ?>

    <?php if($database->variablespermisos('','COLACOR_FILTRO','borrar')=='si'){ ?>
    <td>
        <input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataDATOSpersonal2borrar" />
    </td>
    <?php } ?>
</tr>
<?php
        $finales++;
        $MONTO_BONO12 += $filaRechazoBono2 ? 0 : (float)$row["MONTO_BONO1"];
        $NUMERO_DIAS12 += $filaRechazoBono2 ? 0 : (int)$row["NUMERO_DIAS1"];
        $PER2SUNTOTAL += $montoBonoTotalAjustado2;
    }
?>

<?php if($database->variablespermisos('','TOTALES_PERSOASISTE','ver')=='si') { ?>
<tr>
    <?php if($verBono): ?>
    <td colspan='<?php echo $columnasPreviasTotalesPersonal2; ?>' style="text-align:right;">
        <strong style="font-size:16px">TOTALES</strong>
    </td>
    <td style="text-align:center;"><?php echo number_format($NUMERO_DIAS12); ?></td>
    <td style="text-align:center;">$ <?php echo number_format($MONTO_BONO12,2,'.',','); ?></td>
    <td style="text-align:center;">$ <?php echo number_format($PER2SUNTOTAL,2,'.',','); ?></td>
    <td colspan='9'></td>
    <?php else: ?>
    <td colspan='<?php echo $columnasPreviasTotalesPersonal2; ?>' style="text-align:right;">
        <strong style="font-size:16px">TOTALES</strong>
    </td>
    <td colspan='3'></td>
    <?php endif; ?>
</tr>
<?php } ?>

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