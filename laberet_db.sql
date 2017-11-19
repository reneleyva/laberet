-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 00:43:42
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laberet`
--
CREATE DATABASE IF NOT EXISTS `laberet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laberet`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombreUsuario`, `password`) VALUES
(1, 'luis_admin', '015a40a679f8ea660f534b923cfe3b90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradorlibreria`
--

CREATE TABLE `administradorlibreria` (
  `idAdministrador` int(11) NOT NULL,
  `nombreUsuario` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `idLibreria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradorlibreria`
--

INSERT INTO `administradorlibreria` (`idAdministrador`, `nombreUsuario`, `password`, `idLibreria`) VALUES
(3, 'luisPuli2', 'a64770d4766f1c202f222de59e66051b', 4),
(5, 'luis', 'a64770d4766f1c202f222de59e66051b', 5),
(6, 'rene', 'f35c68c7373baa738e7bb525e50512ca', 6),
(7, 'test', '504f7d1b6eb2d0892e4ed142d055f142', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `calleYnumero` varchar(300) DEFAULT NULL,
  `colonia` varchar(1024) NOT NULL,
  `ciudad` varchar(1024) NOT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `descripcion` varchar(1024) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `delegacion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `calleYnumero`, `colonia`, `ciudad`, `cp`, `descripcion`, `telefono`, `idUsuario`, `delegacion`) VALUES
(5, 'LOL #3', 'Consti 1917', 'CDMX', '09200', 'LOLOLOLOLOL', '044556283049', 4, 'Tlalpan');

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
(6, 'Porrua', 'uploads/El_Sotano_MILIMA20151009_0126_11.jpg', 'uploads/14550478508715.jpg', '5538727389', 'Polanco 187', '12897128912;', NULL, NULL, NULL),
(9, 'Luis', 'uploads/22365443_1146088082191026_1270086391503524564_n.jpg', 'uploads/dummy.jpg', '76876', 'LOOOOOOOOOOL', '98798798789;', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_entrega`
--

CREATE TABLE `pedido_entrega` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(1024) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Volcado de datos para la tabla `registrovisitas`
--

INSERT INTO `registrovisitas` (`idVisitas`, `fecha`, `hora`, `ip`) VALUES
(1, '2017-10-20', '13:47:14', '::1'),
(2, '2017-11-01', '08:13:35', '::1');

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

INSERT INTO `usuario` (`idUsuario`, `nombre`, `correo`, `password`) VALUES
(6, 'Luis Pulido', 'lugia365@gmail.com', '015a40a679f8ea660f534b923cfe3b90');

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
-- Indices de la tabla `pedido_entrega`
--
ALTER TABLE `pedido_entrega`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `administradorlibreria`
--
ALTER TABLE `administradorlibreria`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libreria`
--
ALTER TABLE `libreria`
  MODIFY `idLibreria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT de la tabla `pedido_entrega`
--
ALTER TABLE `pedido_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reestablecer`
--
ALTER TABLE `reestablecer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrovisitas`
--
ALTER TABLE `registrovisitas`
  MODIFY `idVisitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"laberet\",\"table\":\"administrador\"},{\"db\":\"laberet\",\"table\":\"usuario\"},{\"db\":\"laberet\",\"table\":\"librovendido\"},{\"db\":\"laberet\",\"table\":\"pedidosespeciales\"},{\"db\":\"laberet\",\"table\":\"entrega\"},{\"db\":\"laberet\",\"table\":\"libreria\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-10-22 17:14:27', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
