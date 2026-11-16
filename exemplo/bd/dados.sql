-- Aragem · Dados iniciais
-- Os locais do array de js/locais.js (mais a Arrábida), os autores e os relatos de dados/relatos.json.
-- Os ids dos locais (1 a 5) são os mesmos do <select> do novo-relato.html.

-- Locais
INSERT INTO locais (id, codigo, nome, descricao, latitude, longitude, mar_latitude, mar_longitude) VALUES
  (1, 'guincho',    'Praia do Guincho', 'Cascais · costa',           38.73, -9.47, 38.73, -9.52),
  (2, 'supertubos', 'Supertubos',       'Peniche · costa',           39.34, -9.36, 39.34, -9.42),
  (3, 'torre',      'Torre',            'Serra da Estrela · 1993 m', 40.32, -7.61, NULL,  NULL),
  (4, 'pena',       'Trilho da Pena',   'Sintra · trilho',           38.79, -9.39, NULL,  NULL),
  (5, 'arrabida',   'Arrábida',         'Setúbal · costa',           38.48, -8.98, 38.46, -8.98);

-- Utilizadores
-- Todos têm a palavra-passe de teste  aragem2026
-- Na coluna fica só o hash, gerado em PHP com password_hash('aragem2026', PASSWORD_DEFAULT).
INSERT INTO utilizadores (id, nome, email, palavra_passe) VALUES
  (1, 'andre.p', 'andre.p@exemplo.pt', '$2y$10$EXpFwzHaT3yHoFH/UvQ1p.IDLQbmGMpNM2ZgDPTOVxY7VJVFgmkTW'),
  (2, 'carla.v', 'carla.v@exemplo.pt', '$2y$10$fCjt7mFYcCIwjxChREO8JeNeSRA.NY7m5CcQ1A3N7rApnz1nznnx.'),
  (3, 'ines_c', 'ines_c@exemplo.pt', '$2y$10$aolF1k3J/TcdzXbbZrU5wOZSKVgmRF2AogDiKBTlv54CO1658nyxi'),
  (4, 'joao_s', 'joao_s@exemplo.pt', '$2y$10$y1idg3m0fzhN/51DJoqX/eXSNMZj4khppCOMqcU0xKK4gGI4pzvVG'),
  (5, 'marta.r', 'marta.r@exemplo.pt', '$2y$10$mI3COtfZXilhDpiFFpHtUO6231bsNJOclzx84G.oe9p3xsOhx1dBu'),
  (6, 'miguel.f', 'miguel.f@exemplo.pt', '$2y$10$u9FbYOKxDgc6wv.7tF5t7ev8d0LTU5su2nGxmJpS0/UED.ciW44yG'),
  (7, 'nuno.b', 'nuno.b@exemplo.pt', '$2y$10$SdHh927ivLwZ0BvA4B4dMe2xPF5A3Qob1nMDyOzUEGar/0gnAxt/C'),
  (8, 'pedro.n', 'pedro.n@exemplo.pt', '$2y$10$gloPkcSTrm6sHi8qHausmuV5zQFrzCOEFCFtipsDxmdKUvkflWD3.'),
  (9, 'rui.alves', 'rui.alves@exemplo.pt', '$2y$10$IsIkChDrtDcxU.wHMkd2LulhgHLre/ZQGkJI7EULedURiPTTBVdOK'),
  (10, 'sofia.m', 'sofia.m@exemplo.pt', '$2y$10$7sSVT4bA1XMjME.UnA9QL.SeKQmAU/peo7pG71h61fOJLyncvBd8q'),
  (11, 'tiago.lm', 'tiago.lm@exemplo.pt', '$2y$10$8Qlkczg8AM/LjnJAnQVTieZP.TFbM2rRE2ZKdBcwxVDrwqa.AQO8O');

-- Relatos
INSERT INTO relatos (id, local_id, utilizador_id, data, nota, texto, variavel, observado, previsto) VALUES
  (1, 3, 9, '2026-10-21T09:00', 2, 'Chuva gelada e visibilidade reduzida. Estrada com cuidado.', 'temperatura', 0, 3),
  (2, 1, 11, '2026-10-21T16:45', 4, 'Vento moderado e constante. Muitas velas de kite na água.', 'vento', 25, 23),
  (3, 5, 6, '2026-10-22T10:20', 3, 'Alguma ondulação à entrada da baía, mas protegido junto à praia.', 'ondas', 0.8, 0.5),
  (4, 4, 2, '2026-10-22T15:00', 4, 'Nevoeiro na serra, mas sem chuva. Ambiente misterioso no Chalet da Condessa.', 'humidade', 92, 90),
  (5, 2, 1, '2026-10-23T07:50', 5, 'Tubos perfeitos ao nascer do sol. Um dos melhores dias do mês.', 'ondas', 2.4, 2.3),
  (6, 3, 10, '2026-10-23T13:25', 3, 'Nublado com abertas. Temperatura agradável para a altitude.', 'temperatura', 8, 7),
  (7, 1, 7, '2026-10-24T11:30', 1, 'Areia a voar com o vento, impossível ficar na praia. Previsão muito abaixo.', 'vento', 47, 31),
  (8, 5, 8, '2026-10-24T14:10', 5, 'Mar como um lago. Bom para caiaque até à Lapa de Santa Margarida.', 'ondas', 0.2, 0.3),
  (9, 4, 3, '2026-10-25T09:40', 3, 'Chuviscos intermitentes e pedras escorregadias. Levar calçado com boa aderência.', 'humidade', 97, 85),
  (10, 2, 4, '2026-10-25T17:00', 2, 'Mar desarrumado com vento de oeste. Não compensou entrar.', 'vento', 24, 16),
  (11, 3, 9, '2026-10-26T10:15', 4, 'Céu limpo e frio seco. Primeiros vestígios de geada nas poças.', 'temperatura', 2, 3),
  (12, 1, 5, '2026-10-26T18:20', 3, 'Nortada a entrar ao fim da tarde, como previsto. Bom para windsurf avançado.', 'vento', 29, 28),
  (13, 5, 6, '2026-10-27T12:00', 4, 'Pouco vento e água a 18 graus. Estacionamento já cheio ao meio-dia.', 'vento', 8, 10),
  (14, 4, 2, '2026-10-27T16:30', 5, 'Tarde de sol e vistas limpas até ao Cabo da Roca. Trilho seco.', 'temperatura', 19, 18),
  (15, 2, 1, '2026-10-28T08:05', 4, 'Boas séries logo de manhã, vento ainda de terra. Às 10:00 já estava cheio.', 'ondas', 2.1, 1.8),
  (16, 3, 10, '2026-10-28T14:45', 2, 'Vento muito forte no planalto, difícil andar perto da torre. Nevoeiro a subir.', 'vento', 52, 41),
  (17, 1, 11, '2026-10-29T09:10', 4, 'Manhã calma, mar com pouca ondulação. Bom para paddle.', 'vento', 15, 14),
  (18, 5, 8, '2026-10-29T15:20', 5, 'Água transparente e mar flat. Excelente para snorkeling junto ao Portinho.', 'ondas', 0.3, 0.4),
  (19, 4, 3, '2026-10-30T08:30', 4, 'Nevoeiro cerrado até perto das 10:00, depois abriu. Trilho com lama na descida.', 'humidade', 90, 88),
  (20, 3, 9, '2026-10-30T11:02', 3, 'Mais frio do que o previsto e gelo nas zonas de sombra. Levar luvas.', 'temperatura', 1, 4),
  (21, 2, 4, '2026-10-31T16:15', 5, 'Ondas limpas e regulares, pouca gente na água. A previsão acertou.', 'ondas', 1.5, 1.6),
  (22, 1, 5, '2026-10-31T17:40', 2, 'Rajadas muito fortes na zona norte da praia. Kitesurf só para quem tem experiência.', 'vento', 38, 34);
