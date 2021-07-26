<?php
session_start();
include 'conection.php';

    $dados = $_GET;

     
    $sql = "DELETE FROM cliente WHERE id_cliente = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $dados['id']);

    try {
        $conn->beginTransaction();
        $stmt->execute();
        $conn->commit();
        $_SESSION['message']['success'] = "Cadastro feito com sucesso!";
        header('Location: index.php?sucesso');
    } catch (\Throwable $e) {
        $conn->rollback();
        $_SESSION['message']['error'] = $e->getMessage();
        // echo $e->getMessage();
        header('Location: index.php?error');
    }

 

   
?>