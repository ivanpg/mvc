-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-09-2013 a las 18:22:55
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.6-1ubuntu1.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(100) NOT NULL,
  `pais` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `ciudad`, `pais`) VALUES
(1, 'Madrid', 1),
(2, 'Valencia', 1),
(3, 'Sao Paulo', 2),
(4, 'Rio de Janeiro', 2),
(5, 'Castellón', 1),
(7, 'Murcia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'España'),
(2, 'Brasil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(100) NOT NULL,
  `key` varchar(50) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`, `key`) VALUES
(1, 'Tareas de administracion', 'admin_access'),
(2, 'Agregar Posts', 'nuevo_post'),
(3, 'Editar Posts', 'editar_post'),
(4, 'Eliminar Posts', 'eliminar_post');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_role`
--

CREATE TABLE IF NOT EXISTS `permisos_role` (
  `role` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL,
  PRIMARY KEY (`role`,`permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos_role`
--

INSERT INTO `permisos_role` (`role`, `permiso`, `valor`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(3, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usuario`
--

CREATE TABLE IF NOT EXISTS `permisos_usuario` (
  `usuario` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL,
  PRIMARY KEY (`usuario`,`permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos_usuario`
--

INSERT INTO `permisos_usuario` (`usuario`, `permiso`, `valor`) VALUES
(1, 2, 0),
(1, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `cuerpo` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `cuerpo`, `imagen`) VALUES
(3, 'Test 1', 'Cuerpo del Test 1', 'upl_5118d2019d336.jpg'),
(4, 'Test 2', 'Cuerpo del Test 2', 'upl_5118d2697078a.jpg'),
(5, 'Test 3', 'Cuerpo del test 3', 'upl_5118d324cc959.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=601 ;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `nombre`, `id_pais`, `id_ciudad`) VALUES
(1, 'nombre 0', 1, 1),
(2, 'nombre 1', 1, 1),
(3, 'nombre 2', 1, 1),
(4, 'nombre 3', 1, 1),
(5, 'nombre 4', 1, 1),
(6, 'nombre 5', 1, 1),
(7, 'nombre 6', 1, 1),
(8, 'nombre 7', 1, 1),
(9, 'nombre 8', 1, 1),
(10, 'nombre 9', 1, 1),
(11, 'nombre 10', 1, 1),
(12, 'nombre 11', 1, 1),
(13, 'nombre 12', 1, 1),
(14, 'nombre 13', 1, 1),
(15, 'nombre 14', 1, 1),
(16, 'nombre 15', 1, 1),
(17, 'nombre 16', 1, 1),
(18, 'nombre 17', 1, 1),
(19, 'nombre 18', 1, 1),
(20, 'nombre 19', 1, 1),
(21, 'nombre 20', 1, 1),
(22, 'nombre 21', 1, 1),
(23, 'nombre 22', 1, 1),
(24, 'nombre 23', 1, 1),
(25, 'nombre 24', 1, 1),
(26, 'nombre 25', 1, 1),
(27, 'nombre 26', 1, 1),
(28, 'nombre 27', 1, 1),
(29, 'nombre 28', 1, 1),
(30, 'nombre 29', 1, 1),
(31, 'nombre 30', 1, 1),
(32, 'nombre 31', 1, 1),
(33, 'nombre 32', 1, 1),
(34, 'nombre 33', 1, 1),
(35, 'nombre 34', 1, 1),
(36, 'nombre 35', 1, 1),
(37, 'nombre 36', 1, 1),
(38, 'nombre 37', 1, 1),
(39, 'nombre 38', 1, 1),
(40, 'nombre 39', 1, 1),
(41, 'nombre 40', 1, 1),
(42, 'nombre 41', 1, 1),
(43, 'nombre 42', 1, 1),
(44, 'nombre 43', 1, 1),
(45, 'nombre 44', 1, 1),
(46, 'nombre 45', 1, 1),
(47, 'nombre 46', 1, 1),
(48, 'nombre 47', 1, 1),
(49, 'nombre 48', 1, 1),
(50, 'nombre 49', 1, 1),
(51, 'nombre 50', 1, 1),
(52, 'nombre 51', 1, 1),
(53, 'nombre 52', 1, 1),
(54, 'nombre 53', 1, 1),
(55, 'nombre 54', 1, 1),
(56, 'nombre 55', 1, 1),
(57, 'nombre 56', 1, 1),
(58, 'nombre 57', 1, 1),
(59, 'nombre 58', 1, 1),
(60, 'nombre 59', 1, 1),
(61, 'nombre 60', 1, 1),
(62, 'nombre 61', 1, 1),
(63, 'nombre 62', 1, 1),
(64, 'nombre 63', 1, 1),
(65, 'nombre 64', 1, 1),
(66, 'nombre 65', 1, 1),
(67, 'nombre 66', 1, 1),
(68, 'nombre 67', 1, 1),
(69, 'nombre 68', 1, 1),
(70, 'nombre 69', 1, 1),
(71, 'nombre 70', 1, 1),
(72, 'nombre 71', 1, 1),
(73, 'nombre 72', 1, 1),
(74, 'nombre 73', 1, 1),
(75, 'nombre 74', 1, 1),
(76, 'nombre 75', 1, 3),
(77, 'nombre 76', 1, 3),
(78, 'nombre 77', 1, 3),
(79, 'nombre 78', 1, 3),
(80, 'nombre 79', 1, 3),
(81, 'nombre 80', 1, 3),
(82, 'nombre 81', 1, 3),
(83, 'nombre 82', 1, 3),
(84, 'nombre 83', 1, 3),
(85, 'nombre 84', 1, 3),
(86, 'nombre 85', 1, 3),
(87, 'nombre 86', 1, 3),
(88, 'nombre 87', 1, 3),
(89, 'nombre 88', 1, 3),
(90, 'nombre 89', 1, 3),
(91, 'nombre 90', 1, 3),
(92, 'nombre 91', 1, 3),
(93, 'nombre 92', 1, 3),
(94, 'nombre 93', 1, 3),
(95, 'nombre 94', 1, 3),
(96, 'nombre 95', 1, 3),
(97, 'nombre 96', 1, 3),
(98, 'nombre 97', 1, 3),
(99, 'nombre 98', 1, 3),
(100, 'nombre 99', 1, 3),
(101, 'nombre 100', 1, 3),
(102, 'nombre 101', 1, 3),
(103, 'nombre 102', 1, 3),
(104, 'nombre 103', 1, 3),
(105, 'nombre 104', 1, 3),
(106, 'nombre 105', 1, 3),
(107, 'nombre 106', 1, 3),
(108, 'nombre 107', 1, 3),
(109, 'nombre 108', 1, 3),
(110, 'nombre 109', 1, 3),
(111, 'nombre 110', 1, 3),
(112, 'nombre 111', 1, 3),
(113, 'nombre 112', 1, 3),
(114, 'nombre 113', 1, 3),
(115, 'nombre 114', 1, 3),
(116, 'nombre 115', 1, 3),
(117, 'nombre 116', 1, 3),
(118, 'nombre 117', 1, 3),
(119, 'nombre 118', 1, 3),
(120, 'nombre 119', 1, 3),
(121, 'nombre 120', 1, 3),
(122, 'nombre 121', 1, 3),
(123, 'nombre 122', 1, 3),
(124, 'nombre 123', 1, 3),
(125, 'nombre 124', 1, 3),
(126, 'nombre 125', 1, 3),
(127, 'nombre 126', 1, 3),
(128, 'nombre 127', 1, 3),
(129, 'nombre 128', 1, 3),
(130, 'nombre 129', 1, 3),
(131, 'nombre 130', 1, 3),
(132, 'nombre 131', 1, 3),
(133, 'nombre 132', 1, 3),
(134, 'nombre 133', 1, 3),
(135, 'nombre 134', 1, 3),
(136, 'nombre 135', 1, 3),
(137, 'nombre 136', 1, 3),
(138, 'nombre 137', 1, 3),
(139, 'nombre 138', 1, 3),
(140, 'nombre 139', 1, 3),
(141, 'nombre 140', 1, 3),
(142, 'nombre 141', 1, 3),
(143, 'nombre 142', 1, 3),
(144, 'nombre 143', 1, 3),
(145, 'nombre 144', 1, 3),
(146, 'nombre 145', 1, 3),
(147, 'nombre 146', 1, 3),
(148, 'nombre 147', 1, 3),
(149, 'nombre 148', 1, 3),
(150, 'nombre 149', 1, 3),
(151, 'nombre 150', 2, 2),
(152, 'nombre 151', 2, 2),
(153, 'nombre 152', 2, 2),
(154, 'nombre 153', 2, 2),
(155, 'nombre 154', 2, 2),
(156, 'nombre 155', 2, 2),
(157, 'nombre 156', 2, 2),
(158, 'nombre 157', 2, 2),
(159, 'nombre 158', 2, 2),
(160, 'nombre 159', 2, 2),
(161, 'nombre 160', 2, 2),
(162, 'nombre 161', 2, 2),
(163, 'nombre 162', 2, 2),
(164, 'nombre 163', 2, 2),
(165, 'nombre 164', 2, 2),
(166, 'nombre 165', 2, 2),
(167, 'nombre 166', 2, 2),
(168, 'nombre 167', 2, 2),
(169, 'nombre 168', 2, 2),
(170, 'nombre 169', 2, 2),
(171, 'nombre 170', 2, 2),
(172, 'nombre 171', 2, 2),
(173, 'nombre 172', 2, 2),
(174, 'nombre 173', 2, 2),
(175, 'nombre 174', 2, 2),
(176, 'nombre 175', 2, 2),
(177, 'nombre 176', 2, 2),
(178, 'nombre 177', 2, 2),
(179, 'nombre 178', 2, 2),
(180, 'nombre 179', 2, 2),
(181, 'nombre 180', 2, 2),
(182, 'nombre 181', 2, 2),
(183, 'nombre 182', 2, 2),
(184, 'nombre 183', 2, 2),
(185, 'nombre 184', 2, 2),
(186, 'nombre 185', 2, 2),
(187, 'nombre 186', 2, 2),
(188, 'nombre 187', 2, 2),
(189, 'nombre 188', 2, 2),
(190, 'nombre 189', 2, 2),
(191, 'nombre 190', 2, 2),
(192, 'nombre 191', 2, 2),
(193, 'nombre 192', 2, 2),
(194, 'nombre 193', 2, 2),
(195, 'nombre 194', 2, 2),
(196, 'nombre 195', 2, 2),
(197, 'nombre 196', 2, 2),
(198, 'nombre 197', 2, 2),
(199, 'nombre 198', 2, 2),
(200, 'nombre 199', 2, 2),
(201, 'nombre 200', 2, 2),
(202, 'nombre 201', 2, 2),
(203, 'nombre 202', 2, 2),
(204, 'nombre 203', 2, 2),
(205, 'nombre 204', 2, 2),
(206, 'nombre 205', 2, 2),
(207, 'nombre 206', 2, 2),
(208, 'nombre 207', 2, 2),
(209, 'nombre 208', 2, 2),
(210, 'nombre 209', 2, 2),
(211, 'nombre 210', 2, 2),
(212, 'nombre 211', 2, 2),
(213, 'nombre 212', 2, 2),
(214, 'nombre 213', 2, 2),
(215, 'nombre 214', 2, 2),
(216, 'nombre 215', 2, 2),
(217, 'nombre 216', 2, 2),
(218, 'nombre 217', 2, 2),
(219, 'nombre 218', 2, 2),
(220, 'nombre 219', 2, 2),
(221, 'nombre 220', 2, 2),
(222, 'nombre 221', 2, 2),
(223, 'nombre 222', 2, 2),
(224, 'nombre 223', 2, 2),
(225, 'nombre 224', 2, 2),
(226, 'nombre 225', 2, 4),
(227, 'nombre 226', 2, 4),
(228, 'nombre 227', 2, 4),
(229, 'nombre 228', 2, 4),
(230, 'nombre 229', 2, 4),
(231, 'nombre 230', 2, 4),
(232, 'nombre 231', 2, 4),
(233, 'nombre 232', 2, 4),
(234, 'nombre 233', 2, 4),
(235, 'nombre 234', 2, 4),
(236, 'nombre 235', 2, 4),
(237, 'nombre 236', 2, 4),
(238, 'nombre 237', 2, 4),
(239, 'nombre 238', 2, 4),
(240, 'nombre 239', 2, 4),
(241, 'nombre 240', 2, 4),
(242, 'nombre 241', 2, 4),
(243, 'nombre 242', 2, 4),
(244, 'nombre 243', 2, 4),
(245, 'nombre 244', 2, 4),
(246, 'nombre 245', 2, 4),
(247, 'nombre 246', 2, 4),
(248, 'nombre 247', 2, 4),
(249, 'nombre 248', 2, 4),
(250, 'nombre 249', 2, 4),
(251, 'nombre 250', 2, 4),
(252, 'nombre 251', 2, 4),
(253, 'nombre 252', 2, 4),
(254, 'nombre 253', 2, 4),
(255, 'nombre 254', 2, 4),
(256, 'nombre 255', 2, 4),
(257, 'nombre 256', 2, 4),
(258, 'nombre 257', 2, 4),
(259, 'nombre 258', 2, 4),
(260, 'nombre 259', 2, 4),
(261, 'nombre 260', 2, 4),
(262, 'nombre 261', 2, 4),
(263, 'nombre 262', 2, 4),
(264, 'nombre 263', 2, 4),
(265, 'nombre 264', 2, 4),
(266, 'nombre 265', 2, 4),
(267, 'nombre 266', 2, 4),
(268, 'nombre 267', 2, 4),
(269, 'nombre 268', 2, 4),
(270, 'nombre 269', 2, 4),
(271, 'nombre 270', 2, 4),
(272, 'nombre 271', 2, 4),
(273, 'nombre 272', 2, 4),
(274, 'nombre 273', 2, 4),
(275, 'nombre 274', 2, 4),
(276, 'nombre 275', 2, 4),
(277, 'nombre 276', 2, 4),
(278, 'nombre 277', 2, 4),
(279, 'nombre 278', 2, 4),
(280, 'nombre 279', 2, 4),
(281, 'nombre 280', 2, 4),
(282, 'nombre 281', 2, 4),
(283, 'nombre 282', 2, 4),
(284, 'nombre 283', 2, 4),
(285, 'nombre 284', 2, 4),
(286, 'nombre 285', 2, 4),
(287, 'nombre 286', 2, 4),
(288, 'nombre 287', 2, 4),
(289, 'nombre 288', 2, 4),
(290, 'nombre 289', 2, 4),
(291, 'nombre 290', 2, 4),
(292, 'nombre 291', 2, 4),
(293, 'nombre 292', 2, 4),
(294, 'nombre 293', 2, 4),
(295, 'nombre 294', 2, 4),
(296, 'nombre 295', 2, 4),
(297, 'nombre 296', 2, 4),
(298, 'nombre 297', 2, 4),
(299, 'nombre 298', 2, 4),
(300, 'nombre 299', 2, 4),
(301, 'nombre 0', 2, 4),
(302, 'nombre 1', 2, 4),
(303, 'nombre 2', 2, 4),
(304, 'nombre 3', 2, 4),
(305, 'nombre 4', 2, 4),
(306, 'nombre 5', 2, 4),
(307, 'nombre 6', 2, 4),
(308, 'nombre 7', 2, 4),
(309, 'nombre 8', 2, 4),
(310, 'nombre 9', 2, 4),
(311, 'nombre 10', 2, 4),
(312, 'nombre 11', 2, 4),
(313, 'nombre 12', 2, 4),
(314, 'nombre 13', 2, 4),
(315, 'nombre 14', 2, 4),
(316, 'nombre 15', 2, 4),
(317, 'nombre 16', 2, 4),
(318, 'nombre 17', 2, 4),
(319, 'nombre 18', 2, 4),
(320, 'nombre 19', 2, 4),
(321, 'nombre 20', 2, 4),
(322, 'nombre 21', 2, 4),
(323, 'nombre 22', 2, 4),
(324, 'nombre 23', 2, 4),
(325, 'nombre 24', 2, 4),
(326, 'nombre 25', 2, 4),
(327, 'nombre 26', 2, 4),
(328, 'nombre 27', 2, 4),
(329, 'nombre 28', 2, 4),
(330, 'nombre 29', 2, 4),
(331, 'nombre 30', 2, 4),
(332, 'nombre 31', 2, 4),
(333, 'nombre 32', 2, 4),
(334, 'nombre 33', 2, 4),
(335, 'nombre 34', 2, 4),
(336, 'nombre 35', 2, 4),
(337, 'nombre 36', 2, 4),
(338, 'nombre 37', 2, 4),
(339, 'nombre 38', 2, 4),
(340, 'nombre 39', 2, 4),
(341, 'nombre 40', 2, 4),
(342, 'nombre 41', 2, 4),
(343, 'nombre 42', 2, 4),
(344, 'nombre 43', 2, 4),
(345, 'nombre 44', 2, 4),
(346, 'nombre 45', 2, 4),
(347, 'nombre 46', 2, 4),
(348, 'nombre 47', 2, 4),
(349, 'nombre 48', 2, 4),
(350, 'nombre 49', 2, 4),
(351, 'nombre 50', 2, 4),
(352, 'nombre 51', 2, 4),
(353, 'nombre 52', 2, 4),
(354, 'nombre 53', 2, 4),
(355, 'nombre 54', 2, 4),
(356, 'nombre 55', 2, 4),
(357, 'nombre 56', 2, 4),
(358, 'nombre 57', 2, 4),
(359, 'nombre 58', 2, 4),
(360, 'nombre 59', 2, 4),
(361, 'nombre 60', 2, 4),
(362, 'nombre 61', 2, 4),
(363, 'nombre 62', 2, 4),
(364, 'nombre 63', 2, 4),
(365, 'nombre 64', 2, 4),
(366, 'nombre 65', 2, 4),
(367, 'nombre 66', 2, 4),
(368, 'nombre 67', 2, 4),
(369, 'nombre 68', 2, 4),
(370, 'nombre 69', 2, 4),
(371, 'nombre 70', 2, 4),
(372, 'nombre 71', 2, 4),
(373, 'nombre 72', 2, 4),
(374, 'nombre 73', 2, 4),
(375, 'nombre 74', 2, 4),
(376, 'nombre 75', 2, 4),
(377, 'nombre 76', 2, 4),
(378, 'nombre 77', 2, 4),
(379, 'nombre 78', 2, 4),
(380, 'nombre 79', 2, 4),
(381, 'nombre 80', 2, 4),
(382, 'nombre 81', 2, 4),
(383, 'nombre 82', 2, 4),
(384, 'nombre 83', 2, 4),
(385, 'nombre 84', 2, 4),
(386, 'nombre 85', 2, 4),
(387, 'nombre 86', 2, 4),
(388, 'nombre 87', 2, 4),
(389, 'nombre 88', 2, 4),
(390, 'nombre 89', 2, 4),
(391, 'nombre 90', 2, 4),
(392, 'nombre 91', 2, 4),
(393, 'nombre 92', 2, 4),
(394, 'nombre 93', 2, 4),
(395, 'nombre 94', 2, 4),
(396, 'nombre 95', 2, 4),
(397, 'nombre 96', 2, 4),
(398, 'nombre 97', 2, 4),
(399, 'nombre 98', 2, 4),
(400, 'nombre 99', 2, 4),
(401, 'nombre 100', 2, 4),
(402, 'nombre 101', 2, 4),
(403, 'nombre 102', 2, 4),
(404, 'nombre 103', 2, 4),
(405, 'nombre 104', 2, 4),
(406, 'nombre 105', 2, 4),
(407, 'nombre 106', 2, 4),
(408, 'nombre 107', 2, 4),
(409, 'nombre 108', 2, 4),
(410, 'nombre 109', 2, 4),
(411, 'nombre 110', 2, 4),
(412, 'nombre 111', 2, 4),
(413, 'nombre 112', 2, 4),
(414, 'nombre 113', 2, 4),
(415, 'nombre 114', 2, 4),
(416, 'nombre 115', 2, 4),
(417, 'nombre 116', 2, 4),
(418, 'nombre 117', 2, 4),
(419, 'nombre 118', 2, 4),
(420, 'nombre 119', 2, 4),
(421, 'nombre 120', 2, 4),
(422, 'nombre 121', 2, 4),
(423, 'nombre 122', 2, 4),
(424, 'nombre 123', 2, 4),
(425, 'nombre 124', 2, 4),
(426, 'nombre 125', 2, 4),
(427, 'nombre 126', 2, 4),
(428, 'nombre 127', 2, 4),
(429, 'nombre 128', 2, 4),
(430, 'nombre 129', 2, 4),
(431, 'nombre 130', 2, 4),
(432, 'nombre 131', 2, 4),
(433, 'nombre 132', 2, 4),
(434, 'nombre 133', 2, 4),
(435, 'nombre 134', 2, 4),
(436, 'nombre 135', 2, 4),
(437, 'nombre 136', 2, 4),
(438, 'nombre 137', 2, 4),
(439, 'nombre 138', 2, 4),
(440, 'nombre 139', 2, 4),
(441, 'nombre 140', 2, 4),
(442, 'nombre 141', 2, 4),
(443, 'nombre 142', 2, 4),
(444, 'nombre 143', 2, 4),
(445, 'nombre 144', 2, 4),
(446, 'nombre 145', 2, 4),
(447, 'nombre 146', 2, 4),
(448, 'nombre 147', 2, 4),
(449, 'nombre 148', 2, 4),
(450, 'nombre 149', 2, 4),
(451, 'nombre 150', 2, 4),
(452, 'nombre 151', 2, 4),
(453, 'nombre 152', 2, 4),
(454, 'nombre 153', 2, 4),
(455, 'nombre 154', 2, 4),
(456, 'nombre 155', 2, 4),
(457, 'nombre 156', 2, 4),
(458, 'nombre 157', 2, 4),
(459, 'nombre 158', 2, 4),
(460, 'nombre 159', 2, 4),
(461, 'nombre 160', 2, 4),
(462, 'nombre 161', 2, 4),
(463, 'nombre 162', 2, 4),
(464, 'nombre 163', 2, 4),
(465, 'nombre 164', 2, 4),
(466, 'nombre 165', 2, 4),
(467, 'nombre 166', 2, 4),
(468, 'nombre 167', 2, 4),
(469, 'nombre 168', 2, 4),
(470, 'nombre 169', 2, 4),
(471, 'nombre 170', 2, 4),
(472, 'nombre 171', 2, 4),
(473, 'nombre 172', 2, 4),
(474, 'nombre 173', 2, 4),
(475, 'nombre 174', 2, 4),
(476, 'nombre 175', 2, 4),
(477, 'nombre 176', 2, 4),
(478, 'nombre 177', 2, 4),
(479, 'nombre 178', 2, 4),
(480, 'nombre 179', 2, 4),
(481, 'nombre 180', 2, 4),
(482, 'nombre 181', 2, 4),
(483, 'nombre 182', 2, 4),
(484, 'nombre 183', 2, 4),
(485, 'nombre 184', 2, 4),
(486, 'nombre 185', 2, 4),
(487, 'nombre 186', 2, 4),
(488, 'nombre 187', 2, 4),
(489, 'nombre 188', 2, 4),
(490, 'nombre 189', 2, 4),
(491, 'nombre 190', 2, 4),
(492, 'nombre 191', 2, 4),
(493, 'nombre 192', 2, 4),
(494, 'nombre 193', 2, 4),
(495, 'nombre 194', 2, 4),
(496, 'nombre 195', 2, 4),
(497, 'nombre 196', 2, 4),
(498, 'nombre 197', 2, 4),
(499, 'nombre 198', 2, 4),
(500, 'nombre 199', 2, 4),
(501, 'nombre 200', 2, 4),
(502, 'nombre 201', 2, 4),
(503, 'nombre 202', 2, 4),
(504, 'nombre 203', 2, 4),
(505, 'nombre 204', 2, 4),
(506, 'nombre 205', 2, 4),
(507, 'nombre 206', 2, 4),
(508, 'nombre 207', 2, 4),
(509, 'nombre 208', 2, 4),
(510, 'nombre 209', 2, 4),
(511, 'nombre 210', 2, 4),
(512, 'nombre 211', 2, 4),
(513, 'nombre 212', 2, 4),
(514, 'nombre 213', 2, 4),
(515, 'nombre 214', 2, 4),
(516, 'nombre 215', 2, 4),
(517, 'nombre 216', 2, 4),
(518, 'nombre 217', 2, 4),
(519, 'nombre 218', 2, 4),
(520, 'nombre 219', 2, 4),
(521, 'nombre 220', 2, 4),
(522, 'nombre 221', 2, 4),
(523, 'nombre 222', 2, 4),
(524, 'nombre 223', 2, 4),
(525, 'nombre 224', 2, 4),
(526, 'nombre 225', 2, 4),
(527, 'nombre 226', 2, 4),
(528, 'nombre 227', 2, 4),
(529, 'nombre 228', 2, 4),
(530, 'nombre 229', 2, 4),
(531, 'nombre 230', 2, 4),
(532, 'nombre 231', 2, 4),
(533, 'nombre 232', 2, 4),
(534, 'nombre 233', 2, 4),
(535, 'nombre 234', 2, 4),
(536, 'nombre 235', 2, 4),
(537, 'nombre 236', 2, 4),
(538, 'nombre 237', 2, 4),
(539, 'nombre 238', 2, 4),
(540, 'nombre 239', 2, 4),
(541, 'nombre 240', 2, 4),
(542, 'nombre 241', 2, 4),
(543, 'nombre 242', 2, 4),
(544, 'nombre 243', 2, 4),
(545, 'nombre 244', 2, 4),
(546, 'nombre 245', 2, 4),
(547, 'nombre 246', 2, 4),
(548, 'nombre 247', 2, 4),
(549, 'nombre 248', 2, 4),
(550, 'nombre 249', 2, 4),
(551, 'nombre 250', 2, 4),
(552, 'nombre 251', 2, 4),
(553, 'nombre 252', 2, 4),
(554, 'nombre 253', 2, 4),
(555, 'nombre 254', 2, 4),
(556, 'nombre 255', 2, 4),
(557, 'nombre 256', 2, 4),
(558, 'nombre 257', 2, 4),
(559, 'nombre 258', 2, 4),
(560, 'nombre 259', 2, 4),
(561, 'nombre 260', 2, 4),
(562, 'nombre 261', 2, 4),
(563, 'nombre 262', 2, 4),
(564, 'nombre 263', 2, 4),
(565, 'nombre 264', 2, 4),
(566, 'nombre 265', 2, 4),
(567, 'nombre 266', 2, 4),
(568, 'nombre 267', 2, 4),
(569, 'nombre 268', 2, 4),
(570, 'nombre 269', 2, 4),
(571, 'nombre 270', 2, 4),
(572, 'nombre 271', 2, 4),
(573, 'nombre 272', 2, 4),
(574, 'nombre 273', 2, 4),
(575, 'nombre 274', 2, 4),
(576, 'nombre 275', 2, 4),
(577, 'nombre 276', 2, 4),
(578, 'nombre 277', 2, 4),
(579, 'nombre 278', 2, 4),
(580, 'nombre 279', 2, 4),
(581, 'nombre 280', 2, 4),
(582, 'nombre 281', 2, 4),
(583, 'nombre 282', 2, 4),
(584, 'nombre 283', 2, 4),
(585, 'nombre 284', 2, 4),
(586, 'nombre 285', 2, 4),
(587, 'nombre 286', 2, 4),
(588, 'nombre 287', 2, 4),
(589, 'nombre 288', 2, 4),
(590, 'nombre 289', 2, 4),
(591, 'nombre 290', 2, 4),
(592, 'nombre 291', 2, 4),
(593, 'nombre 292', 2, 4),
(594, 'nombre 293', 2, 4),
(595, 'nombre 294', 2, 4),
(596, 'nombre 295', 2, 4),
(597, 'nombre 296', 2, 4),
(598, 'nombre 297', 2, 4),
(599, 'nombre 298', 2, 4),
(600, 'nombre 299', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Administrador'),
(2, 'Gestor'),
(3, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `email`, `role`, `estado`, `fecha`, `codigo`) VALUES
(1, 'nombre1', 'admin', 'd1b254c9620425f582e27f0044be34bee087d8b4', 'admin@admin.adm', 1, 1, '0000-00-00 00:00:00', 0),
(2, 'usuario1', 'usuario1', 'd1b254c9620425f582e27f0044be34bee087d8b4', 'usuario1@user.com', 2, 1, '2013-02-08 13:01:27', 0),
(11, 'Ivan', 'ivan', 'd1b254c9620425f582e27f0044be34bee087d8b4', 'ivanpgcs@gmail.com', 3, 1, '2013-02-08 15:36:31', 1737964536);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
