<?php
    include "conexao.php";

    function select(){
        include "conexao.php";
        $select = "SELECT nome_cientifico, id_familia FROM familia ORDER BY nome_cientifico";
        $res = mysqli_query($con, $select);
        while($linha = mysqli_fetch_assoc($res)){
            echo "<option value=".$linha["id_familia"].">".$linha["nome_cientifico"]."</option>";
        };
    }

    function table(){
        include "conexao.php";
        $select="SELECT especie.nome as nome_especie, especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico as genero_especie, familia.nome_cientifico as familia_especie FROM especie INNER JOIN genero ON especie.cod_genero=genero.id_genero INNER JOIN familia ON genero.cod_familia=familia.id_familia ORDER BY nome_especie, nome_cientifico_especie, genero_especie, familia_especie ";
        $res=mysqli_query($con, $select);
        while($linha=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo"<td>".$linha["nome_especie"]."</td>"; 
            echo"<td>".$linha["nome_cientifico_especie"]."</td>"; 
            echo"<td>".$linha["genero_especie"]."</td>"; 
            echo"<td>".$linha["familia_especie"]."</td>"; 
            echo "</tr>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#familia").change(function(){
                    //PHP pra buscar
                    var id = $("#familia").val();
                    $.post("seleciona_genero.php", {"id":id}, function(msg){

                    });
                });
            });
        </script>

    </head>
    <body>
        <table border="1px">
        <h3>Filtrar por:</h3>
        <select id="familia">
            <option value="">::SELECIONE UMA FAMÍLIA::</option>
            <?php select(); ?>
        </select>
        <br><br>
        <select id="genero">
            <option>::SELECIONE UM GÊNERO::</option>
        </select>

            <tr >
                <th colspan="4">Especie</th>
            </tr>
            <tr>
                <td>Nome</td>
                <td>Nome Científico</td>
                <td>Gênero</td>
                <td>Família</td>
            </tr>
            <?php table(); ?>
        </table>
    </body>
</html>