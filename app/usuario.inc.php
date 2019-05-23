<?php
    class Usuario {
        private $iduser;
        private $username;
        private $pwd;
        private $estado;
        private $correo;

        public function __construct($iduser, $username, $pwd, $correo, $estado) {
            $this -> iduser = $iduser;
            $this -> username = $username;
            $this -> pwd = $pwd;
            $this -> estado = $estado;
            $this -> correo = $correo;
            
        }
        // GETTERS
        public function getIduser() {
            return $this -> iduser;
        }
        public function getUsername() {
            return $this -> username;
        }
        public function getPwd() {
            return $this -> pwd;
        }
        public function getCorreo() {
            return $this -> correo;
        }
        public function getEstado() {
            return $this -> estado;
        }
        // SETTERS
        public function setIduser($iduser) {
            return $this -> iduser = $iduser;
        }
        public function setUsername($username) {
            return $this -> username = $username;
        }
        public function setPwd($pwd) {
            return $this -> pwd = $pwd;
        }
        public function setCorreo($correo) {
            return $this -> correo = $correo;
        }
        public function setEstado($estado) {
            return $this -> estado = $estado;
        }
    }
?>