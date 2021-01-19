<script src="js/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function(){

    var mexeu = 0;

    setInterval(function(){

        if(mexeu == 0){
            alert("Voce foi desconectado por inatividade!");
            $.get("logout.php", {},  function(msg){
                location.href = "index.php"
            })
        }else{
            mexeu = 0;
        }
       
     }, 300000);

     $("#html").mousemove(function(){
        mexeu = 1;
    });

    }); 
</script>
