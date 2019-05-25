<?php
    //informacion de la base de datos PostGreSQL

    define('servername', 'localhost');
    define('dbname', 'odontosalud');
    define('dbuser', 'postgres');
    define('dbpwd', '20420115');

    //Rutas
    define("SERVIDOR", "http://localhost/odontosalud");
    define("RUTA_LOGIN", SERVIDOR."/login");
    define("RUTA_REGISTRO", SERVIDOR."/registro");
    define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro-correcto");
    define("RUTA_ENTRADA", SERVIDOR."/entrada");
    define("RUTA_BLOG", SERVIDOR."/blog");
    define("RUTA_ADMIN", SERVIDOR."/admin");
    define("RUTA_LOGOUT", SERVIDOR."/logout");
    define("NUEVO", RUTA_ADMIN."/inicio");
    define("MODIFICAR", RUTA_ADMIN. "/modificar");
    define("BORRAR_ENTRADA", RUTA_ADMIN. "/borrar-entrada");
    define("RUTA_SERVICE", SERVIDOR. "/servicio");
    define("RUTA_HISTORIAL_SERVICE", SERVIDOR. "/servicio-historial");
    define(("RUTA_CONTACTO"), SERVIDOR. "/contactanos");
    define("RUTA_PERFIL", SERVIDOR."/perfil");
    define("RUTA_COMENTARIO", SERVIDOR. "/comentarios");
    define("RECUPERACION", SERVIDOR."/recuperar-clave");

    //Recursos
    define("RUTA_CSS", SERVIDOR . "/css/");
    define("RUTA_JS", SERVIDOR . "/js/");
    define("RUTA_IMAGEN", SERVIDOR . "/images/");

?>