-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 01:14:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `assessment`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `calificacion_promedio_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `calificacion_promedio_productos` (
`id_producto` int(11)
,`nombre_producto` varchar(50)
,`total_comentarios` bigint(21)
,`suma_votos` decimal(32,0)
,`promedio_votos` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `fecha_alta`) VALUES
(1, 'Aceites', '2022-09-05 05:09:04'),
(2, 'Cremas', '2022-09-05 05:09:40'),
(3, 'Abarrotes', '2022-09-05 05:10:07'),
(4, 'Productos Enlatados', '2022-09-05 05:10:34'),
(5, 'Lácteos', '2022-09-05 05:10:54'),
(6, 'Botanas', '2022-09-05 05:11:06'),
(7, 'Confitería/Dulcería', '2022-09-05 05:11:49'),
(8, 'Harinas y Pan', '2022-09-05 05:12:06'),
(9, 'Frutas y Verduras', '2022-09-05 05:12:24'),
(10, 'Bebidas', '2022-09-05 05:12:39'),
(11, 'Bebidas Alchólicas', '2022-09-05 05:13:03'),
(12, 'Higiene Personal', '2022-09-05 05:13:24'),
(13, 'Limpieza', '2022-09-05 05:13:44'),
(14, 'Decoración', '2022-09-05 22:27:52'),
(15, '\r\nElectrodomésticos', '2022-09-05 22:28:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `texto` text NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_producto`, `texto`, `nombre`, `calificacion`, `fecha_alta`) VALUES
(1, 1, 'Buen Producto', 'Jonathan Valdez Martinez', 100, '2022-09-07 00:37:25'),
(2, 1, 'Excelente Producto', 'Juan Martinez Calle', 98, '2022-09-07 00:49:39'),
(3, 2, 'El producto es funcional', 'Joaquin Garcia Mendez', 78, '2022-09-07 01:03:22'),
(4, 1, 'El producto está defectuoso', 'Leonel Garcia Perez', 45, '2022-09-07 01:14:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre`) VALUES
(1, 'NEON'),
(2, 'SASO'),
(3, 'PAUL'),
(4, 'GENERICO'),
(5, 'GRANEL'),
(6, 'SOFT'),
(7, 'LOVE'),
(8, 'ENIR'),
(9, 'YALO'),
(10, 'JUVE'),
(11, 'KILO'),
(12, 'AMARILLO'),
(13, 'LUAP'),
(14, 'VEJU'),
(15, 'MACE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `SKU` varchar(11) NOT NULL,
  `codigo_barras` varchar(12) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `especificaciones` text NOT NULL,
  `precio_compra` double NOT NULL,
  `precio_venta` double NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `SKU`, `codigo_barras`, `id_modelo`, `especificaciones`, `precio_compra`, `precio_venta`, `stock`, `fecha_alta`) VALUES
(1, 'Huawei Matebook D16', 'VI82UEHSWQI', '093618364731', 1, 'ESTUFA BLANCA', 10000, 14840, 13, '2022-09-07 20:23:49'),
(2, 'Lenovo Laptop Gamer', 'UEOPEWNVUE2', '021237483721', 2, '28 PIES', 9000, 13564, 45, '2022-09-07 20:24:00'),
(3, 'Hp Desktop One', 'POTAENVEJSE', '937475832923', 3, 'GRIS LG', 11000, 13467, 90, '2022-09-07 20:24:27'),
(4, 'Computadora Portatil Hp', 'POTAORYTPAQ', '937475832923', 4, 'GRIS LG', 12453, 23450, 32, '2022-09-07 20:24:44'),
(5, 'Laptop Touch HP', 'POTAOYEXCPQ', '974536748326', 5, 'GRIS LG', 34000, 59000, 12, '2022-09-07 20:25:02'),
(6, 'Laptop Hp 240', 'POTAQUERTNV', '094327845734', 6, 'GRIS LG', 31000, 43000, 23, '2022-09-07 20:25:15'),
(7, 'PC Escritorio hp', 'POTAENVEJSE', '009876352673', 7, 'GRIS LG', 13099, 15670, 9, '2022-09-07 00:16:37'),
(8, 'Pc Basica Escolar', 'POTAENVEJSE', '112893859033', 8, 'GRIS LG', 10345, 13568, 45, '2022-09-07 20:25:37'),
(9, 'Comedor', 'ENVEJSETGDX', '098764987463', 9, 'GRIS LG', 11560, 16000, 65, '2022-09-07 00:16:47'),
(10, 'Cortinas', 'PHBSDFRTGDS', '00987453674', 10, 'GRIS LG', 12600, 16000, 89, '2022-09-07 00:16:52'),
(11, 'Horno', 'LOPIASERTDA', '987467346742', 11, 'GRIS LG', 11500, 14590, 90, '2022-09-07 00:16:57'),
(12, 'Mesa Sencilla', 'MNDSFERASFW', '986474657832', 12, 'GRIS LG', 10090, 14500, 21, '2022-09-07 00:17:03'),
(13, 'Tapete Gru', 'TAPHVDNCASD', '098432759032', 13, 'GRIS LG', 23003, 26500, 42, '2022-09-07 00:17:08'),
(14, 'Cuadro Decorativo', 'POBCASDFNCS', '001284785931', 14, 'GRIS LG', 36702, 46702, 67, '2022-09-07 00:17:42'),
(15, 'Impresora PW', 'TERHSJDFGSW', '087456372843', 15, 'GRIS LG', 14600, 21678, 43, '2022-09-07 00:17:46'),
(16, 'Perchero', 'IVCZASDFREW', '009832476843', 1, 'GRIS LG', 15700, 17500, 26, '2022-09-07 00:17:51'),
(17, 'Set Almohada', 'PORHDBNSJKD', '000980957002', 2, 'GRIS LG', 10000, 14600, 67, '2022-09-07 00:17:58'),
(18, 'Bancas Jardín', 'JKLDBCSVAHD', '000945637845', 3, 'GRIS LG', 17300, 21567, 34, '2022-09-07 00:18:04'),
(19, 'Bicicleta R26', 'IRNDFGYESAK', '009635674832', 4, 'GRIS LG', 21000, 24689, 56, '2022-09-07 00:18:10'),
(20, 'Bicicleta R24', 'IRNDSEURAOW', '009344567831', 5, 'GRIS LG', 20000, 25000, 89, '2022-09-07 00:18:15');

-- --------------------------------------------------------

--
-- Estructura para la vista `calificacion_promedio_productos`
--
DROP TABLE IF EXISTS `calificacion_promedio_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calificacion_promedio_productos`  AS   (select `c`.`id_producto` AS `id_producto`,`p`.`nombre_producto` AS `nombre_producto`,count(`c`.`id_producto`) AS `total_comentarios`,sum(`c`.`calificacion`) AS `suma_votos`,avg(`c`.`calificacion`) AS `promedio_votos` from (`comentarios` `c` join `producto` `p` on(`p`.`id_producto` = `c`.`id_producto`)) group by `c`.`id_producto` order by avg(`c`.`calificacion`) desc)  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
