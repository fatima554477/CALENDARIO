<?php
require_once __DIR__ . '/CalificacionProveedoresPagados.php';
 
$calificacionPagosConexion = $conexion->db();
$calificacionPagosRepositorio = new CalificacionProveedoresPagados($calificacionPagosConexion);
$calificacionEventoId = isset($_SESSION['idevento']) ? (int) $_SESSION['idevento'] : 0;
$calificacionPagosResultado = $calificacionEventoId > 0
    ? $calificacionPagosRepositorio->listar($calificacionEventoId)
    : false;
$puedeGuardarCalificacion = $conexion->variablespermisos('', 'CALIFICACIONPEVENTOS', 'guardar') == 'si';
$puedeModificarCalificacion = $conexion->variablespermisos('', 'CALIFICACIONPEVENTOS', 'modificar') == 'si';
 
function escaparCalificacionProveedor($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

/**
 * Formatea fecha_carga como DIA/MES/AÑO y separa la hora en un <span>
 * con clase propia para poder pintarla de otro color vía CSS.
 */
function formatearFechaCargaConHora($valor)
{
    $valor = trim((string) $valor);
    if ($valor === '') {
        return '';
    }

    $timestamp = strtotime($valor);
    if ($timestamp === false) {
        // Si no se pudo interpretar la fecha, se muestra el valor original escapado
        return escaparCalificacionProveedor($valor);
    }

    $fechaFormateada = date('d/m/Y', $timestamp);
    $horaFormateada = date('H:i:s', $timestamp);

    return $fechaFormateada
        . ' <span class="hora-carga-calificacion">' . escaparCalificacionProveedor($horaFormateada) . '</span>';
}
?>
<style>
    #calificacion-proveedores-pagos .encabezado-calificacion-proveedores {
        display: flex;
        align-items: center;
        gap: 1.5px;
       
		

    }
    #calificacion-proveedores-pagos .control-calificacion-proveedores {
        border: 0;
        background: transparent;
        color: #168896;
        cursor: pointer;
        font-size: 22px;
        font-weight: bold;
        line-height: 1;
        padding: 0;
    }
    #calificacion-proveedores-pagos .control-calificacion-proveedores:hover,
    #calificacion-proveedores-pagos .control-calificacion-proveedores:focus {
        color: #0d5f69;
        outline: 2px solid #b8e4e8;
        outline-offset: 2px;
    }
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores thead tr {
        background: #d4f1d3;
        color: #244d2a;
        text-align: center;
    }
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores tbody tr:nth-child(odd) {
        background: #ebf8fa;
    }
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores tbody tr:nth-child(even) {
        background: #d4f1d3;
    }
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores td {
        vertical-align: middle;
    }
    /* Columna OBSERVACIONES: ancho fijo para controlar el salto de línea */
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores th:nth-child(6),
    #calificacion-proveedores-pagos .tabla-calificacion-proveedores td:nth-child(6) {
        width: 400px; /* ajusta este valor al ancho que necesites */
    }
    /* Texto de OBSERVACIONES: justificado y limitado a 4 renglones */
    #calificacion-proveedores-pagos .celda-observaciones-calificacion {
        text-align: justify;
        white-space: normal !important;
        word-wrap: break-word;
        word-break: break-word;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
        overflow: hidden;
        line-height: 1.4em;
        max-height: 5.6em; /* 4 * line-height */
    }
    /* Hora de carga: color distinto para diferenciarla de la fecha */
    #calificacion-proveedores-pagos .hora-carga-calificacion {
        color: #a83279;
        font-weight: 600;
        font-size: 0.9em;
    }
</style>
<div id="calificacion-proveedores-pagos">
    <hr>
    <div class="encabezado-calificacion-proveedores">
              <button type="button"

            id="mostrar-calificacion-proveedores"

            class="control-calificacion-proveedores"

            aria-controls="contenido-calificacion-proveedores"

            aria-expanded="false"

            aria-label="Abrir calificación de proveedores">

            <img src="includes/contraer31.png" alt="">

        </button>

        <button type="button"

            id="ocultar-calificacion-proveedores"

            class="control-calificacion-proveedores"

            aria-controls="contenido-calificacion-proveedores"

            aria-expanded="false"

            aria-label="Cerrar calificación de proveedores">

            <img src="includes/contraer41.png" alt="">

        </button>

        &nbsp;&nbsp;&nbsp;<p class="mb-0 text-uppercase">CALIFICACIÓN PROVEEDORES DE ESTE EVENTO</p>
    </div>
    <div id="mensaje-calificacion-proveedores" aria-live="polite"></div>

  <div id="contenido-calificacion-proveedores" style="display:none;">

	  <div class="content2">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered tabla-calificacion-proveedores" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID DEL PROVEEDOR</th>
                            <th>NOMBRE COMERCIAL</th>
                            <th>NOMBRE FISCAL O RAZÓN SOCIAL</th>
							 <th>MOTIVO DE LA CALIFICACIÓN</th>

                            <th>CALIFICACIÓN ACTUAL</th>
                            <th>OBSERVACIONES</th>
							 <th>EJECUTIVO QUE INGRESÓ</th>
                            <th>FECHA DE CARGA</th>
                            <th>ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($calificacionPagosResultado && mysqli_num_rows($calificacionPagosResultado) > 0) { ?>
                        <?php while ($proveedorCalificacion = mysqli_fetch_assoc($calificacionPagosResultado)) { ?>
                            <?php
                            $tieneCalificacion = !empty($proveedorCalificacion['calificacion_id']);
                            $puedeAbrir = $tieneCalificacion ? $puedeModificarCalificacion : $puedeGuardarCalificacion;
                            ?>
                            <tr style="text-align:center">
                                <td><?php echo (int) $proveedorCalificacion['proveedor_id']; ?></td>
                                <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['nombre_comercial']); ?></td>
                                <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['nombre_fiscal']); ?></td>
								  <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['motivo_calificacion']); ?></td>

                                <td><?php echo $tieneCalificacion ? (int) $proveedorCalificacion['calificacion_actual'] : 'SIN CALIFICAR'; ?></td>
                                <td class="celda-observaciones-calificacion"><?php echo escaparCalificacionProveedor($proveedorCalificacion['observaciones']); ?></td>
								 <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['quien_ingreso']); ?></td>

                                <td><?php echo formatearFechaCargaConHora($proveedorCalificacion['fecha_carga']); ?></td>
                                <td>
                                <?php if ($puedeAbrir) { ?>
                                    <button type="button"
                                            class="btn btn-info btn-xs abrir-calificacion-proveedor"
                                            data-proveedor-id="<?php echo (int) $proveedorCalificacion['proveedor_id']; ?>">
                                        <?php echo $tieneCalificacion ? 'MODIFICAR CALIFICACIÓN' : 'CALIFICAR'; ?>
                                    </button>
                                <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="9" class="text-center">NO HAY PROVEEDORES CON PAGOS REGISTRADOS PARA ESTE EVENTO.</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
 
<script>
document.addEventListener('click', function (event) {
    var contenido = document.getElementById('contenido-calificacion-proveedores');
    var botonAbrir = event.target.closest('#mostrar-calificacion-proveedores');
    var botonCerrar = event.target.closest('#ocultar-calificacion-proveedores');

    if (contenido && (botonAbrir || botonCerrar)) {
        var debeAbrir = Boolean(botonAbrir);
        contenido.style.display = debeAbrir ? 'block' : 'none';
        document.getElementById('mostrar-calificacion-proveedores').setAttribute('aria-expanded', debeAbrir ? 'true' : 'false');
        document.getElementById('ocultar-calificacion-proveedores').setAttribute('aria-expanded', debeAbrir ? 'true' : 'false');
        return;
    }

    var boton = event.target.closest('.abrir-calificacion-proveedor');
    if (!boton || typeof window.jQuery === 'undefined') {
        return;
    }
    var proveedorId = parseInt(boton.getAttribute('data-proveedor-id'), 10);
    if (!Number.isInteger(proveedorId) || proveedorId < 1) {
        return;
    }
 
    jQuery.ajax({
        url: 'calificacion/VistaPreviaCALIFICACION.php',
        method: 'POST',
        data: { proveedor_id: proveedorId },
        beforeSend: function () {
            jQuery('#mensaje-calificacion-proveedores').text('CARGANDO');
        },
        success: function (contenido) {
            jQuery('#mensaje-calificacion-proveedores').empty();
            jQuery('#personal_detalles').html(contenido);
            jQuery('#dataModal').modal('show');
        },
        error: function (xhr) {
            jQuery('#mensaje-calificacion-proveedores').text(
                xhr.responseText || 'NO FUE POSIBLE ABRIR LA CALIFICACIÓN'
            );
        }
    });
});
</script>