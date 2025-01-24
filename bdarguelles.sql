/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - bdgym
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdgym` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `bdgym`;

/*Table structure for table `tbldetallespedido` */

DROP TABLE IF EXISTS `tbldetallespedido`;

CREATE TABLE `tbldetallespedido` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `idPedido` (`idPedido`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `tbldetallespedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `tblpedidos` (`idPedido`),
  CONSTRAINT `tbldetallespedido_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tblproductos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbldetallespedido` */

/*Table structure for table `tblpedidos` */

DROP TABLE IF EXISTS `tblpedidos`;

CREATE TABLE `tblpedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` enum('pendiente','enviado','entregado','cancelado') NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `tblpedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblpedidos` */

insert  into `tblpedidos`(`idPedido`,`idUsuario`,`fecha`,`estado`) values 
(1,3,'2023-01-01','pendiente'),
(2,2,'2023-01-02','enviado'),
(8,9,'2023-01-20','entregado');

/*Table structure for table `tblproductos` */

DROP TABLE IF EXISTS `tblproductos`;

CREATE TABLE `tblproductos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` enum('ropa','accesorios','maquinas') NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblproductos` */

insert  into `tblproductos`(`idProducto`,`nombre`,`descripcion`,`precio`,`categoria`,`stock`,`imagen_url`) values 
(1,'Camiseta de gimnasio','Camiseta de algodón, ideal para el entrenamiento',19.99,'ropa',50,'camiseta_gimnasio.jpg'),
(2,'Guantes de levantamiento','Guantes antideslizantes para pesas',29.99,'accesorios',30,'guantes_levantamiento.jpg'),
(3,'Leggings de compresión','Leggings elásticos y cómodos',45.00,'ropa',25,'leggings_compresion.jpg'),
(4,'Zapatillas de running','Suelas de alta tracción para ejercicios de alto impacto',120.00,'accesorios',20,'zapatillas_running.jpg'),
(5,'Banda elástica','Ideal para ejercicios de resistencia',15.50,'accesorios',100,'banda_elastica.jpg'),
(6,'Chaqueta térmica','Con tecnología de control de temperatura para entrenamientos al aire libre',89.99,'ropa',15,'chaqueta_termica.jpg'),
(7,'Mancuernas ajustables','Sistema de pesas intercambiables para entrenamientos variados',75.00,'accesorios',12,'mancuernas_ajustables.jpg'),
(8,'Calcetines de compresión','Mejora la circulación durante el ejercicio',12.99,'ropa',50,'calcetines_compresion.jpg'),
(9,'Shorts de entrenamiento','Con bolsillos para llaves y teléfono',25.00,'ropa',35,'shorts_entrenamiento.jpg');

/*Table structure for table `tblusuarios` */

DROP TABLE IF EXISTS `tblusuarios`;

CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('administrador','personal','cliente') NOT NULL,
  `pregunta` varchar(256) NOT NULL,
  `respuesta` varchar(256) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblusuarios` */

insert  into `tblusuarios`(`idUsuario`,`nombre`,`email`,`contrasena`,`rol`,`pregunta`,`respuesta`) values 
(2,'María López','mariaccc@gmail.com','maria456','personal','',''),
(3,'Carlos García','carlos@gmail.com','carlos789','cliente','',''),
(5,'Luis Torres','luis@gmail.com','luis456','personal','',''),
(9,'Diego Castro','diego@gmail.com','diego789','administrador','',''),
(11,'Alex','alexander123@gmail.com','dd110dd38a9c4567c959427e6bc174d8','cliente','',''),
(14,'Alex','alex123@gmail.com','7f84185e307fdf5fa66aba30ec699fd5','cliente','',''),
(15,'Tilin','tilin@gmail.com','54de734bc460bd404caee618007c6be6','administrador','',''),
(16,'pedro','pedro@gmail.com','c6cc8094c2dc07b700ffcc36d64e2138','cliente','',''),
(20,'Modesto','mogod@gmail.com','96ba48c381bd67f5db7d19a355efde46','cliente','',''),
(21,'Juan','Juan@gmail.com','f5737d25829e95b9c234b7fa06af8736','cliente','',''),
(23,'Gadiel','gadiel@gmail.com','$2y$10$v8gxjeRpYgWh.L6SJag73O/gNGR.KrVk0xtTiGvmC6UfwGKHrybEG','cliente','¿Cuál es el nombre de tu primera mascota?','15e0cb33d53cde9693c4bad017290a18'),
(24,'Tavo','Tavo@gmail.com','52db7d1846c0cc90c09e1a144cfce606','cliente','¿Cuál es el nombre de tu primera mascota?','d2626f412da748e711ca4f4ae9428664'),
(25,'1','1@1.com','c4ca4238a0b923820dcc509a6f75849b','cliente','¿Cuál es el nombre de tu primera mascota?','c4ca4238a0b923820dcc509a6f75849b'),
(28,'Maria Salome','maria@gmail.com','263bce650e68ab4e23f28263760b9fa5','cliente','¿Cuál es el nombre de tu primera mascota?','15e0cb33d53cde9693c4bad017290a18'),
(30,'oscar','oscar@gmail.com','$2y$10$2YXJjkGrt6vfO1cCj04TZuIUnxv9yaCTUvh6XTiJmdKXFs7h/.Yvq','cliente','¿Cuál es tu color favorito?','f156e7995d521f30e6c59a3d6c75e1e5'),
(31,'Estefani','estafani123@gmail.com','2601966ab6c6bf45edfcd1fb44beea48','cliente','','db120d871bfcf7edf97b08f88beaae6a'),
(33,'efren','efren@gmail.com','263bce650e68ab4e23f28263760b9fa5','cliente','¿Cuál es tu color favorito?','92c4cf9df4c01b73f7e757e78ae60841'),
(35,'Juan','nito@gmail.com','202cb962ac59075b964b07152d234b70','cliente','¿En qué ciudad naciste?','4edfc924721abb774d5447bade86ea5d'),
(36,'pere','pere@gmail.com','202cb962ac59075b964b07152d234b70','cliente','¿En qué ciudad naciste?','4edfc924721abb774d5447bade86ea5d'),
(37,'Wero','wero@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','cliente','¿En qué ciudad naciste?','4edfc924721abb774d5447bade86ea5d'),
(38,'Wero','ela@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','cliente','¿Cuál es tu película favorita?','4edfc924721abb774d5447bade86ea5d');

/* Procedure structure for procedure `spInsertarUsuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertarUsuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`::1` PROCEDURE `spInsertarUsuarios`(
    IN pNombre VARCHAR(100), 
    IN pEmail VARCHAR(100), 
    IN pPassword VARCHAR(255), 
    IN pRol ENUM('administrador', 'personal', 'cliente'),
    in preg VARCHAR(256),
    IN resp VARCHAR(256)
)
BEGIN
    -- El hashing de contraseñas debe hacerse en PHP antes de llamar a este procedimiento.
    INSERT INTO tblUsuarios (nombre, email, contrasena, rol, pregunta, respuesta)
    VALUES (pNombre, pEmail, md5(pPassword), pRol, preg, md5(resp));
END */$$
DELIMITER ;

/* Procedure structure for procedure `spLogin` */

/*!50003 DROP PROCEDURE IF EXISTS  `spLogin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`::1` PROCEDURE `spLogin`(in correo varchar(100), in pass varchar(100))
begin 
	select idUsuario, nombre, email, contrasena, rol from tblusuarios where email = correo and contrasena = md5(pass);
end */$$
DELIMITER ;

/* Procedure structure for procedure `spRecuperarContrasena` */

/*!50003 DROP PROCEDURE IF EXISTS  `spRecuperarContrasena` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`::1` PROCEDURE `spRecuperarContrasena`(
    IN pEmail VARCHAR(100),
    IN pPregunta VARCHAR(256),
    IN pRespuesta VARCHAR(256),
    IN nuevaContrasena VARCHAR(255)
)
BEGIN
    -- Verifica si el usuario existe con la pregunta y respuesta correctas
    IF EXISTS (
        SELECT 1 
        FROM tblusuarios
        WHERE email = pEmail AND pregunta = pPregunta AND respuesta = pRespuesta
    ) THEN
        -- Actualiza la contraseña
        UPDATE tblusuarios
        SET contrasena = MD5(nuevaContrasena) -- Encripta la contraseña antes de almacenarla
        WHERE email = pEmail;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La pregunta secreta o respuesta es incorrecta KAKOTA.';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spValidacion` */

/*!50003 DROP PROCEDURE IF EXISTS  `spValidacion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`::1` PROCEDURE `spValidacion`(in preg varchar(256), in resp varchar(256))
begin 
	select idUsuario, nombre, email, contrasena, rol from tblusuarios where pregunta = preg and respuesta = md5(resp);
end */$$
DELIMITER ;

/* Procedure structure for procedure `spValidacionPreguntaRespuesta` */

/*!50003 DROP PROCEDURE IF EXISTS  `spValidacionPreguntaRespuesta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`::1` PROCEDURE `spValidacionPreguntaRespuesta`(
    IN pEmail VARCHAR(100),
    IN pPregunta VARCHAR(256),
    IN pRespuesta VARCHAR(256)
)
BEGIN
    SELECT idUsuario, nombre, email, rol
    FROM tblUsuarios
    WHERE email = pEmail AND pregunta = pPregunta AND respuesta = MD5(pRespuesta);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('administrador','personal','cliente') NOT NULL,
  `pregunta` varchar(256) NOT NULL,
  `respuesta` varchar(256) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELIMITER $$

CREATE DEFINER=`root`@`::1` PROCEDURE `spInsertarUsuarios`(
    IN pNombre VARCHAR(100), 
    IN pEmail VARCHAR(100), 
    IN pPassword VARCHAR(255), 
    IN pRol ENUM('administrador', 'personal', 'cliente'),
    in preg VARCHAR(256),
    IN resp VARCHAR(256)
)
BEGIN
    -- El hashing de contraseñas debe hacerse en PHP antes de llamar a este procedimiento.
    INSERT INTO tblUsuarios (nombre, email, contrasena, rol, pregunta, respuesta)
    VALUES (pNombre, pEmail, SHA2(pPassword, 256), pRol, preg, SHA2(resp, 256));
END $$

DELIMITER $$

CREATE DEFINER=`root`@`::1` PROCEDURE `spLogin`(in correo varchar(100), in pass varchar(100))
begin 
    select idUsuario, nombre, email, contrasena, rol from tblusuarios where email = correo and contrasena = SHA2(pass, 256);
end $$

DELIMITER $$

CREATE DEFINER=`root`@`::1` PROCEDURE `spRecuperarContrasena`(
    IN pEmail VARCHAR(100),
    IN pPregunta VARCHAR(256),
    IN pRespuesta VARCHAR(256),
    IN nuevaContrasena VARCHAR(255)
)
BEGIN
    -- Verifica si el usuario existe con la pregunta y respuesta correctas
    IF EXISTS (
        SELECT 1 
        FROM tblusuarios
        WHERE email = pEmail AND pregunta = pPregunta AND respuesta = SHA2(pRespuesta, 256)
    ) THEN
        -- Actualiza la contraseña
        UPDATE tblusuarios
        SET contrasena = SHA2(nuevaContrasena, 256) -- Encripta la contraseña antes de almacenarla
        WHERE email = pEmail;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La pregunta secreta o respuesta es incorrecta KAKOTA.';
    END IF;
END $$

DELIMITER $$

CREATE DEFINER=`root`@`::1` PROCEDURE `spValidacionPreguntaRespuesta`(
    IN pEmail VARCHAR(100),
    IN pPregunta VARCHAR(256),
    IN pRespuesta VARCHAR(256)
)
BEGIN
    SELECT idUsuario, nombre, email, rol
    FROM tblUsuarios
    WHERE email = pEmail AND pregunta = pPregunta AND respuesta = SHA2(pRespuesta, 256);
END $$*/;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
