<?php

function numero_mensagens(){
    include "conexao.php";
    $mensagens = "SELECT conteudo FROM correio WHERE id_usuario = '".$_SESSION["usuario"]."'";
    $res = mysqli_query($con, $mensagens);
    echo mysqli_num_rows($res);
    if(mysqli_num_rows($res)>0){
        $_SESSION["mensagens"] = mysqli_num_rows($res);
    }
}
    

function cabecalho(){
    session_start();
    //print_r($_SESSION);
    //die();
    $alt = $GLOBALS["alt"];
    $menu = $GLOBALS["menu"];

    include "conexao.php";

    echo "<!DOCTYPE html>
    <html lang='pt-BR' id='html'>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <link href='css/index.css' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
            <script src='./js/jquery-3.5.1.min.js'></script>
            <script src='./js/scripts.js'></script>
            </head>
        <body>                
            <nav class='navbar navbar-expand-md bg-primary navbar-dark'>
            <a href='index.php' class='navbar-brand logotipo'>
                <img src='img/logotipo.png' class='rounded' alt='$alt' />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class='navbar-toggler' type='button'
                data-toggle='collapse' data-target='#menu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='menu'>
                <ul class='navbar-nav'>
                    ";
                    if(isset($_SESSION["usuario"])){

                        $select = "SELECT permissao, nome FROM usuario WHERE id_usuario = '".$_SESSION["usuario"]."'";
                        $res = mysqli_query($con, $select);
                        $info = mysqli_fetch_assoc($res);

                        echo"<span>Bem vindo ".$info["nome"]."! </span>
                        <li role='presentation'>
                        <a href='perfil.php' class='ativar_tts' value='perfil'> Perfil</a>
                        </li>
                        <li role='presentation' class='dropdown'>";
                        

                        if($info["permissao"] > 1){ // Precisa ser dono de time pra cima pra conseguir registrar um jogador novo
                            echo "
                            <a class='dropdown-toggle ativar_tts' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false' value='cadastrar'>
                            Cadastrar 
                            </a>
                            <ul class='dropdown-menu'>";

                            //echo "<li class='nav-item'>
                                //<a class='menu' href='form_jogador.php'>Jogador</a>
                               // </li>";
                            if($info["permissao"] == 2 || $info["permissao"] == 4){
                                echo "<li class='nav-item'>
                                <a class='menu ativar_tts' href='#' data-toggle='modal' data-target='#modal_cadastro' value='jogador'>Jogador</a>
                                </li>
                                <li class='nav-item'>
                                <a class='menu ativar_tts' href='form_time.php' value='time'>Time</a>
                                </li>";
                            }
                            
                            if($info["permissao"] > 2){ // Precisa ser organizador de campeonatos pra cima pra registrar um novo campeonato
                                echo "<li class='nav-item'>
                                <a class='menu ativar_tts' href='form_campeonato.php' value='campeonato'>Campeonato</a>
                                </li>";
                            }
                        
                            /*foreach($menu as $i=>$l){
                                echo "<li class='nav-item'>
                                        <a class='menu' href='form_$i.php'>$l</a>
                                    </li>";
                            }*/

                            echo "</ul>
                            </li>";
                        }    

                        

                        echo "<li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle ativar_tts' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false' value='listar'>
                        Listar 
                        </a>
                        <ul class='dropdown-menu'>";                        
                        foreach($menu as $i=>$l){
                            echo "<li class='nav-item'>
                                    <a class='menu ativar_tts' href='lista_$i.php' value='$l'>$l</a>
                                </li>";
                        }  
                        echo "
                            </ul>
                            </li>
                            
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='logout.php' class='ativar_tts' value='sair'>Sair</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='correio.php' class='ativar_tts' value='correio'>✉
                                   
                                    </a>
                                    <span class='numero_mensagens'>
                                    ";

                                    numero_mensagens();
                                    
                                    echo"
                                    </span>
                                </li>
                            </ul>
                        </li>
                        
                        
                        ";
                        /*echo "<li>
                        <ul class='navbar-nav'>
                            <li role='presentation'>
                                <span>Bem vindo ".$info["nome"]."!</spam>
                            </li>
                        </ul>
                    </li>";*/
                    }else{
                        echo "<li role='presentation' class='dropdown'>
                        <li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='#' class='abre_modal ativar_tts' data-toggle='modal' data-target='#modal_cadastro' value='cadastro'>Cadastro</a>
                                </li>
                                <li role='presentation'>
                                    <a href='#' class='abre_modal ativar_tts' data-toggle='modal' data-target='#modal_login' value='login'>Login</a>
                                </li>
                            </ul>
                        </li>

                        
                        ";
                    }

                    echo "<li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a id='tts' href='#'>🗣️ 1 para ativar Texto para Voz</a>
                                </li>
                            </ul>
                        </li>";

            echo "</ul>  
                    
            </div>        
        </nav>
        <main role='main' class='container'>";
        if(isset($_GET["erro"])){
            if($_GET["erro"] == 2){
                echo "<div id='erro'>Erro ao cadastrar. E-mail já cadastrado!</div>";
            }else if($_GET["erro"] == 3){
                echo "<div id='erro'>Voce não tem permissão para acessar essa pagina, contate um administrador!</div>";
            }
            else{
                echo "<div id='erro'>Erro na autenticação</div>";
            }
            
        }

        if(isset($_GET["alterar"])){
            if($_GET["alterar"]==1){
                echo "<div id='sucesso'>Dado alterado com sucesso!</div>";
            }
        }

        if(isset($_GET["cadastro"])){
            echo "<div id='sucesso'>Cadastrado com sucesso!</div>";
        }
        include "modal_login.php";
}

?>