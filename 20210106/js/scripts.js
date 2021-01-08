var tts_verificar = 0;

function tts(mensagem) {
    if(tts_verificar==1 || tts_verificar == 3 || mensagem == "Texto para voz Desativado"){
        var msg = new SpeechSynthesisUtterance();
        msg.text = mensagem;
        window.speechSynthesis.speak(msg);
    }
}

function tts_modal(){
    if(tts_verificar == 1){
        tts_verificar = 3;
    }else if(tts_verificar == 0){
        tts_verificar = 2;
    }
}

function volta_tts_modal(){
    if(tts_verificar == 2){
        tts_verificar = 0;
    }else if(tts_verificar == 3){
        tts_verificar = 1;
    }
}

$(document).ready(function(){

    //Ativar desativar TTS

    //$("input").focusin(function(){alert('tesdt')})
    

    $("#html").keydown(function(){
        if(event.keyCode == 49){
            $("#tts").click();
        }
    });

    $("#html").mouseover(function(){
        if(tts_verificar > 1){
            volta_tts_modal();
        }
    });

    $(".ativar_tts").mouseover(function(){
        if(tts_verificar == 1){
            tts($(this).html());
        }
    });

    $("#tts").click(function(){

        //alert(tts_verificar);

        if ('speechSynthesis' in window) {

            if(tts_verificar == 0){
                tts_verificar=1;
            }else if(tts_verificar == 1){
                tts_verificar=0;
            }

            if(tts_verificar == 1){
                tts("Texto para voz Ativado");
            }else if(tts_verificar == 0){
                tts("Texto para voz Desativado");
            }
            
        }else{
            alert("Desculpe, o seu navegador não suporta Texto para Voz!");
        }
        
    });

    // Fim TTS

    $(".remover_time").click(function(){

        i = $(this).val();
        t = "times";
        c = "id_time";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $("#time_removido").html("Time removido com sucesso.");
                $("button[value='"+ i + "']").closest("li").remove();
            }else{
                $("#time_removido").html("O time tem jogadores, tire os jogadores antes de tirar o time!");
            }
        });

    });

    $(".remover_jogador").click(function(){

        i = $(this).val();
        t = "jogadores";
        c = "id_jogador";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $("#jogador_removido").html("Jogador removido com sucesso.");
                $("button[value='"+ i + "']").closest("tr").remove();
            }
        });

    });

    $(".remover_campeonato").click(function(){

        i = $(this).val();
        t = "times_campeonato";
        c = "cod_campeonato";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $(".camp"+i).remove();
            }
        });

        t = "campeonatos";
        c = "id_campeonato";
        p = {tabela:t, id:i, coluna:c};
        $.post("remover.php", p, function(r){
            if(r==1){
                $("#campeonato_removido").html("Campeonato removido com sucesso.");
                $("button[value='"+ i + "']").closest("h2").remove();
            }
        });
        
    });

});