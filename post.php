<?php
$url = "http://localhost/rest/server.php";

$data = [
    'nome' => 'Gustavo',
    'email' => 'gustavo@gmail.com'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
$resposta = curl_exec($ch);

$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);