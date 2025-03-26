<?php
$usuarios = [];
if (file_exists('usuarios.txt')) {
    $linhas = file('usuarios.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        $dados = explode(',', $linha);
        $usuarios[] = [
            'email' => htmlspecialchars($dados[0]),
            'hash' => htmlspecialchars($dados[1]),
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Usuários</title>
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Email</th>
                <th>Hash da Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['hash'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>