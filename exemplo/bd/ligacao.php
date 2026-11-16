<?php
$ficheiroBD = __DIR__ . '/aragem.sqlite';

try {
    $bd = new PDO('sqlite:' . $ficheiroBD);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    http_response_code(500);
    $mensagem = 'Erro ao ligar à base de dados: ' . $erro->getMessage();
}


