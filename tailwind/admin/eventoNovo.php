<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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

            <!-- parte a ser preenchda par cada págin diferente -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

                <h1 class="text-3xl font-bold mb-6 text-gray-800">Criar Novo Evento</h1>

                <div class="w-3/4 mx-auto">
                    <form id="form-evento" action="crud/eventoCriar.php" method="POST" enctype="multipart/form-data" class="space-y-6">

                        <!-- Nome -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome do Evento</label>
                            <input 
                                name="nome" 
                                type="text" 
                                required
                                class="w-full border border-gray-300 rounded-md px-3 py-2"
                                placeholder="Introduza o nome do evento">
                        </div>

                        <!-- Data -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Data do Evento</label>
                            <input 
                                name="data" 
                                type="date" 
                                required
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <!-- Texto (Quill editor) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto Informativo</label>

                            <!-- Editor visual -->
                            <div id="editor" class="bg-white h-40 border border-gray-300 rounded-md"></div>

                            <!-- Campo escondido onde enviamos o HTML do editor -->
                            <textarea id="texto" name="texto" class="hidden"></textarea>
                        </div>

                        <!-- Upload da Imagem -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagem do Evento</label>
                            <input 
                                id="imagem" 
                                name="imagem" 
                                type="file" 
                                accept="image/*" 
                                required
                                class="block w-full border border-gray-300 rounded-md cursor-pointer">

                            <!-- Preview -->
                            <img id="preview" class="mt-3 hidden w-64 rounded-lg shadow" alt="Preview da imagem">
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-end gap-4 pt-4">
                            <a href="admin.php?eventos" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancelar</a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Guardar Evento
                            </button>
                        </div>
                    </form>
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
<script>
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['clean']
        ]
    }
});


// Ao submeter, copiar conteúdo HTML do editor para o campo hidden
document.getElementById("form-evento").addEventListener("submit", function() {
    document.getElementById("texto").value = quill.root.innerHTML;
});

// ------- PREVIEW DA IMAGEM -------
document.getElementById("imagem").addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const preview = document.getElementById("preview");
    preview.src = URL.createObjectURL(file);
    preview.classList.remove("hidden");
});
</script>
</body>
</html>