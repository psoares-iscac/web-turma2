<?php
phpinfo();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/bd/ligacao.php";

$sql = "SELECT * FROM relatos";
$relatos = $bd->query($sql)->fetchAll(); ?>
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
  <body>
    <?php require __DIR__ . "/inc/cabecalho.php" ?>

    <p>Número de relatos <?= count($relatos) ?></p>

    <ul class="grid gap-4 md:grid-cols-2">
      <?php foreach($relatos as $relato): ?>
      <li
        class="rounded-lg border border-slate-200 bg-white p-4 flex flex-col gap-2"
      >
        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-sm">
          <a href="local.html" class="font-semibold hover:underline"
            >Praia do Guincho</a
          >
          <span class="text-slate-500">hoje, 17:40 · marta.r</span>
        </div>
        <p><?= $relato['texto'] ?></p>
        <div class="flex flex-wrap items-center justify-between gap-2 text-sm">
          <span class="text-slate-500"
            >Nota <span aria-label="2 em 5">★★☆☆☆</span></span
          >
          <span
            class="font-['IBM_Plex_Mono',monospace] text-xs rounded bg-red-100 text-red-700 px-2 py-0.5"
            >vento 38 obs. / 34 prev.</span
          >
        </div>
      </li>
      <?php endforeach ?>
    </ul>

    <?php include __DIR__ . "/inc/rodape.php" ?>
  </body>
</html>
