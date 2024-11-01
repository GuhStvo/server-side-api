<?php
// Use em apenas em modo desenvolvimento
error_reporting(E_ALL);
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD']; /* Método que foi requisitado */

switch($metodo) {
    case 'GET':
        echo json_encode(["O método requisitado é GET"]);
        break;
    case 'POST':
        echo json_encode(["O método requisitado é POST"]);
        break;
    case 'PUT':
        echo json_encode(["O método requisitado é PUT"]);
        break;
    case 'DELETE':
        echo json_encode(["O método requisitado é DELETE"]);
        break;
    default:
        http_response_code(405);
        echo json_encode(['mensagem' => "Método invalido!"]);
        break;
}