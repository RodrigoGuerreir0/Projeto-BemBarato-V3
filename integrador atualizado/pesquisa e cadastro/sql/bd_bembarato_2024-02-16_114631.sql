/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
-- Active: 1707394485469@@127.0.0.1@3306
CREATE DATABASE bd_bembarato
    DEFAULT CHARACTER SET = 'utf8mb4';
    
DROP TABLE IF EXISTS tb_funcionario;
CREATE TABLE `tb_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `Nome` varchar(255) DEFAULT NULL,
  `Matricula` varchar(50) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS tb_produtos;
CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_barras` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `validade` date NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `codigo_fiscal` varchar(50) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS tb_produtos_venda;
CREATE TABLE `tb_produtos_venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_venda` int(11) DEFAULT NULL,
  `id_produtos` int(11) DEFAULT NULL,
  `processamento` int(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS tb_usuarios;
CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `nome` varchar(300) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(6) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS tb_vendas;
CREATE TABLE `tb_vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tb_funcionario(id,Nome,Matricula,CPF,email,usuario,senha,telefone) VALUES('1','\'Rodrigo Guerreiro\'','\'1478522f\'','\'099.235.268-62\'','\'rodrigoguerreiro217@gmail.com\'','\'Guerreiro\'','\'123\'','\'(19) 97138-8368\'');

INSERT INTO tb_produtos(id,codigo_barras,nome,descricao,imagem,categoria,estoque,peso,valor,validade,fornecedor,codigo_fiscal,data_modificacao) VALUES('1','\'147852369\'','\'Coca Cola\'','X\'4c61746120333530204d4c\'','\'\'','\'\'','1','300.00','5.99','\'0000-00-00\'','\'\'','\'\'','\'2024-02-16 11:04:48\''),('4','\'123654789\'','\'Fanta-Uva\'','X\'4c617461203335304d4c\'','\'\'','\'Frios\'','0','300.00','6.99','\'2024-02-01\'','\'Coca\'','\'147852369\'','\'2024-02-16 09:21:16\''),('5','\'123654456\'','\'Arroz Prato Fino\'','X\'5361636f206465206172726f7a206d6172636120707261746f2066696e6f2031204b47\'','\'\'','\'Bebida\'','1','1000.00','25.99','\'2024-03-02\'','\'N sei\'','\'14785a\'','\'2024-02-16 10:43:55\''),('6','\'159736842\'','\'Frango\'','X\'4672616e676f2064652031204b47\'','\'\'','\'Bebida\'','1','1000.00','23.99','\'2024-03-30\'','\'friboi\'','\'1478536a\'','\'2024-02-16 10:40:09\'');

INSERT INTO tb_produtos_venda(id,id_venda,id_produtos,processamento) VALUES('1','1','1','0'),('2','1','1','1');

INSERT INTO tb_usuarios(id,nome,cpf,email,nascimento,telefone,cidade,bairro,rua,numero,cep) VALUES('1','\'Rodrigo\'','\'012.365.478-96\'','\'rodrigoguerreiro217@gmail.com\'','\'2006-06-16\'','\'(19) 97138-8368\'','\'Americana\'','\'Jardim Da Paz\'','\'Aliança\'','156','\'13470-492\'');
INSERT INTO tb_vendas(id,hora) VALUES('1','\'2024-02-16 09:18:00\'');