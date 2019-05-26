<?php 
    class Perfil {
        private $id;
        private $idusuario;
        private $nombre;
        private $nombredos;
        private $apellido;
        private $apellidodos;
        private $edad;
        private $foto;

        public function __construct($id, $idusuario, $nombre, $nombredos, $apellido, $apellidodos, $edad, $sexo, $foto) {
            $this -> id = $id;
            $this -> idusuario = $idusuario;
            $this -> nombre = $nombre;
            $this -> nombredos = $nombredos;
            $this -> apellido = $apellido;
            $this -> apellidodos = $apellidodos;
            $this -> edad = $edad;
            $this -> sexo = $sexo;
            $this -> foto = $foto;
        }

        // GETTERS
        public function getId() {
            return $this -> id;
        }
        public function getIdUsuario() {
            return $this -> idusuario;
        }
        public function getNombre() {
            return $this -> nombre;
        }
        public function getNombreDos() {
            return $this -> nombredos;
        }
        public function getApellido() {
            return $this -> apellido;
        }
        public function getApellidoDos() {
            return $this -> apellidodos;
        }
        public function getEdad() {
            return $this -> edad;
        }
        public function getSexo() {
            return $this -> sexo;
        }
        public function getFoto() {
            return $this -> foto;
        }
        // SETTERS
        public function setNombre($nombre) {
            return $this -> nombre = $nombre;
        }
        public function setNombreDos($nombredos) {
            return $this -> nombredos = $nombredos;
        }
        public function setApellido($apellido) {
            return $this -> apellido = $apellido;
        }
        public function setApellidoDos($apellidodos) {
            return $this -> apellidodos = $apellidodos;
        }
        public function setEdad($edad) {
            return $this -> edad = $edad;
        }
        public function setSexo($sexo) {
            return $this -> sexo = $sexo;
        }
        public function setFoto($foto) {
            return $this -> foto = $foto;
        }
    }
?>