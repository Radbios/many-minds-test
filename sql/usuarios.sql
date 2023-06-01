
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


LOCK TABLES `usuarios` WRITE;

INSERT INTO `usuarios` VALUES (1,'José Fabiano','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3');

UNLOCK TABLES;
