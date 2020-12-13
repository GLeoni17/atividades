<?php
    include "conexao.php";
    $nome = $_POST["nome_time"];
    $query = "INSERT INTO times(
                            nome
                          ) VALUES (
                            '$nome'  
                          )";
    mysqli_query($con, $query) or die(mysqli_error($con)); 
    
    $select "SELECT id_time FROM times WHERE nome='$nome'";
    $res = mysqli_query($con, $select);

                           
    $id = $_POST["id"];
    $id_time = $res["id_time"];

    $query = "UPDATE usuario SET cod_time=$id_time WHERE id_usuario = '$id'";
    mysqli_query($con, $query) or die(mysqli_error($con)); 


?>
<!DOCTYPE html>
<script>
    //window.location.href = "index.php";
</script>
</html>