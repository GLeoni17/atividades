<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
          <div id='msg'></div>
          <h2> Times </h2><br>
          <ul id='tbody_time'>";

    $select = "SELECT * FROM times ORDER BY nome";
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){
        $nome = $row["nome"];
        $id = $row["id_time"];
        echo "<li><h4><strong>$nome</strong> 
                <button class='alterar_time' value='$id' data-toggle='modal' data-target='#modal'>✏️</button> 
                <button class='remover_time' value='$id'>ˣ</button>
              </h4></li>";
    }
    echo "</ul>";


$titulo = "Alterar Time";
$nome_form = "alterar_time.php";
include "modal.php";
    
include "scripts_time.php";    
rodape();

?>