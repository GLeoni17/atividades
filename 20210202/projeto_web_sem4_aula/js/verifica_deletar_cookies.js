$(document).ready(function () {
  
  atualiza_tabela_cookies();

  $("#apaga_cookies").click(function () {

    var cookies_deletar = [];

    $("input[name='cookie']:checked").each(function() {
      cookies_deletar.push($(this).val());
    });

    $.post("deletar_cookie.php", { cookies_deletar }, function (teste) {
      if(teste == 1){
        atualiza_tabela_cookies();
      }      
    });

  });
});

function atualiza_tabela_cookies(){
  $.post("apresenta_cookies.php", {}, function (conteudo) {
    $("#div_cookies").html(conteudo);
  });
}
