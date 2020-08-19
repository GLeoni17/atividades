<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <script src="jquery-3.5.1.min.js"></script>
    
    <script>

         $(document).ready(function(){
          $("#oculta").change(function(){

            if($("#img"+$("#oculta").val()).css("display")=="inline"){
              $("#img"+$("#oculta").val()).fadeOut();
              $("#mensagem_erro").html("");
            }else{
              $("#mensagem_erro").html("<h2> Imagem "+$("#oculta").val()+" já está oculta</h2>");
            }
            
            $("#oculta").val("::selecione qual ocultar::");

          })

          $("#aparece").change(function(){

            if($("#img"+$("#aparece").val()).css("display")=="none"){
              $("#img"+$("#aparece").val()).fadeIn();
              $("#mensagem_erro").html("");
           }else{
              $("#mensagem_erro").html("<h2> Imagem "+$("#aparece").val()+" já está na tela.</h2>");
           }
            
            $("#aparece").val("::selecione qual mostrar::");

          })

         });

    </script>

  </head>

  <body>

    <select id="oculta">
      <option>::selecione qual ocultar::</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>

    <select id="aparece">
      <option>::selecione qual mostrar::</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>  
    
    <br><br>

    <span id="mensagem_erro" style="color:red"></span>

    <img src="img1.png" id="img1">     
    <img src="img2.png" id="img2">
    <img src="img3.png" id="img3">
    <img src="img4.png" id="img4">
    <img src="img5.png" id="img5">
    <img src="img6.png" id="img6">
    <img src="img7.png" id="img7">
    <img src="img8.png" id="img8">

  </body>

</html>