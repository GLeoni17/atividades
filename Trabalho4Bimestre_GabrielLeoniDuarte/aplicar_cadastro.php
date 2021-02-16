<?php
    session_start();

    if(!empty($_POST)){
        include "conexao.php";
        date_default_timezone_set('UTC');
        
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $data_assinatura = date('Y-m-d');
        $senha = md5($_POST["senha"]);

        $sql = "INSERT INTO assinante(
                                CPF,
                                nome,
                                email,
                                data_assinatura,
                                senha
                            ) VALUES (
                                '$cpf',
                                '$nome',
                                '$email',
                                '$data_assinatura',
                                '$senha'
                            )";		
            
        if(!mysqli_query($con, $sql)){   
            header("location: index.php?erro=1");
        }else{
            header("location: index.php?erro=0");
        }
    }else{
        header("location: index.php");
    }
    
    
?>