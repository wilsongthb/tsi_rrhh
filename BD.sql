-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.40 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para tsi_rrhh
CREATE DATABASE IF NOT EXISTS `tsi_rrhh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tsi_rrhh`;


-- Volcando estructura para tabla tsi_rrhh.aportes
CREATE TABLE IF NOT EXISTS `aportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.aportes: ~1 rows (aproximadamente)
DELETE FROM `aportes`;
/*!40000 ALTER TABLE `aportes` DISABLE KEYS */;
INSERT INTO `aportes` (`id`, `descripcion`, `abreviatura`) VALUES
	(1, 'SEGURO INTEGRAL DE SALUD', 'SIS');
/*!40000 ALTER TABLE `aportes` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.datoslaborales
CREATE TABLE IF NOT EXISTS `datoslaborales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipodeplanilla` varchar(45) DEFAULT NULL,
  `tipodeempleado` varchar(45) DEFAULT NULL,
  `centrodecostos` varchar(45) DEFAULT NULL,
  `salario` float(8,5) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `perfilcontable` varchar(45) DEFAULT NULL,
  `cargo` varchar(120) DEFAULT NULL,
  `fechadeingreso` date DEFAULT NULL,
  `fechadesalida` date DEFAULT NULL,
  `personal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_datoslaborales_personal1_idx` (`personal_id`),
  CONSTRAINT `fk_datoslaborales_personal1` FOREIGN KEY (`personal_id`) REFERENCES `tsi_remuneraciones`.`personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.datoslaborales: ~0 rows (aproximadamente)
DELETE FROM `datoslaborales`;
/*!40000 ALTER TABLE `datoslaborales` DISABLE KEYS */;
/*!40000 ALTER TABLE `datoslaborales` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.descuentos: ~1 rows (aproximadamente)
DELETE FROM `descuentos`;
/*!40000 ALTER TABLE `descuentos` DISABLE KEYS */;
INSERT INTO `descuentos` (`id`, `descripcion`, `abreviatura`) VALUES
	(1, 'POR PERRO', 'PP');
/*!40000 ALTER TABLE `descuentos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.estado: ~3 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `descripcion`) VALUES
	(1, 'ACTIVO'),
	(2, 'INACTIVO'),
	(3, 'ANULADO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.ingresos: ~4 rows (aproximadamente)
DELETE FROM `ingresos`;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` (`id`, `descripcion`, `abreviatura`) VALUES
	(1, 'REMUNERACION BASICA', 'RB'),
	(3, 'BONO DE FIESTAS PATRIAS', 'B-FP'),
	(4, 'GREEDISGOOD', 'GG'),
	(5, 'BONO NAVIDEÑO OBRERO', 'BN - O');
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.listaaportes
CREATE TABLE IF NOT EXISTS `listaaportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(8,2) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL,
  `aportes_id` int(11) NOT NULL,
  `perfilpago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_listaaportes_moneda1_idx` (`moneda_id`),
  KEY `fk_listaaportes_aportes1_idx` (`aportes_id`),
  KEY `fk_listaaportes_perfilpago1_idx` (`perfilpago_id`),
  CONSTRAINT `fk_listaaportes_aportes1` FOREIGN KEY (`aportes_id`) REFERENCES `aportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaaportes_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaaportes_perfilpago1` FOREIGN KEY (`perfilpago_id`) REFERENCES `perfilpago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.listaaportes: ~3 rows (aproximadamente)
DELETE FROM `listaaportes`;
/*!40000 ALTER TABLE `listaaportes` DISABLE KEYS */;
INSERT INTO `listaaportes` (`id`, `monto`, `moneda_id`, `aportes_id`, `perfilpago_id`) VALUES
	(1, 40.00, 1, 1, 1),
	(2, 60.00, 1, 1, 7),
	(3, 20.00, 1, 1, 9);
/*!40000 ALTER TABLE `listaaportes` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.listadescuentos
CREATE TABLE IF NOT EXISTS `listadescuentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(8,2) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL,
  `descuentos_id` int(11) NOT NULL,
  `perfilpago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_listadescuentos_moneda1_idx` (`moneda_id`),
  KEY `fk_listadescuentos_descuentos1_idx` (`descuentos_id`),
  KEY `fk_listadescuentos_perfilpago1_idx` (`perfilpago_id`),
  CONSTRAINT `fk_listadescuentos_descuentos1` FOREIGN KEY (`descuentos_id`) REFERENCES `descuentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listadescuentos_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listadescuentos_perfilpago1` FOREIGN KEY (`perfilpago_id`) REFERENCES `perfilpago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.listadescuentos: ~2 rows (aproximadamente)
DELETE FROM `listadescuentos`;
/*!40000 ALTER TABLE `listadescuentos` DISABLE KEYS */;
INSERT INTO `listadescuentos` (`id`, `monto`, `moneda_id`, `descuentos_id`, `perfilpago_id`) VALUES
	(1, 200.00, 1, 1, 1),
	(2, 500000.00, 1, 1, 9);
/*!40000 ALTER TABLE `listadescuentos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.listaingresos
CREATE TABLE IF NOT EXISTS `listaingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(8,2) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL,
  `ingresos_id` int(11) NOT NULL,
  `perfilpago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_listaingresos_moneda1_idx` (`moneda_id`),
  KEY `fk_listaingresos_ingresos1_idx` (`ingresos_id`),
  KEY `fk_listaingresos_perfilpago1_idx` (`perfilpago_id`),
  CONSTRAINT `fk_listaingresos_ingresos1` FOREIGN KEY (`ingresos_id`) REFERENCES `ingresos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaingresos_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaingresos_perfilpago1` FOREIGN KEY (`perfilpago_id`) REFERENCES `perfilpago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.listaingresos: ~7 rows (aproximadamente)
DELETE FROM `listaingresos`;
/*!40000 ALTER TABLE `listaingresos` DISABLE KEYS */;
INSERT INTO `listaingresos` (`id`, `monto`, `moneda_id`, `ingresos_id`, `perfilpago_id`) VALUES
	(1, 1000.00, 1, 1, 1),
	(2, 2500.00, 1, 1, 7),
	(3, 25000.00, 1, 3, 6),
	(5, 100000.00, 1, 3, 7),
	(8, 480.00, 1, 4, 7),
	(9, 10.00, 1, 1, 9),
	(10, 450.00, 1, 5, 5);
/*!40000 ALTER TABLE `listaingresos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.moneda
CREATE TABLE IF NOT EXISTS `moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.moneda: ~4 rows (aproximadamente)
DELETE FROM `moneda`;
/*!40000 ALTER TABLE `moneda` DISABLE KEYS */;
INSERT INTO `moneda` (`id`, `descripcion`, `abreviatura`) VALUES
	(1, 'NUEVOS SOLES', 'S/.'),
	(2, 'DOLARES AMERICANOS', '$'),
	(3, 'INTI', 'I'),
	(4, 'CHICHIKOMONEDA', 'CM');
/*!40000 ALTER TABLE `moneda` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.pagos: ~0 rows (aproximadamente)
DELETE FROM `pagos`;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.pagos_has_aportes
CREATE TABLE IF NOT EXISTS `pagos_has_aportes` (
  `pagos_id` int(11) NOT NULL,
  `aportes_id` int(11) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  PRIMARY KEY (`pagos_id`,`aportes_id`),
  KEY `fk_pagos_has_aportes_aportes1_idx` (`aportes_id`),
  KEY `fk_pagos_has_aportes_pagos1_idx` (`pagos_id`),
  KEY `fk_pagos_has_aportes_moneda1_idx` (`moneda_id`),
  CONSTRAINT `fk_pagos_has_aportes_aportes1` FOREIGN KEY (`aportes_id`) REFERENCES `aportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_aportes_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_aportes_pagos1` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.pagos_has_aportes: ~0 rows (aproximadamente)
DELETE FROM `pagos_has_aportes`;
/*!40000 ALTER TABLE `pagos_has_aportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos_has_aportes` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.pagos_has_descuentos
CREATE TABLE IF NOT EXISTS `pagos_has_descuentos` (
  `pagos_id` int(11) NOT NULL,
  `descuentos_id` int(11) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  PRIMARY KEY (`pagos_id`,`descuentos_id`),
  KEY `fk_pagos_has_descuentos_descuentos1_idx` (`descuentos_id`),
  KEY `fk_pagos_has_descuentos_pagos1_idx` (`pagos_id`),
  KEY `fk_pagos_has_descuentos_moneda1_idx` (`moneda_id`),
  CONSTRAINT `fk_pagos_has_descuentos_descuentos1` FOREIGN KEY (`descuentos_id`) REFERENCES `descuentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_descuentos_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_descuentos_pagos1` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.pagos_has_descuentos: ~0 rows (aproximadamente)
DELETE FROM `pagos_has_descuentos`;
/*!40000 ALTER TABLE `pagos_has_descuentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos_has_descuentos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.pagos_has_ingresos
CREATE TABLE IF NOT EXISTS `pagos_has_ingresos` (
  `pagos_id` int(11) NOT NULL,
  `ingresos_id` int(11) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  PRIMARY KEY (`pagos_id`,`ingresos_id`),
  KEY `fk_pagos_has_ingresos_ingresos1_idx` (`ingresos_id`),
  KEY `fk_pagos_has_ingresos_pagos1_idx` (`pagos_id`),
  KEY `fk_pagos_has_ingresos_moneda1_idx` (`moneda_id`),
  CONSTRAINT `fk_pagos_has_ingresos_ingresos1` FOREIGN KEY (`ingresos_id`) REFERENCES `ingresos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_ingresos_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_has_ingresos_pagos1` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.pagos_has_ingresos: ~0 rows (aproximadamente)
DELETE FROM `pagos_has_ingresos`;
/*!40000 ALTER TABLE `pagos_has_ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos_has_ingresos` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.perfilpago
CREATE TABLE IF NOT EXISTS `perfilpago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `perfilingresos` int(11) DEFAULT NULL,
  `perfildescuentos` int(11) DEFAULT NULL,
  `perfilaportes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfilpago_estado1_idx` (`estado_id`),
  CONSTRAINT `fk_perfilpago_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.perfilpago: ~6 rows (aproximadamente)
DELETE FROM `perfilpago`;
/*!40000 ALTER TABLE `perfilpago` DISABLE KEYS */;
INSERT INTO `perfilpago` (`id`, `nombre`, `descripcion`, `perfilingresos`, `perfildescuentos`, `perfilaportes`, `created_at`, `updated_at`, `estado_id`) VALUES
	(1, 'SERVICIOS', 'Pago basico aportadoa los empleados de servicios y mantenimiento', 6, 7, 5, '2016-07-17 03:15:53', '2016-07-17 03:18:20', 2),
	(5, 'BONOS NAVIDEÑOS', 'bono de navidad para algunos trabajadores', NULL, NULL, NULL, NULL, '2016-07-17 16:34:05', 1),
	(6, 'BONOS FIESTAS PATRIAS', 'bono entregado en fiestas patrias para el año 2016', NULL, NULL, NULL, NULL, '2016-07-17 16:13:49', 1),
	(7, 'PAGO A PROGRAMADOR', 'Pago a programadores del area de programacion', NULL, NULL, NULL, '2016-07-17 03:24:17', '2016-07-17 11:56:57', 1),
	(8, 'PENSION', 'Pension alimenticia aplicable a los empleados', NULL, NULL, NULL, '2016-07-17 10:48:59', '2016-07-17 16:34:15', 1),
	(9, 'BONO POR CORRUPTO', '* Este bono es de lujo *', NULL, NULL, NULL, '2016-07-17 16:14:29', '2016-07-17 16:34:21', 2);
/*!40000 ALTER TABLE `perfilpago` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.personal
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(80) DEFAULT NULL,
  `apellidopaterno` varchar(45) DEFAULT NULL,
  `apellidomaterno` varchar(45) DEFAULT NULL,
  `fechadenacimiento` date DEFAULT NULL,
  `lugardenacimiento` varchar(45) DEFAULT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `instruccion` varchar(20) DEFAULT NULL,
  `estadocivil` varchar(20) DEFAULT NULL,
  `DNI` varchar(10) DEFAULT NULL,
  `estado_id` int(11) NOT NULL,
  `perfilpago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personal_estado_idx` (`estado_id`),
  CONSTRAINT `fk_personal_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.personal: ~0 rows (aproximadamente)
DELETE FROM `personal`;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;


-- Volcando estructura para tabla tsi_rrhh.remuneraciones
CREATE TABLE IF NOT EXISTS `remuneraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observaciones` varchar(300) DEFAULT NULL,
  `anio` char(4) DEFAULT NULL,
  `mes` char(2) DEFAULT NULL,
  `monto_ingresos` float(8,2) DEFAULT NULL,
  `monto_descuentos` float(8,2) DEFAULT NULL,
  `monto_aportes` float(8,2) DEFAULT NULL,
  `monto_total` float(8,2) DEFAULT NULL,
  `monto_entregado` float(8,2) DEFAULT NULL,
  `fecha_cancelacion` timestamp NULL DEFAULT NULL,
  `asistencias` int(11) DEFAULT NULL,
  `anulado` tinyint(1) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tsi_rrhh.remuneraciones: ~0 rows (aproximadamente)
DELETE FROM `remuneraciones`;
/*!40000 ALTER TABLE `remuneraciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `remuneraciones` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
