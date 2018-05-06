-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.31-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para nomina2018
DROP DATABASE IF EXISTS `nomina2018`;
CREATE DATABASE IF NOT EXISTS `nomina2018` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `nomina2018`;

-- Volcando estructura para tabla nomina2018.empleados
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_cedula` varchar(10) NOT NULL,
  `emp_nombre` varchar(85) NOT NULL,
  `emp_apellido` varchar(85) NOT NULL,
  `emp_salario` float NOT NULL DEFAULT '781242',
  `emp_dialaborado` float NOT NULL,
  `emp_auxilioTransporte` float NOT NULL DEFAULT '88211',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_cedula` (`emp_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='datos del empleado para el manejo de la nomina';

-- Volcando datos para la tabla nomina2018.empleados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`id`, `emp_cedula`, `emp_nombre`, `emp_apellido`, `emp_salario`, `emp_dialaborado`, `emp_auxilioTransporte`, `created`) VALUES
	(1, '453082378', 'Manuel', 'gomez', 781242, 30, 88211, '2018-05-06 16:23:44'),
	(2, '7004781234', 'Marisa', 'Duarte', 3000000, 30, 88211, '2018-05-06 17:40:29');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para vista nomina2018.empleadoviews
DROP VIEW IF EXISTS `empleadoviews`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `empleadoviews` (
	`nombreCompleto` VARCHAR(171) NOT NULL COLLATE 'latin1_swedish_ci',
	`cedula` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`DiaLaborado` FLOAT NOT NULL,
	`salario` FLOAT NOT NULL,
	`sueldoDevengado` DOUBLE NULL,
	`auxilioTransporte` DOUBLE NULL,
	`TOTALDEVENGADO` DOUBLE NULL,
	`Salud` DOUBLE NOT NULL,
	`Pension` DOUBLE NOT NULL,
	`totalDeducciones` DOUBLE NOT NULL,
	`sueldoNeto` DOUBLE NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista nomina2018.empleadoviews
DROP VIEW IF EXISTS `empleadoviews`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleadoviews`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empleadoviews` AS SELECT CONCAT(emp_nombre, ' ' ,emp_apellido) AS nombreCompleto , 
emp_cedula AS cedula ,
 emp_dialaborado AS DiaLaborado ,
 emp_salario AS salario,
 (emp_salario * emp_dialaborado)/30 AS sueldoDevengado,
 (emp_auxilioTransporte * emp_dialaborado) / 30 AS auxilioTransporte,
 (emp_auxilioTransporte * emp_dialaborado) / 30 + (emp_salario * emp_dialaborado)/30 AS TOTALDEVENGADO,
 emp_salario * 0.04 AS Salud,
 emp_salario * 0.04 AS Pension,
 (emp_salario * 0.04)*2 AS totalDeducciones,
 ((emp_auxilioTransporte * emp_dialaborado) / 30 + (emp_salario * emp_dialaborado)/30 ) - ( (emp_salario * 0.04)*2)  AS sueldoNeto
 from empleados ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
