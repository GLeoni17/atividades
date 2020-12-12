<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT jogadores.nome as nome_jogador, jogadores.idade as idade_jogador,
               jogadores.posicao as posicao_jogador, times.id_time as id_time, times.nome as nome_time 
               FROM jogadores INNER JOIN times ON jogadores.cod_time = times.id_time";

    if(isset($_GET["id_jogador"])){
        $id_jogador = $_GET["id_jogador"];
        $select .= " WHERE id_jogador='$id_jogador'";
    }

    $resultado = mysqli_query($con,$select)
        or die(mysqli_error($con));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);
?>