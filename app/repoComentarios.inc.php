<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/comentarios.inc.php';

class RepositorioComentario { 
    public static function insertar_comentario($conn, $comentario) {
        $insertcomentario = false;
        if(isset($conn)){
            try {
                $sql = "INSERT INTO comentarios (idautor, identrada, titulo, texto, fecha) VALUES (:idautor, :identrada, :titulo, :texto, NOW())";

                $sentencia = $conn -> prepare($sql);

                $idautor = $comentario -> getIdUsuario();
                $identrada = $comentario -> getIdEntrada();
                $titulo = $comentario -> getTitulo();
                $texto = $comentario -> getTexto();

                $sentencia -> bindParam(':idautor', $idautor, PDO::PARAM_STR);
                $sentencia -> bindParam(':identrada', $identrada, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);

                $insertcomentario = $sentencia -> execute();

            } catch (PDOException $ex) {
                echo "ERROR: ". $ex -> getMessage();
            }
        }
        return $insertcomentario;
    }
    public static function getall_comentarios($conn) {
        $comentarios = array();
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM comentarios";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> execute();
                $result = $sentencia -> fetchAll();

                if(count($result)) {
                    foreach($result as $fila) {
                        $comentarios[] = new Comentarios($fila['id'], $fila['idautor'], $fila['identrada'], 
                        $fila['titulo'], $fila['texto'], $fila['fecha']);
                    }
                }
            } catch (PDOException $th) {
                echo 'ERROR: ' . $th -> getMessage();
            }
        }
        return $comentarios;
    }
    public static function getComentarios_autor($conn, $idautor) {
        $comentarios = array();
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM comentarios WHERE idautor = :idautor ORDER BY fecha DESC";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':idautor', $idautor, PDO::PARAM_STR);
                $sentencia -> execute();
                $result = $sentencia -> fetchAll();

                if(count($result)) {
                    foreach($result as $fila) {
                        $comentarios[] = new Comentarios($fila['id'], $fila['idautor'], $fila['identrada'], 
                        $fila['titulo'], $fila['texto'], $fila['fecha']);
                    }
                }
            } catch (PDOException $th) {
                echo 'EEEERRROR: ' . $th -> getMessage();
            }
        }
        return $comentarios;
    }
    public static function getComentarios_entrada($conn, $identrada) {
        $comentarios = array();
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM comentarios WHERE identrada = :identrada";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':identrada', $identrada, PDO::PARAM_STR);
                $sentencia -> execute();
                $result = $sentencia -> fetchAll();
                if(count($result)) {
                    foreach($result as $fila) {
                        $comentarios[] = new Comentarios($fila['id'], $fila['idautor'], $fila['identrada'], 
                        $fila['titulo'], $fila['texto'], $fila['fecha']);
                    }
                }
            } catch(PDOException $th) {
                echo 'ERROR: ' . $th -> getMessage();
            }
        }
        return $comentarios;
    }
}
?>