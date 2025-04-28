-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2025 a las 15:56:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--
-- Creación: 22-04-2025 a las 13:13:32
--

CREATE TABLE `acta` (
  `id_acta` int(11) NOT NULL,
  `tipo_acta` enum('entrada','salida','prestamo','devolucion','traslado') DEFAULT NULL,
  `numero_secuencial` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `id_usuario_creador` int(11) DEFAULT NULL,
  `id_centro` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `estado` enum('borrador','finalizada','anulada') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_trabajo`
--
-- Creación: 25-04-2025 a las 12:49:23
--

CREATE TABLE `centro_trabajo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `presupuesto_mensual` decimal(10,2) DEFAULT NULL,
  `cantidad_personal` int(11) DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centro_trabajo`
--

INSERT INTO `centro_trabajo` (`id`, `nombre`, `ubicacion`, `presupuesto_mensual`, `cantidad_personal`, `id_responsable`) VALUES
(10, 'Sede Norte', 'Av. 68 # 70-90, Bogotá', 900000.00, 12, 1),
(11, 'Sede Sur', 'Cra. 50 # 10-45, Bogotá', 750000.00, 10, 2),
(12, 'Sede Medellín', 'Cl. 30 # 45-67, Medellín', 820000.00, 15, 3),
(13, 'Sede Cali', 'Cra. 80 # 13-20, Cali', 780000.00, 9, 4),
(14, 'Sede Barranquilla', 'Cl. 76 # 55-30, Barranquilla', 850000.00, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--
-- Creación: 24-04-2025 a las 12:44:48
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--
-- Creación: 25-04-2025 a las 19:17:58
--

CREATE TABLE `elementos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` enum('herramienta','equipo','insumo') NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `disponibilidad` enum('Vendido','Prestado','En bodega') NOT NULL,
  `estado` enum('Nuevo','Bueno','Usado','Dañado') NOT NULL,
  `talla` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_inventario`
--
-- Creación: 22-04-2025 a las 13:13:50
--

CREATE TABLE `entrada_inventario` (
  `id_entrada` int(11) NOT NULL,
  `id_acta` int(11) DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `proveedor` varchar(100) DEFAULT NULL,
  `numero_factura` varchar(50) DEFAULT NULL,
  `valor_total` decimal(12,2) DEFAULT NULL,
  `responsable_recepcion` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia`
--
-- Creación: 22-04-2025 a las 13:13:41
--

CREATE TABLE `fotografia` (
  `id_fotografia` int(11) NOT NULL,
  `id_acta` int(11) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_fotografia` enum('entrada','salida','prestamo','devolucion','estado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--
-- Creación: 25-04-2025 a las 13:31:49
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `codigo_inventario` varchar(50) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_salida` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `estado` enum('vendido','sin entregar','devuelto') DEFAULT 'sin entregar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--
-- Creación: 22-04-2025 a las 13:13:18
--

CREATE TABLE `movimiento` (
  `id_movimiento` int(11) NOT NULL,
  `id_elemento` int(11) DEFAULT NULL,
  `centro_origen` int(11) DEFAULT NULL,
  `centro_destino` int(11) DEFAULT NULL,
  `tipo_movimiento` enum('entrada','salida','prestamo','devolucion','traslado') DEFAULT NULL,
  `fecha_movimiento` date DEFAULT NULL,
  `hora_movimiento` time DEFAULT NULL,
  `responsable_entrega` varchar(100) DEFAULT NULL,
  `responsable_recibe` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_acta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 22-04-2025 a las 13:50:24
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_centro` int(11) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `tipo_documento` enum('CC','CE','TI','Pasaporte') NOT NULL,
  `numero_documento` varchar(30) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_centro`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `cargo`, `telefono`, `email`) VALUES
(1, 12, 'Carlos', 'Ramírez', 'CC', '1012345678', 'Supervisor', '3001112233', 'carlos.ramirez@ws.com'),
(2, 13, 'Diana', 'Martínez', 'CC', '1012345679', 'Técnico', '3014445566', 'diana.martinez@ws.com'),
(3, 14, 'Luis', 'Gómez', 'CC', '1023456789', 'Coordinador', '3027778899', 'luis.gomez@ws.com'),
(4, 10, 'Andrea', 'Pérez', 'CE', 'E12345678', 'Almacenista', '3041234567', 'andrea.perez@ws.com'),
(5, 10, 'dsa', 'dsa', 'CE', 'dsa', 'DESARROLLADOR WEB', 'da', 'soporte@prlcol.co');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`id_acta`);

--
-- Indices de la tabla `centro_trabajo`
--
ALTER TABLE `centro_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responsable` (`id_responsable`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada_inventario`
--
ALTER TABLE `entrada_inventario`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `fotografia`
--
ALTER TABLE `fotografia`
  ADD PRIMARY KEY (`id_fotografia`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_inventario` (`codigo_inventario`),
  ADD KEY `fk_inventario_elemento` (`id_elemento`),
  ADD KEY `fk_inventario_centro` (`id_centro`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_elemento` (`id_elemento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD KEY `id_centro` (`id_centro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `id_acta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_trabajo`
--
ALTER TABLE `centro_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30081;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `entrada_inventario`
--
ALTER TABLE `entrada_inventario`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotografia`
--
ALTER TABLE `fotografia`
  MODIFY `id_fotografia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `centro_trabajo`
--
ALTER TABLE `centro_trabajo`
  ADD CONSTRAINT `fk_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_centro` FOREIGN KEY (`id_centro`) REFERENCES `centro_trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario_elemento` FOREIGN KEY (`id_elemento`) REFERENCES `elementos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id_elemento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_trabajo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
