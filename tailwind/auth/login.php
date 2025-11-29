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

# obter o email e efetuar as devidas validações
echo $email = isset($_POST['email']) ? $_POST['email']: null;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $valido = true;
    /* verificar se o domínio existe */
    list($utilizador, $dominio) = explode("@", $email);
    
    if (checkdnsrr($dominio, "MX")) {
        #echo "E-mail válido e domínio existe!";
    } else {
        #echo "E-mail válido, mas domínio NÃO existe.";
    }
} else {
    $valido = false;
}
/* 
exemplo de validação com expressões regulares 

regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($regex, $email)) {
    echo "E-mail válido!";
} else {
    echo "E-mail inválido!";
}
*/


if($valido){
    # autenticado corretamente
    $_SESSION['ligado'] = true;
    $_SESSION['email'] = 'psoares@iscac.pt';
    $_SESSION['nome'] = 'paulo soares';
    $_SESSION['iniciais'] = 'PS';
    header('Location:../index.php');
}else {
    $_SESSION['ligado'] = false;
    unset($_SESSION['nome']);
    unset($_SESSION['iniciais']);
    header('Location:../login.php');
}

exit;
