<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>Exercício Compartilhado</title>
    </head>
    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        
    </style>

    <script>
        $(document).ready(function(){

            $("#campo").keyup(function(){
                $("#quadrado2").html($("#campo").val());
            });

            $("#negrito").click(function(){
                if($("#quadrado2").css("font-weight")==700){
                    $("#quadrado2").css("font-weight", "normal");
                }else{
                    $("#quadrado2").css("font-weight", "bold");
                }
            });

            $("#italico").click(function(){
                if($("#quadrado2").css("font-style")=="italic"){
                    $("#quadrado2").css("font-style", "normal");
                }else{
                    $("#quadrado2").css("font-style", "italic");
                }
            });

            $("#sublinhado").click(function(){
                if($("#quadrado2").css("text-decoration")=="none solid rgb(0, 0, 0)"){
                    $("#quadrado2").css("text-decoration", "underline");
                }else{
                    $("#quadrado2").css("text-decoration", "none");
                }
            });
                
        });
            
    </script>

    <body>
        
        <h3> Exercicio Compartilhado</h3>
		
        <img id="negrito" src="negrito.png" />
        <img id="italico" src="italico.png"/>
        <img id="sublinhado" src="sublinhado.png"/>
        
        <div id="quadrado"><textarea id = "campo" name = "campo" placeholder="Digite aqui" ></textarea></div>
		
        <div id="quadrado2"></div>
        
    </body>
</html>
