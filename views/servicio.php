<?php
include_once 'app/controlsesion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'template/header.inc.php';
include_once 'template/navbar.inc.php';

if(!ControlSesion::sec_ini()) {
    
    Redireccion::redirigir(RUTA_LOGIN);
}
?>
<div class="container">
    <div class="jumbtron my-4 p-4 bg-light rounded">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<hr>
<div class="container-fluid p-0">
    <div class="text-center bg-primary text-white">Registro de Citas</div>
</div>
<div class="container" style="height:563px;">
    <div class="row mt-2">
        <div class="col-md-8">
            <form class="offset-5">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Hora">Hora</label>
                            <select class="custom-select" id="Hora">
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
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="Motivo">Motivo</label>
                            <select class="custom-select" id="Motivo">
                                <option selected>--Seleccionar--</option>
                                <option value="1">Consulta</option>
                                <option value="2">Limpieza</option>
                                <option value="3">Cirugia</option>
                                <option value="4">Extraccion</option>
                                <option value="5">Ortodoncia</option>
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
                    <button type="submit" class="btn btn-primary">Registrar Cita</button>
                    <button type="reset" class="btn btn-danger">Limpiar Campos</button>
                </div>
            </form>
        </div>
        <div class="col-md-2 offset-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">Nueva Cita</a>
                <a href="#" class="list-group-item list-group-item-action">Historial</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'template/footer.inc.php';
?>