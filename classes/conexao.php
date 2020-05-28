<?php

//cria conexão com DB
$localhost = "localhost";
$usuario = "root";
$senha = "";
$db = "afinidadePolitica";

$mySqli = new mysqli($localhost, $usuario, $senha, $db);

//verifica se conectou corretamente
if ($mySqli->connect_errno) {
    echo "Falha na conexão com o banco de dados. Erro: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
