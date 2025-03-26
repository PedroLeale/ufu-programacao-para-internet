<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = htmlspecialchars(trim($_POST['senha']));

    if (file_exists('usuarios.txt')) {
        $linhas = file('usuarios.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($linhas as $linha) {
            list($emailCadastrado, $hashCadastrado) = explode(',', $linha);
            if ($email === $emailCadastrado && password_verify($senha, $hashCadastrado)) {
                header('Location: sucesso.html');
                exit;
            }
        }
    }
    header('Location: login.php');
    exit;
}
?>