<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    $select = "SELECT nome FROM times ORDER BY nome";
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){
        $nome = $row["nome"];
        echo "<h3>$nome</h3>";
    }

rodape();

?>