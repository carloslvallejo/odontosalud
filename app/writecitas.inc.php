<?php

include_once 'citas.inc.php';
include_once 'repoCitas.inc.php';

class WriteCitas {
    public static function escribir_citas() {
        $citas = RepositorioCitas::obtener_citas(Conexion::get_conex());
        if(count($citas)) {
            $contador = 1;
            foreach($citas as $cita) {
                self::escribir_cita($cita, $contador);
            }
        }
    }
    public static function escribir_cita_autor($idusuario) {
        $citas = RepositorioCitas::obtener_cita_usuario(Conexion::get_conex(), $idusuario);
        if(count($citas)) {
            $contador = 1;
            foreach($citas as $cita) {
                self::escribir_cita($cita, $contador);
                $contador++;
            }
        }
    }
    public static function escribir_cita($cita, $contador) {
        if(!isset($cita)) {
            ?>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <th scope="row"><?php echo $contador; ?></th>
            <td><?php echo $cita -> getMotivo() ;?></td>
            <td><?php echo $cita -> getFecha() ;?></td>
            <td><?php echo $cita -> getHora() ;?></td>
            <td><?php echo $cita -> getTexto() ;?></td>
        </tr>
        <?php
    }
}

?>