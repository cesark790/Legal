-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2012 a las 20:35:39
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `administracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_abogado_ci`
--

CREATE TABLE IF NOT EXISTS `legal_abogado_ci` (
  `id_abogado` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_abogado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `legal_abogado_ci`
--

INSERT INTO `legal_abogado_ci` (`id_abogado`, `nombre`, `a_paterno`, `a_materno`) VALUES
(1, 'Sin ', 'Asignar', ''),
(2, 'Agustin', 'Sanchez', ''),
(3, 'Misael', 'Garcia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_abogado_externo`
--

CREATE TABLE IF NOT EXISTS `legal_abogado_externo` (
  `id_abogado` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_abogado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `legal_abogado_externo`
--

INSERT INTO `legal_abogado_externo` (`id_abogado`, `nombre`, `a_paterno`, `a_materno`) VALUES
(1, 'Sin', 'Asignar', ''),
(2, 'Test', 'Test', ''),
(3, 'Prueba', 'Prueba', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_demandado`
--

CREATE TABLE IF NOT EXISTS `legal_demandado` (
  `id_demandado` int(20) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(80) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `razon_social` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_demandado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `legal_demandado`
--

INSERT INTO `legal_demandado` (`id_demandado`, `empresa`, `razon_social`) VALUES
(1, 'SERTEC', ''),
(2, 'RECREMEX', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_empresa`
--

CREATE TABLE IF NOT EXISTS `legal_empresa` (
  `id_empresa` int(20) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `legal_empresa`
--

INSERT INTO `legal_empresa` (`id_empresa`, `empresa`) VALUES
(1, 'Sertec'),
(2, 'Recremex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_entidad`
--

CREATE TABLE IF NOT EXISTS `legal_entidad` (
  `id_entidad` int(20) NOT NULL AUTO_INCREMENT,
  `id_estado` int(20) NOT NULL,
  `entidad` varchar(48) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `legal_entidad`
--

INSERT INTO `legal_entidad` (`id_entidad`, `id_estado`, `entidad`) VALUES
(1, 1, 'Azcapotzalco'),
(2, 1, 'Miguel Hidalgo'),
(3, 1, 'Gustavo A. Madero'),
(4, 1, 'Benito Juarez'),
(5, 1, 'Tlalpan'),
(6, 2, 'Satelite'),
(7, 2, 'Cuatitlan'),
(8, 2, 'Tlanepantla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_estados`
--

CREATE TABLE IF NOT EXISTS `legal_estados` (
  `id_estado` int(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(48) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `legal_estados`
--

INSERT INTO `legal_estados` (`id_estado`, `estado`) VALUES
(1, 'Distrito Federal'),
(2, 'Estado de Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_estatus_proceso`
--

CREATE TABLE IF NOT EXISTS `legal_estatus_proceso` (
  `id_proceso` int(20) NOT NULL AUTO_INCREMENT,
  `proceso` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `legal_estatus_proceso`
--

INSERT INTO `legal_estatus_proceso` (`id_proceso`, `proceso`) VALUES
(1, 'Activo'),
(2, 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_gastos`
--

CREATE TABLE IF NOT EXISTS `legal_gastos` (
  `id_gasto` int(20) NOT NULL AUTO_INCREMENT,
  `id_demanda` int(20) NOT NULL,
  `concepto` text COLLATE utf8_spanish_ci NOT NULL,
  `referencia_bancaria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `monto` double NOT NULL,
  `saldo` double NOT NULL,
  `id_usuario` int(50) NOT NULL,
  `capturo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gasto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `legal_gastos`
--

INSERT INTO `legal_gastos` (`id_gasto`, `id_demanda`, `concepto`, `referencia_bancaria`, `monto`, `saldo`, `id_usuario`, `capturo`, `fecha_captura`) VALUES
(1, 0, 'Sin registrar gastos', '', 0, 0, 0, '', '2012-04-27 16:56:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_gerentes`
--

CREATE TABLE IF NOT EXISTS `legal_gerentes` (
  `id_gerente` int(20) NOT NULL AUTO_INCREMENT,
  `gerente` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_gerente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `legal_gerentes`
--

INSERT INTO `legal_gerentes` (`id_gerente`, `gerente`) VALUES
(1, 'GERENTE DE PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_junta`
--

CREATE TABLE IF NOT EXISTS `legal_junta` (
  `id_junta` int(20) NOT NULL AUTO_INCREMENT,
  `id_demanda` int(20) unsigned NOT NULL DEFAULT '0',
  `fecha_junta` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capturada` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_junta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_observaciones`
--

CREATE TABLE IF NOT EXISTS `legal_observaciones` (
  `id_observacion` int(20) NOT NULL AUTO_INCREMENT,
  `id_demanda` int(20) NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `capturo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_observacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_principal`
--

CREATE TABLE IF NOT EXISTS `legal_principal` (
  `id_demanda` int(25) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_cierre` datetime DEFAULT NULL,
  `id_abogado_asignado` int(25) NOT NULL DEFAULT '1',
  `id_abogado_ci` int(30) NOT NULL DEFAULT '1',
  `fecha_asignacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_empresa` int(25) NOT NULL DEFAULT '0',
  `id_gerente` int(25) NOT NULL DEFAULT '0',
  `id_estatus_proceso` int(25) DEFAULT '1',
  `actor` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `id_demandado` int(25) NOT NULL DEFAULT '0',
  `expediente` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `id_ultima_junta` int(20) NOT NULL,
  `id_estado` int(25) NOT NULL,
  `id_entidad` int(25) NOT NULL,
  `id_ultima_observacion` int(25) NOT NULL,
  `resolucion` text COLLATE utf8_spanish_ci NOT NULL,
  `pago` int(35) NOT NULL,
  `id_ultimo_gasto` int(35) NOT NULL DEFAULT '0',
  `ultima_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifico` varchar(25) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `id_estatus` int(25) NOT NULL DEFAULT '1',
  `capturo` varchar(105) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `id_cliente` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `no_nomina` int(15) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_demanda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_user`
--

CREATE TABLE IF NOT EXISTS `legal_user` (
  `idadm_tbl_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT 'n/a',
  `ap_pat_` varchar(100) NOT NULL DEFAULT 'n/a',
  `ap_mat_` varchar(100) NOT NULL DEFAULT 'n/a',
  `nivel` int(3) NOT NULL,
  `user_name` varchar(100) NOT NULL DEFAULT 'n/a',
  `password` text NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(200) NOT NULL DEFAULT 'n/a',
  `empresa` int(10) unsigned NOT NULL DEFAULT '0',
  `tipo_abogado` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idadm_tbl_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `legal_user`
--

INSERT INTO `legal_user` (`idadm_tbl_user`, `nombre`, `ap_pat_`, `ap_mat_`, `nivel`, `user_name`, `password`, `registro`, `email`, `empresa`, `tipo_abogado`) VALUES
(1, 'Julio Cesar', 'Sanchez', 'Lopez', 1, 'julio', 'admin', '2012-05-04 16:44:43', 'julio.sanchez@cimexico.mx', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
