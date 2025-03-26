<?php
$clientes = [];
if (file_exists('clientes.txt')) {
    $linhas = file('clientes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        $dados = explode(',', $linha);
        $clientes[] = [
            'usuario' => htmlspecialchars($dados[0]),
            'senha' => htmlspecialchars($dados[1]),
            'email' => htmlspecialchars($dados[2]),
        ];
    }
}
?>