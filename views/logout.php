<?php
include_once 'app/controlsesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
ControlSesion::close_sec();
?>
<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<?php
Redireccion::redirigir(SERVIDOR);
?>