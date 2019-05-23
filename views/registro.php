<?php
    include_once 'app/config.inc.php';
    include_once 'app/conexion.inc.php';
    include_once 'app/usuario.inc.php';
    include_once 'app/repoUser.inc.php';
    include_once 'app/validar.inc.php';
    include_once 'app/redireccion.inc.php';

    if(isset($_POST['registrar'])){
        Conexion::open_conex();
        $validar = new ValidarRegistro($_POST['username'], $_POST['clave'], $_POST['clave2'], 
        $_POST['correo'], Conexion::get_conex());
    
        if($validar -> registroValido()){
            $usuario = new Usuario('', $validar -> getUsername(), password_hash($validar -> getPwd(), PASSWORD_DEFAULT),
                $validar -> getCorreo(), '');
                
            $insertarUser = RepositorioUser::insertar_datos(Conexion::get_conex(), $usuario);
    
            if($insertarUser){
                Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/'. $usuario -> getUsername());
            } 
        } 
        Conexion::close_conex();
    }

    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'template/slideshow.inc.php';
?>
<!------------ formulario de registro ---------------->
<h1 class="text-center bg-light mt-4 py-2 font-weight-bold-light">Registro de Usuario</h1>
<div class="container">
    <div class="col-12 col-md-4 offset-md-4 border rounded shadow p-3 my-4">
        <form action="<?php echo RUTA_REGISTRO; ?>" method="post">
            <?php
                if(isset($_POST['registrar'])){
                    include_once 'template/registrovalidado.inc.php';
                } else {
                    include_once 'template/registrovacio.inc.php';
                }
            ?>
        </form>
        <hr>
        <p class="text-center">¿Ya estas Registrado? <a href="<?php echo RUTA_LOGIN; ?>">Iniciar Sesion</a></p>
    </div>
</div>

<?php
    include_once 'template/footer.inc.php';
?>