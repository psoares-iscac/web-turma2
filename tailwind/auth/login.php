<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

# vou buscar os dados, faço validacoes

#ligado
$_SESSION['ligado'] = true;
$_SESSION['nome'] = 'paulo soares';
$_SESSION['iniciais'] = 'PS';

header('Location:../index.php');
exit;
