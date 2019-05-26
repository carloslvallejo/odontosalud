<?php
//APP'S
    include_once 'app/config.inc.php';

    include_once 'app/redireccion.inc.php';
    include_once 'app/conexion.inc.php';
    include_once 'app/usuario.inc.php';
    include_once 'app/repoUser.inc.php';
    include_once 'app/validarLogin.inc.php';
    include_once 'app/controlsesion.inc.php';

    // control de session previa
    if(ControlSesion::sec_ini()){
        Redireccion::redirigir(SERVIDOR);
    }

    if(isset($_POST['login'])) {
        Conexion::open_conex();
        $validar = new ValidarLogin($_POST['username'], $_POST['clave'], Conexion::get_conex());

        if($validar -> getError() === ''){
            // redireccionar al perfil
            ControlSesion::open_sec($validar -> getUsuario() -> getIduser(), $validar -> getUsuario() -> getUsername());
            Redireccion::redirigir(SERVIDOR);
        }
        Conexion::close_conex();
    }

    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'template/slideshow.inc.php';
?>
<!------------ formulario de Login ---------------->
<h1 class="text-center bg-light mt-4 py-2 font-weight-bold-light">Login de Usuario</h1>
<div class="container">
    <div class="col-12 col-md-4 offset-md-4 border rounded shadow p-3 my-4">
        <form action="<?php echo RUTA_LOGIN; ?>" method="post">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre Usuario" 
                    <?php 
                        if(isset($_POST['login']) && !empty($_POST['username']) && isset($_POST['username'])){
                            echo 'value="' . $_POST['username'] . '"';
                        }
                    ?>
                    required autofocus>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
                <?php 
                    if(isset($_POST['login'])){
                       $validar -> setError();
                    }
                ?>
            </div>
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="remember">
                <label for="remember" class="custom-control-label">Recuerdame</label>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
        </form>
        <hr>
        <p class="text-center">¿Has olvidado la contraseña? <a href="<?php echo RECUPERACION; ?>">Recuperar</a></p>
        <p class="text-center">¿Aun no estas registrado? Pulsa <a href="<?php echo RUTA_REGISTRO; ?>">Aqui</a></p>
    </div>
</div>

<?php
    include_once 'template/footer.inc.php';
?>