<?php
if(isset($_GET['evento'])){
    $eventoId = $_GET['evento'];    
}else{
    header('Location:index.php');
    exit;
}
require('includes/connection.php');
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
    require('includes/nav.php');
    ?>
    

    <?php 
    $sql = 'SELECT * FROM eventos WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $eventoId);
    $stmt->execute();

    if(!$stmt || $stmt->rowCount() != 1){
        #echo 'erro';
        header('Location: index.php');
        exit;
    }

    $evento = $stmt->fetchObject();
    echo $nome   = $evento->nome;
    $data   = $evento->data;
    echo $img    = $evento->imagem;
    $info   = $evento->informacao;

    ?>



     <!-- Formulário de inscrição em evento -->
    <form action="trataInscricao.php" method="get">

        <div class="space-y-4 mx-auto w-[400px] p-4 border border-gray-200">
            <div><?= $nome ?></div>
            <div class="">
            <label for="f-email" class="block text-sm/6 font-medium text-gray-900">Email</label>
            <div class="mt-2">
                <input id="f-email" type="email" name="fEmail" placeholder="introduza o seu email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            </div>
            
            <div class="">
            <label for="f-nome" class="block text-sm/6 font-medium text-gray-900">Nome</label>
            <div class="mt-2">
                <input id="f-nome" type="text" name="fNome" placeholder="introduza o seu nome" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            </div>
            
            <div class="">
            <label for="f-tel" class="block text-sm/6 font-medium text-gray-900">Contacto telefónico</label>
            <div class="mt-2">
                <input id="f-tel" type="text" name="fTel" pattern="\d+" class="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            </div>
            
            <div class="">
            <label for="f-dia" class="block text-sm/6 font-medium text-gray-900">Dia</label>
            <div class="mt-2">
                <input id="f-dia" type="date" name="fDia" class="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            </div>
            
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="f-socio" type="checkbox" name="fSocio" checked aria-describedby="comments-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="f-socio" class="font-medium text-gray-900">Sócio</label>
                    <p id="comments-description" class="text-gray-500">Indique se é sócio.</p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Inscrever</button>
            </div>
        
        </div>

    </form>
    
</body>
</html>