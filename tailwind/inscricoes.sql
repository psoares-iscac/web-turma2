-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- A despejar estrutura para tabela web1.inscricoes
CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventoId` int NOT NULL,
  `email` varchar(128) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `telefone` varchar(128) NOT NULL,
  `socio` tinyint NOT NULL DEFAULT (0),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela web1.inscricoes: ~7 rows (aproximadamente)
INSERT INTO `inscricoes` (`id`, `eventoId`, `email`, `nome`, `telefone`, `socio`) VALUES
	(1, 1, 'joao.silva@exemplo.pt	', 'João Silva	', '912345678', 0),
	(2, 1, 'mariana.costa@email.com	', 'Mariana Costa	', '934567890', 0),
	(3, 1, 'pedro.almeida@empresa.pt	', 'Pedro Almeida	', '965432101', 0),
	(4, 1, 'ana.ribeiro@servico.com	', 'Ana Ribeiro	', '911223344', 0),
	(5, 1, 'carlos.santos@exemplo.pt	', 'Carlos Santos	', '933445566', 1),
	(6, 1, 'sofia.ferreira@email.com	', 'Sofia Ferreira	', '966778899', 0),
	(7, 1, 'beatriz.pereira@servico.com	', 'Beatriz Pereira	', '938765432', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
