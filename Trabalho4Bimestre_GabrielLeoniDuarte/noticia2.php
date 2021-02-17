<?php
    include "conexao.php";
    include "cookies.php";

    if(empty($_SESSION)){

        if(empty($_COOKIE["ultimo_site"])){
            monta_cookie("ultimo_site", "noticia1.php");
        }else{
            if(empty($_COOKIE["acessos"])){
                monta_cookie("acessos", 1);
            }else if($_COOKIE["ultimo_site"] != "noticia2.php"){
                atualiza_cookie("acessos", $_COOKIE["acessos"]+1);
            }
        }

        atualiza_cookie("ultimo_site", "noticia2.php");

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia 2</title>
</head>
<body>
    <h2>Noticia 2</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
       Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
       Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
    <a href='noticia1.php'><button>Noticia 1</button></a>
</html>