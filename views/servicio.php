<?php
include_once 'app/config.inc.php';
include_once 'app/controlsesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'app/validarCita.inc.php';
include_once 'app/citas.inc.php';
include_once 'app/repoCitas.inc.php';

if(!ControlSesion::sec_ini()) {
    
    Redireccion::redirigir(RUTA_LOGIN);
}

if(isset($_POST['newcita'])) {
    Conexion::open_conex();
    $validarcita = new ValidarCita($_POST['fecha'], $_POST['hora'], $_SESSION['idusuario'], $_POST['motivo'], Conexion::get_conex());
    if($validarcita -> citaValida()) {
        $nuevacita = new Citas('',$validarcita -> getUsuario(), $validarcita -> getMotivo(), $validarcita -> getHora(), 
        $validarcita -> getFecha(), $_POST['descrip']); 
        
            $insertar_cita = RepositorioCitas::insertar_citas(Conexion::get_conex(), $nuevacita);
            if($insertar_cita) {
                Redireccion::redirigir(RUTA_HISTORIAL_SERVICE);
            }
    }

    Conexion::close_conex();

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
        <div class="col-md-8">
            <form class="offset-5" method="POST" action="<?php echo RUTA_SERVICE; ?>">
                <?php 
                if(isset($_POST['newcita'])) {
                    include_once 'template/citavalidada.inc.php';
                } else {
                    include_once 'template/citavacia.inc.php';
                }
                ?>
            </form>
        </div>
        <div class="col-md-2 offset-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">Nueva Cita</a>
                <a href="<?php echo RUTA_HISTORIAL_SERVICE; ?>" class="list-group-item list-group-item-action">Historial</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'template/footer.inc.php';
?>