<?php
include_once 'app/repoEntrada.inc.php';
class validarEntrada {

    private $titulo;
    private $url;
    private $texto;

    private $error_titulo;
    private $error_url;
    private $error_texto;
    
    private $aviso_i;
    private $aviso_c;

    public function __construct($titulo, $url, $texto, $conn) {
        $this -> aviso_i = "<div class='alert alert-danger' role='alert'>";
        $this -> aviso_c = "</div>";
        $this -> titulo = '';
        $this -> url = '';
        $this -> texto = '';
        $this -> error_titulo = $this -> validarTitulo($conn, $titulo);
        $this -> error_url = $this -> validarUrl($conn, $url);
        $this -> error_texto = $this -> validarTexto($texto);

    }

    private function varInic($var){
        if(isset($var) && !empty($var)){
            return true;
        } else {
            return false;
        }
    }
    public function getTitulo() {
        return $this -> titulo;
    }
    public function getTexto() {
        return $this -> texto;
    }
    public function getUrl() {
        return $this -> url;
    }
    public function setTitulo() {
        if($this -> titulo != "") {
            echo 'value="' . $this -> titulo . '"';
        }
    }
    public function setUrl() {
        if($this -> url != "") {
            echo 'value="' . $this -> url . '"';
        }
    }
    public function setTexto() {
        if($this -> texto != "" && strlen(trim($this -> texto )) > 0) {
            echo $this -> texto ;
        }
    }
    public function setError_titulo() {
        if($this -> error_titulo != "") {
            echo $this -> aviso_i . $this -> error_titulo . $this -> aviso_c;
        }
    }
    public function setError_url() {
        if($this -> error_url != "") {
            echo $this -> aviso_i . $this -> error_url . $this -> aviso_c;
        }
    }
    public function setError_texto() {
        if($this -> error_texto != "") {
            echo $this -> aviso_i . $this -> error_texto . $this -> aviso_c;
        }
    }
    public function entrada_valida() {
        if($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == "") {
            return true;
        } else {
            return false;
        }
    }
    private function validarTitulo($conn, $titulo) {
        if(!$this -> varInic($titulo)) {
            return "Debe escribir un Titulo";
        } else {
            $this -> titulo = $titulo;
        }
        if(RepositorioEntrada::titulo_existe($conn, $titulo)) {
            return "Este titulo ya existe";
        }
        if(strlen($titulo) > 255) {
            return "El titulo es muy largo UPPSs";
        }
    }
    private function validarUrl($conn, $url) {
        if(!$this -> varInic($url)) {
            return "Debe escribir una url personalizada";
        } else {
            $this -> url = $url;
        }
        $url_tratada = str_replace(' ', '', $url);
        $url_tratada = preg_replace('/\s+/','',$url_tratada);

        if(strlen($url) != strlen($url_tratada)) {
            return "La url no debe tener espacios";
        } 
        if(RepositorioEntrada::getEntrada_url($conn, $url)) {
            return "Ya existe una entrada con esta URL Personalizada";
        }
        if(strlen($url) > 255) {
            return "La url es muy larga OOPSss";
        }
    }
    private function validarTexto($texto) {
        if(!$this -> varInic($texto)) {
            return "Debe escribir algun texto";
        } else {
            $this -> texto = $texto;
        }
    }
}

?>