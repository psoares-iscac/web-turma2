<?php
// 1. Inicia a sessão (necessário para acessar e destruir a sessão)
session_start();

// 2. Limpa todas as variáveis de sessão
// Isso é útil para compatibilidade e garante que o array $_SESSION esteja vazio
$_SESSION = array(); 

// 3. Destrói a sessão (remove o arquivo de sessão do servidor)
session_destroy();

// 4. (Opcional, mas altamente recomendado) Força o vencimento do cookie de sessão.
// Isso garante que o navegador do usuário não tenha mais o ID de sessão antigo.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 5. Redireciona de volta para a página anterior (ou para a mesma página)
$referencia = $_SERVER['HTTP_REFERER'] ?? '../index.php'; 

// Redireciona o usuário de volta para onde ele estava
header("Location: $referencia");
exit;
?>