<?php
    $bd_local = 'localhost';
    $usuario = 'root';
    $senha = '';
    $bd = 'bd_gerencontas';

    $link = mysqli_connect($bd_local,$usuario,$senha,$bd);

    if (mysqli_connect_errno()){
        echo "Conexão não estabelecida! Erro de Conexão: " . mysqli_connect_error(). "<br>";
    }
?>