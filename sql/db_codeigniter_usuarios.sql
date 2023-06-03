
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` int(12) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `status` bool DEFAULT NULL,
  `role` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


LOCK TABLES `usuarios` WRITE;

-- SENHA : ADMIN
INSERT INTO `usuarios` VALUES (1,'Admin','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3', 1, 'admin');

-- SENHA : STUDENT
INSERT INTO `usuarios` VALUES (1,'Student', 12345678912,'student@gmail.com','cd73502828457d15655bbd7a63fb0bc8', 1, 'student');

UNLOCK TABLES;
