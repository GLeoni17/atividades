<script src ="js/jquery-3.5.1.min.js"></script>
<script src ="js/MD5.js"></script>
<script>
    $(function(){



        $(".autenticar").click(function(){
            var senha_md5 = $.md5($("input[name='senha']").val());
            $("input[name='senha']").val(senha_md5);
            $("#login").submit();
        });

        // Cadastro

        /*$("input[name='c_senha_cadastro']").blur(function(){
            var senha = $("input[name='senha_cadastro']").val();
            var confirma_senha = $("input[name='c_senha_cadastro']").val();
            if(senha != confirma_senha){
              $("#senha_errada").html("As senhas não condizem");
            }
        });

        $("input[name='c_senha_cadastro']").keyup(function(){
          $("#senha_errada").html("");
        });*/

        $(".cadastrar").click(function(){
            var senha_md5 = $.md5($("input[name='senha_cadastro']").val());
            $("input[name='senha_cadastro']").val(senha_md5);
            $("#cadastro").submit();
        });

    });

</script>



<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="login" method="post" action="autenticacao.php">
          <input type="email" name="email" placeholder="Email..." required> <br><br>
          <input type="password" name="senha" placeholder="Senha..." required> <br><br>
        </form>
        <h6>Ainda não é cadastrado? <strong><a href="">Cadastre-se Aqui</a></strong></h6>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Cancelar</button>
        <button type="button" class="autenticar">Autenticar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cadastro" method="post" action="cadastro.php">
          <input type="text" name="nome" placeholder="Nome..." required> <br><br>
          <input type="email" name="email" placeholder="Email..." required> <br><br>
          <input type="password" name="senha_cadastro" placeholder="Senha..." required> <br><br>
          <input type="password" name="c_senha_cadastro" placeholder="Confirmar senha..." required> <span id="senha_errada"></span><br><br>
          <input type="text" name="posicao" placeholder="Posição que joga..."> <br><br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Cancelar</button>
        <button type="button" class="cadastrar">Cadastrar</button>
      </div>
    </div>
  </div>
</div>