<?php

    include "conexao.php";

    $id_jogador = $_POST["id_jogador"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $posicao = $_POST["posicao"]; 
    //$id_time = $_POST["id_time"];                          
                

    $update = "UPDATE jogadores SET nome='$nome',
                                idade='$idade',
                                posicao='$posicao'
                                WHERE id_jogador='$id_jogador'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";

?>