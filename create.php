<?php

include 'conection.php';

    $dados = $_POST;
    
    try {
        $conn->beginTransaction();
        $id_endereco = insere_endereco($conn, $dados);
        insere_cliente($conn, $dados, $id_endereco);
        $conn->commit();
        header('Location: index.php?sucesso');
    } catch (\Throwable $e) {
        $conn->rollback();
        echo '<pre>';
        var_dump($e->getMessage());
        die();
        header('Location: index.php?error');
    }

    function insere_endereco($conn, $dados){
        
        $sql = "INSERT INTO enderecos (logradouro, numero, bairro, id_cidade, cep) 
                VALUES(:logradouro, :numero, :bairro, :id_cidade, :cep)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam( ':logradouro', $dados['logradouro']);
        $stmt->bindParam( ':numero', $dados['numero']);
        $stmt->bindParam( ':bairro', $dados['bairro']);
        $stmt->bindParam( ':id_cidade', $dados['id_cidade']);
        $stmt->bindParam( ':cep', $dados['cep']);

        $stmt->execute();

        return $conn->lastInsertId();
    }

    function insere_cliente($conn, $dados, $id_endereco){
        $sql_cliente = "INSERT INTO cliente (nome_razao, fantasia, cpf_cnpj, ie, data_nascimento, sexo, id_endereco) 
                VALUES(:nome_razao, :fantasia, :cpf_cnpj, :ie, :data_nascimento, :sexo, :id_endereco)";

        $nome_razao = $dados['nome_cliente'] == "" ? $dados['razao'] : $dados['nome_cliente'] ;
        $cpf_cnpj = $dados['cpf']  == "" ? $dados['cnpj'] : $dados['cpf'] ;
        $sexo = $dados['cpf']  == "" ? $dados['sexo'] : null ;
        $data = $dados['data_nascimento'] == "" ? null : $dados['data_nascimento'];
        $stmt = $conn->prepare( $sql_cliente );
        $stmt->bindParam( ':nome_razao', $nome_razao);
        $stmt->bindParam( ':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam( ':fantasia', $dados['fantasia']);
        $stmt->bindParam( ':ie', $dados['ie']);
        $stmt->bindParam( ':data_nascimento', $data);
        $stmt->bindParam( ':sexo', $sexo);
        $stmt->bindParam( ':id_endereco', $id_endereco);

        $stmt->execute();
    }
?>