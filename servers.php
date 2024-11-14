<?php
// Use em apenas em modo desenvolvimento
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
header("Acces-Control-Allow-Methods: GET, POST, PUT, DELETE");
require 'vendor/autoload.php';
include_once "conexao.php";
include_once "config.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$cabecalho = getallheaders();
if(isset($cabecalho['Authorization'])) {
    $chave = str_replace('Bearer', '', $cabecalho['Authorization']);
    $assinatura = new Key(CHAVE_SECRETA, 'HS256');
    $usuario = JWT::decode($chave, $assinatura);
    if($usuario) {
        echo json_encode(['Mensagem' => "Acesso autorizado", 'dados' => $usuario]);
    } else {
        http_response_code(401);
        echo json_encode(['Mensagem' => "Token inválido"]);
    }
} else {
    http_response_code(401);
    echo json_encode(['Mensagem' => "Cabeçalho de autorização ausente"]);
}