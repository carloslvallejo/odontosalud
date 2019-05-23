<?php
    include_once 'repoUser.inc.php';
    class ValidarLogin {

        private $aviso_i;
        private $aviso_c;
        private $user;
        private $error;

        public function __construct($username, $pwd, $conn) {

            $this -> aviso_i = "<br><div class='alert alert-danger' role='alert'>";
            $this -> aviso_c = "</div><br>";
            $this -> error = '';
            if(!$this -> varInic($username) || !$this -> varInic($pwd)){
                $this -> user = null;
                $this -> error = "Debes ingresar usuario y clave";
            }
            else {
                $this -> user = RepositorioUser::getUsuario($conn, $username);
                if(is_null($this -> user) || !password_verify($pwd, $this -> user -> getPwd())){
                    $this -> error = "Datos incorrectos";
                }
            }
        }
        private function varInic($var){
            if(isset($var) && !empty($var)){
                return true;
            } else {
                return false;
            }
        }
        public function getUsuario(){
            return $this -> user;
        }
        public function getError(){
            return $this -> error;
        }
        public function setError(){
            if($this -> error !== '') {
                echo $this -> aviso_i . $this -> error . $this -> aviso_c;
            }
        }
    }
?>

