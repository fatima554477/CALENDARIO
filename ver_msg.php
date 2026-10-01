<?php
// ver_msg.php — visor de archivos .msg (Outlook) para adjunto_cierre
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['idem']) || $_SESSION['idem'] === '') {
	http_response_code(403);
	exit('TU SESIÓN HA TERMINADO');
}

if (!is_file(__DIR__.'/vendor/autoload.php')) {
	exit('FALTA LA CARPETA vendor. Ejecuta: composer require hfig/mapi y sube vendor al servidor, junto a este archivo.');
}
require __DIR__.'/vendor/autoload.php';

use Hfig\MAPI\MapiMessageFactory;
use Hfig\MAPI\OLE\Pear\DocumentFactory;

// Solo el nombre del archivo, sin rutas (evita ../)
$archivo = isset($_GET['archivo']) ? basename((string) $_GET['archivo']) : '';
if ($archivo === '' || strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) !== 'msg') {
	http_response_code(400);
	exit('ARCHIVO NO VÁLIDO');
}

$ruta = __DIR__.'/includes/archivos/'.$archivo;
if (!is_file($ruta)) {
	http_response_code(404);
	exit('ARCHIVO NO ENCONTRADO');
}

function h($texto) {
	return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

$error = '';
$asunto = $remitente = $cuerpoTexto = $cuerpoHtml = '';
$destinatarios = array();
$adjuntos = array();

try {
	$messageFactory  = new MapiMessageFactory();
	$documentFactory = new DocumentFactory();
	$ole     = $documentFactory->createFromFile($ruta);
	$mensaje = $messageFactory->parseMessage($ole);

	$asunto      = isset($mensaje->properties['subject']) ? $mensaje->properties['subject'] : '';
	$remitente   = (string) $mensaje->getSender();
	$cuerpoTexto = (string) $mensaje->getBody();
	$cuerpoHtml  = (string) $mensaje->getBodyHTML();

	foreach ($mensaje->getRecipients() as $destinatario) {
		$destinatarios[] = $destinatario->getName().' <'.$destinatario->getEmail().'>';
	}
	foreach ($mensaje->getAttachments() as $adjunto) {
		$adjuntos[] = $adjunto->getFilename();
	}
} catch (Exception $e) {
	$error = 'No fue posible leer el archivo .msg: '.$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ver correo — <?php echo h($archivo); ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
	<div class="card shadow-sm">
		<div class="card-header"><strong>CORREO (.msg)</strong></div>
		<div class="card-body">
		<?php if ($error !== '') { ?>
			<div class="alert alert-danger"><?php echo h($error); ?></div>
		<?php } else { ?>
			<p class="mb-1"><strong>ASUNTO:</strong> <?php echo h($asunto); ?></p>
			<p class="mb-1"><strong>DE:</strong> <?php echo h($remitente); ?></p>
			<p class="mb-1"><strong>PARA:</strong> <?php echo h(implode('; ', $destinatarios)); ?></p>
			<?php if (count($adjuntos) > 0) { ?>
				<p class="mb-1"><strong>ADJUNTOS:</strong> <?php echo h(implode(', ', $adjuntos)); ?></p>
			<?php } ?>
			<hr>
			<?php if (trim($cuerpoHtml) !== '') { ?>
				<!-- sandbox sin permisos: no ejecuta scripts del correo -->
				<iframe sandbox="" srcdoc="<?php echo h($cuerpoHtml); ?>" style="width:100%;height:600px;border:1px solid #dee2e6;background:#fff;"></iframe>
			<?php } else { ?>
				<div style="white-space:pre-wrap;"><?php echo h($cuerpoTexto); ?></div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
</div>
</body>
</html>