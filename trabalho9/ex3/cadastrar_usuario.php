<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = htmlspecialchars(trim($_POST['senha']));

    if (!empty($email) && !empty($senha)) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $linha = "$email,$hash\n";
        file_put_contents('usuarios.txt', $linha, FILE_APPEND);
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>