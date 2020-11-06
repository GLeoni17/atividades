<?php
include "conf.php";
include "conexao.php";

cabecalho();

echo "<div class='flex'>";

echo "<table border='1px solid black'>
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Posição</th>
        <th>Time</th>
    </tr>
";


$select = "SELECT jogadores.nome as nome_jogador, jogadores.idade as idade_jogador, jogadores.posicao as posicao_jogador, times.id_time as id_time, times.nome as nome_time
           FROM jogadores INNER JOIN times ON (jogadores.cod_time = times.id_time)
           ORDER BY nome_jogador";


$res = mysqli_query($con, $select) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($res)){
    $nome = $row["nome_jogador"];
    $idade = $row["idade_jogador"];
    $posicao = $row["posicao_jogador"];
    if($row["id_time"] == "-1"){
        $time = "Sem Time";
    }else{
        $time = $row["nome_time"];
    }
    echo "<tr>
            <td>$nome</td>
            <td>$idade</td>
            <td>$posicao</td>
            <td>$time</td>
    </tr>";
}

echo "</table>";

echo "</div>";

rodape();

?>