<?php
    include "conexao.php";
    $select = "SELECT * FROM campeonatos ORDER BY nome";    

    $res = mysqli_query($con, $select)
        or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($res)){

        $id = $row["id_campeonato"];

        $id_campeonato = $row["id_campeonato"];
        $select2 = "SELECT *
                    FROM times_campeonato
                    WHERE cod_campeonato = '$id_campeonato'
                    ORDER BY times_campeonato.cod_campeonato";

        $res2 = mysqli_query($con, $select2);
        echo "<h2><b>".$row["nome"]."</b>"; 
        if(isset($_SESSION["usuario"]) && $_SESSION["usuario"] == $id_campeonato){ // So pode alterar o dado se for o dono do campeonato
            echo "<button class='alterar_campeonato' value='$id' data-toggle='modal' data-target='#modal'>✏️</button> 
            <button class='remover_campeonato' value='$id'>ˣ</button>";
        }
        echo "</h2><ul>";
        while($row2 = mysqli_fetch_assoc($res2)){
            echo "<li class='camp$id'>".$row2["nome_time"]."</li>";
        }
        echo "</ul>";
        echo"<br>";
    }
?>