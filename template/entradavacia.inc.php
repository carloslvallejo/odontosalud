<fieldset>
    <div class="form-row">
        <div class="form-group col-12">
            <label for="nombre">Titulo</label>
            <input type="text" id="nombre" class="form-control" name="titulo" placeholder="Nombre de la Entrada">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label for="url">Url</label>
            <input type="text" id="url" class="form-control" name="url" placeholder="Nombre para una URL personalizada sin espacios">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="nuevotexto">Contenido</label>
            <textarea name="nuevotexto" id="nuevotexto" class="form-control" rows="10"></textarea>
        </div>
    </div>
</fieldset>
<button type="submit" class="btn btn-success" name="addentrada">Agregar Entrada</button>
<button type="reset" class="btn btn-danger">Vaciar Campos</button>