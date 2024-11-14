<?php
/* $url = "http://localhost/rest/server.php"; */
include_once 'config.php';

$ch = curl_init(ENDPOINTS);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L3Jlc3Qvand0LnBocCIsImlhdCI6MTczMTU0NjMyOCwiZXhwIjoxNzMxNTQ5OTI4LCJkYXRhIjp7ImlkIjoxMjMsIm5vbWUiOiJHdXN0YXZvIEEifX0.KdKg9H69n_5ongFS7Y-jfEV5HEkLwFnMN2R5EKqtvfQ',
    'Content-Type: application/json'
]);
$resposta = curl_exec($ch);
$dados = json_decode($resposta, true); /* Transformando em array associativo */

echo "<pre>";
print_r($dados);
curl_close($ch);