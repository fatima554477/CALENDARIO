<?php
require_once __DIR__ . '/CalificacionProveedoresPagados.php';

$calificacionPagosConexion = $conexion->db();
$calificacionPagosRepositorio = new CalificacionProveedoresPagados($calificacionPagosConexion);
$calificacionPagosResultado = $calificacionPagosRepositorio->listar();
$puedeGuardarCalificacion = $conexion->variablespermisos('', 'CALIFICACION', 'guardar') == 'si';
$puedeModificarCalificacion = $conexion->variablespermisos('', 'CALIFICACION', 'modificar') == 'si';

function escaparCalificacionProveedor($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>
<div id="calificacion-proveedores-pagos">
    <hr>
    <strong><p class="mb-0 text-uppercase">CALIFICACIÓN DE PROVEEDORES</p></strong>
    <div id="mensaje-calificacion-proveedores" aria-live="polite"></div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr style="background:#f5f9fc;text-align:center">
                            <th>ID DEL PROVEEDOR</th>
                            <th>NOMBRE COMERCIAL</th>
                            <th>NOMBRE FISCAL O RAZÓN SOCIAL</th>
                            <th>CALIFICACIÓN ACTUAL</th>
                            <th>OBSERVACIONES</th>
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
                                <td><?php echo $tieneCalificacion ? (int) $proveedorCalificacion['calificacion_actual'] : 'SIN CALIFICAR'; ?></td>
                                <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['observaciones']); ?></td>
                                <td><?php echo escaparCalificacionProveedor($proveedorCalificacion['fecha_carga']); ?></td>
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
                        <tr><td colspan="7" class="text-center">NO HAY PROVEEDORES CON PAGOS REGISTRADOS.</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('click', function (event) {
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
        }
    });
});
</script>