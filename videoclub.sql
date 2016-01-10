-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2016 a las 21:17:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `id` int(10) NOT NULL,
  `personaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKactor397518` (`personaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor_pelicula`
--

CREATE TABLE IF NOT EXISTS `actor_pelicula` (
  `id` int(10) NOT NULL,
  `actorid` int(10) NOT NULL,
  `peliculaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKactor_peli530264` (`actorid`),
  KEY `FKactor_peli572289` (`peliculaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provinciaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKcomuna800853` (`provinciaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `id` int(10) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `personaid` int(10) NOT NULL,
  `comunaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKdireccion346710` (`personaid`),
  KEY `FKdireccion295194` (`comunaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `id` int(10) NOT NULL,
  `personaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKdirector795326` (`personaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_pelicula`
--

CREATE TABLE IF NOT EXISTS `director_pelicula` (
  `id` int(10) NOT NULL,
  `directorid` int(10) NOT NULL,
  `peliculaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKdirector_p668387` (`directorid`),
  KEY `FKdirector_p947172` (`peliculaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1452453219),
('m130524_201442_init', 1452453223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `duracion_minutos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(10) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(10) NOT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `socioid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKprestamo593360` (`socioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_pelicula`
--

CREATE TABLE IF NOT EXISTS `prestamo_pelicula` (
  `id` int(10) NOT NULL,
  `prestamoid` int(10) NOT NULL,
  `peliculaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKprestamo_p318333` (`prestamoid`),
  KEY `FKprestamo_p144140` (`peliculaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `regionid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKprovincia563349` (`regionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(10) NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `codigoIdentificador` int(10) DEFAULT NULL,
  `nombreUsuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `personaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKsocio361879` (`personaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pelicula`
--

CREATE TABLE IF NOT EXISTS `tipo_pelicula` (
  `id` int(10) NOT NULL,
  `categoria` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pelicula_pelicula`
--

CREATE TABLE IF NOT EXISTS `tipo_pelicula_pelicula` (
  `id` int(10) NOT NULL,
  `peliculaid` int(10) NOT NULL,
  `tipo_peliculaid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKtipo_pelic477144` (`peliculaid`),
  KEY `FKtipo_pelic955804` (`tipo_peliculaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `FKactor397518` FOREIGN KEY (`personaid`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  ADD CONSTRAINT `FKactor_peli572289` FOREIGN KEY (`peliculaid`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `FKactor_peli530264` FOREIGN KEY (`actorid`) REFERENCES `actor` (`id`);

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `FKcomuna800853` FOREIGN KEY (`provinciaid`) REFERENCES `provincia` (`id`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `FKdireccion295194` FOREIGN KEY (`comunaid`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `FKdireccion346710` FOREIGN KEY (`personaid`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `FKdirector795326` FOREIGN KEY (`personaid`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `director_pelicula`
--
ALTER TABLE `director_pelicula`
  ADD CONSTRAINT `FKdirector_p947172` FOREIGN KEY (`peliculaid`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `FKdirector_p668387` FOREIGN KEY (`directorid`) REFERENCES `director` (`id`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `FKprestamo593360` FOREIGN KEY (`socioid`) REFERENCES `socio` (`id`);

--
-- Filtros para la tabla `prestamo_pelicula`
--
ALTER TABLE `prestamo_pelicula`
  ADD CONSTRAINT `FKprestamo_p144140` FOREIGN KEY (`peliculaid`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `FKprestamo_p318333` FOREIGN KEY (`prestamoid`) REFERENCES `prestamo` (`id`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `FKprovincia563349` FOREIGN KEY (`regionid`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `FKsocio361879` FOREIGN KEY (`personaid`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `tipo_pelicula_pelicula`
--
ALTER TABLE `tipo_pelicula_pelicula`
  ADD CONSTRAINT `FKtipo_pelic955804` FOREIGN KEY (`tipo_peliculaid`) REFERENCES `tipo_pelicula` (`id`),
  ADD CONSTRAINT `FKtipo_pelic477144` FOREIGN KEY (`peliculaid`) REFERENCES `pelicula` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
