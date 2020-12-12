<script>

    $(function(){

       var id_jogador, id_time; 

       function define_alterar_remover(){ 
       
        $(".alterar_jogador").click(function(){

            id_jogador = $(this).val();
            
            $.get("seleciona_jogador.php", {"id_jogador": id_jogador},function(r){
                a = r[0];
                $("input[name='nome_jogador']").val(a.nome_jogador);
                $("input[name='idade_jogador']").val(a.idade_jogador);                            
                $("input[name='posicao_time']").val(a.posicao_jogador);
                $("input[name='nome_time']").val(a.nome_time);
            });
        });

        $(".remover_time").click(function(){

            i = $(this).val();
            t = "jogadores";
            c = "id_jogador";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#msg").html("Jogador removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("Erro ao remover o jogador!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){
           /*var nome_time = $("input[name='nome_time']").val();
           $.post("achar_time.php", {"nome_time":nome_time}, function(r){
               console.log(r);
               id_time = r;
           });*/

           p = {
                id_jogador:id_jogador,
                //id_time:id_time,
                nome:$("input[name='nome_jogador']").val(),
                idade:$("input[name='idade_jogador']").val(),                           
                posicao:$("input[name='posicao_time']").val(),
           };
           
           
           $.post("atualizar_jogador.php", p ,function(r){
            if(r=='1'){
                $("#msg").html("Jogador alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o jogador.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_jogador.php",function(r){
            t = "";
            t+= "<table>";
            t+=     "<tr>";
            t+=         "<th class='com_borda'>Nome</th>";
            t+=         "<th class='com_borda'>Idade</th>";
            t+=         "<th class='com_borda'>Posição</th>";
            t+=         "<th class='com_borda'>Time</th>";
            t+=     "</tr>";
            $.each(r,function(i,a){   
                t+= "<tr>"
                t+=     "<td class='com_borda'>"+a.nome_jogador+"</td>";
                t+=     "<td class='com_borda'>"+a.idade_jogador+"</td>";
                t+=     "<td class='com_borda'>"+a.posicao_jogador+"</td>";
                t+=     "<td class='com_borda'>"+a.nome_time+"</td>";
                t+=     "<td><button class='alterar_jogador' value='$id' data-toggle='modal' data-target='#modal'>✏️</button><td> ";
                t+=     "<td><button class='remover_jogador' value='$id'>X</button></td>";
                t+= "</tr>";
                // Fazer um metodo post pra escrever    
            });
            t+= "</table>"           
            $("#tbody_jogador").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




