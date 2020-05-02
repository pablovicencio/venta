-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-05-2020 a las 19:53:06
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(150) DEFAULT NULL,
  `mail_cli` varchar(100) DEFAULT NULL,
  `marca_veh_cli` int(11) DEFAULT NULL,
  `anio_veh_cli` int(11) DEFAULT NULL,
  `km_act_cli` int(11) DEFAULT NULL,
  `fono_cli` int(11) DEFAULT NULL,
  `dir_cli` varchar(150) DEFAULT NULL,
  `modelo_veh_cli` varchar(45) DEFAULT NULL,
  `patente_veh_cli` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_cli`),
  KEY `fk_marca_cli` (`marca_veh_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ingreso`
--

DROP TABLE IF EXISTS `det_ingreso`;
CREATE TABLE IF NOT EXISTS `det_ingreso` (
  `id_det_ing` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod_ing` int(11) NOT NULL,
  `cant_ing` int(11) NOT NULL,
  `precio_unit_ing` int(11) NOT NULL,
  `precio_total_ing` int(11) NOT NULL,
  `prov_prod_ing` int(11) NOT NULL,
  `id_cab_ing` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_ing`),
  KEY `fk_ing_det_idx` (`id_cab_ing`),
  KEY `fk_ing_prod_idx` (`id_prod_ing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

DROP TABLE IF EXISTS `det_venta`;
CREATE TABLE IF NOT EXISTS `det_venta` (
  `id_det_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod_det_venta` int(11) NOT NULL,
  `cant_dventa` int(11) NOT NULL,
  `precio_uni_dventa` int(11) NOT NULL,
  `precio_total_dventa` int(11) NOT NULL,
  `id_cab_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_venta`),
  KEY `fk_venta_det_idx` (`id_cab_venta`),
  KEY `fk_venta_prod_idx` (`id_prod_det_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ing` int(11) NOT NULL AUTO_INCREMENT,
  `fec_ing` datetime NOT NULL,
  `est_ing` varchar(1) NOT NULL,
  `costo_total_ing` int(11) NOT NULL,
  `tipo_doc_ing` int(11) NOT NULL,
  `num_doc_ing` int(11) NOT NULL,
  `usu_ing` int(11) NOT NULL,
  `usu_anu_ing` int(11) NOT NULL,
  `obs_anu_ing` varchar(200) NOT NULL,
  `fec_anu_ing` datetime NOT NULL,
  PRIMARY KEY (`id_ing`),
  KEY `ID_INGRESO` (`id_ing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_veh`
--

DROP TABLE IF EXISTS `marcas_veh`;
CREATE TABLE IF NOT EXISTS `marcas_veh` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marca` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prod` varchar(200) NOT NULL,
  `uni_med_pro` int(11) NOT NULL,
  `stock_min_prod` int(11) NOT NULL,
  `stock_prod` int(11) NOT NULL,
  `vig_prod` int(11) NOT NULL,
  `fec_cre_prod` datetime NOT NULL,
  `usu_cre_prod` int(11) NOT NULL,
  `precio_bruto_prod` int(11) NOT NULL,
  `iva_prod` int(11) NOT NULL,
  `proc_ganan_prod` int(11) NOT NULL,
  `precio_neto_prod` int(11) NOT NULL,
  `id_prov_prod` int(11) DEFAULT NULL,
  `embalaje_prod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `COD_PRODUCTO` (`id_prod`),
  KEY `COD_PRODUCTO_2` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `ID_PROV` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PROV` varchar(100) NOT NULL,
  `DESC_PROV` varchar(200) NOT NULL,
  `FONO` varchar(10) NOT NULL,
  `MAIL` varchar(50) NOT NULL,
  `VIGENCIA` varchar(1) NOT NULL,
  `USU_CRE` varchar(8) NOT NULL,
  `FEC_CRE` datetime NOT NULL,
  `PAGINA_WEB` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_PROV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_param`
--

DROP TABLE IF EXISTS `tab_param`;
CREATE TABLE IF NOT EXISTS `tab_param` (
  `id_param` int(11) NOT NULL AUTO_INCREMENT,
  `cod_grupo` int(11) DEFAULT NULL,
  `cod_item` int(11) DEFAULT NULL,
  `desc_item` varchar(80) DEFAULT NULL,
  `vig_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fec_venta` datetime NOT NULL,
  `est_venta` int(11) NOT NULL,
  `precio_total_venta` int(11) NOT NULL,
  `tipo_doc_venta` int(11) NOT NULL,
  `num_doc_venta` int(11) NOT NULL,
  `usu_venta` int(11) DEFAULT NULL,
  `usu_anu_venta` int(11) DEFAULT NULL,
  `obs_anu_venta` varchar(200) DEFAULT NULL,
  `fec_anu_venta` datetime DEFAULT NULL,
  `obs_venta` varchar(200) DEFAULT NULL,
  `id_cli_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `ID_VENTA` (`id_venta`),
  KEY `fk_venta_cli_idx` (`id_cli_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_marca_cli` FOREIGN KEY (`marca_veh_cli`) REFERENCES `marcas_veh` (`id_marca`);

--
-- Filtros para la tabla `det_ingreso`
--
ALTER TABLE `det_ingreso`
  ADD CONSTRAINT `fk_ing_det` FOREIGN KEY (`id_cab_ing`) REFERENCES `ingreso` (`id_ing`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ing_prod` FOREIGN KEY (`id_prod_ing`) REFERENCES `producto` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `fk_venta_det` FOREIGN KEY (`id_cab_venta`) REFERENCES `venta` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_prod` FOREIGN KEY (`id_prod_det_venta`) REFERENCES `producto` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cli` FOREIGN KEY (`id_cli_venta`) REFERENCES `clientes` (`id_cli`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
