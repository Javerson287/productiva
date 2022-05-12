-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 01:19:19
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sena`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id17297349_tipkey`@`%` PROCEDURE `disponibilidad2` (IN `fecha` DATE, IN `fecha_f` DATE, IN `hi` TIME, IN `hf` TIME, IN `a` INT, IN `l` INT(2), IN `ma` INT(2), IN `mi` INT(2), IN `j` INT(2), IN `v` INT(2), IN `s` INT(2), IN `d` INT(2))  BEGIN
    SELECT * FROM prestamo_ambientes WHERE 
        (
            (
        
            
            	fecha BETWEEN fecha_inicio AND fecha_fin OR
            	fecha_f BETWEEN fecha_inicio AND fecha_fin OR
            	fecha_inicio BETWEEN fecha AND fecha_f
            )
            AND(
            hi BETWEEN hora_inicio AND hora_fin OR
            hf BETWEEN hora_inicio AND hora_fin OR
            hora_inicio BETWEEN hi AND hf
            )
        )
        
        AND a=id_ambiente
        AND (l= lunes
        AND ma=martes
        AND mi=miercoles
        AND j=jueves
        AND v=viernes
        AND s=domingo
        AND d=domingo);
        END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_ambiente` int(11) NOT NULL,
  `n_ambiente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_piso` int(11) NOT NULL,
  `borrar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `n_ambiente`, `id_piso`, `borrar`) VALUES
(1, 'sonasl', 1, 0),
(2, 'prueba3', 2, 0),
(3, 'piso j', 3, 0),
(4, 'piso 22', 3, 0),
(5, 'ambiente23', 5, 0),
(6, 'sis', 3, 1),
(7, 'ambiente 1', 6, 1),
(8, 'ambiented', 6, 0),
(9, 'ambiete 2', 7, 0),
(10, 'Sistemas 10', 8, 0),
(11, 'ambiente 30', 9, 0),
(12, 'ambiente sos', 10, 0),
(13, 'eliminar', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `id_bloque` int(11) NOT NULL,
  `n_bloque` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_sede` int(11) NOT NULL,
  `borrar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`id_bloque`, `n_bloque`, `id_sede`, `borrar`) VALUES
(1, 'sas', 2, 0),
(2, 'prueba1', 3, 0),
(3, 'bloque 2 pis', 2, 0),
(4, 'Bloque 100', 4, 0),
(5, 'bloque 1', 5, 0),
(6, 'bloque 1', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencicas`
--

CREATE TABLE `competencicas` (
  `id_competencia` int(11) NOT NULL,
  `competencia` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `competencicas`
--

INSERT INTO `competencicas` (`id_competencia`, `competencia`) VALUES
(2, 'PROMOVER LA INTERACCIÓN IDÓNEA CONSIGO MISMO, CON LOS DEMÁS Y CON LA NATURALEZA EN LOS CONTEXTOS LABORAL Y SOCIAL'),
(23, 'liola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `fase_proyecto` varchar(70) NOT NULL,
  `id_fase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`fase_proyecto`, `id_fase`) VALUES
('evaluar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `documento` int(15) NOT NULL,
  `n_instructor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `borrar` int(2) NOT NULL,
  `id_profesiones` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`documento`, `n_instructor`, `borrar`, `id_profesiones`) VALUES
(48, 'noe patricio', 0, 1),
(1045, 'lola josefa', 0, 1),
(123434, 'José Antonio ', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `n_nivel` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `n_nivel`) VALUES
(1, 'tecnologo'),
(2, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `id_piso` int(11) NOT NULL,
  `n_piso` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `borrar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`id_piso`, `n_piso`, `id_bloque`, `borrar`) VALUES
(1, 'auto', 1, 1),
(2, 'prueba2', 2, 0),
(3, 'piso 2', 1, 0),
(4, 'piso 2', 1, 1),
(5, 'pido', 1, 0),
(6, 'piso 1a', 3, 0),
(7, 'piso 2 a', 3, 0),
(8, 'Piso 1', 4, 0),
(9, 'piso 1', 5, 0),
(10, 'piso 1', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_ambientes`
--

CREATE TABLE `prestamo_ambientes` (
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ambiente` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `ficha` int(11) NOT NULL,
  `documento` int(15) NOT NULL,
  `lunes` int(2) NOT NULL,
  `martes` int(2) NOT NULL,
  `miercoles` int(2) NOT NULL,
  `jueves` int(2) NOT NULL,
  `viernes` int(2) NOT NULL,
  `sabado` int(2) NOT NULL,
  `domingo` int(2) NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_resultado` int(11) NOT NULL,
  `id_fase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prestamo_ambientes`
--

INSERT INTO `prestamo_ambientes` (`fecha_registro`, `id_ambiente`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `ficha`, `documento`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `id_competencia`, `id_producto`, `id_resultado`, `id_fase`) VALUES
('2022-05-04 20:18:22', 7, '2021-09-19', '2021-09-30', '06:03:45', '08:00:00', 9090, 1045, 1, 0, 1, 0, 1, 0, 0, 23, 10, 12, 1),
('2022-05-04 22:11:07', 1, '2022-05-04', '2022-05-10', '04:00:00', '16:00:00', 100452, 1045, 1, 0, 0, 0, 1, 0, 1, 2, 10, 12, 1),
('2022-05-04 22:11:21', 1, '2022-05-04', '2022-05-10', '04:00:00', '16:00:00', 100452, 1045, 1, 0, 0, 0, 1, 0, 1, 2, 10, 12, 1),
('2022-05-04 22:13:25', 1, '2022-05-26', '2022-05-31', '13:00:00', '19:00:00', 100452, 1045, 1, 0, 1, 0, 1, 1, 1, 2, 10, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_fase`
--

CREATE TABLE `producto_fase` (
  `producto` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_fase`
--

INSERT INTO `producto_fase` (`producto`, `id_producto`) VALUES
('confesar', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `n_profesiones` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_profesiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`n_profesiones`, `id_profesiones`) VALUES
('loco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `ficha` int(15) NOT NULL,
  `n_programa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_aprendizes` int(5) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `borrar` int(2) NOT NULL,
  `t_formacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`ficha`, `n_programa`, `cantidad_aprendizes`, `id_nivel`, `borrar`, `t_formacion`) VALUES
(2134, 'cocina', 14, 1, 1, 'mañana'),
(9090, 'lol', 15, 1, 1, 'tarde'),
(100452, 'enfermeria', 10, 1, 1, 'mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_inst`
--

CREATE TABLE `prog_inst` (
  `ficha` int(15) NOT NULL,
  `documento` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prog_inst`
--

INSERT INTO `prog_inst` (`ficha`, `documento`) VALUES
(9090, 1045),
(100452, 1045);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id_prueba` int(11) NOT NULL,
  `TIPO_FORMACION` varchar(20) DEFAULT NULL,
  `FICHA` int(11) DEFAULT NULL,
  `N_PROGRAMA` varchar(50) DEFAULT NULL,
  `FASE_PROYECTO` varchar(20) DEFAULT NULL,
  `PRODUCTO_FASE` varchar(100) DEFAULT NULL,
  `ID_COMPETENCIA` int(11) DEFAULT NULL,
  `HORA_COMPETENCIA` int(11) DEFAULT NULL,
  `ID_rap` int(11) DEFAULT NULL,
  `hora_RAP` int(11) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `INSTRUCTOR` varchar(50) DEFAULT NULL,
  `PERFIL_INSTRUCTOR` varchar(50) DEFAULT NULL,
  `LUGAR` varchar(50) DEFAULT NULL,
  `HORA_NICIO` time DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL,
  `HORA` time DEFAULT NULL,
  `LUN` varchar(20) DEFAULT NULL,
  `MAR` varchar(20) DEFAULT NULL,
  `MIE` varchar(20) DEFAULT NULL,
  `JUE` varchar(20) DEFAULT NULL,
  `VIE` varchar(20) DEFAULT NULL,
  `SAB` varchar(20) DEFAULT NULL,
  `DOM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba`
--

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `resultado_aprenizaje`
--

CREATE TABLE `resultado_aprenizaje` (
  `id_competencia` int(11) NOT NULL,
  `id_resultado` int(11) NOT NULL,
  `resultado_aprenizaje` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultado_aprenizaje`
--

INSERT INTO `resultado_aprenizaje` (`id_competencia`, `id_resultado`, `resultado_aprenizaje`) VALUES
(23, 12, 'llevar pan a el sena'),
(2, 253528, 'APLICAR TÉCNICAS DE CULTURA FÍSICA PARA EL MEJORAMIENTO DE SU EXPRESIÓN CORPORAL, DESEMPEÑO LABORAL SEGÚN LA NATURALEZA Y COMPLEJIDAD DEL ÁREA OCUPACIONAL.'),
(2, 253529, ' ASUMIR RESPONSABLEMENTE LOS CRITERIOS DE PRESERVACIÓN Y CONSERVACIÓN DEL MEDIO AMBIENTE Y DE DESARROLLO SOSTENIBLE, EN EL EJERCICIO DE SU DESEMPEÑO LABORAL Y SOCIAL.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `n_sede` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `borrar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `n_sede`, `borrar`) VALUES
(1, 'Modelos', 0),
(2, 'Pista', 0),
(3, 'prueba', 1),
(4, 'kkkk', 1),
(5, 'TRIUNFO 2', 0),
(78, 'ñoño', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_formacion`
--

CREATE TABLE `tipo_formacion` (
  `t_formacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_formacion`
--

INSERT INTO `tipo_formacion` (`t_formacion`) VALUES
('mañana'),
('tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `clave`, `correo`, `nombre_usuario`) VALUES
(1, '12345', 'javerson287@gmail.com', 'javerson'),
(2, '12345', 'damh1006@gmail.com', 'diego');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id_ambiente`),
  ADD KEY `ambiente` (`id_piso`);

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`id_bloque`),
  ADD KEY `bloque` (`id_sede`);

--
-- Indices de la tabla `competencicas`
--
ALTER TABLE `competencicas`
  ADD PRIMARY KEY (`id_competencia`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id_fase`),
  ADD KEY `fase_proyecto` (`fase_proyecto`),
  ADD KEY `fase_proyecto_2` (`fase_proyecto`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_profesiones` (`id_profesiones`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`id_piso`),
  ADD KEY `piso` (`id_bloque`);

--
-- Indices de la tabla `prestamo_ambientes`
--
ALTER TABLE `prestamo_ambientes`
  ADD PRIMARY KEY (`fecha_registro`),
  ADD KEY `prestamo_4` (`id_ambiente`),
  ADD KEY `prestamo_5` (`ficha`),
  ADD KEY `documento` (`documento`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_competencia` (`id_competencia`),
  ADD KEY `id_fase` (`id_fase`),
  ADD KEY `id_resultado` (`id_resultado`);

--
-- Indices de la tabla `producto_fase`
--
ALTER TABLE `producto_fase`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id_profesiones`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`ficha`),
  ADD KEY `programas1` (`id_nivel`),
  ADD KEY `programas` (`t_formacion`);

--
-- Indices de la tabla `prog_inst`
--
ALTER TABLE `prog_inst`
  ADD PRIMARY KEY (`ficha`,`documento`),
  ADD KEY `prog_inst` (`documento`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id_prueba`);

--
-- Indices de la tabla `resultado_aprenizaje`
--
ALTER TABLE `resultado_aprenizaje`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_competencia` (`id_competencia`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `tipo_formacion`
--
ALTER TABLE `tipo_formacion`
  ADD PRIMARY KEY (`t_formacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `bloque`
--
ALTER TABLE `bloque`
  MODIFY `id_bloque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto_fase`
--
ALTER TABLE `producto_fase`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id_profesiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente` FOREIGN KEY (`id_piso`) REFERENCES `piso` (`id_piso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD CONSTRAINT `bloque` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD CONSTRAINT `id_profesiones` FOREIGN KEY (`id_profesiones`) REFERENCES `profesiones` (`id_profesiones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `piso` FOREIGN KEY (`id_bloque`) REFERENCES `bloque` (`id_bloque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo_ambientes`
--
ALTER TABLE `prestamo_ambientes`
  ADD CONSTRAINT `prestamo_4` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_5` FOREIGN KEY (`ficha`) REFERENCES `programas` (`ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ambientes_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `instructores` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ambientes_ibfk_2` FOREIGN KEY (`id_fase`) REFERENCES `fase` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ambientes_ibfk_3` FOREIGN KEY (`id_competencia`) REFERENCES `competencicas` (`id_competencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ambientes_ibfk_4` FOREIGN KEY (`id_resultado`) REFERENCES `resultado_aprenizaje` (`id_resultado`),
  ADD CONSTRAINT `prestamo_ambientes_ibfk_5` FOREIGN KEY (`id_producto`) REFERENCES `producto_fase` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas` FOREIGN KEY (`t_formacion`) REFERENCES `tipo_formacion` (`t_formacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `programas1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prog_inst`
--
ALTER TABLE `prog_inst`
  ADD CONSTRAINT `prog_inst` FOREIGN KEY (`documento`) REFERENCES `instructores` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prog_inst1` FOREIGN KEY (`ficha`) REFERENCES `programas` (`ficha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultado_aprenizaje`
--
ALTER TABLE `resultado_aprenizaje`
  ADD CONSTRAINT `resultado_aprenizaje_ibfk_1` FOREIGN KEY (`id_competencia`) REFERENCES `competencicas` (`id_competencia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
