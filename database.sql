/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.6.17 : Database - braganca_controle_estoque
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE if not exists `controle_estoque`;

USE `controle_estoque`;

/*Table structure for table `apresentacao` */

CREATE TABLE `apresentacao` (
  `id_apresentacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_apresentacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_apresentacao`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `apresentacao` */

LOCK TABLES `apresentacao` WRITE;

insert  into `apresentacao`(`id_apresentacao`,`nome_apresentacao`) values (1,'CUIDADO DA PELE'),(2,'CUIDADO CAPILAR'),(3,'ANTI-ENVELHECIMENTO'),(4,'PELE E BRONZE'),(5,'DIETA E EMAGRECIMENTO'),(6,'BELEZA ORAL'),(7,'BEM ESTAR GERAL'),(8,'BEM-ESTAR SEXUAL'),(9,'DEPILAÇÃO'),(10,'MUSCULAÇÃO E FITNESS');

UNLOCK TABLES;

/*Table structure for table `categoria` */

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

insert  into `categoria`(`id_categoria`,`nome_categoria`) values (1,'Acne'),(2,'Estrias'),(3,'Tratamento do Corpo'),(4,'Tratamento Facial'),(5,'Varizes'),(6,'Zona Olhos & Olheiras'),(7,'Aclarar o Cabelo'),(8,'Alisamento Japonês'),(9,'Anti-Queda Capilar'),(10,'Coloração Anti-Idade'),(11,'Crescimento Acelerado'),(12,'Volumizador Capilar'),(13,'Cremes Anti-Idade'),(14,'Dispositivos Radiofrequência'),(15,'Suplementos Anti-Idade'),(16,'Bronze Natural'),(17,'Bronzeadores Instantâneos'),(18,'Manutenção do Bronze');

UNLOCK TABLES;

/*Table structure for table `estoque` */

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(4) NOT NULL,
  `produto` int(11) NOT NULL,
  PRIMARY KEY (`id_estoque`),
  KEY `cod_produto` (`produto`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `estoque` */

LOCK TABLES `estoque` WRITE;

insert  into `estoque`(`id_estoque`,`quantidade`,`produto`) values (1,31,103);

UNLOCK TABLES;

/*Table structure for table `fornecedor` */

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(25) DEFAULT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fornecedor` */

LOCK TABLES `fornecedor` WRITE;

insert  into `fornecedor`(`id_fornecedor`,`cnpj`,`razao_social`,`telefone`,`ativo`) values (1,'12.345.678-0001/90','TcheBR Sites Ltda','(51) 9190-0817','S');

UNLOCK TABLES;

/*Table structure for table `item` */

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `valor_item` decimal(8,2) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `cod_nota` int(11) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `cod_nota` (`cod_nota`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

LOCK TABLES `item` WRITE;

insert  into `item`(`id_item`,`valor_item`,`quantidade`,`cod_nota`,`cod_produto`) values (1,'228.80',25,1,103);

UNLOCK TABLES;

/*Table structure for table `item_pedido` */

CREATE TABLE `item_pedido` (
  `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `cod_pedido` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `flag_baixa` char(1) NOT NULL DEFAULT 'A',
  `obs` varchar(180) NOT NULL,
  PRIMARY KEY (`id_item_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `item_pedido` */

LOCK TABLES `item_pedido` WRITE;

insert  into `item_pedido`(`id_item_pedido`,`quantidade`,`cod_pedido`,`cod_produto`,`flag_baixa`,`obs`) values (1,1,1,103,'A',''),(2,5,2,103,'S','');

UNLOCK TABLES;

/*Table structure for table `nota` */

CREATE TABLE `nota` (
  `cod_nota` int(11) NOT NULL AUTO_INCREMENT,
  `numero_nota` varchar(10) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `data_nota` date NOT NULL,
  `fechado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_nota`),
  KEY `id_fornecedor` (`id_fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `nota` */

LOCK TABLES `nota` WRITE;

insert  into `nota`(`cod_nota`,`numero_nota`,`id_fornecedor`,`data_nota`,`fechado`) values (1,'2015',1,'2015-00-27',1);

UNLOCK TABLES;

/*Table structure for table `pedido` */

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade_pedida` int(4) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  `data_pedido` date NOT NULL,
  `obs` varchar(180) DEFAULT NULL,
  `flag_baixa` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`cod_pedido`),
  KEY `id_usuario` (`id_usuario`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

LOCK TABLES `pedido` WRITE;

insert  into `pedido`(`cod_pedido`,`quantidade_pedida`,`id_usuario`,`cod_produto`,`data_pedido`,`obs`,`flag_baixa`) values (1,0,3,NULL,'2015-00-28','Uso de produtos exclusivos.','A'),(2,0,1,NULL,'2015-00-28','Teste de pedido','S');

UNLOCK TABLES;

/*Table structure for table `perfil` */

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(15) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

LOCK TABLES `perfil` WRITE;

insert  into `perfil`(`id_perfil`,`nome_perfil`,`nivel`) values (1,'admin',1),(2,'user',2);

UNLOCK TABLES;

/*Table structure for table `produto` */

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(6) NOT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `qtd_minima` int(4) DEFAULT NULL,
  `unidade` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_produto`),
  KEY `cod_apresentacao` (`unidade`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

/*Data for the table `produto` */

LOCK TABLES `produto` WRITE;

insert  into `produto`(`id_produto`,`codigo`,`nome_produto`,`qtd_minima`,`unidade`,`categoria`) values (103,'001','acne estrela-nova tecnologia de tratamento do acne',10,1,1);

UNLOCK TABLES;

/*Table structure for table `setor` */

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_setor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `setor` */

LOCK TABLES `setor` WRITE;

insert  into `setor`(`id_setor`,`nome_setor`) values (1,'administrador'),(2,'funcionario');

UNLOCK TABLES;

/*Table structure for table `usuario` */

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_usuario`),
  KEY `id_setor` (`setor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`id_usuario`,`name`,`login`,`senha`,`perfil`,`setor`,`ativo`) values (1,'Chefe','admin','admin',1,1,'S'),(2,'Bragança','braganca','1234',2,2,'S'),(3,'Rodrigo','rodrigo','123456',2,2,'S');

UNLOCK TABLES;

/* Trigger structure for table `item` */

DELIMITER $$

/*!50003 CREATE TRIGGER `TR_adiciona_estoque` AFTER INSERT ON `item` FOR EACH ROW BEGIN
	CALL SP_AtualizaEstoque(new.cod_produto, new.quantidade, 'I', '');
END */$$


DELIMITER ;

/* Trigger structure for table `item` */

DELIMITER $$

/*!50003 CREATE TRIGGER `TR_atualiza_item_estoque` AFTER UPDATE ON `item` FOR EACH ROW BEGIN
	CALL SP_AtualizaEstoque(new.cod_produto, old.quantidade-new.quantidade, 'I', '');
END */$$


DELIMITER ;

/* Trigger structure for table `item` */

DELIMITER $$

/*!50003 CREATE TRIGGER `TR_remove_item_estoque` AFTER DELETE ON `item` FOR EACH ROW BEGIN
    CALL SP_AtualizaEstoque(old.cod_produto, old.quantidade, 'R', '');
END */$$


DELIMITER ;

/* Trigger structure for table `item_pedido` */

DELIMITER $$

/*!50003 CREATE TRIGGER `TR_altera_pedido_estoque` AFTER UPDATE ON `item_pedido` FOR EACH ROW BEGIN
	CALL SP_AtualizaEstoque(new.cod_produto, new.quantidade* -1, new.flag_baixa, new.cod_pedido);
END */$$


DELIMITER ;

/* Trigger structure for table `produto` */

DELIMITER $$

/*!50003 CREATE TRIGGER `TR_cria_estoque` AFTER INSERT ON `produto` FOR EACH ROW BEGIN
   CALL SP_AtualizaEstoque(new.id_produto, 0, 'N', '');
END */$$


DELIMITER ;

/* Procedure structure for procedure `SP_AtualizaEstoque` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AtualizaEstoque`(IN `id_produto` INT, IN `quantidade_in` INT, IN `opcao` CHAR(1), IN `cod_pedido` INT)
BEGIN
    DECLARE contador INT(11);

	CASE opcao
		WHEN 'S'
			THEN
				BEGIN
					DECLARE qtd_estoque INT (4);
					SELECT quantidade INTO qtd_estoque FROM estoque WHERE produto = id_produto;
					IF qtd_estoque >= (quantidade_in*-1) THEN
						UPDATE estoque SET quantidade=quantidade + quantidade_in WHERE produto = id_produto;
					ELSE
						UPDATE estoque SET quantidade=quantidade WHERE produto = id_produto;
					END IF;
				END;
		WHEN 'N'
			THEN INSERT INTO estoque (produto) values (id_produto);

		WHEN 'I'
			THEN UPDATE estoque SET quantidade=quantidade + quantidade_in WHERE produto = id_produto;

		WHEN 'R'
			THEN UPDATE estoque SET quantidade=quantidade - quantidade_in WHERE produto = id_produto;

		ELSE
			BEGIN
			END;
	END CASE;

END */$$
DELIMITER ;

/*Table structure for table `consumo_por_setor` */

DROP TABLE IF EXISTS `consumo_por_setor`;

/*!50001 CREATE TABLE `consumo_por_setor` (
  `login` varchar(20) NOT NULL,
  `nome_setor` varchar(30) DEFAULT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `quantidade_pedida` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `consumo_produto` */

DROP TABLE IF EXISTS `consumo_produto`;

/*!50001 CREATE TABLE `consumo_produto` (
  `nome_produto` varchar(50) DEFAULT NULL,
  `quantidade_pedida` int(4) NOT NULL,
  `data_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `ver_produtos` */

DROP TABLE IF EXISTS `ver_produtos`;

/*!50001 CREATE TABLE `ver_produtos` (
  `codigo` varchar(6) NOT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `minimo` int(4) DEFAULT NULL,
  `unidade` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `visualizar_estoque` */

DROP TABLE IF EXISTS `visualizar_estoque`;

/*!50001 CREATE TABLE `visualizar_estoque` (
  `codigo` varchar(6) NOT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `quantidade` int(4) NOT NULL,
  `minimo` int(4) DEFAULT NULL,
  `apresentacao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `visualizar_notas` */

DROP TABLE IF EXISTS `visualizar_notas`;

/*!50001 CREATE TABLE `visualizar_notas` (
  `cod_nota` int(11) NOT NULL DEFAULT '0',
  `id_item` int(11) NOT NULL DEFAULT '0',
  `numero_nota` varchar(10) NOT NULL,
  `data_nota` date NOT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `quantidade` int(4) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view consumo_por_setor */

/*!50001 DROP TABLE IF EXISTS `consumo_por_setor` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consumo_por_setor` AS select `u`.`login` AS `login`,`s`.`nome_setor` AS `nome_setor`,`p`.`nome_produto` AS `nome_produto`,`c`.`quantidade_pedida` AS `quantidade_pedida` from (((`pedido` `c` join `produto` `p`) join `usuario` `u`) join `setor` `s`) where ((`c`.`cod_produto` = `p`.`id_produto`) and (`c`.`id_usuario` = `u`.`id_usuario`) and (`u`.`setor` = `s`.`id_setor`)) group by `s`.`nome_setor`,`p`.`nome_produto` */;

/*View structure for view consumo_produto */

/*!50001 DROP TABLE IF EXISTS `consumo_produto` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consumo_produto` AS select `p`.`nome_produto` AS `nome_produto`,`c`.`quantidade_pedida` AS `quantidade_pedida`,`c`.`data_pedido` AS `data_pedido` from (`pedido` `c` join `produto` `p`) where (`c`.`cod_produto` = `p`.`id_produto`) group by `c`.`data_pedido` */;

/*View structure for view ver_produtos */

/*!50001 DROP TABLE IF EXISTS `ver_produtos` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ver_produtos` AS select `p`.`codigo` AS `codigo`,`p`.`nome_produto` AS `produto`,`p`.`qtd_minima` AS `minimo`,`a`.`nome_apresentacao` AS `unidade` from (`produto` `p` join `apresentacao` `a`) where (`p`.`unidade` = `a`.`id_apresentacao`) order by `p`.`nome_produto` */;

/*View structure for view visualizar_estoque */

/*!50001 DROP TABLE IF EXISTS `visualizar_estoque` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visualizar_estoque` AS select `p`.`codigo` AS `codigo`,`p`.`nome_produto` AS `produto`,`e`.`quantidade` AS `quantidade`,`p`.`qtd_minima` AS `minimo`,`a`.`nome_apresentacao` AS `apresentacao` from ((`produto` `p` join `estoque` `e`) join `apresentacao` `a`) where ((`e`.`produto` = `p`.`id_produto`) and (`p`.`unidade` = `a`.`id_apresentacao`)) order by `p`.`nome_produto` */;

/*View structure for view visualizar_notas */

/*!50001 DROP TABLE IF EXISTS `visualizar_notas` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visualizar_notas` AS select `n`.`cod_nota` AS `cod_nota`,`i`.`id_item` AS `id_item`,`n`.`numero_nota` AS `numero_nota`,`n`.`data_nota` AS `data_nota`,`f`.`razao_social` AS `fornecedor`,`p`.`nome_produto` AS `nome`,`i`.`quantidade` AS `quantidade`,`i`.`valor_item` AS `valor`,(`i`.`quantidade` * `i`.`valor_item`) AS `subtotal` from (((`nota` `n` join `item` `i`) join `produto` `p`) join `fornecedor` `f`) where ((`n`.`cod_nota` = `i`.`cod_nota`) and (`i`.`cod_produto` = `p`.`id_produto`) and (`n`.`id_fornecedor` = `f`.`id_fornecedor`)) order by `n`.`data_nota` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
