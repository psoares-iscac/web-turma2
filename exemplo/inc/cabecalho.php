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