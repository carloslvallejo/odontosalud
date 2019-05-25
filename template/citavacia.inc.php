<div class="form-row">
    <div class="col-md-6">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fecha">
    </div>
    <div class="col-md-3">
        <label for="Hora">Hora</label>
        <select class="custom-select" id="hora" name="hora">
            <option selected>-- : --</option>
            <option value="08:00am">08:00 am</option>
            <option value="09:00am">09:00 am</option>
            <option value="10:00am">10:00 am</option>
            <option value="11:00am">11:00 am</option>
            <option value="02:00pm">02:00 pm</option>
            <option value="03:00pm">03:00 pm</option>
            <option value="04:00pm">04:00 pm</option>
            <option value="05:00pm">05:00 pm</option>
        </select>
    </div>
</div>
<br>
<div class="form-row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="Motivo">Motivo</label>
            <select class="custom-select" id="motivo" name="motivo">
                <option selected>--Seleccionar--</option>
                <option value="Consulta">Consulta</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Cirugia">Cirugia</option>
                <option value="Extraccion">Extraccion</option>
                <option value="Ortodoncia">Ortodoncia</option>
            </select>
        </div>
    </div>
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