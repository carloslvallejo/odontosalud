<?php 
    class Entradas {
        private $id;
        private $idautor;
        private $titulo;
        private $texto;
        private $fecha;
        private $estado;
        private $url;

        public function __construct($id, $idautor, $url, $titulo, $texto, $fecha, $estado) {
            $this -> id = $id;
            $this -> idautor = $idautor;
            $this -> titulo = $titulo;
            $this -> url = $url;
            $this -> texto = $texto;
            $this -> fecha = $fecha;
            $this -> estado = $estado;
        }

        // GETTERS
        public function getId() {
            return $this -> id;
        }
        public function getIdAutor() {
            return $this -> idautor;
        }
        public function getUrl() {
            return $this -> url;
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
        public function getEstado() {
            return $this -> estado;
        }
        // SETTERS
        public function setUrl($url) {
            return $this -> url = $url;
        }
        public function setTitulo($titulo) {
            return $this -> titulo = $titulo;
        }
        public function setTexto($texto) {
            return $this -> texto = $texto;
        }
        public function setEstado($estado) {
            return $this -> estado = $estado;
        }
    }
?>