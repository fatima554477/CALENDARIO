<?php
if (!isset($_SESSION)) {
    session_start();
}

header('Content-Type: application/json; charset=UTF-8');

function responderCalificacion($estadoHttp, $ok, $mensaje)
{
    http_response_code($estadoHttp);
    echo json_encode(array('ok' => $ok, 'mensaje' => $mensaje));
    exit;
}

if (empty($_SESSION['logeado'])) {
    responderCalificacion(401, false, 'TU SESIÓN HA TERMINADO.');
}

$proveedorId = filter_input(INPUT_POST, 'proveedor_id', FILTER_VALIDATE_INT);
$eventoId = isset($_SESSION['idevento']) ? (int) $_SESSION['idevento'] : 0;
$motivo = isset($_POST['DOCUMENTO_CALIFICACION']) ? trim($_POST['DOCUMENTO_CALIFICACION']) : '';
$calificacion = filter_input(INPUT_POST, 'ADJUNTO_CALIFICACION', FILTER_VALIDATE_INT);
$observaciones = isset($_POST['OBSERVACIONES_CALIFICACION'])
    ? trim($_POST['OBSERVACIONES_CALIFICACION'])
    : '';

if (!$proveedorId || $eventoId < 1 || $motivo === '' || $observaciones === ''
    || $calificacion === false || $calificacion < 1 || $calificacion > 10) {
    responderCalificacion(422, false, 'REVISA LOS DATOS DE LA CALIFICACIÓN.');
}

require_once dirname(__DIR__) . '/includes/class.epcinn.php';
require_once __DIR__ . '/CalificacionProveedoresPagados.php';

$conexion = new colaboradores();
$puedeGuardar = $conexion->variablespermisos('', 'CALIFICACION', 'guardar') == 'si';
$puedeModificar = $conexion->variablespermisos('', 'CALIFICACION', 'modificar') == 'si';

if (!$puedeGuardar && !$puedeModificar) {
    responderCalificacion(403, false, 'NO TIENES PERMISO PARA CALIFICAR PROVEEDORES.');
}

$repositorio = new CalificacionProveedoresPagados($conexion->db());
$proveedor = $repositorio->obtenerProveedor((int) $proveedorId, $eventoId);

if (!$proveedor) {
    responderCalificacion(404, false, 'EL PROVEEDOR NO PERTENECE A ESTE EVENTO.');
}

$esModificacion = !empty($proveedor['calificacion_id']);
if (($esModificacion && !$puedeModificar) || (!$esModificacion && !$puedeGuardar)) {
    responderCalificacion(403, false, 'NO TIENES PERMISO PARA REALIZAR ESTA ACCIÓN.');
}

$fecha = date('Y-m-d H:i:s');
$guardado = $repositorio->guardar(
    (int) $proveedorId,
    $eventoId,
    $motivo,
    (int) $calificacion,
    $observaciones,
    $fecha
);

if (!$guardado) {
    responderCalificacion(500, false, 'NO FUE POSIBLE GUARDAR LA CALIFICACIÓN.');
}

responderCalificacion(200, true, 'CALIFICACIÓN GUARDADA CORRECTAMENTE.');