<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticar</title>
</head>
<body>
    <?php
        if(!empty($_GET)){
            echo "<h5>Erro ao autenticar, Login e/ou Senha incorretos!</h5>";
        }
    ?>
    <h3>Autenticação</h3>
    <form action="autenticar.php" method="POST">
        <input type="email" placeholder="Email..." name="email" required><br><br>
        <input type="password" placeholder="Senha..." name="senha" required><br><br>
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>