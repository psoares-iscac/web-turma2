<?php
session_start();
# =========================================================
# CRIAÇÃO DE UM TOKEN PARA VALIDAÇÃO, SE AINDA NÃO EXISTIR
# NECESSÁRIO INCLUIR NO FORMULÁRIO
# =========================================================
if (empty($_SESSION['csrf_token'])) {
    // Só gera se ainda não existir um token na sessão
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); 
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Web 25.26</title>
    <link rel="shortcut icon" href="imgs/logo_arco_vermelho.svg">
    <script src="js/tailwind4.1.js"></script>
    
</head>
<body>

    <?php 
    require('includes/nav.php')
    ?>

    <div class="w-[400px] mx-auto relative">
 
        <div class="bg-[#F6F4F3]/95 p-6 rounded-lg shadow-md mx-4 border border-gray-100">
            
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Iniciar Sessão</h2>

            <form action="auth/login.php" method="POST" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                <div>
                    <label for="email" class="font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="password" class="font-medium text-gray-700">Palavra-passe</label>
                    <input type="password" id="password" name="pass" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>

                <div>
                    <button type="submit" class="w-full bg-[#B09B80] text-white py-2 px-4 rounded-md hover:bg-[#9a866b] transition">Entrar</button>
                </div>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">Não tem uma conta? 
                <a href="register.php" class="text-[#B09B80] hover:underline">Registar-se</a>
            </p>
            
        </div>
    </div>
    
</body>
</html>