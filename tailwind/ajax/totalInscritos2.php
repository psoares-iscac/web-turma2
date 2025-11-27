<?php 


$idEvento = $_POST["id"] ?? null;

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