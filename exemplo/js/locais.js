// ---------------------------------------------------------------
// 1. Os dados
//    Os 4 primeiros são os locais que estavam escritos no HTML.
//    Os 4 últimos foram acrescentados só aqui.
// ---------------------------------------------------------------
const locais = [
  {
    id: "guincho",
    nome: "Praia do Guincho",
    descricao: "Cascais · costa",
    tipo: "costa",
    temperatura: 17,
    sensacao: 15,
    humidade: 72,
    chuva: 0.2,
    vento: 34,
    direcao: 315,
    ondas: 2.4,
  },
  {
    id: "supertubos",
    nome: "Supertubos",
    descricao: "Peniche · costa",
    tipo: "costa",
    temperatura: 18,
    sensacao: 18,
    humidade: 70,
    chuva: 0,
    vento: 12,
    direcao: 90,
    ondas: 1.6,
  },
  {
    id: "torre",
    nome: "Torre",
    descricao: "Serra da Estrela · 1993 m",
    tipo: "serra",
    temperatura: 3,
    sensacao: -2,
    humidade: 81,
    chuva: 4.1,
    vento: 26,
    direcao: 0,
    ondas: null,
  },
  {
    id: "pena",
    nome: "Trilho da Pena",
    descricao: "Sintra · trilho",
    tipo: "trilho",
    temperatura: 15,
    sensacao: 14,
    humidade: 88,
    chuva: 0.6,
    vento: 9,
    direcao: 270,
    ondas: null,
  },

  // Novos locais: só existem aqui, no array
  {
    id: "arrabida",
    nome: "Arrábida",
    descricao: "Setúbal · costa",
    tipo: "costa",
    temperatura: 19,
    sensacao: 19,
    humidade: 65,
    chuva: 0,
    vento: 8,
    direcao: 45,
    ondas: 0.4,
  },
  {
    id: "praia-norte",
    nome: "Praia do Norte",
    descricao: "Nazaré · costa",
    tipo: "costa",
    temperatura: 16,
    sensacao: 13,
    humidade: 78,
    chuva: 0.4,
    vento: 38,
    direcao: 315,
    ondas: 6.8,
  },
  {
    id: "geres",
    nome: "Trilho da Preguiça",
    descricao: "Peneda-Gerês · trilho",
    tipo: "trilho",
    temperatura: 11,
    sensacao: 9,
    humidade: 94,
    chuva: 3.2,
    vento: 14,
    direcao: 225,
    ondas: null,
  },
  {
    id: "sagres",
    nome: "Ponta de Sagres",
    descricao: "Vila do Bispo · costa",
    tipo: "costa",
    temperatura: 20,
    sensacao: 20,
    humidade: 68,
    chuva: 0,
    vento: 22,
    direcao: 0,
    ondas: 1.9,
  },
];

const LIMITE_VENTO = 30; // km/h

// ---------------------------------------------------------------
// 2. Funções auxiliares
// ---------------------------------------------------------------

// 315 → "NO"
function direcaoVento(graus) {
  const direcoes = ["N", "NE", "E", "SE", "S", "SO", "O", "NO"];
  return direcoes[Math.round(graus / 45) % 8];
}

// 2.4 → "2,4"
function formatar(numero, casasDecimais = 0) {
  return numero.toLocaleString("pt-PT", {
    maximumFractionDigits: casasDecimais,
  });
}

// Decide o estado do local a partir dos valores
function calcularEstado(local) {
  if (local.vento >= LIMITE_VENTO) {
    return {
      nome: "Alerta",
      mensagem: `Vento acima do seu limite de ${LIMITE_VENTO} km/h`,
    };
  }
  if (local.temperatura <= 3) {
    return { nome: "Atenção", mensagem: "Temperatura baixa, possível gelo" };
  }
  if (local.chuva >= 1) {
    return {
      nome: "Atenção",
      mensagem: "Chuva prevista para as próximas horas",
    };
  }
  return { nome: "Bom", mensagem: "Condições dentro dos seus limites" };
}

// Classes do Tailwind para cada estado (escritas por inteiro)
const estilos = {
  Alerta: {
    borda: "border-2 border-red-300",
    etiqueta: "bg-red-100 text-red-700",
    texto: "text-red-700",
  },
  Atenção: {
    borda: "border border-slate-200",
    etiqueta: "bg-amber-100 text-amber-800",
    texto: "text-amber-800",
  },
  Bom: {
    borda: "border border-slate-200",
    etiqueta: "bg-emerald-100 text-emerald-700",
    texto: "text-slate-500",
  },
};

// O terceiro valor do cartão depende do tipo de local
function terceiroValor(local) {
  if (local.tipo === "costa") {
    return { rotulo: "Ondas", valor: `${formatar(local.ondas, 1)} m` };
  }
  if (local.temperatura <= 5) {
    return { rotulo: "Sens.", valor: `${formatar(local.sensacao)}°` };
  }
  return { rotulo: "Humid.", valor: `${local.humidade}%` };
}

// Linha por cima do título, ex.: "Segunda-feira, 2 de novembro · 8 locais · dados de exemplo"
const hoje = new Date().toLocaleDateString("pt-PT", {
  weekday: "long",
  day: "numeric",
  month: "long",
});
atualizacao.textContent = `${hoje.charAt(0).toUpperCase() + hoje.slice(1)} · ${locais.length} locais · dados de exemplo`;
