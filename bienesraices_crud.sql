/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
<<<<<<< HEAD
(6, 'Casa en la playa', '1420000.00', '64ba24074acf1870c125684977959ad4.jpg', 'Hermosa, con una linda vista en la playa y el mar donde te llega la hermosa brisa [actualizado]', 5, 2, 4, '2024-02-14', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(9, 'Casa en el bosque', '3566666.00', '95c6f87895d003b308daf65e601e1b2d.jpg', 'Casa en el bosque Casa en el bosque Casa en el bosque Casa en el bosqueCasa en el bosque Casa en el bosque Casa en el bosque Casa en el bosque', 3, 2, 4, '2024-02-17', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(11, 'Casa Terminados de Lujo', '2000000.00', 'c812524d9f5c60d347b2207998de092d.jpg', 'Casa con diseño moderno, así como tecnología inteligente y amueblada.', 3, 3, 4, '2024-02-20', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(12, 'Casa de Lujo en el Lago', '3000000.00', '95c31842001a5db6bb496e8f24550d1f.jpg', 'Casa de Lago con excelente vista, acabados de lujo a un excelente precio.', 3, 4, 4, '2024-02-20', 2);

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(2, 'correo@correo.com', '$2y$10$JmlNKLf36azYN2SN4fqnFOPXSnPF7hVJ9eAOSqIHwqfRaNgxr5BLu');


INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Gerardo', 'Ruelas Hernández', '5573858588');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Karen', 'Ibarra', '5582826925');

=======
(6, 'Casa en la playa', '1420000.00', '64ba24074acf1870c125684977959ad4.jpg', 'Hermosa, con una linda vista en la playa y el mar donde te llega la hermosa brisa [actualizado]', 5, 2, 4, '2024-02-14', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(9, 'Casa en el bosque', '3566666.00', '95c6f87895d003b308daf65e601e1b2d.jpg', 'Casa en el bosque Casa en el bosque Casa en el bosque Casa en el bosqueCasa en el bosque Casa en el bosque Casa en el bosque Casa en el bosque', 3, 2, 4, '2024-02-17', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(11, 'Casa Terminados de Lujo', '2000000.00', 'c812524d9f5c60d347b2207998de092d.jpg', 'Casa con diseño moderno, así como tecnología inteligente y amueblada.', 3, 3, 4, '2024-02-20', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(12, 'Casa de Lujo en el Lago', '3000000.00', '95c31842001a5db6bb496e8f24550d1f.jpg', 'Casa de Lago con excelente vista, acabados de lujo a un excelente precio.', 3, 4, 4, '2024-02-20', 2);

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(2, 'correo@correo.com', '$2y$10$JmlNKLf36azYN2SN4fqnFOPXSnPF7hVJ9eAOSqIHwqfRaNgxr5BLu');


INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Gerardo', 'Ruelas Hernández', '5573858588');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Karen', 'Ibarra', '5582826925');

>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;