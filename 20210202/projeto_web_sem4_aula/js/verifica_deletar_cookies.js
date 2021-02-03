$(document).ready(function () {
  
  atualiza_tabela_cookies();

  $("#apaga_cookies").click(function () {

    var cookies_deletar = [];

    $("input[name='cookie']:checked").each(function() {
      cookies_deletar.push($(this).val());
    });
    
    $.each(cookies_deletar, function (index, value) {
        $.post("deletar_cookie.php", { value }, function (msg) {});
        $("#"+value).remove();
    });

  });
});

function atualiza_tabela_cookies(){
  $.post("apresenta_cookies.php", {}, function (conteudo) {
    $("#div_cookies").html(conteudo);
  });
}
