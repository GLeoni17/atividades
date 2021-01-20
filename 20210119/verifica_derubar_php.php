<?php
    if(isset($_SESSION["entrada"])){
        if(time() - $_SESSION["entrada"] >= 60){
            echo "1";
        }else{
            echo "0";
        }
    }
?>