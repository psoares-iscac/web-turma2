<?php session_start(); ?>
<?php
if(isset($_GET['evento'])){
    $eventoId = $_GET['evento'];
}else{
    header('Location:index.html');
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
$pagina = 'eventos';
require('includes/nav.php')
?>
    
<?php 
$sql = 'SELECT * FROM eventos WHERE id = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $eventoId);
$stmt->execute();

if(!$stmt || $stmt->rowCount() != 1){
    //echo 'erro';
    header('Location:index.php');
    exit;
}

$evento = $stmt->fetchObject();
$nome   = $evento->nome;
$data   = $evento->dataEvento;
$imagem = $evento->imagem;
$info   = $evento->informacao;
?>

<div class="max-w-7xl mx-auto flex">
    <div class="w-2/3">
        <div><img class="w-full h-auto" src="imgs/<?=  $imagem ?> ?>" alt=""></div>
        <div class="mt-3 text-2xl font-semibold"><?= $nome ?></div>
        <div class="font-light mt-2 mb-2"><?= $data ?></div>
        <div><?= $info ?></div>
    </div>

    <!-- ESPAÇO VAZIO ENTRE OS LADOS -->
    <div class="w-10"><!-- vazio --></div>

    <div class="w-1/3">
        <div class="mt-6 mb-4 font-semibold text-2xl">Inscreva-se</div>
        <!-- Formulário de inscrição em evento -->
         <?php  
         // dados da autenticação para preenchimento automático do formulário
         if($_SESSION['ligado'] == true){
            $nome = $_SESSION['nome'];
            $email = $_SESSION['email'];
         }else{
            $nome = '';
            $email = '';
         }

         ?>
        <form id="form-inscricao" method="post">
            <input type="hidden" name="fEvento" value="<?= $eventoId ?>">
            <div class="space-y-4  p-4 border border-gray-600">
            
                <div class="">
                <label for="f-email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                <div class="mt-2">
                    <input required value="<?= $email ?>" id="f-email" type="email" name="fEmail" placeholder="introduza o seu email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
                </div>
                
                <div class="">
                <label for="f-nome" class="block text-sm/6 font-medium text-gray-900">Nome</label>
                <div class="mt-2">
                    <input required value="<?= $nome ?>" id="f-nome" type="text" name="fNome" placeholder="introduza o seu nome" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
                </div>
                
                <div class="">
                <label for="f-tel" class="block text-sm/6 font-medium text-gray-900">Contacto telefónico</label>
                <div class="mt-2">
                    <input id="f-tel" type="text" name="fTel" pattern="\d+" class="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
                </div>
                
                <div class="flex gap-3">
                    <div class="flex h-6 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                            <input id="f-socio" type="checkbox" name="fSocio" aria-describedby="comments-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
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

        <div id="mensagem" class="hidden"></div>

        <div class="mt-4 text-right text-3xl">Inscritos: 
            <span id="total-inscritos" data-eventoid="<?= $eventoId ?>">2</span>
        </div>
    </div>
</div>


    


   
<script>
    document.getElementById("form-inscricao").addEventListener("submit", async function (e) {
        e.preventDefault(); // impede envio normal - submit

        const form = e.target;
        /* formData com todos os elementos do formulario, identificação name */
        const formData = new FormData(form);
        const msgDiv = document.getElementById("mensagem");

        // ESCONDE FORMULÁRIO IMEDIATAMENTE
        form.classList.add("hidden");

        // LIMPA A MENSAGEM
        msgDiv.classList.add("hidden");
        msgDiv.innerHTML = "";

        try {
            const response = await fetch('ajax/trataInscricao.php', {
                method: "POST",
                body: formData
            });

            // Se o PHP enviar JSON:
            const result = await response.json()

            console.log("Resposta do servidor:", result.estado);

            // SUCESSO
            if (result.status === "ok") {

                msgDiv.classList.remove("hidden");
                msgDiv.innerHTML = `
                    <div class="mt-6 p-6 bg-green-100 border border-green-300 text-green-800 rounded-xl shadow-md">
                        <h2 class="text-xl font-semibold mb-2">Inscrição realizada com sucesso!</h2>
                        <p class="mb-1">Obrigado, <strong>${result.dados.nome}</strong>.</p>
                        <p class="mb-1">Confirmámos a receção da sua inscrição.</p>
                        <p>Enviaremos informações para <strong>${result.dados.email}</strong>.</p>
                    </div>
                `;
            } 
            // ERRO DO SERVIDOR (VALIDAÇÃO)
            else {

                msgDiv.classList.remove("hidden");
                msgDiv.innerHTML = `
                    <div class="mt-6 p-6 bg-red-100 border border-red-300 text-red-800 rounded-xl shadow-md">
                        <h2 class="text-lg font-semibold mb-2">Ocorreu um erro</h2>
                        <p>${result.mensagem}</p>
                    </div>
                `;

                // REEXIBE O FORMULÁRIO PARA CORRIGIR
                form.classList.remove("hidden");
            }

        } catch (error) {
            console.error("Erro no envio:", error);
            alert("Erro ao enviar os dados.");
        }

    });
</script>
<script>
    const totalInscritos = document.getElementById('total-inscritos'); // span
    const eventoId = totalInscritos.dataset.eventoid;


    /* versão 1 - fetch.then com JSON*/ 
    function atualizarInscritos1(){

        fetch("ajax/totalInscritos1.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: eventoId })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Número de inscritos:", data.total);
            totalInscritos.innerHTML = data.total;
        })
        .catch(err => console.error("Erro:", err));

    }

    /* versão 2 - fetch.then com FORMDATA */ 
    function atualizarInscritos2(){
        const url = 'ajax/totalInscritos2.php';
        
        const dados = new FormData();
        dados.append("id", eventoId);
        

        fetch(url, {
            method: 'POST',            
            body: dados
        })
        .then(response => {
            if(!response.ok)
                throw new Error('teste de erro');
            return response.json();
        })
        .then(data => {
            console.log(data.total);
            totalInscritos.innerHTML = data.total;
        })
        .catch(err => console.error("Erro:", err));
    } 

    /* versão 3 - fetch.then, method GET */ 
    function atualizarInscritos3(){
        const url = `ajax/totalInscritos3.php?id=${eventoId}`;

        fetch(url)
        .then(response => {
            if(!response.ok)
                throw new Error('teste de erro');
            return response.json();
        })
        .then(data => {
            console.log(data.total);
            totalInscritos.innerHTML = data.total;
        })
        .catch(err => console.error("Erro:", err));
    } 

    /* versão 4 - await fetch, method GET, */ 
    async function atualizarInscritos4() {
        const url = `ajax/totalInscritos3.php?id=${eventoId}`;

        try {
            const response = await fetch(url, {
                method: "GET",
            });

            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }

            const data = await response.json();
            console.log("Número de inscritos:", data.total);
            totalInscritos.innerHTML = data.total;
            //return data;

        } catch (error) {
            console.error("Erro na requisição GET:", error);
        }
    }

    /* versão 5 - await fetch, method POST com JSON */
    async function atualizarInscritos5() {
        try {
            const response = await fetch("ajax/totalInscritos1.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({ id: eventoId })
            });

            if (!response.ok) throw new Error(`Erro HTTP: ${response.status}`);

            const data = await response.json();
            console.log("Inscritos (JSON):", data.total);
            totalInscritos.innerHTML = data.total;
            return data;

        } catch (error) {
            console.error("Erro na requisição JSON:", error);
        }
    }


    /* versão 6 - await fetch, method POST com FORMDATA */
    async function atualizarInscritos6() {
        const formData = new FormData();
        formData.append("id", eventoId);

        try {
            const response = await fetch("ajax/totalInscritos2.php", {
                method: "POST",
                body: formData
            });

            if (!response.ok) throw new Error(`Erro HTTP: ${response.status}`);

            const data = await response.json();
            console.log("Inscritos (FormData):", data.total);
            totalInscritos.innerHTML = data.total;
            return data;

        } catch (error) {
            console.error("Erro na requisição FormData:", error);
        }
    }

    /* ALTERAR PARA A FUNÇÃO PRETENDIDA */
    atualizarInscritos6()
    
    setInterval(() => {
        atualizarInscritos6()
    }, 10000);

</script>
</body>
</html>