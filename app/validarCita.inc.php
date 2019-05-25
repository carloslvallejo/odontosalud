<?php

include_once 'conexion.inc.php';
include_once 'repoCitas.inc.php';

class ValidarCita {

    private $alert_i;
    private $alert_c;
    private $hora;
    private $fecha;
    private $idusuario;
    private $errorCita;
    private $errorMotivo;
    private $motivo;

    public function __construct($fecha, $hora, $idusuario, $motivo, $conexion) {
        $this -> alert_i = "<br><div class='alert alert-danger' role='alert'>";
        $this -> alert_c = "</div>";
        $this -> idusuario = $idusuario;
        $this -> hora = "";
        $this -> motivo = "";
        $this -> fecha = "";
        $this -> errorMotivo = $this -> validarMotivo($motivo);
        $this -> errorCita = $this -> validarCita($idusuario, $fecha, $hora, $conexion);
    }

    private function var_inciada($var) {
        if(isset($var) && !empty($var)) {
            return true;
        } else {
            return false;
        }
    }

    private function validarCita($idusuario, $fecha, $hora, $conexion) {
        if(!$this -> var_inciada($fecha) || !$this -> var_inciada($hora)) {
            return "Debe ingresar una fecha y hora";
        } else {
            $this -> hora = $hora;
            $this -> fecha = $fecha;
        }
        if(RepositorioCitas::cita_usuario_fecha($conexion, $idusuario, $fecha)) {
            return "Usted ya posee una cita para esa fecha";
        }
        if(RepositorioCitas::cita_fecha_hora($conexion, $fecha, $hora)) {
            return "Ya existe una cita para esta fecha y hora";
        }
        return "";
    }
    private function validarMotivo($motivo) {
        if(!$this -> var_inciada($motivo)) {
            return "Debe ingresar un motivo para la cita";
        } else {
            $this -> motivo = $motivo;
        }
        return "";
    }

    public function getFecha() {
        return $this -> fecha;
    }
    public function getHora() {
        return $this -> hora;
    }
    public function getUsuario() {
        return $this -> idusuario;
    }
    public function getMotivo() {
        return $this -> motivo;
    }
    public function citaValida() {
        if($this -> errorCita === "" && $this -> errorMotivo === "") {
            return true;
        } else {
            return false;
        }
    }
    public function getErrorCita() {
        return $this -> errorCita;
    }
    public function setErrorCita() {
        echo $this -> alert_i . $this -> errorCita . $this -> alert_c;
    }
    public function setErrorMotivo() {
        echo $this -> alert_i . $this -> errorMotivo . $this -> alert_c;
    }
}
?>