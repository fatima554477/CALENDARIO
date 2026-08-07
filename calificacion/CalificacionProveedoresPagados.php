<?php
 
/**
 * Consultas del listado de proveedores con pagos y de su calificacion actual.
 *
 * La relacion existente es:
 * 02SUBETUFACTURA.idRelacion -> 02usuarios.id -> 02direccionproveedor1.idRelacion
 * y 02CALIFICACION.idRelacion -> 02usuarios.id.
 */
class CalificacionProveedoresPagados
{
    private $conexion;
 
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
 
    private function obtenerNumeroEvento($eventoId)
    {
        $eventoId = (int) $eventoId;
        if ($eventoId < 1) {
            return null;
        }
 
        $resultado = mysqli_query(
            $this->conexion,
            "SELECT NUMERO_EVENTO FROM 04altaeventos WHERE id = " . $eventoId . " LIMIT 1"
        );
        $evento = $resultado ? mysqli_fetch_assoc($resultado) : null;
 
        return $evento && isset($evento['NUMERO_EVENTO'])
            ? $evento['NUMERO_EVENTO']
            : null;
    }
 
    public function listar($eventoId)
    {
        $numeroEvento = $this->obtenerNumeroEvento($eventoId);
        if ($numeroEvento === null || $numeroEvento === '') {
            return false;
        }
        $numeroEvento = mysqli_real_escape_string($this->conexion, $numeroEvento);
 
        $sql = "SELECT proveedor.id AS proveedor_id,
                       datos.P_NOMBRE_COMERCIAL_EMPRESA AS nombre_comercial,
                       datos.P_NOMBRE_FISCAL_RS_EMPRESA AS nombre_fiscal,
                       calificacion.id AS calificacion_id,
                       calificacion.ADJUNTO_CALIFICACION AS calificacion_actual,
                       calificacion.OBSERVACIONES_CALIFICACION AS observaciones,
                       calificacion.FECHA_CALIFICACION AS fecha_carga
                FROM 02usuarios AS proveedor
                INNER JOIN (
                    SELECT DISTINCT idRelacion
                    FROM 02SUBETUFACTURA
                    WHERE idRelacion IS NOT NULL
                      AND idRelacion > 0
                      AND NUMERO_EVENTO = '" . $numeroEvento . "'
                ) AS pago ON pago.idRelacion = proveedor.id
                LEFT JOIN (
                    SELECT idRelacion,
                           MAX(P_NOMBRE_COMERCIAL_EMPRESA) AS P_NOMBRE_COMERCIAL_EMPRESA,
                           MAX(P_NOMBRE_FISCAL_RS_EMPRESA) AS P_NOMBRE_FISCAL_RS_EMPRESA
                    FROM 02direccionproveedor1
                    GROUP BY idRelacion
                ) AS datos
                       ON datos.idRelacion = proveedor.id
                LEFT JOIN 02CALIFICACION AS calificacion
                       ON calificacion.id = (
                           SELECT MAX(calificacion_actual.id)
                           FROM 02CALIFICACION AS calificacion_actual
                           WHERE calificacion_actual.idRelacion = proveedor.id
                       )
                ORDER BY datos.P_NOMBRE_COMERCIAL_EMPRESA ASC,
                         datos.P_NOMBRE_FISCAL_RS_EMPRESA ASC,
                         proveedor.id ASC";
 
        return mysqli_query($this->conexion, $sql);
    }
 
    public function obtenerProveedor($proveedorId, $eventoId)
    {
        $numeroEvento = $this->obtenerNumeroEvento($eventoId);
        if ($numeroEvento === null || $numeroEvento === '') {
            return null;
        }
        $numeroEvento = mysqli_real_escape_string($this->conexion, $numeroEvento);
 
        $sql = "SELECT proveedor.id AS proveedor_id,
                       datos.P_NOMBRE_COMERCIAL_EMPRESA AS nombre_comercial,
                       datos.P_NOMBRE_FISCAL_RS_EMPRESA AS nombre_fiscal,
                       calificacion.id AS calificacion_id,
                       calificacion.DOCUMENTO_CALIFICACION,
                       calificacion.ADJUNTO_CALIFICACION,
                       calificacion.OBSERVACIONES_CALIFICACION,
                       calificacion.FECHA_CALIFICACION
                FROM 02usuarios AS proveedor
                INNER JOIN (
                    SELECT DISTINCT idRelacion
                    FROM 02SUBETUFACTURA
                    WHERE idRelacion IS NOT NULL
                      AND idRelacion > 0
                      AND NUMERO_EVENTO = '" . $numeroEvento . "'
                ) AS pago ON pago.idRelacion = proveedor.id
                LEFT JOIN (
                    SELECT idRelacion,
                           MAX(P_NOMBRE_COMERCIAL_EMPRESA) AS P_NOMBRE_COMERCIAL_EMPRESA,
                           MAX(P_NOMBRE_FISCAL_RS_EMPRESA) AS P_NOMBRE_FISCAL_RS_EMPRESA
                    FROM 02direccionproveedor1
                    GROUP BY idRelacion
                ) AS datos
                       ON datos.idRelacion = proveedor.id
                LEFT JOIN 02CALIFICACION AS calificacion
                       ON calificacion.id = (
                           SELECT MAX(calificacion_actual.id)
                           FROM 02CALIFICACION AS calificacion_actual
                           WHERE calificacion_actual.idRelacion = proveedor.id
                       )
                WHERE proveedor.id = ?
                LIMIT 1";
 
        $sentencia = mysqli_prepare($this->conexion, $sql);
        if (!$sentencia) {
            return null;
        }
 
        mysqli_stmt_bind_param($sentencia, 'i', $proveedorId);
        mysqli_stmt_execute($sentencia);

        // NOTA: se usa bind_result + fetch en lugar de mysqli_stmt_get_result()
        // porque el servidor no tiene el driver mysqlnd habilitado, y esa
        // funcion requiere mysqlnd para funcionar.
        mysqli_stmt_bind_result(
            $sentencia,
            $proveedorIdResultado,
            $nombreComercial,
            $nombreFiscal,
            $calificacionId,
            $documentoCalificacion,
            $adjuntoCalificacion,
            $observacionesCalificacion,
            $fechaCalificacion
        );

        $proveedor = null;
        if (mysqli_stmt_fetch($sentencia)) {
            $proveedor = array(
                'proveedor_id' => $proveedorIdResultado,
                'nombre_comercial' => $nombreComercial,
                'nombre_fiscal' => $nombreFiscal,
                'calificacion_id' => $calificacionId,
                'DOCUMENTO_CALIFICACION' => $documentoCalificacion,
                'ADJUNTO_CALIFICACION' => $adjuntoCalificacion,
                'OBSERVACIONES_CALIFICACION' => $observacionesCalificacion,
                'FECHA_CALIFICACION' => $fechaCalificacion,
            );
        }

        mysqli_stmt_close($sentencia);
 
        return $proveedor;
    }
 
    public function guardar($proveedorId, $eventoId, $motivo, $calificacion, $observaciones, $fecha)
    {
        $proveedor = $this->obtenerProveedor($proveedorId, $eventoId);
        if (!$proveedor) {
            return false;
        }
 
        if (!empty($proveedor['calificacion_id'])) {
            $sql = "UPDATE 02CALIFICACION
                    SET DOCUMENTO_CALIFICACION = ?,
                        ADJUNTO_CALIFICACION = ?,
                        OBSERVACIONES_CALIFICACION = ?,
                        FECHA_CALIFICACION = ?
                    WHERE id = ? AND idRelacion = ?";
            $sentencia = mysqli_prepare($this->conexion, $sql);
            if (!$sentencia) {
                return false;
            }
            $calificacionId = (int) $proveedor['calificacion_id'];
            mysqli_stmt_bind_param(
                $sentencia,
                'sissii',
                $motivo,
                $calificacion,
                $observaciones,
                $fecha,
                $calificacionId,
                $proveedorId
            );
        } else {
            $sql = "INSERT INTO 02CALIFICACION
                        (DOCUMENTO_CALIFICACION, ADJUNTO_CALIFICACION,
                         OBSERVACIONES_CALIFICACION, FECHA_CALIFICACION,
                         hCALIFICACION, idRelacion)
                    VALUES (?, ?, ?, ?, 'hCALIFICACION', ?)";
            $sentencia = mysqli_prepare($this->conexion, $sql);
            if (!$sentencia) {
                return false;
            }
            mysqli_stmt_bind_param(
                $sentencia,
                'sissi',
                $motivo,
                $calificacion,
                $observaciones,
                $fecha,
                $proveedorId
            );
        }
 
        $guardado = mysqli_stmt_execute($sentencia);
        mysqli_stmt_close($sentencia);
 
        return $guardado;
    }
}
