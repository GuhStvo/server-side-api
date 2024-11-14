<?php
require 'vendor/autoload.php';
include_once "conexao.php";
include_once "config.php";

use Firebase\JWT\JWT;
$idUser = 123;
$nome = "Gustavo A";


$corpo = [
    'iss' => "http://localhost/rest/jwt.php", // Quem emitiu o token
    'iat' => time(), // Data de emissão
    'exp' => time() + 3600, // Expira em uma hora
    'data' => [
        'id' => $idUser,
        'nome' => $nome
    ]
];

$API_KEY = JWT::encode($corpo, CHAVE_SECRETA, 'HS256');

echo $API_KEY;