<?php
    include_once 'app/controlsesion.inc.php';
    include_once 'app/config.inc.php';
    include_once 'app/redireccion.inc.php';
    include_once 'app/writeentradas.inc.php';
    include_once 'app/conexion.inc.php';
    Conexion::open_conex();
    $admin = null;
    $inicio = null;
    if (controlsesion::sec_ini()) {
        $inicio = true;
        $cantidad = count(RepositorioEntrada::getEntrada_autor(Conexion::get_conex(), $_SESSION['idusuario']));
        $cant_coment = count(RepositorioComentario::getComentarios_autor(Conexion::get_conex(), $_SESSION['idusuario']));
        if($_SESSION['username'] == 'carlosv') {
            $e_total = count(RepositorioEntrada::get_all(Conexion::get_conex()));
            $c_total = count(RepositorioComentario::getall_comentarios(Conexion::get_conex()));
        }
    }
    if(isset($_POST['logout'])){
        $inicio = false;
    }

    // TEMPLATE
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';
    include_once 'template/slideshow.inc.php';
    
?>
   <!-----------------------------contenedor principal------------------------>
   <section class="principal container mb-4">
       <div class="row">
           <div class="col-12 d-block d-md-none">
                <div class="boton-side text-center my-4">
                    <a class="btn btn-danger" href="<?php echo RUTA_LOGIN ?>">Ingresar</a>
                    <a class="btn btn-success" href="<?php echo RUTA_REGISTRO ?>">Registrarse</a>
                </div>
           </div>
       </div>
        <div class="row">
            <div class="col-12 col-md-8 bg-light rounded shadow-lg py-2">
                <!--- contenido de publicaciones --->
                <article class="lastnews">
                    <h6 class="h3">Ultimas Publicaciones</h6>
                    <div class="row">
                        <div class="card-deck mx-2">
                        <?php 
                        WriteEntradas::escribir_entradas();
                        ?>
                        </div>
                    </div>
                </article>
                <hr>
                <!---- contenido para publicidad y otros temas ---->
                <article class="otrostemas">
                    <section class="slide container my-3">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade shadow-lg" data-ride="carousel">
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active" data-interval="10000">
                                <img src="images/odonto3.jpg" class="d-block w-100" alt="..." height="150px">
                                </div>
                                <div class="carousel-item" data-interval="10000">
                                <img src="images/odonto4.jpg" class="d-block w-100" alt="..." height="150px">
                                </div>
                                <div class="carousel-item" data-interval="10000">
                                <img src="images/odonto5.jpg" class="d-block w-100" alt="..." height="150px">
                            </div>
                        </div>
                    </section>
                </article>
            </div>
            <!--------------------------------  sidebar  --------------------------------------->
            <div class="col-12 col-md-3 bg-primary d-none d-md-block ml-4 rounded-top">
                <?php 
                if($inicio) {
                    ?>
                    <div class="mt-2">
                        <div class="mr-3 pt-2">
                             <?php
                                if($admin) {
                                    ?>
                                    <p>Total de Entradas: <?php echo $e_total; ?></p>
                                    <p>Total de Comentarios: <?php echo $c_total; ?></p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Mis Entradas: <?php echo $cantidad; ?></p>
                                    <p>Mis Comentarios: <?php echo $cant_coment; ?></p>
                                    <?php
                                }
                            ?>
                            <div class="d-flex justify-content-center">
                                <a href="<?php echo RUTA_LOGOUT ?>" name="logout" class="btn btn-block btn-danger ml-3 p-3" style="height:5rem;"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="d-flex d-md-block justify-content-between mt-4">
                        <a class="btn btn-danger btn-block" href="<?php echo RUTA_LOGIN ?>">Ingresar</a>
                        <a class="btn btn-success btn-block" href="<?php echo RUTA_REGISTRO ?>">Registrarse</a>
                    </div>
                    <?php
                }
                ?>
                <hr>
                <div class="mt-5">
                    <img src="images/odonto7.jpg" class="d-block w-100" alt="..." height="250px">
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'template/footer.inc.php';
?>