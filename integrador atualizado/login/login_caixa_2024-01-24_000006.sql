/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS usuario;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `Nome` varchar(255) DEFAULT NULL,
  `Matricula` varchar(50) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO usuario(id,Nome,Matricula,CPF,email,usuario,senha,telefone) VALUES('1','\'Rodrigo Bonini Guerreiro\'','\'rodrigoguerreiro217@gmail.com\'','\'493.243.928-83\'','\'rodrigoguerreiro217@gmail.com\'','\'eqweqe\'','\'eqweqe\'','\'+5519971388368\''),('2','\'Rodrigo Bonini Guerreiro\'','\'12313131\'','\'493.243.928-83\'','\'rodrigoguerreiro217@gmail.com\'','\'Guerreiro\'','\'123\'','\'+5519971388368\''),('3','\'Samuel\'','\'98761231453\'','\'493.243.928-83\'','\'rodrigoguerreiro217@gmail.com\'','\'Clay\'','\'123\'','\'19971388368\''),('4','\'Joao\'','\'123123123132\'','\'09765407890\'','\'rodrigoguerreiro217@gmail.com\'','\'Joao\'','\'123\'','\'19971388368\'');