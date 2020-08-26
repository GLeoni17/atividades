<!DOCTYPE html>
<?php $_SESSION["frutas_existentes"]=array();?>

<html>
    
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
               $("#cadastra_fruta").click(function(){
                var fruta_atual=$("input[name='nome_fruta_atual']").val();
                $("#ja_registrou").css("color", "red");
                $.get("recebe_frutas.php", {"fruta":fruta_atual}, function(tem_fruta){

                    if(tem_fruta=="Nova Fruta Cadastrada."){
                        $("#frutas").html($("#frutas").html()+"<li>"+fruta_atual+"</li>");
                        $("#ja_registrou").css("color", "green");
                    }
                    $("#ja_registrou").html(tem_fruta);
                });
               });
            });
        </script>
    </head>
    <body>
            <input type="text" name="nome_fruta_atual" placeholder="Cadastre uma fruta...">
            <button id="cadastra_fruta">Cadastro Assincrono</button>
            <br><br>
            <span style="font-size: 20px" id="ja_registrou"></span>
            <br><br>
            <div style="font-size: 20px" id="frutas"></div>
    </body>
</html>