-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 06-05-2021 a las 13:33:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Hombre', 'Tenis de hombre', '1.jpg'),
(2, 'Mujer', 'Tenis de mujer', '2.jpg'),
(3, 'Niños', 'Tenis de niños ', '3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `codigo`) VALUES
(1, 'negro', '#000000'),
(2, 'blanco', '#FFFFFF'),
(3, 'rojo', '#FF0000'),
(4, 'azul', '#0000FF'),
(5, 'verde', '#008f39'),
(6, 'naranja', '#ff8000'),
(7, 'rosado', '#ff0080'),
(8, 'celeste', '#00aae4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `fecha_vencimiento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id`, `codigo`, `estado`, `tipo`, `valor`, `fecha_vencimiento`) VALUES
(1, '6519', 'utilizado', 'moneda', '200', '2021-05-30'),
(2, '9115', 'Activo', 'porcentaje', '50', '2021-05-30'),
(3, '8447', 'Activo', 'moneda', '100', '2021-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `ciudad`, `direccion`, `estado`, `id_venta`) VALUES
(1, '7', 'Enrique Encinas', 'Cochabamba', 1),
(2, '2', 'Encinas', 'Cercado', 2),
(3, '2', 'Las Americas', 'Cercado', 4),
(4, '2', 'Enrique Encinas', 'Cercado', 5),
(5, '2', 'Enrique Encinas', 'Cercado', 6),
(6, '2', 'Enrique Encinas', 'Cercado', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `talla`, `color`) VALUES
(1, 'Air Jordan 1 High Co.Jp', 'Neutral Grey/Metallic Silver', 800, '1.jpg', 6, 1, '41', 'plomo'),
(2, 'Nike Dunk Low', 'City Market', 900, '2.jpg', 3, 2, '36', 'blanco'),
(3, 'Nike Dunk Low', 'University Red', 900, '3.jpg', 0, 3, '33', 'rojo'),
(4, 'Nike Air More Uptempo', 'Designed by Wilson Smith, worn by Scottie Pippen', 700, '4.jpg', 2, 1, '40', 'amarillo'),
(5, 'The Rhude x Vans Acer NI SP', 'Multicolor', 700, '5.jpg', 1, 2, '37', 'rosa'),
(6, 'The Supreme x Nike Air Force 1 Low', 'Box Logo - Black', 800, '6.jpg', 7, 3, '34', 'negro'),
(7, 'Air Jordan 1 High Royal', 'The most recent release of the \"Royal\"', 1000, '7.jpg', 5, 1, '41', 'azul'),
(8, 'Air Jordan 1 High Royal', 'The most recent release of the \"Royal\"', 1000, '7.jpg', 5, 2, '36', 'azul'),
(9, 'Air Jordan 1 High Royal', 'The most recent release of the \"Royal\"', 900, '7.jpg', 3, 3, '34', 'azul'),
(10, 'Air Jordan 1 Low “UNC”', 'Is the low-top version of Michael Jordan’s', 1200, '8.jpg', 5, 1, '40', 'azul'),
(11, 'Air Jordan 1 Low “UNC”', 'Is the low-top version of Michael Jordan’s', 1200, '8.jpg', 5, 1, '43', 'azul'),
(12, 'The Sean Wotherspoon x atmos x ASICS', 'Gel-Lyte III is a high-profile three-way collaboration between Wotherspoon', 1200, '9.jpg', 6, 2, '36', 'naranja'),
(13, 'Air Jordan 1 High “Hyper Royal”', 'is a breezy colorway of Michael Jordan’s \r\nEdicion Limitada', 1500, '10.jpg', 10, 1, '42', 'celeste'),
(14, 'Air Jordan 1 High “Hyper Royal”', 'Is a breezy colorway of Michael Jordan’s\r\nEdicion Limitada ', 1500, '10.jpg', 7, 2, '36', 'celeste'),
(15, 'Air Jordan 5 “Raging Bull 2021”', 'Is the first-ever standalone release of one of the most popular non-original Air Jordan colorways', 700, '11.jpg', 2, 3, '33', 'naranja'),
(16, 'Nike Dunk Low Retro “Champ Colors”', 'Is a special colorway dedicated to the 2019 Men’s NCAA', 800, '12.jpg', 5, 2, '36', 'naranja'),
(17, 'Nike Dunk Low Retro “Champ Colors”', 'Is a special colorway dedicated to the 2019 Men’s NCAA', 800, '12.jpg', 4, 1, '40', 'naranja'),
(18, 'Nike Dunk Low Retro “Champ Colors”', 'Is a special colorway dedicated to the 2019 Men’s NCAA', 1000, '12.jpg', 3, 3, '34', 'naranja'),
(19, 'Air Jordan 4 “Taupe Haze”', 'Is a lifestyle colorway of Michael Jordan’s', 500, '13.jpg', 4, 1, '41', 'plomo'),
(20, 'The Wasted Youth x Nike SB Dunk Low', 'Is a punk inspired collaboration between streetwear designer Verdy and Nike SB', 900, '14.jpg', 3, 2, '36', 'negro'),
(21, 'The Wasted Youth x Nike SB Dunk Low', 'Is a punk inspired collaboration between streetwear designer Verdy and Nike SB', 900, '14.jpg', 6, 3, '33', 'negro'),
(22, 'Nike Dunk Low “Hyper Cobalt”', 'Is a February 2021 release of the all-time classic', 700, '15.jpg', 1, 1, '43', 'azul'),
(23, 'Nike SB Dunk Low “Pink Pig”', 'Is a February 2021 colorway that is inspired by the Porsche', 1000, '16.jpg', 3, 2, '36', 'rosado'),
(24, 'The Nike SB Dunk Low “Pink Pig”', 'Is a February 2021 colorway that is inspired by the Porsche', 1000, '16.jpg', 2, 2, '35', 'rosado'),
(25, 'Adidas Yeezy 700 V3', 'This debut colorway of the Yeezy 700 V3 for adidas', 800, '17.jpg', 5, 1, '41', 'blanco'),
(26, 'Adidas Yeezy 700 V3', 'This debut colorway of the Yeezy 700 V3', 900, '17.jpg', 5, 2, '36', 'blanco'),
(27, 'Adidas Yeezy 700 V3', 'This debut colorway of the Yeezy 700 V3  for adidas', 900, '17.jpg', 8, 3, '33', 'blanco'),
(28, 'Travis Scott x Nike Air Max 270 React “Cactus Trails”', 'Is another of the chart topping rapper\'s coveted releases with Nike', 800, '21.jpg', 9, 1, '43', 'amarillo'),
(29, 'Travis Scott x Nike Air Max 270 React “Cactus Trails”', 'Is another of the chart topping rapper\'s coveted releases with Nike', 800, '21.jpg', 5, 2, '36', 'amarillo'),
(30, 'Travis Scott x Nike Air Max 270 React “Cactus Trails”', 'Is another of the chart topping rapper\'s coveted releases with Nike', 900, '21.jpg', 5, 3, '33', 'amarillo'),
(31, 'Nike Air Max 97', 'edicion limitada', 1200, 'air.jpg', 5, 1, '41', 'Negro'),
(32, 'Yeezy 350', 'Adidas', 800, '28.jpg', 10, 2, '36', 'amarillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 1, 1, 1, 800, 800),
(2, 2, 1, 1, 800, 800),
(3, 3, 1, 1, 800, 800),
(4, 3, 2, 1, 900, 900),
(5, 4, 1, 1, 800, 800),
(6, 4, 2, 1, 900, 900),
(7, 4, 3, 1, 900, 900),
(8, 5, 3, 2, 900, 1800),
(9, 6, 5, 1, 700, 700),
(10, 7, 4, 1, 700, 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_perfil` varchar(300) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `password`, `img_perfil`, `nivel`) VALUES
(1, 'Alejandro Jhunior', '75992711', 'aleoilos10@gmail.com', '1c57cd3a09db4131c7baef5fe35c1da3715fdba4', 'jhunior.jpg', 'admin'),
(2, 'Danitza Benitez', '75911112', 'dani10@gmail.com', '62e3bd77a71c0cd20ad74c1a6ea3af5cacdc7949', '', 'cliente'),
(3, 'Felix Mamani', '76543211', 'felix10@gmail.com', 'aebd14ca679f1fae02418b71c30ce622d658369a', '', 'cliente'),
(4, 'Moises Cuizara', '76541111', 'moi10@gmail.com', '421d4ba1a4f61ea28e4b693b273dc1eca6869b54', '', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_cupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`, `status`, `id_pago`, `id_cupon`) VALUES
(1, 1, 800, '2021-05-05 10:05:26', 'Espera', 0, 0),
(2, 2, 800, '2021-05-05 10:05:46', '', 0, 0),
(3, 3, 1700, '2021-05-05 10:05:55', '', 0, 0),
(4, 4, 2600, '2021-05-05 15:05:09', '', 0, 1),
(5, 1, 1800, '2021-05-06 06:05:32', '', 0, 0),
(6, 3, 700, '2021-05-06 06:05:32', '', 0, 0),
(7, 1, 700, '2021-05-06 05:05:55', '', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
