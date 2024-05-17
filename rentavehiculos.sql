-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2024 a las 11:43:40
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id22179043_jovanni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_brands_table`
--

CREATE TABLE `cars_brands_table` (
  `id` varchar(50) NOT NULL,
  `brand` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `cars_brands_table`
--

INSERT INTO `cars_brands_table` (`id`, `brand`) VALUES
('1', 'marca 1'),
('2', 'marca 2'),
('3', 'marca 3'),
('4', 'marca 4'),
('5', 'marca 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_images_table`
--

CREATE TABLE `cars_images_table` (
  `id` int(11) NOT NULL,
  `car` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `cars_images_table`
--

INSERT INTO `cars_images_table` (`id`, `car`, `image`) VALUES
(1, '1', 'portfolio-1.jpg'),
(2, '10', 'portfolio-4.jpg'),
(3, '11', 'portfolio-5.jpg'),
(4, '12', 'portfolio-6.jpg'),
(5, '13', 'portfolio-8.jpg'),
(6, '14', 'portfolio-9.jpg'),
(7, '15', 'portfolio-1.jpg'),
(8, '16', 'portfolio-2.jpg'),
(9, '17', 'portfolio-3.jpg'),
(10, '18', 'portfolio-4.jpg'),
(11, '19', 'portfolio-5.jpg'),
(12, '2', 'portfolio-2.jpg'),
(13, '20', 'portfolio-6.jpg'),
(14, '21', 'portfolio-7.jpg'),
(15, '22', 'portfolio-8.jpg'),
(16, '23', 'portfolio-9.jpg'),
(17, '24', 'portfolio-1.jpg'),
(18, '25', 'portfolio-2.jpg'),
(19, '26', 'portfolio-3.jpg'),
(20, '27', 'portfolio-4.jpg'),
(21, '28', 'portfolio-5.jpg'),
(22, '29', 'portfolio-6.jpg'),
(23, '3', 'portfolio-3.jpg'),
(24, '30', 'portfolio-7.jpg'),
(25, '31', 'portfolio-8.jpg'),
(26, '32', 'portfolio-9.jpg'),
(27, '33', 'portfolio-1.jpg'),
(28, '34', 'portfolio-2.jpg'),
(29, '35', 'portfolio-3.jpg'),
(30, '36', 'portfolio-4.jpg'),
(31, '37', 'portfolio-5.jpg'),
(32, '38', 'portfolio-6.jpg'),
(33, '39', 'portfolio-7.jpg'),
(34, '4', 'portfolio-4.jpg'),
(35, '40', 'portfolio-8.jpg'),
(36, '41', 'portfolio-9.jpg'),
(37, '42', 'portfolio-1.jpg'),
(38, '43', 'portfolio-2.jpg'),
(39, '44', 'portfolio-3.jpg'),
(40, '45', 'portfolio-4.jpg'),
(41, '46', 'portfolio-5.jpg'),
(42, '5', 'portfolio-5.jpg'),
(43, '6', 'portfolio-6.jpg'),
(44, '7', 'portfolio-1.jpg'),
(45, '8', 'portfolio-2.jpg'),
(46, '9', 'portfolio-3.jpg'),
(47, '1', 'portfolio-2.jpg'),
(48, '1', 'portfolio-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_models_table`
--

CREATE TABLE `cars_models_table` (
  `id` varchar(50) NOT NULL,
  `model` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `cars_models_table`
--

INSERT INTO `cars_models_table` (`id`, `model`, `brand`) VALUES
('1', 'modelo 1', '1'),
('10', 'modelo 4', '1'),
('11', 'modelo 7', '3'),
('12', 'modelo 10', '3'),
('2', 'modelo 2', '2'),
('3', 'modelo 3', '3'),
('4', 'modelo 5', '1'),
('5', 'modelo 9', '1'),
('6', 'modelo 6', '2'),
('7', 'modelo 11', '2'),
('8', 'modelo 8', '3'),
('9', 'modelo 12', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_regions_table`
--

CREATE TABLE `cars_regions_table` (
  `id` varchar(50) NOT NULL,
  `region` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `cars_regions_table`
--

INSERT INTO `cars_regions_table` (`id`, `region`) VALUES
('1', 'region 1'),
('2', 'regjon 2'),
('3', 'region 3'),
('4', 'regjon 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_table`
--

CREATE TABLE `cars_table` (
  `id` varchar(50) NOT NULL,
  `region` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `model` varchar(50) NOT NULL,
  `anno` year(4) NOT NULL,
  `plate` varchar(10) NOT NULL,
  `cost` decimal(28,4) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `cars_table`
--

INSERT INTO `cars_table` (`id`, `region`, `brand`, `model`, `anno`, `plate`, `cost`, `description`, `available`) VALUES
('1', '3', '4', '1', 2004, 'abc145', '125.4500', '                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.', 1),
('10', '4', '3', '2', 2012, 'kse478', '125.4500', 'El alquiler de automóviles es un contrato por un período de tiempo determinado a una cantidad acordada de dinero para la renta. Una agencia de alquiler de coches, rent-a-car o car hire es una compañía que ofrece automóviles de alquiler para cortos o largos períodos de tiempo. Sus establecimientos están situados sobre todo, en las inmediaciones de aeropuertos, estaciones de trenes y autobuses.', 0),
('11', '1', '1', '3', 2015, 'kse478', '125.4500', 'Se complementan a menudo con un sitio Web permitiendo hacer reservas a través de Internet. Existen también sitios Web, como las agencias de viajes en línea, que comparan precios de las agencias principales de alquiler de coches. La diferencia clave en un contrato de alquiler es que después del término principal (generalmente 2, 3 o 4 años) el vehículo tiene que ser devuelto a la compañía de arrendamiento financiero o comprado por el valor residual.', 1),
('12', '2', '2', '1', 2020, 'kse478', '125.4500', '', 0),
('13', '3', '3', '2', 2004, 'abc145', '125.4500', '', 0),
('14', '2', '2', '3', 2010, 'kse478', '125.4500', '', 1),
('15', '3', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('16', '4', '2', '1', 2020, 'kse478', '125.4500', '', 0),
('17', '1', '1', '1', 2009, 'abc145', '125.4500', '', 0),
('18', '2', '2', '2', 2010, 'kse478', '125.4500', '', 1),
('19', '3', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('2', '4', '2', '2', 2010, 'kse478', '125.4500', '', 1),
('20', '1', '3', '2', 2012, 'kse478', '125.4500', '', 0),
('21', '2', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('22', '3', '2', '2', 2010, 'kse478', '125.4500', '', 1),
('23', '4', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('24', '1', '3', '2', 2012, 'kse478', '125.4500', '', 0),
('25', '2', '1', '3', 2015, 'kse478', '125.4500', '', 0),
('26', '3', '2', '1', 2020, 'kse478', '125.4500', '', 1),
('27', '4', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('28', '1', '2', '2', 2010, 'kse478', '125.4500', '', 1),
('29', '2', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('3', '3', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('30', '4', '5', '2', 2012, 'kse478', '125.4500', '', 1),
('31', '1', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('32', '2', '2', '2', 2010, 'kse478', '125.4500', '', 0),
('33', '3', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('34', '4', '3', '2', 2012, 'kse478', '125.4500', '', 1),
('35', '1', '1', '3', 2020, 'kse478', '125.4500', '', 0),
('36', '2', '2', '1', 2020, 'kse478', '125.4500', '', 1),
('37', '3', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('38', '4', '2', '2', 2010, 'kse478', '125.4500', '', 0),
('39', '1', '3', '3', 2008, 'abc145', '125.4500', '', 1),
('4', '2', '3', '2', 2012, 'kse478', '125.4500', '', 0),
('40', '3', '3', '2', 2012, 'kse478', '125.4500', '', 0),
('41', '4', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('42', '1', '2', '2', 2010, 'kse478', '125.4500', '', 1),
('43', '2', '3', '3', 2008, 'abc145', '125.4500', '', 0),
('44', '3', '3', '2', 2012, 'kse478', '125.4500', '', 1),
('45', '4', '1', '3', 2015, 'kse478', '125.4500', '', 0),
('46', '1', '2', '1', 2020, 'kse478', '125.4500', '', 0),
('5', '2', '1', '3', 2015, 'kse478', '125.4500', '', 1),
('6', '3', '2', '1', 2020, 'kse478', '125.4500', '', 0),
('7', '4', '1', '1', 2004, 'abc145', '125.4500', '', 0),
('8', '1', '2', '2', 2010, 'kse478', '125.4500', '', 0),
('9', '2', '3', '3', 2008, 'abc145', '125.4500', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rent_table`
--

CREATE TABLE `rent_table` (
  `id` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `car` varchar(50) NOT NULL,
  `daterent` datetime NOT NULL,
  `dateout` date NOT NULL,
  `datein` date NOT NULL,
  `day` int(11) NOT NULL,
  `mont` decimal(28,4) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `rent_table`
--

INSERT INTO `rent_table` (`id`, `user`, `car`, `daterent`, `dateout`, `datein`, `day`, `mont`, `payment`, `status`) VALUES
('66451e37afa20', '663b951d5c993', '1', '2024-05-15 05:05:30', '2024-05-15', '2024-05-16', 1, '125.4500', 'cedula.jpg', 6),
('66451e9f62106', '663b951d5c993', '25', '2024-05-15 05:05:40', '2024-05-15', '2024-05-30', 15, '1.0000', 'IMG_20230928_084247_324-removebg-preview.png', 6),
('66451eeeb3a4d', '663b951d5c993', '46', '2024-05-15 05:05:25', '2024-05-15', '2024-05-27', 12, '1.0000', 'Captura de pantalla (1).png', 6),
('664522937ac0e', '663b951d5c993', '2', '2024-05-15 05:01:04', '2024-05-15', '2024-05-16', 1, '125.4500', 'CM&SM Systems.jpg', 6),
('6645275e4db07', '663b951d5c993', '11', '2024-05-15 00:00:00', '2024-05-15', '2024-05-16', 1, '125.4500', 'CM&SM Systems.jpg', 6),
('66452c52a5660', '663b951d5c993', '14', '2024-05-15 05:05:42', '2024-05-15', '2024-05-16', 1, '125.4500', 'IMG_20230928_084247_324-removebg-preview.png', 6),
('66461018a7cf8', '663b951d5c993', '11', '2024-05-16 09:05:32', '2024-05-16', '2024-05-17', 1, '125.4500', 'logo sin fondo.png', 6),
('6646a70ca3f21', '663b951d5c993', '18', '2024-05-16 08:05:36', '2024-05-16', '2024-05-30', 14, '1.0000', 'logo sin fondo.png', 6),
('6646afc1940f7', '663b951d5c993', '1', '2024-05-16 09:05:45', '2024-05-16', '2024-05-31', 15, '1881.7500', 'Captura de pantalla (34).png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_table`
--

CREATE TABLE `status_table` (
  `id` int(11) NOT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `status_table`
--

INSERT INTO `status_table` (`id`, `status`) VALUES
(1, 'Solicitud Pendiente'),
(2, 'Solicitud  Enviada'),
(3, 'Solicitud Aprovada'),
(4, 'Solicitud En Revision'),
(5, 'Solicitud Rechazada'),
(6, 'Solicitud Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data_table`
--

CREATE TABLE `users_data_table` (
  `id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nameu` varchar(150) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(30) NOT NULL,
  `letter` varchar(2) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `imgdni` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `users_data_table`
--

INSERT INTO `users_data_table` (`id`, `user`, `nameu`, `address`, `phone`, `letter`, `dni`, `imgdni`, `status`) VALUES
(1, '1', '1', '', '', '', '', '', 0),
(2, '663b951d5c993', 'Jovanni Daniel Franco Mujica', 'las malvinas', '04249265304', 'V', '20975144', 'cedula.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_table`
--

CREATE TABLE `users_table` (
  `id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) NOT NULL,
  `passw` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idtype` int(11) NOT NULL,
  `imguser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `users_table`
--

INSERT INTO `users_table` (`id`, `email`, `passw`, `idtype`, `imguser`) VALUES
('663b951d5c993', 'jovannifranco@gmail.com', '$2y$10$U0j.BjU9d5OXUc0tc6UbvOXSoKhBh3TBJm4cMRiDgEXW0rYaVODHW', 2, 'IMG_20230928_084247_324-removebg-preview.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type_table`
--

CREATE TABLE `user_type_table` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `user_type_table`
--

INSERT INTO `user_type_table` (`id`, `type`) VALUES
(1, 'Administrativo'),
(2, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cars_brands_table`
--
ALTER TABLE `cars_brands_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cars_images_table`
--
ALTER TABLE `cars_images_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carfk` (`car`);

--
-- Indices de la tabla `cars_models_table`
--
ALTER TABLE `cars_models_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mbrandfk` (`brand`);

--
-- Indices de la tabla `cars_regions_table`
--
ALTER TABLE `cars_regions_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cars_table`
--
ALTER TABLE `cars_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelfk` (`model`),
  ADD KEY `brandfk` (`brand`),
  ADD KEY `regionFK` (`region`);

--
-- Indices de la tabla `rent_table`
--
ALTER TABLE `rent_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusfk` (`status`);

--
-- Indices de la tabla `status_table`
--
ALTER TABLE `status_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_data_table`
--
ALTER TABLE `users_data_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typefk` (`idtype`);

--
-- Indices de la tabla `user_type_table`
--
ALTER TABLE `user_type_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cars_images_table`
--
ALTER TABLE `cars_images_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `status_table`
--
ALTER TABLE `status_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_data_table`
--
ALTER TABLE `users_data_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_type_table`
--
ALTER TABLE `user_type_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cars_images_table`
--
ALTER TABLE `cars_images_table`
  ADD CONSTRAINT `carfk` FOREIGN KEY (`car`) REFERENCES `cars_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cars_models_table`
--
ALTER TABLE `cars_models_table`
  ADD CONSTRAINT `mbrandfk` FOREIGN KEY (`brand`) REFERENCES `cars_brands_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cars_table`
--
ALTER TABLE `cars_table`
  ADD CONSTRAINT `brandfk` FOREIGN KEY (`brand`) REFERENCES `cars_brands_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `modelfk` FOREIGN KEY (`model`) REFERENCES `cars_models_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `regionFK` FOREIGN KEY (`region`) REFERENCES `cars_regions_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `rent_table`
--
ALTER TABLE `rent_table`
  ADD CONSTRAINT `statusfk` FOREIGN KEY (`status`) REFERENCES `status_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_table`
--
ALTER TABLE `users_table`
  ADD CONSTRAINT `typefk` FOREIGN KEY (`idtype`) REFERENCES `user_type_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
