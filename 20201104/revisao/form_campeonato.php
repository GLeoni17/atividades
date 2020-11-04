<?php
include "conf.php";
include "conexao.php";

cabecalho();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cadastra").click(function() {
                var nome = $("#nome").val();
                console.log(nome);
                var checkbox_value = Array();
                var i=0;
                $("input[name='times[]']").each(function () {
                    var ischecked = $(this).is(":checked");
                    if (ischecked) {
                        checkbox_value[i] = $(this).val();
                        i++;
                    }
                });
                $.post("insere_campeonato.php", {"nome":nome, "checkbox_value":checkbox_value}, function(data){
                    console.log(data);
                });
            });
        });
    </script>
</head>
<body>
    <form>
        <input type="text" id="nome" name="nome_campeonato" placeholder="Nome do campeonato..."><br><br>
            <?php
                $select = "SELECT * FROM times ORDER BY nome";
                $res = mysqli_query($con, $select);
                while($row = mysqli_fetch_assoc($res)){
                    echo "<br>";
                    echo "<input type='checkbox' name='times[]' value=".$row["nome"]."> ".$row["nome"]."<br>";
                }
            ?><br><br>
        <input type="button" id="cadastra" value="Cadastrar">
    </form>
</body>
</html>

<?php

rodape();

?>