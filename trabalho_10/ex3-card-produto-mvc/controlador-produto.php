<?php

require "../conexaoMysql.php";
require "produto.php";

$acao = $_GET['acao'] ?? '';
$pdo = mysqlConnect();

// Função para lidar com erros e redirecionamentos
function handleError($message, $redirect = "produtos.html") {
    error_log($message); // Log do erro para depuração
    header("location: $redirect?error=" . urlencode($message));
    exit();
}

// Função para redirecionar com sucesso
function handleSuccess($redirect = "produtos.html") {
    header("location: $redirect?success=true");
    exit();
}

try {
    switch ($acao) {
        case "adicionarProduto":
            $nome = $_POST["nome"] ?? "";
            $marca = $_POST["marca"] ?? "";
            $descricao = $_POST["descricao"] ?? "";

            if (empty($nome) || empty($marca) || empty($descricao)) {
                handleError("Todos os campos são obrigatórios.");
            }

            Produto::Create($pdo, $nome, $marca, $descricao);
            handleSuccess();
            break;

        case "excluirProduto":
            $idProduto = $_GET["idProduto"] ?? "";

            if (empty($idProduto)) {
                handleError("ID do produto não fornecido.");
            }

            Produto::Remove($pdo, $idProduto);
            handleSuccess();
            break;

        case "listarProdutos":
            $arrayProdutos = Produto::GetFirst30($pdo);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($arrayProdutos);
            break;

        default:
            handleError("Ação não disponível.");
    }
} catch (Exception $e) {
    handleError("Erro: " . $e->getMessage());
}