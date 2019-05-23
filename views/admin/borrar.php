<?php
include_once 'app/controlsesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repoEntrada.inc.php';

if(!ControlSesion::sec_ini()) {
    Redireccion::redirigir(RUTA_LOGIN);
} else {
    if(isset($_POST['borrar'])) {
        Conexion::open_conex();
        $borrar_entrada = RepositorioEntrada::cambiar_estado(Conexion::get_conex(), $_POST['id_borrar']);

        if($borrar_entrada) {
            Redireccion::redirigir(RUTA_COMENTARIO);
        } else {
            Redireccion::redirigir(NUEVO);
        }
        Conexion::close_conex();
    
    }
}



?>