CREATE DATABASE  IF NOT EXISTS `laberet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laberet`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: laberet
-- ------------------------------------------------------
-- Server version 5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreUsuario` (`nombreUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `administradorlibreria`
--

DROP TABLE IF EXISTS `administradorlibreria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradorlibreria` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `idLibreria` int(10) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  UNIQUE KEY `nombreUsuario` (`nombreUsuario`),
  KEY `FKAdministra51455` (`idLibreria`),
  CONSTRAINT `FKAdministra51455` FOREIGN KEY (`idLibreria`) REFERENCES `libreria` (`idLibreria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `calleYnumero` varchar(300) DEFAULT NULL,
  `colonia` varchar(1024) NOT NULL,
  `ciudad` varchar(1024) NOT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `descripcion` varchar(1024) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `delegacion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idDireccion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `libreria`
--

DROP TABLE IF EXISTS `libreria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libreria` (
  `idLibreria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `fotoPerfil` varchar(1024) NOT NULL,
  `fotoPortada` varchar(1024) NOT NULL,
  `telefono` varchar(1024) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coordenadas` varchar(255) NOT NULL,
  `facebook` varchar(512) DEFAULT NULL,
  `twitter` varchar(512) DEFAULT NULL,
  `instagram` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`idLibreria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `idLibro` int(10) NOT NULL AUTO_INCREMENT,
  `autor` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `isbn` varchar(256) DEFAULT NULL,
  `fechaAdicion` date NOT NULL,
  `precio` double NOT NULL,
  `fotoFrente` varchar(1024) NOT NULL,
  `fotoAtras` varchar(1024) DEFAULT NULL,
  `tags` varchar(1024) NOT NULL,
  `idLibreria` int(10) NOT NULL,
  PRIMARY KEY (`idLibro`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `librosurtido`
--

DROP TABLE IF EXISTS `librosurtido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `librosurtido` (
  `idLibroSurtido` int(10) NOT NULL AUTO_INCREMENT,
  `PedidosEspecialesidPedido` int(10) NOT NULL,
  `LibreriaidLibreria` int(10) NOT NULL,
  `precio` double NOT NULL,
  `foto` varchar(1024) NOT NULL,
  `descripcion` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`idLibroSurtido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `librovendido`
--

DROP TABLE IF EXISTS `librovendido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `librovendido` (
  `idLibroVendido` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `isbn` varchar(256) DEFAULT NULL,
  `precio` double NOT NULL,
  `fotoFrente` varchar(1024) NOT NULL,
  `vendidoLinea` int(1) NOT NULL,
  `tags` varchar(1024) NOT NULL,
  `fechaVenta` date DEFAULT NULL,
  `idLibreria` int(10) NOT NULL,
  `idUsuario` int(10) DEFAULT NULL,
  `Entregaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLibroVendido`),
  KEY `FKLibroVendi753236` (`idLibreria`),
  KEY `FKLibroVendi586606` (`idUsuario`),
  CONSTRAINT `FKLibroVendi586606` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FKLibroVendi753236` FOREIGN KEY (`idLibreria`) REFERENCES `libreria` (`idLibreria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedido_entrega`
--

DROP TABLE IF EXISTS `pedido_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_entrega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedidosespeciales`
--

DROP TABLE IF EXISTS `pedidosespeciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidosespeciales` (
  `idPedido` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `descripcion` varchar(4092) DEFAULT NULL,
  `idUsuario` int(10) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `FKPedidosEsp131845` (`idUsuario`),
  CONSTRAINT `FKPedidosEsp131845` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reestablecer`
--

DROP TABLE IF EXISTS `reestablecer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reestablecer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`),
  KEY `FKReestablec30483` (`idUsuario`),
  CONSTRAINT `FKReestablec30483` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registrovisitas`
--

DROP TABLE IF EXISTS `registrovisitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrovisitas` (
  `idVisitas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`idVisitas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `correo` varchar(512) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuariobloqueado`
--

DROP TABLE IF EXISTS `usuariobloqueado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariobloqueado` (
  `idUsuarioBloqueado` int(10) NOT NULL AUTO_INCREMENT,
  `correo` varchar(256) NOT NULL,
  PRIMARY KEY (`idUsuarioBloqueado`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-19 23:35:15