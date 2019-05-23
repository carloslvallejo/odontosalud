<section class="menu-perfil my-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-primary text-center" style="height:30px;">Administrar Blog</div>
        </div>
        <div class="row mt-2 mr-1">
            <div class="col-2"> 
                <div class="list-group" id="list-admin">
                    <a class="list-group-item list-group-item-action <?php if($pagina_actual == 'admin') {echo 'active';} ?>" id="list-inicio-list" href="<?php echo RUTA_ADMIN; ?>" >Entradas</a>
                    <a class="list-group-item list-group-item-action <?php if($pagina_actual == 'inicio') {echo 'active';} ?>" id="list-nueva-list" href="<?php echo NUEVO; ?>">Nueva Entrada</a>
                    <a class="list-group-item list-group-item-action disabled <?php if($pagina_actual == 'modificar') {echo 'active';} ?>" id="list-content-list" href="<?php echo MODIFICAR; ?>">Modificar Entrada</a>
                </div>
            </div>
            