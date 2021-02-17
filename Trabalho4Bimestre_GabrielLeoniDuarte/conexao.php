<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $password = "usbw";
    $db = "site_noticias_leoni";
    
    if(!$con = mysqli_connect($host, $user, $password, $db)){
        echo "Erro ao conectar com o banco de dados.";
    }
?>