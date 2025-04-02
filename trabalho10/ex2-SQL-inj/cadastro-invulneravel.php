<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

// Coleta e sanitiza os dados
$nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : "";
$telefone = isset($_POST["telefone"]) ? trim($_POST["telefone"]) : "";

// Validação básica
$erros = [];
if (empty($nome)) {
    $erros[] = "O nome é obrigatório";
}
if (empty($telefone)) {
    $erros[] = "O telefone é obrigatório";
}

// Se houver erros, mostra e encerra
if (!empty($erros)) {
    header('Content-Type: text/html; charset=utf-8');
    echo "<h3>Erros encontrados:</h3>";
    echo "<ul>";
    foreach ($erros as $erro) {
        echo "<li>$erro</li>";
    }
    echo "</ul>";
    echo "<a href='javascript:history.back()'>Voltar</a>";
    exit();
}

try {
    // Usando prepared statements para prevenir injeção SQL
    $sql = "INSERT INTO aluno (nome, telefone) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Executa a query com os parâmetros seguros
    $stmt->execute([$nome, $telefone]);
    
    // Redireciona em caso de sucesso
    header("location: mostra-alunos.php");
    exit();
} 
catch (Exception $e) {
    // Log do erro (não mostra detalhes ao usuário)
    error_log("Erro ao cadastrar aluno: " . $e->getMessage());
    
    // Mensagem genérica para o usuário
    exit('Falha ao cadastrar os dados. Por favor, tente novamente mais tarde.');
}