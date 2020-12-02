<?php
    include "conexao.php";
    $nome = $_POST["nome_time"];
    $query = "INSERT INTO times(
                            nome
                          ) VALUES (
                            '$nome'  
                          )";
    mysqli_query($con, $query) or die(mysqli_error($con));    
?>
<!DOCTYPE html>
<script>
    window.location.href = "index.php";
</script>
</html>