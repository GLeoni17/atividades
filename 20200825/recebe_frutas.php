<?php
    session_start();

    if(in_array($_GET["fruta"], $_SESSION["frutas_existentes"])){
       echo "Fruta Já existe";
    }else{
       array_push($_SESSION["frutas_existentes"], $_GET["fruta"]);
        echo "Nova Fruta Cadastrada.";
    }

?>