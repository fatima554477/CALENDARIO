/ Vista integrada desde calendarioDEeventos2.php. El flujo anterior, que recibe

// personal_id (ID de 02CALIFICACION), se conserva sin cambios debajo.

$proveedorIdCalendario = filter_input(INPUT_POST, 'proveedor_id', FILTER_VALIDATE_INT);

if ($proveedorIdCalendario) {

    if (empty($_SESSION['logeado'])) {

        http_response_code(401);

        echo '<p class="text-danger">TU SESIÓN HA TERMINADO.</p>';

        exit;

    }

    require_once dirname(__DIR__) . '/includes/class.epcinn.php';

    require_once __DIR__ . '/CalificacionProveedoresPagados.php';



    $conexionCalendario = new colaboradores();

    $repositorioCalendario = new CalificacionProveedoresPagados($conexionCalendario->db());

    $proveedorCalendario = $repositorioCalendario->obtenerProveedor((int) $proveedorIdCalendario);

    $puedeGuardarCalendario = $conexionCalendario->variablespermisos('', 'CALIFICACION', 'guardar') == 'si';

    $puedeModificarCalendario = $conexionCalendario->variablespermisos('', 'CALIFICACION', 'modificar') == 'si';



    if (!$proveedorCalendario || (!$puedeGuardarCalendario && !$puedeModificarCalendario)) {

        http_response_code($proveedorCalendario ? 403 : 404);

        echo '<p class="text-danger">PROVEEDOR NO DISPONIBLE PARA CALIFICAR.</p>';

        exit;

    }



    $escaparCalendario = function ($valor) {

        return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');

    };

    ?>

    <div id="mensaje-calificacion-modal" aria-live="polite"></div>

    <form id="form-calificacion-proveedor-pagado">

        <input type="hidden" name="proveedor_id" value="<?php echo (int) $proveedorCalendario['proveedor_id']; ?>">

        <p><strong>PROVEEDOR:</strong>

            <?php echo $escaparCalendario($proveedorCalendario['nombre_comercial']); ?> —

            <?php echo $escaparCalendario($proveedorCalendario['nombre_fiscal']); ?>

        </p>

        <div class="mb-3">

            <label class="form-label" for="motivo-calificacion-pagado">MOTIVO DE LA CALIFICACIÓN</label>

            <input class="form-control" id="motivo-calificacion-pagado" name="DOCUMENTO_CALIFICACION" required

                value="<?php echo $escaparCalendario($proveedorCalendario['DOCUMENTO_CALIFICACION']); ?>">

        </div>

        <div class="mb-3">

            <label class="form-label" for="valor-calificacion-pagado">CALIFICACIÓN</label>

            <select class="form-select" id="valor-calificacion-pagado" name="ADJUNTO_CALIFICACION" required>

                <option value="">SELECCIONA UNA OPCIÓN</option>

                <?php for ($valorCalendario = 1; $valorCalendario <= 10; $valorCalendario++) { ?>

                    <option value="<?php echo $valorCalendario; ?>" <?php echo (int) $proveedorCalendario['ADJUNTO_CALIFICACION'] === $valorCalendario ? 'selected' : ''; ?>>

                        <?php echo $valorCalendario; ?>

                    </option>

                <?php } ?>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label" for="observaciones-calificacion-pagado">OBSERVACIONES</label>

            <textarea class="form-control" id="observaciones-calificacion-pagado" name="OBSERVACIONES_CALIFICACION" required><?php echo $escaparCalendario($proveedorCalendario['OBSERVACIONES_CALIFICACION']); ?></textarea>

        </div>

        <button class="btn btn-sm btn-outline-success px-5" type="button" id="guardar-calificacion-proveedor-pagado">GUARDAR</button>

    </form>

    <script>

    jQuery('#guardar-calificacion-proveedor-pagado').on('click', function () {

        var formulario = jQuery('#form-calificacion-proveedor-pagado')[0];

        if (!formulario.checkValidity()) {

            formulario.reportValidity();

            return;

        }

        jQuery.ajax({

            url: 'calificacion/controlador_calificacion_pagos.php',

            method: 'POST',

            dataType: 'json',

            data: jQuery(formulario).serialize(),

            beforeSend: function () {

                jQuery('#mensaje-calificacion-modal').text('GUARDANDO');

            },

            success: function (respuesta) {

                jQuery('#mensaje-calificacion-modal').text(respuesta.mensaje);

                if (respuesta.ok) {

                    jQuery('#calificacion-proveedores-pagos').load(location.href + ' #calificacion-proveedores-pagos > *');

                    jQuery('#dataModal').modal('hide');

                }

            },

            error: function (xhr) {

                var respuesta = xhr.responseJSON || {};

                jQuery('#mensaje-calificacion-modal').text(respuesta.mensaje || 'NO FUE POSIBLE GUARDAR LA CALIFICACIÓN');

            }

        });

    });

    </script>

    <?php

    exit;

}
