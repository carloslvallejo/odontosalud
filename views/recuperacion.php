<?php 
    include_once 'app/redireccion.inc.php';
    include_once 'app/repoUser.inc.php';
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';

    if(isset($_POST['send'])) {

    }
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="h2 text-center">Recuperar Clave</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo RECUPERACION; ?>" method="post">
                        <div class="form-group">
                            <label for="mail">Correo</label>
                            <input type="mail" name="mail" id="mail" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="send">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>