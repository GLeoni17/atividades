<?php 
    include "conexao.php";
    $nome = $_POST["nome"];
    $checkbox_value = $_POST["checkbox_value"];

    $query = "INSERT INTO campeonatos (nome) VALUES ('$nome')";
    mysqli_query($con, $query);

    $query = "SELECT id_campeonato FROM campeonatos WHERE nome like '$nome'";
    $res = mysqli_query($con, $query);
    $id_campeonato = mysqli_fetch_assoc($res);

    echo $id_campeonato["id_campeonato"];

    foreach($checkbox_value as $id){
        $insert = "INSERT INTO times_campeonato (
                                                    nome_time,
                                                    cod_campeonato
                                                ) VALUES (
                                                    '$id',
                                                    '".$id_campeonato["id_campeonato"]."'
                                                )";
        mysqli_query($con, $insert);
    }

?>