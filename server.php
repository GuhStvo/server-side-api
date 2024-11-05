<?php
// Use em apenas em modo desenvolvimento
error_reporting(E_ALL);
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD']; /* Método que foi requisitado */

include_once "conexao.php";

switch($metodo) {
    case 'GET':
        // echo json_encode(["O método requisitado é GET"]);
        try {
            $select = $con->prepare("SELECT * FROM usuario");
            $select->execute();
            $dados = $select->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($dados);
        } catch (Exception $e) {
            echo json_encode(['Erro' => $e->getMessage()]);
        }
        break;
/* ---------------------------------------------------------------------------------- */
    case 'POST':
        // echo json_encode(["O método requisitado é POST"]);
        $input = json_decode(file_get_contents('php://input'), true);
        if(isset($input['nome']) && isset($input['email'])) {
            $novo = [
                'nome' => $input['nome'],
                'email' => $input['email']
            ];

            $insert = $con->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
            
            if($insert->execute($novo)) {
                echo json_encode(['Mensagem' => "[SUCESSO] Cadastrado com sucesso!"]);
            } else {
                echo json_encode(['Mensagem' => "[ERRO] Não foi possível cadastrar!"]);
            }
        }
        break;
/* ---------------------------------------------------------------------------------- */
    case 'PUT':
        // echo json_encode(["O método requisitado é PUT"]);

        $input = json_decode(file_get_contents('php://input'),true);
        $atualiza = [
            'id' => $input['id'],
            'nome' => $input['nome'],
            'email' => $input['email']
        ];
        $update = $con->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = ?");
        if($update->execute($atualiza)) {
            echo json_encode(['Mensagem' => "[SUCESSO] Atualizado com sucesso!"]);
        } else {
            echo json_encode(['Mensagem' => "[ERRO] Erro ao atualizar!"]);
        }
    
        break;
/* ---------------------------------------------------------------------------------- */
    case 'DELETE':
        // echo json_encode(["O método requisitado é DELETE"]);
        $input = json_decode(file_get_contents('php://input'),true);
        $delete = $con->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        /* Execute precisa ser inserido em um array */
        echo [$id];
        if($delete->execute([$id])) {
            echo json_encode(['Mensagem' => "[SUCESSO] Deletado com sucesso!"]);
        } else {
            echo json_encode(['Mensagem' => "[ERRO] Erro ao deletar!"]);
        }

        break;
/* ---------------------------------------------------------------------------------- */
    default:
        http_response_code(405);
        echo json_encode(['mensagem' => "Método invalido!"]);
        break;
}