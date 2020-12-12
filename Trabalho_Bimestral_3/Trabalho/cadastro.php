<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha_cadastro"];
    $posicao = $_POST["posicao"];

    $select = "SELECT * FROM usuario WHERE email like '%$email%'";

    $res = mysqli_query($con, $select);

    if(mysqli_num_rows($res) == 1){
        header("location:index.php?erro=2");
    }else{
        $insert = "INSERT INTO usuario(
                                    email,
                                    senha,
                                    nome,
                                    posicao,
                                    permissao                    
                                ) VALUES (
                                    '$email', 
                                    '$senha', 
                                    '$nome',
                                    '$posicao',
                                    '0'
                                )";
        
        mysqli_query($con,$insert);
        header("location:index.php?cadastro=1");
    }

?>