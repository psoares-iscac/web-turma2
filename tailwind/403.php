<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 403 - Acesso Negado</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50 p-6">
    
    <div class="bg-white p-8 md:p-12 rounded-xl shadow-2xl max-w-lg w-full text-center">
        
        <div class="text-8xl md:text-9xl font-extrabold text-red-600 mb-2 select-none">
            403
        </div>
        
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
            Acesso Negado
        </h1>
        
        <p class="text-base md:text-lg text-gray-600 mb-10">
            Lamentamos, mas não tem permissão para aceder a esta página. 
            Esta área é restrita a utilizadores autenticados ou com privilégios.
        </p>
        
        <div class="flex flex-col md:flex-row justify-center gap-4">
            
            <a href="login.php" class="
               bg-blue-600 text-white hover:bg-blue-700 px-6 py-3 rounded-lg 
               font-semibold transition duration-300 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Fazer Login
            </a>
            
            <a href="index.php" class="
               bg-gray-200 text-gray-800 hover:bg-gray-300 px-6 py-3 rounded-lg 
               font-semibold transition duration-300 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                Ir para a Página Inicial
            </a>
        </div>
    </div>
</body>
</html>