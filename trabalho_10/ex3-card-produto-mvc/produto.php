<?php

class Produto
{
    public static function create($pdo, $nome, $marca, $descricao)
    {
        $sql = "INSERT INTO produto (nome, marca, descricao) VALUES (:nome, :marca, :descricao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':marca', $marca);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public static function get($pdo, $id)
    {
        $sql = "SELECT id, nome, marca, descricao FROM produto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $produto = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$produto) {
            throw new Exception("Produto não localizado");
        }

        return $produto;
    }

    public static function getFirst30($pdo)
    {
        $sql = "SELECT id, nome, marca, descricao FROM produto LIMIT 30";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function remove($pdo, $id)
    {
        $sql = "DELETE FROM produto WHERE id = :id LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}