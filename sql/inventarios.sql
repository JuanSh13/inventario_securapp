-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2025 a las 00:00:48
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
-- Creación: 22-04-2025 a las 16:27:00
-- Última actualización: 23-04-2025 a las 19:39:26
--

CREATE TABLE `centro_trabajo` (
  `id_centro` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `presupuesto_mensual` decimal(10,2) DEFAULT NULL,
  `cantidad_personal` int(11) DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centro_trabajo`
--

INSERT INTO `centro_trabajo` (`id_centro`, `nombre`, `ubicacion`, `presupuesto_mensual`, `cantidad_personal`, `id_responsable`) VALUES
(10, 'Sede Norte', 'Av. 68 # 70-90, Bogotá', 900000.00, 12, 1),
(11, 'Sede Sur', 'Cra. 50 # 10-45, Bogotá', 750000.00, 10, 2),
(12, 'Sede Medellín', 'Cl. 30 # 45-67, Medellín', 820000.00, 15, 3),
(13, 'Sede Cali', 'Cra. 80 # 13-20, Cali', 780000.00, 9, 4),
(14, 'Sede Barranquilla', 'Cl. 76 # 55-30, Barranquilla', 850000.00, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--
-- Creación: 22-04-2025 a las 13:12:13
--

CREATE TABLE `elemento` (
  `id_elemento` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `vida_util` int(11) DEFAULT NULL,
  `consumible` tinyint(1) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id_elemento`, `codigo`, `nombre`, `descripcion`, `categoria`, `marca`, `modelo`, `fecha_compra`, `valor`, `estado`, `vida_util`, `consumible`, `stock_minimo`) VALUES
(2, 'HERR-001', 'Martillo', 'Martillo de acero con mango de goma', 'Herramienta manual', 'Stanley', 'ST123', '2024-01-15', 45000.00, 'Bueno', 24, 0, NULL),
(3, 'HERR-002', 'Taladro', 'Taladro eléctrico 600W', 'Herramienta eléctrica', 'Bosch', 'BO600', '2024-02-10', 250000.00, 'Excelente', 36, 0, NULL),
(4, 'HERR-003', 'Destornillador', 'Juego de destornilladores de precisión', 'Herramienta manual', 'Truper', 'TRP001', '2023-11-05', 30000.00, 'Usado', 18, 0, NULL),
(5, 'CON-001', 'Guantes de Nitrilo', 'Guantes desechables para protección química', 'Seguridad', '3M', 'GN100', '2025-01-01', 800.00, 'Nuevo', 0, 1, 200),
(6, 'CON-002', 'Cinta Aislante', 'Cinta eléctrica negra 10m', 'Electricidad', '3M', 'CA10', '2025-01-02', 1200.00, 'Nuevo', 0, 1, 50),
(7, 'CON-003', 'Tornillos 1/4\"', 'Caja de 100 unidades', 'Ferretería', 'Genérico', 'TOR14', '2025-01-03', 5000.00, 'Nuevo', 0, 1, 30),
(8, '300-330', 'Pico', 'Pico de acero con doble punta ', 'Herramienta manual', 'Minecraft', 'PT-MC201', '2025-04-17', 135000.00, 'Nuevo', 8, 0, NULL);

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
-- Creación: 22-04-2025 a las 13:13:06
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_centro` int(11) DEFAULT NULL,
  `id_elemento` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `ubicacion_fisica` varchar(255) DEFAULT NULL,
  `estado_actual` varchar(100) DEFAULT NULL,
  `ultima_revision` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_centro`, `id_elemento`, `cantidad`, `ubicacion_fisica`, `estado_actual`, `ultima_revision`) VALUES
(14, 11, 2, 2, 'Gabinete Herramientas', 'Excelente', '2025-04-01'),
(15, 12, 4, 150, 'Cajón 3', 'Disponible', '2025-04-01'),
(16, 14, 5, 60, 'Cajón 4', 'Disponible', '2025-04-01'),
(17, 13, 3, 3, 'Caja de herramientas', 'Usado', '2025-04-01'),
(18, 13, 6, 45, 'Cajón 5', 'Disponible', '2025-04-01');

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
  ADD PRIMARY KEY (`id_centro`),
  ADD KEY `fk_responsable` (`id_responsable`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`id_elemento`),
  ADD UNIQUE KEY `codigo` (`codigo`);

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
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_centro` (`id_centro`),
  ADD KEY `id_elemento` (`id_elemento`);

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
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_trabajo` (`id_centro`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id_elemento`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id_elemento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_trabajo` (`id_centro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
