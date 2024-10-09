<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
    SELECT nome as "nome aluno", telefone
    FROM aluno
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3>Tabela <b>aluno</b></h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
      </tr>
      <?php
      while ($objAluno = $stmt->fetch(PDO::FETCH_OBJ)) 
      {
        $nome = htmlspecialchars($objAluno->{"nome aluno"});
        $telefone = htmlspecialchars($objAluno->telefone);

        echo <<<HTML
        <tr>
          <td>$nome</td> 
          <td>$telefone</td>
        </tr>      
        HTML;
      }
      ?>
    </table>


    <a href="../index.html">Opções</a>
  </div>

</body>

</html>