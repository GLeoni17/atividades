<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    echo "<h2> Times </h2><br>
            <ul>";

    $select = "SELECT nome FROM times ORDER BY nome";
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){
        $nome = $row["nome"];
        echo "<li><h4>$nome</h4></li>";
    }
    echo "</ul>";

rodape();

?>