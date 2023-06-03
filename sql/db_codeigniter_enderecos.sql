DROP TABLE IF EXISTS `enderecos`;

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `bairro` int(12) DEFAULT NULL,
  `cidade` varchar(256) DEFAULT NULL,
  `logradouro` varchar(256) DEFAULT NULL,
  `estado` varchar(256) DEFAULT NULL,
  `cep` varchar(256) DEFAULT NULL,
  FOREIGN KEY (user_id) REFERENCES usuarios(id),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


LOCK TABLES `enderecos` WRITE;

UNLOCK TABLES;