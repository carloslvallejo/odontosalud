<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/perfil.inc.php';

class RepositorioPerfil { 
    public static function insertar_perfil($conn, $perfil) {
        $insertperfil = false;
        if(isset($conn)){
            try {
                $sql = "INSERT INTO perfil (idusuario, nombre, nombredos, apellido, apellidodos, edad, sexo, foto) 
                    VALUES (:idusuario, :nombre, :nombredos, :apellido :apellidodos, :edad, :sexo, :foto)";

                $sentencia = $conn -> prepare($sql);

                $idusuario = $perfil -> getIdUsuario();
                $nombre = $perfil -> getNombre();
                $nombredos = $perfil -> getNombreDos();
                $apellido = $perfil -> getApellido();
                $apellidodos = $perfil -> getApellidosDos();
                $edad = $perfil -> getEdad();
                $sexo = $perfil -> getSexo();
                $foto = $perfil -> getFoto();

                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombredos', $nombredos, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellidodos', $apellidodos, PDO::PARAM_STR);
                $sentencia -> bindParam(':edad', $edad, PDO::PARAM_STR);
                $sentencia -> bindParam(':sexo', $sexo, PDO::PARAM_STR);
                $sentencia -> bindParam(':foto', $foto, PDO::PARAM_STR);
                

                $insertperfil = $sentencia -> execute();

            } catch (PDOException $ex) {
                echo "ERROR: ". $ex -> getMessage();
            }
        }
        return $insertperfil;
    }
    public static function obtener_perfil($conn, $idusuario) {
        $perfil = null;
        if(isset($conn)) {
            try {
                $sql = "SELECT * FROM perfil WHERE idusuario = :idusuario";
                $sentencia = $conn -> prepare($sql);
                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $perfil = new Perfil($resultado['id'], $resultado['idusuario'], $resultado['nombre'], $resultado['nombredos'],
                        $resultado['apellido'], $resultado['apellidodos'], $resultado['edad'], $resultado['sexo'], $resultado['foto']);
                }
            } catch (PDOException $th) {
                echo "ERROR: " .  $th -> getMessage();
            }
        }
        return $perfil;
    }
    public static function modificar_perfil($conn, $perfil) {
        $updateExisto = false;
        if(isset($conn)) {
            try {
                $sql = "UPDATE perfil SET nombre=:nombre, nombredos=:nombredos, apellido=:apellido, apellidodos=:apellidodos, 
                    edad=:edad, sexo=:sexo WHERE idusuario = :idusuario";
                    
                $idusuario = $perfil -> getIdUsuario();
                $nombre = $perfil -> getNombre();
                $nombredos = $perfil -> getNombreDos();
                $apellido = $perfil -> getApellido();
                $apellidodos = $perfil -> getApellidosDos();
                $edad = $perfil -> getEdad();
                $sexo = $perfil -> getSexo();

                $sentencia = $conn -> prepare($sql);

                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombredos', $nombredos, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellidodos', $apellidodos, PDO::PARAM_STR);
                $sentencia -> bindParam(':edad', $edad, PDO::PARAM_STR);
                $sentencia -> bindParam(':sexo', $sexo, PDO::PARAM_STR);

                $updateExisto = $sentencia -> execute();
                
            } catch (PDOException $th) {
                echo "ERROR: " . $th -> getMessage();
            }
        }
        return $updateExisto;
    }
}
?>