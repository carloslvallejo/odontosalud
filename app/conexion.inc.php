<?php
// Conexion a la base de datos funcion abrir y cerrar
    class Conexion {

        private static $conn;

        public static function open_conex(){
            if(!isset(self::$conn)) {
                try {
                    include_once 'config.inc.php';
                    self::$conn = new PDO('pgsql:host='.servername.';port=5432;dbname='.dbname.';user='.dbuser.';password='.dbpwd.'');
                    self::$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conn -> exec("SET NAMES 'UTF8'");
                } catch (PDOException $ex) {
                    echo "ERROR FATAL: " . $ex -> getMessage();
                }
            }
        }
        public static function close_conex(){
            if(isset(self::$conn)){
                return self::$conn = null;
            }
        }
        public static function get_conex(){
            return self::$conn;
        }
    }
?>