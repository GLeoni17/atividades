<?php
    function monta_cookie($nome_cookie, $conteudo_cookie){

        $nome = $nome_cookie;
        $valor = base64_encode($conteudo_cookie);
        $validade = time() + 604800000; // 7 Dias
        $caminho = "/";
        $dominio = "localhost";
        $seguro = false;
        $http = true;

        if($nome_cookie == "acessos"){
            $valor = 1;
        }else if($nome_cookie == "ultimo_site"){
            $valor = $conteudo_cookie;
        }

        setcookie($nome, $valor, $validade, $caminho, $dominio, $seguro, $http);        
    }

    function atualiza_cookie($nome_cookie, $conteudo_cookie){
        $validade = time() + 604800000; // 7 Dias
        $caminho = "/";
        $dominio = "localhost";
        $seguro = false;
        $http = true;

        setcookie($nome_cookie, $conteudo_cookie, $validade, $caminho, $dominio, $seguro, $http);
    }

    function deleta_cookie($nome_cookie){

        $nome = $nome_cookie;

        if(isset($_COOKIE[$nome])) {
            $caminho = "/";
            $dominio = "localhost";
            $seguro = false;
            $http = true;

            setcookie($nome, "", time()-1, $caminho, $dominio, $seguro, $http);
        } 
    }
    
?>