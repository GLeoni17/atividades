<?php

    if($_GET["x"]=='' || $_GET["x"]=='0' || !is_numeric($_GET["x"])){
        $valor=1;
    }else{
        $valor=$_GET["x"];
    }

    echo (($valor*6)/10)*(5*1/(3*$valor));
?>