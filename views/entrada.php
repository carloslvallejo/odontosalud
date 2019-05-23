<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entradas.inc.php';
include_once 'app/comentarios.inc.php';

include_once 'app/repoUser.inc.php';
include_once 'app/repoEntrada.inc.php';
include_once 'app/repoComentarios.inc.php';
include_once 'app/writeentradas.inc.php';

include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'template/slideshow.inc.php';
?>
<div class="container mb-2">
    <div class="row">
        <div class="col-md-9">
            <h6 class="display-4"><?php echo $entrada -> getTitulo() ;?></h6>
            <span class="text-muted">
                <span><i class="fas fa-user"></i></span> 
                <a href="#"><?php echo $usuario -> getUsername(); ?></a>
                <span> escrito <?php echo $entrada -> getFecha(); ?></span>
            </span>
            <p class="text-justify m-2"><?php echo nl2br($entrada -> getTexto()) ;?></p>
            <br><br>
            <?php 
            if($entrada -> getEstado() == '1') {
                echo 'Esta entrada ha sido Eliminada';    
            }
            ?>
            <br>
        </div>
        <div class="col-md-3 bg-dark mt-5" style="height:300px;">
            <div class="bg-primary text-center">
                <h6 class="h6">Buscar Palabra</h6>
            </div>
            <div class="form-group d-flex">
                <input type="text" class="form-control  form-control-sm mr-1">
                <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
            </div>
            <hr>
            <div class="my-2">
                <h6 class="h6 mb-2 text-white">Otras entradas</h6>
                <ul>
                <?php 
                    WriteEntradas::escribir_listas();
                ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            if(count($comentarios) > 0) {
                ?>
                <div class="col-md-9">
                    <button data-toggle="collapse" data-target="#coments" class="btn btn-primary form-control">
                        <?php echo "Ver Comentarios (". count($comentarios) .")" ?>
                    </button>
                    <br>
                    <br>
                    <div class="collapse" id="coments">
                    <?php
                        for($i = 0; $i < count($comentarios); $i++) {
                            $comentario = $comentarios[$i];
                        ?>
                        <div class="row">
                            <div class="col-md-12 my-1">
                                <div class="card">
                                    <div class="card-header">
                                        <?php echo $comentario -> getTitulo(); ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-2">
                                            <?php echo $comentario -> getIdUsuario(); ?>
                                        </div>
                                        <div class="col-md-10">
                                            <p><?php echo $comentario -> getFecha(); ?></p>
                                            <p class="text-justify"><?php echo nl2br($comentario -> getTexto()); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
                <?php
            } else {
                echo 'No hay comentarios';
            }
        ?>
    </div>
</div>
<?php 
include_once 'template/footer.inc.php';
?>