<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location:../eventoNovo.php?erro=metodoinvalido');
    exit;
}

$nome  = trim($_POST['nome'] ?? '');
$data  = trim($_POST['data'] ?? '');
$texto = trim($_POST['texto'] ?? '');

if (!$nome || !$data || !$texto) {
    header('Location:../eventoNovo.php?erro=faltamdados');
    exit;
}

// ---- UPLOAD DE IMAGEM ----
if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== 0) {
    header('Location:../eventoNovo.php?erro=evioimagem');
    exit;
}

$permitidas = ['jpg','jpeg','png','webp'];
$ext = strtolower(pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION));

if (!in_array($ext, $permitidas)) {
    header('Location:../eventoNovo.php?erro=imagemformatoinvalido');
    exit;
}
$nomeFicheiro = bin2hex(random_bytes(16)) . "." . $ext; 
// ex: "9f3a2cd89ab533447fae2aa91bedc100"

$ficheiroFinal = "../../imgs/eventos/" . $nomeFicheiro;
move_uploaded_file($_FILES["imagem"]["tmp_name"], $ficheiroFinal);

// Aqui podes gravar na base de dados...
require('../includes/connection.php');
$sql = 'INSERT INTO eventos(nome, dataEvento, informacao, imagem) 
        VALUES(:n, :d, :i, :img)';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':n', $nome);
$stmt->bindValue(':d', $data);
$stmt->bindValue(':i', $texto);
$stmt->bindValue(':img', $nomeFicheiro);
$stmt->execute();

if($stmt){
    header('Location:../eventoNovo.php?ok=criado');
    exit;
}else{
    header('Location:../eventoNovo.php?erro=criacaodb');
    exit;
}
        


