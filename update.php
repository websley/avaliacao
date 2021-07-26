<?php

include 'conection.php';

    $dados = $_POST;
    try {
        $conn->beginTransaction();
        update_endereco($conn, $dados);
        update_cliente($conn, $dados);
        $conn->commit();
        header('Location: index.php?sucesso');
    } catch (\Throwable $e) {
        $conn->rollback();
        echo $e->getMessage();
        // header('Location: ;index.php?error');
    }

    function update_endereco($conn, $dados){
        
        $sql = 
        "UPDATE enderecos set 
            logradouro = :logradouro, 
            numero = :numero, 
            bairro = :bairro, 
            id_cidade = :id_cidade, 
            cep = :cep
        WHERE id_endereco = :id_endereco";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam( ':id_endereco', $dados['id_endereco']);
        $stmt->bindParam( ':logradouro', $dados['logradouro']);
        $stmt->bindParam( ':numero', $dados['numero']);
        $stmt->bindParam( ':bairro', $dados['bairro']);
        $stmt->bindParam( ':id_cidade', $dados['id_cidade']);
        $stmt->bindParam( ':cep', $dados['cep']);

        $stmt->execute();
    }

    function update_cliente($conn, $dados){
        $sql_cliente = 
        "UPDATE cliente set 
            nome_razao = :nome_razao, 
            fantasia = :fantasia, 
            cpf_cnpj = :cpf_cnpj, 
            ie = :ie, 
            data_nascimento = :data_nascimento, 
            sexo = :sexo
        WHERE id_cliente = :id_cliente ";

        $nome_razao = $dados['nome_cliente'] == "" ? $dados['razao'] : $dados['nome_cliente'] ;
        $cpf_cnpj = $dados['cpf']  == "" ? $dados['cnpj'] : $dados['cpf'] ;
        $sexo = $dados['cnpj']  == "" ? $dados['sexo'] : null ;
        $data = $dados['data_nascimento'] == "" ? null : $dados['data_nascimento'];

        $stmt = $conn->prepare( $sql_cliente );
        $stmt->bindParam( ':nome_razao', $nome_razao);
        $stmt->bindParam( ':fantasia', $dados['fantasia']);
        $stmt->bindParam( ':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam( ':ie', $dados['ie']);
        $stmt->bindParam( ':data_nascimento', $data);
        $stmt->bindParam( ':sexo', $sexo);
        $stmt->bindParam( ':id_cliente', $dados['id_cliente']);
      
        $stmt->execute();
    }
?>