<?php

include "conf.php";
include "conexao.php";

cabecalho();

$select = "SELECT * FROM campeonatos ORDER BY nome";

$res = mysqli_query($con, $select)
        or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){

        $id_campeonato = $row["id_campeonato"];
        $select2 = "SELECT *
                    FROM times_campeonato
                    WHERE cod_campeonato = '$id_campeonato'
                    ORDER BY times_campeonato.cod_campeonato";

        $res2 = mysqli_query($con, $select2);
        echo "<h2><b>".$row["nome"]."</b></h2>";
        echo "<ul>";
        while($row2 = mysqli_fetch_assoc($res2)){
            echo "<li>".$row2["nome_time"]."</li>";
        }
        echo "</ul>";
        echo"<br>";
    }

    rodape();

?>