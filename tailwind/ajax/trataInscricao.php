<?php
header("Content-Type: application/json; charset=utf-8");

// Função para enviar resposta JSON e terminar
function resposta($status, $mensagem, $dados = []) {
    echo json_encode([
        "status"   => $status,
        "mensagem" => $mensagem,
        "dados"    => $dados
    ]);
    exit;
}

// ---- 1) VERIFICAR SE O PEDIDO É POST ----
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    resposta("erro", "Método não permitido. Apenas POST é permitido.");
}

// ---- 2) RECOLHER DADOS ----
$idEvento = $_POST['fEvento'] ?? 0;
$email = trim($_POST['fEmail'] ?? '');
$nome  = trim($_POST['fNome'] ?? '');
$tel   = trim($_POST['fTel'] ?? '');
$socio = isset($_POST['fSocio']) ? 1 : 0;

// ---- 3) VALIDAÇÕES ----
// Id do Evento
if (empty($idEvento) || $idEvento == 0) {
    resposta("erro", "Falta informação do evento.");
}
// Email
if (empty($email)) {
    resposta("erro", "O email é obrigatório.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    resposta("erro", "Email inválido.");
}

// Nome
if (empty($nome)) {
    resposta("erro", "O nome é obrigatório.");
}
if (!preg_match("/^[A-Za-zÀ-ÿ' ]{2,}$/", $nome)) {
    resposta("erro", "O nome contém caracteres inválidos.");
}

// Telefone (opcional)
if (!empty($tel)) {
    if (!preg_match("/^[0-9]{9,15}$/", $tel)) {
        resposta("erro", "O telefone deve conter apenas números (9 a 15 dígitos).");
    }
}

// ---- 4) GRAVAR NA BASE DE DADOS  ----
require('connection.php');
$sql = 'INSERT INTO inscricoes(eventoId, email, nome, telefone, socio)
                    VALUES(:evento, :e, :n, :t, :s)';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':evento', $idEvento);
$stmt->bindValue(':e', $email);
$stmt->bindValue(':n', $nome);
$stmt->bindValue(':t', $tel);
$stmt->bindValue(':s', $socio);
$stmt->execute();

if($stmt){
    // ---- 5) RESPOSTA OK ----
    resposta("ok", "Dados enviados e validados com sucesso.", [
        "email" => $email,
        "nome"  => $nome,
        "tel"   => $tel,
        "socio" => $socio
    ]);
}else{
    resposta("erro", "Erro na execução do query.");
}