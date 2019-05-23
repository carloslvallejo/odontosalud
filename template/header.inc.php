<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo RUTA_IMAGEN ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
    <script src="<?php echo RUTA_JS ?>/jquery-3.3.1.min.js"></script>
    <script src="<?php echo RUTA_JS ?>/popper.min.js"></script>
    <script src="<?php echo RUTA_JS ?>/bootstrap.min.js"></script>
    <title>Odonto Salud</title>
    <style>
    ::-webkit-scrollbar {
        width: 5px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: grey; 
        border-radius: 5px;
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    </style>
    <script>
        $(document).ready(function(){
            $('#editar').click(function(){
                $('fieldset').removeAttr('disabled');
                $('#guardar').removeAttr('disabled');
            });
        });
    </script>
</head>
<body>
    