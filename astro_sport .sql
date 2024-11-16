-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 00:41:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `astro_sport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcompra` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `tallaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcompra`, `producto_id`, `cantidad`, `tallaID`) VALUES
(0, 3, '3', 35),
(0, 19, '2', 37),
(0, 2, '1', 32),
(1, 19, '2', 38),
(1, 36, '1', 48),
(1, 88, '2', 50),
(2, 17, '2', 38),
(3, 37, '1', 43),
(3, 44, '1', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `nombre` varchar(45) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nombre`, `id`) VALUES
('botines', 0),
('guantes de arquero', 1),
('remeras', 2),
('kits de entrenamiento', 3),
('accesorios', 4),
('calzado', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `contraseña`, `edad`) VALUES
(43525325, 'sdadasda', 'fafa', 'dsafas', 'santi.buhler1@gmail.com', 231, '12345678', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `precioFinal` varchar(45) DEFAULT NULL,
  `Cliente_Dni` int(11) DEFAULT NULL,
  `pagado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `fecha`, `precioFinal`, `Cliente_Dni`, `pagado`) VALUES
(0, '2024-11-14', '337', 43525325, 'apple_pay'),
(1, '2024-11-16', '130', 43525325, 'Mastercard '),
(2, '2024-11-17', '80', 43525325, 'apple_pay'),
(3, '2024-11-17', NULL, 43525325, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Codigo` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `subcategoria_idsubcategoria` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Codigo`, `marca`, `modelo`, `precio`, `subcategoria_idsubcategoria`, `foto`) VALUES
(0, 'nike', 'mercurial superfly', 110, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones1.jpg'),
(1, 'puma', 'ultra ultimate', 90, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones2.jpg'),
(2, 'puma', 'future 7', 77, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones3.jpg'),
(3, 'puma', 'future ultimate', 89, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones4.jpg'),
(4, 'nike', 'mercurial vapor 14 academy fg', 70, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones5.jpg'),
(5, 'nike', 'mercurial vapor 14 academy mg', 80, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones6.jpg'),
(6, 'adidas', 'predator', 105, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones7.jpg'),
(7, 'adidas', 'X 18', 95, 0, '/imagenes/BOTINES-tapones/BOTINES-tapones8.jpg'),
(9, 'umbro', 'pro 5', 80, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal1.webp'),
(10, 'kelme', 'indoor copa', 75, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal2.jpg'),
(11, 'adidas', 'X crazy fast legue tf', 95, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal3.webp'),
(12, 'nike', 'mercurial vapor 15 academy', 120, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal4.webp'),
(13, 'puma', 'future match', 75, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal5.png'),
(14, 'umbro', 'pro 6', 85, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal6.jpg'),
(15, 'umbro', 'pro 5 bump dragon', 90, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal7.webp'),
(16, 'nike', 'tiempo leyend 9', 65, 1, '/imagenes/BOTINES-s-tapones/BotinDeFutsal8.webp'),
(17, 'reusch', 'attrakt starter', 40, 2, '/imagenes/guantes/guantes1.jpg'),
(18, 'DRB', 'leader 22', 55, 2, '/imagenes/guantes/guantes2.jpg'),
(19, 'DRB', 'leader 22 pro', 35, 2, '/imagenes/guantes/guantes3.png'),
(20, 'DRB', 'master 22', 60, 2, '/imagenes/guantes/guantes4.jpg'),
(21, 'DRB', 'feline 22', 55, 2, '/imagenes/guantes/guantes5.png'),
(22, 'reusch', 'attrakt infinity', 40, 2, '/imagenes/guantes/guantes6.jpg'),
(23, 'reusch', 'pure contact', 60, 2, '/imagenes/guantes/guantes7.jpg'),
(24, 'VGFC', 'turnen', 55, 2, '/imagenes/guantes/guantes8.jpg'),
(25, 'puma', 'ultra grip', 35, 3, '/imagenes/guantes/guantes9.jpg'),
(26, 'VGFC', 'bursa', 70, 3, '/imagenes/guantes/guantesflat1.jpg'),
(27, 'VGFC', 'roth', 50, 3, '/imagenes/guantes/guantesflat2.jpg'),
(28, 'shinestone', 'kalesi', 30, 3, '/imagenes/guantes/guantesflat3.webp'),
(29, 'reusch', 'attakt fusion', 40, 3, '/imagenes/guantes/guantesflat4.webp'),
(30, 'ho', 'protek blade', 40, 3, '/imagenes/guantes/guantesflat5.jpg'),
(31, 'ho', 'arena', 20, 3, '/imagenes/guantes/guantesflat6.jpg'),
(32, 'ho', 'axilal', 20, 3, '/imagenes/guantes/guantesflat7.jpg'),
(33, 'amago', 'los pumas', 25, 4, '/imagenes/musculasas/remeraM1.jpg'),
(34, 'imago', 'dry lite', 25, 4, '/imagenes/musculasas/remeraM2.jpg'),
(35, 'imago', 'tawhiri', 23, 4, '/imagenes/musculasas/remeraM3.jpg'),
(36, 'adidas', 'boca', 30, 4, '/imagenes/musculasas/remeraM5.webp'),
(37, 'adidas', 'river', 30, 4, '/imagenes/musculasas/remeraM6.jpg'),
(38, 'puma', 'indeoendiente', 20, 4, '/imagenes/musculasas/remeraM7.jpeg'),
(39, 'kappa', 'racing', 18, 4, '/imagenes/musculasas/remeraM8.jpg'),
(40, 'nike', 'barcelona', 35, 4, '/imagenes/musculasas/remerasM11.jpg'),
(41, 'imago', 'microfibra', 18, 5, '/imagenes/remeras-depor/remera1.jpg'),
(42, 'puma', 'manchater city', 50, 5, '/imagenes/remeras-depor/remera3.jpg'),
(43, 'underarmor', 'tela fit', 18, 5, '/imagenes/remeras-depor/remera4.jpg'),
(44, 'aidas', 'argentina', 30, 5, '/imagenes/remeras-depor/remera5.jpg'),
(45, 'reebok', 'atletic dept', 22, 5, '/imagenes/remeras-depor/remera6.jpg'),
(46, NULL, 'roja', 12, 5, '/imagenes/remeras-depor/remera2.jpg'),
(47, 'adidas', 'real madrid', 50, 5, '/imagenes/remeras-depor/remera9.jpg'),
(48, 'sg', 'local', 20, 5, '/imagenes/remeras-depor/remera7.jpg'),
(49, NULL, 'Escaleras', 5, 6, '/imagenes/KitsDeEntrenamiento/Escaleras.webp'),
(50, NULL, 'Barra', 25, 6, '/imagenes/KitsDeEntrenamiento/BarraEntrenamiento.jpg'),
(51, NULL, 'Discos', 10, 6, '/imagenes/KitsDeEntrenamiento/DiscosDeLasPesas.jpg'),
(52, NULL, 'Pesa Rusa', 40, 6, '/imagenes/KitsDeEntrenamiento/kettlebell.jpg'),
(53, NULL, 'Rueda Abdominales', 12, 6, '/imagenes/KitsDeEntrenamiento/ruedaabs.jpg'),
(54, NULL, 'Caja', 105, 6, '/imagenes/KitsDeEntrenamiento/cajon.jpg'),
(55, NULL, 'Pelota Con Peso', 55, 6, '/imagenes/KitsDeEntrenamiento/pelotaconpeso.jpg'),
(56, NULL, 'Colchonetas', 20, 6, '/imagenes/KitsDeEntrenamiento/Colchonetas.jpg'),
(57, NULL, 'Pesas', 120, 7, '/imagenes/KitsDeEntrenamiento/setmancuernas.jpg'),
(58, NULL, 'Bandas Elasticas', 30, 7, '/imagenes/KitsDeEntrenamiento/bandaselasticas.jpg'),
(59, NULL, 'Soga con Agarre', 14, 7, '/imagenes/KitsDeEntrenamiento/conmanija.jpg'),
(60, NULL, 'Banco Plano', 100, 7, '/imagenes/KitsDeEntrenamiento/banco.jpg'),
(61, NULL, 'Barra', 15, 7, '/imagenes/KitsDeEntrenamiento/barra.jpg'),
(62, NULL, 'Pera Box', 10, 7, '/imagenes/KitsDeEntrenamiento/pera.jpg'),
(63, NULL, 'Guantes Boxeo', 45, 7, '/imagenes/KitsDeEntrenamiento/guantesbox.jpg'),
(64, NULL, 'Tobilleras Peso', 2, 7, '/imagenes/KitsDeEntrenamiento/tobillera-con-peso.jpg'),
(65, NULL, 'Muñequeras', 5, 7, '/imagenes/KitsDeEntrenamiento/muñequerasdearena.jpg'),
(66, NULL, 'Pelota De Basquet', 15, 8, '/imagenes/Accesorios/basquet.jpg'),
(67, 'Adidas', 'Pelota De Futbol 11', 80, 8, '/imagenes/Accesorios/Pelota11.avif'),
(68, 'Givova', 'Pelota De Futsal', 62, 8, '/imagenes/Accesorios/givova.jpeg'),
(69, 'Penn', 'Pelota De Tennis', 3, 8, '/imagenes/Accesorios/pelotatenis.jpg'),
(70, NULL, 'Pelota De Golf', 16, 8, '/imagenes/Accesorios/golf.jpg'),
(71, 'Penalty', 'Pelota De Handball', 50, 8, '/imagenes/Accesorios/handball.jpg'),
(72, NULL, 'Pelota De Ping Pong', 1, 8, '/imagenes/Accesorios/pelotapingpong.jpg'),
(73, 'Sorma', 'Pelota De Volley', 45, 8, '/imagenes/Accesorios/volley.jpg'),
(74, 'Gilbert', 'Pelota De Rugby', 15, 8, '/imagenes/Accesorios/ovalada.webp'),
(75, NULL, 'Soga', 5, 9, '/imagenes/Accesorios/soga.jpg'),
(76, 'Presslove', 'Straps', 13, 9, '/imagenes/Accesorios/straps.jpg'),
(77, 'Nassau', 'Palo De Hockey', 13, 9, '/imagenes/Accesorios/palodehockey.jpg'),
(78, 'Wilson', 'Raqueta De Tenis', 365, 9, '/imagenes/Accesorios/raquetatenis.jpg'),
(79, 'Head Speed', 'Raqueta De Padel', 400, 9, '/imagenes/Accesorios/raquetapadel.jpg'),
(80, 'Callaway', 'Palo De Golf', 285, 9, '/imagenes/Accesorios/palodegolf.jpg'),
(81, NULL, 'Badminton Racket', 475, 9, '/imagenes/Accesorios/badminton.jpg'),
(82, 'Kipsta BA100', 'Guante De Beisbol', 120, 9, '/imagenes/Accesorios/guantebeisbol.avif'),
(83, 'HAT HITTER', 'Palo De Beisbol', 5, 9, '/imagenes/Accesorios/palobeisbol.webp'),
(84, 'Under Armor', 'Zapatilla Runner Negra', 123, 10, '/imagenes/Calzado/ZapatillasPaCorrer.avif'),
(85, 'Under Armor', 'Zapatilla Runner', 110, 10, '/imagenes/Calzado/ZapatillasPaCorrer2.avif'),
(86, 'Nike', 'Medias Runner', 30, 10, '/imagenes/Calzado/MediasCorrer.avif'),
(87, 'Fox Socks', 'Medias Antideslizantes', 15, 10, '/imagenes/Calzado/MediasAntideslizantes.jpg'),
(88, 'Fox Socks', 'Medias Antideslizantes B&W', 15, 10, '/imagenes/Calzado/MediasAntideslizantes2.avif'),
(89, 'Proyec', 'Vendas Box', 13, 10, '/imagenes/Calzado/vendasBox.jpg'),
(90, 'Nike', 'Guantes Gym', 45, 10, '/imagenes/Calzado/guantes.jpeg'),
(91, 'Wilson', 'Calza Corta', 25, 10, '/imagenes/Calzado/Calza.png'),
(92, 'Body Care', 'Calza Larga', 45, 10, '/imagenes/Calzado/CalzaLarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `nombre` varchar(45) DEFAULT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`nombre`, `idsubcategoria`, `categoria_id`) VALUES
('botines con tapones', 0, 0),
('botines sin tapones', 1, 0),
('Corte Negativo', 2, 1),
('Corte Flat', 3, 1),
('muscualosas', 4, 2),
('deportivas', 5, 2),
('campo', 6, 3),
('gym', 7, 3),
('Pelotas', 8, 4),
('Instrumentos', 9, 4),
('Zapas', 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_talla` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre_talla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id_talla`, `id_categoria`, `nombre_talla`) VALUES
(31, 0, '35'),
(32, 0, '36'),
(33, 0, '37'),
(34, 0, '38'),
(35, 0, '39'),
(36, 0, '40'),
(37, 1, 'S'),
(38, 1, 'M'),
(39, 1, 'L'),
(40, 1, 'XL'),
(41, 1, 'XXL'),
(42, 1, 'XXXL'),
(43, 2, 'S'),
(44, 2, 'M'),
(45, 2, 'L'),
(46, 2, 'XL'),
(47, 2, 'XXL'),
(48, 2, 'XXXL'),
(49, 5, '36'),
(50, 5, '37'),
(51, 5, '38'),
(52, 5, '39'),
(53, 5, '40'),
(54, 5, '41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `idcompra` (`idcompra`),
  ADD KEY `tallaID` (`tallaID`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cliente_Dni` (`Cliente_Dni`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_productos_subcategoria1_idx` (`subcategoria_idsubcategoria`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idsubcategoria`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_talla`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`Codigo`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`tallaID`) REFERENCES `tallas` (`id_talla`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Cliente_Dni`) REFERENCES `clientes` (`DNI`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_subcategoria1` FOREIGN KEY (`subcategoria_idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD CONSTRAINT `tallas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
