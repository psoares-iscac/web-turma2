<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
</head>
<body>
    <?php $titulo = "Vamos começar"; ?>
    
    <?php 
    echo '<h1 class="text-center">Vamos começar</h1>';
    ?>

    <h1 class="text-center text-3xl"><?= $titulo ?></h1>

    <?php 
    $opcoes = ['Opção 1', 'Opção 2', 'Opção 3'];
    
    ?>

    <select name="" id="">
        <option class="" value="">-- selecione uma opção --</option>
    <?php foreach ($opcoes as $opcao): ?>
        <option class="" value=""><?= $opcao ?></option>
    <?php endforeach ?>   
       
    </select>



</body>
</html>