<div class="form-group">
    <label for="pwd">Contraseña Actual</label>
    <input type="password" name="pwd" id="pwd" required class="form-control">
    <?php echo $validarClave -> setError()?>
</div>
<div class="form-group">
    <label for="pwd2">Contraseña Nueva</label>
    <input type="password" name="pwd2" id="pwd2" required class="form-control">
</div>
<div class="form-group">
    <label for="pwd3">Repitir Contraseña Nueva</label>
    <input type="password" name="pwd3" id="pwd3" required class="form-control">
    <?php echo $validarClave -> setError2() ?>
</div>

<button type="submit" class="btn btn-success btn-block" name="send">Cambiar Clave</button>