<?php
$url = "http://localhost/rest/server.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resposta = curl_exec($ch);
$dados = json_decode($resposta, true); /* Transformando em array associativo */

echo "<pre>";
print_r($dados);
curl_close($ch);