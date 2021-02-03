<?php
    $nome = $_POST["value"];
    $caminho = "/";
    $dominio = "localhost";
    $seguro = false;
    $http = true;
    setcookie($nome, "", time()-1, $caminho, $dominio, $seguro, $http);
    
?>