<?php
include_once 'app/config.inc.php';
include_once 'app/controlsesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'app/citas.inc.php';
include_once 'app/repoCitas.inc.php';
include_once 'app/writecitas.inc.php';

if(!ControlSesion::sec_ini()) {
    
    Redireccion::redirigir(RUTA_LOGIN);
}

?>
<div class="container">
    <div class="jumbtron my-4 p-4 bg-light rounded">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<hr>
<div class="container-fluid p-0">
    <div class="text-center bg-primary text-white">Registro de Citas</div>
</div>
<div class="container" style="height:563px;">
    <div class="row mt-2">
        <div class="col-md-8 mt-3">
            <!--- CONSTRUIR TABLA CON EL HISTORIAL DE CITAS DEL USUARIO -->
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($admin) {
                        WriteCitas::escribir_citas();
                    } else {

                    } WriteCitas::escribir_cita_autor($_SESSION['idusuario']);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2 offset-md-2">
            <div class="list-group">
                <a href="<?php echo RUTA_SERVICE; ?>" class="list-group-item list-group-item-action">Nueva Cita</a>
                <a href="#" class="list-group-item list-group-item-action active">Historial</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'template/footer.inc.php';
?>