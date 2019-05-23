<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/perfil.inc.php';

class RepositorioPerfil { 
    public static function insertar_perfil($conn, $perfil) {
        $insertperfil = false;
        if(isset($conn)){
            try {
                $sql = "INSERT INTO perfil (idusuario, nombre, nombredos, apellido, apellidodos, edad, sexo) VALUES (:idusuario, :nombre, :nombredos, :apellido :apellidodos, :edad, :sexo)";

                $sentencia = $conn -> prepare($sql);

                $idusuario = $perfil -> getIdUsuario();
                $nombre = $perfil -> getNombre();
                $nombredos = $perfil -> getNombreDos();
                $apellido = $perfil -> getApellido();
                $apellidodos = $perfil -> getApellidosDos();
                $edad = $perfil -> getEdad();
                $sexo = $perfil -> getSexo();

                $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombredos', $nombredos, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellidodos', $apellidodos, PDO::PARAM_STR);
                $sentencia -> bindParam(':edad', $edad, PDO::PARAM_STR);
                $sentencia -> bindParam(':sexo', $sexo, PDO::PARAM_STR);
                

                $insertperfil = $sentencia -> execute();

            } catch (PDOException $ex) {
                echo "ERROR: ". $ex -> getMessage();
            }
        }
        return $insertperfil;
    }
}
?>