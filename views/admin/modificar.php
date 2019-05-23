<?php
//      APP
include_once 'app/writeentradas.inc.php';
include_once 'app/repoEntrada.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/entradas.inc.php';
include_once 'app/controlsesion.inc.php';

if(!ControlSesion::sec_ini()) {
    Redireccion::redirigir(RUTA_LOGIN);
}
//      PLANTILLAS
include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'template/slideshow.inc.php';
include_once 'template/panel_admin.inc.php';

?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-9">
                        <form method="post" action="<?php echo MODIFICAR ?>">
                            <fieldset disabled>
                                <div class="form-row">
                                    <div class="col-md-10">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $entrada -> getTitulo();?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10">
                                        <label for="contenido">Contenido</label>
                                        <textarea name="contenido" id="contenido" class="form-control" rows="10"><?php echo $entrada -> getTexto();?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="d-block mt-1">
                                <button type="button" class="btn btn-primary" name="editar" id="editar">Editar Entrada</button>
                                <button type="submit" class="btn btn-success" name="guardar" id="guardar" disabled>Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 bg-dark text-white pt-2 rounded">
                        <form action="">
                            <div class="form-group">
                                <label for="buscar">Buscar</label>
                                <input type="text" id="buscar" class="form-control">
                            </div>
                            <button class="btn btn-primary">Buscar</button>
                        </form>
                        <hr>
                        <ul>
                            <?php
                            WriteEntradas::escribir_listas();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once 'template/footer.inc.php';
?>