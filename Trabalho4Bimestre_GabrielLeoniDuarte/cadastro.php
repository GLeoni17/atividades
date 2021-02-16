<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h3>Formulário de Cadastro para assinante</h3>
    <form action="aplicar_cadastro.php" method="POST">
        <input type="number" minlength="11" maxlength="11" placeholder="CPF..." name="cpf" required><br><br>
        <input type="text" maxlength="100" placeholder="Nome..." name="nome" required><br><br>
        <input type="email" maxlength="35" placeholder="E-mail..." name="email" required><br><br>
        <input type="password" maxlength="35" placeholder="Senha..." name="senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>