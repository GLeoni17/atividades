<?php 
    include "conexao.php";
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado

    $select="SELECT genero.nome_cientifico as nome_cientifico_genero

    as nome_cientifico_familia FROM genero  
    
    WHERE cod_familia = '".$_POST['id']."' ORDER BY nome_cientifico_genero";

    $res = mysqli_query($con, $select);
    while($linha=mysqli_fetch_assoc($res)){
        echo $linha["nome_cientifico"];
    }
?>