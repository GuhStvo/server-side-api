<?php

$host = "localhost";
$banco = "lojatechteste";
$user = "root";
$senha = "";

$con = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
if(!$con) {
    echo "Deu ruim 😥";
}