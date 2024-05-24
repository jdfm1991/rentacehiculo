-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-05-2024 a las 17:29:23
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.4

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
  `brand` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_brands_table`
--

INSERT INTO `cars_brands_table` (`id`, `brand`, `active`) VALUES
('1', 'marca 1', 1),
('2', 'marca editada', 1),
('3', 'marca 3', 1),
('4', 'marca 4', 1),
('5', 'marca prueba', 1),
('6650b70a136dc', 'nueva marca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_images_table`
--

CREATE TABLE `cars_images_table` (
  `id` int NOT NULL,
  `car` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `imgcar` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_images_table`
--

INSERT INTO `cars_images_table` (`id`, `car`, `imgcar`, `top`, `active`) VALUES
(2, '664d40ffeada8', 'WIN_20240520_14_45_00_Pro.jpg', 1, 1),
(3, '664d40ffeada8', 'WIN_20240520_14_45_06_Pro.jpg', 0, 1),
(4, '664d42468a036', 'foto-removebg-preview.png', 1, 1),
(5, '664d42468a036', 'Imagen22.png', 0, 1),
(6, '664d43cef29ac', 'jdo.jpg', 0, 1),
(7, '664d43cef29ac', 'lkds.jpg', 1, 1),
(8, '664d43cef29ac', 'sello.jpg', 0, 1),
(9, '664d444d8b74a', '2.png', 0, 1),
(10, '664d444d8b74a', 'carro.png', 1, 1),
(11, '664d4974b6b1f', 'CONDO.jpeg', 0, 1),
(12, '664d4974b6b1f', 'portafolio.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_models_table`
--

CREATE TABLE `cars_models_table` (
  `id` varchar(50) NOT NULL,
  `model` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `brand` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_models_table`
--

INSERT INTO `cars_models_table` (`id`, `model`, `brand`, `active`) VALUES
('1', 'modelo 1', '1', 1),
('10', 'modelo 4', '1', 1),
('11', 'modelo 7', '3', 1),
('12', 'modelo 10', '3', 1),
('2', 'modelo 2', '5', 1),
('3', 'modelo 3', '3', 1),
('4', 'modelo 5', '1', 1),
('5', 'modelo 9', '1', 1),
('6', 'modelo 6', '6650b70a136dc', 1),
('6650c4c4d9e0f', 'modelo nuevo', '2', 1),
('7', 'modelo 11', '2', 1),
('8', 'modelo 8', '3', 1),
('9', 'modelo 12', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_regions_table`
--

CREATE TABLE `cars_regions_table` (
  `id` varchar(50) NOT NULL,
  `region` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_regions_table`
--

INSERT INTO `cars_regions_table` (`id`, `region`, `active`) VALUES
('1', 'region 1', 1),
('2', 'regjon 2', 1),
('3', 'region 3', 1),
('4', 'regjon 4', 1),
('66509a49be337', 'cosas', 1),
('6650a80e1d7cb', 'loasooj', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_status_table`
--

CREATE TABLE `cars_status_table` (
  `id` int NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_status_table`
--

INSERT INTO `cars_status_table` (`id`, `status`) VALUES
(1, 'Vehiculo Disponile'),
(2, 'Vehiculo Reservado'),
(3, 'Vehiculo Alquilado'),
(4, 'Vehiculo En Mantenimiento'),
(5, 'Vehiculo No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars_table`
--

CREATE TABLE `cars_table` (
  `id` varchar(50) NOT NULL,
  `region` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `model` varchar(50) NOT NULL,
  `anno` year NOT NULL,
  `plate` varchar(10) NOT NULL,
  `cost` decimal(28,4) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars_table`
--

INSERT INTO `cars_table` (`id`, `region`, `brand`, `model`, `anno`, `plate`, `cost`, `description`, `status`, `active`) VALUES
('664d40ffeada8', '1', '1', '1', 2020, 'a1b2c3', '25.2500', 'primera prueba', 1, 1),
('664d42468a036', '2', '1', '10', 2014, 'cos25', '15.4500', 'otra mas', 3, 1),
('664d43cef29ac', '1', '2', '2', 2015, 'a4sed', '14.4700', 'otra vez', 1, 1),
('664d444d8b74a', '3', '3', '12', 1998, 'co54re', '18.4500', 'cosa mias', 2, 1),
('664d4974b6b1f', '2', '2', '6', 2023, 'cas458', '154.4000', 'otra ves', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_methods_table`
--

CREATE TABLE `payment_methods_table` (
  `id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `method` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `code` varchar(8) CHARACTER SET utf8mb4 DEFAULT NULL,
  `numberaccount` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `document` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payment_methods_table`
--

INSERT INTO `payment_methods_table` (`id`, `method`, `code`, `numberaccount`, `document`, `phone`) VALUES
('1', 'banco 1', '0102', '0102-0102-02-1425785856', '20795147', '04249875614'),
('2', 'banco 2', '0105', '0105-0245-02-1425452335', '20975144', '0412-2489874'),
('3', 'Efectvo', NULL, NULL, NULL, NULL),
('4', 'Divisa', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rent_status_table`
--

CREATE TABLE `rent_status_table` (
  `id` int NOT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rent_status_table`
--

INSERT INTO `rent_status_table` (`id`, `status`) VALUES
(1, 'Solicitud Pendiente'),
(2, 'Solicitud  Enviada'),
(3, 'Solicitud Aprovada'),
(4, 'Solicitud En Revision'),
(5, 'Solicitud Rechazada'),
(6, 'Solicitud Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rent_table`
--

CREATE TABLE `rent_table` (
  `id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `method` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `car` varchar(50) NOT NULL,
  `daterent` datetime NOT NULL,
  `datepayment` date NOT NULL,
  `dateout` date NOT NULL,
  `datein` date NOT NULL,
  `day` int NOT NULL,
  `reference` int NOT NULL,
  `mont` decimal(28,4) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rent_table`
--

INSERT INTO `rent_table` (`id`, `method`, `user`, `car`, `daterent`, `datepayment`, `dateout`, `datein`, `day`, `reference`, `mont`, `payment`, `status`) VALUES
('664e57d23e0ce', '1', '664dd5260e7e7', '664d43cef29ac', '2024-05-22 04:05:42', '2024-05-22', '2024-05-22', '2024-05-23', 1, 2458112, '14.4700', 'plantilla.jpg', 4),
('664ea41b4b9a8', '2', '664f33735553c', '664d43cef29ac', '2024-05-22 10:05:11', '2024-05-22', '2024-05-22', '2024-05-31', 9, 258768, '130.2300', 'carro.png', 6),
('664f31fba689a', '2', '664dd5260e7e7', '664d4974b6b1f', '2024-05-23 08:05:31', '2024-05-23', '2024-05-24', '2024-05-31', 7, 587469, '1080.8000', 'plantilla.jpg', 6),
('664f326ea51bd', '3', '664dd5260e7e7', '664d42468a036', '2024-05-23 08:05:26', '2024-05-23', '2024-05-27', '2024-05-31', 4, 7854961, '61.8000', 'plantilla.jpg', 3),
('664f33bb47d2f', '2', '664f33735553c', '664d4974b6b1f', '2024-05-23 08:05:59', '2024-05-23', '2024-06-01', '2024-06-30', 29, 587964, '4477.6000', 'plantilla.jpg', 6),
('664f3dae39113', '2', '664f33735553c', '664d40ffeada8', '2024-05-23 08:05:26', '2024-05-23', '2024-05-23', '2024-05-29', 6, 546545, '151.5000', 'plantilla.jpg', 6),
('664f4084b570f', '1', '664f33735553c', '664d444d8b74a', '2024-05-23 09:05:32', '2024-05-23', '2024-05-23', '2024-05-24', 1, 54545, '18.4500', 'plantilla.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data_table`
--

CREATE TABLE `users_data_table` (
  `id` int NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nameu` varchar(150) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `letter` varchar(2) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dni` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `imgdni` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_data_table`
--

INSERT INTO `users_data_table` (`id`, `user`, `nameu`, `address`, `phone`, `letter`, `dni`, `imgdni`, `status`) VALUES
(1, '664d408bddc78', 'admin', NULL, '0000000', NULL, NULL, NULL, 0),
(2, '664dd5260e7e7', 'jovanni franco', 'las malvinas lkoko9k', '4249265304', 'V', '2097514', 'plantilla.jpg', 1),
(3, '664f32cdb5fd5', 'jovanni', NULL, '04129660517', NULL, NULL, NULL, 0),
(4, '664f33735553c', 'admin', NULL, '4249265304', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_table`
--

CREATE TABLE `users_table` (
  `id` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) NOT NULL,
  `passw` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idtype` int NOT NULL,
  `imguser` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_table`
--

INSERT INTO `users_table` (`id`, `email`, `passw`, `idtype`, `imguser`, `active`) VALUES
('664d408bddc78', 'admin@admin.com', '$2y$10$jElTO.oSaFS3s.CeCsfDH.nqGljYu0CGKctnUhp9W3wE.e57..4x2', 1, NULL, 1),
('664dd5260e7e7', 'jovannifranco@gmail.com', '$2y$10$eCyORbNcS.UuVGAVMgTkuO2h70wDIJl63jXrV7ePlDKEgQhJg.Vsq', 2, 'WIN_20240520_14_45_06_Pro.jpg', 1),
('664f32cdb5fd5', 'cosas@gmail.com', '$2y$10$BrSozXVjhN.XO5xN0Sm2E.vuj2GhYHgBNhBfYdblPV2ZtzVASk3n.', 2, NULL, 1),
('664f33735553c', 'administrador@administrador.com', '$2y$10$xsGw.couYGg1EZoyRP9R9.lGicj21HzzkJO6XjFKkf5vxqxoZHAgO', 2, NULL, 1),
('664febeae965d', 'admin2@admin.com', '$2y$10$uc/nVCtqmRGIG0jL5AzUmuaDt0BAQdpQBMPCv6PPWkF9iMwDymMX2', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type_table`
--

CREATE TABLE `user_type_table` (
  `id` int NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indices de la tabla `cars_status_table`
--
ALTER TABLE `cars_status_table`
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
-- Indices de la tabla `payment_methods_table`
--
ALTER TABLE `payment_methods_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rent_status_table`
--
ALTER TABLE `rent_status_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rent_table`
--
ALTER TABLE `rent_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusfk` (`status`),
  ADD KEY `methodfk` (`method`),
  ADD KEY `ruserfk` (`user`),
  ADD KEY `rcarfk` (`car`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cars_status_table`
--
ALTER TABLE `cars_status_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rent_status_table`
--
ALTER TABLE `rent_status_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_data_table`
--
ALTER TABLE `users_data_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user_type_table`
--
ALTER TABLE `user_type_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `methodfk` FOREIGN KEY (`method`) REFERENCES `payment_methods_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `rcarfk` FOREIGN KEY (`car`) REFERENCES `cars_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ruserfk` FOREIGN KEY (`user`) REFERENCES `users_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `statusfk` FOREIGN KEY (`status`) REFERENCES `rent_status_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_table`
--
ALTER TABLE `users_table`
  ADD CONSTRAINT `typefk` FOREIGN KEY (`idtype`) REFERENCES `user_type_table` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
