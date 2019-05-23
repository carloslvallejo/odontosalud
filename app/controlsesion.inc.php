<?php 
    class ControlSesion {

        public static function open_sec($idusuario, $username){
            if(session_id() == '') {
                session_start();
            }
            $_SESSION['idusuario'] = $idusuario;
            $_SESSION['username'] = $username;
            
        }
        
        public static function close_sec(){
            if(session_id() == '') {
                session_start();
            }
            if(isset($_SESSION['idusuario'])) {
                unset($_SESSION['idusuario']);
            }
            if(isset($_SESSION['username'])) {
                unset($_SESSION['username']);
            }
            session_destroy();
        }

        public static function sec_ini(){
            if(session_id() == '') {
                session_start();
            }
            if(isset($_SESSION['idusuario']) && isset($_SESSION['username'])) {
                return true;
            } else {
                return false;
            }
        }
    }
?>