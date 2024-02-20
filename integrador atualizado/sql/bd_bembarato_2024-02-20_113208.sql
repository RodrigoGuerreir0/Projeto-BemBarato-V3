
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS tb_produtos_venda;
CREATE TABLE `tb_produtos_venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_venda` int(11) DEFAULT NULL,
  `id_produtos` int(11) DEFAULT NULL,
  `processamento` int(1) unsigned zerofill NOT NULL,
  `Quantidade` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

INSERT INTO tb_funcionario(id,Nome,Matricula,CPF,email,usuario,senha,telefone) VALUES('1','\'\\\'Rodrigo Guerreiro\\\'\'','\'\\\'1478522f\\\'\'','\'\\\'099.235.268-6\'','\'\\\'rodrigoguerreiro217@gmail.com\\\'\'','\'\\\'Guerreiro\\\'\'','\'\\\'123\\\'\'','\'\\\'(19) 97138-8368\\\'\'');

INSERT INTO tb_produtos(id,codigo_barras,nome,descricao,imagem,categoria,estoque,peso,valor,validade,fornecedor,codigo_fiscal,data_modificacao) VALUES('1','\'123456\'','\'açúcar União\'','X\'c38920756d2061c3a7c3ba63617220636f6d206772c3a36f732066696e6f732065206ec3a36f20646566696e69646f73\'','\'\'','\'Alimentos\'','1','1.15','4.69','\'2024-05-10\'','\'Grupo Camil\'','\'123a\'','\'2024-02-20 08:27:49\''),('2','\'1234567\'','\'Adoçante Zero-Cal Líquido Ciclamato\'','X\'c3a9207574696c697a61646f20636f6d6f207375627374697475746f20646f2061c3a7c3ba63617220636f6d756d\'','\'\'','\'Alimentos\'','2','131.60','13.00','\'2024-02-01\'','\'Hypera Pharma\'','\'123b\'','\'2024-02-20 08:33:27\''),('3','\'12345678\'','\'água mineral Crystal com gás\'','X\'6120c3a167756120636f6d2067c3a173204372797374616c20353030206d6c20c3a920666f6e74652064652068696472617461c3a7c3a36f\'','\'\'','\'Bebida\'','3','516.00','3.00','\'2024-02-01\'','\'Crystal\'','\'123c\'','\'2024-02-20 08:39:40\''),('4','\'123456789\'','\'Água Sanitária Candura\'','X\'c3a920756d2070726f6475746f206465206c696d70657a6120c3a02062617365206465206869706f636c6f7269746f2064652073c3b364696f\'','\'\'','\'Limpeza\'','4','5.10','20.00','\'2024-01-01\'','\'Candura\'','\'123d\'','\'2024-02-20 08:45:23\''),('5','\'1234560\'','\'Álcool Líquido\'','X\'2070726f6475746f206465206c696d70657a61206520646573696e666563c3a7c3a36f2c20696465616c20706172612075736f20646f6dc3a9737469636f206520696e647573747269616c\'','\'\'','\'Limpeza\'','5','1.00','12.50','\'2024-02-02\'','\'Coperalcool\'','\'123e\'','\'2024-02-20 08:51:55\''),('6','\'1234561\'','\'Amaciante Ypê Tradicional\'','X\'2070726f6475746f206465206c696d70657a612071756520616d6163696120652070657266756d6120617320726f75706173\'','\'\'','\'Lavanderia\'','6','2.20','14.99','\'2024-02-20\'','\'Ypê\'','\'123f\'','\'2024-02-20 08:58:03\''),('7','\'1234562\'','\'Arroz Urbano\'','X\'7469706f206465206172726f7a206272616e636f2c20706f6c69646f206520726566696e61646f\'','\'\'','\'Alimentos\'','7','1.00','29.99','\'2024-01-01\'','\'Urbano Alimentos\'','\'123h\'','\'2024-02-20 09:08:25\''),('8','\'1234563\'','\'Batata Pré-Frita Tradicional Congelada McCain Pacote\'','X\'62617461746173206672697461732070726f6e7461732070617261207072657061726f\'','\'\'','\'Frios\'','5','1.00','31.99','\'2024-02-02\'','\'McCain\'','\'123i\'','\'2024-02-20 09:15:13\''),('9','\'1234564\'','\'Café Pilão\'','X\'636f6e68656369646120706f72206f66657265636572206772c3a36f732073656c6563696f6e61646f73206520746f72726120657363757261\'','\'\'','\'Alimentos\'','8','0.50','19.99','\'2024-02-20\'','\'Jacobs Douwe Egberts\'','\'123j\'','\'2024-02-20 09:20:08\''),('10','\'1234565\'','\'Creme De Leite Piracanjuba \'','X\'70726f6475746f206cc3a16374656f2071756520706f7373756920756d612074657874757261206372656d6f73612065207361626f72207375617665\'','\'\'','\'Alimentos\'','3','0.20','4.99','\'2024-01-25\'','\'Piracanjuba\'','\'123k\'','\'2024-02-20 09:24:51\''),('11','\'1234566\'','\'Farinha de Trigo Dona Benta\'','X\'4120666172696e686120646520747269676f20446f6e612042656e746120c3a9207574696c697a61646120656d206469766572736173207265636569746173\'','\'\'','\'Alimentos\'','5','1.00','19.55','\'2024-01-17\'','\'J.Macêdo\'','\'123l\'','\'2024-02-20 09:32:06\''),('12','\'1234577\'','\'Kimilho Flocão YOKI\'','X\'c3a920756d2070726f6475746f20666569746f206465206d696c686f\'','\'\'','\'Alimentos\'','2','0.50','4.39','\'2024-01-26\'','\'Yoki\'','\'123m\'','\'2024-02-20 09:37:58\''),('13','\'123456788\'','\' Farinha de Trigo Renata\'','X\'4120666172696e686120646520747269676f2052656e61746120c3a9207574696c697a61646120656d2064697665727361732072656365697461732063756c696ec3a172696173\'','\'\'','\'Alimentos\'','7','1.00','14.55','\'2024-02-15\'','\'J. Macêdo\'','\'123n\'','\'2024-02-20 09:45:00\''),('14','\'1234567899\'','\'Feijao Camil carioca\'','X\'4f206665696ac3a36f20636172696f636120c3a920756d6120657863656c656e746520666f6e74652064652070726f7465c3ad6e61\'','\'\'','\'Alimentos\'','10','1.00','11.99','\'2024-01-30\'','\'Camil\'','\'112o\'','\'2024-02-20 09:49:09\''),('15','\'12345671\'','\'Macarrão Galo Sêmola Parafuso\'','X\'4f20666f726d61746f20646520706172616675736f20c3a9206d7569746f20706f70756c617220652076657273c3a174696c\'','\'\'','\'Alimentos\'','7','0.50','9.99','\'2024-02-19\'','\'Galo\'','\'123p\'','\'2024-02-20 09:56:31\''),('16','\'12345672\'','\'Camisinha Olla\'','X\'65666963617a20636f6e74726120646f656ec3a761732073657875616c6d656e7465207472616e736d697373c3ad76656973206520677261766964657a20696e646573656a616461\'','\'\'','\'Higiene Pessoal\'','10','0.02','24.99','\'2024-01-27\'','\' Hypera Pharma\'','\'123q\'','\'2024-02-20 10:50:41\''),('17','\'12345673\'','\'Creme Dental Colgate\'','X\'20456c6520c3a920757361646f2070617261206c696d706172206f732064656e7465732c2072656d6f766572206120706c6163612062616374657269616e6120\'','\'\'','\'Higiene Pessoal\'','5','0.09','15.50','\'2024-04-17\'','\'Colgate-Palmolive\'','\'123r\'','\'2024-02-20 10:56:53\''),('18','\'12345674\'','\'Papel Higiênico Folha Dupla Neutro PERSONAL Vip\'','X\'c3a920756d2070726f6475746f2064652068696769656e6520706573736f616c20\'','\'\'','\'Higiene Pessoal\'','4','1.50','32.00','\'2024-05-16\'','\'Personal\'','\'123s\'','\'2024-02-20 11:03:00\''),('19','\'12345675\'','\'Sabonete Flor de Ype\'','X\'c3a920636f6e68656369646f2070656c6120737561207175616c6964616465206520737561766964616465\'','\'\'','\'Higiene Pessoal\'','8','0.09','2.90','\'2024-06-04\'','\'Ypê\'','\'123t\'','\'2024-02-20 11:07:28\''),('20','\'12345676\'','\'Banana Nanica\'','X\'412062616e616e61206e616e69636120c3a9207269636120656d20706f74c3a17373696f2c20766974616d696e6173204120652043\'','\'\'','\'Frutas e Legumes\'','7','1.00','12.00','\'2024-04-16\'','\'hortfruti\'','\'123u\'','\'2024-02-20 11:12:52\''),('21','\'12345677\'','\'Repolho Verde \'','X\'204f207265706f6c686f20766572646520c3a920756d6120657863656c656e746520666f6e7465206465206669627261732c20766974616d696e617320432065204b2c206520616e74696f786964616e746573\'','\'\'','\'Frutas e Legumes\'','3','1.00','6.00','\'2024-03-28\'','\'fresh organicos\'','\'123v\'','\'2024-02-20 11:21:57\''),('22','\'1234511\'','\'Limão Taiti\'','X\'206c696dc3a36f2d746169746920c3a920756d6120657863656c656e746520666f6e746520646520766974616d696e6120432c20616e74696f786964616e746573206520666962726173\'','\'\'','\'Frutas e Legumes\'','6','1.00','15.99','\'2024-04-22\'','\'hortfruti\'','\'123w\'','\'2024-02-20 11:27:01\'');

INSERT INTO tb_produtos_venda(id,id_venda,id_produtos,processamento,Quantidade) VALUES('1','1','1','0','1'),('2','1','1','1','1'),('3','1','2','0','1'),('8','1','5','0','1'),('9','1','5','0','1');

INSERT INTO tb_usuarios(id,nome,cpf,email,nascimento,telefone,cidade,bairro,rua,numero,cep) VALUES('1','\'\\\'Rodrigo\\\'\'','\'\\\'012.365.478-9\'','\'\\\'rodrigoguerreiro217@gmail.com\\\'\'','\'0000-00-00\'','\'\\\'(19) 97138-836\'','\'\\\'Americana\\\'\'','\'\\\'Jardim Da Paz\\\'\'','\'\\\'Aliança\\\'\'','156','\'\\\'13470-49\'');
INSERT INTO tb_vendas(id,hora) VALUES('1','\'0000-00-00 00:00:00\'');