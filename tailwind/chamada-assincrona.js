const form = document.getElementById("meuFormulario");
const respostaEl = document.getElementById("resposta");

form.addEventListener("submit", function (e) {
    e.preventDefault(); // Não recarregar página

    // Obter dados do formulário
    const formData = new FormData(form);
    const dados = Object.fromEntries(formData.entries());

    respostaEl.innerHTML = "A enviar...";

    // Enviar dados via fetch com then()
    fetch("https://exemplo.com/api/enviar", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dados)
    })

    // 1º then: verificar se a resposta está OK
    .then(function (resposta) {
        if (!resposta.ok) {
            throw new Error("Erro no servidor: " + resposta.status);
        }
        return resposta.json(); // Converter JSON
    })

    // 2º then: tratar o JSON recebido
    .then(function (dadosRecebidos) {
        respostaEl.innerHTML = "Servidor respondeu: " + dadosRecebidos.mensagem;
    })

    // catch: erros de rede ou outros
    .catch(function (erro) {
        respostaEl.innerHTML = "Erro: " + erro.message;
    });
});


/* COM CHAMADA AWAIT */
// A função que define o que acontece quando o formulário é submetido
async function handleFormSubmitAutomatic(event) {
    event.preventDefault();

    const formElement = event.target;
    const formData = new FormData(formElement);
    const dataObject = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('https://api.example.com/submit', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dataObject),
        });

        if (!response.ok) {
            throw new Error('Erro na rede: ' + response.statusText);
        }

        const result = await response.json();
        console.log('Sucesso:', result);
        alert('Dados enviados com sucesso!');

    } catch (error) {
        console.error('Ocorreu um erro:', error);
        alert('Ocorreu um erro ao enviar os dados.');
    }
}

// -----------------------------------------------------
// ESTA É A PARTE CRUCIAL QUE CHAMA A FUNÇÃO:
// -----------------------------------------------------

// 1. Encontra o formulário na página usando o seu ID ('meuFormulario')
const meuFormulario = document.getElementById('meuFormulario');

// 2. Adiciona um "ouvinte" para o evento 'submit'
// Quando o utilizador clica no botão de submeter, a função handleFormSubmitAutomatic é executada.
if (meuFormulario) {
  meuFormulario.addEventListener('submit', handleFormSubmitAutomatic);
} else {
  console.error("Elemento de formulário com ID 'meuFormulario' não encontrado!");
}

/* RETIRAR VALORES UM A UM */
// Coleta os dados do formulário (exemplo)
  const formData = {
    nome: document.getElementById('nome').value,
    email: document.getElementById('email').value
  };