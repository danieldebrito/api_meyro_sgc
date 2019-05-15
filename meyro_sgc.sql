-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2019 a las 06:15:26
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `meyro_sgc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `idEspecificacion` int(5) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`idEspecificacion`, `detalle`) VALUES
(17, '3 hp'),
(18, '1000'),
(16, 'Cortar Cobre'),
(28, '3 hp'),
(26, '7.5 hp'),
(29, '3 hp'),
(27, '400'),
(30, '330'),
(19, '3 hp'),
(21, '12 hp'),
(20, '330 MM ANCHO'),
(22, '400'),
(23, '3 hp'),
(24, '1000'),
(25, 'Esp. Máx. corte 1 mm/mm'),
(39, 'Potencia 7.5 hp'),
(40, '75 tn'),
(67, 'Potencia 5 hp'),
(68, '60 tn'),
(73, 'Potencia 5.5 hp'),
(74, '60 tn'),
(63, 'Potencia 3 hp'),
(64, '30 tn'),
(43, 'Potencia 5 hp'),
(44, '40 tn'),
(41, 'Potencia 3 hp'),
(42, '25 tn'),
(61, 'Potencia 3 hp'),
(62, '25 tn'),
(47, 'Potencia 3 hp'),
(48, '25 tn'),
(65, 'Potencia 2 hp'),
(66, '20 tn'),
(57, 'Potencia 1.5 hp'),
(58, '15 tn'),
(59, 'Potencia 2 hp'),
(60, '12 tn'),
(45, 'Potencia 5 hp'),
(46, '25 tn'),
(49, 'Potencia 3 hp'),
(50, '15 tn'),
(53, 'Potencia 3 hp'),
(54, '25 tn'),
(71, 'Potencia 3 hp'),
(72, '40 tn'),
(69, 'Potencia 5 hp'),
(70, '60 tn'),
(51, 'Potencia 5 hp'),
(52, '60 tn'),
(37, 'Potencia 10 hp'),
(38, '150 tn'),
(55, 'Potencia 10 hp'),
(56, '75 tn'),
(75, 'Potencia 5 hp'),
(76, '100 tn'),
(77, 'Potencia 7.5 hp'),
(78, '100 tn'),
(79, 'Potencia 3 hp'),
(80, '30 tn'),
(81, 'Potencia 7.5 hp'),
(82, '100 tn'),
(83, 'Potencia 4 hp'),
(84, '50 tn'),
(85, 'Potencia 10 hp'),
(86, '150 tn'),
(87, 'Potencia 1 hp'),
(88, '50 tn'),
(89, 'Potencia 1 hp'),
(90, '150 tn'),
(101, 'Potencia - hp'),
(102, 'Potencia - hp'),
(98, 'Potencia - hp'),
(99, 'Potencia - hp'),
(100, 'Potencia - hp'),
(96, 'Potencia 0.5 hp'),
(97, 'Potencia 0.5 hp'),
(95, 'Potencia 7.5 hp'),
(93, 'Potencia 4 hp'),
(94, '450 tn'),
(91, 'Potencia 2 hp'),
(92, '100 tn'),
(113, 'Potencia 1 hp'),
(114, 'Corta Cartón'),
(116, 'Potencia 0.5 hp'),
(115, 'Potencia 0.5 hp'),
(117, 'Potencia 0.75 hp'),
(118, 'Potencia - hp'),
(119, 'Potencia - hp'),
(120, 'Potencia - hp'),
(121, 'Potencia - hp'),
(122, 'Potencia 0.5 hp'),
(123, 'Potencia 1 hp'),
(5, '1 hp'),
(6, '1550 M/M HOJA'),
(7, '6 Cortes consecutivos'),
(1, '5.5 hp'),
(2, '1350 M/M HOJA'),
(4, 'Esp. Máx. corte 3/16 \"'),
(8, '150 tn'),
(9, 'Motor: Davica: 5 HP'),
(15, '2 hp'),
(14, '7 hp'),
(10, '5.5 hp'),
(11, 'Motor: Corradi'),
(12, '3 hp'),
(13, 'Motor: Abance 1.5 HP'),
(110, 'Potencia - hp'),
(111, 'Mando Neumático'),
(107, 'Potencia 1 hp'),
(108, 'Mecánica Eléctrica'),
(109, 'Potencia - hp'),
(103, 'Potencia 0.75 hp'),
(104, 'Alimentación a gas. Consumo MC x hora'),
(112, 'Potencia 1 hp'),
(105, 'Potencia 0.75 hp'),
(106, 'Potencia 0.75 hp'),
(35, 'Motor: ? : 0.5 HP'),
(36, 'Motor: Davica: 2.5 HP'),
(33, '500 M/M escote'),
(34, 'Motor: Climach: 0.5 HP'),
(31, '1000 M/M escote'),
(32, 'Motor: ? : 0.5 HP'),
(124, '1500 M/M entre puntas'),
(125, 'Motor: Corradi: 3 HP'),
(126, '800 M/M entre puntas'),
(127, 'Motor: ?: 2 HP'),
(128, 'Motor: Davica: 1.5 / Motor: Adas 0.75'),
(129, 'Motor: ?: 1 HP'),
(130, '600 M/M entre puntas'),
(131, 'Motor: Davica: 3 HP'),
(132, 'Motor: Davica: 3 HP'),
(133, 'Motor: Davica: 2 HP'),
(134, 'Motor: Colpe: 1 HP'),
(135, '200 M/M de copa'),
(136, 'Motor: ?: 3 HP'),
(137, 'Motor: SUPER: 1.5 HP'),
(138, 'Motor: 1 HP'),
(139, 'Recocido de Cobre'),
(NULL, '-'),
(NULL, ''),
(NULL, '-'),
(NULL, '-'),
(NULL, '-'),
(NULL, 'Vulcanizado'),
(NULL, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina-especificacion`
--

CREATE TABLE `maquina-especificacion` (
  `idMaquina` int(4) NOT NULL,
  `idEspecificacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquina-especificacion`
--

INSERT INTO `maquina-especificacion` (`idMaquina`, `idEspecificacion`) VALUES
(107, 17),
(107, 18),
(136, 16),
(201, 28),
(202, 26),
(202, 27),
(202, 29),
(202, 30),
(203, 19),
(203, 20),
(203, 21),
(203, 22),
(206, 23),
(206, 24),
(206, 25),
(218, 39),
(218, 40),
(219, 67),
(219, 68),
(220, 73),
(220, 74),
(221, 63),
(221, 64),
(222, 43),
(222, 44),
(223, 41),
(223, 42),
(224, 61),
(224, 62),
(225, 47),
(225, 48),
(226, 65),
(226, 66),
(227, 57),
(227, 58),
(228, 59),
(228, 60),
(229, 45),
(229, 46),
(230, 49),
(230, 50),
(231, 53),
(231, 54),
(232, 71),
(232, 72),
(233, 69),
(233, 70),
(234, 51),
(234, 52),
(235, 37),
(235, 38),
(236, 55),
(236, 56),
(337, 75),
(337, 76),
(339, 77),
(339, 78),
(340, 79),
(340, 80),
(341, 81),
(341, 82),
(342, 83),
(342, 84),
(343, 85),
(343, 86),
(344, 87),
(344, 88),
(347, 89),
(347, 90),
(401, 101),
(403, 102),
(404, 98),
(405, 99),
(406, 100),
(407, 96),
(408, 97),
(421, 95),
(451, 93),
(451, 94),
(452, 91),
(452, 92),
(540, 113),
(540, 114),
(550, 116),
(551, 115),
(552, 117),
(553, 118),
(554, 119),
(556, 120),
(557, 121),
(560, 122),
(589, 123),
(674, 5),
(674, 6),
(674, 7),
(677, 1),
(677, 2),
(677, 4),
(749, 8),
(749, 9),
(791, 15),
(792, 14),
(797, 10),
(797, 11),
(798, 12),
(798, 13),
(901, 110),
(901, 111),
(902, 107),
(902, 108),
(903, 109),
(920, 103),
(920, 104),
(921, 112),
(993, 105),
(994, 106),
(1086, 35),
(1087, 36),
(1088, 33),
(1088, 34),
(1089, 31),
(1089, 32),
(1101, 124),
(1101, 125),
(1102, 126),
(1102, 127),
(1103, 128),
(1104, 129),
(1105, 130),
(1105, 131),
(1106, 132),
(1107, 133),
(1108, 134),
(1109, 135),
(1109, 136),
(1110, 137),
(1111, 138),
(1318, 139);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `idMaquina` int(4) NOT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `sector` varchar(20) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `urlImagen` varchar(200) NOT NULL,
  `fabricanteNombre` varchar(50) NOT NULL,
  `fabricanteDireccion` varchar(100) NOT NULL,
  `fabricanteTelefono` varchar(30) NOT NULL,
  `fabricanteContacto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`idMaquina`, `detalle`, `marca`, `sector`, `estado`, `urlImagen`, `fabricanteNombre`, `fabricanteDireccion`, `fabricanteTelefono`, `fabricanteContacto`) VALUES
(201, 'Picadora', 'JUNAR', 'Metaloplastico', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(206, 'Guillotina', '-', 'Metaloplastico', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(218, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(219, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(220, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(221, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(222, 'Balancín', 'IMKA', 'Balancines', 'descartada', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(223, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(224, 'Balancín', 'GALEON', 'Balancines', 'en reparac', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(225, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(226, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(227, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(228, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(229, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(230, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(231, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(232, 'Balancín', 'IMKA', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(233, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(234, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(235, 'Balancín', 'GALEON', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(236, 'Balancín', 'INDECO', 'Balancines', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(337, 'Prensa', 'FRANSPER', 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(339, 'Prensa', 'FRANSPER', 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(340, 'Prensa', 'FRANSPER', 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(341, 'Prensa', 'FRANSPER', 'Prensas', 'en reparac', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(342, 'Prensa', 'FRANSPER', 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(343, 'Prensa', NULL, 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(344, 'Prensa', 'FRANSPER', 'Prensas', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(347, 'Prensa', NULL, 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(401, 'Remachador Manual', '-', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(403, 'Remachador Manual', '-', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(404, 'Remachador Neumático', '-', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(405, 'Remachador Neumático', '-', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(406, 'Remachador Neumático', '-', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(407, 'Agujereadora de banco', 'Barrero', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(408, 'Agujereadora de banco', 'TELEVEL', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(421, 'Prensa hidraúlica', NULL, 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(448, 'Prensa hidraúlica', NULL, 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(451, 'Rodillo', 'FRANSPER', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(452, 'Prensa mecánica', 'FRANSPER', 'Especiales', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(540, 'Guillotina Rotativa Cartón', '-', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(550, 'Horno termocontraible', 'EDOS', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(551, 'Horno termocontraible', 'JUNAR', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(552, 'Cinta transportadora', '-', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(553, 'Máquina Polietileno', 'LASTISELL', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(554, 'Máquina Polietileno', 'LASTISELL', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(556, 'Máquina Polietileno', 'LASTISELL', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(557, 'Máquina Polietileno', 'LASTISELL', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(560, 'Máquina Termocontraible', '-', 'Envasado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(589, 'Máquina circular', 'JUNAR', 'Expedición', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(674, 'Guillotina circular', '-', 'Depósito', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(677, 'Guillotina', '-', 'Depósito', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(749, 'Prensa Mecánica', 'Fransper.', 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(790, 'Mezcladora', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(791, 'Guillotina Krause', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(792, 'Máquina de Moler Corcho', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(793, 'Prensa Hidraúlica (Chica)', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(794, 'Prensa Hidraúlica (Grande)', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(795, 'Bomba de Agua', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(797, 'Equipo Hidraúlico', 'Cid Hnos.', 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(798, NULL, NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(799, 'Torre Equipo de Enfriamiento', NULL, 'Corcho y Goma', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(901, 'Máquina Serigrafía', '-', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(902, 'Máquina Serigrafía', '-', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(903, 'Máquina Serigrafía Manual', '-', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(920, 'Horno', 'Motoreductor', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(921, 'Máquina Encoladora', 'JUNAR', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(993, 'Máquina pintura', 'JUNAR', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(994, 'Máquina pintura', 'JUNAR', 'Pintura / Serigrafía', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1086, 'Amoladora de Banco', NULL, 'Sacabocado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1087, 'Agujereadora de Pie', 'MORI', 'Sacabocado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1088, 'Caladora', 'PERUSI', 'Sacabocado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1089, 'Caladora', 'BAGUAL', 'Sacabocado', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1101, 'Torno N °1', 'Batisti', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1102, 'Torno N° 2', 'Alfa', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1103, 'Frezadora', 'IMEPA FUT 2', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1104, 'Caladora', 'BSG', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1105, 'Limadora', 'FIMAR', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1106, 'Agujereadora dePie', 'Burani', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1107, 'Agujereadora de Banco', 'Barbero', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1108, 'Serrucho Hidraúlico', 'Bitsghin', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1109, 'Rectificadora de Copa', 'TAJES', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1110, 'Amoladora de pie', 'FIMAR', 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1111, 'Amoladora de banco', NULL, 'Mantenimiento', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1318, 'Horno eléctrico', NULL, 'edificio', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1349, 'Caldera', NULL, 'edificio', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1372, 'Bomba Cloaca', NULL, 'edificio', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(1375, 'Montacarga', NULL, 'edificio', 'usable', '../../../../../assets/maquinas/balancin.jpg', '', '', '', ''),
(9999, 'detalle', 'marca', 'sector', 'En Uso', '', 'fabricante', 'direccion', 'telefono', 'contacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto-proveedor`
--

CREATE TABLE `repuesto-proveedor` (
  `id_repuesto` int(1) DEFAULT NULL,
  `id_proveedor` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repuesto-proveedor`
--

INSERT INTO `repuesto-proveedor` (`id_repuesto`, `id_proveedor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` int(1) DEFAULT NULL,
  `detalle` varchar(15) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `codigo` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuesto`, `detalle`, `marca`, `codigo`) VALUES
(1, 'ejemplo correa', 'ejemplo pirelli', 'ejemplo 9999'),
(2, 'ejemplo ruleman', 'ejemplo skf', 'ejemplo 9998'),
(3, 'ejemplo motor', 'ejemplo siemmes', 'ejemplo 9997'),
(4, 'ejemplo plc', 'ejemplo ge', 'ejemplo 5415');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id_sector` int(2) DEFAULT NULL,
  `sectores` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id_sector`, `sectores`) VALUES
(1, 'Metaloplastico'),
(2, 'Balancines'),
(3, 'Prensas'),
(4, 'Especiales'),
(5, 'Envasado'),
(6, 'Depósito'),
(7, 'Corcho y Goma'),
(8, 'Expedición'),
(9, 'Pintura / Serigrafía'),
(10, 'Sacabocado'),
(11, 'Mantenimiento'),
(12, 'Administracion'),
(13, 'edificio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `maquina-especificacion`
--
ALTER TABLE `maquina-especificacion`
  ADD PRIMARY KEY (`idMaquina`,`idEspecificacion`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`idMaquina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
