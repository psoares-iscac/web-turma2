<?php
// =========================================================
// 1. SIMULAÇÃO DE DADOS DA BASE DE DADOS (PHP)
//    Substitua esta secção pela sua lógica de busca real.
// =========================================================

$events = [
    [
        'id' => 1,
        'nome' => 'Conferência Anual de Tecnologia',
        'informacao' => 'Workshops e palestras sobre as últimas tendências em IA, Cloud Computing e Segurança Cibernética.',
        'dataEvento' => '2026-03-15 09:00:00', // YYYY-MM-DD HH:MM:SS
    ],
    [
        'id' => 2,
        'nome' => 'Workshop de Fotografia Noturna',
        'informacao' => 'Aprenda técnicas avançadas para capturar paisagens e estrelas com longa exposição.',
        'dataEvento' => '2025-12-05 19:30:00',
    ],
    [
        'id' => 3,
        'nome' => 'Feira de Emprego & Networking',
        'informacao' => 'Mais de 50 empresas com oportunidades de emprego e sessões de networking.',
        'dataEvento' => '2026-01-20 10:00:00',
    ],
    // Adicione mais eventos conforme necessário
];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração | Gestão de Eventos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Garante que o overlay tem uma transição suave */
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

                <h1 class="text-2xl font-bold text-gray-700 md:ml-0 ml-4">Gestão de Eventos</h1>
                <span class="text-gray-500 hidden md:block">Bem-vindo, Admin</span>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                
                <div class="mb-8 flex justify-between items-center">
                    <h2 class="text-3xl font-extrabold text-gray-800">Lista de Eventos Registados</h2>
                    <a href="eventoNovo.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Novo Evento
                    </a>
                </div>

                <?php if (!empty($events)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                        <?php foreach ($events as $event): ?>
                            <div class="bg-white p-5 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-indigo-500 flex flex-col h-full">
                                
                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                    <?php echo htmlspecialchars($event['nome']); ?>
                                </h3>

                                <div class="text-sm text-gray-500 font-medium mb-3 border-b pb-3">
                                    <?php 
                                    $timestamp = strtotime($event['dataEvento']);
                                    echo '<span class="text-indigo-600 font-semibold">' . date('d/m/Y', $timestamp) . '</span> às ' . date('H:i', $timestamp);
                                    ?>
                                </div>

                                <p class="text-gray-700 mb-4 flex-grow text-sm">
                                    **Informação:** <?php echo nl2br(htmlspecialchars($event['informacao'])); ?>
                                </p>

                                <div class="mt-auto flex space-x-2 justify-end">
                                    <a href="editar_evento.php?id=<?php echo $event['id']; ?>" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium p-1 rounded hover:bg-yellow-50 transition">
                                        Editar
                                    </a>
                                    <a href="eliminar_evento.php?id=<?php echo $event['id']; ?>" class="text-sm text-red-600 hover:text-red-800 font-medium p-1 rounded hover:bg-red-50 transition">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php else: ?>
                    <div class="text-center p-10 bg-white rounded-xl shadow-lg">
                        <p class="text-2xl text-gray-500">Nenhum evento agendado. Comece por criar um novo!</p>
                        <a href="adicionar_evento.php" class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150">
                            Criar Novo Evento
                        </a>
                    </div>
                <?php endif; ?>

            </main>
        </div>
    </div>
    
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay'); 

        // Função para Abrir/Fechar a Sidebar e o Overlay
        const toggleSidebar = () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };

        // Event Listeners
        toggleButton.addEventListener('click', toggleSidebar); // Clicar no Hambúrguer
        overlay.addEventListener('click', toggleSidebar);      // Clicar no Overlay (mobile)
    </script>
</body>
</html>