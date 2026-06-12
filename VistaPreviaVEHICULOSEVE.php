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
    $row = mysqli_fetch_array($queryVISTAPREV);


    $fechaSolicitud = trim($row["VEHICULOSEVE_SOLICITUD"] ?? '');

    $fechaSolicitudInput = '';

    if($fechaSolicitud !== ''){

        $formatosFechaSolicitud = array('Y-m-d', 'd-m-Y', 'd/m/Y', 'Y/m/d');

        foreach($formatosFechaSolicitud as $formatoFechaSolicitud){

            $fechaSolicitudObj = DateTime::createFromFormat($formatoFechaSolicitud, $fechaSolicitud);

            if($fechaSolicitudObj instanceof DateTime){

                $fechaSolicitudInput = $fechaSolicitudObj->format('Y-m-d');

                break;

            }

        }



        if($fechaSolicitudInput === ''){

            $fechaSolicitudTimestamp = strtotime($fechaSolicitud);

            if($fechaSolicitudTimestamp !== false){

                $fechaSolicitudInput = date('Y-m-d', $fechaSolicitudTimestamp);

            }

        }

    }



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

    #vistaprev_VEHICULOSEVE_VEHICULO option[data-fechas-ocupadas=""],
    #vistaprev_VEHICULOSEVE_VEHICULO option:not([data-fechas-ocupadas]) {
        background-color: #e8f5e9 !important;
        color: #155724 !important;
        font-weight: normal !important;
    }
    #vistaprev_VEHICULOSEVE_VEHICULO option[data-fechas-ocupadas]:not([data-fechas-ocupadas=""]) {
        background-color: #fde8e8 !important;
        color: #8b0000 !important;
        font-weight: bold !important;
        font-style: italic;
    }
</style>

<div id="mensajeVEHICULOSEVE"></div>

<form id="Listado_VEHICULOSEVEform"> 
    <div class="table-responsive">  
        <table class="table table-bordered tabla-vehiculos">';

    // ── Foto ──────────────────────────────────────────────────────────────────
    if($row["VEHICULOSEVE_FOTO"] != ""){
        $urlVEHICULOSEVE_FOTO = "<a target='_blank' href='includes/archivos/".$row["VEHICULOSEVE_FOTO"]."'>Visualizar!</a>";
    } else {
        $urlVEHICULOSEVE_FOTO = "<span>Sin archivo disponible</span>";
    }

    // ── SELECT de vehículos (igual que formulario principal) ──────────────────
    if($conexion->variablespermisos('','vervehiculo','ver') == 'si'){
        $queryVehi = $conexion->lista_plantillaventavehi_todos();
    } else {
        $queryVehi = $conexion->lista_plantillaventavehi();
    }

    $fondosV  = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
    $numV     = 0;
    $optionsV = '';

    while($rowV = mysqli_fetch_array($queryVehi))
    {
        if($numV == 8){ $numV = 0; } else { $numV++; }

        $selectV = ($row["VEHICULOSEVE_VEHICULO"] == $rowV['id']) ? 'selected' : '';

         $fechasOcupadasVehiculo = $altaeventos->fechas_ocupadas_vehiculo($rowV['id'], $row["id"]);


        $textoFechasOcupadas = '';
        if(count($fechasOcupadasVehiculo) > 0){
            $textoFechasOcupadas = ' - OCUPADO: ' . implode('    ·    ', $fechasOcupadasVehiculo);
        }

        $textoOpcionVehiculo = htmlspecialchars($rowV['SUBMARCAV'] . $textoFechasOcupadas, ENT_QUOTES, 'UTF-8');
        $textoDataFechas     = htmlspecialchars(implode('||', $fechasOcupadasVehiculo), ENT_QUOTES, 'UTF-8');

        $tieneOcupado = count($fechasOcupadasVehiculo) > 0;
        $estiloOpcion = $tieneOcupado
            ? 'background: #fde8e8; color: #8b0000; font-weight: bold;'
            : 'background: #' . $fondosV[$numV] . '; color: #155724; font-weight: normal;';
        $prefijo = $tieneOcupado ? '🔴 ' : '🟢 ';

        $optionsV .= '<option style="'.$estiloOpcion.'" '.$selectV.' value="'.$rowV['id'].'" data-fechas-ocupadas="'.$textoDataFechas.'">'.$prefijo.$textoOpcionVehiculo.'</option>';
    }

    $selectVehiculoHTML = '
        <select class="form-select mb-0 campo-editable" 
                id="vistaprev_VEHICULOSEVE_VEHICULO" 
                name="VEHICULOSEVE_VEHICULO" 
                required
                style="font-weight:500; border:2px solid #ced4da;">
            <option value="">SELECCIONA UNA OPCIÓN</option>
            '.$optionsV.'
        </select>
        <div id="vistaprev_fechas_ocupadas_vehiculo_select" style="display:block;margin-top:6px;line-height:2;font-size:12px;color:#8b0000;"></div>';

    // ── SELECT de colaboradores ───────────────────────────────────────────────
    $queryColab = $conexion->colaborador_generico_bueno();

    $fondosC = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
    $numC    = 0;
    $optionsC = '<option value="">SELECCIONA UNA OPCIÓN</option>';

    while($rowC = mysqli_fetch_array($queryColab))
    {
        if($numC == 8){ $numC = 0; } else { $numC++; }

        $nombreCompleto = trim($rowC["NOMBRE_1"]." ".$rowC["NOMBRE_2"]." ".$rowC["APELLIDO_PATERNO"]." ".$rowC["APELLIDO_MATERNO"]);
        $selectC = (trim($row["nombreocupov"]) == $nombreCompleto) ? 'selected' : '';

        $optionsC .= '<option style="background:#'.$fondosC[$numC].'" '.$selectC.' value="'.$nombreCompleto.'">'.$nombreCompleto.'</option>';
    }

    // ── Filas de la tabla ─────────────────────────────────────────────────────
    $output .= '
<tr style="background:#ebf8fa">
    <td width="30%"><label>VEHÍCULO</label></td>
    <td width="70%">'.$selectVehiculoHTML.'</td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>CANTIDAD</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_CANTIDAD" value="'.$row["VEHICULOSEVE_CANTIDAD"].'" readonly class="campo-bloqueado">
    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>FOTO</label></td>
    <td width="70%">
        <div class="campo-solo-visual">'.$urlVEHICULOSEVE_FOTO.'</div>
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>COLOR</label></td>
    <td width="70%">
        <input type="text" id="vistaprev_OBTENER_color" name="COLORV" value="'.$row["COLORV"].'" readonly class="campo-bloqueado">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>PLACAS</label></td>
    <td width="70%">
        <input type="text" id="vistaprev_OBTENER_placas" name="PLACASV" value="'.$row["PLACASV"].'" readonly class="campo-bloqueado">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>NOMBRE DEL QUE SOLICITA</label></td>
    <td width="70%">
        <input type="text" name="nombreingresov" value="'.$row["nombreingresov"].'" readonly class="campo-bloqueado">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>NOMBRE DEL QUE MANEJA EL VEHÍCULO</label></td>
    <td width="70%">
        <select class="form-select mb-3 campo-editable" name="nombreocupov" required>
            '.$optionsC.'
        </select>
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>FECHA DE ENTREGA <small style="color:red">obligatorio</small></label></td>
    <td width="70%">
        <input type="date" id="vistaprev_VEHICULOSEVE_ENTREGA" name="VEHICULOSEVE_ENTREGA" value="'.$row["VEHICULOSEVE_ENTREGA"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>LUGAR DE ENTREGA</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_LUGAR" value="'.$row["VEHICULOSEVE_LUGAR"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>HORA DE ENTREGA</label></td>
    <td width="70%">
        <input type="time" name="VEHICULOSEVE_HORA" value="'.$row["VEHICULOSEVE_HORA"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>FECHA DE DEVOLUCIÓN <small style="color:red">obligatorio</small></label></td>
    <td width="70%">
        <input type="date" id="vistaprev_VEHICULOSEVE_DEVOLU" name="VEHICULOSEVE_DEVOLU" value="'.$row["VEHICULOSEVE_DEVOLU"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>LUGAR DE DEVOLUCIÓN</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_LUDEVO" value="'.$row["VEHICULOSEVE_LUDEVO"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>HORA DE DEVOLUCIÓN</label></td>
    <td width="70%">
        <input type="time" name="VEHICULOSEVE_HORADEVO" value="'.$row["VEHICULOSEVE_HORADEVO"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>FECHA DE SOLICITUD</label></td>
    <td width="70%">
  <input type="date" name="VEHICULOSEVE_SOLICITUD" value="'.$fechaSolicitudInput.'" readonly class="campo-bloqueado">

    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>DÍAS SOLICITADOS</label></td>
    <td width="70%">
            <input type="text" id="vistaprev_VEHICULOSEVE_DIAS" name="VEHICULOSEVE_DIAS" value="'.$row["VEHICULOSEVE_DIAS"].'" class="campo-editable">

    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>COSTO</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_COSTO" value="'.number_format($row["VEHICULOSEVE_COSTO"],2,'.',',').'" readonly class="campo-bloqueado">
    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>SUB TOTAL</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_SUB" value="'.number_format($row["VEHICULOSEVE_SUB"],2,'.',',').'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>IVA</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_IVA" value="'.$row["VEHICULOSEVE_IVA"].'" class="campo-editable">
    </td>
</tr>

<tr style="background:#d4f1d3">
    <td width="30%"><label>TOTAL</label></td>
    <td width="70%">
        <input type="text" name="PRECIOPESOS_SOFTWARE" value="'.number_format($row["PRECIOPESOS_SOFTWARE"],2,'.',',').'" class="campo-editable">
    </td>
</tr>

<tr style="background:#ebf8fa">
    <td width="30%"><label>OBSERVACIONES</label></td>
    <td width="70%">
        <input type="text" name="VEHICULOSEVE_OBSERVA" value="'.$row["VEHICULOSEVE_OBSERVA"].'" class="campo-editable">
    </td>
</tr>

<tr>
    <td width="30%"><label>GUARDAR</label></td>
    <td width="70%">
        <input type="hidden" value="'.$row["id"].'" name="IpVEHICULOSEVE" id="IpVEHICULOSEVE"/>
        <input type="hidden" value="enviarVEHICULOSEVE" name="enviarVEHICULOSEVE"/>

        <button class="btn btn-sm btn-outline-success px-5" type="button" id="clickVEHICULOSEVE">
            GUARDAR
        </button>
        <br>
        <small id="vistaprev_estado_disponibilidad_vehiculo" style="font-weight:bold;"></small>
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

    // ── Mostrar fechas ocupadas al cargar y al cambiar el select ─────────────
    function vistaprevMostrarFechasOcupadas(){
        var fechas = $('#vistaprev_VEHICULOSEVE_VEHICULO option:selected').data('fechas-ocupadas') || '';
        if(fechas !== ''){
            $('#vistaprev_fechas_ocupadas_vehiculo_select').html('FECHAS OCUPADAS: ' + fechas.replace(/\|\|/g, '  ·  '));
        } else {
            $('#vistaprev_fechas_ocupadas_vehiculo_select').html('');
        }
    }
    function vistaprevTotalCantidadPrecio(){

        var $form = $('#Listado_VEHICULOSEVEform');

        var VEHICULOSEVE_DIAS = $form.find('[name="VEHICULOSEVE_DIAS"]').val();

        var VEHICULOSEVE_COSTO = $form.find('[name="VEHICULOSEVE_COSTO"]').val();

        var VEHICULOSEVE_CANTIDAD = $form.find('[name="VEHICULOSEVE_CANTIDAD"]').val();



        $.ajax({

            url: 'calendariodeeventos2/controladorAE.php',

            method: 'POST',

            data: {

                VEHICULOSEVE_DIAS: VEHICULOSEVE_DIAS,

                VEHICULOSEVE_COSTO: VEHICULOSEVE_COSTO,

                VEHICULOSEVE_CANTIDAD: VEHICULOSEVE_CANTIDAD,

                cantidad_precio: 'cantidad_precio'

            },

            success: function(data){

                var result = data.split('^');

                $form.find('[name="PRECIOPESOS_SOFTWARE"]').val(result[1]);

                $form.find('[name="VEHICULOSEVE_IVA"]').val(result[2]);

                $form.find('[name="VEHICULOSEVE_SUB"]').val(result[3]);

            }

        });

    }



    function vistaprevTotalFechas(){

        var $form = $('#Listado_VEHICULOSEVEform');

        var VEHICULOSEVE_DEVOLU = $form.find('[name="VEHICULOSEVE_DEVOLU"]').val();

        var VEHICULOSEVE_ENTREGA = $form.find('[name="VEHICULOSEVE_ENTREGA"]').val();



        if(VEHICULOSEVE_DEVOLU === '' || VEHICULOSEVE_ENTREGA === ''){

            $form.find('[name="VEHICULOSEVE_DIAS"]').val('');

            vistaprevTotalCantidadPrecio();

            return;

        }



        $.ajax({

            url: 'calendariodeeventos2/controladorAE.php',

            method: 'POST',

            data: {

                VEHICULOSEVE_DEVOLU: VEHICULOSEVE_DEVOLU,

                VEHICULOSEVE_ENTREGA: VEHICULOSEVE_ENTREGA,

                cuenta_fechas: 'cuenta_fechas'

            },

            success: function(data){

                $form.find('[name="VEHICULOSEVE_DIAS"]').val(data);

                vistaprevTotalCantidadPrecio();

            }

        });

    }



    function vistaprevActualizarFechasOcupadasSelect(){

        var idActual = $('#IpVEHICULOSEVE').val() || '';



        $.ajax({

            url: 'calendariodeeventos2/controladorAE.php',

            method: 'POST',

            dataType: 'json',

            data: {

                obtener_fechas_todos_vehiculos: 'si',

                IpVEHICULOSEVE: idActual

            },

            success: function(resp){

                if(!resp){ return; }



                $('#vistaprev_VEHICULOSEVE_VEHICULO option').each(function(){

                    var idVehiculo = $(this).val();

                    if(idVehiculo === ''){ return; }



                    var fechas = resp[idVehiculo] || [];

                    var textoDataFechas = fechas.join('||');

                    var textoActual = $(this).text().replace('🔴 ', '').replace('🟢 ', '').split(' - OCUPADO:')[0];



                    $(this).attr('data-fechas-ocupadas', textoDataFechas);



                    if(fechas.length > 0){

                        $(this)

                            .css({'background':'#fde8e8','color':'#8b0000','font-weight':'bold','font-style':'italic'})

                            .text('🔴 ' + textoActual + ' - OCUPADO: ' + fechas.join(' · '));

                    } else {

                        $(this)

                            .css({'background':'#e8f5e9','color':'#155724','font-weight':'normal','font-style':'normal'})

                            .text('🟢 ' + textoActual);

                    }

                });



                vistaprevMostrarFechasOcupadas();

            }

        });

    }

    // ── Validar disponibilidad vía AJAX (excluye el registro actual) ─────────
    function vistaprevValidarDisponibilidad(){
        var vehiculo = $('#vistaprev_VEHICULOSEVE_VEHICULO').val();
        var entrega  = $('#vistaprev_VEHICULOSEVE_ENTREGA').val();
        var devolu   = $('#vistaprev_VEHICULOSEVE_DEVOLU').val();
        var idActual = $('#IpVEHICULOSEVE').val() || '';

        if(vehiculo === '' || entrega === '' || devolu === ''){
            $('#vistaprev_estado_disponibilidad_vehiculo').html('');
            $('#clickVEHICULOSEVE').prop('disabled', false);
            $('#vistaprev_VEHICULOSEVE_VEHICULO').css('border', '2px solid #ced4da');
            return;
        }

        $.ajax({
            url: 'calendariodeeventos2/controladorAE.php',
            method: 'POST',
            dataType: 'json',
            data: {
                validar_disponibilidad_vehiculo: 'validar_disponibilidad_vehiculo',
                VEHICULOSEVE_VEHICULO: vehiculo,
                VEHICULOSEVE_ENTREGA:  entrega,
                VEHICULOSEVE_DEVOLU:   devolu,
                IpVEHICULOSEVE:        idActual   // el controlador excluye este ID
            },
            beforeSend: function(){
                $('#vistaprev_estado_disponibilidad_vehiculo').css('color','#444').html('verificando...');
            },
            success: function(resp){
                if(resp && resp.ocupado){
                    $('#vistaprev_estado_disponibilidad_vehiculo').css('color','red').html('VEHÍCULO OCUPADO EN LAS FECHAS SELECCIONADAS');
                    $('#clickVEHICULOSEVE').prop('disabled', true);
                    $('#vistaprev_VEHICULOSEVE_VEHICULO').css('border','2px solid red');
                } else {
                    $('#vistaprev_estado_disponibilidad_vehiculo').css('color','green').html('VEHÍCULO DISPONIBLE');
                    $('#clickVEHICULOSEVE').prop('disabled', false);
                    $('#vistaprev_VEHICULOSEVE_VEHICULO').css('border','2px solid #198754');
                }
            },
            error: function(){
                $('#vistaprev_estado_disponibilidad_vehiculo').css('color','red').html('NO SE PUDO VALIDAR DISPONIBILIDAD');
                $('#clickVEHICULOSEVE').prop('disabled', true);
            }
        });
    }

    // ── Obtener color y placas al cambiar el vehículo (igual que OBTENER_VEHICULO) ─
    $(document).on('change', '#vistaprev_VEHICULOSEVE_VEHICULO', function(){
        vistaprevMostrarFechasOcupadas();
        vistaprevValidarDisponibilidad();

        var idVehiculo = $(this).val();
        if(idVehiculo === ''){ return; }

        $.ajax({
            url: 'calendariodeeventos2/controladorAE.php',
            method: 'POST',
            data: {
                 OBTENER_VEHICULO1: 'OBTENER_VEHICULO1',

                VEHICULOSEVE_VEHICULO: idVehiculo
            },
            success: function(data){
                // Espera JSON: {"color":"...","placas":"...","foto":"...","costo":"..."}
       $('#Listado_VEHICULOSEVEform [name="VEHICULOSEVE_COSTO"]').val(data);

            }

        });



        $.ajax({

            url: 'calendariodeeventos2/controladorAE.php',

            method: 'POST',

            data: {

                OBTENER_color1: 'OBTENER_color1',

                VEHICULOSEVE_VEHICULO: idVehiculo

            },

            success: function(data){

                $('#Listado_VEHICULOSEVEform [name="COLORV"]').val(data);

            }

        });



        $.ajax({

            url: 'calendariodeeventos2/controladorAE.php',

            method: 'POST',

            data: {

                OBTENER_placas1: 'OBTENER_placas1',

                VEHICULOSEVE_VEHICULO: idVehiculo

            },

            success: function(data){

                $('#Listado_VEHICULOSEVEform [name="PLACASV"]').val(data);

            }
        });
    });

    // ── Revalidar al cambiar fechas ───────────────────────────────────────────
    $(document).on('change', '#vistaprev_VEHICULOSEVE_ENTREGA, #vistaprev_VEHICULOSEVE_DEVOLU', function(){
		 vistaprevTotalFechas();

        vistaprevValidarDisponibilidad();
    });
	    $(document).on('keyup change', '#Listado_VEHICULOSEVEform [name="VEHICULOSEVE_CANTIDAD"], #Listado_VEHICULOSEVEform [name="VEHICULOSEVE_COSTO"], #Listado_VEHICULOSEVEform [name="VEHICULOSEVE_DIAS"]', function(){

        vistaprevTotalCantidadPrecio();

    });




    // ── Al cargar: mostrar fechas del vehículo ya seleccionado ───────────────
   vistaprevActualizarFechasOcupadasSelect();


    // ── Guardar ───────────────────────────────────────────────────────────────
    $("#clickVEHICULOSEVE").click(function(){

        $.ajax({
            url: "calendariodeeventos2/controladorAE.php",
            method: "POST",
            data: $("#Listado_VEHICULOSEVEform").serialize(),
            beforeSend: function(){
                $("#mensajeVEHICULOSEVE").html("cargando...");
            },
            success: function(data){
                $("#reset_VEHICULOSEVE").load(location.href + " #reset_VEHICULOSEVE");
				      if(typeof actualizarFechasOcupadasSelect === 'function'){

                    actualizarFechasOcupadasSelect();

                }

                vistaprevActualizarFechasOcupadasSelect();

                $("#mensajeVEHICULOSEVE").html("<span id='ACTUALIZADO'>"+data+"</span>");
                $("#dataModal").modal("hide");
            }
        });

    });

});
</script>