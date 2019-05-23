<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/usuario.inc.php';
include_once 'app/entradas.inc.php';

include_once 'app/repoUser.inc.php';
include_once 'app/repoEntrada.inc.php';
include_once 'app/writeentradas.inc.php';

include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'template/slideshow.inc.php';
Conexion::open_conex();
$long_max = count(RepositorioEntrada::get_all(Conexion::get_conex()));
$cantidad = $long_max/5;
$entrada = RepositorioEntrada::getEntradas_all(Conexion::get_conex(), ($pagina_actual*5));
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="list-group">
                <?php
                foreach ($entrada as $entradas) {
                    WriteEntradas::escribir_blog($entradas);
                }
                ?>
            </div>
            <nav class="mt-2" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item
                    <?php
                    if($pagina_actual <= 0) {echo 'disabled';}
                    ?>
                    "><a class="page-link" href="<?php echo RUTA_BLOG ."/". ($pagina_actual-1)?>">Anterior</a></li>
                    <?php
                    for($i = 0; $i < ceil($cantidad);$i++){
                        ?>
                        <li class="page-item
                        <?php
                        if($pagina_actual == $i) {echo 'active';}
                        ?>
                        ">
                        <a class="page-link" href="<?php echo RUTA_BLOG . "/" . ($i+1) ?>"><?php echo $i+1 ?></a></li>
                        <?php
                    }
                    ?>
                    <li class="page-item
                    <?php
                    if($pagina_actual >= $cantidad-1) {echo 'disabled';}
                    ?>
                    "><a class="page-link" href="<?php echo RUTA_BLOG . "/" . ($pagina_actual+1) ?>">Siguiente</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-3 bg-dark py-3 rounded" style="height:100px;">
            <div class="bg-primary text-center">
                <h6 class="h6">Buscar Entrada</h6>
            </div>
            <div class="form-group d-flex">
                <input type="text" class="form-control  form-control-sm mr-1">
                <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'template/footer.inc.php';
?>