<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = htmlspecialchars(trim($_POST['usuario']));
    $senha = htmlspecialchars(trim($_POST['senha']));
    $email = htmlspecialchars(trim($_POST['email']));

    if (!empty($usuario) && !empty($senha) && !empty($email)) {
        $linha = "$usuario,$senha,$email\n";
        file_put_contents('clientes.txt', $linha, FILE_APPEND);
        header('Location: listar_clientes.php');
        exit;
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
}
?>