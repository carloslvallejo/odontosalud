<?php
include_once 'conexion.inc.php';
class ValidarRegistro{

    private $alert_i;
    private $alert_c;
    private $username;
    private $correo;
    private $pwd;

    private $errorUsername;
    private $errorPwd;
    private $errorPwd2;
    private $errorCorreo;

    public function __construct($username, $pwd1, $pwd2, $correo, $conn) {
        $this -> alert_i = "<br><div class='alert alert-danger' role='alert'>";
        $this -> alert_c = "</div>";
        $this -> username = "";
        $this -> correo = "";
        $this -> pwd = "";

        $this -> errorUsername = $this -> validarUsername($conn, $username);
        $this -> errorPwd = $this -> validarPwd($pwd1);
        $this -> errorPwd2 = $this -> validarPwd2($pwd1, $pwd2);
        $this -> errorCorreo = $this -> validarCorreo($conn, $correo);

        if($this->errorPwd==="" && $this->errorPwd2===""){
            $this -> pwd = $pwd1; 
        }
    }
    private function varInic($var) {
        if(isset($var) && !empty($var)){
            return true;
        } else {
            return false;
        }
    }
    private function validarUsername($conn, $username) {
        if(!$this->varInic($username)){
            return "Ingrese nombre de usuario";
        } else {
            $this -> username=$username;
        }
        if(strlen($username)<6 || strlen($username>25)){
            return "el nombre no cumple con los requisitos";
        }
        if(RepositorioUser::userExist($conn, $username)) {
            return "Usuario ya existe";
        }
        return "";
    }   
    private function validarPwd($pwd1) {
        if(!$this -> varInic($pwd1)) {
            return "Ingrese la contraseña";
        }
        if(strlen($pwd1)<6 || strlen($pwd1)>25){
            return "La contraseña no cumple con los requisitos";
        }
        if($this->username===$pwd1){
            return "la contraseña debe ser diferente al nombre de usuario";
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
    private function validarCorreo($conn, $correo) {
        if(!$this->varInic($correo)){
            return "Ingrese un correo Por favor";
        } else {
            $this -> correo=$correo;
        }
        if(RepositorioUser::correoExist($conn, $correo)) {
           return "Correo ya existe";
        }
        return "";
    }
    public function getUsername(){
        return $this-> username;
    }
    public function getCorreo(){
        return $this-> correo;
    }
    public function getPwd(){
        return $this-> pwd;
    }
    public function getErrorUsername(){
        return $this-> errorUsername;
    }
    public function getErrorPwd(){
        return $this-> errorPwd;
    }
    public function getErrorPwd2(){
        return $this-> errorPwd2;
    }
    public function getErrorCorreo(){
        return $this-> errorCorreo;
    }
    public function registroValido(){
        if($this -> errorUsername === "" && $this -> errorCorreo === "" && $this -> errorPwd === "" && $this-> errorPwd2 === ""){
            return true;
        } else {
            return false;
        }
    }
    public function setUsername(){
        if ($this -> username !== ""){
            echo 'value="'. $this -> username .'"';
        }
    }
    public function setErrorUsername(){
        if ($this -> errorUsername !== ""){
            echo $this -> alert_i . $this -> errorUsername . $this -> alert_c;
        }
    }
    public function setCorreo(){
        if ($this -> correo !== ""){
            echo 'value="'. $this -> correo .'"';
        }
    }
    public function setErrorCorreo(){
        if ($this -> errorCorreo !== ""){
            echo $this -> alert_i . $this -> errorCorreo . $this -> alert_c;
        }
    }
    public function setErrorPwd(){
        if ($this -> errorPwd !== ""){
            echo $this -> alert_i . $this -> errorPwd . $this -> alert_c;
        }
    }
    public function setErrorPwd2(){
        if ($this -> errorPwd2 !== ""){
            echo $this -> alert_i . $this -> errorPwd2 . $this -> alert_c;
        }
    }
}
?>