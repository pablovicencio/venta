-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 23:18:17
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `fono_cli` varchar(10) DEFAULT NULL,
  `dir_cli` varchar(150) DEFAULT NULL,
  `modelo_veh_cli` varchar(45) DEFAULT NULL,
  `patente_veh_cli` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `patente_veh_cli` (`patente_veh_cli`),
  KEY `fk_marca_cli` (`marca_veh_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `nom_cli`, `mail_cli`, `marca_veh_cli`, `anio_veh_cli`, `km_act_cli`, `fono_cli`, `dir_cli`, `modelo_veh_cli`, `patente_veh_cli`) VALUES
(1, 'TONY STARK', 'TONY.STARK@GMAIL.COM', 1, 2018, 50000, '9966343838', 'torre avengers', 'ROADSTER', 'aa1122'),
(2, 'bruce wayne', 'batbruce@gmail.com', 1, 2021, 10000, '996643636', NULL, 'model a', '113344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_barra_prod`
--

DROP TABLE IF EXISTS `cod_barra_prod`;
CREATE TABLE IF NOT EXISTS `cod_barra_prod` (
  `id_cod_barra` int(11) NOT NULL AUTO_INCREMENT,
  `cod_barra` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vig_cod` int(11) NOT NULL DEFAULT '1',
  `id_prod_cod_barra` int(11) NOT NULL,
  PRIMARY KEY (`id_cod_barra`),
  UNIQUE KEY `cod_barra_UNIQUE` (`cod_barra`),
  KEY `fk_id_prod_cod_barra_idx` (`id_prod_cod_barra`),
  KEY `idx_cod_barra_prod` (`cod_barra`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cod_barra_prod`
--

INSERT INTO `cod_barra_prod` (`id_cod_barra`, `cod_barra`, `vig_cod`, `id_prod_cod_barra`) VALUES
(1, '7805918130404', 1, 1),
(3, '22883994', 1, 1),
(4, '115588', 1, 1),
(5, '223366', 1, 1),
(6, '334455', 1, 1),
(9, '1122111', 1, 1),
(13, '11221112', 1, 1),
(14, '1122', 1, 1),
(15, '11434', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_venta`
--

INSERT INTO `det_venta` (`id_det_venta`, `id_prod_det_venta`, `cant_dventa`, `precio_uni_dventa`, `precio_total_dventa`, `id_cab_venta`) VALUES
(1, 1, 2, 26168, 52336, 4),
(2, 1, 2, 26168, 52336, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas_veh`
--

INSERT INTO `marcas_veh` (`id_marca`, `nom_marca`) VALUES
(1, 'Tesla');

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
  `cod_barra_prod` varchar(45) DEFAULT NULL,
  `familia_prod` int(11) DEFAULT NULL,
  `marca_prod` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `COD_PRODUCTO` (`id_prod`),
  KEY `COD_PRODUCTO_2` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nom_prod`, `uni_med_pro`, `stock_min_prod`, `stock_prod`, `vig_prod`, `fec_cre_prod`, `usu_cre_prod`, `precio_bruto_prod`, `iva_prod`, `proc_ganan_prod`, `precio_neto_prod`, `id_prov_prod`, `embalaje_prod`, `cod_barra_prod`, `familia_prod`, `marca_prod`) VALUES
(1, 'Helix 5W30 HX8 AG 4L', 2, 3, 6, 1, '2020-05-17 18:25:26', 1, 26168, 4178, 35, 21990, 1, 4, '21400055315', 1, 'Shell');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_PROV`, `NOM_PROV`, `DESC_PROV`, `FONO`, `MAIL`, `VIGENCIA`, `USU_CRE`, `FEC_CRE`, `PAGINA_WEB`) VALUES
(1, 'Christian Hughes y cia Ltda.', 'Lubricantes y accesorios', '994480505', 'flubiano@chughes.cl', '1', '1', '2020-05-17 18:24:31', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tab_param`
--

INSERT INTO `tab_param` (`id_param`, `cod_grupo`, `cod_item`, `desc_item`, `vig_item`) VALUES
(1, 1, 0, 'Unidades de Medidas', 1),
(2, 1, 2, 'Litros', 1),
(3, 1, 3, 'Unidad', 1),
(4, 2, 0, 'Familia', 1),
(5, 2, 1, 'Aceite', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vig_usu` int(11) NOT NULL,
  `nick_usu` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usu` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usu` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usu`),
  UNIQUE KEY `nick_usu_idx` (`nick_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nom_usu`, `vig_usu`, `nick_usu`, `pass_usu`, `correo_usu`) VALUES
(1, 'test pablo', 1, 'pablo', 'e10adc3949ba59abbe56e057f20f883e', 'pvicencio@hotmail.cl');

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
  `tipo_doc_venta` int(11) DEFAULT NULL,
  `num_doc_venta` int(11) DEFAULT NULL,
  `usu_venta` int(11) DEFAULT NULL,
  `usu_anu_venta` int(11) DEFAULT NULL,
  `obs_anu_venta` varchar(200) DEFAULT NULL,
  `fec_anu_venta` datetime DEFAULT NULL,
  `obs_venta` varchar(200) DEFAULT NULL,
  `id_cli_venta` int(11) DEFAULT NULL,
  `km_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `ID_VENTA` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fec_venta`, `est_venta`, `precio_total_venta`, `tipo_doc_venta`, `num_doc_venta`, `usu_venta`, `usu_anu_venta`, `obs_anu_venta`, `fec_anu_venta`, `obs_venta`, `id_cli_venta`, `km_venta`) VALUES
(1, '2020-05-21 11:05:04', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'TEST OBS VENTA', NULL, 0),
(2, '2020-05-21 11:05:13', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'TEST OBS VENTA', NULL, 0),
(3, '2020-05-21 11:05:52', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 30000),
(4, '2020-05-21 11:05:57', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 30000),
(5, '2020-05-21 11:05:06', 1, 52336, NULL, NULL, NULL, NULL, NULL, NULL, 'OBS_TEST', 1, 50000);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_marca_cli` FOREIGN KEY (`marca_veh_cli`) REFERENCES `marcas_veh` (`id_marca`);

--
-- Filtros para la tabla `cod_barra_prod`
--
ALTER TABLE `cod_barra_prod`
  ADD CONSTRAINT `fk_id_prod_cod_barra` FOREIGN KEY (`id_prod_cod_barra`) REFERENCES `producto` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
