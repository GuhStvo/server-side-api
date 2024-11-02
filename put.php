<?php
$url = "http://localhost/rest/server.php";
$data = [
    'id' => 8,
    'nome' => 'Gustavo',
    'email' => 'gustvo@gmail.com'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); /* Passando informações do json */
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: aplication/json'
]);
$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);