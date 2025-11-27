<?php 
// ler o corpo JSON recebido
$input = json_decode(file_get_contents("php://input"), true);

$idEvento = $input["id"] ?? null;

if ($idEvento === null) {
    echo json_encode(["erro" => "ID não informado"]);
    exit;
}

require('connection.php');

$sql = 'SELECT COUNT(id) AS NUM FROM inscricoes WHERE eventoId = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $idEvento);
$stmt->execute();

if($stmt){
    $total = $stmt->fetchObject()->NUM;
}

echo json_encode([
    "total" => $total,
]);

$stmt = null;
exit;
?>