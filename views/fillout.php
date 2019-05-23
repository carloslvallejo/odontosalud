<?php

    include_once 'app/config.inc.php';
    include_once 'app/conexion.inc.php';

    include_once 'app/comentarios.inc.php';
    include_once 'app/entradas.inc.php';

    include_once 'app/repoEntrada.inc.php';
    include_once 'app/repoComentarios.inc.php';
    
/*
    Conexion::open_conex();

    function sa($longitud) {
        $caracter = '0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';
        $num_caracter = strlen($caracter);
        $str_alea = '';

        for($i = 0; $i < $longitud; $i++) {
            $str_alea .= $caracter[rand(0, $num_caracter - 1)];
        }
        return $str_alea;
    }
    function lorem() {
        $texto = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis nulla commodo, cursus ante ut, eleifend urna. Integer rhoncus finibus metus sit amet mattis. Cras mi nibh, sagittis et fermentum ac, viverra sit amet ex. Cras et massa aliquet purus rhoncus pretium. Aliquam leo felis, egestas ut venenatis quis, volutpat nec mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur accumsan elementum orci at elementum. Morbi accumsan suscipit eleifend. Vestibulum vitae eros non nibh accumsan ornare in eget lectus. Etiam bibendum iaculis metus non ullamcorper. Duis consectetur justo dui, vel varius tellus scelerisque non. Ut porta elit ac metus tincidunt placerat. Nullam eu sapien quis lorem sollicitudin interdum. Fusce eu venenatis sapien. Sed vitae magna tempor, bibendum justo tincidunt, tincidunt felis. Phasellus posuere diam ac mi rhoncus, sed venenatis magna maximus.

        Nunc ac sollicitudin urna. Ut accumsan velit dui, id eleifend magna mollis sit amet. Donec scelerisque et arcu nec congue. Sed molestie elit eros, eget porta orci rhoncus quis. Praesent convallis felis ipsum, et facilisis erat venenatis at. Vestibulum eu pellentesque felis. Duis imperdiet, sem ut pharetra euismod, eros odio vestibulum sapien, non tempus nisi massa quis enim. In hac habitasse platea dictumst. Sed massa nisi, viverra vel finibus porta, commodo ac magna. Praesent ante orci, hendrerit non risus vel, consequat lobortis ipsum. Integer et nisi quam.
        
        Nunc vitae magna sagittis, tempus nisl eget, interdum enim. Nulla elit urna, interdum nec orci sed, finibus tempor diam. Nam lacinia dapibus convallis. Sed interdum, mauris id aliquam mollis, massa metus pellentesque tortor, vitae dictum orci felis eget lacus. Duis pellentesque porta purus. Etiam a arcu a eros tristique euismod et dapibus mauris. Morbi pharetra dolor laoreet mauris mattis, luctus sodales sem molestie. Nam vel dui ac nunc pellentesque tincidunt id vel lacus. Nam ut ligula placerat, pharetra turpis id, tincidunt est.';
        return $texto;
    }

    for ($entradas = 0; $entradas < 30; $entradas++) {
        $autor = rand(1, 30);
        $texto = lorem();
        $titulo = sa(10);
        $url = $titulo;

        $entrada = new Entradas('', $autor, $url, $titulo, $texto, '', '');
        RepositorioEntrada::insertar_entrada(Conexion::get_conex(), $entrada);
    }
    for ($comentarios = 0; $comentarios < 30; $comentarios++) {
        $autor = rand(1, 30);
        $texto = lorem();
        $titulo = sa(10);
        $entrada = rand(1, 30);
        
        $comentario = new Comentarios('', $autor, $entrada, $titulo, $texto, '');
        RepositorioComentario::insertar_comentario(Conexion::get_conex(), $comentario);
    }
*/
?>