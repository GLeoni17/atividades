<?php
    $sucess = 1;
    foreach ($_POST["cookies_deletar"] as $nome){
        if(!setcookie($nome, "", time()-1, "/", "localhost", false, true)){
            $sucess = 0;
        }
    }
    echo $sucess;    
?>