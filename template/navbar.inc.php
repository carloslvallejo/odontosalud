 <?php 
    include_once 'app/config.inc.php';
    include_once 'app/conexion.inc.php';
    include_once 'app/controlsesion.inc.php';
    include_once 'app/redireccion.inc.php';
    Conexion::open_conex();
    $inicio = null;
    $admin = null;
    $gestor = null;
    if (controlsesion::sec_ini()) {
        $inicio = true;
        if($_SESSION['username'] == 'carlosv') {
            $admin = true;
        } else {
            $gestor = true;
        }
    }
    
 ?>
 
 <!---------------------menu de navegacion--------------------------->
 <nav class="navbar sticky-top navbar-expand-md navbar-light bg-primary shadow">
    <a class="navbar-brand" href="<?php echo SERVIDOR ?>"><img src="<?php echo RUTA_IMAGEN ?>logo.jpg" width="30" height="30"><strong>Odonto</strong>Salud</a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarOdonto" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarOdonto">
        <div class="navbar-nav">
            <?php
            if($inicio) {
                ?>
                <a href="<?php echo RUTA_PERFIL ?>" class="nav-item nav-link">Hola, <?php echo $_SESSION['username']; ?></a>
                <?php
            } else {
                ?>
                <a href=" <?php echo SERVIDOR ?>" class="nav-item nav-link">Inicio</a>
                <?php
            }
            if($admin) {
                ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" id="navDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar</a>
                    <!---agregar dropdown blog, citas, usuarios-->
                    <div class="dropdown-menu" aria-labelledby="navDropdown">
                        <a href="<?php echo RUTA_ADMIN ?>" class="dropdown-item">Blog</a>
                        <a href="#" class="dropdown-item">Users</a>
                        <a href="#" class="dropdown-item">Citas</a>
                    </div>
                </div>
                <?php
            } else if($gestor) {
                ?>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" role="button" id="gestor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                    <!---agregar dropdown blog, citas, usuarios-->
                    <div class="dropdown-menu" aria-labelledby="gestor">
                        <a href="<?php echo RUTA_BLOG . "/1" ?>" class="dropdown-item">Ver Blog</a>
                        <a href="<?php echo RUTA_ADMIN ?>" class="dropdown-item">Mis Entradas</a>
                        <a href="<?php echo RUTA_COMENTARIO ?>" class="dropdown-item">Mis Comentarios</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" role="button" id="gestor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Citas</a>
                    <!---agregar dropdown blog, citas, usuarios-->
                    <div class="dropdown-menu" aria-labelledby="gestor">
                        <a href="<?php echo RUTA_SERVICE ?>" class="dropdown-item">Nueva Cita</a>
                        <a href="<?php echo RUTA_HISTORIAL_SERVICE ?>" class="dropdown-item">Historial</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <a href="<?php echo RUTA_SERVICE ?>" class="nav-item nav-link">Servicios</a>
                <a href="<?php echo RUTA_BLOG . "/1" ?>" class="nav-item nav-link">Blog</a>
                
                <?php
            }
                ?>
                <a href="<?php echo RUTA_CONTACTO ?>" class="nav-item nav-link">Contactanos</a>
            <?php
            if($inicio) {
                ?>
                <a href="<?php echo RUTA_LOGOUT ?>" class="nav-item nav-link float-right">Logout</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
