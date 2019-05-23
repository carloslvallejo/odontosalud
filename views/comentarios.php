<?php
    //      APP
    include_once 'app/controlsesion.inc.php';
    include_once 'app/writecomentarios.inc.php';
    include_once 'app/repoComentarios.inc.php';
    include_once 'app/redireccion.inc.php';
    include_once 'app/comentarios.inc.php';
    
    if(!ControlSesion::sec_ini()) {
        Redireccion::redirigir(RUTA_LOGIN);
    }
    //      PLANTILLAS
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'template/slideshow.inc.php';
    include_once 'template/panel_admin_c.inc.php';

    $admin = null;

    if($_SESSION['username'] == 'carlosv') {
        $admin = true;
    }
    
?>
<!------------------------contenido de administrador----------------------->
            <div class="col-10">
                <div class="panel">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="overflow-auto" style="height:500px;">
                                <div class="list-group">
                                    <?php
                                    if($admin) {
                                        WriteComentarios::escribir_comentarios();
                                    } else {
                                        WriteComentarios::escribir_entradas_autor($_SESSION['idusuario']);
                                    }     
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 bg-dark text-white pt-2 rounded" style="height:150px;">
                            <form action="">
                                <div class="form-group">
                                    <label for="buscar">Filtrar Busqueda</label>
                                    <input type="text" id="buscar" class="form-control">
                                </div>
                                <button class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'template/footer.inc.php';
?>