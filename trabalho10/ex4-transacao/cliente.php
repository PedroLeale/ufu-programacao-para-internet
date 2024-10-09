<?php

class Cliente
{
  static function Create($pdo,
    $nome, $cpf, $email, $senhaHash, $dataNascimento, $estadoCivil, $altura,
    $cep, $logradouro, $bairro, $cidade) 
  {
    try {
      $pdo->beginTransaction();
      $stmt1 = $pdo->prepare(
        <<<SQL
        INSERT INTO cliente (nome, cpf, email, senhaHash, dataNascimento, estadoCivil, altura)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        SQL
      );
      $stmt1->execute([$nome, $cpf, $email, $senhaHash, $dataNascimento, $estadoCivil, $altura]);
      $idNovoCliente = $pdo->lastInsertId();
      $stmt2 = $pdo->prepare(
        <<<SQL
        INSERT INTO enderecoCliente (cep, logradouro, bairro, cidade, idCliente)
        VALUES (?, ?, ?, ?, ?)
        SQL
      );
      $stmt2->execute([$cep, $logradouro, $bairro, $cidade, $idNovoCliente]);
      $pdo->commit();
    } 
    catch (Exception $e) {
      $pdo->rollBack();
      throw $e;
    }
    return $pdo->lastInsertId();
  }

  static function GetFirst30($pdo)
  { 
    $stmt = $pdo->query(
      <<<SQL
      SELECT cliente.id, nome, cpf, email, senhaHash, DATE_FORMAT(dataNascimento, "%d-%m-%Y") as dataNascimento, 
        estadoCivil, altura, cep, logradouro, bairro, cidade
      FROM cliente INNER JOIN enderecoCliente ON cliente.id = enderecoCliente.idCliente
      LIMIT 30
      SQL
    );
    $arrayClientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arrayClientes;
  }
}
