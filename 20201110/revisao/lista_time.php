<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
          <div id='time_removido'></div>
          <h2> Times </h2><br>
          <ul>";

    $select = "SELECT * FROM times ORDER BY nome";
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){
        $nome = $row["nome"];
        $id = $row["id_time"];
        echo "<li><h4>$nome <button class='remover_time' value='$id'>ˣ</button></h4></li>";
    }
    echo "</ul>";

rodape();

?>