-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2016 a las 21:14:25
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laboratorio_clinico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(4) NOT NULL,
  `persona_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKadministra494418` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `persona_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(4) NOT NULL,
  `observacion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rce_examen_id` int(4) NOT NULL,
  `estado_rce_examen_id` int(4) NOT NULL,
  `persona_id_ingresa_bitacora` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKbitacora951075` (`rce_examen_id`),
  KEY `FKbitacora238887` (`estado_rce_examen_id`),
  KEY `FKbitacora245990` (`persona_id_ingresa_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_rce_examen`
--

CREATE TABLE IF NOT EXISTS `estado_rce_examen` (
  `id` int(4) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_rce_examen`
--

INSERT INTO `estado_rce_examen` (`id`, `descripcion`) VALUES
(0, 'rtthg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id` int(4) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id`, `descripcion`, `monto`, `observaciones`) VALUES
(0, 'sfsdfsd', 23423, 'sfsdfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE IF NOT EXISTS `forma_pago` (
  `id` int(4) NOT NULL,
  `decripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora`
--

CREATE TABLE IF NOT EXISTS `hora` (
  `id` int(4) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `tiempo_periodo` int(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_hora_id` int(4) NOT NULL,
  `administrador_id` int(4) NOT NULL,
  `profesional_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKhora524505` (`tipo_hora_id`),
  KEY `FKhora72062` (`administrador_id`),
  KEY `FKhora826106` (`profesional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_examen_solicitado`
--

CREATE TABLE IF NOT EXISTS `hora_examen_solicitado` (
  `id` int(4) NOT NULL,
  `hora_id` int(4) NOT NULL,
  `examen_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKhora_exame635923` (`hora_id`),
  KEY `FKhora_exame894073` (`examen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(4) NOT NULL,
  `persona_id` int(4) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpaciente757875` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(4) NOT NULL,
  `monto` float NOT NULL,
  `comprobante` float DEFAULT NULL,
  `estadopago` int(4) DEFAULT NULL,
  `forma_pago_id` int(4) NOT NULL,
  `rce_examen_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpago44623` (`forma_pago_id`),
  KEY `FKpago433436` (`rce_examen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(4) NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_paterno` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `identificadorfacebook` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `rut`, `nombres`, `apellido_paterno`, `apellido_materno`, `email`, `fecha_nacimiento`, `identificadorfacebook`) VALUES
(1, '181990775', 'pablo andrés', 'salamanca', 'vera', 'p.salamanca02@gmail.com', '1992-12-16', 'salamanca.pablo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedencia`
--

CREATE TABLE IF NOT EXISTS `procedencia` (
  `id` int(4) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE IF NOT EXISTS `profesional` (
  `id` int(4) NOT NULL,
  `persona_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKprofesiona301808` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rce_examen`
--

CREATE TABLE IF NOT EXISTS `rce_examen` (
  `id` int(4) NOT NULL,
  `reserva_id` int(4) NOT NULL,
  `persona_id_realiza_examen` int(4) NOT NULL,
  `procedencia_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKrce_examen54800` (`reserva_id`),
  KEY `FKrce_examen419474` (`persona_id_realiza_examen`),
  KEY `FKrce_examen227924` (`procedencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rce_examen_examen`
--

CREATE TABLE IF NOT EXISTS `rce_examen_examen` (
  `id` int(4) NOT NULL,
  `monto_a_pagar` float DEFAULT NULL,
  `rce_examen_id` int(4) NOT NULL,
  `examen_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKrce_examen224138` (`rce_examen_id`),
  KEY `FKrce_examen72757` (`examen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(4) NOT NULL,
  `fecha` date DEFAULT NULL,
  `paciente_id` int(4) NOT NULL,
  `persona_id_ingresa_reserva` int(4) NOT NULL,
  `hora_medica_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKreserva649215` (`paciente_id`),
  KEY `FKreserva217120` (`persona_id_ingresa_reserva`),
  KEY `FKreserva501639` (`hora_medica_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_hora`
--

CREATE TABLE IF NOT EXISTS `tipo_hora` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_hora`
--

INSERT INTO `tipo_hora` (`id`, `nombre`) VALUES
(0, 'aps');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FKadministra494418` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `FKbitacora245990` FOREIGN KEY (`persona_id_ingresa_bitacora`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FKbitacora238887` FOREIGN KEY (`estado_rce_examen_id`) REFERENCES `estado_rce_examen` (`id`),
  ADD CONSTRAINT `FKbitacora951075` FOREIGN KEY (`rce_examen_id`) REFERENCES `rce_examen` (`id`);

--
-- Filtros para la tabla `hora`
--
ALTER TABLE `hora`
  ADD CONSTRAINT `FKhora826106` FOREIGN KEY (`profesional_id`) REFERENCES `profesional` (`id`),
  ADD CONSTRAINT `FKhora524505` FOREIGN KEY (`tipo_hora_id`) REFERENCES `tipo_hora` (`id`),
  ADD CONSTRAINT `FKhora72062` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`);

--
-- Filtros para la tabla `hora_examen_solicitado`
--
ALTER TABLE `hora_examen_solicitado`
  ADD CONSTRAINT `FKhora_exame894073` FOREIGN KEY (`examen_id`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `FKhora_exame635923` FOREIGN KEY (`hora_id`) REFERENCES `hora` (`id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `FKpaciente757875` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FKpago433436` FOREIGN KEY (`rce_examen_id`) REFERENCES `rce_examen` (`id`),
  ADD CONSTRAINT `FKpago44623` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`id`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `FKprofesiona301808` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `rce_examen`
--
ALTER TABLE `rce_examen`
  ADD CONSTRAINT `FKrce_examen227924` FOREIGN KEY (`procedencia_id`) REFERENCES `procedencia` (`id`),
  ADD CONSTRAINT `FKrce_examen419474` FOREIGN KEY (`persona_id_realiza_examen`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FKrce_examen54800` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`);

--
-- Filtros para la tabla `rce_examen_examen`
--
ALTER TABLE `rce_examen_examen`
  ADD CONSTRAINT `FKrce_examen72757` FOREIGN KEY (`examen_id`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `FKrce_examen224138` FOREIGN KEY (`rce_examen_id`) REFERENCES `rce_examen` (`id`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FKreserva501639` FOREIGN KEY (`hora_medica_id`) REFERENCES `hora` (`id`),
  ADD CONSTRAINT `FKreserva217120` FOREIGN KEY (`persona_id_ingresa_reserva`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FKreserva649215` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
