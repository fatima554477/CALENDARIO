<?php
/* Calendario mensual del personal que asiste y coordina los eventos. */
if (!isset($_SESSION)) { session_start(); }
isset($_SESSION['logeado']) ? '' : header('location: index.php?salir=1');

require 'includes/error_reporting.php';
require 'calendariodeeventos2/controladorAE.php';
require 'calendariodeeventos2/variablesE.php';

$conn = $conexion->db();
$meses = [1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO',6=>'JUNIO',7=>'JULIO',8=>'AGOSTO',9=>'SEPTIEMBRE',10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'];
$mesesCortos = [1=>'ene',2=>'feb',3=>'mar',4=>'abr',5=>'may',6=>'jun',7=>'jul',8=>'ago',9=>'sep',10=>'oct',11=>'nov',12=>'dic'];
$diasSemana = [0=>'DOMINGO',1=>'LUNES',2=>'MARTES',3=>'MIÉRCOLES',4=>'JUEVES',5=>'VIERNES',6=>'SÁBADO'];

$mes = filter_input(INPUT_GET, 'mes', FILTER_VALIDATE_INT, ['options'=>['min_range'=>1,'max_range'=>12]]) ?: (int) date('n');
$anio = filter_input(INPUT_GET, 'anio', FILTER_VALIDATE_INT, ['options'=>['min_range'=>2000,'max_range'=>2100]]) ?: (int) date('Y');
$empresa = isset($_GET['empresa']) ? trim((string) $_GET['empresa']) : '';
$empresaSql = mysqli_real_escape_string($conn, $empresa);
$diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
$inicio = sprintf('%04d-%02d-01', $anio, $mes);
$fin = sprintf('%04d-%02d-%02d', $anio, $mes, $diasMes);

function nombre_personal_calendario($valor) {
    $partes = array_map('trim', explode('^^', (string) $valor));
    if (count($partes) > 1) {
        array_shift($partes);
        $nombre = trim(implode(' ', array_filter($partes, 'strlen')));
        if ($nombre !== '') { return $nombre; }
    }
    return trim((string) $valor);
}

/* Color determinado por el EVENTO (no por la persona), para que cada evento
   tenga un color propio y consistente sin importar quién lo tenga asignado. */
function clave_evento_calendario($asignacion) {
    $numero = trim((string) $asignacion['numero']);
    $empresa = trim((string) $asignacion['empresa']);
    $nombre = trim((string) $asignacion['corto'])
        ?: trim((string) $asignacion['evento']);
    return $numero !== '' ? $numero.'|'.$empresa : $nombre.'|'.$empresa;
}

/* Asigna un color distinto a cada evento ÚNICO realmente presente en los
   datos del mes (no por hash), así nunca se repiten dos eventos diferentes.
   Usa el ángulo dorado para repartir los tonos de la forma más separada
   posible sin importar cuántos eventos distintos haya. */
function generar_colores_eventos(array $claves) {
    $colores = [];
    $i = 0;
    foreach ($claves as $clave) {
        $hue = fmod($i * 137.508, 360);
        $sat = ($i % 2 === 0) ? 70 : 55;
        $lig = 82 - (($i % 3) * 6);
        $colores[$clave] = 'hsl('.round($hue, 1).', '.$sat.'%, '.$lig.'%)';
        $i++;
    }
    return $colores;
}

$sql = "SELECT p.idPersonal, p.NOMBRE_PERSONAL2,
               p.FECHA_INICIO1, p.FECHA_FINAL1,
               e.NUMERO_EVENTO, e.NOMBRE_EVENTO, e.NOMBRE_CORTO_EVENTO, e.iniciales_evento
        FROM 04personal2 p
        LEFT JOIN 04altaeventos e ON e.id = p.idRelacion
        WHERE p.FECHA_INICIO1 <= '{$fin}' AND p.FECHA_FINAL1 >= '{$inicio}'";
if ($empresa !== '') { $sql .= " AND e.iniciales_evento = '{$empresaSql}'"; }
$sql .= ' ORDER BY p.NOMBRE_PERSONAL2, p.FECHA_INICIO1';
$resultado = mysqli_query($conn, $sql);

$personal = [];
$asignaciones = [];
if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $id = $fila['idPersonal'] !== null && $fila['idPersonal'] !== ''
            ? (string) $fila['idPersonal']
            : 'nombre_'.md5((string) $fila['NOMBRE_PERSONAL2']);
        if (!isset($personal[$id])) {
            $personal[$id] = ['nombre'=>nombre_personal_calendario($fila['NOMBRE_PERSONAL2'])];
        }
        $asignaciones[$id][] = [
            'inicio'=>$fila['FECHA_INICIO1'], 'fin'=>$fila['FECHA_FINAL1'],
            'numero'=>$fila['NUMERO_EVENTO'], 'evento'=>$fila['NOMBRE_EVENTO'],
            'corto'=>$fila['NOMBRE_CORTO_EVENTO'], 'empresa'=>$fila['iniciales_evento']
        ];
    }
}

$clavesEventos = [];
foreach ($asignaciones as $listaAsignaciones) {
    foreach ($listaAsignaciones as $asignacion) {
        $clavesEventos[clave_evento_calendario($asignacion)] = true;
    }
}
$coloresEventos = generar_colores_eventos(array_keys($clavesEventos));

$empresas = [];
$resultadoEmpresas = mysqli_query($conn, "SELECT DISTINCT iniciales_evento FROM 04altaeventos WHERE iniciales_evento IS NOT NULL AND iniciales_evento <> '' ORDER BY iniciales_evento");
if ($resultadoEmpresas) {
    while ($fila = mysqli_fetch_assoc($resultadoEmpresas)) { $empresas[] = $fila['iniciales_evento']; }
}

function asignacion_personal_dia($id, $fecha, $asignaciones) {
    if (!isset($asignaciones[$id])) { return null; }
    foreach ($asignaciones[$id] as $asignacion) {
        if ($fecha >= $asignacion['inicio'] && $fecha <= $asignacion['fin']) { return $asignacion; }
    }
    return null;
}

function contenido_asignacion_personal($asignacion) {
    $numero = trim((string) $asignacion['numero']) ?: 'S/N';
    $evento = trim((string) $asignacion['corto']) ?: trim((string) $asignacion['evento']);
    return htmlspecialchars($numero, ENT_QUOTES, 'UTF-8').($evento !== '' ? '<br><small>'.htmlspecialchars($evento, ENT_QUOTES, 'UTF-8').'</small>' : '');
}

if (isset($_GET['exportar']) && $_GET['exportar'] === 'excel') {
    $archivo = 'calendario_personal_'.$anio.'_'.str_pad($mes, 2, '0', STR_PAD_LEFT).'.xls';
    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename="'.$archivo.'"');
    header('Pragma: no-cache');
    header('Expires: 0');
    echo "\xEF\xBB\xBF";
    echo '<table border="1"><tr><th colspan="'.(2 + $diasMes).'">CALENDARIO DE PERSONAL - '.$meses[$mes].' '.$anio.'</th></tr>';
    echo '<tr><th>No.</th><th>Nombre</th>';
    for ($d=1; $d<=$diasMes; $d++) {
        $fecha = sprintf('%04d-%02d-%02d', $anio, $mes, $d);
        echo '<th>'.sprintf('%02d', $d).'-'.$mesesCortos[$mes].' '.$diasSemana[date('w', strtotime($fecha))].'</th>';
    }
    echo '</tr>';
    $numeroFila = 0;
    foreach ($personal as $id=>$persona) {
        echo '<tr><td>'.(++$numeroFila).'</td><td>'.htmlspecialchars($persona['nombre'], ENT_QUOTES, 'UTF-8').'</td>';
        for ($d=1; $d<=$diasMes; $d++) {
            $asignacion = asignacion_personal_dia($id, sprintf('%04d-%02d-%02d', $anio, $mes, $d), $asignaciones);
            $color = $asignacion ? $coloresEventos[clave_evento_calendario($asignacion)] : null;
            echo '<td style="text-align:center;'.($asignacion ? 'background:'.$color.';font-weight:bold' : '').'">'.($asignacion ? contenido_asignacion_personal($asignacion) : '').'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    exit;
}

$mesAnterior = $mes - 1; $anioAnterior = $anio;
if ($mesAnterior < 1) { $mesAnterior = 12; $anioAnterior--; }
$mesSiguiente = $mes + 1; $anioSiguiente = $anio;
if ($mesSiguiente > 12) { $mesSiguiente = 1; $anioSiguiente++; }
$empresaQuery = $empresa !== '' ? '&empresa='.rawurlencode($empresa) : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CALENDARIO DE PERSONAL — <?php echo $meses[$mes].' '.$anio; ?></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:'Segoe UI',Tahoma,sans-serif;font-size:14px;background:#f5f5f5}.page-header{background:linear-gradient(135deg,#2c3e50,#3498db);color:#fff;padding:18px 25px;display:flex;justify-content:space-between;align-items:center;gap:20px}.page-header h1{font-size:22px;font-weight:700;margin:0}.nav-m{display:flex;align-items:center;gap:12px}.nav-m a{color:#fff;text-decoration:none;font-size:22px;font-weight:bold;padding:0 10px}.controles{padding:12px 20px;background:#eef;display:flex;gap:15px;align-items:center;flex-wrap:wrap}.controles label{font-weight:600}.controles select{padding:5px 10px;border:1px solid #bbb;border-radius:4px}.table-scroll{max-height:650px;overflow:auto;border:1px solid #000;background:#fff}.table{margin:0;font-size:13px;border-collapse:collapse}.table td,.table th{white-space:nowrap;vertical-align:middle;padding:7px;border:1px solid #000!important}.table thead th{position:sticky;top:0;background:#c9e8e8;z-index:10;text-align:center}.sticky-0{position:sticky;left:0;width:42px;min-width:42px;z-index:5}.sticky-1{position:sticky;left:42px;width:230px;min-width:230px;max-width:230px;z-index:5;white-space:normal!important;box-shadow:3px 0 8px rgba(0,0,0,.15)}thead .sticky-0,thead .sticky-1{z-index:20!important}tbody .sticky-0,tbody .sticky-1{background:#fff}.dia{min-width:105px;max-width:145px;text-align:center;white-space:normal!important}.fin-semana{background:#e2e3e5!important}.ocupado{font-weight:600}.hint-text{padding:10px 20px;color:#666}.btn-f{background:#3498db;color:#fff;border:0;padding:7px 18px;border-radius:4px}@media print{.controles,.acciones{display:none}.table-scroll{max-height:none;overflow:visible}}
</style>
</head>
<body>
<header class="page-header">
  <div><h1>CALENDARIO DE COORDINACIÓN</h1><small>Control de coordinación y asistencia a eventos</small></div>
  <nav class="nav-m"><a href="?mes=<?php echo $mesAnterior; ?>&anio=<?php echo $anioAnterior.$empresaQuery; ?>">◀</a><strong><?php echo $meses[$mes].' '.$anio; ?></strong><a href="?mes=<?php echo $mesSiguiente; ?>&anio=<?php echo $anioSiguiente.$empresaQuery; ?>">▶</a></nav>
  <div class="acciones"><a class="btn btn-sm btn-success" href="?mes=<?php echo $mes; ?>&anio=<?php echo $anio.$empresaQuery; ?>&exportar=excel">📊 EXPORTAR A EXCEL</a></div>
</header>
<form method="get" class="controles">
  <label for="mes">MES:</label><select id="mes" name="mes"><?php foreach ($meses as $valor=>$nombre): ?><option value="<?php echo $valor; ?>" <?php echo $valor===$mes?'selected':''; ?>><?php echo $nombre; ?></option><?php endforeach; ?></select>
  <label for="anio">AÑO:</label><select id="anio" name="anio"><?php for ($a=(int)date('Y')-3; $a<=(int)date('Y')+2; $a++): ?><option value="<?php echo $a; ?>" <?php echo $a===$anio?'selected':''; ?>><?php echo $a; ?></option><?php endfor; ?></select>
  <label for="empresa">EMPRESA:</label><select id="empresa" name="empresa"><option value="">TODAS</option><?php foreach ($empresas as $valor): ?><option value="<?php echo htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $valor===$empresa?'selected':''; ?>><?php echo htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'); ?></option><?php endforeach; ?></select>
  <button class="btn-f" type="submit">FILTRAR</button>
</form>
<div class="controles">
  <label for="buscarNombre">BUSCAR NOMBRE:</label>
  <input type="text" id="buscarNombre" placeholder="Escribe un nombre..." autocomplete="off" style="padding:5px 10px;border:1px solid #bbb;border-radius:4px;min-width:220px">
  <label for="buscarEvento">BUSCAR EVENTO:</label>
  <input type="text" id="buscarEvento" placeholder="Número o nombre del evento..." autocomplete="off" style="padding:5px 10px;border:1px solid #bbb;border-radius:4px;min-width:220px">
</div>
<div class="hint-text" id="contadorPersonal"><?php echo count($personal); ?> personas con asignaciones en el mes</div>
<div class="table-scroll"><table class="table table-striped table-bordered" id="tablaPersonal"><thead><tr><th class="sticky-0">No.</th><th class="sticky-1">NOMBRE</th><?php for ($d=1;$d<=$diasMes;$d++): $fecha=sprintf('%04d-%02d-%02d',$anio,$mes,$d); $dw=date('w',strtotime($fecha)); ?><th class="dia <?php echo ($dw==0||$dw==6)?'fin-semana':''; ?>"><?php echo sprintf('%02d',$d).'-'.$mesesCortos[$mes].'<br><small>'.$diasSemana[$dw].'</small>'; ?></th><?php endfor; ?></tr></thead><tbody>
<?php $numeroFila=0; foreach ($personal as $id=>$persona): ?><tr><td class="sticky-0 text-center"><?php echo ++$numeroFila; ?></td><td class="sticky-1 nombre-personal"><strong><?php echo htmlspecialchars($persona['nombre'], ENT_QUOTES, 'UTF-8'); ?></strong></td><?php for ($d=1;$d<=$diasMes;$d++): $asignacion=asignacion_personal_dia($id,sprintf('%04d-%02d-%02d',$anio,$mes,$d),$asignaciones); $color=$asignacion?$coloresEventos[clave_evento_calendario($asignacion)]:null; ?><td class="dia <?php echo $asignacion?'ocupado':''; ?>" <?php echo $asignacion?'style="background:'.$color.'"':''; ?> title="<?php echo $asignacion?htmlspecialchars($asignacion['evento'],ENT_QUOTES,'UTF-8'):''; ?>"><?php echo $asignacion?contenido_asignacion_personal($asignacion):''; ?></td><?php endfor; ?></tr><?php endforeach; ?>
</tbody></table></div>
<script>
(function () {
    var inputNombre = document.getElementById('buscarNombre');
    var inputEvento = document.getElementById('buscarEvento');
    var contador = document.getElementById('contadorPersonal');
    var filas = document.querySelectorAll('#tablaPersonal tbody tr');
    var totalPersonal = filas.length;

    function filaTieneEvento(fila, termino) {
        if (termino === '') { return true; }
        var celdasDia = fila.querySelectorAll('td.dia');
        for (var i = 0; i < celdasDia.length; i++) {
            var texto = (celdasDia[i].textContent + ' ' + (celdasDia[i].getAttribute('title') || '')).toLocaleLowerCase('es');
            if (texto.indexOf(termino) !== -1) { return true; }
        }
        return false;
    }

    function aplicarFiltros() {
        var terminoNombre = inputNombre.value.trim().toLocaleLowerCase('es');
        var terminoEvento = inputEvento.value.trim().toLocaleLowerCase('es');
        var visibles = 0;
        filas.forEach(function (fila) {
            var celdaNombre = fila.querySelector('.nombre-personal');
            var nombre = celdaNombre ? celdaNombre.textContent.toLocaleLowerCase('es') : '';
            var coincideNombre = nombre.indexOf(terminoNombre) !== -1;
            var coincideEvento = filaTieneEvento(fila, terminoEvento);
            var coincide = coincideNombre && coincideEvento;
            fila.style.display = coincide ? '' : 'none';
            if (coincide) { visibles++; }
        });
        if (terminoNombre === '' && terminoEvento === '') {
            contador.textContent = totalPersonal + ' personas con asignaciones en el mes';
        } else {
            contador.textContent = visibles + ' de ' + totalPersonal + ' personas coinciden con la búsqueda';
        }
    }

    inputNombre.addEventListener('input', aplicarFiltros);
    inputEvento.addEventListener('input', aplicarFiltros);
})();
</script>
</body>
</html>
