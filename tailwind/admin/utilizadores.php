<?php
// =========================================================
// 1. SIMULAÇÃO DE DADOS DA BASE DE DADOS (PHP)
//    Substitua esta secção pela sua lógica de busca real.
// =========================================================

$users = [
    [
        'id' => 101,
        'nome' => 'Sofia Antunes',
        'email' => 'sofia.antunes@empresa.pt',
        'role' => 'Administrador',
        'status' => 'Ativo',
        'foto_url' => 'https://i.pravatar.cc/150?img=1', // URL de foto simulada
    ],
    [
        'id' => 102,
        'nome' => 'Manuel Teixeira',
        'email' => 'manuel.teixeira@empresa.pt',
        'role' => 'Editor',
        'status' => 'Inativo',
        'foto_url' => 'https://i.pravatar.cc/150?img=34', 
    ],
    [
        'id' => 103,
        'nome' => 'Carla Silva',
        'email' => 'carla.silva@empresa.pt',
        'role' => 'Utilizador',
        'status' => 'Pendente',
        'foto_url' => 'https://i.pravatar.cc/150?img=4', 
    ],
];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração | Gestão de Utilizadores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .overlay-transition {
            transition: opacity 0.3s ease;
        }
        /* Classe para fixar a altura das células e garantir que a foto cabe */
        .table-cell-height {
            height: 64px; /* Altura fixa para a linha */
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

                <h1 class="text-2xl font-bold text-gray-700 md:ml-0 ml-4">Gestão de Utilizadores</h1>
                <span class="text-gray-500 hidden md:block">Bem-vindo, Admin</span>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                
                <div class="mb-8 flex justify-between items-center">
                    <h2 class="text-3xl font-extrabold text-gray-800">Lista de Utilizadores</h2>
                    <a href="adicionar_utilizador.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Novo Utilizador
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-xl overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th> <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Nível</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-50">
                                    
                                    <td class="px-6 py-2 whitespace-nowrap table-cell-height">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" 
                                                     src="<?php echo htmlspecialchars($user['foto_url']); ?>" 
                                                     alt="Foto de <?php echo htmlspecialchars($user['nome']); ?>">
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        <?php echo htmlspecialchars($user['nome']); ?>
                                        <span class="block text-xs text-gray-500 md:hidden"><?php echo htmlspecialchars($user['email']); ?></span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                                        <?php echo htmlspecialchars($user['email']); ?>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden sm:table-cell">
                                        <?php echo htmlspecialchars($user['role']); ?>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php
                                            $color = match ($user['status']) {
                                                'Ativo' => 'bg-green-100 text-green-800',
                                                'Inativo' => 'bg-red-100 text-red-800',
                                                'Pendente' => 'bg-yellow-100 text-yellow-800',
                                                default => 'bg-gray-100 text-gray-800',
                                            };
                                        ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $color; ?>">
                                            <?php echo htmlspecialchars($user['status']); ?>
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="editar_utilizador.php?id=<?php echo $user['id']; ?>" class="text-indigo-600 hover:text-indigo-900 transition">Editar</a>
                                        <a href="eliminar_utilizador.php?id=<?php echo $user['id']; ?>" class="text-red-600 hover:text-red-900 transition">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
    
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay'); 

        const toggleSidebar = () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };

        toggleButton.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>