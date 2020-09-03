<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
                $("input[name='cep']").blur(function(){
                    var cep=$("input[name='cep']").val();
                    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(valores){
                        $("#endereco").val(valores.logradouro)
                        $("#numero").val(valores.complemento)
                        $("#bairro").val(valores.bairro)
                        $("#cidade").val(valores.localidade)
                        $("#estado").val(valores.uf)
                    });
                });
            });
        </script>
    </head>
    <body>
        <input type="text" name="cep" placeholder="CEP..." maxlength="8"></input>
        <br><br>
        <input readonly type="text" id="endereco" placeholder="Endereço..."></input>
        <input readonly type="text" id="numero" placeholder="Número..."></input>
        <input readonly type="text" id="bairro" placeholder="Bairro..."></input>
        <br><br>
        <input readonly type="text" id="cidade" placeholder="Cidade..."></input>
        <input readonly type="text" id="estado" placeholder="Estado..."></input>
    </body>
</html>
