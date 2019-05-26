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
                <input type="text" name="nombre" id="name" class="form-control" value="<?php $perfil -> getNombre() ?>" required>
            </div>
            <div class="col-md-6">
                <label for="name2">Segundo Nombre</label>
                <input type="text" name="name2" id="name2" class="form-control" value="<?php $perfil -> getNombreDos() ?>">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php $perfil -> getApellido() ?>" required>
            </div>
            <div class="col-md-6">
                <label for="apellido2">Segundo Apellido</label>
                <input type="text" name="apellido2" id="apellido2" class="form-control" value="<?php $perfil -> getApellidoDos() ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="edad">Edad</label>
                <input type="text" name="edad" id="edad" class="form-control" value="<?php $perfil -> getEdad() ?>">
            </div>
            <div class="col-md-6">
                <label for="Sexo">Sexo</label>
                <select name="sexo" id="sexo" class="custom-select" value="<?php $perfil -> getSexo() ?>">
                    <option selected>Choose..</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    <option value="X">Indefinido</option>
                </select>
            </div>
        </div>
    </div>
</div>