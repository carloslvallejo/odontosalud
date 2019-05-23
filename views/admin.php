<?php
    //      APP
    include_once 'app/controlsesion.inc.php';
    include_once 'app/writeentradas.inc.php';
    include_once 'app/repoEntrada.inc.php';
    include_once 'app/redireccion.inc.php';
    include_once 'app/entradas.inc.php';
    
    if(!ControlSesion::sec_ini()) {
        Redireccion::redirigir(RUTA_LOGIN);
    } else {
        $admin = null;

        if($_SESSION['username'] == 'carlosv') {
            $admin = true;
        } 
        if(isset($_POST['guardar'])) {
            RepositorioEntrada::update_entradas(Conexion::get_conex(), $_POST['titulo'], $_POST['contenido'], $_SESSION['idusuario']);
            Redireccion::redirigir(RUTA_ADMIN);
        }
    }
    
    
    //      PLANTILLAS
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'template/slideshow.inc.php';
    include_once 'template/panel_admin.inc.php';

    
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
                                        WriteEntradas::escribir_blogs();
                                    } else {
                                        WriteEntradas::escribir_entradas_autor($_SESSION['idusuario']);
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