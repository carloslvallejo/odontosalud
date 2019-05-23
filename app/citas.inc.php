<?php 
    class Citas {
        private $id;
        private $idusuario;
        private $motivo;
        private $hora;
        private $fecha;
        private $texto;

        public function __construct($id, $idusuario, $motivo, $hora, $fecha, $texto) {
            $this -> id = $id;
            $this -> idusuario = $idusuario;
            $this -> motivo = $motivo;
            $this -> hora = $hora;
            $this -> fecha = $fecha;
            $this -> texto = $texto;
        }

        // GETTERS
        public function getId() {
            return $this -> id;
        }
        public function getIdUsuario() {
            return $this -> idusuario;
        }
        public function getMotivo() {
            return $this -> motivo;
        }
        public function getTexto() {
            return $this -> texto;
        }
        public function getFecha() {
            return $this -> fecha;
        }
        public function getHora() {
            return $this -> hora;
        }
        // SETTERS
        public function setMotivo($motivo) {
            return $this -> motivo = $motivo;
        }
        public function setTexto($texto) {
            return $this -> texto = $texto;
        }
        public function setFecha($fecha) {
            return $this -> fecha = $fecha;
        }
        public function setHora($hora) {
            return $this -> hora = $hora;
        }
    }
?>