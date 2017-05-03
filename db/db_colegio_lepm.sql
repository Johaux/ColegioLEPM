-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2017 a las 06:48:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_colegio_lepm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `Id_Calificación` int(11) NOT NULL,
  `Nota1` float DEFAULT NULL,
  `Nota2` float DEFAULT NULL,
  `Nota3` float DEFAULT NULL,
  `Nota4` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Habilitacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Id_Curso` int(11) NOT NULL,
  `Nombre_Curso` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `Id_Docente` int(11) NOT NULL,
  `Documento_Identidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Tipo_Documento` int(11) NOT NULL,
  `Nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Id_Grado` int(11) NOT NULL,
  `Id_Tipo_Usuario` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `E_Mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `IdEstudiante` int(11) NOT NULL,
  `Documento_Identidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Tipo_Documento` int(20) NOT NULL,
  `Nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Requiere primer y segundo Nombre',
  `Apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Requiere primer y segundo Apellido',
  `Dirección` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Grado_Escolaridad` int(11) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Id_Tipo_Usuario` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Asegurar al usuario condiciones de contraseña'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para registro de los estudiantes del colegio LEPM';

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`IdEstudiante`, `Documento_Identidad`, `Id_Tipo_Documento`, `Nombres`, `Apellidos`, `Dirección`, `Id_Grado_Escolaridad`, `Fecha_Nacimiento`, `Id_Tipo_Usuario`, `Usuario`, `Password`) VALUES
(1, '1035224699', 1, 'Johan', 'Gonzalez', 'Cl 32', 1, '2017-05-02', 1, 'johaux', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_escolar`
--

CREATE TABLE `grado_escolar` (
  `Id_Grado_Escolar` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `Id_Jornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `Id_Jornada` int(11) NOT NULL,
  `Jornada` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `Id_Tipo_Documento` int(11) NOT NULL,
  `Tipo_Documento` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`Id_Tipo_Documento`, `Tipo_Documento`) VALUES
(1, 'CC'),
(2, 'TI'),
(3, 'CE'),
(4, 'PASS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id_Tipo_Usuario` int(11) NOT NULL,
  `Tipo_Usuario` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id_Tipo_Usuario`, `Tipo_Usuario`) VALUES
(1, 'SU'),
(2, 'DOC'),
(3, 'ADM'),
(4, 'ALUMN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`Id_Calificación`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Id_Curso`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`Id_Docente`),
  ADD KEY `FK_Tipo_Usuario_Docentes` (`Id_Tipo_Usuario`),
  ADD KEY `FK_Tipo_Documento_Docentes` (`Id_Tipo_Documento`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`IdEstudiante`),
  ADD KEY `FK_Tipo_Documento` (`Id_Tipo_Documento`),
  ADD KEY `FK_Tipo_Usuario` (`Id_Tipo_Usuario`);

--
-- Indices de la tabla `grado_escolar`
--
ALTER TABLE `grado_escolar`
  ADD PRIMARY KEY (`Id_Grado_Escolar`),
  ADD KEY `FK_Grado_Jornada` (`Id_Jornada`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`Id_Jornada`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`Id_Tipo_Documento`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id_Tipo_Usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `Id_Calificación` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Id_Curso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `Id_Docente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `grado_escolar`
--
ALTER TABLE `grado_escolar`
  MODIFY `Id_Grado_Escolar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `Id_Jornada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `Id_Tipo_Documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id_Tipo_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `FK_Tipo_Documento_Docentes` FOREIGN KEY (`Id_Tipo_Documento`) REFERENCES `tipo_documento` (`Id_Tipo_Documento`),
  ADD CONSTRAINT `FK_Tipo_Usuario_Docentes` FOREIGN KEY (`Id_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Id_Tipo_Usuario`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `FK_Tipo_Documento` FOREIGN KEY (`Id_Tipo_Documento`) REFERENCES `tipo_documento` (`Id_Tipo_Documento`),
  ADD CONSTRAINT `FK_Tipo_Usuario` FOREIGN KEY (`Id_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Id_Tipo_Usuario`);

--
-- Filtros para la tabla `grado_escolar`
--
ALTER TABLE `grado_escolar`
  ADD CONSTRAINT `FK_Grado_Jornada` FOREIGN KEY (`Id_Jornada`) REFERENCES `jornadas` (`Id_Jornada`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
