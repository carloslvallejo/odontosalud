<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/entradas.inc.php';


    class RepositorioEntrada { 
        // insertar entrada nueva
        public static function insertar_entrada($conn, $entrada) {
            $insertentrada = false;
            if(isset($conn)){
                try {
                    $sql = "INSERT INTO entradas (idautor, url, titulo, texto, fecha, estado) 
                        VALUES (:idautor, :url, :titulo, :texto, NOW(), 0)";

                    $sentencia = $conn -> prepare($sql);

                    $idautor = $entrada -> getIdAutor();
                    $url = $entrada -> getUrl();
                    $titulo = $entrada -> getTitulo();
                    $texto = $entrada -> getTexto();

                    $sentencia -> bindParam(':idautor', $idautor, PDO::PARAM_STR);
                    $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                    $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);

                    $insertentrada = $sentencia -> execute();

                } catch (PDOException $ex) {
                    echo "ERROR: ". $ex -> getMessage();
                }
            }
            return $insertentrada;
        }
        // obtener 3 entradas por orden descendente
        public static function getEntradas($conn) {
            $arreglo = array();
            if(isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE estado = '0' ORDER BY fecha DESC LIMIT 3";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> execute();

                    $result = $sentencia -> fetchAll();
    
                    if(count($result)){
                        foreach($result as $fila) {
                            $arreglo[] = new Entradas($fila['id'], $fila['idautor'], $fila['url'], 
                            $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $ex) {
                    echo "ERROR: ". $ex->getMessage();
                    die();
                }
            }
            return $arreglo;
        }
        //obtener  las entradas por una url
        public static function getEntrada_url($conn, $url) {
            $entrada = null;
            if (isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE url = :url";
    
                    $sentencia = $conn -> prepare($sql);
    
                    $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                    $sentencia -> execute();
    
                    $result = $sentencia -> fetch();
    
                    if(!empty($result)) {
                        $entrada = new Entradas($result['id'], $result['idautor'], 
                            $result['url'], $result['titulo'], $result['texto'], $result['fecha'], $result['estado']);
                    }
                } catch (PDPException $th) {
                    echo "ERROR EN ENTRADA:" . $th -> getMessage();
                }
            }
            return $entrada;
        }
        // obtener entradas por titulo
        public static function getEntrada_titulo($conn, $titulo) {
            $entrada = null;
            if(isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE titulo = :titulo";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $result -> fetchAll();

                    if(count($result)) {
                        foreach($result as $fila) {
                            $entrada = new Entradas($fila['id'], $fila['idautor'], $fila['url'], $fila['titulo'], $fila['texto'],
                            $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $th) {
                    echo 'ERROR: ' . $th -> getMessage();
                }
            }
            return $entrada;
        }
        public static function titulo_existe($conn, $titulo) {
            $titulo_existe = true;
            if(isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE titulo = :titulo";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetchAll();

                    if(count($result)) {
                        $titulo_existe = true;
                    } else {
                        $titulo_existe = false;
                    }
                } catch (PDOException $th) {
                    echo 'ERROR: ' . $th -> getMessage();
                }
            }
            return $titulo_existe;
        }
        public static function url_existe($conn, $url) {
            $url_existe = true;
            if(isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE url = :url";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetchAll();

                    if(count($result)) {
                        $url_existe = true;
                    } else {
                        $url_existe = false;
                    }
                } catch (PDOException $th) {
                    echo 'ERROR: ' . $th -> getMessage();
                }
            }
            return $url_existe;
        }
        // obtener 5 entradas por orden aleatorio
        public static function getEntradas_random($conn) {
            $entrada = array();
            if (isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas ORDER BY random() limit 5";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> execute();

                    $result = $sentencia -> fetchAll();
                    if(count($result)) {
                        foreach ($result as $fila) {
                            $entrada[] = new Entradas($fila['id'], $fila['idautor'], 
                                $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $th) {
                    echo "ERROR RANDOM ENTRADAS: " . $th -> getMessage();
                }
            }
            return $entrada;
        }
        /*
        obtener todas las entradas ordenadas descendientemente con un limite de 5 y desplazando X numero
        */
        public static function getEntradas_all($conn, $inicio) {
            $entrada = array();
            if (isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas ORDER BY fecha DESC LIMIT 5 OFFSET :inicio";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':inicio', $inicio, PDO::PARAM_STR);
                    $sentencia -> execute();

                    $result = $sentencia -> fetchAll();
                    if(count($result)) {
                        foreach ($result as $fila) {
                            $entrada[] = new Entradas($fila['id'], $fila['idautor'], 
                                $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $th) {
                    echo "ERROR RANDOM ENTRADAS: " . $th -> getMessage();
                }
            }
            return $entrada;
        }
        /* obtener todas las entradas por fecha descendente */
        public static function get_all($conn) {
            $entrada = array();
            if (isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas ORDER BY fecha DESC";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> execute();

                    $result = $sentencia -> fetchAll();
                    if(count($result)) {
                        foreach ($result as $fila) {
                            $entrada[] = new Entradas($fila['id'], $fila['idautor'], 
                                $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $th) {
                    echo "ERROR RANDOM ENTRADAS: " . $th -> getMessage();
                }
            }
            return $entrada;
        }
        // obtener entradas por id del autor
        public static function getEntrada_autor($conn, $idautor) {
            $entrada = array();
            if(isset($conn)) {
                try {
                    $sql = "SELECT * FROM entradas WHERE idautor = :idautor ORDER BY fecha DESC";
                    $sentencia = $conn -> prepare($sql);

                    $sentencia -> bindParam(':idautor', $idautor, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetchAll();
                    if(count($result)) {
                        foreach($result as $fila) {
                            $entrada[] = new Entradas($fila['id'], $fila['idautor'], $fila['url'], 
                                $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['estado']);
                        }
                    }
                } catch (PDOException $th) {
                    echo 'ERROR: ' . $th -> getMessage();
                }
            }
            return $entrada;
        }
        // modificar datos de entradas
        public static function update_entradas($conn, $titulo, $texto, $idautor) {
            if(isset($conn)) {
                try {
                    $sql = "UPDATE entradas SET titulo = :titulo, texto = :texto, fecha = now() WHERE idautor = :idautor";

                    $sentencia = $conn -> prepare($sql);
                    
                    $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
                    $sentencia -> bindParam(':idautor', $idautor, PDO::PARAM_STR);

                    $sentencia -> execute();

                } catch (PDOException $th) {
                    echo 'ERROR UPDATE: ' . $th -> getMessage();
                }
            }
        }
        public static function cambiar_estado($conn, $id) {
            $newestado = false;
            if(isset($conn)) {
                try {
                    $sql = "UPDATE entradas SET estado = '1' WHERE id = :id";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $result = $sentencia -> fetch();

                    if(!empty($result)) {
                        $newestado = true;
                    } else {
                        $newestado = false;
                    }
                } catch (PDOException $th) {
                    echo 'ERROR AL CAMBIAR ESTADO: ' . $th -> getMessage();
                }
            }
            return $newestado;
        }
        /* borrar entrada
        public static function delete_entrada($conn, $titulo) {
            if(isset($conn)) {
                try {
                    $sql = "DELETE from entradas WHERE titulo = :titulo";
                    $sentencia = $conn -> prepare($sql);
                    $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $sentencia -> execute();

                } catch (PDOException $th) {
                    echo 'ERROR EN DELETE: ' . $th -> getMessage();
                }
            }
        }*/
        
    }
?>