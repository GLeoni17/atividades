<?php
include "conf.php";
include "conexao.php";

cabecalho();

echo "<link href='css/listar.css' rel='stylesheet' type='text/css'>
      <div id='jogador_removido'></div>
      <div class='flex'>";

echo "<table>
    <tr>
        <th class='com_borda'>Nome</th>
        <th class='com_borda'>Idade</th>
        <th class='com_borda'>Posição</th>
        <th class='com_borda'>Time</th>
    </tr>
";


$select = "SELECT jogadores.id_jogador as id_jogador, jogadores.nome as nome_jogador, jogadores.idade as idade_jogador, jogadores.posicao as posicao_jogador, times.id_time as id_time, times.nome as nome_time
           FROM jogadores INNER JOIN times ON (jogadores.cod_time = times.id_time)
           ORDER BY nome_jogador";


$res = mysqli_query($con, $select) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($res)){
    $id = $row["id_jogador"];
    $nome = $row["nome_jogador"];
    $idade = $row["idade_jogador"];
    $posicao = $row["posicao_jogador"];
    if($row["id_time"] == "-1"){
        $time = "Sem Time";
    }else{
        $time = $row["nome_time"];
    }
    echo "<tr>
            <td class='com_borda'>$nome</td>
            <td class='com_borda'>$idade</td>
            <td class='com_borda'>$posicao</td>
            <td class='com_borda'>$time</td>
            <td><button class='alterar_time' value='$id'>✏️</button><td> 
            <td><button class='remover_jogador' value='$id'>X</button></td>
          </tr>";
}

echo "</table>";

echo "</div>";

rodape();

?>