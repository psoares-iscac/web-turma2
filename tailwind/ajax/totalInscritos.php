<?php
// validar o tipo de acesso
// validar dse ha $id
require('connection.php');

#evento 1~
// Lê o corpo da requisição (JSON)
$input = file_get_contents("php://input");

// Converte JSON para array associativo
$data = json_decode($input, true);
$id = $data["id"];

$sql = 'SELECT COUNT(ID) AS N FROM inscricoes WHERE eventoId = :e';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':e', $id);
$stmt->execute();

if($stmt){
    $total = $stmt->fetchObject()->N;
}
echo json_encode(['total' => $total]);

$stmt = null;
exit;