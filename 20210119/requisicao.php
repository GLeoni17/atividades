<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisicao</title>
    <?php
        session_start();
        date_default_timezone_set('UTC');

        if ((time() - $_SESSION["entrada"]) >= 60){
           session_destroy();
		   header("location: form_login.html");
        }else{
            $_SESSION["entrada"] = time();
        }
    ?>
</head>
<body>
    <p>Isso é uma pagina para testar requisição</p>
    <p><a href="index.php">Voltar para index.php</a></p>
</body>
</html>