<?php
session_start();

# VALIDAÇÃO DO MÉTODO DE ENVIO
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Se não for POST, redireciona para a página inicial ou de erro
    header('Location: ../403.php');
    exit;
}

// VALIDAÇÃO CSRF (CRUCIAL)
// Compara o token enviado no POST com o token armazenado na SESSION
if (!isset($_POST['csrf_token']) || 
    !isset($_SESSION['csrf_token']) || 
    $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    
    // Ataque ou requisição inválida
    unset($_SESSION['csrf_token']);
    # SE QUISER MOSTRAR O ERRO NA PÁGINA SEGUINTE 
    $_SESSION['erro_login'] = 'Erro de segurança. Requisição inválida.';
    header('Location: ../403.php');
    exit;
}

# vou buscar os dados, faço validacoes
# ###############


#ligado
$_SESSION['ligado'] = true;
$_SESSION['nome'] = 'paulo soares';
$_SESSION['iniciais'] = 'PS';

header('Location:../index.php');
exit;
