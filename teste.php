<?php
    include_once "conexao.php";

    // $atualiza = [
    //     'id' => 1,
    //     'nome' => 'teste',
    //     'email' => 'teste@gamil.com'
    // ];
    // $update = $con->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :id");
    // if($update->execute($atualiza)) {
    //     echo json_encode(['Mensagem' => "[SUCESSO] Atualizado com sucesso!"]);
    // } else {
    //     echo json_encode(['Mensagem' => "[ERRO] Erro ao atualizar!"]);
    // }


    $novo = [
        'nome' => 'Guh',
        'email' => 'gus@teste.com'
    ];

    $insert = $con->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
    
    if($insert->execute($novo)) {
        echo json_encode(['Mensagem' => "[SUCESSO] Cadastrado com sucesso!"]);
    } else {
        echo json_encode(['Mensagem' => "[ERRO] Não fopossível cadastrar!"]);
    }
