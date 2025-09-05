<?php
if (!isset($_SESSION)) {
    session_start();
}

define('__ROOT__', dirname(__FILE__));
require_once __ROOT__ . '/class.epcinnAE.php';

$conexion = new accesoclase();
$con = $conexion->db();

$query = "SELECT COUNT(*) AS total,
                 SUM(CASE WHEN STATUS_CHECKBOX = 'si' THEN 1 ELSE 0 END) AS checked,
                 SUM(CASE WHEN STATUS_CHECKBOX = 'no' THEN 1 ELSE 0 END) AS unchecked
          FROM 02SUBETUFACTURA";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$checksum = $row['total'] . '-' . $row['checked'] . '-' . $row['unchecked'];

header('Content-Type: application/json');
echo json_encode(['checksum' => $checksum]);
?>