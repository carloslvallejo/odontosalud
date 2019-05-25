<div class="form-row">
    <div class="col-md-6">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fecha">
    </div>
    <div class="col-md-3">
        <label for="Hora">Hora</label>
        <select class="custom-select" id="hora" name="hora">
            <option selected>-- : --</option>
            <option value="1">08:00 am</option>
            <option value="2">09:00 am</option>
            <option value="3">10:00 am</option>
            <option value="4">11:00 am</option>
            <option value="5">02:00 pm</option>
            <option value="6">03:00 pm</option>
            <option value="7">04:00 pm</option>
            <option value="8">05:00 pm</option>
        </select>
    </div>
    <?php echo $validarcita -> setErrorCita(); ?>
</div>
<br>
<div class="form-row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="Motivo">Motivo</label>
            <select class="custom-select" id="motivo" name="motivo">
                <option selected>--Seleccionar--</option>
                <option value="1">Consulta</option>
                <option value="2">Limpieza</option>
                <option value="3">Cirugia</option>
                <option value="4">Extraccion</option>
                <option value="5">Ortodoncia</option>
            </select>
        </div>
    </div>
    <?php echo $validarcita -> setErrorMotivo(); ?>
</div>
<div class="form-row">
    <div class="col-md-12">
        <label for="descrip">Breve Descripcion</label>
        <textarea name="descrip" id="descrip" class="form-control" rows="5" placeholder="Breve Descripcion"></textarea>
    </div>
</div>
<br>
<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary" name="newcita" id="newcita">Registrar Cita</button>
    <button type="reset" class="btn btn-danger">Limpiar Campos</button>
</div>