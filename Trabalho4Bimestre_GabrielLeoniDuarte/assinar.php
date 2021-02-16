<?php
    $host = "localhost"; // Trocar para localhost caso erro
    $user = "root";
    $password = "usbw";
    $db = "site_noticias_leoni";

    if(!$conexao = mysqli_connect($host, $user, $password, $db)){
        echo "Erro ao conectar com o Banco de dados!";
    }
?>