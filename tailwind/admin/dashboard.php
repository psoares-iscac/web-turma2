<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS adicional para garantir que a transição de opacidade do overlay funcione */
        .overlay-transition {
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    
    <div class="flex h-screen">

        <?php require('includes/nav.php'); ?>
        
        <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden md:hidden overlay-transition"></div>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-lg p-4 flex justify-between items-center z-30">
                <button id="menu-toggle" class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <h1 class="text-2xl font-bold text-gray-700 md:ml-0 ml-4">Dashboard</h1>
                <span class="text-gray-500 hidden md:block">Bem-vindo, Admin</span>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Visão Geral</h2>
                <div class="bg-white p-6 rounded-xl shadow-xl">
                    <p class="text-gray-600">Clique no ícone de hambúrguer ou na área escura para fechar o menu.</p>
                </div>
            </main>
        </div>
    </div>
    
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay'); // Nova constante para o overlay

        // Função única para abrir/fechar ambos os elementos
        const toggleSidebar = () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };

        // Ao clicar no botão, abre/fecha
        toggleButton.addEventListener('click', toggleSidebar);
        
        // Ao clicar no overlay, fecha o menu (melhor UX mobile)
        overlay.addEventListener('click', toggleSidebar);
        
    </script>
</body>
</html>