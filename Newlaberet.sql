-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: laberet
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `administradorlibreria`
--

LOCK TABLES `administradorlibreria` WRITE;
/*!40000 ALTER TABLE `administradorlibreria` DISABLE KEYS */;
INSERT INTO `administradorlibreria` VALUES (3,'luisPuli2','a64770d4766f1c202f222de59e66051b',4),(5,'luis','a64770d4766f1c202f222de59e66051b',5),(6,'rene','f35c68c7373baa738e7bb525e50512ca',6),(7,'test','504f7d1b6eb2d0892e4ed142d055f142',9);
/*!40000 ALTER TABLE `administradorlibreria` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (5,'LOL #3','Consti 1917','CDMX','09200','LOLOLOLOLOL','044556283049',4,'Tlalpan');
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `direccion` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `libreria`
--

LOCK TABLES `libreria` WRITE;
/*!40000 ALTER TABLE `libreria` DISABLE KEYS */;
INSERT INTO `libreria` VALUES (4,'Aurora','uploads/blue-abstract-logo-template_23-2147500373 (1).jpg','uploads/14550478508715.jpg','5659834','Periférico 67','1343;',NULL,NULL,NULL),(5,'El Sótano','uploads/blue-abstract-logo-template_23-2147500373 (1).jpg','uploads/logoElSotano.jpg','55672398','División del Norte','23453466856;',NULL,NULL,NULL),(6,'Porrua','uploads/El_Sotano_MILIMA20151009_0126_11.jpg','uploads/14550478508715.jpg','5538727389','Polanco 187','12897128912;',NULL,NULL,NULL),(9,'Luis','uploads/22365443_1146088082191026_1270086391503524564_n.jpg','uploads/dummy.jpg','76876','LOOOOOOOOOOL','98798798789;',NULL,NULL,NULL);
/*!40000 ALTER TABLE `libreria` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (1,'Thomas Harris','El Dragón Rojo',NULL,'2017-06-27',300,'uploads/Libro_dragon.jpg','uploads/BSO_El_Dragon_Rojo_(Red_Dragon)--Trasera.jpg','suspenso  policiaco  Thomas Harris',4),(2,'Thomas Harris','Hannibal',NULL,'2017-06-27',429,'uploads/151C6dml54xL._AC_UL320_SR202,320_.jpg','uploads/19786074450552-A.jpg',' policiaco  lecter  suspenso  Thomas Harris',4),(3,'J. K. Rowling','Harry Potter',NULL,'2017-06-27',200,'uploads/2Kazu-Kibuishi-Harry-Potter1.jpg','uploads/21b.jpg','magia  J. K. Rowling',4),(5,'Stephen King','It (Eso)',NULL,'2017-06-27',345,'uploads/4pennywise.jpg','uploads/4Libro_Planeta_001_r.jpg','miedo  payaso  Stephen King',4),(6,'John Katzenbach','El Psicoanalista',NULL,'2017-06-27',478,'uploads/5El-psicoanalista-1.jpg','uploads/5IMG_20150914_170445.jpg','suspenso  análisis  John Katzenbach',4),(7,'Stephen King','Carrie',NULL,'2017-06-28',245,'uploads/6carrie86.jpg','uploads/69786074450552-A.jpg','suspenso  carrie  Stephen King',5),(8,'Isabel Allende','La Casa de Los Espíritus',NULL,'2017-06-28',23,'uploads/7la-casa-de-los-espiritus-9788401352898.jpg','uploads/7Allende, Isabel - La casa de los espíritus [Contraportada].JPG','Amor  Isabel Allende',5),(9,'Isaac Asimov','Adiós a la Tierra',NULL,'2017-07-01',89,'uploads/89788498890785.jpg','uploads/89786074450552-A.jpg',' ficción  ciencia  Isaac Asimov',6),(10,'J. K. Rowling','Animales Fantásticos',NULL,'2017-07-01',345,'uploads/981sY5tHIezL.jpg','uploads/99786074450552-A.jpg','magia  J. K. Rowling',6),(11,'Isaac Asimov','El Cometa Halley',NULL,'2017-07-01',645,'uploads/10asimov1.jpg','uploads/109786074450552-A.jpg','ciencia  Ficción  Isaac Asimov',6);
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `librosurtido`
--

LOCK TABLES `librosurtido` WRITE;
/*!40000 ALTER TABLE `librosurtido` DISABLE KEYS */;
INSERT INTO `librosurtido` VALUES (1,1,4,423,'no hay foto','está muy bien cuidado');
/*!40000 ALTER TABLE `librosurtido` ENABLE KEYS */;
UNLOCK TABLES;

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
  `fechaVenta` date NOT NULL,
  `idLibreria` int(10) NOT NULL,
  `idUsuario` int(10) DEFAULT NULL,
  `Entregaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLibroVendido`),
  KEY `FKLibroVendi753236` (`idLibreria`),
  KEY `FKLibroVendi586606` (`idUsuario`),
  CONSTRAINT `FKLibroVendi586606` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FKLibroVendi753236` FOREIGN KEY (`idLibreria`) REFERENCES `libreria` (`idLibreria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `librovendido`
--

LOCK TABLES `librovendido` WRITE;
/*!40000 ALTER TABLE `librovendido` DISABLE KEYS */;
/*!40000 ALTER TABLE `librovendido` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `FKPedidosEsp131845` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidosespeciales`
--

LOCK TABLES `pedidosespeciales` WRITE;
/*!40000 ALTER TABLE `pedidosespeciales` DISABLE KEYS */;
INSERT INTO `pedidosespeciales` VALUES (1,'Yo, robot','Isaac Asimov','393jkkl23j','un libro de ciencia ficción',1),(2,'Carrie','Stephen King',NULL,NULL,1);
/*!40000 ALTER TABLE `pedidosespeciales` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `FKReestablec30483` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reestablecer`
--

LOCK TABLES `reestablecer` WRITE;
/*!40000 ALTER TABLE `reestablecer` DISABLE KEYS */;
/*!40000 ALTER TABLE `reestablecer` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `registrovisitas`
--

LOCK TABLES `registrovisitas` WRITE;
/*!40000 ALTER TABLE `registrovisitas` DISABLE KEYS */;
INSERT INTO `registrovisitas` VALUES (1,'2017-10-20','13:47:14','::1'),(2,'2017-11-01','08:13:35','::1');
/*!40000 ALTER TABLE `registrovisitas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Luis','luispuli2@ciencias.unam.mx','a64770d4766f1c202f222de59e66051b'),(3,'Liz Mi Vida','liz@ciencias.unam','f7bf61400fb5e93ba66e90e80d9b3653'),(4,'Rene','rene@mail.com','b70e594dc654971004c5fe4d6f41712a'),(5,'Rene','leyvi@mail.com','b70e594dc654971004c5fe4d6f41712a');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping data for table `usuariobloqueado`
--

LOCK TABLES `usuariobloqueado` WRITE;
/*!40000 ALTER TABLE `usuariobloqueado` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariobloqueado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-19 16:17:05
