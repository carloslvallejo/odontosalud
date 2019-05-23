<?php 
//      APP
include_once 'app/writeentradas.inc.php';
include_once 'app/repoEntrada.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/entradas.inc.php';
include_once 'app/validarEntrada.inc.php';
include_once 'app/controlsesion.inc.php';

if(!ControlSesion::sec_ini()) {
    Redireccion::redirigir(RUTA_LOGIN);
}
if(isset($_POST['addentrada'])) {
    Conexion::open_conex();
    $validarentrada = new validarEntrada($_POST['titulo'], $_POST['url'], htmlspecialchars($_POST['nuevotexto']), Conexion::get_conex());
    
    if($validarentrada -> entrada_valida()) {
        $nuevaentrada = new Entradas('', $_SESSION['idusuario'], $validarentrada -> getUrl(), $validarentrada -> getTitulo(), 
            $validarentrada ->getTexto(), '', '');
        $entrada_insertada = RepositorioEntrada::insertar_entrada(Conexion::get_conex(), $nuevaentrada);
        if($entrada_insertada) {
            Redireccion::redirigir(RUTA_ADMIN);
        }
        Conexion::close_conex();
    }
    
} 
//      PLANTILLAS
include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';
include_once 'template/slideshow.inc.php';
include_once 'template/panel_admin.inc.php';
?>
            <div class="col-md-10">
                <form class="col-md-8 offset-md-2" method="post" action="<?php echo NUEVO ?>">
                    <?php 
                        if(isset($_POST['addentrada'])) {
                            include_once 'template/entradavalidada.inc.php';
                        } else {
                            include_once 'template/entradavacia.inc.php';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    include_once 'template/footer.inc.php';
?>