<?php 
    include_once 'app/redireccion.inc.php';
    include_once 'app/repoUser.inc.php';
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'app/controlsesion.inc.php';
    include_once 'app/config.inc.php';
    include_once 'app/conexion.inc.php';
    include_once 'app/redireccion.inc.php';
    include_once 'app/validarClaves.inc.php';

    if(!ControlSesion::sec_ini()) {
        Redireccion::redirigir(RUTA_LOGIN);
    }
    if(isset($_POST['send'])) {
        Conexion::open_conex();
        $validarClave = new ValidarClaves($_SESSION['username'], $_POST['pwd'], $_POST['pwd2'], $_POST['pwd3'], Conexion::get_conex());
        
        if($validarClave -> cambioExistoso()) {
            $nueva_clave = RepositorioUser::update_pwd(Conexion::get_conex(), $_SESSION['idusuario'], password_hash($validarClave -> getPwd(), PASSWORD_DEFAULT));
            if($nueva_clave) {
                Redireccion::redirigir(RUTA_PERFIL);
            }
        }
    
        Conexion::close_conex();
    }
?>
<div class="container">
    <div class="jumbotron my-4">
        <h6 class="display-4 text-center">Hola, <?php echo $_SESSION['username']; ?></h6>
        <p class="text-center">Bienvenido a tu perfil de usuario</p>
    </div>
</div>
<hr>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="<?php echo RUTA_PERFIL ?>" class="list-group-item list-group-item-action">Datos Personales</a>
                <a href="#" class="list-group-item list-group-item-action active">Cambio de Clave</a>
            </div>
        </div>
        <div class="col-md-4 offset-md-3 my-3 pb-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="h2 text-center">Cambiar Clave</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo CAMBIO_CLAVE ?>" method="post">
                    <?php
                        if(isset($_POST['send'])) {
                            include_once 'template/cambioclavevalidada.inc.php';
                        } else {
                            include_once 'template/cambioclavevacia.inc.php';
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once 'template/footer.inc.php';
?>