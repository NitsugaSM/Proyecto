-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2019 a las 20:08:14
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gaagooco_twff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `descripcion`) VALUES
(2, 'Animadas', 'piÃ±atas de dibujos animados'),
(3, 'Tradicionales', 'piÃ±atas de conos de colores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `email`, `mensaje`, `fecha`, `estatus`) VALUES
(11, 'ale-jandis@hotmail.com', 'Buen diseÃ±o', '2019/02/22', 1),
(12, 'tavin@tavin.com', 'Me encantan sus piÃ±atas', '2019/02/22', 1),
(13, 'vanny@vanny', 'Hello', '2019/02/22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `email`, `telefono`, `asunto`, `mensaje`) VALUES
(1, 'Alejandra Almaraz', 'ale-jandis@hotmail.com', '5235782', 'Pedido', 'Personalizar una piÃ±ata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `idFaq` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`idFaq`, `pregunta`, `respuesta`) VALUES
(1, 'No encuentro la respuesta a mi pregunta, Â¿quÃ© hago?', 'Haga clic en la pÃ¡gina de \"Contactos\" y envÃ­enos su pregunta, le responderemos tan pronto como sea posible.'),
(2, '-Â¿Todos los artÃ­culos estÃ¡n disponibles?', 'Defina su polÃ­tica de stock, Â¿Muestra sus productos aÃºn si estÃ¡n fuera de stock? Â¿CuÃ¡l es el plazo de aprovisionamiento?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `metodoPago` varchar(100) NOT NULL,
  `metodoEnvio` varchar(100) NOT NULL,
  `fechaPedido` varchar(50) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `producto`, `total`, `metodoPago`, `metodoEnvio`, `fechaPedido`, `estatus`) VALUES
(5, 16, ' /1 Super Girl $250 ', 250, 'Transferencia Bancaria', 'OrderExpress', '2019/04/10', 'En proceso'),
(6, 16, ' /2 minions $435 ', 870, 'Tarjeta de crÃ©dito', 'DHL', '2019/04/10', 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `url`, `nombreProducto`, `precio`, `stock`, `descripcion`) VALUES
(3, 2, 'uploads/engrane-md.png', 'Super Girl', 250, 6, 'PiÃ±ata del logo de SUper Girl'),
(4, 3, 'uploads/3.png', 'minions', 435, 6, 'aaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` varchar(12) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `privilegios` tinyint(4) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `imagen`, `nombre`, `apellidos`, `calle`, `numero`, `colonia`, `cp`, `ciudad`, `estado`, `referencia`, `email`, `password`, `estatus`, `privilegios`) VALUES
(1, '', 'Administrador', '--', '--', '--', '--', '--', 'AcÃ¡mbaro', '--', '--', 'admin@admin.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(16, 'uploads/cabana-de-madera-en-el-bosque-Mazama-14.jpeg', 'Alejandra', 'Almaraz', '--', '--', '--', '--', '--', 'Guanajuato', '--', 'ale@ale', '1c57cd3a09db4131c7baef5fe35c1da3715fdba4', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`idFaq`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedido-usuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `productos-categorias` (`idCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido-usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos-categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
