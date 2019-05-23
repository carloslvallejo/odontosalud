<?php
include_once 'app/comentarios.inc.php';
include_once 'app/repoComentarios.inc.php';

class WriteComentarios {

    public static function escribir_comentarios() {
        $comentarios = RepositorioComentario::getall_comentarios(Conexion::get_conex());

        if(count($comentarios)) {
            foreach ($comentarios as $comentario) {
                self::escribir_comentario($comentario);
            }
        }
    }
    public static function resumir_comentario($texto) {
        $long_max = 300;
        $result = '';

        if(strlen($texto) >= $long_max) {
            $result .= substr($texto, 0, $long_max);
            $result .= '...';
        } else {
            $result = $texto;
        }
        return $result;
    }
    public static function escribir_comentario($comentario) {
        if(!isset($comentario)) {
            return;
        }
        ?>
        <div class="card mb-1">
            <div class="card-header bg-white border-bottom-0">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $comentario -> getTitulo() ?></h5>
                    <small><?php echo $comentario -> getFecha(); ?></small>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-1"><?php echo self::resumir_comentario($comentario -> getTexto()) ?></p>
            </div>
            <div class="card-footer d-flex">
                <a href="<?php echo RUTA_COMENTARIO ."/" . $comentario -> getTitulo() ?>" class="btn btn-sm btn-primary mr-1">Editar</a>
                <form action="" method="post">
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                </form>
            </div>
        </div>
        
        <?php
    }
    public static function escribir_entradas_autor($idautor) {
        $comentarios = RepositorioComentario::getComentarios_autor(Conexion::get_conex(), $idautor);
               
        if(count($comentarios)) {
            foreach ($comentarios as $comentario) {
                self::escribir_comentario($comentario);
            }
        }
    }
}
?>