<?php
    include_once 'app/config.inc.php';
    include_once 'app/conexion.inc.php';
    include_once 'app/repoUser.inc.php';
    include_once 'app/redireccion.inc.php';
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success mt-3" role="alert">
                <span style="font-size:48px;"><i class="far fa-check-circle"></i></span>
                <p class="text-center"> Se ha registrado correctamente. Bienvenido <b><?php echo $username;?></b>!</p><br>
                <p class="text-center"><a href="<?php echo RUTA_LOGIN ?>"> Iniciar Sesion</a> para disfrutar de los servicios</p>
            </div>
        </div>
    </div>
</div>