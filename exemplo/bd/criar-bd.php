<?php
// Cria (ou recria) a base de dados bd/aragem.sqlite a partir dos ficheiros SQL.
//
// Duas formas de correr:
//   no terminal, na pasta do site:  php bd/criar-bd.php
//   no browser, com o servidor PHP a correr:  http://localhost:8000/bd/criar-bd.php
//
// ATENÇÃO: apaga as tabelas e volta a pôr só os dados iniciais.
// O que for acrescentado entretanto (relatos, utilizadores) perde-se.

$ficheiroBD = __DIR__ . '/aragem.sqlite';

try {
    // Se o ficheiro não existir, o SQLite cria-o
    $bd = new PDO('sqlite:' . $ficheiroBD);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->exec('PRAGMA foreign_keys = ON');  // o SQLite só verifica as FOREIGN KEY se lho pedirmos

    // exec() aceita vários comandos SQL separados por ponto e vírgula
    $bd->exec(file_get_contents(__DIR__ . '/esquema.sql'));
    $bd->exec(file_get_contents(__DIR__ . '/dados.sql'));

    // Contar o que ficou em cada tabela, para confirmar
    $locais       = $bd->query('SELECT COUNT(*) FROM locais')->fetchColumn();
    $utilizadores = $bd->query('SELECT COUNT(*) FROM utilizadores')->fetchColumn();
    $relatos      = $bd->query('SELECT COUNT(*) FROM relatos')->fetchColumn();

    $mensagem = "Base de dados criada: $locais locais, $utilizadores utilizadores e $relatos relatos.";
} catch (PDOException $erro) {
    http_response_code(500);
    $mensagem = 'Erro ao criar a base de dados: ' . $erro->getMessage();
}

// No terminal mostra texto simples; no browser, uma página mínima
if (PHP_SAPI === 'cli') {
    echo $mensagem . PHP_EOL;
} else {
    echo '<!DOCTYPE html><meta charset="utf-8"><title>Criar base de dados</title>';
    echo '<p>' . htmlspecialchars($mensagem) . '</p>';
}
