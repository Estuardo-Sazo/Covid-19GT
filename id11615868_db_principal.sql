-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-05-2020 a las 14:22:23
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id11615868_db_principal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `covid19_visitas`
--

CREATE TABLE `covid19_visitas` (
  `id_visita` int(11) NOT NULL,
  `Numero_visita` int(11) NOT NULL,
  `Confirmado` int(11) NOT NULL,
  `Muertes` int(11) NOT NULL,
  `Curados` int(11) NOT NULL,
  `Activos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `covid19_visitas`
--

INSERT INTO `covid19_visitas` (`id_visita`, `Numero_visita`, `Confirmado`, `Muertes`, `Curados`, `Activos`) VALUES
(1, 2599, 967, 24, 104, 837);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_clientes`
--

CREATE TABLE `tabla_clientes` (
  `Id_cliente` int(11) NOT NULL,
  `Nombre_cliente` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_cliente` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado_cliente` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_clientes`
--

INSERT INTO `tabla_clientes` (`Id_cliente`, `Nombre_cliente`, `Telefono_cliente`, `Estado_cliente`, `Id_usuario`) VALUES
(1, 'Mely MIDES', '51174560', 0, 11),
(2, 'Flory Mides', '320000', 0, 11),
(3, 'Jairo ', '122', 0, 11),
(4, 'José Perez', '45688526', 0, 11),
(5, 'Interlazer ', '122345678', 0, 11),
(6, 'Mama Deunda ', '55835084', 1, 11),
(7, 'Yensi Deuda ', '22', 1, 11),
(8, 'Lesbia Deuda', '555', 1, 11),
(9, 'Doña Silvia Suegra ', '42885', 1, 11),
(10, 'Jaime Sazo', '42280059', 0, 13),
(11, 'Préstamo Axel', '95955', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_creditos`
--

CREATE TABLE `tabla_creditos` (
  `Id_credito` int(11) NOT NULL,
  `Id_cliente` int(11) NOT NULL,
  `Fecha_credito` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_fin_credito` varchar(75) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Total_credito` decimal(10,2) DEFAULT 0.00,
  `Estado_credito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_creditos`
--

INSERT INTO `tabla_creditos` (`Id_credito`, `Id_cliente`, `Fecha_credito`, `Fecha_fin_credito`, `Total_credito`, `Estado_credito`) VALUES
(1, 1, '21/11/2019', '28/11/2019', 43.50, 1),
(2, 2, '22/11/2019', '28/11/2019', 10.00, 1),
(3, 3, '22/11/2019', '22/11/2019', 8.00, 1),
(4, 4, '16/12/2019', '16/12/2019', 22.50, 1),
(5, 5, '9/1/2020', '16/2/2020', 48.50, 1),
(9, 6, '1/5/2020', NULL, 288.00, 0),
(10, 7, '1/5/2020', NULL, 180.00, 0),
(11, 8, '1/5/2020', NULL, 25.00, 0),
(12, 9, '2/5/2020', NULL, 1400.00, 0),
(13, 11, '8/5/2020', NULL, 2400.00, 0);

--
-- Disparadores `tabla_creditos`
--
DELIMITER $$
CREATE TRIGGER `CreditoActivoCliente` AFTER INSERT ON `tabla_creditos` FOR EACH ROW UPDATE tabla_clientes SET tabla_clientes.Estado_cliente=1
WHERE tabla_clientes.Id_cliente=NEW.Id_cliente
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CreditoPagado` AFTER UPDATE ON `tabla_creditos` FOR EACH ROW UPDATE tabla_clientes SET tabla_clientes.Estado_cliente=0
WHERE tabla_clientes.Id_cliente=NEW.Id_cliente AND NEW.Estado_credito=1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `EliminarCredito` AFTER DELETE ON `tabla_creditos` FOR EACH ROW UPDATE tabla_clientes SET tabla_clientes.Estado_cliente=0
WHERE tabla_clientes.Id_cliente=old.Id_cliente
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_productos`
--

CREATE TABLE `tabla_productos` (
  `Id_producto` int(11) NOT NULL,
  `Descripcion_producto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Precio_producto` decimal(10,2) DEFAULT NULL,
  `Cantidad_producto` int(11) DEFAULT NULL,
  `Total_producto` decimal(10,2) DEFAULT NULL,
  `Id_credito` int(11) DEFAULT NULL,
  `Fecha_ingreso` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_productos`
--

INSERT INTO `tabla_productos` (`Id_producto`, `Descripcion_producto`, `Precio_producto`, `Cantidad_producto`, `Total_producto`, `Id_credito`, `Fecha_ingreso`) VALUES
(1, 'Impresiones ', 0.50, 5, 2.50, 1, '21/11/2019'),
(2, 'Impresiones ', 1.00, 3, 3.00, 1, '21/11/2019'),
(3, 'Copias', 0.25, 4, 1.00, 1, '21/11/2019'),
(4, 'Impresiones Color', 1.00, 4, 4.00, 1, '21/11/2019'),
(5, 'Impresion', 0.50, 1, 0.50, 1, '21/11/2019'),
(6, 'Impresion Folleto', 23.00, 1, 23.00, 1, '22/11/2019'),
(7, 'Copias', 0.25, 16, 4.00, 1, '22/11/2019'),
(8, 'Impresiones ', 0.50, 10, 5.00, 1, '22/11/2019'),
(9, 'Graficas', 10.00, 1, 10.00, 2, '22/11/2019'),
(10, 'Coca ', 4.00, 2, 8.00, 3, '22/11/2019'),
(11, 'Hola Impresa ', 0.50, 1, 0.50, 1, '25/11/2019'),
(12, 'Coca Cola ', 5.00, 3, 15.00, 4, '16/12/2019'),
(13, 'Galletas', 2.50, 3, 7.50, 4, '16/12/2019'),
(14, 'Impresiones ', 0.50, 15, 7.50, 5, '9/1/2020'),
(19, 'Fotos', 4.00, 3, 12.00, 5, '9/1/2020'),
(20, 'Impresiones ', 0.50, 58, 29.00, 5, '19/1/2020'),
(24, 'D', 20.00, 1, 20.00, 9, '1/5/2020'),
(25, 'D 1/05/20', 25.00, 1, 25.00, 11, '1/5/2020'),
(26, 'Pago De Luz Abril', 88.00, 1, 88.00, 9, '2/5/2020'),
(28, 'Pago De Internet Abril ', 180.00, 1, 180.00, 10, '2/5/2020'),
(29, 'Préstamo De Ahorros', 1200.00, 1, 1200.00, 12, '2/5/2020'),
(30, 'Prestamos ', 100.00, 2, 200.00, 12, '2/5/2020'),
(31, 'Prestado 5/5/20', 100.00, 1, 100.00, 13, '8/5/2020'),
(32, 'Préstamo Pago U', 2300.00, 1, 2300.00, 13, '8/5/2020'),
(33, 'Mando ', 20.00, 1, 20.00, 9, '9/5/2020'),
(34, 'Deposito', 160.00, 1, 160.00, 9, '9/5/2020');

--
-- Disparadores `tabla_productos`
--
DELIMITER $$
CREATE TRIGGER `Agregar_total_credito` AFTER INSERT ON `tabla_productos` FOR EACH ROW BEGIN
UPDATE tabla_creditos SET tabla_creditos.Total_credito = tabla_creditos.Total_credito + (NEW.Precio_producto * NEW.Cantidad_producto) 
WHERE tabla_creditos.Id_credito= NEW.Id_credito;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `EliminarPro` AFTER DELETE ON `tabla_productos` FOR EACH ROW UPDATE tabla_creditos SET tabla_creditos.Total_credito=tabla_creditos.Total_credito-old.Total_producto
WHERE tabla_creditos.Id_credito=old.Id_credito
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_usuarios`
--

CREATE TABLE `tabla_usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre_usuario` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_usuario` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Correo_usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Clave_usuario` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_usuarios`
--

INSERT INTO `tabla_usuarios` (`Id_usuario`, `Nombre_usuario`, `Telefono_usuario`, `Correo_usuario`, `Clave_usuario`) VALUES
(11, 'Jaime Sazo Admin', '42280059', '201701818@upana.edu.gt', '$2y$10$kj0vRH4vvkOQ1F1G2.WOjOiivZaRx7KC.87PawediJL3jNdX4yHT.'),
(12, 'Prueva', '12345678', 'prueva@gmail.com', '$2y$10$HphvwRKzHv0YVKJXIC9QSetG3kFpXkUJ/6jA6Z3v.Ta4m67kOBC/K'),
(13, 'José Daniel ', '123456', 'daniel@gmail.com', '$2y$10$VODU//M/6FT8j4hOaEsBxuJoB48AAzSTOxzHbmARn0NE8Vu7q/w6e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_diarios`
--

CREATE TABLE `tbl_datos_diarios` (
  `dt_id` int(11) NOT NULL,
  `dt_nuevos` int(11) NOT NULL,
  `dt_recuperados` int(11) NOT NULL,
  `dt_muertes` int(11) NOT NULL,
  `dt_pruebas` int(11) NOT NULL,
  `dt_fecha` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_datos_diarios`
--

INSERT INTO `tbl_datos_diarios` (`dt_id`, `dt_nuevos`, `dt_recuperados`, `dt_muertes`, `dt_pruebas`, `dt_fecha`) VALUES
(1, 85, 9, 1, 897, 'Martes, 12 de mayo 2020'),
(6, 143, 1, 2, 1113, 'Miercoles, 13 de mayo 2020'),
(7, 176, 8, 0, 1022, 'Jueves, 14 de mayo 2020'),
(8, 125, 6, 1, 1233, 'Viernes,15 de mayo 2020'),
(9, 120, 3, 3, 1397, 'Sábado, 16 de mayo de 2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_generales`
--

CREATE TABLE `tbl_datos_generales` (
  `Id` int(11) NOT NULL,
  `visitas` int(11) NOT NULL,
  `confirmado` int(11) NOT NULL,
  `activos` int(11) NOT NULL,
  `recuperados` int(11) NOT NULL,
  `muertes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_datos_generales`
--

INSERT INTO `tbl_datos_generales` (`Id`, `visitas`, `confirmado`, `activos`, `recuperados`, `muertes`) VALUES
(1, 3122, 1763, 1590, 138, 33);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `covid19_visitas`
--
ALTER TABLE `covid19_visitas`
  ADD PRIMARY KEY (`id_visita`);

--
-- Indices de la tabla `tabla_clientes`
--
ALTER TABLE `tabla_clientes`
  ADD PRIMARY KEY (`Id_cliente`),
  ADD KEY `Uno_idx` (`Id_usuario`);

--
-- Indices de la tabla `tabla_creditos`
--
ALTER TABLE `tabla_creditos`
  ADD PRIMARY KEY (`Id_credito`,`Id_cliente`),
  ADD KEY `Dos_idx` (`Id_cliente`);

--
-- Indices de la tabla `tabla_productos`
--
ALTER TABLE `tabla_productos`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `Cuatro_idx` (`Id_credito`);

--
-- Indices de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `tbl_datos_diarios`
--
ALTER TABLE `tbl_datos_diarios`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indices de la tabla `tbl_datos_generales`
--
ALTER TABLE `tbl_datos_generales`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_clientes`
--
ALTER TABLE `tabla_clientes`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tabla_creditos`
--
ALTER TABLE `tabla_creditos`
  MODIFY `Id_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tabla_productos`
--
ALTER TABLE `tabla_productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_datos_diarios`
--
ALTER TABLE `tbl_datos_diarios`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_datos_generales`
--
ALTER TABLE `tbl_datos_generales`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla_clientes`
--
ALTER TABLE `tabla_clientes`
  ADD CONSTRAINT `Uno` FOREIGN KEY (`Id_usuario`) REFERENCES `tabla_usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabla_creditos`
--
ALTER TABLE `tabla_creditos`
  ADD CONSTRAINT `Tres` FOREIGN KEY (`Id_cliente`) REFERENCES `tabla_clientes` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabla_productos`
--
ALTER TABLE `tabla_productos`
  ADD CONSTRAINT `Cuatro` FOREIGN KEY (`Id_credito`) REFERENCES `tabla_creditos` (`Id_credito`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
