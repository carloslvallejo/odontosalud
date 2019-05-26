<?php 
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'app/repoPerfil.inc.php';

    if(!ControlSesion::sec_ini()) {
        Redireccion::redirigir(RUTA_LOGIN);
    }
    $exito = false;
    $perfil = RepositorioPerfil::obtener_perfil(Conexion::get_conex(), $_SESSION['idusuario']);
    if(!empty($perfil)) {
        $exito = true;
    }
    if(isset($_POST['guardar'])) {
        
    }
?>
<div class="container">
    <div class="jumbotron my-4">
        <h6 class="display-4 text-center">Hola, <?php echo $_SESSION['username']; ?></h6>
        <p class="text-center">Bienvenido a tu perfil de usuario</p>
    </div>
</div>
<hr>
<div class="container" style="height:486px;">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">Datos Personales</a>
                <a href="<?php echo CAMBIO_CLAVE ?>" class="list-group-item list-group-item-action">Cambio de Clave</a>
            </div>
        </div>
        <div class="col-md-7 offset-md-1">
            <form>
                <fieldset disabled>
                <?php
                if($exito) {
                    include_once 'template/perfilcompleto.inc.php';
                } else {
                    include_once 'template/perfilvacio.inc.php';
                }
                ?>
                </fieldset>
                <div class="text-center mt-5">
                    <button type="button" name="editar" id="editar" class="btn btn-danger">Editar Perfil</button>
                    <button type="submit" name="guardar" id="guardar" class="btn btn-success" disabled>Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once 'template/footer.inc.php';
?>