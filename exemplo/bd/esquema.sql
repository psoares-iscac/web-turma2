-- Aragem · Estrutura da base de dados (SQLite)
--
-- Três tabelas:
--   locais       → os sítios que aparecem na página inicial
--   utilizadores → quem entra no site e escreve relatos
--   relatos      → o que cada utilizador observou num local
--
-- Cada relato pertence a UM local e a UM utilizador (duas relações 1:N).
-- As FOREIGN KEY garantem que esse local e esse utilizador existem.

-- Apagar primeiro a tabela que depende das outras
DROP TABLE IF EXISTS relatos;
DROP TABLE IF EXISTS utilizadores;
DROP TABLE IF EXISTS locais;

CREATE TABLE locais (
  id            INTEGER PRIMARY KEY AUTOINCREMENT,
  codigo        TEXT    NOT NULL UNIQUE,   -- usado nos endereços: local.html?id=guincho
  nome          TEXT    NOT NULL,
  descricao     TEXT    NOT NULL,
  latitude      REAL    NOT NULL,
  longitude     REAL    NOT NULL,
  mar_latitude  REAL,                      -- só os locais de costa têm ponto no mar
  mar_longitude REAL                       -- (NULL nos restantes)
);

CREATE TABLE utilizadores (
  id            INTEGER PRIMARY KEY AUTOINCREMENT,
  nome          TEXT    NOT NULL UNIQUE,   -- o nome que aparece nos relatos: marta.r
  email         TEXT    NOT NULL UNIQUE,   -- usado para entrar (entrar.html)
  palavra_passe TEXT    NOT NULL,          -- NUNCA a palavra-passe em si: só o hash (password_hash)
  criado_em     TEXT    NOT NULL DEFAULT (datetime('now'))
);

CREATE TABLE relatos (
  id             INTEGER PRIMARY KEY AUTOINCREMENT,
  local_id       INTEGER NOT NULL REFERENCES locais(id),
  utilizador_id  INTEGER NOT NULL REFERENCES utilizadores(id),
  data           TEXT    NOT NULL,         -- "2026-10-31T17:40" (ordena-se bem como texto)
  nota           INTEGER NOT NULL CHECK (nota BETWEEN 1 AND 5),
  texto          TEXT    NOT NULL,
  variavel       TEXT    NOT NULL CHECK (variavel IN ('vento', 'ondas', 'temperatura', 'humidade')),
  observado      REAL    NOT NULL,
  previsto       REAL    NOT NULL
);
