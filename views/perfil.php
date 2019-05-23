<?php 
    include_once 'template/header.inc.php';
    include_once 'template/navbar.inc.php';

    if(!ControlSesion::sec_ini()) {
        Redireccion::redirigir(RUTA_LOGIN);
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
                <a href="#" class="list-group-item list-group-item-action">Cambio de Clave</a>
            </div>
        </div>
        <div class="col-md-7 offset-md-1">
            <form>
                <fieldset disabled>
                    <div class="form-row">
                        <div class="col-md-4 mr-4">
                            <div style="height:165px;width:165px" class="text-center text-dark bg-light rounded ml-3 py-5">Foto</div>
                            <div class="custom-file mt-1">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Elegir foto</label>
                            </div>            
                        </div>
                        <div class="col-md-7 form-group ml-2">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="nombre" id="name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name2">Segundo Nombre</label>
                                    <input type="text" name="name2" id="name2" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido2">Segundo Apellido</label>
                                    <input type="text" name="apellido2" id="apellido2" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="edad">Edad</label>
                                    <input type="text" name="edad" id="edad" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="Sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="custom-select">
                                        <option selected>Choose..</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                        <option value="X">Indefinido</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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