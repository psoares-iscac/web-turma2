<?php
session_start();
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

    <div class="max-w-7xl mx-auto mt-16 p-18 bg-[rgb(56,142,60)]">
        <p class="text-5xl text-center">Desenvolvimento Web 25.26</p>
        <p class="mt-4 text-3xl text-center">Página com Framework Tailwind v4.1</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-2">
        <div>
            <img class="w-full h-auto" src="imgs/logo.png" alt="">
        </div>
    </div>
    
</body>
</html>