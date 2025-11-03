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
    
    <!-- imagem principal -->
    <div class="max-w-7xl mx-auto relative">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-10 bg-[rgb(245,245,245)] font-light text-5xl text-center">Fim de semestre de IG</div>
        <img class="w-full h-auto max-h-[300px] object-cover object-center" src="imgs/imagem3.jpg" alt="evento em destaque">
    </div>

    <p class="p-5 font-light text-5xl text-center">Galeria de imagens</p>

    <div class="mx-auto max-w-7xl">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="">
                <img class="w-full h-auto" src="imgs/imagem3_min.jpg" alt="Evento 3">
                <div class="my-1 font-semibold">29.11</div>
                <div class="font-light mb-4">Festa de fim de semestre</div>
                <a href="evento.php?evento=3" class="inline-flex items-center gap-2 p-2 border border-[rgb(56,142,60)] text-[rgb(76,175,80)] hover:bg-[rgb(56,142,60)] hover:text-white">
                    Ver mais <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </a>
            </div>

            <div class="">
                <img class="w-full h-auto" src="imgs/imagem1_min.jpg" alt="Evento 3">
                <div class="my-1 font-semibold">31.12</div>
                <div class="font-light mb-4">Bem vindo 2026!</div>
                <a href="evento.html?evento=1" class="inline-flex items-center gap-2 p-2 border border-[rgb(56,142,60)] text-[rgb(76,175,80)] hover:bg-[rgb(56,142,60)] hover:text-white">
                    Ver mais <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </a>
            </div>

            <div class="">
                <img class="w-full h-auto" src="imgs/imagem2_min.jpg" alt="Evento 3">
                <div class="my-1 font-semibold">05.04</div>
                <div class="font-light mb-4">Páscoa Festiva</div>
                <a href="evento.html?evento=2" class="inline-flex items-center gap-2 p-2 border border-[rgb(56,142,60)] text-[rgb(76,175,80)] hover:bg-[rgb(56,142,60)] hover:text-white">
                    Ver mais <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </a>
            </div>

            <div class="">
                <img class="w-full h-auto" src="imgs/imagem4_min.jpg" alt="Evento 3">
                <div class="my-1 font-semibold">fevereiro</div>
                <div class="font-light mb-4">Festividades várias</div>
                <a href="evento.html?evento=4" class="inline-flex items-center gap-2 p-2 border border-[rgb(56,142,60)] text-[rgb(76,175,80)] hover:bg-[rgb(56,142,60)] hover:text-white">
                    Ver mais <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                </a>
            </div>
            

        </div>

    </div>


    
</body>
</html>