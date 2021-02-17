<?php
    include "conexao.php";
	
    if(!empty($_POST)) {
		
        include "cookies.php";
		
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        if(mysqli_query($con, "SELECT nome FROM assinante WHERE email='$email'")){// Achando de qual base é, ADM ou Assinante
            $base = 'assinante';
        }else if(mysqli_query($con, "SELECT nome FROM administrador WHERE email='$email'")){
            $base = 'administrador';
        }

        $sql = "SELECT nome FROM $base WHERE email=? AND senha=?";
        
        if($stmt = mysqli_prepare($con, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado) == 1) {
                
                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["nome"] = $linha["nome"];

                if($base == 'administrador'){
                    $_SESSION["permissao"] = $linha["permissao"];
                }

                if(!empty($_POST["lembrar"])){
                    monta_cookie("email", $email);
                    deleta_cookie("acessos");
                }else{
                    deleta_cookie("email");
                }

                header("location: index.php");
            }
            else {
                header("location: form_login.php?erro=1");
            }
            mysqli_stmt_close($stmt);
        }
        else {
            //echo "Houve um erro na preparação da consulta SQL:".mysqli_error($con);
            echo "Houve um erro ao conectar ao usuario, por favor contate o sistema!";
        }
        mysqli_close($con);
    }
    else {
        header("location: form_login.php");
    }

?>