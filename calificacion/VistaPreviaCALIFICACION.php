<?php
 
 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
 
	// Vista integrada desde calendarioDEeventos2.php. El flujo anterior, que recibe
	// personal_id (ID de 02CALIFICACION), se conserva sin cambios debajo.
 
$proveedorIdCalendario = filter_input(INPUT_POST, 'proveedor_id', FILTER_VALIDATE_INT);
$eventoIdCalendario = isset($_SESSION['idevento']) ? (int) $_SESSION['idevento'] : 0;
 
if ($proveedorIdCalendario && $eventoIdCalendario > 0) {
 
    if (empty($_SESSION['logeado'])) {
 
        http_response_code(401);
 
        echo '<p class="text-danger">TU SESIÓN HA TERMINADO.</p>';
 
        exit;
 
    }
 
    require_once dirname(__DIR__) . '/includes/class.epcinn.php';
 
    require_once __DIR__ . '/CalificacionProveedoresPagados.php';
 
 
 
    $conexionCalendario = new colaboradores();
 
    $repositorioCalendario = new CalificacionProveedoresPagados($conexionCalendario->db());
 
      $proveedorCalendario = $repositorioCalendario->obtenerProveedor(
        (int) $proveedorIdCalendario,
        $eventoIdCalendario
    );
 
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
 
    // Escala 1 (rojo, bs-danger) -> 10 (verde, bs-success), interpolación lineal RGB
    $colorInicioCalendario = ['r' => 220, 'g' => 53,  'b' => 69];
    $colorFinCalendario    = ['r' => 25,  'g' => 135, 'b' => 84];
 
    $etiquetasCalificacionCalendario = [
        1 => 'MUY MALA', 2 => 'MUY MALA', 3 => 'MALA', 4 => 'MALA',
        5 => 'REGULAR', 6 => 'REGULAR', 7 => 'BUENA', 8 => 'BUENA',
        9 => 'MUY BUENA', 10 => 'EXCELENTE',
    ];
 
    $calificacionActualCalendario = (int) $proveedorCalendario['ADJUNTO_CALIFICACION'];
 
    ?>
 
    <style>
        #tarjeta-calificacion-pagado {
            border: none;
            border-radius: .75rem;
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .08);
            overflow: hidden;
        }
 
        #tarjeta-calificacion-pagado .card-header {
            background: linear-gradient(135deg, #f8f9fa, #eef1f4);
            border-bottom: 1px solid rgba(0, 0, 0, .06);
        }
 
        #tarjeta-calificacion-pagado .card-footer {
            background-color: #fff;
            border-top: 1px solid rgba(0, 0, 0, .06);
        }
 
        .escala-calificacion-pagado {
            display: flex;
            gap: 6px;
            flex-wrap: nowrap;
        }
 
        .opcion-calificacion-pagado {
            flex: 1 1 0;
            border: 2px solid transparent;
            background-color: var(--color-opcion);
            color: #fff;
            font-weight: 600;
            font-size: .9rem;
            border-radius: .5rem;
            padding: .5rem 0;
            opacity: .5;
            transform: scale(.94);
            transition: opacity .15s ease-in-out, transform .15s ease-in-out, box-shadow .15s ease-in-out;
            cursor: pointer;
        }
 
        .opcion-calificacion-pagado:hover {
            opacity: .85;
        }
 
        .opcion-calificacion-pagado.activo {
            opacity: 1;
            transform: scale(1.08);
            border-color: #212529;
            box-shadow: 0 .15rem .4rem rgba(0, 0, 0, .25);
        }
 
        .escala-calificacion-pagado-leyenda {
            display: flex;
            justify-content: space-between;
            font-size: .7rem;
            color: #868e96;
            margin-top: .25rem;
        }
    </style>
 
    <div class="card" id="tarjeta-calificacion-pagado">
 
        <div class="card-header d-flex align-items-center">
            <ion-icon name="business-outline" class="me-2 fs-5 text-secondary"></ion-icon>
            <h6 class="mb-0">CALIFICACIÓN DE PROVEEDOR</h6>
        </div>
 
        <div class="card-body">
 
            <div id="mensaje-calificacion-modal" class="mb-2" aria-live="polite"></div>
 
            <p class="mb-3">
                <strong><?php echo $escaparCalendario($proveedorCalendario['nombre_comercial']); ?></strong>
                <span class="text-muted"> — <?php echo $escaparCalendario($proveedorCalendario['nombre_fiscal']); ?></span>
            </p>
 
            <form id="form-calificacion-proveedor-pagado">
 
                <input type="hidden" name="proveedor_id" value="<?php echo (int) $proveedorCalendario['proveedor_id']; ?>">
 
                <div class="mb-3">
                    <label class="form-label" for="motivo-calificacion-pagado">
                        <ion-icon name="document-text-outline" class="me-1"></ion-icon>MOTIVO DE LA CALIFICACIÓN
                    </label>
                    <input class="form-control" id="motivo-calificacion-pagado" name="DOCUMENTO_CALIFICACION" required
                        placeholder="EJ. CUMPLIMIENTO EN TIEMPO DE ENTREGA"
                        value="<?php echo $escaparCalendario($proveedorCalendario['DOCUMENTO_CALIFICACION']); ?>">
                </div>
 
                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between align-items-center">
                        <span><ion-icon name="star-outline" class="me-1"></ion-icon>CALIFICACIÓN</span>
                        <span id="badge-calificacion-pagado" class="badge rounded-pill <?php echo $calificacionActualCalendario ? '' : 'bg-secondary'; ?>"
                            <?php if ($calificacionActualCalendario) { ?>
                            style="background-color: rgb(
                                <?php echo round($colorInicioCalendario['r'] + ($colorFinCalendario['r'] - $colorInicioCalendario['r']) * (($calificacionActualCalendario - 1) / 9)); ?>,
                                <?php echo round($colorInicioCalendario['g'] + ($colorFinCalendario['g'] - $colorInicioCalendario['g']) * (($calificacionActualCalendario - 1) / 9)); ?>,
                                <?php echo round($colorInicioCalendario['b'] + ($colorFinCalendario['b'] - $colorInicioCalendario['b']) * (($calificacionActualCalendario - 1) / 9)); ?>
                            );"
                            <?php } ?>>
                            <?php echo $calificacionActualCalendario ? $calificacionActualCalendario . ' · ' . $etiquetasCalificacionCalendario[$calificacionActualCalendario] : 'SIN CALIFICAR'; ?>
                        </span>
                    </label>
 
                    <div class="escala-calificacion-pagado" role="group" aria-label="Escala de calificación del 1 al 10">
                        <?php for ($valorCalendario = 1; $valorCalendario <= 10; $valorCalendario++) {
 
                            $tCalendario = ($valorCalendario - 1) / 9;
 
                            $rCalendario = round($colorInicioCalendario['r'] + ($colorFinCalendario['r'] - $colorInicioCalendario['r']) * $tCalendario);
                            $gCalendario = round($colorInicioCalendario['g'] + ($colorFinCalendario['g'] - $colorInicioCalendario['g']) * $tCalendario);
                            $bCalendario = round($colorInicioCalendario['b'] + ($colorFinCalendario['b'] - $colorInicioCalendario['b']) * $tCalendario);
 
                            $activoCalendario = ($calificacionActualCalendario === $valorCalendario) ? 'activo' : '';
                        ?>
                            <button type="button"
                                class="opcion-calificacion-pagado <?php echo $activoCalendario; ?>"
                                data-valor="<?php echo $valorCalendario; ?>"
                                data-etiqueta="<?php echo $escaparCalendario($etiquetasCalificacionCalendario[$valorCalendario]); ?>"
                                style="--color-opcion: rgb(<?php echo $rCalendario; ?>, <?php echo $gCalendario; ?>, <?php echo $bCalendario; ?>);">
                                <?php echo $valorCalendario; ?>
                            </button>
                        <?php } ?>
                    </div>
 
                    <div class="escala-calificacion-pagado-leyenda">
                        <span>DEFICIENTE</span>
                        <span>EXCELENTE</span>
                    </div>
 
                    <input type="hidden" id="valor-calificacion-pagado" name="ADJUNTO_CALIFICACION" required
                        value="<?php echo $calificacionActualCalendario ?: ''; ?>">
                </div>
 
                <div class="mb-2">
                    <label class="form-label" for="observaciones-calificacion-pagado">
                        <ion-icon name="chatbox-ellipses-outline" class="me-1"></ion-icon>OBSERVACIONES
                    </label>
                    <textarea class="form-control" id="observaciones-calificacion-pagado" name="OBSERVACIONES_CALIFICACION"
                        rows="3" placeholder="DETALLA EL MOTIVO DE LA CALIFICACIÓN OTORGADA" required><?php echo $escaparCalendario($proveedorCalendario['OBSERVACIONES_CALIFICACION']); ?></textarea>
                </div>
 
            </form>
 
        </div>
 
        <div class="card-footer text-end">
            <button class="btn btn-sm btn-outline-success px-5" type="button" id="guardar-calificacion-proveedor-pagado">
                <ion-icon name="save-outline" class="me-1"></ion-icon>GUARDAR
            </button>
        </div>
 
    </div>
 
    <script>
    (function () {
 
        var etiquetasCalificacion = {
            1: 'MUY MALA', 2: 'MUY MALA', 3: 'MALA', 4: 'MALA',
            5: 'REGULAR', 6: 'REGULAR', 7: 'BUENA', 8: 'BUENA',
            9: 'MUY BUENA', 10: 'EXCELENTE'
        };
 
        jQuery(document).on('click', '.opcion-calificacion-pagado', function () {
 
            var valorSeleccionado = jQuery(this).data('valor');
            var colorSeleccionado = jQuery(this).css('--color-opcion') || getComputedStyle(this).getPropertyValue('--color-opcion');
 
            jQuery('.opcion-calificacion-pagado').removeClass('activo');
            jQuery(this).addClass('activo');
 
            jQuery('#valor-calificacion-pagado').val(valorSeleccionado);
 
            jQuery('#badge-calificacion-pagado')
                .removeClass('bg-secondary')
                .css('background-color', colorSeleccionado)
                .text(valorSeleccionado + ' · ' + etiquetasCalificacion[valorSeleccionado]);
 
        });
 
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
 
                        jQuery('#dataModal').modal('hide');
 
                        jQuery('#calificacion-proveedores-pagos').load(
                            location.href + ' #calificacion-proveedores-pagos'
                        );
 
                    }
 
                },
 
                error: function (xhr) {
 
                    var respuesta = xhr.responseJSON || {};
 
                    jQuery('#mensaje-calificacion-modal').text(respuesta.mensaje || 'NO FUE POSIBLE GUARDAR LA CALIFICACIÓN');
 
                }
 
            });
 
        });
 
    })();
    </script>
 
    <?php
 
    exit;
 
}
 
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorP.php";
	$conexion = NEW accesoclase();
 
$queryVISTAPREV = $conexion->Listado_CALIFICACION2($identioficador);
 $output .= '
<div id="mensajeCALIFICACIONctualiza2"></div> 
 <form  id="Listado_CALIFICACIONform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    
		
             $output .= '
 
<tr>
<td width="30%"><label>MOTIVO DE LA CALIFICACIÓN</label></td>
<td width="70%"><input type="text" name="DOCUMENTO_CALIFICACION" value="'.$row["DOCUMENTO_CALIFICACION"].'"></td>
</tr>
<tr>
<td width="30%"><label>CALIFICACIÓN</label></td>
<td width="70%"><input type="text" name="ADJUNTO_CALIFICACION" value="'.$row["ADJUNTO_CALIFICACION"].'"></td>
</tr>
 
 
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_CALIFICACION" value="'.$row["OBSERVACIONES_CALIFICACION"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type="text" name="FECHA_CALIFICACION" value="'.$row["FECHA_CALIFICACION"].'"></td>
</tr> 
 
 
 
	';
	
 
 
	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpCALIFICACION"  id="IpCALIFICACION"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickCALIFICACION">GUARDAR</button>
			
			<input type="hidden" value="enviarCALIFICACION"  name="enviarCALIFICACION"/>
 
			</td>  
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form>';
    echo $output;
}
//
?>
 
<script>
 
 
var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}
 
	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IpCALIFICACION",  $("#IpCALIFICACION").val());
	        $.ajax({
	            type: 'POST',
              url:'proveedores/controladorP.php',
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
 
if($.trim(response) == 2 ){
 
$('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#2'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}
 
	            }
	        });
	    }
	}
 
 
    $(document).ready(function(){
 
$("#clickCALIFICACION").click(function(){
	
   $.ajax({  
        url:'proveedores/controladorP.php',
    method:"POST",  
    data:$('#Listado_CALIFICACIONform').serialize(),
 
    beforeSend:function(){  
    $('#mensajeCALIFICACIONctualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
	
		$("#reset_CALIFICACION").load(location.href + " #reset_CALIFICACION");
    $('#mensajeCALIFICACION').html("<span id='ACTUALIZADO' >"+data+"</span>"); 
 
			$('#dataModal').modal('hide');
 
    }  
   });
   
});
 
		});
		
	</script>