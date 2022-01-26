/*
Navicat MySQL Data Transfer

Source Server         : Conex
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bd_prestamos

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-01-24 15:49:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for autor
-- ----------------------------
DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for detalleprestamo
-- ----------------------------
DROP TABLE IF EXISTS `detalleprestamo`;
CREATE TABLE `detalleprestamo` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idPrestamo` int(11) DEFAULT NULL,
  `idLibro` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `fk_prestamo` (`idPrestamo`),
  KEY `fk_libro` (`idLibro`),
  CONSTRAINT `fk_libro` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`),
  CONSTRAINT `fk_prestamo` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idprestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for libro
-- ----------------------------
DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(12) DEFAULT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `idAutor` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLibro`),
  KEY `fk_autor` (`idAutor`),
  KEY `fk_categoria` (`idCategoria`),
  CONSTRAINT `fk_autor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for prestamo
-- ----------------------------
DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE `prestamo` (
  `idprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  `fechaDevolucion` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`idprestamo`),
  KEY `fk_cliente` (`idCliente`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(30) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- View structure for vi_libros
-- ----------------------------
DROP VIEW IF EXISTS `vi_libros`;
CREATE ALGORITHM=UNDEFINED DEFINER=`simplerisk`@`localhost` SQL SECURITY DEFINER  VIEW `vi_libros` AS SELECT
libro.idLibro,
libro.isbn,
libro.titulo,
libro.paginas,
CONCAT(autor.nombres,autor.apellidos) AS autor,
categoria.descripcion AS categoria,
libro.idAutor,
libro.idCategoria
FROM
libro
INNER JOIN autor ON libro.idAutor = autor.idAutor
INNER JOIN categoria ON libro.idCategoria = categoria.idCategoria ;
