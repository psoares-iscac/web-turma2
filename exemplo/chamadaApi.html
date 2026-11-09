<?php
    echo "teste";
?>
<!doctype html>
<html lang="pt-PT">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Locais · Aragem</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,700&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap"
    />
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="js/menu.js" defer></script>
  </head>

  <body
    class="bg-slate-100 text-slate-900 font-['IBM_Plex_Sans',sans-serif] antialiased"
  >
    <!-- Cabeçalho (igual em todas as páginas; mais tarde passa a um include em PHP) -->
    <header class="bg-white border-b border-slate-200">
      <div
        class="mx-auto max-w-6xl px-4 py-4 flex flex-wrap items-center justify-between gap-x-4 gap-y-3"
      >
        <a href="index.html" class="flex items-baseline gap-2">
          <span
            class="font-['Bricolage_Grotesque',sans-serif] text-2xl font-bold tracking-tight"
            >Aragem</span
          >
          <span
            class="hidden sm:inline text-xs uppercase tracking-widest text-slate-500"
            >observatório de condições</span
          >
        </a>
        <!-- Botão do menu: só visível em ecrãs pequenos; o comportamento está em js/menu.js -->
        <button
          type="button"
          id="menu-botao"
          aria-expanded="false"
          aria-controls="menu-principal"
          class="md:hidden rounded border border-slate-300 px-3 py-1.5 text-sm font-medium hover:bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-600 aria-expanded:bg-slate-900 aria-expanded:text-white aria-expanded:border-slate-900"
        >
          <span id="menu-icone" aria-hidden="true">☰</span> Menu
        </button>
        <nav
          id="menu-principal"
          aria-label="Principal"
          class="hidden md:block w-full md:w-auto"
        >
          <ul
            class="flex flex-col md:flex-row md:items-center gap-1 text-sm border-t border-slate-200 pt-3 md:border-0 md:pt-0"
          >
            <li>
              <a
                href="index.html"
                aria-current="page"
                class="block rounded px-3 py-1.5 bg-sky-100 text-sky-800 font-medium"
                >Locais</a
              >
            </li>
            <li>
              <a
                href="relatos.html"
                class="block rounded px-3 py-1.5 text-slate-600 hover:bg-slate-100 hover:text-slate-900"
                >Relatos</a
              >
            </li>
            <li>
              <a
                href="estatisticas.html"
                class="block rounded px-3 py-1.5 text-slate-600 hover:bg-slate-100 hover:text-slate-900"
                >Estatísticas</a
              >
            </li>
            <li>
              <a
                href="novo-relato.html"
                class="block rounded px-3 py-1.5 bg-sky-700 text-white font-medium hover:bg-sky-800"
                >Novo relato</a
              >
            </li>
            <li>
              <a
                href="entrar.html"
                class="block rounded px-3 py-1.5 border border-slate-300 hover:bg-slate-100"
                >Entrar</a
              >
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Cartões dos locais: gerados por js/locais.js com dados da Open-Meteo -->
    <section aria-labelledby="t-locais">
      <h2 id="t-locais" class="sr-only">Locais seguidos</h2>
      <ul id="lista-locais" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <li>
          <a
            href="local.html?id=guincho"
            class="h-full rounded-lg border-2 border-red-300 bg-white p-4 flex flex-col gap-3 hover:shadow-md transition-shadow"
          >
            <div class="flex items-start justify-between gap-2">
              <div>
                <h3 class="font-semibold leading-tight">Praia do Guincho</h3>
                <p class="text-xs text-slate-500">Cascais · costa</p>
              </div>
              <span
                class="rounded-full bg-red-100 text-red-700 text-xs font-semibold px-2 py-0.5"
                >Alerta</span
              >
            </div>
            <p
              class="font-['Bricolage_Grotesque',sans-serif] text-4xl font-bold"
            >
              <span id="temperatura">17</span>°
            </p>
            <dl
              class="grid grid-cols-3 gap-2 font-['IBM_Plex_Mono',monospace] text-sm tabular-nums"
            >
              <div>
                <dt
                  class="font-sans text-[11px] uppercase tracking-wider text-slate-500"
                >
                  Vento
                </dt>
                <dd>
                  <span id="vento">34</span>
                  <span id="direcao" class="ml-1 text-slate-500">NO</span>
                </dd>
              </div>
              <div>
                <dt
                  class="font-sans text-[11px] uppercase tracking-wider text-slate-500"
                >
                  Chuva
                </dt>
                <dd>0,2 mm</dd>
              </div>
              <div>
                <dt
                  class="font-sans text-[11px] uppercase tracking-wider text-slate-500"
                >
                  Ondas
                </dt>
                <dd>2,4 m</dd>
              </div>
            </dl>
            <p class="text-xs text-red-700">
              Vento acima do seu limite de 30 km/h
            </p>
          </a>
        </li>
      </ul>
      <a
        href="#"
        class="mt-4 inline-block text-sm font-medium text-sky-700 hover:underline"
        >+ Seguir outro local</a
      >
    </section>

    <script>
      const url =
        "https://api.open-meteo.com/v1/forecast?" +
        "latitude=38.37&longitude=-9.47" +
        "&current=temperature_2m,wind_speed_10m,wind_direction_10m";

      async function obterDados() {
        const resposta = await fetch(url);
        const dados = await resposta.json();

        const temperatura = dados.current.temperature_2m;
        document.getElementById("temperatura").textContent = formatar(
          temperatura,
          0,
        );

        const vento = dados.current.wind_speed_10m;
        const graus = dados.current.wind_direction_10m;
        const direcao = direcaoVento(graus);

        document.getElementById("vento").textContent = formatar(vento);
        document.getElementById("direcao").textContent = direcao;

        console.log(dados);
        console.log(temperatura);
      }

      obterDados();

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

      setInterval(function () {
        obterDados();
      }, 100000);
    </script>
  </body>
</html>
