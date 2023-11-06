-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 11:36:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idpelicula` int(11) NOT NULL,
  `pelicula` varchar(30) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `anio` int(4) NOT NULL,
  `disponible` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idpelicula`, `pelicula`, `genero`, `anio`, `disponible`) VALUES
(2, 'Dune', 'Ciencia ficcion', 2021, 3),
(3, 'La vida de Brian', 'Comedia', 1979, 3),
(10, 'Contacto', 'Ciencia ficcion', 1997, 3),
(11, 'Interestelar', 'Ciencia ficcion', 2014, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` int(4) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`, `admin`) VALUES
(3, 'claudia', 1111, 1),
(4, 'mario', 9999, 0),
(5, 'mateo', 1234, 0),
(7, 'cometa', 2112, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_peliculas`
--

CREATE TABLE `usuarios_peliculas` (
  `fidusuario` int(2) NOT NULL,
  `fidpelicula` int(2) NOT NULL,
  `alquilada` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_peliculas`
--

INSERT INTO `usuarios_peliculas` (`fidusuario`, `fidpelicula`, `alquilada`) VALUES
(7, 3, 0),
(3, 3, 0),
(3, 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idpelicula`),
  ADD UNIQUE KEY `idpelicula` (`idpelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios_peliculas`
--
ALTER TABLE `usuarios_peliculas`
  ADD KEY `fidusuario` (`fidusuario`,`fidpelicula`),
  ADD KEY `fidpelicula` (`fidpelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idpelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios_peliculas`
--
ALTER TABLE `usuarios_peliculas`
  ADD CONSTRAINT `usuarios_peliculas_ibfk_1` FOREIGN KEY (`fidusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_peliculas_ibfk_2` FOREIGN KEY (`fidpelicula`) REFERENCES `peliculas` (`idpelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
