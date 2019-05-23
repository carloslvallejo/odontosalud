<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/citas.inc.php';

class RepositorioCitas { 
    public static function insertar_citas($conn, $cita) {
        $insertcita = false;
        if(isset($conn)){
            try {
                $sql = "INSERT INTO cita (idusuario, fecha, hora, motivo, descripcion) VALUES (:idusuario, :fecha, :hora, :motivo, :descripcion)";

                $sentencia = $conn -> prepare($sql);

                $idusuario = $cita -> getIdUsuario();
                $fecha = $cita -> getFecha();
                $hora = $cita -> getHora();
                $motivo = $cita -> getMotivo();
                $descripcion = $cita -> getTexto();

                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR); //revisar el parametro de fecha
                $sentencia -> bindParam(':hora', $hora, PDO::PARAM_STR); //revisar el parametro de hora
                $sentencia -> bindParam(':motivo', $motivo, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

                $insertcita = $sentencia -> execute();

            } catch (PDOException $ex) {
                echo "ERROR: ". $ex -> getMessage();
            }
        }
        return $insertcita;
    }
}
?>