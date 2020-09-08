<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
                $("#cep").blur(function(){
                    var cep=$("input[name='cep']").val();
                    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(valores){
                        if(!("erro" in valores)){
                            $("#endereco").val(valores.logradouro);
                            $("#complemento").val(valores.complemento);
                            $("#bairro").val(valores.bairro);
                            $("#cidade").val(valores.localidade);
                            $("#estado").val(valores.uf);
                            $("#numero").focus();
                        }else{
                            alert("Endereço não encontrado!");
                            $("#cep").val("");
                        }
                        
                    });
                });
            });
        </script>
        <style>
            .centralizacep, .centralizaend, .centralizacomp, .centralizabar, .centralizacid, .centralizaest, .centralizanum{
                margin: 0;
                position: absolute;
                margin-right: -50%;
                transform: translate(-50%, -50%);
                width:200px;
            }
            .centralizacep{
                width:80px;
                top: 20%;
                left: 50%;
            }
            .centralizaend{
                top: 55%;
                left: 30%;
            }
            .centralizacomp{
                top: 65%;
                left: 70%;
            }
            .centralizabar{
                top: 55%;
                left: 70%;
            }
            .centralizacid{
                top: 65%;
                left: 30%;
            }
            .centralizaest{
                top: 65%;
                left: 50%;
            }
            .centralizanum{
                top: 55%;
                left: 50%;
            }
        </style>
    </head>
    <body>
        
        <input type="text" id="cep" name="cep" placeholder="CEP..." maxlength="8" class="centralizacep"></input>
        <br><br>
        <input readonly type="text" id="endereco" placeholder="Endereço..." class="centralizaend" title="Endereço"></input>
        <input readonly type="text" id="complemento" placeholder="Complemento..." class="centralizacomp" title="Complemento"></input>
        <input readonly type="text" id="bairro" placeholder="Bairro..." class="centralizabar" title="Bairro"></input>
        <br><br>
        <input readonly type="text" id="cidade" placeholder="Cidade..." class="centralizacid" title="Cidade"></input>
        <input readonly type="text" id="estado" placeholder="Estado..." class="centralizaest" title="Estado"></input>
        <input type="number" id="numero" placeholder="Numero..." class="centralizanum" title="Numero"></input>
    </body>
</html>
