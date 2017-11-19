-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2017 a las 23:41:32
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laberet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradorlibreria`
--

CREATE TABLE `administradorlibreria` (
  `idAdministrador` int(11) NOT NULL,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idLibreria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradorlibreria`
--

INSERT INTO `administradorlibreria` (`idAdministrador`, `nombreUsuario`, `password`, `idLibreria`) VALUES
(3, 'luisPuli2', 'a64770d4766f1c202f222de59e66051b', 4),
(5, 'luis', 'a64770d4766f1c202f222de59e66051b', 5),
(6, 'rene', 'f7bf61400fb5e93ba66e90e80d9b3653', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `calleYnumero` varchar(150) NOT NULL,
  `delegacion` varchar(150) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL, 
  `descripcion` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idDireccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libreria`
--

CREATE TABLE `libreria` (
  `idLibreria` int(10) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `fotoPerfil` varchar(1024) NOT NULL,
  `fotoPortada` varchar(1024) NOT NULL,
  `telefono` varchar(1024) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coordenadas` varchar(255) NOT NULL,
  `facebook` varchar(512) DEFAULT NULL,
  `twitter` varchar(512) DEFAULT NULL,
  `instagram` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libreria`
--

INSERT INTO `libreria` (`idLibreria`, `nombre`, `fotoPerfil`, `fotoPortada`, `telefono`, `direccion`, `coordenadas`, `facebook`, `twitter`, `instagram`) VALUES
(4, 'Aurora', 'uploads/blue-abstract-logo-template_23-2147500373 (1).jpg', 'uploads/14550478508715.jpg', '5659834', 'Periférico 67', '1343;', NULL, NULL, NULL),
(5, 'El Sótano', 'uploads/blue-abstract-logo-template_23-2147500373 (1).jpg', 'uploads/logoElSotano.jpg', '55672398', 'División del Norte', '23453466856;', NULL, NULL, NULL),
(6, 'Porrua', 'uploads/El_Sotano_MILIMA20151009_0126_11.jpg', 'uploads/14550478508715.jpg', '5538727389', 'Polanco 187', '12897128912;', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(10) NOT NULL,
  `autor` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `isbn` varchar(256) DEFAULT NULL,
  `fechaAdicion` date NOT NULL,
  `precio` double NOT NULL,
  `fotoFrente` varchar(1024) NOT NULL,
  `fotoAtras` varchar(1024) DEFAULT NULL,
  `tags` varchar(1024) NOT NULL,
  `idLibreria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `autor`, `titulo`, `isbn`, `fechaAdicion`, `precio`, `fotoFrente`, `fotoAtras`, `tags`, `idLibreria`) VALUES
(1, 'Thomas Harris', 'El Dragón Rojo', NULL, '2017-06-27', 300, 'uploads/Libro_dragon.jpg', 'uploads/BSO_El_Dragon_Rojo_(Red_Dragon)--Trasera.jpg', 'suspenso  policiaco  Thomas Harris', 4),
(2, 'Thomas Harris', 'Hannibal', NULL, '2017-06-27', 429, 'uploads/151C6dml54xL._AC_UL320_SR202,320_.jpg', 'uploads/19786074450552-A.jpg', ' policiaco  lecter  suspenso  Thomas Harris', 4),
(3, 'J. K. Rowling', 'Harry Potter', NULL, '2017-06-27', 200, 'uploads/2Kazu-Kibuishi-Harry-Potter1.jpg', 'uploads/21b.jpg', 'magia  J. K. Rowling', 4),
(5, 'Stephen King', 'It (Eso)', NULL, '2017-06-27', 345, 'uploads/4pennywise.jpg', 'uploads/4Libro_Planeta_001_r.jpg', 'miedo  payaso  Stephen King', 4),
(6, 'John Katzenbach', 'El Psicoanalista', NULL, '2017-06-27', 478, 'uploads/5El-psicoanalista-1.jpg', 'uploads/5IMG_20150914_170445.jpg', 'suspenso  análisis  John Katzenbach', 4),
(7, 'Stephen King', 'Carrie', NULL, '2017-06-28', 245, 'uploads/6carrie86.jpg', 'uploads/69786074450552-A.jpg', 'suspenso  carrie  Stephen King', 5),
(8, 'Isabel Allende', 'La Casa de Los Espíritus', NULL, '2017-06-28', 23, 'uploads/7la-casa-de-los-espiritus-9788401352898.jpg', 'uploads/7Allende, Isabel - La casa de los espíritus [Contraportada].JPG', 'Amor  Isabel Allende', 5),
(9, 'Isaac Asimov', 'Adiós a la Tierra', NULL, '2017-07-01', 89, 'uploads/89788498890785.jpg', 'uploads/89786074450552-A.jpg', ' ficción  ciencia  Isaac Asimov', 6),
(10, 'J. K. Rowling', 'Animales Fantásticos', NULL, '2017-07-01', 345, 'uploads/981sY5tHIezL.jpg', 'uploads/99786074450552-A.jpg', 'magia  J. K. Rowling', 6),
(11, 'Isaac Asimov', 'El Cometa Halley', NULL, '2017-07-01', 645, 'uploads/10asimov1.jpg', 'uploads/109786074450552-A.jpg', 'ciencia  Ficción  Isaac Asimov', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librosurtido`
--

CREATE TABLE `librosurtido` (
  `idLibroSurtido` int(10) NOT NULL,
  `PedidosEspecialesidPedido` int(10) NOT NULL,
  `LibreriaidLibreria` int(10) NOT NULL,
  `precio` double NOT NULL,
  `foto` varchar(1024) NOT NULL,
  `descripcion` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `librosurtido`
--

INSERT INTO `librosurtido` (`idLibroSurtido`, `PedidosEspecialesidPedido`, `LibreriaidLibreria`, `precio`, `foto`, `descripcion`) VALUES
(1, 1, 4, 423, 'no hay foto', 'está muy bien cuidado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librovendido`
--

CREATE TABLE `librovendido` (
  `idLibroVendido` int(11) NOT NULL,
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
  `Entregaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosespeciales`
--

CREATE TABLE `pedidosespeciales` (
  `idPedido` int(10) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `descripcion` varchar(4092) DEFAULT NULL,
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidosespeciales`
--

INSERT INTO `pedidosespeciales` (`idPedido`, `titulo`, `autor`, `isbn`, `descripcion`, `idUsuario`) VALUES
(1, 'Yo, robot', 'Isaac Asimov', '393jkkl23j', 'un libro de ciencia ficción', 1),
(2, 'Carrie', 'Stephen King', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reestablecer`
--

CREATE TABLE `reestablecer` (
  `id` int(11) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrovisitas`
--

CREATE TABLE `registrovisitas` (
  `idVisitas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `correo` varchar(512) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `correo`, `password`, `DireccionidDireccion`) VALUES
(1, 'Luis', 'luispuli2@ciencias.unam.mx', 'a64770d4766f1c202f222de59e66051b', NULL),
(3, 'Liz Mi Vida', 'liz@ciencias.unam', 'f7bf61400fb5e93ba66e90e80d9b3653', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariobloqueado`
--

CREATE TABLE `usuariobloqueado` (
  `idUsuarioBloqueado` int(10) NOT NULL,
  `correo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

--
-- Indices de la tabla `administradorlibreria`
--
ALTER TABLE `administradorlibreria`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`),
  ADD KEY `FKAdministra51455` (`idLibreria`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libreria`
--
ALTER TABLE `libreria`
  ADD PRIMARY KEY (`idLibreria`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `librosurtido`
--
ALTER TABLE `librosurtido`
  ADD PRIMARY KEY (`idLibroSurtido`);

--
-- Indices de la tabla `librovendido`
--
ALTER TABLE `librovendido`
  ADD PRIMARY KEY (`idLibroVendido`),
  ADD KEY `FKLibroVendi753236` (`idLibreria`),
  ADD KEY `FKLibroVendi586606` (`idUsuario`);

--
-- Indices de la tabla `pedidosespeciales`
--
ALTER TABLE `pedidosespeciales`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `FKPedidosEsp131845` (`idUsuario`);

--
-- Indices de la tabla `reestablecer`
--
ALTER TABLE `reestablecer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`),
  ADD KEY `FKReestablec30483` (`idUsuario`);

--
-- Indices de la tabla `registrovisitas`
--
ALTER TABLE `registrovisitas`
  ADD PRIMARY KEY (`idVisitas`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuariobloqueado`
--
ALTER TABLE `usuariobloqueado`
  ADD PRIMARY KEY (`idUsuarioBloqueado`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `administradorlibreria`
--
ALTER TABLE `administradorlibreria`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `libreria`
--
ALTER TABLE `libreria`
  MODIFY `idLibreria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `librosurtido`
--
ALTER TABLE `librosurtido`
  MODIFY `idLibroSurtido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `librovendido`
--
ALTER TABLE `librovendido`
  MODIFY `idLibroVendido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidosespeciales`
--
ALTER TABLE `pedidosespeciales`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reestablecer`
--
ALTER TABLE `reestablecer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registrovisitas`
--
ALTER TABLE `registrovisitas`
  MODIFY `idVisitas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuariobloqueado`
--
ALTER TABLE `usuariobloqueado`
  MODIFY `idUsuarioBloqueado` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradorlibreria`
--
ALTER TABLE `administradorlibreria`
  ADD CONSTRAINT `FKAdministra51455` FOREIGN KEY (`idLibreria`) REFERENCES `libreria` (`idLibreria`);

--
-- Filtros para la tabla `librovendido`
--
ALTER TABLE `librovendido`
  ADD CONSTRAINT `FKLibroVendi586606` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `FKLibroVendi753236` FOREIGN KEY (`idLibreria`) REFERENCES `libreria` (`idLibreria`);

--
-- Filtros para la tabla `pedidosespeciales`
--
ALTER TABLE `pedidosespeciales`
  ADD CONSTRAINT `FKPedidosEsp131845` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `reestablecer`
--
ALTER TABLE `reestablecer`
  ADD CONSTRAINT `FKReestablec30483` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
