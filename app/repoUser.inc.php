<?php
    class RepositorioUser {

        public static function insertar_datos($conn, $usuario) {
            $userValido = false;
            if(isset($conn)){
                try {
                    $sql = "INSERT INTO usuario(username, pwd, correo, estado) VALUES (:username, :pwd, :correo, 0)";

                    $sentencia = $conn -> prepare($sql);

                    $username = $usuario -> getUsername();
                    $pwd = $usuario -> getPwd();
                    $correo = $usuario -> getCorreo();

                    $sentencia -> bindParam(':username', $username, PDO::PARAM_STR);
                    $sentencia -> bindParam(':pwd', $pwd, PDO::PARAM_STR);
                    $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);

                    $userValido = $sentencia -> execute();

                } catch (PDOException $ex) {
                    echo "ERROR: ". $ex -> getMessage();
                }
            }
            return $userValido;
        }
        public static function userExist($conn, $username) {
            $userExiste = true;
            if(isset($conn)){
                try {
                    $sql = "SELECT * FROM usuario WHERE username = :username";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':username', $username, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetchAll();

                    if(count($result)) {
                        $userExiste = true;
                    } else {
                        $userExiste = false;
                    }
                } catch (PDOException $ex) {
                    echo "ERROR: ". $ex -> getMessage();
                }
            }
            return $userExiste;
        }
        public static function correoExist($conn, $correo) {
            $correoExiste = true;
            if(isset($conn)){
                try {
                    $sql = "SELECT * FROM usuario WHERE correo = :correo";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetchAll();

                    if(count($result)) {
                        $correoExiste = true;
                    } else {
                        $correoExiste = false;
                    }
                } catch (PDOException $ex) {
                    echo "ERROR: " . $ex -> getMessage();
                }
            }
            return $correoExiste;
        }
        public static function getUsuario($conn, $username){
            $usuario = null;
            if(isset($conn)){
                try {
                    include_once 'usuario.inc.php';
                    $sql = "SELECT * FROM usuario WHERE username = :username";
                    $sentencia = $conn->prepare($sql);
                    $sentencia->bindParam(':username', $username, PDO::PARAM_STR);
                    $sentencia->execute();
                    $result = $sentencia->fetch();
    
                    if(!empty($result)) {
                        $usuario = new Usuario($result['idusuario'], $result['username'], 
                            $result['pwd'], $result['correo'], $result['estado']);
                    } 
                } catch (PDOException $ex) {
                    echo "ERROR: ". $ex->getMessage();
                    die();
                }
            }
            return $usuario;
        }
        public static function getUsuario_id($conn, $idusuario){
            $usuario = null;
            if(isset($conn)) {
                try {
                    include_once 'usuario.inc.php';
                    $sql = "SELECT * FROM usuario WHERE idusuario = :idusuario";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
                    $sentencia -> execute();

                    $result = $sentencia -> fetch();

                    if(!empty($result)) {
                        $usuario = new Usuario($result['idusuario'], $result['username'], 
                            $result['pwd'], $result['correo'], $result['estado']);
                    }
                } catch (PDOException $th) {
                    echo "ERROR DE USUARIO: " . $th -> getMessage();
                }
            }
            return $usuario;
        }
        public static function getUsuario_correo($conn, $correo) {
            $usuario = null;
            if(isset($conn)) {
                try {
                    include_once 'usuario.inc.php';
                    $sql = "SELECT * FROM usuario WHERE correo = :correo";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                    $sentencia -> execute();

                    $result = $sentencia -> fetch();
                    if(!empty($result)) {
                        $usuario = new Usuario($result['iduser'], $result['username'], 
                            $result['pwd'], $result['correo'], $result['estado']);
                    }
                } catch (PDOException $th) {
                    echo 'ERROR RECUPERANDO DATOS: ' . $th -> getMessage();
                }
            }
            return $usuario;
        }
    }
?>