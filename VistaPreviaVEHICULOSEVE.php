<?php
if(!isset($_SESSION)) { 
    session_start(); 
}

// select.php CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"]) ? $_POST["personal_id"] : '';

if($identioficador != '')
{
    $output = '';

    require "controladorAE.php";
    $conexion = new accesoclase();

    $queryVISTAPREV = $conexion->Listado_VEHICULOSEVE2($identioficador);

    $output .= '
<style>
    .campo-bloqueado {
        background-color: #f1f3f5 !important;
        color: #6c757d !important;
        border: 1px solid #dee2e6 !important;
        cursor: not-allowed !important;
    }

    .campo-editable {
        background-color: #ffffff !important;
        color: #212529 !important;
        border: 1px solid #28a745 !important;
    }

    .campo-editable:focus {
        border-color: #198754 !important;
        box-shadow: 0 0 5px rgba(25, 135, 84, 0.30) !important;
        outline: none;
    }

    .campo-solo-visual {
        background-color: #eef5ff;
        border: 1px dashed #6ea8fe;
        color: #084298;
        padding: 10px;
        border-radius: 6px;
        font-weight: 600;
        min-height: 38px;
        display: flex;
        align-items: center;
    }

    .tabla-vehiculos label {
        font-weight: 600;
        color: #343a40;
    }

    .tabla-vehiculos input,
    .tabla-vehiculos select {
        width: 100%;
        padding: 6px 8px;
        border-radius: 5px;
    }
</style>

<div id="mensajeVEHICULOSEVE"></div>

<form id="Listado_VEHICULOSEVEform"> 
    <div class="table-responsive">  
        <table class="table table-bordered tabla-vehiculos">';
    
    $row = mysqli_fetch_array($queryVISTAPREV);

    if($row["VEHICULOSEVE_FOTO"] != ""){
        $urlVEHICULOSEVE_FOTO = "<a target='_blank' href='includes/archivos/".$row["VEHICULOSEVE_FOTO"]."'>Visualizar!</a>";
    } else {
        $urlVEHICULOSEVE_FOTO = "<span>Sin archivo disponible</span>";
    }

    $output .= '

<tr>
    <td width="30%"><label>VEHÍCULO</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_VEHICULO" value="'.$conexion->nombre_vehiculo($row["VEHICULOSEVE_VEHICULO"]).'" readonly="readonly" class="campo-bloqueado">
        <input type="hidden" name="VEHICULOSEVE_VEHICULO_ID" value="'.$row["VEHICULOSEVE_VEHICULO"].'">
    </td>
</tr>

<tr>
    <td width="30%"><label>CANTIDAD</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_CANTIDAD" value="'.$row["VEHICULOSEVE_CANTIDAD"].'" readonly="readonly" class="campo-bloqueado">
    </td>
</tr>

<tr>
    <td width="30%"><label>FOTO</label></td>
    <td width="70%">
        <div class="campo-solo-visual">
            '.$urlVEHICULOSEVE_FOTO.'
        </div>
    </td>
</tr>

<tr>
    <td width="30%"><label>COLOR</label></td>
    <td width="70%">
        <input type="text" name="COLORV" value="'.$row["COLORV"].'" readonly="readonly" class="campo-bloqueado">
    </td>
</tr>

<tr>
    <td width="30%"><label>PLACAS</label></td>
    <td width="70%">
        <input type="text" name="PLACASV" value="'.$row["PLACASV"].'" readonly="readonly" class="campo-bloqueado">
    </td>
</tr>

<tr>
    <td width="30%"><label>NOMBRE DEL QUE SOLICITA</label></td>
    <td width="70%">
        <input type="text" name="nombreingresov" value="'.$row["nombreingresov"].'" readonly="readonly" class="campo-bloqueado">
    </td>
</tr>

<tr>
    <td width="30%"><label>NOMBRE DEL QUE MANEJA EL VEHÍCULO</label></td>
    <td width="70%">';

$queryColab = $conexion->colaborador_generico_bueno();

$output .= '
        <select class="form-select mb-3 campo-editable" name="nombreocupov" required>
            <option value="">SELECCIONA UNA OPCIÓN</option>';

$fondosC = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$numC = 0;

while($rowC = mysqli_fetch_array($queryColab))
{
    if($numC == 8){
        $numC = 0;
    } else {
        $numC++;
    }

    $nombreCompleto = $rowC["NOMBRE_1"]." ".$rowC["NOMBRE_2"]." ".$rowC["APELLIDO_PATERNO"]." ".$rowC["APELLIDO_MATERNO"];

    $selectC = "";
    if(trim($row["nombreocupov"]) == trim($nombreCompleto)){
        $selectC = "selected";
    }

    $output .= '<option style="background:#'.$fondosC[$numC].'" '.$selectC.' value="'.$nombreCompleto.'">'.$nombreCompleto.'</option>';
}

$output .= '
        </select>
    </td>
</tr>

<tr>
    <td width="30%"><label>FECHA DE ENTREGA</label></td>
    <td width="70%">
        <input type="date" name="VEHICULOSEVE_ENTREGA" value="'.$row["VEHICULOSEVE_ENTREGA"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>LUGAR DE ENTREGA</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_LUGAR" value="'.$row["VEHICULOSEVE_LUGAR"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>HORA DE ENTREGA</label></td>
    <td width="70%">
        <input type="time" name="VEHICULOSEVE_HORA" value="'.$row["VEHICULOSEVE_HORA"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>FECHA DE DEVOLUCIÓN</label></td>
    <td width="70%">
        <input type="date" name="VEHICULOSEVE_DEVOLU" value="'.$row["VEHICULOSEVE_DEVOLU"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_LUDEVO" value="'.$row["VEHICULOSEVE_LUDEVO"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
    <td width="70%">
        <input type="time" name="VEHICULOSEVE_HORADEVO" value="'.$row["VEHICULOSEVE_HORADEVO"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>FECHA DE SOLICITUD</label></td>
    <td width="70%">
        <input type="date" name="VEHICULOSEVE_SOLICITUD" value="'.$row["VEHICULOSEVE_SOLICITUD"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>DÍAS SOLICITADOS</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_DIAS" value="'.$row["VEHICULOSEVE_DIAS"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>COSTO</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_COSTO" value="'.$row["VEHICULOSEVE_COSTO"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>IVA</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_IVA" value="'.$row["VEHICULOSEVE_IVA"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>SUB TOTAL</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_SUB" value="'.$row["VEHICULOSEVE_SUB"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>TOTAL</label></td>
    <td width="70%">
        <input type="text" name="PRECIOPESOS_SOFTWARE" value="'.$row["PRECIOPESOS_SOFTWARE"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>OBSERVACIONES</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_OBSERVA" value="'.$row["VEHICULOSEVE_OBSERVA"].'" class="campo-editable">
    </td>
</tr>

<tr>  
    <td width="30%"><label>GUARDAR</label></td>  
    <td width="70%">
        <input type="hidden" value="'.$row["id"].'" name="IpVEHICULOSEVE" id="IpVEHICULOSEVE"/>

        <button class="btn btn-sm btn-outline-success px-5" type="button" id="clickVEHICULOSEVE">
            GUARDAR
        </button>

        <input type="hidden" value="enviarVEHICULOSEVE" name="enviarVEHICULOSEVE"/>
    </td>  
</tr>';

    $output .= '
        </table>
    </div>
</form>';

    echo $output;
}
?>

<script>
$(document).ready(function(){

    $("#clickVEHICULOSEVE").click(function(){

        $.ajax({  
            url: "calendariodeeventos2/controladorAE.php",
            method: "POST",  
            data: $("#Listado_VEHICULOSEVEform").serialize(),

            beforeSend: function(){  
                $("#mensajeVEHICULOSEVE").html("cargando"); 
            },  

            success: function(data){
                $("#reset_VEHICULOSEVE").load(location.href + " #reset_VEHICULOSEVE");
                $("#mensajeVEHICULOSEVE").html("<span id='ACTUALIZADO'>"+data+"</span>"); 
                $("#dataModal").modal("hide");
            }  
        });

    });

});
</script>