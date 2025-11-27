<?php 
session_start();

/* 1 — CORS */
$allowed_origin = "https://meusite.com";
if (!isset($_SERVER["HTTP_ORIGIN"]) || $_SERVER["HTTP_ORIGIN"] !== $allowed_origin) {
    http_response_code(403);
    die(json_encode(["erro" => "Origem não permitida"]));
}
header("Access-Control-Allow-Origin: " . $allowed_origin);

/* 2 — Header personalizado */
if (!isset($_SERVER["HTTP_X_APP_REQUEST"]) || $_SERVER["HTTP_X_APP_REQUEST"] !== "fetch") {
    http_response_code(403);
    die(json_encode(["erro" => "Acesso inválido"]));
}

/* 3 — Token anti-acesso direto */
if (!isset($_SERVER["HTTP_X_APP_TOKEN"]) || $_SERVER["HTTP_X_APP_TOKEN"] !== $_SESSION["token"]) {
    http_response_code(403);
    die(json_encode(["erro" => "Token inválido"]));
}
/* gerar token*/
session_start();
$_SESSION["token"] = bin2hex(random_bytes(16));
/* passar token ao javascript */
<script>
    const APP_TOKEN = "<?= $_SESSION['token'] ?>";
</script>
/* enviat token no fetch */
fetch("totalInscritos3.php?id=123", {
    headers: {
        "X-App-Token": APP_TOKEN
    }
})



/* 4 — Método permitido */
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    die(json_encode(["erro" => "Método não permitido"]));
}

/* 5 — Lógica normal */
$id = $_GET["id"] ?? null;
if (!$id) {
    die(json_encode(["erro" => "ID não enviado"]));
}




| Header              | JSON (POST/PUT)                       | FormData (POST)                                        | GET                                   | Como validar no PHP                             | Observações                                                        |
| ------------------- | ------------------------------------- | ------------------------------------------------------ | ------------------------------------- | ----------------------------------------------- | ------------------------------------------------------------------ |
| `Content-Type`      | `"application/json"`                  | Não definir (o browser define `"multipart/form-data"`) | Não usado                             | `$_SERVER["CONTENT_TYPE"]` ou `getallheaders()` | Indica o tipo do corpo da requisição                               |
| `Accept`            | `"application/json"`                  | `"application/json"`                                   | `"application/json"`                  | `$_SERVER["HTTP_ACCEPT"]`                       | Indica o tipo de resposta que se espera do servidor                |
| `Authorization`     | `"Bearer TOKEN"`                      | `"Bearer TOKEN"`                                       | `"Bearer TOKEN"`                      | `$_SERVER["HTTP_AUTHORIZATION"]`                | Cabeçalho de autenticação (token, Basic Auth, Bearer)              |
| `X-App-Token`       | `"TOKEN"`                             | `"TOKEN"`                                              | `"TOKEN"`                             | `$_SERVER["HTTP_X_APP_TOKEN"]`                  | Token personalizado de segurança (sessão, JWT, etc.)               |
| `X-App-Request`     | `"fetch"`                             | `"fetch"`                                              | `"fetch"`                             | `$_SERVER["HTTP_X_APP_REQUEST"]`                | Identifica a requisição como proveniente da Fetch API da aplicação |
| `X-Requested-With`  | `"XMLHttpRequest"`                    | `"XMLHttpRequest"`                                     | `"XMLHttpRequest"`                    | `$_SERVER["HTTP_X_REQUESTED_WITH"]`             | Tradicionalmente usado para identificar AJAX                       |
| `Cache-Control`     | `"no-cache"`                          | `"no-cache"`                                           | `"no-cache"`                          | `$_SERVER["HTTP_CACHE_CONTROL"]`                | Controlo do cache da requisição                                    |
| `If-Modified-Since` | `"Wed, 21 Oct 2015 07:28:00 GMT"`     | `"..."`                                                | `"..."`                               | `$_SERVER["HTTP_IF_MODIFIED_SINCE"]`            | Cache condicional: só retorna se modificado desde a data           |
| `Origin`            | Definido automaticamente pelo browser | Definido automaticamente pelo browser                  | Definido automaticamente pelo browser | `$_SERVER["HTTP_ORIGIN"]`                       | Indica a origem da requisição, útil para CORS                      |
| `Referer`           | `"https://meusite.com/pagina"`        | `"https://meusite.com/pagina"`                         | `"https://meusite.com/pagina"`        | `$_SERVER["HTTP_REFERER"]`                      | Indica a página de origem da requisição                            |
| `User-Agent`        | `"MinhaApp/1.0"`                      | `"MinhaApp/1.0"`                                       | `"MinhaApp/1.0"`                      | `$_SERVER["HTTP_USER_AGENT"]`                   | Identifica o cliente que está a fazer a requisição                 |
| `Accept-Language`   | `"pt-PT,pt;q=0.9,en;q=0.8"`           | `"pt-PT,pt;q=0.9,en;q=0.8"`                            | `"pt-PT,pt;q=0.9,en;q=0.8"`           | `$_SERVER["HTTP_ACCEPT_LANGUAGE"]`              | Idioma preferido da resposta                                       |
