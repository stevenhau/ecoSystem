-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2022 a las 17:37:54
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cedral_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `email`, `telefono`) VALUES
(1, 'Sin Asignar', 'S/A', 'S/A'),
(3, 'EDUARDO MAQUINAS ', '', ''),
(4, 'PABLO GOMEZ PINEDA ', '', ''),
(5, 'ENRIQUE GOMEZ PINEDA ', '', ''),
(6, 'RAUL LINARES CALLEJAS ', '', ''),
(7, 'YORLING A. URRUTIA ALVAREZ ', '', ''),
(8, 'JENNIFER JAZMIN BASURTO BALDOMERO ', '', ''),
(9, 'MONICA IVETTE ALDANA GARCIA ', '', ''),
(10, 'MARIA TERESA LLORENZ ARAUZ', '', ''),
(11, 'GUILLIAN LUCIA VAZQUEZ CASTRO', '', ''),
(12, 'MARIA DEL PILAR PIÑA TREJO ', '', ''),
(13, 'GABRIELA GOMEZ PINEDA ', '', ''),
(14, 'DANIELA MERCADO GOMEZ ', '', ''),
(15, 'GRACIELA MERCADO GOMEZ ', '', ''),
(16, 'ZOILA MARISOL HUERTA JACINTO ', '', ''),
(17, 'MANUEL ALEJANDRO OCAÑA AGUILAR ', '', ''),
(18, 'MIGDALIA BALDERAS TREVIÑO', '', ''),
(19, 'MONSERRAT ABIGAIL BASURTO BALDOMERO ', '', ''),
(20, 'CARLOS ALONSO VILLAREAL ', '', ''),
(21, 'CLAUDIA BERENICE ROCHA CASTILLO', '', ''),
(22, 'JAIME ANTONIO LOPEZ NIÑO', '', ''),
(23, 'CASA CLUB', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollos`
--

CREATE TABLE `desarrollos` (
  `id_desarrollo` int(11) NOT NULL,
  `nombre_desarrollo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desarrollos`
--

INSERT INTO `desarrollos` (`id_desarrollo`, `nombre_desarrollo`) VALUES
(1, 'EL CEDRAL ECO HABITAT I'),
(2, 'EL CEDRAL ECO HABITAT II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id_etapa` int(11) NOT NULL,
  `id_desarrollo` int(11) NOT NULL,
  `numero_etapa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id_etapa`, `id_desarrollo`, `numero_etapa`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(4, 1, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pagos`
--

CREATE TABLE `historial_pagos` (
  `id_historial` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id_lote` int(11) NOT NULL,
  `numero_lote` int(11) NOT NULL,
  `id_desarrollo` int(11) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `medida` varchar(255) NOT NULL,
  `costo` varchar(250) NOT NULL,
  `mantenimiento` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id_lote`, `numero_lote`, `id_desarrollo`, `id_etapa`, `id_venta`, `id_pago`, `id_cliente`, `nombre_cliente`, `medida`, `costo`, `mantenimiento`, `estatus`) VALUES
(1, 1, 1, 1, 0, 0, 0, '', '1097.202', '', '', '2'),
(2, 2, 1, 1, 0, 0, 0, '', '1129.786', '', '', '4'),
(3, 3, 1, 1, 0, 0, 0, '', '1134.623', '', '', '4'),
(4, 4, 1, 1, 0, 0, 0, 'EDUARDO MAQUINAS ', '1139.417', '380000', '4000', '2'),
(5, 5, 1, 1, 7, 0, 0, 'PABLO GOMEZ PINEDA ', '1144.165', '340000', '4000', '2'),
(6, 6, 1, 1, 0, 0, 0, 'ENRIQUE GOMEZ PINEDA ', '1143.389', '340000', '4000', '2'),
(7, 7, 1, 1, 0, 0, 0, 'RAUL LINARES CALLEJAS ', '1139.352', '340000', '4000', '2'),
(8, 8, 1, 1, 0, 0, 0, 'YORLING A. URRUTIA ALVAREZ ', '1098.745', '360000', '4000', '2'),
(9, 9, 1, 1, 0, 0, 0, 'JENNIFER JAZMIN BASURTO BALDOMERO ', '1018.381', '360000', '4000', '2'),
(10, 10, 1, 1, 0, 0, 0, 'MONSERRAT ABIGAIL BASURTO BALDOMERO ', '1018.381', '360000', '4000', '2'),
(11, 11, 1, 1, 0, 0, 0, 'CARLOS ALONSO VILLAREAL ', '1018.381', '510000', '4500', '2'),
(12, 12, 1, 1, 0, 0, 0, 'CLAUDIA BERENICE ROCHA CASTILLO', '1098.745', '360000', '4000', '2'),
(13, 13, 1, 1, 0, 0, 0, 'JAIME ANTONIO LOPEZ NI?O', '1093.899', '340000', '4000', '2'),
(14, 14, 1, 1, 0, 0, 0, 'MONICA IVETTE ALDANA GARCIA ', '1031.428', '385000', '4000', '2'),
(15, 15, 1, 1, 0, 0, 0, 'MARIA TERESA LLORENZ ARAUZ', '1219.601', '340000', '4000', '2'),
(16, 16, 1, 1, 0, 0, 0, 'GUILLIAN LUCIA VAZQUEZ CASTRO', '1219.97', '360000', '4000', '2'),
(17, 17, 1, 1, 0, 0, 0, 'MARIA DEL PILAR PI?A TREJO ', '1220.317', '340000', '4000', '2'),
(18, 18, 1, 1, 0, 0, 0, 'GABRIELA GOMEZ PINEDA ', '1220.642', '340000', '4000', '2'),
(19, 19, 1, 1, 0, 0, 0, 'DANIELA MERCADO GOMEZ ', '1220.95', '340000', '4000', '2'),
(20, 20, 1, 1, 0, 0, 0, 'GRACIELA MERCADO GOMEZ ', '1223.06', '340000', '4000', '2'),
(21, 21, 1, 1, 0, 0, 0, 'ZOILA MARISOL HUERTA JACINTO ', '1226.774', '340000', '4000', '2'),
(22, 22, 1, 1, 0, 0, 0, 'MANUEL ALEJANDRO OCA?A AGUILAR ', '1230.522', '360000', '4000', '2'),
(23, 23, 1, 1, 0, 0, 0, 'MANUEL ALEJANDRO OCA?A AGUILAR ', '1234.305', '360000', '4000', '2'),
(24, 24, 1, 1, 0, 0, 0, 'MIGDALIA BALDERAS TREVI?O', '1262.953', '360000', '4000', '2'),
(25, 1, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1377.063', '265000', '4000', '2'),
(26, 2, 1, 2, 0, 0, 0, 'HANZ SALVADOR PE?A BALLESTEROS ', '1000', '370000', '4000', '2'),
(27, 3, 1, 2, 0, 0, 0, 'ALEJANDRO MACDONEL BASAVE ', '1000', '370000', '4000', '2'),
(28, 4, 1, 2, 0, 0, 0, 'ERICK EYTAN FODOR SANDERS ', '1000', '370000', '4000', '2'),
(29, 5, 1, 2, 0, 0, 0, 'ALEJANDRO DAVID FODOR SANDERS ', '1000', '370000', '4000', '2'),
(30, 6, 1, 2, 0, 0, 0, 'INGRID MIRIAM SANDERS VON ARNIM PLAZA ', '1000', '370000', '4000', '2'),
(31, 7, 1, 2, 0, 0, 0, 'ESLY MANUEL CORDOBA ESPINOZA', '1000', '395000', '4000', '2'),
(32, 8, 1, 2, 0, 0, 0, 'ESLY MANUEL CORDOBA ESPINOZA', '1000', '395000', '4000', '2'),
(33, 9, 1, 2, 0, 0, 0, '', '1000', '', '4000', '1'),
(34, 10, 1, 2, 0, 0, 0, '', '1000', '', '4000', '1'),
(35, 11, 1, 2, 0, 0, 0, 'NEMUEL NARVAEZ LOPEZ ', '1000', '450000', '4500', '2'),
(36, 12, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1000', '400000', '4000', '2'),
(37, 13, 1, 2, 0, 0, 0, 'ROMAN ESTEBAN URRUTIA ALVAREZ ', '1000', '0', '4000', '2'),
(38, 14, 1, 2, 0, 0, 0, 'MA EDUVIGES SIERRA HERRERA', '1000', '410000', '4000', '2'),
(39, 15, 1, 2, 0, 0, 0, 'MA DOLORES SIERRA HERRERA', '1000', '410000', '4000', '2'),
(40, 16, 1, 2, 0, 0, 0, 'MA DOLORES SIERRA HERRERA', '1000', '410000', '4000', '2'),
(41, 17, 1, 2, 0, 0, 0, 'PABLO GOMEZ PINEDA ', '1000', '410000', '4000', '2'),
(42, 18, 1, 2, 0, 0, 0, 'JOSE JAVIER BETANCOURT CANUL', '999.632', '0', '4000', '2'),
(43, 19, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '999.648', '380000', '4000', '2'),
(44, 20, 1, 2, 0, 0, 0, '', '1000', '', '4000', '2'),
(45, 21, 1, 2, 0, 0, 0, 'MA EDUVIGES SIERRA HERRERA', '1000', '385000', '4000', '2'),
(46, 22, 1, 2, 0, 0, 0, 'ALMA ROSA OLIVA HERNANDEZ ', '1000', '350000', '4000', '2'),
(47, 23, 1, 2, 0, 0, 0, 'JUAN VICTOR MANUEL GARCIA HERNANDEZ ', '1000', '350000', '4000', '2'),
(48, 24, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1000', '400000', '4000', '2'),
(49, 25, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1000', '380000', '4000', '2'),
(50, 26, 1, 2, 0, 0, 0, 'JESUS BERNAL BARRERA', '1000', '430000', '4500', '2'),
(51, 27, 1, 2, 0, 0, 0, 'NADIA KARINA DEL RIO TOSTADO', '961.884', '380000', '4000', '2'),
(52, 28, 1, 2, 0, 0, 0, 'BELEM TOSTADO NU?EZ ', '1000', '380000', '4000', '2'),
(53, 29, 1, 2, 0, 0, 0, 'JESUS JUAREZ EMIGDIO ', '1000', '360000', '4000', '2'),
(54, 30, 1, 2, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1000.023', '380000', '4000', '2'),
(55, 31, 1, 2, 0, 0, 0, 'LUZ MARIA ABURTO BARJAU ', '981.763', '380000', '4000', '2'),
(56, 1, 1, 3, 0, 0, 0, '', '1000', '350000', '4500', '2'),
(57, 2, 1, 3, 0, 0, 0, '', '1000', '350000', '4500', '2'),
(58, 3, 1, 3, 0, 0, 0, '', '1000', '350000', '4500', '2'),
(59, 4, 1, 3, 0, 0, 0, 'ANGEL FELIPE VEGA MARQUEZ ', '1000', '435000', '4500', '2'),
(60, 5, 1, 3, 0, 0, 0, 'ANGEL FELIPE VEGA MARQUEZ ', '1000', '435000', '4500', '2'),
(61, 6, 1, 3, 0, 0, 0, 'CARLOS ENRIQUE GUTIERREZ CORTES ', '1000', '479000', '4500', '2'),
(62, 7, 1, 3, 0, 0, 0, 'JUAN CARLOS PEZZAT SAIDI', '1000', '585000', '4500', '2'),
(63, 8, 1, 3, 0, 0, 0, 'JUAN CARLOS PEZZAT SAIDI', '1014.74', '510000', '4500', '2'),
(64, 9, 1, 3, 0, 0, 0, 'IRIS BETSABE RAMIREZ PEREZ ', '1014.74', '520000', '4500', '2'),
(65, 10, 1, 3, 0, 0, 0, '', '1014.74', '', '4500', '3'),
(66, 11, 1, 3, 0, 0, 0, 'MANUEL ABRAHAM AVILA MAZARIEGOS', '1014.74', '507373.5', '4500', '2'),
(67, 12, 1, 3, 0, 0, 0, 'MARCELA PEREZ FLORES ', '1014.74', '520000', '4500', '2'),
(68, 13, 1, 3, 0, 0, 0, 'OSCAR IGNACIO PEREZ ORTEGA ', '1000', '520000', '4500', '2'),
(69, 14, 1, 3, 0, 0, 0, 'JOSE GUADALUPE JIMENEZ MARTINEZ ', '1000', '490000', '4500', '2'),
(70, 15, 1, 3, 0, 0, 0, 'LAURA SAMPEDRO DEGOLLADO ', '1000', '470000', '4500', '2'),
(71, 1, 2, 1, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL', '1009.47', '', '4500', '1'),
(72, 2, 2, 1, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL', '1009.3', '', '4500', '1'),
(73, 3, 2, 1, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL', '1009.3', '', '4500', '1'),
(74, 4, 2, 1, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL', '1009.3', '', '4500', '1'),
(75, 1, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(76, 2, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(77, 3, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(78, 4, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(79, 5, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(80, 6, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(81, 7, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(82, 8, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(83, 9, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(84, 10, 2, 2, 0, 0, 0, '', '1079.78', '', '4500', '1'),
(85, 1, 2, 3, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL ', '1200.28', '', '4500', '1'),
(86, 2, 2, 3, 0, 0, 0, '', '1200.28', '', '4500', '1'),
(87, 3, 2, 3, 0, 0, 0, '', '1200.28', '', '4500', '1'),
(88, 4, 2, 3, 0, 0, 0, 'MARCO ANTONIO BETANCOURT CANUL ', '1200.28', '', '4500', '1'),
(89, 1, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(90, 2, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(91, 3, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(92, 4, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(93, 5, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(94, 6, 2, 4, 0, 0, 0, '', '1007.51', '', '4500', '1'),
(95, 1, 2, 5, 0, 0, 0, 'JESUS GONZALO GARCIA MANJARREZ', '1027.59', '500000', '4500', '1'),
(96, 2, 2, 5, 0, 0, 0, 'JESUS GONZALO GARCIA MANJARREZ', '1027.59', '405000', '4500', '1'),
(97, 1, 2, 6, 0, 0, 0, '', '1035.32', '', '4500', '1'),
(98, 2, 2, 6, 0, 0, 0, 'LETICIA NAVA AREIZAGA ', '1035.32', '360000', '4500', '1'),
(99, 3, 2, 6, 0, 0, 0, 'LETICIA NAVA AREIZAGA ', '1035.32', '360000', '4500', '1'),
(100, 4, 2, 6, 0, 0, 0, '', '1035.32', '', '4500', '1'),
(101, 5, 2, 6, 0, 0, 0, '', '1035.32', '', '4500', '1'),
(102, 6, 2, 6, 0, 0, 0, '', '1035.32', '', '4500', '1'),
(103, 7, 2, 6, 0, 0, 0, '', '1035.32', '', '4500', '1'),
(104, 8, 2, 6, 0, 0, 0, 'ANGEL FELIPE VEGA MARQUEZ ', '1035.32', '360000', '4500', '1'),
(105, 9, 2, 6, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1035.32', '360000', '4500', '1'),
(106, 10, 2, 6, 0, 0, 0, 'DANIEL SANTIAGO GUTIERREZ MURILLO', '1035.32', '360000', '4500', '1'),
(107, 1, 2, 7, 0, 0, 0, 'OSCAR IGNACIO PEREZ ORTEGA ', '1031.82', '475000', '4500', '1'),
(108, 2, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(109, 3, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(110, 4, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(111, 5, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(112, 6, 2, 7, 0, 0, 0, 'ENNER ISMAEL TZAB TUN ', '1031.82', '360000', '4500', '1'),
(113, 7, 2, 7, 0, 0, 0, 'JOSE FRANCISCO GUTIERREZ MURILLO', '1031.82', '360000', '4500', '1'),
(114, 8, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(115, 9, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(116, 10, 2, 7, 0, 0, 0, '', '1031.82', '', '4500', '1'),
(117, 1, 2, 8, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1001.37', '400000', '4500', '1'),
(118, 2, 2, 8, 0, 0, 0, 'ROSA MARQUEZ CASTRO', '1001.37', '500000', '4500', '1'),
(119, 3, 2, 8, 0, 0, 0, '', '1001.37', '', '4500', '1'),
(120, 4, 2, 8, 0, 0, 0, '', '1001.37', '', '4500', '1'),
(121, 5, 2, 8, 0, 0, 0, '', '1001.37', '', '4500', '1'),
(122, 6, 2, 8, 0, 0, 0, '', '1001.37', '', '4500', '1'),
(123, 7, 2, 8, 0, 0, 0, '', '1001.37', '', '4500', '1'),
(124, 8, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(125, 9, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(126, 10, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(127, 11, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(128, 12, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(129, 13, 2, 8, 0, 0, 0, '', '1034.48', '', '4500', '1'),
(130, 1, 2, 9, 0, 0, 0, '', '1038.73', '', '4500', '1'),
(131, 2, 2, 9, 0, 0, 0, '', '1038.73', '', '4500', '1'),
(132, 3, 2, 9, 0, 0, 0, '', '1038.73', '', '4500', '1'),
(133, 1, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(134, 2, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(135, 3, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(136, 4, 2, 10, 0, 0, 0, 'HECTOR FRANCISCO GANDARILLA FLORES ', '1063.15', '360000', '4500', '1'),
(137, 5, 2, 10, 0, 0, 0, 'HECTOR FRANCISCO GANDARILLA FLORES ', '1063.15', '360000', '4500', '1'),
(138, 6, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(139, 7, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(140, 8, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(141, 9, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(142, 10, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(143, 11, 2, 10, 0, 0, 0, '', '1063.15', '', '4500', '1'),
(144, 1, 2, 11, 0, 0, 0, '', '10024.32', '', '4500', '1'),
(145, 2, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(146, 3, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(147, 4, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(148, 5, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(149, 6, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(150, 7, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(151, 8, 2, 11, 0, 0, 0, 'GLADYS TRUJILLO SALADO ', '1009.88', '390000', '4500', '1'),
(152, 9, 2, 11, 0, 0, 0, '', '1009.88', '', '4500', '1'),
(153, 1, 2, 12, 0, 0, 0, '', '1005.49', '', '4500', '1'),
(154, 2, 2, 12, 0, 0, 0, '', '1005.49', '', '4500', '1'),
(155, 3, 2, 12, 0, 0, 0, '', '1005.49', '', '4500', '1'),
(156, 4, 2, 12, 0, 0, 0, '', '1005.49', '', '4500', '1'),
(157, 1, 2, 13, 0, 0, 0, 'ELOISA GARCIA RUIZ ', '1000.04', '370000', '4500', '1'),
(158, 2, 2, 13, 0, 0, 0, 'ELOISA GARCIA RUIZ ', '1000.04', '370000', '4500', '1'),
(159, 3, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(160, 4, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(161, 5, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(162, 6, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(163, 7, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(164, 8, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(165, 9, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(166, 10, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(167, 11, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(168, 12, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(169, 13, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(170, 14, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(171, 15, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(172, 16, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(173, 17, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(174, 18, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(175, 19, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(176, 20, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(177, 21, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(178, 22, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1'),
(179, 23, 2, 13, 0, 0, 0, '', '1000.04', '', '4500', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `fecha_pago` varchar(255) NOT NULL,
  `fecha_correspondiente` varchar(255) NOT NULL,
  `monto_pagado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_lote`, `fecha_pago`, `fecha_correspondiente`, `monto_pagado`) VALUES
(6, 4, '16/08/2021', '16/08/2021', '2833.33'),
(7, 4, '16/09/2021', '16/09/2021', '2833.33'),
(8, 4, '16/10/2021', '16/10/2021', '2833.33'),
(9, 4, '16/11/2021', '16/11/2021', '2833.33'),
(10, 4, '16/12/2021', '16/12/2021', '2833.33'),
(11, 4, '16/01/2021', '16/01/2021', '2833.33'),
(12, 4, '16/02/2021', '16/02/2021', '2833.33'),
(13, 4, '16/03/2021', '16/03/2021', '2833.33'),
(14, 4, '16/04/2021', '16/04/2021', '2833.33'),
(15, 4, '16/05/2021', '16/05/2021', '2833.33'),
(16, 4, '16/06/2021', '16/06/2021', '2833.33'),
(17, 4, '16/07/2021', '16/07/2021', '2833.33'),
(18, 4, '16/08/2021', '16/08/2021', '2833.33'),
(19, 4, '16/09/2021', '16/09/2021', '2833.33'),
(20, 4, '16/10/2021', '16/10/2021', '2833.33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `id_rol`) VALUES
(1, 'administrador', '25f9e794323b453885f5181f1b624d0b', 1),
(2, 'vendedor', '123456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_desarrollo` int(11) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `enganche` varchar(255) NOT NULL,
  `num_mensualidades` varchar(255) NOT NULL,
  `fecha_compra` varchar(255) NOT NULL,
  `primer_mensualidad` varchar(255) NOT NULL,
  `dias_pago` varchar(200) NOT NULL,
  `monto_mensual` varchar(255) NOT NULL,
  `asesor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_desarrollo`, `id_etapa`, `id_lote`, `enganche`, `num_mensualidades`, `fecha_compra`, `primer_mensualidad`, `dias_pago`, `monto_mensual`, `asesor`) VALUES
(7, 0, 1, 1, 5, '0', '120', '16/08/2021', '16/08/2021', '16', '2833.33', 'Asesor 1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `desarrollos`
--
ALTER TABLE `desarrollos`
  ADD PRIMARY KEY (`id_desarrollo`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `desarrollos`
--
ALTER TABLE `desarrollos`
  MODIFY `id_desarrollo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
