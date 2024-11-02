<?php
/* Pegando a url do nosso servidor */
$url = 'http://localhost/rest/server.php';

/* Guardando dados em um array */
$data = [
    'id' => 1
];

/* Inicia o método cURL pegando a url do servidor como parametro */
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Pega o tipo de requisição, nesse caso estamos formatando para uma requisição customizada */
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: aplication/json'
]);

$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);