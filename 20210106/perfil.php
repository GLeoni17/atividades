<?php

include "conf.php";
include "conexao.php";

echo"<style>
    .container {
        position: relative;
    }
    
    .child {
        width: 300px;
        height: 100px;
        padding: 20px;
    
        position: absolute;
        top: 50%;
        left: 50%;
    
        margin: -70px 0 0 -170px;

        margin-top: 20px;
    }
</style>

";

cabecalho();

$id = $_SESSION['usuario'];

$select = "SELECT * FROM usuario WHERE id_usuario = '$id'";

$res = mysqli_query($con, $select) or die("Erro ao encontrar o usuario");

$dados = mysqli_fetch_assoc($res);

$nome = $dados["nome"];
$email = $dados["email"];
$nickname = $dados["nickname"];
$idade = $dados["idade"];
$posicao = $dados["posicao"];
$permissao = $dados["permissao"];


echo"<script>
    $(function(){
        document.getElementById('$permissao').checked = true;
        if($permissao == 1){
            document.getElementById('alterar_posicao').disabled = false;
        }
    })
    </script>
    <div class='container'>
    <div class='child'>
    <form id='alterar' method='post' action='atualizar_jogador.php?perfil=1'>

    <input type='hidden' name='alterar_id' value='$id'>

    <input type='text' name='alterar_nome' placeholder='Nome...' value='$nome' onmouseover=\"tts('nome')\"  onfocus=\"tts_modal()\" > <br><br>
    <input type='email' name='alterar_email' placeholder='Email...' value='$email' onmouseover=\"tts('e-mail')\"  onfocus=\"tts_modal()\"> <br><br>
    <input type='password' name='alterar_senha' placeholder='Trocar senha...' onmouseover=\"tts('trocar senha')\"  onfocus=\"tts_modal()\"> <br><br>

    <input type='text' name='alterar_nickname' placeholder='Nome no jogo...' value='$nickname' onmouseover=\"tts('nome no jogo')\"  onfocus=\"tts_modal()\"><br><br>
    <input type='number' name='alterar_idade' placeholder='Idade' value='$idade' onmouseover=\"tts('idade')\"  onfocus=\"tts_modal()\"> <br><br>

    <span onmouseover=\"tts('você é?')\"  onfocus=\"tts_modal()\"> Voce é? </span><br>
    <input type='radio' id='0' name='alterar_profissao' value='0' onmouseover=\"tts('apreciador')\"  onfocus=\"tts_modal()\"> Apreciador<br>
    <input type='radio' id='1' name='alterar_profissao' value='1' onmouseover=\"tts('jogador')\"  onfocus=\"tts_modal()\"> Jogador<br>
    <input type='radio' id='2' name='alterar_profissao' value='2' onmouseover=\"tts('dono de time')\"  onfocus=\"tts_modal()\"> Dono de time<br>
    <input type='radio' id='3' name='alterar_profissao' value='3' onmouseover=\"tts('organizador de campeonato')\"  onfocus=\"tts_modal()\"> Organizador de campeonato<br><br>

    <input id='alterar_posicao' type='text' name='alterar_posicao' placeholder='Posição que joga...' value='$posicao' disabled  onmouseover=\"tts('posição que joga)\"  onfocus=\"tts_modal()\"> <br><br>

    <input type='hidden' id='permissao' max='3'>

    <div class='modal-footer'>
        <button type='button' data-dismiss='modal'  class='ativar_tts' onclick=\"volta_tts_modal(); window.location.href = 'index.php'\">Cancelar</button>
        <button id='alterar' type='submit' class='alterar ativar_tts' onclick='volta_tts_modal(); tts('dado alterado com sucesso')'>Alterar</button>
    </div>

    </form>
  </div>
</div>";

rodape();

?>