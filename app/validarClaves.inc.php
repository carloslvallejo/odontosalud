<?php
include_once 'app/repoUser.inc.php';
class ValidarClaves {
    
    private $alert_i;
    private $alert_c;

    private $user;
    private $pwd;

    private $errorPwd;
    private $errorPwd2;

    public function __construct($username, $pwd, $pwd2, $pwd3, $conn) {
        $this -> alert_i = "<br><div class='alert alert-danger' role='alert'>";
        $this -> alert_c = "</div>";
        
        $this -> user = RepositorioUser::getUsuario($conn, $username);

        $this -> errorPwd = $this -> validarPwd($pwd, $this -> user -> getIduser());
        $this -> errorPwd2 = $this -> validarPwd2($pwd2, $pwd3);
        
        if($this -> errorPwd === "" && $this -> errorPwd2 === "") {
            $this -> pwd = $pwd2;
        }
    }
    private function varInic($var){
        if(isset($var) && !empty($var)){
            return true;
        } else {
            return false;
        }
    }
    private function validarPwd($pwd) {
        if(!$this -> varInic($pwd)) {
            return "Ingrese la contraseña";
        }
        if(strlen($pwd)<6 || strlen($pwd)>25){
            return "La contraseña no cumple con los requisitos";
        }
        if(!password_verify($pwd, $this -> user -> getPwd())){
            return "Contraseñas no coinciden";
        }
        return "";
    }
    private function validarPwd2($pwd1, $pwd2) {
        if(!$this->varInic($pwd1) || !$this->varInic($pwd2)){
            return "ingrese la contraseña";
        }
        if($pwd1 != $pwd2) {
            return "Las contraseñas deben coincidir";
        }
        return "";
    }
    public function getPwd() {
        return $this -> pwd;
    }
    public function getError(){
        return $this -> errorPwd;
    }
    public function getError2(){
        return $this -> errorPwd2;
    }
    public function setError(){
        if($this -> errorPwd !== '') {
            echo $this -> alert_i . $this -> errorPwd . $this -> alert_c;
        }
    }
    public function setError2(){
        if($this -> errorPwd2 !== '') {
            echo $this -> alert_i . $this -> errorPwd2 . $this -> alert_c;
        }
    }
    public function cambioExistoso() {
        if($this -> errorPwd === "" && $this -> errorPwd2 === "") {
            return true;
        } else {
            return false;
        }
    }
}