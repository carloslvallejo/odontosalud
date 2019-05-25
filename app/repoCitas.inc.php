<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/citas.inc.php';

class RepositorioCitas { 
    // INSERTAR CITAS EN LA BASE DE DATOS
    public static function insertar_citas($conn, $cita) {
        $insertcita = false;
        if(isset($conn)){
            try {
                $sql = "INSERT INTO cita (idusuario, fecha, motivo, descripcion, hora) VALUES (:idusuario, :fecha, :motivo, :descripcion, :hora)";

                $sentencia = $conn -> prepare($sql);

                $idusuario = $cita -> getIdUsuario();
                $fecha = $cita -> getFecha();
                $hora = $cita -> getHora();
                $motivo = $cita -> getMotivo();
                $descripcion = $cita -> getTexto();

                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia -> bindParam(':hora', $hora, PDO::PARAM_STR);
                $sentencia -> bindParam(':motivo', $motivo, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

                $insertcita = $sentencia -> execute();

            } catch (PDOException $ex) {
                echo "ERROR: ". $ex -> getMessage();
            }
        }
        return $insertcita;
    }
    // BUSCAR CITA DE UN USUARIO EN UNA FECHA ESPECIFICA
    public static function cita_usuario_fecha($conn, $idusuario, $fecha) {
        $userCita = false;
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM cita WHERE idusuario = :idusuario and fecha = :fecha";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();
                if(count($resultado)) {
                    $userCita = true;
                } else {
                    $userCita = false;
                }
            } catch (PDOException $th) {
                echo "ERROR: " . $th -> getMessage();
            }
        }
        return $userCita;
    }
    // BUSCAR CITA EN UNA FECHA Y HORA ESPECIFICA
    public static function cita_fecha_hora($conn, $fecha, $hora) {
        $citaExiste = false;
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM cita WHERE fecha = :fecha and hora = :hora";

                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia -> bindParam(':hora', $hora, PDO::PARAM_STR);

                $sentencia -> execute();

                $resultado = $sentencia -> fetchAll();
                if(count($resultado)) {
                    $citaExiste = true;
                } else {
                    $citaExiste = false;
                }
            } catch (PDOException $th) {
                echo "ERROR: " . $th -> getMessage();
            }
        }
        return $citaExiste;
    }
    // OBTENER TODAS LAS CITAS DE LA BASE DE DATOS
    public static function obtener_citas($conn) {
        $citas = arrray();
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM cita ORDER BY fecha DESC";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)) {
                    foreach($resultado as $fila) {
                        $citas[] = new Citas($fila['id'], $fila['idusuario'], $fila['fecha'], $fila['motivo'], 
                            $fila['descripcion'], $fila['hora']);
                    }
                }
            } catch (PDOException $th) {
                echo "ERROR: " . $th -> getMessage();
            }
        }
        return $citas;
    }
    // OBTENER TODAS LAS CITAS DE UN USUARIO EN ESPECIFICO
    public static function obtener_cita_usuario($conn, $idusuario) {
        $cita = array();
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM cita WHERE idusuario = :idusuario ORDER BY fecha DESC";

                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if(count($resultado)) {
                    foreach($resultado as $fila) {
                        $cita[] = new Citas($fila['id'], $fila['idusuario'], $fila['fecha'], $fila['motivo'], 
                            $fila['descripcion'], $fila['hora']);
                    }
                }
            } catch (PDOException $th) {
                echo "ERROR: " . $th -> getMessage();
            }
        }
        return $cita;
    }
}
?>