<?php 
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/entradas.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/comentarios.inc.php';

include_once 'app/repoUser.inc.php';
include_once 'app/repoComentarios.inc.php';
include_once 'app/repoEntrada.inc.php';

$components_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $components_url['path'];
$part_rutas = explode('/', $ruta);
$part_rutas = array_filter($part_rutas);
$part_rutas = array_slice($part_rutas, 0);

$ruta_directa = 'views/404.php';

if($part_rutas[0] == 'odontosalud') {
    if(count($part_rutas) == 1) {
        $ruta_directa = 'views/home.php';
    } else if (count($part_rutas) == 2) {
        switch ($part_rutas[1]) {
            case 'login':
                $ruta_directa = 'views/login.php';
                break;
            case 'registro':
                $ruta_directa = 'views/registro.php';
                break;
            case 'logout':
                $ruta_directa = 'views/logout.php';
                break;
            case 'relleno':
                $ruta_directa = 'views/fillout.php';
                break;
            case 'admin':
                $pagina_actual = 'admin';
                $ruta_directa = 'views/admin.php';
                break;
            case 'servicio':
                $ruta_directa = 'views/servicio.php';
                break;
            case 'contactanos':
                $ruta_directa = 'views/contactanos.php';
                break;
            case 'perfil':
                $ruta_directa = 'views/perfil.php';
                break;
            case 'comentarios':
                $pagina_actual = 'admin';
                $ruta_directa = 'views/comentarios.php';
                break;
            case 'recuperar-clave':
                $ruta_directa = 'views/recuperacion.php';
                break;
            case 'servicio-historial':
                $ruta_directa = 'views/servicio-historial.php';
                break;
        }
    } else if(count($part_rutas) == 3) {
        if($part_rutas[1] == 'registro-correcto') {
            $username = $part_rutas[2];
            $ruta_directa = 'views/registro-correcto.php';
        }
        if($part_rutas[1] == 'entrada') {
            $url = $part_rutas[2];
            Conexion::open_conex();
            $entrada = RepositorioEntrada::getEntrada_url(Conexion::get_conex(), $url);
            $usuario = RepositorioUser::getUsuario_id(Conexion::get_conex(), $entrada -> getIdAutor());
            if($entrada != null) {
                $comentarios = RepositorioComentario::getComentarios_entrada(Conexion::get_conex(), $entrada -> getId());
                $ruta_directa = 'views/entrada.php';
            }
        }
        if ($part_rutas[1] == 'blog') {
            $pagina_actual = 0;
            if($part_rutas[2] == !null) {
                $pagina_actual = $part_rutas[2]-1;
            }
            Conexion::open_conex();
            $long_max = count(RepositorioEntrada::get_all(Conexion::get_conex()));
            $entrada = RepositorioEntrada::getEntradas_all(Conexion::get_conex(), $pagina_actual);
            $ruta_directa = 'views/blog.php';
        }
        if($part_rutas[1] == 'admin') {
            switch ($part_rutas[2]) {
                case 'inicio':
                    $pagina_actual = 'inicio';
                    $ruta_directa = 'views/admin/inicio.php';
                    break;
                case 'modificar':
                    $ruta_directa = 'views/admin.php';
                    break;
                case 'borrar-entrada':
                    $ruta_directa = 'views/admin/borrar.php';
                    break;
            }
        }
    } else if(count($part_rutas) == 4 ) {
        if($part_rutas[2] == 'modificar') {
            $pagina_actual = 'modificar';
            Conexion::open_conex();
            $url = $part_rutas[3];
            $entrada = RepositorioEntrada::getEntrada_url(Conexion::get_conex(), $url);
            if($entrada != null) {
                $ruta_directa = 'views/admin/modificar.php';
            }
        }
    }
}

include_once $ruta_directa;
?>