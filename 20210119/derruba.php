<script src="js/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function(){

    var mexeu = 0;

    setInterval(function(){ // Verifica de 20 em 20 segundos, se atingir 3 ele fecha o login, ou reseta toda vez que o usuario mexe o mouse dentro do site

        mexeu++;

        if(mexeu == 2){
            alert("Tem alguem ai?");
        }else if(mexeu == 3){
            mexeu = 0;
            alert("Voce foi desconectado por inatividade!");
            $.get("logout.php", {},  function(msg){
                location.href = "index.php"
            })
        }
       
     }, 20000);

     $("#html").mousemove(function(){
        mexeu = 0;
    });

}); 
</script>
