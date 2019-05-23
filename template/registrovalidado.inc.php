
<div class="form-group">
    <label for="username">Nombre de Usuario</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre Usuario" <?php $validar -> setUsername() ?>>
    <?php $validar -> setErrorUsername() ?>
</div>
<div class="form-group">
    <label for="correo">Correo Electrónico</label>
    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" <?php $validar -> setCorreo() ?>>
    <?php $validar -> setErrorCorreo() ?>
</div>
<div class="form-group">
    <label for="clave">Contraseña</label>
    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
    <?php $validar -> setErrorPwd() ?>
</div>
<div class="form-group">
    <label for="clave2">Repita Contraseña</label>
    <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repita Contraseña">
    <?php $validar -> setErrorPwd2() ?>
</div>
<button type="submit" class="btn btn-success btn-block" name="registrar">Registrarse</button>
