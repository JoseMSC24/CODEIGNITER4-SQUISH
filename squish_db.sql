-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 07:51:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `squish_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-05-19-215545', 'App\\Database\\Migrations\\CreateProductsTable', 'default', 'App', 1716155899, 1),
(2, '2024-05-19-224332', 'App\\Database\\Migrations\\AddImageToProducts', 'default', 'App', 1716158676, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Squishmallow Unicornio Rosa', 'Peluche Squishmallow de unicornio rosa, suave y esponjoso.', 19.99, 'ruta/imagen/unicornio_rosa.jpg'),
(2, 'Squishmallow Panda Negro y Blanco', 'Peluche Squishmallow de panda negro y blanco, adorable y abrazable.', 24.99, 'ruta/imagen/panda_negro_blanco.jpg'),
(3, 'Squishmallow Pulpo Azul', 'Peluche Squishmallow de pulpo azul, con tentáculos suaves y coloridos.', 16.99, 'ruta/imagen/pulpo_azul.jpg'),
(4, 'Squishmallow Perro Labrador Dorado', 'Peluche Squishmallow de perro labrador dorado, perfecto para abrazar.', 21.99, 'ruta/imagen/perro_labrador_dorado.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Arilla', 'Color: Verde. Es un armadillo', 899.00, '2024-05-19 16:13:38', '2024-05-19 16:13:38', '/images/Arilla.jpg'),
(2, 'Fifi', 'Color: Rojo, blanco y amarillo. Es un zorro con diadema.', 899.00, '2024-05-19 16:13:38', '2024-05-19 16:13:38', '/images/Fifi.jpg'),
(3, 'Leonard', 'Color: Multicolor. Es un león con melena multicolor.', 899.00, '2024-05-19 16:13:38', '2024-05-19 16:13:38', '/images/Leonard.jpg'),
(4, 'Gordon', 'Color: Gris. Es un tiburón con moño.', 899.00, '2024-05-31 01:52:14', '2024-05-31 01:52:14', '/images/Gordon.jpg\n                                                                                                        '),
(5, 'Gracia', 'Color: Beige, blanco y negro. Es una zuricata.', 899.00, '2024-05-31 01:52:14', '2024-05-31 01:52:14', '/images/Gracia.jpg\r\n                                                                                                        '),
(6, 'Simba', 'Color: Blanco, café y negro. Es un gato.', 899.00, '2024-05-31 02:13:48', '2024-05-31 02:13:48', '/images/Cam.jpg'),
(7, 'Aron', 'Color: Negro y gris. Es un chimpancé.', 899.00, '2024-05-31 02:13:48', '2024-05-31 02:13:48', '/images/Aron.jpg'),
(8, 'Junie', 'Color: Amarillo. Es un plátano.', 899.00, '2024-05-31 02:13:48', '2024-05-31 02:13:48', '/images/Junie.jpg'),
(9, 'Garret', 'Color: Café, blanco y rosa. Es un hámster.', 899.00, '2024-05-31 02:13:48', '2024-05-31 02:13:48', '/images/Garret.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
