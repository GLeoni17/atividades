<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='js/jquery-3.5.1.min.js'></script>
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='bootstrap/js/bootstrap.min.js'></script>

    <title>Index</title>
    
</head>
<body>
    <?php

        include "conexao.php";
        include "cookies.php";

        if(!empty($_GET)){
            if($_GET["erro"]==1){
                echo "<strong>Erro ao criar sua conta, contate o sistema!</strong><br><br>";
            }else if($_GET["erro"]==0){
                echo "<strong>Conta criada com sucesso!</strong><br><br>";
            }
        }

        if(empty($_SESSION)){
            echo "
                <a href='cadastro.php'><button>Não possui login? Assine aqui!</button></a>
                <a href='form_login.php'><button>Faça o login aqui!</button></a>
            ";

            if(empty($_COOKIE["ultimo_site"])){
                monta_cookie("ultimo_site", "index.php");
            }else{
                if(empty($_COOKIE["acessos"])){
                    monta_cookie("acessos", 0);
                }
            }
        
            atualiza_cookie("ultimo_site", "index.php");
        
        }else{
            echo"
                <h4> Bem vindo(a) ".$_SESSION["nome"]."!</h4>
                <a href='logout.php'><button>Logout</button></a><br><br>
            ";
        }

        echo "
            <a href='noticia1.php'><button>Noticia 1</button></a>
            <a href='noticia2.php'><button>Noticia 2</button></a>
        ";
    ?>
    
</body>
</html>