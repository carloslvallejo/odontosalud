<?php 
    class Comentarios {
        private $id;
        private $idusuario;
        private $identrada;
        private $titulo;
        private $texto;
        private $fecha;

        public function __construct($id, $idusuario, $identrada, $titulo, $texto, $fecha) {
            $this -> id = $id;
            $this -> idusuario = $idusuario;
            $this -> identrada = $identrada;
            $this -> titulo = $titulo;
            $this -> texto = $texto;
            $this -> fecha = $fecha;
        }

        // GETTERS
        public function getId() {
            return $this -> id;
        }
        public function getIdUsuario() {
            return $this -> idusuario;
        }
        public function getIdEntrada() {
            return $this -> identrada;
        }
        public function getTitulo() {
            return $this -> titulo;
        }
        public function getTexto() {
            return $this -> texto;
        }
        public function getFecha() {
            return $this -> fecha;
        }
        // SETTERS
        public function setTitulo($titulo) {
            return $this -> titulo = $titulo;
        }
        public function setTexto($texto) {
            return $this -> texto = $texto;
        }
    }
?>