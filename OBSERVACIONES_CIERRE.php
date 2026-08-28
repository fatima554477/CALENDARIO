<div id="content">
    <hr/>
    <strong><p class="mb-0 text-uppercase">
        <img src="includes/contraer31.png" id="mostrarObservacionesCierre" style="cursor:pointer;"/>
        <img src="includes/contraer41.png" id="ocultarObservacionesCierre" style="cursor:pointer;"/>
        &nbsp;&nbsp;&nbsp; OBSERVACIONES DEL CIERRE
    </p></strong>

    <div id="targetObservacionesCierre" class="content2">
        <div class="card"><div class="card-body">
            <?php if($conexion->variablespermisos('', 'OBSERVACIONES_CIERRE', 'guardar') == 'si' && $var_bloquea_fecha == 'no'){ ?>
            <form class="row g-3 needs-validation" id="observacionesCierreForm" enctype="multipart/form-data">
                <div class="col-md-6" style="background:#fbeee6">
                    <strong><label class="form-label">OBSERVACIONES:</label></strong>
                    <textarea class="form-control" rows="3" required name="OBSERVACIONES_CIERRE"></textarea>
                </div>
                <div class="col-md-6" style="background:#d4f6c8">
                    <strong><label class="form-label">IMAGEN:</label></strong>
                    <input type="file" class="form-control" accept="image/jpeg,image/png,image/gif" required name="IMAGEN_OBSERVACIONESCIERRE">
                </div>
                   <div class="col-md-6" style="background:#fef5e7">
                    <strong><label class="form-label">QUIÉN INGRESÓ:</label></strong>
                    <?php $nombreUsuarioObservacion = $altaeventos->nombre_completo_usuario(isset($_SESSION['idem']) ? $_SESSION['idem'] : 0); ?>
                    <input type="text" class="form-control" readonly value="<?php echo htmlspecialchars($nombreUsuarioObservacion, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-md-6" style="background:#faebee">
                    <strong><label class="form-label">FECHA DE INGRESO:</label></strong>
                    <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
                <input type="hidden" name="hOBSERVACIONESCIERRE" value="hOBSERVACIONESCIERRE">
                <div class="col-12"><button class="btn btn-sm btn-outline-success px-5" type="button" id="GUARDAR_OBSERVACIONESCIERRE">GUARDAR</button></div>
                <div id="mensajeObservacionesCierre"></div>
            </form>
            <?php } ?>

            <?php $queryObservaciones = $altaeventos->Listado_observaciones_cierre(); ?>
            <br/>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="reset_observaciones_cierre">
                    <thead><tr style="background:#c9e8e8;text-align:center">
                        <th>OBSERVACIONES</th><th>IMAGEN</th><th>QUIÉN INGRESÓ</th><th>FECHA DE INGRESO</th>
                    </tr></thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_array($queryObservaciones)){ ?>
                        <tr style="text-align:center">
                            <td><?php echo nl2br(htmlspecialchars($row['OBSERVACIONES_CIERRE'], ENT_QUOTES, 'UTF-8')); ?></td>
                            <td><?php echo $row['IMAGEN_OBSERVACIONESCIERRE'] != '' ? $conexion->descargararchivo($row['IMAGEN_OBSERVACIONESCIERRE']) : ''; ?></td>
                            <td><?php echo htmlspecialchars($row['QUIEN_INGRESO'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['FECHA_INGRESO'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                
                                <?php if($conexion->variablespermisos('', 'OBSERVACIONES_CIERRE', 'borrar') == 'si' && $var_bloquea_fecha == 'no'){ ?><button type="button" class="btn btn-info btn-xs borrarObservacionCierre" data-id="<?php echo $row['id']; ?>">BORRAR</button><?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div></div>
    </div>
</div>