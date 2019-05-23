<?php 

include_once 'entradas.inc.php';
include_once 'repoEntrada.inc.php';
include_once 'repoComentarios.inc.php';

class WriteEntradas {
    public static function escribir_entradas() {
        $entradas = RepositorioEntrada::getEntradas(Conexion::get_conex());

        if(count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribir_entrada($entrada);
            }
        }
    }
    public static function escribir_entradas_autor($idautor) {
        $entradas = RepositorioEntrada::getEntrada_autor(Conexion::get_conex(), $idautor);
               
        if(count($entradas)) {
            foreach ($entradas as $entrada) {
                self::admin_blog($entrada);
            }
        }
    }
    public static function escribir_blogs() {
        $entradas = RepositorioEntrada::get_all(Conexion::get_conex());
        if(count($entradas)) {
            foreach ($entradas as $entrada) {
                self::admin_blog($entrada);
            }
        }
    }
    public static function escribir_listas() {
        $entradas = RepositorioEntrada::getEntradas_random((Conexion::get_conex()));
        if(count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribir_lista($entrada);
            }
        }
    }
    public static function escribir_entrada($entrada) {
        if(!isset($entrada)) {
            return;
        }
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $entrada -> getTitulo(); ?></h5>
                <p class="card-text text-justify"><?php echo nl2br(self::resumir($entrada -> getTexto())); ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $entrada -> getFecha(); ?></small></p>
                <div class="text-right"><a href="<?php echo RUTA_ENTRADA ."/" . $entrada -> getUrl() ?>" class="btn btn-primary" role="button">Leer más</a></div>
            </div>
        </div>
        <?php
    }   
    public static function escribir_lista($entrada) {
        if(!isset($entrada)) {
            return;
        }
        ?>
        <li class="<?php if($entrada -> getEstado() == '1') {echo "d-none";} ?>"><a href="<?php echo RUTA_ENTRADA . "/" . $entrada -> getUrl() ?>"><?php echo $entrada -> getTitulo() ?></a></li>
        <?php
    }
    public static function resumir($texto) {
        $long_max = 50;
        $result = '';

        if(strlen($texto) >= $long_max) {
            $result .= substr($texto, 0, $long_max);
            $result .= '...';
        } else {
            $result = $texto;
        }
        return $result;
    }
    public static function resumir_blog($texto) {
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
    public static function escribir_blog($entrada) {
        if(!isset($entrada)) {
            return;
        }
        ?>
        <div class="card mb-1 <?php if($entrada -> getEstado() == '1') {echo "d-none";} ?>">
            <div class="card-body">
                <a href="<?php echo RUTA_ENTRADA ."/" . $entrada -> getUrl() ?>" class="list-group-item list-group-item-action my-1 border-0">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $entrada -> getTitulo() ?></h5>
                        <small><?php echo $entrada -> getFecha(); ?></small>
                    </div>
                    <p class="mb-1"><?php echo self::resumir_blog($entrada -> getTexto()) ?></p>
                </a>
            </div>
            <div class="card-footer">
                <span><i class="far fa-comment-alt"></i> <?php echo count(RepositorioComentario::getComentarios_entrada(Conexion::get_conex(), $entrada -> getId())) ?></span>
                <a href="#" class="ml-2"><span><i class="far fa-heart"></i> </span></a>
            </div>
        </div>
        <?php
    }
    public static function admin_blog($entrada) {
        if(!isset($entrada)) {
            return;
        }
        ?>
        <div class="card mb-1 <?php if($entrada -> getEstado() == '1') {echo "d-none";}  ?>">
            <div class="card-header bg-white border-bottom-0">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $entrada -> getTitulo() ?></h5>
                    <small><?php echo $entrada -> getFecha(); ?></small>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-1"><?php echo self::resumir_blog($entrada -> getTexto()) ?></p>
            </div>
            <div class="card-footer pb-0 mb-1">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><i class="far fa-comment-alt"></i> <?php echo count(RepositorioComentario::getComentarios_entrada(Conexion::get_conex(), $entrada -> getId())) ?></span>
                        <a href="#" class="ml-2"><span><i class="far fa-heart"></i> </span></a>
                    </div>
                    <div class="d-flex">
                        <form>
                            <a href="<?php echo MODIFICAR . "/" . $entrada -> getUrl(); ?>" class="btn btn-sm btn-primary mr-1">Editar</a>
                        </form>
                        <form action="<?php echo BORRAR_ENTRADA; ?>" method="post">
                            <input type="hidden" name="id_borrar" id="id_borrar" value="<?php echo $entrada -> getId(); ?>">
                            <button type="submit" class="btn btn-sm btn-danger" name="borrar">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
    }
}
?>